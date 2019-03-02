<?php
/*
Theme name: Inception
Theme URI: http://www.redmexico.com.mx
Version: 1.0
Author: bitcero
Author URI: http://www.bitcero.info
*/

$xoopsOption['nocommon'] = 1;
include dirname(dirname(dirname(dirname(__FILE__)))).'/mainfile.php';

$file = isset($_GET['f']) ? $_GET['f'] : '';

$file = str_replace(".", '', $file);
$file = XOOPS_VAR_PATH.'/caches/xoops_cache/inception/'.$file.'.png';
if (!file_exists($file)) {
    die($file);
}

header('Content-type: image/png');
header('Cache-control: no-store');
header('Expires: 0');
header('Content-Transfer-Encoding: binary');
header('Content-Lenght: '.filesize($file));
//now creates the image
readfile($file);
exit();
