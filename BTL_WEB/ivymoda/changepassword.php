
<?php
include "header.php";

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

if (isset($_POST["change"])) {
    $userEmail = $_SESSION["user"]["email"];
    $newpassword = $_POST["newpassword"];
    $repeatnewpassword = $_POST["repeatnewpassword"];
    $password = $_POST["oldpassword"];

    if ($repeatnewpassword !== $newpassword) {
        echo "<script>alert('Mật khẩu không trùng khớp');</script>";
    } else {
        if (empty($password)) {
            echo "<script>alert('Password is required');</script>";
        } else {
            require_once "database/dtb.php";
            $sql = "SELECT * FROM tbl_users WHERE email = ?";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $userEmail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $user = mysqli_fetch_assoc($result);

                if ($user) {
                    if (password_verify($password, $user["password"])) {
                        // Password is correct, hash the new password
                        $hashedNewPassword = password_hash($newpassword, PASSWORD_DEFAULT);

                        // Update the hashed password in the database
                        $updateSql = "UPDATE tbl_users SET password = ? WHERE email = ?";
                        $updateStmt = mysqli_stmt_init($conn);

                        if (mysqli_stmt_prepare($updateStmt, $updateSql)) {
                            mysqli_stmt_bind_param($updateStmt, "ss", $hashedNewPassword, $userEmail);
                            mysqli_stmt_execute($updateStmt);

                            echo "<script>alert('Đổi mật khẩu thành công');</script>";
                            header("Location: logout.php");
                            die();
                        } else {
                            echo "<script>alert('Lỗi khi cập nhật mật khẩu');</script>";
                        }

                        mysqli_stmt_close($updateStmt);
                    } else {
                        echo "<script>alert('Mật khẩu cũ không đúng');</script>";
                    }
                } else {
                    echo "<script>alert('Email không tồn tại');</script>";
                }
            } else {
                echo "<script>alert('Error in preparing SQL statement.');</script>";
            }

            mysqli_stmt_close($stmt);
        }
    }
}
?>
<section class="profile">
    <div class="breadcump_list">
        <a href="index.php">Trang chủ</a> - <a href="profile.php">Trang khoản của tôi</a> - <a href="changepassword.php">Đổi mật khẩu</a>
    </div>
    <div class="profile-content">
        <h3>ĐỔI MẬT KHẨU</h3>
        <p class="alert alert-primary">"Nhập mật khẩu cũ và mới"</p>
    </div>
    <div class="main-profile">

        <form method="post">
            <div class="form-right">
                <div class="form-group">
                    <div class="label">
                        <label>Mật khẩu cũ</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" name="oldpassword" id="oldpassword" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>Mật khẩu mới</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" name="newpassword" id="newpassword" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>Nhập lại mật khẩu mới</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control"  name="repeatnewpassword" id="repeatnewpassword" value = "">
                    </div>
                </div>
                <div class="form-button">
                    <div class="button1">
                        <button id = "btn-changepassword" name = "change" type="submit">Đổi mật khẩu</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>
<?php
include "footer.php";
?>