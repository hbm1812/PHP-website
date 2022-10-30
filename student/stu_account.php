<?php
include '/xampp/htdocs/W3schools/classes/Auth.php';
$get_information_and_account = Auth::get_information_and_account($_SESSION['account_id']);


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
        $dataUpdatePassword = [
            'account_id' => $_SESSION['account_id'],
            'password' => $pass
        ];

        Auth::update_Password($dataUpdatePassword);

        header('location:./stu_account.php');
    }
}


if (isset($_POST['change'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];


    if (empty($username)) {
        $err['username'] = 'Tên người dùng không được bỏ trống';
    }


    if (empty($err)) {
        $dataUpdateInformation = [
            'account_id' => $_SESSION['account_id'],
            'fullname' => $_POST['fullname'],
        ];
        $dataUpdateAccount = [
            'account_id' => $_SESSION['account_id'],
            'username' => $_POST['username']
        ];

        Auth::update_Information($dataUpdateInformation);
        Auth::update_Account($dataUpdateAccount);

        header('location:./stu_account.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>

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
    <link rel="stylesheet" href="./stu_assets/css/stu_menu.css">
    <link rel="stylesheet" href="./stu_assets/css/stu_body_setting.css">
    <link rel="stylesheet" href="./stu_assets/css/stu_account.css">



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
    include "/xampp/htdocs/W3schools/student/nav_Menu_pc.php";
    ?>

    <!--body_content-->
    <div class=body__container>
        <div class="body__content-margin">
            <div class="body__content">


                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Information</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Change Password</a>
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <h2>Your Account</h2>
                        <form method="post">
                            <!-- id -->
                            <div id="emailHelp" class="text-danger">
                                <span><?php echo (isset($err['account_id'])) ? $err['account_id'] : "" ?></span>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example3" class="form-control" name="account_id" value="<?php echo $_SESSION['account_id'] ?>" disabled />
                                <label class="form-label" for="form3Example3">account_id</label>

                            </div>
                            <!-- username input -->
                            <div id="emailHelp" class="text-danger">
                                <span><?php echo (isset($err['username'])) ? $err['username'] : "" ?></span>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example3" class="form-control" name="username" value="<?php echo $get_information_and_account['username'] ?>" />
                                <label class="form-label" for="form3Example3">Tên người dùng</label>


                            </div>

                            <!-- full input -->
                            <div id="emailHelp" class="text-danger">
                                <span><?php echo (isset($err['fullname'])) ? $err['fullname'] : "" ?></span>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example3" class="form-control" name="fullname" value="<?php echo $get_information_and_account['fullname'] ?>" />
                                <label class="form-label" for="form3Example3">Tên đầy đủ</label>


                            </div>

                            <!-- Email input -->
                            <div id="emailHelp" class="text-danger">
                                <span><?php echo (isset($err['email'])) ? $err['email'] : "" ?></span>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control" name="email" value="<?php echo $get_information_and_account['email'] ?>" disabled />
                                <label class="form-label" for="form3Example3">Địa chỉ email</label>

                            </div>



                            <!-- Submit button -->
                            <button type="submit" name="change" class="btn btn-success">Update</button>


                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
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
<script src="./stu_assets/js/stu_home.js"></script>


</html>