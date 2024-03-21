<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/comment_class.php');
$comment = new comment;
$show_question = $comment -> show_question()
?>
       <div class="admin-content-right">
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Bài viết ID</th>
                        <th>Nôi dung</th>
                        <th>Ảnh</th>
                        <th>Thành viên</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($show_question){$i=0; while($result= $show_question->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['question_id'] ?></td>
                        <td> <?php echo $result['baiviet_id']  ?></td>
                        <td> <?php echo $result['baiviet_noidung']  ?></td>
                        <td> <img style="width: 100px; height: 50px" src="uploads/<?php echo $result['baiviet_anh']  ?>" alt=""></td>
                        <td> <?php echo $result['user_ten']  ?></td>
                        <td><a href="questiondelete.php?question_id=<?php echo $result['question_id'] ?>">Xóa</a></td>
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