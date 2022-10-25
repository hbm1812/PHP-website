<?php
include '/xampp/htdocs/W3schools/classes/Auth.php';
$lesson_id = null;
if (isset($_GET['lesson_id'])) {
    $lesson_id = $_GET['lesson_id'];
    $_SESSION['lesson_id'] = $_GET['lesson_id'];
} else {
    $lesson_id = $_SESSION['lesson_id'];
}
$find_Lesson = Auth::find_Lesson($lesson_id);
$find_Target = Auth::find_Target($lesson_id);
$find_Videos = Auth::find_Video($lesson_id);
$find_Hints = Auth::find_Hint($lesson_id);
$find_Content = Auth::find_content($lesson_id);

$err = [];
if (isset($_POST['submit'])) {
    $dataUpdate = [
        'lesson_name' => $_POST['lesson_name'],
        'lesson_img' => $_POST['lesson_img'],
        'lesson_id' => $lesson_id

    ];

    $dataUpdateTarget = [
        'target_content' => $_POST['target_content'],
        'lesson_id' => $lesson_id

    ];
    $dataUpdateVideo = [
        'video_link' => $_POST['video_link'],
        'lesson_id' => $lesson_id
    ];
    $dataUpdateHint = [
        'hint_link' => $_POST['hint_link'],
        'hint_name' => $_POST['hint_name'],
        'lesson_id' => $lesson_id
    ];

    $dataUpdateContent = [
        'lesson_content' => $_POST['lesson_content'],
        'lesson_id' => $lesson_id
    ];

    Auth::update_Lesson($dataUpdate);
    Auth::update_Target($dataUpdateTarget);
    Auth::update_Video($dataUpdateVideo);
    Auth::update_Hint($dataUpdateHint);
    Auth::update_Content($dataUpdateContent);
    header("Refresh:0");
}



$dataAddVip = [
    'lesson_id' => $lesson_id

];

if (isset($_POST['add_new_hint'])) {

    Auth::add_Hint($dataAddVip);

    header("Refresh:0");
}

// if (isset($_POST['add_new_video'])) {

//     Auth::add_Video($dataAddVip);

//     header("Refresh:0");
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit lesson</title>

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
    <link rel="stylesheet" href="./te_assets/css/te_menu.css">
    <link rel="stylesheet" href="./te_assets/css/te_boy_setting.css">
    <link rel="stylesheet" href="./te_assets/css/te_add_subject.css">
    <link rel="stylesheet" href="./te_assets/css/te_edit_lesson.css">



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

                <form action="./te_edit_lesson.php" method="post">
                    <h2>Edit Lesson</h2>
                    <br>
                    <br>
                    <!-- form them mon hoc -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input type="text" class="form-control" value="<?php echo $find_Lesson['lesson_name'] ?>" aria-label="Username" aria-describedby="basic-addon1" name="lesson_name">


                    </div>




                    <label for="basic-url" class="form-label">Image Address</label>
                    <a href="https://support.google.com/websearch/answer/118238?hl=vi&co=GENIE.Platform%3DDesktop" target="blank">(How to get image address?)</a>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Ex: https://example.com/users/</span>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $find_Lesson['lesson_img'] ?>" name="lesson_img">
                    </div>


                    <label for="basic-url" class="form-label">Author</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Username</span>
                        <input type="text" class="form-control" placeholder="<?php echo $_SESSION['dataUser'] ?>" disabled>
                        <span class="input-group-text">@email</span>
                        <input type="text" class="form-control" placeholder="<?php echo $_SESSION['dataEmail'] ?>" disabled>
                    </div>
                    <br>
                    <hr>
                    <br>


                    <div class="input-group">
                        <span class="input-group-text">Target</span>
                        <textarea class="form-control" aria-label="With textarea" name="target_content"><?php echo $find_Target['target_content'] ?></textarea>
                    </div>
                    <br>

                    <div class="input-group">
                        <span class="input-group-text">Content</span>
                        <textarea class="form-control" aria-label="With textarea" name="lesson_content"><?php echo $find_Content['lesson_content'] ?></textarea>
                    </div>

                    <br>
                    <label for="basic-url" class="form-label">Video iframe</label>
                    <a href="https://www.youtube.com/watch?v=npnp--SSx_8" target="blank">(How to get iframe video?)</a>
                    <!-- <input type="button" class="btn btn-info" onclick="showMessage()" value="Add more video iframe" /> -->

                    <?php
                    foreach ($find_Videos as $find_Video) {
                    ?>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Iframe:</span>
                            <textarea class="form-control" aria-label="With textarea" name="video_link"><?php echo $find_Video['video_link'] ?></textarea>
                            <!-- <form action="./te_delete.php" method="post" id="formDelete-<?= $find_Video['video_id'] ?>">
                                <input type="hidden" name="id_video" value="<?= $find_Video['video_id'] ?>">
                                <button class="btn btn-danger btn-delete" id="<?= $find_Video['video_id'] ?>">Delete</button>
                            </form> -->
                        </div>
                    <?php
                    }
                    ?>

                    <br>

                    <label for="basic-url" class="form-label">Hint</label>


                    <br>
                    <br>
                    <?php

                    foreach ($find_Hints as $find_Hint) {

                    ?>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Hint name</span>
                            <input type="text" class="form-control" value="<?php echo $find_Hint['hint_name'] ?>" name="hint_name">
                            <span class="input-group-text">Hint link</span>
                            <input type="text" class="form-control" value="<?php echo $find_Hint['hint_link'] ?>" name="hint_link">

                            <!-- <form action="./te_delete.php" method="post" id="formDelete-<?= $find_Hint['hint_id']  ?>">
                                <input type="hidden" name="id_hint" value="<?= $find_Hint['hint_id'] ?>">
                                <button class="btn btn-danger btn-delete" id="<?= $find_Hint['hint_id'] ?>">Delete</button>
                            </form> -->

                        </div>
                    <?php
                    }
                    ?>

                    <br>
                    <a href="./te_my_introduction.php?subjects_id=<?= $_SESSION['subjects_id'] ?>" class="btn btn-primary btn_1 btn-lg">Back</a>

                    <button type="submit" class="btn btn-success btn-lg" name="submit">Update</button>






                </form>

                <br>
                <br>




            </div>
        </div>
    </div>

    <!--footer-->
    <div>

    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="./te_assets/js/te_menu.js"></script>



</html>