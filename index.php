<?php

if (isset($_SESSION['login'])) {
    if ($_SESSION['authority_id'] == 'admin') {
        header("location:./admin/ad_home.php");
    }
    if ($_SESSION['authority_id'] == 'hoc sinh') {
        header("location:./admin/ad_home.php");
    }
    if ($_SESSION['authority_id'] == 'giao vien') {
        header("location:./admin/ad_home.php");
    }
} else {
    header('location:./login.php');
}
// else{
//     if($_SESSION['authority_id']=='admin'){
//         header("location:./admin/ad_home.php");
//     }
//     if ($_SESSION['authority_id']=='hoc sinh') {
//         header("location:./admin/ad_home.php");
//      }
//      if ($_SESSION['authority_id']=='giao vien') {
//         header("location:./admin/ad_home.php");
//      }
// }



// if(isset($_SESSION['login'])){
//     if($_SESSION['authority_id']=='admin'){
//         header("location:./admin/ad_home.php");
//     }
//     if ($_SESSION['authority_id']=='hoc sinh') {
//         header("location:./admin/ad_home.php");
//      }
//      if ($_SESSION['authority_id']=='giao vien') {
//         header("location:./admin/ad_home.php");
//      }
// }
// else{
//     header('location:./login.php');
// }