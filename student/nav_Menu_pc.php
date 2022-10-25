<?php 
$account_id=$_SESSION['account_id'];
$user=Auth::getUsername( $account_id); 
?>
<div class="nav__menu-left-container" id="nav__menu1">
    <div class="nav__content" id="nav__content">
        <div class="nav__logo">
            <img src="https://lms.deha-soft.com/images/favicon.ico/apple-icon-180x180.png" alt="">
            <nav>W3Schools</nav>
        </div>
        <hr>
        <!-- <div class="nav__user">
            </div> -->
        <details class="nav__user-list">
            <summary>
                <nav><img src="./stu_assets/img/icon/user.png" alt="" class="icon_img" id="user_icon"><?php echo $user['username']?></nav>
            </summary>
            <br>
            <div>
                <a href="" class="nav__link">
                    <div class="nav__hover">
                        <span><img src="./stu_assets/img/icon/setting.png" alt=""  class="icon_img"></span>
                        Account
                    </div>
                </a>
                <a href="/w3schools/student/stu_quiz_history.php" class="nav__link">
                    <div class="nav__hover">

                        <span><img src="./stu_assets/img/icon/completed-task.png" alt="" class="icon_img"></span>
                        Quiz History

                    </div>
                </a>

                <a href="/W3schools/logout.php" class="nav__link">
                    <div class="nav__hover">

                        <span>
                            <img src="./stu_assets/img/icon/logout.png" alt="" class="icon_img">
                        </span>
                        Logout

                    </div>
                </a>
            </div>
            <br>
            <br>
            <br>
        </details>
        <hr>
        <div class="nav__list">
            <a href="./stu_home.php" class="nav__link">
                <div class="nav__hover">
                    <span>
                        <img src="./stu_assets/img/icon/house.png" alt="" class="icon_img">
                    </span>Home
                </div>
            </a>
            <a href="./stu_class.php" class="nav__link">
                <div class="nav__hover">
                    <span>
                        <img src="./stu_assets/img/icon/presentation.png" alt="" class="icon_img">
                    </span>My Class
                </div>
            </a>
            <a href="./stu_courses.php" class="nav__link">
                <div class="nav__hover">
                    <span>
                        <img src="./stu_assets/img/icon/file-storage.png" alt="" class="icon_img">
                    </span>Courses
                </div>
            </a>
            <a href="./stu_quiz_history.php" class="nav__link">
                <div class="nav__hover">
                    <span>
                        <img src="./stu_assets/img/icon/quizzes.png" alt="" class="icon_img">
                    </span>Quizzes
                </div>
            </a>
            <a href="" class="nav__link">
                <div class="nav__hover">
                    <span>
                        <img src="./stu_assets/img/icon/ranking.png" alt="" class="icon_img">
                    </span>Top
                </div>
            </a>
            <a href="" class="nav__link">
                <div class="nav__hover">
                    <span>
                        <img src="./stu_assets/img/icon/presentation.png" alt="" class="icon_img">
                    </span>Certification
                </div>
            </a>
        </div>
    </div>

</div>