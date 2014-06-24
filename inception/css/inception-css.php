<?php
/*
Theme name: Inception
Theme URI: http://www.redmexico.com.mx
Version: 1.0
Author: bitcero
Author URI: http://www.bitcero.info
*/

header('Content-type: text/css');
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
require dirname(dirname(dirname(dirname(__FILE__)))).'/mainfile.php';

$xoopsLogger->activated = false;
$xtAssembler->loadTheme('inception');
$theme = $xtAssembler->theme();
$xtColor = new XtColor();

include 'default.css';
?>
