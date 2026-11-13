<?php
// Run from CLI. Configuration is temporary and SQLite stays in memory.
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}
$root = dirname(__DIR__);
$originalCwd = getcwd();
$fixture = sys_get_temp_dir() . '/ykr-upstream-' . bin2hex(random_bytes(8));
if (!mkdir($fixture)) throw new RuntimeException('Cannot create fixture');
register_shutdown_function(function () use ($fixture, $originalCwd) {
    $GLOBALS['db'] = null;
    $GLOBALS['res'] = null;
    $GLOBALS['priority_db'] = null;
    chdir($originalCwd);
    foreach (['config.ini', 'commonfunc.php', 'kara_config.php', 'prioritydb_func.php', 'appblock_func.php', 'prioritydb.db'] as $file) {
        if (is_file($fixture . '/' . $file)) unlink($fixture . '/' . $file);
    }
    rmdir($fixture);
});
file_put_contents($fixture . '/config.ini', "dbname=\":memory:\"\ndownloadfolder=\"\"\n");
foreach (['commonfunc.php', 'kara_config.php', 'prioritydb_func.php', 'appblock_func.php'] as $file) {
    copy($root . '/' . $file, $fixture . '/' . $file);
}
chdir($fixture);
require_once $fixture . '/commonfunc.php';
require_once $root . '/function_setlist_stats.php';

function upstream_assert($condition, $message)
{
    if (!$condition) throw new RuntimeException($message);
}
function upstream_background($bs5 = true)
{
    ob_start();
    print_bg_style_block($bs5);
    return ob_get_clean();
}

upstream_assert(!configbool('use_setlist_cool', false), 'Official default is disabled');
upstream_assert(strpos(build_reservation_tabs(), 'setlist_cool_bs5.php') === false, 'Disabled tab stays hidden');
$config_ini['use_setlist_cool'] = 1;
upstream_assert(strpos(build_reservation_tabs('123', 'setlist'), 'setlist_cool_bs5.php?selectid=123') !== false, 'Enabled tab keeps request ID');
$config_ini['bgimage'] = urlencode('images/bg/test.png');
upstream_assert(strpos(upstream_background(), '--bg-image-size:cover;') !== false, 'Default background covers page');
$config_ini['bg_image_mode'] = 'tile';
foreach ([0 => 'auto', 200 => '200px auto', 999 => '600px auto', -1 => 'auto'] as $size => $expected) {
    $config_ini['bg_tile_size'] = $size;
    $css = upstream_background();
    upstream_assert(strpos($css, '--bg-image-repeat:repeat;') !== false, 'Tile mode repeats');
    upstream_assert(strpos($css, '--bg-image-size:' . $expected . ';') !== false, 'Tile size bounds: ' . $size);
}
upstream_assert(strpos(upstream_background(false), '--bg-page-image:') === false, 'BS3 excludes background images');
$config_ini['bg_image_mode'] = 'unknown';
upstream_assert(strpos(upstream_background(), '--bg-image-size:cover;') !== false, 'Invalid mode falls back to cover');

$config_ini['setlist_search_backend'] = 'everything';
$viewer = 'const COOL_DATA = ' . json_encode(['2026年夏' => [['title' => '曲名 [別名] "引用"']]]) . ';'
    . 'const RANK_DATA = []; const UPDATE_TS = "2026-09-20";';
$data = setlist_stats_normalize_viewer($viewer, 'https://example.test/viewer.html');
upstream_assert($data['categories'] === ['2026年夏'], 'Categories fall back to cool data keys');
upstream_assert($data['cool_data']['2026年夏'][0]['title'] === '曲名 [別名] "引用"', 'Nested and escaped values survive parsing');
upstream_assert($data['search_backend'] === 'everything', 'Everything backend is retained');
$config_ini['setlist_search_backend'] = 'invalid';
upstream_assert(setlist_stats_search_backend() === 'listerdb', 'Unknown backend falls back to ListerDB');
upstream_assert(setlist_stats_normalize_viewer('', '')['categories'] === [], 'Missing viewer has empty data');
echo "upstream #222 integration tests passed\n";
