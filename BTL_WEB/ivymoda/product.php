<?php
include "header.php";
?>
<?php
if (isset($_GET['sanpham_id']) || $_GET['sanpham_id'] != NULL) {
    $sanpham_id = $_GET['sanpham_id'];
}

?>

<!-- -----------------------PRODUCT---------------------------------------------- -->
<section class="product">
    <div class="container">
        <div class="product-top row">
            <?php
            $get_sanpham = $index->get_sanpham($sanpham_id);
            if ($get_sanpham) {
                $resultE = $get_sanpham->fetch_assoc();
            }
            ?>
            <p><a href="index.php">Trang chủ</a></p> <span>&#8594;</span>
            <p><?php echo $resultE['danhmuc_ten']  ?></p><span>&#8594;</span>
            <p><?php echo $resultE['loaisanpham_ten'] ?></p><span>&#8594;</span>
            <p><?php echo $resultE['sanpham_tieude'] ?></p>
        </div>
        <div class="product-content row">
            <?php
            $get_sanpham = $index->get_sanpham($sanpham_id);
            if ($get_sanpham) {
                while ($result = $get_sanpham->fetch_assoc()) {
            ?>
                    <div class="product-content-left row">
                        <div class="product-content-left-big-img">
                            <img class="sanpham_anh" src="admin/uploads/<?php echo $result['sanpham_anh'] ?>" alt="">
                        </div>
                        <div class="product-content-left-small-img">
                            <?php
                            $sanpham_id = $result['sanpham_id'];
                            $get_anh = $index->get_anh($sanpham_id);
                            if ($get_anh) {
                                while ($resultA = $get_anh->fetch_assoc()) {
                            ?>
                                    <img src="admin/uploads/<?php echo $resultA['sanpham_anh'] ?>" alt="">
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="product-content-right">
                        <div class="product-content-right-product-name">
                            <input class="session_id" type="hidden" value="<?php echo session_id() ?>">
                            <input class="sanpham_id" type="hidden" value="<?php echo $result['sanpham_id'] ?>">
                            <h1 class="sanpham_tieude"><?php echo $result['sanpham_tieude'] ?></h1>
                            <p><?php echo $result['sanpham_ma'] ?></p>
                        </div>
                        <div class="product-content-right-product-price">
                            <p><span><?php $resultC = number_format($result['sanpham_gia']);
                                        echo $resultC ?></span><sup>đ</sup></p>
                            <input class="sanpham_gia" type="hidden" value="<?php echo $result['sanpham_gia'] ?>">
                        </div>
                        <div class="product-content-right-product-color">
                            <p><span style="font-weight: bold;">Màu sắc</span>:<?php echo $result['color_ten'] ?> <span style="color: red;">*</span></p>
                            <div class="product-content-right-product-color-IMG">
                                <img class="color_anh" src="admin/uploads/<?php echo $result['color_anh'] ?>" alt="">
                            </div>
                        </div>
                        <div class="product-content-right-product-size">
                            <p style="font-weight: bold"> Size: </p>
                            <div class="size">
                                <?php
                                $sanpham_id = $result['sanpham_id'];
                                $get_size = $index->get_size($sanpham_id);
                                if ($get_size) {
                                    while ($resultV = $get_size->fetch_assoc()) {
                                ?>
                                        <div class="size-item">
                                            <input class="size-item-input" value="<?php echo $resultV['sanpham_size'] ?>" name="size-item" type="radio">
                                            <span><?php echo $resultV['sanpham_size'] ?></span>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="quantity">
                                <p style="font-weight: bold"> Số lượng: </p>
                                <input class="quantitys" type="number" min="0" value="1">
                            </div>
                            <p class="size-alert" style="color: red;"></p>
                        </div>
                        <div class="product-content-right-product-button">
                            <button class="add-cart-btn"> <i class="fas fa-shopping-cart"></i>
                                <p>MUA HÀNG</p>
                            </button>
                            <button>
                                <p>TÌM TẠI CỬA HÀNG</p>
                            </button>
                        </div>
                        <div class="product-content-right-product-icon">
                            <div class="product-content-right-product-icon-item">
                                <i class="fas fa-phone-alt"></i>
                                <p>Hotline</p>
                            </div>
                            <div class="product-content-right-product-icon-item">
                                <i class="far fa-comments"></i>
                                <p>Chat</p>
                            </div>
                            <div class="product-content-right-product-icon-item">
                                <i class="far fa-envelope"></i>
                                <p>Mail</p>
                            </div>
                        </div>
                        <div class="product-content-right-product-QR">
                            <img src="image/qrcode2.png" alt="">
                        </div>
                        <div class="product-content-right-bottom">
                            <div class="product-content-right-bottom-top">
                                &#8744;
                            </div>
                            <div class="product-content-right-bottom-content-big">
                                <div class="product-content-right-bottom-title">
                                    <div class="product-content-right-bottom-title-item chitiet">
                                        <p>Chi tiết</p>
                                    </div>
                                    <div class="product-content-right-bottom-title-item baoquan">
                                        <p>Bảo quản</p>
                                    </div>
                                    <div class="product-content-right-bottom-title-item">
                                        <p>Tham khảo size</p>
                                    </div>
                                </div>
                                <div class="product-content-right-bottom-content">
                                    <div class="product-content-right-bottom-content-chitiet">
                                        <?php echo $result['sanpham_chitiet'] ?>
                                    </div>
                                    <div class="product-content-right-bottom-content-baoquan">
                                        <?php echo $result['sanpham_baoquan'] ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<!-- =============Bình luận sản phẩm================ -->


<section>
    <?php
    // Kết nối đến cơ sở dữ liệu
    $dsn = "mysql:host=localhost;dbname=website_ivy";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Kiểm tra xem 'sanpham_id' có tồn tại trong URL không
    if (isset($_GET['sanpham_id']) && $_GET['sanpham_id'] != NULL) {
        $sanpham_id = $_GET['sanpham_id'];

        // Chuẩn bị truy vấn SQL để lấy bình luận dựa trên 'sanpham_id'
        $stmt = $pdo->prepare("SELECT * FROM binhluan WHERE MaSanPham = :sanpham_id");
        $stmt->bindParam(":sanpham_id", $sanpham_id);
        $stmt->execute();

        // Lấy kết quả
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <!-- Hiển thị form nhập bình luận -->

        <form method="post" class='form text-center' action="" id="feedbackForm" style="margin-top: 20px;margin-left: 10%;">
            <label style="background-color: #007BFF; color: #fff " for="feedback">Nhập bình luận:</label><br>
            <textarea class="text" cols="140" rows="5" name="feedback" id="feedbackContent" style="width: 50%; padding: 10px; margin-bottom: 10px; resize: vertical;"></textarea><br>
            <input type="submit" clasxs="btn btn-primary" value="Gửi bình luận" name="feedback_submit" style="background-color: #007BFF; color: #fff; border: none; padding: 10px 20px; cursor: pointer;">
        </form>
        <div id="result" style="margin-top: 20px;">

        <?php

        // Xử lý khi có dữ liệu được gửi từ form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['feedback_submit'])) {
                // Lấy user_id từ biến phiên
                // Bắt đầu phiên
                $user_id = 1;
                if (isset($_SESSION["user"])) {
                    // Redirect to the login page if not logged in


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
                            $user_id = $row['id'];

                            // ... (you can display other user information as needed)
                        } else {
                            echo "User not found in the database.";
                        }
                    } else {
                        echo "Error in preparing SQL statement.";
                    }
                }
                // Khi người dùng đăng nhập thành công

                // Lấy tên người dùng từ tbl_users dựa trên user_id
                $stmt_user = $pdo->prepare("SELECT last_name FROM tbl_users WHERE id = :user_id");
                $stmt_user->bindParam(":user_id", $user_id);
                $stmt_user->execute();
                $user_info = $stmt_user->fetch(PDO::FETCH_ASSOC);

                // Lấy tên người dùng từ kết quả truy vấn
                $user_last_name = $user_info['last_name'];

                // Sử dụng user_id và tên người dùng để thêm bình luận
                $feedbackContent = $_POST['feedback'];
                $insertStmt = $pdo->prepare("INSERT INTO binhluan(MaKhachHang, NoiDung, MaSanPham, NgayBinhLuan) VALUES (?, ?, ?, NOW())");
                $insertStmt->execute([$user_id, $feedbackContent, $sanpham_id]);

                // Lấy lại danh sách bình luận và hiển thị
                $stmt = $pdo->prepare("SELECT binhluan.*, tbl_users.last_name FROM binhluan
                                    LEFT JOIN tbl_users ON binhluan.MaKhachHang = tbl_users.id
                                    WHERE MaSanPham = :sanpham_id");
                $stmt->bindParam(":sanpham_id", $sanpham_id);
                $stmt->execute();
                $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);


                if ($comments) {
                    echo "<div style='margin-top: 20px;'>";
                    echo "<h2 style='color: #007BFF; margin-left: 15%;'>Bình luận của khách hàng !</h2>";
                    echo "<ul style='list-style-type: none; padding: 0; width: 50% ; margin-left: 15%'>";
                    foreach ($comments as $comment) {
                        echo "<li style='border: 1px solid #ddd; margin-bottom: 10px; padding: 10px;'>";
                        echo "<strong style='color: #007BFF;'>Tên Khách Hàng:</strong> " . $comment['last_name'] . "<br>";
                        echo "<strong style='color: #007BFF;'>Nội Dung Bình Luận:</strong> " . $comment['NoiDung'] . "<br>";
                        echo "<strong>Ngày Bình Luận:</strong> " . $comment['NgayBinhLuan'];
                        echo "</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                } else {
                    echo "<p style='margin-top: 20px; color: #007BFF;'>Chưa có bình luận nào cho sản phẩm có mã $sanpham_id.</p>";
                }
            }
        }
    } else {
        echo "Thiếu thông tin 'sanpham_id' trong URL.";
        // Thực hiện các hành động mặc định hoặc thông báo lỗi khác tùy thuộc vào logic ứng dụng của bạn
    }
        ?>

</section>


<!-- -------------------------SẢN PHẨM LIÊN QUAN -->
<section class="product-related">
    <div class="container">
        <div class="product-related-title">
            <p>SẢN PHẨM LIÊN QUAN</p>
        </div>
        <div class="row justify-between">
            <?php
            $loaisanpham_id = $resultE['loaisanpham_id'];
            $get_sanphamlienquan = $index->get_sanphamlienquan($loaisanpham_id, $sanpham_id);
            if ($get_sanphamlienquan) {
                while ($resultZ = $get_sanphamlienquan->fetch_assoc()) {

            ?>
                    <div class="product-related-item">
                        <a href="product.php?sanpham_id=<?php echo $resultZ['sanpham_id'] ?>"><img src="admin/uploads/<?php echo $resultZ['sanpham_anh'] ?>" alt=""></a>
                        <a href="product.php?sanpham_id=<?php echo $resultZ['sanpham_id'] ?>">
                            <h1><?php echo $resultZ['sanpham_tieude'] ?></h1>
                        </a>
                        <p><?php $resultA = number_format($resultZ['sanpham_gia']);
                            echo $resultA ?><sup>đ</sup></p>
                        <span>_new_</span>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {

        var s = ''

        $('.size-item-input').each(function(index) {
            $(this).change(function() {
                s = $(this).val()

            })

        });
        $('.add-cart-btn').click(function() {
            if (s == "") {
                $('.size-alert').text('Vui lòng chọn size*')

            } else {
                var x = $(this).parent().parent().find('.sanpham_tieude').text()
                var se = $(this).parent().parent().find('.session_id').val()
                var sp = $(this).parent().parent().find('.sanpham_id').val()
                var y = $(this).parent().parent().parent().find('.sanpham_anh').attr('src')
                var z = $(this).parent().parent().find('.sanpham_gia').val()
                var c = $(this).parent().parent().find('.color_anh').attr('src')
                var q = $(this).parent().parent().find('.quantitys').val()
                $.ajax({
                    url: "ajax/cart_ajax.php",
                    method: "POST",
                    data: {
                        session_id: se,
                        sanpham_id: sp,
                        sanpham_tieude: x,
                        sanpham_anh: y,
                        sanpham_gia: z,
                        color_anh: c,
                        quantitys: q,
                        sanpham_size: s
                    },
                    success: function(data) {}
                })
                // window.location.replace("cart.php");
                $(location).attr('href', 'cart.php')

            }

            $('#feedbackForm').submit(function(e) {
                e.preventDefault(); // Ngăn chặn form submit mặc định

                var feedbackContent = $('#feedbackContent').val();

                $.ajax({
                    url: 'your_feedback_handler.php', // Điều chỉnh đường dẫn đến tập tin xử lý feedback của bạn
                    type: 'POST',
                    data: {
                        feedback_content: feedbackContent
                    },
                    success: function(response) {
                        $('#result').html(response); // Hiển thị kết quả trong div có id "result"
                    },
                    error: function() {
                        alert('Có lỗi xảy ra trong quá trình xử lý.');
                    }
                });
            });
        });

    })
</script>

<!-- -------------------------Footer -->
<?php
include "footer.php"
?>