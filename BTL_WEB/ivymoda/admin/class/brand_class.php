<?php
// include "../lib/database.php";
// include "../lib/session.php";
// include "../helper/format.php"
?>

<?php
class brand
{

   private $db;
   private $fm;

   public function __construct()
   {
       $this ->db = new Database();
   }
   public function insert_brand($danhmuc_id,$loaisanpham_name){
            $query = "INSERT INTO tbl_loaisanpham (danhmuc_id, loaisanpham_ten) VALUES ('$danhmuc_id','$loaisanpham_name')";
            $result = $this ->db ->insert($query);
            header('Location:brandlist.php');
            return $result;
               
             
       }
 public function insert_color($color_ten,$color_anh) {
    $query = "INSERT INTO tbl_color (color_ten, color_anh) VALUES ('$color_ten','$color_anh')";
    $result = $this ->db ->insert($query);
    header('Location:brandlist.php');
    return $result;
 }
   public function show_brand(){
    $query = "SELECT tbl_loaisanpham.*, tbl_danhmuc.danhmuc_ten
    FROM tbl_loaisanpham INNER JOIN tbl_danhmuc ON tbl_loaisanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
    ORDER BY tbl_loaisanpham.loaisanpham_id DESC  ";
    $result = $this -> db ->select($query);
    return $result;
   }
   public function show_color(){
    $query = "SELECT * FROM tbl_color ORDER BY color_id DESC";
    $result = $this -> db ->select($query);
    return $result;  
   }
   public function get_brand($loaisanpham_id){
       $query = "SELECT * FROM tbl_loaisanpham WHERE loaisanpham_id = '$loaisanpham_id'";
       $result = $this -> db ->select($query);
       return $result;
   }
   public function get_color($color_id){
        $query = "SELECT * FROM tbl_color WHERE color_id = '$color_id'";
        $result = $this -> db ->select($query);
        return $result;
   }
   public function update_brand($loaisanpham_ten,$danhmuc_id,$loaisanpham_id) {
               $query = "UPDATE tbl_loaisanpham SET danhmuc_id = '$danhmuc_id', loaisanpham_ten = '$loaisanpham_ten' WHERE loaisanpham_id = '$loaisanpham_id'";
               $result = $this ->db ->update($query);
               header('Location:brandlist.php');
               return $result;
   }
   public function update_color($color_ten,$color_anh,$color_id){
            $query = "UPDATE tbl_color SET color_ten = '$color_ten', color_anh = '$color_anh' WHERE color_id = '$color_id'";
            $result = $this ->db ->update($query);
            header('Location:colorlist.php');
            return $result;
   }
   public function delete_brand($loaisanpham_id){
       $query = "DELETE  FROM tbl_loaisanpham WHERE loaisanpham_id = '$loaisanpham_id'";
       $result = $this -> db ->delete($query);
       if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
       else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
     
   }
   public function delete_color($color_id){
    $query = "DELETE  FROM tbl_color WHERE color_id = '$color_id'";
    $result = $this -> db ->delete($query);
    return $result;
  
}




       
   }


?>