<?php

function special_page_schema_version()
{
    return 4;
}

function special_page_schema_default_sections()
{
    return [
        ['id' => 'pickup', 'type' => 'pickup', 'enabled' => 1, 'nav_label' => 'PICKUP', 'heading' => 'PICKUP', 'variant' => 'rail'],
        ['id' => 'artists', 'type' => 'artists', 'enabled' => 1, 'nav_label' => 'ARTIST', 'heading' => 'ARTIST', 'variant' => 'portrait_grid'],
        ['id' => 'songs', 'type' => 'songs', 'enabled' => 1, 'nav_label' => 'SONGS', 'heading' => 'SONGS', 'variant' => 'search_table'],
        ['id' => 'credit', 'type' => 'credit', 'enabled' => 1, 'nav_label' => 'CREDIT', 'heading' => 'CREDIT', 'variant' => 'compact'],
    ];
}

function special_page_valid_entity_id($id)
{
    return preg_match('/\A[a-z][a-z0-9_-]{2,63}\z/', (string)$id) === 1;
}

function special_page_make_stable_id($prefix, $seed, &$used)
{
    $prefix = preg_replace('/[^a-z0-9_]+/', '', strtolower((string)$prefix));
    if ($prefix === '') $prefix = 'item_';
    $base = $prefix . substr(sha1((string)$seed), 0, 10);
    $id = $base;
    $suffix = 2;
    while (isset($used[$id])) {
        $id = substr($base, 0, 60) . '_' . $suffix;
        $suffix++;
    }
    $used[$id] = true;
    return $id;
}

function special_page_preserve_or_make_id($candidate, $prefix, $seed, &$used)
{
    $candidate = trim((string)$candidate);
    if (special_page_valid_entity_id($candidate) && !isset($used[$candidate])) {
        $used[$candidate] = true;
        return $candidate;
    }
    return special_page_make_stable_id($prefix, $seed, $used);
}

function special_page_normalize_id_list($value)
{
    if (is_array($value)) {
        $items = $value;
    } else {
        $items = preg_split('/[,、\s]+/u', (string)$value);
    }
    $result = [];
    foreach ((array)$items as $item) {
        $item = trim((string)$item);
        if ($item !== '' && special_page_valid_entity_id($item) && !in_array($item, $result, true)) $result[] = $item;
    }
    return $result;
}

function special_page_normalize_artist_name($value)
{
    $value = trim((string)$value);
    if ($value === '') return '';
    $value = strtr($value, [
        '＆' => '&',
        '＋' => '+',
        '／' => '/',
        '＼' => '/',
        '，' => ',',
        '、' => ',',
        '・' => '/',
        '×' => '/',
        '✕' => '/',
        '✖' => '/',
    ]);
    if (function_exists('mb_convert_kana')) $value = mb_convert_kana($value, 'asKV', 'UTF-8');
    $value = preg_replace('/\s+/u', '', $value);
    if (!is_string($value)) $value = trim((string)$value);
    return function_exists('mb_strtolower') ? mb_strtolower($value, 'UTF-8') : strtolower($value);
}

function special_page_merge_legacy_cv($name, $cv)
{
    $name = trim((string)$name);
    $cv = trim((string)$cv);
    if ($cv === '' || preg_match('/[（(][^）)]*[）)]/u', $name)) return $name;
    return $name === '' ? $cv : $name . '(' . $cv . ')';
}

function special_page_legacy_song_artist_ids($song, $artists)
{
    $song_artist = special_page_normalize_artist_name($song['artist'] ?? '');
    if ($song_artist === '') return [];

    $artist_by_name = [];
    foreach (is_array($artists) ? $artists : [] as $artist) {
        if (!is_array($artist)) continue;
        $artist_id = trim((string)($artist['id'] ?? ''));
        $artist_name = special_page_normalize_artist_name($artist['name'] ?? '');
        if ($artist_id === '' || $artist_name === '') continue;
        $artist_by_name[$artist_name][] = $artist_id;
    }

    // Prefer the artist record for the complete singer name, especially for units.
    if (isset($artist_by_name[$song_artist])) {
        return array_values(array_unique($artist_by_name[$song_artist]));
    }

    $parts = preg_split('/[&+\/,]/u', $song_artist, -1, PREG_SPLIT_NO_EMPTY);
    if (!is_array($parts)) return [];
    $relations = [];
    foreach ($parts as $part) {
        $part = trim($part);
        if (!isset($artist_by_name[$part])) continue;
        foreach ($artist_by_name[$part] as $artist_id) {
            if (!in_array($artist_id, $relations, true)) $relations[] = $artist_id;
        }
    }
    return $relations;
}

function special_page_exact_song_artist_ids($song, $artists)
{
    $song_artist = special_page_normalize_artist_name($song['artist'] ?? '');
    if ($song_artist === '') return [];
    $matches = [];
    foreach (is_array($artists) ? $artists : [] as $artist) {
        if (!is_array($artist)) continue;
        if (special_page_normalize_artist_name($artist['name'] ?? '') !== $song_artist) continue;
        $artist_id = trim((string)($artist['id'] ?? ''));
        if ($artist_id !== '' && !in_array($artist_id, $matches, true)) $matches[] = $artist_id;
    }
    return $matches;
}

function special_page_legacy_partial_artist_ids($song, $artists)
{
    $haystacks = [
        special_page_normalize_artist_name($song['artist'] ?? ''),
        special_page_normalize_artist_name($song['tags'] ?? ''),
    ];
    $matches = [];
    foreach (is_array($artists) ? $artists : [] as $artist) {
        if (!is_array($artist)) continue;
        $needles = [
            special_page_normalize_artist_name($artist['name'] ?? ''),
            special_page_normalize_artist_name($artist['kana'] ?? ''),
        ];
        foreach ($needles as $needle) {
            if ($needle === '') continue;
            foreach ($haystacks as $haystack) {
                if ($haystack === '') continue;
                if (mb_strpos($haystack, $needle) === false && mb_strpos($needle, $haystack) === false) continue;
                $artist_id = trim((string)($artist['id'] ?? ''));
                if ($artist_id !== '' && !in_array($artist_id, $matches, true)) $matches[] = $artist_id;
                break 2;
            }
        }
    }
    return $matches;
}

function special_page_same_id_set($left, $right)
{
    $left = array_values(array_unique(array_map('strval', (array)$left)));
    $right = array_values(array_unique(array_map('strval', (array)$right)));
    sort($left, SORT_STRING);
    sort($right, SORT_STRING);
    return $left === $right;
}

function special_page_normalize_sections($sections)
{
    $allowed_types = ['pickup', 'artists', 'songs', 'credit'];
    $allowed_variants = [
        'pickup' => ['rail', 'mosaic', 'feature_stack'],
        'artists' => ['portrait_grid', 'split_profiles', 'avatar_index'],
        'songs' => ['search_table', 'tracklist', 'grouped_directory'],
        'credit' => ['compact'],
    ];
    $normalized = [];
    $used = [];
    $used_types = [];
    foreach (is_array($sections) ? $sections : [] as $index => $section) {
        if (!is_array($section)) continue;
        $type = (string)($section['type'] ?? '');
        if (!in_array($type, $allowed_types, true) || isset($used_types[$type])) continue;
        $used_types[$type] = true;
        $id = special_page_preserve_or_make_id($section['id'] ?? '', 'section_', $type . '|' . $index, $used);
        $variants = $allowed_variants[$type];
        $variant = (string)($section['variant'] ?? $variants[0]);
        if (!in_array($variant, $variants, true)) $variant = $variants[0];
        $normalized[] = [
            'id' => $id,
            'type' => $type,
            'enabled' => !empty($section['enabled']) ? 1 : 0,
            'nav_label' => trim((string)($section['nav_label'] ?? strtoupper($type))),
            'heading' => trim((string)($section['heading'] ?? strtoupper($type))),
            'variant' => $variant,
        ];
    }
    return $normalized ?: special_page_schema_default_sections();
}

function special_page_motion_templates()
{
    return [
        'static' => '静止',
        'float' => '浮遊',
        'sway' => 'ゆらゆら',
        'drift' => '漂流',
        'rise' => '上昇',
        'fall' => '下降',
        'spin' => '回転',
    ];
}

function special_page_motion_layer_defaults()
{
    return [
        'id' => '',
        'enabled' => 1,
        'image' => '',
        'template' => 'sway',
        'count' => 12,
        'size_min' => 24,
        'size_max' => 72,
        'opacity' => 55,
        'area_x_min' => 0,
        'area_x_max' => 100,
        'area_y_min' => 0,
        'area_y_max' => 100,
        'duration_min' => 7,
        'duration_max' => 13,
        'drift_x' => 18,
        'drift_y' => -24,
        'rotation' => 12,
        'seed' => '',
        'position' => 'front',
    ];
}

function special_page_motion_number($value, $min, $max, $fallback)
{
    if (!is_numeric($value)) return $fallback;
    $number = (float)$value;
    if (!is_finite($number)) return $fallback;
    return max($min, min($max, $number));
}

function special_page_motion_string($value, $fallback = '')
{
    return is_scalar($value) || $value === null ? trim((string)$value) : $fallback;
}

function special_page_motion_image_is_safe($path)
{
    $path = special_page_motion_string($path);
    if ($path === '' || strlen($path) > 2048 || preg_match('/[\x00-\x1F\x7F]/', $path)) return false;
    if (preg_match('#(?:^|/)\.\.(?:/|$)#', str_replace('\\', '/', $path))) return false;
    if (preg_match('#^[a-z][a-z0-9+.-]*:#i', $path) && !preg_match('#^https?://#i', $path)) return false;
    return true;
}

function special_page_normalize_motion_layers($layers)
{
    $result = [];
    $used = [];
    $templates = special_page_motion_templates();
    foreach (array_slice(is_array($layers) ? $layers : [], 0, 3) as $index => $layer) {
        if (!is_array($layer)) continue;
        $image = special_page_motion_string($layer['image'] ?? '');
        if (!special_page_motion_image_is_safe($image)) continue;
        $id = special_page_preserve_or_make_id(
            special_page_motion_string($layer['id'] ?? ''),
            'motion_',
            $image . '|' . ($layer['template'] ?? '') . '|' . $index,
            $used
        );
        $size_min = special_page_motion_number($layer['size_min'] ?? 24, 8, 320, 24);
        $size_max = special_page_motion_number($layer['size_max'] ?? 72, 8, 320, 72);
        if ($size_min > $size_max) [$size_min, $size_max] = [$size_max, $size_min];
        $x_min = special_page_motion_number($layer['area_x_min'] ?? 0, 0, 100, 0);
        $x_max = special_page_motion_number($layer['area_x_max'] ?? 100, 0, 100, 100);
        if ($x_min > $x_max) [$x_min, $x_max] = [$x_max, $x_min];
        $y_min = special_page_motion_number($layer['area_y_min'] ?? 0, 0, 100, 0);
        $y_max = special_page_motion_number($layer['area_y_max'] ?? 100, 0, 100, 100);
        if ($y_min > $y_max) [$y_min, $y_max] = [$y_max, $y_min];
        $duration_min = special_page_motion_number($layer['duration_min'] ?? 7, 1, 120, 7);
        $duration_max = special_page_motion_number($layer['duration_max'] ?? 13, 1, 120, 13);
        if ($duration_min > $duration_max) [$duration_min, $duration_max] = [$duration_max, $duration_min];
        $template = special_page_motion_string($layer['template'] ?? 'sway', 'sway');
        if (!isset($templates[$template])) $template = 'sway';
        $seed = substr(special_page_motion_string($layer['seed'] ?? ''), 0, 128);
        if ($seed === '') $seed = substr(hash('sha256', $id . '|' . $image), 0, 24);
        $result[] = [
            'id' => $id,
            'enabled' => !empty($layer['enabled']) ? 1 : 0,
            'image' => $image,
            'template' => $template,
            'count' => (int)special_page_motion_number($layer['count'] ?? 12, 1, 30, 12),
            'size_min' => $size_min,
            'size_max' => $size_max,
            'opacity' => special_page_motion_number($layer['opacity'] ?? 55, 0, 100, 55),
            'area_x_min' => $x_min,
            'area_x_max' => $x_max,
            'area_y_min' => $y_min,
            'area_y_max' => $y_max,
            'duration_min' => $duration_min,
            'duration_max' => $duration_max,
            'drift_x' => special_page_motion_number($layer['drift_x'] ?? 18, -1000, 1000, 18),
            'drift_y' => special_page_motion_number($layer['drift_y'] ?? -24, -1000, 1000, -24),
            'rotation' => special_page_motion_number($layer['rotation'] ?? 12, 0, 1080, 12),
            'seed' => $seed,
            'position' => (special_page_motion_string($layer['position'] ?? 'front') === 'behind') ? 'behind' : 'front',
        ];
    }
    return $result;
}

function special_page_migrate_project($data)
{
    if (!is_array($data)) $data = [];
    $data['manifest'] = is_array($data['manifest'] ?? null) ? $data['manifest'] : [];
    $data['theme'] = is_array($data['theme'] ?? null) ? $data['theme'] : [];
    $data['content'] = is_array($data['content'] ?? null) ? $data['content'] : [];
    $songs = is_array($data['content']['songs'] ?? null) ? $data['content']['songs'] : [];
    $artists = is_array($data['content']['artists'] ?? null) ? $data['content']['artists'] : [];

    $artist_ids = [];
    foreach ($artists as $index => &$artist) {
        if (!is_array($artist)) $artist = [];
        $artist['name'] = special_page_merge_legacy_cv($artist['name'] ?? '', $artist['cv'] ?? '');
        unset($artist['cv']);
        $seed = ($artist['name'] ?? '') . '|' . ($artist['kana'] ?? '') . '|' . $index;
        $artist['id'] = special_page_preserve_or_make_id($artist['id'] ?? '', 'artist_', $seed, $artist_ids);
    }
    unset($artist);

    $song_ids = [];
    foreach ($songs as $index => &$song) {
        if (!is_array($song)) $song = [];
        $song['artist'] = special_page_merge_legacy_cv($song['artist'] ?? '', $song['cv'] ?? '');
        unset($song['cv']);
        $seed = ($song['title'] ?? '') . '|' . ($song['artist'] ?? '') . '|' . $index;
        $song['id'] = special_page_preserve_or_make_id($song['id'] ?? '', 'song_', $seed, $song_ids);
        $relation_mode = $song['artist_relation_mode'] ?? null;
        $has_saved_mode = in_array($relation_mode, ['explicit', 'legacy_inference'], true);
        if (!$has_saved_mode) $relation_mode = array_key_exists('artist_ids', $song) ? 'explicit' : 'legacy_inference';
        $relations = $relation_mode === 'explicit'
            ? special_page_normalize_id_list($song['artist_ids'] ?? [])
            : special_page_legacy_song_artist_ids($song, $artists);
        // Older v2 builds stored partial-name matches without recording their origin.
        // Repair only that legacy shape; once a mode is saved, explicit IDs are authoritative.
        if (!$has_saved_mode && $relation_mode === 'explicit' && count($relations) > 1) {
            $exact_relations = special_page_exact_song_artist_ids($song, $artists);
            $legacy_partial_relations = special_page_legacy_partial_artist_ids($song, $artists);
            if ($exact_relations && special_page_same_id_set($relations, $legacy_partial_relations)) $relations = $exact_relations;
        }
        $song['artist_ids'] = array_values(array_intersect($relations, array_keys($artist_ids)));
        $song['artist_relation_mode'] = $relation_mode;
    }
    unset($song);

    $data['manifest']['schema_version'] = special_page_schema_version();
    $data['content']['artists'] = $artists;
    $data['content']['songs'] = $songs;
    $data['content']['sections'] = special_page_normalize_sections($data['content']['sections'] ?? []);
    $data['theme']['motion_layers'] = special_page_normalize_motion_layers($data['theme']['motion_layers'] ?? []);
    return $data;
}
