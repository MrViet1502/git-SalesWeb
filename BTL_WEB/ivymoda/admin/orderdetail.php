<?php
include "header.php";
include "leftside.php";
// include "class/product_class.php";
include_once "../helper/format.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// // include "class/product_class.php";
// require_once(__ROOT__.'../admin/class/product_class.php');
?>
<?php
$product = new product();
if (isset($_GET['order_ma'])|| $_GET['order_ma']!=NULL){
    $order_ma = $_GET['order_ma'];
    }
?>
        <div class="admin-content-right">
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên Sản phẩm</th>
                        <th>Ảnh </th>
                        <th>SL</th>
                        <th>Màu</th>
                        <th>Đơn giá</th> 
                        <th>Thành tiền</th>                    
                    </tr>
                    <?php
                     $TT = 0;
               $show_order_detail = $product  -> show_order_detail($order_ma);
               if($show_order_detail){$i=0;while($result = $show_order_detail->fetch_assoc()){$i++;
                ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> Ivy_<?php $ma = substr($result['session_idA'],0,8); echo $ma   ?></td>
                        <td> <?php echo $result['sanpham_tieude']?></td>
                        <td> <img style="width:50px" src="../<?php echo $result['sanpham_anh'] ?>" alt=""></td>
                        <td> <?php echo $result['quantitys']  ?></td>
                        <td> <img style="width:30px" src="../<?php echo $result['color_anh'] ?>" alt=""></td>
                        <td> <?php $c = number_format($result['sanpham_gia']); echo $c  ?></td>    
                        <td><?php $a = (int)$result['sanpham_gia']; $b = (int)$result['quantitys']; $TTA = $a*$b; $f = number_format($TTA); echo $f  ?></td>                
                    </tr>
                  
                    <?php
                     $TT =  $TT  + $TTA ;
                     }}
                  ?>
                    <tr>
                        <td style="font-weight: bold;" colspan="7" >Tổng tiền</td>
                        <td><?php $k = number_format($TT); echo $k ?></td>
                    </tr>
                </table>
               </div>        
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  