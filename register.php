<?php
include './classes/Auth.php';

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
            'authority_id'=>$_POST['authority']
            // 'password'=>$_POST['password']
        ];
        $dataRegisterInfor = ['email' => $_POST['email']];

        Auth::register($dataRegister);
        // Auth::registerInfor($dataRegisterInfor);

        header('location:./login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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


    <!--css file-->


    <!--JS file-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>

    <!--Bootstrap-->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />

</head>

<body>
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
        <!-- Background image -->

        <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Đăng ký tài khoản</h2>
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
                                Đăng ký
                            </button>

                            <!-- Register buttons -->
                            <div>
                                <p class="mb-0">Hoặc đã có tài khoản? <a href="./login.php" class="text-black-50 fw-bold">Đăng nhập</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

</body>

</html>