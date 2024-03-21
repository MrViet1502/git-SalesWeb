<?php
include "header.php";
?>
<?php
// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Include necessary files and initialize objects
require_once("database/dtb.php");

// Get user information from the database
$userEmail = $_SESSION["user"]["email"];
$sql = "SELECT * FROM tbl_users WHERE email = ?";
$stmt = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Display user information
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];
        $date = $row['date'];
        $gender = $row['gioitinh'];
        $province = $row['tinh'];
        $district = $row['huyen'];
        $ward = $row['xa'];
        $phone = $row['phone'];
        $address = $row['diachi'];

        // ... (you can display other user information as needed)
    } else {
        echo "User not found in the database.";
    }
} else {
    echo "Error in preparing SQL statement.";
}

// Close the database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
<section class="profile">
    <div class="breadcump_list">
        <a href="index.php">Trang chủ</a> - <a href="profile.php">Trang khoản của tôi</a>
    </div>
    <div class="profile-content">
        <h3>Tài khoản của tôi</h3>
        <p class="alert alert-primary">"Vì chính sách an toàn thẻ, bạn không thể thay đổi SĐT, Ngày sinh, Họ tên. Vui
            lòng liên hệ CSKH 0905898683 để được hỗ trợ"</p>
    </div>
    <div class="main-profile">

        <form method="post">
            <div class="form-left">
                <div class="form-group">
                    <div class="label">
                        <label>Họ</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" disabled="disabled" value="<?php echo $firstName; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>Tên</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" disabled="disabled" value="<?php echo $lastName; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>Số điện thoại</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" disabled="disabled" value="<?php echo $phone; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>Email</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" disabled="disabled" id="email" value="<?php echo $userEmail; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>Giới tính</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" disabled="disabled" value="<?php echo $gender; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>Ngày sinh</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" disabled="disabled" name="date" id="date" value="<?php echo $date; ?>">
                    </div>
                </div>
            </div>
            <div class="form-right">
                <div class="form-group">
                    <div class="label">
                        <label>Tỉnh</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" disabled="disabled" name="province" id="province" value="<?php echo $province; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>Huyện</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" disabled="disabled" name="district" id="district" value="<?php echo $district; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>Xã</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" disabled="disabled" name="ward" id="ward" value="<?php echo $ward; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>Địa chỉ</label>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" disabled="disabled" name="address" id="address" value="<?php echo $address; ?>">
                    </div>
                </div>
                <div class="form-button">
                    <div class="button1">
                        <button type="button" id="editButton" onclick="enableEdit()"> Chỉnh sửa thông tin</button>
                        <button type="submit" onclick="updateEdit()" name="updateProfile" id="updateButton" style="display:none;"> Cập nhật thông tin</button>
                    </div>
                    <div class="button1">
                        <button type="button" onclick="redirectToChangePassword()">Đổi mật khẩu</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>
<script>
    function enableEdit() {
        // Bật trường nhập liệu để người dùng chỉnh sửa
        document.getElementById("province").removeAttribute("disabled");
        document.getElementById("district").removeAttribute("disabled");
        document.getElementById("ward").removeAttribute("disabled");
        document.getElementById("address").removeAttribute("disabled");
        document.getElementById("email").removeAttribute("disabled");
        document.getElementById("updateButton").style.display = "block";
        document.getElementById("editButton").style.display = "none";
    }

    function updateEdit() {
        var newProvince = document.getElementById("province").value;
        var newDistrict = document.getElementById("district").value;
        var newWard = document.getElementById("ward").value;
        var newAddress = document.getElementById("address").value;
        var newEmail = document.getElementById("email").value;

        if (newProvince !== '' && newDistrict !== '' && newWard !== '' && newAddress !== '' && newEmail !== '') {
            // Prepare the data to be sent to the server
            var formData = new FormData();
            formData.append('updateProfile', 'true');
            formData.append('province', newProvince);
            formData.append('district', newDistrict);
            formData.append('ward', newWard);
            formData.append('address', newAddress);
            formData.append('email', newEmail);

            // Perform the AJAX request
            fetch('updateprofile.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the server
                    if (data.success) {
                        // Update the UI or perform any other actions
                        alert("Cập nhật thông tin thành công!");
                    } else {
                        alert("Lỗi trong quá trình cập nhật.");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

            return false; // Prevent the default form submission
        } else {
            alert("Vui lòng nhập đầy đủ thông tin cần cập nhật.");
            return false;
        }
    }
    function redirectToChangePassword() {
        // Redirect to the changepassword.php page
        window.location.href = 'changepassword.php';
    }

</script>
<?php
include "footer.php";
?>