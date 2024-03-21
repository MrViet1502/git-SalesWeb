<?php
include "../class/index_class.php";

?>
<?php
$index = new index;
if(isset($_GET['baiviet_id'])&&$_GET['comment']&&$_GET['user_id'])
{
    $baiviet_id = $_GET['baiviet_id'];
    $content = $_GET['comment'];
    $comment_user = $_GET['user_id'];
    $insert_comment = $index -> insertcomment($baiviet_id,$content,$comment_user);
}
else {
    echo "không get được chế ơi";
}
?>

<?php
$show_comment = $index ->showcomment($baiviet_id);
if($show_comment){while($result=$show_comment->fetch_assoc()){

?>

<div class="baiviet-content-left-comment-anwer-item">
    <div class="baiviet-content-left-comment-anwer-item-img">
        <img style="width:20px; float:left" src="images/user.png" alt="">
        <p><?php echo $result['comment_user'] ?></p>
    </div>
    <div class="baiviet-content-left-comment-anwer-item-text">
        <p><?php echo $result['comment_noidung'] ?></p>
    </div>
</div>

<?php
}}
?>