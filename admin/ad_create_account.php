<?php
include '/xampp/htdocs/W3schools/classes/Auth.php';

$err = [];
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rPassword = $_POST['rPassword'];
    $authority = $_POST['authority'];

    if (empty($username)) {
        $err['username'] = 'Bạn chưa nhập tên';
    }
    if (empty($email)) {
        $err['email'] = 'Bạn chưa nhập email';
    }
    if (empty($password)) {
        $err['password'] = 'Bạn chưa nhập mật khẩu';
    }
    if ($password != $rPassword) {
        $err['rPassword'] = 'Mật khẩu không khớp';
    }
    if ($authority == 0) {
        $err['authority'] = 'Bạn chưa Chọn quyền truy cập';
    }

    // if (!isset($_POST['cb'])) {
    //     $err['cb'] = 'Vui lòng đọc các điều khoản!';
    // }


    if (empty($err)) {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $dataRegister = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $pass,
            'authority_id' => $_POST['authority']
            // 'password'=>$_POST['password']
        ];
        $dataRegisterInfor = ['email' => $_POST['email']];

        Auth::register($dataRegister);
        Auth::register2($_POST['email']);
        // Auth::registerInfor($dataRegisterInfor);

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
    <link rel="stylesheet" href="./ad_assets/css/ad_menu.css">
    <link rel="stylesheet" href="./ad_assets/css/ad_body_setting.css">
    <link rel="stylesheet" href="./ad_assets/css/ad_account.css">



    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style=" background-color: rgb(224, 224, 224)">
    <!--Navbar pc menu left-->
    <?php
    include "/xampp/htdocs/W3schools/admin/admin_nav_menu_pc.php";
    ?>

    <!--body_content-->
    <div class=body__container>
        <div class="body__content-margin">
            <div class="body__content">
                <a href="./ad_account.php" class="btn btn-primary">Back to list</a>

                <h1>Create new account</h1>

                <form action="" method="post">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control" name="email" />
                                <label class="form-label" for="form3Example3">Địa chỉ email</label>
                                <div id="emailHelp" class="text-danger">
                                    <span><?php echo (isset($err['email'])) ? $err['email'] : "" ?></span>
                                </div>

                            </div>


                            <!-- username input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example3" class="form-control" name="username" />
                                <label class="form-label" for="form3Example3">Tên người dùng</label>
                                <div id="emailHelp" class="text-danger">
                                    <span><?php echo (isset($err['username'])) ? $err['username'] : "" ?></span>
                                </div>

                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" class="form-control" name="password" />
                                <label class="form-label" for="form3Example4">Mật khẩu</label>
                                <div class="text-danger">
                                    <span><?php echo (isset($err['password'])) ? $err['password'] : "" ?></span>
                                </div>
                            </div>

                            <!-- rPassword input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" class="form-control" name="rPassword" />
                                <label class="form-label" for="form3Example4">Nhập lại mật khẩu</label>
                                <div class="text-danger">
                                    <span><?php echo (isset($err['rPassword'])) ? $err['rPassword'] : "" ?></span>
                                </div>
                            </div>


                            <!-- select -->
                            <select class="form-select" aria-label="Default select example" name="authority">
                                <option value="0" selected>Chọn quyền truy cập</option>
                                <option value="1">admin</option>
                                <option value="2">Học sinh</option>
                                <option value="3">Giáo Viên</option>
                            </select>
                            <div class="text-danger">
                                <span><?php echo (isset($err['authority'])) ? $err['authority'] : "" ?></span>
                            </div>
                            <br>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">
                                Create
                            </button>

                        
                        
                        </form>

            </div>
        </div>
    </div>

    <!--footer-->
    <div>

    </div>


</body>
<!--JS file-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="./ad_assets/js/ad_menu.js">

</script>


</html>