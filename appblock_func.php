<?php
/**
 * appblock_func.php
 *
 * ゆかナビ (モバイルアプリ) からのアクセス遮断。
 *
 * config.ini の appblock=1 で有効になり、User-Agent がアプリのパターン
 * (既定: UnityPlayer / YukaNavi) に一致するリクエストを遮断する。
 *
 *   - /api/ 配下 (アプリ専用の JSON ファサード) → JSON でメッセージを返す
 *   - それ以外の Web ページ                     → 案内 HTML + 自動ジャンプ
 *
 * 遮断時の HTTP ステータスを 403 ではなく 200 にしているのは意図的。
 * アプリの HTTP クライアント (UnityWebRequest 等) は 4xx を「通信エラー」
 * として扱いボディを読まずに独自の文言を出すことがあり、それでは
 * appblock_msg が端末に届かない。/api/ の失敗は HTTP コードではなく
 * エンベロープの ok:false で表現する仕様 (api/README.md) なので、
 * 200 + {"ok":false,"error":...} の方が確実にメッセージを届けられる。
 *
 * 一度案内ページを表示した端末には Cookie を発行し、以後の Web ページは
 * 通す。これはジャンプ先の検索画面から先 (曲の予約等) が操作できなくなる
 * のを防ぐため。遮断の目的は「アプリのネイティブ機能を止めて Web 版へ
 * 誘導する」ことであり、Web 版そのものを使わせないことではない。
 */

/** 案内ページ表示済みの端末に発行する Cookie 名。 */
define('APPBLOCK_COOKIE', 'YkariAppWebFallback');

/**
 * config.ini から urldecode 済みの設定値を取得する。
 * commonfunc.php より前に読み込まれるため configbool() 等には依存しない。
 */
function appblock_conf($key, $default)
{
    global $config_ini;
    if (!is_array($config_ini) || !array_key_exists($key, $config_ini)) {
        return $default;
    }
    $value = urldecode((string)$config_ini[$key]);
    return ($value === '') ? $default : $value;
}

/** 遮断機能が有効か。 */
function appblock_enabled()
{
    return appblock_conf('appblock', '0') == 1;
}

/** Web ページ (HTML) へのアクセスも遮断するか。 */
function appblock_web_enabled()
{
    return appblock_conf('appblock_web', '1') == 1;
}

/** 端末に返すメッセージ。 */
function appblock_message()
{
    return appblock_conf('appblock_msg', 'ゆかナビからのアクセスをオフにしています');
}

/** 自動ジャンプ先の URL。 */
function appblock_redirect_url()
{
    return appblock_conf('appblock_url', 'http://ykr.moe:11059/search_bs5.php');
}

/** アプリ判定に使う User-Agent の正規表現パターン。 */
function appblock_ua_pattern()
{
    return appblock_conf('appblock_ua', 'UnityPlayer|YukaNavi|ゆかナビ');
}

/**
 * リクエスト元がアプリか。
 * ゆかナビは Unity 製で、ネイティブ API 呼び出しも内蔵ブラウザも
 * "UnityPlayer/... (UnityWebRequest/...)" の User-Agent を送る。
 */
function appblock_is_app_client()
{
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if ($ua === '') {
        return false;
    }
    $pattern = appblock_ua_pattern();
    if ($pattern === '') {
        return false;
    }
    // 設定値をそのまま正規表現として使うため、区切り文字の衝突を避けて #...# で囲む
    return (bool)@preg_match('#' . str_replace('#', '\#', $pattern) . '#iu', $ua);
}

/** /api/ 配下 (アプリ専用 API) へのリクエストか。 */
function appblock_is_api_request()
{
    foreach (['SCRIPT_NAME', 'SCRIPT_FILENAME', 'PHP_SELF'] as $key) {
        $path = $_SERVER[$key] ?? '';
        if ($path === '') {
            continue;
        }
        // Windows の SCRIPT_FILENAME は区切りが円記号なので / に寄せてから判定する
        $path = str_replace(DIRECTORY_SEPARATOR, '/', $path);
        if (preg_match('#/api/[^/]+\.php$#i', $path)) {
            return true;
        }
    }
    return false;
}

/** JSON を期待しているリクエストか (/api/ 外の JSON エンドポイント向け)。 */
function appblock_wants_json()
{
    if (strcasecmp($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '', 'XMLHttpRequest') === 0) {
        return true;
    }
    $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
    if ($accept !== '' && stripos($accept, 'application/json') !== false
        && stripos($accept, 'text/html') === false) {
        return true;
    }
    $self = basename($_SERVER['SCRIPT_NAME'] ?? '');
    return ($self !== '' && preg_match('#_json\.php$#i', $self) === 1);
}

/**
 * ジャンプ先ページ自身へのアクセスか。
 * 遮断 → ジャンプ → また遮断 の無限ループを防ぐために除外する。
 */
function appblock_is_redirect_target()
{
    $path = parse_url(appblock_redirect_url(), PHP_URL_PATH);
    if (!is_string($path) || $path === '') {
        return false;
    }
    $target = basename($path);
    $self   = basename($_SERVER['SCRIPT_NAME'] ?? '');
    return ($target !== '' && $self !== '' && strcasecmp($target, $self) === 0);
}

/** JSON でメッセージを返して終了する。 */
function appblock_exit_json()
{
    if (!headers_sent()) {
        header('Content-Type: application/json; charset=utf-8');
    }
    echo json_encode([
        'ok'       => false,
        'error'    => appblock_message(),
        'blocked'  => 'appblock',
        'redirect' => appblock_redirect_url(),
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

/** 案内 HTML を表示し、ジャンプ先へ自動遷移させて終了する。 */
function appblock_exit_html()
{
    $url = appblock_redirect_url();
    $msg = appblock_message();
    if (!headers_sent()) {
        // 案内ページを見た端末は以後 Web 版として通す (ジャンプ先から先の操作を残す)
        setcookie(APPBLOCK_COOKIE, '1', 0, '/');
        header('Content-Type: text/html; charset=utf-8');
    }
    $url_attr = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    $url_js   = json_encode($url, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    $msg_html = htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
    echo <<<HTML
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="3;url={$url_attr}">
<title>{$msg_html}</title>
<style>
body{font-family:sans-serif;margin:0;padding:3em 1.5em;text-align:center;
     background:#f8ece0;color:#333;line-height:1.7;}
h1{font-size:1.25rem;margin:0 0 1em;}
p{margin:0 0 1em;font-size:0.95rem;}
a.btn{display:inline-block;padding:0.7em 1.6em;border-radius:6px;
      background:#0d6efd;color:#fff;text-decoration:none;font-weight:bold;}
</style>
</head>
<body>
<h1>{$msg_html}</h1>
<p>3秒後に Web 版の検索画面へ移動します。</p>
<p><a class="btn" href="{$url_attr}">今すぐ移動する</a></p>
<script>
setTimeout(function(){ location.replace({$url_js}); }, 3000);
</script>
</body>
</html>
HTML;
    exit;
}

/**
 * 遮断の判定と実行。commonfunc.php の先頭 (config 読み込み直後) から呼ぶ。
 */
function appblock_guard()
{
    if (PHP_SAPI === 'cli') {
        return;
    }
    if (!appblock_enabled() || !appblock_is_app_client()) {
        return;
    }
    // 設定画面の管理者は常に通す (アプリ経由でも設定を戻せるように)
    if (($_SERVER['PHP_AUTH_USER'] ?? '') === 'admin') {
        return;
    }

    // アプリ専用 API は常に遮断する
    if (appblock_is_api_request()) {
        appblock_exit_json();
    }

    if (!appblock_web_enabled()) {
        return;
    }
    if (appblock_is_redirect_target()) {
        return;
    }
    if (!empty($_COOKIE[APPBLOCK_COOKIE])) {
        return;
    }

    if (appblock_wants_json()) {
        appblock_exit_json();
    }
    appblock_exit_html();
}
