<?php
require_once __DIR__ . '/xampp/htdocs/W3schools/config/DB.php';

class Auth
{
    //ham dang nhap
    static public function attempt($dataLogin)
    {

        $sql = "select * from account where email=:email and authority_id=:authority_id ";
        $user = DB::execute($sql, $dataLogin);
        return count($user) > 0 ? $user[0] : [];
    }


    //ham xu ly thao tac du lieu sau dang nhap
    static public function login($dataLogin)
    {
        $user = Auth::attempt($dataLogin);

        if (count($user) > 0) {
            $checkPass = password_verify($_POST['password'], $user['password']); //đối chiếu mật khẩu nhập vào và mật khẩu trên SQL xem có trùng nhau không?
            if ($checkPass == true) {
                $_SESSION['message_login'] = "Login success";
                $_SESSION['dataUser'] = $user['username'];
                $_SESSION['dataEmail'] = $user['email'];
                // Auth::getDataInformation($dataLogin);
                if ($user['authority_id'] == 1) {
                    header("location:./admin/ad_home.php");
                }
                if ($user['authority_id'] == 2) {
                    header("location:./student/stu_home.php");
                }
                if ($user['authority_id'] == 3) {
                    header("location:./teacher/te_home.php");
                }
            } else {
                $_SESSION['wrongPassword'] = "Sai mật khẩu!";
            }
        } else {
            $_SESSION['wrongEmail'] = "email không tồn tại!";
        }
    }


    //ham dang ky
    static public function register($dataRegister)
    {
        $sql = "insert into account(email, username, password, authority_id) values(:email, :username, :password, :authority_id)";
        DB::execute($sql, $dataRegister);
    }



    //ham hien thi cac khoa hoc
    static public function show_Course()
    {
        $sql = "select * from courses";
        $courses=DB::execute($sql);
        return $courses;
    }
}
