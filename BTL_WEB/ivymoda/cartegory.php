<?php
include "header.php";
include "leftside.php"
?>
<?php




if (isset($_GET['loaisanpham_id']) || $_GET['loaisanpham_id'] != NULL) {
    $loaisanpham_id = $_GET['loaisanpham_id'];
}
$get_loaisanpham = $index->get_loaisanpham($loaisanpham_id);

?>

<style>

</style>

<div class="cartegory-right">
    <div class="cartegory-right-top row">
        <div class="cartegory-right-top-item ">
            <?php
            $get_loaisanphamA = $index->get_loaisanphamA($loaisanpham_id);
            if ($get_loaisanphamA) {
                $result = $get_loaisanphamA->fetch_assoc();
            }
            ?>
            <p><?php if (isset($result['loaisanpham_ten'])) {
                    echo $result['loaisanpham_ten'];
                } else {
                    echo "Hiện tại chưa có loại sản phẩm nào";
                } ?></p>
        </div>
        <div class="cartegory-right-top-item">
            <button><span>Bộ lọc</span><i class="fas fa-sort-down"></i></button>
        </div>
        <div class="cartegory-right-top-item">
            <select class="sort-select" name="sort" id="sort">
                <option value="">Sắp xếp</option>
                <option value="asc">Giá cao đến thấp</option>
                <option value="desc">Giá thấp đến cao</option>
            </select>
        </div>
    </div>
    <div class="cartegory-right-content row">
        <?php
        $productsPerPage = 8; // Set the number of products per page
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $startFrom = ($currentPage - 1) * $productsPerPage;


        // $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

        // // Modify your SQL query based on the selected sorting option
        // if ($sort === 'asc') {
        //     $orderBy = 'sanpham_gia ASC';
        // } elseif ($sort === 'desc') {
        //     $orderBy = 'sanpham_gia DESC';
        // } else {
        //     $orderBy = ''; // Default order or no sorting
        // }


        // // Câu truy vấn để lấy sản phẩm theo loaisanpham_id và sắp xếp theo giá
        // $sql = "SELECT * FROM tbl_sanpham WHERE loaisanpham_id = $loaisanpham_id ORDER BY $orderBy LIMIT $startFrom, $productsPerPage";


        if ($get_loaisanpham) {


            $get_loaisanpham->data_seek($startFrom);

            $counter = 0;

            while ($resultB = $get_loaisanpham->fetch_assoc()) {
                if ($counter >= $productsPerPage) {
                    break;
                }
        ?>
                <div class="cartegory-right-content-item">
                    <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id'] ?>"><img src="admin/uploads/<?php echo $resultB['sanpham_anh'] ?>" alt=""></a>
                    <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id'] ?>">
                        <h1><?php echo $resultB['sanpham_tieude'] ?></h1>
                    </a>
                    <p><?php $resultA = number_format($resultB['sanpham_gia']);
                        echo $resultA ?><sup>đ</sup></p>
                    <span>_new_</span>
                </div>
        <?php
                $counter++;
            }
        } else {
            echo "Không thể lấy dữ liệu sản phẩm.";
        }
        ?>
    </div>
    <div class="cartegory-right-bottom row">
        <?php
        if ($get_loaisanpham) {
            $totalProducts = $get_loaisanpham->num_rows;
            $totalPages = ceil($totalProducts / $productsPerPage);
        } else {
            $totalProducts = 0;
            $totalPages = 0;
        }
        ?>
        <div class="cartegory-right-bottom-items">
            <?php if ($currentPage > 1) { ?>
                <a class="pagination-link" href="?loaisanpham_id=<?php echo $loaisanpham_id; ?>&page=<?php echo ($currentPage - 1); ?>">Trang trước</a>
            <?php } ?>
        </div>
        <div class="cartegory-right-bottom-items">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i == $currentPage) { ?>
                        <li class="pagination-item active"><a class="pagination-link" href="?loaisanpham_id=<?php echo $loaisanpham_id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } else { ?>
                        <li class="pagination-item"><a class="pagination-link" href="?loaisanpham_id=<?php echo $loaisanpham_id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php }
                } ?>
            </ul>
        </div>
        <div class="cartegory-right-bottom-items">
            <?php if ($currentPage < $totalPages) { ?>
                <a class="pagination-link" href="?loaisanpham_id=<?php echo $loaisanpham_id; ?>&page=<?php echo ($currentPage + 1); ?>">Trang sau</a>
            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>
</section>

<!-- <script>
    // window.location.href = currentURL + separator + 'sort=' + selectedSort;

    // Add JavaScript to handle sorting change event
    document.getElementById('sort').addEventListener('change', function() {
        var selectedSort = this.value;
        var currentURL = new URL(window.location.href);

        // Get existing sort parameters
        var existingSorts = currentURL.searchParams.getAll('sort');

        // Remove existing sort parameters
        existingSorts.forEach(function(existingSort) {
            currentURL.searchParams.delete('sort');
        });

        // Add the selected sort parameter
        currentURL.searchParams.append('sort', selectedSort);

        // Redirect to the updated URL
        window.location.href = currentURL.href;
    });
</script> -->


<!-- -------------------------Footer -->
<?php
include "footer.php"
?>