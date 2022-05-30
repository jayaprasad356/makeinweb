-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 07:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earn_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_income`
--

CREATE TABLE `daily_income` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `purchased_id` int(11) NOT NULL,
  `credited_amount` double DEFAULT NULL,
  `credited_date` text DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_income`
--

INSERT INTO `daily_income` (`id`, `user_id`, `plan_id`, `purchased_id`, `credited_amount`, `credited_date`, `last_updated`, `date_created`) VALUES
(55, 13, 1, 1, 30, '2022-04-15', NULL, '2022-04-15 08:14:58'),
(56, 13, 2, 2, 65, '2022-03-11', NULL, '2022-04-15 08:14:58'),
(57, 13, 2, 2, 65, '2022-03-12', NULL, '2022-04-15 08:14:58'),
(58, 13, 2, 2, 65, '2022-03-13', NULL, '2022-04-15 08:14:58'),
(59, 13, 2, 2, 65, '2022-03-14', NULL, '2022-04-15 08:14:58'),
(60, 13, 2, 2, 65, '2022-03-15', NULL, '2022-04-15 08:14:58'),
(61, 13, 2, 2, 65, '2022-03-16', NULL, '2022-04-15 08:14:58'),
(62, 13, 2, 2, 65, '2022-03-17', NULL, '2022-04-15 08:14:58'),
(63, 13, 2, 2, 65, '2022-03-18', NULL, '2022-04-15 08:14:58'),
(64, 13, 2, 2, 65, '2022-03-19', NULL, '2022-04-15 08:14:58'),
(65, 13, 2, 2, 65, '2022-03-20', NULL, '2022-04-15 08:14:58'),
(66, 13, 1, 1, 30, '2022-04-16', NULL, '2022-04-26 03:10:32'),
(67, 13, 1, 1, 30, '2022-04-17', NULL, '2022-04-26 03:10:32'),
(68, 13, 1, 1, 30, '2022-04-18', NULL, '2022-04-26 03:10:32'),
(69, 13, 1, 1, 30, '2022-04-19', NULL, '2022-04-26 03:10:32'),
(70, 13, 1, 1, 30, '2022-04-20', NULL, '2022-04-26 03:10:32'),
(71, 13, 1, 1, 30, '2022-04-21', NULL, '2022-04-26 03:10:32'),
(72, 13, 1, 1, 30, '2022-04-22', NULL, '2022-04-26 03:10:32'),
(73, 13, 1, 1, 30, '2022-04-23', NULL, '2022-04-26 03:10:32'),
(74, 13, 1, 1, 30, '2022-04-24', NULL, '2022-04-26 03:10:32'),
(75, 13, 1, 1, 30, '2022-04-25', NULL, '2022-04-26 03:10:32'),
(76, 13, 1, 3, 30, '2022-04-16', NULL, '2022-04-26 03:10:32'),
(77, 13, 1, 3, 30, '2022-04-17', NULL, '2022-04-26 03:10:32'),
(78, 13, 1, 3, 30, '2022-04-18', NULL, '2022-04-26 03:10:32'),
(79, 13, 1, 3, 30, '2022-04-19', NULL, '2022-04-26 03:10:32'),
(80, 13, 1, 3, 30, '2022-04-20', NULL, '2022-04-26 03:10:32'),
(81, 13, 1, 3, 30, '2022-04-21', NULL, '2022-04-26 03:10:32'),
(82, 13, 1, 3, 30, '2022-04-22', NULL, '2022-04-26 03:10:32'),
(83, 13, 1, 3, 30, '2022-04-23', NULL, '2022-04-26 03:10:32'),
(84, 13, 1, 3, 30, '2022-04-24', NULL, '2022-04-26 03:10:32'),
(85, 13, 1, 3, 30, '2022-04-25', NULL, '2022-04-26 03:10:32'),
(86, 13, 1, 1, 30, '2022-04-26', NULL, '2022-04-26 11:57:47'),
(87, 13, 1, 3, 30, '2022-04-26', NULL, '2022-04-26 11:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `earn_settings`
--

CREATE TABLE `earn_settings` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `account_number` text DEFAULT NULL,
  `ifsc_code` text DEFAULT NULL,
  `bank_name` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `upi_id` text DEFAULT NULL,
  `minimum_setting` text DEFAULT NULL,
  `recharge_setting` text DEFAULT NULL,
  `service_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `earn_settings`
--

INSERT INTO `earn_settings` (`id`, `title`, `account_number`, `ifsc_code`, `bank_name`, `name`, `upi_id`, `minimum_setting`, `recharge_setting`, `service_link`) VALUES
(1, 'earn_settings', 'TY567890', '', '', 'Divakar A', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daily_income` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `valid` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `daily_income`, `price`, `valid`, `image`, `last_updated`, `date_created`) VALUES
(1, 'Lava', 30, 600, 90, 'upload/images/1650944218.4368.jpg', '2022-04-26 03:36:58', '2022-04-12 13:26:24'),
(2, 'Micromax', 65, 1200, 90, 'upload/images/1650974495.2622.png', '2022-04-26 12:01:35', '2022-04-12 13:27:14'),
(3, 'Motorola', 130, 2400, 90, 'upload/images/1650974559.0376.jpg', '2022-04-26 12:02:39', '2022-04-12 13:28:05'),
(4, 'Vivo', 270, 5000, 90, 'upload/images/1650974607.4362.jpg', '2022-04-26 12:03:27', '2022-04-12 13:28:05'),
(5, 'Oppo', 450, 8000, 90, 'upload/images/1650974689.6308.jpg', '2022-04-26 12:04:49', '2022-04-12 13:26:24'),
(6, 'Realme', 800, 15000, 90, 'upload/images/1650974757.4974.png', '2022-04-26 12:05:57', '2022-04-12 13:27:14'),
(7, 'Xiaomi', 1300, 25000, 90, 'upload/images/1650974818.2144.png', '2022-04-26 12:06:58', '2022-04-12 13:28:05'),
(8, 'One Plus', 2100, 40000, 90, 'upload/images/1650974888.3539.png', '2022-04-26 12:08:08', '2022-04-12 13:28:05'),
(9, 'Asus Rog', 3200, 60000, 90, 'upload/images/1650974933.9191.jpg', '2022-04-26 12:08:53', '2022-04-12 13:28:05'),
(10, 'IPhone', 4200, 80000, 90, 'upload/images/1650975006.388.png', '2022-04-26 12:10:06', '2022-04-12 13:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_plans`
--

CREATE TABLE `purchased_plans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `daily_income` double NOT NULL,
  `price` double DEFAULT NULL,
  `valid` text DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `end_date` text DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchased_plans`
--

INSERT INTO `purchased_plans` (`id`, `user_id`, `plan_id`, `daily_income`, `price`, `valid`, `start_date`, `end_date`, `last_updated`, `date_created`) VALUES
(1, 13, 1, 30, 600, '90', '2022-04-14', '2022-07-14', '2022-04-15 06:21:34', '2022-04-15 04:33:44'),
(2, 13, 2, 65, 1200, '10', '2022-03-10', '2022-07-14', '2022-04-15 07:54:27', '2022-04-15 06:25:01'),
(3, 13, 1, 30, 600, '90', '2022-04-15', '2022-07-14', NULL, '2022-04-15 09:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `recharges`
--

CREATE TABLE `recharges` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `payment_type` text DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recharges`
--

INSERT INTO `recharges` (`id`, `user_id`, `amount`, `status`, `payment_type`, `last_updated`, `date_created`) VALUES
(2, 13, 100, 0, 'upi', '2022-04-16 21:09:26', '2022-04-12 19:31:13'),
(3, 13, 100, 1, 'upi', '2022-04-16 17:04:19', '2022-04-12 19:39:32'),
(4, 13, 100, 1, 'upi', NULL, '2022-04-12 19:39:49'),
(5, 13, 50, 1, 'upi', NULL, '2022-04-12 19:40:05'),
(6, 13, 500, 1, 'upi', '2022-04-13 14:07:44', '2022-04-13 14:06:14'),
(7, 13, 500, 1, 'upi', '2022-04-13 14:07:48', '2022-04-13 14:07:20'),
(8, 13, 500, 1, 'paytm', NULL, '2022-04-13 17:42:37'),
(9, 13, 500, 1, 'paytm', NULL, '2022-04-13 17:44:18'),
(10, 13, 500, 1, 'paytm', NULL, '2022-04-13 17:44:28'),
(11, 13, 200, 1, 'upi', NULL, '2022-04-15 04:33:37'),
(12, 13, 500, 1, 'paytm', NULL, '2022-04-15 06:24:40'),
(13, 13, 700, 1, 'paytm', NULL, '2022-04-15 06:24:56'),
(14, 13, 500, 1, 'paytm', NULL, '2022-04-15 09:02:32'),
(15, 13, 500, 1, 'paytm', NULL, '2022-04-15 09:14:54'),
(16, 13, 50, 1, 'upi', NULL, '2022-04-25 10:22:39'),
(17, 13, 50, 1, 'upi', NULL, '2022-04-25 10:28:59'),
(18, 13, 100, 1, 'upi', NULL, '2022-04-25 10:29:25'),
(19, 13, 1000, 1, 'upi', NULL, '2022-04-25 10:29:38'),
(20, 13, 1000, 1, 'upi', NULL, '2022-04-25 11:34:41'),
(21, 18, 1000, 1, 'upi', NULL, '2022-04-25 11:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `referral_bonus`
--

CREATE TABLE `referral_bonus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `referral_user_id` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `recharged_amount` float NOT NULL,
  `level_percentage` tinyint(4) NOT NULL,
  `bonus_amount` float DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral_bonus`
--

INSERT INTO `referral_bonus` (`id`, `user_id`, `referral_user_id`, `level`, `recharged_amount`, `level_percentage`, `bonus_amount`, `last_updated`, `date_created`) VALUES
(1, 13, 11, 1, 50, 4, NULL, NULL, '2022-04-25 10:22:39'),
(2, 13, 11, 1, 50, 4, 2, NULL, '2022-04-25 10:28:59'),
(3, 13, 11, 1, 100, 10, 10, NULL, '2022-04-25 10:29:25'),
(4, 13, 11, 1, 1000, 10, 100, NULL, '2022-04-25 10:29:38'),
(5, 18, 14, 1, 1000, 10, 100, NULL, '2022-04-25 11:35:33'),
(6, 18, 13, 2, 1000, 5, 50, NULL, '2022-04-25 11:35:33'),
(7, 18, 11, 3, 1000, 3, 30, NULL, '2022-04-25 11:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `refer_commission`
--

CREATE TABLE `refer_commission` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `level_1` int(11) NOT NULL,
  `level_2` int(11) NOT NULL,
  `level_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refer_commission`
--

INSERT INTO `refer_commission` (`id`, `title`, `level_1`, `level_2`, `level_3`) VALUES
(1, 'refer_commission', 10, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `variable` text NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `variable`, `value`) VALUES
(6, 'logo', 'logo.png'),
(9, 'privacy_policy', '<p><strong>Privacy Policy</strong></p>\r\n\r\n<p> \r\n<p>built the eCart app as a Free app. This SERVICE is provided by at no cost and is intended for use as is.</p>\r\n</p>\r\n\r\n<p>This page is used to inform visitors regarding my policies with the collection, use, and disclosure of Personal Information if anyone decided to use my Service.</p>\r\n\r\n<p>If you choose to use my Service, then you agree to the collection and use of information in relation to this policy. The Personal Information that I collect is used for providing and improving the Service. I will not use or share your information with anyone except as described in this Privacy Policy.</p>\r\n\r\n<p>The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at eCart unless otherwise defined in this Privacy Policy.</p>\r\n\r\n<p><strong>Information Collection and Use</strong></p>\r\n\r\n<p>For a better experience, while using our Service, I may require you to provide us with certain personally identifiable information. The information that I request will be retained on your device and is not collected by me in any way.</p>\r\n\r\n<p>The app does use third party services that may collect information used to identify you.</p>\r\n\r\n<p>Link to privacy policy of third party service providers used by the app</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.google.com/policies/privacy/\" target=\"_blank\">Google Play Services</a></li>\r\n	<li><a href=\"https://firebase.google.com/policies/analytics\" target=\"_blank\">Google Analytics for Firebase</a></li>\r\n	<li><a href=\"https://firebase.google.com/support/privacy/\" target=\"_blank\">Firebase Crashlytics</a></li>\r\n</ul>\r\n\r\n<p><strong>Log Data</strong></p>\r\n\r\n<p>I want to inform you that whenever you use my Service, in a case of an error in the app I collect data and information (through third party products) on your phone called Log Data. This Log Data may include information such as your device Internet Protocol (“IP”) address, device name, operating system version, the configuration of the app when utilizing my Service, the time and date of your use of the Service, and other statistics.</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>Cookies are files with a small amount of data that are commonly used as anonymous unique identifiers. These are sent to your browser from the websites that you visit and are stored on your device&#39;s internal memory.</p>\r\n\r\n<p>This Service does not use these “cookies” explicitly. However, the app may use third party code and libraries that use “cookies” to collect information and improve their services. You have the option to either accept or refuse these cookies and know when a cookie is being sent to your device. If you choose to refuse our cookies, you may not be able to use some portions of this Service.</p>\r\n\r\n<p><strong>Service Providers</strong></p>\r\n\r\n<p>I may employ third-party companies and individuals due to the following reasons:</p>\r\n\r\n<ul>\r\n	<li>To facilitate our Service;</li>\r\n	<li>To provide the Service on our behalf;</li>\r\n	<li>To perform Service-related services; or</li>\r\n	<li>To assist us in analyzing how our Service is used.</li>\r\n</ul>\r\n\r\n<p>I want to inform users of this Service that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.</p>\r\n\r\n<p><strong>Security</strong></p>\r\n\r\n<p>I value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and I cannot guarantee its absolute security.</p>\r\n\r\n<p><strong>Links to Other Sites</strong></p>\r\n\r\n<p>This Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by me. Therefore, I strongly advise you to review the Privacy Policy of these websites. I have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>\r\n\r\n<p><strong>Children’s Privacy</strong></p>\r\n\r\n<p>These Services do not address anyone under the age of 13. I do not knowingly collect personally identifiable information from children under 13. In the case I discover that a child under 13 has provided me with personal information, I immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact me so that I will be able to do necessary actions.</p>\r\n\r\n<p><strong>Changes to This Privacy Policy</strong></p>\r\n\r\n<p>I may update our Privacy Policy from time to time. Thus, you are advised to review this page periodically for any changes. I will notify you of any changes by posting the new Privacy Policy on this page.</p>\r\n\r\n<p>This policy is effective as of 2021-01-04</p>\r\n\r\n<p><strong>Contact Us</strong></p>\r\n\r\n<p>If you have any questions or suggestions about my Privacy Policy, do not hesitate to contact me at info@wrteam.in.</p>\r\n\r\n<p>This privacy policy page was created at <a href=\"https://privacypolicytemplate.net\" target=\"_blank\">privacypolicytemplate.net </a>and modified/generated by <a href=\"https://app-privacy-policy-generator.nisrulz.com/\" target=\"_blank\">App Privacy Policy Generator</a></p>'),
(10, 'terms_conditions', '<p><strong>Terms &amp; Conditions</strong></p>\r\n\r\n<p> \r\n<p>By downloading or using the app, these terms will automatically apply to you – you should make sure therefore that you read them carefully before using the app. You’re not allowed to copy, or modify the app, any part of the app, or our trademarks in any way. You’re not allowed to attempt to extract the source code of the app, and you also shouldn’t try to translate the app into other languages, or make derivative versions. The app itself, and all the trade marks, copyright, database rights and other intellectual property rights related to it, still belong to .</p>\r\n</p>\r\n\r\n<p>is committed to ensuring that the app is as useful and efficient as possible. For that reason, we reserve the right to make changes to the app or to charge for its services, at any time and for any reason. We will never charge you for the app or its services without making it very clear to you exactly what you’re paying for.</p>\r\n\r\n<p>The eCart app stores and processes personal data that you have provided to us, in order to provide my Service. It’s your responsibility to keep your phone and access to the app secure. We therefore recommend that you do not jailbreak or root your phone, which is the process of removing software restrictions and limitations imposed by the official operating system of your device. It could make your phone vulnerable to malware/viruses/malicious programs, compromise your phone’s security features and it could mean that the eCart app won’t work properly or at all.</p>\r\n\r\n<p>The app does use third party services that declare their own Terms and Conditions.</p>\r\n\r\n<p>Link to Terms and Conditions of third party service providers used by the app</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://policies.google.com/terms\" target=\"_blank\">Google Play Services</a></li>\r\n	<li><a href=\"https://firebase.google.com/terms/analytics\" target=\"_blank\">Google Analytics for Firebase</a></li>\r\n	<li><a href=\"https://firebase.google.com/terms/crashlytics\" target=\"_blank\">Firebase Crashlytics</a></li>\r\n</ul>\r\n\r\n<p>You should be aware that there are certain things that will not take responsibility for. Certain functions of the app will require the app to have an active internet connection. The connection can be Wi-Fi, or provided by your mobile network provider, but cannot take responsibility for the app not working at full functionality if you don’t have access to Wi-Fi, and you don’t have any of your data allowance left.</p>\r\n\r\n<p> </p>\r\n\r\n<p>If you’re using the app outside of an area with Wi-Fi, you should remember that your terms of the agreement with your mobile network provider will still apply. As a result, you may be charged by your mobile provider for the cost of data for the duration of the connection while accessing the app, or other third party charges. In using the app, you’re accepting responsibility for any such charges, including roaming data charges if you use the app outside of your home territory (i.e. region or country) without turning off data roaming. If you are not the bill payer for the device on which you’re using the app, please be aware that we assume that you have received permission from the bill payer for using the app.</p>\r\n\r\n<p>Along the same lines, cannot always take responsibility for the way you use the app i.e. You need to make sure that your device stays charged – if it runs out of battery and you can’t turn it on to avail the Service, cannot accept responsibility.</p>\r\n\r\n<p>With respect to ’s responsibility for your use of the app, when you’re using the app, it’s important to bear in mind that although we endeavour to ensure that it is updated and correct at all times, we do rely on third parties to provide information to us so that we can make it available to you. accepts no liability for any loss, direct or indirect, you experience as a result of relying wholly on this functionality of the app.</p>\r\n\r\n<p>At some point, we may wish to update the app. The app is currently available on Android – the requirements for system(and for any additional systems we decide to extend the availability of the app to) may change, and you’ll need to download the updates if you want to keep using the app. does not promise that it will always update the app so that it is relevant to you and/or works with the Android version that you have installed on your device. However, you promise to always accept updates to the application when offered to you, We may also wish to stop providing the app, and may terminate use of it at any time without giving notice of termination to you. Unless we tell you otherwise, upon any termination, (a) the rights and licenses granted to you in these terms will end; (b) you must stop using the app, and (if needed) delete it from your device.</p>\r\n\r\n<p><strong>Changes to This Terms and Conditions</strong></p>\r\n\r\n<p>I may update our Terms and Conditions from time to time. Thus, you are advised to review this page periodically for any changes. I will notify you of any changes by posting the new Terms and Conditions on this page.</p>\r\n\r\n<p>These terms and conditions are effective as of 2021-01-04</p>\r\n\r\n<p><strong>Contact Us</strong></p>\r\n\r\n<p>If you have any questions or suggestions about my Terms and Conditions, do not hesitate to contact me at info@wrteam.in.</p>\r\n\r\n<p>This Terms and Conditions page was generated by <a href=\"https://app-privacy-policy-generator.nisrulz.com/\" target=\"_blank\">App Privacy Policy Generator</a></p>'),
(11, 'fcm_server_key', 'AAAARbHXtGM:APA91bEGQmzmbgy_-raxmNiNWkHvDHSCt8maqKhrsE2IGfQIMqWqAI36i4Pu8kkb9dpB87sQwe4PBd_8FDjS2qX5wq603GXgm_Xo0FLnfHaHOZ76aTbGhBWYcZH7JBc6BRGjjqeMCwzT'),
(12, 'contact_us', '<h2>E-commerce </h2>\n\n<p>For any kind of queries related to products, orders or services feel free to contact us on our official email address or phone number as given below :</p>\n\n<p><strong>Areas we deliver : </strong></p>\n\n<p><strong>Delivery Timings :</strong></p>\n\n<ol>\n	<li><strong>  8:00 AM To 10:30 AM</strong></li>\n	<li><strong> 10:30 AM To 12:30 PM</strong></li>\n	<li><strong>  4:00 PM To  7:00 PM</strong></li>\n</ol>\n\n<p><strong>Note : </strong>You can order for maximum 2days in advance. i.e., Today &amp; Tomorrow only.</p>\n\n<h3> </h3>\n'),
(13, 'system_timezone', '{\"system_configurations\":\"1\",\"system_timezone_gmt\":\"+05:30\",\"system_configurations_id\":\"13\",\"app_name\":\"Earnapp\",\"support_number\":\"+91 9876543210\",\"support_email\":\"support@ekart.com\",\"current_version\":\"1.0.0\",\"minimum_version_required\":\"1.0.0\",\"is-version-system-on\":\"0\",\"store_address\":\"#262-263, Time Square Empire SH 42, highway, Goa, 643987\",\"map_latitude\":\"23.23305215147397\",\"map_longitude\":\"69.64400665873588\",\"currency\":\"u20b9\",\"system_timezone\":\"Asia/Kolkata\",\"max_cart_items_count\":\"10\",\"min_order_amount\":\"10\",\"area-wise-delivery-charge\":\"0\",\"min_amount\":\"800\",\"delivery_charge\":\"50\",\"is-refer-earn-on\":\"1\",\"min-refer-earn-order-amount\":\"100\",\"refer-earn-bonus\":\"5\",\"refer-earn-method\":\"rupees\",\"max-refer-earn-amount\":\"500\",\"minimum-withdrawal-amount\":\"100\",\"max-product-return-days\":\"\",\"delivery-boy-bonus-percentage\":\"\",\"low-stock-limit\":\"5\",\"user-wallet-refill-limit\":\"10000\",\"from_mail\":\"info@ecart.com\",\"reply_to\":\"info@ecart.com\",\"generate-otp\":\"1\",\"smtp-from-mail\":\"noreply@wrteam.in\",\"smtp-reply-to\":\"noreply@wrteam.in\",\"smtp-email-password\":\"wrteam@0124\",\"smtp-host\":\"mail.wrteam.in\",\"smtp-port\":\"465\",\"smtp-content-type\":\"html\",\"smtp-encryption-type\":\"ssl\"}'),
(15, 'about_us', '<h2>About Us</h2>\r\n\r\n<p>eCart is one of the most selling and trending  Grocery, Food Delivery, Fruits &amp; Vegetable store, Full Android eCommerce &amp; Website. which is helps to create your own app and web with your brand name.</p>\r\n\r\n<p>eCart has creative and dedicated group of developers who are mastered in Apps Developments and Web Development with a nice in delivering quality solutions to customers across the globe.</p>\r\n\r\n<p>Everything there including code, doc, amazing support, and most important developed by WRTeam.</p>'),
(80, 'currency', '₹'),
(81, 'delivery_boy_privacy_policy', '<p><strong>Privacy Policy</strong></p>\r\n\r\n<p> \r\n<p>built the Delivery Boy - eCart app as a Free app. This SERVICE is provided by at no cost and is intended for use as is.</p>\r\n</p>\r\n\r\n<p>This page is used to inform visitors regarding my policies with the collection, use, and disclosure of Personal Information if anyone decided to use my Service.</p>\r\n\r\n<p>If you choose to use my Service, then you agree to the collection and use of information in relation to this policy. The Personal Information that I collect is used for providing and improving the Service. I will not use or share your information with anyone except as described in this Privacy Policy.</p>\r\n\r\n<p>The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at Delivery Boy - eCart unless otherwise defined in this Privacy Policy.</p>\r\n\r\n<p><strong>Information Collection and Use</strong></p>\r\n\r\n<p>For a better experience, while using our Service, I may require you to provide us with certain personally identifiable information. The information that I request will be retained on your device and is not collected by me in any way.</p>\r\n\r\n<p>The app does use third party services that may collect information used to identify you.</p>\r\n\r\n<p>Link to privacy policy of third party service providers used by the app</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.google.com/policies/privacy/\" target=\"_blank\">Google Play Services</a></li>\r\n	<li><a href=\"https://firebase.google.com/policies/analytics\" target=\"_blank\">Google Analytics for Firebase</a></li>\r\n	<li><a href=\"https://firebase.google.com/support/privacy/\" target=\"_blank\">Firebase Crashlytics</a></li>\r\n</ul>\r\n\r\n<p><strong>Log Data</strong></p>\r\n\r\n<p>I want to inform you that whenever you use my Service, in a case of an error in the app I collect data and information (through third party products) on your phone called Log Data. This Log Data may include information such as your device Internet Protocol (“IP”) address, device name, operating system version, the configuration of the app when utilizing my Service, the time and date of your use of the Service, and other statistics.</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>Cookies are files with a small amount of data that are commonly used as anonymous unique identifiers. These are sent to your browser from the websites that you visit and are stored on your device&#39;s internal memory.</p>\r\n\r\n<p>This Service does not use these “cookies” explicitly. However, the app may use third party code and libraries that use “cookies” to collect information and improve their services. You have the option to either accept or refuse these cookies and know when a cookie is being sent to your device. If you choose to refuse our cookies, you may not be able to use some portions of this Service.</p>\r\n\r\n<p><strong>Service Providers</strong></p>\r\n\r\n<p>I may employ third-party companies and individuals due to the following reasons:</p>\r\n\r\n<ul>\r\n	<li>To facilitate our Service;</li>\r\n	<li>To provide the Service on our behalf;</li>\r\n	<li>To perform Service-related services; or</li>\r\n	<li>To assist us in analyzing how our Service is used.</li>\r\n</ul>\r\n\r\n<p>I want to inform users of this Service that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.</p>\r\n\r\n<p><strong>Security</strong></p>\r\n\r\n<p>I value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and I cannot guarantee its absolute security.</p>\r\n\r\n<p><strong>Links to Other Sites</strong></p>\r\n\r\n<p>This Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by me. Therefore, I strongly advise you to review the Privacy Policy of these websites. I have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>\r\n\r\n<p><strong>Children’s Privacy</strong></p>\r\n\r\n<p>These Services do not address anyone under the age of 13. I do not knowingly collect personally identifiable information from children under 13. In the case I discover that a child under 13 has provided me with personal information, I immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact me so that I will be able to do necessary actions.</p>\r\n\r\n<p><strong>Changes to This Privacy Policy</strong></p>\r\n\r\n<p>I may update our Privacy Policy from time to time. Thus, you are advised to review this page periodically for any changes. I will notify you of any changes by posting the new Privacy Policy on this page.</p>\r\n\r\n<p>This policy is effective as of 2021-01-04</p>\r\n\r\n<p><strong>Contact Us</strong></p>\r\n\r\n<p>If you have any questions or suggestions about my Privacy Policy, do not hesitate to contact me at info@wrteam.in.</p>\r\n\r\n<p>This privacy policy page was created at <a href=\"https://privacypolicytemplate.net\" target=\"_blank\">privacypolicytemplate.net </a>and modified/generated by <a href=\"https://app-privacy-policy-generator.nisrulz.com/\" target=\"_blank\">App Privacy Policy Generator</a></p>'),
(82, 'delivery_boy_terms_conditions', '<p><strong>Terms &amp; Conditions</strong></p>\r\n\r\n<p> \r\n<p>By downloading or using the app, these terms will automatically apply to you – you should make sure therefore that you read them carefully before using the app. You’re not allowed to copy, or modify the app, any part of the app, or our trademarks in any way. You’re not allowed to attempt to extract the source code of the app, and you also shouldn’t try to translate the app into other languages, or make derivative versions. The app itself, and all the trade marks, copyright, database rights and other intellectual property rights related to it, still belong to .</p>\r\n</p>\r\n\r\n<p>is committed to ensuring that the app is as useful and efficient as possible. For that reason, we reserve the right to make changes to the app or to charge for its services, at any time and for any reason. We will never charge you for the app or its services without making it very clear to you exactly what you’re paying for.</p>\r\n\r\n<p>The Delivery Boy - eCart app stores and processes personal data that you have provided to us, in order to provide my Service. It’s your responsibility to keep your phone and access to the app secure. We therefore recommend that you do not jailbreak or root your phone, which is the process of removing software restrictions and limitations imposed by the official operating system of your device. It could make your phone vulnerable to malware/viruses/malicious programs, compromise your phone’s security features and it could mean that the Delivery Boy - eCart app won’t work properly or at all.</p>\r\n\r\n<p>The app does use third party services that declare their own Terms and Conditions.</p>\r\n\r\n<p>Link to Terms and Conditions of third party service providers used by the app</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://policies.google.com/terms\" target=\"_blank\">Google Play Services</a></li>\r\n	<li><a href=\"https://firebase.google.com/terms/analytics\" target=\"_blank\">Google Analytics for Firebase</a></li>\r\n	<li><a href=\"https://firebase.google.com/terms/crashlytics\" target=\"_blank\">Firebase Crashlytics</a></li>\r\n</ul>\r\n\r\n<p>You should be aware that there are certain things that will not take responsibility for. Certain functions of the app will require the app to have an active internet connection. The connection can be Wi-Fi, or provided by your mobile network provider, but cannot take responsibility for the app not working at full functionality if you don’t have access to Wi-Fi, and you don’t have any of your data allowance left.</p>\r\n\r\n<p> </p>\r\n\r\n<p>If you’re using the app outside of an area with Wi-Fi, you should remember that your terms of the agreement with your mobile network provider will still apply. As a result, you may be charged by your mobile provider for the cost of data for the duration of the connection while accessing the app, or other third party charges. In using the app, you’re accepting responsibility for any such charges, including roaming data charges if you use the app outside of your home territory (i.e. region or country) without turning off data roaming. If you are not the bill payer for the device on which you’re using the app, please be aware that we assume that you have received permission from the bill payer for using the app.</p>\r\n\r\n<p>Along the same lines, cannot always take responsibility for the way you use the app i.e. You need to make sure that your device stays charged – if it runs out of battery and you can’t turn it on to avail the Service, cannot accept responsibility.</p>\r\n\r\n<p>With respect to ’s responsibility for your use of the app, when you’re using the app, it’s important to bear in mind that although we endeavour to ensure that it is updated and correct at all times, we do rely on third parties to provide information to us so that we can make it available to you. accepts no liability for any loss, direct or indirect, you experience as a result of relying wholly on this functionality of the app.</p>\r\n\r\n<p>At some point, we may wish to update the app. The app is currently available on Android – the requirements for system(and for any additional systems we decide to extend the availability of the app to) may change, and you’ll need to download the updates if you want to keep using the app. does not promise that it will always update the app so that it is relevant to you and/or works with the Android version that you have installed on your device. However, you promise to always accept updates to the application when offered to you, We may also wish to stop providing the app, and may terminate use of it at any time without giving notice of termination to you. Unless we tell you otherwise, upon any termination, (a) the rights and licenses granted to you in these terms will end; (b) you must stop using the app, and (if needed) delete it from your device.</p>\r\n\r\n<p><strong>Changes to This Terms and Conditions</strong></p>\r\n\r\n<p>I may update our Terms and Conditions from time to time. Thus, you are advised to review this page periodically for any changes. I will notify you of any changes by posting the new Terms and Conditions on this page.</p>\r\n\r\n<p>These terms and conditions are effective as of 2021-01-04</p>\r\n\r\n<p><strong>Contact Us</strong></p>\r\n\r\n<p>If you have any questions or suggestions about my Terms and Conditions, do not hesitate to contact me at info@wrteam.in.</p>\r\n\r\n<p>This Terms and Conditions page was generated by <a href=\"https://app-privacy-policy-generator.nisrulz.com/\" target=\"_blank\">App Privacy Policy Generator</a></p>'),
(92, 'payment_methods', '{\"payment_method_settings\":\"1\",\"cod_payment_method\":\"1\",\"cod_mode\":\"global\",\"paypal_payment_method\":\"0\",\"paypal_mode\":\"sandbox\",\"paypal_currency_code\":\"USD\",\"paypal_business_email\":\"seller@somedomain.com\",\"payumoney_payment_method\":\"0\",\"payumoney_mode\":\"sandbox\",\"payumoney_merchant_key\":\"FGCWtd8L\",\"payumoney_merchant_id\":\"6934786\",\"payumoney_salt\":\"40QIgAPghj\",\"razorpay_payment_method\":\"0\",\"razorpay_key\":\"rzp_test_PeH2Z44Chsfg5h\",\"razorpay_secret_key\":\"JlFiUHYoRKZc5LwR6GGc5t6y\",\"paystack_payment_method\":\"0\",\"paystack_public_key\":\"pk_test_fd8f8d9c548cbd143c78a4bdf6cee5c11f8e6c12\",\"paystack_secret_key\":\"sk_test_dcc02e93456783bb933b6d4c0dec928f1f7e0118\",\"flutterwave_payment_method\":\"0\",\"flutterwave_public_key\":\"FLWPUBK_TEST-1ffbaed6ee3788cd2bcbb234d3b90c59-X\",\"flutterwave_secret_key\":\"FLWSECK_TEST-c659ffd76304hhh67fc4b67ae735b126-X\",\"flutterwave_encryption_key\":\"FLWSECK_TEST25c36edcfvbb\",\"flutterwave_currency_code\":\"KES\",\"midtrans_payment_method\":\"0\",\"is_production\":\"0\",\"midtrans_merchant_id\":\"G213016789\",\"midtrans_client_key\":\"SB-Mid-client-gv4vPZ5utTTClO7u\",\"midtrans_server_key\":\"SB-Mid-server-PHtT70awwC_GsfIR_8TzIVyh\",\"stripe_payment_method\":\"0\",\"stripe_publishable_key\":\"pk_test_51Hh90WLYfObhNTTwooBHwynrlfiPo2uwxyCVqGNNCWGmpdOHuaW4rYS9cDldKJ1hxV5ik52UXUDSYgEM66OX45534565US7tRX\",\"stripe_secret_key\":\"sk_test_51Hh90WLYfObhNTTwO8kCsbdnMdmLxiGHEpiQPGBkYlafghjQ3RnXPIKGn3YsGIEMoIQ5bNfxye4kzE6wfLiINzNk00xOYprnZt\",\"stripe_webhook_secret_key\":\"whsec_mPs10vgbh0QDZPiH3drKBe7fOpMSRppX\",\"stripe_currency_code\":\"INR\",\"paytm_payment_method\":\"0\",\"paytm_mode\":\"sandbox\",\"paytm_merchant_key\":\"eIcrB!DTfgth5DN8\",\"paytm_merchant_id\":\"PpGeMd36789525540215\",\"ssl_commerce_payment_method\":\"0\",\"ssl_commerece_mode\":\"sandbox\",\"ssl_commerece_store_id\":\"\",\"ssl_commerece_secret_key\":\"\"}'),
(83, 'time_slot_config', '{\"time_slot_config\":\"1\",\"is_time_slots_enabled\":\"0\",\"delivery_starts_from\":\"1\",\"allowed_days\":\"1\"}'),
(95, 'manager_app_privacy_policy', '<p><strong>Privacy Policy</strong></p>\r\n\r\n<p> \r\n<p>built the eCart Manager App app as a Free app. This SERVICE is provided by at no cost and is intended for use as is.</p>\r\n</p>\r\n\r\n<p>This page is used to inform visitors regarding my policies with the collection, use, and disclosure of Personal Information if anyone decided to use my Service.</p>\r\n\r\n<p>If you choose to use my Service, then you agree to the collection and use of information in relation to this policy. The Personal Information that I collect is used for providing and improving the Service. I will not use or share your information with anyone except as described in this Privacy Policy.</p>\r\n\r\n<p>The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at eCart Manager App unless otherwise defined in this Privacy Policy.</p>\r\n\r\n<p><strong>Information Collection and Use</strong></p>\r\n\r\n<p>For a better experience, while using our Service, I may require you to provide us with certain personally identifiable information. The information that I request will be retained on your device and is not collected by me in any way.</p>\r\n\r\n<p>The app does use third party services that may collect information used to identify you.</p>\r\n\r\n<p>Link to privacy policy of third party service providers used by the app</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.google.com/policies/privacy/\" target=\"_blank\">Google Play Services</a></li>\r\n</ul>\r\n\r\n<p><strong>Log Data</strong></p>\r\n\r\n<p>I want to inform you that whenever you use my Service, in a case of an error in the app I collect data and information (through third party products) on your phone called Log Data. This Log Data may include information such as your device Internet Protocol (“IP”) address, device name, operating system version, the configuration of the app when utilizing my Service, the time and date of your use of the Service, and other statistics.</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>Cookies are files with a small amount of data that are commonly used as anonymous unique identifiers. These are sent to your browser from the websites that you visit and are stored on your device&#39;s internal memory.</p>\r\n\r\n<p>This Service does not use these “cookies” explicitly. However, the app may use third party code and libraries that use “cookies” to collect information and improve their services. You have the option to either accept or refuse these cookies and know when a cookie is being sent to your device. If you choose to refuse our cookies, you may not be able to use some portions of this Service.</p>\r\n\r\n<p><strong>Service Providers</strong></p>\r\n\r\n<p>I may employ third-party companies and individuals due to the following reasons:</p>\r\n\r\n<ul>\r\n	<li>To facilitate our Service;</li>\r\n	<li>To provide the Service on our behalf;</li>\r\n	<li>To perform Service-related services; or</li>\r\n	<li>To assist us in analyzing how our Service is used.</li>\r\n</ul>\r\n\r\n<p>I want to inform users of this Service that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.</p>\r\n\r\n<p><strong>Security</strong></p>\r\n\r\n<p>I value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and I cannot guarantee its absolute security.</p>\r\n\r\n<p><strong>Links to Other Sites</strong></p>\r\n\r\n<p>This Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by me. Therefore, I strongly advise you to review the Privacy Policy of these websites. I have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>\r\n\r\n<p><strong>Children’s Privacy</strong></p>\r\n\r\n<p>These Services do not address anyone under the age of 13. I do not knowingly collect personally identifiable information from children under 13. In the case I discover that a child under 13 has provided me with personal information, I immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact me so that I will be able to do necessary actions.</p>\r\n\r\n<p><strong>Changes to This Privacy Policy</strong></p>\r\n\r\n<p>I may update our Privacy Policy from time to time. Thus, you are advised to review this page periodically for any changes. I will notify you of any changes by posting the new Privacy Policy on this page.</p>\r\n\r\n<p>This policy is effective as of 2021-01-04</p>\r\n\r\n<p><strong>Contact Us</strong></p>\r\n\r\n<p>If you have any questions or suggestions about my Privacy Policy, do not hesitate to contact me at info@wrteam.in.</p>\r\n\r\n<p>This privacy policy page was created at <a href=\"https://privacypolicytemplate.net\" target=\"_blank\">privacypolicytemplate.net </a>and modified/generated by <a href=\"https://app-privacy-policy-generator.nisrulz.com/\" target=\"_blank\">App Privacy Policy Generator</a></p>'),
(96, 'manager_app_terms_conditions', '<p><strong>Terms &amp; Conditions</strong></p>\r\n\r\n<p> \r\n<p>By downloading or using the app, these terms will automatically apply to you – you should make sure therefore that you read them carefully before using the app. You’re not allowed to copy, or modify the app, any part of the app, or our trademarks in any way. You’re not allowed to attempt to extract the source code of the app, and you also shouldn’t try to translate the app into other languages, or make derivative versions. The app itself, and all the trade marks, copyright, database rights and other intellectual property rights related to it, still belong to .</p>\r\n</p>\r\n\r\n<p>is committed to ensuring that the app is as useful and efficient as possible. For that reason, we reserve the right to make changes to the app or to charge for its services, at any time and for any reason. We will never charge you for the app or its services without making it very clear to you exactly what you’re paying for.</p>\r\n\r\n<p>The eCart Manager App app stores and processes personal data that you have provided to us, in order to provide my Service. It’s your responsibility to keep your phone and access to the app secure. We therefore recommend that you do not jailbreak or root your phone, which is the process of removing software restrictions and limitations imposed by the official operating system of your device. It could make your phone vulnerable to malware/viruses/malicious programs, compromise your phone’s security features and it could mean that the eCart Manager App app won’t work properly or at all.</p>\r\n\r\n<p>The app does use third party services that declare their own Terms and Conditions.</p>\r\n\r\n<p>Link to Terms and Conditions of third party service providers used by the app</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://policies.google.com/terms\" target=\"_blank\">Google Play Services</a></li>\r\n</ul>\r\n\r\n<p>You should be aware that there are certain things that will not take responsibility for. Certain functions of the app will require the app to have an active internet connection. The connection can be Wi-Fi, or provided by your mobile network provider, but cannot take responsibility for the app not working at full functionality if you don’t have access to Wi-Fi, and you don’t have any of your data allowance left.</p>\r\n\r\n<p> </p>\r\n\r\n<p>If you’re using the app outside of an area with Wi-Fi, you should remember that your terms of the agreement with your mobile network provider will still apply. As a result, you may be charged by your mobile provider for the cost of data for the duration of the connection while accessing the app, or other third party charges. In using the app, you’re accepting responsibility for any such charges, including roaming data charges if you use the app outside of your home territory (i.e. region or country) without turning off data roaming. If you are not the bill payer for the device on which you’re using the app, please be aware that we assume that you have received permission from the bill payer for using the app.</p>\r\n\r\n<p>Along the same lines, cannot always take responsibility for the way you use the app i.e. You need to make sure that your device stays charged – if it runs out of battery and you can’t turn it on to avail the Service, cannot accept responsibility.</p>\r\n\r\n<p>With respect to ’s responsibility for your use of the app, when you’re using the app, it’s important to bear in mind that although we endeavour to ensure that it is updated and correct at all times, we do rely on third parties to provide information to us so that we can make it available to you. accepts no liability for any loss, direct or indirect, you experience as a result of relying wholly on this functionality of the app.</p>\r\n\r\n<p>At some point, we may wish to update the app. The app is currently available on Android – the requirements for system(and for any additional systems we decide to extend the availability of the app to) may change, and you’ll need to download the updates if you want to keep using the app. does not promise that it will always update the app so that it is relevant to you and/or works with the Android version that you have installed on your device. However, you promise to always accept updates to the application when offered to you, We may also wish to stop providing the app, and may terminate use of it at any time without giving notice of termination to you. Unless we tell you otherwise, upon any termination, (a) the rights and licenses granted to you in these terms will end; (b) you must stop using the app, and (if needed) delete it from your device.</p>\r\n\r\n<p><strong>Changes to This Terms and Conditions</strong></p>\r\n\r\n<p>I may update our Terms and Conditions from time to time. Thus, you are advised to review this page periodically for any changes. I will notify you of any changes by posting the new Terms and Conditions on this page.</p>\r\n\r\n<p>These terms and conditions are effective as of 2021-01-04</p>\r\n\r\n<p><strong>Contact Us</strong></p>\r\n\r\n<p>If you have any questions or suggestions about my Terms and Conditions, do not hesitate to contact me at info@wrteam.in.</p>\r\n\r\n<p>This Terms and Conditions page was generated by <a href=\"https://app-privacy-policy-generator.nisrulz.com/\" target=\"_blank\">App Privacy Policy Generator</a></p>'),
(99, 'categories_settings', '{\"add_category_settings\":\"1\",\"cat_style\":\"style_1\",\"max_visible_categories\":\"7\",\"max_col_in_single_row\":\"3\"}'),
(97, 'front_end_settings', '{\"front_end_settings\":\"1\",\"android_app_url\":\"https://play.google.com\",\"call_back_url\":\"http://ekart.local:8000/\",\"common_meta_keywords\":\"eCart,WebeCart,eCart Front,eCart Web,eCart Front End\",\"common_meta_description\":\"eCart Front End is Web Version of eCart - Grocery, Food Delivery, Fruits & Vegetable store, Web Version.\",\"favicon\":\"1609822161.5542.png\",\"web_logo\":\"1610961661.239.png\",\"screenshots\":\"1608552564.1753.png\",\"google_play\":\"1608552564.1758.png\"}'),
(100, 'seller_privacy_policy', '<p>seller privacy &amp; policy</p>'),
(101, 'seller_terms_conditions', '<p>seller terms &amp; condition</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `referral` text DEFAULT NULL,
  `my_refer_code` varchar(28) DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `earn` double DEFAULT NULL,
  `level1_referral_id` int(11) NOT NULL,
  `level2_referral_id` int(11) NOT NULL,
  `level3_referral_id` int(11) NOT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `referral`, `my_refer_code`, `balance`, `earn`, `level1_referral_id`, `level2_referral_id`, `level3_referral_id`, `last_updated`, `date_created`) VALUES
(11, 'Aravind', '9025635524', '2002', 'I1I2BSDBSD', 0, 0, 0, 0, 0, '2022-04-25 11:21:59', '2022-04-05 16:09:21'),
(12, 'Bala', '9055635524', 'I1I2BSDBSD', 'DDI2BAABSD', 0, 0, 0, 0, 0, '2022-04-25 11:22:02', '2022-04-05 16:09:21'),
(13, 'Prasad', '8778624682', 'I1I2BSDBSD', 'JAGPXA1FE6', 2600, 1340, 11, 0, 0, '2022-04-27 11:40:54', '2022-04-06 14:33:53'),
(14, 'Surya', '9090909090', 'JAGPXA1FE6', 'CPP3HK8Y8U', 0, 0, 0, 0, 0, '2022-04-15 08:07:49', '2022-04-13 15:07:18'),
(15, 'Rahul', '9638527410', 'THUsbsj', 'KP51YU4WTR', NULL, 0, 0, 0, 0, NULL, '2022-04-15 09:14:36'),
(18, 'Prative', '7897897890', 'CPP3HK8Y8U', 'AI9RLYPH67', 1000, 0, 14, 13, 11, '2022-04-26 06:26:31', '2022-04-25 11:02:34'),
(22, 'Virat', '8887776662', 'JAGPXA1FE6', 'C5JQ0KXMP4', NULL, 0, 13, 11, 0, NULL, '2022-04-25 11:12:16'),
(25, 'Vinoth', '8833883838', 'I1I2BSDBSD', 'D4ONKZIPF5', NULL, 0, 11, 0, 0, NULL, '2022-04-25 11:15:59'),
(26, 'Kandha', '8833883839', 'DDI2BAABSD', 'WAW4HIGH4V', NULL, 0, 12, 11, 0, NULL, '2022-04-25 11:16:48'),
(30, 'Nandha', '8833883830', '', 'ZJOQGK1ABH', NULL, NULL, 0, 0, 0, NULL, '2022-04-25 11:24:49'),
(31, 'prasad', '8778624681', '', 'WYQS2X4P0S', NULL, NULL, 0, 0, 0, NULL, '2022-04-26 03:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user_id`, `amount`, `status`) VALUES
(1, 18, 1000, 1),
(2, 18, 1000, 1),
(3, 18, 1000, 1),
(4, 18, 1000, 1),
(5, 18, 1000, 1),
(6, 18, 1000, 1),
(7, 18, 1000, 1),
(8, 18, 1000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_income`
--
ALTER TABLE `daily_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earn_settings`
--
ALTER TABLE `earn_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased_plans`
--
ALTER TABLE `purchased_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recharges`
--
ALTER TABLE `recharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_bonus`
--
ALTER TABLE `referral_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refer_commission`
--
ALTER TABLE `refer_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_income`
--
ALTER TABLE `daily_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `earn_settings`
--
ALTER TABLE `earn_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchased_plans`
--
ALTER TABLE `purchased_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recharges`
--
ALTER TABLE `recharges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `referral_bonus`
--
ALTER TABLE `referral_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `refer_commission`
--
ALTER TABLE `refer_commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
