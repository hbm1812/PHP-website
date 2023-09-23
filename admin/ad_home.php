<?php
include '/xampp/htdocs/W3schools/classes/Auth.php';
$courses = Auth::show_Course();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <!--tab icon-->
  <link rel="apple-touch-icon" sizes="57x57" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="https://lms.deha-pple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="https://lms.deha-soft.com/images/fasoft.com/images/favicon.ico/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="https://lms.deha-soft.com/images/favicon.ico/avicon.ico/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="https://lms.deha-soft.com/images/favicon.ico/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://lms.deha-soft.com/images/favicon.ico/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="https://lms.deha-soft.com/images/favicon.ico/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://lms.deha-soft.com/images/favicon.ico/favicon-16x16.png">


  <!--css file-->
  <link rel="stylesheet" href="./ad_assets/css/ad_menu.css">
  <link rel="stylesheet" href="./ad_assets/css/ad_body_setting.css">
  <link rel="stylesheet" href="./ad_assets/css/ad_home.css">



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
  include "/xampp/htdocs/W3schools/admin/admin_nav_menu_pc.php";
  ?>

  <!--body_content-->
  <div class=body__container>
    <div class="body__content-margin">
      <div class="body__content">
        <h4>HELLO Admin</h4>
        <hr>
        <h4>Tin tức</h4>
        <div style="flex-direction: row; display:flex;">
          <div class="card" style="width: 18rem; margin-right:20px">
            <img src="https://scontent.fhan5-8.fna.fbcdn.net/v/t39.30808-6/316535674_566046138862174_646003536429564336_n.jpg?stp=dst-jpg_p600x600&_nc_cat=108&ccb=1-7&_nc_sid=730e14&_nc_ohc=wndzQYIciMsAX8AUCpa&_nc_ht=scontent.fhan5-8.fna&oh=00_AfD5KiPbAkE1Lws_1trgqTK_ZGqrogUIwa_0DWRAeQUP2A&oe=638E6C32" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">5 POPULAR TEST AUTOMATION TOOLS FOR REACT NATIVE APP</h5>
              <p class="card-text" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">React Native has been a popular topic in the world of mobile development for a number of years..</p>
              <a href="#" class="btn btn-primary">Xem thêm</a>
            </div>
          </div>

          <div class="card" style="width: 18rem; margin-right:20px">
            <img src="https://scontent.fhan5-7.fna.fbcdn.net/v/t39.30808-6/315889781_564298612370260_7211738574589179008_n.jpg?stp=dst-jpg_p526x296&_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_ohc=8gsdLs6IRiQAX-VM2jS&tn=4hluNjQfyIPsddy1&_nc_ht=scontent.fhan5-7.fna&oh=00_AfANzPuLCNJW3a-hT_Vfp3_fIkkfAOL-fRBJ6pd_tcsD_A&oe=638DE932" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">DEVOPS VS DEVSECOPS: WHAT’S DIFFERENT?</h5>
              <p class="card-text" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">DevOps and DevSecOps share many similarities. The two methods employ both automation and continuous monitoring and have a very similar culture. </p>
              <a href="#" class="btn btn-primary">Xem thêm</a>
            </div>
          </div>

        </div>




      </div>
    </div>
  </div>

  <!--footer-->
  <div>

  </div>


</body>
<!--JS file-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
<script src="./ad_assets/js/ad_menu.js"></script>

</html>