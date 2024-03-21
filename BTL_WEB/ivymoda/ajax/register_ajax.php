<?php
include "../class/index_class.php";
Session::init();
?>
<?php
$index = new index;
$user_ten = $_GET['user_ten'];
$check_register = $index -> check_register($user_ten);
if($check_register) {echo $check_register ;}
?>

