<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/lib/database.php');
require_once(__ROOT__ . '/admin/lib/session.php');
require_once(__ROOT__ . '/admin/helper/format.php');
//  include_once '../helper/format.php';
//  include_once '../lib/database.php';
// include_once './helper/format.php';
// include_once './lib/database.php';
?>

<?php
class index
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function show_product_indexA()
    {
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.danhmuc_id = tbl_danhmuc.danhmuc_id
        ORDER BY tbl_baiviet.baiviet_id DESC  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_danhmuc_indexA($danhmuc_id)
    {
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        WHERE danhmuc_id = '$danhmuc_id'
        ORDER BY tbl_baiviet.baiviet_id DESC LIMIT 1,3   ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product_indexB()
    {
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        ORDER BY tbl_baiviet.baiviet_id DESC LIMIT 4,12   ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_danhmuc_indexB($danhmuc_id)
    {
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        WHERE danhmuc_id = '$danhmuc_id'
        ORDER BY tbl_baiviet.baiviet_id DESC LIMIT 4,12   ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product_indexC($baiviet_id)
    {
        // $query = "SELECT * FROM tbl_question WHERE baiviet_id = '$baiviet_id' ORDER BY question_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.danhmuc_id = tbl_danhmuc.danhmuc_id
        WHERE baiviet_id = '$baiviet_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_question($baiviet_id)
    {
        $query = "SELECT * FROM tbl_question WHERE baiviet_id = '$baiviet_id' ORDER BY question_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_anh($sanpham_id)
    {
        $query = "SELECT * FROM tbl_sanpham_anh WHERE sanpham_id = '$sanpham_id' ORDER BY sanpham_anh_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_size($sanpham_id)
    {
        $query = "SELECT * FROM tbl_sanpham_size WHERE sanpham_id = '$sanpham_id' ORDER BY sanpham_size_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_answer($baiviet_id)
    {
        $query = "SELECT * FROM tbl_question_answer WHERE baiviet_id = '$baiviet_id' ORDER BY question_answer_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_loaisanpham($loaisanpham_id)
    {
        $query = "SELECT tbl_sanpham.*, tbl_danhmuc.danhmuc_ten,tbl_loaisanpham.loaisanpham_ten
        FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
        INNER JOIN tbl_loaisanpham ON tbl_sanpham.loaisanpham_id = tbl_loaisanpham.loaisanpham_id
        WHERE tbl_sanpham.loaisanpham_id = '$loaisanpham_id'
        ORDER BY tbl_sanpham.sanpham_id DESC  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_loaisanphamA($loaisanpham_id)
    {
        $query = "SELECT tbl_sanpham.*, tbl_danhmuc.danhmuc_ten,tbl_loaisanpham.loaisanpham_ten
        FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
        INNER JOIN tbl_loaisanpham ON tbl_sanpham.loaisanpham_id = tbl_loaisanpham.loaisanpham_id
        WHERE tbl_sanpham.loaisanpham_id = '$loaisanpham_id'
        ORDER BY tbl_sanpham.sanpham_id DESC  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_sanphamlienquan($loaisanpham_id, $sanpham_id)
    {
        $query = "SELECT tbl_sanpham.*, tbl_danhmuc.danhmuc_ten,tbl_loaisanpham.loaisanpham_ten
        FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
        INNER JOIN tbl_loaisanpham ON tbl_sanpham.loaisanpham_id = tbl_loaisanpham.loaisanpham_id
        WHERE tbl_sanpham.loaisanpham_id = '$loaisanpham_id' && tbl_sanpham.sanpham_id != '$sanpham_id'
        ORDER BY tbl_sanpham.sanpham_id DESC LIMIT 0,5  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_sanpham($sanpham_id)
    {
        $query = "SELECT tbl_sanpham.*, tbl_danhmuc.danhmuc_ten,tbl_loaisanpham.loaisanpham_ten,tbl_color.color_ten,tbl_color.color_anh
        FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
        INNER JOIN tbl_loaisanpham ON tbl_sanpham.loaisanpham_id = tbl_loaisanpham.loaisanpham_id
        INNER JOIN tbl_color ON tbl_sanpham.color_id = tbl_color.color_id
        WHERE tbl_sanpham.sanpham_id = '$sanpham_id'
        ORDER BY tbl_sanpham.sanpham_id DESC  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_danhmuc_indexG($danhmuc_id)
    {
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id = '$danhmuc_id' ORDER BY danhmuc_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product_indexD($danhmuc_id, $baiviet_id)
    {
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.danhmuc_id = tbl_danhmuc.danhmuc_id 
        WHERE tbl_baiviet.danhmuc_id = '$danhmuc_id' && baiviet_id != '$baiviet_id'  
        ORDER BY tbl_baiviet.baiviet_id DESC LIMIT 0,10";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product()
    {
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        ORDER BY tbl_danhmuc.danhmuc_id DESC  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_danhmuc()
    {
        $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_loaisanpham($danhmuc_id)
    {
        $query = "SELECT * FROM tbl_loaisanpham  WHERE danhmuc_id = '$danhmuc_id' ORDER BY loaisanpham_id";
        $result = $this->db->select($query);
        return $result;
    }
    // public function show_danhmucE($danhmuc_id){
    //     $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id = '$danhmuc_id' ORDER BY danhmuc_id DESC";
    //     $result = $this -> db ->select($query);
    //     return $result;
    // }
    // public function show_subcartegory(){
    //     $query = "SELECT * FROM tbl_subcartegory ORDER BY subcartegory_id DESC";
    //     $result = $this -> db ->select($query);
    //     return $result;
    // }
    public function get_product($product_id)
    {
        $query = "SELECT * FROM tbl_baiviet WHERE baiviet_id = '$product_id'";
        $result = $this->db->select($query);
        return $result;
    }
    // public function get_product_img($product_id){
    //     $query = "SELECT * FROM tbl_product_img WHERE product_id = '$product_id'";
    //     $result = $this -> db ->select($query);
    //     return $result;
    // }



    public function makeUrl($string)
    {
        $string = trim($string);
        $string = str_replace(' ', '-', $string);
        $string = strtolower($string);
        $string = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $string);
        $string = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $string);
        $string = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $string);
        $string = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $string);
        $string = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $string);
        $string = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $string);
        $string = preg_replace("/(đ)/", "d", $string);
        $string = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $string);
        $string = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $string);
        $string = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $string);
        $string = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $string);
        $string = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $string);
        $string = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $string);
        $string = preg_replace("/(Đ)/", "D", $string);
        return $string;
    }

    public function search_text($text)
    {
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.danhmuc_id = tbl_danhmuc.danhmuc_id
        WHERE baiviet_tieude REGEXP '$text' ORDER BY tbl_baiviet.baiviet_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function check_user($user_name, $user_password)
    {
        $query = "SELECT * FROM tbl_user  WHERE user_ten = '$user_name' AND user_password = '$user_password' LIMIT 1 ";
        $result = $this->db->select($query);
        if ($result != false) {
            $value = $result->fetch_assoc();
            // Session::set('user_login',true);
            Session::set('user_ten', $value['user_ten']);
            Session::set('user_id', $value['user_id']);
            Session::set('user_img', $value['user_img']);
        } else {
            $alert = "Tên đăng nhập hoặc mật khẩu không đúng";
            return $alert;
        }
        // return $result;
    }
    public function insertcomment($baiviet_id, $content, $comment_user)
    {
        $query = "INSERT INTO tbl_comment (baiviet_id,comment_noidung,comment_user) VALUES ('$baiviet_id','$content','$comment_user')";
        $result = $this->db->insert($query);
        return $result;
    }
    public function insert_question_answer($baiviet_id, $content, $user_ten, $question_id)
    {
        $query = "INSERT INTO tbl_question_answer (baiviet_id,content,user_ten,question_id) VALUES ('$baiviet_id','$content','$user_ten','$question_id')";
        $result = $this->db->insert($query);
        return $result;
    }
    public function show_question_answer($question_id)
    {
        $query = "SELECT * FROM tbl_question_answer WHERE question_id = '$question_id' ORDER BY question_answer_id ";
        $result = $this->db->select($query);
        return $result;
    }
    public function insert_quesion($data, $file)
    {
        $baiviet_id = $data['baiviet_id'];
        $user_ten = $data['user_ten'];
        $baiviet_noidung = $data['baiviet_noidung'];
        $file_name = $_FILES['baiviet_anh']['name'];
        $file_size = $_FILES['baiviet_anh']['size'];
        $file_temp = $_FILES['baiviet_anh']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $baiviet_anh = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $upload_image = "admin/uploads/" . $baiviet_anh;
        $target_file = basename($file_name);
        $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
            $alert = "Chỉ chọn file jpg, png, jpeg nhé bạn hiền";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $upload_image);
            $query = "INSERT INTO tbl_question (baiviet_id,user_ten,baiviet_noidung,baiviet_anh) VALUES 
            ('$baiviet_id','$user_ten','$baiviet_noidung','$baiviet_anh')";
            $result = $this->db->insert($query);
            //   header('Location:productlist.php');
            return $result;
        }
    }
    public function insert_user_register($useremail, $username, $password)
    {
        $query = "INSERT INTO tbl_user (user_email,user_ten,user_password) VALUES ('$useremail','$username','$password')";
        $result = $this->db->insert($query);
        header('Location:index.php');
        return $result;
    }
    public function showcomment($baiviet_id)
    {
        $query = "SELECT * FROM tbl_comment WHERE baiviet_id = '$baiviet_id' ORDER BY comment_id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function check_register($user_ten)
    {
        $query = "SELECT * FROM tbl_user  WHERE user_ten = '$user_ten' LIMIT 1 ";
        $result = $this->db->select($query);
        if ($result) {
            Session::set('register-name', false);
            $alert = "Tên đăng nhập đã tồn tại!";
            return $alert;
        } else {
            Session::set('register-name', true);
        }
        // return $result;
    }
    public function getCurURL()
    {
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
            $pageURL = "https://";
        } else {
            $pageURL = 'http://';
        }
        if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
    public function insert_cart($sanpham_anh, $session_idA, $sanpham_id, $sanpham_tieude, $sanpham_gia, $color_anh, $quantitys, $sanpham_size)
    {
        $query = "INSERT INTO tbl_cart (sanpham_anh,session_idA,sanpham_id,sanpham_tieude,sanpham_gia,color_anh,quantitys,sanpham_size) VALUES 
        ('$sanpham_anh','$session_idA','$sanpham_id','$sanpham_tieude','$sanpham_gia','$color_anh','$quantitys','$sanpham_size')";
        $result = $this->db->insert($query);
        return $result;
    }

    public function show_cart($session_id)
    {
        $query = "SELECT * FROM tbl_cart WHERE session_idA = '$session_id' ORDER BY cart_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_cartF($session_id)
    {
        $query = "SELECT * FROM tbl_cart WHERE session_idA = '$session_id' ORDER BY cart_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_cartB($session_id)
    {
        $query = "SELECT * FROM tbl_cart WHERE session_idA = '$session_id' ORDER BY cart_id DESC";
        $result = $this->db->selectdc($query);
        return $result;
    }
    public function show_cartC($session_id)
    {
        $query = "SELECT * FROM tbl_order WHERE session_idA = '$session_id' ORDER BY order_id DESC LIMIT 1";
        $result = $this->db->selectdc($query);
        return $result;
    }
    public function delete_cart($cart_id)
    {
        $query = "DELETE  FROM tbl_cart WHERE cart_id = '$cart_id'";
        $result = $this->db->delete($query);
        if ($result) {
            $query = "SELECT * FROM tbl_cart ORDER BY cart_id";
            $resultA = $this->db->select($query);
            if ($resultA == null) {
                Session::set('SL', null);
            }
        }
        return $result;
    }
    public function show_diachi()
    {
        $query = "SELECT DISTINCT tinh_tp,ma_tinh FROM tbl_diachi ORDER BY ma_tinh";
        $result = $this->db->selectdc($query);
        return $result;
    }
    public function show_diachi_qh($tinh)
    {
        $query = "SELECT DISTINCT tinh_tp,ma_tinh,quan_huyen,ma_qh FROM tbl_diachi WHERE ma_tinh = '$tinh' ORDER BY ma_qh";
        $result = $this->db->selectdc($query);
        return $result;
    }
    public function show_diachi_px($quan_huyen_id)
    {
        $query = "SELECT DISTINCT tinh_tp,ma_tinh,quan_huyen,ma_qh,phuong_xa,ma_px FROM tbl_diachi WHERE ma_qh = '$quan_huyen_id' ORDER BY ma_px";
        $result = $this->db->selectdc($query);
        return $result;
    }
    public function insert_order(
        $session_idA,
        $loaikhach,
        $customer_name,
        $customer_phone,
        $customer_tinh,
        $customer_huyen,
        $customer_xa,
        $customer_diachi
    ) {
        $query = "SELECT * FROM tbl_order WHERE session_idA = '$session_idA' ORDER BY order_id DESC";
        $result = $this->db->select($query);
        if ($result == null) {
            $query = "INSERT INTO tbl_order (session_idA,loaikhach,customer_name,customer_phone,customer_tinh,customer_huyen,customer_xa,customer_diachi) VALUES 
            ('$session_idA','$loaikhach','$customer_name','$customer_phone','$customer_tinh','$customer_huyen','$customer_xa','$customer_diachi')";
            $result = $this->db->insert($query);
            header('Location:payment.php');
        } else {
            header('Location:payment.php');
        }

        return $result;
    }
    public function insert_payment($session_idA, $deliver_method, $method_payment, $today)
    {
        $query = "SELECT * FROM tbl_payment WHERE session_idA = '$session_idA' ORDER BY payment_id DESC";
        $result = $this->db->select($query);
        if ($result == null) {
            $query = "SELECT * FROM tbl_cart WHERE session_idA = '$session_idA' ORDER BY cart_id DESC";
            $resultA = $this->db->select($query);
            if ($resultA) {
                while ($resultB = $resultA->fetch_assoc()) {
                    $cart_id = $resultB['cart_id'];
                    $sanpham_anh = $resultB['sanpham_anh'];
                    $sanpham_id = $resultB['sanpham_id'];
                    $sanpham_tieude = $resultB['sanpham_tieude'];
                    $sanpham_gia = $resultB['sanpham_gia'];
                    $color_anh = $resultB['color_anh'];
                    $quantitys = $resultB['quantitys'];
                    $sanpham_size = $resultB['sanpham_size'];
                    $query = "INSERT INTO tbl_carta (sanpham_anh,session_idA,sanpham_id,sanpham_tieude,sanpham_gia,color_anh,quantitys,sanpham_size) VALUES 
             ('$sanpham_anh','$session_idA','$sanpham_id','$sanpham_tieude','$sanpham_gia','$color_anh','$quantitys','$sanpham_size')";
                    $resultC = $this->db->insert($query);
                    if ($resultC) {
                        $query = "DELETE  FROM tbl_cart WHERE cart_id = '$cart_id'";
                        $resultD = $this->db->delete($query);
                        Session::set('SL', null);
                        //    return $resultB;  
                    }
                }
            }

            $query = "INSERT INTO tbl_payment (session_idA,giaohang,thanhtoan,order_date) VALUES 
            ('$session_idA','$deliver_method','$method_payment','$today')";
            $result = $this->db->insert($query);
            header('Location:success.php');
            return $result;
        } else {
            $query = "SELECT * FROM tbl_cart WHERE session_idA = '$session_idA' ORDER BY cart_id DESC";
            $resultA = $this->db->select($query);
            if ($resultA) {
                while ($resultB = $resultA->fetch_assoc()) {
                    $cart_id = $resultB['cart_id'];
                    $sanpham_anh = $resultB['sanpham_anh'];
                    $sanpham_id = $resultB['sanpham_id'];
                    $sanpham_tieude = $resultB['sanpham_tieude'];
                    $sanpham_gia = $resultB['sanpham_gia'];
                    $color_anh = $resultB['color_anh'];
                    $quantitys = $resultB['quantitys'];
                    $sanpham_size = $resultB['sanpham_size'];
                    $query = "INSERT INTO tbl_carta (sanpham_anh,session_idA,sanpham_id,sanpham_tieude,sanpham_gia,color_anh,quantitys,sanpham_size) VALUES 
             ('$sanpham_anh','$session_idA','$sanpham_id','$sanpham_tieude','$sanpham_gia','$color_anh','$quantitys','$sanpham_size')";
                    $resultC = $this->db->insert($query);
                    if ($resultC) {
                        $query = "DELETE  FROM tbl_cart WHERE cart_id = '$cart_id'";
                        $resultD = $this->db->delete($query);
                        Session::set('SL', null);
                        //    return $resultB;  
                    }
                }
            }
            header('Location:success.php');
        }
    }
    public function show_carta($session_id)
    {
        $query = "SELECT * FROM tbl_carta WHERE session_idA = '$session_id' ORDER BY carta_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_order($session_id)
    {
        $query = "SELECT tbl_order.*, tbl_diachi.*
        FROM tbl_order INNER JOIN tbl_diachi ON tbl_order.customer_xa = tbl_diachi.ma_px
        WHERE tbl_order.session_idA = '$session_id'
        ORDER BY tbl_order.order_id DESC LIMIT 1  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_payment($session_id)
    {
        $query = "SELECT * FROM tbl_payment WHERE session_idA = '$session_id' ORDER BY payment_id DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function search_sanpham($tukhoa) {
        $query = "SELECT * FROM tbl_sanpham WHERE sanpham_tieude LIKE '%$tukhoa%'";
        $result = $this->db->select($query);
        return $result;
    }

}


?>