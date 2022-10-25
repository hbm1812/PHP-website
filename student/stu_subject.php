<?php
include '/xampp/htdocs/W3schools/classes/Auth.php';
$courses_id = null;
$subjects = null;
if ($_GET['courses_id']) {
   
    $courses_id = $_GET['courses_id'];
    $subjects = Auth::show_Subjects($courses_id);
    $get_Subjects=Auth::get_Subject($courses_id);
} else {
    header("location:./stu_courses.php");
}



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
    <link rel="stylesheet" href="./stu_assets/css/subjects.css">



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
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./stu_courses.php">Courses</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $get_Subjects['courses_name'] ?></li>
                </ol>
                <h3>All Subjects</h3>
                <!-- <div class="choose_role">
                    <select class="form-select-role" name="authority">
                        <option value="0" selected>All role</option>
                        <option value="1">Pre-Intern</option>
                    </select>
                </div>
                <div class="choose_category">
                    <select class="form-select-category" name="authority">
                        <option value="0" selected>All category</option>
                    </select>
                </div> -->

                <br>
                <br>



                <?php
               $i=0;
                foreach ($subjects as $subject) {
                    $i++;
                ?>
                
                    <div class="card" style="width: 18rem;">

                        <!-- <div class="icon_btn"><img src="./stu_assets/img/icon/remove.png" alt=""></div> -->
                        <img src="<?php echo $subject['subjects_img'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $i.". ".$subject['subjects_name'] ?></h5>
                            <p class="card-text"><?php 
                            $get_Account_Username=Auth::get_Account_Username($subject['account_id']);
                            echo "Author: ".$get_Account_Username['username'];
                            ?> </p>
                            <a href="./stu_introduction.php?subjects_id=<?= $subject['subjects_id'] ?>" class="btn btn-primary btn_1">Learn</a>


                        </div>
                    </div>
                    <?php 
                    $_SESSION['courses_id'] =$subject['courses_id'];
                    $_SESSION['courses_name'] =$get_Subjects['courses_name']; 
                     ?>


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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
<script src="./stu_assets/js/stu_home.js"></script>


</html>