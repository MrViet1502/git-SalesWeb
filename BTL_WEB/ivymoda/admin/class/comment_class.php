<?php
// include "../lib/database.php";
// include "../helper/format.php"
?>

<?php
class comment
{

   private $db;
   private $fm;

   public function __construct()
   {
       $this ->db = new Database();
       $this ->fm = new Format();
   }

   public function show_comment(){
    $query = "SELECT * FROM binhluan ORDER BY MaBinhLuan DESC";
    $result = $this -> db ->select($query);
    return $result;
}
public function show_question(){
    $query = "SELECT * FROM tbl_question ORDER BY question_id DESC";
    $result = $this -> db ->select($query);
    return $result;
}
public function show_answer() {
    $query = "SELECT * FROM tbl_question_answer ORDER BY question_answer_id  DESC";
    $result = $this -> db ->select($query);
    return $result;
}
public function show_member(){
    $query = "SELECT * FROM tbl_users ORDER BY id DESC";
    $result = $this -> db ->select($query);
    return $result;
}
public function delete_comment($comment_id){
    $query = "DELETE  FROM binhluan WHERE MaBinhLuan = '$comment_id'";
    $result = $this -> db ->delete($query);
    return $result;
    // if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
    // else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
  
}
public function delete_question($question_id) {
    $query = "DELETE  FROM tbl_question WHERE question_id = '$question_id'";
    $result = $this -> db ->delete($query);
    return $result;
}
public function delete_answer($question_answer_id){
    $query = "DELETE  FROM tbl_question_answer WHERE question_answer_id = '$question_answer_id'";
    $result = $this -> db ->delete($query);
    return $result;
}
   
public function insert_member($user_ten,$user_password,$user_img){
            $query = "INSERT INTO tbl_user (user_ten,user_password,user_img) VALUES ('$user_ten','$user_password','$user_img')";
            $result = $this ->db ->insert($query);
            // header('Location:memberlist.php');
            return $result;
           
          
        }
    
        public function delete_member($userA_id){
            $query = "DELETE  FROM tbl_users WHERE id = '$userA_id'";
            $result = $this -> db ->delete($query);
            return $result;
            // if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
            // else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
          
        
        
        }
        
        


       
   }


?>