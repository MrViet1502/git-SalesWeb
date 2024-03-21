<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
?>
<?php
$product = new product();
$brand = new brand;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $loaisanpham_name = $_POST['loaisanpham_name'];
    $danhmuc_id = $_POST['danhmuc_id'];
	$insert_brand = $brand ->insert_brand($danhmuc_id,$loaisanpham_name);

}
?>
        <div class="admin-content-right">
            <h1>Nhập thông tin cần thêm</h1>
            <div class="subcartegory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                     <select required="required" name="danhmuc_id" id="">
                        <option value="">--Chọn--</option>
                        <?php
                        $show_danhmuc = $product ->show_danhmuc();
                        if($show_danhmuc){while($result=$show_danhmuc->fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['danhmuc_id'] ?>"><?php echo $result['danhmuc_ten'] ?></option>
                        <?php
                        }}
                        ?>
                    </select><br>
                    <label for="">Vui lòng chọn loại sản phẩm<span style="color: red;">*</span></label> <br>
                    <input class="subcartegory-input" type="text" name="loaisanpham_name">
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