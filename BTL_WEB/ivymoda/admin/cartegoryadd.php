<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
?>
<?php
$cartegory = new cartegoty;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cartegory_name = $_POST['cartegory_name'];
	$insert_cartegory = $cartegory ->insert_cartegory($cartegory_name);

}
?>
        <div class="admin-content-right">
            <h1>Nhập thông tin danh mục cần thêm</h1>
            <div class="cartegory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Vui lòng nhập danh mục cần thêm<span style="color: red;">*</span></label> <br>
                    <input type="text" name="cartegory_name">
                    <button class="admin-btn" type="submit">Gửi</button>             
                </form>
            </div>           
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  