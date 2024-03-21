<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/comment_class.php');
$comment = new comment;
$show_comment = $comment -> show_comment()
?>
       <div class="admin-content-right">
        <h1>Danh sách bình luận khách hàng</h1>
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>Mã Bình Luận</th>
                        <th>Mã Khách Hàng</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Nôi dung</th>
                        <th>Ngày bình luận</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($show_comment){$i=0; while($result= $show_comment->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['MaBinhLuan'] ?></td>
                        <td> <?php echo $result['MaKhachHang']  ?></td>
                        <td> <?php echo $result['MaSanPham']  ?></td>
                        <td> <?php echo $result['NoiDung']  ?></td>
                        <td> <?php echo $result['NgayBinhLuan']  ?></td>
                        <td><a href="commentdelete.php?MaBinhLuan=<?php echo $result['MaBinhLuan'] ?>">Xóa</a></td>
                    </tr>
                    <?php
                     }}
                    ?>
                   
                </table>
               </div>        
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  