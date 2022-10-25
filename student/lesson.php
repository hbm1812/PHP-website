<?php
include '/xampp/htdocs/W3schools/classes/Auth.php';
$lesson_id = null;
$lesson = null;
if ($_GET['lesson_id']) {
    $lesson_id = $_GET['lesson_id'];
    $lesson = Auth::show_Lesson($lesson_id);
    $targets=Auth::show_target($lesson_id);
    $videos = Auth::show_video($lesson_id);
    $hints = Auth::show_hint($lesson_id);
    $contents = Auth::show_content($lesson_id);
    $get_Lesson=Auth::get_Lesson($lesson_id);
} else {
    header("location:./stu_introduction.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson</title>

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
    <link rel="stylesheet" href="./stu_assets/css/lesson.css">



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
                    <li class="breadcrumb-item"><a href="./stu_subject.php?courses_id=<?= $_SESSION['courses_id'] ?>"><?php echo $_SESSION['courses_name']; ?></a></li>
                    <li class="breadcrumb-item active" ><a href="./stu_introduction.php?subjects_id=<?= $_SESSION['subjects_id']?>"><?php echo $_SESSION['courses_name'] . ' - ' . $_SESSION['subjects_name'] ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $lesson['lesson_name'] ?></li>
                </ol>

                <h3><?php echo $lesson['lesson_name'] ?></h3>
                <h4><?php
                    $get_Account_Username = Auth::get_Account_Username($get_Lesson['account_id']);
                    echo "Author: " . $get_Account_Username['username'];
                    ?></h4>
                <br>
                <br>
                
               <!-- target -->
               <?php if ($lesson['target_content'] != null) { ?>
                    <h5>
                        Mục tiêu
                    </h5>

                    <?php foreach ($targets as $target) { ?>
                        <textarea class="form-control" aria-label="With textarea" name="video_link" disabled><?php echo $target['target_content'] ?></textarea>
                    <?php } ?>


                <?php } ?>

                <br>
                <br>
                
                <!-- content -->
                <?php if ($lesson['lesson_content'] != null) { ?>
                    <h5>
                        Nội dung bài học
                    </h5>
                    <?php foreach ($contents as $content) { ?>
                        <textarea class="form-control" aria-label="With textarea" name="video_link" disabled><?php echo $content['lesson_content'] ?></textarea>
                    <?php } ?>

                <?php } ?>
                <br>
                <br>
                
                <!--video -->
                <?php if ($lesson['video_link'] != null) { ?>
                    <h5>
                       Video liên quan
                    </h5>
                    <ul>
                        <?php foreach($videos as $video){ ?>
                        <li> <?php echo $video['video_link'] ?> </li>  
                        <?php } ?>
                    </ul>

                <?php } ?>
                <br>
                <br>
                
                <!-- hint -->
                <?php if ($lesson['hint_link'] != null) { ?>
                    <h5>
                        Hướng dẫn để hoàn thành mục tiêu
                    </h5>
                    <p>Tham khảo đường link:</p>
                    <ul>
                        <?php foreach($hints as $hint){ ?>
                        <li> <a href="<?php echo $hint['hint_link'] ?>" target="blank"><?php echo $hint['hint_name'] ?></a> </li>
                        <?php } ?>
                    </ul>

                <?php } ?>

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