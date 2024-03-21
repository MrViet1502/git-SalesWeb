<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
 ?>
<?php
$brand = new brand;
if (isset($_GET['color_id'])|| $_GET['color_id']!=NULL){
    $color_id = $_GET['color_id'];
    }
    $delete_color = $brand -> delete_color($color_id);
    header('Location:colorlist.php');
?>
