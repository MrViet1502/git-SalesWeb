<?php
// define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/lib/database.php');
require_once(__ROOT__ . '/admin/lib/session.php');
// include "../lib/database.php";
// include "../lib/session.php";
?>

<?php
class admin
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function check_admin($username, $userpassword)
    {
        $query = "SELECT * FROM tbl_admin  WHERE admin_name = '$username' AND admin_password = '$userpassword' LIMIT 1 ";
        $result = $this->db->select($query);
        if ($result != false) {
            $value = $result->fetch_assoc();
            Session::set('user_login', true);
            Session::set('admin_name', $value['admin_name']);
            Session::set('admin_id', $value['admin_id']);
            // echo Session::get('admin_name');
            header('Location:index.php');
        } else {
            $alert = "Tên đăng nhập hoặc mật khẩu không đúng";
            return $alert;
        }
        // return $result;
    }

    public function show_admin(){
        $query = "SELECT * FROM tbl_admin ORDER BY admin_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    
    public function show_member(){
        $query = "SELECT * FROM tbl_users ORDER BY id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    // public function delete_comment($comment_id){
    //     $query = "DELETE  FROM tbl_comment WHERE comment_id = '$comment_id'";
    //     $result = $this -> db ->delete($query);
    //     return $result;
    //     // if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
    //     // else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}

    // }



        public function delete_member($id){
                $query = "DELETE  FROM tbl_users WHERE id = '$id'";
                $result = $this -> db ->delete($query);
                return $result;
                // if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
                // else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;

            }



}


?>