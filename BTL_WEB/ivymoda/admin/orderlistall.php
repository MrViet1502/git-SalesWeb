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
?>

        <div class="admin-content-right">
            <div class="table-content">
                <h1 style="color:#333">Tất cả các đơn hàng:</h1>
                <br>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tên</th>
                        <th>Điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Giao hàng</th>
                        <th>Thanh toán</th>
                        <th>Chi tiết đơn hàng</th>   
                        <th>Tình trạng</th>              
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                 $show_orderAll = $product  -> show_orderAll();
                 if($show_orderAll){$i=0;while($result = $show_orderAll->fetch_assoc()){$i++;
                ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> Ivy_<?php $ma = substr($result['session_idA'],0,8); echo $ma   ?></td>
                        <td> <?php echo $result['order_date']?></td>
                        <td> <?php echo $result['customer_name']?></td>
                        <td> <?php echo $result['customer_phone'] ?></td>
                        <td> <?php echo $result['customer_diachi']  ?>, <?php echo $result['phuong_xa']  ?>, <?php echo $result['quan_huyen']  ?>, <?php echo $result['tinh_tp']  ?></td>
                        <td> <?php echo $result['giaohang']  ?></td>
                        <td> <?php echo $result['thanhtoan']  ?></td>
                        <td> <a href="orderdetail.php?order_ma=<?php echo $result['session_idA'] ?>" >Xem</a></td>            
                        <td><?php if($result['statusA']==1){echo "Đã hoàn thành";} else {echo "Chưa hoàn thành";} ?></td>
                        <td><a  href="orderdelete.php?session_idA=<?php echo $result['session_idA'] ?>" onclick="return confirm('Đơn hàng sẽ bị xóa vĩnh viễn, bạn có chắc muốn tiếp tục không?');">Xóa</a></td>
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