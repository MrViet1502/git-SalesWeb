<?php
include "../class/index_class.php";

?>
<?php
$index = new index;
if(isset($_GET['baiviet_id']) && $_GET['content'] && $_GET['user_ten'] && $_GET['question_id'] )
{
    $baiviet_id = $_GET['baiviet_id'];
    $content = $_GET['content'];
    $user_ten = $_GET['user_ten'];
    $question_id = $_GET['question_id'];
    $insert_question_answer = $index -> insert_question_answer($baiviet_id,$content,$user_ten,$question_id);
}
else {
    echo "không get được chế ơi";
}
?>

