<?php
require_once 'commonfunc.php';
require_once 'configauth_class.php';
require_once 'easyauth_class.php';
require_once 'special_page_func.php';

$configauth = new ConfigAuth();
if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER'] !== 'admin' || !$configauth->check_auth($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Configuration page authorization."');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authorization Required.';
    exit;
}

$easyauth = new EasyAuth();
$easyauth->do_eashauthcheck();

$message = '';
$message_class = 'alert-info';
$slug = $_GET['slug'] ?? $_POST['slug'] ?? 'tsukiyomi-no-ne';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $posted = special_page_normalize_post($_POST);
    $slug = $posted['manifest']['slug'];
    $action = $_POST['action'] ?? 'save';
    $posted_validation = special_page_validate($posted);
    if ($action === 'upload_asset') {
        special_page_save($posted);
        $upload = special_page_store_asset_upload($slug, $_POST['asset_kind'] ?? '', $_FILES['asset_file'] ?? []);
        $message = $upload['message'] . (!empty($upload['reference']) ? ' ' . $upload['reference'] : '');
        $message_class = !empty($upload['ok']) ? 'alert-success' : 'alert-danger';
    } elseif ($action === 'generate' && empty($posted_validation['valid'])) {
        special_page_save($posted);
        $message = '下書きを保存しました。検証エラーを解消してから公開用HTMLを生成してください。';
        $message_class = 'alert-danger';
    } elseif ($action === 'generate') {
        $generated = special_page_generate($posted);
        $message = '保存して生成しました: ' . special_page_public_path($slug);
        $message_class = is_file($generated) ? 'alert-success' : 'alert-warning';
    } else {
        special_page_save($posted);
        $message = empty($posted_validation['valid'])
            ? '下書きを保存しました。公開前に検証エラーを解消してください。'
            : '保存しました。生成ボタンで公開用HTMLを更新できます。';
        $message_class = empty($posted_validation['valid']) ? 'alert-warning' : 'alert-success';
    }
}

$data = special_page_load($slug);
$manifest = $data['manifest'];
$theme = $data['theme'];
$content = $data['content'];
$songs = $content['songs'] ?? [];
$artists = $content['artists'] ?? [];
$sections = $content['sections'] ?? special_page_schema_default_sections();
$motion_layers = $theme['motion_layers'] ?? [];
$motion_layer_rows = $motion_layers ?: [special_page_motion_layer_defaults()];
$mini_video_rows = $content['mini_videos'] ?? [];
if (!$mini_video_rows) $mini_video_rows = [['id' => '', 'title' => '', 'src' => '', 'poster' => '']];
if (!$songs) $songs = special_page_default_data()['content']['songs'];
if (!$artists) $artists = special_page_default_data()['content']['artists'];
$validation = special_page_validate($data);
$projects = special_page_list();
$public_path = special_page_public_path($manifest['slug']);
$generated = is_file(__DIR__ . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $public_path));
$theme_vars = special_page_theme_vars($theme);
$bg_asset_choices = special_page_asset_choices($manifest['slug'], 'bg');
$cover_asset_choices = special_page_asset_choices($manifest['slug'], 'cover');
$artist_asset_choices = array_values(array_unique(array_merge(
    special_page_asset_choices($manifest['slug'], 'artist'),
    special_page_asset_choices($manifest['slug'], 'cover')
)));
$motion_asset_choices = special_page_asset_choices($manifest['slug'], 'motion');
$video_asset_choices = special_page_asset_choices($manifest['slug'], 'video');
$logo_asset_choices = array_values(array_unique(array_merge(special_page_asset_choices($manifest['slug'], 'logo'), $bg_asset_choices)));
$font_asset_choices = special_page_asset_choices($manifest['slug'], 'font');

function spb_v($value)
{
    return special_page_h($value);
}

function spb_checked($list, $value)
{
    return in_array($value, (array)$list, true) ? ' checked' : '';
}

function spb_rgb_hex($rgb, $fallback = '#101834')
{
    $parts = array_map('intval', explode(',', (string)$rgb));
    if (count($parts) !== 3) return $fallback;
    return sprintf('#%02x%02x%02x', max(0, min(255, $parts[0])), max(0, min(255, $parts[1])), max(0, min(255, $parts[2])));
}

function spb_render_validation($validation, $heading_id)
{
    $errors = is_array($validation['errors'] ?? null) ? $validation['errors'] : [];
    $warnings = is_array($validation['warnings'] ?? null) ? $validation['warnings'] : [];
    echo '<section class="spb-validation" aria-labelledby="' . spb_v($heading_id) . '">';
    echo '<h2 class="spb-validation-heading" id="' . spb_v($heading_id) . '">保存済み内容の検証</h2>';
    if (!empty($validation['valid']) && !$warnings) {
        echo '<div class="spb-validation-panel spb-validation-success" role="status">保存済み内容は公開条件を満たしています。</div>';
    }
    if ($errors) {
        echo '<div class="spb-validation-panel spb-validation-error" role="alert">';
        echo '<strong>保存済み内容にエラーがあります。</strong><ul>';
        foreach ($errors as $item) {
            echo '<li><span class="spb-validation-path">' . spb_v($item['path'] ?? '') . '</span> ' . spb_v($item['message'] ?? '') . '</li>';
        }
        echo '</ul></div>';
    }
    if ($warnings) {
        echo '<div class="spb-validation-panel spb-validation-warning" role="status">';
        echo '<strong>保存済み内容に確認事項があります。</strong><ul>';
        foreach ($warnings as $item) {
            echo '<li><span class="spb-validation-path">' . spb_v($item['path'] ?? '') . '</span> ' . spb_v($item['message'] ?? '') . '</li>';
        }
        echo '</ul></div>';
    }
    echo '</section>';
}

$layout_best_for = [
    'catalog' => '曲数が多いページや基本構成に',
    'visual_picker' => 'PICKUPを視覚的に選ばせたいページに',
    'spotlight_rail' => '主役の曲を順番に見せたいページに',
    'cinematic_chapters' => '世界観とPICKUPを章立てで見せたいページに',
    'poster_directory' => '多数の楽曲を画像と分類から探したいページに',
    'coverflow_shelf' => 'ジャケットを眺めながら選びたいページに',
    'artist_atlas' => '歌手を中心に楽曲を探したいページに',
    'setlist_timeline' => '公演順や時系列で見せたいページに',
    'tag_atlas' => 'タグやカテゴリから横断的に探したいページに',
    'duet_matrix' => 'デュエットや組み合わせを比較したいページに',
];
?>
<!doctype html>
<html lang="ja">
<head>
<?php print_meta_header(); ?>
<title>特設ページ作成</title>
<?php print_bs5_search_head('css/themes/special-builder.css'); ?>
</head>
<body>
<?php shownavigatioinbar_bs5('init.php'); ?>

<div class="container spb-page">
  <div class="spb-header">
    <div>
      <h1>特設ページ作成</h1>
      <p>楽曲ポータル型の特設ページを編集し、ページ単位のフォルダへ生成します。</p>
    </div>
    <div class="spb-actions">
      <a href="init.php#opbuttom" class="btn btn-outline-secondary">環境設定へ戻る</a>
      <?php if ($generated): ?>
      <a href="<?php echo spb_v($public_path); ?>" class="btn btn-outline-primary" target="_blank" rel="noopener">生成ページを開く</a>
      <?php endif; ?>
    </div>
  </div>

  <?php if ($message !== ''): ?>
  <div class="alert <?php echo spb_v($message_class); ?>" role="alert"><?php echo spb_v($message); ?></div>
  <?php endif; ?>

  <div class="spb-card">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
      <div>
        <strong>プロジェクト</strong>
        <div class="spb-help">既存のプロジェクトはフォルダ単位で読み込みます。</div>
      </div>
      <div class="spb-projects">
        <?php foreach ($projects as $project): ?>
        <a class="btn btn-sm <?php echo $project['slug'] === $manifest['slug'] ? 'btn-primary' : 'btn-outline-secondary'; ?>" href="special_page_builder.php?slug=<?php echo rawurlencode($project['slug']); ?>">
          <?php echo spb_v($project['title']); ?><?php echo $project['generated'] ? ' / HTML' : ''; ?>
        </a>
        <?php endforeach; ?>
        <?php if (!$projects): ?><span class="spb-help">まだ保存済みプロジェクトはありません。</span><?php endif; ?>
      </div>
    </div>
  </div>

  <form method="post" action="special_page_builder.php" enctype="multipart/form-data">
    <div class="spb-card">
      <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
        <ul class="nav nav-tabs" id="specialBuilderTabs" role="tablist">
          <li class="nav-item" role="presentation"><button class="nav-link active" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic-pane" type="button" role="tab">基本</button></li>
          <li class="nav-item" role="presentation"><button class="nav-link" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-pane" type="button" role="tab">デザイン</button></li>
          <li class="nav-item" role="presentation"><button class="nav-link" id="layout-tab" data-bs-toggle="tab" data-bs-target="#layout-pane" type="button" role="tab">レイアウト</button></li>
          <li class="nav-item" role="presentation"><button class="nav-link" id="songs-tab" data-bs-toggle="tab" data-bs-target="#songs-pane" type="button" role="tab">楽曲</button></li>
          <li class="nav-item" role="presentation"><button class="nav-link" id="artists-tab" data-bs-toggle="tab" data-bs-target="#artists-pane" type="button" role="tab">歌手</button></li>
          <li class="nav-item" role="presentation"><button class="nav-link" id="preview-tab" data-bs-toggle="tab" data-bs-target="#preview-pane" type="button" role="tab">プレビュー</button></li>
        </ul>
        <div class="spb-actions">
          <button type="submit" name="action" value="save" class="btn btn-secondary">保存</button>
          <button type="submit" name="action" value="generate" class="btn btn-primary">保存して生成</button>
        </div>
      </div>
    </div>

    <div class="tab-content">
      <section class="tab-pane fade show active" id="basic-pane" role="tabpanel" aria-labelledby="basic-tab">
        <div class="spb-card">
          <div class="spb-grid">
            <div>
              <label class="form-label" for="title">ページ名</label>
              <input class="form-control" type="text" id="title" name="title" value="<?php echo spb_v($manifest['title']); ?>" required>
            </div>
            <div>
              <label class="form-label" for="slug">フォルダID</label>
              <input class="form-control" type="text" id="slug" name="slug" value="<?php echo spb_v($manifest['slug']); ?>" pattern="[A-Za-z0-9_-]+" required>
              <div class="spb-help">生成先: special_pages/{フォルダID}/index.html</div>
            </div>
            <div>
              <label class="form-label" for="logo_text">ロゴ表示</label>
              <input class="form-control" type="text" id="logo_text" name="logo_text" value="<?php echo spb_v($theme['logo_text'] ?? ''); ?>">
            </div>
            <div>
              <label class="form-label" for="logo_subtitle">ロゴ下テキスト</label>
              <input class="form-control" type="text" id="logo_subtitle" name="logo_subtitle" value="<?php echo spb_v($theme['logo_subtitle'] ?? ''); ?>">
            </div>
            <div>
              <label class="form-label" for="background_image">背景画像パス</label>
              <input class="form-control" type="text" id="background_image" name="background_image" list="spbBgAssets" value="<?php echo spb_v($theme['background_image'] ?? ''); ?>" placeholder="assets/bg/example.jpg">
              <div class="spb-help">既存画像、生成フォルダ内画像、またはURLを指定できます。</div>
            </div>
            <div>
              <label class="form-label" for="background_video_enabled">背景動画</label>
              <select class="form-select" id="background_video_enabled" name="background_video_enabled">
                <option value="0" <?php echo empty($theme['background_video_enabled']) ? 'selected' : ''; ?>>使わない</option>
                <option value="1" <?php echo !empty($theme['background_video_enabled']) ? 'selected' : ''; ?>>使う</option>
              </select>
              <div class="spb-help">動画はオンの時だけ読み込みます。未設定時は背景画像を使います。</div>
            </div>
            <div>
              <label class="form-label" for="background_video">背景動画パス</label>
              <input class="form-control" type="text" id="background_video" name="background_video" list="spbVideoAssets" value="<?php echo spb_v($theme['background_video'] ?? ''); ?>" placeholder="assets/bg/main.mp4">
              <div class="spb-help">背景動画は mp4 / webm を指定してください。webp などの画像は背景画像または動画ポスターへ指定します。</div>
            </div>
            <div>
              <label class="form-label" for="background_video_poster">動画ポスター画像</label>
              <input class="form-control" type="text" id="background_video_poster" name="background_video_poster" list="spbBgAssets" value="<?php echo spb_v($theme['background_video_poster'] ?? ''); ?>" placeholder="空欄なら背景画像を使用">
              <div class="spb-help">動画ポスターには画像（webp / jpg / png など）を指定します。</div>
            </div>
            <div>
              <label class="form-label" for="credit">クレジット</label>
              <input class="form-control" type="text" id="credit" name="credit" value="<?php echo spb_v($content['credit'] ?? ''); ?>">
            </div>
          </div>
        </div>
      </section>

      <section class="tab-pane fade" id="design-pane" role="tabpanel" aria-labelledby="design-tab">
        <div class="spb-card">
          <h2 class="h5">導入ビジュアルとロゴ</h2>
          <p class="spb-help">ページ上段を、背景とは独立したキービジュアルとして調整します。ロゴ画像がない場合は従来の文字タイトルを表示します。</p>
          <div class="spb-grid">
            <div>
              <label class="form-label" for="summary_image">導入画像</label>
              <input class="form-control" type="text" id="summary_image" name="summary_image" list="spbBgAssets" value="<?php echo spb_v($theme['summary_image'] ?? ''); ?>" placeholder="assets/bg/hero.webp">
            </div>
            <div>
              <label class="form-label" for="summary_blur">導入画像ぼかし</label>
              <input class="form-range" type="range" id="summary_blur" name="summary_blur" min="0" max="30" value="<?php echo (int)($theme['summary_blur'] ?? 0); ?>">
            </div>
            <div>
              <label class="form-label" for="summary_overlay">導入画像の色面濃度</label>
              <input class="form-range" type="range" id="summary_overlay" name="summary_overlay" min="0" max="95" value="<?php echo (int)($theme['summary_overlay'] ?? 58); ?>">
            </div>
            <div>
              <label class="form-label" for="summary_image_fit">導入画像の表示</label>
              <select class="form-select" id="summary_image_fit" name="summary_image_fit">
                <?php foreach (['cover' => '枠いっぱい', 'contain' => '画像全体'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['summary_image_fit'] ?? 'cover') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="form-label" for="summary_image_position">導入画像の基準位置</label>
              <select class="form-select" id="summary_image_position" name="summary_image_position">
                <?php foreach (['center' => '中央', 'top' => '上', 'bottom' => '下', 'left' => '左', 'right' => '右'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['summary_image_position'] ?? 'center') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="form-label" for="summary_show_stats">登録件数</label>
              <select class="form-select" id="summary_show_stats" name="summary_show_stats">
                <option value="1"<?php echo !array_key_exists('summary_show_stats', $theme) || !empty($theme['summary_show_stats']) ? ' selected' : ''; ?>>表示</option>
                <option value="0"<?php echo array_key_exists('summary_show_stats', $theme) && empty($theme['summary_show_stats']) ? ' selected' : ''; ?>>非表示</option>
              </select>
            </div>
            <div>
              <label class="form-label" for="summary_style">導入レイアウト</label>
              <select class="form-select" id="summary_style" name="summary_style">
                <?php foreach (['classic_panel' => '従来パネル', 'editorial_overlay' => '画像と文字を重ねる', 'type_only' => 'タイポグラフィ主体', 'split_stage' => '画像と情報を分割'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['summary_style'] ?? 'classic_panel') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="form-label" for="summary_height">導入部の高さ</label>
              <input class="form-range" type="range" id="summary_height" name="summary_height" min="140" max="820" value="<?php echo (int)($theme['summary_height'] ?? 360); ?>" data-spb-range-output="summary_height_value">
              <output id="summary_height_value" for="summary_height" data-spb-range-value="summary_height"><?php echo (int)($theme['summary_height'] ?? 360); ?>px</output>
            </div>
            <div>
              <label class="form-label" for="summary_content_align">導入内容の配置</label>
              <select class="form-select" id="summary_content_align" name="summary_content_align">
                <?php foreach (['start' => '左', 'center' => '中央', 'end' => '右'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['summary_content_align'] ?? 'start') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="form-label" for="summary_frame">導入部の縁取り</label>
              <select class="form-select" id="summary_frame" name="summary_frame">
                <?php foreach (['none' => 'なし', 'line' => '細い罫線', 'glass' => 'ガラス面'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['summary_frame'] ?? 'line') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="form-label" for="logo_image">ロゴ画像</label>
              <input class="form-control" type="text" id="logo_image" name="logo_image" list="spbLogoAssets" value="<?php echo spb_v($theme['logo_image'] ?? ''); ?>" placeholder="assets/logo/logo.webp">
              <div class="spb-help">透過PNG/WebP/SVGを推奨します。画像自体に背景がある場合は除去されません。</div>
            </div>
            <div>
              <label class="form-label" for="logo_width">ロゴ幅</label>
              <input class="form-range" type="range" id="logo_width" name="logo_width" min="60" max="420" value="<?php echo (int)($theme['logo_width'] ?? 180); ?>">
            </div>
            <div>
              <label class="form-label" for="logo_align">ロゴ配置</label>
              <select class="form-select" id="logo_align" name="logo_align">
                <?php foreach (['start' => '左', 'center' => '中央', 'end' => '右'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['logo_align'] ?? 'start') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="form-label" for="logo_display">ロゴの表示場所</label>
              <select class="form-select" id="logo_display" name="logo_display">
                <?php foreach (['both' => 'ヘッダーと導入部', 'header' => 'ヘッダーのみ', 'hero' => '導入部のみ', 'hidden' => '画像を使わない'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['logo_display'] ?? 'both') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="form-label" for="logo_treatment">ロゴの見せ方</label>
              <select class="form-select" id="logo_treatment" name="logo_treatment">
                <?php foreach (['transparent' => '背景になじませる', 'soft_plate' => '柔らかな色面', 'glow' => '淡い発光', 'editorial' => '罫線ロックアップ', 'halo' => '光輪ロックアップ'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['logo_treatment'] ?? 'transparent') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="form-label" for="logo_max_height">導入ロゴの高さ</label>
              <input class="form-range" type="range" id="logo_max_height" name="logo_max_height" min="40" max="280" value="<?php echo (int)($theme['logo_max_height'] ?? 150); ?>" data-spb-range-output="logo_max_height_value">
              <output id="logo_max_height_value" for="logo_max_height" data-spb-range-value="logo_max_height"><?php echo (int)($theme['logo_max_height'] ?? 150); ?>px</output>
            </div>
          </div>
        </div>

        <div class="spb-card">
          <h2 class="h5">配色とフォント</h2>
          <p class="spb-help">プリセットを起点に、ページ全体・パネル・文字・アクセントを個別調整できます。</p>
          <div class="spb-grid">
            <div><label class="form-label" for="custom_colors_enabled">個別配色</label><select class="form-select" id="custom_colors_enabled" name="custom_colors_enabled"><option value="0"<?php echo empty($theme['custom_colors_enabled']) ? ' selected' : ''; ?>>プリセットを使用</option><option value="1"<?php echo !empty($theme['custom_colors_enabled']) ? ' selected' : ''; ?>>下記の色を使用</option></select></div>
            <div><label class="form-label" for="surface_mode">ページの明るさ</label><select class="form-select" id="surface_mode" name="surface_mode"><?php foreach (['auto' => 'プリセットに合わせる', 'dark' => '暗い背景', 'light' => '明るい背景'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['surface_mode'] ?? 'auto') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?></select></div>
            <?php foreach ([
              ['base_color', 'ページ色', $theme_vars['bg']],
              ['panel_color', 'パネル色', spb_rgb_hex($theme_vars['panel'])],
              ['text_color', '本文色', $theme_vars['text']],
              ['muted_color', '補助文字色', $theme_vars['muted']],
              ['accent_color', 'アクセント色', $theme_vars['accent']],
              ['accent2_color', 'アクセント色2', $theme_vars['accent2']],
              ['highlight_color', '強調色', $theme_vars['gold']],
            ] as $color): ?>
            <div><label class="form-label" for="<?php echo $color[0]; ?>"><?php echo $color[1]; ?></label><input class="form-control form-control-color" type="color" id="<?php echo $color[0]; ?>" name="<?php echo $color[0]; ?>" value="<?php echo spb_v(($theme[$color[0]] ?? '') ?: $color[2]); ?>"></div>
            <?php endforeach; ?>
            <?php $font_options = array_map(function ($preset) { return $preset['label']; }, special_page_font_presets()); ?>
            <?php foreach ([['font_body', '本文フォント', 'gothic'], ['font_heading', '見出しフォント', 'serif'], ['font_nav', 'ナビフォント', 'gothic']] as $font): ?>
            <div><label class="form-label" for="<?php echo $font[0]; ?>"><?php echo $font[1]; ?></label><select class="form-select" id="<?php echo $font[0]; ?>" name="<?php echo $font[0]; ?>"><?php foreach ($font_options as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme[$font[0]] ?? $font[2]) === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?></select></div>
            <?php endforeach; ?>
            <div><label class="form-label" for="font_local_file">ローカルフォント</label><input class="form-control" type="text" id="font_local_file" name="font_local_file" list="spbFontAssets" value="<?php echo spb_v($theme['font_local_file'] ?? ''); ?>" placeholder="assets/font/title.woff2"></div>
            <div><label class="form-label" for="font_local_scope">ローカルフォント一括適用</label><select class="form-select" id="font_local_scope" name="font_local_scope"><?php foreach (['none' => '個別指定のみ', 'body' => '本文', 'heading' => '見出し', 'nav' => 'ナビ', 'all' => 'すべて'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['font_local_scope'] ?? 'none') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?></select></div>
          </div>
        </div>

        <div class="spb-card">
          <h2 class="h5">カードとスクロール演出</h2>
          <div class="spb-grid">
            <div><label class="form-label" for="hover_overlay_color">画像ホバー色</label><input class="form-control form-control-color" type="color" id="hover_overlay_color" name="hover_overlay_color" value="<?php echo spb_v($theme['hover_overlay_color'] ?? '#000000'); ?>"></div>
            <div><label class="form-label" for="hover_overlay_opacity">画像ホバー色の濃さ</label><input class="form-range" type="range" id="hover_overlay_opacity" name="hover_overlay_opacity" min="0" max="90" value="<?php echo (int)($theme['hover_overlay_opacity'] ?? 0); ?>"></div>
            <div><label class="form-label" for="hover_overlay_blend">画像ホバー合成</label><select class="form-select" id="hover_overlay_blend" name="hover_overlay_blend"><?php foreach (['normal', 'multiply', 'screen', 'overlay', 'soft-light'] as $value): ?><option value="<?php echo $value; ?>"<?php echo (($theme['hover_overlay_blend'] ?? 'normal') === $value) ? ' selected' : ''; ?>><?php echo $value; ?></option><?php endforeach; ?></select></div>
            <div><label class="form-label" for="hover_zoom">ホバー時の画像拡大率</label><input class="form-range" type="range" id="hover_zoom" name="hover_zoom" min="100" max="120" value="<?php echo (int)($theme['hover_zoom'] ?? 104); ?>"></div>
            <div><label class="form-label" for="reveal_effect">スクロール登場演出</label><select class="form-select" id="reveal_effect" name="reveal_effect"><?php foreach (['none' => 'なし', 'fade' => 'フェードアップ', 'rotate' => '回転・縮小解除', 'unclip' => 'トリミング解除', 'zoom' => 'ズーム'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['reveal_effect'] ?? 'none') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?></select></div>
            <div><label class="form-label" for="reveal_duration">登場時間(ms)</label><input class="form-control" type="number" id="reveal_duration" name="reveal_duration" min="150" max="1800" value="<?php echo (int)($theme['reveal_duration'] ?? 620); ?>"></div>
            <div><label class="form-label" for="reveal_distance">登場移動量(px)</label><input class="form-range" type="range" id="reveal_distance" name="reveal_distance" min="0" max="120" value="<?php echo (int)($theme['reveal_distance'] ?? 28); ?>"></div>
            <div><label class="form-label" for="songs_mode">SONGS一覧</label><select class="form-select" id="songs_mode" name="songs_mode"><?php foreach (['expanded' => '常に展開', 'collapsible_open' => '折りたたみ可能・初期展開', 'collapsible_closed' => '折りたたみ可能・初期閉じる'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['songs_mode'] ?? 'expanded') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?></select></div>
          </div>
        </div>

        <div class="spb-card">
          <div class="d-flex justify-content-between align-items-center gap-3 mb-2">
            <div><h2 class="h5 mb-1">映像ショーケース</h2><div class="spb-help">既存の動画データを、一覧または中央を主役にしたスワイプ式ショーケースで表示します。</div></div>
            <button type="button" class="btn btn-outline-primary btn-sm" data-spb-add="#miniVideoRows" data-spb-max-rows="8">動画を追加</button>
          </div>
          <div class="spb-grid mb-3">
            <div><label class="form-label" for="movie_style">表示形式</label><select class="form-select" id="movie_style" name="movie_style"><?php foreach (['grid' => 'カード一覧（従来）', 'editorial_carousel' => 'エディトリアルカルーセル', 'cinema_strip' => 'シネマフィルム', 'floating_frames' => '浮遊フレーム'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['movie_style'] ?? 'grid') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?></select></div>
            <div><label class="form-label" for="movie_position">配置位置</label><select class="form-select" id="movie_position" name="movie_position"><?php foreach (['after_summary' => '導入部の直後', 'before_pickup' => 'PICKUPの直前', 'after_pickup' => 'PICKUPの直後'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['movie_position'] ?? 'after_summary') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?></select></div>
            <div><label class="form-label" for="movie_align">横方向の配置</label><select class="form-select" id="movie_align" name="movie_align"><?php foreach (['wide' => '横幅いっぱい', 'start' => '左寄せ', 'center' => '中央', 'end' => '右寄せ'] as $value => $label): ?><option value="<?php echo $value; ?>"<?php echo (($theme['movie_align'] ?? 'wide') === $value) ? ' selected' : ''; ?>><?php echo $label; ?></option><?php endforeach; ?></select></div>
            <div><label class="form-label" for="movie_height">表示高さ</label><input class="form-range" type="range" id="movie_height" name="movie_height" min="240" max="720" value="<?php echo (int)($theme['movie_height'] ?? 420); ?>" data-spb-range-output="movie_height_value"><output id="movie_height_value" for="movie_height" data-spb-range-value="movie_height"><?php echo (int)($theme['movie_height'] ?? 420); ?>px</output></div>
            <div><label class="form-label" for="movie_heading">英字見出し</label><input class="form-control" type="text" id="movie_heading" name="movie_heading" maxlength="40" value="<?php echo spb_v($theme['movie_heading'] ?? 'MOVIE'); ?>"></div>
            <div><label class="form-label" for="movie_subtitle">補助見出し</label><input class="form-control" type="text" id="movie_subtitle" name="movie_subtitle" maxlength="40" value="<?php echo spb_v($theme['movie_subtitle'] ?? '映像'); ?>"></div>
            <div><label class="form-label" for="movie_autoplay">切替後の自動再生</label><select class="form-select" id="movie_autoplay" name="movie_autoplay"><option value="0"<?php echo empty($theme['movie_autoplay']) ? ' selected' : ''; ?>>再生しない</option><option value="1"<?php echo !empty($theme['movie_autoplay']) ? ' selected' : ''; ?>>ミュートで再生</option></select></div>
          </div>
          <div class="spb-repeat" id="miniVideoRows">
            <?php foreach ($mini_video_rows as $idx => $video): ?>
            <div class="spb-repeat-row">
              <div class="spb-row-head"><strong><span class="spb-drag-handle" title="ドラッグで並び替え">☰</span> 動画 <span data-row-label><?php echo $idx + 1; ?></span></strong><button type="button" class="btn btn-outline-danger btn-sm" data-spb-remove>削除</button></div>
              <input type="hidden" name="mini_video_id[]" value="<?php echo spb_v($video['id'] ?? ''); ?>">
              <div class="spb-grid">
                <div><label class="form-label">見出し</label><input class="form-control" type="text" name="mini_video_title[]" maxlength="80" value="<?php echo spb_v($video['title'] ?? ''); ?>"></div>
                <div><label class="form-label">動画パス</label><input class="form-control" type="text" name="mini_video_src[]" list="spbVideoAssets" value="<?php echo spb_v($video['src'] ?? ''); ?>" placeholder="assets/video/movie.webm"></div>
                <div><label class="form-label">ポスター画像</label><input class="form-control" type="text" name="mini_video_poster[]" list="spbBgAssets" value="<?php echo spb_v($video['poster'] ?? ''); ?>" placeholder="assets/bg/movie-poster.webp"></div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="spb-card">
          <h2 class="h5">色プリセット</h2>
          <p class="spb-help">複数選択すると、先頭をベース色、2番目以降をアクセントとして合成します。</p>
          <div class="spb-preset-grid">
            <?php foreach (special_page_presets() as $key => $preset): ?>
            <label class="spb-preset">
              <span class="spb-swatch" style="--swatch-bg: <?php echo spb_v($preset['bg']); ?>; --swatch-accent: <?php echo spb_v($preset['accent']); ?>; --swatch-accent-2: <?php echo spb_v($preset['accent2']); ?>;"></span>
              <span><?php echo spb_v($preset['name']); ?></span>
              <input class="form-check-input" type="checkbox" name="preset_stack[]" value="<?php echo spb_v($key); ?>"<?php echo spb_checked($theme['preset_stack'] ?? [], $key); ?>>
            </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="spb-card">
          <div class="spb-grid">
            <div>
              <label class="form-label" for="overlay">背景の暗さ</label>
              <input class="form-range" type="range" id="overlay" name="overlay" min="0" max="95" value="<?php echo (int)($theme['overlay'] ?? 74); ?>">
            </div>
            <div>
              <label class="form-label" for="blur">背景ぼかし</label>
              <input class="form-range" type="range" id="blur" name="blur" min="0" max="30" value="<?php echo (int)($theme['blur'] ?? 10); ?>">
            </div>
            <div>
              <label class="form-label" for="card_opacity">カード透過</label>
              <input class="form-range" type="range" id="card_opacity" name="card_opacity" min="20" max="95" value="<?php echo (int)($theme['card_opacity'] ?? 64); ?>">
            </div>
            <div>
              <label class="form-label" for="card_radius">カード角丸</label>
              <div class="spb-range-control">
                <input class="form-range" type="range" id="card_radius" name="card_radius" min="0" max="36" value="<?php echo (int)($theme['card_radius'] ?? 22); ?>" data-spb-range-output="card_radius_value" data-spb-zero-value="0">
                <output id="card_radius_value" for="card_radius" data-spb-range-value="card_radius"><?php echo (int)($theme['card_radius'] ?? 22); ?>px</output>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-spb-set-range="card_radius" data-spb-range-value="0">角丸なし</button>
              </div>
            </div>
            <div>
              <label class="form-label" for="glow">影と発光</label>
              <input class="form-range" type="range" id="glow" name="glow" min="0" max="90" value="<?php echo (int)($theme['glow'] ?? 52); ?>">
            </div>
            <div>
              <label class="form-label" for="gloss">つや感</label>
              <select class="form-select" id="gloss" name="gloss">
                <option value="1" <?php echo ((int)($theme['gloss'] ?? 1) === 1) ? 'selected' : ''; ?>>有効</option>
                <option value="0" <?php echo ((int)($theme['gloss'] ?? 1) !== 1) ? 'selected' : ''; ?>>無効</option>
              </select>
            </div>
            <div>
              <label class="form-label" for="button_style">ボタン塗り</label>
              <select class="form-select" id="button_style" name="button_style">
                <option value="solid" <?php echo (($theme['button_style'] ?? 'solid') === 'solid') ? 'selected' : ''; ?>>単色</option>
                <option value="gradient" <?php echo (($theme['button_style'] ?? 'solid') === 'gradient') ? 'selected' : ''; ?>>グラデーション</option>
              </select>
            </div>
            <div><label class="form-label" for="button_custom_enabled">ボタン個別配色</label><select class="form-select" id="button_custom_enabled" name="button_custom_enabled"><option value="0"<?php echo empty($theme['button_custom_enabled']) && empty($theme['button_color']) ? ' selected' : ''; ?>>プリセットを使用</option><option value="1"<?php echo !empty($theme['button_custom_enabled']) || (!array_key_exists('button_custom_enabled', $theme) && !empty($theme['button_color'])) ? ' selected' : ''; ?>>下記の色を使用</option></select></div>
            <div>
              <label class="form-label" for="button_color">ボタン色</label>
              <input class="form-control form-control-color" type="color" id="button_color" name="button_color" value="<?php echo spb_v(($theme['button_color'] ?? '') ?: $theme_vars['button_color']); ?>">
            </div>
            <div>
              <label class="form-label" for="button_color2">ボタン色2</label>
              <input class="form-control form-control-color" type="color" id="button_color2" name="button_color2" value="<?php echo spb_v(($theme['button_color2'] ?? '') ?: $theme_vars['button_color2']); ?>">
              <div class="spb-help">グラデーション時に使います。</div>
            </div>
            <div>
              <label class="form-label" for="button_text_color">ボタン文字色</label>
              <input class="form-control form-control-color" type="color" id="button_text_color" name="button_text_color" value="<?php echo spb_v(($theme['button_text_color'] ?? '') ?: $theme_vars['button_text_color']); ?>">
            </div>
            <div>
              <label class="form-label" for="image_fit">カード画像の表示</label>
              <select class="form-select" id="image_fit" name="image_fit">
                <option value="cover" <?php echo (($theme['image_fit'] ?? 'cover') === 'cover') ? 'selected' : ''; ?>>枠いっぱいに表示</option>
                <option value="contain" <?php echo (($theme['image_fit'] ?? 'cover') === 'contain') ? 'selected' : ''; ?>>全体が見えるように表示</option>
              </select>
            </div>
            <div>
              <label class="form-label" for="card_image_ratio">カード画像比率</label>
              <select class="form-select" id="card_image_ratio" name="card_image_ratio">
                <option value="16 / 9" <?php echo (($theme['card_image_ratio'] ?? '16 / 9') === '16 / 9') ? 'selected' : ''; ?>>16:9</option>
                <option value="4 / 3" <?php echo (($theme['card_image_ratio'] ?? '16 / 9') === '4 / 3') ? 'selected' : ''; ?>>4:3</option>
                <option value="1 / 1" <?php echo (($theme['card_image_ratio'] ?? '16 / 9') === '1 / 1') ? 'selected' : ''; ?>>1:1</option>
              </select>
            </div>
            <div>
              <label class="form-label" for="card_height">カード高さ</label>
              <div class="spb-range-control">
                <input class="form-range" type="range" id="card_height" name="card_height" min="120" max="720" value="<?php echo (int)($theme['card_height'] ?? $theme['card_min_height'] ?? 260); ?>" data-spb-range-output="card_height_value">
                <output id="card_height_value" for="card_height" data-spb-range-value="card_height"><?php echo (int)($theme['card_height'] ?? $theme['card_min_height'] ?? 260); ?>px</output>
              </div>
            </div>
            <div>
              <label class="form-label" for="motion_effect">演出テンプレート</label>
              <select class="form-select" id="motion_effect" name="motion_effect">
                <option value="none" <?php echo (($theme['motion_effect'] ?? 'none') === 'none') ? 'selected' : ''; ?>>なし</option>
                <option value="music_notes" <?php echo (($theme['motion_effect'] ?? 'none') === 'music_notes') ? 'selected' : ''; ?>>音符がゆれる</option>
                <option value="light_lines" <?php echo (($theme['motion_effect'] ?? 'none') === 'light_lines') ? 'selected' : ''; ?>>光のライン</option>
                <option value="diamonds" <?php echo (($theme['motion_effect'] ?? 'none') === 'diamonds') ? 'selected' : ''; ?>>ひし形アクセント</option>
              </select>
            </div>
          </div>
          <div class="spb-motion-editor mt-4">
            <div class="d-flex justify-content-between align-items-center gap-3 mb-2">
              <div>
                <h2 class="h5 mb-1">素材ライブラリへ追加</h2>
                <div class="spb-help">追加した画像・動画・フォントは用途別のassetsフォルダへ保存され、各入力欄の候補に表示されます。</div>
              </div>
            </div>
            <div class="spb-grid">
              <div>
                <label class="form-label" for="asset_kind">用途</label>
                <select class="form-select" id="asset_kind" name="asset_kind">
                  <option value="cover">楽曲ジャケット</option>
                  <option value="artist">歌手アイコン</option>
                  <option value="motion">演出画像</option>
                  <option value="bg">背景画像</option>
                  <option value="video">背景・ショート動画</option>
                  <option value="logo">ロゴ画像</option>
                  <option value="font">ローカルフォント</option>
                </select>
              </div>
              <div>
                <label class="form-label" for="asset_file">素材ファイル</label>
                <div class="input-group">
                  <input class="form-control" type="file" id="asset_file" name="asset_file" accept="image/jpeg,image/png,image/gif,image/webp,video/mp4,video/webm,.woff2,.woff,.ttf,.otf">
                  <button class="btn btn-outline-primary" type="submit" name="action" value="upload_asset">追加</button>
                </div>
              </div>
            </div>
          </div>
          <div class="spb-motion-editor mt-4">
            <div class="d-flex justify-content-between align-items-center gap-3 mb-2">
              <div>
                <h2 class="h5 mb-1">画像演出レイヤー</h2>
                <div class="spb-help">任意の画像を複製して配置します。最大3層・合計60個。スマホでは先頭2層・各12個に縮退します。</div>
              </div>
              <button type="button" class="btn btn-outline-primary btn-sm flex-shrink-0" data-spb-add="#motionLayerRows" data-spb-max-rows="3">レイヤー追加</button>
            </div>
            <div class="spb-repeat" id="motionLayerRows">
              <?php foreach ($motion_layer_rows as $idx => $layer): ?>
              <div class="spb-repeat-row spb-motion-row">
                <div class="spb-row-head">
                  <strong><span class="spb-drag-handle" title="ドラッグで並び替え">☰</span> 演出レイヤー <span data-row-label><?php echo $idx + 1; ?></span></strong>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-spb-remove>削除</button>
                </div>
                <input type="hidden" name="motion_layer_id[]" value="<?php echo spb_v($layer['id'] ?? ''); ?>">
                <input type="hidden" name="motion_layer_seed[]" value="<?php echo spb_v($layer['seed'] ?? ''); ?>">
                <div class="spb-grid spb-motion-grid">
                  <div>
                    <label class="form-label">表示</label>
                    <select class="form-select" name="motion_layer_enabled[]" data-default-value="1">
                      <option value="1"<?php echo !empty($layer['enabled']) ? ' selected' : ''; ?>>有効</option>
                      <option value="0"<?php echo empty($layer['enabled']) ? ' selected' : ''; ?>>無効</option>
                    </select>
                  </div>
                  <div class="spb-motion-image-field">
                    <label class="form-label">画像パスまたはURL</label>
                    <input class="form-control" type="text" name="motion_layer_image[]" list="spbMotionAssets" value="<?php echo spb_v($layer['image'] ?? ''); ?>" placeholder="assets/motion/flower.webp">
                  </div>
                  <div>
                    <label class="form-label">動き</label>
                    <select class="form-select" name="motion_layer_template[]" data-default-value="sway">
                      <?php foreach (special_page_motion_templates() as $template => $label): ?>
                      <option value="<?php echo spb_v($template); ?>"<?php echo (($layer['template'] ?? 'sway') === $template) ? ' selected' : ''; ?>><?php echo spb_v($label); ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div>
                    <label class="form-label">配置階層</label>
                    <select class="form-select" name="motion_layer_position[]" data-default-value="front">
                      <option value="behind"<?php echo (($layer['position'] ?? 'front') === 'behind') ? ' selected' : ''; ?>>コンテンツ背面</option>
                      <option value="front"<?php echo (($layer['position'] ?? 'front') === 'front') ? ' selected' : ''; ?>>コンテンツ前面</option>
                    </select>
                  </div>
                  <?php
                    $motion_numbers = [
                      ['motion_layer_count[]', '複製数', 1, 30, 1, $layer['count'] ?? 12, 12],
                      ['motion_layer_size_min[]', '最小サイズ(px)', 8, 320, 1, $layer['size_min'] ?? 24, 24],
                      ['motion_layer_size_max[]', '最大サイズ(px)', 8, 320, 1, $layer['size_max'] ?? 72, 72],
                      ['motion_layer_opacity[]', '透明度(%)', 0, 100, 1, $layer['opacity'] ?? 55, 55],
                      ['motion_layer_area_x_min[]', '横位置 最小(%)', 0, 100, 1, $layer['area_x_min'] ?? 0, 0],
                      ['motion_layer_area_x_max[]', '横位置 最大(%)', 0, 100, 1, $layer['area_x_max'] ?? 100, 100],
                      ['motion_layer_area_y_min[]', '縦位置 最小(%)', 0, 100, 1, $layer['area_y_min'] ?? 0, 0],
                      ['motion_layer_area_y_max[]', '縦位置 最大(%)', 0, 100, 1, $layer['area_y_max'] ?? 100, 100],
                      ['motion_layer_duration_min[]', '最短周期(秒)', 1, 120, .1, $layer['duration_min'] ?? 7, 7],
                      ['motion_layer_duration_max[]', '最長周期(秒)', 1, 120, .1, $layer['duration_max'] ?? 13, 13],
                      ['motion_layer_drift_x[]', '横移動量(px)', -1000, 1000, 1, $layer['drift_x'] ?? 18, 18],
                      ['motion_layer_drift_y[]', '縦移動量(px)', -1000, 1000, 1, $layer['drift_y'] ?? -24, -24],
                      ['motion_layer_rotation[]', '回転量(度)', 0, 1080, 1, $layer['rotation'] ?? 12, 12],
                    ];
                    foreach ($motion_numbers as $number):
                  ?>
                  <div>
                    <label class="form-label"><?php echo spb_v($number[1]); ?></label>
                    <input class="form-control" type="number" name="<?php echo spb_v($number[0]); ?>" min="<?php echo spb_v($number[2]); ?>" max="<?php echo spb_v($number[3]); ?>" step="<?php echo spb_v($number[4]); ?>" value="<?php echo spb_v($number[5]); ?>" data-default-value="<?php echo spb_v($number[6]); ?>">
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </section>

      <section class="tab-pane fade" id="layout-pane" role="tabpanel" aria-labelledby="layout-tab">
        <div class="spb-card">
          <?php spb_render_validation($validation, 'layout-validation-heading'); ?>
          <fieldset class="spb-layout-fieldset">
            <legend>全体レイアウト</legend>
            <div class="spb-layout-options">
              <?php foreach (special_page_layout_presets() as $layout_key => $layout_preset): ?>
              <label class="spb-layout-option">
                <input class="spb-layout-radio" type="radio" name="page_layout" value="<?php echo spb_v($layout_key); ?>"<?php echo (($theme['page_layout'] ?? 'catalog') === $layout_key) ? ' checked' : ''; ?>>
                <span class="spb-layout-content">
                  <span class="spb-layout-thumb spb-layout-thumb-<?php echo spb_v($layout_key); ?>" aria-hidden="true"><span></span><span></span><span></span></span>
                  <span class="spb-layout-copy">
                    <strong><?php echo spb_v($layout_preset['label']); ?></strong>
                    <span><?php echo spb_v($layout_preset['description']); ?></span>
                    <small>おすすめ: <?php echo spb_v($layout_best_for[$layout_key] ?? '用途に合わせた構成に'); ?></small>
                  </span>
                  <span class="spb-layout-selected" aria-hidden="true">選択中</span>
                </span>
              </label>
              <?php endforeach; ?>
            </div>
          </fieldset>
          <div class="spb-layout-settings">
            <div>
              <label class="form-label" for="pickup_layout">PICKUP表示形式</label>
              <select class="form-select" id="pickup_layout" name="pickup_layout">
                <option value="grid" <?php echo (($theme['pickup_layout'] ?? 'grid') === 'grid') ? 'selected' : ''; ?>>カードグリッド</option>
                <option value="rail" <?php echo (($theme['pickup_layout'] ?? 'grid') === 'rail') ? 'selected' : ''; ?>>横スクロール</option>
                <option value="compact" <?php echo (($theme['pickup_layout'] ?? 'grid') === 'compact') ? 'selected' : ''; ?>>コンパクト</option>
              </select>
            </div>
            <div class="spb-layout-range-grid">
              <?php foreach ([
                ['card_gap', 'カード間隔', 0, 48, 14],
                ['section_gap', 'セクション間隔', 0, 160, 14],
                ['hero_height', 'ヒーロー高さ', 280, 960, 520],
              ] as $range): ?>
              <?php $range_value = (int)($theme[$range[0]] ?? $range[4]); ?>
              <div>
                <label class="form-label" for="<?php echo spb_v($range[0]); ?>"><?php echo spb_v($range[1]); ?></label>
                <div class="spb-range-control">
                  <input class="form-range" type="range" id="<?php echo spb_v($range[0]); ?>" name="<?php echo spb_v($range[0]); ?>" min="<?php echo spb_v($range[2]); ?>" max="<?php echo spb_v($range[3]); ?>" value="<?php echo $range_value; ?>" data-spb-range-output="<?php echo spb_v($range[0]); ?>_value">
                  <output id="<?php echo spb_v($range[0]); ?>_value" for="<?php echo spb_v($range[0]); ?>" data-spb-range-value="<?php echo spb_v($range[0]); ?>"><?php echo $range_value; ?>px</output>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="mt-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <div>
                <h2 class="h5 mb-1">セクション構成</h2>
                <div class="spb-help">ドラッグで公開ページの表示順を変更します。</div>
              </div>
            </div>
            <div class="spb-repeat" id="sectionRows">
              <?php foreach ($sections as $idx => $section): ?>
              <div class="spb-repeat-row">
                <div class="spb-row-head"><strong><span class="spb-drag-handle" title="ドラッグで並び替え">☰</span> セクション <span data-row-label><?php echo $idx + 1; ?></span></strong></div>
                <input type="hidden" name="section_id[]" value="<?php echo spb_v($section['id'] ?? ''); ?>">
                <div class="spb-grid">
                  <div>
                    <label class="form-label">種類</label>
                    <select class="form-select" name="section_type[]">
                      <?php foreach (['pickup' => 'PICKUP', 'artists' => 'ARTIST', 'songs' => 'SONGS', 'credit' => 'CREDIT'] as $type => $label): ?>
                      <option value="<?php echo spb_v($type); ?>"<?php echo (($section['type'] ?? '') === $type) ? ' selected' : ''; ?>><?php echo spb_v($label); ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div>
                    <label class="form-label">表示</label>
                    <select class="form-select" name="section_enabled[]">
                      <option value="1"<?php echo !empty($section['enabled']) ? ' selected' : ''; ?>>表示する</option>
                      <option value="0"<?php echo empty($section['enabled']) ? ' selected' : ''; ?>>表示しない</option>
                    </select>
                  </div>
                  <div>
                    <label class="form-label">ナビ表示名</label>
                    <input class="form-control" type="text" name="section_nav_label[]" value="<?php echo spb_v($section['nav_label'] ?? ''); ?>">
                  </div>
                  <div>
                    <label class="form-label">見出し</label>
                    <input class="form-control" type="text" name="section_heading[]" value="<?php echo spb_v($section['heading'] ?? ''); ?>">
                  </div>
                  <div>
                    <label class="form-label">表示形式</label>
                    <select class="form-select" name="section_variant[]">
                      <?php foreach (['rail', 'mosaic', 'feature_stack', 'portrait_grid', 'split_profiles', 'avatar_index', 'search_table', 'tracklist', 'grouped_directory', 'compact'] as $variant): ?>
                      <option value="<?php echo spb_v($variant); ?>"<?php echo (($section['variant'] ?? '') === $variant) ? ' selected' : ''; ?>><?php echo spb_v($variant); ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </section>

      <section class="tab-pane fade" id="songs-pane" role="tabpanel" aria-labelledby="songs-tab">
        <div class="spb-card">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
              <h2 class="h5 mb-1">楽曲</h2>
              <div class="spb-help">PICKUP、ヒーロー、SONGS一覧に使われます。</div>
            </div>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-spb-add="#songRows">行を追加</button>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-spb-import="songs">CSV取込</button>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-spb-export-template="songs">様式CSV</button>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-spb-export-current="songs">現在値CSV</button>
            <input type="file" class="d-none" id="songCsvImport" accept=".csv,text/csv" data-spb-import-file="songs">
          </div>
          <div class="spb-help mb-2">CSVのcover列は、assets/cover内にある画像ならファイル名だけでも指定できます。</div>
          <div class="spb-repeat" id="songRows">
            <?php foreach ($songs as $idx => $song): ?>
            <div class="spb-repeat-row">
              <div class="spb-row-head">
                <strong><span class="spb-drag-handle" title="ドラッグで並び替え">☰</span> 楽曲 <span data-row-label><?php echo $idx + 1; ?></span></strong>
                <button type="button" class="btn btn-outline-danger btn-sm" data-spb-remove>削除</button>
              </div>
              <div class="spb-grid">
                <div>
                  <label class="form-label">楽曲ID</label>
                  <input class="form-control" type="text" name="song_id[]" value="<?php echo spb_v($song['id'] ?? ''); ?>" pattern="[a-z][a-z0-9_-]{2,63}">
                </div>
                <div>
                  <label class="form-label">PICKUP表示</label>
                  <select class="form-select" name="song_pickup[]">
                    <option value="1" <?php echo !empty($song['pickup']) ? 'selected' : ''; ?>>表示する</option>
                    <option value="0" <?php echo empty($song['pickup']) ? 'selected' : ''; ?>>表示しない</option>
                  </select>
                </div>
                <div>
                  <label class="form-label">曲名</label>
                  <input class="form-control" type="text" name="song_title[]" value="<?php echo spb_v($song['title'] ?? ''); ?>">
                </div>
                <div>
                  <label class="form-label">ふりがな / サブタイトル</label>
                  <input class="form-control" type="text" name="song_subtitle[]" value="<?php echo spb_v($song['subtitle'] ?? ''); ?>">
                </div>
                <div>
                  <label class="form-label">歌手（声優名を含む）</label>
                  <input class="form-control" type="text" name="song_artist[]" value="<?php echo spb_v($song['artist'] ?? ''); ?>" placeholder="月見ヤチヨ(早見沙織)">
                </div>
                <div>
                  <label class="form-label">関連歌手ID</label>
                  <input class="form-control" type="text" name="song_artist_ids[]" value="<?php echo spb_v(implode(', ', (array)($song['artist_ids'] ?? []))); ?>" placeholder="artist_example">
                  <div class="spb-help">複数の場合はカンマ区切り。歌手タブのIDを指定します。</div>
                </div>
                <div>
                  <label class="form-label">歌手の関連方式</label>
                  <select class="form-select" name="song_artist_relation_mode[]" data-default-value="legacy_inference">
                    <option value="explicit"<?php echo (($song['artist_relation_mode'] ?? (array_key_exists('artist_ids', $song) ? 'explicit' : 'legacy_inference')) === 'explicit') ? ' selected' : ''; ?>>関連歌手IDを使用</option>
                    <option value="legacy_inference"<?php echo (($song['artist_relation_mode'] ?? (array_key_exists('artist_ids', $song) ? 'explicit' : 'legacy_inference')) === 'legacy_inference') ? ' selected' : ''; ?>>歌手名から完全一致で推定</option>
                  </select>
                </div>
                <div>
                  <label class="form-label">種別</label>
                  <select class="form-select" name="song_type[]">
                    <?php foreach (['solo', 'duet', 'unit', 'group', 'cv'] as $type): ?>
                    <option value="<?php echo spb_v($type); ?>"<?php echo (($song['type'] ?? '') === $type) ? ' selected' : ''; ?>><?php echo spb_v(strtoupper($type)); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div>
                  <label class="form-label">タグ</label>
                  <input class="form-control" type="text" name="song_tags[]" value="<?php echo spb_v($song['tags'] ?? ''); ?>" placeholder="solo, 和風, 夜">
                </div>
                <div>
                  <label class="form-label">時間</label>
                  <input class="form-control" type="text" name="song_duration[]" value="<?php echo spb_v($song['duration'] ?? ''); ?>" placeholder="4:38">
                </div>
                <div>
                  <label class="form-label">ジャケット画像</label>
                  <input class="form-control" type="text" name="song_cover[]" list="spbCoverAssets" value="<?php echo spb_v($song['cover'] ?? ''); ?>">
                </div>
                <div>
                  <label class="form-label">検索リンク</label>
                  <input class="form-control" type="text" name="song_play_url[]" value="<?php echo spb_v($song['play_url'] ?? ''); ?>">
                  <div class="spb-help">空欄の場合は曲名と歌手名でゆかりすたー検索します。</div>
                </div>
                <div>
                  <label class="form-label">LYRICSリンク</label>
                  <input class="form-control" type="text" name="song_lyrics_url[]" value="<?php echo spb_v($song['lyrics_url'] ?? ''); ?>">
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section class="tab-pane fade" id="artists-pane" role="tabpanel" aria-labelledby="artists-tab">
        <div class="spb-card">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
              <h2 class="h5 mb-1">歌手 / ユニット</h2>
              <div class="spb-help">歌手名が楽曲の歌手欄に含まれる曲を、カード内の曲リストへ表示します。</div>
            </div>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-spb-add="#artistRows">行を追加</button>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-spb-import="artists">CSV取込</button>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-spb-export-template="artists">様式CSV</button>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-spb-export-current="artists">現在値CSV</button>
            <input type="file" class="d-none" id="artistCsvImport" accept=".csv,text/csv" data-spb-import-file="artists">
          </div>
          <div class="spb-help mb-2">CSVのicon列は、assets/artist内にある画像ならファイル名だけでも指定できます。</div>
          <div class="spb-repeat" id="artistRows">
            <?php foreach ($artists as $idx => $artist): ?>
            <div class="spb-repeat-row">
              <div class="spb-row-head">
                <strong><span class="spb-drag-handle" title="ドラッグで並び替え">☰</span> 歌手 <span data-row-label><?php echo $idx + 1; ?></span></strong>
                <button type="button" class="btn btn-outline-danger btn-sm" data-spb-remove>削除</button>
              </div>
              <div class="spb-grid">
                <div>
                  <label class="form-label">歌手ID</label>
                  <input class="form-control" type="text" name="artist_id[]" value="<?php echo spb_v($artist['id'] ?? ''); ?>" pattern="[a-z][a-z0-9_-]{2,63}">
                </div>
                <div>
                  <label class="form-label">歌手名（声優名を含む）</label>
                  <input class="form-control" type="text" name="artist_name[]" value="<?php echo spb_v($artist['name'] ?? ''); ?>" placeholder="月見ヤチヨ(早見沙織)">
                </div>
                <div>
                  <label class="form-label">ふりがな</label>
                  <input class="form-control" type="text" name="artist_kana[]" value="<?php echo spb_v($artist['kana'] ?? ''); ?>">
                </div>
                <div>
                  <label class="form-label">アイコン画像</label>
                  <input class="form-control" type="text" name="artist_icon[]" list="spbArtistAssets" value="<?php echo spb_v($artist['icon'] ?? ''); ?>">
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section class="tab-pane fade" id="preview-pane" role="tabpanel" aria-labelledby="preview-tab">
        <div class="spb-card">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
            <div>
              <h2 class="h5 mb-1">プレビュー</h2>
              <div class="spb-help">保存済み内容をプレビューします。編集中の内容は保存後に反映されます。</div>
            </div>
            <a class="btn btn-outline-primary btn-sm" href="special_page_preview.php?slug=<?php echo rawurlencode($manifest['slug']); ?>&preview_motion=1" target="_blank" rel="noopener">別画面で確認</a>
          </div>
          <?php spb_render_validation($validation, 'preview-validation-heading'); ?>
          <div class="spb-preview-toolbar">
            <div class="spb-viewport-controls" role="group" aria-label="プレビューサイズ">
              <button type="button" class="spb-viewport-button is-active" data-spb-viewport-button="desktop" aria-pressed="true" tabindex="0">デスクトップ 1280px</button>
              <button type="button" class="spb-viewport-button" data-spb-viewport-button="mobile" aria-pressed="false" tabindex="-1">モバイル 390px</button>
            </div>
          </div>
          <div class="spb-preview-stage" data-spb-preview-stage data-viewport="desktop">
            <iframe class="spb-preview-frame" data-spb-preview-iframe src="special_page_preview.php?slug=<?php echo rawurlencode($manifest['slug']); ?>&preview_motion=1" title="特設ページプレビュー"></iframe>
          </div>
        </div>
      </section>
    </div>
    <?php foreach ([
      'spbBgAssets' => $bg_asset_choices,
      'spbVideoAssets' => $video_asset_choices,
      'spbCoverAssets' => $cover_asset_choices,
      'spbArtistAssets' => $artist_asset_choices,
      'spbMotionAssets' => $motion_asset_choices,
      'spbLogoAssets' => $logo_asset_choices,
      'spbFontAssets' => $font_asset_choices,
    ] as $list_id => $asset_choices): ?>
    <datalist id="<?php echo spb_v($list_id); ?>">
      <?php foreach ($asset_choices as $asset_choice): ?><option value="<?php echo spb_v($asset_choice); ?>"></option><?php endforeach; ?>
    </datalist>
    <?php endforeach; ?>
  </form>
</div>

<script src="js/Sortable.min.js"></script>
<script src="js/special_page_builder.js"></script>
<?php print_bg_style_block(true); ?>
</body>
</html>
