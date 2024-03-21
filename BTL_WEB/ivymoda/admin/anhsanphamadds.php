<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
?>
<?php
$product = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sanpham_id = $_POST['sanpham_id'];
    $file_name = $_FILES['sanpham_anh']['name'];
    $file_temp = $_FILES['sanpham_anh']['tmp_name'];
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $sp_anh = substr(md5(time()),0,10).'.'.$file_ext;
    $upload_image = "uploads/".$sp_anh;
    move_uploaded_file( $file_temp,$upload_image);
	$insert_anhsp =$product ->insert_anhsp($sanpham_id,$sp_anh);

}
?>
        <div class="admin-content-right">
            <h1>Thêm thông tin về ảnh cần thêm</h1>
            <div class="subcartegory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Chọn mã sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="sanpham_id">
                        <option value="">--Chọn--</option>
                        <?php
                        $show_product = $product ->show_product();
                        if($show_product){while($result=$show_product->fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['sanpham_id'] ?>"><?php echo $result['sanpham_ma'] ?></option>
                        <?php
                        }}
                        ?>
                    </select> <br>
                    <label for="">Ảnh Sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="file" name="sanpham_anh"> <br>   
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