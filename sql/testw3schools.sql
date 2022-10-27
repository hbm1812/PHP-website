  -- phpMyAdmin SQL Dump
  -- version 5.2.0
  -- https://www.phpmyadmin.net/
  --
  -- Máy chủ: 127.0.0.1
  -- Thời gian đã tạo: Th10 25, 2022 lúc 09:43 AM
  -- Phiên bản máy phục vụ: 10.4.24-MariaDB
  -- Phiên bản PHP: 7.4.29

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  START TRANSACTION;
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Cơ sở dữ liệu: `w3schools`
  --

  -- --------------------------------------------------------

  --
  -- Cấu trúc bảng cho bảng `account`
  --

  CREATE TABLE `account` (
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `authority_id` int(11) NOT NULL,
    `account_id` int(11) NOT NULL,
    `email` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Đang đổ dữ liệu cho bảng `account`
  --

  INSERT INTO `account` (`username`, `password`, `authority_id`, `account_id`, `email`) VALUES
  ('test', '$2y$10$nZeZ3s27mI/HHm/1K1YuIeQ71PYSQTx1cbhGV7QWB20TrZS.XeMuu', 2, 1, 'test@gmail.com'),
  ('giao vien', '$2y$10$/GkdS8g3uEq8YepqnKOgIeXw1XqOOScWxqN7KPN5p3Iyz.oSjpHym', 3, 3, 'giaovien@gmail.com'),
  ('minh dep trai', '$2y$10$OyXtIWzfoBAyIXlGibneuOdoWOCBAj5XSe6q5LX92Z0BDgM1cdOpW', 3, 4, 'minh@gmail.com'),
  ('admin', '$2y$10$ljg612PT6hUhbvsCB.AgceC307u1dYcFesMXoV4h0W/OAkPzUZOpW', 1, 5, 'admin@gmail.com');

  -- --------------------------------------------------------

  --
  -- Cấu trúc bảng cho bảng `authority`
  --

  CREATE TABLE `authority` (
    `authority_id` int(11) NOT NULL,
    `authority_name` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Đang đổ dữ liệu cho bảng `authority`
  --

  INSERT INTO `authority` (`authority_id`, `authority_name`) VALUES
  (1, 'Admin'),
  (2, 'Hoc Sinh'),
  (3, 'giao vien');

  -- --------------------------------------------------------

  --
  -- Cấu trúc bảng cho bảng `content`
  --

  CREATE TABLE `content` (
    `content_id` int(11) NOT NULL,
    `lesson_id` int(11) NOT NULL,
    `lesson_content` varchar(500) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Đang đổ dữ liệu cho bảng `content`
  --

  INSERT INTO `content` (`content_id`, `lesson_id`, `lesson_content`) VALUES
  (1, 1, 'hi'),
  (5, 13, '- Content 1\r\n- Content 2\r\n- Content 3'),
  (6, 14, '');

  -- --------------------------------------------------------

  --
  -- Cấu trúc bảng cho bảng `courses`
  --

  CREATE TABLE `courses` (
    `courses_id` int(11) NOT NULL,
    `courses_name` varchar(255) NOT NULL,
    `courses_img` varchar(500) NOT NULL,
    `courses_depcription` varchar(500) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Đang đổ dữ liệu cho bảng `courses`
  --

  INSERT INTO `courses` (`courses_id`, `courses_name`, `courses_img`, `courses_depcription`) VALUES
  (1, 'Dev Standard', 'https://lms.deha-soft.com/upload/course/1605668492.jpg', 'Khóa học vippro'),
  (2, 'Onboarding Basic', 'https://lms.deha-soft.com/images/img-default.png', 'Khóa học cực vip'),
  (3, 'Pre Intern', 'https://lms.deha-soft.com/upload/course/1642563334.jpg', 'Đừng bỏ lỡ'),
  (4, 'Promax', 'https://i.pinimg.com/564x/0a/bd/28/0abd28b60995a53783aea68961a07f5d.jpg', 'minh đẹp trai'),
  (5, 'Promax2', 'https://i.pinimg.com/564x/90/0c/17/900c17b8865b75ec193c84f6bfcdd76d.jpg', 'fas');

  -- --------------------------------------------------------

  --
  -- Cấu trúc bảng cho bảng `hint`
  --

  CREATE TABLE `hint` (
    `hint_id` int(11) NOT NULL,
    `lesson_id` int(11) NOT NULL,
    `hint_link` varchar(500) NOT NULL,
    `hint_name` varchar(500) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Đang đổ dữ liệu cho bảng `hint`
  --

  INSERT INTO `hint` (`hint_id`, `lesson_id`, `hint_link`, `hint_name`) VALUES
  (1, 1, 'https://drive.google.com/file/d/1HXFXY3tASs9a0QWF2kSxIdGvVGA4Ihhu/view', 'Clean code javascript'),
  (2, 1, 'https://drive.google.com/file/d/1biFNqi4-1a54RHODOae85Mimyh6GTyc8/view', 'Code convention và chuẩn code PHP'),
  (3, 1, 'https://drive.google.com/file/d/125iLeAks0sWUobH9OQrHS_QTSDXn62qa/view', 'Code đẹp và an toàn trong PHP'),
  (8, 4, 'https://getbootstrap.com/docs/5.0/forms/input-group/', 'link 1'),
  (9, 4, 'https://timoday.edu.vn/bai-42-hien-thi-video-youtube-trong-html/', 'link 2'),
  (26, 13, '', ''),
  (29, 14, '', '');

  -- --------------------------------------------------------

  --
  -- Cấu trúc bảng cho bảng `introduction`
  --

  CREATE TABLE `introduction` (
    `subjects_id` int(11) NOT NULL,
    `introduction_id` int(11) NOT NULL,
    `lesson_id` int(11) NOT NULL,
    `account_id` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Đang đổ dữ liệu cho bảng `introduction`
  --

  INSERT INTO `introduction` (`subjects_id`, `introduction_id`, `lesson_id`, `account_id`) VALUES
  (2, 1, 1, 4),
  (6, 12, 13, 0),
  (7, 13, 14, 0);

  -- --------------------------------------------------------

  --
  -- Cấu trúc bảng cho bảng `lesson`
  --

  CREATE TABLE `lesson` (
    `lesson_id` int(11) NOT NULL,
    `lesson_name` varchar(255) NOT NULL,
    `lesson_img` varchar(500) NOT NULL,
    `account_id` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Đang đổ dữ liệu cho bảng `lesson`
  --

  INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_img`, `account_id`) VALUES
  (1, 'CLEAN CODE', 'https://lms.deha-soft.com/upload/lesson/lesson-2019-11-07-1573109183.jpg', 4),
  (13, 'LARAVEL CURD WITH TDD', 'https://i.pinimg.com/236x/f0/be/13/f0be132753596596fba48bbd558aedd1.jpg', 3),
  (14, 'subject 1 lesson 1', 'lesson 1 img', 5);

  -- --------------------------------------------------------

  --
  -- Cấu trúc bảng cho bảng `stu_information`
  --

  CREATE TABLE `stu_information` (
    `stu_id` int(11) NOT NULL,
    `account_id` int(11) NOT NULL,
    `authority_id` int(11) NOT NULL,
    `fullname` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  -- --------------------------------------------------------

  --
  -- Cấu trúc bảng cho bảng `subjects`
  --

  CREATE TABLE `subjects` (
    `subjects_id` int(11) NOT NULL,
    `courses_id` varchar(255) NOT NULL,
    `subjects_name` varchar(255) NOT NULL,
    `subjects_img` varchar(500) NOT NULL,
    `account_id` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Đang đổ dữ liệu cho bảng `subjects`
  --

  INSERT INTO `subjects` (`subjects_id`, `courses_id`, `subjects_name`, `subjects_img`, `account_id`) VALUES
  (1, '1', 'DOCKER', 'https://lms.deha-soft.com/upload/subject/subject-2019-11-07-1573111914.png', 4),
  (2, '1', 'CLEAN CODE', 'https://lms.deha-soft.com/upload/subject/subject-2019-11-07-1573111926.jpg', 4),
  (3, '1', 'RESTFUL API', 'https://lms.deha-soft.com/upload/subject/subject-2019-11-07-1573111937.png', 4),
  (6, '1', 'LARAVEL', 'https://lms.deha-soft.com/upload/subject/subject-2019-11-07-1573111947.png', 3),
  (7, '4', 'Promax subject 1', 'promax subject 1_img', 5);

  -- --------------------------------------------------------

  --
  -- Cấu trúc bảng cho bảng `target`
  --

  CREATE TABLE `target` (
    `target_id` int(11) NOT NULL,
    `lesson_id` int(11) NOT NULL,
    `target_content` varchar(500) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Đang đổ dữ liệu cho bảng `target`
  --

  INSERT INTO `target` (`target_id`, `lesson_id`, `target_content`) VALUES
  (1, 1, '- Hiểu được thế nào là Clean Code.\r\n- Nắm được quy tắc để áp dụng trong:\r\n  + Đặt tên.\r\n  + Viết Hàm.\r\n  + Comment code.\r\n  + Format code.\r\n  + Viết class.'),
  (2, 4, '- Hiểu được bài học\r\n- Minh iz dabest'),
  (7, 13, '-muc tieu 1'),
  (8, 14, '');

  -- --------------------------------------------------------

  --
  -- Cấu trúc bảng cho bảng `teacher_information`
  --

  CREATE TABLE `teacher_information` (
    `teacher_id` int(11) NOT NULL,
    `account_id` int(11) NOT NULL,
    `authority_id` int(11) NOT NULL,
    `fullname` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  -- --------------------------------------------------------

  --
  -- Cấu trúc bảng cho bảng `video`
  --

  CREATE TABLE `video` (
    `video_id` int(11) NOT NULL,
    `lesson_id` int(11) NOT NULL,
    `video_link` varchar(500) NOT NULL,
    `video_name` varchar(500) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Đang đổ dữ liệu cho bảng `video`
  --

  INSERT INTO `video` (`video_id`, `lesson_id`, `video_link`, `video_name`) VALUES
  (1, 1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/g05dNXn6NyM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ''),
  (2, 4, '<iframe width=\"942\" height=\"530\" src=\"https://www.youtube.com/embed/22PbmqXPfSI\" title=\"[AMV] Forget Me Now\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ''),
  (11, 13, '<iframe width=\"942\" height=\"530\" src=\"https://www.youtube.com/embed/UL1OohEqYgQ\" title=\"Laravel - Study Guide | TDD in Laravel with CRUD Example - Part 1\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ''),
  (38, 14, '', '');

  --
  -- Chỉ mục cho các bảng đã đổ
  --

  --
  -- Chỉ mục cho bảng `account`
  --
  ALTER TABLE `account`
    ADD PRIMARY KEY (`account_id`);

  --
  -- Chỉ mục cho bảng `authority`
  --
  ALTER TABLE `authority`
    ADD PRIMARY KEY (`authority_id`);

  --
  -- Chỉ mục cho bảng `content`
  --
  ALTER TABLE `content`
    ADD PRIMARY KEY (`content_id`);

  --
  -- Chỉ mục cho bảng `courses`
  --
  ALTER TABLE `courses`
    ADD PRIMARY KEY (`courses_id`);

  --
  -- Chỉ mục cho bảng `hint`
  --
  ALTER TABLE `hint`
    ADD PRIMARY KEY (`hint_id`);

  --
  -- Chỉ mục cho bảng `introduction`
  --
  ALTER TABLE `introduction`
    ADD PRIMARY KEY (`introduction_id`);

  --
  -- Chỉ mục cho bảng `lesson`
  --
  ALTER TABLE `lesson`
    ADD PRIMARY KEY (`lesson_id`);

  --
  -- Chỉ mục cho bảng `stu_information`
  --
  ALTER TABLE `stu_information`
    ADD PRIMARY KEY (`stu_id`);

  --
  -- Chỉ mục cho bảng `subjects`
  --
  ALTER TABLE `subjects`
    ADD PRIMARY KEY (`subjects_id`);

  --
  -- Chỉ mục cho bảng `target`
  --
  ALTER TABLE `target`
    ADD PRIMARY KEY (`target_id`);

  --
  -- Chỉ mục cho bảng `teacher_information`
  --
  ALTER TABLE `teacher_information`
    ADD PRIMARY KEY (`teacher_id`);

  --
  -- Chỉ mục cho bảng `video`
  --
  ALTER TABLE `video`
    ADD PRIMARY KEY (`video_id`);

  --
  -- AUTO_INCREMENT cho các bảng đã đổ
  --

  --
  -- AUTO_INCREMENT cho bảng `account`
  --
  ALTER TABLE `account`
    MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

  --
  -- AUTO_INCREMENT cho bảng `authority`
  --
  ALTER TABLE `authority`
    MODIFY `authority_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

  --
  -- AUTO_INCREMENT cho bảng `content`
  --
  ALTER TABLE `content`
    MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

  --
  -- AUTO_INCREMENT cho bảng `courses`
  --
  ALTER TABLE `courses`
    MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

  --
  -- AUTO_INCREMENT cho bảng `hint`
  --
  ALTER TABLE `hint`
    MODIFY `hint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

  --
  -- AUTO_INCREMENT cho bảng `introduction`
  --
  ALTER TABLE `introduction`
    MODIFY `introduction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

  --
  -- AUTO_INCREMENT cho bảng `lesson`
  --
  ALTER TABLE `lesson`
    MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

  --
  -- AUTO_INCREMENT cho bảng `stu_information`
  --
  ALTER TABLE `stu_information`
    MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT;

  --
  -- AUTO_INCREMENT cho bảng `subjects`
  --
  ALTER TABLE `subjects`
    MODIFY `subjects_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

  --
  -- AUTO_INCREMENT cho bảng `target`
  --
  ALTER TABLE `target`
    MODIFY `target_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

  --
  -- AUTO_INCREMENT cho bảng `teacher_information`
  --
  ALTER TABLE `teacher_information`
    MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT;

  --
  -- AUTO_INCREMENT cho bảng `video`
  --
  ALTER TABLE `video`
    MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
  COMMIT;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
