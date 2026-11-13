<?php

define('SPECIAL_PAGE_ROOT', __DIR__ . DIRECTORY_SEPARATOR . 'special_pages');
require_once __DIR__ . '/special_page_schema.php';

function special_page_presets()
{
    return [
        'moonlight_blue' => [
            'name' => '月光ブルー',
            'bg' => '#071129',
            'panel' => '16, 24, 52',
            'accent' => '#8fd3ff',
            'accent2' => '#d9ecff',
            'gold' => '#f4d58a',
        ],
        'sakura_neon' => [
            'name' => '桜ネオン',
            'bg' => '#17091d',
            'panel' => '43, 16, 45',
            'accent' => '#ff75b7',
            'accent2' => '#b77dff',
            'gold' => '#ffd6ec',
        ],
        'kaguya_gold' => [
            'name' => 'かぐやゴールド',
            'bg' => '#140f19',
            'panel' => '37, 27, 43',
            'accent' => '#f5d06f',
            'accent2' => '#ff9ecb',
            'gold' => '#ffe6a3',
        ],
        'cyber_lime' => [
            'name' => 'サイバーライム',
            'bg' => '#041515',
            'panel' => '8, 36, 39',
            'accent' => '#78ffe0',
            'accent2' => '#d6ff5f',
            'gold' => '#c8fff1',
        ],
        'crimson_stage' => [
            'name' => '紅ステージ',
            'bg' => '#19070b',
            'panel' => '43, 12, 20',
            'accent' => '#ff5f7d',
            'accent2' => '#ffb86b',
            'gold' => '#ffd0aa',
        ],
        'snow_prism' => [
            'name' => '雪プリズム',
            'bg' => '#081420',
            'panel' => '20, 37, 54',
            'accent' => '#b8f3ff',
            'accent2' => '#ffffff',
            'gold' => '#d9f8ff',
        ],
        'twilight_orange' => [
            'name' => '夕景オレンジ',
            'bg' => '#1d0f0a',
            'panel' => '48, 26, 18',
            'accent' => '#ff9b54',
            'accent2' => '#ff6f9d',
            'gold' => '#ffd39c',
        ],
        'violet_magic' => [
            'name' => '紫魔法',
            'bg' => '#12091f',
            'panel' => '31, 19, 55',
            'accent' => '#bd8cff',
            'accent2' => '#f3b5ff',
            'gold' => '#e8d7ff',
        ],
        'mono_luxury' => [
            'name' => 'モノクロ高級感',
            'bg' => '#08090d',
            'panel' => '22, 23, 28',
            'accent' => '#f7f3e7',
            'accent2' => '#aeb6c7',
            'gold' => '#d8bc7b',
        ],
        'idol_pop' => [
            'name' => 'アイドルポップ',
            'bg' => '#161026',
            'panel' => '38, 28, 58',
            'accent' => '#ff7acc',
            'accent2' => '#7ce7ff',
            'gold' => '#fff08a',
        ],
        'aqua_editorial' => [
            'name' => '水鏡エディトリアル',
            'bg' => '#071b24',
            'panel' => '13, 43, 54',
            'accent' => '#7de1dc',
            'accent2' => '#b8d8ff',
            'gold' => '#f1e5a8',
        ],
        'forest_glass' => [
            'name' => '深森ガラス',
            'bg' => '#091813',
            'panel' => '19, 44, 34',
            'accent' => '#7bd6a8',
            'accent2' => '#d4e89a',
            'gold' => '#ead5a0',
        ],
        'film_noir_red' => [
            'name' => 'フィルムノワール',
            'bg' => '#0e0e11',
            'panel' => '28, 27, 31',
            'accent' => '#e25a5a',
            'accent2' => '#e8e0d5',
            'gold' => '#c8a66a',
        ],
        'sunrise_coral' => [
            'name' => '朝焼けコーラル',
            'bg' => '#241315',
            'panel' => '60, 32, 34',
            'accent' => '#ff8c7a',
            'accent2' => '#ffd28e',
            'gold' => '#fff0c4',
        ],
        'jade_cinema' => [
            'name' => '翡翠シネマ',
            'bg' => '#071918',
            'panel' => '12, 48, 45',
            'accent' => '#42d3bd',
            'accent2' => '#d7b86a',
            'gold' => '#f0d99b',
        ],
        'ice_lavender' => [
            'name' => '氷花ラベンダー',
            'bg' => '#121523',
            'panel' => '35, 39, 63',
            'accent' => '#a8c9ff',
            'accent2' => '#e4b8ef',
            'gold' => '#f7e8b0',
        ],
        'paper_blue' => [
            'name' => '白紙と青インク',
            'bg' => '#f3f6f8',
            'panel' => '255, 255, 255',
            'accent' => '#397aa8',
            'accent2' => '#75a8bd',
            'gold' => '#9a7438',
            'text' => '#182331',
            'muted' => '#596878',
            'surface' => 'light',
        ],
        'ivory_rose' => [
            'name' => '象牙とくすみ紅',
            'bg' => '#f7f2ed',
            'panel' => '255, 252, 248',
            'accent' => '#a94f62',
            'accent2' => '#6e8097',
            'gold' => '#9c7b3c',
            'text' => '#2b2225',
            'muted' => '#74666a',
            'surface' => 'light',
        ],
    ];
}

function special_page_layout_presets()
{
    return [
        'catalog' => [
            'label' => '標準カタログ',
            'description' => '検索と一覧を中心にした標準レイアウト',
        ],
        'visual_picker' => [
            'label' => 'レイアウト2 左縦PICKUP + 中央ビジュアル',
            'description' => '左縦PICKUPと中央ビジュアルのレイアウト',
        ],
        'spotlight_rail' => [
            'label' => 'スポットライトレール（連動ヒーロー）',
            'description' => 'PICKUP順のヒーロー、メタデータ、検索CTAを縦型サムネイルレールで構成',
        ],
        'cinematic_chapters' => [
            'label' => 'シネマティックチャプター',
            'description' => '楽曲を章として大きく見せ、作品を読み進める縦長ストーリーレイアウト',
        ],
        'poster_directory' => [
            'label' => 'ポスターディレクトリ',
            'description' => 'ジャケット索引、歌手、分類別トラックから素早く検索する情報密度重視レイアウト',
        ],
        'coverflow_shelf' => [
            'label' => 'カバーフローシェルフ',
            'description' => '大きなジャケットを横に送りながら、主役曲を直感的に選ぶレイアウト',
        ],
        'artist_atlas' => [
            'label' => 'アーティストアトラス',
            'description' => '歌手を入口に関連楽曲へたどる、人物中心のレイアウト',
        ],
        'setlist_timeline' => [
            'label' => 'セットリストタイムライン',
            'description' => '曲順を縦の流れとして見せる、イベントや公演向けレイアウト',
        ],
        'tag_atlas' => [
            'label' => 'タグアトラス',
            'description' => 'ジャンルやタグを手掛かりに曲を発見するカテゴリ中心レイアウト',
        ],
        'duet_matrix' => [
            'label' => 'ユニットマトリクス',
            'description' => '複数歌手の組み合わせと楽曲を見比べるユニット中心レイアウト',
        ],
        'media_prologue' => [
            'label' => 'メディアプロローグ',
            'description' => '大きな余白と映像ショーケースを軸に、検索導線を静かに見せる特設ページ向けレイアウト',
        ],
    ];
}

function special_page_validate($data)
{
    $errors = [];
    $warnings = [];
    $manifest = is_array($data['manifest'] ?? null) ? $data['manifest'] : [];
    $theme = is_array($data['theme'] ?? null) ? $data['theme'] : [];
    $content = is_array($data['content'] ?? null) ? $data['content'] : [];

    $issue = function ($code, $path, $message) {
        return [
            'code' => $code,
            'path' => $path,
            'message' => $message,
        ];
    };

    if (trim((string)($manifest['title'] ?? '')) === '') {
        $errors[] = $issue('title_blank', 'manifest.title', 'ページ名が空欄です。');
    }

    $slug = (string)($manifest['slug'] ?? '');
    if (!preg_match('/\A[a-z0-9](?:[a-z0-9_-]{0,78}[a-z0-9])?\z/', $slug)) {
        $errors[] = $issue('slug_invalid', 'manifest.slug', 'フォルダIDは1〜80文字の小文字英数字、_、-で指定し、先頭と末尾には_と-を使えません。');
    }

    $layout = (string)($theme['page_layout'] ?? '');
    if (!array_key_exists($layout, special_page_layout_presets())) {
        $errors[] = $issue('page_layout_invalid', 'theme.page_layout', '全体レイアウトが登録済みのレイアウトではありません。');
    }

    $motion_layers = $theme['motion_layers'] ?? [];
    if (!is_array($motion_layers)) {
        $errors[] = $issue('motion_layers_not_array', 'theme.motion_layers', '画像演出レイヤーは配列で指定してください。');
        $motion_layers = [];
    }
    if (count($motion_layers) > 3) {
        $errors[] = $issue('motion_layers_too_many', 'theme.motion_layers', '画像演出レイヤーは最大3層です。');
    }
    $motion_ids = [];
    $motion_total = 0;
    foreach ($motion_layers as $index => $layer) {
        if (!is_array($layer)) {
            $errors[] = $issue('motion_layer_invalid', 'theme.motion_layers[' . $index . ']', '画像演出レイヤーの形式が正しくありません。');
            continue;
        }
        $motion_id = special_page_motion_string($layer['id'] ?? '');
        if (!special_page_valid_entity_id($motion_id)) {
            $errors[] = $issue('motion_layer_id_invalid', 'theme.motion_layers[' . $index . '].id', '演出レイヤーIDの形式が正しくありません。');
        } elseif (isset($motion_ids[$motion_id])) {
            $errors[] = $issue('motion_layer_id_duplicate', 'theme.motion_layers[' . $index . '].id', '演出レイヤーID「' . $motion_id . '」が重複しています。');
        } else {
            $motion_ids[$motion_id] = true;
        }
        if (!special_page_motion_image_is_safe($layer['image'] ?? '')) {
            $errors[] = $issue('motion_layer_image_invalid', 'theme.motion_layers[' . $index . '].image', '演出画像のパスが正しくありません。');
        }
        $motion_template = special_page_motion_string($layer['template'] ?? '');
        if (!isset(special_page_motion_templates()[$motion_template])) {
            $errors[] = $issue('motion_layer_template_invalid', 'theme.motion_layers[' . $index . '].template', '未対応の演出テンプレートです。');
        }
        if (!empty($layer['enabled'])) $motion_total += (int)($layer['count'] ?? 0);
    }
    if ($motion_total > 60) {
        $errors[] = $issue('motion_copy_total_exceeded', 'theme.motion_layers', '有効な画像演出の複製数は合計60個までです。');
    }

    $songs_exists = array_key_exists('songs', $content);
    $songs = $songs_exists ? $content['songs'] : [];
    if ($songs_exists && !is_array($songs)) {
        $errors[] = $issue('songs_not_array', 'content.songs', '楽曲データは配列で指定してください。');
        $songs = [];
    }

    $song_ids = [];
    foreach ($songs as $index => $song) {
        if (!is_array($song)) {
            $errors[] = $issue('song_entry_invalid', 'content.songs[' . $index . ']', '楽曲データの各項目は配列で指定してください。');
            continue;
        }
        $song_path = 'content.songs[' . $index . ']';
        $song_id = trim((string)($song['id'] ?? ''));
        if ($song_id === '') {
            $errors[] = $issue('song_id_blank', $song_path . '.id', '楽曲IDが空欄です。');
        } elseif (isset($song_ids[$song_id])) {
            $errors[] = $issue('song_id_duplicate', $song_path . '.id', '楽曲ID「' . $song_id . '」が重複しています。');
        } else {
            $song_ids[$song_id] = true;
        }
        if (trim((string)($song['title'] ?? '')) === '') {
            $errors[] = $issue('song_title_blank', $song_path . '.title', '曲名が空欄です。');
        }
    }

    if (!$songs) {
        $warnings[] = $issue('songs_empty', 'content.songs', '楽曲が登録されていません。');
    } else {
        $has_pickup = false;
        foreach ($songs as $song) {
            if (is_array($song) && !empty($song['pickup'])) {
                $has_pickup = true;
                break;
            }
        }
        if (!$has_pickup) {
            $warnings[] = $issue('pickup_empty', 'content.songs', 'PICKUP指定がないため、先頭6曲がPICKUPとして表示されます。');
        }
    }

    $background_image = trim((string)($theme['background_image'] ?? ''));
    $background_video_enabled = !empty($theme['background_video_enabled']);
    $background_video = trim((string)($theme['background_video'] ?? ''));
    if ($background_image === '' && !($background_video_enabled && $background_video !== '')) {
        $warnings[] = $issue('background_missing', 'theme.background_image', '背景画像、または有効な背景動画が指定されていません。');
    }
    if ($background_video_enabled && $background_video === '') {
        $warnings[] = $issue('background_video_source_blank', 'theme.background_video', '背景動画が有効ですが、動画ソースが空欄です。');
    } elseif ($background_video_enabled && !special_page_is_video_asset($background_video)) {
        $warnings[] = $issue('background_video_is_image', 'theme.background_video', '背景動画パスが画像形式のため、背景画像として表示します。動画にはMP4またはWebMを指定してください。');
    }

    if ($songs) {
        $missing_cover_count = 0;
        $long_title_count = 0;
        foreach ($songs as $song) {
            if (!is_array($song)) continue;
            if (trim((string)($song['cover'] ?? '')) === '') $missing_cover_count++;
            $title = trim((string)($song['title'] ?? ''));
            $title_length = function_exists('mb_strlen') ? mb_strlen($title, 'UTF-8') : strlen($title);
            if ($title !== '' && $title_length > 36) $long_title_count++;
        }
        if ($missing_cover_count > 0) {
            $warnings[] = $issue('song_cover_missing', 'content.songs', 'ジャケット画像が未設定の楽曲が' . $missing_cover_count . '件あります。');
        }
        if ($long_title_count > 0) {
            $warnings[] = $issue('song_title_long', 'content.songs', '曲名が36文字を超える楽曲が' . $long_title_count . '件あります。');
        }
    }

    $mini_videos = $content['mini_videos'] ?? [];
    if (!is_array($mini_videos)) {
        $errors[] = $issue('mini_videos_not_array', 'content.mini_videos', 'ショート動画は配列で指定してください。');
    } elseif (count($mini_videos) > 8) {
        $errors[] = $issue('mini_videos_too_many', 'content.mini_videos', 'ショート動画は最大8本です。');
    } else {
        foreach ($mini_videos as $index => $video) {
            if (!is_array($video) || !special_page_is_video_asset($video['src'] ?? '')) {
                $errors[] = $issue('mini_video_invalid', 'content.mini_videos[' . $index . '].src', 'ショート動画にはMP4またはWebMを指定してください。');
            }
        }
    }

    $artists_exists = array_key_exists('artists', $content);
    $artists = $artists_exists ? $content['artists'] : [];
    if ($artists_exists && !is_array($artists)) {
        $errors[] = $issue('artists_not_array', 'content.artists', '歌手データは配列で指定してください。');
        $artists = [];
    }
    if (is_array($artists)) {
        $missing_artist_icon_count = 0;
        $valid_artist_ids = [];
        foreach ($artists as $index => $artist) {
            if (!is_array($artist)) {
                $errors[] = $issue('artist_entry_invalid', 'content.artists[' . $index . ']', '歌手データの各項目は配列で指定してください。');
                continue;
            }
            $artist_id = trim((string)($artist['id'] ?? ''));
            if (!special_page_valid_entity_id($artist_id)) {
                $errors[] = $issue('artist_id_invalid', 'content.artists[' . $index . '].id', '歌手IDの形式が正しくありません。');
            } elseif (isset($valid_artist_ids[$artist_id])) {
                $errors[] = $issue('artist_id_duplicate', 'content.artists[' . $index . '].id', '歌手ID「' . $artist_id . '」が重複しています。');
            } else {
                $valid_artist_ids[$artist_id] = true;
            }
            if (trim((string)($artist['icon'] ?? '')) === '') $missing_artist_icon_count++;
        }
        if ($missing_artist_icon_count > 0) {
            $warnings[] = $issue('artist_icon_missing', 'content.artists', '歌手アイコン画像が未設定の歌手が' . $missing_artist_icon_count . '件あります。');
        }
        foreach ($songs as $index => $song) {
            if (!is_array($song)) continue;
            foreach (special_page_normalize_id_list($song['artist_ids'] ?? []) as $artist_id) {
                if (!isset($valid_artist_ids[$artist_id])) {
                    $errors[] = $issue('song_artist_reference_invalid', 'content.songs[' . $index . '].artist_ids', '存在しない歌手ID「' . $artist_id . '」が指定されています。');
                }
            }
        }
    }

    $sections = $content['sections'] ?? [];
    if (!is_array($sections)) {
        $errors[] = $issue('sections_not_array', 'content.sections', 'セクション設定は配列で指定してください。');
    } else {
        $section_ids = [];
        $section_types = [];
        foreach ($sections as $index => $section) {
            if (!is_array($section)) {
                $errors[] = $issue('section_entry_invalid', 'content.sections[' . $index . ']', 'セクション設定の各項目は配列で指定してください。');
                continue;
            }
            $section_id = trim((string)($section['id'] ?? ''));
            if (!special_page_valid_entity_id($section_id)) {
                $errors[] = $issue('section_id_invalid', 'content.sections[' . $index . '].id', 'セクションIDの形式が正しくありません。');
            } elseif (isset($section_ids[$section_id])) {
                $errors[] = $issue('section_id_duplicate', 'content.sections[' . $index . '].id', 'セクションID「' . $section_id . '」が重複しています。');
            } else {
                $section_ids[$section_id] = true;
            }
            $section_type = trim((string)($section['type'] ?? ''));
            if (!in_array($section_type, ['pickup', 'artists', 'songs', 'credit'], true)) {
                $errors[] = $issue('section_type_invalid', 'content.sections[' . $index . '].type', '未対応のセクション種類が指定されています。');
            } elseif (isset($section_types[$section_type])) {
                $errors[] = $issue('section_type_duplicate', 'content.sections[' . $index . '].type', 'セクション種類「' . $section_type . '」が重複しています。');
            } else {
                $section_types[$section_type] = true;
            }
        }
    }

    if ($songs) {
        foreach ($songs as $index => $song) {
            if (!is_array($song)) continue;
            foreach (['play_url' => '検索リンク', 'lyrics_url' => 'LYRICSリンク'] as $url_key => $url_label) {
                $url = trim((string)($song[$url_key] ?? ''));
                if ($url === '' || !preg_match('/^[A-Za-z][A-Za-z0-9+.-]*:/', $url)) {
                    continue;
                }
                $parsed = parse_url($url);
                $parsed = is_array($parsed) ? $parsed : [];
                $scheme = strtolower((string)($parsed['scheme'] ?? ''));
                $valid_external = in_array($scheme, ['http', 'https'], true)
                    && filter_var($url, FILTER_VALIDATE_URL) !== false
                    && !empty($parsed['host']);
                if (!$valid_external) {
                    $warnings[] = $issue($url_key . '_invalid', 'content.songs[' . $index . '].' . $url_key, $url_label . 'は相対パス、または有効なhttp/https URLで指定してください。');
                }
            }
        }
    }

    return [
        'valid' => !$errors,
        'errors' => $errors,
        'warnings' => $warnings,
    ];
}

function special_page_default_data()
{
    return [
        'manifest' => [
            'schema_version' => 3,
            'slug' => 'tsukiyomi-no-ne',
            'title' => '月詠ノ音',
            'template' => 'moonlight_music_portal',
            'updated_at' => date('c'),
        ],
        'theme' => [
            'preset_stack' => ['moonlight_blue', 'sakura_neon', 'kaguya_gold'],
            'logo_text' => '月詠ノ音',
            'logo_subtitle' => 'TSUKIYOMI NO NE',
            'logo_image' => '',
            'logo_width' => 180,
            'logo_align' => 'start',
            'logo_display' => 'both',
            'logo_treatment' => 'transparent',
            'logo_max_height' => 150,
            'background_image' => 'story_img.webp',
            'background_video_enabled' => 0,
            'background_video' => '',
            'background_video_poster' => '',
            'overlay' => 74,
            'blur' => 10,
            'card_opacity' => 64,
            'card_radius' => 22,
            'glow' => 52,
            'gloss' => 1,
            'custom_colors_enabled' => 0,
            'surface_mode' => 'auto',
            'base_color' => '',
            'panel_color' => '',
            'text_color' => '',
            'muted_color' => '',
            'accent_color' => '',
            'accent2_color' => '',
            'highlight_color' => '',
            'font_body' => 'gothic',
            'font_heading' => 'serif',
            'font_nav' => 'gothic',
            'font_local_file' => '',
            'font_local_scope' => 'none',
            'summary_image' => '',
            'summary_blur' => 0,
            'summary_overlay' => 58,
            'summary_image_fit' => 'cover',
            'summary_image_position' => 'center',
            'summary_show_stats' => 1,
            'summary_style' => 'classic_panel',
            'summary_height' => 360,
            'summary_content_align' => 'start',
            'summary_frame' => 'line',
            'movie_style' => 'grid',
            'movie_position' => 'after_summary',
            'movie_align' => 'wide',
            'movie_height' => 420,
            'movie_autoplay' => 0,
            'movie_heading' => 'MOVIE',
            'movie_subtitle' => '映像',
            'movie_legacy_controls' => 0,
            'songs_mode' => 'expanded',
            'hover_overlay_color' => '#000000',
            'hover_overlay_opacity' => 0,
            'hover_overlay_blend' => 'normal',
            'hover_zoom' => 104,
            'reveal_effect' => 'none',
            'reveal_duration' => 620,
            'reveal_distance' => 28,
            'button_color' => '',
            'button_color2' => '',
            'button_text_color' => '',
            'button_custom_enabled' => 0,
            'button_style' => 'solid',
            'image_fit' => 'cover',
            'card_image_ratio' => '16 / 9',
            'card_min_height' => 260,
            'card_height' => 220,
            'card_gap' => 14,
            'section_gap' => 14,
            'hero_height' => 520,
            'pickup_layout' => 'grid',
            'page_layout' => 'catalog',
            'motion_effect' => 'none',
            'motion_layers' => [],
        ],
        'content' => [
            'nav' => ['TOP', 'PICKUP', 'ARTIST', 'SONGS', 'UNIT', 'CREDIT'],
            'songs' => [
                [
                    'id' => 'song_001',
                    'title' => '満月の約束',
                    'subtitle' => 'ツキミノヤクソク',
                    'artist' => '夜桜ノ詩',
                    'artist_ids' => ['artist_yosakura'],
                    'type' => 'solo',
                    'tags' => 'solo, ballad, 和風, 夜',
                    'duration' => '4:38',
                    'cover' => 'maxresdefault (2).jpeg',
                    'play_url' => '',
                    'lyrics_url' => '',
                    'pickup' => 1,
                ],
                [
                    'id' => 'song_002',
                    'title' => '幽灯ノ詠',
                    'subtitle' => 'ユウトウノウタ',
                    'artist' => '凛音ユズハ',
                    'artist_ids' => ['artist_rinne'],
                    'type' => 'solo',
                    'tags' => 'solo, アップテンポ',
                    'duration' => '4:12',
                    'cover' => 'maxresdefault (4).jpeg',
                    'play_url' => '',
                    'lyrics_url' => '',
                    'pickup' => 1,
                ],
                [
                    'id' => 'song_003',
                    'title' => '夢結びの糸',
                    'subtitle' => 'ユメムスビノイト',
                    'artist' => '逢坂慧那 & 白瀬灯',
                    'artist_ids' => ['artist_keina'],
                    'type' => 'duet',
                    'tags' => 'duet, ユニット',
                    'duration' => '4:55',
                    'cover' => 'maxresdefault (6).jpeg',
                    'play_url' => '',
                    'lyrics_url' => '',
                    'pickup' => 1,
                ],
            ],
            'artists' => [
                [
                    'id' => 'artist_yosakura',
                    'name' => '夜桜ノ詩',
                    'kana' => 'ヨザクラノウタ',
                    'icon' => 'maxresdefault (2).jpeg',
                ],
                [
                    'id' => 'artist_rinne',
                    'name' => '凛音ユズハ',
                    'kana' => 'リンネユズハ',
                    'icon' => 'maxresdefault (4).jpeg',
                ],
                [
                    'id' => 'artist_keina',
                    'name' => '逢坂慧那',
                    'kana' => 'オウサカケイナ',
                    'icon' => 'maxresdefault (6).jpeg',
                ],
            ],
            'sections' => special_page_schema_default_sections(),
            'mini_videos' => [],
            'credit' => '2026 TSUKIYOMI NO NE PROJECT',
        ],
    ];
}

function special_page_slug($slug)
{
    $slug = strtolower(trim((string)$slug));
    $slug = preg_replace('/[^a-z0-9_-]+/', '-', $slug);
    $slug = trim($slug, '-_');
    return $slug !== '' ? substr($slug, 0, 80) : 'special-page';
}

function special_page_dir($slug)
{
    return SPECIAL_PAGE_ROOT . DIRECTORY_SEPARATOR . special_page_slug($slug);
}

function special_page_public_path($slug)
{
    return 'special_pages/' . special_page_slug($slug) . '/index.html';
}

function special_page_json_read($file, $fallback)
{
    if (!is_file($file)) return $fallback;
    $json = @file_get_contents($file);
    $data = json_decode($json, true);
    return is_array($data) ? $data : $fallback;
}

function special_page_load($slug)
{
    $defaults = special_page_default_data();
    $slug = special_page_slug($slug ?: $defaults['manifest']['slug']);
    $dir = special_page_dir($slug);
    if (!is_dir($dir)) {
        $defaults['manifest']['slug'] = $slug;
        return special_page_migrate_project($defaults);
    }
    $stored_manifest = special_page_json_read($dir . '/manifest.json', []);
    $stored_schema_version = (int)($stored_manifest['schema_version'] ?? 1);
    $defaults['manifest'] = array_merge($defaults['manifest'], $stored_manifest);
    $stored_theme = special_page_json_read($dir . '/theme.json', []);
    if (!array_key_exists('card_height', $stored_theme) && array_key_exists('card_min_height', $stored_theme)) {
        $stored_theme['card_height'] = $stored_theme['card_min_height'];
    }
    if ($stored_schema_version < 3) {
        if (!array_key_exists('summary_height', $stored_theme)) $stored_theme['summary_height'] = 190;
        if (!array_key_exists('movie_style', $stored_theme)) $stored_theme['movie_style'] = 'grid';
        $stored_theme['movie_legacy_controls'] = 1;
    }
    $defaults['theme'] = array_merge($defaults['theme'], $stored_theme);
    $defaults['content'] = array_merge($defaults['content'], special_page_json_read($dir . '/content.json', []));
    $defaults['manifest']['slug'] = $slug;
    return special_page_migrate_project($defaults);
}

function special_page_write_json($file, $data)
{
    @file_put_contents($file, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
}

function special_page_ensure_dirs($slug)
{
    $dir = special_page_dir($slug);
    foreach ([$dir, $dir . '/assets', $dir . '/assets/bg', $dir . '/assets/video', $dir . '/assets/cover', $dir . '/assets/artist', $dir . '/assets/motion', $dir . '/assets/logo', $dir . '/assets/font', $dir . '/snapshots'] as $path) {
        if (!is_dir($path)) @mkdir($path, 0775, true);
    }
    return $dir;
}

function special_page_asset_choices($slug, $kind)
{
    if (!in_array($kind, ['bg', 'video', 'cover', 'artist', 'motion', 'logo', 'font'], true)) return [];
    $choices = [];
    $sources = [
        [special_page_dir($slug) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . $kind, 'assets/' . $kind . '/'],
        [__DIR__ . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . $kind, '/assets/' . $kind . '/'],
    ];
    if ($kind === 'video') {
        $sources[] = [special_page_dir($slug) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'bg', 'assets/bg/'];
        $sources[] = [__DIR__ . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'bg', '/assets/bg/'];
    }
    foreach ($sources as $source) {
        [$dir, $prefix] = $source;
        if (!is_dir($dir)) continue;
        foreach (scandir($dir) ?: [] as $file) {
            if ($file === '.' || $file === '..' || !is_file($dir . DIRECTORY_SEPARATOR . $file)) continue;
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $allowed = ($kind === 'video') ? ['mp4', 'webm'] : (($kind === 'font') ? ['woff2', 'woff', 'ttf', 'otf'] : ['jpg', 'jpeg', 'png', 'gif', 'webp']);
            if (!in_array($extension, $allowed, true)) continue;
            $choices[] = $prefix . $file;
        }
    }
    $choices = array_values(array_unique($choices));
    natcasesort($choices);
    return array_values($choices);
}

function special_page_asset_match_key($value)
{
    $filename = pathinfo(str_replace('\\', '/', (string)$value), PATHINFO_FILENAME);
    return strtolower((string)preg_replace('/[^a-z0-9]+/i', '', $filename));
}

function special_page_resolve_asset_reference($value, $slug, $kind)
{
    $value = is_scalar($value) || $value === null ? trim((string)$value) : '';
    if ($value === '' || !in_array($kind, ['bg', 'video', 'cover', 'artist', 'motion', 'logo', 'font'], true)) return $value;
    $normalized = str_replace('\\', '/', $value);
    if (preg_match('#(?:^|/)\.\.(?:/|$)#', $normalized)) return '';
    if (preg_match('#^[a-z][a-z0-9+.-]*:#i', $normalized) && !preg_match('#^https?://#i', $normalized)) return '';
    if ($kind === 'font' && preg_match('#^https?://#i', $normalized)) return '';
    if ($kind === 'font' && strpos($normalized, '/') !== false && !preg_match('#^https?://#i', $normalized)) {
        if (!preg_match('#^/?assets/font/[A-Za-z0-9._ -]+$#', $normalized)) return '';
    }
    if (strpos($normalized, '/') !== false || preg_match('#^https?://#i', $normalized)) return $normalized;
    $search_kinds = [$kind];
    if ($kind === 'artist') $search_kinds[] = 'cover';
    if ($kind === 'logo') $search_kinds[] = 'bg';
    $choices = [];
    foreach ($search_kinds as $search_kind) $choices = array_merge($choices, special_page_asset_choices($slug, $search_kind));
    foreach ($choices as $choice) {
        if (strcasecmp(basename($choice), $value) === 0) return $choice;
    }
    $match_key = special_page_asset_match_key($value);
    if ($match_key !== '') {
        foreach ($choices as $choice) {
            if (special_page_asset_match_key($choice) === $match_key) return $choice;
        }
    }
    return $kind === 'font' ? '' : $value;
}

function special_page_is_video_asset($value)
{
    $path = (string)(parse_url((string)$value, PHP_URL_PATH) ?: $value);
    return in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), ['mp4', 'webm'], true);
}

function special_page_store_asset_upload($slug, $kind, $file)
{
    if (!in_array($kind, ['bg', 'video', 'cover', 'artist', 'motion', 'logo', 'font'], true)) {
        return ['ok' => false, 'message' => '素材の保存先が正しくありません。', 'reference' => ''];
    }
    if (!is_array($file) || (int)($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        return ['ok' => false, 'message' => '画像ファイルを選択してください。', 'reference' => ''];
    }
    $size = (int)($file['size'] ?? 0);
    $tmp = (string)($file['tmp_name'] ?? '');
    $max_size = ($kind === 'video') ? 100 * 1024 * 1024 : (($kind === 'font') ? 10 * 1024 * 1024 : 5 * 1024 * 1024);
    if ($size < 1 || $size > $max_size || $tmp === '' || !is_uploaded_file($tmp)) {
        return ['ok' => false, 'message' => '素材のファイルサイズが上限を超えています。', 'reference' => ''];
    }
    $mime = '';
    if (function_exists('finfo_open')) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if ($finfo) {
            $mime = (string)finfo_file($finfo, $tmp);
            finfo_close($finfo);
        }
    }
    $extensions = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/gif' => 'gif',
        'image/webp' => 'webp',
        'video/mp4' => 'mp4',
        'video/webm' => 'webm',
        'font/woff2' => 'woff2',
        'font/woff' => 'woff',
        'application/font-woff' => 'woff',
        'font/ttf' => 'ttf',
        'application/x-font-ttf' => 'ttf',
        'font/otf' => 'otf',
        'application/x-font-opentype' => 'otf',
    ];
    $is_font = $kind === 'font';
    $is_video = $kind === 'video';
    if ($is_font) {
        $font_ext = strtolower(pathinfo((string)($file['name'] ?? ''), PATHINFO_EXTENSION));
        $magic = (string)@file_get_contents($tmp, false, null, 0, 4);
        $font_magic_ok = ($font_ext === 'woff2' && $magic === 'wOF2')
            || ($font_ext === 'woff' && $magic === 'wOFF')
            || ($font_ext === 'otf' && $magic === 'OTTO')
            || ($font_ext === 'ttf' && ($magic === "\x00\x01\x00\x00" || $magic === 'true'));
        if (!$font_magic_ok) return ['ok' => false, 'message' => 'WOFF2、WOFF、TTF、OTFフォントを選択してください。', 'reference' => ''];
        $extensions[$mime] = $font_ext;
    } elseif ($is_video) {
        $video_ext = strtolower(pathinfo((string)($file['name'] ?? ''), PATHINFO_EXTENSION));
        if (!in_array($video_ext, ['mp4', 'webm'], true) || !isset($extensions[$mime]) || $extensions[$mime] !== $video_ext) {
            return ['ok' => false, 'message' => 'MP4またはWebM動画を選択してください。', 'reference' => ''];
        }
    } elseif (!isset($extensions[$mime]) || @getimagesize($tmp) === false) {
        return ['ok' => false, 'message' => 'JPEG、PNG、GIF、WebP画像を選択してください。', 'reference' => ''];
    }
    $dir = special_page_ensure_dirs($slug) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . $kind;
    $hash = substr(hash_file('sha256', $tmp), 0, 12);
    $filename = date('Ymd_His') . '_' . $hash . '.' . $extensions[$mime];
    $target = $dir . DIRECTORY_SEPARATOR . $filename;
    if (is_file($target)) {
        return ['ok' => true, 'message' => '同じ素材はすでに追加されています。', 'reference' => 'assets/' . $kind . '/' . $filename];
    }
    if (!move_uploaded_file($tmp, $target)) {
        return ['ok' => false, 'message' => '画像をassetsフォルダへ保存できませんでした。', 'reference' => ''];
    }
    return ['ok' => true, 'message' => '素材を追加しました。', 'reference' => 'assets/' . $kind . '/' . $filename];
}

function special_page_snapshot($slug)
{
    $dir = special_page_dir($slug);
    if (!is_dir($dir)) return;
    $snap = $dir . '/snapshots/' . date('Ymd_His');
    @mkdir($snap, 0775, true);
    foreach (['manifest.json', 'theme.json', 'content.json', 'index.html'] as $file) {
        if (is_file($dir . '/' . $file)) {
            @copy($dir . '/' . $file, $snap . '/' . $file);
        }
    }
}

function special_page_normalize_post($post)
{
    $slug = special_page_slug($post['slug'] ?? 'special-page');
    $presets = [];
    $available = special_page_presets();
    foreach (($post['preset_stack'] ?? []) as $preset) {
        if (isset($available[$preset])) $presets[] = $preset;
    }
    if (!$presets) $presets = ['moonlight_blue'];

    $artists = [];
    $artist_id_set = [];
    $names = $post['artist_name'] ?? [];
    foreach ($names as $idx => $name) {
        $name = trim((string)$name);
        if ($name === '') continue;
        $artist_id = special_page_preserve_or_make_id($post['artist_id'][$idx] ?? '', 'artist_', $name . '|' . $idx, $artist_id_set);
        $artists[] = [
            'id' => $artist_id,
            'name' => $name,
            'kana' => trim((string)($post['artist_kana'][$idx] ?? '')),
            'icon' => special_page_resolve_asset_reference($post['artist_icon'][$idx] ?? '', $slug, 'artist'),
        ];
    }

    $songs = [];
    $song_id_set = [];
    $titles = $post['song_title'] ?? [];
    foreach ($titles as $idx => $title) {
        $title = trim((string)$title);
        if ($title === '') continue;
        $song_id = special_page_preserve_or_make_id($post['song_id'][$idx] ?? '', 'song_', $title . '|' . ($post['song_artist'][$idx] ?? '') . '|' . $idx, $song_id_set);
        $relations = special_page_normalize_id_list($post['song_artist_ids'][$idx] ?? '');
        $relations = array_values(array_intersect($relations, array_keys($artist_id_set)));
        $relation_mode = in_array(($post['song_artist_relation_mode'][$idx] ?? 'explicit'), ['explicit', 'legacy_inference'], true)
            ? $post['song_artist_relation_mode'][$idx]
            : 'explicit';
        $songs[] = [
            'id' => $song_id,
            'title' => $title,
            'subtitle' => trim((string)($post['song_subtitle'][$idx] ?? '')),
            'artist' => trim((string)($post['song_artist'][$idx] ?? '')),
            'artist_ids' => $relations,
            'artist_relation_mode' => $relation_mode,
            'type' => trim((string)($post['song_type'][$idx] ?? 'solo')),
            'tags' => trim((string)($post['song_tags'][$idx] ?? '')),
            'duration' => trim((string)($post['song_duration'][$idx] ?? '')),
            'cover' => special_page_resolve_asset_reference($post['song_cover'][$idx] ?? '', $slug, 'cover'),
            'play_url' => trim((string)($post['song_play_url'][$idx] ?? '')),
            'lyrics_url' => trim((string)($post['song_lyrics_url'][$idx] ?? '')),
            'pickup' => ((int)($post['song_pickup'][$idx] ?? 0) === 1) ? 1 : 0,
        ];
    }

    $sections = [];
    foreach (($post['section_type'] ?? []) as $idx => $type) {
        $sections[] = [
            'id' => $post['section_id'][$idx] ?? '',
            'type' => $type,
            'enabled' => ((int)($post['section_enabled'][$idx] ?? 0) === 1) ? 1 : 0,
            'nav_label' => $post['section_nav_label'][$idx] ?? '',
            'heading' => $post['section_heading'][$idx] ?? '',
            'variant' => $post['section_variant'][$idx] ?? '',
        ];
    }
    $sections = special_page_normalize_sections($sections);

    $motion_layers = [];
    foreach (($post['motion_layer_image'] ?? []) as $idx => $image) {
        $motion_layers[] = [
            'id' => $post['motion_layer_id'][$idx] ?? '',
            'enabled' => ((int)($post['motion_layer_enabled'][$idx] ?? 0) === 1) ? 1 : 0,
            'image' => special_page_resolve_asset_reference($image, $slug, 'motion'),
            'template' => $post['motion_layer_template'][$idx] ?? 'sway',
            'count' => $post['motion_layer_count'][$idx] ?? 12,
            'size_min' => $post['motion_layer_size_min'][$idx] ?? 24,
            'size_max' => $post['motion_layer_size_max'][$idx] ?? 72,
            'opacity' => $post['motion_layer_opacity'][$idx] ?? 55,
            'area_x_min' => $post['motion_layer_area_x_min'][$idx] ?? 0,
            'area_x_max' => $post['motion_layer_area_x_max'][$idx] ?? 100,
            'area_y_min' => $post['motion_layer_area_y_min'][$idx] ?? 0,
            'area_y_max' => $post['motion_layer_area_y_max'][$idx] ?? 100,
            'duration_min' => $post['motion_layer_duration_min'][$idx] ?? 7,
            'duration_max' => $post['motion_layer_duration_max'][$idx] ?? 13,
            'drift_x' => $post['motion_layer_drift_x'][$idx] ?? 18,
            'drift_y' => $post['motion_layer_drift_y'][$idx] ?? -24,
            'rotation' => $post['motion_layer_rotation'][$idx] ?? 12,
            'seed' => $post['motion_layer_seed'][$idx] ?? '',
            'position' => $post['motion_layer_position'][$idx] ?? 'front',
        ];
    }
    $motion_layers = special_page_normalize_motion_layers($motion_layers);

    $mini_videos = [];
    $video_ids = [];
    foreach (array_slice((array)($post['mini_video_src'] ?? []), 0, 8) as $idx => $src) {
        $src = special_page_resolve_asset_reference($src, $slug, 'video');
        if ($src === '' || !special_page_is_video_asset($src)) continue;
        $mini_videos[] = [
            'id' => special_page_preserve_or_make_id($post['mini_video_id'][$idx] ?? '', 'video_', $src . '|' . $idx, $video_ids),
            'title' => mb_substr(trim((string)($post['mini_video_title'][$idx] ?? '')), 0, 80, 'UTF-8'),
            'src' => $src,
            'poster' => special_page_resolve_asset_reference($post['mini_video_poster'][$idx] ?? '', $slug, 'bg'),
        ];
    }

    $normalized = [
        'manifest' => [
            'schema_version' => special_page_schema_version(),
            'slug' => $slug,
            'title' => trim((string)($post['title'] ?? '特設ページ')),
            'template' => 'moonlight_music_portal',
            'updated_at' => date('c'),
        ],
        'theme' => [
            'preset_stack' => $presets,
            'logo_text' => trim((string)($post['logo_text'] ?? '')),
            'logo_subtitle' => trim((string)($post['logo_subtitle'] ?? '')),
            'logo_image' => special_page_resolve_asset_reference($post['logo_image'] ?? '', $slug, 'logo'),
            'logo_width' => max(60, min(420, (int)($post['logo_width'] ?? 180))),
            'logo_align' => in_array(($post['logo_align'] ?? 'start'), ['start', 'center', 'end'], true) ? ($post['logo_align'] ?? 'start') : 'start',
            'logo_display' => in_array(($post['logo_display'] ?? 'both'), ['both', 'header', 'hero', 'hidden'], true) ? ($post['logo_display'] ?? 'both') : 'both',
            'logo_treatment' => in_array(($post['logo_treatment'] ?? 'transparent'), ['transparent', 'soft_plate', 'glow', 'editorial', 'halo'], true) ? ($post['logo_treatment'] ?? 'transparent') : 'transparent',
            'logo_max_height' => max(40, min(280, (int)($post['logo_max_height'] ?? 150))),
            'background_image' => special_page_resolve_asset_reference($post['background_image'] ?? '', $slug, 'bg'),
            'background_video_enabled' => ((int)($post['background_video_enabled'] ?? 0) === 1) ? 1 : 0,
            'background_video' => special_page_resolve_asset_reference($post['background_video'] ?? '', $slug, 'video'),
            'background_video_poster' => special_page_resolve_asset_reference($post['background_video_poster'] ?? '', $slug, 'bg'),
            'overlay' => max(0, min(95, (int)($post['overlay'] ?? 74))),
            'blur' => max(0, min(30, (int)($post['blur'] ?? 10))),
            'card_opacity' => max(20, min(95, (int)($post['card_opacity'] ?? 64))),
            'card_radius' => max(0, min(36, (int)($post['card_radius'] ?? 22))),
            'glow' => max(0, min(90, (int)($post['glow'] ?? 52))),
            'gloss' => ((int)($post['gloss'] ?? 1) === 1) ? 1 : 0,
            'custom_colors_enabled' => ((int)($post['custom_colors_enabled'] ?? 0) === 1) ? 1 : 0,
            'surface_mode' => in_array(($post['surface_mode'] ?? 'auto'), ['auto', 'dark', 'light'], true) ? ($post['surface_mode'] ?? 'auto') : 'auto',
            'base_color' => ((int)($post['custom_colors_enabled'] ?? 0) === 1) ? trim((string)($post['base_color'] ?? '')) : '',
            'panel_color' => ((int)($post['custom_colors_enabled'] ?? 0) === 1) ? trim((string)($post['panel_color'] ?? '')) : '',
            'text_color' => ((int)($post['custom_colors_enabled'] ?? 0) === 1) ? trim((string)($post['text_color'] ?? '')) : '',
            'muted_color' => ((int)($post['custom_colors_enabled'] ?? 0) === 1) ? trim((string)($post['muted_color'] ?? '')) : '',
            'accent_color' => ((int)($post['custom_colors_enabled'] ?? 0) === 1) ? trim((string)($post['accent_color'] ?? '')) : '',
            'accent2_color' => ((int)($post['custom_colors_enabled'] ?? 0) === 1) ? trim((string)($post['accent2_color'] ?? '')) : '',
            'highlight_color' => ((int)($post['custom_colors_enabled'] ?? 0) === 1) ? trim((string)($post['highlight_color'] ?? '')) : '',
            'font_body' => array_key_exists(($post['font_body'] ?? 'gothic'), special_page_font_presets()) ? ($post['font_body'] ?? 'gothic') : 'gothic',
            'font_heading' => array_key_exists(($post['font_heading'] ?? 'serif'), special_page_font_presets()) ? ($post['font_heading'] ?? 'serif') : 'serif',
            'font_nav' => array_key_exists(($post['font_nav'] ?? 'gothic'), special_page_font_presets()) ? ($post['font_nav'] ?? 'gothic') : 'gothic',
            'font_local_file' => special_page_resolve_asset_reference($post['font_local_file'] ?? '', $slug, 'font'),
            'font_local_scope' => in_array(($post['font_local_scope'] ?? 'none'), ['none', 'body', 'heading', 'nav', 'all'], true) ? ($post['font_local_scope'] ?? 'none') : 'none',
            'summary_image' => special_page_resolve_asset_reference($post['summary_image'] ?? '', $slug, 'bg'),
            'summary_blur' => max(0, min(30, (int)($post['summary_blur'] ?? 0))),
            'summary_overlay' => max(0, min(95, (int)($post['summary_overlay'] ?? 58))),
            'summary_image_fit' => in_array(($post['summary_image_fit'] ?? 'cover'), ['cover', 'contain'], true) ? ($post['summary_image_fit'] ?? 'cover') : 'cover',
            'summary_image_position' => in_array(($post['summary_image_position'] ?? 'center'), ['center', 'top', 'bottom', 'left', 'right'], true) ? ($post['summary_image_position'] ?? 'center') : 'center',
            'summary_show_stats' => ((int)($post['summary_show_stats'] ?? 1) === 1) ? 1 : 0,
            'summary_style' => in_array(($post['summary_style'] ?? 'classic_panel'), ['classic_panel', 'editorial_overlay', 'type_only', 'split_stage'], true) ? ($post['summary_style'] ?? 'classic_panel') : 'classic_panel',
            'summary_height' => max(140, min(820, (int)($post['summary_height'] ?? 360))),
            'summary_content_align' => in_array(($post['summary_content_align'] ?? 'start'), ['start', 'center', 'end'], true) ? ($post['summary_content_align'] ?? 'start') : 'start',
            'summary_frame' => in_array(($post['summary_frame'] ?? 'line'), ['none', 'line', 'glass'], true) ? ($post['summary_frame'] ?? 'line') : 'line',
            'movie_style' => in_array(($post['movie_style'] ?? 'grid'), ['grid', 'editorial_carousel', 'cinema_strip', 'floating_frames'], true) ? ($post['movie_style'] ?? 'grid') : 'grid',
            'movie_position' => in_array(($post['movie_position'] ?? 'after_summary'), ['after_summary', 'before_pickup', 'after_pickup'], true) ? ($post['movie_position'] ?? 'after_summary') : 'after_summary',
            'movie_align' => in_array(($post['movie_align'] ?? 'wide'), ['wide', 'start', 'center', 'end'], true) ? ($post['movie_align'] ?? 'wide') : 'wide',
            'movie_height' => max(240, min(720, (int)($post['movie_height'] ?? 420))),
            'movie_autoplay' => ((int)($post['movie_autoplay'] ?? 0) === 1) ? 1 : 0,
            'movie_heading' => mb_substr(trim((string)($post['movie_heading'] ?? 'MOVIE')), 0, 40, 'UTF-8'),
            'movie_subtitle' => mb_substr(trim((string)($post['movie_subtitle'] ?? '映像')), 0, 40, 'UTF-8'),
            'songs_mode' => in_array(($post['songs_mode'] ?? 'expanded'), ['expanded', 'collapsible_open', 'collapsible_closed'], true) ? ($post['songs_mode'] ?? 'expanded') : 'expanded',
            'hover_overlay_color' => trim((string)($post['hover_overlay_color'] ?? '#000000')),
            'hover_overlay_opacity' => max(0, min(90, (int)($post['hover_overlay_opacity'] ?? 0))),
            'hover_overlay_blend' => in_array(($post['hover_overlay_blend'] ?? 'normal'), ['normal', 'multiply', 'screen', 'overlay', 'soft-light'], true) ? ($post['hover_overlay_blend'] ?? 'normal') : 'normal',
            'hover_zoom' => max(100, min(120, (int)($post['hover_zoom'] ?? 104))),
            'reveal_effect' => in_array(($post['reveal_effect'] ?? 'none'), ['none', 'fade', 'rotate', 'unclip', 'zoom'], true) ? ($post['reveal_effect'] ?? 'none') : 'none',
            'reveal_duration' => max(150, min(1800, (int)($post['reveal_duration'] ?? 620))),
            'reveal_distance' => max(0, min(120, (int)($post['reveal_distance'] ?? 28))),
            'button_custom_enabled' => ((int)($post['button_custom_enabled'] ?? 0) === 1) ? 1 : 0,
            'button_color' => ((int)($post['button_custom_enabled'] ?? 0) === 1) ? trim((string)($post['button_color'] ?? '')) : '',
            'button_color2' => ((int)($post['button_custom_enabled'] ?? 0) === 1) ? trim((string)($post['button_color2'] ?? '')) : '',
            'button_text_color' => ((int)($post['button_custom_enabled'] ?? 0) === 1) ? trim((string)($post['button_text_color'] ?? '')) : '',
            'button_style' => in_array(($post['button_style'] ?? 'solid'), ['solid', 'gradient'], true) ? ($post['button_style'] ?? 'solid') : 'solid',
            'image_fit' => in_array(($post['image_fit'] ?? 'cover'), ['cover', 'contain'], true) ? ($post['image_fit'] ?? 'cover') : 'cover',
            'card_image_ratio' => in_array(($post['card_image_ratio'] ?? '16 / 9'), ['16 / 9', '4 / 3', '1 / 1'], true) ? ($post['card_image_ratio'] ?? '16 / 9') : '16 / 9',
            'card_min_height' => max(120, min(720, (int)($post['card_height'] ?? $post['card_min_height'] ?? 220))),
            'card_height' => max(120, min(720, (int)($post['card_height'] ?? $post['card_min_height'] ?? 220))),
            'card_gap' => max(0, min(48, (int)($post['card_gap'] ?? 14))),
            'section_gap' => max(0, min(160, (int)($post['section_gap'] ?? 14))),
            'hero_height' => max(280, min(960, (int)($post['hero_height'] ?? 520))),
            'pickup_layout' => in_array(($post['pickup_layout'] ?? 'grid'), ['grid', 'rail', 'compact'], true) ? ($post['pickup_layout'] ?? 'grid') : 'grid',
            'page_layout' => array_key_exists(($post['page_layout'] ?? 'catalog'), special_page_layout_presets()) ? ($post['page_layout'] ?? 'catalog') : 'catalog',
            'motion_effect' => in_array(($post['motion_effect'] ?? 'none'), ['none', 'music_notes', 'light_lines', 'diamonds'], true) ? ($post['motion_effect'] ?? 'none') : 'none',
            'motion_layers' => $motion_layers,
        ],
        'content' => [
            'nav' => ['TOP', 'PICKUP', 'ARTIST', 'SONGS', 'UNIT', 'CREDIT'],
            'songs' => $songs,
            'artists' => $artists,
            'sections' => $sections,
            'mini_videos' => $mini_videos,
            'credit' => trim((string)($post['credit'] ?? '')),
        ],
    ];
    return special_page_migrate_project($normalized);
}

function special_page_save($data)
{
    $slug = special_page_slug($data['manifest']['slug']);
    $data = special_page_migrate_project($data);
    $data['theme']['background_image'] = special_page_resolve_asset_reference($data['theme']['background_image'] ?? '', $slug, 'bg');
    $data['theme']['background_video'] = special_page_resolve_asset_reference($data['theme']['background_video'] ?? '', $slug, 'video');
    $data['theme']['background_video_poster'] = special_page_resolve_asset_reference($data['theme']['background_video_poster'] ?? '', $slug, 'bg');
    $data['theme']['logo_image'] = special_page_resolve_asset_reference($data['theme']['logo_image'] ?? '', $slug, 'logo');
    $data['theme']['font_local_file'] = special_page_resolve_asset_reference($data['theme']['font_local_file'] ?? '', $slug, 'font');
    $data['theme']['summary_image'] = special_page_resolve_asset_reference($data['theme']['summary_image'] ?? '', $slug, 'bg');
    foreach (($data['theme']['motion_layers'] ?? []) as &$layer) {
        $layer['image'] = special_page_resolve_asset_reference($layer['image'] ?? '', $slug, 'motion');
    }
    unset($layer);
    foreach (($data['content']['songs'] ?? []) as &$song) {
        $song['cover'] = special_page_resolve_asset_reference($song['cover'] ?? '', $slug, 'cover');
    }
    unset($song);
    foreach (($data['content']['artists'] ?? []) as &$artist) {
        $artist['icon'] = special_page_resolve_asset_reference($artist['icon'] ?? '', $slug, 'artist');
    }
    unset($artist);
    foreach (($data['content']['mini_videos'] ?? []) as &$video) {
        $video['src'] = special_page_resolve_asset_reference($video['src'] ?? '', $slug, 'video');
        $video['poster'] = special_page_resolve_asset_reference($video['poster'] ?? '', $slug, 'bg');
    }
    unset($video);
    $dir = special_page_ensure_dirs($slug);
    special_page_snapshot($slug);
    special_page_write_json($dir . '/manifest.json', $data['manifest']);
    special_page_write_json($dir . '/theme.json', $data['theme']);
    special_page_write_json($dir . '/content.json', $data['content']);
    return $dir;
}

function special_page_asset($path, $mode = 'preview', $slug = '')
{
    $path = trim((string)$path);
    if ($path === '') return '';
    if (preg_match('#^https?://#i', $path)) return $path;
    if (strpos($path, '/') === 0) return $path;

    $path = str_replace('\\', '/', $path);
    if (strpos($path, 'assets/') === 0) {
        return ($mode === 'static') ? $path : 'special_pages/' . special_page_slug($slug) . '/' . $path;
    }
    return ($mode === 'static') ? '../../' . ltrim($path, '/') : $path;
}

function special_page_h($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function special_page_css_string($value)
{
    $value = preg_replace('/[\x00-\x1F\x7F]/', '', (string)$value);
    $value = str_replace('\\', '\\\\', $value);
    $value = str_replace('"', '\\"', $value);
    $value = str_replace(['<', '>'], ['\\3c ', '\\3e '], $value);
    return $value;
}

function special_page_safe_hex($value, $fallback)
{
    $value = trim((string)$value);
    return preg_match('/^#[0-9a-fA-F]{6}$/', $value) ? strtolower($value) : $fallback;
}

function special_page_hex_rgb($hex)
{
    $hex = ltrim((string)$hex, '#');
    return hexdec(substr($hex, 0, 2)) . ', ' . hexdec(substr($hex, 2, 2)) . ', ' . hexdec(substr($hex, 4, 2));
}

function special_page_font_presets()
{
    return [
        'gothic' => ['label' => 'ゴシック', 'stack' => '"Yu Gothic", "Hiragino Sans", Meiryo, sans-serif'],
        'serif' => ['label' => '明朝', 'stack' => 'Georgia, "Yu Mincho", "Hiragino Mincho ProN", serif'],
        'rounded' => ['label' => '丸ゴシック', 'stack' => '"Arial Rounded MT Bold", "Hiragino Maru Gothic ProN", "Yu Gothic", sans-serif'],
        'modern' => ['label' => 'モダンサンセリフ', 'stack' => 'Inter, "Segoe UI", "Yu Gothic", sans-serif'],
        'editorial' => ['label' => 'エディトリアル明朝', 'stack' => '"Bodoni 72", Didot, "Yu Mincho", serif'],
        'humanist' => ['label' => 'ヒューマニスト', 'stack' => 'Aptos, Calibri, "Yu Gothic UI", sans-serif'],
        'condensed' => ['label' => 'コンデンス', 'stack' => '"Bahnschrift Condensed", "Arial Narrow", "Yu Gothic", sans-serif'],
        'neo_gothic' => ['label' => 'ネオゴシック', 'stack' => 'Bahnschrift, "Segoe UI", "Yu Gothic", sans-serif'],
        'classic' => ['label' => 'クラシック', 'stack' => '"Times New Roman", "Yu Mincho", serif'],
        'monospace' => ['label' => 'モノスペース', 'stack' => 'Consolas, "BIZ UDPGothic", monospace'],
        'local' => ['label' => 'ローカルフォント', 'stack' => '"SpecialPageLocal", "Yu Gothic", sans-serif'],
    ];
}

function special_page_font_stack($key)
{
    $presets = special_page_font_presets();
    return $presets[$key]['stack'] ?? $presets['gothic']['stack'];
}

function special_page_theme_vars($theme)
{
    $presets = special_page_presets();
    $stack = $theme['preset_stack'] ?? ['moonlight_blue'];
    $base = $presets[$stack[0]] ?? $presets['moonlight_blue'];
    $accent = $base;
    if (isset($stack[1]) && isset($presets[$stack[1]])) $accent = $presets[$stack[1]];
    $third = $accent;
    if (isset($stack[2]) && isset($presets[$stack[2]])) $third = $presets[$stack[2]];

    $custom_colors = !empty($theme['custom_colors_enabled']);
    $custom = function ($key) use ($theme, $custom_colors) { return $custom_colors ? ($theme[$key] ?? '') : ''; };

    $button_custom = array_key_exists('button_custom_enabled', $theme)
        ? !empty($theme['button_custom_enabled'])
        : trim((string)($theme['button_color'] ?? '')) !== '';
    $button_color = $button_custom ? trim((string)($theme['button_color'] ?? '')) : '';
    if (!preg_match('/^#[0-9a-fA-F]{6}$/', $button_color)) {
        $button_color = special_page_safe_hex($custom('accent_color'), $accent['accent']);
    }
    $button_color2 = $button_custom ? trim((string)($theme['button_color2'] ?? '')) : '';
    if (!preg_match('/^#[0-9a-fA-F]{6}$/', $button_color2)) {
        $button_color2 = special_page_safe_hex($custom('accent2_color'), $accent['accent2']);
    }
    $button_text_color = $button_custom ? trim((string)($theme['button_text_color'] ?? '')) : '';
    if (!preg_match('/^#[0-9a-fA-F]{6}$/', $button_text_color)) {
        $button_text_color = '#120b18';
    }
    $button_style = in_array(($theme['button_style'] ?? 'solid'), ['solid', 'gradient'], true) ? $theme['button_style'] : 'solid';
    $button_bg = ($button_style === 'gradient') ? 'linear-gradient(90deg, ' . $button_color . ', ' . $button_color2 . ')' : $button_color;

    $bg_color = special_page_safe_hex($custom('base_color'), $base['bg']);
    $panel_default = '#' . implode('', array_map(function ($part) { return str_pad(dechex((int)trim($part)), 2, '0', STR_PAD_LEFT); }, explode(',', $base['panel'])));
    $panel_color = special_page_safe_hex($custom('panel_color'), $panel_default);
    $accent_color = special_page_safe_hex($custom('accent_color'), $accent['accent']);
    $accent2_color = special_page_safe_hex($custom('accent2_color'), $accent['accent2']);

    return [
        'bg' => $bg_color,
        'panel' => special_page_hex_rgb($panel_color),
        'text' => special_page_safe_hex($custom('text_color'), $base['text'] ?? '#ffffff'),
        'muted' => special_page_safe_hex($custom('muted_color'), $base['muted'] ?? '#c6cada'),
        'accent' => $accent_color,
        'accent2' => $accent2_color,
        'gold' => special_page_safe_hex($custom('highlight_color'), $third['gold']),
        'button_color' => $button_color,
        'button_color2' => $button_color2,
        'button_bg' => $button_bg,
        'button_text_color' => $button_text_color,
        'button_style' => $button_style,
        'image_fit' => in_array(($theme['image_fit'] ?? 'cover'), ['cover', 'contain'], true) ? $theme['image_fit'] : 'cover',
        'card_image_ratio' => in_array(($theme['card_image_ratio'] ?? '16 / 9'), ['16 / 9', '4 / 3', '1 / 1'], true) ? $theme['card_image_ratio'] : '16 / 9',
        'card_min_height' => max(120, min(720, (int)($theme['card_height'] ?? $theme['card_min_height'] ?? 220))),
        'card_gap' => max(0, min(48, (int)($theme['card_gap'] ?? 14))),
        'section_gap' => max(0, min(160, (int)($theme['section_gap'] ?? 14))),
        'hero_height' => max(280, min(960, (int)($theme['hero_height'] ?? 520))),
        'pickup_layout' => in_array(($theme['pickup_layout'] ?? 'grid'), ['grid', 'rail', 'compact'], true) ? $theme['pickup_layout'] : 'grid',
        'page_layout' => array_key_exists(($theme['page_layout'] ?? 'catalog'), special_page_layout_presets()) ? $theme['page_layout'] : 'catalog',
        'motion_effect' => in_array(($theme['motion_effect'] ?? 'none'), ['none', 'music_notes', 'light_lines', 'diamonds'], true) ? $theme['motion_effect'] : 'none',
        'gloss' => ((int)($theme['gloss'] ?? 1) === 1) ? 1 : 0,
        'overlay' => ((int)($theme['overlay'] ?? 74)) / 100,
        'blur' => (int)($theme['blur'] ?? 10),
        'card_opacity' => ((int)($theme['card_opacity'] ?? 64)) / 100,
        'card_radius' => (int)($theme['card_radius'] ?? 22),
        'glow' => (int)($theme['glow'] ?? 52),
        'font_body' => special_page_font_stack($theme['font_body'] ?? 'gothic'),
        'font_heading' => special_page_font_stack($theme['font_heading'] ?? 'serif'),
        'font_nav' => special_page_font_stack($theme['font_nav'] ?? 'gothic'),
        'font_local_scope' => in_array(($theme['font_local_scope'] ?? 'none'), ['none', 'body', 'heading', 'nav', 'all'], true) ? $theme['font_local_scope'] : 'none',
        'logo_width' => max(60, min(420, (int)($theme['logo_width'] ?? 180))),
        'logo_align' => in_array(($theme['logo_align'] ?? 'start'), ['start', 'center', 'end'], true) ? $theme['logo_align'] : 'start',
        'logo_css_align' => ($theme['logo_align'] ?? 'start') === 'center' ? 'center' : (($theme['logo_align'] ?? 'start') === 'end' ? 'right' : 'left'),
        'logo_display' => in_array(($theme['logo_display'] ?? 'both'), ['both', 'header', 'hero', 'hidden'], true) ? $theme['logo_display'] : 'both',
        'logo_treatment' => in_array(($theme['logo_treatment'] ?? 'transparent'), ['transparent', 'soft_plate', 'glow', 'editorial', 'halo'], true) ? $theme['logo_treatment'] : 'transparent',
        'logo_max_height' => max(40, min(280, (int)($theme['logo_max_height'] ?? 150))),
        'summary_blur' => max(0, min(30, (int)($theme['summary_blur'] ?? 0))),
        'summary_overlay' => max(0, min(95, (int)($theme['summary_overlay'] ?? 58))) / 100,
        'summary_image_fit' => in_array(($theme['summary_image_fit'] ?? 'cover'), ['cover', 'contain'], true) ? $theme['summary_image_fit'] : 'cover',
        'summary_image_position' => in_array(($theme['summary_image_position'] ?? 'center'), ['center', 'top', 'bottom', 'left', 'right'], true) ? $theme['summary_image_position'] : 'center',
        'summary_show_stats' => !array_key_exists('summary_show_stats', $theme) || !empty($theme['summary_show_stats']),
        'summary_style' => in_array(($theme['summary_style'] ?? 'classic_panel'), ['classic_panel', 'editorial_overlay', 'type_only', 'split_stage'], true) ? $theme['summary_style'] : 'classic_panel',
        'summary_height' => max(140, min(820, (int)($theme['summary_height'] ?? 360))),
        'summary_content_align' => in_array(($theme['summary_content_align'] ?? 'start'), ['start', 'center', 'end'], true) ? $theme['summary_content_align'] : 'start',
        'summary_frame' => in_array(($theme['summary_frame'] ?? 'line'), ['none', 'line', 'glass'], true) ? $theme['summary_frame'] : 'line',
        'movie_style' => in_array(($theme['movie_style'] ?? 'grid'), ['grid', 'editorial_carousel', 'cinema_strip', 'floating_frames'], true) ? $theme['movie_style'] : 'grid',
        'movie_position' => in_array(($theme['movie_position'] ?? 'after_summary'), ['after_summary', 'before_pickup', 'after_pickup'], true) ? $theme['movie_position'] : 'after_summary',
        'movie_align' => in_array(($theme['movie_align'] ?? 'wide'), ['wide', 'start', 'center', 'end'], true) ? $theme['movie_align'] : 'wide',
        'movie_height' => max(240, min(720, (int)($theme['movie_height'] ?? 420))),
        'movie_autoplay' => !empty($theme['movie_autoplay']),
        'movie_heading' => mb_substr(trim((string)($theme['movie_heading'] ?? 'MOVIE')), 0, 40, 'UTF-8'),
        'movie_subtitle' => mb_substr(trim((string)($theme['movie_subtitle'] ?? '映像')), 0, 40, 'UTF-8'),
        'movie_legacy_controls' => !empty($theme['movie_legacy_controls']),
        'surface_mode' => in_array(($theme['surface_mode'] ?? 'auto'), ['dark', 'light'], true) ? $theme['surface_mode'] : ((($base['surface'] ?? 'dark') === 'light') ? 'light' : 'dark'),
        'songs_mode' => in_array(($theme['songs_mode'] ?? 'expanded'), ['expanded', 'collapsible_open', 'collapsible_closed'], true) ? $theme['songs_mode'] : 'expanded',
        'hover_overlay_color' => special_page_safe_hex($theme['hover_overlay_color'] ?? '', '#000000'),
        'hover_overlay_opacity' => max(0, min(90, (int)($theme['hover_overlay_opacity'] ?? 0))) / 100,
        'hover_overlay_blend' => in_array(($theme['hover_overlay_blend'] ?? 'normal'), ['normal', 'multiply', 'screen', 'overlay', 'soft-light'], true) ? $theme['hover_overlay_blend'] : 'normal',
        'hover_zoom' => max(100, min(120, (int)($theme['hover_zoom'] ?? 104))) / 100,
        'reveal_effect' => in_array(($theme['reveal_effect'] ?? 'none'), ['none', 'fade', 'rotate', 'unclip', 'zoom'], true) ? $theme['reveal_effect'] : 'none',
        'reveal_duration' => max(150, min(1800, (int)($theme['reveal_duration'] ?? 620))),
        'reveal_distance' => max(0, min(120, (int)($theme['reveal_distance'] ?? 28))),
    ];
}

function special_page_tags($tags)
{
    $out = [];
    foreach (preg_split('/[,、\s]+/u', (string)$tags) as $tag) {
        $tag = trim($tag);
        if ($tag !== '') $out[] = $tag;
    }
    return $out;
}

function special_page_search_url($query, $asset_mode = 'preview')
{
    return special_page_search_base($asset_mode) . '?anyword=' . rawurlencode(trim((string)$query));
}

function special_page_search_base($asset_mode = 'preview')
{
    return ($asset_mode === 'static') ? '../../search_listerdb_filelist.php' : 'search_listerdb_filelist.php';
}

function special_page_song_query($song)
{
    $parts = [];
    foreach (['artist', 'title'] as $key) {
        if (!empty($song[$key])) $parts[] = $song[$key];
    }
    return trim(implode(' ', $parts));
}

function special_page_search_key($value)
{
    $value = mb_strtolower((string)$value, 'UTF-8');
    $value = preg_replace('/\s+/u', '', $value);
    $value = preg_replace('/[（）()「」『』【】\[\]・,，、\/／&＆+＋]/u', '', $value);
    $value = str_replace(['cv.', 'ｃｖ．', 'cv．', 'cv'], '', $value);
    return $value;
}

function special_page_artist_song_match($artist, $song)
{
    $artist_id = trim((string)($artist['id'] ?? ''));
    if ($artist_id !== '' && array_key_exists('artist_ids', $song) && is_array($song['artist_ids'])) {
        return in_array($artist_id, $song['artist_ids'], true);
    }
    $artist_name = special_page_search_key($artist['name'] ?? '');
    $artist_kana = special_page_search_key($artist['kana'] ?? '');
    $song_artist = special_page_search_key($song['artist'] ?? '');
    $song_tags = special_page_search_key($song['tags'] ?? '');

    foreach ([$artist_name, $artist_kana] as $needle) {
        if ($needle === '') continue;
        foreach ([$song_artist, $song_tags] as $haystack) {
            if ($haystack !== '' && (mb_strpos($haystack, $needle) !== false || mb_strpos($needle, $haystack) !== false)) {
                return true;
            }
        }
    }

    return false;
}

function special_page_artist_song_count($songs, $artist)
{
    $count = 0;
    foreach ($songs as $song) {
        if (special_page_artist_song_match($artist, $song)) {
            $count++;
        }
    }
    return $count;
}

function special_page_render_section_nav($sections)
{
    if (!is_array($sections) || !$sections) return '';
    ob_start();
    ?>
    <nav class="sp-section-nav" aria-label="ページ内ナビゲーション">
      <?php foreach ($sections as $section): ?>
      <a class="sp-section-link<?php echo (($section['active'] ?? false) ? ' is-active' : ''); ?>" href="#<?php echo special_page_h($section['id']); ?>" data-sp-section-link="<?php echo special_page_h($section['id']); ?>"<?php echo (($section['active'] ?? false) ? ' aria-current="location"' : ''); ?>><?php echo special_page_h($section['label']); ?></a>
      <?php endforeach; ?>
    </nav>
    <?php
    return ob_get_clean();
}

function special_page_render_spotlight_hero($songs, $asset_mode, $slug)
{
    if (!is_array($songs) || !$songs) return '';
    ob_start();
    $total = count($songs);
    ?>
    <section id="spotlight" class="sp-spotlight sp-glass" data-sp-spotlight aria-labelledby="spSpotlightHeading">
      <div class="sp-spotlight-rail" role="tablist" aria-label="PICKUP楽曲">
        <?php foreach ($songs as $idx => $song):
            $title = (string)($song['title'] ?? '');
            $cover = special_page_asset($song['cover'] ?? '', $asset_mode, $slug);
        ?>
        <button type="button" id="spSpotlightTab<?php echo $idx; ?>" class="sp-spotlight-thumb<?php echo $idx === 0 ? ' is-active' : ''; ?>" role="tab" aria-controls="spSpotlightSlide<?php echo $idx; ?>" aria-selected="<?php echo $idx === 0 ? 'true' : 'false'; ?>" tabindex="<?php echo $idx === 0 ? '0' : '-1'; ?>" data-sp-spotlight-thumb="<?php echo $idx; ?>">
          <?php if ($cover): ?><img src="<?php echo special_page_h($cover); ?>" alt="" loading="lazy"><?php else: ?><span class="sp-spotlight-thumb-placeholder" aria-hidden="true">NO IMAGE</span><?php endif; ?>
          <span class="sp-spotlight-thumb-label"><?php echo special_page_h($title); ?></span>
        </button>
        <?php endforeach; ?>
      </div>
      <div class="sp-spotlight-stage" id="spSpotlightStage" tabindex="0" role="group" aria-roledescription="carousel" aria-labelledby="spSpotlightHeading" data-sp-spotlight-stage>
        <h2 id="spSpotlightHeading" class="visually-hidden">PICKUPスポットライト</h2>
        <div class="sp-spotlight-slides">
          <?php foreach ($songs as $idx => $song):
              $title = (string)($song['title'] ?? '');
              $artist = (string)($song['artist'] ?? '');
              $cover = special_page_asset($song['cover'] ?? '', $asset_mode, $slug);
              $url = !empty($song['play_url']) ? $song['play_url'] : special_page_search_url(special_page_song_query($song), $asset_mode);
              $tags = array_slice(special_page_tags($song['tags'] ?? $song['type'] ?? ''), 0, 3);
              $title_length = function_exists('mb_strlen') ? mb_strlen($title, 'UTF-8') : strlen($title);
              $title_class = $title_length > 36 ? ' is-very-long' : ($title_length > 20 ? ' is-long' : '');
          ?>
          <article class="sp-spotlight-slide<?php echo $idx === 0 ? ' is-active' : ''; ?>" id="spSpotlightSlide<?php echo $idx; ?>" role="tabpanel" aria-labelledby="spSpotlightTab<?php echo $idx; ?>" data-sp-spotlight-slide="<?php echo $idx; ?>" aria-hidden="<?php echo $idx === 0 ? 'false' : 'true'; ?>">
            <div class="sp-spotlight-image-wrap">
              <?php if ($cover): ?><img class="sp-spotlight-image" <?php echo $idx === 0 ? 'src="' . special_page_h($cover) . '" loading="eager" fetchpriority="high"' : 'data-src="' . special_page_h($cover) . '" loading="lazy"'; ?> decoding="async" alt="<?php echo special_page_h($title); ?>" data-sp-spotlight-image><?php else: ?><div class="sp-spotlight-image-placeholder" role="img" aria-label="<?php echo special_page_h($title); ?>の画像は未設定です"><span>NO IMAGE</span></div><?php endif; ?>
            </div>
            <div class="sp-spotlight-copy">
              <p class="sp-spotlight-kicker">PICKUP <?php echo sprintf('%02d', $idx + 1); ?></p>
              <h3 class="<?php echo trim($title_class); ?>"><?php echo special_page_h($title); ?></h3>
              <p class="sp-spotlight-artist"><?php echo special_page_h($artist); ?></p>
              <?php if ($tags): ?><div class="sp-tags" aria-label="タグ"><?php foreach ($tags as $tag): ?><span class="sp-tag">#<?php echo special_page_h($tag); ?></span><?php endforeach; ?></div><?php endif; ?>
              <a class="sp-btn primary sp-spotlight-cta" data-sp-spotlight-cta data-href="<?php echo special_page_h($url); ?>"<?php echo $idx === 0 ? ' href="' . special_page_h($url) . '"' : ''; ?><?php echo $idx === 0 ? '' : ' tabindex="-1"'; ?>>検索する</a>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
        <?php if ($total > 1): ?>
        <div class="sp-spotlight-controls" aria-label="スライド操作">
          <button type="button" class="sp-spotlight-control" data-sp-spotlight-prev aria-label="前のPICKUP" disabled>前へ</button>
          <button type="button" class="sp-spotlight-control" data-sp-spotlight-next aria-label="次のPICKUP">次へ</button>
        </div>
        <?php endif; ?>
        <p class="sp-spotlight-progress" data-sp-spotlight-progress aria-live="polite"><span data-sp-spotlight-current>1</span> / <span><?php echo $total; ?></span></p>
      </div>
    </section>
    <?php
    return ob_get_clean();
}

function special_page_motion_random01($seed, $layer_id, $copy_index, $parameter)
{
    $input = json_encode(
        [(string)$seed, (string)$layer_id, (int)$copy_index, (string)$parameter],
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
    );
    $value = hexdec(substr(hash('sha256', $input), 0, 8));
    return $value / 4294967296.0;
}

function special_page_motion_range($layer, $copy_index, $parameter, $min, $max)
{
    if ($min === $max) return (float)$min;
    return (float)$min + ((float)$max - (float)$min) * special_page_motion_random01(
        $layer['seed'],
        $layer['id'],
        $copy_index,
        $parameter
    );
}

function special_page_motion_css_number($value)
{
    $formatted = rtrim(rtrim(number_format((float)$value, 4, '.', ''), '0'), '.');
    return ($formatted === '' || $formatted === '-0') ? '0' : $formatted;
}

function special_page_motion_render_layers($layers)
{
    $prepared = [];
    $total = 0;
    $mobile_index = 0;
    foreach (special_page_normalize_motion_layers($layers) as $layer) {
        if (empty($layer['enabled']) || $total >= 60) continue;
        $layer['_render_count'] = min((int)$layer['count'], 60 - $total);
        $layer['_mobile_index'] = $mobile_index++;
        $prepared[] = $layer;
        $total += $layer['_render_count'];
    }
    return $prepared;
}

function special_page_render_motion_layers($layers, $position, $asset_mode, $slug)
{
    $selected = array_values(array_filter($layers, function ($layer) use ($position) {
        return ($layer['position'] ?? 'front') === $position;
    }));
    if (!$selected) return '';

    ob_start();
    ?>
<div class="sp-image-motion sp-image-motion-<?php echo special_page_h($position); ?>" aria-hidden="true">
  <?php foreach ($selected as $layer):
      $image_ref = special_page_resolve_asset_reference($layer['image'] ?? '', $slug, 'motion');
      $image = special_page_asset($image_ref, $asset_mode, $slug);
      if ($image === '') continue;
      $layer_classes = 'sp-motion-layer sp-motion-template-' . $layer['template'];
      if ($layer['_mobile_index'] >= 2) $layer_classes .= ' is-mobile-layer-hidden';
  ?>
  <div class="<?php echo special_page_h($layer_classes); ?>" data-motion-layer="<?php echo special_page_h($layer['id']); ?>">
    <?php for ($copy_index = 0; $copy_index < $layer['_render_count']; $copy_index++):
        $x = special_page_motion_range($layer, $copy_index, 'x', $layer['area_x_min'], $layer['area_x_max']);
        $y = special_page_motion_range($layer, $copy_index, 'y', $layer['area_y_min'], $layer['area_y_max']);
        $size = special_page_motion_range($layer, $copy_index, 'size', $layer['size_min'], $layer['size_max']);
        $duration = special_page_motion_range($layer, $copy_index, 'duration', $layer['duration_min'], $layer['duration_max']);
        $delay = -special_page_motion_range($layer, $copy_index, 'delay', 0, $duration);
        $base_rotation = special_page_motion_range($layer, $copy_index, 'base_rotation', -$layer['rotation'], $layer['rotation']);
        $rotation_direction = special_page_motion_random01($layer['seed'], $layer['id'], $copy_index, 'rotation_direction') < .5 ? -1 : 1;
        $spin = max(360, (float)$layer['rotation']) * $rotation_direction;
        $drift_x = (float)$layer['drift_x'];
        $drift_y = (float)$layer['drift_y'];
        if ($layer['template'] === 'rise') $drift_y = -max(12, abs($drift_y));
        if ($layer['template'] === 'fall') $drift_y = max(12, abs($drift_y));
        $copy_classes = 'sp-motion-copy';
        if ($copy_index >= 12) $copy_classes .= ' is-mobile-copy-hidden';
        $style = '--sp-motion-x:' . special_page_motion_css_number($x) . '%;'
            . '--sp-motion-y:' . special_page_motion_css_number($y) . '%;'
            . '--sp-motion-size:' . special_page_motion_css_number($size) . 'px;'
            . '--sp-motion-opacity:' . special_page_motion_css_number($layer['opacity'] / 100) . ';'
            . '--sp-motion-duration:' . special_page_motion_css_number($duration) . 's;'
            . '--sp-motion-delay:' . special_page_motion_css_number($delay) . 's;'
            . '--sp-motion-base-rotation:' . special_page_motion_css_number($base_rotation) . 'deg;'
            . '--sp-motion-rotation:' . special_page_motion_css_number($layer['rotation']) . 'deg;'
            . '--sp-motion-rotation-neg:' . special_page_motion_css_number(-$layer['rotation']) . 'deg;'
            . '--sp-motion-spin:' . special_page_motion_css_number($spin) . 'deg;'
            . '--sp-motion-dx:' . special_page_motion_css_number($drift_x) . 'px;'
            . '--sp-motion-dx-neg:' . special_page_motion_css_number(-$drift_x) . 'px;'
            . '--sp-motion-dy:' . special_page_motion_css_number($drift_y) . 'px;';
    ?>
    <span class="<?php echo special_page_h($copy_classes); ?>" style="<?php echo special_page_h($style); ?>">
      <span class="sp-motion-anchor"><span class="sp-motion-anim"><img src="<?php echo special_page_h($image); ?>" alt="" draggable="false" loading="lazy"></span></span>
    </span>
    <?php endfor; ?>
  </div>
  <?php endforeach; ?>
</div>
    <?php
    return ob_get_clean();
}

function special_page_render_movie_showcase($videos, $vars)
{
    if (!$videos) return '';
    $style = $vars['movie_style'];
    $align = $vars['movie_align'];
    $legacy_grid = $style === 'grid' && !empty($vars['movie_legacy_controls']);
    ob_start();
    ?>
  <section class="sp-movie-showcase sp-movie-style-<?php echo special_page_h($style); ?> sp-movie-align-<?php echo special_page_h($align); ?><?php echo count($videos) === 1 ? ' sp-movie-single' : ''; ?>" data-sp-movie-showcase data-sp-movie-autoplay="<?php echo $vars['movie_autoplay'] ? '1' : '0'; ?>" style="--sp-movie-height:<?php echo (int)$vars['movie_height']; ?>px" aria-roledescription="carousel" aria-label="<?php echo special_page_h($vars['movie_heading']); ?>" data-sp-reveal>
    <header class="sp-movie-heading">
      <span aria-hidden="true">+</span>
      <h2><?php echo special_page_h($vars['movie_heading']); ?></h2>
      <?php if ($vars['movie_subtitle'] !== ''): ?><p><?php echo special_page_h($vars['movie_subtitle']); ?></p><?php endif; ?>
    </header>
    <div class="sp-movie-viewport" tabindex="0" data-sp-movie-viewport>
      <div class="sp-movie-track">
        <?php foreach ($videos as $index => $video): ?>
        <figure class="sp-movie-slide<?php echo $index === 0 ? ' is-active' : ''; ?>" data-sp-movie-slide data-sp-movie-index="<?php echo $index; ?>" aria-hidden="<?php echo ($style === 'grid' || $index === 0) ? 'false' : 'true'; ?>">
          <div class="sp-movie-frame">
            <video<?php echo $legacy_grid ? ' controls' : ''; ?> muted loop playsinline preload="none"<?php echo $video['poster'] ? ' poster="' . special_page_h($video['poster']) . '"' : ''; ?> data-sp-mini-video data-src="<?php echo special_page_h($video['src']); ?>"></video>
            <?php if (!$legacy_grid): ?><button class="sp-movie-play" type="button" data-sp-movie-play aria-label="動画を再生"><span aria-hidden="true"></span></button><?php endif; ?>
          </div>
          <figcaption><span><?php echo str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT); ?></span><strong><?php echo special_page_h($video['title'] !== '' ? $video['title'] : 'MOVIE ' . ($index + 1)); ?></strong></figcaption>
        </figure>
        <?php endforeach; ?>
      </div>
    </div>
    <footer class="sp-movie-controls">
      <button type="button" data-sp-movie-prev><span aria-hidden="true">←</span> PREV</button>
      <p><span data-sp-movie-current>01</span><i></i><span><?php echo str_pad((string)count($videos), 2, '0', STR_PAD_LEFT); ?></span></p>
      <button type="button" data-sp-movie-next>NEXT <span aria-hidden="true">→</span></button>
    </footer>
    <p class="sp-visually-hidden" aria-live="polite" data-sp-movie-status></p>
  </section>
    <?php
    return ob_get_clean();
}

function special_page_render_html($data, $asset_mode = 'preview', $force_motion = false)
{
    $data = special_page_migrate_project($data);
    $manifest = $data['manifest'];
    $theme = $data['theme'];
    $content = $data['content'];
    $songs = $content['songs'] ?? [];
    $artists = $content['artists'] ?? [];
    $motion_layers = special_page_motion_render_layers($theme['motion_layers'] ?? []);
    $sections = array_values(array_filter(
        special_page_normalize_sections($content['sections'] ?? []),
        function ($section) { return !empty($section['enabled']); }
    ));
    $panel_sections = array_values(array_filter($sections, function ($section) {
        return in_array($section['type'], ['pickup', 'artists', 'songs'], true);
    }));
    $panel_name = function ($type) { return $type === 'artists' ? 'artist' : $type; };
    $first_panel = $panel_sections ? $panel_name($panel_sections[0]['type']) : '';
    $section_by_type = [];
    foreach ($sections as $section) $section_by_type[$section['type']] = $section;
    $vars = special_page_theme_vars($theme);
    $slug = $manifest['slug'] ?? '';
    $bg = special_page_asset($theme['background_image'] ?? '', $asset_mode, $slug);
    $video_ref = special_page_resolve_asset_reference($theme['background_video'] ?? '', $slug, 'video');
    $video_is_media = special_page_is_video_asset($video_ref);
    $bg_video_enabled = !empty($theme['background_video_enabled']) && $video_ref !== '' && $video_is_media;
    if (!$video_is_media && $video_ref !== '') {
        $bg = special_page_asset(special_page_resolve_asset_reference($video_ref, $slug, 'bg'), $asset_mode, $slug);
    }
    $bg_video = $bg_video_enabled ? special_page_asset($video_ref, $asset_mode, $slug) : '';
    $bg_video_poster = special_page_asset(($theme['background_video_poster'] ?? '') ?: ($theme['background_image'] ?? ''), $asset_mode, $slug);
    $summary_image = special_page_asset(special_page_resolve_asset_reference($theme['summary_image'] ?? '', $slug, 'bg'), $asset_mode, $slug);
    $logo_image = special_page_asset(special_page_resolve_asset_reference($theme['logo_image'] ?? '', $slug, 'logo'), $asset_mode, $slug);
    $local_font = special_page_asset(special_page_resolve_asset_reference($theme['font_local_file'] ?? '', $slug, 'font'), $asset_mode, $slug);
    $local_font_ext = strtolower(pathinfo((string)(parse_url($local_font, PHP_URL_PATH) ?: $local_font), PATHINFO_EXTENSION));
    $local_font_format = ['woff2' => 'woff2', 'woff' => 'woff', 'ttf' => 'truetype', 'otf' => 'opentype'][$local_font_ext] ?? '';
    if ($local_font_format === '') $local_font = '';
    if ($local_font) {
        $scope = $vars['font_local_scope'];
        if ($scope === 'body' || $scope === 'all') $vars['font_body'] = special_page_font_stack('local');
        if ($scope === 'heading' || $scope === 'all') $vars['font_heading'] = special_page_font_stack('local');
        if ($scope === 'nav' || $scope === 'all') $vars['font_nav'] = special_page_font_stack('local');
    }
    $title = special_page_h($manifest['title'] ?? 'Special Page');
    $logo_text = trim((string)($theme['logo_text'] ?? ''));
    if ($logo_text === '') $logo_text = (string)($manifest['title'] ?? 'Special Page');
    $logo = special_page_h($logo_text);
    $logo_sub = special_page_h(trim((string)($theme['logo_subtitle'] ?? '')));
    $show_header_logo = $logo_image && in_array($vars['logo_display'], ['both', 'header'], true);
    $show_hero_logo = $logo_image && in_array($vars['logo_display'], ['both', 'hero'], true);
    $summary_height_class = $vars['summary_height'] <= 220
        ? 'sp-summary-height-compact'
        : ($vars['summary_height'] <= 340 ? 'sp-summary-height-medium' : 'sp-summary-height-large');
    $mini_videos = [];
    foreach (array_slice((array)($content['mini_videos'] ?? []), 0, 8) as $video) {
        if (!is_array($video)) continue;
        $video_ref = special_page_resolve_asset_reference($video['src'] ?? '', $slug, 'video');
        if ($video_ref === '' || !special_page_is_video_asset($video_ref)) continue;
        $mini_videos[] = [
            'title' => mb_substr(trim((string)($video['title'] ?? '')), 0, 80, 'UTF-8'),
            'src' => special_page_asset($video_ref, $asset_mode, $slug),
            'poster' => special_page_asset(special_page_resolve_asset_reference($video['poster'] ?? '', $slug, 'bg'), $asset_mode, $slug),
        ];
    }
    $movie_showcase_html = special_page_render_movie_showcase($mini_videos, $vars);
    $used_artist_ids = [];
    foreach ($songs as $song) {
        foreach ((array)($song['artist_ids'] ?? []) as $artist_id) $used_artist_ids[(string)$artist_id] = true;
    }
    $artist_stat_count = $used_artist_ids ? count($used_artist_ids) : count($artists);
    $types = [];
    foreach ($songs as $song) {
        $type = strtolower(trim((string)($song['type'] ?? '')));
        if ($type !== '') $types[$type] = strtoupper($type);
    }
    if (!$types) $types = ['solo' => 'SOLO', 'duet' => 'DUET', 'unit' => 'UNIT', 'group' => 'GROUP', 'cv' => 'CV'];
    $pickup_songs = [];
    foreach ($songs as $song) {
        if (!empty($song['pickup'])) $pickup_songs[] = $song;
    }
    if (!$pickup_songs) {
        $pickup_songs = array_slice($songs, 0, 6);
    }
    $spotlight_songs = array_slice($pickup_songs, 0, 8);

    ob_start();
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?php echo $title; ?></title>
<style>
<?php if ($local_font): ?>
@font-face { font-family: "SpecialPageLocal"; src: url("<?php echo special_page_h(special_page_css_string($local_font)); ?>") format("<?php echo special_page_h($local_font_format); ?>"); font-display: swap; }
<?php endif; ?>
:root {
  --sp-bg: <?php echo $vars['bg']; ?>;
  --sp-panel-rgb: <?php echo $vars['panel']; ?>;
  --sp-card-alpha: <?php echo $vars['card_opacity']; ?>;
  --sp-accent: <?php echo $vars['accent']; ?>;
  --sp-accent-2: <?php echo $vars['accent2']; ?>;
  --sp-gold: <?php echo $vars['gold']; ?>;
  --sp-button: <?php echo $vars['button_bg']; ?>;
  --sp-button-text: <?php echo $vars['button_text_color']; ?>;
  --sp-text: <?php echo $vars['text']; ?>;
  --sp-muted: <?php echo $vars['muted']; ?>;
  --sp-font-body: <?php echo $vars['font_body']; ?>;
  --sp-font-heading: <?php echo $vars['font_heading']; ?>;
  --sp-font-nav: <?php echo $vars['font_nav']; ?>;
  --sp-hover-color: <?php echo $vars['hover_overlay_color']; ?>;
  --sp-hover-alpha: <?php echo $vars['hover_overlay_opacity']; ?>;
  --sp-hover-blend: <?php echo $vars['hover_overlay_blend']; ?>;
  --sp-hover-zoom: <?php echo $vars['hover_zoom']; ?>;
  --sp-reveal-duration: <?php echo $vars['reveal_duration']; ?>ms;
  --sp-reveal-distance: <?php echo $vars['reveal_distance']; ?>px;
  --sp-image-fit: <?php echo $vars['image_fit']; ?>;
  --sp-card-aspect: <?php echo $vars['card_image_ratio']; ?>;
  --sp-card-min-height: <?php echo $vars['card_min_height']; ?>px;
  --sp-card-gap: <?php echo $vars['card_gap']; ?>px;
  --sp-section-gap: <?php echo $vars['section_gap']; ?>px;
  --sp-hero-height: <?php echo $vars['hero_height']; ?>px;
  --sp-radius: <?php echo $vars['card_radius']; ?>px;
  --sp-glow: <?php echo $vars['glow']; ?>px;
  --sp-scroll-track: rgba(var(--sp-panel-rgb), .42);
  --sp-scroll-thumb: color-mix(in srgb, var(--sp-accent) 72%, var(--sp-accent-2));
}
* { box-sizing: border-box; }
.sp-visually-hidden { position: absolute !important; width: 1px !important; height: 1px !important; padding: 0 !important; margin: -1px !important; overflow: hidden !important; clip: rect(0, 0, 0, 0) !important; white-space: nowrap !important; border: 0 !important; }
html { scroll-behavior: smooth; }
body {
  margin: 0;
  min-height: 100vh;
  color: var(--sp-text);
  background: var(--sp-bg);
  font-family: var(--sp-font-body);
  letter-spacing: 0;
}
body::before {
  content: "";
  position: fixed;
  inset: 0;
  background:
    <?php if ($vars['surface_mode'] === 'light'): ?>linear-gradient(180deg, rgba(250, 252, 255, <?php echo min(.94, $vars['overlay'] + .1); ?>), rgba(242, 246, 249, .82)),<?php else: ?>linear-gradient(180deg, rgba(3, 5, 16, <?php echo $vars['overlay']; ?>), rgba(8, 5, 24, 0.92)),<?php endif; ?>
    radial-gradient(circle at 70% 12%, color-mix(in srgb, var(--sp-accent) 32%, transparent), transparent 28%),
    <?php echo $bg ? "url('" . special_page_h(special_page_css_string($bg)) . "')" : 'linear-gradient(135deg, #111a3a, #321640)'; ?>;
  background-size: cover;
  background-position: center;
  filter: blur(<?php echo $vars['blur']; ?>px);
  transform: scale(1.04);
  z-index: -3;
}
body::after {
  content: "";
  position: fixed;
  inset: 0;
  background: linear-gradient(90deg, rgba(0,0,0,.38), rgba(0,0,0,.08) 50%, rgba(0,0,0,.38));
  z-index: -1;
}
.sp-surface-light::after { background: linear-gradient(90deg, rgba(255,255,255,.18), transparent 50%, rgba(255,255,255,.18)); }
.sp-bg-video {
  position: fixed;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: blur(<?php echo $vars['blur']; ?>px);
  transform: scale(1.04);
  z-index: -2;
}
a { color: inherit; text-decoration: none; }
button, input { font: inherit; }
.sp-section-title, .sp-summary-title, .sp-card-title, .sp-cinematic-copy h3, .sp-spotlight-copy h3 { font-family: var(--sp-font-heading); }
.sp-tabs, .sp-section-nav { font-family: var(--sp-font-nav); }
.sp-shell { position: relative; z-index: 1; }
.sp-image-motion { pointer-events: none; position: fixed; inset: 0; overflow: hidden; }
.sp-image-motion-behind { z-index: 0; }
.sp-image-motion-front { z-index: 50; }
.sp-motion-layer { position: absolute; inset: 0; }
.sp-motion-copy { position: absolute; left: var(--sp-motion-x); top: var(--sp-motion-y); display: block; width: var(--sp-motion-size); opacity: var(--sp-motion-opacity); }
.sp-motion-anchor { display: block; transform: translate(-50%, -50%) rotate(var(--sp-motion-base-rotation)); }
.sp-motion-anim { display: block; animation-duration: var(--sp-motion-duration); animation-delay: var(--sp-motion-delay); animation-timing-function: ease-in-out; animation-iteration-count: infinite; }
.sp-motion-anim img { display: block; width: 100%; height: auto; user-select: none; }
.sp-motion-template-static .sp-motion-anim { animation: none; }
.sp-motion-template-float .sp-motion-anim { animation-name: sp-image-float; }
.sp-motion-template-sway .sp-motion-anim { animation-name: sp-image-sway; transform-origin: 50% 10%; }
.sp-motion-template-drift .sp-motion-anim,
.sp-motion-template-rise .sp-motion-anim,
.sp-motion-template-fall .sp-motion-anim { animation-name: sp-image-drift; animation-timing-function: linear; }
.sp-motion-template-spin .sp-motion-anim { animation-name: sp-image-spin; animation-timing-function: linear; }
@keyframes sp-image-float {
  0%, 100% { transform: translate3d(0, 0, 0) rotate(0); }
  50% { transform: translate3d(var(--sp-motion-dx), var(--sp-motion-dy), 0) rotate(var(--sp-motion-rotation)); }
}
@keyframes sp-image-sway {
  0%, 100% { transform: translate3d(var(--sp-motion-dx-neg), 0, 0) rotate(var(--sp-motion-rotation-neg)); }
  50% { transform: translate3d(var(--sp-motion-dx), var(--sp-motion-dy), 0) rotate(var(--sp-motion-rotation)); }
}
@keyframes sp-image-drift {
  0% { transform: translate3d(0, 0, 0); }
  50% { transform: translate3d(var(--sp-motion-dx), var(--sp-motion-dy), 0); }
  100% { transform: translate3d(0, 0, 0); }
}
@keyframes sp-image-spin {
  from { transform: rotate(0); }
  to { transform: rotate(var(--sp-motion-spin)); }
}
.sp-motion { pointer-events: none; position: fixed; inset: 0; z-index: 60; overflow: hidden; mix-blend-mode: screen; }
.sp-motion span { position: absolute; display: block; opacity: .34; color: var(--sp-accent); text-shadow: 0 0 16px var(--sp-accent); animation: sp-float 9s ease-in-out infinite; }
.sp-motion-notes span { font-size: 26px; }
.sp-motion-diamonds span { width: 18px; height: 18px; border: 1px solid color-mix(in srgb, var(--sp-accent) 70%, transparent); transform: rotate(45deg); }
.sp-motion-lines span { width: 160px; height: 2px; background: linear-gradient(90deg, transparent, var(--sp-accent), transparent); transform: rotate(-18deg); }
.sp-motion span:nth-child(1) { left: 8%; top: 18%; animation-delay: 0s; }
.sp-motion span:nth-child(2) { left: 76%; top: 12%; animation-delay: -2s; }
.sp-motion span:nth-child(3) { left: 58%; top: 64%; animation-delay: -4s; }
.sp-motion span:nth-child(4) { left: 18%; top: 76%; animation-delay: -6s; }
.sp-motion span:nth-child(5) { left: 88%; top: 72%; animation-delay: -8s; }
@keyframes sp-float {
  0%, 100% { translate: 0 0; opacity: .18; }
  50% { translate: 0 -22px; opacity: .42; }
}
.sp-shell { position: relative; z-index: 1; width: min(1220px, calc(100% - 32px)); margin: 0 auto; padding: 16px 0 30px; }
.sp-glass, .sp-card, .sp-artist, .sp-song-table {
  position: relative;
  background: rgba(var(--sp-panel-rgb), var(--sp-card-alpha));
  border: 1px solid color-mix(in srgb, var(--sp-accent) 38%, rgba(255,255,255,.18));
  border-radius: var(--sp-radius);
  box-shadow: 0 18px var(--sp-glow) rgba(0, 0, 0, .42);
  backdrop-filter: blur(18px);
}
.sp-gloss .sp-glass::after,
.sp-gloss .sp-card::after,
.sp-gloss .sp-artist::after,
.sp-gloss .sp-song-table::after {
  content: "";
  position: absolute;
  inset: 0;
  pointer-events: none;
  border-radius: inherit;
  background: linear-gradient(135deg, rgba(255,255,255,.24), rgba(255,255,255,.05) 30%, transparent 58%);
  mix-blend-mode: screen;
}
.sp-topbar { position: sticky; top: 0; z-index: 20; padding: 10px 0 12px; background: transparent; }
.sp-surface-light .sp-topbar { background: transparent; }
.sp-topbar-inner { display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: 14px; align-items: center; }
.sp-topbar.has-brand .sp-topbar-inner { grid-template-columns: minmax(120px, 220px) minmax(0, 1fr) auto; }
.sp-logo { min-width: 0; font-family: var(--sp-font-nav); font-size: 1.45rem; letter-spacing: .12em; white-space: nowrap; }
.sp-logo-text { display: inline-flex; flex-direction: column; justify-content: center; min-height: 46px; }
.sp-logo small { display: block; margin-top: 3px; font-size: .52rem; letter-spacing: .28em; color: var(--sp-muted); }
.sp-search-form { display: flex; align-items: center; gap: 8px; min-width: 0; }
.sp-search-input { flex: 1 1 auto; width: auto; min-width: 0; min-height: 42px; border: 1px solid rgba(255,255,255,.26); border-radius: 999px; padding: 0 16px; color: var(--sp-text); background: rgba(var(--sp-panel-rgb), .52); outline: none; }
.sp-search-submit { flex: 0 0 auto; }
.sp-search-input::placeholder { color: color-mix(in srgb, var(--sp-muted) 78%, transparent); }
.sp-search-submit, .sp-tab, .sp-chip, .sp-btn { border: 1px solid color-mix(in srgb, var(--sp-text) 26%, transparent); border-radius: 999px; color: var(--sp-text); background: color-mix(in srgb, var(--sp-text) 8%, transparent); cursor: pointer; }
.sp-search-submit { min-height: 42px; padding: 0 18px; font-weight: 800; background: var(--sp-button); color: var(--sp-button-text); border: 0; white-space: nowrap; }
.sp-tabs { display: flex; gap: 8px; justify-content: flex-end; }
.sp-tab { min-width: 94px; padding: 11px 16px; font-weight: 800; letter-spacing: .03em; }
.sp-tab.is-active { color: var(--sp-button-text); background: var(--sp-button); border-color: var(--sp-button); }
.sp-summary { position: relative; isolation: isolate; overflow: hidden; display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: 18px; align-items: end; height: var(--sp-summary-height, 360px); min-height: 0; margin-top: 14px; padding: clamp(20px, 4vw, 56px); border-radius: var(--sp-radius); }
.sp-summary::before { content: ""; position: absolute; z-index: -2; inset: calc(-1 * <?php echo $vars['summary_blur']; ?>px); background: var(--sp-summary-image, radial-gradient(circle at 18% 28%, color-mix(in srgb, var(--sp-accent) 30%, transparent), transparent 36%), linear-gradient(125deg, color-mix(in srgb, var(--sp-accent-2) 18%, var(--sp-bg)), var(--sp-bg) 68%)); background-size: <?php echo $vars['summary_image_fit']; ?>; background-position: <?php echo $vars['summary_image_position']; ?>; background-repeat: no-repeat; filter: blur(<?php echo $vars['summary_blur']; ?>px); transform: scale(1.03); }
.sp-summary::after { content: ""; position: absolute; z-index: -1; inset: 0; background: linear-gradient(90deg, rgba(var(--sp-panel-rgb), <?php echo min(.96, $vars['summary_overlay'] + .18); ?>), rgba(var(--sp-panel-rgb), <?php echo $vars['summary_overlay']; ?>) 62%, rgba(var(--sp-panel-rgb), <?php echo max(.16, $vars['summary_overlay'] - .18); ?>)); }
.sp-summary-copy { position: relative; z-index: 1; min-width: 0; }
.sp-summary-copy::after { content: ""; display: block; width: clamp(42px, 8vw, 104px); height: 2px; margin-top: 15px; background: linear-gradient(90deg, var(--sp-accent), color-mix(in srgb, var(--sp-accent-2) 74%, transparent), transparent); }
.sp-summary-frame-none { border: 0; border-radius: 0; }
.sp-summary-frame-line { border: 1px solid color-mix(in srgb, var(--sp-accent) 36%, transparent); }
.sp-summary-frame-glass { border: 1px solid color-mix(in srgb, var(--sp-text) 24%, transparent); box-shadow: 0 24px 64px rgba(0,0,0,.22); backdrop-filter: blur(12px); }
.sp-summary-align-center { text-align: center; }
.sp-summary-align-center .sp-summary-copy { justify-self: center; }
.sp-summary-align-center .sp-counts { justify-content: center; }
.sp-summary-align-end { text-align: right; }
.sp-summary-align-end .sp-summary-copy { justify-self: end; }
.sp-summary-type_only { grid-template-columns: minmax(0, 1fr); align-content: center; }
.sp-summary-type_only::before { background: linear-gradient(135deg, color-mix(in srgb, var(--sp-accent) 16%, var(--sp-bg)), var(--sp-bg)), repeating-linear-gradient(90deg, transparent 0 72px, color-mix(in srgb, var(--sp-text) 6%, transparent) 72px 73px); filter: none; }
.sp-summary-type_only::after { background: linear-gradient(90deg, transparent, rgba(var(--sp-panel-rgb), .28), transparent); }
.sp-summary-type_only .sp-summary-title::before { content: "+"; display: block; margin-bottom: 14px; color: var(--sp-accent); font: 400 1rem/1 var(--sp-font-body); }
.sp-summary-editorial_overlay { align-content: end; border-radius: 0; }
.sp-summary-editorial_overlay .sp-summary-copy { max-width: min(72ch, 76%); }
.sp-summary-editorial_overlay .sp-summary-title { text-shadow: 0 4px 30px rgba(0,0,0,.38); }
.sp-summary-split_stage { grid-template-columns: minmax(0, .9fr) minmax(260px, 1.1fr); align-items: center; }
.sp-summary-split_stage::before { left: 42%; }
.sp-summary-split_stage::after { background: linear-gradient(90deg, rgba(var(--sp-panel-rgb), .94) 0 44%, rgba(var(--sp-panel-rgb), .38) 62%, transparent); }
.sp-summary-split_stage .sp-summary-copy { grid-column: 1; }
.sp-summary-title { margin: 0; font-size: clamp(1.85rem, 4.6vw, 4.5rem); line-height: 1.04; text-wrap: balance; }
.sp-summary-kicker { display: flex; gap: 10px; align-items: center; margin: 0 0 16px; color: var(--sp-accent); font-size: .74rem; }
.sp-summary-kicker::before { content: ""; width: 34px; height: 1px; background: currentColor; }
.sp-summary-text { max-width: 58ch; margin: 10px 0 0; color: var(--sp-muted); }
.sp-counts { display: flex; gap: 18px; flex-wrap: nowrap; justify-content: flex-end; margin: 0; }
.sp-stat { min-width: 58px; padding-left: 12px; border-left: 1px solid color-mix(in srgb, var(--sp-accent) 48%, transparent); }
.sp-stat dt { color: var(--sp-muted); font-size: .7rem; letter-spacing: .08em; text-transform: uppercase; }
.sp-stat dd { margin: 2px 0 0; font-family: var(--sp-font-heading); font-size: 1.45rem; line-height: 1; }
.sp-hero-lockup { position: relative; isolation: isolate; display: inline-flex; flex-direction: column; width: min(100%, calc(<?php echo $vars['logo_width']; ?>px + 44px)); margin-inline: <?php echo $vars['logo_align'] === 'center' ? 'auto' : ($vars['logo_align'] === 'end' ? 'auto 0' : '0 auto'); ?>; }
.sp-hero-lockup.is-text { width: min(100%, 34rem); }
.sp-hero-brand { display: block; width: 100%; max-height: <?php echo $vars['logo_max_height']; ?>px; object-fit: contain; object-position: <?php echo $vars['logo_css_align']; ?> center; }
.sp-hero-subtitle { margin: 7px 0 0; color: var(--sp-muted); font-size: .7rem; letter-spacing: .24em; }
.sp-logo-media { position: relative; isolation: isolate; display: inline-flex; width: min(100%, calc(<?php echo $vars['logo_width']; ?>px + 28px)); }
.sp-logo-image { display: block; width: 100%; max-height: 54px; object-fit: contain; object-position: <?php echo $vars['logo_css_align']; ?> center; }
.sp-logo-treatment-transparent { padding: 0; border: 0; background: transparent; box-shadow: none; }
.sp-logo-treatment-soft_plate { padding: 12px 18px; border-radius: calc(var(--sp-radius) * .65); background: rgba(var(--sp-panel-rgb), .5); box-shadow: 0 16px 40px rgba(0,0,0,.2); }
.sp-logo-treatment-glow { filter: drop-shadow(0 0 14px color-mix(in srgb, var(--sp-accent) 58%, transparent)); }
.sp-logo-treatment-editorial { padding: 12px 4px; border-block: 1px solid color-mix(in srgb, var(--sp-accent) 62%, transparent); background: linear-gradient(90deg, transparent, rgba(var(--sp-panel-rgb), .3) 18% 82%, transparent); }
.sp-logo-treatment-editorial::before, .sp-logo-treatment-editorial::after { content: ""; position: absolute; z-index: -1; width: 8px; height: 8px; border: 1px solid var(--sp-accent); transform: rotate(45deg); }
.sp-logo-treatment-editorial::before { left: -1px; top: -5px; }
.sp-logo-treatment-editorial::after { right: -1px; bottom: -5px; }
.sp-logo-treatment-halo { padding: 16px 22px; }
.sp-logo-treatment-halo::before { content: ""; position: absolute; z-index: -1; inset: -20% -10%; border-radius: 50%; background: radial-gradient(ellipse, color-mix(in srgb, var(--sp-accent) 28%, transparent), color-mix(in srgb, var(--sp-accent-2) 10%, transparent) 44%, transparent 70%); filter: blur(8px); }
.sp-summary-height-compact { grid-template-columns: minmax(0, 1fr) auto; gap: 10px; padding: 14px clamp(16px, 3vw, 28px); }
.sp-summary-height-compact .sp-summary-kicker { margin-bottom: 7px; font-size: .64rem; }
.sp-summary-height-compact .sp-summary-title { font-size: clamp(1.7rem, 5vw, 2.7rem); }
.sp-summary-height-compact .sp-summary-text { display: none; }
.sp-summary-height-compact .sp-summary-copy::after { margin-top: 9px; }
.sp-summary-height-compact .sp-hero-brand { max-height: min(<?php echo $vars['logo_max_height']; ?>px, 72px); }
.sp-summary-height-compact .sp-logo-treatment-soft_plate { padding: 6px 10px; }
.sp-summary-height-compact .sp-logo-treatment-editorial { padding: 6px 2px; }
.sp-summary-height-compact .sp-logo-treatment-halo { padding: 5px 9px; }
.sp-summary-height-compact .sp-counts { gap: 8px; }
.sp-summary-height-compact .sp-stat { min-width: 46px; padding-left: 8px; }
.sp-summary-height-compact .sp-stat dd { font-size: 1.1rem; }
.sp-summary-height-medium { padding: clamp(20px, 4vw, 42px); }
.sp-summary-height-medium .sp-hero-brand { max-height: min(<?php echo $vars['logo_max_height']; ?>px, 130px); }
.sp-movie-showcase { width: 100%; margin-top: clamp(32px, 6vw, 88px); }
.sp-movie-align-start, .sp-movie-align-center, .sp-movie-align-end { width: min(82%, 980px); }
.sp-movie-align-center { margin-inline: auto; }
.sp-movie-align-end { margin-left: auto; }
.sp-movie-heading { display: grid; justify-items: center; margin-bottom: 22px; text-align: center; }
.sp-movie-heading > span { color: var(--sp-accent); font-size: 1.15rem; }
.sp-movie-heading h2 { margin: 2px 0 0; font: 500 clamp(2.1rem, 5vw, 4.7rem)/1 var(--sp-font-heading); }
.sp-movie-heading p { margin: 8px 0 0; color: var(--sp-muted); }
.sp-movie-viewport { position: relative; overflow: hidden; min-height: var(--sp-movie-height); outline: none; touch-action: pan-y; }
.sp-movie-viewport:focus-visible { outline: 2px solid var(--sp-accent); outline-offset: 6px; }
.sp-movie-track { position: relative; height: var(--sp-movie-height); }
.sp-movie-slide { position: absolute; inset: 0 auto auto 50%; width: min(76%, 1120px); margin: 0; opacity: 0; transform: translateX(-50%) scale(.82); transition: transform .55s cubic-bezier(.2,.8,.2,1), opacity .35s ease, filter .35s ease; pointer-events: none; }
.sp-movie-slide.is-active { z-index: 3; opacity: 1; transform: translateX(-50%) scale(1); pointer-events: auto; }
.sp-movie-slide.is-prev { z-index: 2; opacity: .48; transform: translateX(-106%) scale(.82); pointer-events: auto; cursor: pointer; }
.sp-movie-slide.is-next { z-index: 2; opacity: .48; transform: translateX(6%) scale(.82); pointer-events: auto; cursor: pointer; }
.sp-movie-frame { position: relative; overflow: hidden; height: calc(var(--sp-movie-height) - 54px); border: 1px solid color-mix(in srgb, var(--sp-accent) 34%, transparent); background: color-mix(in srgb, var(--sp-bg) 84%, #000); box-shadow: 0 26px 70px rgba(0,0,0,.28); }
.sp-movie-frame video { display: block; width: 100%; height: 100%; object-fit: cover; }
.sp-movie-play { position: absolute; left: 50%; top: 50%; width: 74px; height: 74px; padding: 0; border: 1px solid color-mix(in srgb, var(--sp-text) 76%, transparent); border-radius: 50%; color: var(--sp-text); background: color-mix(in srgb, var(--sp-bg) 38%, transparent); backdrop-filter: blur(8px); transform: translate(-50%, -50%); }
.sp-movie-play span { display: block; width: 0; height: 0; margin-left: 29px; border-top: 10px solid transparent; border-bottom: 10px solid transparent; border-left: 16px solid currentColor; }
.sp-movie-slide.is-playing .sp-movie-play { opacity: 0; }
.sp-movie-slide figcaption { display: flex; gap: 14px; align-items: baseline; padding-top: 12px; }
.sp-movie-slide figcaption span { color: var(--sp-accent); font-variant-numeric: tabular-nums; }
.sp-movie-slide figcaption strong { font-family: var(--sp-font-heading); font-weight: 500; }
.sp-movie-controls { display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; gap: 24px; margin-top: 12px; }
.sp-movie-controls button { padding: 10px 0; border: 0; color: var(--sp-text); background: transparent; }
.sp-movie-controls button:first-child { justify-self: start; }
.sp-movie-controls button:last-child { justify-self: end; }
.sp-movie-controls p { display: flex; gap: 8px; align-items: center; margin: 0; color: var(--sp-muted); font-variant-numeric: tabular-nums; }
.sp-movie-controls i { display: block; width: 42px; height: 1px; background: color-mix(in srgb, var(--sp-text) 32%, transparent); }
.sp-movie-single .sp-movie-controls { display: none; }
.sp-movie-style-grid .sp-movie-heading { justify-items: start; text-align: left; }
.sp-movie-style-grid .sp-movie-viewport, .sp-movie-style-grid .sp-movie-track { height: auto; min-height: 0; }
.sp-movie-style-grid .sp-movie-track { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: var(--sp-card-gap); }
.sp-movie-style-grid .sp-movie-slide { position: relative; inset: auto; width: auto; opacity: 1; transform: none; pointer-events: auto; }
.sp-movie-style-grid .sp-movie-frame { height: auto; aspect-ratio: 16 / 9; }
.sp-movie-style-grid .sp-movie-play { width: 58px; height: 58px; }
.sp-movie-style-grid .sp-movie-play span { margin-left: 23px; border-top-width: 8px; border-bottom-width: 8px; border-left-width: 13px; }
.sp-movie-style-grid .sp-movie-controls { display: none; }
.sp-movie-style-cinema_strip .sp-movie-frame { border-top: 8px solid color-mix(in srgb, var(--sp-bg) 84%, #000); border-bottom: 8px solid color-mix(in srgb, var(--sp-bg) 84%, #000); }
.sp-movie-style-floating_frames .sp-movie-slide.is-prev { transform: translateX(-108%) rotate(-3deg) scale(.78); }
.sp-movie-style-floating_frames .sp-movie-slide.is-next { transform: translateX(8%) rotate(3deg) scale(.78); }
.sp-songs-details > summary { cursor: pointer; list-style: none; }
.sp-songs-details > summary::-webkit-details-marker { display: none; }
.sp-songs-details > summary::after { content: "+"; margin-left: auto; color: var(--sp-accent); font-size: 1.35rem; }
.sp-songs-details[open] > summary::after { content: "−"; }
.sp-songs-details:not([open]) > summary { margin-bottom: 0; }
.sp-count { border: 1px solid rgba(255,255,255,.2); border-radius: 999px; padding: 8px 12px; background: rgba(255,255,255,.08); font-size: .92rem; }
.sp-tags { display: flex; flex-wrap: wrap; gap: 7px; margin-top: 6px; }
.sp-tag { border: 1px solid rgba(255,255,255,.2); color: var(--sp-gold); border-radius: 999px; padding: 3px 9px; font-size: .76rem; background: rgba(0,0,0,.14); }
.sp-filterbar { display: flex; gap: 8px; overflow-x: auto; padding: 12px 0 2px; }
html, body, .sp-filterbar, .sp-section-nav, .sp-pickup, .sp-spotlight-rail, .sp-visual-list, .sp-poster-wall {
  scrollbar-width: thin;
  scrollbar-color: var(--sp-scroll-thumb) var(--sp-scroll-track);
}
.sp-filterbar, .sp-section-nav, .sp-pickup, .sp-spotlight-rail, .sp-visual-list, .sp-poster-wall {
  scrollbar-width: thin;
}
html::-webkit-scrollbar, body::-webkit-scrollbar { width: 10px; }
html::-webkit-scrollbar-track, body::-webkit-scrollbar-track { background: var(--sp-scroll-track); }
html::-webkit-scrollbar-thumb, body::-webkit-scrollbar-thumb { background: var(--sp-scroll-thumb); border: 2px solid transparent; border-radius: 999px; background-clip: padding-box; }
.sp-filterbar::-webkit-scrollbar, .sp-section-nav::-webkit-scrollbar, .sp-pickup::-webkit-scrollbar,
.sp-spotlight-rail::-webkit-scrollbar, .sp-visual-list::-webkit-scrollbar, .sp-poster-wall::-webkit-scrollbar { height: 8px; width: 8px; }
.sp-filterbar::-webkit-scrollbar-track, .sp-section-nav::-webkit-scrollbar-track, .sp-pickup::-webkit-scrollbar-track,
.sp-spotlight-rail::-webkit-scrollbar-track, .sp-visual-list::-webkit-scrollbar-track, .sp-poster-wall::-webkit-scrollbar-track { background: var(--sp-scroll-track); border-radius: 999px; }
.sp-filterbar::-webkit-scrollbar-thumb, .sp-section-nav::-webkit-scrollbar-thumb, .sp-pickup::-webkit-scrollbar-thumb,
.sp-spotlight-rail::-webkit-scrollbar-thumb, .sp-visual-list::-webkit-scrollbar-thumb, .sp-poster-wall::-webkit-scrollbar-thumb {
  background: var(--sp-scroll-thumb); border: 2px solid transparent; border-radius: 999px; background-clip: padding-box;
}
.sp-chip { flex: 0 0 auto; padding: 8px 12px; }
.sp-chip.is-active { background: var(--sp-button); color: var(--sp-button-text); border-color: var(--sp-button); font-weight: 800; }
.sp-panel { display: none; }
.sp-panel.is-active { display: block; }
.sp-section { margin-top: var(--sp-section-gap); }
.sp-section-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; }
.sp-section-title { font-size: 1.55rem; letter-spacing: .08em; margin: 0; }
.sp-pickup { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: var(--sp-card-gap); }
.sp-card { overflow: hidden; display: flex; flex-direction: column; min-height: var(--sp-card-min-height); transition: transform .22s ease, border-color .22s ease; }
.sp-card:hover { transform: translateY(-5px); border-color: color-mix(in srgb, var(--sp-accent) 72%, #fff); }
.sp-card-media { position: relative; display: block; width: 100%; aspect-ratio: var(--sp-card-aspect); overflow: hidden; background: rgba(0,0,0,.28); border-bottom: 1px solid rgba(255,255,255,.12); }
.sp-card img { width: 100%; height: 100%; object-fit: var(--sp-image-fit); display: block; }
.sp-card-info { padding: 16px 18px 18px; min-width: 0; display: flex; flex-direction: column; gap: 5px; flex: 1; }
.sp-card-title { font-size: 1.1rem; font-weight: 800; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.sp-card-sub { color: var(--sp-muted); margin-top: 5px; font-size: .9rem; }
.sp-btn { display: inline-flex; justify-content: center; align-items: center; padding: 8px 12px; font-weight: 800; margin-top: auto; }
.sp-btn.primary { background: var(--sp-button); color: var(--sp-button-text); border: 0; }
.sp-artists { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: var(--sp-card-gap); align-items: start; }
.visually-hidden { position: absolute !important; width: 1px !important; height: 1px !important; padding: 0 !important; margin: -1px !important; overflow: hidden !important; clip: rect(0, 0, 0, 0) !important; white-space: nowrap !important; border: 0 !important; }
.sp-page-layout-spotlight_rail .sp-summary,
.sp-page-layout-spotlight_rail .sp-filterbar { display: none; }
.sp-page-layout-spotlight_rail .sp-tabs { display: none; }
.sp-page-layout-spotlight_rail .sp-panel { display: block; scroll-margin-top: 86px; }
.sp-section-nav { display: flex; gap: 8px; overflow-x: auto; padding: 12px 0 8px; scroll-margin-top: 78px; scroll-snap-type: x proximity; }
.sp-section-link { flex: 0 0 auto; padding: 8px 12px; border: 1px solid color-mix(in srgb, var(--sp-text) 22%, transparent); border-radius: 999px; color: var(--sp-muted); background: rgba(0,0,0,.18); font-size: .82rem; font-weight: 800; transition: color .22s ease, background-color .22s ease, border-color .22s ease; }
.sp-section-link { scroll-snap-align: start; }
.sp-section-link.is-active, .sp-section-link:focus-visible { color: var(--sp-button-text); background: var(--sp-button); border-color: var(--sp-button); }
.sp-spotlight { display: grid; grid-template-columns: 132px minmax(0, 1fr); gap: var(--sp-card-gap); min-height: min(var(--sp-hero-height), calc(100vh - 150px)); margin-top: var(--sp-section-gap); padding: 16px; }
.sp-spotlight-rail { display: grid; grid-auto-rows: 92px; gap: var(--sp-card-gap); align-content: center; overflow-y: auto; padding: 2px 4px 2px 0; }
.sp-spotlight-thumb { display: grid; grid-template-rows: 1fr auto; min-height: 92px; padding: 0; overflow: hidden; border: 1px solid rgba(255,255,255,.24); border-radius: 8px; color: #fff; background: rgba(0,0,0,.28); opacity: .58; cursor: pointer; transition: opacity .22s ease, border-color .22s ease, transform .22s ease; }
.sp-spotlight-thumb:hover { transform: translateY(-2px); opacity: .86; }
.sp-spotlight-thumb.is-active { opacity: 1; border-color: var(--sp-button); box-shadow: 0 0 24px color-mix(in srgb, var(--sp-button) 42%, transparent); }
.sp-spotlight-thumb img { width: 100%; min-height: 0; object-fit: cover; display: block; }
.sp-spotlight-thumb-placeholder { display: grid; min-height: 62px; place-items: center; color: rgba(255,255,255,.55); background: linear-gradient(145deg, rgba(var(--sp-panel-rgb),.92), rgba(255,255,255,.08)); font-size: .62rem; font-weight: 800; }
.sp-spotlight-thumb-label { display: block; overflow: hidden; padding: 4px 5px 5px; color: rgba(255,255,255,.86); background: rgba(0,0,0,.42); font-size: .68rem; line-height: 1.15; text-overflow: ellipsis; white-space: nowrap; }
.sp-spotlight-stage { position: relative; min-width: 0; min-height: 100%; overflow: hidden; border: 1px solid rgba(255,255,255,.2); border-radius: var(--sp-radius); background: linear-gradient(135deg, rgba(11,18,39,.94), rgba(35,16,48,.88)); touch-action: pan-y; }
.sp-spotlight-slides { position: relative; min-height: 100%; height: 100%; }
.sp-spotlight-slide { position: absolute; inset: 0; display: grid; grid-template-columns: minmax(0, 1.08fr) minmax(280px, .92fr); opacity: 0; transform: translateX(22px); visibility: hidden; pointer-events: none; transition: opacity .26s ease, transform .26s ease, visibility 0s linear .26s; }
.sp-spotlight-slide.is-active { opacity: 1; transform: translateX(0); visibility: visible; pointer-events: auto; transition-delay: 0s; }
.sp-spotlight-image-wrap { position: relative; min-width: 0; min-height: 100%; overflow: hidden; background: rgba(0,0,0,.24); }
.sp-spotlight-image { width: 100%; height: 100%; min-height: min(var(--sp-hero-height), 460px); display: block; object-fit: cover; }
.sp-spotlight-image-placeholder { display: grid; width: 100%; height: 100%; min-height: min(var(--sp-hero-height), 460px); place-items: center; color: rgba(255,255,255,.5); background: radial-gradient(circle at 50% 38%, rgba(255,255,255,.12), transparent 42%), rgba(0,0,0,.3); font-size: .76rem; font-weight: 800; letter-spacing: .18em; }
.sp-spotlight-copy { display: flex; flex-direction: column; justify-content: flex-end; align-items: flex-start; min-width: 0; padding: 64px; background: linear-gradient(90deg, rgba(8,11,25,.12), rgba(8,11,25,.76) 18%, rgba(8,11,25,.96)); }
.sp-spotlight-kicker { margin: 0 0 14px; color: var(--sp-gold); font-size: .78rem; font-weight: 900; letter-spacing: .18em; }
.sp-spotlight-copy h3 { max-width: 12ch; margin: 0; font-size: 3.7rem; font-weight: 500; line-height: 1.05; overflow-wrap: anywhere; }
.sp-spotlight-copy h3.is-long { max-width: 16ch; font-size: 2.4rem; line-height: 1.12; }
.sp-spotlight-copy h3.is-very-long { max-width: 20ch; font-size: 1.8rem; line-height: 1.18; }
.sp-spotlight-artist { margin: 14px 0 0; color: var(--sp-muted); font-size: 1.05rem; }
.sp-spotlight-copy .sp-tags { margin-top: 18px; }
.sp-spotlight-cta { margin-top: 28px; min-width: 132px; }
.sp-spotlight-controls { position: absolute; right: 24px; bottom: 22px; display: flex; gap: 8px; }
.sp-spotlight-control { min-width: 68px; padding: 8px 10px; border: 1px solid rgba(255,255,255,.28); border-radius: 999px; color: #fff; background: rgba(0,0,0,.34); cursor: pointer; }
.sp-spotlight-control:disabled { opacity: .35; cursor: not-allowed; }
.sp-spotlight-progress { position: absolute; left: 24px; bottom: 24px; margin: 0; color: rgba(255,255,255,.76); font-size: .86rem; font-variant-numeric: tabular-nums; }
.sp-section-link:focus-visible, .sp-spotlight-thumb:focus-visible, .sp-spotlight-stage:focus-visible, .sp-spotlight-control:focus-visible, .sp-spotlight-cta:focus-visible { outline: 3px solid var(--sp-gold); outline-offset: 3px; }
.sp-page-layout-visual_picker .sp-summary,
.sp-page-layout-visual_picker .sp-filterbar { display: none; }
.sp-visual-picker { display: grid; grid-template-columns: 118px 1fr; gap: var(--sp-card-gap); min-height: min(var(--sp-hero-height), calc(100vh - 110px)); margin-top: var(--sp-section-gap); padding: 16px; }
.sp-visual-list { display: grid; grid-auto-rows: 92px; gap: var(--sp-card-gap); align-content: center; overflow-y: auto; padding-right: 4px; }
.sp-visual-item { border: 1px solid rgba(255,255,255,.28); border-radius: 8px; padding: 0; overflow: hidden; background: rgba(0,0,0,.28); cursor: pointer; opacity: .58; }
.sp-visual-item.is-active { opacity: 1; border-color: var(--sp-button); box-shadow: 0 0 24px color-mix(in srgb, var(--sp-button) 42%, transparent); }
.sp-visual-item img { width: 100%; height: 100%; object-fit: cover; display: block; }
.sp-visual-stage { position: relative; min-height: 100%; border-radius: var(--sp-radius); overflow: hidden; border: 1px solid rgba(255,255,255,.2); background: #101828; }
.sp-visual-stage::before { content: ""; position: absolute; inset: 0; background-image: var(--visual-bg); background-size: cover; background-position: center; opacity: .72; }
.sp-visual-stage::after { content: ""; position: absolute; inset: 0; background: linear-gradient(90deg, rgba(0,0,0,.6), rgba(0,0,0,.15) 55%, rgba(0,0,0,.58)); }
.sp-visual-info { position: absolute; right: 34px; bottom: 34px; z-index: 1; max-width: min(420px, 78vw); text-align: right; }
.sp-visual-info h2 { margin: 0 0 8px; font-size: clamp(2rem, 5vw, 4.6rem); font-weight: 500; line-height: 1; }
.sp-visual-info p { margin: 0 0 18px; color: var(--sp-muted); }
.sp-visual-actions { display: flex; justify-content: flex-end; gap: 10px; }
.sp-visual-picker + .sp-section { margin-top: 24px; }
.sp-pickup-layout-rail .sp-pickup { display: flex; overflow-x: auto; overscroll-behavior-inline: contain; scroll-snap-type: x proximity; padding-bottom: 6px; }
.sp-pickup-layout-rail .sp-card { flex: 0 0 min(360px, 84vw); scroll-snap-align: start; }
.sp-pickup-layout-compact .sp-pickup { grid-template-columns: repeat(2, minmax(0, 1fr)); }
.sp-pickup-layout-compact .sp-card { display: grid; grid-template-columns: 132px 1fr; min-height: 132px; }
.sp-pickup-layout-compact .sp-card-media { height: 100%; aspect-ratio: auto; border-bottom: 0; border-right: 1px solid rgba(255,255,255,.12); }
.sp-artist { align-self: start; padding: 0; overflow: hidden; background: rgba(var(--sp-panel-rgb), var(--sp-card-alpha)); }
.sp-artist-head { width: 100%; display: grid; grid-template-columns: 68px 1fr 32px; gap: 14px; align-items: center; padding: 16px; border: 0; background: color-mix(in srgb, var(--sp-text) 6%, transparent); color: var(--sp-text); text-align: left; cursor: pointer; }
.sp-artist img { width: 62px; height: 62px; border-radius: 8px; object-fit: cover; border: 1px solid rgba(255,255,255,.45); }
.sp-artist-name { font-size: 1.18rem; font-weight: 800; }
.sp-artist-sub { color: var(--sp-muted); font-size: .86rem; margin-top: 2px; }
.sp-artist-body { display: none; padding: 0 14px 14px; }
.sp-artist.is-open > .sp-artist-body { display: block; }
.sp-artist-list { margin: 0; padding: 10px 0 0; list-style: none; border-top: 1px solid rgba(255,255,255,.16); }
.sp-artist-list li { display: grid; grid-template-columns: 1fr auto; gap: 10px; align-items: center; padding: 9px 0; border-bottom: 1px solid rgba(255,255,255,.08); }
.sp-song-table { overflow: hidden; }
.sp-song-row { display: grid; grid-template-columns: 42px 1.7fr 1fr 90px 82px; gap: 10px; align-items: center; padding: 12px 14px; border-bottom: 1px solid rgba(255,255,255,.13); }
.sp-song-row:first-child { color: var(--sp-muted); font-size: .78rem; letter-spacing: .08em; }
.sp-type { justify-self: start; border: 1px solid rgba(255,255,255,.24); border-radius: 999px; padding: 3px 10px; color: var(--sp-accent); font-size: .8rem; }
.sp-search-link { justify-self: end; border-radius: 999px; padding: 7px 12px; background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.22); font-weight: 800; }
.sp-page-layout-cinematic_chapters .sp-panel,
.sp-page-layout-poster_directory .sp-panel { display: block; scroll-margin-top: 88px; }
.sp-page-layout-cinematic_chapters .sp-summary { align-content: end; background: linear-gradient(180deg, transparent, rgba(var(--sp-panel-rgb),.72)); }
.sp-page-layout-cinematic_chapters .sp-summary-title { max-width: 10ch; font-size: clamp(3rem, 9vw, 7.2rem); font-weight: 500; line-height: .98; }
.sp-page-layout-cinematic_chapters .sp-section { margin-top: clamp(54px, 9vw, 120px); }
.sp-page-layout-cinematic_chapters #pickup { margin-top: 32px; }
.sp-cinematic-chapters { display: grid; gap: var(--sp-section-gap); }
.sp-cinematic-chapter { display: grid; grid-template-columns: minmax(0, 1.3fr) minmax(280px, .7fr); gap: var(--sp-card-gap); align-items: center; min-height: min(72vh, var(--sp-hero-height)); }
.sp-cinematic-chapter:nth-child(even) { grid-template-columns: minmax(280px, .7fr) minmax(0, 1.3fr); }
.sp-cinematic-chapter:nth-child(even) .sp-cinematic-media { order: 2; }
.sp-cinematic-media { position: relative; display: block; min-height: min(var(--sp-hero-height), 460px); overflow: hidden; border: 1px solid rgba(255,255,255,.24); border-radius: min(var(--sp-radius), 16px); background: rgba(0,0,0,.32); box-shadow: 0 30px 90px rgba(0,0,0,.38); }
.sp-cinematic-media::after { content: ""; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 55%, rgba(4,6,18,.72)); pointer-events: none; }
.sp-cinematic-media img { width: 100%; height: 100%; min-height: min(var(--sp-hero-height), 460px); position: absolute; inset: 0; object-fit: var(--sp-image-fit); transition: transform .7s cubic-bezier(.2,.7,.2,1); }
.sp-cinematic-media:hover img { transform: scale(1.035); }
.sp-cinematic-number { position: absolute; right: 20px; bottom: 10px; z-index: 1; color: var(--sp-text); font-family: var(--sp-font-heading); font-size: clamp(3rem, 7vw, 6rem); line-height: 1; }
.sp-cinematic-copy > p { margin: 0 0 18px; color: var(--sp-gold); font-size: .76rem; font-weight: 900; letter-spacing: .16em; }
.sp-cinematic-copy h3 { margin: 0; font-size: clamp(2.2rem, 5vw, 4.8rem); font-weight: 500; line-height: 1.06; overflow-wrap: anywhere; }
.sp-cinematic-copy > strong { display: block; margin-top: 18px; color: var(--sp-muted); font-size: 1.05rem; }
.sp-cinematic-copy .sp-tags { margin-top: 22px; }
.sp-cinematic-copy .sp-btn { margin-top: 30px; }
.sp-page-layout-cinematic_chapters .sp-artists { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 22px; }
.sp-page-layout-cinematic_chapters .sp-song-table { border-top: 1px solid rgba(255,255,255,.24); }
.sp-page-layout-cinematic_chapters .sp-song-row { padding-top: 18px; padding-bottom: 18px; background: transparent; }
.sp-page-layout-poster_directory .sp-summary { grid-template-columns: minmax(0, 1fr) auto; border-left: 5px solid var(--sp-accent); }
.sp-page-layout-poster_directory .sp-section { margin-top: 42px; }
.sp-page-layout-media_prologue .sp-shell { width: min(100% - 36px, 1500px); }
.sp-page-layout-media_prologue .sp-topbar { border: 0; border-radius: 0; background: transparent; box-shadow: none; }
.sp-page-layout-media_prologue .sp-panel { display: block; scroll-margin-top: 86px; }
.sp-page-layout-media_prologue .sp-summary { margin-top: clamp(38px, 8vh, 110px); border-radius: 0; }
.sp-page-layout-media_prologue .sp-summary::after { background: linear-gradient(90deg, rgba(var(--sp-panel-rgb), .82), rgba(var(--sp-panel-rgb), .34) 58%, transparent); }
.sp-page-layout-media_prologue .sp-summary-title { max-width: 12ch; font-size: clamp(3rem, 8vw, 8rem); font-weight: 400; line-height: .94; }
.sp-page-layout-media_prologue .sp-section { margin-top: clamp(72px, 12vw, 180px); }
.sp-page-layout-media_prologue .sp-section-head { padding-bottom: 16px; border-bottom: 1px solid color-mix(in srgb, var(--sp-text) 22%, transparent); }
.sp-page-layout-media_prologue .sp-section-title { font-size: clamp(2rem, 4vw, 4.6rem); font-weight: 400; }
.sp-page-layout-media_prologue .sp-pickup { display: flex; overflow-x: auto; scroll-snap-type: x mandatory; padding-bottom: 16px; }
.sp-page-layout-media_prologue .sp-pickup .sp-card { flex: 0 0 min(38vw, 430px); scroll-snap-align: center; }
.sp-page-layout-media_prologue .sp-artists { grid-template-columns: repeat(2, minmax(0, 1fr)); }
.sp-page-layout-media_prologue .sp-footer { margin-top: clamp(90px, 14vw, 200px); }
.sp-page-layout-cinematic_chapters .sp-summary-height-compact .sp-summary-title,
.sp-page-layout-media_prologue .sp-summary-height-compact .sp-summary-title { max-width: 14ch; font-size: clamp(1.8rem, 5vw, 3rem); line-height: 1; }
.sp-page-layout-cinematic_chapters .sp-summary-height-medium .sp-summary-title,
.sp-page-layout-media_prologue .sp-summary-height-medium .sp-summary-title { font-size: clamp(2.4rem, 7vw, 4.8rem); }
.sp-poster-wall { display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: var(--sp-card-gap); }
.sp-poster-card { min-width: 0; }
.sp-poster-card > a { position: relative; display: grid; min-height: var(--sp-card-min-height); overflow: hidden; border: 1px solid color-mix(in srgb, var(--sp-text) 22%, transparent); border-radius: min(var(--sp-radius), 12px); color: var(--sp-text); background: rgba(var(--sp-panel-rgb), var(--sp-card-alpha)); box-shadow: 0 14px 36px rgba(0,0,0,.24); transition: transform .22s ease, border-color .22s ease; }
.sp-poster-card > a:hover { transform: translateY(-5px); border-color: var(--sp-accent); }
.sp-poster-index { position: absolute; top: 10px; left: 10px; z-index: 1; min-width: 36px; padding: 5px 7px; color: #090b18; background: var(--sp-accent); font-size: .72rem; font-weight: 900; text-align: center; }
.sp-poster-media { position: relative; display: block; aspect-ratio: 3 / 4; overflow: hidden; background: rgba(0,0,0,.28); }
.sp-poster-media img { width: 100%; height: 100%; display: block; object-fit: var(--sp-image-fit); }
.sp-card-media::after, .sp-poster-media::after, .sp-spotlight-image-wrap::after, .sp-cinematic-media::before { content: ""; position: absolute; z-index: 3; inset: 0; background: var(--sp-hover-color); opacity: 0; mix-blend-mode: var(--sp-hover-blend); pointer-events: none; transition: opacity .36s ease; }
.sp-card-media img, .sp-poster-media img, .sp-spotlight-image { transition: transform .62s cubic-bezier(.2,.7,.2,1); }
@media (hover: hover) {
  .sp-card:hover .sp-card-media::after, .sp-poster-card:hover .sp-poster-media::after, .sp-spotlight-slide:hover .sp-spotlight-image-wrap::after, .sp-cinematic-chapter:hover .sp-cinematic-media::before { opacity: var(--sp-hover-alpha); }
  .sp-card:hover .sp-card-media img, .sp-poster-card:hover .sp-poster-media img, .sp-spotlight-slide:hover .sp-spotlight-image, .sp-cinematic-chapter:hover .sp-cinematic-media img { transform: scale(var(--sp-hover-zoom)); }
}
.sp-reveal-ready [data-sp-reveal] { opacity: 0; transition: opacity var(--sp-reveal-duration) ease, transform var(--sp-reveal-duration) cubic-bezier(.2,.72,.2,1), clip-path var(--sp-reveal-duration) cubic-bezier(.2,.72,.2,1); }
.sp-reveal-ready.sp-reveal-fade [data-sp-reveal] { transform: translate3d(0, var(--sp-reveal-distance), 0); }
.sp-reveal-ready.sp-reveal-rotate [data-sp-reveal] { transform: translate3d(0, var(--sp-reveal-distance), 0) rotate(3deg) scale(.96); }
.sp-reveal-ready.sp-reveal-unclip [data-sp-reveal] { clip-path: inset(12% 10% 12% 10%); transform: scale(1.04); }
.sp-reveal-ready.sp-reveal-zoom [data-sp-reveal] { transform: scale(.9); }
.sp-reveal-ready [data-sp-reveal].is-revealed { opacity: 1; transform: none; clip-path: inset(0); }
.sp-reveal-ready .sp-card.is-revealed:hover { transform: translateY(-5px); }
.sp-poster-copy { display: grid; gap: 5px; padding: 14px; }
.sp-poster-copy strong { font-size: 1rem; overflow-wrap: anywhere; }
.sp-poster-copy small { color: var(--sp-muted); }
.sp-page-layout-poster_directory .sp-artists { grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 12px; }
.sp-page-layout-poster_directory .sp-artist-head { grid-template-columns: 50px 1fr 22px; gap: 10px; padding: 12px; }
.sp-page-layout-poster_directory .sp-artist img { width: 46px; height: 46px; border-radius: 50%; }
.sp-page-layout-poster_directory .sp-artist-name { font-size: .95rem; }
.sp-page-layout-poster_directory .sp-artist-sub { font-size: .72rem; }
.sp-directory-groups { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 22px; }
.sp-directory-group { min-width: 0; border: 1px solid rgba(255,255,255,.2); background: rgba(var(--sp-panel-rgb), var(--sp-card-alpha)); }
.sp-directory-heading { display: flex; align-items: baseline; justify-content: space-between; gap: 16px; padding: 14px 16px; border-bottom: 1px solid rgba(255,255,255,.2); }
.sp-directory-heading h3 { margin: 0; color: var(--sp-accent); font-size: 1rem; }
.sp-directory-heading span { color: var(--sp-muted); font-size: .7rem; }
.sp-directory-track { display: grid; grid-template-columns: 36px minmax(0, 1.2fr) minmax(0, .8fr) auto; gap: 10px; align-items: center; padding: 12px 14px; border-bottom: 1px solid color-mix(in srgb, var(--sp-text) 10%, transparent); color: var(--sp-text); }
.sp-directory-track:last-child { border-bottom: 0; }
.sp-directory-track > span:first-child { color: var(--sp-gold); font-variant-numeric: tabular-nums; }
.sp-directory-track > span:nth-child(3) { overflow: hidden; color: var(--sp-muted); font-size: .8rem; text-overflow: ellipsis; white-space: nowrap; }
.sp-directory-track > span:last-child { padding: 5px 8px; border: 1px solid rgba(255,255,255,.22); font-size: .72rem; }

/* Layout variants reuse the same searchable song and artist data. */
.sp-page-layout-coverflow_shelf .sp-pickup {
  display: flex; gap: var(--sp-card-gap); overflow-x: auto; padding: 8px 4px 14px;
  scroll-snap-type: x mandatory; perspective: 1200px;
}
.sp-page-layout-coverflow_shelf .sp-pickup .sp-card {
  flex: 0 0 clamp(250px, 34vw, 390px); min-height: var(--sp-card-min-height); scroll-snap-align: center;
  transform: scale(.94); opacity: .78;
}
.sp-page-layout-coverflow_shelf .sp-pickup .sp-card:hover,
.sp-page-layout-coverflow_shelf .sp-pickup .sp-card:focus-within { transform: scale(1); opacity: 1; }
.sp-page-layout-coverflow_shelf .sp-card-media { aspect-ratio: 4 / 3; }

.sp-page-layout-artist_atlas .sp-artists { grid-template-columns: repeat(2, minmax(0, 1fr)); }
.sp-page-layout-artist_atlas .sp-artist-head { min-height: 118px; padding: 20px; }
.sp-page-layout-artist_atlas .sp-artist-head img { width: 72px; height: 72px; }
.sp-page-layout-artist_atlas .sp-artist-name { font-family: var(--sp-font-heading); font-size: 1.35rem; }
.sp-page-layout-artist_atlas .sp-artist-body.is-open { border-top-color: color-mix(in srgb, var(--sp-accent) 58%, transparent); }

.sp-page-layout-setlist_timeline .sp-song-table { padding: 12px 18px 18px 46px; background: rgba(var(--sp-panel-rgb), calc(var(--sp-card-alpha) * .72)); }
.sp-page-layout-setlist_timeline .sp-song-row { position: relative; grid-template-columns: 46px minmax(0, 1.25fr) minmax(0, .75fr) 86px auto; border-left: 1px solid color-mix(in srgb, var(--sp-accent) 54%, transparent); }
.sp-page-layout-setlist_timeline .sp-song-row::before { content: ""; position: absolute; left: -6px; top: 50%; width: 11px; height: 11px; border: 2px solid var(--sp-accent); border-radius: 50%; background: var(--sp-bg); transform: translateY(-50%); box-shadow: 0 0 14px color-mix(in srgb, var(--sp-accent) 65%, transparent); }
.sp-page-layout-setlist_timeline .sp-song-row:first-child::before { display: none; }

.sp-page-layout-tag_atlas .sp-tag-groups { grid-template-columns: repeat(auto-fit, minmax(310px, 1fr)); gap: var(--sp-card-gap); }
.sp-page-layout-tag_atlas .sp-directory-heading { background: linear-gradient(90deg, color-mix(in srgb, var(--sp-accent) 24%, transparent), transparent); }
.sp-page-layout-tag_atlas .sp-directory-heading h3 { color: var(--sp-accent-2); }

.sp-page-layout-duet_matrix .sp-duet-groups { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: var(--sp-card-gap); }
.sp-page-layout-duet_matrix .sp-directory-group { border-color: color-mix(in srgb, var(--sp-gold) 48%, rgba(255,255,255,.18)); }
.sp-page-layout-duet_matrix .sp-directory-heading h3 { max-width: 24ch; color: var(--sp-gold); overflow-wrap: anywhere; }
.sp-page-layout-duet_matrix .sp-directory-track { grid-template-columns: 34px minmax(0, 1fr) 70px auto; }
.sp-footer { margin-top: 32px; padding-top: 18px; border-top: 1px solid color-mix(in srgb, var(--sp-text) 22%, transparent); color: var(--sp-muted); text-align: center; font-size: .86rem; }
@media (max-width: 900px) {
  .sp-shell { width: min(100% - 24px, 680px); }
  .sp-topbar-inner { grid-template-columns: 1fr; }
  .sp-search-form { width: 100%; }
  .sp-tabs { justify-content: flex-start; overflow-x: auto; }
  .sp-summary { grid-template-columns: 1fr; }
  .sp-summary-split_stage { grid-template-columns: 1fr; }
  .sp-summary-split_stage::before { left: 0; }
  .sp-summary-split_stage::after { background: linear-gradient(0deg, rgba(var(--sp-panel-rgb), .92), rgba(var(--sp-panel-rgb), .32)); }
  .sp-summary-editorial_overlay .sp-summary-copy { max-width: 100%; }
  .sp-counts { justify-content: flex-start; }
  .sp-mini-videos { display: flex; overflow-x: auto; scroll-snap-type: x mandatory; padding-bottom: 8px; }
  .sp-mini-video { flex: 0 0 min(78vw, 320px); scroll-snap-align: start; }
  .sp-pickup, .sp-artists { grid-template-columns: 1fr; }
  .sp-spotlight { grid-template-columns: 1fr; min-height: auto; }
  .sp-spotlight-rail { grid-auto-flow: column; grid-auto-columns: 94px; grid-template-rows: 92px; overflow-x: auto; overflow-y: hidden; align-content: start; padding: 2px 0 5px; scroll-snap-type: x mandatory; }
  .sp-spotlight-thumb { scroll-snap-align: start; }
  .sp-spotlight-stage { min-height: min(var(--sp-hero-height), 72svh); }
  .sp-spotlight-slide { grid-template-columns: 1fr; grid-template-rows: 230px 1fr; }
  .sp-spotlight-image { min-height: 0; }
  .sp-spotlight-copy { justify-content: center; padding: 30px 24px 76px; background: linear-gradient(180deg, rgba(8,11,25,.08), rgba(8,11,25,.88) 16%, rgba(8,11,25,.96)); }
  .sp-spotlight-copy { padding-left: 24px; padding-right: 24px; }
  .sp-spotlight-copy h3 { max-width: 100%; font-size: 2.1rem; line-height: 1.12; }
  .sp-spotlight-copy h3.is-long { font-size: 1.65rem; }
  .sp-spotlight-copy h3.is-very-long { font-size: 1.35rem; }
  .sp-spotlight-controls { right: 18px; bottom: 17px; }
  .sp-spotlight-progress { left: 18px; bottom: 20px; }
  .sp-visual-picker { grid-template-columns: 1fr; min-height: auto; }
  .sp-visual-list { grid-auto-flow: column; grid-auto-columns: 86px; grid-template-rows: 86px; overflow-x: auto; overflow-y: hidden; align-content: start; }
  .sp-visual-stage { min-height: min(var(--sp-hero-height), 72svh); }
  .sp-visual-info { left: 18px; right: 18px; bottom: 20px; text-align: left; }
  .sp-visual-actions { justify-content: flex-start; }
  .sp-pickup-layout-compact .sp-pickup { grid-template-columns: 1fr; }
  .sp-song-row { grid-template-columns: 30px 1fr 66px; }
  .sp-song-row span:nth-child(3), .sp-song-row span:nth-child(4) { display: none; }
  .sp-song-row:first-child span:nth-child(5) { display: none; }
  .sp-song-row .sp-search-link { justify-self: stretch; text-align: center; padding-left: 8px; padding-right: 8px; }
  .sp-cinematic-chapter, .sp-cinematic-chapter:nth-child(even) { grid-template-columns: 1fr; gap: 24px; min-height: 0; }
  .sp-cinematic-chapter:nth-child(even) .sp-cinematic-media { order: 0; }
  .sp-cinematic-media, .sp-cinematic-media img { min-height: 56vw; }
  .sp-page-layout-cinematic_chapters .sp-artists { grid-template-columns: 1fr; }
  .sp-page-layout-poster_directory .sp-summary { grid-template-columns: 1fr; }
  .sp-page-layout-poster_directory .sp-counts { justify-content: flex-start; }
  .sp-poster-wall { display: flex; overflow-x: auto; scroll-snap-type: x mandatory; padding-bottom: 8px; }
  .sp-poster-card { flex: 0 0 min(68vw, 280px); scroll-snap-align: start; }
  .sp-movie-align-start, .sp-movie-align-center, .sp-movie-align-end { width: 100%; }
  .sp-movie-heading { justify-items: start; text-align: left; }
  .sp-movie-slide { width: 84%; }
  .sp-movie-slide.is-prev { transform: translateX(-110%) scale(.82); }
  .sp-movie-slide.is-next { transform: translateX(10%) scale(.82); }
  .sp-movie-frame { height: calc(100% - 48px); min-height: 0; }
  .sp-movie-viewport, .sp-movie-track { min-height: 250px; height: max(250px, min(var(--sp-movie-height), 62vw)); }
  .sp-movie-style-grid .sp-movie-viewport, .sp-movie-style-grid .sp-movie-track { height: auto; min-height: 0; }
  .sp-movie-style-grid .sp-movie-track { display: flex; overflow-x: auto; scroll-snap-type: x mandatory; }
  .sp-movie-style-grid .sp-movie-slide { flex: 0 0 min(82vw, 340px); scroll-snap-align: center; }
  .sp-page-layout-media_prologue .sp-tabs { display: none; }
  .sp-page-layout-media_prologue .sp-summary { margin-top: 26px; }
  .sp-page-layout-media_prologue .sp-pickup .sp-card { flex-basis: min(82vw, 340px); }
  .sp-page-layout-media_prologue .sp-artists { grid-template-columns: 1fr; }
  .sp-page-layout-poster_directory .sp-artists { grid-template-columns: repeat(2, minmax(0, 1fr)); }
  .sp-directory-groups { grid-template-columns: 1fr; }
  .sp-page-layout-artist_atlas .sp-artists,
  .sp-page-layout-duet_matrix .sp-duet-groups { grid-template-columns: 1fr; }
  .sp-page-layout-setlist_timeline .sp-song-table { padding-left: 18px; }
  .sp-page-layout-coverflow_shelf .sp-pickup .sp-card { flex-basis: min(82vw, 330px); }
  .sp-motion-layer.is-mobile-layer-hidden,
  .sp-motion-copy.is-mobile-copy-hidden { display: none; }
  .sp-motion-copy { width: min(var(--sp-motion-size), 160px); }
}
@media (max-width: 560px) {
  .sp-page-layout-media_prologue .sp-logo,
  .sp-page-layout-media_prologue .sp-search-submit { display: none; }
  .sp-movie-controls { grid-template-columns: 64px minmax(0, 1fr) 64px; gap: 6px; }
  .sp-movie-controls button { font-size: 0; }
  .sp-movie-controls button span { font-size: 1rem; }
  .sp-summary-height-compact { grid-template-columns: 1fr; align-content: end; }
  .sp-summary-height-compact .sp-counts { justify-content: flex-start; }
  .sp-summary-height-compact .sp-stat dt { display: none; }
  .sp-cinematic-copy h3 { font-size: 2.2rem; }
  .sp-page-layout-poster_directory .sp-artists { grid-template-columns: 1fr; }
  .sp-directory-track { grid-template-columns: 30px minmax(0, 1fr) auto; }
  .sp-directory-track > span:nth-child(3) { display: none; }
}
@media (prefers-reduced-motion: reduce) {
  .sp-reveal-ready [data-sp-reveal] { opacity: 1 !important; transform: none !important; clip-path: none !important; transition: none !important; }
  html { scroll-behavior: auto; }
  body:not(.sp-force-motion) .sp-motion span { animation: none !important; }
  body:not(.sp-force-motion) .sp-motion-anim { animation: none !important; }
  body:not(.sp-force-motion) .sp-card,
  body:not(.sp-force-motion) .sp-section-link,
  body:not(.sp-force-motion) .sp-spotlight-thumb,
  body:not(.sp-force-motion) .sp-spotlight-slide,
  body:not(.sp-force-motion) .sp-movie-slide { transition: none !important; }
}
</style>
</head>
<body class="<?php echo $vars['gloss'] ? 'sp-gloss' : 'sp-flat'; ?> sp-surface-<?php echo special_page_h($vars['surface_mode']); ?><?php echo $force_motion ? ' sp-force-motion' : ''; ?> sp-reveal-<?php echo special_page_h($vars['reveal_effect']); ?> sp-pickup-layout-<?php echo special_page_h($vars['pickup_layout']); ?> sp-page-layout-<?php echo special_page_h($vars['page_layout']); ?>">
<?php if ($bg_video_enabled): ?>
<video class="sp-bg-video" autoplay muted loop playsinline preload="metadata"<?php echo $bg_video_poster ? ' poster="' . special_page_h($bg_video_poster) . '"' : ''; ?> onerror="this.hidden=true">
  <source src="<?php echo special_page_h($bg_video); ?>">
</video>
<?php endif; ?>
<?php echo special_page_render_motion_layers($motion_layers, 'behind', $asset_mode, $slug); ?>
<?php if ($vars['motion_effect'] !== 'none'): ?>
<div class="sp-motion sp-motion-<?php echo special_page_h($vars['motion_effect'] === 'music_notes' ? 'notes' : ($vars['motion_effect'] === 'light_lines' ? 'lines' : 'diamonds')); ?>" aria-hidden="true">
  <?php if ($vars['motion_effect'] === 'music_notes'): ?>
  <span>♪</span><span>♫</span><span>♬</span><span>♪</span><span>♫</span>
  <?php else: ?>
  <span></span><span></span><span></span><span></span><span></span>
  <?php endif; ?>
</div>
<?php endif; ?>
<?php echo special_page_render_motion_layers($motion_layers, 'front', $asset_mode, $slug); ?>
<main id="top" class="sp-shell">
  <header class="sp-topbar<?php echo $show_header_logo ? ' has-brand' : ''; ?>">
    <div class="sp-topbar-inner">
      <?php if ($show_header_logo): ?><div class="sp-logo"><span class="sp-logo-media sp-logo-treatment-<?php echo special_page_h($vars['logo_treatment']); ?>"><img class="sp-logo-image" src="<?php echo special_page_h($logo_image); ?>" alt="<?php echo $title; ?>" onerror="this.closest('.sp-logo').hidden=true"></span></div><?php endif; ?>
      <form class="sp-search-form" action="<?php echo special_page_h(special_page_search_base($asset_mode)); ?>" method="get">
        <input class="sp-search-input" id="spSearchInput" type="search" name="anyword" placeholder="曲名・歌手名・タグで絞り込み / Enterで検索">
        <button class="sp-search-submit" type="submit">検索</button>
      </form>
      <nav class="sp-tabs" aria-label="表示切替">
        <?php foreach ($panel_sections as $index => $section): $panel = $panel_name($section['type']); ?>
        <button type="button" class="sp-tab<?php echo $index === 0 ? ' is-active' : ''; ?>" data-sp-tab="<?php echo special_page_h($panel); ?>"><?php echo special_page_h($section['nav_label']); ?></button>
        <?php endforeach; ?>
      </nav>
    </div>
  </header>

  <section class="sp-summary <?php echo special_page_h($summary_height_class); ?> sp-summary-<?php echo special_page_h($vars['summary_style']); ?> sp-summary-align-<?php echo special_page_h($vars['summary_content_align']); ?> sp-summary-frame-<?php echo special_page_h($vars['summary_frame']); ?>" data-sp-reveal<?php echo ' style="--sp-summary-height:' . (int)$vars['summary_height'] . 'px' . ($summary_image ? ';--sp-summary-image:url(&quot;' . special_page_h(special_page_css_string($summary_image)) . '&quot;)' : '') . '"'; ?>>
    <div class="sp-summary-copy">
      <p class="sp-summary-kicker">SPECIAL MUSIC PORTAL</p>
      <div class="sp-hero-lockup<?php echo $show_hero_logo ? '' : ' is-text'; ?> sp-logo-treatment-<?php echo special_page_h($vars['logo_treatment']); ?>">
        <h1 class="sp-summary-title<?php echo $show_hero_logo ? ' sp-visually-hidden' : ''; ?>"><?php echo $show_hero_logo ? $title : $logo; ?></h1>
        <?php if ($show_hero_logo): ?><img class="sp-hero-brand" src="<?php echo special_page_h($logo_image); ?>" alt="<?php echo $title; ?>" onerror="this.hidden=true;this.previousElementSibling.classList.remove('sp-visually-hidden')"><?php elseif ($logo_sub !== ''): ?><p class="sp-hero-subtitle"><?php echo $logo_sub; ?></p><?php endif; ?>
      </div>
      <p class="sp-summary-text">曲名・歌手・カテゴリから探して、そのままゆかりすたー検索へ進めます。</p>
    </div>
    <?php if ($vars['summary_show_stats']): ?><dl class="sp-counts" aria-label="登録内容">
      <div class="sp-stat"><dt>SONGS</dt><dd><?php echo count($songs); ?></dd></div>
      <div class="sp-stat"><dt>ARTISTS</dt><dd><?php echo $artist_stat_count; ?></dd></div>
      <div class="sp-stat"><dt>TYPES</dt><dd><?php echo count($types); ?></dd></div>
    </dl><?php endif; ?>
  </section>

  <?php if ($vars['movie_position'] === 'after_summary' || !in_array('pickup', array_column($sections, 'type'), true)) echo $movie_showcase_html; ?>

  <?php if ($vars['page_layout'] === 'spotlight_rail'): ?>
  <?php
      $spotlight_sections = [];
      if ($spotlight_songs) $spotlight_sections[] = ['id' => 'spotlight', 'label' => 'SPOTLIGHT', 'active' => true];
      foreach ($sections as $section) {
          $spotlight_sections[] = [
              'id' => $panel_name($section['type']),
              'label' => $section['nav_label'],
              'active' => !$spotlight_songs && !$spotlight_sections,
          ];
      }
      echo special_page_render_section_nav($spotlight_sections);
  ?>
  <?php echo special_page_render_spotlight_hero($spotlight_songs, $asset_mode, $slug); ?>
  <?php endif; ?>

  <?php if ($vars['page_layout'] === 'visual_picker'): $visual_first = $pickup_songs[0] ?? ($songs[0] ?? null); ?>
  <?php if ($visual_first): ?>
  <section class="sp-visual-picker sp-glass" aria-label="PICKUPビジュアル">
    <div class="sp-visual-list">
      <?php foreach ($pickup_songs as $idx => $song): ?>
      <button type="button" class="sp-visual-item<?php echo $idx === 0 ? ' is-active' : ''; ?>"
        data-sp-visual
        data-title="<?php echo special_page_h($song['title'] ?? ''); ?>"
        data-artist="<?php echo special_page_h($song['artist'] ?? ''); ?>"
        data-cover="<?php echo special_page_h(special_page_asset($song['cover'] ?? '', $asset_mode, $slug)); ?>"
        data-url="<?php echo special_page_h($song['play_url'] ?: special_page_search_url(special_page_song_query($song), $asset_mode)); ?>">
        <?php if (!empty($song['cover'])): ?><img src="<?php echo special_page_h(special_page_asset($song['cover'], $asset_mode, $slug)); ?>" alt=""><?php endif; ?>
      </button>
      <?php endforeach; ?>
    </div>
    <div class="sp-visual-stage" id="spVisualStage" style="--visual-bg: url('<?php echo special_page_h(special_page_css_string(special_page_asset($visual_first['cover'] ?? '', $asset_mode, $slug))); ?>');">
      <div class="sp-visual-info">
        <h2 id="spVisualTitle"><?php echo special_page_h($visual_first['title'] ?? ''); ?></h2>
        <p id="spVisualArtist"><?php echo special_page_h($visual_first['artist'] ?? ''); ?></p>
        <div class="sp-visual-actions">
          <a class="sp-btn primary" id="spVisualLink" href="<?php echo special_page_h($visual_first['play_url'] ?: special_page_search_url(special_page_song_query($visual_first), $asset_mode)); ?>">検索</a>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>
  <?php endif; ?>

  <?php if (isset($section_by_type['pickup']) || isset($section_by_type['songs'])): ?>
  <div class="sp-filterbar" aria-label="カテゴリ絞り込み">
    <button type="button" class="sp-chip is-active" data-sp-filter="all">ALL</button>
    <?php foreach ($types as $type => $label): ?><button type="button" class="sp-chip" data-sp-filter="<?php echo special_page_h($type); ?>"><?php echo special_page_h($label); ?></button><?php endforeach; ?>
  </div>
  <?php endif; ?>

  <?php ob_start(); ?>
  <section id="pickup" class="sp-section sp-panel sp-section-variant-<?php echo special_page_h($section_by_type['pickup']['variant'] ?? 'rail'); ?><?php echo $first_panel === 'pickup' ? ' is-active' : ''; ?>" data-sp-panel="pickup" data-sp-reveal>
    <div class="sp-section-head"><h2 class="sp-section-title"><?php echo special_page_h($section_by_type['pickup']['heading'] ?? 'PICKUP'); ?></h2></div>
    <?php if ($vars['page_layout'] === 'cinematic_chapters'): ?>
    <div class="sp-cinematic-chapters">
      <?php foreach ($pickup_songs as $idx => $song): ?>
      <article class="sp-cinematic-chapter" data-sp-reveal data-search-text="<?php echo special_page_h(($song['title'] ?? '') . ' ' . ($song['artist'] ?? '') . ' ' . ($song['tags'] ?? '') . ' ' . ($song['type'] ?? '')); ?>" data-type="<?php echo special_page_h(strtolower($song['type'] ?? '')); ?>">
        <a class="sp-cinematic-media" href="<?php echo special_page_h($song['play_url'] ?: special_page_search_url(special_page_song_query($song), $asset_mode)); ?>">
          <?php if (!empty($song['cover'])): ?><img src="<?php echo special_page_h(special_page_asset($song['cover'], $asset_mode, $slug)); ?>" alt="<?php echo special_page_h($song['title']); ?>"><?php endif; ?>
          <span class="sp-cinematic-number"><?php echo sprintf('%02d', $idx + 1); ?></span>
        </a>
        <div class="sp-cinematic-copy">
          <p>CHAPTER <?php echo sprintf('%02d', $idx + 1); ?></p>
          <h3><?php echo special_page_h($song['title']); ?></h3>
          <strong><?php echo special_page_h($song['artist']); ?></strong>
          <div class="sp-tags"><?php foreach (array_slice(special_page_tags($song['tags'] ?? $song['type']), 0, 4) as $tag): ?><span class="sp-tag">#<?php echo special_page_h($tag); ?></span><?php endforeach; ?></div>
          <a class="sp-btn primary" href="<?php echo special_page_h($song['play_url'] ?: special_page_search_url(special_page_song_query($song), $asset_mode)); ?>">この曲を検索</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
    <?php elseif ($vars['page_layout'] === 'poster_directory'): ?>
    <div class="sp-poster-wall">
      <?php foreach ($pickup_songs as $idx => $song): ?>
      <article class="sp-poster-card" data-sp-reveal data-search-text="<?php echo special_page_h(($song['title'] ?? '') . ' ' . ($song['artist'] ?? '') . ' ' . ($song['tags'] ?? '') . ' ' . ($song['type'] ?? '')); ?>" data-type="<?php echo special_page_h(strtolower($song['type'] ?? '')); ?>">
        <a href="<?php echo special_page_h($song['play_url'] ?: special_page_search_url(special_page_song_query($song), $asset_mode)); ?>">
          <span class="sp-poster-index"><?php echo sprintf('%02d', $idx + 1); ?></span>
          <span class="sp-poster-media"><?php if (!empty($song['cover'])): ?><img src="<?php echo special_page_h(special_page_asset($song['cover'], $asset_mode, $slug)); ?>" alt=""><?php endif; ?></span>
          <span class="sp-poster-copy"><strong><?php echo special_page_h($song['title']); ?></strong><small><?php echo special_page_h($song['artist']); ?></small></span>
        </a>
      </article>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="sp-pickup">
      <?php foreach ($pickup_songs as $song): ?>
      <article class="sp-card" data-sp-reveal data-search-text="<?php echo special_page_h(($song['title'] ?? '') . ' ' . ($song['artist'] ?? '') . ' ' . ($song['tags'] ?? '') . ' ' . ($song['type'] ?? '')); ?>" data-type="<?php echo special_page_h(strtolower($song['type'] ?? '')); ?>">
        <a class="sp-card-media" href="<?php echo special_page_h($song['play_url'] ?: special_page_search_url(special_page_song_query($song), $asset_mode)); ?>">
          <?php if (!empty($song['cover'])): ?><img src="<?php echo special_page_h(special_page_asset($song['cover'], $asset_mode, $slug)); ?>" alt=""><?php endif; ?>
        </a>
        <div class="sp-card-info">
          <div class="sp-card-title"><?php echo special_page_h($song['title']); ?></div>
          <div class="sp-card-sub"><?php echo special_page_h($song['artist']); ?></div>
          <div class="sp-tags">
            <?php foreach (array_slice(special_page_tags($song['tags'] ?? $song['type']), 0, 2) as $tag): ?><span class="sp-tag">#<?php echo special_page_h($tag); ?></span><?php endforeach; ?>
          </div>
          <a class="sp-btn primary" href="<?php echo special_page_h($song['play_url'] ?: special_page_search_url(special_page_song_query($song), $asset_mode)); ?>">検索</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </section>

  <?php $section_html = ['pickup' => ob_get_clean()]; ob_start(); ?>
  <section id="artist" class="sp-section sp-panel sp-section-variant-<?php echo special_page_h($section_by_type['artists']['variant'] ?? 'portrait_grid'); ?><?php echo $first_panel === 'artist' ? ' is-active' : ''; ?>" data-sp-panel="artist" data-sp-reveal>
    <div class="sp-section-head"><h2 class="sp-section-title"><?php echo special_page_h($section_by_type['artists']['heading'] ?? 'ARTIST'); ?></h2><span>開いて曲を検索</span></div>
    <div class="sp-artists">
      <?php foreach ($artists as $artist_index => $artist): $artist_count = special_page_artist_song_count($songs, $artist); $artist_body_id = 'spArtistBody' . (int)$artist_index; ?>
      <article class="sp-artist" data-search-text="<?php echo special_page_h(($artist['name'] ?? '') . ' ' . ($artist['kana'] ?? '')); ?>">
        <button type="button" class="sp-artist-head" data-sp-accordion aria-expanded="false" aria-controls="<?php echo special_page_h($artist_body_id); ?>">
          <?php if (!empty($artist['icon'])): ?><img src="<?php echo special_page_h(special_page_asset($artist['icon'], $asset_mode, $slug)); ?>" alt=""><?php endif; ?>
          <span>
            <span class="sp-artist-name"><?php echo special_page_h($artist['name']); ?></span>
            <span class="sp-artist-sub"><?php echo special_page_h($artist['kana']); ?></span>
            <span class="sp-artist-sub"><?php echo $artist_count; ?>曲</span>
          </span>
          <span>+</span>
        </button>
        <div class="sp-artist-body" id="<?php echo special_page_h($artist_body_id); ?>">
          <ul class="sp-artist-list">
            <?php $i = 0; foreach ($songs as $song): if (!special_page_artist_song_match($artist, $song)) continue; $i++; ?>
            <li>
              <span><?php echo special_page_h($song['title']); ?></span>
              <a class="sp-search-link" href="<?php echo special_page_h($song['play_url'] ?: special_page_search_url(special_page_song_query($song), $asset_mode)); ?>">検索</a>
            </li>
            <?php endforeach; if ($i === 0): ?><li><span>登録曲なし</span><a class="sp-search-link" href="<?php echo special_page_h(special_page_search_url($artist['name'] ?? '', $asset_mode)); ?>">歌手検索</a></li><?php endif; ?>
          </ul>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </section>

  <?php $section_html['artists'] = ob_get_clean(); ob_start(); ?>
  <section id="songs" class="sp-section sp-panel sp-section-variant-<?php echo special_page_h($section_by_type['songs']['variant'] ?? 'search_table'); ?><?php echo $first_panel === 'songs' ? ' is-active' : ''; ?>" data-sp-panel="songs" data-sp-reveal>
    <?php $songs_collapsible = $vars['songs_mode'] !== 'expanded'; ?>
    <?php if ($songs_collapsible): ?><details class="sp-songs-details"<?php echo $vars['songs_mode'] === 'collapsible_open' ? ' open' : ''; ?>><summary class="sp-section-head"><h2 class="sp-section-title"><?php echo special_page_h($section_by_type['songs']['heading'] ?? 'SONGS'); ?></h2><span>一覧から検索</span></summary><?php else: ?><div class="sp-section-head"><h2 class="sp-section-title"><?php echo special_page_h($section_by_type['songs']['heading'] ?? 'SONGS'); ?></h2><span>一覧から検索</span></div><?php endif; ?>
    <?php if ($vars['page_layout'] === 'poster_directory'): ?>
    <?php
      $song_groups = [];
      foreach ($songs as $song_index => $song) {
          $group_key = strtolower(trim((string)($song['type'] ?? 'other'))) ?: 'other';
          $song_groups[$group_key][] = ['index' => $song_index, 'song' => $song];
      }
    ?>
    <div class="sp-directory-groups">
      <?php foreach ($song_groups as $group_key => $group_songs): ?>
      <section class="sp-directory-group" aria-labelledby="spDirectory<?php echo special_page_h($group_key); ?>">
        <div class="sp-directory-heading"><h3 id="spDirectory<?php echo special_page_h($group_key); ?>"><?php echo special_page_h(strtoupper($group_key)); ?></h3><span><?php echo count($group_songs); ?> TRACKS</span></div>
        <?php foreach ($group_songs as $entry): $song = $entry['song']; ?>
        <a class="sp-directory-track" data-search-text="<?php echo special_page_h(($song['title'] ?? '') . ' ' . ($song['artist'] ?? '') . ' ' . ($song['tags'] ?? '') . ' ' . ($song['type'] ?? '')); ?>" data-type="<?php echo special_page_h($group_key); ?>" href="<?php echo special_page_h($song['play_url'] ?: special_page_search_url(special_page_song_query($song), $asset_mode)); ?>">
          <span><?php echo sprintf('%02d', $entry['index'] + 1); ?></span>
          <strong><?php echo special_page_h($song['title']); ?></strong>
          <span><?php echo special_page_h($song['artist']); ?></span>
          <span>検索</span>
        </a>
        <?php endforeach; ?>
      </section>
      <?php endforeach; ?>
    </div>
    <?php elseif ($vars['page_layout'] === 'tag_atlas'): ?>
    <?php
      $tag_groups = [];
      foreach ($songs as $song_index => $song) {
          $song_tags = special_page_tags($song['tags'] ?? '');
          if (!$song_tags) $song_tags = [strtoupper(trim((string)($song['type'] ?? 'OTHER'))) ?: 'OTHER'];
          foreach (array_slice($song_tags, 0, 3) as $tag) {
              $tag_groups[$tag][] = ['index' => $song_index, 'song' => $song];
          }
      }
    ?>
    <div class="sp-directory-groups sp-tag-groups">
      <?php foreach ($tag_groups as $tag => $group_songs): $tag_id = 'spTag' . substr(sha1($tag), 0, 10); ?>
      <section class="sp-directory-group" aria-labelledby="<?php echo $tag_id; ?>">
        <div class="sp-directory-heading"><h3 id="<?php echo $tag_id; ?>">#<?php echo special_page_h($tag); ?></h3><span><?php echo count($group_songs); ?> TRACKS</span></div>
        <?php foreach ($group_songs as $entry): $song = $entry['song']; ?>
        <a class="sp-directory-track" data-search-text="<?php echo special_page_h(($song['title'] ?? '') . ' ' . ($song['artist'] ?? '') . ' ' . ($song['tags'] ?? '') . ' ' . ($song['type'] ?? '')); ?>" data-type="<?php echo special_page_h(strtolower($song['type'] ?? '')); ?>" href="<?php echo special_page_h($song['play_url'] ?: special_page_search_url(special_page_song_query($song), $asset_mode)); ?>">
          <span><?php echo sprintf('%02d', $entry['index'] + 1); ?></span><strong><?php echo special_page_h($song['title']); ?></strong><span><?php echo special_page_h($song['artist']); ?></span><span>検索</span>
        </a>
        <?php endforeach; ?>
      </section>
      <?php endforeach; ?>
    </div>
    <?php elseif ($vars['page_layout'] === 'duet_matrix'): ?>
    <?php
      $duet_groups = [];
      foreach ($songs as $song_index => $song) {
          $relation_count = count($song['artist_ids'] ?? []);
          $song_type = strtolower(trim((string)($song['type'] ?? '')));
          $group = trim((string)($song['artist'] ?? '')) ?: '未分類';
          if ($relation_count < 2 && !in_array($song_type, ['duet', 'unit', 'group'], true)) $group = 'SOLO / OTHER';
          $duet_groups[$group][] = ['index' => $song_index, 'song' => $song];
      }
    ?>
    <div class="sp-directory-groups sp-duet-groups">
      <?php foreach ($duet_groups as $group => $group_songs): $group_id = 'spUnit' . substr(sha1($group), 0, 10); ?>
      <section class="sp-directory-group" aria-labelledby="<?php echo $group_id; ?>">
        <div class="sp-directory-heading"><h3 id="<?php echo $group_id; ?>"><?php echo special_page_h($group); ?></h3><span><?php echo count($group_songs); ?> SONGS</span></div>
        <?php foreach ($group_songs as $entry): $song = $entry['song']; ?>
        <a class="sp-directory-track" data-search-text="<?php echo special_page_h(($song['title'] ?? '') . ' ' . ($song['artist'] ?? '') . ' ' . ($song['tags'] ?? '') . ' ' . ($song['type'] ?? '')); ?>" data-type="<?php echo special_page_h(strtolower($song['type'] ?? '')); ?>" href="<?php echo special_page_h($song['play_url'] ?: special_page_search_url(special_page_song_query($song), $asset_mode)); ?>">
          <span><?php echo sprintf('%02d', $entry['index'] + 1); ?></span><strong><?php echo special_page_h($song['title']); ?></strong><span><?php echo special_page_h(strtoupper($song['type'] ?? '')); ?></span><span>検索</span>
        </a>
        <?php endforeach; ?>
      </section>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="sp-song-table">
      <div class="sp-song-row"><span>#</span><span>SONG</span><span>ARTIST</span><span>TYPE</span><span></span></div>
      <?php foreach ($songs as $idx => $song): ?>
      <div class="sp-song-row" data-search-text="<?php echo special_page_h(($song['title'] ?? '') . ' ' . ($song['artist'] ?? '') . ' ' . ($song['tags'] ?? '') . ' ' . ($song['type'] ?? '')); ?>" data-type="<?php echo special_page_h(strtolower($song['type'] ?? '')); ?>">
        <span><?php echo $idx + 1; ?></span>
        <strong><?php echo special_page_h($song['title']); ?></strong>
        <span><?php echo special_page_h($song['artist']); ?></span>
        <span class="sp-type"><?php echo special_page_h(strtoupper($song['type'])); ?></span>
        <a class="sp-search-link" href="<?php echo special_page_h($song['play_url'] ?: special_page_search_url(special_page_song_query($song), $asset_mode)); ?>">検索</a>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php if ($songs_collapsible): ?></details><?php endif; ?>
  </section>

  <?php $section_html['songs'] = ob_get_clean(); ob_start(); ?>
  <footer id="credit" class="sp-footer"><?php echo special_page_h($content['credit'] ?? ''); ?></footer>
  <?php
      $section_html['credit'] = ob_get_clean();
      foreach ($sections as $section) {
          if ($section['type'] === 'pickup' && $vars['movie_position'] === 'before_pickup') echo $movie_showcase_html;
          echo $section_html[$section['type']] ?? '';
          if ($section['type'] === 'pickup' && $vars['movie_position'] === 'after_pickup') echo $movie_showcase_html;
      }
  ?>
</main>
<script>
(function(){
  var currentFilter = 'all';
  var forceMotion = document.body.classList.contains('sp-force-motion');
  var reducedMotion = !forceMotion && !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);
  var searchInput = document.getElementById('spSearchInput');
  var tabs = document.querySelectorAll('[data-sp-tab]');
  var panels = document.querySelectorAll('[data-sp-panel]');
  var chips = document.querySelectorAll('[data-sp-filter]');
  var filterItems = document.querySelectorAll('[data-search-text]');
  var songsDetails = document.querySelector('.sp-songs-details');

  function openSongsDetails() {
    if (songsDetails) songsDetails.open = true;
  }

  if (reducedMotion) {
    var backgroundVideo = document.querySelector('.sp-bg-video');
    if (backgroundVideo) backgroundVideo.pause();
  }

  var revealItems = Array.prototype.slice.call(document.querySelectorAll('[data-sp-reveal]'));
  if (!reducedMotion && revealItems.length && !document.body.classList.contains('sp-reveal-none')) {
    document.body.classList.add('sp-reveal-ready');
    if ('IntersectionObserver' in window) {
      var revealObserver = new IntersectionObserver(function(entries){
        entries.forEach(function(entry){
          if (!entry.isIntersecting) return;
          entry.target.classList.add('is-revealed');
          revealObserver.unobserve(entry.target);
        });
      }, {rootMargin: '0px 0px -8% 0px', threshold: .12});
      revealItems.forEach(function(item){ revealObserver.observe(item); });
    } else {
      revealItems.forEach(function(item){ item.classList.add('is-revealed'); });
    }
  }

  var miniVideos = Array.prototype.slice.call(document.querySelectorAll('[data-sp-mini-video]'));
  function loadMiniVideo(video) {
    if (video.getAttribute('src')) return;
    var src = video.getAttribute('data-src');
    if (src) { video.setAttribute('src', src); video.load(); }
  }
  document.querySelectorAll('[data-sp-movie-showcase]').forEach(function(showcase){
    var slides = Array.prototype.slice.call(showcase.querySelectorAll('[data-sp-movie-slide]'));
    var viewport = showcase.querySelector('[data-sp-movie-viewport]');
    var currentLabel = showcase.querySelector('[data-sp-movie-current]');
    var status = showcase.querySelector('[data-sp-movie-status]');
    var isGrid = showcase.classList.contains('sp-movie-style-grid');
    var autoplay = showcase.getAttribute('data-sp-movie-autoplay') === '1';
    var index = 0;
    var pointerStart = null;
    function wrapped(value) { return (value + slides.length) % slides.length; }
    function pauseSlide(slide) {
      var video = slide.querySelector('video');
      if (video) video.pause();
      slide.classList.remove('is-playing');
    }
    function playSlide(slide, withSound) {
      var video = slide.querySelector('video');
      if (!video) return;
      video.muted = !withSound;
      loadMiniVideo(video);
      var result = video.play();
      if (result && result.then) result.then(function(){ slide.classList.add('is-playing'); }).catch(function(){});
    }
    function update(nextIndex, announce) {
      if (!slides.length) return;
      index = wrapped(nextIndex);
      var previousIndex = (!isGrid && slides.length > 2) ? wrapped(index - 1) : -1;
      var nextPreviewIndex = (!isGrid && slides.length > 1) ? wrapped(index + 1) : -1;
      slides.forEach(function(slide, slideIndex){
        var active = slideIndex === index;
        slide.classList.toggle('is-active', active);
        slide.classList.toggle('is-prev', slideIndex === previousIndex);
        slide.classList.toggle('is-next', slideIndex === nextPreviewIndex);
        slide.setAttribute('aria-hidden', isGrid || active ? 'false' : 'true');
        var slidePlayButton = slide.querySelector('[data-sp-movie-play]');
        if (slidePlayButton) slidePlayButton.setAttribute('tabindex', isGrid || active ? '0' : '-1');
        if (!active) pauseSlide(slide);
      });
      var activeSlide = slides[index];
      var activeVideo = activeSlide.querySelector('video');
      if (activeVideo) loadMiniVideo(activeVideo);
      if (autoplay && !reducedMotion && !isGrid) playSlide(activeSlide, false);
      if (currentLabel) currentLabel.textContent = String(index + 1).padStart(2, '0');
      if (status && announce) {
        var title = activeSlide.querySelector('figcaption strong');
        status.textContent = (title ? title.textContent : '動画') + 'を表示しました';
      }
    }
    slides.forEach(function(slide, slideIndex){
      var playButton = slide.querySelector('[data-sp-movie-play]');
      var video = slide.querySelector('video');
      if (playButton) playButton.addEventListener('click', function(){
        if (!isGrid && slideIndex !== index) { update(slideIndex, true); return; }
        if (!video) return;
        if (video.paused) playSlide(slide, true); else pauseSlide(slide);
      });
      if (video) {
        video.addEventListener('play', function(){ slide.classList.add('is-playing'); if (playButton) playButton.setAttribute('aria-label', '動画を停止'); });
        video.addEventListener('pause', function(){ slide.classList.remove('is-playing'); if (playButton) playButton.setAttribute('aria-label', '動画を再生'); });
      }
      if (!isGrid) slide.addEventListener('click', function(event){
        if (event.target.closest('[data-sp-movie-play]') || slideIndex === index) return;
        update(slideIndex, true);
      });
    });
    var prev = showcase.querySelector('[data-sp-movie-prev]');
    var next = showcase.querySelector('[data-sp-movie-next]');
    if (prev) prev.addEventListener('click', function(){ update(index - 1, true); });
    if (next) next.addEventListener('click', function(){ update(index + 1, true); });
    if (viewport && !isGrid) {
      viewport.addEventListener('keydown', function(event){
        if (event.key === 'ArrowLeft') { event.preventDefault(); update(index - 1, true); }
        if (event.key === 'ArrowRight') { event.preventDefault(); update(index + 1, true); }
        if (event.key === 'Home') { event.preventDefault(); update(0, true); }
        if (event.key === 'End') { event.preventDefault(); update(slides.length - 1, true); }
      });
      viewport.addEventListener('pointerdown', function(event){ pointerStart = {x:event.clientX, y:event.clientY}; });
      viewport.addEventListener('pointerup', function(event){
        if (!pointerStart) return;
        var dx = event.clientX - pointerStart.x;
        var dy = event.clientY - pointerStart.y;
        pointerStart = null;
        if (Math.abs(dx) < 40 || Math.abs(dx) <= Math.abs(dy)) return;
        update(index + (dx < 0 ? 1 : -1), true);
      });
      viewport.addEventListener('pointercancel', function(){ pointerStart = null; });
    }
    update(0, false);
  });

  function setTab(name) {
    tabs.forEach(function(tab){ tab.classList.toggle('is-active', tab.getAttribute('data-sp-tab') === name); });
    if (name === 'songs') openSongsDetails();
    var continuousLayout = document.body.classList.contains('sp-page-layout-cinematic_chapters') || document.body.classList.contains('sp-page-layout-poster_directory') || document.body.classList.contains('sp-page-layout-media_prologue');
    if (continuousLayout) {
      var target = document.querySelector('[data-sp-panel="' + name + '"]');
      if (target) target.scrollIntoView({ behavior: reducedMotion ? 'auto' : 'smooth', block: 'start' });
      return;
    }
    panels.forEach(function(panel){ panel.classList.toggle('is-active', panel.getAttribute('data-sp-panel') === name); });
  }

  function applyFilter() {
    var word = (searchInput ? searchInput.value : '').trim().toLowerCase();
    if (word) openSongsDetails();
    filterItems.forEach(function(item){
      var text = (item.getAttribute('data-search-text') || '').toLowerCase();
      var type = (item.getAttribute('data-type') || '').toLowerCase();
      var matchWord = !word || text.indexOf(word) !== -1;
      var matchType = currentFilter === 'all' || !type || type === currentFilter;
      item.hidden = !(matchWord && matchType);
    });
  }

  tabs.forEach(function(tab){
    tab.addEventListener('click', function(){ setTab(tab.getAttribute('data-sp-tab')); });
  });
  chips.forEach(function(chip){
    chip.addEventListener('click', function(){
      currentFilter = chip.getAttribute('data-sp-filter') || 'all';
      chips.forEach(function(c){ c.classList.toggle('is-active', c === chip); });
      applyFilter();
    });
  });
  if (searchInput) searchInput.addEventListener('input', applyFilter);
  if (window.location.hash === '#songs') openSongsDetails();
  document.querySelectorAll('[data-sp-accordion]').forEach(function(button){
    button.addEventListener('click', function(){
      var card = button.closest('.sp-artist');
      if (!card) return;
      var willOpen = !card.classList.contains('is-open');
      document.querySelectorAll('.sp-artist.is-open').forEach(function(openCard){
        openCard.classList.remove('is-open');
        var openButton = openCard.querySelector('[data-sp-accordion]');
        if (openButton) openButton.setAttribute('aria-expanded', 'false');
      });
      card.classList.toggle('is-open', willOpen);
      button.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
    });
  });
  document.querySelectorAll('[data-sp-visual]').forEach(function(button){
    button.addEventListener('click', function(){
      var stage = document.getElementById('spVisualStage');
      var title = document.getElementById('spVisualTitle');
      var artist = document.getElementById('spVisualArtist');
      var link = document.getElementById('spVisualLink');
      document.querySelectorAll('[data-sp-visual]').forEach(function(item){ item.classList.toggle('is-active', item === button); });
      if (stage) {
        var cover = (button.getAttribute('data-cover') || '').replace(/[\n\r\f]/g, '').replace(/\\/g, '\\\\').replace(/"/g, '\\"');
        stage.style.setProperty('--visual-bg', 'url("' + cover + '")');
      }
      if (title) title.textContent = button.getAttribute('data-title') || '';
      if (artist) artist.textContent = button.getAttribute('data-artist') || '';
      if (link) link.setAttribute('href', button.getAttribute('data-url') || '#');
    });
  });

  var sectionLinks = document.querySelectorAll('[data-sp-section-link]');
  var sectionTargets = [];
  sectionLinks.forEach(function(link){
    var target = document.getElementById(link.getAttribute('data-sp-section-link'));
    if (target) sectionTargets.push({link: link, target: target});
  });
  function setSectionActive(id) {
    sectionTargets.forEach(function(item){
      var active = item.target.id === id;
      item.link.classList.toggle('is-active', active);
      if (active) item.link.setAttribute('aria-current', 'location');
      else item.link.removeAttribute('aria-current');
    });
  }
  if (sectionTargets.length) {
    if ('IntersectionObserver' in window) {
      var sectionObserver = new IntersectionObserver(function(entries){
        var visible = entries.filter(function(entry){ return entry.isIntersecting; });
        if (visible.length) {
          visible.sort(function(a, b){ return a.boundingClientRect.top - b.boundingClientRect.top; });
          setSectionActive(visible[0].target.id);
        }
      }, {rootMargin: '-18% 0px -62% 0px', threshold: [0, 0.2, 0.6]});
      sectionTargets.forEach(function(item){ sectionObserver.observe(item.target); });
    } else {
      sectionLinks.forEach(function(link){
        link.addEventListener('click', function(){ setSectionActive(link.getAttribute('data-sp-section-link')); });
      });
    }
  }

  var spotlight = document.querySelector('[data-sp-spotlight]');
  if (spotlight) {
    var spotlightStage = spotlight.querySelector('[data-sp-spotlight-stage]');
    var spotlightThumbs = Array.prototype.slice.call(spotlight.querySelectorAll('[data-sp-spotlight-thumb]'));
    var spotlightSlides = Array.prototype.slice.call(spotlight.querySelectorAll('[data-sp-spotlight-slide]'));
    var spotlightCtas = Array.prototype.slice.call(spotlight.querySelectorAll('[data-sp-spotlight-cta]'));
    var spotlightCurrent = spotlight.querySelector('[data-sp-spotlight-current]');
    var spotlightPrev = spotlight.querySelector('[data-sp-spotlight-prev]');
    var spotlightNext = spotlight.querySelector('[data-sp-spotlight-next]');
    var spotlightIndex = 0;
    var pointerStart = null;

    function setSpotlightActive(nextIndex) {
      if (!spotlightSlides.length) return;
      spotlightIndex = Math.max(0, Math.min(spotlightSlides.length - 1, nextIndex));
      spotlightThumbs.forEach(function(thumb, index){
        var active = index === spotlightIndex;
        thumb.classList.toggle('is-active', active);
        thumb.setAttribute('aria-selected', active ? 'true' : 'false');
        thumb.setAttribute('tabindex', active ? '0' : '-1');
        if (active && thumb.scrollIntoView) thumb.scrollIntoView({block: 'nearest', inline: 'nearest', behavior: reducedMotion ? 'auto' : 'smooth'});
      });
      spotlightSlides.forEach(function(slide, index){
        var active = index === spotlightIndex;
        var image = slide.querySelector('[data-sp-spotlight-image]');
        if (active && image && !image.getAttribute('src') && image.getAttribute('data-src')) {
          image.setAttribute('src', image.getAttribute('data-src'));
        }
        slide.classList.toggle('is-active', active);
        slide.setAttribute('aria-hidden', active ? 'false' : 'true');
      });
      spotlightCtas.forEach(function(cta, index){
        var active = index === spotlightIndex;
        if (active) {
          cta.setAttribute('href', cta.getAttribute('data-href') || '#');
          cta.removeAttribute('tabindex');
        } else {
          cta.removeAttribute('href');
          cta.setAttribute('tabindex', '-1');
        }
      });
      if (spotlightCurrent) spotlightCurrent.textContent = String(spotlightIndex + 1);
      if (spotlightPrev) spotlightPrev.disabled = spotlightIndex === 0;
      if (spotlightNext) spotlightNext.disabled = spotlightIndex === spotlightSlides.length - 1;
    }
    function moveSpotlight(step) { setSpotlightActive(spotlightIndex + step); }

    spotlightThumbs.forEach(function(thumb){
      thumb.addEventListener('click', function(){ setSpotlightActive(parseInt(thumb.getAttribute('data-sp-spotlight-thumb'), 10) || 0); });
      thumb.addEventListener('keydown', function(event){
        var nextIndex = null;
        if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') nextIndex = spotlightIndex - 1;
        if (event.key === 'ArrowRight' || event.key === 'ArrowDown') nextIndex = spotlightIndex + 1;
        if (event.key === 'Home') nextIndex = 0;
        if (event.key === 'End') nextIndex = spotlightSlides.length - 1;
        if (nextIndex === null) return;
        event.preventDefault();
        setSpotlightActive(nextIndex);
        if (spotlightThumbs[spotlightIndex]) spotlightThumbs[spotlightIndex].focus();
      });
    });
    if (spotlightPrev) spotlightPrev.addEventListener('click', function(){ moveSpotlight(-1); });
    if (spotlightNext) spotlightNext.addEventListener('click', function(){ moveSpotlight(1); });
    if (spotlightStage) {
      spotlightStage.addEventListener('keydown', function(event){
        if (event.target !== spotlightStage) return;
        if (event.key === 'ArrowLeft') { event.preventDefault(); moveSpotlight(-1); }
        if (event.key === 'ArrowRight') { event.preventDefault(); moveSpotlight(1); }
        if (event.key === 'Home') { event.preventDefault(); setSpotlightActive(0); }
        if (event.key === 'End') { event.preventDefault(); setSpotlightActive(spotlightSlides.length - 1); }
      });
      spotlightStage.addEventListener('pointerdown', function(event){
        pointerStart = {x: event.clientX, y: event.clientY};
        if (spotlightStage.setPointerCapture) spotlightStage.setPointerCapture(event.pointerId);
      });
      spotlightStage.addEventListener('pointerup', function(event){
        if (!pointerStart) return;
        var dx = event.clientX - pointerStart.x;
        var dy = event.clientY - pointerStart.y;
        var threshold = Math.max(48, spotlightStage.clientWidth * .12);
        pointerStart = null;
        if (Math.abs(dx) >= threshold && Math.abs(dx) > Math.abs(dy)) moveSpotlight(dx < 0 ? 1 : -1);
      });
      spotlightStage.addEventListener('pointercancel', function(){ pointerStart = null; });
    }
    setSpotlightActive(0);
  }
})();
</script>
</body>
</html>
<?php
    return ob_get_clean();
}

function special_page_generate($data)
{
    $slug = special_page_slug($data['manifest']['slug']);
    $dir = special_page_save($data);
    $html = special_page_render_html(special_page_load($slug), 'static');
    @file_put_contents($dir . '/index.html', $html);
    return $dir . '/index.html';
}

function special_page_list()
{
    if (!is_dir(SPECIAL_PAGE_ROOT)) return [];
    $items = [];
    foreach (glob(SPECIAL_PAGE_ROOT . '/*', GLOB_ONLYDIR) ?: [] as $dir) {
        $slug = basename($dir);
        $manifest = special_page_json_read($dir . '/manifest.json', []);
        $items[] = [
            'slug' => $slug,
            'title' => $manifest['title'] ?? $slug,
            'updated_at' => $manifest['updated_at'] ?? '',
            'generated' => is_file($dir . '/index.html'),
        ];
    }
    usort($items, function ($a, $b) {
        return strcmp($a['slug'], $b['slug']);
    });
    return $items;
}
?>
