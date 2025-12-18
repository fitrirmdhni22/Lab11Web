<?php
// module/user/logout.php
session_start();
session_destroy();
header("Location: /lab11_php_oop/user/login");
exit;
?>