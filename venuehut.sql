-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 04:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venuehut`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `user_name`, `Password`, `Address`, `image`) VALUES
(2, 'demo', '$2y$10$eI0MZX/FvYTqo1DsE.OMqupNjnbttWB.YbZxQ1/ks781rSPDQNA76', 'demo', NULL),
(3, 'demo123', '$2y$10$X1juQCCfSkBUeuJk2Pwuv.EFEIKM0PGabXxESOCHQND8hZEeoX2I2', 'demo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookvenue`
--

CREATE TABLE `bookvenue` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `venue_name` text NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `booked_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookvenue`
--

INSERT INTO `bookvenue` (`booking_id`, `user_id`, `venue_id`, `venue_name`, `payment_status`, `booked_on`) VALUES
(1, 9, 13, 'Ballroom 1 of Royal Moments', 'Pending', '2021-07-02 19:33:00'),
(2, 9, 18, 'Ground Floor of The Metro Star', 'Pending', '2021-07-02 19:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_Id` int(11) NOT NULL,
  `service_name` varchar(30) NOT NULL,
  `service_description` varchar(255) NOT NULL,
  `service_Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_Id`, `service_name`, `service_description`, `service_Image`) VALUES
(5, 'Birthday Party', 'we provide the perfect setting for your birthday party event. We can host events in a variety of settings, from our fireside dining and library areas to our lawn and terrace with breathtaking views.', '20778-photo-1535254973040-607b474cb50d.jpg'),
(6, 'Corporate event', 'we provide the perfect setting for your corporate retreat event. We can host events in a variety of settings, from our fireside dining and library areas to our lawn and terrace with breathtaking views.', '67071-photo-1519167758481-83f550bb49b3.jpg'),
(7, 'Conference', 'we provide the perfect setting for your conferences. We can host events in a variety of settings, from our fireside dining and library areas to our lawn and terrace with breathtaking views.', '78717-photo-1551818255-e6e10975bc17.jpg'),
(8, 'Wedding', 'we provide the perfect setting for your wedding, corporate retreat, or private event. We can host events in a variety of settings, from our fireside dining and library areas to our lawn and terrace with breathtaking views.', '78828-photo-1513278974582-3e1b4a4fa21e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `verification_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `status`, `verification_code`) VALUES
(9, 'harry', '$2y$10$uz.9HumAiDDCH3aTxWQJo.joHuiEO.4MYujPbHHfCnDkgYufvvg4i', 'hitecar391@advew.com', 'ENABLE', '6b8e4dd738f82d43047f53cbe75ce086');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venue_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_Id` int(11) NOT NULL,
  `venue_name` varchar(30) NOT NULL,
  `venue_location` varchar(100) NOT NULL,
  `venue_description` text NOT NULL,
  `venue_image` varchar(255) NOT NULL,
  `venue_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `user_id`, `service_Id`, `venue_name`, `venue_location`, `venue_description`, `venue_image`, `venue_price`) VALUES
(2, 2, 8, 'Fork & Spoon', 'Fork & Spoon in Sector 22, Noida.', 'Fork & Spoon is best for events in Sector 22, Noida. Fork &amp; Spoon has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venueLook.com. Go ahead and make an inquiry for ', '37106-1618733878_595x400.webp', '400 per person'),
(10, 2, 8, 'The Ballroom of P K Boutique H', 'The Ballroom of P K Boutique Hotel in Sector 104, Noida', 'The Ballroom at P K Boutique Hotel is best for events in Sector 104, Noida. The Ballroom at P K Boutique Hotel has best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venueLook.c', '3881-1599296258_595x400.png', '800 per person'),
(11, 2, 8, 'Combined of The Ritvaan', 'Combined of The Ritvaan in Sector 49, Noida', 'Combined at The Ritvaan is best for events in Sector 49, Noida. Combined at The Ritvaan has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venueLook.com. Go ahead and ma', '57102-1612518383_595x400.png', '1100  per person'),
(12, 2, 8, 'Amaryllis Banquet', 'Amaryllis Banquet in Indirapuram, Ghaziabad', 'Amaryllis Banquet is best for events in Indirapuram, Ghaziabad. Amaryllis Banquet has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venueLook.com. Go ahead and make an ', '47828-1565347906_595x400.png', '700 per person'),
(13, 2, 5, 'Ballroom 1 of Royal Moments', 'Ballroom 1 of Royal Moments in Kirti Nagar, Delhi', 'Ballroom 1 at Royal Moments is best for events in Kirti Nagar, Delhi. Ballroom 1 at Royal Moments has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venueLook.com. Go ah', '18845-1616509435_595x400.webp', '1000 per person'),
(14, 2, 5, 'Ardor 2.1 Restaurant & Lounge', 'Ardor 2.1 Restaurant & Lounge in Connaught Place, Delhi', 'Ardor 2.1 Restaurant &amp; Lounge is best for events in Connaught Place, Delhi. Ardor 2.1 Restaurant &amp; Lounge has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venu', '46852-1423465994_595x400.png', '850 per person'),
(15, 2, 5, 'Banquet Hall 3 of Precious Mom', 'Banquet Hall 3 of Precious Moments Banquet in Janak Puri, Delhi', 'Banquet Hall 3 at Precious Moments Banquet is best for events in Janak Puri, Delhi. Banquet Hall 3 at Precious Moments Banquet has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, re', '37629-1493979735_595x400.png', '1000 per person'),
(16, 2, 5, 'Banquet Hall of Goodwill Hotel', 'Banquet Hall of Goodwill Hotel in Greater Kailash, Delhi', 'Banquet Hall at Goodwill Hotel is best for events in Greater Kailash, Delhi. Banquet Hall at Goodwill Hotel has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venueLook.', '89378-1485591698_595x400.png', '800 per person'),
(17, 2, 6, 'Ardor 2.1 Restaurant Lounge', 'Ardor 2.1 Restaurant & Lounge in Connaught Place, Delhi', 'Ardor 2.1 Restaurant &amp; Lounge is best for events in Connaught Place, Delhi. Ardor 2.1 Restaurant &amp; Lounge has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venu', '82511-1436857475_595x400.png', '850 per person'),
(18, 2, 6, 'Ground Floor of The Metro Star', 'Ground Floor of The Metro Star Hotel in Jasola, Delhi', 'Ground Floor at The Metro Star Hotel is best for events in Jasola, Delhi. Ground Floor at The Metro Star Hotel has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venueLo', '10519-1599462788_595x400.webp', '700 per person'),
(19, 2, 6, 'Hall II of The Grand Horizon B', 'Hall II of The Grand Horizon Banquet in Moti Nagar, Delhi', 'Hall II at The Grand Horizon Banquet is best for events in Moti Nagar, Delhi. Hall II at The Grand Horizon Banquet has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at ven', '56040-1551171612_595x400.png', '1600  per person'),
(20, 2, 6, 'Astoria II of Tivoli Royal Cou', 'Astoria II of Tivoli Royal Court in Okhla, Delhi', 'Astoria II at Tivoli Royal Court is best for events in Okhla, Delhi. Astoria II at Tivoli Royal Court has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venueLook.com. G', '21523-1551785986_595x400.png', '1400  per person'),
(21, 2, 7, 'Conference Ⅰ of Vesta Internat', 'Conference Ⅰ of Vesta International in Gopal Bari, Jaipur', 'Conference Ⅰ at Vesta International is best for events in Gopal Bari, Jaipur. Conference Ⅰ at Vesta International has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venu', '77236-1483948863_595x400.png', '1000 per person'),
(22, 2, 7, 'MLR of The Fern', 'MLR of The Fern in Tonk Road, Jaipur', 'MLR at The Fern is best for events in Tonk Road, Jaipur. MLR at The Fern has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venueLook.com. Go ahead and make an inquiry f', '59027-1470991183_595x400.png', '850 per person'),
(23, 2, 7, 'Conference Hall of Hotel Natra', 'Conference Hall of Hotel Natraj in M.I. Road, Jaipur', 'Conference Hall at Hotel Natraj is best for events in M.I. Road, Jaipur. Conference Hall at Hotel Natraj has the best spaces to suit different occasions and celebrations. You can get contact details, event packages, rental prices, reviews at venueLook.com', '96149-1474114248_595x400.png', '450 per person'),
(24, 2, 7, 'Banquet  & Conference Hall of ', 'Banquet  & Conference Hall of Hotel Siddharth Palace in Malviya Nagar, Jaipur', 'Banquet  &amp; Conference Hall at Hotel Siddharth Palace is best for events in Malviya Nagar, Jaipur. Banquet  &amp; Conference Hall at Hotel Siddharth Palace has the best spaces to suit different occasions and celebrations. You can get contact details, e', '18602-1471340211_595x400.webp', '350 per person');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `bookvenue`
--
ALTER TABLE `bookvenue`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venue_id`),
  ADD KEY `Service_ID` (`service_Id`),
  ADD KEY `user_ID` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookvenue`
--
ALTER TABLE `bookvenue`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `venues`
--
ALTER TABLE `venues`
  ADD CONSTRAINT `Service_ID` FOREIGN KEY (`service_Id`) REFERENCES `services` (`service_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`user_id`) REFERENCES `admin_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
