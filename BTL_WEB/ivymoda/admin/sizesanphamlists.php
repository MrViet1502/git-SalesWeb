<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');

?>
<?php
$product = new product();

    $get_all_size = $product -> get_all_size();
    
?>

       <div class="admin-content-right">
        <h1>Size sản phẩm</h1>
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
                    if($get_all_size){$i=0; while($result= $get_all_size->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['sanpham_size_id'] ?></td>
                        <td> <?php echo $result['sanpham_id'] ?></td>
                        <td> <?php echo $result['sanpham_ma']  ?></td>
                        <td> <?php echo $result['sanpham_size']  ?></td>
                        <td><a href="sizesanphamdeletes.php?sanpham_size_id=<?php echo $result['sanpham_size_id'] ?>">Xóa</a></td>
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