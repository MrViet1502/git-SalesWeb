<?php
include "header.php";
?>

<!--HANDLE--->

<!---REGISTER--->

<div class="register-form">
    <h3>ĐĂNG KÝ</h3>
    <form action="" method="post">
        <div class="register-form-content">
            <div class="infor-user">
                <p> Thông tin khách hàng </p>
                <div class="register-row">
                    <div class="element-form">
                        <p>Họ:</p>
                        <input type="text" name="Ho" id="Ho" placeholder="Họ...">
                    </div>
                    <div class="element-form">
                        <p>Tên:</p>
                        <input type="text" name="Ten" id="Ten" placeholder="Tên...">
                    </div>
                </div>
                <div class="register-row">
                    <div class="element-form">
                        <p>Email:</p>
                        <input type="email" name="email" id="email" placeholder="Email...">
                    </div>
                    <div class="element-form">
                        <p>Điện thoại:</p>
                        <input type="numer" name="Dienthoai" id="dienthoai" placeholder="Điện thoại...">
                    </div>
                </div>
                <div class="register-row">
                    <div class="element-form">
                        <p>Ngày sinh:</p>
                        <input type="date" name="date" id="date" placeholder="Ngày sinh...">
                    </div>
                    <div class="element-form">
                        <p>Giới tính:</p>
                        <select name="gioitinh" id="gioitinh">
                            <option value="nam">Nam</option>
                            <option value="nu">Nữ</option>
                            <option value="khac">Khác</option>
                        </select>
                    </div>
                </div>
                <div class="register-row">
                    <div class="element-form">
                        <p>Tỉnh/TP:</p>
                        <select name="customer_tinh" id="tinh_tp" oninvalid="this.setCustomValidity('Vui lòng không để trống')" oninput="this.setCustomValidity('')" required name="" id="">
                            <option value="#">Chọn Tỉnh/Tp</option>
                            <?php
                            $show_diachi = $index->show_diachi();
                            if ($show_diachi) {
                                while ($result = $show_diachi->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $result['ma_tinh'] ?>">
                                        <?php echo $result['tinh_tp'] ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="element-form">
                        <p>Quận/Huyện:</p>
                        <select name="customer_huyen" id="quan_huyen" oninvalid="this.setCustomValidity('Vui lòng không để trống')" oninput="this.setCustomValidity('')" required name="" id="">
                            <option value="#">Chọn Quận/Huyện</option>
                        </select>
                    </div>
                </div>
                <div class="register-row">
                    <div class="element-form">
                        <p>Phường/Xã:</p>
                        <select name="customer_xa" id="phuong_xa" oninvalid="this.setCustomValidity('Vui lòng không để trống')" oninput="this.setCustomValidity('')" required name="" id="">
                            <option value="#">Chọn Phường/Xã</option>
                        </select>
                    </div>
                </div>
                <div class="register-row">
                    <div class="element-form-2">
                        <p>Địa chỉ: </p>
                        <textarea name="diachi" id="diachi" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="infor-password">
                <p>Thông tin mật khẩu</p>
                <div class="register-row">
                    <div class="element-form-2">
                        <p>Mật khẩu:</p>
                        <input type="password" name="pass" id="pass" placeholder="Mật khẩu...">
                    </div>
                </div>
                <div class="register-row">
                    <div class="element-form-2">
                        <p>Nhập lại mật khẩu:</p>
                        <input type="password" name="re-pass" id="re-pass" placeholder="Nhập lại mật khẩu...">
                    </div>
                </div>
                <div class="register-row-2">
                    <input type="checkbox" id = "dieukhoan" name = "dieukhoan"><span>Đồng ý với điều khoản của IVY</span>
                </div>
                <div class="register-row-2">
                    <input type="checkbox" id="angree" name="angree"><span>Đăng ký nhận bản tin</span>
                </div>
                <div class="form-btn">
                    <input type="submit" class="btn btn-primary" value = "ĐĂNG KÝ"/>
                </div>
                <!-- <div class="register-row">
                    <div class="element-form">
                        <p>Mời nhập các ký tự trong hình vào ô sau:</p>
                        <input type="text" name="char" id="char">
                    </div>
                </div> -->
                <?php
            include("progress_registation.php");
            ?>
            </div>
        </div>
    </form>

</div>

<script>
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

<?php
include "footer.php"
?>