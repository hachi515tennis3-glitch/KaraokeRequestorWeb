<?php

require_once dirname(__DIR__) . '/special_page_func.php';

function sp_test_assert($condition, $message)
{
    if (!$condition) {
        fwrite(STDERR, "FAILED: {$message}\n");
        exit(1);
    }
}

$base = special_page_default_data();
$base['theme'] = array_merge($base['theme'], [
    'custom_colors_enabled' => 1,
    'surface_mode' => 'auto',
    'base_color' => '#203040',
    'panel_color' => '#304050',
    'text_color' => '#fefefe',
    'muted_color' => '#c0c0c0',
    'accent_color' => '#33ccff',
    'accent2_color' => '#ff66aa',
    'summary_image' => 'assets/bg/hero.webp',
    'summary_blur' => 4,
    'summary_show_stats' => 1,
    'summary_style' => 'editorial_overlay',
    'summary_height' => 480,
    'summary_content_align' => 'center',
    'summary_frame' => 'none',
    'logo_image' => 'assets/logo/logo.webp',
    'logo_display' => 'hero',
    'logo_treatment' => 'glow',
    'logo_max_height' => 190,
    'movie_style' => 'editorial_carousel',
    'movie_position' => 'after_summary',
    'movie_align' => 'center',
    'movie_height' => 460,
    'movie_autoplay' => 0,
    'movie_heading' => 'TRAILER',
    'movie_subtitle' => '映像',
    'songs_mode' => 'collapsible_closed',
    'hover_overlay_color' => '#ff0000',
    'hover_overlay_opacity' => 35,
    'reveal_effect' => 'unclip',
]);
$base['content']['mini_videos'] = [[
    'id' => 'video_test',
    'title' => 'MOVIE',
    'src' => 'assets/video/movie.webm',
    'poster' => 'assets/bg/poster.webp',
]];

$vars = special_page_theme_vars($base['theme']);
sp_test_assert($vars['bg'] === '#203040', 'custom base color');
sp_test_assert($vars['panel'] === '48, 64, 80', 'custom panel color');
sp_test_assert($vars['songs_mode'] === 'collapsible_closed', 'songs mode');
$presetTheme = $base['theme'];
$presetTheme['custom_colors_enabled'] = 0;
$presetVars = special_page_theme_vars($presetTheme);
sp_test_assert($presetVars['bg'] !== '#203040', 'disabled custom colors must use the preset');
$lightTheme = $base['theme'];
$lightTheme['custom_colors_enabled'] = 0;
$lightTheme['preset_stack'] = ['paper_blue'];
$lightVars = special_page_theme_vars($lightTheme);
sp_test_assert($lightVars['text'] === '#182331', 'light preset text color');
sp_test_assert($lightVars['muted'] === '#596878', 'light preset muted color');
sp_test_assert($lightVars['surface_mode'] === 'light', 'light preset surface mode');
sp_test_assert(special_page_schema_version() === 4, 'schema version 4');

$posted = special_page_normalize_post([
    'slug' => 'roundtrip-test',
    'title' => 'Roundtrip',
    'preset_stack' => ['moonlight_blue'],
    'artist_id' => ['artist_test'],
    'artist_name' => ['Singer'],
    'artist_kana' => [''],
    'artist_icon' => [''],
    'song_id' => ['song_test'],
    'song_title' => ['Song'],
    'song_subtitle' => [''],
    'song_artist' => ['Singer'],
    'song_artist_ids' => ['artist_test'],
    'song_artist_relation_mode' => ['explicit'],
    'song_type' => ['solo'],
    'song_tags' => [''],
    'song_duration' => [''],
    'song_cover' => [''],
    'song_play_url' => [''],
    'song_lyrics_url' => [''],
    'song_pickup' => [1],
    'summary_image' => 'assets/bg/hero.webp',
    'summary_blur' => 7,
    'summary_overlay' => 44,
    'summary_show_stats' => 0,
    'logo_image' => 'assets/logo/logo.webp',
    'logo_width' => 240,
    'logo_align' => 'center',
    'logo_display' => 'hero',
    'logo_treatment' => 'editorial',
    'logo_max_height' => 190,
    'custom_colors_enabled' => 1,
    'surface_mode' => 'light',
    'base_color' => '#203040',
    'panel_color' => '#304050',
    'text_color' => '#fefefe',
    'muted_color' => '#c0c0c0',
    'accent_color' => '#33ccff',
    'accent2_color' => '#ff66aa',
    'highlight_color' => '#ffee88',
    'font_body' => 'modern',
    'font_heading' => 'local',
    'font_nav' => 'gothic',
    'font_local_file' => 'assets/font/title.woff2',
    'font_local_scope' => 'heading',
    'songs_mode' => 'collapsible_closed',
    'hover_overlay_color' => '#112233',
    'hover_overlay_opacity' => 45,
    'hover_overlay_blend' => 'multiply',
    'hover_zoom' => 108,
    'reveal_effect' => 'rotate',
    'reveal_duration' => 900,
    'reveal_distance' => 36,
    'summary_style' => 'editorial_overlay',
    'summary_height' => 480,
    'summary_content_align' => 'center',
    'summary_frame' => 'none',
    'movie_style' => 'editorial_carousel',
    'movie_position' => 'after_pickup',
    'movie_align' => 'center',
    'movie_height' => 460,
    'movie_autoplay' => 0,
    'movie_heading' => 'TRAILER',
    'movie_subtitle' => '映像',
    'mini_video_id' => ['video_test'],
    'mini_video_title' => ['MOVIE'],
    'mini_video_src' => ['assets/video/movie.webm'],
    'mini_video_poster' => ['assets/bg/poster.webp'],
]);
sp_test_assert($posted['theme']['summary_blur'] === 7, 'POST summary blur roundtrip');
sp_test_assert($posted['theme']['logo_width'] === 240, 'POST logo width roundtrip');
sp_test_assert($posted['theme']['logo_treatment'] === 'editorial', 'POST logo treatment roundtrip');
sp_test_assert($posted['theme']['accent_color'] === '#33ccff', 'POST custom color roundtrip');
sp_test_assert($posted['theme']['surface_mode'] === 'light', 'POST surface mode roundtrip');
sp_test_assert($posted['theme']['font_heading'] === 'local', 'POST heading font roundtrip');
sp_test_assert($posted['theme']['songs_mode'] === 'collapsible_closed', 'POST songs mode roundtrip');
sp_test_assert($posted['content']['mini_videos'][0]['src'] === 'assets/video/movie.webm', 'POST mini video roundtrip');
sp_test_assert($posted['theme']['movie_style'] === 'editorial_carousel', 'POST movie style roundtrip');
sp_test_assert($posted['theme']['movie_position'] === 'after_pickup', 'POST movie position roundtrip');
sp_test_assert($posted['theme']['summary_style'] === 'editorial_overlay', 'POST summary style roundtrip');
sp_test_assert(count(special_page_presets()) >= 18, 'expanded color presets');
sp_test_assert(count(special_page_font_presets()) >= 11, 'expanded font presets');
sp_test_assert(isset(special_page_layout_presets()['media_prologue']), 'media prologue layout');
sp_test_assert(strpos(special_page_css_string('x");}</style>'), '</style>') === false, 'CSS URL escaping');

$positionData = $base;
$positionData['theme']['movie_position'] = 'after_pickup';
$positionHtml = special_page_render_html($positionData, 'static', true);
sp_test_assert(strpos($positionHtml, 'data-sp-movie-showcase') > strpos($positionHtml, 'id="pickup"'), 'movie after pickup placement');

$lightData = $base;
$lightData['theme']['custom_colors_enabled'] = 0;
$lightData['theme']['preset_stack'] = ['paper_blue'];
$lightHtml = special_page_render_html($lightData, 'static', true);
sp_test_assert(strpos($lightHtml, 'sp-surface-light') !== false, 'light surface body class');

$legacyData = $base;
$legacyData['theme']['movie_style'] = 'grid';
$legacyData['theme']['movie_legacy_controls'] = 1;
$legacyHtml = special_page_render_html($legacyData, 'static', true);
sp_test_assert(strpos($legacyHtml, '<video controls') !== false, 'legacy grid video controls');

$compactData = $base;
$compactData['theme']['page_layout'] = 'cinematic_chapters';
$compactData['theme']['summary_height'] = 180;
$compactData['theme']['logo_treatment'] = 'halo';
$compactData['theme']['logo_image'] = '';
$compactData['theme']['logo_text'] = '';
$compactHtml = special_page_render_html($compactData, 'static', true);
sp_test_assert(strpos($compactHtml, 'sp-summary-height-compact') !== false, 'compact summary class');
sp_test_assert(strpos($compactHtml, '--sp-summary-height:180px') !== false, 'summary height must be emitted exactly');
sp_test_assert(strpos($compactHtml, 'height: var(--sp-summary-height, 360px)') !== false, 'summary height CSS');
sp_test_assert(strpos($compactHtml, 'max(var(--sp-summary-height)') === false, 'layout must not override summary height');
sp_test_assert(strpos($compactHtml, 'sp-logo-treatment-halo') !== false, 'halo logo treatment');
sp_test_assert(strpos($compactHtml, '<h1 class="sp-summary-title">' . $compactData['manifest']['title'] . '</h1>') !== false, 'blank logo text must fall back to the page title');
sp_test_assert(strpos($compactHtml, '<div class="sp-logo">') === false, 'text page title must not be duplicated in the top bar');
sp_test_assert(strpos($compactHtml, '編集画面でPICKUP指定した曲') === false, 'editor-only pickup description must not be rendered');
sp_test_assert(strpos($compactHtml, '.sp-topbar { position: sticky; top: 0; z-index: 20; padding: 10px 0 12px; background: transparent; }') !== false, 'top bar must not render an outer black surface');

foreach (array_keys(special_page_layout_presets()) as $layout) {
    $data = $base;
    $data['theme']['page_layout'] = $layout;
    $html = special_page_render_html($data, 'static', true);
    sp_test_assert(strpos($html, 'sp-page-layout-' . $layout) !== false, $layout . ' body class');
    sp_test_assert(strpos($html, 'sp-songs-details') !== false, $layout . ' songs details');
    sp_test_assert(strpos($html, 'data-sp-mini-video') !== false, $layout . ' mini video');
    sp_test_assert(strpos($html, 'data-sp-movie-showcase') !== false, $layout . ' movie showcase');
    sp_test_assert(strpos($html, 'data-sp-movie-prev') !== false, $layout . ' movie previous control');
    sp_test_assert(strpos($html, 'sp-summary-editorial_overlay') !== false, $layout . ' editorial summary');
    sp_test_assert(strpos($html, 'sp-logo-treatment-glow') !== false, $layout . ' logo treatment');
    sp_test_assert(strpos($html, 'data-sp-reveal') !== false, $layout . ' reveal hooks');
    sp_test_assert(strpos($html, '--sp-summary-image') !== false, $layout . ' summary image');
}

echo "special page theme render tests passed\n";
