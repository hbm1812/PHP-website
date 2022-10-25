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
  <title>Courses</title>

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
  <link rel="stylesheet" href="./te_assets/css/te_menu.css">
  <link rel="stylesheet" href="./te_assets/css/te_boy_setting.css">
  <link rel="stylesheet" href="./te_assets/css/te_courses.css">



  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style=" background-color: rgb(224, 224, 224)">
    <!--Navbar pc menu left-->
    <?php
    include "/xampp/htdocs/W3schools/teacher/teacher_nav_menu_pc.php";
    ?>

    <!--body_content-->
    <div class=body__container>
        <div class="body__content-margin">
            <div class="body__content">
            <h4>All courses (3)</h4>
                <div class="choose_role">
                    <select class="form-select-role" name="authority">
                        <option value="0" selected>All role</option>
                        <option value="1">Pre-Intern</option>
                    </select>
                </div>
                <div class="choose_category">
                    <select class="form-select-category" name="authority">
                        <option value="0" selected>All category</option>
                    </select>
                </div>

                <br>
                <br>

                <?php
                foreach ($courses as $course) {
                ?>
                    <div class="card" style="width: 18rem;">

                        <!-- <div class="icon_btn"><img src="./stu_assets/img/icon/remove.png" alt=""></div> -->
                        <img src="<?php echo $course['courses_img'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $course['courses_name'] ?></h5>
                            <p class="card-text"><?php echo $course['courses_depcription'] ?></p>
                            <a href="./te_subject.php?courses_id=<?= $course['courses_id'] ?>" class="btn btn-primary btn_1">View more course</a>


                        </div>
                    </div>


                <?php
                }
                ?>


                <br>
                <br>
                <br>


                


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
<script src="./te_assets/js/te_menu.js"></script>
</html>