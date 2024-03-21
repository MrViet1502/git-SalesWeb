<?php
// include "../lib/database.php";
// include "../lib/session.php";
// include "../helper/format.php"
?>

<?php
class cartegoty
{

   private $db;
   private $fm;

   public function __construct()
   {
       $this ->db = new Database();
   }
   public function insert_cartegory($danhmuc_ten){
            $query = "INSERT INTO tbl_danhmuc (danhmuc_ten) VALUES ('$danhmuc_ten')";
            $result = $this ->db ->insert($query);
            header('Location:cartegorylist.php');
            return $result;
               
             
       }
   public function show_cartegory(){
       $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id DESC";
       $result = $this -> db ->select($query);
       return $result;
   }
   public function get_cartegory($danhmuc_id){
       $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id = '$danhmuc_id'";
       $result = $this -> db ->select($query);
       return $result;
   }
   public function update_cartegory($danhmuc_ten,$danhmuc_id) {
               $query = "UPDATE tbl_danhmuc SET danhmuc_ten = '$danhmuc_ten' WHERE danhmuc_id = '$danhmuc_id'";
               $result = $this ->db ->update($query);
               header('Location:cartegorylist.php');
               return $result;
               
    

   }
   public function delete_cartegory($danhmuc_id){
       $query = "DELETE  FROM tbl_danhmuc WHERE danhmuc_id = '$danhmuc_id'";
       $result = $this -> db ->delete($query);
       if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
       else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
     


   }




       
   }


?>