<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/comment_class.php');
 ?>
<?php
$comment = new comment();
if (!isset($_GET['question_id'])|| $_GET['question_id']==NULL){
    echo "<script>window.location = 'cartegorylist.php'</script>";
	 }
else {$question_id = $_GET['question_id'];
    }
    $delete_question = $comment  -> delete_question($question_id);
    header('Location:questionlist.php');
?>