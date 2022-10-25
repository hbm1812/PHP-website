<?php
include '/xampp/htdocs/W3schools/classes/Auth.php';
$courses = Auth::show_Course();
$account_id = $_SESSION['account_id'];



$err = [];
if (isset($_POST['submit'])) {

    $courses_id = $_POST['courses_id'];
    $subjects_img = $_POST['subjects_img'];
    $subjects_name = $_POST['subjects_name'];
    $account_id = $_SESSION['account_id'];

    if ($courses_id == 0) {
        $err['courses_id'] = '*Bạn chưa chọn khóa học*';
    }

    if (empty($subjects_img)) {
        $err['subjects_img'] = '*Bạn chưa thêm ảnh môn học*';
    }
    if (empty($subjects_name)) {
        $err['subjects_name'] = '*Bạn chưa nhập tên môn học*';
    }


    // if (!isset($_POST['cb'])) {
    //     $err['cb'] = 'Vui lòng đọc các điều khoản!';
    // }


    if (empty($err)) {

        $dataAdd = [
            'courses_id' => $_POST['courses_id'],
            'subjects_name' => $_POST['subjects_name'],
            'subjects_img' => $_POST['subjects_img'],
            'account_id' => $_SESSION['account_id']
            // 'password'=>$_POST['password']
        ];

        Auth::add_subject($dataAdd);
        // Auth::registerInfor($dataRegisterInfor);

    }
}

if (isset($_POST['resest'])) {
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

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
    <link rel="stylesheet" href="./te_assets/css/te_edit.css">



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


                <h2>Edit</h2>
                <h5>Choose course</h5>

                <div class="choose_role">
                    <select class="form-select-role" name="courses_id" id="courses" onchange="coursesChanged(this)">
                        <option value="0" selected>--Choose course--</option>
                        <?php

                        foreach ($courses as $course) {

                        ?>
                            <option value="<?= $course['courses_id']  ?>"><?php echo $course['courses_name'] ?></option>

                        <?php } ?>
                    </select>



                </div>
                <p style="color: red" id="show_message"></p>
                <br>
                <br>
                <h5>Choose subject</h5>
                <div class="choose_role">
                    <select class="form-select-role" name="subjects_id" id="subjects" onchange="subjectsChanged(this)">
                        <option value="0" selected>--Choose subject--</option>
                        <?php

                        foreach ($subjects as $subject) {

                        ?>
                            <option value="<?= $subject['courses_id']  ?>"><?php echo $subject['courses_name'] ?></option>

                        <?php } ?>
                    </select>



                </div>
               

                <script language="javascript">
                    // Hàm xử lý khi thẻ select thay đổi giá trị được chọn
                    // obj là tham số truyền vào và cũng chính là thẻ select
                    function coursesChanged(obj) {
                        var message = document.getElementById('show_message');
                        var value = obj.value;


                        if (value == '0') {
                            message.innerHTML = "Bạn chưa chọn giới tính";
                        } else if (value !== '0') {
                            let e = document.getElementById('courses').value;
                            
                           
                            document.cookie = e;
                            var x =document.cookie
                             message.innerHTML=x;
                        }

                    }
                </script>

                <br>
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