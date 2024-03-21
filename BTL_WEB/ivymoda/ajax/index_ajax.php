<?php
include "../class/index_class.php";

?>
<?php
$index = new index;
$text = $_GET['text']
?>

<?php
$search_text = $index ->search_text($text);
if($search_text) {while($result = $search_text ->fetch_assoc()){

?>

<div class="search-result-item">
    <img src="admin/uploads/<?php echo $result['baiviet_anh'] ?>" alt="">
    <h1><a href="baiviet.php?baiviet_id=<?php echo $result['baiviet_id'] ?>"><?php echo $result['baiviet_tieude'] ?></a></h1>
    <p><a href="danhmuc.php?danhmuc_id=<?php echo $result['danhmuc_id'] ?> "><?php echo $result['danhmuc_ten'] ?></a></p>
</div>
<?php
}}
?>