<?php

require_once dirname(__DIR__) . '/special_page_schema.php';

function assert_same_value($expected, $actual, $message)
{
    if ($expected !== $actual) {
        fwrite(STDERR, $message . PHP_EOL);
        fwrite(STDERR, 'Expected: ' . var_export($expected, true) . PHP_EOL);
        fwrite(STDERR, 'Actual:   ' . var_export($actual, true) . PHP_EOL);
        exit(1);
    }
}

function migrated_song($song, $artists)
{
    $project = special_page_migrate_project([
        'content' => [
            'songs' => [$song],
            'artists' => $artists,
        ],
    ]);
    return $project['content']['songs'][0];
}

function migrated_song_artist_ids($song, $artists)
{
    return migrated_song($song, $artists)['artist_ids'];
}

function assert_song_relation_mode($expected, $song, $artists, $message)
{
    assert_same_value($expected, migrated_song($song, $artists)['artist_relation_mode'], $message);
}

$artists = [
    ['id' => 'artist_a', 'name' => 'Alice'],
    ['id' => 'artist_b', 'name' => 'Bob'],
    ['id' => 'artist_pair', 'name' => 'Alice & Bob'],
    ['id' => 'artist_tag', 'name' => 'Tag Match'],
];

assert_same_value(
    ['artist_pair'],
    migrated_song_artist_ids([
        'title' => 'Explicit composite',
        'artist' => 'Alice & Bob',
        'artist_ids' => ['artist_pair'],
    ], $artists),
    'explicit composite artist_ids must be preserved without adding individual artists'
);
assert_song_relation_mode(
    'explicit',
    ['artist' => 'Alice & Bob', 'artist_ids' => ['artist_pair']],
    $artists,
    'artist_ids key must default the relation mode to explicit'
);

assert_same_value(
    [],
    migrated_song_artist_ids([
        'title' => 'Explicit empty',
        'artist' => 'Alice',
        'artist_ids' => [],
    ], $artists),
    'an explicit empty artist_ids must not trigger legacy inference'
);
assert_song_relation_mode(
    'explicit',
    ['artist' => 'Alice', 'artist_ids' => []],
    $artists,
    'an explicit empty artist_ids must still be marked explicit'
);

assert_same_value(
    ['artist_pair'],
    migrated_song_artist_ids([
        'title' => 'Legacy composite',
        'artist' => 'Alice ＆ Bob',
        'tags' => 'Tag Match',
    ], $artists),
    'legacy data must prefer the exact composite artist record and ignore tags'
);
assert_song_relation_mode(
    'legacy_inference',
    ['artist' => 'Alice ＆ Bob', 'tags' => 'Tag Match'],
    $artists,
    'legacy data without artist_ids must be marked legacy_inference'
);

assert_same_value(
    ['artist_a', 'artist_b'],
    migrated_song_artist_ids([
        'title' => 'Legacy split',
        'artist' => 'Alice + Bob',
        'tags' => 'Tag Match',
    ], [
        $artists[0],
        $artists[1],
        $artists[3],
    ]),
    'legacy data without a composite record must assign exact individual names only'
);
assert_song_relation_mode(
    'legacy_inference',
    ['artist' => 'Alice + Bob', 'tags' => 'Tag Match'],
    [$artists[0], $artists[1], $artists[3]],
    'legacy split data must be marked legacy_inference'
);

assert_same_value(
    ['artist_pair'],
    migrated_song_artist_ids([
        'title' => 'Old v2 partial-match result',
        'artist' => 'Alice & Bob',
        'artist_ids' => ['artist_a', 'artist_b', 'artist_pair'],
    ], $artists),
    'old v2 data without a relation mode must collapse partial matches to the exact performer'
);

assert_same_value(
    ['artist_a', 'artist_b', 'artist_pair'],
    migrated_song_artist_ids([
        'title' => 'Authoritative explicit result',
        'artist' => 'Alice & Bob',
        'artist_ids' => ['artist_a', 'artist_b', 'artist_pair'],
        'artist_relation_mode' => 'explicit',
    ], $artists),
    'saved explicit mode must remain authoritative'
);

assert_same_value(
    ['artist_a', 'artist_pair'],
    migrated_song_artist_ids([
        'title' => 'Old v2 intentional subset',
        'artist' => 'Alice & Bob',
        'artist_ids' => ['artist_a', 'artist_pair'],
    ], $artists),
    'mode-less IDs that do not equal the old inference result must not be rewritten'
);

$legacyCvProject = special_page_migrate_project([
    'content' => [
        'artists' => [
            ['id' => 'artist_voice', 'name' => 'Singer', 'cv' => 'Voice Actor'],
        ],
        'songs' => [
            ['title' => 'Legacy CV song', 'artist' => 'Singer', 'cv' => 'Voice Actor'],
        ],
    ],
]);
assert_same_value(
    'Singer(Voice Actor)',
    $legacyCvProject['content']['artists'][0]['name'],
    'legacy artist CV must be merged into the performer name'
);
assert_same_value(
    false,
    array_key_exists('cv', $legacyCvProject['content']['artists'][0]),
    'legacy artist CV field must be removed after migration'
);
assert_same_value(
    'Singer(Voice Actor)',
    $legacyCvProject['content']['songs'][0]['artist'],
    'legacy song CV must be merged into the performer name'
);
assert_same_value(
    false,
    array_key_exists('cv', $legacyCvProject['content']['songs'][0]),
    'legacy song CV field must be removed after migration'
);

$staleCvProject = special_page_migrate_project([
    'content' => [
        'artists' => [
            ['id' => 'artist_named', 'name' => '月見ヤチヨ(早見沙織)', 'cv' => '逢坂りん'],
        ],
        'songs' => [],
    ],
]);
assert_same_value(
    '月見ヤチヨ(早見沙織)',
    $staleCvProject['content']['artists'][0]['name'],
    'a complete performer name must not append a stale CV value'
);

echo "special page artist relation tests passed\n";
