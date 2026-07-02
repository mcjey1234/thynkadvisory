-- MySQL dump 10.13  Distrib 8.4.10, for Linux (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.4.10

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `about_us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT 'About Us',
  `subtitle` varchar(255) DEFAULT NULL,
  `description` longtext,
  `mission` text,
  `vision` text,
  `about_values` text,
  `image` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_us`
--

LOCK TABLES `about_us` WRITE;
/*!40000 ALTER TABLE `about_us` DISABLE KEYS */;
INSERT INTO `about_us` VALUES (1,'About_us','Your Trusted Partne','<p>&nbsp;<strong>Job Hunting? Use AI to Boost Your Career</strong>Create a compelling CV and cover Letter, practice for mock interviews, and negotiate your salary offers with one tool. FREE for one month.&nbsp;</p>','Our mission is to empower businesses with cutting-edge technology solutions that drive growth, efficiency, and innovation in their respective industries.','o become a global leader in technology solutions, recognized for excellence, innovation, and commitment to creating a sustainable future for generations to come.','ntegrity, Innovation, Customer-Centricity, Excellence, and Sustainability','about/01KVMHMWHD8RXTG6R3RQFC2803.png','about/01KVMHMWHJ9YMJPV0014ATFJS8.png',1,'2026-06-21 07:34:45','2026-06-21 08:11:47');
/*!40000 ALTER TABLE `about_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (11,'banners/01KVKAFPMEGHM18MMS8D4XKT3R.png',NULL,1,'2026-06-20 20:10:20','2026-06-20 20:10:20'),(13,'banners/01KVKBJWF96NNZFKPEZ14SF4FP.png',NULL,1,'2026-06-20 20:29:33','2026-06-20 20:29:33');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab','i:1;',1782125078),('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer','i:1782125078;',1782125078),('laravel-cache-knowledge_base','a:10:{s:5:\"about\";a:6:{s:5:\"title\";s:8:\"About_us\";s:8:\"subtitle\";s:19:\"Your Trusted Partne\";s:11:\"description\";s:214:\"<p>&nbsp;<strong>Job Hunting? Use AI to Boost Your Career</strong>Create a compelling CV and cover Letter, practice for mock interviews, and negotiate your salary offers with one tool. FREE for one month.&nbsp;</p>\";s:7:\"mission\";s:153:\"Our mission is to empower businesses with cutting-edge technology solutions that drive growth, efficiency, and innovation in their respective industries.\";s:6:\"vision\";s:161:\"o become a global leader in technology solutions, recognized for excellence, innovation, and commitment to creating a sustainable future for generations to come.\";s:6:\"values\";s:73:\"ntegrity, Innovation, Customer-Centricity, Excellence, and Sustainability\";}s:8:\"services\";a:12:{i:0;a:3:{s:5:\"title\";s:8:\"About_us\";s:11:\"description\";s:19:\"<p>ffffffffffff</p>\";s:4:\"icon\";s:11:\"fa-bullhorn\";}i:1;a:3:{s:5:\"title\";s:8:\"About_us\";s:11:\"description\";s:16:\"<p>sxasXASXx</p>\";s:4:\"icon\";s:10:\"fa fa-task\";}i:2;a:3:{s:5:\"title\";s:8:\"About_us\";s:11:\"description\";s:27:\"<p>fdfdfsafsedfasfasfsa</p>\";s:4:\"icon\";s:9:\"ffdsfsafs\";}i:3;a:3:{s:5:\"title\";s:8:\"OUTGOING\";s:11:\"description\";s:17:\"<p>ssasaasdaD</p>\";s:4:\"icon\";N;}i:4;a:3:{s:5:\"title\";s:12:\"About_usrrrr\";s:11:\"description\";s:19:\"<p>xzxxzxxxzzxx</p>\";s:4:\"icon\";N;}i:5;a:3:{s:5:\"title\";s:8:\"About_us\";s:11:\"description\";s:62:\"<p><span style=\"text-decoration: underline;\">ffffff</span></p>\";s:4:\"icon\";N;}i:6;a:3:{s:5:\"title\";s:17:\"Digital Marketing\";s:11:\"description\";s:93:\"Boost your online presence with our comprehensive digital marketing strategies and campaigns.\";s:4:\"icon\";s:11:\"fa-bullhorn\";}i:7;a:3:{s:5:\"title\";s:15:\"Cloud Solutions\";s:11:\"description\";s:73:\"Secure and scalable cloud infrastructure solutions for modern businesses.\";s:4:\"icon\";s:8:\"fa-cloud\";}i:8;a:3:{s:5:\"title\";s:14:\"Data Analytics\";s:11:\"description\";s:83:\"Transform your raw data into actionable insights with our advanced analytics tools.\";s:4:\"icon\";s:13:\"fa-chart-line\";}i:9;a:3:{s:5:\"title\";s:41:\"Test Observer Service 2026-06-22 10:15:33\";s:11:\"description\";s:27:\"Testing observer from route\";s:4:\"icon\";N;}i:10;a:3:{s:5:\"title\";s:41:\"Test Observer Service 2026-06-22 10:21:06\";s:11:\"description\";s:27:\"Testing observer from route\";s:4:\"icon\";N;}i:11;a:3:{s:5:\"title\";s:41:\"Test Observer Service 2026-06-22 10:25:14\";s:11:\"description\";s:27:\"Testing observer from route\";s:4:\"icon\";N;}}s:4:\"team\";a:11:{i:0;a:5:{s:4:\"name\";s:8:\"John Doe\";s:8:\"position\";s:13:\"Founder & CEO\";s:3:\"bio\";s:169:\"John is a visionary leader with over 15 years of experience in instructional design and gamification. He founded Sofel Labs with a mission to transform how people learn.\";s:5:\"email\";s:18:\"john@sofellabs.com\";s:5:\"phone\";N;}i:1;a:5:{s:4:\"name\";s:11:\"Jane Akinyi\";s:8:\"position\";s:29:\"Senior Instructional Designer\";s:3:\"bio\";s:239:\"Jane specializes in creating engaging learning experiences with 8+ years of experience in curriculum development and instructional design. She has designed programs for NGOs, corporations, and educational institutions across the continent.\";s:5:\"email\";s:18:\"jane@sofellabs.com\";s:5:\"phone\";N;}i:2;a:5:{s:4:\"name\";s:10:\"Jane Smith\";s:8:\"position\";s:28:\"Head of Instructional Design\";s:3:\"bio\";s:157:\"Jane brings a wealth of experience in creating engaging learning experiences. She specializes in designing learner-centered programs that drive real results.\";s:5:\"email\";s:18:\"jane@sofellabs.com\";s:5:\"phone\";N;}i:3;a:5:{s:4:\"name\";s:13:\"Peter Ochieng\";s:8:\"position\";s:23:\"Gamification Specialist\";s:3:\"bio\";s:193:\"Peter is an expert in game mechanics and motivational design, helping organizations create compelling learning experiences that drive results. He has a background in game design and psychology.\";s:5:\"email\";s:19:\"peter@sofellabs.com\";s:5:\"phone\";N;}i:4;a:5:{s:4:\"name\";s:12:\"Mike Johnson\";s:8:\"position\";s:30:\"Senior Gamification Specialist\";s:3:\"bio\";s:154:\"Mike is an expert in game-based learning and motivational design. He develops innovative gamification strategies that keep learners engaged and motivated.\";s:5:\"email\";s:18:\"mike@sofellabs.com\";s:5:\"phone\";N;}i:5;a:5:{s:4:\"name\";s:13:\"Sarah Wanjiku\";s:8:\"position\";s:14:\"UI/UX Designer\";s:3:\"bio\";s:182:\"Sarah creates beautiful, intuitive learning interfaces that enhance user engagement and learning outcomes. She specializes in designing accessible and inclusive learning experiences.\";s:5:\"email\";s:19:\"sarah@sofellabs.com\";s:5:\"phone\";N;}i:6;a:5:{s:4:\"name\";s:14:\"Sarah Williams\";s:8:\"position\";s:28:\"Learning Experience Designer\";s:3:\"bio\";s:174:\"Sarah creates immersive learning experiences that combine instructional design with cutting-edge technology. She is passionate about making learning accessible and enjoyable.\";s:5:\"email\";s:19:\"sarah@sofellabs.com\";s:5:\"phone\";N;}i:7;a:5:{s:4:\"name\";s:12:\"David Omondi\";s:8:\"position\";s:17:\"Content Developer\";s:3:\"bio\";s:180:\"David develops engaging learning content that combines educational excellence with gamification principles. He has created content for diverse audiences across multiple industries.\";s:5:\"email\";s:19:\"david@sofellabs.com\";s:5:\"phone\";N;}i:8;a:5:{s:4:\"name\";s:11:\"David Brown\";s:8:\"position\";s:28:\"Technology & Innovation Lead\";s:3:\"bio\";s:162:\"David leads the technology strategy at Sofel Labs. He explores emerging technologies to enhance learning experiences and drive innovation in instructional design.\";s:5:\"email\";s:19:\"david@sofellabs.com\";s:5:\"phone\";N;}i:9;a:5:{s:4:\"name\";s:13:\"Grace Muthoni\";s:8:\"position\";s:15:\"Project Manager\";s:3:\"bio\";s:181:\"Grace ensures seamless project delivery from conception to completion. With a background in learning and development, she coordinates our teams and client relationships effectively.\";s:5:\"email\";s:19:\"grace@sofellabs.com\";s:5:\"phone\";N;}i:10;a:5:{s:4:\"name\";s:11:\"Emily Davis\";s:8:\"position\";s:22:\"Client Success Manager\";s:3:\"bio\";s:151:\"Emily ensures our clients achieve their learning goals through our solutions. She manages client relationships and ensures successful program delivery.\";s:5:\"email\";s:19:\"emily@sofellabs.com\";s:5:\"phone\";N;}}s:7:\"process\";a:11:{i:0;a:3:{s:4:\"step\";s:2:\"02\";s:5:\"title\";s:36:\"🏆 Level Up: Knowledge Acquisition\";s:11:\"description\";s:124:\"Engage with interactive content and complete mini-quizzes to earn XP points. Each correct answer unlocks new learning paths!\";}i:1;a:3:{s:4:\"step\";s:2:\"03\";s:5:\"title\";s:20:\"⭐ Skill Challenges\";s:11:\"description\";s:116:\"Apply your knowledge through real-world scenario challenges. Complete tasks to earn stars and climb the leaderboard!\";}i:2;a:3:{s:4:\"step\";s:2:\"04\";s:5:\"title\";s:23:\"🎮 Interactive Quests\";s:11:\"description\";s:123:\"Embark on learning quests with different difficulty levels. Each completed quest rewards you with exclusive digital badges.\";}i:3;a:3:{s:4:\"step\";s:2:\"05\";s:5:\"title\";s:25:\"🏅 Achievement Unlocked\";s:11:\"description\";s:105:\"Earn achievement trophies for completing milestones. Collect all achievements to become a master learner!\";}i:4;a:3:{s:4:\"step\";s:2:\"06\";s:5:\"title\";s:23:\"⚡ Power-Up Challenges\";s:11:\"description\";s:113:\"Access bonus content and power-up modules by maintaining your learning streak. Daily challenges keep you engaged!\";}i:5;a:3:{s:4:\"step\";s:2:\"07\";s:5:\"title\";s:22:\"📊 Leaderboard Climb\";s:11:\"description\";s:111:\"Track your progress and compete with peers on the live leaderboard. Top performers get recognition and rewards!\";}i:6;a:3:{s:4:\"step\";s:2:\"08\";s:5:\"title\";s:25:\"🎪 Multiplayer Learning\";s:11:\"description\";s:114:\"Join collaborative group challenges and team competitions. Work together to earn team badges and exclusive prizes.\";}i:7;a:3:{s:4:\"step\";s:2:\"09\";s:5:\"title\";s:18:\"💎 Mastery Level\";s:11:\"description\";s:114:\"Complete advanced mastery challenges to prove your expertise. Unlock secret content and become a certified expert!\";}i:8;a:3:{s:4:\"step\";s:2:\"10\";s:5:\"title\";s:18:\"🎁 Reward Center\";s:11:\"description\";s:115:\"Redeem your earned points for exclusive rewards, certificates, and special privileges within the learning platform.\";}i:9;a:3:{s:4:\"step\";s:2:\"11\";s:5:\"title\";s:20:\"🔄 Challenge Reset\";s:11:\"description\";s:125:\"Refreshed challenges and new quests are available! Reset your progress to try different learning paths and earn more rewards.\";}i:10;a:3:{s:4:\"step\";s:2:\"12\";s:5:\"title\";s:17:\"👑 Grand Master\";s:11:\"description\";s:115:\"Congratulations! You\'ve completed all levels. Receive your Grand Master certificate and lifetime achievement badge!\";}}s:10:\"milestones\";a:16:{i:0;a:4:{s:4:\"year\";s:4:\"2020\";s:5:\"month\";s:7:\"January\";s:5:\"title\";s:15:\"Company Founded\";s:11:\"description\";s:86:\"Sofel Labs was established with a vision to transform e-learning through gamification.\";}i:1;a:4:{s:4:\"year\";s:4:\"2020\";s:5:\"month\";s:7:\"January\";s:5:\"title\";s:18:\"Sofel Labs Founded\";s:11:\"description\";s:120:\"Sofel Labs was established with a vision to transform learning through gamification and innovative instructional design.\";}i:2;a:4:{s:4:\"year\";s:4:\"2020\";s:5:\"month\";s:4:\"June\";s:5:\"title\";s:18:\"First Major Client\";s:11:\"description\";s:66:\"Signed our first corporate client for gamified training solutions.\";}i:3;a:4:{s:4:\"year\";s:4:\"2020\";s:5:\"month\";s:4:\"June\";s:5:\"title\";s:24:\"First Client Partnership\";s:11:\"description\";s:95:\"We partnered with our first corporate client to deliver a gamified compliance training program.\";}i:4;a:4:{s:4:\"year\";s:4:\"2021\";s:5:\"month\";s:5:\"March\";s:5:\"title\";s:13:\"Expanded Team\";s:11:\"description\";s:70:\"Grew our team to 10+ instructional designers and gamification experts.\";}i:5;a:4:{s:4:\"year\";s:4:\"2021\";s:5:\"month\";s:5:\"March\";s:5:\"title\";s:18:\"Expanded to Africa\";s:11:\"description\";s:77:\"Sofel Labs expanded operations to serve clients across the African continent.\";}i:6;a:4:{s:4:\"year\";s:4:\"2021\";s:5:\"month\";s:9:\"September\";s:5:\"title\";s:21:\"Launched New Platform\";s:11:\"description\";s:70:\"Released our proprietary gamification platform for enterprise clients.\";}i:7;a:4:{s:4:\"year\";s:4:\"2021\";s:5:\"month\";s:9:\"September\";s:5:\"title\";s:21:\"Reached 100+ Programs\";s:11:\"description\";s:88:\"We successfully delivered over 100 gamified learning programs across various industries.\";}i:8;a:4:{s:4:\"year\";s:4:\"2022\";s:5:\"month\";s:7:\"January\";s:5:\"title\";s:23:\"100+ Projects Completed\";s:11:\"description\";s:63:\"Reached milestone of 100 successful gamified training projects.\";}i:9;a:4:{s:4:\"year\";s:4:\"2022\";s:5:\"month\";s:8:\"February\";s:5:\"title\";s:25:\"International Recognition\";s:11:\"description\";s:96:\"Sofel Labs received recognition as a leading innovator in instructional design and gamification.\";}i:10;a:4:{s:4:\"year\";s:4:\"2022\";s:5:\"month\";s:6:\"August\";s:5:\"title\";s:23:\"International Expansion\";s:11:\"description\";s:62:\"Expanded operations to serve clients across Africa and beyond.\";}i:11;a:4:{s:4:\"year\";s:4:\"2022\";s:5:\"month\";s:8:\"November\";s:5:\"title\";s:13:\"USA Expansion\";s:11:\"description\";s:67:\"We opened our USA office to better serve our international clients.\";}i:12;a:4:{s:4:\"year\";s:4:\"2023\";s:5:\"month\";s:3:\"May\";s:5:\"title\";s:14:\"Industry Award\";s:11:\"description\";s:64:\"Received recognition as the Best Gamification Training Provider.\";}i:13;a:4:{s:4:\"year\";s:4:\"2023\";s:5:\"month\";s:8:\"December\";s:5:\"title\";s:20:\"500+ Learners Served\";s:11:\"description\";s:57:\"Impacted over 500 learners through our gamified programs.\";}i:14;a:4:{s:4:\"year\";s:4:\"2024\";s:5:\"month\";s:5:\"March\";s:5:\"title\";s:18:\"New Office Opening\";s:11:\"description\";s:86:\"Opened new state-of-the-art office in Nairobi to better serve our growing client base.\";}i:15;a:4:{s:4:\"year\";s:4:\"2024\";s:5:\"month\";s:6:\"August\";s:5:\"title\";s:18:\"Global Recognition\";s:11:\"description\";s:82:\"Featured as a top gamification company in Africa by leading industry publications.\";}}s:12:\"footer_menus\";a:8:{i:0;a:2:{s:5:\"label\";s:4:\"Home\";s:3:\"url\";s:1:\"/\";}i:1;a:2:{s:5:\"label\";s:8:\"About Us\";s:3:\"url\";s:6:\"/about\";}i:2;a:2:{s:5:\"label\";s:8:\"Services\";s:3:\"url\";s:9:\"/services\";}i:3;a:2:{s:5:\"label\";s:9:\"Portfolio\";s:3:\"url\";s:10:\"/portfolio\";}i:4;a:2:{s:5:\"label\";s:4:\"Blog\";s:3:\"url\";s:5:\"/blog\";}i:5;a:2:{s:5:\"label\";s:7:\"Contact\";s:3:\"url\";s:8:\"/contact\";}i:6;a:2:{s:5:\"label\";s:14:\"Privacy Policy\";s:3:\"url\";s:15:\"/privacy-policy\";}i:7;a:2:{s:5:\"label\";s:16:\"Terms of Service\";s:3:\"url\";s:6:\"/terms\";}}s:12:\"social_links\";a:5:{i:0;a:3:{s:8:\"platform\";s:8:\"Facebook\";s:5:\"label\";s:8:\"Facebook\";s:3:\"url\";s:30:\"https://facebook.com/your-page\";}i:1;a:3:{s:8:\"platform\";s:7:\"Twitter\";s:5:\"label\";s:7:\"Twitter\";s:3:\"url\";s:31:\"https://twitter.com/your-handle\";}i:2;a:3:{s:8:\"platform\";s:9:\"Instagram\";s:5:\"label\";s:9:\"Instagram\";s:3:\"url\";s:33:\"https://instagram.com/your-handle\";}i:3;a:3:{s:8:\"platform\";s:8:\"LinkedIn\";s:5:\"label\";s:8:\"LinkedIn\";s:3:\"url\";s:41:\"https://linkedin.com/company/your-company\";}i:4;a:3:{s:8:\"platform\";s:7:\"YouTube\";s:5:\"label\";s:7:\"YouTube\";s:3:\"url\";s:32:\"https://youtube.com/your-channel\";}}s:12:\"header_menus\";a:5:{i:0;a:3:{s:5:\"label\";s:8:\"About Us\";s:3:\"url\";s:6:\"/about\";s:8:\"children\";a:4:{i:0;a:2:{s:5:\"label\";s:9:\"Milestone\";s:3:\"url\";s:11:\"/milestones\";}i:1;a:2:{s:5:\"label\";s:12:\"Team_Members\";s:3:\"url\";s:5:\"/team\";}i:2;a:2:{s:5:\"label\";s:10:\"Who We Are\";s:3:\"url\";s:6:\"/about\";}i:3;a:2:{s:5:\"label\";s:11:\"Our History\";s:3:\"url\";s:14:\"/about/history\";}}}i:1;a:3:{s:5:\"label\";s:8:\"Services\";s:3:\"url\";s:9:\"/services\";s:8:\"children\";a:3:{i:0;a:2:{s:5:\"label\";s:11:\"Methodology\";s:3:\"url\";s:8:\"/process\";}i:1;a:2:{s:5:\"label\";s:12:\"Core-Service\";s:3:\"url\";s:9:\"/services\";}i:2;a:2:{s:5:\"label\";s:12:\"UI/UX Design\";s:3:\"url\";s:16:\"/services/design\";}}}i:2;a:3:{s:5:\"label\";s:12:\"How It Works\";s:3:\"url\";s:1:\"/\";s:8:\"children\";a:1:{i:0;a:2:{s:5:\"label\";s:8:\"The flow\";s:3:\"url\";s:6:\"/about\";}}}i:3;a:2:{s:5:\"label\";s:10:\"Contact us\";s:3:\"url\";s:8:\"/contact\";}i:4;a:2:{s:5:\"label\";s:14:\"Discovery Call\";s:3:\"url\";s:10:\"/discovery\";}}s:7:\"company\";a:7:{s:4:\"name\";s:10:\"Sofel Labs\";s:7:\"founded\";s:4:\"2020\";s:8:\"location\";s:14:\"Nairobi, Kenya\";s:5:\"phone\";s:16:\"+254 700 123 456\";s:5:\"email\";s:18:\"info@sofellabs.com\";s:7:\"website\";s:16:\"http://localhost\";s:8:\"calendly\";s:45:\"https://calendly.com/mwangikamau/consultation\";}s:6:\"topics\";a:4:{s:12:\"gamification\";s:157:\"We use proven frameworks like Octalysis and our 4-pillar approach (Cognitive, Motivational, Balancing, Presentation) to create engaging learning experiences.\";s:20:\"instructional design\";s:110:\"We combine proven learning theories with modern technology to create interactive, effective training programs.\";s:19:\"compliance training\";s:102:\"We transform mandatory training into engaging, memorable experiences that improve knowledge retention.\";s:22:\"leadership development\";s:98:\"We design programs that build leadership skills through immersive, practical learning experiences.\";}}',1782131996),('laravel-cache-livewire-rate-limiter:287b58015ec6ed41cc45119562d7402bb1069aed','i:1;',1782106577),('laravel-cache-livewire-rate-limiter:287b58015ec6ed41cc45119562d7402bb1069aed:timer','i:1782106577;',1782106577);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `message` text NOT NULL,
  `status` enum('unread','read','replied') DEFAULT 'unread',
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` text,
  `session_id` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (2,'John Doe','john@example.com','','+254700000000','I want to discuss my app idea.','read',NULL,NULL,NULL,1,'2026-06-18 11:25:14','2026-06-21 13:11:23'),(3,'Jared Ogutu','ogutujared110@gmail.com','xaAZA','0757275827','edssadfczczczczczxczczxcsczSczCZCZxx','unread','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',NULL,0,'2026-06-21 13:20:40','2026-06-21 13:20:40'),(4,'Jared Ogutu','ogutujared110@gmail.com','xaAZA','0757275827','sasadasdxasdcascdaxasxasdadasddad','unread','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',NULL,0,'2026-06-21 18:26:12','2026-06-21 18:26:12'),(5,'Guest','guest-CkFH69plvL6oKn1Wx8iFFk3FWuSHRsi5ADXVNkqF@chat.sofellabs.com','Chat Session',NULL,'Started chat session','unread','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','CkFH69plvL6oKn1Wx8iFFk3FWuSHRsi5ADXVNkqF',0,'2026-06-22 05:33:22','2026-06-22 05:33:22'),(6,'jerry','ogutujared@gmail.com','Chat Session',NULL,'Started chat session','unread','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt',0,'2026-06-22 05:36:50','2026-06-22 08:47:41'),(7,'Morris Mbogo','devapps@aphrc.org','xaAZA','020400100','asdxaCsaDfsaefcsaefasefsefesdcd','unread','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',NULL,0,'2026-06-22 05:57:01','2026-06-22 05:57:01'),(8,'Morris Mbogo','devapps@aphrc.org','xaAZA','020400100','asdxaCsaDfsaefcsaefasefsefesdcd','unread','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',NULL,0,'2026-06-22 05:57:03','2026-06-22 05:57:03'),(9,'Morris Mbogo','devapps@aphrc.org','xaAZA','020400100','asdxaCsaDfsaefcsaefasefsefesdcd','unread','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',NULL,0,'2026-06-22 05:57:07','2026-06-22 05:57:07'),(10,'Morris Mbogo','devapps@aphrc.org','xaAZA','020400100','asdxaCsaDfsaefcsaefasefsefesdcdddsdsd','unread','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',NULL,0,'2026-06-22 05:57:10','2026-06-22 05:57:10'),(11,'Morris Mbogo','devapps@aphrc.org','xaAZA','020400100','asdxaCsaDfsaefcsaefasefsefesdcdddsdsd','unread','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',NULL,0,'2026-06-22 05:57:11','2026-06-22 05:57:11'),(12,'Morris Mbogo','devapps@aphrc.org','xaAZA','020400100','asdxaCsaDfsaefcsaefasefsefesdcdddsdsd','unread','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',NULL,0,'2026-06-22 05:57:11','2026-06-22 05:57:11'),(13,'Morris Mbogo','devapps@aphrc.org','xaAZA','020400100','asdxaCsaDfsaefcsaefasefsefesdcdddsdsd','unread','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',NULL,0,'2026-06-22 05:57:12','2026-06-22 05:57:12'),(14,'Morris Mbogo','devapps@aphrc.org','xaAZA','020400100','asdxaCsaDfsaefcsaefasefsefesdcdddsdsd','read','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',NULL,1,'2026-06-22 05:57:16','2026-06-22 05:58:19');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conversations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `contact_id` int DEFAULT NULL,
  `user_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ai_response` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversations`
--

LOCK TABLES `conversations` WRITE;
/*!40000 ALTER TABLE `conversations` DISABLE KEYS */;
INSERT INTO `conversations` VALUES (1,5,'HEEE','Hello there! It\'s great to hear from you.\n\nI\'m here to help you explore instructional design, gamification, or anything else Sofel Labs offers. Could you please tell me a bit more about what you\'re looking for or how I can assist you today?','CkFH69plvL6oKn1Wx8iFFk3FWuSHRsi5ADXVNkqF','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',0,'2026-06-22 05:33:24','2026-06-22 05:33:24'),(2,5,'I WANT TO TALK TO AGENT','Hello there! I\'d be happy to help you connect with a member of our team.\n\nTo ensure you get the most relevant assistance, could you please tell me a little more about what you\'d like to discuss? Are you interested in instructional design, gamification, or perhaps exploring a new project?\n\nOnce I have a better understanding, I can direct you to the best person. You can also schedule a free consultation directly with one of our experts at your convenience through our website. They\'d be delighted to chat with you!','CkFH69plvL6oKn1Wx8iFFk3FWuSHRsi5ADXVNkqF','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',0,'2026-06-22 05:33:50','2026-06-22 05:33:50'),(3,5,'yes i want a instructional','That\'s wonderful! We\'re excited to help you with your instructional needs.\n\nTo ensure we design the perfect solution for you, could you tell us a bit more about what you\'re looking for? For example:\n\n*   Who is the training for?\n*   What do you want them to learn or be able to do?\n*   What kind of instruction are you imagining (e','CkFH69plvL6oKn1Wx8iFFk3FWuSHRsi5ADXVNkqF','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:34:22','2026-06-22 05:35:28'),(4,6,'hello','Hello there! I\'m Sofel AI from Sofel Labs, where we specialize in instructional design and gamification to create engaging learning experiences.\n\nHow can I assist you today? Please let me know what you\'re looking for, and I\'ll be happy to help!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:36:53','2026-06-22 11:32:29'),(5,6,'please connect me to your agent','Hello! I\'m Sofel AI, your virtual assistant here at Sofel Labs','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:37:13','2026-06-22 11:32:29'),(6,6,'i want agent','Hello there! Thanks for reaching out. To best assist you, could you please tell me a bit','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:37:25','2026-06-22 11:32:29'),(7,6,'gamification','That\'s a fantastic topic! Gamification is at the heart of what we do at Sofel Labs, transforming learning and engagement through playful design.\n\nTo help me give you the most relevant information, could you tell me a little more about what you\'re hoping to achieve with gamification? Are you looking to boost employee training, customer loyalty, or something else?\n\nWe\'d love to explore the possibilities with you. Feel free to schedule a free consultation to discuss your specific needs!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:39:17','2026-06-22 11:32:29'),(8,6,'please can u transfer me to your agent','Hello! I am Sofel AI, your virtual assistant for Sofel Labs. While','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:39:50','2026-06-22 11:32:29'),(9,6,'i meant i want person human agent','Hello! I understand you\'d like to speak with a human agent. We\'d be happy to connect you with one of our instructional design or gamification experts.\n\nThe best way to do this is to schedule a brief call where we can discuss your specific needs in detail. This allows us to ensure the right person is available to assist you.\n\nWould you like to schedule a free consultation? It\'s a great opportunity to explore how Sofel Labs can help you achieve your learning and engagement goals.','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:40:16','2026-06-22 11:32:29'),(10,6,'yes please','Wonderful! To ensure I can best assist you, could you please tell me what you','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:40:34','2026-06-22 11:32:29'),(11,6,'i want to plan the service so i want to book it','Hello! We\'re thrilled you\'re interested in planning and booking a service with Sofel Labs.\n\nTo ensure we understand your specific needs for instructional design or gamification and tailor the perfect solution for you, a free consultation is the ideal first step. During this brief chat, we can discuss your goals, explore our service options, and outline how we can best support your project.\n\nWould you like to schedule a free consultation? We\'d be happy to help you get started!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:41:00','2026-06-22 11:32:29'),(12,6,'yes  i want to schedule free meeting consultation','That\'s wonderful! We\'d be happy to set up a free consultation for you.\n\nTo help us find the best time and connect you with the right expert, could you please tell us a little more about what you\'d like to discuss?\n\nAlso, what days and times generally work best for your schedule? Once we have this information, we can arrange everything for you.','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:41:31','2026-06-22 11:32:29'),(13,6,'tomorrow okay at 11.am okay','Thanks for your message! To ensure I have the correct information, could you please remind me what we have scheduled for tomorrow at 11 AM? I want to make sure I\'m fully prepared.','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:42:02','2026-06-22 11:32:29'),(14,6,'okay for gamification project','Great question about gamification! At Sofel Labs, we use proven frameworks to make learning engaging and effective. We focus on four key pillars: Cognitive Mechanics, Motivational Mechanics, Balancing, and Presentation. What specific aspect would you like to explore?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:42:23','2026-06-22 11:32:29'),(15,6,'i want to make everything well okay','👋 Hello! I\'m Sofel AI, your virtual assistant. I\'m here to answer questions about instructional design, gamification, and learning strategy. What can I help you with today?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:42:44','2026-06-22 11:32:29'),(16,6,'yes plese i want the human agent','I\'m having a moment! What would you like to know about Sofel Labs?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:50:49','2026-06-22 11:32:29'),(17,6,'i want to speak with your agent the human agent','I hear you loud and clear! It sounds like you\'re really keen to connect with one of our human experts, and I completely understand wanting to talk things through directly.\n\nThe absolute best way to do that is to schedule a free consultation. This ensures you get dedicated time with the right person from our team – whether it\'s an instructional designer or a gamification specialist – who can dive deep into your specific needs and project ideas.\n\nWould you like me to help you set that up right now? To make sure we can arrange this smoothly and have someone follow up with you, could you please share your name, email address, and a phone number?\n\nOnce I have that, I can either help you find a suitable time or provide you with our direct booking link!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:51:12','2026-06-22 11:32:29'),(18,6,'gamification','I\'m having a moment! What would you like to know about Sofel Labs?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 05:59:39','2026-06-22 11:32:29'),(19,6,'i want to know about team members','I\'m here to help! What can I assist you with today?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 06:13:27','2026-06-22 11:32:29'),(20,6,'HRRR','Hello there! I understand you\'d like to connect with a human agent. I can certainly help you with that!\n\nYou can reach our team directly using the contact information below:\n\n*   **Phone:** +254 700 123 456\n*   **Email:** info@sofellabs.com\n\nThey\'ll be delighted to assist you further. Please let me know if there\'s anything else I can help you with in the meantime!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 07:33:47','2026-06-22 11:32:29'),(21,6,'TELL ME MORE ABOUT SOFEL LABS','Hello again! I\'d be delighted to tell you more about Sofel Labs.\n\nAt Sofel Labs, our mission is to empower businesses with cutting-edge technology solutions designed to drive growth, efficiency, and innovation across various industries. We envision becoming a global leader in technology solutions, known for excellence, innovation, and our commitment to creating a sustainable future.\n\nWe offer a range of services to help businesses thrive, including:\n*   **Digital Marketing:** To boost your online presence with comprehensive strategies.\n*   **Cloud Solutions:** Providing secure and scalable infrastructure.\n*   **Data Analytics:** Transforming your raw data into actionable insights.\n\nWe\'re passionate about helping businesses succeed through technology!\n\nIs there anything specific about Sofel Labs you\'d like to know more about?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 07:34:16','2026-06-22 11:32:29'),(22,6,'GAMIFOCATION','It sounds like you\'re really interested in gamification, which is fantastic because it\'s at the core of what we do here at Sofel Labs! We use game mechanics and motivational design to create engaging experiences that drive results, whether it\'s for training, loyalty, or other goals.\n\nIf you\'d like to dive deeper into how gamification can specifically benefit your needs, I can connect you with one of','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 07:35:18','2026-06-22 11:32:29'),(23,6,'I WANT TO BOOK CONSULTATION OKAY','That\'s wonderful! I\'d be happy to help you book a consultation. It\'s a great way to discuss how our solutions can empower your business.\n\nYou can easily schedule your free consultation directly through our Calendly link: [Insert Calendly Link Here]\n\nTo ensure our team can best prepare for your consultation and reach out, could you please share your name, email address, and a contact number with me? This will help us make sure everything is set for a productive discussion!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 07:35:36','2026-06-22 11:32:29'),(24,6,'tell me the mission about sofel labs','Hello there! I\'d be happy to share Sofel Labs\' mission with you.\n\nOur mission is to empower businesses with cutting-edge technology solutions that drive growth, efficiency, and innovation in their respective industries. We\'re passionate about helping businesses thrive by leveraging the power of technology.\n\nIs there anything else you\'d like to know about Sofel Labs today?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 07:36:10','2026-06-22 11:32:29'),(25,6,'hello','👋 Thanks for reaching out! Before we continue, I need a few details from you:\n\n📋 I need: your full name, your email address and your phone number.\n Please share your name (e.g., \'John Doe\'). Please provide your email (e.g., \'john@example.com\'). Please give your phone number (e.g., \'+254 700 123 456\' or \'0700123456\').\n\n💡 Tip: You can share all your info at once like:\n\"My name is John Doe, email is john@example.com, and phone is 0700123456.\"\n\nOnce I have these, I\'ll be able to assist you better! 😊','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:31:01','2026-06-22 11:32:29'),(26,6,'jerry','👋 Thanks for reaching out! Before we continue, I need a few details from you:\n\n📋 I need: your full name, your email address and your phone number.\n Please share your name (e.g., \'John Doe\'). Please provide your email (e.g., \'john@example.com\'). Please give your phone number (e.g., \'+254 700 123 456\' or \'0700123456\').\n\n💡 Tip: You can share all your info at once like:\n\"My name is John Doe, email is john@example.com, and phone is 0700123456.\"\n\nOnce I have these, I\'ll be able to assist you better! 😊','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:32:25','2026-06-22 11:32:29'),(27,6,'hello','Hi there! Before we continue, could you please tell me your name and email address?\n\nYou can share both at once like:\n\"My name is John Doe and my email is john@example.com\"','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:41:09','2026-06-22 11:32:29'),(28,6,'jerry','Hi there! Before we continue, could you please tell me your name and email address?\n\nYou can share both at once like:\n\"My name is John Doe and my email is john@example.com\"','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:41:23','2026-06-22 11:32:29'),(29,6,'hello','Hi there! Could you please share your name and email address so I can assist you better?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:45:08','2026-06-22 11:32:29'),(30,6,'jerry','Hi there! Could you please share your name and email address so I can assist you better?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:45:19','2026-06-22 11:32:29'),(31,6,'jerry','Hi there! Could you please share your name and email address so I can assist you better?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:45:26','2026-06-22 11:32:29'),(32,6,'my name is jerry','Nice to meet you, jerry! Could you please share your email address?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:45:31','2026-06-22 11:32:29'),(33,6,'hello','Nice to meet you, jerry! Could you please share your email address?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:47:26','2026-06-22 11:32:29'),(34,6,'ogutujared@gmail.com','Thank you for sharing your email, jerry! I appreciate you providing that.\n\nI\'m Sofel AI, your virtual assistant here at Sofel Labs. If you\'re looking to connect with a human agent directly, you can reach out to our team using the following contact information:\n\n*   **Phone:** +254 700 123 456\n*   **Email:** info@sofellabs.com\n\nThey\'ll be delighted to assist you further!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:47:45','2026-06-22 11:32:29'),(35,6,'or i want to know about the consultation okay','I\'d be happy to tell you more about our consultations!\n\nAt Sofel Labs, we offer consultations to understand your specific needs and explore how our cutting-edge technology solutions, including digital marketing, cloud solutions, and data analytics, can drive growth and innovation for your business. It\'s a great way to discuss your goals and see how we can help transform them into reality.\n\nYou can easily schedule a free consultation with us using this link: https://cal.com/jared-ogutu-swvv6o\n\nLooking forward to connecting with you!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:49:24','2026-06-22 11:32:29'),(36,6,'yes','I understand you\'d like to connect with a human agent, Jerry!\n\nI can certainly help you with that. You can reach our team directly using the contact information below:\n\n*   **Phone:** +254 700 123 456\n*   **Email:** info@sofellabs.com\n\nThey\'ll be delighted to assist you further with any questions you might have about our services, including gamification!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:57:37','2026-06-22 11:32:29'),(37,6,'i want to book','Hello there, Jerry! I\'m Sofel AI from Sofel Labs.\n\nI\'d be delighted to help you book! You can easily schedule a free consultation with our experts to discuss your needs and how Sofel Labs can empower your business.\n\nPlease use this link to book your session: [Schedule your free consultation](https://cal.com/jared-ogutu-swvv6o)\n\nWe look forward to connecting with you!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 08:57:56','2026-06-22 11:32:29'),(38,6,'yes','I\'m here to help. What would you like to know about Sofel Labs? I can tell you about our team, services, or how we can help with instructional design and gamification.','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 09:01:29','2026-06-22 11:32:29'),(39,6,'services','We offer these services:\n- Digital Marketing: Boost your online presence with our comprehensive digital marketing strategies and campaigns.\n- Cloud Solutions: Secure and scalable cloud infrastructure solutions for modern businesses.\n- Data Analytics: Transform your raw data into actionable insights with our advanced analytics tools.\n\nWhich service interests you most?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 09:01:46','2026-06-22 11:32:29'),(40,6,'i wan to book','I\'d love to help you book a consultation. You can schedule a meeting here:\n[Schedule your free consultation](https://cal.com/jared-ogutu-swvv6o)','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 09:02:18','2026-06-22 11:32:29'),(41,6,'okay then','Understood! You\'ve been asking to connect with an agent, and I appreciate your patience.\n\nWhile I\'m an AI assistant, I can definitely help you get in touch with our team. You can reach a human agent directly through these channels:\n\n*   **Phone:** +254 700 123 456\n*   **Email:** info@sofellabs.com\n*   Or, you can conveniently **book a consultation** at your preferred time: [Book a consultation](https://cal.com/jared-ogutu-swvv6o)\n\nIn the meantime, if you have any questions about our services, gamification, compliance training, or instructional design, I\'m here to provide immediate information!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 09:02:27','2026-06-22 11:32:29'),(42,6,'whats my name','Hello there! Based on our chat, your name is Jerry.\n\nHow can I help you further today, Jerry? Perhaps you\'d like to know more about our services, gamification, or something else? I\'m here to assist!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 09:03:14','2026-06-22 11:32:29'),(43,6,'okay bye','It was a pleasure chatting with you today!\n\nIf you have any more questions or need assistance in the future, please don\'t hesitate to reach out. We\'re always here to help you explore how Sofel Labs can drive growth, efficiency, and innovation for your business.\n\nHave a wonderful day!','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 09:10:35','2026-06-22 11:32:29'),(44,6,'about us','Hello jerry! I\'m happy to tell you more about Sofel Labs!\n\nAt Sofel Labs, our mission is to empower businesses with cutting-edge technology solutions that drive growth, efficiency, and innovation. We envision becoming a global leader in technology solutions, recognized for excellence, innovation, and our commitment to creating a sustainable future.\n\nWe offer a range of services designed to help businesses thrive:\n*   **Digital Marketing:** To boost your online presence with comprehensive strategies.\n*   **Cloud Solutions:** For secure and scalable infrastructure.\n*   **Data Analytics:** To transform your raw data into actionable insights.\n\nWe\'re passionate about helping businesses succeed through technology! Is there anything specific you\'d like to know more about?','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',1,'2026-06-22 09:37:02','2026-06-22 11:32:29'),(45,6,'hello','Hello there, jerry! I\'m Sofel AI, your friendly assistant from Sofel Labs.\n\nOur mission is','A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36',0,'2026-06-22 11:40:01','2026-06-22 11:40:01');
/*!40000 ALTER TABLE `conversations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footer_items`
--

DROP TABLE IF EXISTS `footer_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `footer_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` enum('menu','social','copyright') NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `content` text,
  `is_active` tinyint(1) DEFAULT '1',
  `display_order` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_type` (`type`),
  KEY `idx_is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footer_items`
--

LOCK TABLES `footer_items` WRITE;
/*!40000 ALTER TABLE `footer_items` DISABLE KEYS */;
INSERT INTO `footer_items` VALUES (1,'copyright','Copyright Text',NULL,NULL,NULL,'© 2026 Sofel Labs. All rights reserved.',1,1,'2026-06-19 07:31:56','2026-06-19 07:31:56'),(2,'social','Facebook','https://facebook.com/your-page','fa-facebook','Facebook',NULL,1,1,'2026-06-19 07:32:09','2026-06-19 07:32:09'),(3,'social','Twitter','https://twitter.com/your-handle','fa-twitter','Twitter',NULL,1,2,'2026-06-19 07:32:09','2026-06-19 07:32:09'),(4,'social','Instagram','https://instagram.com/your-handle','fa-instagram','Instagram',NULL,1,3,'2026-06-19 07:32:09','2026-06-19 07:32:09'),(5,'social','LinkedIn','https://linkedin.com/company/your-company','fa-linkedin','LinkedIn',NULL,1,4,'2026-06-19 07:32:09','2026-06-19 07:32:09'),(6,'social','YouTube','https://youtube.com/your-channel','fa-youtube','YouTube',NULL,1,5,'2026-06-19 07:32:09','2026-06-19 07:32:09'),(7,'menu','Home','/',NULL,NULL,NULL,1,1,'2026-06-19 07:32:18','2026-06-19 07:32:18'),(8,'menu','About Us','/about',NULL,NULL,NULL,1,2,'2026-06-19 07:32:18','2026-06-19 07:32:18'),(9,'menu','Services','/services',NULL,NULL,NULL,1,3,'2026-06-19 07:32:18','2026-06-19 07:32:18'),(10,'menu','Portfolio','/portfolio',NULL,NULL,NULL,1,4,'2026-06-19 07:32:18','2026-06-19 07:32:18'),(11,'menu','Blog','/blog',NULL,NULL,NULL,1,5,'2026-06-19 07:32:18','2026-06-19 07:32:18'),(12,'menu','Contact','/contact',NULL,NULL,NULL,1,6,'2026-06-19 07:32:18','2026-06-19 07:32:18'),(13,'menu','Privacy Policy','/privacy-policy',NULL,NULL,NULL,1,7,'2026-06-19 07:32:18','2026-06-19 07:32:18'),(14,'menu','Terms of Service','/terms',NULL,NULL,NULL,1,8,'2026-06-19 07:32:18','2026-06-19 07:32:18');
/*!40000 ALTER TABLE `footer_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `parent_id` int DEFAULT '0',
  `menu_type` varchar(50) DEFAULT 'main',
  `position` varchar(50) DEFAULT 'header',
  `is_active` tinyint(1) DEFAULT '1',
  `display_order` int DEFAULT '0',
  `target` varchar(10) DEFAULT '_self',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_parent_id` (`parent_id`),
  KEY `idx_menu_type` (`menu_type`),
  KEY `idx_position` (`position`),
  KEY `idx_is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (3,'about-history','Our History','/about/history','fa-solid fa-book-open',12,'sub','header',1,3,'_self','2026-06-19 07:21:18','2026-06-21 11:34:01'),(6,'services-design','UI/UX Design','/services/design','fa-solid fa-palette',13,'sub','header',1,3,'_self','2026-06-19 07:21:18','2026-06-21 11:31:53'),(8,'Kenya','🇰🇪 Kenya','/kenya','fas fa-flag',14,'sub','header',1,1,'_self','2026-06-20 06:24:16','2026-06-20 06:36:33'),(9,'USA','🇺🇸 USA','/usa','fas fa-flag-usa',14,'sub','header',1,2,'_self','2026-06-20 06:24:16','2026-06-20 06:36:33'),(10,'UK','🇬🇧 UK','/uk','fas fa-flag',14,'sub','header',1,8,'_self','2026-06-20 06:24:16','2026-06-20 06:49:28'),(12,'about','About Us','/about','fas fa-info-circle',0,'main','header',1,1,'_self','2026-06-20 06:34:28','2026-06-20 06:34:28'),(13,'services','Services','/services','fas fa-cogs',0,'main','header',1,2,'_self','2026-06-20 06:34:28','2026-06-20 06:34:28'),(15,'home','How It Works','/','fas fa-home',0,'main','header',1,4,'_self','2026-06-20 06:34:28','2026-06-20 06:34:28'),(16,'contact','Contact us','/contact','fas fa-envelope',0,'main','header',1,5,'_self','2026-06-20 06:34:28','2026-06-20 06:34:28'),(19,'process','Methodology','/process','fa-solid fa-route',13,'sub','header',1,0,'_self','2026-06-21 08:42:06','2026-06-21 11:30:38'),(23,'milestone','Milestone','/milestones','fa-bullhorn',12,'sub','header',1,0,'_self','2026-06-21 09:26:21','2026-06-21 11:23:54'),(24,'team','Team_Members','/team','fa fa-user',12,'sub','header',1,0,'_self','2026-06-21 09:32:39','2026-06-21 11:24:48'),(25,'core-service','Core-Service','/services','fa-bullhorn',13,'sub','header',1,0,'_self','2026-06-21 11:57:32','2026-06-21 11:57:32'),(26,'who-we-are','Who We Are','/about','fa-bullhorn',12,'sub','header',1,0,'_self','2026-06-21 12:00:35','2026-06-21 12:00:35'),(28,'discovery-call','Discovery Call','/discovery','fa fa-phone',0,'main','header',1,0,'_self','2026-06-22 09:14:18','2026-06-22 09:14:18');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `milestones`
--

DROP TABLE IF EXISTS `milestones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `milestones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  `month` varchar(20) DEFAULT NULL,
  `day` varchar(10) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `icon` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `display_order` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `milestones`
--

LOCK TABLES `milestones` WRITE;
/*!40000 ALTER TABLE `milestones` DISABLE KEYS */;
INSERT INTO `milestones` VALUES (1,'2020','January','15','Company Founded','Sofel Labs was established with a vision to transform e-learning through gamification.','fa-rocket',NULL,1,1,'2026-06-19 07:42:24','2026-06-19 07:42:24'),(2,'2020','June','10','First Major Client','Signed our first corporate client for gamified training solutions.','fa-handshake',NULL,1,2,'2026-06-19 07:42:24','2026-06-19 07:42:24'),(3,'2021','March','05','Expanded Team','Grew our team to 10+ instructional designers and gamification experts.','fa-users',NULL,1,3,'2026-06-19 07:42:24','2026-06-19 07:42:24'),(4,'2021','September','20','Launched New Platform','Released our proprietary gamification platform for enterprise clients.','fa-laptop-code',NULL,1,4,'2026-06-19 07:42:24','2026-06-19 07:42:24'),(5,'2022','January','15','100+ Projects Completed','Reached milestone of 100 successful gamified training projects.','fa-trophy',NULL,1,5,'2026-06-19 07:42:24','2026-06-19 07:42:24'),(6,'2022','August','01','International Expansion','Expanded operations to serve clients across Africa and beyond.','fa-globe-africa',NULL,1,6,'2026-06-19 07:42:24','2026-06-19 07:42:24'),(7,'2023','May','12','Industry Award','Received recognition as the Best Gamification Training Provider.','fa-award',NULL,1,7,'2026-06-19 07:42:24','2026-06-19 07:42:24'),(8,'2023','December','31','500+ Learners Served','Impacted over 500 learners through our gamified programs.','fa-graduation-cap',NULL,1,8,'2026-06-19 07:42:24','2026-06-19 07:42:24'),(9,'2024','March','01','New Office Opening','Opened new state-of-the-art office in Nairobi to better serve our growing client base.','fa-building',NULL,1,9,'2026-06-19 07:42:24','2026-06-19 07:42:24'),(10,'2024','August','15','Global Recognition','Featured as a top gamification company in Africa by leading industry publications.','fa-star',NULL,1,10,'2026-06-19 07:42:24','2026-06-19 07:42:24'),(11,'2020','January','15','Sofel Labs Founded','Sofel Labs was established with a vision to transform learning through gamification and innovative instructional design.','fas fa-rocket',NULL,1,1,'2026-06-21 09:14:24','2026-06-21 09:14:24'),(12,'2020','June','10','First Client Partnership','We partnered with our first corporate client to deliver a gamified compliance training program.','fas fa-handshake',NULL,1,2,'2026-06-21 09:14:24','2026-06-21 09:14:24'),(13,'2021','March','05','Expanded to Africa','Sofel Labs expanded operations to serve clients across the African continent.','fas fa-globe-africa',NULL,1,3,'2026-06-21 09:14:24','2026-06-21 09:14:24'),(14,'2021','September','20','Reached 100+ Programs','We successfully delivered over 100 gamified learning programs across various industries.','fas fa-trophy',NULL,1,4,'2026-06-21 09:14:24','2026-06-21 09:14:24'),(15,'2022','February','14','International Recognition','Sofel Labs received recognition as a leading innovator in instructional design and gamification.','fas fa-award',NULL,1,5,'2026-06-21 09:14:24','2026-06-21 09:14:24'),(16,'2022','November','01','USA Expansion','We opened our USA office to better serve our international clients.','fas fa-flag-usa',NULL,1,6,'2026-06-21 09:14:24','2026-06-21 09:14:24');
/*!40000 ALTER TABLE `milestones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processes`
--

DROP TABLE IF EXISTS `processes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `processes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `step_number` varchar(50) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `display_order` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processes`
--

LOCK TABLES `processes` WRITE;
/*!40000 ALTER TABLE `processes` DISABLE KEYS */;
INSERT INTO `processes` VALUES (2,'02','🏆 Level Up: Knowledge Acquisition','Engage with interactive content and complete mini-quizzes to earn XP points. Each correct answer unlocks new learning paths!','fa-gamepad','processes/01KVMP3VRVQNVBY89QCEMH2KTE.png',1,2,'2026-06-21 08:45:07','2026-06-21 08:52:50'),(3,'03','⭐ Skill Challenges','Apply your knowledge through real-world scenario challenges. Complete tasks to earn stars and climb the leaderboard!','fa-star',NULL,1,3,'2026-06-21 08:45:07','2026-06-21 08:45:07'),(4,'04','🎮 Interactive Quests','Embark on learning quests with different difficulty levels. Each completed quest rewards you with exclusive digital badges.','fa-quest',NULL,1,4,'2026-06-21 08:45:07','2026-06-21 08:45:07'),(5,'05','🏅 Achievement Unlocked','Earn achievement trophies for completing milestones. Collect all achievements to become a master learner!','fa-trophy',NULL,1,5,'2026-06-21 08:45:07','2026-06-21 08:45:07'),(6,'06','⚡ Power-Up Challenges','Access bonus content and power-up modules by maintaining your learning streak. Daily challenges keep you engaged!','fa-bolt',NULL,1,6,'2026-06-21 08:45:07','2026-06-21 08:45:07'),(7,'07','📊 Leaderboard Climb','Track your progress and compete with peers on the live leaderboard. Top performers get recognition and rewards!','fa-ranking-star',NULL,1,7,'2026-06-21 08:45:07','2026-06-21 08:45:07'),(8,'08','🎪 Multiplayer Learning','Join collaborative group challenges and team competitions. Work together to earn team badges and exclusive prizes.','fa-users',NULL,1,8,'2026-06-21 08:45:07','2026-06-21 08:45:07'),(9,'09','💎 Mastery Level','Complete advanced mastery challenges to prove your expertise. Unlock secret content and become a certified expert!','fa-diamond',NULL,1,9,'2026-06-21 08:45:07','2026-06-21 08:45:07'),(10,'10','🎁 Reward Center','Redeem your earned points for exclusive rewards, certificates, and special privileges within the learning platform.','fa-gift',NULL,1,10,'2026-06-21 08:45:07','2026-06-21 08:45:07'),(11,'11','🔄 Challenge Reset','Refreshed challenges and new quests are available! Reset your progress to try different learning paths and earn more rewards.','fa-rotate',NULL,1,11,'2026-06-21 08:45:07','2026-06-21 08:45:07'),(12,'12','👑 Grand Master','Congratulations! You\'ve completed all levels. Receive your Grand Master certificate and lifetime achievement badge!','fa-crown',NULL,1,12,'2026-06-21 08:45:07','2026-06-21 08:45:07');
/*!40000 ALTER TABLE `processes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `notified_at` timestamp NULL DEFAULT NULL,
  `display_order` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (2,'Digital Marketing','Boost your online presence with our comprehensive digital marketing strategies and campaigns.','fa-bullhorn','services/01KVMMXHT49GBGNF6ZD0AEZ76V.jpeg',1,NULL,2,'2026-06-21 08:31:29','2026-06-21 08:31:54'),(3,'Cloud Solutions','Secure and scalable cloud infrastructure solutions for modern businesses.','fa-cloud','services/01KVMMXZ9DKE6X34V9ZHQZ7PST.png',1,NULL,3,'2026-06-21 08:31:29','2026-06-21 08:32:08'),(4,'Data Analytics','Transform your raw data into actionable insights with our advanced analytics tools.','fa-chart-line','services/01KVMMYEQAD647DXMWHFHGNRWT.png',1,NULL,4,'2026-06-21 08:31:29','2026-06-21 08:32:24'),(5,'About_us','<p>ffffffffffff</p>','fa-bullhorn','services/01KVQBJSMJ4QJPDNMKE9YQZ7HG.jpg',1,NULL,0,'2026-06-22 09:46:28','2026-06-22 09:46:28'),(6,'About_us','<p>sxasXASXx</p>','fa fa-task','services/01KVQC9532PGR7BAD1QPANDJS3.png',1,NULL,0,'2026-06-22 09:58:41','2026-06-22 09:58:41'),(7,'About_us','<p>fdfdfsafsedfasfasfsa</p>','ffdsfsafs','services/01KVQCREWBABXKE0FQTJD775BV.png',1,NULL,0,'2026-06-22 10:07:02','2026-06-22 10:07:02'),(8,'Test Observer Service 2026-06-22 10:15:33','Testing observer from route',NULL,NULL,1,NULL,999,'2026-06-22 10:15:33','2026-06-22 10:15:33'),(9,'OUTGOING','<p>ssasaasdaD</p>',NULL,'services/01KVQDHG62SVWQKECDEQ0VCE4J.jpg',1,NULL,0,'2026-06-22 10:20:43','2026-06-22 10:20:43'),(10,'Test Observer Service 2026-06-22 10:21:06','Testing observer from route',NULL,NULL,1,NULL,999,'2026-06-22 10:21:06','2026-06-22 10:21:06'),(11,'Test Observer Service 2026-06-22 10:25:14','Testing observer from route',NULL,NULL,1,NULL,999,'2026-06-22 10:25:14','2026-06-22 10:25:14'),(12,'About_usrrrr','<p>xzxxzxxxzzxx</p>',NULL,NULL,1,'2026-06-22 10:36:38',0,'2026-06-22 10:36:34','2026-06-22 10:43:03'),(13,'About_us','<p><span style=\"text-decoration: underline;\">ffffff</span></p>',NULL,'services/01KVQEVH32X1DSGJAXE2FGM2DQ.jpg',1,'2026-06-22 10:43:44',0,'2026-06-22 10:43:40','2026-06-22 10:43:44');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('A28UC9rnYQR9x0kbVuIua7pWlA7bn01VaBcQHvUt',1,'172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJpY203OGV3UHNLbHFqbjdFemVlN090V1pINU56a1R3bE5pajdDZ1dnIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvYWRtaW5cL21lbnVzIiwicm91dGUiOiJmaWxhbWVudC5hZG1pbi5yZXNvdXJjZXMubWVudXMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOltdLCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiI2OTEzNzM2ZTUwNzgwM2M4ZTcyMzYyMWZlNTQxMjk2NGE0MGY4N2EzZmQ1ZTI0ZGIzN2E3N2E1MmU2YmM0MzI4IiwiZmlsYW1lbnQiOltdLCJ0YWJsZXMiOnsiMTA2ZTU3NzkzOTBiYWVlMjM5N2NkMTNlZGQ3ODczMDBfcGVyX3BhZ2UiOiJhbGwifX0=',1782130972),('gZQPiIs1S2cmhxjfw38ijSBu6QicoyDdcCENO3rw',NULL,'172.18.0.1','curl/8.18.0','eyJfdG9rZW4iOiJLSHoyYWlTU0pJTHZacE1LbFFrRnR3eElPZGp0VHBmRU5DTndXazZJIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvbG9jYWxob3N0XC9hZG1pblwvY29udmVyc2F0aW9uc1wvdmlldy1jaGF0XC82In0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FkbWluXC9jb252ZXJzYXRpb25zXC92aWV3LWNoYXRcLzYiLCJyb3V0ZSI6ImZpbGFtZW50LmFkbWluLnJlc291cmNlcy5jb252ZXJzYXRpb25zLnZpZXctY2hhdCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1782127780),('yfDQ1N74VHRWgcH4DR5NgWXrcIY1eQMltSoKjsoq',NULL,'172.18.0.1','curl/8.18.0','eyJfdG9rZW4iOiJIMFc2WnpwREY2dVNuRGRyNFpvQlJiazFSMVVEcHRzSEFxcVZudkNpIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvbG9jYWxob3N0XC9hZG1pblwvY29udmVyc2F0aW9uc1wvdmlldy1jaGF0XC82In0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FkbWluXC9jb252ZXJzYXRpb25zXC92aWV3LWNoYXRcLzYiLCJyb3V0ZSI6ImZpbGFtZW50LmFkbWluLnJlc291cmNlcy5jb252ZXJzYXRpb25zLnZpZXctY2hhdCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1782127737);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `subscribed_at` timestamp NULL DEFAULT NULL,
  `unsubscribed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscriptions_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (1,'ogutujared110@gmail.com',NULL,'footer','active','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','2026-06-22 09:36:38',NULL,'2026-06-22 09:36:38','2026-06-22 10:56:24'),(2,'ogutusamuel103@gmail.com',NULL,'footer','active','172.18.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','2026-06-22 10:53:26',NULL,'2026-06-22 10:53:26','2026-06-22 10:53:26');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `bio` text,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `display_order` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_members`
--

LOCK TABLES `team_members` WRITE;
/*!40000 ALTER TABLE `team_members` DISABLE KEYS */;
INSERT INTO `team_members` VALUES (2,'Jane Akinyi','Senior Instructional Designer','Jane specializes in creating engaging learning experiences with 8+ years of experience in curriculum development and instructional design. She has designed programs for NGOs, corporations, and educational institutions across the continent.','team/jane.jpg','jane@sofellabs.com',NULL,'https://linkedin.com/in/janeakinyi','https://twitter.com/janeakinyi',NULL,NULL,1,2,'2026-06-19 07:42:49','2026-06-19 07:42:49'),(3,'Peter Ochieng','Gamification Specialist','Peter is an expert in game mechanics and motivational design, helping organizations create compelling learning experiences that drive results. He has a background in game design and psychology.','team/peter.jpg','peter@sofellabs.com',NULL,'https://linkedin.com/in/peterochieng','https://twitter.com/peterochieng',NULL,NULL,1,3,'2026-06-19 07:42:49','2026-06-19 07:42:49'),(4,'Sarah Wanjiku','UI/UX Designer','Sarah creates beautiful, intuitive learning interfaces that enhance user engagement and learning outcomes. She specializes in designing accessible and inclusive learning experiences.','team/sarah.jpg','sarah@sofellabs.com',NULL,'https://linkedin.com/in/sarahwanjiku','https://twitter.com/sarahwanjiku',NULL,NULL,1,4,'2026-06-19 07:42:49','2026-06-19 07:42:49'),(5,'David Omondi','Content Developer','David develops engaging learning content that combines educational excellence with gamification principles. He has created content for diverse audiences across multiple industries.','team/david.jpg','david@sofellabs.com',NULL,'https://linkedin.com/in/davidomondi','https://twitter.com/davidomondi',NULL,NULL,1,5,'2026-06-19 07:42:49','2026-06-19 07:42:49'),(6,'Grace Muthoni','Project Manager','Grace ensures seamless project delivery from conception to completion. With a background in learning and development, she coordinates our teams and client relationships effectively.','team/grace.jpg','grace@sofellabs.com',NULL,'https://linkedin.com/in/gracemuthoni','https://twitter.com/gracemuthoni',NULL,NULL,1,6,'2026-06-19 07:42:49','2026-06-19 07:42:49'),(7,'John Doe','Founder & CEO','John is a visionary leader with over 15 years of experience in instructional design and gamification. He founded Sofel Labs with a mission to transform how people learn.',NULL,'john@sofellabs.com',NULL,'https://linkedin.com/in/johndoe',NULL,NULL,NULL,1,1,'2026-06-21 09:31:16','2026-06-21 09:31:16'),(8,'Jane Smith','Head of Instructional Design','Jane brings a wealth of experience in creating engaging learning experiences. She specializes in designing learner-centered programs that drive real results.',NULL,'jane@sofellabs.com',NULL,'https://linkedin.com/in/janesmith',NULL,NULL,NULL,1,2,'2026-06-21 09:31:16','2026-06-21 09:31:16'),(9,'Mike Johnson','Senior Gamification Specialist','Mike is an expert in game-based learning and motivational design. He develops innovative gamification strategies that keep learners engaged and motivated.',NULL,'mike@sofellabs.com',NULL,'https://linkedin.com/in/mikejohnson',NULL,NULL,NULL,1,3,'2026-06-21 09:31:16','2026-06-21 09:31:16'),(10,'Sarah Williams','Learning Experience Designer','Sarah creates immersive learning experiences that combine instructional design with cutting-edge technology. She is passionate about making learning accessible and enjoyable.',NULL,'sarah@sofellabs.com',NULL,'https://linkedin.com/in/sarahwilliams',NULL,NULL,NULL,1,4,'2026-06-21 09:31:16','2026-06-21 09:31:16'),(11,'David Brown','Technology & Innovation Lead','David leads the technology strategy at Sofel Labs. He explores emerging technologies to enhance learning experiences and drive innovation in instructional design.',NULL,'david@sofellabs.com',NULL,'https://linkedin.com/in/davidbrown',NULL,NULL,NULL,1,5,'2026-06-21 09:31:16','2026-06-21 09:31:16'),(12,'Emily Davis','Client Success Manager','Emily ensures our clients achieve their learning goals through our solutions. She manages client relationships and ensures successful program delivery.',NULL,'emily@sofellabs.com',NULL,'https://linkedin.com/in/emilydavis',NULL,NULL,NULL,1,6,'2026-06-21 09:31:16','2026-06-21 09:31:16');
/*!40000 ALTER TABLE `team_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','ogutujared110@gmail.com',NULL,'$2y$12$GRb2U81yHOEiVsOsdSvGTO/IKzLODwBp0u1J3i07hBcoh1JQju522','pFGVchQRIGjmkAYnUsKpRA41xyrlpFakVGYGbUq3JjGcYwq5DUOOrdnq009h','2026-06-18 09:26:29','2026-06-18 09:26:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-23  9:28:33
