<?php

include "header.php";
include "leftside.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// include "class/product_class.php";
// require_once(__ROOT__.'../admin/class/product_class.php');
?>
<?php
$product = new product();
if (isset($_GET['sanpham_id'])|| $_GET['sanpham_id']!=NULL){
    $sanpham_id = $_GET['sanpham_id'];
    }
    $get_sanpham = $product -> get_sanpham($sanpham_id);
    if($get_sanpham){$resul = $get_sanpham ->fetch_assoc();}
  
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
	$update_product = $product ->update_product($_POST,$_FILES,$sanpham_id );
    // header('Location:brandlist.php');
}
?>
 <div class="admin-content-right">
        <h1>Nhập thông tin của sản phẩm cần thêm </h1>
            <div class="product-add-content">
                <?php
                if(isset($insert_product)){echo $insert_product; }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                    <input value="<?php echo $resul['sanpham_tieude'] ?>" required type="text" name="sanpham_tieude"> <br>
                    <label  for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
                    <input value="<?php echo $resul['sanpham_ma'] ?>" required type="text" name="sanpham_ma"> <br>
                    <!-- <label for="">Ngày bài viết<span style="color: red;">*</span></label> <br>
                    <input type="text" name="baiviet_ngay"> <br>
                    <label for="">Tác giả bài viết<span style="color: red;">*</span></label> <br>
                    <input type="text" name="baiviet_tacgia"> <br> -->
                    <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                    <select required="required" name="danhmuc_id" id="danhmuc_id">
                        <option value="">--Chọn--</option>
                        <?php
                        $show_danhmuc = $product ->show_danhmuc();
                        if($show_danhmuc){while($result=$show_danhmuc->fetch_assoc()){
                        ?>
                        <option <?php if($resul['danhmuc_id']== $result['danhmuc_id']) {echo "selected";} ?> value="<?php echo $result['danhmuc_id'] ?>"><?php echo $result['danhmuc_ten'] ?></option>
                        <?php
                        }}
                        ?>
                    </select>
                    <label for="">Chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="loaisanpham_id" id="loaisanpham_id">
                         <option value="">--Chọn--</option>
                        <?php
                        $show_loaisanpham = $product ->show_loaisanpham();
                        if($show_loaisanpham){while($result=$show_loaisanpham->fetch_assoc()){
                        ?>
                        <option <?php if($resul['loaisanpham_id']== $result['loaisanpham_id']) {echo "selected";} ?> value="<?php echo $result['loaisanpham_id'] ?>"><?php echo $result['loaisanpham_ten'] ?></option>
                        <?php
                        }}
                        ?>
                      
                    </select>
                    <label for="">Chọn Màu sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="color_id" id="">
                        <option value="">--Chọn--</option>
                        <?php
                        $show_color = $product ->show_color();
                        if($show_color){while($result=$show_color->fetch_assoc()){
                        ?>
                        <option  <?php if($resul['color_id']== $result['color_id']) {echo "selected";} ?> value="<?php echo $result['color_id'] ?>"><?php echo $result['color_ten'] ?></option>
                        <?php
                        }}
                        ?>
                    </select>
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
                    <input value="<?php echo $resul['sanpham_gia'] ?>" required type="text" name="sanpham_gia"> <br>  
                    <label for="">Chi tiết<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor"  required name="sanpham_chitiet" cols="60" rows="5"><?php echo $resul['sanpham_chitiet'] ?></textarea><br>  
                    <label  for="">Bảo quản<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor" required name="sanpham_baoquan" cols="60" rows="5"><?php echo $resul['sanpham_baoquan'] ?></textarea><br> 
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                    <img style="width: 100px; height: 100px" src="uploads/<?php echo $resul['sanpham_anh'] ?>"> <br> 
                    <input  type="file" name="sanpham_anh"> <br>   
                    <label for="">Ảnh Sản phẩm<span style="color: red;">*</span></label> <br>
                    <div class="sanpham-anh">
                         <?php
                          $get_anh = $product -> get_anh($sanpham_id);                        
                          if($get_anh){while($resultA=$get_anh->fetch_assoc()){
                        ?>
                         <img style="width: 100px; height: 100px" src="uploads/<?php echo $resultA['sanpham_anh'] ?>">
                         <?php
                        }}
                        ?>
                    </div>
                    <input type="file" multiple  name="sanpham_anhs[]"> <br>   
                    <button class="admin-btn" name="submit" type="submit">Gửi</button>  
                </form>
            </div>           
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
//     $(".ckeditor").each(function(){
//         CKEDITOR.replace( this.id, {
// 	filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
// 	filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
// } );
//     })
CKEDITOR.replace( 'ckeditor', {
	filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
	filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
} );
    

    </script>
    <script>
    $(document).ready(function(){
        $("#danhmuc_id").change(function(){
            // alert($(this).val())
            var x = $(this).val()
            $.get ("ajax/productadd_ajax.php", {danhmuc_id:x}, function(data) {
                $("#loaisanpham_id").html(data);
            })

        })
    })
</script>
</body>
</html>  