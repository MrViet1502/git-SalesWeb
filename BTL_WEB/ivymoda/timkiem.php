<?php
include "header.php";
include "leftside.php";

//Lấy từ khóa tìm kiếm và loại sản phẩm từ URL
$tukhoa = isset($_GET['tukhoa']) ? $_GET['tukhoa'] : '';
$sanpham_id = isset($_GET['sanpham_id']) ? $_GET['sanpham_id'] : '';

// Tìm kiếm sản phẩm
$ketqua_tukhoa = $index->search_sanpham($sanpham_id, $tukhoa);
?>

<style>
    .container .cartegory-top.row {
        display: none;
    }
</style>
<div class="cartegory-right">
    <!-- ... Các phần HTML khác trong trang ... -->
    <h2>Những sản phẩm liên quan đến từ khóa: '<?php echo $tukhoa; ?>'</h2>

    <div class="cartegory-right-content row">
        <?php
        $ketqua_tukhoa = $index->search_sanpham($tukhoa);
        if ($ketqua_tukhoa) {
            while ($resultB = $ketqua_tukhoa->fetch_assoc()) {
        ?>
                <div class="cartegory-right-content-item">
                    <!-- Hiển thị thông tin sản phẩm tìm được -->
                    <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id'] ?>"><img src="admin/uploads/<?php echo $resultB['sanpham_anh'] ?>" alt=""></a>
                    <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id'] ?>">
                        <h1><?php echo $resultB['sanpham_tieude'] ?></h1>
                    </a>
                    <p><?php $resultA = number_format($resultB['sanpham_gia']);
                        echo $resultA ?><sup>đ</sup></p>
                    <span>_new_</span>
                </div>
        <?php
            }
        } else {
            echo "<p>Không có sản phẩm nào được tìm thấy.</p>";
        }
        ?>
    </div>



</div>
</section>
<?php
include "footer.php"
?>