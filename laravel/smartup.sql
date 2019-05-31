-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 31, 2019 at 03:48 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartup`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel_tabel`
--

CREATE TABLE `artikel_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tekst` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_paht` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorie_tabel`
--

CREATE TABLE `categorie_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categorie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorie_tabel`
--

INSERT INTO `categorie_tabel` (`id`, `categorie`, `created_at`, `updated_at`) VALUES
(1, 'Muziek', NULL, NULL),
(2, 'Evenementen', NULL, NULL),
(3, 'Sports', NULL, NULL),
(4, 'Gaming', NULL, NULL),
(5, 'andere', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fund_tabel`
--

CREATE TABLE `fund_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bedrag` int(11) DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fund_tabel`
--

INSERT INTO `fund_tabel` (`id`, `bedrag`, `project_id`, `user_name`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 600, 3, 'Fe De Langhe', 3, '2019-05-31 12:49:01', '2019-05-31 12:49:01'),
(5, 500, 4, 'Fe De Langhe', 3, '2019-05-31 12:49:10', '2019-05-31 12:49:10'),
(6, 100, 3, 'Fe De Langhe', 3, '2019-05-31 13:08:32', '2019-05-31 13:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `history_tabel`
--

CREATE TABLE `history_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gebruiker_id` int(11) NOT NULL,
  `reward_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_tabel`
--

CREATE TABLE `image_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_tabel`
--

INSERT INTO `image_tabel` (`id`, `path`, `caption`, `title`, `project_id`, `created_at`, `updated_at`) VALUES
(21, 'storage/project-3', 'dit is een caption', 'pr1-cropped-3d-feel-the-beat-music-660x330-55cf13c4d597f5.jpg', 3, '2019-05-31 12:38:05', '2019-05-31 12:38:05'),
(22, 'storage/project-3', 'dit is een caption', 'pr1-download-55cf13c5184018.jpg', 3, '2019-05-31 12:38:09', '2019-05-31 12:38:09'),
(23, 'storage/project-3', 'dit is een caption', 'pr1-sonywhh900ngreen-55cf13c518ae9d.jpg', 3, '2019-05-31 12:38:09', '2019-05-31 12:38:09'),
(24, 'storage/project-4', 'dit is een caption', 'pr2-Main Photo-55cf13d09e7bc9.jpg', 4, '2019-05-31 12:41:13', '2019-05-31 12:41:13'),
(25, 'storage/project-4', 'dit is een caption', 'pr2-_106105906_053059801-1-55cf13d123d44e.jpg', 4, '2019-05-31 12:41:22', '2019-05-31 12:41:22'),
(26, 'storage/project-4', 'dit is een caption', 'pr2-Cannes-Film-Festival-Red-Carpet-55cf13d12419d3.jpg', 4, '2019-05-31 12:41:22', '2019-05-31 12:41:22'),
(27, 'storage/project-4', 'dit is een caption', 'pr2-eastbound-festival-55cf13d124324c.jpg', 4, '2019-05-31 12:41:22', '2019-05-31 12:41:22'),
(28, 'storage/project-5', 'dit is een caption', 'pr3-xbox_2016___2017_games-t2-55cf13d6d23e8e.jpg', 5, '2019-05-31 12:42:53', '2019-05-31 12:42:53'),
(32, 'storage/project-7', 'dit is een caption', 'pr5-professionals-in-tech-55cf13e46dc1b1.jpg', 7, '2019-05-31 12:46:30', '2019-05-31 12:46:30'),
(33, 'storage/project-8', 'dit is een caption', 'pr5-b306033ac297f52886eb534cc848b487-55cf13eaa9b0db.jpg', 8, '2019-05-31 12:48:10', '2019-05-31 12:48:10'),
(34, 'storage/project-8', 'dit is een caption', 'pr5-dark-music-wallpaper-10-55cf13eaaa0575.jpg', 8, '2019-05-31 12:48:10', '2019-05-31 12:48:10'),
(35, 'storage/project-9', 'dit is een caption', 'pr2-eastbound-festival-55cf13ecf70a56.jpg', 9, '2019-05-31 12:48:47', '2019-05-31 12:48:47'),
(36, 'storage/project-8', 'dit is een caption', '37_20180831152031_4788756_large-55cf143cf61089.jpg', 8, '2019-05-31 13:10:07', '2019-05-31 13:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_04_05_142830_create_history_tabel', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_04_05_140600_create_categorie_tabel', 1),
(5, '2019_04_05_142903_create_artikel_tabel', 1),
(6, '2019_04_05_142915_create_page_tabel', 1),
(7, '2019_05_20_124922_create_project_tabel', 1),
(8, '2019_05_20_142708_create_image_tabel', 1),
(9, '2019_05_20_142926_create_reward_tabel', 1),
(10, '2019_05_23_112020_change_tekst_from_page_tabel', 1),
(11, '2019_05_24_094341_create_reactie_tabel', 1),
(12, '2019_05_25_130611_create_fund_tabel', 1),
(14, '2020_10_12_000000_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `page_tabel`
--

CREATE TABLE `page_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tekst` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_tabel`
--

INSERT INTO `page_tabel` (`id`, `titel`, `tekst`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'SmartUp', '', '', NULL, NULL),
(2, 'About', 'Welkom op onze website SmartUp! Dit is een website voor alle mensen met een creatieve ingesteldheid. Mensen die graag een project, evenement of zoveel andere dingen willen creëren of organiseren maar niet het budget hebben zitten om de juiste site. Hier kan je jou creatieve projecten naar voorbreng voor verschillende mensen, zij kunnen jou helpen om aan dit budget te geraken om het project te kunnen realiseren. \r\nLet wel op! Bij het sponseren van een project gaat 90% naar het project en 10% naar de administrator van de website. Als er vragen zijn omtrent de website, de werking, het systeem, kan je me gerust contacteren via contacten.\r\nStart Smart met Smart Up voor start up projects.\r\n', '', NULL, NULL),
(3, 'Privacy policy', '<p>Effective date: May 30, 2019</p>\r\n\r\n\r\n<p>SmartUp (\"us\", \"we\", or \"our\") operates the http://127.0.0.1:8000 website and the SmartUp mobile application (the \"Service\").</p>\r\n\r\n<p>This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data. Our Privacy Policy  for SmartUp is created with the help of the <a href=\"https://www.freeprivacypolicy.com/free-privacy-policy-generator.php\">Free Privacy Policy Generator</a>.</p>\r\n\r\n<p>We use your data to provide and improve the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions.</p>\r\n\r\n\r\n<h2>Information Collection And Use</h2>\r\n\r\n<p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>\r\n\r\n<h3>Types of Data Collected</h3>\r\n\r\n<h4>Personal Data</h4>\r\n\r\n<p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you (\"Personal Data\"). Personally identifiable information may include, but is not limited to:</p>\r\n\r\n<ul>\r\n<li>Email address</li><li>First name and last name</li><li>Cookies and Usage Data</li>\r\n</ul>\r\n\r\n<h4>Usage Data</h4>\r\n\r\n<p>We may also collect information that your browser sends whenever you visit our Service or when you access the Service by or through a mobile device (\"Usage Data\").</p>\r\n<p>This Usage Data may include information such as your computer\'s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>\r\n<p>When you access the Service by or through a mobile device, this Usage Data may include information such as the type of mobile device you use, your mobile device unique ID, the IP address of your mobile device, your mobile operating system, the type of mobile Internet browser you use, unique device identifiers and other diagnostic data.</p>\r\n\r\n<h4>Tracking & Cookies Data</h4>\r\n<p>We use cookies and similar tracking technologies to track the activity on our Service and hold certain information.</p>\r\n<p>Cookies are files with small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Tracking technologies also used are beacons, tags, and scripts to collect and track information and to improve and analyze our Service.</p>\r\n<p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>\r\n<p>Examples of Cookies we use:</p>\r\n<ul>\r\n    <li><strong>Session Cookies.</strong> We use Session Cookies to operate our Service.</li>\r\n    <li><strong>Preference Cookies.</strong> We use Preference Cookies to remember your preferences and various settings.</li>\r\n    <li><strong>Security Cookies.</strong> We use Security Cookies for security purposes.</li>\r\n</ul>\r\n\r\n<h2>Use of Data</h2>\r\n    \r\n<p>SmartUp uses the collected data for various purposes:</p>    \r\n<ul>\r\n    <li>To provide and maintain the Service</li>\r\n    <li>To notify you about changes to our Service</li>\r\n    <li>To allow you to participate in interactive features of our Service when you choose to do so</li>\r\n    <li>To provide customer care and support</li>\r\n    <li>To provide analysis or valuable information so that we can improve the Service</li>\r\n    <li>To monitor the usage of the Service</li>\r\n    <li>To detect, prevent and address technical issues</li>\r\n</ul>\r\n\r\n<h2>Transfer Of Data</h2>\r\n<p>Your information, including Personal Data, may be transferred to — and maintained on — computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from your jurisdiction.</p>\r\n<p>If you are located outside Belgium and choose to provide information to us, please note that we transfer the data, including Personal Data, to Belgium and process it there.</p>\r\n<p>Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.</p>\r\n<p>SmartUp will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of your data and other personal information.</p>\r\n\r\n<h2>Disclosure Of Data</h2>\r\n\r\n<h3>Legal Requirements</h3>\r\n<p>SmartUp may disclose your Personal Data in the good faith belief that such action is necessary to:</p>\r\n<ul>\r\n    <li>To comply with a legal obligation</li>\r\n    <li>To protect and defend the rights or property of SmartUp</li>\r\n    <li>To prevent or investigate possible wrongdoing in connection with the Service</li>\r\n    <li>To protect the personal safety of users of the Service or the public</li>\r\n    <li>To protect against legal liability</li>\r\n</ul>\r\n\r\n<h2>Security Of Data</h2>\r\n<p>The security of your data is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>\r\n\r\n<h2>Service Providers</h2>\r\n<p>We may employ third party companies and individuals to facilitate our Service (\"Service Providers\"), to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.</p>\r\n<p>These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>\r\n\r\n\r\n\r\n<h2>Links To Other Sites</h2>\r\n<p>Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party\'s site. We strongly advise you to review the Privacy Policy of every site you visit.</p>\r\n<p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>\r\n\r\n\r\n<h2>Children\'s Privacy</h2>\r\n<p>Our Service does not address anyone under the age of 18 (\"Children\").</p>\r\n<p>We do not knowingly collect personally identifiable information from anyone under the age of 18. If you are a parent or guardian and you are aware that your Children has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.</p>\r\n\r\n\r\n<h2>Changes To This Privacy Policy</h2>\r\n<p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>\r\n<p>We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the \"effective date\" at the top of this Privacy Policy.</p>\r\n<p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>\r\n\r\n\r\n<h2>Contact Us</h2>\r\n<p>If you have any questions about this Privacy Policy, please contact us:</p>\r\n<ul>\r\n        <li>By email: annadelanghe1@gmail.com</li>\r\n            <li>By visiting this page on our website: http://127.0.0.1:8000/contact</li>\r\n      \r\n        </ul>', '', NULL, NULL),
(4, 'contact', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_tabel`
--

CREATE TABLE `project_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uitleg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credits_doelbedrag` int(11) NOT NULL,
  `credits_gesubsideert` int(11) DEFAULT NULL,
  `gepubliceerd_tot` date NOT NULL,
  `minimumbedrag` int(11) DEFAULT NULL,
  `minimumsouvenir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maximumbedrag` int(11) DEFAULT NULL,
  `maximumsouvenir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kijker` tinyint(1) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_tabel`
--

INSERT INTO `project_tabel` (`id`, `naam`, `uitleg`, `credits_doelbedrag`, `credits_gesubsideert`, `gepubliceerd_tot`, `minimumbedrag`, `minimumsouvenir`, `maximumbedrag`, `maximumsouvenir`, `kijker`, `user_id`, `categorie_id`, `created_at`, `updated_at`) VALUES
(3, 'Muzica', 'Vind je muziek terug in een nieuw soort koptelefoon! Hier zal je niet alleen muziek krijgen maar zal de koptelefoon ook een betere bas geven.', 2000, 630, '2019-12-31', 40, 'Een voorproevertje', NULL, NULL, NULL, 1, 1, '2019-05-31 12:36:13', '2019-05-31 13:08:32'),
(4, 'colastisch', 'Dit is een evenement voor Coca Cola lovers! feest met alle cola combinaties! proef en feest mee met verschillende dj\'s', 7000, 450, '2019-12-31', 100, 'colacombinatieproever', NULL, NULL, NULL, 1, 2, '2019-05-31 12:39:43', '2019-05-31 12:49:10'),
(5, 'Gamezella', 'een mega game met zoveel mogelijk filmcombinaties', 3000, NULL, '2019-12-31', NULL, NULL, NULL, NULL, NULL, 1, 4, '2019-05-31 12:42:00', '2019-05-31 12:42:00'),
(7, 'kort geheugen', 'Vergeet je veel. Vind je toestel die alles opslaat wat je denkt', 10000, NULL, '2019-12-31', NULL, NULL, NULL, NULL, NULL, 3, 5, '2019-05-31 12:45:55', '2019-05-31 12:45:55'),
(8, 'zichtbare muzieknoten', 'wouw geloof je het! met een hologram zal je alle noten kunnen zien', 9000, NULL, '2020-12-31', 100, 'koptelefoon', NULL, NULL, 1, 3, 1, '2019-05-31 12:47:10', '2019-05-31 13:09:42'),
(9, 'Footloos', 'er wordt gefeest zonder schoenen', 1000, NULL, '2019-12-31', NULL, NULL, NULL, NULL, NULL, 3, 2, '2019-05-31 12:48:39', '2019-05-31 12:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `reactie_tabel`
--

CREATE TABLE `reactie_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reactie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reactie_tabel`
--

INSERT INTO `reactie_tabel` (`id`, `reactie`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Wouw kei cool project hopelijk werkt het binnenkort!', 3, 3, '2019-05-31 13:08:49', '2019-05-31 13:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `reward_tabel`
--

CREATE TABLE `reward_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bedrag` int(11) NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `history_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soortgebruiker` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fototitel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotopad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `history_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `soortgebruiker`, `email`, `email_verified_at`, `password`, `fototitel`, `fotopad`, `credits`, `history_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anna De Langhe', 'admin', 'annadelanghe1@gmail.com', NULL, '$2y$10$QYRAbecGnwvkvoozXBr5cOU1J84TF.3N.T3iWBeG8QVWGun5TOUnW', NULL, NULL, 3300, NULL, NULL, '2019-05-30 17:29:05', '2019-05-31 13:09:42'),
(2, 'Eva De Langhe', NULL, 'eva@hotmail.be', NULL, '$2y$10$d/nCu8ydCl2mhmarcMQX3ufowq.UcWBikgxaYFKC74GV8Rkm5qFFa', NULL, NULL, 1800, NULL, NULL, '2019-05-31 06:08:58', '2019-05-31 11:10:02'),
(3, 'Fe De Langhe', NULL, 'fe@hotmail.be', NULL, '$2y$10$bcEBLRzEj3lTBQeFhp24BeH0xFBtzhCpqIBbtc5p/48SXfrf8skPW', NULL, NULL, 3900, NULL, NULL, '2019-05-31 10:13:05', '2019-05-31 13:09:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel_tabel`
--
ALTER TABLE `artikel_tabel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie_tabel`
--
ALTER TABLE `categorie_tabel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund_tabel`
--
ALTER TABLE `fund_tabel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fund_tabel_project_id_foreign` (`project_id`),
  ADD KEY `fund_tabel_user_id_foreign` (`user_id`);

--
-- Indexes for table `history_tabel`
--
ALTER TABLE `history_tabel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_tabel`
--
ALTER TABLE `image_tabel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_tabel_project_id_foreign` (`project_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_tabel`
--
ALTER TABLE `page_tabel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `project_tabel`
--
ALTER TABLE `project_tabel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_tabel_user_id_foreign` (`user_id`),
  ADD KEY `project_tabel_categorie_id_foreign` (`categorie_id`);

--
-- Indexes for table `reactie_tabel`
--
ALTER TABLE `reactie_tabel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reactie_tabel_project_id_foreign` (`project_id`),
  ADD KEY `reactie_tabel_user_id_foreign` (`user_id`);

--
-- Indexes for table `reward_tabel`
--
ALTER TABLE `reward_tabel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reward_tabel_project_id_foreign` (`project_id`),
  ADD KEY `reward_tabel_history_id_foreign` (`history_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_history_id_foreign` (`history_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel_tabel`
--
ALTER TABLE `artikel_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categorie_tabel`
--
ALTER TABLE `categorie_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fund_tabel`
--
ALTER TABLE `fund_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `history_tabel`
--
ALTER TABLE `history_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_tabel`
--
ALTER TABLE `image_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `page_tabel`
--
ALTER TABLE `page_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project_tabel`
--
ALTER TABLE `project_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `reactie_tabel`
--
ALTER TABLE `reactie_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reward_tabel`
--
ALTER TABLE `reward_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fund_tabel`
--
ALTER TABLE `fund_tabel`
  ADD CONSTRAINT `fund_tabel_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_tabel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fund_tabel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `image_tabel`
--
ALTER TABLE `image_tabel`
  ADD CONSTRAINT `image_tabel_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_tabel` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_tabel`
--
ALTER TABLE `project_tabel`
  ADD CONSTRAINT `project_tabel_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categorie_tabel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_tabel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reactie_tabel`
--
ALTER TABLE `reactie_tabel`
  ADD CONSTRAINT `reactie_tabel_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_tabel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reactie_tabel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reward_tabel`
--
ALTER TABLE `reward_tabel`
  ADD CONSTRAINT `reward_tabel_history_id_foreign` FOREIGN KEY (`history_id`) REFERENCES `history_tabel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reward_tabel_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_tabel` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_history_id_foreign` FOREIGN KEY (`history_id`) REFERENCES `history_tabel` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
