<?php
if (isset($_GET['loaisanpham_id']) || $_GET['loaisanpham_id'] != NULL) {
    $loaisanpham_id = $_GET['loaisanpham_id'];
}

?>

<!-- -----------------------CARTEGPRY---------------------------------------------- -->
<section class="cartegory">
    <div class="container">
        <div class="cartegory-top row">
            <?php
            $get_loaisanphamA = $index->get_loaisanphamA($loaisanpham_id);
            if ($get_loaisanphamA) {
                $result = $get_loaisanphamA->fetch_assoc();
            }
            ?>
            <p><a style="color:#000000;" href="">Trang chủ</a></p>
            <span>&#8594;</span>
            <p><?php if (isset($result['danhmuc_ten'])) {
                    echo $result['danhmuc_ten'];
                } else {
                    echo "Vui lòng thêm danh mục";
                } ?>
            </p>
            <span>&#8594;</span>
            <p><?php if (isset($result['loaisanpham_ten'])) {
                    echo $result['loaisanpham_ten'];
                } else {
                    echo "Vui lòng thêm loại sản phẩm";
                } ?></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="cartegory-left">
                <ul>
                    <?php
                    $show_danhmuc = $index->show_danhmuc();
                    if ($show_danhmuc) {
                        while ($result = $show_danhmuc->fetch_assoc()) {


                    ?>
                            <li class="cartegory-left-li"><a href="#"><?php echo $result['danhmuc_ten'] ?></a>
                                <ul>
                                    <?php
                                    $danhmuc_id = $result['danhmuc_id'];
                                    $show_loaisanpham = $index->show_loaisanpham($danhmuc_id);
                                    if ($show_loaisanpham) {
                                        while ($result = $show_loaisanpham->fetch_assoc()) {
                                    ?>
                                            <li><a href="cartegory.php?loaisanpham_id=<?php echo $result['loaisanpham_id'] ?>"><?php echo $result['loaisanpham_ten'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>

                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>