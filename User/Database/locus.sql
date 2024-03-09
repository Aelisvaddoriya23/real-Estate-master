-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 03:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locus`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`) VALUES
(14, 'Some Information From Our Background', '<p>At Locus Property Management Realty, our mission is to provide our clients with exceptional service, expert advice, and personalized attention throughout the buying or selling process. We have been serving the local community for over 20 years and have a deep understanding of the real estate market in the area. Our team of experienced agents is passionate about helping clients achieve their real estate goals, whether that means finding the perfect home or maximizing the value of their investment property. We are dedicated to providing a stress-free and enjoyable experience for our clients, and we are committed to transparency, honesty, and integrity in all of our dealings.</p>', 'image (12).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mno` text NOT NULL,
  `dob` date DEFAULT NULL,
  `img` text NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `password`, `email`, `mno`, `dob`, `img`) VALUES
(6, 'Admin', '$2y$10$Evrz/CzDNmwvjnJj67sBBuuS14jlPu6XyPHxUuEt1llHP.0b/wBbe', 'admin@gmail.com', '8980750691', '2002-12-31', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `response` longtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `fid` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`fid`, `uid`, `name`, `email`, `message`, `status`) VALUES
(80, 62, 'Jaimil', 'jaimilkanejeeya630@gmail.com', 'The user interface is user-friendly and easy to navigate, making it simple to find what you re looking for', 1),
(82, 60, 'Chirag', 'chiragkachhadiya000@gmail.com', 'The websites search functionality is efficient and effective, allowing users to quickly filter and sort properties to find the perfect match', 1),
(85, 61, 'Harsh Munjpara', 'harshmunjapara005@gmail.com', 'The property listings are comprehensive and detailed, providing all the necessary information and images to make an informed decision', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblhouse`
--

CREATE TABLE `tblhouse` (
  `pid` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `ptitle` longtext NOT NULL,
  `ptype` varchar(250) NOT NULL,
  `bhk` varchar(100) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `bedroom` int(100) NOT NULL,
  `balcony` int(100) NOT NULL,
  `bathroom` int(100) NOT NULL,
  `kitchen` int(100) NOT NULL,
  `hall` int(100) NOT NULL,
  `floor` int(100) NOT NULL,
  `tfloor` int(100) NOT NULL,
  `price` int(250) NOT NULL,
  `sqft` varchar(250) NOT NULL,
  `paddress` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `img1` varchar(250) NOT NULL,
  `img2` varchar(250) NOT NULL,
  `img3` varchar(250) NOT NULL,
  `img4` varchar(250) NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL DEFAULT 'Active',
  `featured` longtext NOT NULL,
  `description` text NOT NULL,
  `facilities` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `qc` enum('Pending','Reject','Success','') NOT NULL DEFAULT 'Pending',
  `response` varchar(255) NOT NULL DEFAULT 'Your Listing Is Live...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblhouse`
--

INSERT INTO `tblhouse` (`pid`, `uid`, `ptitle`, `ptype`, `bhk`, `stype`, `bedroom`, `balcony`, `bathroom`, `kitchen`, `hall`, `floor`, `tfloor`, `price`, `sqft`, `paddress`, `city`, `state`, `img1`, `img2`, `img3`, `img4`, `status`, `featured`, `description`, `facilities`, `date`, `qc`, `response`) VALUES
(165, 60, 'Beautifully Designed and Spacious Four-Bedroom House with Stunning Views', 'House', '4', 'Rent', 4, 3, 5, 1, 1, 2, 2, 29999, '1500', '49 md park socity simada gam ', 'Surat', 'Gujarat', 'vu-anh-TiVPTYCG_3E-unsplash (1).jpg', 'spacejoy-IARlbQa6Kc8-unsplash.jpg', 'jakob-owens-XKLZia7hPYI-unsplash.jpg', 'alberto-castillo-q-mx4mSkK9zeo-unsplash.jpg', 'Active', 'Yes', '<p>Welcome to this stunning 4-bedroom house located in the heart of a quiet and peaceful neighborhood. This beautifully designed home boasts a spacious living room with large windows offering stunning views of the surrounding mountains and natural landscapes.</p>\r\n<p>The open-plan kitchen is fully equipped with high-end appliances and a large island, making it perfect for entertaining guests. The dining area opens up to a private deck, where you can enjoy your morning coffee while taking in the breathtaking views.</p>\r\n<p>All four bedrooms are located on the upper level and are generously sized, offering plenty of natural light and space for your family to grow. The master bedroom has its own ensuite bathroom, walk-in closet, and private balcony overlooking the picturesque scenery.</p>', '<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Maintanace : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Wifi Plan : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>', '2023-04-17 11:24:41', 'Success', 'Your Listing Is Live...'),
(167, 60, 'Luxurious Five-Bedroom Penthouse with Stunning City ', 'Pent-House', '5', 'Rent', 5, 6, 6, 1, 2, 3, 3, 69999, '1500', 'A-504 Raghuveer Heights VIP Road Vesu ', 'Surat', 'Gujrat', 'jennifer-r-sZ9F_XkGJfI-unsplash.jpg', 'drew-dau-bWijQI4v0dM-unsplash.jpg', 'lisa-reichenstein-P_FdMYiT7GU-unsplash.jpg', 'r-architecture-TRCJ-87Yoh0-unsplash.jpg', 'Active', '', '<p>Welcome to this luxurious 5-bedroom penthouse located in the heart of the city. As you enter, you will be greeted by a grand foyer that leads into a spacious and elegant living room with floor-to-ceiling windows offering stunning views of the city skyline.</p>\r\n<p>The open-plan kitchen is fully equipped with high-end appliances and features a large island, making it perfect for entertaining guests. The dining area is spacious and offers plenty of room for a large table, perfect for hosting dinner parties.</p>', '<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Maintanace : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Wifi Plan : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>', '2023-04-17 11:33:56', 'Success', 'Your Listing Is Live...'),
(168, 60, 'Charming and Cozy Two-Bedroom Cottage with a Beautiful Garden', 'Banglow', '2', 'Sell', 2, 2, 3, 1, 1, 2, 2, 1500000, '1500', 'A-504 Happy Homes Near VR Mall , Vesu ', 'Surat', 'Gujarat', 'brie-odom-mabey-ITzfgP77DTg-unsplash.jpg', 'sidekix-media-NTH9ZZcUih8-unsplash.jpg', 'john-fornander-y3_AHHrxUBY-unsplash (1).jpg', 'lisa-reichenstein-P_FdMYiT7GU-unsplash.jpg', 'Active', 'Yes', '<p>This charming and cozy 2-bedroom cottage is located in a quiet and peaceful neighborhood and is perfect for those looking for a private retreat. As you enter, you will be greeted by a warm and inviting living room with a wood-burning fireplace, perfect for relaxing on chilly nights.</p>\r\n<p>The kitchen is fully equipped with all the necessary appliances, and the dining area is perfect for enjoying a meal with family and friends. The cottage has two well-appointed bedrooms, both with comfortable beds and plenty of closet space.</p>', '<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Maintanace : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Wifi Plan : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>', '2023-04-17 11:54:58', 'Success', 'Your Listing Is Live...'),
(169, 60, 'Spacious and Modern Four-Bedroom Family Home with Large Farm House', 'Farm-House', '3', 'Sell', 3, 2, 4, 1, 1, 2, 2, 3500000, '500', '12 Blue Horizon , Utran Road , Utran', 'Surat', 'Gujarat', 'john-fornander-tVzyDSV84w8-unsplash.jpg', 'john-fornander-y3_AHHrxUBY-unsplash (1).jpg', 'sidekix-media-RwXneIyqxAw-unsplash.jpg', 'lisa-reichenstein-P_FdMYiT7GU-unsplash.jpg', 'Active', 'Yes', '<p>This spacious and modern 4-bedroom home is perfect for families. It features a large living room, an open-plan kitchen with stainless steel appliances, and a dining area that leads out to a huge backyard. The property also includes a two-car garage and is conveniently located near schools and parks.</p>\r\n<p>This spacious and modern 4-bedroom home is perfect for families. It features a large living room, an open-plan kitchen with stainless steel appliances, and a dining area that leads out to a huge backyard. The property also includes a two-car garage and is conveniently located near schools and parks.</p>', '<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Maintanace : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Wifi Plan : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>', '2023-04-17 12:02:02', 'Reject', 'Image Not Proper'),
(170, 61, 'Stunning Two-Bedroom Condo with Ocean Views', 'House', '2', 'Rent', 2, 3, 3, 1, 1, 1, 1, 9999, '1859', '99 Nilkanth Dham Soc , Nikol Gam', 'Ahemdabad', 'Gujarat', 'ralph-ravi-kayden-2d4lAQAlbDA-unsplash.jpg', 'kara-eads-L7EwHkq1B2s-unsplash.jpg', 'eric-deschaintre-alSZkWagD54-unsplash.jpg', 'spacejoy-nEtpvJjnPVo-unsplash.jpg', 'Active', 'Yes', '<p>This stunning 2-bedroom condo is located in a prestigious building with views of the ocean. It features a spacious living room with a fireplace, a gourmet kitchen, and a dining area that leads out to a balcony with breathtaking views. The property also includes a fitness center, a pool, and 24-hour security.</p>\r\n<p>This charming and cozy 1-bedroom apartment is located in the heart of the city. It features a comfortable living room, a well-equipped kitchen, and a bedroom with a queen-sized bed. The property is within walking distance of shops, restaurants, and public transportation.</p>', '<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Maintanace : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Wifi Plan : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>', '2023-04-17 12:11:45', 'Success', 'Your Listing Is Live...'),
(171, 61, 'Modern and Stylish Three-Bedroom Townhome with Rooftop Terrace', 'Banglow', '4', 'Rent', 4, 5, 4, 2, 2, 1, 1, 19999, '345', '101 Ramnath Soc Bapunagar gam ', 'Ahemdabad', 'Gujarat', 'r-architecture-2gDwlIim3Uw-unsplash.jpg', 'dim-hou-h8wLc3lbDuA-unsplash.jpg', 'roberto-nickson-fAa25CyYtrg-unsplash.jpg', 'sidekix-media-VD8kjWCzQyw-unsplash.jpg', 'Active', 'Yes', '<p>This modern and stylish 3-bedroom townhome features an open-plan living and dining area, a gourmet kitchen with stainless steel appliances, and a rooftop terrace with stunning views. The property also includes a two-car garage and is located in a desirable neighborhood close to schools and parks.</p>', '<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Maintanace : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Wifi Plan : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>', '2023-04-17 12:18:25', 'Success', 'Your Listing Is Live...'),
(172, 61, 'Spectacular Five-Bedroom Mansion with Pool and Tennis Court', 'Pent-House', '5', 'Sell', 6, 5, 5, 2, 2, 1, 1, 9600000, '21500', 'A-504 Raghuveer Heights  Aostral ', 'Ahemdabad', 'Gujarat', 'brie-odom-mabey-ITzfgP77DTg-unsplash.jpg', 'ralph-ravi-kayden-mR1CIDduGLc-unsplash.jpg', 'dim-hou-h8wLc3lbDuA-unsplash.jpg', 'infinite-views-79NjpXDOJU8-unsplash.jpg', 'Active', 'Yes', '<p>This spectacular 5-bedroom mansion is situated on a sprawling estate with a pool, tennis court, and lush gardens. It features a grand foyer, a formal living room with a fireplace, a gourmet kitchen, and a luxurious master suite with a spa-like bathroom. The property is ideal for those who value privacy and luxury.</p>', '<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Maintanace : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Wifi Plan : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>', '2023-04-17 12:22:49', 'Success', 'Your Listing Is Live...'),
(173, 61, 'Cozy and Inviting two-Bedroom Cabin in the Woods', 'Farm-House', '2', 'Rent', 2, 2, 3, 1, 1, 1, 1, 12999, '1500', '101 ,  Krishna Soc , VIP Road ', 'Ahemdabad', 'Gujarat', 'ralph-ravi-kayden-2d4lAQAlbDA-unsplash.jpg', 'francesca-tosolini-hCU4fimRW-c-unsplash.jpg', 'bernard-hermant-CLKGGwIBTaY-unsplash.jpg', 'infinite-views-79NjpXDOJU8-unsplash.jpg', 'Active', 'Yes', '<p>This cozy and inviting 2-bedroom cabin is nestled in the woods and is perfect for those who love the outdoors. It features a living room with a wood-burning stove, a kitchen with all the necessary appliances, and a spacious deck for outdoor entertaining. The property is within close proximity to hiking and biking trails.</p>', '<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Maintanace : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Wifi Plan : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>', '2023-04-17 12:27:36', 'Success', 'Your Listing Is Live...'),
(174, 62, ' Elegant and Sophisticated Four-Bedroom Colonial Home with Pool', 'House', '4', 'Rent', 4, 4, 4, 1, 1, 1, 1, 12100, '76544', '49 Tirupati socity simada gam ', 'Vadodara', 'Gujarat', 'lisa-reichenstein-P_FdMYiT7GU-unsplash.jpg', 'roberto-nickson-fAa25CyYtrg-unsplash.jpg', 'point3d-commercial-imaging-ltd-xqlHYzU7WAY-unsplash.jpg', 'infinite-views-79NjpXDOJU8-unsplash.jpg', 'Active', 'Yes', '<p>This elegant and sophisticated 4-bedroom colonial home is located in a desirable neighborhood and features a formal living room, a family room with a fireplace, a gourmet kitchen, and a stunning pool area. The property also includes a two-car garage and is within close proximity to shopping and dining.</p>', '<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Maintanace : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Wifi Plan : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>', '2023-04-17 12:38:15', 'Success', 'Your Listing Is Live...'),
(175, 62, 'Rustic and Charming three-Bedroom Farmhouse with Acreage', 'House', '3', 'Sell', 3, 3, 4, 1, 1, 1, 1, 2300100, '1200', '49 AB park Soc chopati ', 'Vadodara', 'Gujarat', 'bernard-hermant-CLKGGwIBTaY-unsplash.jpg', 'jakob-owens-XKLZia7hPYI-unsplash.jpg', 'jakob-owens-XKLZia7hPYI-unsplash.jpg', 'sidekix-media-hmz7nC5mEu4-unsplash.jpg', 'Active', 'Yes', '<p>This rustic and charming 3-bedroom farmhouse is situated on a sprawling acreage and features a cozy living room with a fireplace, a kitchen with a breakfast nook, and a large outdoor patio for entertaining. The property also includes a barn and is perfect for those who love the outdoors and country living.</p>', '<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Maintanace : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Wifi Plan : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>', '2023-04-17 12:40:44', 'Success', 'Your Listing Is Live...'),
(176, 62, 'Stunning two-Bedroom Loft with Exposed Brick and High Ceilings', 'Flat', '2', 'Sell', 2, 2, 3, 1, 1, 1, 12, 1000000, '2199', '1001 Shree Devi Soc', 'Vadodara', 'Gujarat', 'greg-rivers-rChFUMwAe7E-unsplash.jpg', 'mostafa-safadel-cHjAxnJk_wQ-unsplash.jpg', 'eric-deschaintre-alSZkWagD54-unsplash.jpg', 'jonathan-borba-N3z-oIHLL3w-unsplash.jpg', 'Active', 'Yes', '<p>This stunning 2-bedroom loft is located in a historic building and features exposed brick, high ceilings, and large windows that flood the space with natural light. It also includes a gourmet kitchen, a dining area, and a rooftop terrace with city views.</p>', '<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Maintanace : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Wifi Plan : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-black fw-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>', '2023-04-17 12:43:57', 'Success', 'Your Listing Is Live...');

-- --------------------------------------------------------

--
-- Table structure for table `tblpbooking`
--

CREATE TABLE `tblpbooking` (
  `bid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `seller_id` int(255) NOT NULL,
  `buyer_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cindate` varchar(255) NOT NULL,
  `coutdate` varchar(255) NOT NULL,
  `bdate` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Success','Reject') NOT NULL DEFAULT 'Pending',
  `details` longtext NOT NULL,
  `reason` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpbooking`
--

INSERT INTO `tblpbooking` (`bid`, `name`, `pid`, `seller_id`, `buyer_id`, `email`, `cindate`, `coutdate`, `bdate`, `status`, `details`, `reason`) VALUES
(82, 'Jaimil', 165, 60, 62, 'jaimilkanejeeya630@gmail.com', '2023-04-25', '2023-06-29', '2023-04-17', 'Success', 'I want to property for children ', 'Deal Done'),
(83, 'Harsh Munjpara', 165, 60, 61, 'harshmunjapara005@gmail.com', '2023-06-23', '2023-08-25', '2023-04-17', 'Success', 'I Want to this property  ', 'Deal Done...');

-- --------------------------------------------------------

--
-- Table structure for table `tblplan`
--

CREATE TABLE `tblplan` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `p_price` int(250) NOT NULL,
  `p_credit` int(250) NOT NULL,
  `p_description` varchar(250) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblplan`
--

INSERT INTO `tblplan` (`p_id`, `p_name`, `p_price`, `p_credit`, `p_description`, `date`) VALUES
(16, 'Basic', 199, 1, '<ul>\r\n<li style=\"text-align: left;\">This Is A <strong>Basic</strong> Plan</li>\r\n<li style=\"text-align: left;\">You Will Get <strong>1&nbsp;</strong>Credit</li>\r\n</ul>', '2023-04-17'),
(17, 'Standard', 499, 3, '<ul>\r\n<li style=\"text-align: left;\">This is <strong>Standard</strong> Plan</li>\r\n<li style=\"text-align: left;\">You Will Get <strong>3&nbsp;</strong>Credit</li>\r\n</ul>', '2023-04-17'),
(18, 'Premium', 999, 7, '<ul>\r\n<li style=\"text-align: left;\">This is <strong>Premium</strong> Plan</li>\r\n<li style=\"text-align: left;\">You Will Get <strong>7 </strong>Credit</li>\r\n</ul>', '2023-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `tblpmt`
--

CREATE TABLE `tblpmt` (
  `pmid` int(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `pstatus` varchar(255) NOT NULL DEFAULT 'Paid',
  `pmtid` varchar(255) NOT NULL,
  `amt` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `p_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpmt`
--

INSERT INTO `tblpmt` (`pmid`, `uid`, `p_id`, `pstatus`, `pmtid`, `amt`, `date`, `p_name`) VALUES
(48, 60, 16, 'Paid', 'pay_LeqgEYVvVvVutS', 199, '2023-04-17 11:52:33', 'Basic'),
(49, 60, 16, 'Paid', 'pay_LeqkzpyehZcaBS', 199, '2023-04-17 11:57:06', 'Basic'),
(50, 61, 16, 'Paid', 'pay_LerDMtC0DUHPls', 199, '2023-04-17 12:23:57', 'Basic');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(250) NOT NULL,
  `mno` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `credit` int(250) NOT NULL DEFAULT 3,
  `img` varchar(250) DEFAULT 'user.png',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `mno`, `email`, `password`, `address`, `credit`, `img`, `date`) VALUES
(60, 'Chirag', '8980750691', 'chiragkachhadiya000@gmail.com', '$2y$10$Mro.2ioRaERVIG5raDVCd.vkoBtEs5gwJvU5eGVYkA8z7Mc59yScy', '49 MD Park Socity Simada Gam', 1, '643d264c6cd811641226494390.jpg', '2023-04-17'),
(61, 'Harsh Munjpara', '8238273464', 'harshmunjapara005@gmail.com', '$2y$10$S34OkgslYCrWpIN0mXdmku7h7Zjgz5/K4gAvPBeiiYxpdnJ9K8FTe', 'Jamna Nagar Soc. , Bapunagar , Ahmedabad', 0, '643d3669d9f5dScreenshot 2023-04-17 173642.png', '2023-04-17'),
(62, 'Jaimil', '8238378852', 'jaimilkanejeeya630@gmail.com', '$2y$10$nMwqerMiy6uKztYXPYiBpuFx/861q58p/m55AYxPm4zI1MnM7KIai', 'Ramnath Soc , Vadodara , Gujarat', 0, '643d3cbc56c9bJaimil.jpg', '2023-04-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `tblhouse`
--
ALTER TABLE `tblhouse`
  ADD PRIMARY KEY (`pid`);
ALTER TABLE `tblhouse` ADD FULLTEXT KEY `ptitle` (`ptitle`,`paddress`,`state`,`city`,`description`,`facilities`);

--
-- Indexes for table `tblpbooking`
--
ALTER TABLE `tblpbooking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `tblplan`
--
ALTER TABLE `tblplan`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tblpmt`
--
ALTER TABLE `tblpmt`
  ADD PRIMARY KEY (`pmid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `fid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tblhouse`
--
ALTER TABLE `tblhouse`
  MODIFY `pid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `tblpbooking`
--
ALTER TABLE `tblpbooking`
  MODIFY `bid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tblplan`
--
ALTER TABLE `tblplan`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblpmt`
--
ALTER TABLE `tblpmt`
  MODIFY `pmid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
