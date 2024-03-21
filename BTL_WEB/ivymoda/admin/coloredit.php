<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
?>
<?php
$brand = new brand;
if (isset($_GET['color_id'])|| $_GET['color_id']!=NULL){
    $color_id = $_GET['color_id'];
    }
    $get_color = $brand -> get_color($color_id);
    if($get_color){$resul = $get_color ->fetch_assoc();}

?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $color_ten = $_POST['color_ten'];
    $file_name = $_FILES['color_anh']['name'];
    $file_temp = $_FILES['color_anh']['tmp_name'];
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $color_anh = substr(md5(time()),0,10).'.'.$file_ext;
    $upload_image = "uploads/".$color_anh;
    move_uploaded_file( $file_temp,$upload_image);
	$update_color = $brand ->update_color($color_ten,$color_anh,$color_id);

}
?>
        <div class="admin-content-right">
            <div class="subcartegory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Tên màu sắc<span style="color: red;">*</span></label> <br>
                    <input value="<?php echo $resul['color_ten'] ?>" class="subcartegory-input" type="text" name="color_ten"> <br>
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                    <img style="width: 100px; height: 100px" src="uploads/<?php echo $resul['color_anh'] ?>" alt="">
                    <input required type="file" name="color_anh"> <br>   
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