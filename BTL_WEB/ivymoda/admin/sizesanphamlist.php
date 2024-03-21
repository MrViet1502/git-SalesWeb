<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');

?>
<?php
$product = new product();
if (isset($_GET['sanpham_id'])|| $_GET['sanpham_id']!=NULL){
    $sanpham_id = $_GET['sanpham_id'];
    }
    $get_size = $product -> get_size($sanpham_id);
    
?>
<?php

?>
       <div class="admin-content-right">
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>ID Sản phẩm</th>
                        <th>Mã Sản phẩm</th>
                        <th>Size Sản phẩm</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($get_size){$i=0; while($result= $get_size->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['sanpham_size_id'] ?></td>
                        <td> <?php echo $result['sanpham_id'] ?></td>
                        <td> <?php echo $result['sanpham_ma']  ?></td>
                        <td> <?php echo $result['sanpham_size']  ?></td>
                        <td><a href="sizesanphamdelete.php?sanpham_size_id=<?php echo $result['sanpham_size_id'] ?>">Xóa</a></td>
                    </tr>
                    <?php
                     }}
                    ?>
                   
                </table>
               </div>        
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  