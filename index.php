<?php
include "config.php";
include "class/database.php";
session_start();

$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/artikel/index';
$segments = explode('/', trim($path, '/'));
$mod = $segments[0] ?? 'artikel';
$page = $segments[1] ?? 'index';
$file = "module/$mod/$page.php";

include "template/header.php";
if (file_exists($file)) {
  include $file;
} else {
  echo "<div class='alert alert-danger'>Modul tidak ditemukan: $mod/$page</div>";
}
include "template/footer.php";
?>