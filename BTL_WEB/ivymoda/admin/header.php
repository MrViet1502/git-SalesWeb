<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/lib/session.php');
require_once(__ROOT__ . '/admin/lib/database.php');
require_once(__ROOT__ . '/helper/format.php');
require_once(__ROOT__ . '/admin/class/cartegory_class.php');
require_once(__ROOT__ . '/admin/class/brand_class.php');
require_once(__ROOT__ . '/admin/class/comment_class.php');
require_once(__ROOT__ . '/admin/class/product_class.php');
require_once(__ROOT__ . '/admin/class/admin_class.php');
Session::init();
Session::checkSession()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <title>Admin-Ivy</title>
</head>

<body>