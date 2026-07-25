<?php
require_once 'commonfunc.php';
require_once 'easyauth_class.php';
require_once 'special_page_func.php';

$easyauth = new EasyAuth();
$easyauth->do_eashauthcheck();

$slug = $_GET['slug'] ?? '';
$data = special_page_load($slug);

header('Content-Type: text/html; charset=UTF-8');
$force_motion = (($_GET['preview_motion'] ?? '') === '1');
echo special_page_render_html($data, 'preview', $force_motion);
?>
