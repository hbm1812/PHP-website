<?php
require_once __DIR__ . './DB.php';

class Auth
{
    //ham dang nhap
    static public function attempt($dataLogin)
    {

        $sql = "select * from account where email=:email and authority_id=:authority_id ";
        $user = DB::execute($sql, $dataLogin);
        return count($user) > 0 ? $user[0] : [];
    }

    static public function getUsername($account_id)
    {

        $sql = "select * from account where account_id=:account_id ";
        $dataFind = ['account_id' => $account_id];
        $user = DB::execute($sql, $dataFind);
        return count($user) > 0 ? $user[0] : [];
    }


    //ham dang ky
    static public function register($dataRegister)
    {
        $sql = "insert into account(email, username, password, authority_id) values(:email, :username, :password, :authority_id)";
        DB::execute($sql, $dataRegister);
    }
    // static public function account_id_to_insert_information($email)
    // {
    //     $sql = "select * from account where email=:email";
    //     $dataFind = ['email' => $email];
    //     $account_id_to_insert_information = DB::execute($sql, $dataFind);
    //     return count($account_id_to_insert_information) > 0 ? $account_id_to_insert_information[0] : [];
    // }
    static public function register2($email)
    {
        $sql = "insert into information(email) values(:email)";
        $dataRegister2 = ['email' => $email];
        DB::execute($sql, $dataRegister2);
    }


    static public function get_Account_Username($account_id)
    {
        $sql = "select * from account where account_id=:account_id";
        $dataFind = ['account_id' => $account_id];
        $get_Account_Username = DB::execute($sql, $dataFind);
        return count($get_Account_Username) > 0 ? $get_Account_Username[0] : [];
    }

    static public function get_Account_id($accountSB_id)
    {
        $sql = "select * from account where account_id=:account_id";
        $dataFind = ['account_id' => $accountSB_id];
        $get_Account_Username = DB::execute($sql, $dataFind);
        return count($get_Account_Username) > 0 ? $get_Account_Username[0] : [];
    }





    //ham hien thi cac khoa hoc
    static public function show_Course()
    {
        $sql = "select * from courses";
        $courses = DB::execute($sql);
        return $courses;
    }

    //ham hien thi cac khoa hoc
    static public function show_Subjects2($account_id)
    {
        $sql = "select * from subjects,account where subjects.account_id = account.account_id and subjects.account_id=:account_id";
        $dataFind = ['account_id' => $account_id];
        $subjects = DB::execute($sql, $dataFind);
        return $subjects;
    }

    //ham hien thi cac khoa hoc
    static public function show_Subjects_admin()
    {
        $sql = "select * from subjects";
        $subjects = DB::execute($sql);
        return $subjects;
    }

    //ham hien thi cac khoa hoc
    static public function show_Subjects3($dataFindSubjects)
    {
        $sql = "select * from subjects,courses where subjects.courses_id = courses.courses_id and subjects.account_id=:account_id";
        $subjects = DB::execute($sql, $dataFindSubjects);
        return $subjects;
    }




    //ham hien thi cac mon hoc
    static public function show_Subjects($courses_id)
    {
        $sql = "select * from subjects,courses where subjects.courses_id=courses.courses_id and subjects.courses_id=:courses_id";
        $dataFind = ['courses_id' => $courses_id];
        $subjects = DB::execute($sql, $dataFind);
        return $subjects;
    }
    static public function get_Subject($courses_id)
    {
        $sql = "select * from subjects,courses where subjects.courses_id=courses.courses_id and subjects.courses_id=:courses_id";
        $dataFind = ['courses_id' => $courses_id];
        $getSubjects = DB::execute($sql, $dataFind);
        return count($getSubjects) > 0 ? $getSubjects[0] : [];
    }

    //ham hien thi cac  noi dung bai hoc
    static public function show_Introduction($subjects_id)
    {
        $sql = "select * from subjects,introduction,lesson where subjects.subjects_id=introduction.subjects_id and introduction.lesson_id = lesson.lesson_id and introduction.subjects_id=:subjects_id";
        $dataFind = ['subjects_id' => $subjects_id];
        $introduction = DB::execute($sql, $dataFind);
        return $introduction;
    }

    //ham lay thong tin  cac noi dung bai hoc
    static public function get_Introduction($subjects_id)
    {
        $sql = "select * from subjects,introduction,lesson where subjects.subjects_id=introduction.subjects_id and introduction.lesson_id = lesson.lesson_id and introduction.subjects_id=:subjects_id";
        $dataFind = ['subjects_id' => $subjects_id];
        $introduction = DB::execute($sql, $dataFind);
        return count($introduction) > 0 ? $introduction[0] : [];
    }

    //ham lay thong tin  cac noi dung bai hoc
    static public function get_Lesson($lesson_id)
    {
        $sql = "select * from lesson where lesson_id=:lesson_id";
        $dataFind = ['lesson_id' => $lesson_id];
        $get_Lesson = DB::execute($sql, $dataFind);
        return count($get_Lesson) > 0 ? $get_Lesson[0] : [];
    }


    //lay thong tin tu bang lesson
    static public function show_Lesson($lesson_id)
    {
        $sql = "select * from lesson, hint, video, target,content where lesson.lesson_id=content.lesson_id and lesson.lesson_id=hint.lesson_id and lesson.lesson_id=video.lesson_id and lesson.lesson_id=target.lesson_id and lesson.lesson_id=:lesson_id";
        $dataFind = ['lesson_id' => $lesson_id];
        $lesson = DB::execute($sql, $dataFind);
        return count($lesson) > 0 ? $lesson[0] : [];
    }

    //lay thong tin tu bang target
    static public function show_target($lesson_id)
    {
        $sql = "select * from target where lesson_id=:lesson_id";
        $dataFind = ['lesson_id' => $lesson_id];
        $targets = DB::execute($sql, $dataFind);
        return $targets;
    }
    //lay thong tin tu bang video
    static public function show_video($lesson_id)
    {
        $sql = "select * from video where lesson_id=:lesson_id";
        $dataFind = ['lesson_id' => $lesson_id];
        $videos = DB::execute($sql, $dataFind);
        return $videos;
    }

    //lay thong tin tu bang hint
    static public function show_hint($lesson_id)
    {
        $sql = "select * from hint where lesson_id=:lesson_id";
        $dataFind = ['lesson_id' => $lesson_id];
        $hints = DB::execute($sql, $dataFind);
        return $hints;
    }

    //lay thong tin tu bang hint
    static public function show_content($lesson_id)
    {
        $sql = "select * from content where lesson_id=:lesson_id";
        $dataFind = ['lesson_id' => $lesson_id];
        $contents = DB::execute($sql, $dataFind);
        return $contents;
    }


    //ham lay thong tin  tai khoan
    static public function get_information_and_account($account_id)
    {
        $sql = "select * from information, account where information.account_id=account.account_id and account.account_id=:account_id";
        $dataFind = ['account_id' => $account_id];
        $get_information_and_account = DB::execute($sql, $dataFind);
        return count($get_information_and_account) > 0 ? $get_information_and_account[0] : [];
    }


    static public function update_Password($dataUpdatePassword)
    {
        $sql = "update account set password=:password where account_id =:account_id";
        DB::execute($sql, $dataUpdatePassword);
    }

    static public function update_Information($dataUpdateInformation)
    {
        $sql = "update information set fullname=:fullname where account_id =:account_id";
        DB::execute($sql, $dataUpdateInformation);
    }
    static public function update_Account($dataUpdateAccount)
    {
        $sql = "update account set username=:username where account_id = :account_id";
        DB::execute($sql, $dataUpdateAccount);
    }


    static public function update_Information_account_id($dataUpdateAccount_id)
    {
        $sql = "update information set account_id=:account_id where email = :email";
        DB::execute($sql, $dataUpdateAccount_id);
    }








    // ******************GIAO VIEN********************
    //them moi mon hoc
    static public function add_subject($dataAdd)
    {
        $sql = "insert into subjects( courses_id, subjects_name, subjects_img, account_id) values( :courses_id, :subjects_name, :subjects_img, :account_id)";
        DB::execute($sql, $dataAdd);
    }


    //them moi bai hoc
    static public function add_lesson($dataAdd)
    {
        $sql = "insert into lesson(  lesson_name, lesson_img, account_id) values( :lesson_name, :lesson_img, :account_id)";
        DB::execute($sql, $dataAdd);
    }

    static public function find_lesson_id($dataAdd)
    {
        $sql = "select * from lesson where lesson_name=:lesson_name and account_id=:account_id and lesson_img=:lesson_img";
        $find_lesson_id = DB::execute($sql, $dataAdd);
        return count($find_lesson_id) > 0 ? $find_lesson_id[0] : [];
    }

    static public function add_introduction($dataAddIntroduction)
    {
        $sql = "insert into introduction(subjects_id, lesson_id) values( :subjects_id, :lesson_id)";
        DB::execute($sql, $dataAddIntroduction);
    }
    static public function add_Target($dataAddVip)
    {
        $sql = "insert into target(lesson_id) values(:lesson_id)";
        DB::execute($sql, $dataAddVip);
    }
    static public function add_Video($dataAddVip)
    {
        $sql = "insert into video(lesson_id) values(  :lesson_id)";
        DB::execute($sql, $dataAddVip);
    }
    static public function add_Hint($dataAddVip)
    {
        $sql = "insert into hint(lesson_id) values(  :lesson_id)";
        DB::execute($sql, $dataAddVip);
    }
    static public function add_Content($dataAddVip)
    {
        $sql = "insert into content(lesson_id) values(  :lesson_id)";
        DB::execute($sql, $dataAddVip);
    }




    //ham im kiem mon hoc theo ma mon hoc
    static public function find_Subjects($subjects_id)
    {
        $sql = "select * from subjects where subjects_id=:subjects_id";
        $dataFind = ['subjects_id' => $subjects_id];
        $find_Subjects = DB::execute($sql, $dataFind);
        return count($find_Subjects) > 0 ? $find_Subjects[0] : [];
    }

    static public function update_Subjects($dataUpdate)
    {
        $sql = "update subjects set subjects_name=:subjects_name, subjects_img=:subjects_img where subjects_id =:subjects_id";
        DB::execute($sql, $dataUpdate);
    }


    //ham im kiem bai hoc theo ma mon hoc
    static public function find_Lesson($lesson_id)
    {
        $sql = "select * from lesson where lesson_id=:lesson_id";
        $dataFind = ['lesson_id' => $lesson_id];
        $find_Lesson = DB::execute($sql, $dataFind);
        return count($find_Lesson) > 0 ? $find_Lesson[0] : [];
    }

    //ham im kiem bai hoc theo ma mon hoc
    static public function find_Target($lesson_id)
    {
        $sql = "select * from target where lesson_id=:lesson_id";
        $dataFind = ['lesson_id' => $lesson_id];
        $find_Target = DB::execute($sql, $dataFind);
        return count($find_Target) > 0 ? $find_Target[0] : [];
    }
    //ham im kiem bai hoc theo ma mon hoc
    static public function find_Video($lesson_id)
    {
        $sql = "select * from video where lesson_id=:lesson_id";
        $dataFind = ['lesson_id' => $lesson_id];
        $find_Videos = DB::execute($sql, $dataFind);
        return $find_Videos;
    }

    //ham im kiem bai hoc theo ma mon hoc
    static public function find_Hint($lesson_id)
    {
        $sql = "select * from hint where lesson_id=:lesson_id";
        $dataFind = ['lesson_id' => $lesson_id];
        $find_Hint = DB::execute($sql, $dataFind);
        return  $find_Hint;
    }

    //ham im kiem bai hoc theo ma mon hoc
    static public function find_content($lesson_id)
    {
        $sql = "select * from content where lesson_id=:lesson_id";
        $dataFind = ['lesson_id' => $lesson_id];
        $find_Content = DB::execute($sql, $dataFind);
        return count($find_Content) > 0 ? $find_Content[0] : [];
    }


    //ham im kiem bai hoc theo ma mon hoc
    static public function find_Lesson2($lesson_id)
    {
        $sql = "select * from lesson, target, hint, video where lesson.lesson_id=target.lesson_id and lesson.lesson_id=hint.lesson_id and lesson.lesson_id=video.lesson_id and lesson.lesson_id=:lesson_id";
        $dataFind = ['lesson_id' => $lesson_id];
        $find_Lesson2 = DB::execute($sql, $dataFind);
        return $find_Lesson2;
    }


    static public function update_Lesson($dataUpdate)
    {
        $sql = "update lesson set lesson_name=:lesson_name, lesson_img=:lesson_img where lesson.lesson_id =:lesson_id";
        DB::execute($sql, $dataUpdate);
    }

    static public function update_Target($dataUpdateTarget)
    {
        $sql = "update target set target_content=:target_content where lesson_id =:lesson_id";
        DB::execute($sql, $dataUpdateTarget);
    }
    static public function update_Video($dataUpdateVideo)
    {
        $sql = "update video set video_link=:video_link where lesson_id =:lesson_id";
        DB::execute($sql, $dataUpdateVideo);
    }

    static public function update_Hint($dataUpdateHint)
    {
        $sql = "update hint set hint_link=:hint_link, hint_name=:hint_name where lesson_id =:lesson_id";
        DB::execute($sql, $dataUpdateHint);
    }

    static public function update_Content($dataUpdateContent)
    {
        $sql = "update content set lesson_content=:lesson_content  where lesson_id =:lesson_id";
        DB::execute($sql, $dataUpdateContent);
    }



    static public function delete($id)
    {
        $sql = "delete from hint where hint_id=:id";
        $dataDelete = ['id' => $id];
        DB::execute($sql, $dataDelete);
    }

    static public function deleteVideo($id)
    {
        $sql = "delete from video where video_id=:id";
        $dataDelete = ['id' => $id];
        DB::execute($sql, $dataDelete);
    }
    //delete lesson
    static public function delete_Lesson($id)
    {
        $sql = "delete from lesson where lesson_id=:id";
        $dataDelete = ['id' => $id];
        DB::execute($sql, $dataDelete);
    }
    static public function delete_introduction($id)
    {
        $sql = "delete from introduction where lesson_id=:id";
        $dataDelete = ['id' => $id];
        DB::execute($sql, $dataDelete);
    }
    static public function delete_Lesson_Target($id)
    {
        $sql = "delete from target where lesson_id=:id";
        $dataDelete = ['id' => $id];
        DB::execute($sql, $dataDelete);
    }
    static public function delete_Lesson_video($id)
    {
        $sql = "delete from video where lesson_id=:id";
        $dataDelete = ['id' => $id];
        DB::execute($sql, $dataDelete);
    }
    static public function delete_lesson_content($id)
    {
        $sql = "delete from content where lesson_id=:id";
        $dataDelete = ['id' => $id];
        DB::execute($sql, $dataDelete);
    }
    static public function delete_lesson_hint($id)
    {
        $sql = "delete from hint where lesson_id=:id";
        $dataDelete = ['id' => $id];
        DB::execute($sql, $dataDelete);
    }

    static public function delete_subjects($id)
    {
        $sql = "delete from subjects where subjects_id=:id";
        $dataDelete = ['id' => $id];
        DB::execute($sql, $dataDelete);
    }
    static public function delete_subjects_introduction($id)
    {
        $sql = "delete from introduction where subjects_id=:id";
        $dataDelete = ['id' => $id];
        DB::execute($sql, $dataDelete);
    }
    static public function get_subjects_introduction($id)
    {
        $sql = "select * from introduction where subjects_id=:id";
        $dataFind = ['id' => $id];
        $get_subjects_introduction = DB::execute($sql, $dataFind);
        return count($get_subjects_introduction) > 0 ? $get_subjects_introduction[0] : [];
    }

    // ******************ADMIN********************
    //them moi khoa hoc
    static public function add_courses($dataAdd)
    {
        $sql = "insert into courses(  courses_name, courses_img, courses_depcription) values(  :courses_name, :courses_img, :courses_depcription)";
        DB::execute($sql, $dataAdd);
    }


    //lay thong tin khoa hoc
    static public function get_courses($courses_id)
    {
        $sql = "select * from courses where courses_id=:courses_id";
        $dataGet = ['courses_id' => $courses_id];
        $getCourses = DB::execute($sql, $dataGet);
        return count($getCourses) > 0 ? $getCourses[0] : [];
    }


    static public function update_Course($dataUpdateCourses)
    {
        $sql = "update courses set courses_name=:courses_name, courses_img=:courses_img, courses_depcription=:courses_depcription where courses_id=:courses_id";
        DB::execute($sql, $dataUpdateCourses);
    }
    static public function find_account_id_with_account_number($account_id)
    {
        $sql = "select * from account where account_id=:account_id";
        $dataFind = ['account_id' => $account_id];
        $find_account_id_with_account_number = DB::execute($sql, $dataFind);
        return count($find_account_id_with_account_number) > 0 ?  $find_account_id_with_account_number[0] : [];
    }

    static public function find_account_id($subjects_id)
    {
        $sql = "select * from account, subjects where account.account_id= subjects.account_id and subjects.subjects_id=:subjects_id";
        $dataFind = ['subjects_id' => $subjects_id];
        $find_account_id = DB::execute($sql, $dataFind);
        return count($find_account_id) > 0 ?  $find_account_id[0] : [];
    }


    static public function delete_Courses($id)
    {
        $sql = "delete from courses where courses_id=:id";
        $dataDelete = ['id' => $id];
        DB::execute($sql, $dataDelete);
    }

    static public function get_id_subjects($id)
    {
        $sql = "select * from subjects where courses_id=:id";
        $dataFind = ['id' => $id];
        $get_id_subjects = DB::execute($sql, $dataFind);
        return count($get_id_subjects) > 0 ? $get_id_subjects[0] : [];
    }
}
