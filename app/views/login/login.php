<?php
include './app/controllers/Auth.php';
$err = [];
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $authority = $_POST['authority'];

  if (empty($email)) {
    $err['email'] = 'Bạn chưa nhập email';
  }
  if (empty($password)) {
    $err['password'] = 'Bạn chưa nhập mật khẩu';
  }
  if ($authority == 0) {
    $err['authority'] = 'Bạn chưa Chọn quyền truy cập';
  }


  if (empty($err)) {

    $dataLogin = [
      'email' => $_POST['email'],
      'authority_id'=>$_POST['authority']
      // 'password'=>$pass
    ];

    Auth::login($dataLogin);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

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
  <link rel="stylesheet" href="./assets/login.css">

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
<body style="background: url(https://lms.deha-soft.com/images/bg-auth.jpg) center/cover no-repeat; ">
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Đăng nhập</h2>
                <p class="text-white-50 mb-5">Vui lòng nhập tài khoản của bạn!</p>
                <!--Form-->
                <form action="" method="post">
                  <div class="form-outline form-white mb-4">
                    <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" />
                    <label class="form-label" for="typeEmailX">Email</label>
                    <div id="emailHelp" class="text-danger">
                      <span><?php echo (isset($err['email'])) ? $err['email'] : "" ?></span>
                    </div>

                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" />
                    <label class="form-label" for="typePasswordX">Mật khẩu</label>
                    <div class="text-danger">
                      <span><?php echo (isset($err['password'])) ? $err['password'] : "" ?></span>
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

                  <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">Đăng nhập</button>
                  <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Quên mật khẩu?</a></p>
                  <!-- <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                  </div> -->
                </form>

              </div>

              <div>
                <p class="mb-0">Chưa có tài khoản? <a href="./register.php" class="text-white-50 fw-bold">Đăng ký</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>