<?php
include '/xampp/htdocs/W3schools/classes/Auth.php';
if(isset($_POST['id_hint'])) //nếu có tồn tại $_POST['id'] không
{
    $id=$_POST['id_hint'];
    Auth::delete($id);
    $_SESSION['message']="Delete success";
    header("location:./ad_edit_lesson.php");
}else{
    $_SESSION['message']="Hint not found";

}

if(isset($_POST['id_video'])) //nếu có tồn tại $_POST['id'] không
{
    $id=$_POST['id_video'];
    Auth::deleteVideo($id);
    $_SESSION['message']="Delete success";
    header("location:./ad_edit_lesson.php");
}else{
    $_SESSION['message']="Hint not found";

}
      

if(isset($_POST['id_lesson'])) //nếu có tồn tại $_POST['id'] không
{
    $id=$_POST['id_lesson'];
    Auth::delete_Lesson($id);
    Auth::delete_introduction($id);
    Auth::delete_Lesson_Target($id);
    Auth::delete_Lesson_video($id);
    Auth::delete_lesson_hint($id);
    Auth::delete_lesson_content($id);
    $_SESSION['message']="Delete success";
    header("location:./ad_my_introduction.php");
}else{
    $_SESSION['message']="this lesson not found";

}

if(isset($_POST['id_subjects'])) //nếu có tồn tại $_POST['id'] không
{
    $id=$_POST['id_subjects'];
    $get_subjects_introduction = Auth::get_subjects_introduction($id);
    $_SESSION['id_lesson']=$get_subjects_introduction['lesson_id'];

    Auth::delete_Lesson($_SESSION['id_lesson']);
    Auth::delete_Lesson_Target($_SESSION['id_lesson']);
    Auth::delete_Lesson_video($_SESSION['id_lesson']);
    Auth::delete_lesson_hint($_SESSION['id_lesson']);
    Auth::delete_lesson_content($_SESSION['id_lesson']);
    Auth::delete_subjects($id);
    Auth::delete_subjects_introduction($id);
    $_SESSION['message']="Delete success";
    header("location:./ad_my_subjects.php");
}else{
    $_SESSION['message']="this lesson not found";

}


if(isset($_POST['id_courses'])) //nếu có tồn tại $_POST['id'] không
{
    $id=$_POST['id_courses'];
    $get_id_subjects = Auth::get_id_subjects($id);
    $_SESSION['id_subjects']=$get_id_subjects['subjects_id'];
    $get_subjects_introduction = Auth::get_subjects_introduction($_SESSION['id_subjects']);
    $_SESSION['id_lesson']=$get_subjects_introduction['lesson_id'];

    Auth::delete_Lesson($_SESSION['id_lesson']);
    Auth::delete_Lesson_Target($_SESSION['id_lesson']);
    Auth::delete_Lesson_video($_SESSION['id_lesson']);
    Auth::delete_lesson_hint($_SESSION['id_lesson']);
    Auth::delete_lesson_content($_SESSION['id_lesson']);
    Auth::delete_subjects($_SESSION['id_subjects']);
    Auth::delete_subjects_introduction($_SESSION['id_subjects']);
    Auth::delete_Courses($id);
    $_SESSION['message']="Delete success";
    header("location:./ad_my_courses.php");
}else{
    $_SESSION['message']="this lesson not found";

}