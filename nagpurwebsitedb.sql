-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for nagpur_web26db
DROP DATABASE IF EXISTS `nagpur_web26db`;
CREATE DATABASE IF NOT EXISTS `nagpur_web26db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `nagpur_web26db`;

-- Dumping structure for table nagpur_web26db.lfc_album_galleries
DROP TABLE IF EXISTS `lfc_album_galleries`;
CREATE TABLE IF NOT EXISTS `lfc_album_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_images` json DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_album_galleries_slug_unique` (`slug`),
  KEY `lfc_album_galleries_category_id_foreign` (`category_id`),
  CONSTRAINT `lfc_album_galleries_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `lfc_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_album_galleries: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_birthday
DROP TABLE IF EXISTS `lfc_birthday`;
CREATE TABLE IF NOT EXISTS `lfc_birthday` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ispublished` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_birthday: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_books
DROP TABLE IF EXISTS `lfc_books`;
CREATE TABLE IF NOT EXISTS `lfc_books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` json DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_books: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_categories
DROP TABLE IF EXISTS `lfc_categories`;
CREATE TABLE IF NOT EXISTS `lfc_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_categories_slug_unique` (`slug`),
  KEY `lfc_categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `lfc_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `lfc_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_categories: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_contact_form
DROP TABLE IF EXISTS `lfc_contact_form`;
CREATE TABLE IF NOT EXISTS `lfc_contact_form` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_contact_form: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_daily_thoughts
DROP TABLE IF EXISTS `lfc_daily_thoughts`;
CREATE TABLE IF NOT EXISTS `lfc_daily_thoughts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bible_verse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_daily_thoughts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_daily_thoughts: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_failed_jobs
DROP TABLE IF EXISTS `lfc_failed_jobs`;
CREATE TABLE IF NOT EXISTS `lfc_failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_failed_jobs: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_feedbacks
DROP TABLE IF EXISTS `lfc_feedbacks`;
CREATE TABLE IF NOT EXISTS `lfc_feedbacks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_feedbacks: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_floating_menus
DROP TABLE IF EXISTS `lfc_floating_menus`;
CREATE TABLE IF NOT EXISTS `lfc_floating_menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_by` int DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_floating_menus: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_handbooks
DROP TABLE IF EXISTS `lfc_handbooks`;
CREATE TABLE IF NOT EXISTS `lfc_handbooks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` json NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_handbooks: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_media
DROP TABLE IF EXISTS `lfc_media`;
CREATE TABLE IF NOT EXISTS `lfc_media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `directory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media',
  `visibility` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` int unsigned DEFAULT NULL,
  `height` int unsigned DEFAULT NULL,
  `size` int unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `ext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `caption` text COLLATE utf8mb4_unicode_ci,
  `exif` text COLLATE utf8mb4_unicode_ci,
  `curations` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tenant_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_media: ~1 rows (approximately)
REPLACE INTO `lfc_media` (`id`, `disk`, `directory`, `visibility`, `name`, `path`, `width`, `height`, `size`, `type`, `ext`, `alt`, `title`, `description`, `caption`, `exif`, `curations`, `created_at`, `updated_at`, `tenant_id`) VALUES
	(1, 'public', 'site/sections/content', 'public', 'af11b055-eef8-4d0b-9304-0ae71bd21eba', 'site/sections/content/af11b055-eef8-4d0b-9304-0ae71bd21eba.jpeg', 2014, 2732, 1380930, 'image/jpeg', 'jpeg', NULL, 'St. Vincent Pallotti (1795-1850) (2).jpg', NULL, NULL, '{"FileName":"GjBV3pnh8vE4KQXWKppIloUOUXAhOG-metaU3QuIFZpbmNlbnQgUGFsbG90dGkgKDE3OTUtMTg1MCkgKDIpLmpwZy5qcGVn-.jpeg","FileDateTime":1783349210,"FileSize":1380930,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":"ANY_TAG, IFD0, THUMBNAIL, EXIF, MAKERNOTE","COMPUTED":{"html":"width=\\"2014\\" height=\\"2732\\"","Height":2732,"Width":2014,"IsColor":1,"ByteOrderMotorola":null,"CCDWidth":"3mm","ApertureFNumber":"f\\/4.0","UserComment":null,"UserCommentEncoding":"UNDEFINED","Thumbnail.FileType":2,"Thumbnail.MimeType":"image\\/jpeg"},"Model":"Canon PowerShot G9","Make":"Canon","Software":"Picasa 3.0","DateTime":"2009:01:19 11:12:24","YCbCrPositioning":1,"UndefinedTag:0x1001":4000,"UndefinedTag:0x1002":3000,"Exif_IFD_Pointer":168,"THUMBNAIL":{"Compression":6,"XResolution":"72\\/1","YResolution":"72\\/1","ResolutionUnit":2,"JPEGInterchangeFormat":3486,"JPEGInterchangeFormatLength":5457},"ExposureTime":"1\\/10","FNumber":"40\\/10","ISOSpeedRatings":80,"ExifVersion":"0220","DateTimeOriginal":"2009:01:19 11:12:24","DateTimeDigitized":"2009:01:19 11:12:24","ComponentsConfiguration":"\\u0001\\u0002\\u0003\\u0000","CompressedBitsPerPixel":"3\\/1","ShutterSpeedValue":"106\\/32","ApertureValue":"128\\/32","ExposureBiasValue":"0\\/3","MaxApertureValue":"95\\/32","MeteringMode":5,"Flash":16,"FocalLength":"7400\\/1000","MakerNote":"\\u001c","UserComment":"\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000","FlashPixVersion":"0100","ColorSpace":65535,"ExifImageWidth":2014,"ExifImageLength":2732,"FocalPlaneXResolution":"4000000\\/291","FocalPlaneYResolution":"3000000\\/219","FocalPlaneResolutionUnit":2,"SensingMethod":2,"FileSource":"\\u0003","CustomRendered":null,"ExposureMode":null,"WhiteBalance":1,"DigitalZoomRatio":"4000\\/4000","SceneCaptureType":null,"ImageUniqueID":"fa5ea0f4c1b1f7244ba3c03f33355f9a","ModeArray":[1,null,1,null,4000,4000,null,null,65535,null,32767,32767,1,null,65535,120,2,7400,298,224,null,null,null,null,68,65528,160,108,128,106,null,1,null,null,null,null,null,null,null,null,null,null,1,155,null,124,106,null],"UndefinedTag:0x0002":[null,6,250,null],"UndefinedTag:0x0003":[null,null,null,null],"ImageInfo":[null,null,null,null,null,null,null,null,19785,14919,28496,25975,21362,28520,8308,14663,18976,17744,71,null,null,null,null,null,26950,28018,24951,25970,22048,29285,26995,28271,12576,12334],"UndefinedTag:0x0000":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,null,null,18,65518,null,18],"ImageType":null,"FirmwareVersion":null,"ImageNumber":1000951,"OwnerName":null,"UndefinedTag:0x000D":[null,1,18,null,1,18,1,null,9,10,326,308,317,373,528,-66,null,null,308,317,null,null,1,null,null,null,null,null,null,null,null,null,null,null,null,null,null,50,172,18,152,null,104,null,48,null,62,1024,1024,-26,-34,null,null,null,null,null,null,276,null,-97,-28,null,null,1,3,null,null,1024,1013,1035,1293,8,-98,-29,26,853,1817,1649,853,1,576,288,326,659,-121,-1,128,1,null,null,null,null,460,5,null,null,null,null,null,null,482,null,null,128,1,null,6692,4,1,445,-1,-1,-1,-1,-1,-1,-1,-1,1908,1336,250,548,102,240,45,4091,4091,1,1,22,10,-1887366720,null,null,null,null,null,null,null,null,null,null,131168,65545,196612000,6553700,1179666,1179666],"UndefinedTag:0x0010":35848192,"UndefinedTag:0x0026":[65518,null,18,null,65518,65518,null,null,null,18,18,18,1,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null],"UndefinedTag:0x0013":[null,null,null,null],"UndefinedTag:0x0018":"encoded@base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAABAAAAAgACAAIAAgAAAAAAAAAAAAAAAAAAAAAAAACKAAEAAAAEAAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==","UndefinedTag:0x0019":1,"UndefinedTag:0x001C":null,"UndefinedTag:0x001D":[null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null],"UndefinedTag:0x001E":16779008,"UndefinedTag:0x001F":[null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,416,null,null,16,8,24,16,640,480,65262,65324,274,212,null,8,384,null,null,null,null,3072,3340,3085,12,null,null,null,null,null,null,null,null],"UndefinedTag:0x0022":[3584,3855,3855,14,null,null,null,null,null,null,null,3840,4624,4883,4883,4114,null,null,null,null,null,null,null,4367,5651,6680,6170,4886,3857,13,null,null,null,null,null,5137,7192,8736,8226,6172,20,3087,null,null,null,null,null,6163,9246,10535,10025,7716,4888,3600,11,null,null,null,4352,6933,10275,11564,11309,9000,5403,3601,12,null,null,null,4608,7702,10789,12078,11823,9514,30,3858,12,null,null,null,4608,7702,10789,12078,11823,9514,30,3858,12,null,null,null,null,6933,10275,11564,11309,9000,null,3601,null,null,null,null,null,6163,9246,10535,10025,36,null,3600,null,null,null,null,null,5137,null,8736,34,null,null,15,null,null,null,null,null,4367,null,null,null,null,null,null,null,null,null,null,null,3840,null,null,null,null,null,null,null,null,null,null,null,null,3584,3855,3855,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,8,null,null,null,156,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null],"UndefinedTag:0x0023":[null,null],"UndefinedTag:0x0024":[null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,14,null,null,null,null,null,null,6,null,null,38189,24169,54955,27292,54412,33498,45723,29231,18761,42,690,null,null,null,null,null,null,null,null,null,null,null],"UndefinedTag:0x0025":"\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000","UndefinedTag:0x0027":[null,null,null,null,null,null],"UndefinedTag:0x0028":"\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000\\u0000","UndefinedTag:0x00D0":null,"UndefinedTag:0x002D":null}', NULL, '2026-07-06 09:16:56', '2026-07-06 09:16:56', NULL);

-- Dumping structure for table nagpur_web26db.lfc_media_items
DROP TABLE IF EXISTS `lfc_media_items`;
CREATE TABLE IF NOT EXISTS `lfc_media_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `page_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_media_items: ~10 rows (approximately)
REPLACE INTO `lfc_media_items` (`id`, `title`, `type`, `category`, `image`, `link`, `description`, `page_slug`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
	(13, 'Years', 'recent_update', '75th Celebrating faith', NULL, NULL, 'Celebrating faith, mission and service across communities.', 'home', 1, 1, '2026-07-06 05:09:46', '2026-07-06 05:50:35'),
	(14, 'Birthdays & Feast Days', 'recent_update', '', NULL, NULL, 'Stay connected with community celebrations.', 'home', 2, 1, '2026-07-06 05:09:46', '2026-07-06 05:09:46'),
	(15, 'Upcoming Events', 'recent_update', '', NULL, NULL, 'Province programmes, gatherings and announcements.', 'home', 3, 1, '2026-07-06 05:09:46', '2026-07-06 05:09:46'),
	(16, 'Pallotti reflections and province updates', 'video', 'Media Vision 01', 'site/assets/img/event-pallotti-media.webp', 'https://youtu.be/d0IhB0ltvvs?si=b64RLOB9ZwmMfhiq', NULL, 'home', 1, 1, '2026-07-06 05:09:46', '2026-07-06 05:09:46'),
	(17, 'Faith formation and community life', 'video', 'Media Vision 02', 'site/assets/img/event-jubilee.webp', 'https://youtu.be/EiMWPqYLo0Y?si=4Imqn0YknQdWstbY', NULL, 'home', 2, 1, '2026-07-06 05:09:46', '2026-07-06 05:09:46'),
	(18, 'Mission memories and special programmes', 'video', 'Media Vision 03', 'site/assets/img/pallottine-75-years.webp', 'https://youtu.be/wXUAyB0PB4k?si=1YixhyceBEDKnTQY', NULL, 'home', 3, 1, '2026-07-06 05:09:46', '2026-07-06 05:09:46'),
	(20, 'slider01', 'hero_slide', NULL, 'site/media/01KWVJBJM21BNDFGSVNER63JTV.jpeg', NULL, NULL, 'home', 0, 1, '2026-07-06 05:47:31', '2026-07-06 05:47:31'),
	(21, 'Slider02', 'hero_slide', NULL, 'site/media/01KWVJD9REMSK0QWJAQ4K689GW.jpeg', NULL, NULL, 'home', 1, 1, '2026-07-06 05:48:27', '2026-07-06 05:48:27'),
	(22, 'slider03', 'hero_slide', NULL, 'site/media/01KWVJE16409A86BKEZH25N805.jpeg', NULL, NULL, 'home', 2, 1, '2026-07-06 05:48:51', '2026-07-06 05:48:51'),
	(23, 'General Information', 'recent_update', NULL, NULL, NULL, 'General information for update', 'home', 0, 1, '2026-07-06 08:37:14', '2026-07-06 08:37:14');

-- Dumping structure for table nagpur_web26db.lfc_members
DROP TABLE IF EXISTS `lfc_members`;
CREATE TABLE IF NOT EXISTS `lfc_members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'leadership',
  `bio` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stats` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_members: ~5 rows (approximately)
REPLACE INTO `lfc_members` (`id`, `name`, `designation`, `group`, `bio`, `image`, `stats`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
	(6, 'Rev. Fr. Antony Herald Roswan', 'Provincial Rector', 'leadership', NULL, 'site/assets/img/fr-antony-herald-roswan.webp', NULL, 1, 1, '2026-07-06 05:09:45', '2026-07-06 05:09:45'),
	(7, 'Rev. Fr. Johnson Puthur', 'First Consultor', 'leadership', NULL, 'site/assets/img/fr-johnson-puthur.webp', NULL, 1, 2, '2026-07-06 05:09:46', '2026-07-06 05:09:46'),
	(8, 'Rev. Fr. Paul Thomas Annimoottil', 'Consultor', 'leadership', NULL, 'site/assets/img/fr-paul-thomas.webp', NULL, 1, 3, '2026-07-06 05:09:46', '2026-07-06 05:09:46'),
	(9, 'Rev. Fr. Wilson Puthenpurayil', 'Consultor', 'leadership', NULL, 'site/assets/img/fr-wilson-puthenpurayil.webp', NULL, 1, 4, '2026-07-06 05:09:46', '2026-07-06 05:09:46'),
	(10, 'Rev. Fr. Joseph Koovely', 'Consultor', 'leadership', NULL, 'site/assets/img/fr-joseph-koovely.webp', NULL, 1, 5, '2026-07-06 05:09:46', '2026-07-06 05:09:46');

-- Dumping structure for table nagpur_web26db.lfc_menuses
DROP TABLE IF EXISTS `lfc_menuses`;
CREATE TABLE IF NOT EXISTS `lfc_menuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_by` int DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `is_url` tinyint(1) NOT NULL DEFAULT '0',
  `url` longtext COLLATE utf8mb4_unicode_ci,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lfc_menuses_parent_id_foreign` (`parent_id`),
  CONSTRAINT `lfc_menuses_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `lfc_menuses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_menuses: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_migrations
DROP TABLE IF EXISTS `lfc_migrations`;
CREATE TABLE IF NOT EXISTS `lfc_migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_migrations: ~43 rows (approximately)
REPLACE INTO `lfc_migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_08_06_082344_create_school_info_table', 1),
	(6, '2024_08_06_082402_create_menus_table', 1),
	(7, '2024_08_06_082415_create_slider_table', 1),
	(8, '2024_08_06_082433_create_post_table', 1),
	(9, '2024_08_06_082445_create_page_table', 1),
	(10, '2024_08_06_082500_create_photo_gallery_table', 1),
	(11, '2024_08_09_145905_create_category_table', 1),
	(12, '2024_08_23_061203_create_contact_form_table', 1),
	(13, '2024_08_23_103639_create_birthday_table', 1),
	(14, '2024_08_27_120235_create_media_table', 1),
	(15, '2024_08_27_120236_add_tenant_aware_column_to_media_table', 1),
	(16, '2024_08_28_154304_create_pivot_category_table', 1),
	(17, '2024_09_06_043854_create_video_gallery_table', 1),
	(18, '2024_11_21_054134_create_photo_gallery_media_table', 1),
	(19, '2025_03_24_070148_create_popups_table', 1),
	(20, '2025_03_24_070645_create_floating_menus_table', 1),
	(21, '2025_03_24_071148_create_social_icons_table', 1),
	(22, '2025_07_31_051452_add_soft_deletes_to_tables', 2),
	(23, '2025_10_14_054326_create_permission_tables', 2),
	(24, '2025_10_14_071223_create_news_table', 2),
	(25, '2025_10_31_041808_create_album_galleries_table', 2),
	(26, '2025_11_10_064510_create_daily_thoughts_table', 2),
	(27, '2025_11_10_064511_add_bible_verse_to_daily_thoughts_table', 2),
	(28, '2025_11_10_104953_create_quotes_table', 2),
	(29, '2025_12_04_072109_create_feedback_table', 2),
	(30, '2025_12_20_000000_create_newsletter_subscriptions_table', 2),
	(31, '2026_02_05_095135_create_staffs_table', 2),
	(32, '2026_02_05_100000_add_staff_type_to_staffs_table', 3),
	(33, '2026_02_05_101223_create_handbooks_table', 3),
	(34, '2026_02_05_103215_create_toppers_table', 3),
	(35, '2026_02_05_104448_create_books_table', 3),
	(36, '2026_03_06_000000_create_timetables_table', 3),
	(37, '2026_03_06_000001_create_timetable_entries_table', 3),
	(38, '2026_07_06_110000_create_site_pages_table', 3),
	(39, '2026_07_06_110100_create_site_sections_table', 3),
	(40, '2026_07_06_110200_create_site_menus_table', 3),
	(41, '2026_07_06_110300_create_site_settings_table', 3),
	(42, '2026_07_06_110400_create_media_items_table', 3),
	(43, '2026_07_06_110500_create_members_table', 3);

-- Dumping structure for table nagpur_web26db.lfc_model_has_permissions
DROP TABLE IF EXISTS `lfc_model_has_permissions`;
CREATE TABLE IF NOT EXISTS `lfc_model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `lfc_model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `lfc_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_model_has_roles
DROP TABLE IF EXISTS `lfc_model_has_roles`;
CREATE TABLE IF NOT EXISTS `lfc_model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `lfc_model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `lfc_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_model_has_roles: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_news
DROP TABLE IF EXISTS `lfc_news`;
CREATE TABLE IF NOT EXISTS `lfc_news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` json NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date NOT NULL,
  `content` json DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lfc_news_category_id_foreign` (`category_id`),
  CONSTRAINT `lfc_news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `lfc_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_news: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_newsletter_subscriptions
DROP TABLE IF EXISTS `lfc_newsletter_subscriptions`;
CREATE TABLE IF NOT EXISTS `lfc_newsletter_subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `subscribed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_newsletter_subscriptions_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_newsletter_subscriptions: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_pages
DROP TABLE IF EXISTS `lfc_pages`;
CREATE TABLE IF NOT EXISTS `lfc_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_by` int DEFAULT NULL,
  `publish_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_pages: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_password_resets
DROP TABLE IF EXISTS `lfc_password_resets`;
CREATE TABLE IF NOT EXISTS `lfc_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `lfc_password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_password_resets: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_permissions
DROP TABLE IF EXISTS `lfc_permissions`;
CREATE TABLE IF NOT EXISTS `lfc_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_permissions: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_personal_access_tokens
DROP TABLE IF EXISTS `lfc_personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `lfc_personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_personal_access_tokens_token_unique` (`token`),
  KEY `lfc_personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_photo_galleries
DROP TABLE IF EXISTS `lfc_photo_galleries`;
CREATE TABLE IF NOT EXISTS `lfc_photo_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_by` int DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_photo_galleries_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_photo_galleries: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_photo_gallery_media
DROP TABLE IF EXISTS `lfc_photo_gallery_media`;
CREATE TABLE IF NOT EXISTS `lfc_photo_gallery_media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `photo_gallery_id` bigint unsigned NOT NULL,
  `media_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lfc_photo_gallery_media_photo_gallery_id_foreign` (`photo_gallery_id`),
  KEY `lfc_photo_gallery_media_media_id_foreign` (`media_id`),
  CONSTRAINT `lfc_photo_gallery_media_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `lfc_media` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lfc_photo_gallery_media_photo_gallery_id_foreign` FOREIGN KEY (`photo_gallery_id`) REFERENCES `lfc_photo_galleries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_photo_gallery_media: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_popups
DROP TABLE IF EXISTS `lfc_popups`;
CREATE TABLE IF NOT EXISTS `lfc_popups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_by` int DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_popups: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_posts
DROP TABLE IF EXISTS `lfc_posts`;
CREATE TABLE IF NOT EXISTS `lfc_posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_by` int DEFAULT NULL,
  `publish_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_posts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_posts: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_post_category
DROP TABLE IF EXISTS `lfc_post_category`;
CREATE TABLE IF NOT EXISTS `lfc_post_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lfc_post_category_category_id_foreign` (`category_id`),
  KEY `lfc_post_category_post_id_foreign` (`post_id`),
  CONSTRAINT `lfc_post_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `lfc_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lfc_post_category_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `lfc_posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_post_category: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_quotes
DROP TABLE IF EXISTS `lfc_quotes`;
CREATE TABLE IF NOT EXISTS `lfc_quotes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_quotes: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_roles
DROP TABLE IF EXISTS `lfc_roles`;
CREATE TABLE IF NOT EXISTS `lfc_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_roles: ~1 rows (approximately)
REPLACE INTO `lfc_roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'panel_user', 'web', '2026-07-06 05:13:09', '2026-07-06 05:13:09');

-- Dumping structure for table nagpur_web26db.lfc_role_has_permissions
DROP TABLE IF EXISTS `lfc_role_has_permissions`;
CREATE TABLE IF NOT EXISTS `lfc_role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `lfc_role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `lfc_role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `lfc_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lfc_role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `lfc_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_role_has_permissions: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_school_infos
DROP TABLE IF EXISTS `lfc_school_infos`;
CREATE TABLE IF NOT EXISTS `lfc_school_infos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` json DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_school_infos: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_site_menus
DROP TABLE IF EXISTS `lfc_site_menus`;
CREATE TABLE IF NOT EXISTS `lfc_site_menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lfc_site_menus_parent_id_foreign` (`parent_id`),
  CONSTRAINT `lfc_site_menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `lfc_site_menus` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_site_menus: ~26 rows (approximately)
REPLACE INTO `lfc_site_menus` (`id`, `title`, `url`, `location`, `parent_id`, `target`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
	(27, 'Home', '/', 'header', NULL, '_self', 1, 1, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(28, 'About Us', '/st-vincent-pallotti', 'header', NULL, '_self', 1, 2, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(29, 'Administration', '/local-communities', 'header', NULL, '_self', 1, 3, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(30, 'Apostolic Works', '/formation', 'header', NULL, '_self', 1, 4, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(31, 'Contact Us', '/contact', 'header', NULL, '_self', 1, 5, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(32, 'St. Vincent Pallotti', '/st-vincent-pallotti', 'header', 28, '_self', 1, 1, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(33, 'The Beginning', '/beginning', 'header', 28, '_self', 1, 2, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(34, 'Milestones', '/milestones', 'header', 28, '_self', 1, 3, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(35, 'Local Communities', '/local-communities', 'header', 29, '_self', 1, 4, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(36, 'Commissions', '/commissions', 'header', 29, '_self', 1, 5, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(37, 'Formation', '/formation', 'header', 30, '_self', 1, 6, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(38, 'Education', '/education', 'header', 30, '_self', 1, 7, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(39, 'Lay Animation', '/lay-animation', 'header', 30, '_self', 1, 8, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(40, 'Parishes / Mission Stations', '/parishes', 'header', 30, '_self', 1, 9, '2026-07-06 05:09:40', '2026-07-06 05:09:40'),
	(41, 'Boys Homes', '/boys-homes', 'header', 30, '_self', 1, 10, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(42, 'Social Apostolate', '/social-apostolate', 'header', 30, '_self', 1, 11, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(43, 'Home', '/', 'footer_quick_links', NULL, '_self', 1, 1, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(44, 'About Us', '/st-vincent-pallotti', 'footer_quick_links', NULL, '_self', 1, 2, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(45, 'Administration', '/local-communities', 'footer_quick_links', NULL, '_self', 1, 3, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(46, 'Apostolic Works', '/formation', 'footer_quick_links', NULL, '_self', 1, 4, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(47, 'Contact Us', '/contact', 'footer_quick_links', NULL, '_self', 1, 5, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(48, 'Milestones', '/milestones', 'footer_explore', NULL, '_self', 1, 1, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(49, 'Mission Stations', '/parishes', 'footer_explore', NULL, '_self', 1, 2, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(50, 'Boys Homes', '/boys-homes', 'footer_explore', NULL, '_self', 1, 3, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(51, 'Social Apostolate', '/social-apostolate', 'footer_explore', NULL, '_self', 1, 4, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(52, 'Formation', '/formation', 'footer_explore', NULL, '_self', 1, 5, '2026-07-06 05:09:41', '2026-07-06 05:09:41');

-- Dumping structure for table nagpur_web26db.lfc_site_pages
DROP TABLE IF EXISTS `lfc_site_pages`;
CREATE TABLE IF NOT EXISTS `lfc_site_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'standard',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `hero_eyebrow` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_subtitle` text COLLATE utf8mb4_unicode_ci,
  `hero_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_style` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'page-hero',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_site_pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_site_pages: ~13 rows (approximately)
REPLACE INTO `lfc_site_pages` (`id`, `title`, `slug`, `template`, `meta_title`, `meta_description`, `hero_eyebrow`, `hero_title`, `hero_subtitle`, `hero_image`, `hero_style`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
	(14, 'Home', 'home', 'home', 'Home', 'A responsive province website powered by Laravel and Filament CMS.', 'Home', 'Prabhu Prakash Province, Nagpur', 'A responsive province website powered by Laravel and Filament CMS.', 'site/assets/img/st-vincent-pallotti.webp', 'page-hero', 1, 1, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(15, 'St. Vincent Pallotti', 'st-vincent-pallotti', 'standard', 'St. Vincent Pallotti', 'Founder of the Society of the Catholic Apostolate and apostle of renewed faith and charity.', 'About Us', 'St. Vincent Pallotti', 'Founder of the Society of the Catholic Apostolate and apostle of renewed faith and charity.', 'https://images.unsplash.com/photo-1523803326055-9729b9e02e5a?auto=format&fit=crop&w=1600&q=80', 'page-hero', 1, 2, '2026-07-06 05:09:41', '2026-07-06 05:09:41'),
	(16, 'The Beginning', 'beginning', 'standard', 'The Beginning', 'The historical roots and growth of the Society of the Catholic Apostolate.', 'About Us', 'The Beginning', 'The historical roots and growth of the Society of the Catholic Apostolate.', 'https://images.unsplash.com/photo-1523803326055-9729b9e02e5a?auto=format&fit=crop&w=1600&q=80', 'page-hero', 1, 3, '2026-07-06 05:09:42', '2026-07-06 05:09:42'),
	(17, 'Milestones', 'milestones', 'timeline', 'Milestones', 'A visual timeline of Pallottine presence and growth in India.', 'About Us', 'Milestones in India', 'A visual timeline of Pallottine presence and growth in India.', 'https://images.unsplash.com/photo-1495020689067-958852a7765e?auto=format&fit=crop&w=1600&q=80', 'page-hero', 1, 4, '2026-07-06 05:09:42', '2026-07-06 05:09:42'),
	(18, 'Local Communities', 'local-communities', 'standard', 'Local Communities', 'Communities that form the living network of the Province across mission and apostolic locations.', 'Administration', 'Local Communities', 'Communities that form the living network of the Province across mission and apostolic locations.', 'https://images.unsplash.com/photo-1523803326055-9729b9e02e5a?auto=format&fit=crop&w=1600&q=80', 'page-hero', 1, 5, '2026-07-06 05:09:42', '2026-07-06 05:09:42'),
	(19, 'Commissions', 'commissions', 'standard', 'Commissions', 'Structured bodies that support provincial administration, apostolate and mission coordination.', 'Administration', 'Commissions', 'Structured bodies that support provincial administration, apostolate and mission coordination.', 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1600&q=80', 'page-hero', 1, 6, '2026-07-06 05:09:42', '2026-07-06 05:09:42'),
	(20, 'Formation', 'formation', 'formation', 'Formation', 'Preparing candidates for future pastoral and apostolic service in the Society through prayer, study, accompaniment and community life.', 'Apostolic Works', 'Formation', 'Preparing candidates for future pastoral and apostolic service in the Society through prayer, study, accompaniment and community life.', 'site/assets/img/pallottine-75-years.webp', 'page-hero', 1, 7, '2026-07-06 05:09:42', '2026-07-06 05:09:42'),
	(21, 'Education', 'education', 'standard', 'Education', 'Educational apostolates that form the young in faith, discipline and service.', 'Apostolic Works', 'Education', 'Educational apostolates that form the young in faith, discipline and service.', 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1600&q=80', 'page-hero', 1, 8, '2026-07-06 05:09:42', '2026-07-06 05:09:42'),
	(22, 'Lay Animation', 'lay-animation', 'standard', 'Lay Animation', 'Animating the faithful to live their universal apostolic vocation.', 'Apostolic Works', 'Lay Animation', 'Animating the faithful to live their universal apostolic vocation.', 'https://images.unsplash.com/photo-1485217988980-11786ced9454?auto=format&fit=crop&w=1600&q=80', 'page-hero', 1, 9, '2026-07-06 05:09:42', '2026-07-06 05:09:42'),
	(23, 'Parishes / Mission Stations', 'parishes', 'standard', 'Parishes / Mission Stations', 'Parish ministry and mission stations serving the people of God in diverse regions.', 'Apostolic Works', 'Parishes / Mission Stations', 'Parish ministry and mission stations serving the people of God in diverse regions.', 'https://images.unsplash.com/photo-1519491050282-cf00c82424b4?auto=format&fit=crop&w=1600&q=80', 'page-hero', 1, 10, '2026-07-06 05:09:42', '2026-07-06 05:09:42'),
	(24, 'Boys Homes', 'boys-homes', 'standard', 'Boys Homes', 'Homes and boarding initiatives that care for children and young people in need.', 'Apostolic Works', 'Boys Homes', 'Homes and boarding initiatives that care for children and young people in need.', 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1600&q=80', 'page-hero', 1, 11, '2026-07-06 05:09:42', '2026-07-06 05:09:42'),
	(25, 'Social Apostolate', 'social-apostolate', 'standard', 'Social Apostolate', 'Service among the poor and marginalized through mission, development and solidarity.', 'Apostolic Works', 'Social Apostolate', 'Service among the poor and marginalized through mission, development and solidarity.', 'https://images.unsplash.com/photo-1469571486292-b53601020f84?auto=format&fit=crop&w=1600&q=80', 'page-hero', 1, 12, '2026-07-06 05:09:42', '2026-07-06 05:09:42'),
	(26, 'Contact Us', 'contact', 'contact', 'Contact Us', 'Reach the province office and stay connected with the Pallottine mission in Nagpur.', 'Contact', 'Contact Us', 'Reach the province office and stay connected with the Pallottine mission in Nagpur.', 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=1600&q=80', 'page-hero', 1, 13, '2026-07-06 05:09:42', '2026-07-06 05:09:42');

-- Dumping structure for table nagpur_web26db.lfc_site_sections
DROP TABLE IF EXISTS `lfc_site_sections`;
CREATE TABLE IF NOT EXISTS `lfc_site_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `site_page_id` bigint unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'content',
  `eyebrow` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_image_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `items` json DEFAULT NULL,
  `settings` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lfc_site_sections_site_page_id_foreign` (`site_page_id`),
  CONSTRAINT `lfc_site_sections_site_page_id_foreign` FOREIGN KEY (`site_page_id`) REFERENCES `lfc_site_pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_site_sections: ~42 rows (approximately)
REPLACE INTO `lfc_site_sections` (`id`, `site_page_id`, `key`, `name`, `layout`, `eyebrow`, `title`, `subtitle`, `content`, `image`, `image_alt`, `secondary_image`, `secondary_image_alt`, `items`, `settings`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
	(43, 14, 'welcome_strip', 'Welcome Strip', 'content', NULL, NULL, NULL, '<ul><li>Welcome to Prabhu Prakash Province, Nagpur. Birthdays, feast days and upcoming events will be updated here.&nbsp; &nbsp; sample content</li><li>test content&nbsp;</li></ul>', NULL, NULL, NULL, NULL, '[]', '[]', 1, 1, '2026-07-06 05:09:42', '2026-07-06 08:54:07'),
	(44, 14, 'vision_mission', 'Vision & Mission', 'content', 'Vision & Mission', 'Revive faith and enkindle charity', '', '', 'site/assets/img/mary-queen-apostles.webp', 'Mary Queen of Apostles', NULL, NULL, '[{"text": "To revive faith and enkindle charity in the entire world, collaborating with all people of good will to spread the Gospel of Christ.", "title": "Vision"}, {"text": "To empower every member of the Church to become an apostle in their own sphere of life, fostering unity and renewal.", "title": "Mission"}]', '[]', 1, 2, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(45, 14, 'milestone', 'Milestone', 'content', 'Milestone', '75 years of Pallottine Presence in India', '', '', 'site/assets/img/pallottine-75-years.webp', '75 years of Pallottine Presence in India', NULL, NULL, '[]', '[]', 1, 3, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(46, 14, 'leadership', 'Leadership', 'content', 'Provincial Administration', 'Guided by dedicated leadership', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[]', 1, 4, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(47, 14, 'stats', 'Stats', 'content', 'Province at a Glance', 'Members and formation', NULL, NULL, NULL, NULL, NULL, NULL, '[{"icon": "fa-solid fa-cross", "count": 133, "label": "Priests"}, {"icon": "fa-solid fa-handshake-angle", "count": 2, "label": "Brotherhood"}, {"icon": "fa-solid fa-award", "count": 4, "label": "Finally Professed"}, {"icon": "fa-solid fa-seedling", "count": 112, "label": "In Formation"}]', '[]', 1, 5, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(48, 14, 'videos', 'Videos', 'content', 'Pallotti Media Vision', 'Watch, reflect and stay connected', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '{"button_url": "https://www.youtube.com/", "button_label": "More Videos"}', 1, 6, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(49, 14, 'recent_updates', 'Recent Updates', 'content', 'Updates', 'Recent Events', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[]', 1, 7, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(50, 14, 'cta', 'Call To Action', 'cta', 'Stay Connected', 'Join the mission of faith, service and communion.', '', 'Explore our communities, apostolic works and provincial initiatives through this complete responsive website template.', NULL, NULL, NULL, NULL, '[]', '{"button_url": "/contact", "button_label": "Contact Province"}', 1, 8, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(51, 15, 'overview', 'Overview', 'content', 'Overview', 'St. Vincent Pallotti', NULL, '<h3 class="text-slate-600 leading-8 mb-4" style="text-align: center;">St. Vincent Pallotti (1795-1850)</h3><p class="text-slate-600 leading-8 mb-4" style="text-align: center;">(1795-1850)</p><h3 class="text-slate-600 leading-8 mb-4" style="text-align: center; ;"><img src="http://127.0.0.1:8000/storage/site/sections/content/af11b055-eef8-4d0b-9304-0ae71bd21eba.jpeg" title="St. Vincent Pallotti (1795-1850) (2).jpg" width="550" height="350"></h3><p class="text-slate-600 leading-8 mb-4"></p><p class="text-slate-600 leading-8 mb-4">Born : on 21 April 1795 in Rome</p><p class="text-slate-600 leading-8 mb-4">Parents : Peter Paul Pallotti &amp; Mary Magdalene de Rossi</p><p class="text-slate-600 leading-8 mb-4">Ordained : on 16 May 1818 for the Diocese of Rome</p><p class="text-slate-600 leading-8 mb-4">Founded : Union of the Catholic Apostolate (UAC),</p><p class="text-slate-600 leading-8 mb-4">                : Society of the Catholic Apostolate (SAC) on 4 April 1835 in Rome</p><p class="text-slate-600 leading-8 mb-4">Approved : on 4 April 1835 by Cardinal Vicar Carlo Odescalchi</p><p class="text-slate-600 leading-8 mb-4">                    : on 11 July 1835 by Pope Gregory XVI</p><p class="text-slate-600 leading-8 mb-4">Founded Congregation of Sisters: on 4 June 1838</p><p class="text-slate-600 leading-8 mb-4">Made his Consecration: on 4 October 1846 before Fr. Francesco Vaccari</p><p class="text-slate-600 leading-8 mb-4">Died : on 22 January 1850 in Rome</p><p class="text-slate-600 leading-8 mb-4">Declared Venerable : on 24 January 1932 by Pope Pius XI</p><p class="text-slate-600 leading-8 mb-4">Beatified : on 22 January 1950 by Pope Pius XII</p><p class="text-slate-600 leading-8 mb-4">Canonized : on 20 January 1963 by Pope John XXIII</p><p class="text-slate-600 leading-8 mb-4">Motto of his life : &quot;Love of Christ urges us on&quot;</p><p class="text-slate-600 leading-8 mb-4">Patroness : &quot;Mary Queen of Apostles&quot;</p><p class="text-slate-600 leading-8 mb-4">Hailed as</p><p class="text-slate-600 leading-8 mb-4">                : &quot;Apostle of Rome&quot; by the Romans</p><p class="text-slate-600 leading-8 mb-4">                : &quot;Second Philip Neri of Rome&quot; by the Romans</p><p class="text-slate-600 leading-8 mb-4">                : &quot;Second Francis of Assisi&quot; by the Romans</p><p class="text-slate-600 leading-8 mb-4">                : &quot;Sontorello&quot; (a little saint) by the Romans</p><p class="text-slate-600 leading-8 mb-4">                : &quot;Pioneer of Catholic Action&quot; by Pope Pius XI</p><p class="text-slate-600 leading-8 mb-4">                : &quot;Ornament of Roman Clergy&quot; by Pope Pius XII</p><p class="text-slate-600 leading-8 mb-4">                : &quot;Patron of the Missionary Union of the Clergy&quot; by Pope John XXIII</p><p class="text-slate-600 leading-8 mb-4"></p><p class="text-slate-600 leading-8 mb-4"></p><p class="text-slate-600 leading-8 mb-4"></p>', NULL, NULL, NULL, NULL, '[]', '[]', 1, 1, '2026-07-06 05:09:43', '2026-07-06 22:14:12'),
	(52, 15, 'highlights', 'Highlights', 'cards', 'Highlights', 'Key Details', NULL, NULL, NULL, NULL, NULL, NULL, '[{"icon": "fa-solid fa-church", "text": "Founded the Society of the Catholic Apostolate in Rome in 1835.", "title": "Founder"}, {"icon": "fa-solid fa-crown", "text": "Mary Queen of Apostles remains central to Pallottine spirituality.", "title": "Patroness"}, {"icon": "fa-solid fa-star", "text": "Canonized on 20 January 1963 by Pope John XXIII.", "title": "Canonized"}]', '[]', 1, 2, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(53, 15, 'cta', 'Call To Action', 'cta', 'Stay Connected', 'Join the mission of faith, service and communion.', '', 'Explore our communities, apostolic works and provincial initiatives through this complete responsive website template.', NULL, NULL, NULL, NULL, '[]', '{"button_url": "/contact", "button_label": "Contact Province"}', 1, 3, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(54, 16, 'overview', 'Overview', 'content', 'Overview', 'The Beginning', '', '<p class="text-slate-600 leading-8 mb-4">Saint Vincent Pallotti founded the Society as a community of priests and brothers in Rome in 1835.</p><p class="text-slate-600 leading-8 mb-4">From its earliest years, collaborators from different nations shared in Pallotti&#039;s vision of apostolic communion.</p><p class="text-slate-600 leading-8 mb-4">The Society grew through changing times, eventually restoring its original name in 1947 and rediscovering the founder&#039;s vision in the Extraordinary General Chapter of 1968.</p>', NULL, NULL, NULL, NULL, '[]', '{"icon": "fa-solid fa-cross", "card_text": "A mission of prayer, fraternity and selfless service for the renewal of faith and charity.", "card_title": "The love of Christ urges us on"}', 1, 1, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(55, 16, 'highlights', 'Highlights', 'cards', 'Highlights', 'Key Details', NULL, NULL, NULL, NULL, NULL, NULL, '[{"icon": "fa-solid fa-landmark", "text": "A community founded in Rome for the revival of faith and rekindling of charity.", "title": "1835 Foundation"}, {"icon": "fa-solid fa-earth-asia", "text": "Early collaborators came from different nations, reflecting Pallotti\'s wider vision.", "title": "International Spirit"}, {"icon": "fa-solid fa-seedling", "text": "The Society continues to renew the apostolic call of all the faithful.", "title": "Renewed Charism"}]', '[]', 1, 2, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(56, 16, 'cta', 'Call To Action', 'cta', 'Stay Connected', 'Join the mission of faith, service and communion.', '', 'Explore our communities, apostolic works and provincial initiatives through this complete responsive website template.', NULL, NULL, NULL, NULL, '[]', '{"button_url": "/contact", "button_label": "Contact Province"}', 1, 3, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(57, 17, 'timeline', 'Timeline', 'timeline', 'Timeline', '75 years of Pallottine presence', NULL, NULL, NULL, NULL, NULL, NULL, '[{"text": "The first two German missionaries arrived in Bombay and proceeded to Nagpur and Raipur.", "year": "1951"}, {"text": "Foundation of the Christsevikas of the Society of the Catholic Apostolate.", "year": "1955"}, {"text": "First novitiate house for Indian Pallottines was established in Raipur.", "year": "1956"}, {"text": "The first Pallottine school in India, Holy Cross School, Byron Bazar, Raipur.", "year": "1957"}, {"text": "First Indian priest was ordained and the first Indian Pallottine brother made profession.", "year": "1959"}, {"text": "The Pallottine Delegature was officially established in India.", "year": "1961"}, {"text": "Msgr. Hans Weidner was appointed first Prefect Apostolic of Raipur.", "year": "1964"}, {"text": "Pallottigiri was established as a formation centre.", "year": "1981"}, {"text": "The Pallottines established Northern Delegature.", "year": "1988"}]', '[]', 1, 1, '2026-07-06 05:09:43', '2026-07-06 05:09:43'),
	(58, 17, 'cta', 'Call To Action', 'cta', 'Stay Connected', 'Join the mission of faith, service and communion.', '', 'Explore our communities, apostolic works and provincial initiatives through this complete responsive website template.', NULL, NULL, NULL, NULL, '[]', '{"button_url": "/contact", "button_label": "Contact Province"}', 1, 2, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(59, 18, 'overview', 'Overview', 'content', 'Overview', 'Local Communities', '', '<p class="text-slate-600 leading-8 mb-4">The Prabhu Prakash Province is composed of local communities rooted in fraternity, apostolic service and shared responsibility.</p><p class="text-slate-600 leading-8 mb-4">Local communities express the Pallottine charism through prayer, ministry, pastoral collaboration and mission outreach.</p>', NULL, NULL, NULL, NULL, '[]', '{"icon": "fa-solid fa-cross", "card_text": "A mission of prayer, fraternity and selfless service for the renewal of faith and charity.", "card_title": "The love of Christ urges us on"}', 1, 1, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(60, 18, 'highlights', 'Highlights', 'cards', 'Highlights', 'Key Details', NULL, NULL, NULL, NULL, NULL, NULL, '[{"icon": "fa-solid fa-house-chimney", "text": "A major community and provincial centre located at Seminary Hills, Nagpur.", "title": "Pallotti Bhawan, Nagpur"}, {"icon": "fa-solid fa-mountain-sun", "text": "A formation-linked community located in the mountain ranges of Idukki.", "title": "Pallotti Sadan, Idukki"}, {"icon": "fa-solid fa-people-roof", "text": "Communities serving in various pastoral, educational and social apostolate locations.", "title": "Mission Communities"}]', '[]', 1, 2, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(61, 18, 'cta', 'Call To Action', 'cta', 'Stay Connected', 'Join the mission of faith, service and communion.', '', 'Explore our communities, apostolic works and provincial initiatives through this complete responsive website template.', NULL, NULL, NULL, NULL, '[]', '{"button_url": "/contact", "button_label": "Contact Province"}', 1, 3, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(62, 19, 'overview', 'Overview', 'content', 'Overview', 'Commission Structure', '', '<p class="text-slate-600 leading-8 mb-4">The commissions are auxiliary bodies of the Provincial Administration, helping the Province plan, coordinate and evaluate important areas of mission.</p><p class="text-slate-600 leading-8 mb-4">Each commission supports a particular field, from spirituality and formation to education, finance, pastoral ministry, youth, social apostolate and media communication.</p>', NULL, NULL, NULL, NULL, '[]', '{"icon": "fa-solid fa-cross", "card_text": "A mission of prayer, fraternity and selfless service for the renewal of faith and charity.", "card_title": "The love of Christ urges us on"}', 1, 1, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(63, 19, 'highlights', 'Highlights', 'cards', 'Highlights', 'Key Details', NULL, NULL, NULL, NULL, NULL, NULL, '[{"icon": "fa-solid fa-users-gear", "text": "Supports spiritual renewal, prayer and animation in the Province.", "title": "Spiritual Animation"}, {"icon": "fa-solid fa-users-gear", "text": "Formulates policies, evaluates institutions and guides educational initiatives.", "title": "Education Board"}, {"icon": "fa-solid fa-users-gear", "text": "Plans, monitors and coordinates financial management of the Province.", "title": "Finance Commission"}]', '[]', 1, 2, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(64, 19, 'cta', 'Call To Action', 'cta', 'Stay Connected', 'Join the mission of faith, service and communion.', '', 'Explore our communities, apostolic works and provincial initiatives through this complete responsive website template.', NULL, NULL, NULL, NULL, '[]', '{"button_url": "/contact", "button_label": "Contact Province"}', 1, 3, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(65, 21, 'overview', 'Overview', 'content', 'Overview', 'Education', '', '<p class="text-slate-600 leading-8 mb-4">The Province participates in the educational mission of the Church by forming young minds and hearts in truth, discipline and service.</p><p class="text-slate-600 leading-8 mb-4">Schools and educational initiatives become spaces of human development, leadership and Christian witness in society.</p>', NULL, NULL, NULL, NULL, '[]', '{"icon": "fa-solid fa-cross", "card_text": "A mission of prayer, fraternity and selfless service for the renewal of faith and charity.", "card_title": "The love of Christ urges us on"}', 1, 1, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(66, 21, 'highlights', 'Highlights', 'cards', 'Highlights', 'Key Details', NULL, NULL, NULL, NULL, NULL, NULL, '[{"icon": "fa-solid fa-school", "text": "Educational institutions committed to quality learning and value formation.", "title": "Schools"}, {"icon": "fa-solid fa-book-open-reader", "text": "Education that fosters intellectual, moral and spiritual growth.", "title": "Holistic Formation"}, {"icon": "fa-solid fa-people-group", "text": "Schools that serve families and local communities with dedication.", "title": "Community Impact"}]', '[]', 1, 2, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(67, 21, 'cta', 'Call To Action', 'cta', 'Stay Connected', 'Join the mission of faith, service and communion.', '', 'Explore our communities, apostolic works and provincial initiatives through this complete responsive website template.', NULL, NULL, NULL, NULL, '[]', '{"button_url": "/contact", "button_label": "Contact Province"}', 1, 3, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(68, 22, 'overview', 'Overview', 'content', 'Overview', 'Lay Animation', '', '<p class="text-slate-600 leading-8 mb-4">St. Vincent Pallotti believed that the saving mission of the Church belongs to all the faithful.</p><p class="text-slate-600 leading-8 mb-4">Only through close cooperation of priests and lay people can evangelization flourish. The Province continues this dream through animation centres and apostolic formation.</p>', NULL, NULL, NULL, NULL, '[]', '{"icon": "fa-solid fa-cross", "card_text": "A mission of prayer, fraternity and selfless service for the renewal of faith and charity.", "card_title": "The love of Christ urges us on"}', 1, 1, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(69, 22, 'highlights', 'Highlights', 'cards', 'Highlights', 'Key Details', NULL, NULL, NULL, NULL, NULL, NULL, '[{"icon": "fa-solid fa-people-group", "text": "Centre in Nagpur for lay animation and apostolic renewal.", "title": "Pallottine Animation Centre"}, {"icon": "fa-solid fa-hands-holding-circle", "text": "Animation centre in Thiruvananthapuram supporting formation and service.", "title": "Mariarani Center"}, {"icon": "fa-solid fa-dove", "text": "A centre committed to prayer, mission and lay participation.", "title": "Sehion"}]', '[]', 1, 2, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(70, 22, 'cta', 'Call To Action', 'cta', 'Stay Connected', 'Join the mission of faith, service and communion.', '', 'Explore our communities, apostolic works and provincial initiatives through this complete responsive website template.', NULL, NULL, NULL, NULL, '[]', '{"button_url": "/contact", "button_label": "Contact Province"}', 1, 3, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(71, 23, 'overview', 'Overview', 'content', 'Overview', 'Parishes / Mission Stations', '', '<p class="text-slate-600 leading-8 mb-4">Parish ministry and mission stations are key expressions of the Province&#039;s pastoral service among the people of God.</p><p class="text-slate-600 leading-8 mb-4">Through sacramental life, catechesis, accompaniment and outreach, these centres sustain faith communities in urban and rural settings.</p>', NULL, NULL, NULL, NULL, '[]', '{"icon": "fa-solid fa-cross", "card_text": "A mission of prayer, fraternity and selfless service for the renewal of faith and charity.", "card_title": "The love of Christ urges us on"}', 1, 1, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(72, 23, 'highlights', 'Highlights', 'cards', 'Highlights', 'Key Details', NULL, NULL, NULL, NULL, NULL, NULL, '[{"icon": "fa-solid fa-church", "text": "Pastoral care through liturgy, catechesis and community accompaniment.", "title": "Parish Ministry"}, {"icon": "fa-solid fa-map-location-dot", "text": "Outreach in mission regions where the Church accompanies growing communities.", "title": "Mission Stations"}, {"icon": "fa-solid fa-cross", "text": "Continuing formation for children, youth and families in parish life.", "title": "Faith Formation"}]', '[]', 1, 2, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(73, 23, 'cta', 'Call To Action', 'cta', 'Stay Connected', 'Join the mission of faith, service and communion.', '', 'Explore our communities, apostolic works and provincial initiatives through this complete responsive website template.', NULL, NULL, NULL, NULL, '[]', '{"button_url": "/contact", "button_label": "Contact Province"}', 1, 3, '2026-07-06 05:09:44', '2026-07-06 05:09:44'),
	(74, 24, 'overview', 'Overview', 'content', 'Overview', 'Boys Homes', '', '<p class="text-slate-600 leading-8 mb-4">St. Vincent Pallotti fought against the neglect of children and opened homes for the unskilled and homeless.</p><p class="text-slate-600 leading-8 mb-4">The Province continues this work of charity through boys homes and boarding schools in different parts of the country.</p>', NULL, NULL, NULL, NULL, '[]', '{"icon": "fa-solid fa-cross", "card_text": "A mission of prayer, fraternity and selfless service for the renewal of faith and charity.", "card_title": "The love of Christ urges us on"}', 1, 1, '2026-07-06 05:09:45', '2026-07-06 05:09:45'),
	(75, 24, 'highlights', 'Highlights', 'cards', 'Highlights', 'Key Details', NULL, NULL, NULL, NULL, NULL, NULL, '[{"icon": "fa-solid fa-child-reaching", "text": "Aulia Koladit P.O., Via Pandhana, Khandwa District, Madhya Pradesh.", "title": "Boarding School, Aulia"}, {"icon": "fa-solid fa-house-user", "text": "Boarding School, Ishgarh, Pipilia P.O., Jhabua, Madhya Pradesh.", "title": "Boarding School, Ishgarh"}]', '[]', 1, 2, '2026-07-06 05:09:45', '2026-07-06 05:09:45'),
	(76, 24, 'cta', 'Call To Action', 'cta', 'Stay Connected', 'Join the mission of faith, service and communion.', '', 'Explore our communities, apostolic works and provincial initiatives through this complete responsive website template.', NULL, NULL, NULL, NULL, '[]', '{"button_url": "/contact", "button_label": "Contact Province"}', 1, 3, '2026-07-06 05:09:45', '2026-07-06 05:09:45'),
	(77, 25, 'overview', 'Overview', 'content', 'Overview', 'Social Apostolate', '', '<p class="text-slate-600 leading-8 mb-4">The social apostolate of the Province reaches out to the poor and marginalized with compassion, justice and practical solidarity.</p><p class="text-slate-600 leading-8 mb-4">Through service projects, mission outreach and community collaboration, the Province witnesses to the Gospel in daily life.</p>', NULL, NULL, NULL, NULL, '[]', '{"icon": "fa-solid fa-cross", "card_text": "A mission of prayer, fraternity and selfless service for the renewal of faith and charity.", "card_title": "The love of Christ urges us on"}', 1, 1, '2026-07-06 05:09:45', '2026-07-06 05:09:45'),
	(78, 25, 'highlights', 'Highlights', 'cards', 'Highlights', 'Key Details', NULL, NULL, NULL, NULL, NULL, NULL, '[{"icon": "fa-solid fa-hand-holding-heart", "text": "Supporting vulnerable people through mission and service programmes.", "title": "Social Outreach"}, {"icon": "fa-solid fa-seedling", "text": "Human development projects that strengthen families and communities.", "title": "Development Initiatives"}, {"icon": "fa-solid fa-people-arrows", "text": "Collaboration with local communities for sustainable change and dignity.", "title": "Solidarity"}]', '[]', 1, 2, '2026-07-06 05:09:45', '2026-07-06 05:09:45'),
	(79, 25, 'cta', 'Call To Action', 'cta', 'Stay Connected', 'Join the mission of faith, service and communion.', '', 'Explore our communities, apostolic works and provincial initiatives through this complete responsive website template.', NULL, NULL, NULL, NULL, '[]', '{"button_url": "/contact", "button_label": "Contact Province"}', 1, 3, '2026-07-06 05:09:45', '2026-07-06 05:09:45'),
	(80, 20, 'intro', 'Formation Intro', 'content', 'Overview', 'A formation journey rooted in faith and mission', '', '<p>St. Vincent Pallotti gave great attention to religious formation, spiritual accompaniment and preparation for apostolic activity.</p><p>The Province runs centres of formation where candidates are prepared for future pastoral and apostolic work in the Society.</p>', NULL, NULL, NULL, NULL, '[]', '[]', 1, 1, '2026-07-06 05:09:45', '2026-07-06 05:09:45'),
	(81, 20, 'sidebar', 'Formation Sidebar', 'sidebar', 'Formation Contact', 'Formation Centres', 'A reference-inspired address panel for the key formation houses, styled to match the current premium province website.', NULL, NULL, NULL, NULL, NULL, '[{"icon": "fa-solid fa-location-dot", "text": "Monvila, Kulathoor P.O.\\nThiruvananthapuram, Kerala, India", "title": "Pallottigiri"}, {"icon": "fa-solid fa-building", "text": "Umran, Shillong\\nMeghalaya, India", "title": "Casa Pallotti"}, {"icon": "fa-solid fa-house-chimney", "text": "Seminary Hills\\nNagpur, Maharashtra, India", "title": "Pallotti Bhawan"}, {"icon": "fa-solid fa-phone", "text": "+91 9503505802\\nnapallottines@gmail.com", "title": "Province Contact"}]', '[]', 1, 2, '2026-07-06 05:09:45', '2026-07-06 05:09:45'),
	(82, 20, 'centres', 'Formation Centres', 'cards', 'List of Formation Centres', 'Formation houses and study centres', NULL, NULL, NULL, NULL, NULL, NULL, '[{"text": "Vocation Orientation Centre for Kerala, North and North East of India, serving as an important early stage of discernment and accompaniment.", "image": "site/assets/img/event-jubilee.webp", "title": "Pallottigiri"}, {"text": "Minor seminary in Umran, Shillong, dedicated to the initial formation of students from the Northeast in a setting of prayer, study and community living.", "image": "site/assets/img/event-pallotti-media.webp", "title": "Casa Pallotti"}, {"text": "A major house of formation at Seminary Hills, Nagpur, supporting candidates through a disciplined life of fraternity, study and spiritual growth.", "image": "site/assets/img/mary-queen-apostles.webp", "title": "Pallotti Bhawan"}]', '[]', 1, 3, '2026-07-06 05:09:45', '2026-07-06 05:09:45'),
	(83, 20, 'note', 'Formation Note', 'content', 'Pallottine Spirit', 'The love of Christ urges us on', '', 'Formation in the Province is shaped by prayer, fraternity and generous apostolic availability so that candidates grow into faithful servants of the Church.', NULL, NULL, NULL, NULL, '[]', '{"icon": "fa-solid fa-cross"}', 1, 4, '2026-07-06 05:09:45', '2026-07-06 05:09:45'),
	(84, 26, 'contact_details', 'Contact Details', 'contact', 'Province Office', 'Pallotti Bhawan', NULL, NULL, NULL, NULL, NULL, NULL, '[{"icon": "fa-solid fa-location-dot", "text": "Pallotti Bhawan, Seminary Hills, Nagpur, Maharashtra, India", "title": "Address"}, {"icon": "fa-solid fa-phone", "text": "+91 9503505802\\n+91 9074515998", "title": "Phone"}, {"icon": "fa-solid fa-envelope", "text": "napallottines@gmail.com\\nroswanherald@gmail.com", "title": "Email"}, {"icon": "fa-solid fa-globe", "text": "www.napallottines.org", "title": "Website"}]', '[]', 1, 1, '2026-07-06 05:09:45', '2026-07-06 05:09:45');

-- Dumping structure for table nagpur_web26db.lfc_site_settings
DROP TABLE IF EXISTS `lfc_site_settings`;
CREATE TABLE IF NOT EXISTS `lfc_site_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_prefix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone_primary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_secondary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_primary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_secondary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_about` text COLLATE utf8mb4_unicode_ci,
  `footer_copyright` text COLLATE utf8mb4_unicode_ci,
  `google_map_iframe` longtext COLLATE utf8mb4_unicode_ci,
  `social_links` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_site_settings: ~1 rows (approximately)
REPLACE INTO `lfc_site_settings` (`id`, `site_name`, `site_tagline`, `brand_prefix`, `logo`, `footer_logo`, `top_address`, `top_email`, `top_phone`, `top_website`, `address`, `phone_primary`, `phone_secondary`, `email_primary`, `email_secondary`, `website`, `footer_about`, `footer_copyright`, `google_map_iframe`, `social_links`, `created_at`, `updated_at`) VALUES
	(1, 'Prabhu Prakash Province, Nagpur', 'Pallottine Province', 'Society of Catholic Apostolate', 'site/assets/img/crest.png', 'site/assets/img/crest.png', 'Pallotti Bhawan, Seminary Hills, Nagpur', 'napallottines@gmail.com', '+91 9503505802', 'www.napallottines.org', 'Pallotti Bhawan, Seminary Hills, Nagpur, Maharashtra, India', '+91 9503505802', '+91 9074515998', 'napallottines@gmail.com', 'roswanherald@gmail.com', 'www.napallottines.org', 'Reviving faith and enkindling charity through prayer, formation, education, pastoral care and social apostolate.', '(c) 2026 Prabhu Prakash Province, Nagpur. Designed as a responsive HTML template.', '<iframe src="https://www.google.com/maps?q=Seminary%20Hills%20Nagpur&output=embed" width="100%" height="320" style="border:0;" loading="lazy"></iframe>', '[{"url": "#", "icon": "fa-brands fa-facebook-f", "label": "Facebook", "target": "_blank"}, {"url": "#", "icon": "fa-brands fa-youtube", "label": "YouTube", "target": "_blank"}, {"url": "#", "icon": "fa-brands fa-instagram", "label": "Instagram", "target": "_blank"}]', '2026-07-06 05:09:19', '2026-07-06 05:09:39');

-- Dumping structure for table nagpur_web26db.lfc_sliders
DROP TABLE IF EXISTS `lfc_sliders`;
CREATE TABLE IF NOT EXISTS `lfc_sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` json NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_sliders_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_sliders: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_social_icons
DROP TABLE IF EXISTS `lfc_social_icons`;
CREATE TABLE IF NOT EXISTS `lfc_social_icons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_by` int DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_social_icons: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_staffs
DROP TABLE IF EXISTS `lfc_staffs`;
CREATE TABLE IF NOT EXISTS `lfc_staffs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` json NOT NULL,
  `qualification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_by` int NOT NULL DEFAULT '0',
  `staff_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_staffs: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_timetables
DROP TABLE IF EXISTS `lfc_timetables`;
CREATE TABLE IF NOT EXISTS `lfc_timetables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lfc_timetables_type_index` (`type`),
  KEY `lfc_timetables_is_published_index` (`is_published`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_timetables: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_timetable_entries
DROP TABLE IF EXISTS `lfc_timetable_entries`;
CREATE TABLE IF NOT EXISTS `lfc_timetable_entries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `timetable_id` bigint unsigned NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lfc_timetable_entries_timetable_id_foreign` (`timetable_id`),
  CONSTRAINT `lfc_timetable_entries_timetable_id_foreign` FOREIGN KEY (`timetable_id`) REFERENCES `lfc_timetables` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_timetable_entries: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_toppers
DROP TABLE IF EXISTS `lfc_toppers`;
CREATE TABLE IF NOT EXISTS `lfc_toppers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_toppers: ~0 rows (approximately)

-- Dumping structure for table nagpur_web26db.lfc_users
DROP TABLE IF EXISTS `lfc_users`;
CREATE TABLE IF NOT EXISTS `lfc_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lfc_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_users: ~2 rows (approximately)
REPLACE INTO `lfc_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Super Admin', 'superadmin@admin.com', NULL, '$2y$10$QkOF50FiHcB1lE41EZF.Ae3Iat9Gdv48X5pxDacR6m.IFinR3A0m2', NULL, '2026-07-06 05:07:54', '2026-07-06 05:07:54', NULL),
	(2, 'Admin', 'admin@admin.com', NULL, '$2y$10$lmbKGQh77MBcfN01x9m1ieOpb2mrYlVLMrvEJIOAJFej6h7uVvl7K', NULL, '2026-07-06 05:07:55', '2026-07-06 05:07:55', NULL);

-- Dumping structure for table nagpur_web26db.lfc_video_gallery
DROP TABLE IF EXISTS `lfc_video_gallery`;
CREATE TABLE IF NOT EXISTS `lfc_video_gallery` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nagpur_web26db.lfc_video_gallery: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
