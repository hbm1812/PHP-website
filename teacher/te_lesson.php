<?php
include '/xampp/htdocs/W3schools/classes/Auth.php';
$lesson_id = null;
$lesson = null;
if ($_GET['lesson_id']) {
    $lesson_id = $_GET['lesson_id'];
    $lesson = Auth::show_Lesson($lesson_id);
    $targets = Auth::show_target($lesson_id);
    $videos = Auth::show_video($lesson_id);
    $hints = Auth::show_hint($lesson_id);
    $contents = Auth::show_content($lesson_id);
    $get_Lesson = Auth::get_Lesson($lesson_id);
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
    <link rel="stylesheet" href="./te_assets/css/te_lesson.css">



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
                    <li class="breadcrumb-item active"><a href="./te_introduction.php?subjects_id=<?= $_SESSION['subjects_id'] ?>"><?php echo $_SESSION['courses_name'] . ' - ' . $_SESSION['subjects_name'] ?></a></li>
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
                        <?php foreach ($videos as $video) { ?>
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
                        <?php foreach ($hints as $hint) { ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="./te_assets/js/te_menu.js"></script>

</html>