<?php
include "header.php";
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}


?>

<!---LOGIN--->
<section class="login-form">
    <div class="left-login">
        <h3>Bạn đã có tài khoản IVY</h3>
        <p>Nếu bạn đã có tài khoản, hãy đăng nhập để tích lũy điểm thành viên và nhận được những ưu đãi tốt hơn !</p>
        <form action="login.php" method="post" autocomplete="off" method="post" autocomplete="off">
            <div class="form-group">
                <input type="email" placeholder="Email/SĐT" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Mật khẩu" name="password" class="form-control">
            </div>
            <div class="form-checkbox">
                <input type="checkbox" name="checkbox" id="checkbox"><span>Ghi nhớ tên đăng nhập</span>
                <a href="password_reset.php">Quên mật khẩu</a>
            </div>
            <div class="form-btn">
                <input type="submit" value="ĐĂNG NHẬP" name="login" class="btn btn-primary">
            </div>
        </form>
        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            if (empty($password)) {
                echo "<div class='alert alert-danger'>Password is required</div>";
            } else {
                require_once "database/dtb.php";
                $sql = "SELECT * FROM tbl_users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if ($user) {
                    if (password_verify($password, $user["password"])) {
                        session_start();
                        $_SESSION["user"] = $user;
                        header("Location: index.php");
                        die();
                    } else {
                        echo "<div class='alert alert-danger'>Mật khẩu không đúng</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Email không hợp lệ</div>";
                }
            }
        }

        ?>
    </div>
    <div class="right-login">
        <h3>Khách hàng mới của IVY moda</h3>
        <p>Nếu bạn chưa có tài khoản trên ivymoda.com, hãy sử dụng tùy chọn này để truy cập biểu mẫu đăng kí.
        </p>
        <p> Bằng cách cung cấp cho
            IVY moda thông tin chi tiết của bạn, quá trình mua hàng trên ivymoda.com sẽ là một trải nghiệm thú vị và nhanh chóng hơn!</p>
        <div class="form-btn">
            <input type="submit" value="ĐĂNG KÝ" name="Đăng ký" class="btn btn-primary" onclick="window.location.href='register.php';">
        </div>
    </div>
</section>


<?php
include "footer.php"
?>