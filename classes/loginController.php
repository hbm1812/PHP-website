<?php

include './classes/Auth.php';

class controllers{
     //ham xu ly thao tac du lieu sau dang nhap
     static public function login($dataLogin)
     {
         $user = Auth::attempt($dataLogin);
 
         if (count($user) > 0) {
             $checkPass = password_verify($_POST['password'], $user['password']); //đối chiếu mật khẩu nhập vào và mật khẩu trên SQL xem có trùng nhau không?
             if ($checkPass == true) {
                 $_SESSION['login'] = "Login success";
                 $_SESSION['account_id'] = $user['account_id'];
                 $_SESSION['dataUser'] = $user['username'];
                 $_SESSION['dataEmail'] = $user['email'];
                 // Auth::getDataInformation($dataLogin);
                 if ($user['authority_id'] == 1) {
                     header("location:./admin/ad_home.php");
                    //  $_SESSION['authority'] ='admin';
                    //  header('location:/W3schools/index.php');
                 }
                 if ($user['authority_id'] == 2) {
                     header("location:./student/stu_home.php");
                    //  $_SESSION['authority'] ='hoc sinh';
                    //  header('location:/W3schools/index.php');
                 }
                 if ($user['authority_id'] == 3) {
                     header("location:./teacher/te_home.php");
                    //  $_SESSION['authority'] ='giao vien';
                    //  header('location:/W3schools/index.php');
                     
                 }
             } else {
                 $_SESSION['wrongPassword'] = "Sai mật khẩu!";
             }
         } else {
             $_SESSION['wrongEmail'] = "email không tồn tại!";
         }
     }

}