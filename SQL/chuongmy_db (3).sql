-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2026 at 08:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chuongmy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '123456', '2026-04-23 09:30:26'),
(2, 'admin2', '1234567', '2026-04-25 05:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `schedule_type` varchar(100) DEFAULT NULL,
  `people_count` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Mới',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `fullname`, `phone`, `email`, `schedule_type`, `people_count`, `note`, `status`, `created_at`) VALUES
(7, 'g', '0325439557', 'trinhthihuong21@gmail.com', '1 ngày', 2, 'test', 'Đã liên hệ', '2026-05-03 14:44:06'),
(8, '12222', '0325439557', 'trinhthihuong21@gmail.com', '1 ngày', 2, 'á', 'Chờ xử lý', '2026-05-04 11:28:44'),
(9, 'ấdde', '0325439557', 'trinhthihuong21@gmail.com', '2 ngày 1 đêm', 2, 'q', 'Chờ xử lý', '2026-05-04 15:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `featured_locations`
--

CREATE TABLE `featured_locations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `detail_link` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`, `sort_order`, `is_active`, `created_at`) VALUES
(32, '1', '1777911378_8871.jpg', 1, 1, '2026-05-04 16:16:18'),
(34, '2', '1777911476_4939.jpg', 2, 1, '2026-05-04 16:17:56'),
(37, '5', '1777911718_6857.jpg', 5, 1, '2026-05-04 16:21:58'),
(40, '3', '1777911912_1322.jpg', 3, 1, '2026-05-04 16:25:12'),
(42, '7', '1777911969_8913.jpg', 7, 1, '2026-05-04 16:26:09'),
(49, '9', '1777912354_3276.jpg', 9, 1, '2026-05-04 16:32:34'),
(50, '8', '1777912388_2474.jpg', 8, 1, '2026-05-04 16:33:08'),
(51, '6', '1777912404_6131.jpg', 6, 1, '2026-05-04 16:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `itineraries`
--

CREATE TABLE `itineraries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itineraries`
--

INSERT INTO `itineraries` (`id`, `title`, `image`, `is_active`, `sort_order`) VALUES
(9, 'Lịch trình 1 ngày', '1777874241_9894.jpg', 1, 0),
(10, 'Lịch trình 1 ngày 2', '1777874259_7515.png', 1, 0),
(11, '2 ngày 1 đêm', '1777874274_2606.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_items`
--

CREATE TABLE `itinerary_items` (
  `id` int(11) NOT NULL,
  `itinerary_id` int(11) NOT NULL,
  `time_label` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `item_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `full_desc` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_4` varchar(255) DEFAULT NULL,
  `image_5` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `opening_hours` varchar(100) DEFAULT NULL,
  `ticket_price` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `map_top` varchar(20) DEFAULT NULL,
  `map_left` varchar(20) DEFAULT NULL,
  `detail_title` varchar(255) DEFAULT NULL,
  `visit_tips` text DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `slug`, `category`, `location_name`, `short_desc`, `full_desc`, `image`, `image_2`, `image_3`, `latitude`, `longitude`, `is_featured`, `is_active`, `sort_order`, `created_at`, `image_4`, `image_5`, `video_url`, `opening_hours`, `ticket_price`, `note`, `map_top`, `map_left`, `detail_title`, `visit_tips`, `video`) VALUES
(11, 'Chùa Trầm', 'chua-tram', 'tam-linh', 'Phụng Châu', 'Không gian tâm linh cổ kính, yên tĩnh, phù hợp vãn cảnh.', 'Tọa lạc tại xã Phụng Châu, Chùa Trầm không chỉ là một danh thắng mà còn là một pho sử liệu sống động của vùng đất xứ Đoài. Được xây dựng vào thế kỷ XVI bởi tướng sĩ nhà Lê, ngôi chùa nằm tựa lưng vào núi Tử Trầm, tạo nên thế \"tọa sơn hướng thủy\" đầy uy nghiêm. Điểm độc đáo nhất chính là sự kết hợp giữa kiến trúc nhân tạo và hang động tự nhiên. Động Long Tiên nằm trong lòng núi với hệ thống nhũ đá kỳ ảo, nơi tiếng chuông chùa ngân vang hòa cùng tiếng gió lùa kẽ đá tạo nên một bản giao hưởng tâm linh huyền bí. Đây cũng là nơi vang lên lời kêu gọi Toàn quốc kháng chiến của Chủ tịch Hồ Chí Minh năm 1946, đánh dấu một cột mốc vàng son trong lịch sử dân tộc.', '1777909388_8303.jpg', '1777909330_8576.jpg', '1777909330_6588.jpg', '20.93866946728913', '105.69610779016753', 1, 1, 0, '2026-04-24 14:10:00', '1777909330_4468.png', '1777909330_6550.jpg', '', '07:00-19:00', 'Miễn phí', 'Ngoài những trải nghiệm khám phá văn hóa tâm linh, bạn có thể tham quan thắng cảnh thiên nhiên đặc sắc tại khu vực Núi Trầm. Với quang cảnh thiên nhiên hùng vĩ cùng đồng cỏ xanh rì và hoa dại thơ mộng, Núi Trầm như một bức tranh thiên nhiên ngập tràn sắc màu mà bạn không nên bỏ lỡ. \r\n\r\nCó hai lối đi để tham quan Núi Trầm. Một lối đi nằm cạnh Hang Long Tiên với địa thế khá dốc. Bạn phải vượt qua các vỉa đá, bụi cây um tùm để lên tới đỉnh. Lối đi thứ hai dễ dàng hơn là vòng ra đường cái rồi đi theo lối món sau chùa chính để lên Núi Trầm.', '55%', '40%', 'Chùa Trầm – \"Tử Trầm Sơn Tự\" Cổ Kính', 'Khi đến chùa Trầm, bạn nên lựa chọn thời điểm sáng sớm hoặc chiều muộn để tận hưởng không khí trong lành và tránh đông người, đặc biệt vào cuối tuần hoặc ngày lễ. \r\nDo địa hình có nhiều bậc đá và đoạn đường dốc nhẹ, việc mang giày thể thao hoặc giày đế thấp là rất cần thiết để di chuyển an toàn. Vì đây là địa điểm tâm linh, bạn nên mặc trang phục lịch sự, tránh đồ quá ngắn hoặc hở vai.\r\n Nếu muốn chụp ảnh đẹp, hãy chọn những ngày nắng nhẹ hoặc sau mưa, khi cảnh vật xanh và trong hơn. \r\ngoài ra, nên giữ trật tự, không nói chuyện lớn tiếng và hạn chế xả rác để giữ gìn không gian yên tĩnh, trang nghiêm của chùa.\r\n Bạn cũng có thể kết hợp tham quan hang Trầm gần đó để hiểu thêm về giá trị lịch sử của khu vực.', '1777972427_1218.mp4'),
(13, 'Chùa Trăm Gian', 'chua-tram-gian', 'tam-linh', 'Tiên Phương', 'Ngôi chùa cổ, kiến trúc độc đáo, giá trị lịch sử lâu đời.', 'Chùa Trăm Gian, tên chữ là Quảng Nghiêm Tự, được khởi dựng từ thời vua Lý Cao Tông (1185). Ngôi chùa là một quần thể kiến trúc Phật giáo đồ sộ, tọa lạc trên một quả đồi cao bao quanh bởi rừng thông cổ thụ bạt ngàn. Đúng như tên gọi, chùa có quy mô lên tới hơn 100 gian, chia làm ba cụm kiến trúc chính dọc theo sườn đồi. Nơi đây gắn liền với huyền thoại về Đức Thánh Bối – người có công lớn trong việc hộ quốc an dân. Kiến trúc chùa tiêu biểu cho tinh hoa mỹ thuật Việt với các bộ vì kèo gỗ, tượng Tuyết Sơn quý giá và những bức chạm khắc tinh xảo thể hiện tư duy thẩm mỹ đỉnh cao của các nghệ nhân xưa, biến nơi đây thành một bảo tàng nghệ thuật kiến trúc ngoài trời.', '1777053152_6195.jpg', '1777040003_2227.jpg', '', '20.9506375107285', '105.6798872399135', 1, 1, 0, '2026-04-24 14:13:23', '1777040003_4296.jpg', '', '', '07:00-19:00', 'Miễn phí', 'Ngoài những trải nghiệm khám phá văn hóa tâm linh, bạn có thể tham quan thắng cảnh thiên nhiên đặc sắc tại khu vực Núi Trầm. Với quang cảnh thiên nhiên hùng vĩ cùng đồng cỏ xanh rì và hoa dại thơ mộng, Núi Trầm như một bức tranh thiên nhiên ngập tràn sắc màu mà bạn không nên bỏ lỡ. \r\n\r\nCó hai lối đi để tham quan Núi Trầm. Một lối đi nằm cạnh Hang Long Tiên với địa thế khá dốc. Bạn phải vượt qua các vỉa đá, bụi cây um tùm để lên tới đỉnh. Lối đi thứ hai dễ dàng hơn là vòng ra đường cái rồi đi theo lối món sau chùa chính để lên Núi Trầm.', '42%', '40%', 'Chùa Trăm Gian – Tuyệt Tác Kiến Trúc Gỗ Lý - Trần', 'Khi đến chùa Trầm, bạn nên lựa chọn thời điểm sáng sớm hoặc chiều muộn để tận hưởng không khí trong lành và tránh đông người, đặc biệt vào cuối tuần hoặc ngày lễ. Do địa hình có nhiều bậc đá và đoạn đường dốc nhẹ, việc mang giày thể thao hoặc giày đế thấp là rất cần thiết để di chuyển an toàn. Vì đây là địa điểm tâm linh, bạn nên mặc trang phục lịch sự, tránh đồ quá ngắn hoặc hở vai. Nếu muốn chụp ảnh đẹp, hãy chọn những ngày nắng nhẹ hoặc sau mưa, khi cảnh vật xanh và trong hơn. Ngoài ra, nên giữ trật tự, không nói chuyện lớn tiếng và hạn chế xả rác để giữ gìn không gian yên tĩnh, trang nghiêm của chùa. Bạn cũng có thể kết hợp tham quan hang Trầm gần đó để hiểu thêm về giá trị lịch sử của khu vực.', '1777965544_2179.mp4'),
(15, 'Đồi Bù', 'doi-bu', 'thien-nhien', 'Xuân Mai', 'Địa điểm săn mây, dù lượn, cắm trại cuối tuần.', '', '1777053233_1558.jpg', '', '', '20.840216890001148', '105.58243105626579', 1, 1, 0, '2026-04-24 17:53:53', '', '', '', '07:00-19:00', 'Miễn phí', '', '34%', '11%', NULL, NULL, NULL),
(16, 'Núi Trầm', 'nui-tram', 'thien-nhien', 'Phụng Châu', 'Điểm leo núi, dã ngoại, ngắm cảnh nổi bật gần Hà Nội.', 'Núi Trầm, hay còn gọi là Tử Trầm Sơn, là một quần thể núi đá vôi độc đáo nằm cách trung tâm Hà Nội chỉ khoảng 25km. Khác với vẻ hùng vĩ của những dãy núi phía Bắc, Núi Trầm mang vẻ đẹp thoát tục với những vách đá trắng nhấp nhô giữa thảm cỏ xanh mướt, tạo nên khung cảnh mà người xưa ví như \"tiên cảnh rơi xuống trần gian\". Trong lịch sử, nơi đây từng là địa điểm được các chúa Trịnh chọn làm hành cung để nghỉ ngơi, thưởng ngoạn. Những con đường mòn uốn lượn, những mỏm đá có hình thù kỳ lạ không chỉ là nơi check-in lý tưởng mà còn là địa điểm gợi nhắc về sự kiến tạo địa chất hàng triệu năm của vùng đất này.', '1777053302_2482.jpg', '1777909728_2100.jpg', '1777909728_4841.jpg', '20.94054888813482', '105.6947528867587', 0, 1, 0, '2026-04-24 17:55:02', '1777909902_5147.jpg', '1777909902_3953.jpg', '', '07:00-19:00', 'Miễn phí', '', '45%', '40%', 'Núi Trầm – \"Cao Nguyên Đá\" Giữa Lòng Đồng Bằng', 'Khi leo Núi Trầm, bạn nên chuẩn bị giày thể thao có độ bám tốt vì địa hình đá vôi khá trơn, đặc biệt sau mưa. Thời điểm lý tưởng là buổi sáng sớm hoặc chiều muộn để tránh nắng gắt và có ánh sáng đẹp khi chụp ảnh. Nên mang theo nước uống, đồ ăn nhẹ và một ít thuốc cá nhân nếu có kế hoạch leo lâu hoặc cắm trại. Nếu đi theo nhóm, nên thống nhất điểm tập trung để tránh lạc nhau. Tránh leo núi khi trời mưa hoặc thời tiết xấu vì đá dễ trơn trượt. Quan trọng nhất là giữ vệ sinh, không xả rác và tôn trọng thiên nhiên để bảo vệ cảnh quan.', ''),
(17, 'Làng Nghề Phú Vinh', 'lang-nghe', 'lang-nghe', 'Phú Nghĩa', 'Làng nghề mây tre đan, sản phẩm thủ công tinh xảo.', '', '1777053371_8988.jpg', '', '', '20.93764272875245', '105.64563171681505', 0, 1, 0, '2026-04-24 17:56:11', '', '', '', '', '', '', '90%', '10%', NULL, NULL, NULL),
(18, 'Island nah', 'island-coffee', 'cafe', 'Phú Nghĩa', 'Quán cafe view đẹp, không gian chill, phù hợp thư giãn.', '', '1777053513_2078.jpg', '', '', '20.913498309487856', '105.65755155153035', 0, 1, 0, '2026-04-24 17:58:33', '', '', '', '', '', '', '55%', '12%', NULL, NULL, NULL),
(19, 'Lasi Coffee & Bistro', 'lasi-coffee', 'cafe', 'Đồng Nanh', 'Cafe ngắm cảnh, không gian thoáng, lý tưởng buổi chiều.', '', '1777053604_2572.jpg', '', '', '20.930370698754047', '105.68960166687164', 0, 1, 0, '2026-04-24 18:00:04', '', '', '', '', '', '', '12%', '34%', NULL, NULL, NULL),
(20, 'Hillstay Villa Homestay', 'homestay', 'nghi-duong', 'Trần Phú', 'Homestay xanh yên bình, phù hợp nghỉ dưỡng gần Hà Nội', '', '1777053690_9214.jpg', '', '', '20.84154893214572', '105.63053326686934', 0, 1, 0, '2026-04-24 18:01:30', '', '', '', '', '', '', '12%', '49%', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_type` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `rating` int(11) DEFAULT 5,
  `avatar` varchar(255) DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `customer_name`, `customer_type`, `content`, `rating`, `avatar`, `is_approved`, `is_active`, `created_at`) VALUES
(13, 'Minh Quân', 'Nhóm bạn , Hà Nội', 'Tụi mình đi Núi Trầm vào sáng sớm, thời tiết rất dễ chịu và cảnh khá đẹp. Lịch\r\ntrình 1 ngày hợp cho nhóm bạn muốn đi gần Hà Nội mà vẫn có nhiều trải nghiệm.', 5, '1777015507_person_1.jpg', 1, 1, '2026-04-24 07:25:07'),
(14, 'Thu Trang', 'Du khách cuối tuần', 'Cảnh đẹp và nhiều chỗ check-in khá đẹp, nhưng đường đi hơi khó tìm và hơi khó đi một chút. Bù lại trải nghiệm khá ổn, vẫn đáng để thử nhé mọi người.', 4, '1777015559_person_2.jpg', 1, 1, '2026-04-24 07:25:59'),
(15, 'Mai Anh', 'Gia đình trẻ', 'Mình thích nhất là Chùa Trăm Gian và làng nghề Phú Vinh. Một bên yên tĩnh, cổ kính; một bên lại có trải nghiệm thủ công rất thú vị. Đi cuối tuần khá thư giãn.', 5, '1777015611_person_3.jpg', 1, 1, '2026-04-24 07:26:51'),
(16, 'Tuấn Anh', 'Cặp đôi trẻ', 'Mình đi cùng người yêu vào cuối tuần, không gian rất yên tĩnh và lãng mạn. Hai đứa có thể vừa dạo chơi vừa chụp ảnh, cảm giác rất chill. Đây chắc chắn là một trong những nơi tụi mình thích nhất khi đi gần Hà Nội.', 5, '1777015889_person_5.jpg', 1, 1, '2026-04-24 07:31:29'),
(17, 'Minh Tú', 'Du khách cuối tuần', 'Cảnh đẹp và nhiều chỗ check-in, nhưng đường đi hơi khó tìm một chút. Bù lại trải nghiệm khá ổn, vẫn đáng để thử.', 5, '1777015950_person_6.jpg', 1, 1, '2026-04-24 07:32:30'),
(18, 'Linh Anh', 'Nhóm bạn , Hà Nội', 'Đi cùng bạn bè mà thấy cực kỳ vui, nhiều chỗ check-in đẹp và dễ chụp ảnh. Không cần đi xa mà vẫn có trải nghiệm khá trọn vẹn, rất đáng để thử ít nhất một lần.', 5, '1777016160_person_4.jpg', 1, 1, '2026-04-24 07:36:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_locations`
--
ALTER TABLE `featured_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itinerary_items`
--
ALTER TABLE `itinerary_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary_id` (`itinerary_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `featured_locations`
--
ALTER TABLE `featured_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `itineraries`
--
ALTER TABLE `itineraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `itinerary_items`
--
ALTER TABLE `itinerary_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `itinerary_items`
--
ALTER TABLE `itinerary_items`
  ADD CONSTRAINT `itinerary_items_ibfk_1` FOREIGN KEY (`itinerary_id`) REFERENCES `itineraries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
