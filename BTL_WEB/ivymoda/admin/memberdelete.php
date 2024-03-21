<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/admin_class.php');
 ?>


<?php
$admin = new admin;
if (!isset($_GET['id'])|| $_GET['id']==NULL){
    echo "no";
	 }
else {$id = $_GET['id'];
    }
    $delete_admin = $admin  -> delete_member($id);
    
    header('Location:memberlist.php');
?>