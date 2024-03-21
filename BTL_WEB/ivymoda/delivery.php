<?php
include "header.php";
$session_idA = session_id();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $session_idA = session_id();
    $loaikhach = $_POST['loaikhach'];
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_tinh = $_POST['customer_tinh'];
    $customer_huyen = $_POST['customer_huyen'];
    $customer_xa = $_POST['customer_xa'];
    $customer_diachi = $_POST['customer_diachi'];
    $insert_order = $index->insert_order(
        $session_idA,
        $loaikhach,
        $customer_name,
        $customer_phone,
        $customer_tinh,
        $customer_huyen,
        $customer_xa,
        $customer_diachi
    );
}
?>
<!-- -----------------------DELIVERY---------------------------------------------- -->
<section class="delivery">
    <div class="container">
        <div class="delivery-top-wrap">
            <div class="delivery-top">
                <div class="delivery-top-delivery delivery-top-item">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="delivery-top-adress delivery-top-item">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="delivery-top-payment delivery-top-item">
                    <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        $show_cart = $index->show_cart($session_id);
        if ($show_cart) {

        ?>
            <div class="delivery-content row">
                <div class="delivery-content-left">
                    <form action="" method="post">
                        <p>Vui lòng chọn địa chỉ giao hàng</p>
                        <div class="delivery-content-left-dangnhap row">
                            <a href="login.php" class="btn-login">
                                <i class="fas fa-sign-in-alt">
                                </i>
                                <p>Đăng nhập (Nếu bạn đã có tài khoản của IVY)</p>
                            </a>
                        </div>

                        <div class="delivery-content-left-dangnhap row">
                            <a href="login.php" class="btn-login">
                                <i class="fas fa-sign-in-alt">
                                </i>
                                <p>Đăng ký</p>
                            </a>
                        </div>
                        <div class="delivery-content-left-dangnhap row">
                                <i class="fas fa-sign-in-alt">
                                </i>
                                <p style = "font-weight: bold;">Khách lẻ</p>
                        </div>
                        <div class="delivery-content-left-input-top row">
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Họ tên <span style="color: red;">*</span></label>
                                <input name="customer_name" oninvalid="this.setCustomValidity('Vui lòng không để trống')" oninput="this.setCustomValidity('')" required type="text">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Điện thoại <span style="color: red;">*</span></label>
                                <input name="customer_phone" oninvalid="this.setCustomValidity('Vui lòng không để trống')" oninput="this.setCustomValidity('')" required type="text">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Tỉnh/Tp <span style="color: red;">*</span></label>
                                <select name="customer_tinh" id="tinh_tp" oninvalid="this.setCustomValidity('Vui lòng không để trống')" oninput="this.setCustomValidity('')" required name="" id="">
                                    <option value="#">Chọn Tỉnh/Tp</option>
                                    <?php
                                    $show_diachi = $index->show_diachi();
                                    if ($show_diachi) {
                                        while ($result = $show_diachi->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $result['ma_tinh'] ?>"><?php echo $result['tinh_tp'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <!-- <input oninvalid="this.setCustomValidity('Vui lòng không để trống')"
                             oninput="this.setCustomValidity('')" required  type="text"> -->
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Quận/Huyện <span style="color: red;">*</span></label>
                                <select name="customer_huyen" id="quan_huyen" oninvalid="this.setCustomValidity('Vui lòng không để trống')" oninput="this.setCustomValidity('')" required name="" id="">
                                    <option value="#">Chọn Quận/Huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="delivery-content-left-input-bottom">
                            <label for="">Phường/Xã <span style="color: red;">*</span></label>
                            <select name="customer_xa" id="phuong_xa" oninvalid="this.setCustomValidity('Vui lòng không để trống')" oninput="this.setCustomValidity('')" required name="" id="">
                                <option value="#">Chọn Phường/Xã</option>
                            </select>
                        </div>
                        <div class="delivery-content-left-input-bottom">
                            <label for="">Địa chỉ <span style="color: red;">*</span></label>
                            <input name="customer_diachi" oninvalid="this.setCustomValidity('Vui lòng không để trống')" oninput="this.setCustomValidity('')" required type="text">
                        </div>
                        <div class="delivery-content-left-input-top row register">
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Mật khẩu<span style="color: red;">*</span></label>
                                <input type="text">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Nhập lại mật khẩu <span style="color: red;">*</span></label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="delivery-content-left-button row">
                            <a href=""><span> &#8810;</span>
                                <p>Quay lại giỏ hàng</p>
                            </a>
                            <button type="submit">
                                <p style="font-weight: bold;">THANH TOÁN VÀ GIAO HÀNG</p>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="delivery-content-right">
                    <table>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php
                        $session_id = session_id();
                        $SL = 0;
                        $TT = 0;
                        $show_cartB = $index->show_cartB($session_id);
                        if ($show_cartB) {
                            while ($result = $show_cartB->fetch_assoc()) {


                        ?>
                                <tr>
                                    <td><?php echo $result['sanpham_tieude'] ?></td>
                                    <td><?php $a = number_format($result['sanpham_gia']);
                                        echo $a  ?></td>
                                    <td><?php echo $result['quantitys'] ?></td>
                                    <td>
                                        <p><?php $a = $result['sanpham_gia'] * $result['quantitys'];
                                            $b = number_format($a);
                                            echo $b ?><sup>đ</sup></p>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                        <tr style="border-top: 2px solid red">
                            <td style="font-weight: bold;border-top: 2px solid #dddddd" colspan="3">Tổng</td>
                            <td style="font-weight: bold;border-top: 2px solid #dddddd">
                                <p><?php if (Session::get('TT')) {
                                        echo Session::get('TT');
                                    } ?><sup>đ</sup></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>
                            <td style="font-weight: bold;">
                                <p><?php if (Session::get('TT')) {
                                        echo Session::get('TT');
                                    } ?><sup>đ</sup></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php
        } else {
            echo "Bạn vẫn chưa thêm sản phẩm nào vào giỏ hàng, Vui lòng chọn sản phẩm nhé!";
        }
        ?>
    </div>
</section>
<script>
      function redirectToRegister() {
    window.location.href = 'register.php';
  }
    $(document).ready(function() {
        $("#tinh_tp").change(function() {
            // alert($(this).val())
            var x = $(this).val()
            // alert (x)
            $.get("ajax/deliveryqh_ajax.php", {
                tinh_id: x
            }, function(data) {
                $("#quan_huyen").html(data);
            })

        })
        $("#quan_huyen").change(function() {
            // alert($(this).val())
            var x = $(this).val()
            // alert (x)
            $.get("ajax/deliverypx_ajax.php", {
                quan_huyen_id: x
            }, function(data) {
                $("#phuong_xa").html(data);
            })

        })
    })
</script>

<!-- -------------------------Footer -->
<?php
include "footer.php"
?>