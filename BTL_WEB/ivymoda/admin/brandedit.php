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
if (isset($_GET['loaisanpham_id'])|| $_GET['loaisanpham_id']!=NULL){
    $loaisanpham_id = $_GET['loaisanpham_id'];
    }
    $get_brand = $brand -> get_brand($loaisanpham_id);
    if($get_brand){$resul = $get_brand ->fetch_assoc();}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $loaisanpham_ten = $_POST['loaisanpham_ten'];
    $danhmuc_id = $_POST['danhmuc_id'];
	$update_brand = $brand->update_brand($loaisanpham_ten,$danhmuc_id,$loaisanpham_id);

}
?>
        <div class="admin-content-right">
            <div class="cartegory-add-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                     <select required="required" name="danhmuc_id" id="">
                        <option value="">--Chọn--</option>
                        <?php
                        $show_danhmuc = $product ->show_danhmuc();
                        if($show_danhmuc){while($result=$show_danhmuc->fetch_assoc()){
                        ?>
                        <option <?php if($resul['danhmuc_id'] == $result['danhmuc_id']) {echo "selected";} ?> value="<?php echo $result['danhmuc_id'] ?>"><?php echo $result['danhmuc_ten'] ?></option>
                        <?php
                        }}
                        ?>
                    </select><br>
                    <label for="">Vùi lòng chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                    <input class="subcartegory-input" type="text" value="<?php echo $resul['loaisanpham_ten'] ?>" name="loaisanpham_ten">
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