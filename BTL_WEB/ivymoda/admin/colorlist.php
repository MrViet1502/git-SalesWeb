<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
$brand = new brand;
$show_color = $brand -> show_color()
?>
       <div class="admin-content-right">
        <h1>Màu sắc</h1>
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Tên màu</th>
                        <th>Ảnh</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($show_color){$i=0; while($result= $show_color->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['color_id'] ?></td>
                        <td> <?php echo $result['color_ten']  ?></td>
                        <td> <img style="width: 50px; height: 50px" src="uploads/<?php echo $result['color_anh'] ?>" alt=""></td>
                        <td><a href="coloredit.php?color_id=<?php echo $result['color_id'] ?>">Sửa</a>|<a href="colordelete.php?color_id=<?php echo $result['color_id'] ?>">Xóa</a></td>
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