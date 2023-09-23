-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 23, 2023 lúc 01:59 PM
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
('admin', '$2y$10$ljg612PT6hUhbvsCB.AgceC307u1dYcFesMXoV4h0W/OAkPzUZOpW', 1, 5, 'admin@gmail.com'),
('giáo viên 1', '$2y$10$VsOG.BaC98b5uyfWDbz9SeqXCiXbCnreuIubvP2.F3mhxgQXCzZBC', 3, 6, 'giaovien1@gmail.com'),
('giáo viên 2', '$2y$10$K1ejlN0rM11Hk6/OiSqLeu4XzRgaVOrUTUC/zXz2uc.tOnbiPTnnm', 3, 7, 'giaovien2@gmail.com'),
('giáo viên 3', '$2y$10$AoyaneJm3hO5jwq.42sE1OVd0j2arx0O.10Szq6Os54Xm4md8IE5m', 3, 8, 'giaovien3@gmail.com'),
('Bình Minh', '$2y$10$uBBWWnGa8pKOvabBHyqknOwAR9wc4uolT7qfOMcekKwAWyaxrOY.e', 2, 22, 'minh@gmail.com');

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
  `lesson_content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `content`
--

INSERT INTO `content` (`content_id`, `lesson_id`, `lesson_content`) VALUES
(11, 19, 'I. Gới thiệu về training tại DEHA\r\n\r\nTraining tại DEHA là một quá trình sản xuất, mà đầu ra chính là các bạn thực tập sinh đã được trang bị các kiến thức cần thiết về năng lực và đạo đức nghề nghiệp.\r\nTrong quá trình này thực tập sinh tích cực lao động để cải thiện và xây dựng năng lực của chính mình dưới sự hỗ trợ, định hướng của các Coach tại Deha Academy.\r\nII. Giải đáp một số thắc mắc thường gặp\r\n\r\n1. Trong quá trình thực tập, nếu thực tập sinh bị chậm tiến độ thì sẽ bị xử lý như thế nào?\r\n\r\nTTS bị chậm tiến độ sẽ bị cảnh báo ít nhất 2-3 lần.\r\nNếu sau 2-3 lần nhắc nhớ, tiến độ học tập vẫn không được cải thiện\r\n=> Thực tập sinh sẽ bị yêu cầu dừng quá trình thực tập tại công ty DEHA.\r\n\r\n2. Nếu tốc độ học tập của thực tập sinh nhanh hơn bình thường, muốn chuyển qua giai đoạn 2 sớm (ít hơn 1 tháng) có được không?\r\n\r\nThực tập sinh hoàn toàn có thể đẩy nhanh tiến độ học tập để chuyển sang giai đoạn thứ 2 sớm.\r\nVD: 1 bạn TTS trung bình cần khoảng 1 tháng để hoàn thành quá trình thực tập tại công ty DEHA. Các bạn muốn chuyển qua giai đoạn 2 sớm có thể đẩy nhanh tiến độ học tập để hoàn thành toàn bộ các môn học trong 2-3 tuần. Các Coach có thể giúp đỡ để các bạn có thể lên team sớm nếu như các bạn có thể học nhanh và có thái độ tốt.\r\n\r\n3. Làm thế nào để trở thành nhân viên chính thức?\r\n\r\nSau khi kết thúc 4 tháng đào tạo (1 tháng đào tạo tại Deha Academy, 3 tháng đào tạo thực chiến trên Team), TTS đủ điều kiện về năng lực, thái độ tốt và phù hợp với công ty DEHA được xét trở thành nhân viên chính thức của công ty.\r\n4. Các bạn cần phải làm gì trong quá trình thực tập ?\r\n\r\nHọc các bài học đúng tiến độ được đề ra.\r\nGặp vấn đề khó:\r\nĐầu tiên, tự mình tìm cách giải quyết thông qua google search.\r\nHỏi bạn bè thực tập cùng.\r\nNếu như 2 cách trên vẫn chưa giải quyết được khó khăn đang gặp phải, nhờ các Coach giúp đỡ.\r\nKhi gặp khó khăn trong quá trình thực tập (biết chắc chắn không giải quyết được, việc rất là gấp cần giải quyết luôn) phải thông báo sớm cho các Coach để kịp thời xử lý.\r\n5. Công ty sẽ giúp gì bạn trong quá trình thực tập?\r\n\r\nCông ty sẽ:\r\nĐịnh hướng về lộ trình nghề nghiệp và sự nghiệp cho từng cá nhân.\r\nĐịnh hướng các bạn về kiến thức, cách để đạt được kiến thức.\r\nHọc các công nghệ mới và hot nhất hiện tại và tương lai.\r\nĐược hỗ trợ khi gặp khó khăn trong quá trình thực tập.\r\n6. Những kiến thức hay kỹ năng sẽ đạt được sau thời gian trainning tại DEHA?\r\n\r\nNgoài các kiến thức về kỹ thuật, các bạn có thể sẽ đạt được các kỹ năng như:\r\n\r\nKỹ năng tự học.\r\nKỹ năng giải quyết vấn đề.\r\nKỹ năng giao tiếp.\r\n7. Sau khi học xong 1 môn học, em sẽ làm như thế nào để được kiểm tra?\r\n\r\nLàm Pass bài Quiz lý thuyết của bài học(nếu có) sau đó mới kiểm tra thực hành(nếu có).\r\nĐào tạo online:\r\nNhắn tin trên nhóm chat zalo để yêu cầu kiểm tra môn học, Coach sẽ chủ động gửi link Google Meet để kiểm tra.\r\nĐào tạo Offline:\r\nĐặt lịch kiểm tra trên Google calendar.\r\nEmail của Coach: \r\nMr. Huy: huyhq@deha-soft.com\r\n​​​​​​​Mr. Tuấn Anh: anh.ct@deha-soft.com\r\n​​​​​​​Mrs. Hằng: hangtt@deha-soft.com\r\nMr. Sáng: sang.hv@deha-soft.com\r\nSau khi đặt lịch đến thời gian coach và TTS sẽ tham gia đúng lịch\r\n Chú ý: Trong một ngày có 2 khung giờ để kiểm tra là: 11 giờ sáng và 16 giờ chiều. \r\n8. Em đã đăng ký lịch thực tập định kỳ rồi, ví dụ em có việc bận thì em có được xin nghỉ không ạ?\r\n\r\nĐược, và khi xin nghỉ thì phải báo cho Coach quản lý và viết email xin nghỉ. Chú ý là phải viết mail xin nghỉ càng sớm càng tốt (ít nhất là trước 3 ngày).\r\n9. Tiền hỗ trợ thực tập hàng tháng sẽ nhận được khi nào? Làm sao để em biết được hàng tháng em nhận được bao nhiêu tiền?\r\n\r\nTiền hỗ trợ hàng tháng sẽ nhận được trong khoảng thời gian từ mùng 1 đến mùng 5 hàng tháng. VD: lương hỗ trợ của tháng 1/2021 sẽ được nhận vào khoảng thời gian: 01/02/2021 - 05/02/2021\r\nCách tính tiền hỗ trợ hàng tháng như sau:\r\nĐối với các bạn tham gia thực tập fulltime: được nhận đủ tiền hỗ trợ hàng tháng. VD: tháng thứ nhất hỗ trợ 1.000.000 VNĐ, nếu bạn nào đi làm đủ cả tháng thì sẽ nhận được đủ 1.000.000 VNĐ.\r\nĐối với các bạn tham gia thực tập không fulltime:\r\nĐược nhận tiền dựa vào số thời gian đăng ký thực tập hàng tháng.\r\nVD: 1 bạn đăng ký tham gia thực tập 80%, tháng đó có 30 ngày, ngày thứ 7 và chủ nhật là 10 ngày.\r\nSố ngày làm việc trong tháng là: 30 - 10 = 20 ngày\r\nSố ngày thực tập thực tế của bạn thực tập sinh là: 80% * 20 = 16 ngày\r\nSố tiền hỗ trợ một ngày là: 1.000.000 / 20 = 50.000 VNĐ\r\nSố tiền công đoàn hàng tháng (bắt buộc phải đóng): 50.000 VNĐ\r\nSố tiền hỗ trợ hàng tháng nhận được là: (50.000 * 16) - 50.000 = 750.000 VNĐ\r\n10. Em viết email xin nghỉ thì gửi đến địa chỉ nào?\r\n\r\nCác bạn vui lòng gửi mail qua mail cho Mr Cấn, Mr Huy, Mrs Hằng và cc cho phòng nhân sự.\r\n\r\nThông tin email:\r\nMr Cấn: anh.ct@deha-soft.com\r\nMr Huy: huyhq@deha-soft.com\r\nMrs Hằng: hangtt@deha-soft.com\r\nPhòng nhân sự: nhansu@deha-soft.com\r\nChú ý: khi viết mail bắt buộc cần cc cho phòng nhân sự để phòng nhân sự nắm được thời gian thực tập của TTS.\r\n\r\n11. Công ty có hỗ trợ chỗ gửi xe cho thực tập sinh không?\r\n\r\nCó, trong buổi đầu tiên thực tập sinh sẽ gặp người hướng dẫn để đăng ký chỗ gửi xe.\r\nSau khi đăng ký chỗ để xe thì thực tập sinh sẽ có thể gửi xe miễn phí.\r\nĐịa chỉ bãi để xe: bãi để xe, ngõ 100 Dịch Vọng Hậu, Cầu Giấy, Hà Nội.\r\n12. Trong buổi đầu tiên thì sẽ học những môn học nào trước?\r\n\r\nThứ tự các môn học cần học trước:\r\n\r\nSổ tay\r\nTraining nhập môn\r\nScrum\r\nHoRenSo\r\nEmail\r\nGoogle Calendar \r\n13. Giờ làm việc của công ty như thế nào?\r\n\r\nCông ty làm việc từ thứ 2 - thứ 6 hàng tuần (nghỉ T7-CN).\r\nThời gian các ca làm việc như sau:\r\nCa sáng: 08:30 - 12:00\r\nNghỉ trưa: 12:00 - 13:00\r\nCa chiều: 13:00 - 17:30\r\n14. Công ty có hỗ trợ ăn trưa không?\r\n\r\nKhông, công ty sẽ không hỗ trợ ăn trưa. Mọi người sẽ tự chuẩn bị: ăn ngoài, nấu cơm mang đi, đặt cơm...'),
(12, 20, ''),
(13, 21, ''),
(14, 22, 'I. Cơ bản về HORENSO\r\n\r\n1. HORENSO - để tương tác nhóm hiệu quả\r\n\r\nCác nhóm cộng tác đạt được hiệu quả cao nhất thông qua tương tác.\r\nMột trong những cốt lõi của tương tác là giao tiếp (communication).\r\nHORENSO (Nhật Bản): rất đơn giản nhưng hiệu quả, giúp giảm thiểu tình trạng mù mờ thông tin, xóa dần các hiểu lầm không đáng có trong trao đổi thông tin trong công việc.\r\n2. Tại sao cần phải học HORENSO?\r\nHORENSO giúp tương tác tốt với mọi người.\r\nTương tác tốt => hoàn thành công việc => cơ hội thăng tiến.\r\nThành công không thể thiếu tương tác.\r\n3. HORENSO là gì?\r\n\r\nHORENSO là phương pháp giao tiếp trong công sở.\r\nHORENSO gồm:\r\nHO - Báo cáo (Houkoku): báo cáo tiến độ công việc.\r\nREN - Liên lạc (Renraku): dùng để chia sẻ, thu thập thông tin và trách nhiệm.\r\nSO - Thảo luận (Soudan): thảo luận dùng để tìm ra giải pháp.\r\nBáo cáo (Hokoku):\r\nDùng để chia sẻ thông tin cho người trên cấp hoặc người chịu trách nhiệm chính về công việc dưới dạng: tài liệu, Email, hoặc bằng miệng...\r\nCác báo cáo thường chứa thông tin đã được sàng lọc, xác thực, chuẩn bị kỹ càng.\r\nMục đích: Giúp cấp trên nắm được thông tin và đưa ra quyết định, phương án xử lý kịp thời.\r\nBáo cáo tốt hỗ trợ rất nhiều cho việc Sếp đưa ra quyết định.\r\nMột số mẹo để báo cáo tốt như sau:\r\nTin xấu báo sớm.\r\nTin tốt có báo, báo cáo sau cũng được.\r\nMột báo cáo tốt không thể thiếu tư vấn và giải pháp (mức 9-10 điểm).\r\nLiên lạc(Renraku):\r\nĐể chia sẻ thông tin (tiến độ dự án, tiến độ công việc, khó khăn...) với mọi người.\r\nDiễn ra ở mức độ:\r\nThường xuyên\r\nLan tỏa (trong bán kính 5m)\r\nThoải mái\r\nHình thức liên lạc chủ yếu là thông qua nói chuyện, trò chuyện, tán ngẫu với mọi người xung quanh. Thông qua đó thì mọi người có thể nắm được thông tin của nhau về tiến độ dự án, tiến độ công việc, khó khăn đang mắc phải...Vì vậy có thể nói là người liên lạc tốt thì không cần phải báo cáo.\r\nThảo luận (Soudan):\r\nDùng để tìm ra giải pháp để xử lí các vấn đề phức tạp.\r\nNhững thứ bắt buộc phải biết:\r\nTrước buổi họp:\r\nMục đích buổi họp.\r\nTimebox.\r\nThành phần (tham gia khác tham dự).\r\nTham gia: bắt buộc phải tham gia buổi họp.\r\nTham dự: không tham gia cũng được.\r\nTrong buổi họp:\r\nPhát biểu: mỗi người sẽ nêu ra ý kiến, phương pháp, góp ý riêng của mình. Một buổi họp có càng nhiều ý kiến càng tốt.\r\nXung đột là điều không tránh khỏi trong bất kỳ buổi họp nào. Xung đột chủ yếu là do sự bất đồng quan điểm của mỗi người. Và dưới đây là một số cách giải quyết xung đột, mâu thuẫn giữa mọi người trong team (được sắp xếp ưu tiên từ trên xuống dưới) mà các bạn có thể sử dụng.\r\nCách 1 - Đồng thuận một cách tự nhiên: Đây là phương pháp tốt nhất bằng tình cảm của đồng nghiệp có thể cảm thông cho nhau để đưa ra quyết định cuối cùng là cách tốt nhất.\r\nCách 2 - Mời chuyên gia: Mời một chuyên gia giỏi về lĩnh vực, vấn đề đang tranh cãi, để đưa ra quyết định cuối cùng, thường quyết định cuối cùng sẽ được chuyên gia quyết định.\r\nCách 3 - Bỏ phiếu: Khi 2 phương pháp trên không khả thi thì sẽ dùng đến phương pháp \"bỏ phiếu\". Phương pháp này được áp dụng cho 3 người trở lên. Ai được nhiều phiếu bầu nhất thì quyết định cuối cùng sẽ được quyết theo người đó.\r\nCách 4 - Random: Đây là phương pháp hên xui nhất. Chọn random ra rồi chọn nó làm quyết định cuối cùng.\r\nSau khi kết thúc buổi họp:\r\nAi sẽ làm gì?\r\nKhi đã chốt, dù không thích cũng phải làm.\r\nĐể HORENSO tốt cần lưu ý:\r\n\r\nThông tin phải đầy đủ, chính xác và ngắn gọn\r\nĐịnh kỳ\r\nKịp thời\r\nĐịnh hướng\r\nNghiêm túc\r\nII. Một số đặc điểm về cách thực hiện HORENSO tốt và không tốt.\r\n\r\n1. Báo cáo (Houkoku - 報告)\r\nTốt\r\n\r\nTồi\r\nĐịnh kỳ	Ngẫu hứng\r\nChính xác	Thiếu chính xác\r\nĐầy đủ	Ít thông tin\r\nTin xấu báo trước	Tin tốt báo trước\r\nVăn phong lịch sự, tôn trọng\r\n\r\nVăn phong thiếu tôn trọng\r\nThông tin có tuyển chọn và phân tích 	Thông tin mang tính thống kê\r\nTư vấn giải pháp	Chỉ hỏi và tham khảo\r\n2. Liên lạc (Renraku - 連絡)\r\nTốt\r\n\r\nTồi\r\nSử dụng hình thức truyền tin nhanh nhất có thể 	Sử dụng phương pháp email, chat khi đang ngồi gần nhau.\r\nThông tin dễ đọc, dễ chấp nhận.	Mất quá nhiều thời gian đọc tin.\r\nNhanh, kịp thời (realtime).	Chậm, quá lâu mới thực hiện.\r\nQuảng bá (càng nhiều người biết càng tốt)	\r\nÍt người biết.\r\n\r\nLàm liên tục	Làm ngẫu hứng.\r\n3. Thảo luận (Soudan - 相談)\r\n\r\nTốt\r\n\r\nTồi\r\nĐông người, nhiều cá tính, phong cách. 	Ít người, quan điểm và cách làm giống nhau.\r\nGhi nhận các ý kiến.	Không ghi nhận.\r\nKhuyến khích nói.	Bác bỏ ngay lập tực.\r\nMục đích rõ ràng, ai cũng nắm	Không ai biết mục đích.\r\nCó quyết định cuối cùng.	Không ra quyết định cuối.\r\nMọi người tuân thủ theo quyết định	Mỗi người làm một hướng.\r\n\r\nIII. Một số kinh nghiệm để thực hành HORENSO tốt:\r\n\r\n1. Confirm (xác nhận)\r\n\r\nTrước khi thực hiện một việc do người khác nhờ vả hoặc giao phó, cần phải tiến hành xác nhận.\r\nCác thông tin cần xác nhận bao gồm: Nhìn nhận vấn đề, giải pháp xử lý, hậu quả hoặc chi phí phải mất để xử lí vấn đề.\r\nLuôn luôn xác nhận thông tin kể cả khi mình hiểu đúng yêu cầu.\r\n2. Báo cáo kịp thời\r\nViệc báo cáo kịp thời giúp cho cấp quản lý có thể hỗ trợ kịp thời hoặc giúp quản lý yên tâm về công việc.\r\nViệc báo cáo cần:\r\nThực hiện định kỳ: tốt nhất là cuối mỗi buổi làm việc (sáng và chiều).\r\n\r\nNên thống nhất với quản lý trước về tần suất và thời điểm báo cáo. Ví dụ: Tôi đã hiểu rồi, giờ tôi sẽ thực hiện theo cách chúng ta vừa thảo luận, tầm 11h30 trưa và 17h chiều tôi sẽ báo cáo kết quả công việc với anh.\r\n\r\nNhanh gọn: cần đưa ra thông tin có tuyển lọc và mang tính phân tích, sắp xếp, giải pháp. Ví dụ: Tôi vừa xử lí 5 issue đơn giản nhất, hiện còn 3 issue khó, có thể tôi không làm xong kịp, tôi cần hỗ trợ thêm anh A để có thể hoàn thành được công việc đúng tiến độ.\r\n\r\n3. Tin xấu báo sớm\r\nTin xấu sẽ thành tin tốt nếu nó được báo cáo sớm, có thể có những biện pháp tránh được những rủi ro đáng tiếc có thể xảy ra.\r\nNgười làm việc giỏi và chuyên nghiệp là người thường xuyên báo tin xấu trước khi nó kịp xảy ra.\r\nVí dụ: Còn 3 tiếng nữa là đến giờ release, khả năng cao không xong được việc như commit. Tốt nhất, hãy báo cáo hoặc liên lạc ngay nếu “cảm thấy” tín hiệu xấu.\r\n4. Không có vấn đề gì cũng báo cáo\r\nĐôi khi ta nghĩ không có vấn đề gì nhưng thực sự là có vấn đề tiềm ẩn mà chỉ người có kinh nghiệm mới biết được.\r\nBáo cáo định kỳ sẽ giúp quản lý yên tâm về công việc và nắm được tiến độ, từ đó đưa ra quyết định chính xác.\r\n5. Luôn chia sẻ thông tin cho người khác\r\nHãy tìm mọi cách nhanh và ngắn gọn nhất để chia sẻ thông tin cho mọi người. Có thể bằng cách trao đổi trực tiếp, dán lên bảng tin hoặc thông báo trong cuộc họp hằng ngày.\r\nViệc chia sẻ tin thường xuyên sẽ giúp mọi người nắm bắt được tình hình của nhau, qua đó sẽ làm việc ăn ý và giúp đỡ được nhau.\r\n6. Thảo luận ngay khi có thể\r\nKhi gặp khó khăn hãy thảo luận.\r\nTìm sự hợp tác từ đồng sự hoặc cấp trên.\r\nChủ động sắp xếp một cuộc họp để cùng tìm ra giải pháp.\r\nThảo luận là để mọi người cùng nhau nghĩ ra giải pháp, là giải đáp thần kì cho mọi bài toán hóc búa.\r\n7. Chủ động khi thực hiện\r\nViệc tiến hành HORENSO có thể xuất phát từ hai phía. Quản lý yêu cầu thực hiện và chúng ta chủ động thực hiện.\r\nNếu chủ động, sẽ tiết kiệm được thời gian cho quản lý và giúp quản lý có thời gian để suy nghĩ việc khác hữu ích hơn.\r\nThể hiện thái độ làm việc nghiêm túc, cầu tiến và trách nhiệm.\r\nNgười chủ động luôn luôn được đánh giá cao hơn.'),
(15, 23, 'I. Hậu quả của việc gửi mail lỗi\r\n\r\nEmail là một phương tiện trao đổi thông tin thông qua mạng Internet giữa các thiết bị điện tử như điện thoại, laptop. Khi trao đổi thông tin qua email, người nhận và người gửi không gặp mặt trực tiếp. Vì vậy, để đánh giá thái độ, thiện chí và tác phong làm việc của đối phương, người ta sẽ thông qua cả phương diện nội dung lẫn hình thức trình bày email. Có thể nói, email cũng là bộ mặt của DEHA khi trao đổi thông tin với công ty đối tác.\r\nTrong các công ty IT, việc bảo mật thông tin vô cùng quan trọng. Vì vậy, nếu mắc lỗi khi gửi mail, nhất là các lỗi sai địa chỉ email, nhầm file đính kèm, nhầm lẫn cc/bcc, bạn có thể làm rò rỉ thông tin. Những lỗi như vậy thể hiện sự thiếu chuyên nghiệp, thiếu thận trọng khi làm việc, làm ảnh hưởng xấu đến hình ảnh của công ty và làm giảm độ tin cậy của khách hàng đối với công ty. Nghiêm trọng hơn, lỗi làm rò rỉ thông tin còn có thể làm ảnh hưởng đến việc kinh doanh của khách hàng.\r\n\r\nVì vậy, để tránh mắc lỗi khi gửi mail, nhân viên nên tuân thủ các bước gửi email như trình tự dưới đây:\r\n\r\nA. Trước khi viết mail, người gửi phải xác định được:\r\n\r\nMục tiêu viết email: Bạn muốn người nhận làm gì sau khi đọc mail\r\nĐối tượng nhận mail: Ai là người có trách nhiệm trực tiếp xử lý mail? Ai có quyền nắm thông tin? Ai có thể có liên quan nhưng cần được bảo mật danh tính?\r\nB. Trình tự viết mail: (Tại mục III)\r\n\r\nII. Các trường hợp cần viết mail phổ biến nhất\r\n\r\nEmail xin nghỉ\r\nEmail báo cáo tiến độ công việc\r\nEmail thông báo\r\nIII. Trình tự viết 1 email\r\n\r\nBước 0: Thêm chữ ký cho Email: Họ tên, chức danh, địa chỉ, số điện thoại liên lạc...(thêm ngay sau khi Account được tạo) \r\nBước 1: File đính kèm\r\nBước 2: Tiêu đề\r\nBước 3: Nội dung\r\nBước 4: Send (rà soát thông tin còn thiếu)\r\nBước 5: Điền địa chỉ người nhận\r\nBước 6: Send\r\nIV. Yêu cầu bắt buộc phải có\r\n\r\nTiêu đề:\r\n\r\nCần có tiền tố - câu tóm tắt nội dung của Email. VD: HR - Xin nghỉ phép ngày 01/01/2021.\r\n\r\nNgười nhận gồm:\r\n\r\nto: Người quản lý có trách nhiệm trực tiếp xử lý Email.\r\n\r\ncc: Người có liên quan, có quyền được biết thông tin.\r\n\r\nbcc: Người có liên quan, có quyền được biết thông tin nhưng cần được bảo mật thông tin.\r\n\r\nNội dung:\r\n\r\nCó thể viết theo 2 kiểu:\r\n\r\nDiễn dịch: Câu chủ đề nằm ở đầu đoạn văn.\r\n\r\nQuy nạp: Câu chủ đề nằm ở cuối đoạn văn.\r\n\r\nTips: Viết theo kiểu diễn dịch giúp người đọc hiểu nhanh, nắm được nội dung của Email mà không cần đọc chi tiết\r\n\r\n          => Giúp tiết kiệm thời gian của người có trách nhiệm xử lý Email. Vì vậy, nên viết theo kiểu diễn dịch.\r\n\r\nChữ ký gồm:\r\n\r\nHọ tên\r\n\r\nChức danh\r\n\r\nSố điện thoại\r\n\r\nĐịa chỉ\r\n\r\nCông ty\r\n\r\nEmail\r\n\r\n\r\n\r\nV. Tips khi viết email\r\n\r\nCó thể set thời gian hoàn tác gửi mail 30 giây để nếu có nhận ra điểm vấn đề của email thì vẫn có cơ hội chỉnh sửa. \r\nKiểm tra lại tất cả thành phần của email trước khi bấm gửi. \r\nFile đính kèm, link phải kiểm tra xem có hoạt động được không, đối với file trong drive thì đã phân quyền và phân quyền đúng hay chưa.\r\nVI. Template email mẫu\r\n\r\n\r\n\r\n\r\n\r\nVII. Kiểm tra\r\n\r\nNội dung:\r\nViết email thông báo lịch thực tập tới bộ phận nhân sự và cc cho các Coach Cấn, Huy và Hằng.\r\nĐịa chỉ email:\r\nnhansu@deha-soft.com\r\nMr Cấn: anh.ct@deha-soft.com\r\nMr Huy: huyhq@deha-soft.com\r\nMrs Hằng: hangtt@deha-soft.com'),
(16, 24, ''),
(17, 25, 'I. Các kiến thức cơ bản về Linux/Unix\r\n\r\n1. Giới thiệu\r\n\r\nHệ điều hành Unix là tập hợp các chương trình mà thực hiện vai trò như một đường link giữa máy tính và người sử dụng.\r\n\r\nCác chương trình máy tính phân cấp các nguồn hệ thống và phối hợp tất cả các phần bên trong của máy tính được gọi là Hệ điều hành hoặc kernel (hạt nhân).\r\n\r\nNhững người sử dụng giao tiếp với kernel thông qua một chương trình mà được biết như là shell. Shell là một bộ biên dịch dòng lệnh, nó biên dịch các lệnh được nhập bởi người sử dụng và chuyển đổi chúng thành một ngôn ngữ mà kernel có thể hiểu.\r\n\r\nUnix/Linux được phát triển lần đầu tiên bởi một nhóm các nhân viên AT&T tại phòng thí nghiệm Bell Labs, gồm có Ken Thompson, Dennis Ritchie, Douglas Mclloy và Joe Ossanna.\r\n\r\n2. Tại sao lập trình viên nên dùng Linux/Unix để lập trình?\r\n\r\nMiễn phí\r\nCài đặt đơn giản\r\nThoải mái truy cập mã nguồn\r\nHỗ trợ hầu hết các ngôn ngữ lập trình\r\nCác server lớn đều sử dụng hệ điều hành Linux\r\nCó thể thoải mái lựa chọn các phần mềm viết code\r\nCảm nhận sức mạnh của Bash Scripting\r\nCác lập trình viên đều mong muốn thành thạo kỹ năng sử dụng Linux\r\nCó cảm giác viết code tốt hơn do liên tục thao tác các lệnh với Terminal\r\n3. Một số thư mục hệ thống quan trọng trong Unix/Linux \r\n\r\n/  - Root: nút gốc (root) đây là nơi bắt đầu của tất cả các file và thư mục. Chỉ có root user mới có quyền ghi trong thư mục này.\r\n/bin - chương trình của người dùng: thư mục này chứa các chương trình thực thi. Các chương trình chung của Linux được sử dụng bởi tất cả người dùng được lưu ở đây. Ví dụ như: ps, ls, ping...\r\n/etc - Các file cấu hình: thư mục này chứa các file cấu hình của các chương trình, đồng thời nó còn chứa các shell script dùng để khởi động hoặc tắt các chương trình khác. Ví dụ: /etc/resolv.conf, /etc/logrotate.conf\r\n/var - File về biến của chương trình: thông tin về các biến của hệ thống được lưu trong thư mục này. Như thông tin về log file: /var/log, các gói và cơ sở dữ liệu /var/lib...\r\n/home - Thư mục người của dùng: thư mục này chứa tất cả các file cá nhân của từng người dùng. Ví dụ: /home/john, /home/marie\\\r\nTham khảo thêm cấu trúc cây thư mục - cấu trúc file hệ thống\r\nII. Một số hệ điều hành phổ biến sử dụng unix/linux\r\n\r\n1. Ubuntu\r\n\r\na. Khái niệm:\r\n\r\nUbuntu là một hệ điều hành mã nguồn mở, được phát triển bởi cộng đồng chung trên nền tảng Debian GNU/Linux. \r\n\r\nĐược tài trợ bởi Canonical Ltd (chủ sở hữu là một người Nam Phi Mark Shuttleworth), Ubuntu cực kỳ lý tưởng cho máy tính để bàn, máy xách tay và máy chủ.  \r\n\r\nb. Hướng dẫn cài đặt Ubuntu\r\n\r\nCài đặt Ubuntu song song với window\r\nCài đặt ubuntu trên window sử dụng WLS\r\n2. Linux Mint\r\n\r\na. Giới thiệu\r\n\r\nLinux Mint là một bản phân phối Linux dựa trên nền tảng Ubuntu. Linux Mint có thêm nhiều tính năng mà Ubuntu không có như nhiều phần mềm được cài đặt sẵn, kể cả các phần mềm không phải mã nguồn mở như Java và Adobe Flash; và một số phần mềm được tạo ra bởi Linux Mint, như mintInstall, mintUpdate, mintNanny...\r\n\r\nPhiên bản đầu tiên của Linux Mint là Ada, ra mắt vào 2006. Phiên bản ổn định mới nhất (20.1) là \"Ulyssa\". Tên của các phiên bản Linux Mint được sắp xếp theo bảng chữ cái.\r\n\r\nb. Hướng dẫn cài đặt Linux Mint\r\n\r\nCài đặt Linux Mint song song với window\r\n3. MacOS\r\n\r\na. Giới thiệu\r\n\r\nMacOS (trước đây là Mac OS X, sau là OS X) là một dòng hệ điều hành độc quyền, được phát triển và phân phối bởi Apple, được cài đặt sẵn trên các máy tính Macintosh. \r\n\r\nMacOS là thế hệ tiếp theo của Mac OS, hệ điều hành ban đầu của Apple. Không như Mac OS, macOS là một hệ điều hành kiểu Unix được xây dựng trên công nghệ được phát triển tại NeXT trong nửa đầu những năm 1980 và cho đến khi Apple mua công ty này vào đầu năm 1997.\r\n\r\nb. Hướng dẫn cài đặt MacOS\r\n\r\nSử dụng các thiết bị của Apple Macbook, Mac Mini, IMac...\r\nIII. Một số câu lệnh phổ biến\r\n\r\n1. Thao tác quản lý file thư mục\r\n\r\nls: lấy danh sách tất cả các file và thư mục trong thư mục hiện hành.\r\npwd: xuất đường dẫn của thư mục làm việc.\r\ncd: thay đổi thư mục làm việc đến một thư mục mới.\r\nmkdir: tạo thư mục mới.\r\nrmdir: xoá thư mục rỗng.\r\ncp: copy một hay nhiều tập tin đến thư mục mới.\r\nmv: đổi tên hay di chuyển tập tin, thư mục.\r\nrm: xóa tập tin.\r\ntouch: tạo một tập tin.\r\ncat: xem nội dung tập tin.\r\nvi: khởi động trình soạn thảo văn bản vi.\r\nnano: Khởi động trình soạn thảo văn bản nano\r\n2. Các câu lệnh sử dụng phân quyền\r\n\r\nchmod: phân quyền cho file, thư mục.\r\nChú ý: Cần tìm hiểu và thực hành thành thạo các lệnh phân quyền cả bằng chữ và bằng số.\r\n\r\nTham khảo thêm các lệnh phân quyền 1\r\nTham khảo thêm các lệnh phân quyền 2\r\n3. Các câu lệnh phổ biến khác\r\n\r\nTham khảo thêm về các lệnh cơ bản 1\r\nTham khảo thêm về các lệnh cơ bản 2\r\nIV. Editor phổ biến trong Unix/Linux\r\n\r\n1. Vi Editor\r\n\r\na. Giới thiệu\r\n\r\nVi Editor là trình soạn thảo văn bản ban đầu được tạo ra cho hệ điều hành Unix/Linux. Nó được định nghĩa và đặc tả bởi Single Unix Specification and POSIX.\r\n\r\nVi Editor là ứng dụng soạn thảo, chỉnh sửa text. Nó chính là 1 trong những công cụ hỗ trợ không thể thiếu.\r\n\r\nb. Hướng dẫn sử dụng Vi Editor\r\n\r\nHướng dẫn sử dụng Vi Editor 1\r\nHướng dẫn sử dụng Vi Editor 2\r\nHướng dẫn sử dụng Vi Editor 3\r\n2. Nano\r\n\r\na. Giới thiệu\r\n\r\nCũng giống như Vi Editor, Nano Editor là trình soạn thảo văn bản được tạo ra cho hệ điều hành Unix/Linux và cũng được rất nhiều người dùng sử dụng.\r\nb. Hướng dẫn sử dụng Nano Editor\r\n\r\nHướng dẫn sử dụng Nano Editor\r\nV. Một số package nên cài đặt sau khi cài Ubuntu/Linux mint/ MacOS:\r\n\r\nPackage nên cài\r\nVI. Kiểm tra\r\n\r\n1. Thực hành\r\n\r\nYêu cầu:\r\nSử dụng một trong các hệ điều hành Ubuntu hoặc Linux mint hoặc MacOS.\r\nTimebox: 5 phút.\r\nNội dung:\r\nQuản lý file, thư mục trong Linux: tạo, sao chép, di chuyển, xoá file và thư mục.\r\nGiải thích ý nghĩa của quyền và phân quyền cho file hoặc thư mục theo yêu cầu (cả bằng chữ và bằng số).\r\nGiải thích ý nghĩa các flag : \" -R \" , \" -rf \" ,\" -r \",\"-a\" trong câu lệnh Linux. VD: ls -R, rm -rf...\r\nThư mục /var, /bin, /home chứa gì?\r\nCác thao tác cơ bản của Vi editor (lưu file, thoát file, lưu không thoát, thoát file...)'),
(18, 26, 'Sau khi học xong slide cần trả lời được các câu hỏi: \r\n\r\n-Git là gì? Quản lý phiên bản là gì? Quản lý phiên bản phân tán là như thế nào, tập trung là như thế nào?\r\n-Tại sao nên dùng Git? So sánh Git và SVN?\r\n-Ý nghĩa các câu lệnh cơ bản: git init, git clone, git fetch, git status, git add, git commit, git pull, git push, git merge, git rebase, git checkout, git reset, git stash...\r\n'),
(19, 27, 'I. A successful Git branching model\r\n\r\nLưu ý: Cách đặt tên branch:\r\n\r\nfeature-* hoặc feature/*: \"*\" thể hiện một tính năng.\r\nVí dụ: feature/create_categories_in_shop\r\nrelease-* hoặc release/* hoặc release/v*: kí hiệu \"*\" thể hiện version phát hành.\r\nVí dụ: version phát hành hiện tại của sản phẩm đang là v1.2.0 ⇒ release/v1.3.0 hoặc release/v1.3.0, release/v1.4.0, release/v1.5.0, ... ứng với mỗi lần tạo thêm nhánh.\r\nhotfix-* hoặc hotfix/*: kí hiệu \"*\" thể hiện version sửa lỗi.\r\nVí dụ: version phát hành hiện tại của sản phẩm đang là v1.3.0 ⇒ hotfix/v1.3.1 hoặc release/v1.3.1, release/v1.3.2, release/v1.3.3, ... ứng với mỗi lần tạo thêm nhánh.\r\nTừ phiên bản gitlab 14 trở lên tên nhánh \" master \"  có thể đổi thành  \" main \".'),
(20, 28, 'I. Gitlab\r\n\r\nGitLab là hệ thống self-hosted mã nguồn mở dựa trên hệ thống máy chủ Git dùng để quản lý mã nguồn.\r\n\r\nII. Thực hành\r\n\r\nHọc git branch\r\nIII. Kiểm tra\r\n\r\n1. Lý thuyết\r\n\r\nLàm bài quiz cuối bài\r\n2. Thực hành\r\n\r\nTimebox: 10 phút\r\nLàm 1 lần duy nhất\r\nNội dung:\r\nA Successful Git branching Model (1).\r\nTái hiện 1 trường hợp conflict và xử lý (1).\r\nDùng merge request trên server Gitlab(0.5).\r\nHoàn thiện có chứa các nhánh (5)\r\nGit - Ba trạng thái Committed Staged Modified(0.5).\r\nSử dụng Git workflow (1).\r\nMỗi nhánh phải có 1 commit trở lên, các nhánh chức năng(feature) phải có 2 commit trở lên(1).'),
(21, 29, '1. Hoàn thiện khóa học HTML Tutorial trên W3school: '),
(22, 30, 'I. Nội dung\r\n\r\n1. Hoàn thành xong khóa học CSS trên W3School:'),
(23, 31, 'I. Cơ bản về Javascript\r\n\r\n1. Hoàn thiện khóa học\r\n\r\nTime box: 3.5 ngày\r\nNội dung \r\n Hoàn thiện video 1 - 70 của khóa Java script cơ bản\r\n\r\n2 Bài tập\r\n\r\nTime box: 1.5 ngày\r\nTạo một thư mục git với tên project là Deha-Academy-Preintern-Javascript-lab\r\n2.1 Bài 1 đồng hồ bấm giờ đếm ngược\r\n\r\nTime box 6 giờ\r\nNội dung tạo ra ứng dụng đồng hồ bấm giờ đếm ngược :\r\nCho phép nhập vào giờ, phút, giây là ô input\r\nCó nút start và stop\r\nTạo ra thư mục tên là count-down-time trong project git Deha-Academy-Preintern-Javascript-lab\r\n\r\n2.2 Bài 2 Validate form\r\n\r\nTạo chức năng Validate ở bải 1.13 \r\nTimebox: 6 giờ\r\nNội dung:\r\n​​​​​​​Validate các ô input \r\nĐối với số điện thoại validate số của Việt Nam\r\nTạo ra thư mục tên là validate-form trong project git Deha-Academy-Preintern-Javascript-lab'),
(24, 32, '2. Hoàn thành trang web sử dụng HTML CSS Javascript giống trang mẫu: trang mẫu (link bên dưới)'),
(25, 33, 'Khi tìm kiếm giải thuật cho một chương trình, sẽ dễ dàng hơn để tạo ra một giải thuật nếu đặt dữ liệu tròn các mẫu tiêu biểu. Các đặc trưng được gọi là các cấu trúc dữ liệu. Một số cấu trúc dữ liệu quen thuộc là: mảng, danh sách, ngăn sếp, hàng đợi và cây.');

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
(8, 'DEHA Dev Standard PHP', 'https://lms.deha-soft.com/upload/course/1634004705.jpg', 'DEHA Dev Standard PHP'),
(10, 'Pre Intern', 'https://lms.deha-soft.com/upload/course/1642563334.jpg', 'Pre Intern');

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
(34, 19, '', ''),
(35, 20, 'https://cefacom.vn/2022/10/13/agile-scrum-la-gi-loi-ich-khac-biet-va-tinh-hieu-qua-trong-e-learning/?gclid=CjwKCAjw2OiaBhBSEiwAh2ZSPxxtkwB5P-EcQ1HXdLv-GffmQanM3N5iz96jCquq1WQ6MWaUruoXxRoCqfwQAvD_BwE', 'Khái niệm Scrum'),
(36, 21, '', ''),
(37, 22, '', ''),
(38, 23, '', ''),
(39, 24, '', ''),
(40, 25, 'https://www.youtube.com/watch?v=4IVpK3DLfT4', 'Cài đặt Ubuntu song song với window'),
(41, 26, 'https://topdev.vn/blog/git-la-gi/', 'Khái niệm GIT'),
(42, 27, 'https://nvie.com/posts/a-successful-git-branching-model/', 'A Successful Git branching Model'),
(43, 28, 'https://learngitbranching.js.org/?locale=vi', 'Học git branch'),
(44, 29, 'https://www.w3schools.com/html/default.asp', 'Khóa học HTML Tutorial trên W3school'),
(45, 30, 'https://www.w3schools.com/css/default.asp', 'Khóa học CSS cơ bản'),
(46, 31, 'https://www.youtube.com/watch?v=0SJE9dYdpps&list=PL_-VfJajZj0VgpFpEVFzS5Z-lkXtBe-x5', 'Java script cơ bản'),
(47, 32, 'https://www.thegioididong.com/', 'Trang mẫu'),
(48, 33, 'https://cafedev.vn/cau-truc-du-lieu-va-giai-thuat-la-gi-tai-sao-no-lai-quan-trong-voi-dan-lap-trinh/#:~:text=ng%E1%BB%AF%20kh%C3%A1c%20nhau%E2%80%A6-,C%E1%BA%A5u%20tr%C3%BAc%20d%E1%BB%AF%20li%E1%BB%87u%20v%C3%A0%20gi%E1%BA%A3i%20thu%E1%BA%ADt(CTDL%20%26%20GT),c%C3%B3%20s%E1%BB%91%20l%C6%B0%E1%BB%A3ng%20c%E1%BB%B1c%20l%E1%BB%9Bn.', 'cấu trúc dữ liệu và giải thuật là gì?');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `information`
--

CREATE TABLE `information` (
  `information_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `information`
--

INSERT INTO `information` (`information_id`, `account_id`, `fullname`, `email`) VALUES
(1, 1, 'Tài khoản test học sinh 1', 'test@gmail.com'),
(2, 3, 'Tài khoản test giáo viên 1', 'giaovien@gmail.com'),
(3, 5, 'tài khoản test admin 1', 'admin@gmail.com'),
(4, 6, 'Giáo viên 1', 'giaovien1@gmail.com'),
(5, 7, 'Giáo viên 2', 'giaovien2@gmail.com'),
(6, 8, 'giáo viên 3', 'giaovien3@gmail.com'),
(47, 22, '', 'minh@gmail.com');

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
(11, 18, 19, 0),
(12, 19, 20, 0),
(12, 20, 21, 0),
(13, 21, 22, 0),
(14, 22, 23, 0),
(15, 23, 24, 0),
(16, 24, 25, 0),
(18, 25, 26, 0),
(18, 26, 27, 0),
(18, 27, 28, 0),
(19, 28, 29, 0),
(19, 29, 30, 0),
(19, 30, 31, 0),
(19, 31, 32, 0),
(20, 32, 33, 0);

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
(19, 'Sổ tay', 'https://lms.deha-soft.com/upload/lesson/lesson-2019-11-07-1573109110.png', 5),
(20, 'Giới thiệu về AGLIE - SCRUM', 'https://lms.deha-soft.com/upload/lesson/1628650585.png', 5),
(21, 'DAILY SCRUM', 'https://lms.deha-soft.com/upload/lesson/lesson-2020-02-04-1580792467.jpg', 5),
(22, 'HORENSO', 'https://lms.deha-soft.com/upload/lesson/1597734772.png', 5),
(23, 'EMAIL', 'https://lms.deha-soft.com/upload/lesson/lesson-2019-11-07-1573109269.jpg', 5),
(24, 'GOOGLE CALENDAR', 'https://lms.deha-soft.com/upload/lesson/lesson-2020-02-28-1582876892.jpg', 5),
(25, 'LINUX', 'https://lms.deha-soft.com/upload/lesson/1634804875.jpeg', 6),
(26, 'GIT cơ bản', 'https://lms.deha-soft.com/upload/lesson/1634697984.jpeg', 7),
(27, 'Các quy tắc khi sử dụng GIT', 'https://lms.deha-soft.com/upload/lesson/1634697133.jpeg', 7),
(28, 'Thực hành GIT', 'https://lms.deha-soft.com/upload/lesson/1634697969.jpeg', 7),
(29, 'HTML PREINTERN', 'https://lms.deha-soft.com/upload/lesson/1642564064.png', 8),
(30, 'CSS CƠ BẢN', 'https://lms.deha-soft.com/upload/lesson/1642564116.jpg', 8),
(31, 'JAVASCRIPT', 'https://lms.deha-soft.com/upload/lesson/1642564343.jpg', 8),
(32, 'THỰC HÀNH', 'https://lms.deha-soft.com/upload/lesson/1642564503.jpg', 8),
(33, 'Cấu trúc dữ liệu và giải thuật', 'https://lms.deha-soft.com/upload/lesson/1588732952.jpg', 8);

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
(11, '8', 'Sổ tay', 'https://lms.deha-soft.com/upload/subject/subject-2019-11-07-1573111967.png', 5),
(12, '8', 'Giới thiệu về AGLIE, SCRUM', 'https://lms.deha-soft.com/upload/subject/1628649230.png', 5),
(13, '8', 'HORENSO', 'https://lms.deha-soft.com/upload/subject/subject-2019-11-07-1573112040.png', 5),
(14, '8', 'EMAIL', 'https://lms.deha-soft.com/upload/subject/subject-2019-11-07-1573112001.jpg', 5),
(15, '8', 'GOOGLE CALENDAR', 'https://lms.deha-soft.com/upload/subject/subject-2020-02-28-1582876832.jpg', 5),
(16, '8', 'LINUX', 'https://lms.deha-soft.com/upload/subject/1634804901.jpeg', 6),
(18, '8', 'GIT', 'https://lms.deha-soft.com/upload/subject/1634710642.png', 7),
(19, '10', 'CƠ BẢN VỀ LẬP TRÌNH WEB', 'https://lms.deha-soft.com/upload/subject/1642563432.jpg', 8),
(20, '10', 'Cấu trúc dữ liệu và giải thuật', 'https://lms.deha-soft.com/images/img-default.png', 8);

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
(13, 19, 'Giải đáp được một số thắc mắc thường gặp trong quá trình thực tập'),
(14, 20, 'Nắm được các kiển thức cơ bản về Agile Scrum.'),
(15, 21, '-Hiểu được tại sao phải daily scum hằng ngày.\r\n-Hiểu được cách daily scrum.\r\n-Nắm được cách tổ chức, tham gia một buổi daily scrum.'),
(16, 22, '-Hiểu được HORENSO là gì\r\n-Nắm được các đặc điểm của HORENSO\r\n-Biết được lợi ích của HORENSO\r\n-Nắm được một số kinh nghiệm khi sử dụng HORENSO'),
(17, 23, '-Nắm được hậu quả của việc gửi email lỗi\r\n-Các trường hợp cần viết email\r\n-Nắm thành phần, trình tự và biết cách viết email chuyên nghiệp.\r\n-Tips khi viết email'),
(18, 24, '-Hiểu được cách sử dụng google calendar \r\n-Nắm được lợi ích khi sử dụng google calendar\r\n-Tạo được event trên google calendar '),
(19, 25, '-Hiểu được các kiến thức cơ bản về  Linux/unix \r\n-Thành thạo các câu lệnh quản lý file trong linux/unix\r\n-Thành thạo cách phân quyền file thư mục trong linux/unix\r\n-Sử dụng vi/vim editor để edit file\r\n-Áp dụng các kiến thức trong thực hành sử dụng một trong các hệ điều hành: ubuntu, macos, linuxmint...'),
(20, 26, '-Hiểu được các khái niệm cơ bản và cách hoạt động hệ thống quản lý phân tán Git.\r\n-Hiểu được về các hệ thống quản lý mã nguồn.\r\n-Sử dụng và nêu được ý nghĩa các câu lệnh Git cơ bản.'),
(21, 27, '-Hiểu được conflict là gì, biết cách fix conflict.\r\n-Sử dụng được \"A Successful Branching Model\".\r\n-Nắm được git workflow.\r\n-Hiểu được ý nghĩa của các Branch và cách đặt tên.\r\n-Biết cách xử lý khi gặp những vấn đề thường gặp. '),
(22, 28, '-Sử dụng thành thạo các thao tác trên Gitlab\r\n-Thành thạo các thao tác với git theo git workflow.\r\n-Có thể tự tạo một dự án áp dụng git.'),
(23, 29, '-Hiểu được cơ bản về HTML.\r\n-Sử dụng được HTML tạo một trang web đơn giản\r\n-Hiểu được các thẻ: main, section, body, script, style, head, html, p, span, div, a, li, ul, ol, nav, h1, h2,h3,h4, h5, h6, table, atribute... '),
(24, 30, '-Hiểu được cơ bản về CSS.\r\n-Sử dụng được CSS tạo một trang web đơn giản\r\n-Nắm được cách sử dụng CSS trong HTML\r\n-Một số thuộc tính cơ bản: color, padding, margin, background, position, :after, :before, :hover, :active, :forcus, : visisted, width, height, max-with, max-height....'),
(25, 31, '-Hiểu được cơ bản về Javascript.\r\n-Sử dụng được Javascript tạo một trang web đơn giản\r\n-Hiểu một số syntax, concept: khai báo biến hàm, câu lệnh điều kiện, vòng lặp, chạy javascript trong HTML...'),
(26, 32, '-Kết hợp được HTML, CSS, Javascript vào tạo một trang web'),
(27, 33, '-Hiểu được một số cấu trúc dữ liệu cơ bản\r\n-Hiểu được một số giải thuật cơ bản');

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
(43, 19, '', ''),
(44, 20, '', ''),
(45, 21, '<iframe width=\"1079\" height=\"315\" src=\"https://www.youtube.com/embed/_UkGnmsg8SA\" title=\"Office Skill | Tutorial Daily Scrum\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ''),
(46, 22, '<iframe width=\"1079\" height=\"315\" src=\"https://www.youtube.com/embed/pIvz3KYNTPo\" title=\"Office Skill | Kĩ năng  HORENSO\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ''),
(47, 23, '<iframe width=\"1079\" height=\"315\" src=\"https://www.youtube.com/embed/rk-7E6RJ9GY\" title=\"Office Skill | How to write professional emails?\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ''),
(48, 24, '<iframe width=\"1079\" height=\"315\" src=\"https://www.youtube.com/embed/Jz0kJkrMbM8\" title=\"Office Skill | Quản lý thời gian | Manage time with Google Calendar\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ''),
(49, 25, '<iframe width=\"1079\" height=\"315\" src=\"https://www.youtube.com/embed/6vdQ8D_SgYc\" title=\"Linux | Các câu lệnh cơ bản trong linux | Basic commands with linux operating system (Ubuntu)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ''),
(50, 26, '', ''),
(51, 27, '', ''),
(52, 28, '<iframe width=\"1079\" height=\"315\" src=\"https://www.youtube.com/embed/UGqSDWUMZAQ\" title=\"GIt | Git trong 18 phút |  Learn Git and Git Work Flow in 18 Minutes ?\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ''),
(53, 29, '', ''),
(54, 30, '', ''),
(55, 31, '', ''),
(56, 32, '', ''),
(57, 33, '<iframe width=\"848\" height=\"530\" src=\"https://www.youtube.com/embed/tdmuh2uNkNA\" title=\"Phần 1 | Mở đầu cấu trúc dữ liệu & giải thuật là gì? | Khoá học cấu trúc dữ liệu & giải thuật\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '');

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
-- Chỉ mục cho bảng `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`information_id`);

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
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjects_id`),
  ADD KEY `courses_id` (`courses_id`);

--
-- Chỉ mục cho bảng `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`target_id`);

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
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `authority`
--
ALTER TABLE `authority`
  MODIFY `authority_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `hint`
--
ALTER TABLE `hint`
  MODIFY `hint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `information`
--
ALTER TABLE `information`
  MODIFY `information_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `introduction`
--
ALTER TABLE `introduction`
  MODIFY `introduction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjects_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `target`
--
ALTER TABLE `target`
  MODIFY `target_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
