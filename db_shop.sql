-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2022 at 09:01 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` int(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `gender` int(11) NOT NULL,
  `working_year` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(50) DEFAULT NULL,
  `levels` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `address`, `gender`, `working_year`, `email`, `password`, `token`, `levels`) VALUES
(1, 'Nhân Viên 1', '01284322', 'Hồ Tây', 0, 2020, 'nv1@gmail.com', '123456', NULL, 0),
(3, 'Nhân Viên 2', '09872934', 'Hồ Gươm', 1, 2019, 'nv2@gmail.com', '123456', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `menu_id`, `name`) VALUES
(1, 2, 'Apple'),
(5, 4, ' Asus'),
(6, 2, 'OPPO'),
(7, 2, 'Xiaomi'),
(8, 2, 'SAMSUNG'),
(9, 2, 'Vivo'),
(10, 2, 'Nokia'),
(11, 4, 'Dell'),
(12, 4, 'Acer'),
(13, 4, 'HP');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(4, 'LAPTOP'),
(2, 'ĐIỆN THOẠI');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_phone` varchar(15) NOT NULL,
  `receiver_address` text NOT NULL,
  `status` int(11) NOT NULL,
  `note` text,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Mới'),
(2, 'Đang xử lý'),
(3, 'Hoàn thành'),
(4, 'Hủy');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created` date DEFAULT NULL,
  `price` float NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `photo`, `created`, `price`, `manufacturer_id`, `menu_id`) VALUES
(4, 'iPhone 13 Pro Max 128GB', 'iPhone 13 Pro Max xứng đáng là một chiếc iPhone lớn nhất, mạnh mẽ nhất và có thời lượng pin dài nhất từ trước đến nay sẽ cho bạn trải nghiệm tuyệt vời, từ những tác vụ bình thường cho đến các ứng dụng chuyên nghiệp.', '1641629266.jpg', NULL, 32000000, 1, 2),
(5, 'OPPO Reno6 Z 5G', 'Không chỉ đưa bạn đến những trải nghiệm đầy phấn khích của mạng 5G siêu tốc, OPPO Reno6 Z 5G còn là chiếc điện thoại tuyệt vời để lưu giữ cảm xúc. Chụp ảnh và quay video chân dung chưa bao giờ thú vị đến thế với loạt tính năng chuyên nghiệp, đầy nghệ thuật.', '1641629368.jpg', NULL, 9500000, 6, 2),
(6, 'iPhone 11 64GB', 'iPhone 11 với 6 phiên bản màu sắc, camera có khả năng chụp ảnh vượt trội, thời lượng pin cực dài và bộ vi xử lý mạnh nhất từ trước đến nay sẽ mang đến trải nghiệm tuyệt vời dành cho bạn.\r\n\r\nĐiện thoại iPhone 11 chính hãng\r\n\r\nRực rỡ sắc màu, thể hiện cá tính\r\nCó tới 6 sự lựa chọn màu sắc cho iPhone 11 64GB, bao gồm Tím, Vàng, Xanh lục, Đen, Trắng và Đỏ, tha hồ để bạn lựa chọn màu phù hợp với sở thích, cá tính riêng của bản thân. Vẻ đẹp của iPhone 11 đến từ thiết kế cao cấp khi được làm từ khung nhôm nguyên khối và mặt lưng liền lạc với một tấm kính duy nhất. Ở mặt trước, bạn sẽ được chiêm ngưỡng màn hình Liquid Retina lớn 6,1 inch, màu sắc vô cùng chân thực. Tất cả tạo nên chiếc điện thoại tràn đầy hứng khởi.\r\n\r\nRực rỡ sắc màu, thể hiện cá tính | iPhone 11\r\n\r\nHệ thống camera kép mới\r\nApple iPhone 11 sở hữu cụm camera kép mặt sau, bao gồm camera góc rộng và camera góc siêu rộng. Cảm biến camera góc rộng 12MP có khả năng lấy nét tự động nhanh gấp 3 lần trong điều kiện thiếu sáng. Bên cạnh đó cảm biến góc siêu rộng cho khả năng chụp cảnh rộng gấp 4 lần, là phương tiện ghi hình tuyệt vời cho những chuyến du lịch, chụp hình nhóm. Nhanh chóng chụp ảnh, quay video, chỉnh sửa và chia sẻ ngay trên iPhone, bạn sẽ không bỏ lỡ bất cứ khoảnh khắc đáng nhớ nào.\r\n\r\nHệ thống camera kép mới | iPhone 11\r\n\r\nQuay video chưa bao giờ chuyên nghiệp đến thế\r\nĐiện thoại iPhone 11 64GB có khả năng quay những đoạn video tuyệt đẹp với độ phân giải 4K 60fps siêu sắc nét. Camera góc siêu rộng mang đến nhiều khung cảnh hơn, đồng thời khả năng quay chuyển động cực ấn tượng sẽ tạo nên những thước phim hoàn hảo. Ngoài ra bạn còn có thể tập trung thu âm vào một chủ thể khi quay video bằng cách phóng to, zoom hình ảnh – đồng thời zoom âm thanh hết sức thú vị. Tất nhiên sau khi quay video, việc chỉnh sửa và xuất bản sẽ diễn ra hết sức tiện lợi, nhanh chóng trên iPhone 11.', '1641629484.png', NULL, 15000000, 1, 2),
(7, 'Laptop ASUS Gaming TUF FX506HCB', 'ngon', '1641631706.jpg', NULL, 25000000, 5, 4),
(8, 'Laptop Dell Gaming G15 5511', 'Đánh giá Laptop Dell Gaming G15 5511 (P105F006BGR) chính hãng, bảo hành dài, chiến game đã\r\nDell Gaming G15 5515 là một trong những mẫu gaming laptop trung cấp mới nhất đến từ Dell, mang trong mình DNA đặc trưng của những chiếc flagship Alienware. Không chỉ vậy, với cấu hình đã được làm mới lại hoàn toàn, sử dụng bộ CPU đến từ nhà AMD đi kèm với card đồ hoạ RTX 3000 series, Dell Gaming G15 5515 xứng đáng là một sự lựa chọn tuyệt vời đối với những game thủ đang muốn cho mình một chiếc gaming laptop siêu mạnh nhưng lại không muốn phải chi ra quá nhiều hầu bao!\r\n\r\nThiết kế mang đậm DNA của Dell Alienware\r\n\r\nDell Gaming G15 5515 mang hơi hướng thiết kế được thừa hưởng từ những chiếc gaming Alienware cao cấp nhất. Những chi tiết như bản lề, khe tản nhiệt, loa hay thậm chí là những chi tiết nhỏ ở cụm bàn phím là minh chứng cho điều đó. Quả thực, Dell Gaming G15 5515 đúng là một chiếc Dell Alienware trung cấp.\r\n\r\nHệ thống tản nhiệt trên Dell Gaming G15 5515 sử dụng đường ống đồng thông qua 4 lỗ thoát khí lớn, giúp hệ thống luôn giữ được mức nhiệt ổn định, cải thiện hiệu suất khi phải xử lý các tác vụ nặng, giữ cho linh kiện có được tuổi thọ lâu hơn. Ngoài ra trong điều kiện ánh sáng yếu, đèn nền phím trên Dell Gaming G15 5515 sẽ phát huy tối đa tác dụng với sự hỗ trợ bởi Alienware Command Center, cho phép người dùng hiệu chỉnh đèn nền tùy theo nhu cầu và sở thích. \r\n\r\nRõ ràng, với việc được đứng trong hàng ngũ của những chiếc gaming laptop trung cấp nên chất lượng gia công của Dell Gaming G15 5515 là cực kỳ tốt. Chi tiết thừa là hoàn toàn không có, những vị trí như logo, bàn phím, khe tản nhiệt đều được hoàn thiện ở mức độ cao nhất, tiệm cận được với những chiếc Alienware đỉnh cao.\r\n\r\nLaptop Dell Gaming G5 5515 1\r\n\r\nMàn hình đem lại trải nghiệm cực kỳ đỉnh cao\r\n\r\nDell Gaming G15 5515 là một chiếc gaming laptop gần như đắt nhất thuộc phân khúc trung cấp đến từ nhà Dell nên rõ ràng, hãng sản xuất đến từ Mỹ cũng sẽ phải trang bị cho chiếc máy này một chiếc màn hình tương xứng với trải nghiệm cấu hình mà nó mang lại. Với kích thước 15.6 inch, độ phân giải FullHD (1920*1080), được phủ lớp chống chói và tần số quét lên tới 165Hz, dĩ nhiên, trải nghiệm gaming đỉnh cao nhất sẽ là thứ mà các bạn sẽ có được đối với chiếc màn hình này. Tần số quét cao là một trong những điểm rất nổi trội trên màn hình của Dell Gaming G15 5515 , đây là thứ không thể thiếu được đối với tất cả những game thủ e-Sport chuyên nghiệp đến từ nhưanxg tựa game như CS:GO hay Valorant, khi mà chỉ cần một khung hình bị khựng thôi cũng khiến cho game đấu của bạn trở nên khó khăn hơn bao giờ hết. 165Hz giúp bạn giải quyết hoàn toàn điều đó.\r\n\r\nThông số màn hình ấn tượng, đi kèm với hệ thống phần cứng tích hợp cực kỳ mạnh mẽ, không khó để các bạn có thể làm được những tác vụ multimedia bán chuyên nghiệp trên chiếc máy này một cách hoàn toàn tốt (chỉnh sửa hình ảnh với nhiều lớp layer chồng chéo nhau, dựng video cần sự chính xác về màu sắc lớn,…)\r\n\r\nLaptop Dell Gaming G5 5515 2\r\n\r\nBàn phím và touchpad tuyệt vời\r\n\r\nBàn phím và touchpad trên Dell gaming nói chung và Dell Gaming G15 5515 luôn được hoàn thiện để đem lại trải nghiệm sử dụng cực kỳ tốt. Nói riêng về cụm bàn phím trên Dell Gaming G15 5515 , với hành trình phím đặc trưng, đem lại trải nghiệm gaming tuyệt đối, đi kèm với layouts được bố trí rất hợp lý, ngoài ra, nhà sản xuất Mỹ cũng trang bị trên cụm bàn phím này cả cụm numpad cực kỳ tiện lợi nên nhìn chung, cụm bàn phím Dell Gaming G15 5515 đem lại trải nghiệm gần như hoàn hảo với tất cả những tác vụ của game thủ nói riêng và người dùng phổ thông nói chung.\r\n\r\nNgoài ra, với kích thước lớn, đi kèm với khả năng tracking chính xác, touchpad trên Dell Gaming G15 5515 cũng đem lại trải nghiệm rất tốt đối với tất cả những nhu cầu mà người dùng có thể làm được trên nó.\r\n\r\nLaptop Dell Gaming G5 5515 3\r\n\r\nHiệu năng mạnh khủng khiếp\r\n\r\nVới CPU Intel thế hệ 11 với card đồ hoạ NVIDIA Geforce RTX 3000, RAM DDR4 bus 3200MHz và SSD m.2 NVMe, không khó để Dell Gaming G15 5515 có thể chơi được gần như tất cả những tựa game nặng nhất trên thị trường hiện nay với thiết lập đồ hoạ hợp lý, từ Cyberpunk 2077 cho đến Tomb Rider, không gì là không thể trên Dell Gaming G15 5515\r\n\r\nSự ổn định về hiệu suất hoạt động trong thời gian dài của hệ thống phần cứng này vô hình chung đã biến Dell Gaming G15 5515 trở thành chiếc gaming laptop có khả năng làm được những tác vụ media bán chuyên mà không gặp phải trở ngại nào quá lớn.\r\n\r\nLaptop Dell Gaming G5 5515 4\r\n\r\nCổng kết nối cực kỳ đầy đủ\r\n\r\nVới việc được trang bị  hai cổng USB-A 2.0,  một cổng USB-A 3.2 Gen 1, một cổng USB-C 3.2 Gen 1 tích hợp DisplayPort, HDMI 2.1, jack tai nghe 3.5mm và một cổng RJ-45, Dell Gaming G15 5510 hoàn toàn có khả năng kết nối được với tất cả những phụ kiện gaming để hỗ trợ bạn tối đa trong quá trình trải nghiệm cùng một lúc. Dell Gaming G và những chiếc G15 5515 luôn hỗ trợ bạn rất tốt trong việc kết nối, các bạn hoàn toàn không phải lo về vấn đề thiếu cổng hay phải mua thêm dongle trong quá trình trải nghiệm Dell Gaming G15 5515\r\n\r\nVà đó là Dell Gaming G15 5515 – được mệnh danh là Alienware tầm trung đến từ nhà Dell. Với thiết kế mang đậm DNA của những chiếc Alienware cao cấp nhất, đi kèm với những sự đổi mới đến từ hệ thống phần cứng cùng với hiệu suất hoạt động mạnh mẽ nhưng lại vô cùng ổn định trong thời gian dài sử dụng, Dell Gaming G15 5515 xứng đáng là sự lựa chọn số một trong phân khúc gaming laptop trung cấp hiện nay!', '1641631873.jpg', NULL, 26000000, 11, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `CK_menu` (`menu_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CK_customer_id` (`customer_id`),
  ADD KEY `CK_employee_id` (`employee_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CK_manufacturer_id` (`manufacturer_id`),
  ADD KEY `CK_menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD CONSTRAINT `CK_menu` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `CK_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `CK_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `CK_manufacturer_id` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufactures` (`id`),
  ADD CONSTRAINT `CK_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
