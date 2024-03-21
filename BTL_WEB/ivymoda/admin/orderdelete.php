<?php
include "header.php";
include "leftside.php";
// include "class/product_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// include "class/product_class.php";
// require_once(__ROOT__.'../admin/class/product_class.php');
 ?>
<?php
$product = new product();
if (!isset($_GET['session_idA'])|| $_GET['session_idA']==NULL){
    echo "<script>window.location = 'orderlistall.php'</script>";
	 }
else {$session_idA = $_GET['session_idA'];
    }
    $delete_payment = $product  -> delete_payment($session_idA);
    $delete_order =  $product -> delete_order($session_idA);
    $delete_cart =  $product -> delete_cart($session_idA);

    header('Location:orderlistall.php');
?>