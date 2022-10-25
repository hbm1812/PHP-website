<?php
include '/xampp/htdocs/W3schools/classes/Auth.php';
$subjects_id = null;
$introductions = null;
if (isset($_GET['subjects_id'])) {
    $subjects_id = $_GET['subjects_id'];
    $_SESSION['subjects_id'] = $_GET['subjects_id'];
} else {
    $subjects_id =  $_SESSION['subjects_id'];
}
$introductions = Auth::show_Introduction($subjects_id);
$getIntroductions = Auth::get_Introduction($subjects_id);


$_SESSION['subjects_name'] = $getIntroductions['subjects_name'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction</title>

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
    <link rel="stylesheet" href="./te_assets/css/te_introduction.css">



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
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./te_courses.php">Courses</a></li>
                    <li class="breadcrumb-item"><a href="./te_subject.php?courses_id=<?= $_SESSION['courses_id'] ?>"><?php echo $_SESSION['courses_name']; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $_SESSION['courses_name'] . ' - ' . $getIntroductions['subjects_name'] ?></li>
                </ol>
                <h3><?php echo $getIntroductions['subjects_name'] ?></h3>
                <h4>Author:</h4>
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
                $i = 0;
                foreach ($introductions as $introduction) {
                    $i++;
                ?>
                    <div class="card" style="width: 18rem;">

                        <!-- <div class="icon_btn"><img src="./stu_assets/img/icon/remove.png" alt=""></div> -->
                        <img src="<?php echo $introduction['lesson_img'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $i . ". " . $introduction['lesson_name'] ?></h6>
        
                            <a href="./te_edit_lesson.php?lesson_id=<?= $introduction['lesson_id'] ?>" class="btn btn-warning btn_1">Edit</a>
                            <form action="./te_delete.php" method="post" id="formDelete-<?= $introduction['lesson_id'] ?>">
                                <input type="hidden" name="id_lesson" value="<?= $introduction['lesson_id'] ?>">
                                <button class="btn btn-danger btn-delete" id="<?= $introduction['lesson_id'] ?>">Delete</button>
                            </form>


                        </div>
                    </div>


                <?php
                }
                ?>


                <br>
                <br>
                <hr>

                <h3>SUMMARY</h3>
                <h6>LIST LESSON:</h6>
                <?php
                $i = 0;
                foreach ($introductions as $introduction) {
                    $i++;
                    echo $i . ". " . $introduction['lesson_name'];
                ?>
                <br>
                <?php
                }
                ?>
                <br>
                <br>
                <h6>You can't finish this subject without finish lessons:</h6>
                <?php
                $i = 0;
                foreach ($introductions as $introduction) {
                    $i++;
                    echo $i . ". " . $introduction['lesson_name'];
                ?>
                <br>
                <?php
                }
                ?>






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