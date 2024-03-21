<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
$cartegory = new cartegoty;
$show_cartegory = $cartegory -> show_cartegory()
?>
       <div class="admin-content-right">
       <h1>Danh mục</h1>
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Danh mục</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($show_cartegory){$i=0; while($result= $show_cartegory->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['danhmuc_id'] ?></td>
                        <td> <?php echo $result['danhmuc_ten']  ?></td>
                        <td><a href="cartegoryedit.php?danhmuc_id=<?php echo $result['danhmuc_id'] ?>">Sửa</a>|<a href="cartegorydelete.php?danhmuc_id=<?php echo $result['danhmuc_id'] ?>">Xóa</a></td>
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