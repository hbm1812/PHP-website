<?php
include '/xampp/htdocs/W3schools/classes/Auth.php';

//lấy thông tin theo id
$account_id = null;
if ($_GET['account_id']) {
    $account_id = $_GET['account_id'];
    
} else {
    header("location:./ad_account.php");
}
//

$errors = [];

if (isset($_POST['changePassword'])) {
    $password = $_POST['password'];
    $rPassword = $_POST['rPassword'];


    if (empty($password)) {
        $err['password'] = 'Bạn chưa nhập mật khẩu';
    }
    if ($rPassword != $password) {
        $err['rPassword'] = 'Mật khẩu không khớp';
    }


    if (empty($err)) {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $dataUpdate = [
            'account_id' => $account_id,
            'password' => $pass
        ];

        Auth::account_change_password($dataUpdate);

        header('location:./ad_account.php');
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>

    <!--tab icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://lms.deha-soft.com/images/favicon.ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://lms.deha-soft.com/images/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://lms.deha-soft.com/images/favicon.ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://lms.deha-soft.com/images/favicon.ico/favicon-16x16.png">

    <!--Font-awesome-->
    <link rel="font-awesome" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


    <!--css file-->
    <link rel="stylesheet" href="./ad_assets/css/ad_menu.css">
    <link rel="stylesheet" href="./ad_assets/css/ad_body_setting.css">




    <!--Bootstrap-->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />

</head>

<body style=" background-color: rgb(224, 224, 224)">
    <!--Navbar pc menu left-->
    <?php
    include "/xampp/htdocs/W3schools/admin/admin_nav_Menu_pc.php";
    ?>

    <!--body_content-->
    <div class=body__container>
        <div class="body__content-margin">
            <div class="body__content">


            <a href="./ad_account.php" class="btn btn-primary">Back to list</a>
                <h2>Change Password</h2>
                <form method="post">



                    <!-- Password input -->
                    <div id="emailHelp" class="text-danger">
                        <span><?php echo (isset($err['password'])) ? $err['password'] : "" ?></span>
                    </div>
                    <div class="form-outline mb-4">
                        <input id="form3Example3" class="form-control" name="password" type="password" />
                        <label class="form-label" for="form3Example3"> Nhập mật khẩu mới</label>


                    </div>


                    <!-- confirm input -->
                    <div id="emailHelp" class="text-danger">
                        <span><?php echo (isset($err['rPassword'])) ? $err['rPassword'] : "" ?></span>
                    </div>
                    <div class="form-outline mb-4">
                        <input id="form3Example3" class="form-control" name="rPassword" type="Password" />
                        <label class="form-label" for="form3Example3"> Nhập lại mật khẩu mới</label>


                    </div>



                    <!-- Submit button -->
                    <button type="submit" name="changePassword" class="btn btn-success">Update</button>
                </form>
            </div>

            <!-- Pills content -->

        </div>
    </div>
    </div>

    <!--footer-->
    <div>

    </div>


</body>
<!--JS file-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
<script src="./ad_assets/js/ad_home.js"></script>


</html>