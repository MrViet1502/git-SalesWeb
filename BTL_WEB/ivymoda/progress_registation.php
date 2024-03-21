<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["Ho"];
    $last_name = $_POST["Ten"];
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $repeatpassword = $_POST["re-pass"];
    $date = $_POST["date"];
    $gioitinh = $_POST["gioitinh"];
    $tinh = $_POST["customer_tinh"];
    $huyen = $_POST["customer_huyen"];
    $xa = $_POST["customer_xa"];
    $phone = $_POST["Dienthoai"];
    $diachi = $_POST["diachi"];
    $angree = isset($_POST['angree']) ? 1 : 0;
    $dieukhoan = isset($_POST['dieukhoan']) ? 1 : 0;
    $errors = [];

    if (empty($first_name) || !preg_match("/^.{2,30}$/", $first_name)) {
        $errors[] = "Không để trống họ";
    }

    if (empty($last_name) || !preg_match("/^.{2,30}$/", $last_name)) {
        $errors[] = "Không để trống tên";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Không để trông email hoặc email sai định dạng";
    }

    if (empty($password) || !preg_match("/^.{2,30}$/", $password)) {
        $errors[] = "Mật khẩu không đúng yêu cầu";
    }
    if($dieukhoan == 0)
    {
        $errors[] = "Vui lòng đọc điều khoản.";
    }
    if(empty($gioitinh)){
        $errors[] = "Vui Lòng chọn giới tính.";
    }
    if(empty($tinh)){
        $errors[] = "Vui Lòng chọn tỉnh";
    }
    if(empty($huyen)){
        $errors[] = "Vui Lòng chọn huyện.";
    }
    if(empty($xa)){
        $errors[] = "Vui Lòng chọn xã.";
    }
    if(empty($phone)){
        $errors[] = "Vui Lòng nhập số điện thoại.";
    }
    if($password != $repeatpassword)
    {
        $errors[] = "Nhập lại mật khẩu không đúng";
    }
    require_once("database/dtb.php");
    $sql = "SELECT * FROM tbl_users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $errors[] = "Email already exists";
    } 
    if (empty($errors)) {
        $sql = "INSERT INTO tbl_users (first_name, last_name, email,password, date, gioitinh, tinh, 	huyen, xa, 	phone, diachi, angree) 
        VALUES(?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?,?)";
         $stmt = mysqli_stmt_init($conn);
         $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
         if($prepareStmt){
         $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"ssssssssssss",$first_name, $last_name, $email,$passwordHash, $date, $gioitinh, $tinh, $huyen, $xa, $phone, $diachi, $angree);
            mysqli_stmt_execute($stmt);
            header('Location: login.php');
            exit();
         } else {
            die("Something went wrong");
        }
    } else {
        echo "<div class='alert alert-danger'>" . implode("<br>", $errors) . "</div>";
    }
    exit();
}
?>