<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/comment_class.php');
$comment = new comment;
$show_answer = $comment -> show_answer()
?>
       <div class="admin-content-right">
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Bài viết ID</th>
                        <th>Question ID</th>
                        <th>Nôi dung</th>
                        <th>Thành viên</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($show_answer){$i=0; while($result= $show_answer->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['question_answer_id'] ?></td>
                        <td> <?php echo $result['baiviet_id']  ?></td>
                        <td> <?php echo $result['question_id']  ?></td>
                        <td> <?php echo $result['content']  ?></td>
                        <td> <?php echo $result['user_ten']  ?></td>
                        <td><a href="answerdelete.php?question_answer_id=<?php echo $result['question_answer_id'] ?>">Xóa</a></td>
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