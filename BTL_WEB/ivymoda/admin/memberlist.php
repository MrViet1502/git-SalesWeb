<?php
include "header.php";
include "leftside.php";
include_once "../helper/format.php";

// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/admin_class.php');
$admin = new admin();
$show_member = $admin -> show_member()
?>
       <div class="admin-content-right">
        <h1>Danh sách khách hàng</h1>
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                    if($show_member){$i=0; while($result= $show_member->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['id'] ?></td>
                        <td> <?php echo $result['first_name']  ?></td>
                        <td> <?php echo $result['last_name']  ?></td>
                        <td> <?php echo $result['email']  ?></td>
                        <td><a href="memberdelete.php?id=<?php echo $result['id'] ?>">Xóa</a></td>
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