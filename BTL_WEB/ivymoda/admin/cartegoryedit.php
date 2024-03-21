<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
?>
<?php
$cartegory = new cartegoty();
if (isset($_GET['danhmuc_id'])|| $_GET['danhmuc_id']!=NULL){
    $danhmuc_id = $_GET['danhmuc_id'];
    }
    $get_cartegory = $cartegory -> get_cartegory($danhmuc_id);
    if($get_cartegory){$resul = $get_cartegory ->fetch_assoc();}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $danhmuc_ten = $_POST['danhmuc_ten'];
	$update_cartegory = $cartegory->update_cartegory($danhmuc_ten,$danhmuc_id);

}
?>
        <div class="admin-content-right">
            <div class="cartegory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Vùi lòng danh mục<span style="color: red;">*</span></label> <br>
                    <input type="text" name="danhmuc_ten" value="<?php echo $resul['danhmuc_ten'] ?>">
                    <button class="admin-btn" type="submit">Sửa</button>             
                </form>
            </div>           
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  