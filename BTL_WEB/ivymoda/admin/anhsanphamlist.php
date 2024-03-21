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
    $get_anh = $product -> get_anh($sanpham_id);
    
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
                        <th>Tên Sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($get_anh){$i=0; while($result= $get_anh->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['sanpham_anh_id'] ?></td>
                        <td> <?php echo $result['sanpham_id']  ?></td>
                        <td> <?php echo $result['sanpham_ma']  ?></td>
                        <td> <img style="width: 100px; height: 50px" src="uploads/<?php echo $result['sanpham_anh'] ?>" alt=""></td>
                        <td><a href="anhsanphamdelete.php?sanpham_anh_id=<?php echo $result['sanpham_anh_id'] ?>">Xóa</a></td>
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