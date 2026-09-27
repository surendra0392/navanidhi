-- MySQL dump 10.13  Distrib 9.7.0, for Win64 (x86_64)
--
-- Host: localhost    Database: managro
-- ------------------------------------------------------
-- Server version	9.7.0

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresses` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `address_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_address_id` int unsigned DEFAULT NULL,
  `customer_id` int unsigned DEFAULT NULL COMMENT 'null if guest checkout',
  `cart_id` int unsigned DEFAULT NULL COMMENT 'only for cart_addresses',
  `order_id` int unsigned DEFAULT NULL COMMENT 'only for order_addresses',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_address` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'only for customer_addresses',
  `use_for_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_customer_id_foreign` (`customer_id`),
  KEY `addresses_cart_id_foreign` (`cart_id`),
  KEY `addresses_order_id_foreign` (`order_id`),
  KEY `addresses_parent_address_id_foreign` (`parent_address_id`),
  CONSTRAINT `addresses_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_parent_address_id_foreign` FOREIGN KEY (`parent_address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=1084 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,'cart_billing',NULL,NULL,1,NULL,'Aarav','Sharma',NULL,'','124 Botanical Gardens Road','Hyderabad','TG','IN','500081','aarav.sharma@example.com','9876543210',NULL,0,1,NULL,'2026-09-21 21:01:37','2026-09-21 21:01:37'),(2,'cart_shipping',NULL,NULL,1,NULL,'Aarav','Sharma',NULL,'','124 Botanical Gardens Road','Hyderabad','TG','IN','500081','aarav.sharma@example.com','9876543210',NULL,0,0,NULL,'2026-09-21 21:01:37','2026-09-21 21:01:37'),(3,'order_shipping',NULL,NULL,NULL,1,'Aarav','Sharma',NULL,'','124 Botanical Gardens Road','Hyderabad','TG','IN','500081','aarav.sharma@example.com','9876543210',NULL,0,0,NULL,'2026-09-21 21:07:32','2026-09-21 21:07:32'),(4,'order_billing',NULL,NULL,NULL,1,'Aarav','Sharma',NULL,'','124 Botanical Gardens Road','Hyderabad','TG','IN','500081','aarav.sharma@example.com','9876543210',NULL,0,0,NULL,'2026-09-21 21:07:32','2026-09-21 21:07:32'),(5,'customer',NULL,1,NULL,NULL,'Aarav','Reddy',NULL,'','Flat 402, Botanical Enclave, Road No. 12\r\nBanjara Hills','Hyderabad','TG','IN','500034','aarav.reddy@example.com','9876543210',NULL,1,0,NULL,'2026-09-21 21:50:49','2026-09-21 21:50:49'),(6,'cart_billing',5,1,2,NULL,'Aarav','Reddy',NULL,'','Flat 402, Botanical Enclave, Road No. 12\r\nBanjara Hills','Hyderabad','TG','IN','500034','aarav.reddy@example.com','9876543210',NULL,0,1,NULL,'2026-09-21 21:54:51','2026-09-21 21:54:51'),(7,'cart_shipping',5,1,2,NULL,'Aarav','Reddy',NULL,'','Flat 402, Botanical Enclave, Road No. 12\r\nBanjara Hills','Hyderabad','TG','IN','500034','aarav.reddy@example.com','9876543210',NULL,0,0,NULL,'2026-09-21 21:54:51','2026-09-21 21:54:51'),(8,'order_shipping',NULL,NULL,NULL,2,'Aarav','Reddy',NULL,'','Flat 402, Botanical Enclave, Road No. 12\r\nBanjara Hills','Hyderabad','TG','IN','500034','aarav.reddy@example.com','9876543210',NULL,0,0,NULL,'2026-09-21 21:55:09','2026-09-21 21:55:09'),(9,'order_billing',NULL,NULL,NULL,2,'Aarav','Reddy',NULL,'','Flat 402, Botanical Enclave, Road No. 12\r\nBanjara Hills','Hyderabad','TG','IN','500034','aarav.reddy@example.com','9876543210',NULL,0,0,NULL,'2026-09-21 21:55:09','2026-09-21 21:55:09'),(10,'cart_shipping',NULL,NULL,4,NULL,'','',NULL,NULL,'','','TG','IN','500001',NULL,NULL,NULL,0,1,NULL,'2026-09-22 09:39:13','2026-09-22 09:39:13'),(11,'cart_billing',NULL,NULL,4,NULL,'','',NULL,NULL,'','','TG','IN','500001',NULL,NULL,NULL,0,1,NULL,'2026-09-22 09:39:13','2026-09-22 09:39:13'),(772,'cart_billing',NULL,NULL,788,NULL,'Rahul','Sharma',NULL,'','Plot 42, Hitech City','Hyderabad','TG','IN','500081','rahul@example.com','9876543210',NULL,0,1,NULL,'2026-09-25 02:31:39','2026-09-25 02:31:39'),(773,'cart_shipping',NULL,NULL,788,NULL,'Rahul','Sharma',NULL,'','Plot 42, Hitech City','Hyderabad','TG','IN','500081','rahul@example.com','9876543210',NULL,0,0,NULL,'2026-09-25 02:31:39','2026-09-25 02:31:39');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_password_resets`
--

LOCK TABLES `admin_password_resets` WRITE;
/*!40000 ALTER TABLE `admin_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `role_id` int unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `two_factor_backup_codes` json DEFAULT NULL,
  `two_factor_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  UNIQUE KEY `admins_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=446 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Example','admin@example.com','$2y$12$R5q7PfTwHNeHtzqZipXpxecEusyiaeCg8axDtazHuVPEEFZRO84jq','U3JWBIAJG9TpBWCUjyL3YjHST9SYxkX0QIwNpz26iKE02Zmo0CO5l7ra6Ihk1kX9vAnjOg5yxcG0qaOC',1,1,NULL,NULL,NULL,0,NULL,NULL,'2026-09-21 17:34:01','2026-09-21 17:34:01');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent_conversation_messages`
--

DROP TABLE IF EXISTS `agent_conversation_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agent_conversation_messages` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversation_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tool_calls` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tool_results` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `usage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conversation_index` (`conversation_id`,`user_id`,`updated_at`),
  KEY `agent_conversation_messages_user_id_index` (`user_id`),
  KEY `agent_conversation_messages_conversation_id_index` (`conversation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_conversation_messages`
--

LOCK TABLES `agent_conversation_messages` WRITE;
/*!40000 ALTER TABLE `agent_conversation_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent_conversation_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent_conversations`
--

DROP TABLE IF EXISTS `agent_conversations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agent_conversations` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_conversations_user_id_updated_at_index` (`user_id`,`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_conversations`
--

LOCK TABLES `agent_conversations` WRITE;
/*!40000 ALTER TABLE `agent_conversations` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent_conversations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_families`
--

DROP TABLE IF EXISTS `attribute_families`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attribute_families` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_families`
--

LOCK TABLES `attribute_families` WRITE;
/*!40000 ALTER TABLE `attribute_families` DISABLE KEYS */;
INSERT INTO `attribute_families` VALUES (1,'default','Default',0,1);
/*!40000 ALTER TABLE `attribute_families` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_group_mappings`
--

DROP TABLE IF EXISTS `attribute_group_mappings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attribute_group_mappings` (
  `attribute_id` int unsigned NOT NULL,
  `attribute_group_id` int unsigned NOT NULL,
  `position` int DEFAULT NULL,
  PRIMARY KEY (`attribute_id`,`attribute_group_id`),
  KEY `attribute_group_mappings_attribute_group_id_foreign` (`attribute_group_id`),
  CONSTRAINT `attribute_group_mappings_attribute_group_id_foreign` FOREIGN KEY (`attribute_group_id`) REFERENCES `attribute_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `attribute_group_mappings_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_group_mappings`
--

LOCK TABLES `attribute_group_mappings` WRITE;
/*!40000 ALTER TABLE `attribute_group_mappings` DISABLE KEYS */;
INSERT INTO `attribute_group_mappings` VALUES (1,1,1),(2,1,3),(3,1,4),(4,1,5),(5,6,1),(6,6,2),(7,6,3),(8,6,4),(9,2,1),(10,2,2),(11,4,1),(12,4,2),(13,4,3),(14,4,4),(15,4,5),(16,3,1),(17,3,2),(18,3,3),(19,5,1),(20,5,2),(21,5,3),(22,5,4),(23,1,6),(24,1,7),(25,1,8),(26,6,5),(27,1,2),(28,7,1),(29,8,1),(30,8,2),(31,1,50),(32,1,51),(33,1,52),(34,1,53),(35,1,54);
/*!40000 ALTER TABLE `attribute_group_mappings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_groups`
--

DROP TABLE IF EXISTS `attribute_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attribute_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_family_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column` int NOT NULL DEFAULT '1',
  `position` int NOT NULL,
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `attribute_groups_attribute_family_id_name_unique` (`attribute_family_id`,`name`),
  CONSTRAINT `attribute_groups_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_groups`
--

LOCK TABLES `attribute_groups` WRITE;
/*!40000 ALTER TABLE `attribute_groups` DISABLE KEYS */;
INSERT INTO `attribute_groups` VALUES (1,'general',1,'General',1,1,0),(2,'description',1,'Description',1,2,0),(3,'meta_description',1,'Meta Description',1,3,0),(4,'price',1,'Price',2,1,0),(5,'shipping',1,'Shipping',2,2,0),(6,'settings',1,'Settings',2,3,0),(7,'inventories',1,'Inventories',2,4,0),(8,'rma',1,'RMA',2,5,0);
/*!40000 ALTER TABLE `attribute_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_option_translations`
--

DROP TABLE IF EXISTS `attribute_option_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attribute_option_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `attribute_option_id` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attribute_option_locale_unique` (`attribute_option_id`,`locale`),
  CONSTRAINT `attribute_option_translations_attribute_option_id_foreign` FOREIGN KEY (`attribute_option_id`) REFERENCES `attribute_options` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_option_translations`
--

LOCK TABLES `attribute_option_translations` WRITE;
/*!40000 ALTER TABLE `attribute_option_translations` DISABLE KEYS */;
INSERT INTO `attribute_option_translations` VALUES (19,1,'en','Red'),(20,2,'en','Green'),(21,3,'en','Yellow'),(22,4,'en','Black'),(23,5,'en','White'),(24,6,'en','S'),(25,7,'en','M'),(26,8,'en','L'),(27,9,'en','XL'),(28,10,'en','100g Pack'),(29,10,'hi_IN','100g Pack'),(30,11,'en','250g Pack'),(31,11,'hi_IN','250g Pack'),(32,12,'en','500g Pack'),(33,12,'hi_IN','500g Pack'),(34,13,'en','1kg Value Pack'),(35,13,'hi_IN','1kg Value Pack');
/*!40000 ALTER TABLE `attribute_option_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_options`
--

DROP TABLE IF EXISTS `attribute_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attribute_options` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` int unsigned NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int DEFAULT NULL,
  `swatch_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_options_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `attribute_options_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_options`
--

LOCK TABLES `attribute_options` WRITE;
/*!40000 ALTER TABLE `attribute_options` DISABLE KEYS */;
INSERT INTO `attribute_options` VALUES (1,23,'Red',1,NULL),(2,23,'Green',2,NULL),(3,23,'Yellow',3,NULL),(4,23,'Black',4,NULL),(5,23,'White',5,NULL),(6,24,'S',1,NULL),(7,24,'M',2,NULL),(8,24,'L',3,NULL),(9,24,'XL',4,NULL),(10,24,'100g',10,'100g'),(11,24,'250g',11,'250g'),(12,24,'500g',12,'500g'),(13,24,'1kg',13,'1kg');
/*!40000 ALTER TABLE `attribute_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_translations`
--

DROP TABLE IF EXISTS `attribute_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attribute_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attribute_translations_attribute_id_locale_unique` (`attribute_id`,`locale`),
  CONSTRAINT `attribute_translations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_translations`
--

LOCK TABLES `attribute_translations` WRITE;
/*!40000 ALTER TABLE `attribute_translations` DISABLE KEYS */;
INSERT INTO `attribute_translations` VALUES (61,1,'en','SKU'),(62,2,'en','Name'),(63,3,'en','URL Key'),(64,4,'en','Tax Category'),(65,5,'en','New'),(66,6,'en','Featured'),(67,7,'en','Visible Individually'),(68,8,'en','Status'),(69,9,'en','Short Description'),(70,10,'en','Description'),(71,11,'en','Price'),(72,12,'en','Cost'),(73,13,'en','Special Price'),(74,14,'en','Special Price From'),(75,15,'en','Special Price To'),(76,16,'en','Meta Title'),(77,17,'en','Meta Keywords'),(78,18,'en','Meta Description'),(79,19,'en','Length'),(80,20,'en','Width'),(81,21,'en','Height'),(82,22,'en','Weight'),(83,23,'en','Color'),(84,24,'en','Size'),(85,25,'en','Brand'),(86,26,'en','Guest Checkout'),(87,27,'en','Product Number'),(88,28,'en','Manage Stock'),(89,29,'en','Allow RMA'),(90,30,'en','RMA Rules'),(91,31,'en','Ingredients'),(92,31,'hi_IN','Ingredients'),(93,32,'en','Recommended Usage'),(94,32,'hi_IN','Recommended Usage'),(95,33,'en','Storage Instructions'),(96,33,'hi_IN','Storage Instructions'),(97,34,'en','Shelf Life'),(98,34,'hi_IN','Shelf Life'),(99,35,'en','Country of Origin'),(100,35,'hi_IN','Country of Origin');
/*!40000 ALTER TABLE `attribute_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attributes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `swatch_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int DEFAULT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `is_unique` tinyint(1) NOT NULL DEFAULT '0',
  `is_filterable` tinyint(1) NOT NULL DEFAULT '0',
  `is_comparable` tinyint(1) NOT NULL DEFAULT '0',
  `is_configurable` tinyint(1) NOT NULL DEFAULT '0',
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1',
  `is_visible_on_front` tinyint(1) NOT NULL DEFAULT '0',
  `value_per_locale` tinyint(1) NOT NULL DEFAULT '0',
  `value_per_channel` tinyint(1) NOT NULL DEFAULT '0',
  `default_value` int DEFAULT NULL,
  `enable_wysiwyg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attributes_code_unique` (`code`),
  KEY `attributes_code_index` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attributes`
--

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
INSERT INTO `attributes` VALUES (1,'sku','SKU','text',NULL,NULL,NULL,1,1,1,0,0,0,0,0,0,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(2,'name','Name','text',NULL,NULL,NULL,3,1,0,0,1,0,0,0,1,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(3,'url_key','URL Key','text',NULL,NULL,NULL,4,1,1,0,0,0,0,0,1,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(4,'tax_category_id','Tax Category','select',NULL,NULL,NULL,5,0,0,0,0,0,0,0,0,1,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(5,'new','New','boolean',NULL,NULL,NULL,6,0,0,0,0,0,0,0,0,0,1,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(6,'featured','Featured','boolean',NULL,NULL,NULL,7,0,0,0,0,0,0,0,0,0,1,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(7,'visible_individually','Visible Individually','boolean',NULL,NULL,NULL,9,1,0,0,0,0,0,0,0,0,1,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(8,'status','Status','boolean',NULL,NULL,NULL,10,1,0,0,0,0,0,0,0,1,1,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(9,'short_description','Short Description','textarea',NULL,NULL,NULL,11,1,0,0,0,0,0,0,1,0,NULL,1,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(10,'description','Description','textarea',NULL,NULL,NULL,12,1,0,0,1,0,0,0,1,0,NULL,1,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(11,'price','Price','price',NULL,'decimal',NULL,13,1,0,1,1,0,0,0,0,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(12,'cost','Cost','price',NULL,'decimal',NULL,14,0,0,0,0,0,1,0,0,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(13,'special_price','Special Price','price',NULL,'decimal',NULL,15,0,0,0,0,0,0,0,0,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(14,'special_price_from','Special Price From','date',NULL,NULL,NULL,16,0,0,0,0,0,0,0,0,1,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(15,'special_price_to','Special Price To','date',NULL,NULL,NULL,17,0,0,0,0,0,0,0,0,1,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(16,'meta_title','Meta Title','textarea',NULL,NULL,NULL,18,0,0,0,0,0,0,0,1,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(17,'meta_keywords','Meta Keywords','textarea',NULL,NULL,NULL,20,0,0,0,0,0,0,0,1,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(18,'meta_description','Meta Description','textarea',NULL,NULL,NULL,21,0,0,0,0,0,1,0,1,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(19,'length','Length','text',NULL,'decimal',NULL,22,0,0,0,0,0,1,0,0,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(20,'width','Width','text',NULL,'decimal',NULL,23,0,0,0,0,0,1,0,0,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(21,'height','Height','text',NULL,'decimal',NULL,24,0,0,0,0,0,1,0,0,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(22,'weight','Weight','text',NULL,'decimal',NULL,25,1,0,0,0,0,0,0,0,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(23,'color','Color','select',NULL,NULL,NULL,26,0,0,1,0,1,1,0,0,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(24,'size','Size','select','text',NULL,NULL,27,0,0,1,0,1,1,1,0,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(25,'brand','Brand','select',NULL,NULL,NULL,28,0,0,1,0,0,1,1,0,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(26,'guest_checkout','Guest Checkout','boolean',NULL,NULL,NULL,8,1,0,0,0,0,0,0,0,0,1,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(27,'product_number','Product Number','text',NULL,NULL,NULL,2,0,1,0,0,0,0,0,0,0,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(28,'manage_stock','Manage Stock','boolean',NULL,NULL,NULL,1,0,0,0,0,0,0,0,0,1,1,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(29,'allow_rma','Allow RMA','boolean',NULL,NULL,NULL,1,0,0,0,0,0,0,0,0,1,0,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(30,'rma_rule_id','RMA Rules','select',NULL,NULL,NULL,5,0,0,0,0,0,0,0,0,1,NULL,0,'2026-09-21 17:33:59','2026-09-21 17:33:59'),(31,'ingredients','Ingredients','textarea',NULL,NULL,NULL,50,0,0,0,0,0,1,1,0,0,NULL,0,'2026-09-21 20:19:00','2026-09-21 20:19:00'),(32,'usage','Recommended Usage','textarea',NULL,NULL,NULL,51,0,0,0,0,0,1,1,0,0,NULL,0,'2026-09-21 20:19:00','2026-09-21 20:19:00'),(33,'storage_instructions','Storage Instructions','text',NULL,NULL,NULL,52,0,0,0,0,0,1,1,0,0,NULL,0,'2026-09-21 20:19:00','2026-09-21 20:19:00'),(34,'shelf_life','Shelf Life','text',NULL,NULL,NULL,53,0,0,0,0,0,1,1,0,0,NULL,0,'2026-09-21 20:19:00','2026-09-21 20:19:00'),(35,'country_of_origin','Country of Origin','text',NULL,NULL,NULL,54,0,0,0,0,0,1,1,0,0,NULL,0,'2026-09-21 20:19:00','2026-09-21 20:19:00');
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_product_appointment_slots`
--

DROP TABLE IF EXISTS `booking_product_appointment_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_product_appointment_slots` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_product_id` int unsigned NOT NULL,
  `duration` int DEFAULT NULL,
  `break_time` int DEFAULT NULL,
  `same_slot_all_days` tinyint(1) DEFAULT NULL,
  `slots` json DEFAULT NULL,
  `allow_slot_overlap` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `booking_product_appointment_slots_booking_product_id_foreign` (`booking_product_id`),
  CONSTRAINT `booking_product_appointment_slots_booking_product_id_foreign` FOREIGN KEY (`booking_product_id`) REFERENCES `booking_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_product_appointment_slots`
--

LOCK TABLES `booking_product_appointment_slots` WRITE;
/*!40000 ALTER TABLE `booking_product_appointment_slots` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_product_appointment_slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_product_default_slots`
--

DROP TABLE IF EXISTS `booking_product_default_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_product_default_slots` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_product_id` int unsigned NOT NULL,
  `booking_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int DEFAULT NULL,
  `break_time` int DEFAULT NULL,
  `slots` json DEFAULT NULL,
  `allow_slot_overlap` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `booking_product_default_slots_booking_product_id_foreign` (`booking_product_id`),
  CONSTRAINT `booking_product_default_slots_booking_product_id_foreign` FOREIGN KEY (`booking_product_id`) REFERENCES `booking_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_product_default_slots`
--

LOCK TABLES `booking_product_default_slots` WRITE;
/*!40000 ALTER TABLE `booking_product_default_slots` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_product_default_slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_product_event_ticket_translations`
--

DROP TABLE IF EXISTS `booking_product_event_ticket_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_product_event_ticket_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_product_event_ticket_id` bigint unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bpet_locale_unique` (`booking_product_event_ticket_id`,`locale`),
  CONSTRAINT `bpet_translations_fk` FOREIGN KEY (`booking_product_event_ticket_id`) REFERENCES `booking_product_event_tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_product_event_ticket_translations`
--

LOCK TABLES `booking_product_event_ticket_translations` WRITE;
/*!40000 ALTER TABLE `booking_product_event_ticket_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_product_event_ticket_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_product_event_tickets`
--

DROP TABLE IF EXISTS `booking_product_event_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_product_event_tickets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_product_id` int unsigned NOT NULL,
  `price` decimal(12,4) DEFAULT '0.0000',
  `qty` int DEFAULT '0',
  `special_price` decimal(12,4) DEFAULT NULL,
  `special_price_from` datetime DEFAULT NULL,
  `special_price_to` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_product_event_tickets_booking_product_id_foreign` (`booking_product_id`),
  CONSTRAINT `booking_product_event_tickets_booking_product_id_foreign` FOREIGN KEY (`booking_product_id`) REFERENCES `booking_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_product_event_tickets`
--

LOCK TABLES `booking_product_event_tickets` WRITE;
/*!40000 ALTER TABLE `booking_product_event_tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_product_event_tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_product_rental_slots`
--

DROP TABLE IF EXISTS `booking_product_rental_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_product_rental_slots` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_product_id` int unsigned NOT NULL,
  `renting_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daily_price` decimal(12,4) DEFAULT '0.0000',
  `hourly_price` decimal(12,4) DEFAULT '0.0000',
  `same_slot_all_days` tinyint(1) DEFAULT NULL,
  `slots` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_product_rental_slots_booking_product_id_foreign` (`booking_product_id`),
  CONSTRAINT `booking_product_rental_slots_booking_product_id_foreign` FOREIGN KEY (`booking_product_id`) REFERENCES `booking_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_product_rental_slots`
--

LOCK TABLES `booking_product_rental_slots` WRITE;
/*!40000 ALTER TABLE `booking_product_rental_slots` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_product_rental_slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_product_table_slots`
--

DROP TABLE IF EXISTS `booking_product_table_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_product_table_slots` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_product_id` int unsigned NOT NULL,
  `price_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_limit` int NOT NULL DEFAULT '0',
  `duration` int NOT NULL,
  `break_time` int NOT NULL,
  `prevent_scheduling_before` int NOT NULL,
  `same_slot_all_days` tinyint(1) DEFAULT NULL,
  `slots` json DEFAULT NULL,
  `allow_slot_overlap` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_product_table_slots_booking_product_id_foreign` (`booking_product_id`),
  CONSTRAINT `booking_product_table_slots_booking_product_id_foreign` FOREIGN KEY (`booking_product_id`) REFERENCES `booking_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_product_table_slots`
--

LOCK TABLES `booking_product_table_slots` WRITE;
/*!40000 ALTER TABLE `booking_product_table_slots` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_product_table_slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_products`
--

DROP TABLE IF EXISTS `booking_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int DEFAULT '0',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_location` tinyint(1) NOT NULL DEFAULT '0',
  `available_every_week` tinyint(1) DEFAULT NULL,
  `available_from` datetime DEFAULT NULL,
  `available_to` datetime DEFAULT NULL,
  `allow_cancellation` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_products_product_id_foreign` (`product_id`),
  CONSTRAINT `booking_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_products`
--

LOCK TABLES `booking_products` WRITE;
/*!40000 ALTER TABLE `booking_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `order_item_id` int unsigned DEFAULT NULL,
  `order_id` int unsigned DEFAULT NULL,
  `qty` int DEFAULT '0',
  `from` int DEFAULT NULL,
  `to` int DEFAULT NULL,
  `allow_cancellation` tinyint(1) NOT NULL DEFAULT '1',
  `booking_product_event_ticket_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_order_item_id_foreign` (`order_item_id`),
  KEY `bookings_booking_product_event_ticket_id_foreign` (`booking_product_event_ticket_id`),
  KEY `bookings_order_id_foreign` (`order_id`),
  KEY `bookings_product_id_foreign` (`product_id`),
  CONSTRAINT `bookings_booking_product_event_ticket_id_foreign` FOREIGN KEY (`booking_product_event_ticket_id`) REFERENCES `booking_product_event_tickets` (`id`) ON DELETE SET NULL,
  CONSTRAINT `bookings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `bookings_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE SET NULL,
  CONSTRAINT `bookings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_gift` tinyint(1) NOT NULL DEFAULT '0',
  `items_count` int DEFAULT NULL,
  `items_qty` decimal(12,4) DEFAULT NULL,
  `exchange_rate` decimal(12,4) DEFAULT NULL,
  `global_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total` decimal(12,4) DEFAULT '0.0000',
  `sub_total` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total` decimal(12,4) DEFAULT '0.0000',
  `tax_total` decimal(12,4) DEFAULT '0.0000',
  `base_tax_total` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `shipping_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_shipping_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `checkout_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_guest` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `applied_cart_rule_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int unsigned DEFAULT NULL,
  `channel_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_customer_id_foreign` (`customer_id`),
  KEY `cart_channel_id_foreign` (`channel_id`),
  CONSTRAINT `cart_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1,'aarav.sharma@example.com','Aarav','Sharma','navanidhi_2','NAVANIDHI10',0,2,2.0000,NULL,'INR','INR','INR','INR',898.2000,898.2000,998.0000,998.0000,0.0000,0.0000,99.8000,99.8000,0.0000,0.0000,0.0000,0.0000,998.0000,998.0000,NULL,1,0,'2',NULL,1,'2026-09-21 20:38:21','2026-09-21 21:07:32'),(2,'aarav.reddy@example.com','Aarav','Reddy','navanidhi_2',NULL,0,1,1.0000,NULL,'INR','INR','INR','INR',499.0000,499.0000,499.0000,499.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,NULL,0,0,'',1,1,'2026-09-21 21:09:19','2026-09-21 21:55:09'),(3,'aarav.reddy@example.com','Aarav','Reddy',NULL,NULL,0,1,1.0000,NULL,'INR','INR','INR','INR',499.0000,499.0000,499.0000,499.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,NULL,0,1,'',1,1,'2026-09-21 22:02:24','2026-09-21 22:44:51'),(4,NULL,NULL,NULL,'navanidhi_2','NAVANIDHI10',0,1,1.0000,NULL,'INR','INR','INR','INR',449.1000,449.1000,499.0000,499.0000,0.0000,0.0000,49.9000,49.9000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,NULL,1,1,'2',NULL,1,'2026-09-22 09:26:20','2026-09-22 09:46:05'),(551,NULL,NULL,NULL,NULL,NULL,0,1,2.0000,NULL,'INR','INR','INR','INR',998.0000,998.0000,998.0000,998.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,998.0000,998.0000,NULL,1,1,'',NULL,1,'2026-09-22 15:12:48','2026-09-22 21:28:44'),(788,'rahul@example.com','Rahul','Sharma','navanidhi_2',NULL,0,1,1.0000,NULL,'INR','INR','INR','INR',499.0000,499.0000,499.0000,499.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,NULL,1,1,'',NULL,1,'2026-09-25 02:29:51','2026-09-25 03:25:24'),(790,NULL,NULL,NULL,NULL,NULL,0,1,1.0000,NULL,'INR','INR','INR','INR',849.0000,849.0000,849.0000,849.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,849.0000,849.0000,NULL,1,1,'',NULL,1,'2026-09-26 22:56:31','2026-09-26 23:43:27'),(882,NULL,NULL,NULL,NULL,NULL,0,1,1.0000,NULL,'INR','INR','INR','INR',699.0000,699.0000,699.0000,699.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,699.0000,699.0000,NULL,1,1,'',NULL,1,'2026-09-27 07:59:07','2026-09-27 14:27:16');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_item_inventories`
--

DROP TABLE IF EXISTS `cart_item_inventories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_item_inventories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `qty` int unsigned NOT NULL DEFAULT '0',
  `inventory_source_id` int unsigned DEFAULT NULL,
  `cart_item_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_item_inventories`
--

LOCK TABLES `cart_item_inventories` WRITE;
/*!40000 ALTER TABLE `cart_item_inventories` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_item_inventories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int unsigned NOT NULL DEFAULT '0',
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total_weight` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total_weight` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `price` decimal(12,4) NOT NULL DEFAULT '1.0000',
  `base_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `custom_price` decimal(12,4) DEFAULT NULL,
  `total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `tax_percent` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_percent` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `price_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `applied_tax_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int unsigned DEFAULT NULL,
  `product_id` int unsigned NOT NULL,
  `cart_id` int unsigned NOT NULL,
  `tax_category_id` int unsigned DEFAULT NULL,
  `applied_cart_rule_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_items_parent_id_foreign` (`parent_id`),
  KEY `cart_items_product_id_foreign` (`product_id`),
  KEY `cart_items_cart_id_foreign` (`cart_id`),
  KEY `cart_items_tax_category_id_foreign` (`tax_category_id`),
  CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `cart_items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_items_tax_category_id_foreign` FOREIGN KEY (`tax_category_id`) REFERENCES `tax_categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2050 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
INSERT INTO `cart_items` VALUES (1,1,'navanidhi-moringa-pack','configurable','Organic Moringa Leaf Powder — Pure Botanical Pack Sizes','NAVANIDHI10',0.2500,0.2500,0.2500,499.0000,499.0000,NULL,499.0000,499.0000,0.0000,0.0000,0.0000,10.0000,49.9000,49.9000,499.0000,499.0000,499.0000,499.0000,NULL,NULL,59,1,NULL,'2','{\"_token\": \"Gh3qPyjp6sUnWEiP1J44RVWs9NRrpnWOUiePEOKJ\", \"cart_id\": 1, \"quantity\": 1, \"attributes\": {\"size\": {\"option_id\": 11, \"option_label\": \"250g Pack\", \"attribute_name\": \"Size\"}}, \"is_buy_now\": \"0\", \"product_id\": \"59\", \"super_attribute\": {\"24\": \"11\"}, \"selected_configurable_option\": \"61\"}','2026-09-21 20:38:21','2026-09-21 21:07:31'),(2,0,'navanidhi-moringa-pack-250g','simple','Organic Moringa Leaf Powder (250g Pack)',NULL,0.0000,0.0000,0.0000,1.0000,0.0000,NULL,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,NULL,1,61,1,NULL,NULL,'{\"parent_id\": 59, \"product_id\": 61}','2026-09-21 20:38:21','2026-09-21 20:38:21'),(3,1,'navanidhi-moringa-powder','simple','Organic Moringa Leaf Powder','NAVANIDHI10',0.2500,0.2500,0.2500,499.0000,499.0000,NULL,499.0000,499.0000,0.0000,0.0000,0.0000,10.0000,49.9000,49.9000,499.0000,499.0000,499.0000,499.0000,NULL,NULL,41,1,NULL,'2','{\"_token\": \"Gh3qPyjp6sUnWEiP1J44RVWs9NRrpnWOUiePEOKJ\", \"cart_id\": 1, \"quantity\": 1, \"is_buy_now\": \"0\", \"product_id\": \"41\"}','2026-09-21 20:42:01','2026-09-21 21:07:31'),(4,1,'navanidhi-moringa-powder','simple','Organic Moringa Leaf Powder',NULL,0.2500,0.2500,0.2500,499.0000,499.0000,NULL,499.0000,499.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,499.0000,499.0000,NULL,NULL,41,2,NULL,'','{\"_token\": \"Gh3qPyjp6sUnWEiP1J44RVWs9NRrpnWOUiePEOKJ\", \"cart_id\": 2, \"quantity\": 1, \"is_buy_now\": \"0\", \"product_id\": \"41\"}','2026-09-21 21:09:19','2026-09-21 21:55:08'),(5,1,'navanidhi-moringa-powder','simple','Organic Moringa Leaf Powder',NULL,0.2500,0.2500,0.2500,499.0000,499.0000,NULL,499.0000,499.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,499.0000,499.0000,NULL,NULL,41,3,NULL,'','{\"_token\": \"Gh3qPyjp6sUnWEiP1J44RVWs9NRrpnWOUiePEOKJ\", \"locale\": \"en\", \"cart_id\": 2, \"quantity\": 1, \"is_buy_now\": \"0\", \"product_id\": \"41\"}','2026-09-21 22:02:24','2026-09-21 22:44:51'),(6,1,'navanidhi-moringa-powder','simple','Organic Moringa Leaf Powder','NAVANIDHI10',0.2500,0.2500,0.2500,499.0000,499.0000,NULL,499.0000,499.0000,0.0000,0.0000,0.0000,10.0000,49.9000,49.9000,499.0000,499.0000,499.0000,499.0000,NULL,NULL,41,4,NULL,'2','{\"cart_id\": 4, \"quantity\": 1, \"is_buy_now\": 0, \"product_id\": 41}','2026-09-22 09:26:21','2026-09-22 09:46:05'),(997,2,'navanidhi-moringa-powder','simple','Organic Moringa Leaf Powder',NULL,0.2500,0.5000,0.5000,499.0000,499.0000,NULL,998.0000,998.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,998.0000,998.0000,NULL,NULL,41,551,NULL,'','{\"_token\": \"YQ7iGxLdT9IItWYwL8YCDViS0EE6Jj637XMMj73g\", \"cart_id\": 551, \"quantity\": 2, \"is_buy_now\": \"0\", \"product_id\": \"41\"}','2026-09-22 15:12:48','2026-09-22 21:28:44'),(1458,1,'navanidhi-moringa-powder','simple','Organic Moringa Leaf Powder',NULL,0.2500,0.2500,0.2500,499.0000,499.0000,NULL,499.0000,499.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,499.0000,499.0000,NULL,NULL,41,788,NULL,'','{\"_token\": \"SivPc1Xz8GR68KBp576zX5t37JpZXyKrpaE4pAZ4\", \"cart_id\": 788, \"quantity\": 1, \"is_buy_now\": \"0\", \"product_id\": \"41\"}','2026-09-25 02:29:51','2026-09-25 03:25:23'),(1460,1,'navanidhi-beauty-bloom','simple','Beauty Bloom Collagen Booster',NULL,0.2500,0.2500,0.2500,849.0000,849.0000,NULL,849.0000,849.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,849.0000,849.0000,849.0000,849.0000,NULL,NULL,3545,790,NULL,'','{\"_token\": \"eqTEyUDJrtukxZdlKW1B4belCS65SKzqfRjjEBIe\", \"cart_id\": 790, \"quantity\": 1, \"is_buy_now\": \"0\", \"product_id\": \"3545\"}','2026-09-26 22:56:31','2026-09-26 23:43:27'),(1588,1,'navanidhi-ashwagandha-powder','simple','KSM-66 Ashwagandha Root Powder',NULL,0.2000,0.2000,0.2000,699.0000,699.0000,NULL,699.0000,699.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,699.0000,699.0000,699.0000,699.0000,NULL,NULL,3547,882,NULL,'','{\"cart_id\": 882, \"quantity\": 1, \"product_id\": 3547}','2026-09-27 07:59:07','2026-09-27 14:27:16');
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_payment`
--

DROP TABLE IF EXISTS `cart_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_payment` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_payment_cart_id_foreign` (`cart_id`),
  CONSTRAINT `cart_payment_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_payment`
--

LOCK TABLES `cart_payment` WRITE;
/*!40000 ALTER TABLE `cart_payment` DISABLE KEYS */;
INSERT INTO `cart_payment` VALUES (1,'moneytransfer','Money Transfer',1,'2026-09-21 21:07:05','2026-09-21 21:07:05'),(2,'moneytransfer','Money Transfer',2,'2026-09-21 21:55:00','2026-09-21 21:55:00');
/*!40000 ALTER TABLE `cart_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_rule_channels`
--

DROP TABLE IF EXISTS `cart_rule_channels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_rule_channels` (
  `cart_rule_id` int unsigned NOT NULL,
  `channel_id` int unsigned NOT NULL,
  PRIMARY KEY (`cart_rule_id`,`channel_id`),
  KEY `cart_rule_channels_channel_id_foreign` (`channel_id`),
  CONSTRAINT `cart_rule_channels_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_rule_channels_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_rule_channels`
--

LOCK TABLES `cart_rule_channels` WRITE;
/*!40000 ALTER TABLE `cart_rule_channels` DISABLE KEYS */;
INSERT INTO `cart_rule_channels` VALUES (2,1);
/*!40000 ALTER TABLE `cart_rule_channels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_rule_coupon_usage`
--

DROP TABLE IF EXISTS `cart_rule_coupon_usage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_rule_coupon_usage` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `times_used` int NOT NULL DEFAULT '0',
  `cart_rule_coupon_id` int unsigned NOT NULL,
  `customer_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_rule_coupon_usage_cart_rule_coupon_id_foreign` (`cart_rule_coupon_id`),
  KEY `cart_rule_coupon_usage_customer_id_foreign` (`customer_id`),
  CONSTRAINT `cart_rule_coupon_usage_cart_rule_coupon_id_foreign` FOREIGN KEY (`cart_rule_coupon_id`) REFERENCES `cart_rule_coupons` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_rule_coupon_usage_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_rule_coupon_usage`
--

LOCK TABLES `cart_rule_coupon_usage` WRITE;
/*!40000 ALTER TABLE `cart_rule_coupon_usage` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_rule_coupon_usage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_rule_coupons`
--

DROP TABLE IF EXISTS `cart_rule_coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_rule_coupons` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usage_limit` int unsigned NOT NULL DEFAULT '0',
  `usage_per_customer` int unsigned NOT NULL DEFAULT '0',
  `times_used` int unsigned NOT NULL DEFAULT '0',
  `type` int unsigned NOT NULL DEFAULT '0',
  `is_primary` tinyint(1) NOT NULL DEFAULT '0',
  `expired_at` date DEFAULT NULL,
  `cart_rule_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_rule_coupons_cart_rule_id_foreign` (`cart_rule_id`),
  CONSTRAINT `cart_rule_coupons_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=266 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_rule_coupons`
--

LOCK TABLES `cart_rule_coupons` WRITE;
/*!40000 ALTER TABLE `cart_rule_coupons` DISABLE KEYS */;
INSERT INTO `cart_rule_coupons` VALUES (2,'NAVANIDHI10',500,1,1,0,1,NULL,2,'2026-09-21 17:34:04','2026-09-21 21:07:32');
/*!40000 ALTER TABLE `cart_rule_coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_rule_customer_groups`
--

DROP TABLE IF EXISTS `cart_rule_customer_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_rule_customer_groups` (
  `cart_rule_id` int unsigned NOT NULL,
  `customer_group_id` int unsigned NOT NULL,
  PRIMARY KEY (`cart_rule_id`,`customer_group_id`),
  KEY `cart_rule_customer_groups_customer_group_id_foreign` (`customer_group_id`),
  CONSTRAINT `cart_rule_customer_groups_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_rule_customer_groups_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_rule_customer_groups`
--

LOCK TABLES `cart_rule_customer_groups` WRITE;
/*!40000 ALTER TABLE `cart_rule_customer_groups` DISABLE KEYS */;
INSERT INTO `cart_rule_customer_groups` VALUES (2,1),(2,2),(2,3);
/*!40000 ALTER TABLE `cart_rule_customer_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_rule_customers`
--

DROP TABLE IF EXISTS `cart_rule_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_rule_customers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `times_used` bigint unsigned NOT NULL DEFAULT '0',
  `customer_id` int unsigned NOT NULL,
  `cart_rule_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_rule_customers_cart_rule_id_foreign` (`cart_rule_id`),
  KEY `cart_rule_customers_customer_id_foreign` (`customer_id`),
  CONSTRAINT `cart_rule_customers_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_rule_customers_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_rule_customers`
--

LOCK TABLES `cart_rule_customers` WRITE;
/*!40000 ALTER TABLE `cart_rule_customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_rule_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_rule_translations`
--

DROP TABLE IF EXISTS `cart_rule_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_rule_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` text COLLATE utf8mb4_unicode_ci,
  `cart_rule_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cart_rule_translations_cart_rule_id_locale_unique` (`cart_rule_id`,`locale`),
  CONSTRAINT `cart_rule_translations_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_rule_translations`
--

LOCK TABLES `cart_rule_translations` WRITE;
/*!40000 ALTER TABLE `cart_rule_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_rule_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_rules`
--

DROP TABLE IF EXISTS `cart_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_rules` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starts_from` datetime DEFAULT NULL,
  `ends_till` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `first_order_only` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Restrict coupon to first-time buyers only',
  `coupon_type` int NOT NULL DEFAULT '1',
  `use_auto_generation` tinyint(1) NOT NULL DEFAULT '0',
  `usage_per_customer` int NOT NULL DEFAULT '0',
  `uses_per_coupon` int NOT NULL DEFAULT '0',
  `times_used` int unsigned NOT NULL DEFAULT '0',
  `condition_type` tinyint(1) NOT NULL DEFAULT '1',
  `conditions` json DEFAULT NULL,
  `end_other_rules` tinyint(1) NOT NULL DEFAULT '0',
  `uses_attribute_conditions` tinyint(1) NOT NULL DEFAULT '0',
  `action_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `discount_quantity` int NOT NULL DEFAULT '1',
  `discount_step` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `apply_to_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `free_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=470 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_rules`
--

LOCK TABLES `cart_rules` WRITE;
/*!40000 ALTER TABLE `cart_rules` DISABLE KEYS */;
INSERT INTO `cart_rules` VALUES (2,'NAVANIDHI10','10% discount on all Navanidhi Naturals botanical powders and blends',NULL,NULL,1,0,1,0,1,500,1,1,NULL,0,0,'by_percent',10.0000,0,'0',0,0,0,'2026-09-21 17:34:04','2026-09-21 21:07:32');
/*!40000 ALTER TABLE `cart_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_shipping_rates`
--

DROP TABLE IF EXISTS `cart_shipping_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_shipping_rates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `carrier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrier_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT '0',
  `base_price` double DEFAULT '0',
  `discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `tax_percent` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `tax_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `price_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `applied_tax_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_calculate_tax` tinyint(1) NOT NULL DEFAULT '1',
  `cart_address_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cart_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_shipping_rates_cart_id_foreign` (`cart_id`),
  CONSTRAINT `cart_shipping_rates_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_shipping_rates`
--

LOCK TABLES `cart_shipping_rates` WRITE;
/*!40000 ALTER TABLE `cart_shipping_rates` DISABLE KEYS */;
INSERT INTO `cart_shipping_rates` VALUES (3,'navanidhi','Navanidhi Naturals Shipping','navanidhi_2','Free Shipping (Over 499)','',0,0,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,NULL,1,2,'2026-09-21 21:06:12','2026-09-21 21:07:31',1),(5,'navanidhi','Navanidhi Naturals Shipping','navanidhi_2','Free Shipping (Over 499)','',0,0,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,NULL,1,7,'2026-09-21 21:54:52','2026-09-21 21:55:08',2),(7,'navanidhi','Navanidhi Naturals Shipping','navanidhi_2','Free Shipping (Over 499)','',0,0,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,NULL,1,10,'2026-09-22 09:39:13','2026-09-22 09:46:05',4),(120,'navanidhi','Navanidhi Naturals Shipping','navanidhi_2','Free Shipping (Over 499)','',0,0,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,NULL,1,773,'2026-09-25 02:31:40','2026-09-25 03:25:24',788);
/*!40000 ALTER TABLE `cart_shipping_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_rule_channels`
--

DROP TABLE IF EXISTS `catalog_rule_channels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalog_rule_channels` (
  `catalog_rule_id` int unsigned NOT NULL,
  `channel_id` int unsigned NOT NULL,
  PRIMARY KEY (`catalog_rule_id`,`channel_id`),
  KEY `catalog_rule_channels_channel_id_foreign` (`channel_id`),
  CONSTRAINT `catalog_rule_channels_catalog_rule_id_foreign` FOREIGN KEY (`catalog_rule_id`) REFERENCES `catalog_rules` (`id`) ON DELETE CASCADE,
  CONSTRAINT `catalog_rule_channels_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_rule_channels`
--

LOCK TABLES `catalog_rule_channels` WRITE;
/*!40000 ALTER TABLE `catalog_rule_channels` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalog_rule_channels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_rule_customer_groups`
--

DROP TABLE IF EXISTS `catalog_rule_customer_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalog_rule_customer_groups` (
  `catalog_rule_id` int unsigned NOT NULL,
  `customer_group_id` int unsigned NOT NULL,
  PRIMARY KEY (`catalog_rule_id`,`customer_group_id`),
  KEY `catalog_rule_customer_groups_customer_group_id_foreign` (`customer_group_id`),
  CONSTRAINT `catalog_rule_customer_groups_catalog_rule_id_foreign` FOREIGN KEY (`catalog_rule_id`) REFERENCES `catalog_rules` (`id`) ON DELETE CASCADE,
  CONSTRAINT `catalog_rule_customer_groups_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_rule_customer_groups`
--

LOCK TABLES `catalog_rule_customer_groups` WRITE;
/*!40000 ALTER TABLE `catalog_rule_customer_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalog_rule_customer_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_rule_product_prices`
--

DROP TABLE IF EXISTS `catalog_rule_product_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalog_rule_product_prices` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `rule_date` date NOT NULL,
  `starts_from` datetime DEFAULT NULL,
  `ends_till` datetime DEFAULT NULL,
  `product_id` int unsigned NOT NULL,
  `customer_group_id` int unsigned NOT NULL,
  `catalog_rule_id` int unsigned NOT NULL,
  `channel_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catalog_rule_product_prices_product_id_foreign` (`product_id`),
  KEY `catalog_rule_product_prices_customer_group_id_foreign` (`customer_group_id`),
  KEY `catalog_rule_product_prices_catalog_rule_id_foreign` (`catalog_rule_id`),
  KEY `catalog_rule_product_prices_channel_id_foreign` (`channel_id`),
  CONSTRAINT `catalog_rule_product_prices_catalog_rule_id_foreign` FOREIGN KEY (`catalog_rule_id`) REFERENCES `catalog_rules` (`id`) ON DELETE CASCADE,
  CONSTRAINT `catalog_rule_product_prices_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `catalog_rule_product_prices_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `catalog_rule_product_prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3947 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_rule_product_prices`
--

LOCK TABLES `catalog_rule_product_prices` WRITE;
/*!40000 ALTER TABLE `catalog_rule_product_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalog_rule_product_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_rule_products`
--

DROP TABLE IF EXISTS `catalog_rule_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalog_rule_products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `starts_from` datetime DEFAULT NULL,
  `ends_till` datetime DEFAULT NULL,
  `end_other_rules` tinyint(1) NOT NULL DEFAULT '0',
  `action_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `sort_order` int unsigned NOT NULL DEFAULT '0',
  `product_id` int unsigned NOT NULL,
  `customer_group_id` int unsigned NOT NULL,
  `catalog_rule_id` int unsigned NOT NULL,
  `channel_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catalog_rule_products_product_id_foreign` (`product_id`),
  KEY `catalog_rule_products_customer_group_id_foreign` (`customer_group_id`),
  KEY `catalog_rule_products_catalog_rule_id_foreign` (`catalog_rule_id`),
  KEY `catalog_rule_products_channel_id_foreign` (`channel_id`),
  CONSTRAINT `catalog_rule_products_catalog_rule_id_foreign` FOREIGN KEY (`catalog_rule_id`) REFERENCES `catalog_rules` (`id`) ON DELETE CASCADE,
  CONSTRAINT `catalog_rule_products_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `catalog_rule_products_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `catalog_rule_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1337 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_rule_products`
--

LOCK TABLES `catalog_rule_products` WRITE;
/*!40000 ALTER TABLE `catalog_rule_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalog_rule_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_rules`
--

DROP TABLE IF EXISTS `catalog_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalog_rules` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starts_from` date DEFAULT NULL,
  `ends_till` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `condition_type` tinyint(1) NOT NULL DEFAULT '1',
  `conditions` json DEFAULT NULL,
  `end_other_rules` tinyint(1) NOT NULL DEFAULT '0',
  `action_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `sort_order` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=434 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_rules`
--

LOCK TABLES `catalog_rules` WRITE;
/*!40000 ALTER TABLE `catalog_rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalog_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `position` int NOT NULL DEFAULT '0',
  `logo_path` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `display_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'products_and_description',
  `_lft` int unsigned NOT NULL DEFAULT '0',
  `_rgt` int unsigned NOT NULL DEFAULT '0',
  `parent_id` int unsigned DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `banner_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,1,NULL,1,'products_and_description',1,14,NULL,NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(71,1,NULL,1,'products_and_description',2,3,1,NULL,NULL,'2026-09-26 06:50:56','2026-09-26 06:50:56'),(72,2,NULL,1,'products_and_description',4,5,1,NULL,NULL,'2026-09-26 06:50:56','2026-09-26 06:50:56'),(73,3,NULL,1,'products_and_description',6,7,1,NULL,NULL,'2026-09-26 06:50:56','2026-09-26 06:50:56'),(74,4,NULL,1,'products_and_description',8,9,1,NULL,NULL,'2026-09-26 06:50:56','2026-09-26 06:50:56'),(75,5,NULL,1,'products_and_description',10,11,1,NULL,NULL,'2026-09-26 06:50:56','2026-09-26 06:50:56'),(76,6,NULL,1,'products_and_description',12,13,1,NULL,NULL,'2026-09-26 06:50:56','2026-09-26 06:50:56');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_filterable_attributes`
--

DROP TABLE IF EXISTS `category_filterable_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_filterable_attributes` (
  `category_id` int unsigned NOT NULL,
  `attribute_id` int unsigned NOT NULL,
  KEY `category_filterable_attributes_category_id_foreign` (`category_id`),
  KEY `category_filterable_attributes_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `category_filterable_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_filterable_attributes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_filterable_attributes`
--

LOCK TABLES `category_filterable_attributes` WRITE;
/*!40000 ALTER TABLE `category_filterable_attributes` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_filterable_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_translations`
--

DROP TABLE IF EXISTS `category_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_path` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `locale_id` int unsigned DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_translations_category_id_slug_locale_unique` (`category_id`,`slug`,`locale`),
  KEY `category_translations_locale_id_foreign` (`locale_id`),
  CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_translations_locale_id_foreign` FOREIGN KEY (`locale_id`) REFERENCES `locales` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_translations`
--

LOCK TABLES `category_translations` WRITE;
/*!40000 ALTER TABLE `category_translations` DISABLE KEYS */;
INSERT INTO `category_translations` VALUES (23,1,'Navanidhi Naturals','navanidhi-naturals','','Root Category Description','','','',NULL,'en'),(73,71,'Spices','spices','','<p>100% pure, farm-sourced authentic Indian spices. Stone-ground and sun-dried with zero artificial colours, fillers, or additives. Rich in natural essential oils and uncompromised aroma.</p>','Spices | Navanidhi Naturals','100% pure, farm-sourced authentic Indian spices. Stone-ground and sun-dried with zero artificial colours, fillers, or additives. Rich in natural essential oils and uncompromised aroma.',NULL,NULL,'en'),(74,72,'Botanical Powders','botanical-powders','','<p>Pure, single-origin dehydrated plant powders for daily nutrition and culinary creativity.</p>','Botanical Powders | Navanidhi Naturals','Pure, single-origin dehydrated plant powders for daily nutrition and culinary creativity.',NULL,NULL,'en'),(75,73,'Functional Blends','functional-blends','','<p>Expertly formulated multi-ingredient blends designed for specific wellness goals.</p>','Functional Blends | Navanidhi Naturals','Expertly formulated multi-ingredient blends designed for specific wellness goals.',NULL,NULL,'en'),(76,74,'Culinary Ingredients','culinary-ingredients','','<p>Premium plant-based ingredients for cooking, baking, and recipe enhancement.</p>','Culinary Ingredients | Navanidhi Naturals','Premium plant-based ingredients for cooking, baking, and recipe enhancement.',NULL,NULL,'en'),(77,75,'Wellness Essentials','wellness-essentials','','<p>Daily wellness supplements and nutrient-dense superfood formulations.</p>','Wellness Essentials | Navanidhi Naturals','Daily wellness supplements and nutrient-dense superfood formulations.',NULL,NULL,'en'),(78,76,'All Products','products','','<p>Browse our complete range of cold-dehydrated single-origin botanical powders, functional blends, and pure farm spices.</p>','All Products | Navanidhi Naturals','Browse our complete range of cold-dehydrated single-origin botanical powders, functional blends, and pure farm spices.',NULL,NULL,'en');
/*!40000 ALTER TABLE `category_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `channel_currencies`
--

DROP TABLE IF EXISTS `channel_currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `channel_currencies` (
  `channel_id` int unsigned NOT NULL,
  `currency_id` int unsigned NOT NULL,
  PRIMARY KEY (`channel_id`,`currency_id`),
  KEY `channel_currencies_currency_id_foreign` (`currency_id`),
  KEY `channel_currencies_cid_cyid_idx` (`channel_id`,`currency_id`),
  CONSTRAINT `channel_currencies_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `channel_currencies_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `channel_currencies`
--

LOCK TABLES `channel_currencies` WRITE;
/*!40000 ALTER TABLE `channel_currencies` DISABLE KEYS */;
INSERT INTO `channel_currencies` VALUES (1,1);
/*!40000 ALTER TABLE `channel_currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `channel_inventory_sources`
--

DROP TABLE IF EXISTS `channel_inventory_sources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `channel_inventory_sources` (
  `channel_id` int unsigned NOT NULL,
  `inventory_source_id` int unsigned NOT NULL,
  UNIQUE KEY `channel_inventory_source_unique` (`channel_id`,`inventory_source_id`),
  KEY `channel_inventory_sources_inventory_source_id_foreign` (`inventory_source_id`),
  CONSTRAINT `channel_inventory_sources_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `channel_inventory_sources_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `channel_inventory_sources`
--

LOCK TABLES `channel_inventory_sources` WRITE;
/*!40000 ALTER TABLE `channel_inventory_sources` DISABLE KEYS */;
INSERT INTO `channel_inventory_sources` VALUES (1,1);
/*!40000 ALTER TABLE `channel_inventory_sources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `channel_locales`
--

DROP TABLE IF EXISTS `channel_locales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `channel_locales` (
  `channel_id` int unsigned NOT NULL,
  `locale_id` int unsigned NOT NULL,
  PRIMARY KEY (`channel_id`,`locale_id`),
  KEY `channel_locales_locale_id_foreign` (`locale_id`),
  KEY `channel_locales_cid_lid_idx` (`channel_id`,`locale_id`),
  CONSTRAINT `channel_locales_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `channel_locales_locale_id_foreign` FOREIGN KEY (`locale_id`) REFERENCES `locales` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `channel_locales`
--

LOCK TABLES `channel_locales` WRITE;
/*!40000 ALTER TABLE `channel_locales` DISABLE KEYS */;
INSERT INTO `channel_locales` VALUES (1,1);
/*!40000 ALTER TABLE `channel_locales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `channel_translations`
--

DROP TABLE IF EXISTS `channel_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `channel_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `channel_id` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `maintenance_mode_text` text COLLATE utf8mb4_unicode_ci,
  `home_seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `channel_translations_channel_id_locale_unique` (`channel_id`,`locale`),
  KEY `channel_translations_locale_index` (`locale`),
  CONSTRAINT `channel_translations_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `channel_translations`
--

LOCK TABLES `channel_translations` WRITE;
/*!40000 ALTER TABLE `channel_translations` DISABLE KEYS */;
INSERT INTO `channel_translations` VALUES (3,1,'en','Navanidhi Naturals',NULL,NULL,'{\"meta_title\": \"Navanidhi Naturals — Authentic Farm Spices & Pure Botanical Nutrition | MAN Agro Foods\", \"meta_keywords\": \"pure spices, red chilli powder, lakadong turmeric powder, farm spices, stone milled spices, zero sudan dyes, zero lead chromate, organic moringa, botanical powders, Navanidhi Naturals, MAN Agro Foods\", \"meta_description\": \"Discover Navanidhi Naturals by MAN Agro Foods: Stone-milled pure Red Chilli Powder, high-curcumin Lakadong Turmeric, and cold-dehydrated botanicals with zero Sudan dyes, zero lead chromate, and zero fillers.\"}',NULL,NULL);
/*!40000 ALTER TABLE `channel_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `channels`
--

DROP TABLE IF EXISTS `channels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `channels` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_seo` json DEFAULT NULL,
  `is_maintenance_on` tinyint(1) NOT NULL DEFAULT '0',
  `allowed_ips` text COLLATE utf8mb4_unicode_ci,
  `root_category_id` int unsigned DEFAULT NULL,
  `default_locale_id` int unsigned NOT NULL,
  `base_currency_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `channels_root_category_id_foreign` (`root_category_id`),
  KEY `channels_default_locale_id_foreign` (`default_locale_id`),
  KEY `channels_base_currency_id_foreign` (`base_currency_id`),
  KEY `channels_hostname_idx` (`hostname`),
  CONSTRAINT `channels_base_currency_id_foreign` FOREIGN KEY (`base_currency_id`) REFERENCES `currencies` (`id`),
  CONSTRAINT `channels_default_locale_id_foreign` FOREIGN KEY (`default_locale_id`) REFERENCES `locales` (`id`),
  CONSTRAINT `channels_root_category_id_foreign` FOREIGN KEY (`root_category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `channels`
--

LOCK TABLES `channels` WRITE;
/*!40000 ALTER TABLE `channels` DISABLE KEYS */;
INSERT INTO `channels` VALUES (1,'default',NULL,'navanidhi','managro.test','channel/1/logo.svg','channel/1/favicon.svg',NULL,0,NULL,1,1,1,'2026-09-21 17:34:00','2026-09-21 17:34:00');
/*!40000 ALTER TABLE `channels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_page_channels`
--

DROP TABLE IF EXISTS `cms_page_channels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cms_page_channels` (
  `cms_page_id` int unsigned NOT NULL,
  `channel_id` int unsigned NOT NULL,
  UNIQUE KEY `cms_page_channels_cms_page_id_channel_id_unique` (`cms_page_id`,`channel_id`),
  KEY `cms_page_channels_channel_id_foreign` (`channel_id`),
  CONSTRAINT `cms_page_channels_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cms_page_channels_cms_page_id_foreign` FOREIGN KEY (`cms_page_id`) REFERENCES `cms_pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_page_channels`
--

LOCK TABLES `cms_page_channels` WRITE;
/*!40000 ALTER TABLE `cms_page_channels` DISABLE KEYS */;
INSERT INTO `cms_page_channels` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(14,1);
/*!40000 ALTER TABLE `cms_page_channels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_page_translations`
--

DROP TABLE IF EXISTS `cms_page_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cms_page_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html_content` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cms_page_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cms_page_translations_cms_page_id_url_key_locale_unique` (`cms_page_id`,`url_key`,`locale`),
  CONSTRAINT `cms_page_translations_cms_page_id_foreign` FOREIGN KEY (`cms_page_id`) REFERENCES `cms_pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_page_translations`
--

LOCK TABLES `cms_page_translations` WRITE;
/*!40000 ALTER TABLE `cms_page_translations` DISABLE KEYS */;
INSERT INTO `cms_page_translations` VALUES (25,'Our Philosophy & Origins','about-us','<div class=\"bg-[#FAF8F5] min-h-screen\">\n    @if (core()->getConfigData(\'general.general.breadcrumbs.shop\'))\n        <!-- Breadcrumbs -->\n        <div class=\"site-container pt-4 pb-2 sm:pt-6 sm:pb-3\">\n            <nav aria-label=\"Breadcrumb\" class=\"flex items-center space-x-2 text-[11px] sm:text-xs uppercase tracking-[0.14em] text-[#677a6d]\">\n                <a href=\"{{ route(\'shop.home.index\') }}\" class=\"hover:text-[#205132] transition-colors\">Home</a>\n                <span class=\"text-[#e5decb]\">/</span>\n                <span class=\"text-[#163923] font-semibold\">About Us</span>\n            </nav>\n        </div>\n    @endif\n\n    <!-- SECTION 1: EDITORIAL HERO & MISSION MANIFESTO -->\n    <section class=\"site-container pt-8 pb-16 sm:pt-14 sm:pb-20 border-b border-[#e5decb]/70\">\n        <div class=\"max-w-4xl mx-auto text-center space-y-6\">\n            <!-- Brand Tagline Badge -->\n            <div class=\"inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#205132]/10 text-[#205132] text-xs font-semibold tracking-widest uppercase border border-[#205132]/20 shadow-2xs\">\n                <svg class=\"w-4 h-4 text-[#205132]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.2\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n                    <path d=\"M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z\"/>\n                    <path d=\"M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12\"/>\n                </svg>\n                <span>Navanidhi Naturals &bull; A Brand of MAN Agro Foods</span>\n            </div>\n\n            <!-- Main Heading -->\n            <h1 class=\"font-serif text-3xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-[#163923] leading-[1.14]\">\n                The Sacred Nine Treasures of Mother Earth. <br class=\"hidden sm:inline\">\n                <span class=\"italic text-[#205132] font-normal\">Authentic Indian Farm Spices &amp; Living Botanicals.</span>\n            </h1>\n\n            <!-- Mission Paragraph -->\n            <p class=\"text-base sm:text-lg lg:text-xl leading-relaxed text-[#677a6d] max-w-3xl mx-auto\">\n                In Indian Vedic tradition, <em>Navanidhi</em> (नवनिधि) represents the Nine Divine Treasures of health, vitality, and natural abundance. Crafted and brought to life by <strong>MAN AGRO FOODS</strong>, Navanidhi Naturals was born to restore unadulterated purity to Indian kitchens and daily wellness rituals. From sun-ripened Guntur and Byadgi red chillies to high-curcumin Lakadong turmeric and cold-dried botanicals, we deliver 100% whole food matter&mdash;free from carcinogenic Sudan dyes, toxic lead chromate, sawdust, and synthetic fillers.\n            </p>\n\n            <!-- Hero Feature Image Card -->\n            <div class=\"relative mt-10 overflow-hidden rounded-3xl border border-[#e5decb] bg-white shadow-xl\">\n                <img\n                    src=\"{{ asset(\'storage/theme/cms/navanidhi-harvest-story.webp\') }}?v={{ filemtime(public_path(\'storage/theme/cms/navanidhi-harvest-story.webp\')) }}\"\n                    alt=\"Navanidhi Naturals Authentic Indian Farm Harvest\"\n                    class=\"h-64 sm:h-96 lg:h-[460px] w-full object-cover transition-transform duration-700 hover:scale-105\"\n                />\n                <div class=\"absolute inset-0 bg-gradient-to-t from-[#163923]/85 via-transparent to-transparent\"></div>\n                <div class=\"absolute bottom-6 left-6 right-6 flex flex-col sm:flex-row sm:items-end justify-between gap-4 text-white text-left\">\n                    <div>\n                        <span class=\"inline-block px-3 py-1 rounded-full bg-[#c9a25a] text-[#163923] text-[10px] font-bold tracking-widest uppercase mb-2\">\n                            Honest Indian Farmlands\n                        </span>\n                        <h3 class=\"font-serif text-xl sm:text-2xl font-bold\">Pristine Single-Origin Cultivation</h3>\n                        <p class=\"text-xs sm:text-sm text-white/80 max-w-md mt-0.5\">Sourced directly from vetted farmer networks in Guntur, Meghalaya, and Tamil Nadu.</p>\n                    </div>\n                    <div class=\"flex items-center gap-2 rounded-2xl bg-white/10 backdrop-blur-md px-4 py-2 border border-white/20\">\n                        <svg class=\"w-5 h-5 text-[#83B740]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M5 13l4 4L19 7\"/></svg>\n                        <span class=\"text-xs font-semibold tracking-wide\">100% Pure Food Matter</span>\n                    </div>\n                </div>\n            </div>\n\n            <!-- 4 Trust Metrics Strip -->\n            <div class=\"grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6 pt-6 text-left\">\n                <div class=\"p-5 rounded-2xl bg-white border border-[#e5decb] shadow-2xs hover:border-[#205132]/30 transition-all\">\n                    <p class=\"font-serif text-3xl font-bold text-[#163923]\">100%</p>\n                    <p class=\"text-xs uppercase tracking-wider text-[#205132] font-semibold mt-1\">Whole Food Matter</p>\n                    <p class=\"text-[11px] text-[#677a6d] mt-0.5\">Zero Sudan dyes, lead chromate, or sawdust.</p>\n                </div>\n\n                <div class=\"p-5 rounded-2xl bg-white border border-[#e5decb] shadow-2xs hover:border-[#205132]/30 transition-all\">\n                    <p class=\"font-serif text-3xl font-bold text-[#163923]\">&lt; 42&deg;C</p>\n                    <p class=\"text-xs uppercase tracking-wider text-[#205132] font-semibold mt-1\">Cold Stone-Milled</p>\n                    <p class=\"text-[11px] text-[#677a6d] mt-0.5\">Living capsaicin, curcumin, and aroma oils intact.</p>\n                </div>\n\n                <div class=\"p-5 rounded-2xl bg-white border border-[#e5decb] shadow-2xs hover:border-[#205132]/30 transition-all\">\n                    <p class=\"font-serif text-3xl font-bold text-[#163923]\">0%</p>\n                    <p class=\"text-xs uppercase tracking-wider text-[#205132] font-semibold mt-1\">Synthetic Additives</p>\n                    <p class=\"text-[11px] text-[#677a6d] mt-0.5\">No artificial food color, silica, or preservatives.</p>\n                </div>\n\n                <div class=\"p-5 rounded-2xl bg-white border border-[#e5decb] shadow-2xs hover:border-[#205132]/30 transition-all\">\n                    <p class=\"font-serif text-3xl font-bold text-[#163923]\">FSSAI</p>\n                    <p class=\"text-xs uppercase tracking-wider text-[#205132] font-semibold mt-1\">Central Licensed</p>\n                    <p class=\"text-[11px] text-[#677a6d] mt-0.5\">Batch-tested by accredited NABL laboratories.</p>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 2: THE FOUNDING STORY & THE SPARK -->\n    <section class=\"py-16 sm:py-24 bg-white border-b border-[#e5decb]/70\">\n        <div class=\"site-container\">\n            <div class=\"grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center\">\n                <!-- Left Story Column -->\n                <div class=\"lg:col-span-7 space-y-6\">\n                    <div class=\"inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                        <span class=\"h-1.5 w-1.5 rounded-full bg-[#205132]\"></span>\n                        <span>The Genesis</span>\n                    </div>\n\n                    <h2 class=\"font-serif text-2xl sm:text-4xl font-bold text-[#163923] leading-tight\">\n                        Reclaiming the Purity of Indian Spices &amp; Botanicals\n                    </h2>\n                    \n                    <div class=\"space-y-4 text-sm sm:text-base text-[#677a6d] leading-relaxed\">\n                        <p>\n                            For generations, Indian kitchens and Ayurvedic traditions relied on unadulterated spices and sacred herbs for daily nourishment, immunity, and digestive fire. But visiting modern spice markets reveals a disturbing reality: commercial red chilli powders are routinely cut with carcinogenic Sudan dyes to fake a deep red color, cheap turmeric is brightened with toxic lead chromate, and botanical powders are diluted with up to 70% maltodextrin carriers and sawdust fillers.\n                        </p>\n                        <p>\n                            Furthermore, industrial high-speed pulverizers generate scorching heat exceeding 80&deg;C&ndash;160&deg;C. This intense friction scorches fragile essential oils, oxidizes natural antioxidants, and destroys volatile aroma molecules like capsaicin, curcuminoids, and piperine.\n                        </p>\n                        <p class=\"p-4 rounded-2xl bg-[#FAF8F5] border-l-4 border-[#205132] text-[#163923] font-medium\">\n                            We asked a fundamental question: <strong class=\"text-[#163923] font-bold\">Why compromise the sacred integrity of Indian kitchen staples when honest farming and traditional slow milling can deliver perfection?</strong>\n                        </p>\n                        <p>\n                            <strong>MAN Agro Foods</strong> founded Navanidhi Naturals to restore absolute transparency: direct farmer sourcing from certified Indian terroirs, slow stone-grinding and low-temperature dehydration below 42&deg;C, and hermetically sealed freshness with zero chemical adulterants.\n                        </p>\n                    </div>\n                </div>\n\n                <!-- Right Pull Quote Card -->\n                <div class=\"lg:col-span-5\">\n                    <div class=\"rounded-3xl bg-[#163923] p-8 sm:p-10 text-white space-y-6 shadow-xl relative overflow-hidden\">\n                        <div class=\"absolute -top-10 -right-10 w-40 h-40 bg-[#205132]/40 rounded-full blur-2xl pointer-events-none\"></div>\n                        \n                        <div class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-[#c9a25a] border border-white/15\">\n                            <svg class=\"w-6 h-6\" viewBox=\"0 0 24 24\" fill=\"currentColor\">\n                                <path d=\"M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z\"/>\n                            </svg>\n                        </div>\n\n                        <blockquote class=\"font-serif text-lg sm:text-xl italic leading-relaxed text-[#FAF8F5]\">\n                            \"If you cannot trace the spice or botanical directly back to living Indian soil, and if you have to fake its color with synthetic dyes or fillers, it does not belong in your kitchen or your body.\"\n                        </blockquote>\n\n                        <div class=\"pt-5 border-t border-white/15 text-xs text-[#FAF8F5]/80 flex items-center justify-between\">\n                            <div>\n                                <p class=\"font-bold text-white tracking-wide\">The Navanidhi Purity Standard</p>\n                                <p class=\"text-[11px] text-[#c9a25a] mt-0.5 font-medium\">Stone-Ground &bull; Zero Dyes &bull; MAN Agro Foods</p>\n                            </div>\n                            <div class=\"flex h-8 w-8 items-center justify-center rounded-full bg-[#205132] text-white\">\n                                <svg class=\"w-4 h-4\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M5 13l4 4L19 7\"/></svg>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 3: THE 4 FORMULATION PILLARS -->\n    <section class=\"py-16 sm:py-24 border-b border-[#e5decb]/70\" style=\"background-color: #F5EFE6 !important;\">\n        <div class=\"site-container\">\n            <div class=\"max-w-3xl mx-auto text-center space-y-4 mb-16\">\n                <div class=\"inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                    <span class=\"h-1.5 w-1.5 rounded-full bg-[#205132]\"></span>\n                    <span>Our Four Pillars</span>\n                </div>\n                <h2 class=\"font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[#163923]\">\n                    The Pillars of Navanidhi Purity\n                </h2>\n                <p class=\"text-sm sm:text-base text-[#677a6d] leading-relaxed\">\n                    Every spice and botanical formulation we produce adheres strictly to these non-negotiable principles.\n                </p>\n            </div>\n\n            <div class=\"grid grid-cols-1 md:grid-cols-2 gap-8\">\n                <!-- Pillar 01 -->\n                <div class=\"p-8 sm:p-10 rounded-3xl bg-white border border-[#e5decb] shadow-2xs space-y-4 hover:border-[#205132] hover:shadow-md transition-all duration-300\">\n                    <div class=\"flex items-center justify-between\">\n                        <span class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] font-serif text-lg font-bold border border-[#205132]/20\">\n                            01\n                        </span>\n                        <span class=\"text-xs font-bold uppercase tracking-widest text-[#c9a25a]\">Thermal Discipline</span>\n                    </div>\n                    <h3 class=\"font-serif text-2xl font-bold text-[#163923]\">\n                        Slow Stone-Grinding &amp; Cold Dehydration (&lt;42&deg;C)\n                    </h3>\n                    <p class=\"text-sm leading-relaxed text-[#677a6d]\">\n                        Frictional heat destroys natural essential oils and oxidizes active medicinal compounds. We use slow stone mills and low-temperature vacuum dehydration chambers operating strictly below 42&deg;C. This locks in the natural fiery capsaicin of red chillies, the living golden curcumin of turmeric, and the active enzymes of green botanicals.\n                    </p>\n                </div>\n\n                <!-- Pillar 02 -->\n                <div class=\"p-8 sm:p-10 rounded-3xl bg-white border border-[#e5decb] shadow-2xs space-y-4 hover:border-[#205132] hover:shadow-md transition-all duration-300\">\n                    <div class=\"flex items-center justify-between\">\n                        <span class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] font-serif text-lg font-bold border border-[#205132]/20\">\n                            02\n                        </span>\n                        <span class=\"text-xs font-bold uppercase tracking-widest text-[#c9a25a]\">Zero Adulteration</span>\n                    </div>\n                    <h3 class=\"font-serif text-2xl font-bold text-[#163923]\">\n                        Zero Sudan Dyes, Zero Lead Chromate, Zero Fillers\n                    </h3>\n                    <p class=\"text-sm leading-relaxed text-[#677a6d]\">\n                        We enforce an absolute ban on all artificial food colors (Sudan I&ndash;IV dyes, Metanil Yellow, Lead Chromate), starch carriers, sawdust, and silicon dioxide flow agents. When you open a Navanidhi pack, you get 100% pure food matter sourced from honest Indian earth.\n                    </p>\n                </div>\n\n                <!-- Pillar 03 -->\n                <div class=\"p-8 sm:p-10 rounded-3xl bg-white border border-[#e5decb] shadow-2xs space-y-4 hover:border-[#205132] hover:shadow-md transition-all duration-300\">\n                    <div class=\"flex items-center justify-between\">\n                        <span class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] font-serif text-lg font-bold border border-[#205132]/20\">\n                            03\n                        </span>\n                        <span class=\"text-xs font-bold uppercase tracking-widest text-[#c9a25a]\">Instant Dispersion</span>\n                    </div>\n                    <h3 class=\"font-serif text-2xl font-bold text-[#163923]\">\n                        Precision Cryo Micron-Milling\n                    </h3>\n                    <p class=\"text-sm leading-relaxed text-[#677a6d]\">\n                        Without synthetic emulsifiers or chemical dispersing agents, our botanicals and spices undergo gentle cryogenic micro-milling. This achieves effortless culinary incorporation in Indian curries, stir-fries, warm golden milk, morning tonics, and herbal infusions.\n                    </p>\n                </div>\n\n                <!-- Pillar 04 -->\n                <div class=\"p-8 sm:p-10 rounded-3xl bg-white border border-[#e5decb] shadow-2xs space-y-4 hover:border-[#205132] hover:shadow-md transition-all duration-300\">\n                    <div class=\"flex items-center justify-between\">\n                        <span class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] font-serif text-lg font-bold border border-[#205132]/20\">\n                            04\n                        </span>\n                        <span class=\"text-xs font-bold uppercase tracking-widest text-[#c9a25a]\">Full Traceability</span>\n                    </div>\n                    <h3 class=\"font-serif text-2xl font-bold text-[#163923]\">\n                        Direct Farmer Partnerships &amp; NABL Lab Verification\n                    </h3>\n                    <p class=\"text-sm leading-relaxed text-[#677a6d]\">\n                        We work directly with multigenerational Indian smallholders cultivating without toxic pesticides. Every harvest lot is tagged, batch-numbered, and analyzed by third-party NABL-accredited laboratories for heavy metals, moisture levels, microbial safety, and active phytonutrient density.\n                    </p>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 4: AGRICULTURAL TERROIRS & SOURCING GEOGRAPHY -->\n    <section class=\"py-16 sm:py-24 bg-white border-b border-[#e5decb]/70\">\n        <div class=\"site-container\">\n            <div class=\"max-w-3xl mx-auto text-center space-y-4 mb-16\">\n                <div class=\"inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                    <span class=\"h-1.5 w-1.5 rounded-full bg-[#205132]\"></span>\n                    <span>Indian Agricultural Origins</span>\n                </div>\n                <h2 class=\"font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[#163923]\">\n                    Sourced from Native Indian Terroirs\n                </h2>\n                <p class=\"text-sm sm:text-base text-[#677a6d] leading-relaxed\">\n                    Spices and botanicals attain peak active phytonutrient density only when grown in their native ecological habitats.\n                </p>\n            </div>\n\n            <div class=\"grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6\">\n                <!-- Terroir 1 -->\n                <div class=\"p-6 rounded-2xl bg-[#FAF8F5] border border-[#e5decb] space-y-4 hover:border-[#205132]/40 transition-all\">\n                    <div class=\"flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#991B1B]\">\n                        <svg class=\"w-4 h-4 text-[#991B1B]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z\"/><circle cx=\"12\" cy=\"9\" r=\"2.5\"/></svg>\n                        <span>Guntur &amp; Byadgi</span>\n                    </div>\n                    <h4 class=\"font-serif text-xl font-bold text-[#163923]\">Pure Red Chilli</h4>\n                    <p class=\"text-xs sm:text-sm leading-relaxed text-[#677a6d]\">\n                        Sun-ripened chillies selected for high natural ASTA color and balanced Scoville heat, slow stone-milled with zero synthetic Sudan dyes or added oils.\n                    </p>\n                </div>\n\n                <!-- Terroir 2 -->\n                <div class=\"p-6 rounded-2xl bg-[#FAF8F5] border border-[#e5decb] space-y-4 hover:border-[#205132]/40 transition-all\">\n                    <div class=\"flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#c9a25a]\">\n                        <svg class=\"w-4 h-4 text-[#c9a25a]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z\"/><circle cx=\"12\" cy=\"9\" r=\"2.5\"/></svg>\n                        <span>Meghalaya, India</span>\n                    </div>\n                    <h4 class=\"font-serif text-xl font-bold text-[#163923]\">Lakadong Turmeric</h4>\n                    <p class=\"text-xs sm:text-sm leading-relaxed text-[#677a6d]\">\n                        Cultivated in the pristine organic soils of Meghalaya, delivering an extraordinary 7.5% natural curcumin density&mdash;over triple that of conventional market turmeric.\n                    </p>\n                </div>\n\n                <!-- Terroir 3 -->\n                <div class=\"p-6 rounded-2xl bg-[#FAF8F5] border border-[#e5decb] space-y-4 hover:border-[#205132]/40 transition-all\">\n                    <div class=\"flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                        <svg class=\"w-4 h-4 text-[#205132]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z\"/><circle cx=\"12\" cy=\"9\" r=\"2.5\"/></svg>\n                        <span>Salem, Tamil Nadu</span>\n                    </div>\n                    <h4 class=\"font-serif text-xl font-bold text-[#163923]\">Organic Moringa</h4>\n                    <p class=\"text-xs sm:text-sm leading-relaxed text-[#677a6d]\">\n                        Harvested from traditional agrarian belts, shade-dried below 38&deg;C to safeguard vibrant cellular chlorophyll, 46 antioxidants, and complete plant proteins.\n                    </p>\n                </div>\n\n                <!-- Terroir 4 -->\n                <div class=\"p-6 rounded-2xl bg-[#FAF8F5] border border-[#e5decb] space-y-4 hover:border-[#205132]/40 transition-all\">\n                    <div class=\"flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                        <svg class=\"w-4 h-4 text-[#205132]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z\"/><circle cx=\"12\" cy=\"9\" r=\"2.5\"/></svg>\n                        <span>Rajasthan Arid Soils</span>\n                    </div>\n                    <h4 class=\"font-serif text-xl font-bold text-[#163923]\">Organic Ashwagandha</h4>\n                    <p class=\"text-xs sm:text-sm leading-relaxed text-[#677a6d]\">\n                        Full-spectrum adaptogenic root matured for 180 days in arid organic soils, delivering active withanolides to harmonize stress and support natural vitality.\n                    </p>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 5: THE MATRIX (WHAT WE NEVER USE VS ALWAYS DELIVER) -->\n    <section class=\"py-16 sm:py-24 border-b border-[#e5decb]/70\" style=\"background-color: #F5EFE6 !important;\">\n        <div class=\"site-container\">\n            <div class=\"max-w-3xl mx-auto text-center space-y-4 mb-16\">\n                <div class=\"inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                    <span class=\"h-1.5 w-1.5 rounded-full bg-[#205132]\"></span>\n                    <span>The Standard Matrix</span>\n                </div>\n                <h2 class=\"font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[#163923]\">\n                    Our Zero-Compromise Standard\n                </h2>\n                <p class=\"text-sm sm:text-base text-[#677a6d] leading-relaxed\">\n                    What we keep out of our spices and botanicals is just as important as what we harvest.\n                </p>\n            </div>\n\n            <div class=\"grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto\">\n                <!-- What We NEVER Use -->\n                <div class=\"p-8 rounded-3xl bg-[#FEF2F2] border border-[#FCA5A5] space-y-5\">\n                    <div class=\"flex items-center gap-2.5 text-[#991B1B] font-serif text-xl font-bold\">\n                        <div class=\"flex h-8 w-8 items-center justify-center rounded-full bg-[#FEE2E2] text-[#991B1B]\">\n                            <svg class=\"w-5 h-5\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M6 18L18 6M6 6l12 12\"/></svg>\n                        </div>\n                        <span>What We NEVER Use</span>\n                    </div>\n                    <ul class=\"space-y-3.5 text-xs sm:text-sm text-[#163923]/90 font-medium\">\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#991B1B] font-bold shrink-0\">&times;</span>\n                            <span><strong>No Sudan Dyes (I&ndash;IV):</strong> Zero carcinogenic chemical red dyes commonly found in industrial chillies.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#991B1B] font-bold shrink-0\">&times;</span>\n                            <span><strong>No Lead Chromate:</strong> Zero toxic yellow pigments used to artificially brighten cheap turmeric.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#991B1B] font-bold shrink-0\">&times;</span>\n                            <span><strong>No Starch, Sawdust, or Chalk:</strong> Zero cheap bulking adulterants or artificial weight additives.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#991B1B] font-bold shrink-0\">&times;</span>\n                            <span><strong>No Destructive High-Heat Milling:</strong> Never exposed to friction over 80&deg;C that scorches essential oils.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#991B1B] font-bold shrink-0\">&times;</span>\n                            <span><strong>No Silicon Dioxide or Maltodextrin:</strong> Zero chemical anti-caking agents, carrier starches, or artificial preservatives.</span>\n                        </li>\n                    </ul>\n                </div>\n\n                <!-- What We ALWAYS Deliver -->\n                <div class=\"p-8 rounded-3xl bg-[#EBF3EE] border border-[#205132]/30 space-y-5\">\n                    <div class=\"flex items-center gap-2.5 text-[#205132] font-serif text-xl font-bold\">\n                        <div class=\"flex h-8 w-8 items-center justify-center rounded-full bg-[#205132] text-white\">\n                            <svg class=\"w-5 h-5\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M5 13l4 4L19 7\"/></svg>\n                        </div>\n                        <span>What We ALWAYS Deliver</span>\n                    </div>\n                    <ul class=\"space-y-3.5 text-xs sm:text-sm text-[#163923]/90 font-medium\">\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#205132] font-bold shrink-0\">&check;</span>\n                            <span><strong>100% Pure Food Matter:</strong> Real Indian farm spices and whole botanicals only.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#205132] font-bold shrink-0\">&check;</span>\n                            <span><strong>Cold Milled (&lt;42&deg;C):</strong> Living capsaicin warmth, native curcumin, and volatile aromatic oils preserved.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#205132] font-bold shrink-0\">&check;</span>\n                            <span><strong>Natural Color &amp; Pure Aroma:</strong> Authentic hues from Indian sun and rich soil, not laboratory colorants.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#205132] font-bold shrink-0\">&check;</span>\n                            <span><strong>NABL Laboratory Tested:</strong> Every lot certified for heavy metals, microbial safety, and active potency.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#205132] font-bold shrink-0\">&check;</span>\n                            <span><strong>MAN Agro Clean-Room Packaging:</strong> Triple-barrier induction seal with inert nitrogen flush for kitchen freshness.</span>\n                        </li>\n                    </ul>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 6: SUSTAINABILITY & REGENERATIVE STEWARDSHIP -->\n    <section class=\"py-16 sm:py-24 bg-white border-b border-[#e5decb]/70\">\n        <div class=\"site-container\">\n            <div class=\"grid grid-cols-1 lg:grid-cols-12 gap-12 items-center\">\n                <div class=\"lg:col-span-5 space-y-6\">\n                    <div class=\"inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                        <span class=\"h-1.5 w-1.5 rounded-full bg-[#205132]\"></span>\n                        <span>Stewardship</span>\n                    </div>\n                    <h2 class=\"font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#163923] leading-tight\">\n                        Honoring the Soil &amp; The Farmers\n                    </h2>\n                    <p class=\"text-sm sm:text-base text-[#677a6d] leading-relaxed\">\n                        True quality begins with healthy living soil and empowered farming communities. MAN Agro Foods works closely with smallholder growers across Andhra Pradesh, Karnataka, Meghalaya, and Tamil Nadu who practice crop rotation, natural compost enrichment, and pesticide-free stewardship.\n                    </p>\n                    <div class=\"flex items-center gap-4 text-xs font-semibold uppercase tracking-wider text-[#205132]\">\n                        <span class=\"flex items-center gap-1.5\">\n                            <svg class=\"w-4 h-4 text-[#205132]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z\"/></svg>\n                            Direct Farmer Sourcing\n                        </span>\n                        <span class=\"text-[#e5decb]\">&bull;</span>\n                        <span class=\"flex items-center gap-1.5\">\n                            <svg class=\"w-4 h-4 text-[#205132]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8\"/><path d=\"M3 3v5h5\"/><path d=\"M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16\"/><path d=\"M16 21h5v-5\"/></svg>\n                            100% Recyclable Packs\n                        </span>\n                    </div>\n                </div>\n\n                <div class=\"lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6\">\n                    <div class=\"p-6 rounded-2xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/30 transition-all\">\n                        <div class=\"flex h-10 w-10 items-center justify-center rounded-xl bg-[#205132]/10 text-[#205132]\">\n                            <svg class=\"w-5 h-5\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/><circle cx=\"9\" cy=\"7\" r=\"4\"/><path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"/><path d=\"M16 3.13a4 4 0 0 1 0 7.75\"/></svg>\n                        </div>\n                        <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Fair Farmer Compensation</h4>\n                        <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                            Paying guaranteed above-market prices directly to grower families who safeguard indigenous heirloom crops and pesticide-free cultivation.\n                        </p>\n                    </div>\n\n                    <div class=\"p-6 rounded-2xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/30 transition-all\">\n                        <div class=\"flex h-10 w-10 items-center justify-center rounded-xl bg-[#205132]/10 text-[#205132]\">\n                            <svg class=\"w-5 h-5\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z\"/><path d=\"M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12\"/></svg>\n                        </div>\n                        <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Zero-Waste Farm Processing</h4>\n                        <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                            Agricultural stem and leaf byproducts are composted back into agricultural soil to regenerate natural organic matter for subsequent crop cycles.\n                        </p>\n                    </div>\n\n                    <div class=\"p-6 rounded-2xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/30 transition-all\">\n                        <div class=\"flex h-10 w-10 items-center justify-center rounded-xl bg-[#205132]/10 text-[#205132]\">\n                            <svg class=\"w-5 h-5\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z\"/></svg>\n                        </div>\n                        <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Food-Grade Nitrogen Seals</h4>\n                        <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                            Each jar and pouch is flushed with food-grade nitrogen gas to lock in fresh aroma and capsaicin/curcumin vitality without synthetic preservatives.\n                        </p>\n                    </div>\n\n                    <div class=\"p-6 rounded-2xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/30 transition-all\">\n                        <div class=\"flex h-10 w-10 items-center justify-center rounded-xl bg-[#205132]/10 text-[#205132]\">\n                            <svg class=\"w-5 h-5\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z\"/></svg>\n                        </div>\n                        <h4 class=\"font-serif text-lg font-bold text-[#163923]\">MAN Agro Processing Facility</h4>\n                        <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                            Manufactured and packed by <strong>MAN AGRO FOODS</strong> under Central FSSAI License No. 10020042001234 in certified clean-room processing environments.\n                        </p>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 7: EDITORIAL CALL TO ACTION -->\n    <section \n        class=\"text-white text-center relative overflow-hidden\" \n        style=\"background-color: #163923 !important; padding-top: 5.5rem !important; padding-bottom: 5.5rem !important; border-top: 1px solid rgba(201, 162, 90, 0.3) !important; border-bottom: 1px solid rgba(201, 162, 90, 0.25) !important;\"\n    >\n        <div class=\"absolute inset-0 bg-gradient-to-br from-[#205132]/40 via-transparent to-[#c9a25a]/20 pointer-events-none\"></div>\n        <div class=\"site-container relative z-10 max-w-3xl mx-auto space-y-6\">\n            <span class=\"inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-[10px] font-bold tracking-[0.2em] uppercase bg-white/10 text-[#FAF8F5] border border-white/15\">\n                <svg class=\"w-3.5 h-3.5 text-[#c9a25a]\" viewBox=\"0 0 24 24\" fill=\"currentColor\"><path d=\"M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z\"/></svg>\n                Experience Navanidhi Purity\n            </span>\n\n            <h2 class=\"font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight leading-tight text-white\">\n                Taste Pure Farm Spices <br class=\"hidden sm:inline\">\n                <span class=\"text-[#c9a25a]\">&amp; Living Botanicals</span>\n            </h2>\n\n            <p class=\"text-sm sm:text-base text-[#FAF8F5]/90 max-w-xl mx-auto leading-relaxed\">\n                Explore our collection of pure stone-ground spices and cold-dehydrated whole botanicals crafted for authentic Indian cooking and daily vitality.\n            </p>\n\n            <div class=\"flex flex-col sm:flex-row items-center justify-center gap-4 pt-4\">\n                <a\n                    href=\"{{ url(\'/spices\') }}\"\n                    class=\"px-8 py-4 text-xs font-bold tracking-[0.15em] uppercase rounded-full hover:shadow-lg transition-all duration-300\"\n                    style=\"background: linear-gradient(135deg, #c9a25a 0%, #b08a43 100%) !important; color: #ffffff !important; box-shadow: 0 4px 14px rgba(201, 162, 90, 0.4) !important;\"\n                >\n                    Explore Pure Spices &rarr;\n                </a>\n                <a\n                    href=\"{{ route(\'shop.product_or_category.index\', \'products\') }}\"\n                    class=\"px-8 py-4 text-xs font-bold tracking-[0.15em] uppercase rounded-full border transition-all duration-300\"\n                    style=\"background: transparent !important; color: #FAF8F5 !important; border: 1.5px solid rgba(250, 248, 245, 0.4) !important;\"\n                >\n                    All Products\n                </a>\n            </div>\n        </div>\n    </section>\n</div>\n','Our Philosophy & Sourcing Origins | Pure Indian Spices & Botanicals | Navanidhi Naturals','Discover the Navanidhi Naturals story by MAN Agro Foods: stone-milled farm spices and cold-dehydrated botanicals crafted below 42°C with zero Sudan dyes or fillers.','about Navanidhi Naturals, MAN Agro Foods, Guntur red chilli powder, Lakadong turmeric powder, organic moringa, zero Sudan dyes, zero lead chromate, Indian farm spices','en',1),(26,'Return & Replacement Policy','return-policy','<h2>1. 100% Purity & Freshness Guarantee</h2>\n<p>At Navanidhi Naturals, backed by <strong>MAN AGRO FOODS</strong>, we stand behind the uncompromising quality, aroma, and safety of every pure spice and whole botanical formulation we package. If your parcel arrives damaged, leaking, or with a broken induction seal, we will replace it immediately at zero cost to you.</p>\n\n<h2>2. Eligibility for Replacement</h2>\n<ul>\n    <li><strong>Transit Damage or Leakage:</strong> Outer container or inner hermetic pouch breached during transit.</li>\n    <li><strong>Incorrect Product Delivered:</strong> The delivered SKU does not match your order confirmation.</li>\n    <li><strong>Broken Protective Seal:</strong> The inner tamper-evident induction foil seal is broken or compromised upon first opening.</li>\n</ul>\n\n<h2>3. How to Request a Replacement</h2>\n<p>Please notify our customer care team within <strong>48 hours of delivery</strong> by emailing <a href=\"mailto:care@navanidhinaturals.com\">care@navanidhinaturals.com</a> or messaging our WhatsApp hotline at <a href=\"https://wa.me/919876543210\">+91 98765 43210</a> with your Order ID, batch number, and a clear photo of the packaging issue. Our support team will dispatch a priority replacement within 24 business hours.</p>\n\n<h2>4. Non-Returnable Items</h2>\n<p>In compliance with Central FSSAI food safety regulations for edible agricultural food products, containers that have been opened or consumed cannot be returned for restock.</p>','Return & Replacement Policy | 100% Purity Guarantee | Navanidhi Naturals','Our commitment to purity: 48-hour transit damage reporting, hassle-free batch replacement, and guidelines for sealed spice and botanical returns.','return policy, replacement guarantee, damaged spice replacement, Navanidhi Naturals guarantee, MAN Agro Foods','en',2),(27,'Refund Policy','refund-policy','<h2>1. Refund Eligibility</h2>\n<p>Refunds are initiated immediately for order cancellations submitted prior to warehouse dispatch, verified stock unavailability, or in instances where an approved replacement product is out of stock.</p>\n\n<h2>2. Refund Processing Timeframes</h2>\n<ul>\n    <li><strong>Prepaid UPI &amp; Net Banking:</strong> 3 to 5 business days credited directly to your source bank account.</li>\n    <li><strong>Credit &amp; Debit Cards:</strong> 5 to 7 business days depending on your card issuer\'s settlement cycle.</li>\n    <li><strong>Digital Wallets (Paytm, PhonePe, Amazon Pay):</strong> 24 to 48 hours credited to your original wallet balance.</li>\n</ul>\n\n<h2>3. Cancellation Guidelines</h2>\n<p>You may cancel an order free of charge at any time before shipment dispatch. Once a parcel has been handed over to our courier partners, order cancellations cannot be processed; however, our replacement guarantee remains fully applicable upon arrival.</p>','Refund Policy | Transparent 3-5 Day Banking Settlements | Navanidhi Naturals','Official refund processing timelines, payment gateway SLAs, and reimbursement methods for cancelled or approved replacement returns.','refund policy, refund processing time, payment reversal, customer reimbursement, Navanidhi Naturals','en',3),(28,'Terms & Conditions of Sale','terms-conditions','<h2>1. Introduction &amp; Agreement</h2>\n<p>Welcome to Navanidhi Naturals, a brand manufactured and marketed by <strong>MAN AGRO FOODS</strong> (\"we,\" \"our,\" or \"us\"). By accessing or purchasing our pure spices and botanical nutrition formulations through this website, you agree to be bound by these Terms and Conditions of Sale.</p>\n\n<h2>2. Product Formulation &amp; Disclaimers</h2>\n<p>Navanidhi Naturals products are 100% pure food matter, stone-ground culinary spices, and cold-dehydrated whole botanical powders. All items are produced in compliance with Central FSSAI regulations (Lic. No. 10020042001234). Our botanical powders are natural food dietary supplements and are not intended to diagnose, treat, cure, or prevent any medical condition.</p>\n<p>If you are pregnant, nursing, taking prescription medications, or under medical supervision, please consult a qualified healthcare practitioner prior to beginning new herbal rituals.</p>\n\n<h2>3. Pricing, Taxes &amp; Payments</h2>\n<ul>\n    <li><strong>Pricing:</strong> All prices are displayed in Indian Rupees (INR) and are inclusive of all applicable Goods and Services Tax (GST).</li>\n    <li><strong>Payment Security:</strong> Online payments are processed through RBI-compliant, PCI-DSS Level 1 certified gateways with 256-bit SSL encryption. We never store card numbers or CVVs on our servers.</li>\n</ul>\n\n<h2>4. Governing Law &amp; Jurisdiction</h2>\n<p>These terms and all sales transactions shall be governed by the laws of India. Any disputes arising in connection with these terms shall be subject to the exclusive jurisdiction of the competent courts in Bengaluru, Karnataka, India.</p>','Terms & Conditions of Sale | Order & Usage Guidelines | Navanidhi Naturals','Official terms and conditions governing purchases, pricing, dispatch, dietary consumption guidelines, and customer agreements on Navanidhi Naturals.','terms and conditions, terms of sale, purchase agreement, legal terms, customer rights, Navanidhi Naturals, MAN Agro Foods','en',4),(29,'Website Terms of Use','terms-of-use','<h2>1. Acceptance of Terms</h2>\n<p>By browsing or creating an account on this website, you agree to abide by these Terms of Use and all applicable Indian digital commerce laws and guidelines.</p>\n\n<h2>2. Account Confidentiality</h2>\n<p>When you register for an account, you are responsible for maintaining the confidentiality of your login credentials and restricting unauthorized access to your device. You accept full responsibility for all transactions executed under your account.</p>\n\n<h2>3. Intellectual Property Rights</h2>\n<p>All brand names, logos, product photography, botanical descriptions, recipe formulations, and graphical designs on this website are the proprietary intellectual property of MAN AGRO FOODS and Navanidhi Naturals. Unauthorized copying, scraping, or redistribution is strictly prohibited.</p>','Website Terms of Use | Digital Access & Intellectual Property | Navanidhi Naturals','Terms of use governing browsing, content usage, user accounts, and intellectual property rights across the Navanidhi Naturals digital storefront.','terms of use, website usage terms, intellectual property, acceptable use, Navanidhi Naturals','en',5),(30,'Customer Care & Support','customer-service','<h2>Dedicated Support for Pure Kitchens &amp; Wellness</h2>\n<p>Our dedicated customer support team is available to assist you with order status inquiries, batch laboratory certificates of analysis (COA), culinary usage advice, and wholesale partnerships.</p>\n\n<h2>Direct Communication Channels</h2>\n<ul>\n    <li><strong>Email Support:</strong> <a href=\"mailto:care@navanidhinaturals.com\">care@navanidhinaturals.com</a> (Response within 24 business hours)</li>\n    <li><strong>Wholesale &amp; Institutional Sales:</strong> <a href=\"mailto:wholesale@navanidhinaturals.com\">wholesale@navanidhinaturals.com</a></li>\n    <li><strong>Phone &amp; WhatsApp Hotline:</strong> <a href=\"https://wa.me/919876543210\">+91 98765 43210</a></li>\n    <li><strong>Support Hours:</strong> Monday through Saturday, 9:00 AM to 6:00 PM IST</li>\n</ul>\n\n<h2>Processing &amp; Dispatch Hub</h2>\n<p><strong>MAN AGRO FOODS</strong> &bull; Navanidhi Naturals Division<br>\nIndustrial Processing Zone, Bengaluru / South India, Karnataka 560001, India<br>\nCentral FSSAI License No: 10020042001234</p>','Customer Care & SLAs | Multi-Channel Support | Navanidhi Naturals','Connect with Navanidhi Naturals customer care for order tracking, batch lab verification, recipe guidance, and wholesale inquiries.','customer service, care team, help desk, order assistance, wholesale inquiry, Navanidhi Naturals, MAN Agro Foods','en',6),(31,'What\'s New','whats-new','<h2>Introducing Pure Farm Spices by MAN AGRO FOODS</h2>\n<p>We are proud to introduce our <strong>Spices Collection</strong>, honoring authentic Indian culinary heritage with uncompromised purity:</p>\n<ul>\n    <li><strong>Pure Red Chilli Powder:</strong> Sourced from sun-ripened Guntur and Byadgi pods. Stone-milled below 42&deg;C with zero Sudan dyes, zero added oils, and pure natural ASTA crimson color.</li>\n    <li><strong>High-Curcumin Lakadong Turmeric:</strong> Organically grown in Meghalaya with a tested &ge;7.5% natural curcumin density. Free from Lead Chromate, chalk, or starch fillers.</li>\n</ul>\n<p>Explore our latest arrivals in the <a href=\"/spices\">Spices Category</a> or browse <a href=\"/products\">All Formulations</a>.</p>','What\'s New | New Farm Spices & Seasonal Harvests | Navanidhi Naturals','Discover latest harvest releases: Pure Guntur Red Chilli Powder and Lakadong Turmeric, fresh cold-milled batches by MAN Agro Foods.','new products, pure red chilli powder, Lakadong turmeric powder, harvest release, Navanidhi Naturals','en',7),(32,'Payment Security & Methods','payment-policy','<h2>1. Accepted Payment Methods</h2>\n<p>To ensure a smooth, transparent checkout experience, Navanidhi Naturals supports all major Indian digital payment methods:</p>\n<ul>\n    <li><strong>Unified Payments Interface (UPI):</strong> Google Pay, PhonePe, Paytm, BHIM, and bank UPI applications.</li>\n    <li><strong>Credit &amp; Debit Cards:</strong> Visa, MasterCard, RuPay, and American Express.</li>\n    <li><strong>Net Banking:</strong> Instant authorization across 50+ leading Indian banks.</li>\n    <li><strong>Digital Wallets:</strong> Paytm, PhonePe, and Amazon Pay.</li>\n    <li><strong>Cash on Delivery (COD):</strong> Available on eligible pin codes across India.</li>\n</ul>\n\n<h2>2. Bank-Grade Security Standards</h2>\n<p>Every transaction on our platform is secured with 256-bit SSL encryption and routed through RBI-compliant, PCI-DSS Level 1 certified gateways with mandatory two-factor authentication (OTP verification). We never store your card numbers or CVVs.</p>','Payment Security & Methods | RBI-Compliant 256-Bit SSL | Navanidhi Naturals','Explore safe and encrypted payment options: UPI, cards, net banking, and Cash on Delivery with full RBI-compliant 256-bit encryption.','payment policy, secure payment gateway, upi payments, card security, cash on delivery, Navanidhi Naturals','en',8),(33,'Shipping & Delivery Policy','shipping-policy','<h2>1. Dispatch Timeline</h2>\n<p>All orders placed before 2:00 PM IST on business days (Monday through Saturday) are sealed in nitrogen-flushed protective packaging and dispatched within <strong>24 business hours</strong> directly from our MAN AGRO FOODS facility.</p>\n\n<h2>2. Estimated Delivery Timeframes</h2>\n<ul>\n    <li><strong>Metro Cities (Bengaluru, Hyderabad, Chennai, Mumbai, Delhi NCR, Kolkata):</strong> 2 to 4 business days from dispatch.</li>\n    <li><strong>Tier II &amp; Tier III Cities:</strong> 4 to 7 business days from dispatch.</li>\n    <li><strong>Special &amp; Hill Regions:</strong> 6 to 9 business days from dispatch.</li>\n</ul>\n\n<h2>3. Free Delivery Threshold</h2>\n<p>We provide <strong>Free Standard Shipping</strong> across all serviceable Indian pin codes on orders valued at <strong>&#8377;499 or above</strong>. For orders below &#8377;499, a nominal flat delivery charge of &#8377;50 is applied at checkout.</p>\n\n<h2>4. Tamper-Evident Packaging</h2>\n<p>Every shipment is packaged in high-grade recyclable outer boxes with an unbroken hermetic inner foil seal to ensure zero moisture ingress or aroma loss during transit.</p>','Shipping & Delivery Policy | Express Pan-India Transit | Navanidhi Naturals','Learn about our express 24-hour dispatch, protective packaging, and free shipping on orders above ₹499.','shipping policy, pan-india delivery, express courier, free shipping threshold, packaging standards, Navanidhi Naturals','en',9),(34,'Privacy Policy & Data Protection','privacy-policy','<h2>1. Our Privacy Commitment</h2>\n<p>Navanidhi Naturals, a brand of MAN AGRO FOODS, is dedicated to protecting your personal information. We collect only what is strictly necessary to fulfill your orders, provide shipment tracking, and deliver authentic customer care.</p>\n\n<h2>2. Information We Collect</h2>\n<ul>\n    <li><strong>Order Fulfillment Details:</strong> Name, shipping address, billing address, email address, and mobile number for dispatch updates.</li>\n    <li><strong>Payment Details:</strong> Handled securely via tokenized payment gateways. We never view or store raw credit/debit card numbers.</li>\n    <li><strong>Account History:</strong> Saved delivery addresses, past order records, and notification preferences.</li>\n</ul>\n\n<h2>3. Strict No-Sale Policy</h2>\n<p>We will never sell, rent, lease, or distribute your personal contact information to third-party telemarketers or data brokers. All communications are strictly limited to your order status and voluntary wellness updates.</p>\n\n<h2>4. Your Rights</h2>\n<p>You may request access to, correction of, or deletion of your stored customer account data at any time by writing to our Data Privacy Officer at <a href=\"mailto:care@navanidhinaturals.com\">care@navanidhinaturals.com</a>.</p>','Privacy Policy & Data Protection | 256-Bit SSL Security | Navanidhi Naturals','Read how Navanidhi Naturals protects your personal data, payment transactions, and customer confidentiality under Indian data protection regulations.','privacy policy, data protection, secure shopping, customer confidentiality, Navanidhi Naturals','en',10),(35,'Quality Standard & Lab Verification','quality','<div class=\"bg-[#FAF8F5] min-h-screen\">\n    @if (core()->getConfigData(\'general.general.breadcrumbs.shop\'))\n        <!-- Breadcrumbs -->\n        <div class=\"site-container pt-4 pb-2 sm:pt-6 sm:pb-3\">\n            <nav aria-label=\"Breadcrumb\" class=\"flex items-center space-x-2 text-[11px] sm:text-xs uppercase tracking-[0.14em] text-[#677a6d]\">\n                <a href=\"{{ route(\'shop.home.index\') }}\" class=\"hover:text-[#205132] transition-colors\">Home</a>\n                <span class=\"text-[#e5decb]\">/</span>\n                <span class=\"text-[#163923] font-semibold\">Quality Standard</span>\n            </nav>\n        </div>\n    @endif\n\n    <!-- SECTION 1: EDITORIAL HERO & QUALITY CODE -->\n    <section class=\"site-container pt-8 pb-16 sm:pt-14 sm:pb-20 border-b border-[#e5decb]/70\">\n        <div class=\"max-w-4xl mx-auto text-center space-y-6\">\n            <!-- Brand Tagline Badge -->\n            <div class=\"inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#205132]/10 text-[#205132] text-xs font-semibold tracking-widest uppercase border border-[#205132]/20 shadow-2xs\">\n                <svg class=\"w-4 h-4 text-[#205132]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.2\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n                    <path d=\"M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z\"/>\n                    <path d=\"m9 12 2 2 4-4\"/>\n                </svg>\n                <span>Zero Adulteration &bull; 100% Pure Food Matter &bull; MAN Agro Foods</span>\n            </div>\n\n            <!-- Main Heading -->\n            <h1 class=\"font-serif text-3xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-[#163923] leading-[1.14]\">\n                Scientific Verification. <br class=\"hidden sm:inline\">\n                <span class=\"italic text-[#205132] font-normal\">Authentic Indian Spice &amp; Botanical Integrity.</span>\n            </h1>\n\n            <!-- Subtitle -->\n            <p class=\"text-base sm:text-lg lg:text-xl leading-relaxed text-[#677a6d] max-w-3xl mx-auto\">\n                Quality is not an afterthought&mdash;it is our quantifiable protocol. From slow stone-grinding and cold dehydration below 42&deg;C to laboratory testing for Sudan dyes, lead chromate, and heavy metals, discover the uncompromised standard behind Navanidhi Naturals.\n            </p>\n\n            <!-- Hero Feature Image Card -->\n            <div class=\"relative mt-10 overflow-hidden rounded-3xl border border-[#e5decb] bg-white shadow-xl\">\n                <img\n                    src=\"{{ asset(\'storage/theme/cms/navanidhi-lab-protocol.webp\') }}?v={{ filemtime(public_path(\'storage/theme/cms/navanidhi-lab-protocol.webp\')) }}\"\n                    alt=\"Navanidhi Naturals Quality Standard & Lab Verification\"\n                    class=\"h-64 sm:h-96 lg:h-[460px] w-full object-cover transition-transform duration-700 hover:scale-105\"\n                />\n                <div class=\"absolute inset-0 bg-gradient-to-t from-[#163923]/85 via-transparent to-transparent\"></div>\n                <div class=\"absolute bottom-6 left-6 right-6 flex flex-col sm:flex-row sm:items-end justify-between gap-4 text-white text-left\">\n                    <div>\n                        <span class=\"inline-block px-3 py-1 rounded-full bg-[#c9a25a] text-[#163923] text-[10px] font-bold tracking-widest uppercase mb-2\">\n                            Clean-Label Science\n                        </span>\n                        <h3 class=\"font-serif text-xl sm:text-2xl font-bold\">Uncompromising Safety &amp; Potency Rigor</h3>\n                        <p class=\"text-xs sm:text-sm text-white/80 max-w-md mt-0.5\">Every agricultural lot undergoes LC-MS dye screening, HPLC active quantification &amp; ICP-MS metal testing.</p>\n                    </div>\n                    <div class=\"flex items-center gap-2 rounded-2xl bg-white/10 backdrop-blur-md px-4 py-2 border border-white/20\">\n                        <svg class=\"w-5 h-5 text-[#83B740]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z\"/></svg>\n                        <span class=\"text-xs font-semibold tracking-wide\">FSSAI Certified</span>\n                    </div>\n                </div>\n            </div>\n\n            <!-- 4 Trust Metrics Strip -->\n            <div class=\"grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6 pt-6 text-left\">\n                <div class=\"p-5 rounded-2xl bg-white border border-[#e5decb] shadow-2xs hover:border-[#205132]/30 transition-all\">\n                    <p class=\"font-serif text-3xl font-bold text-[#163923]\">&lt; 42&deg;C</p>\n                    <p class=\"text-xs uppercase tracking-wider text-[#205132] font-semibold mt-1\">Cold Milling</p>\n                    <p class=\"text-[11px] text-[#677a6d] mt-0.5\">Living capsaicin, curcumin &amp; enzymes intact.</p>\n                </div>\n\n                <div class=\"p-5 rounded-2xl bg-white border border-[#e5decb] shadow-2xs hover:border-[#205132]/30 transition-all\">\n                    <p class=\"font-serif text-3xl font-bold text-[#163923]\">0%</p>\n                    <p class=\"text-xs uppercase tracking-wider text-[#205132] font-semibold mt-1\">Sudan Dyes</p>\n                    <p class=\"text-[11px] text-[#677a6d] mt-0.5\">Strictly tested for zero carcinogenic dyes.</p>\n                </div>\n\n                <div class=\"p-5 rounded-2xl bg-white border border-[#e5decb] shadow-2xs hover:border-[#205132]/30 transition-all\">\n                    <p class=\"font-serif text-3xl font-bold text-[#163923]\">0%</p>\n                    <p class=\"text-xs uppercase tracking-wider text-[#205132] font-semibold mt-1\">Lead Chromate</p>\n                    <p class=\"text-[11px] text-[#677a6d] mt-0.5\">Zero toxic yellow colorants or sawdust fillers.</p>\n                </div>\n\n                <div class=\"p-5 rounded-2xl bg-white border border-[#e5decb] shadow-2xs hover:border-[#205132]/30 transition-all\">\n                    <p class=\"font-serif text-3xl font-bold text-[#163923]\">N&sub2; Flush</p>\n                    <p class=\"text-xs uppercase tracking-wider text-[#205132] font-semibold mt-1\">Nitrogen Sealed</p>\n                    <p class=\"text-[11px] text-[#677a6d] mt-0.5\">Hermetic seal guarding against aroma oxidation.</p>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 2: THE 5-STAGE FARM-TO-KITCHEN QUALITY PIPELINE -->\n    <section class=\"py-16 sm:py-24 bg-white border-b border-[#e5decb]/70\">\n        <div class=\"site-container\">\n            <div class=\"max-w-3xl mx-auto text-center space-y-4 mb-16\">\n                <div class=\"inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                    <span class=\"h-1.5 w-1.5 rounded-full bg-[#205132]\"></span>\n                    <span>Verification Protocol</span>\n                </div>\n                <h2 class=\"font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[#163923]\">\n                    Our 5-Stage Purity Verification Protocol\n                </h2>\n                <p class=\"text-sm sm:text-base text-[#677a6d] leading-relaxed\">\n                    How raw Indian agricultural harvests become 100% pure kitchen spices and bioavailable wellness powders.\n                </p>\n            </div>\n\n            <div class=\"grid grid-cols-1 md:grid-cols-5 gap-6\">\n                <!-- Stage 1 -->\n                <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/40 hover:shadow-sm transition-all\">\n                    <div class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] font-serif font-bold text-base border border-[#205132]/20\">\n                        01\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Direct Sourcing</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Hand-harvested at peak maturity from vetted Indian smallholders in Guntur, Byadgi, Meghalaya, and Tamil Nadu.\n                    </p>\n                </div>\n\n                <!-- Stage 2 -->\n                <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/40 hover:shadow-sm transition-all\">\n                    <div class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] font-serif font-bold text-base border border-[#205132]/20\">\n                        02\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Thermal Control (&lt;42&deg;C)</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Low-temperature vacuum drying below 42&deg;C gently extracts moisture while preserving volatile capsaicin oils and curcumin.\n                    </p>\n                </div>\n\n                <!-- Stage 3 -->\n                <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/40 hover:shadow-sm transition-all\">\n                    <div class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] font-serif font-bold text-base border border-[#205132]/20\">\n                        03\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Slow Stone-Milling</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Cold stone-ground without heat friction, preventing thermal scorch and protecting the raw culinary aroma and flavor.\n                    </p>\n                </div>\n\n                <!-- Stage 4 -->\n                <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/40 hover:shadow-sm transition-all\">\n                    <div class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] font-serif font-bold text-base border border-[#205132]/20\">\n                        04\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">NABL Lab Testing</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Rigorous screening for Sudan I&ndash;IV dyes, Lead Chromate, heavy metals, pesticide residues, and microbial safety.\n                    </p>\n                </div>\n\n                <!-- Stage 5 -->\n                <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/40 hover:shadow-sm transition-all\">\n                    <div class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] font-serif font-bold text-base border border-[#205132]/20\">\n                        05\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Nitrogen Barrier</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Nitrogen-flushed hermetic packaging locks in fresh aroma and vibrant color, preventing oxidation without preservatives.\n                    </p>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 3: COLD STONE-MILLING VS HIGH-SPEED INDUSTRIAL PULVERIZATION -->\n    <section class=\"py-16 sm:py-24 bg-[#F5EFE6] border-b border-[#e5decb]/70\">\n        <div class=\"site-container\">\n            <div class=\"max-w-3xl mx-auto text-center space-y-4 mb-16\">\n                <div class=\"inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                    <span class=\"h-1.5 w-1.5 rounded-full bg-[#205132]\"></span>\n                    <span>Processing Science</span>\n                </div>\n                <h2 class=\"font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[#163923]\">\n                    Slow Stone-Grinding vs. Industrial Pulverizing\n                </h2>\n                <p class=\"text-sm sm:text-base text-[#677a6d] leading-relaxed\">\n                    Why the temperature and method of spice milling determines true aroma, color, and nutritional bioavailability.\n                </p>\n            </div>\n\n            <div class=\"grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto\">\n                <!-- Navanidhi Standard -->\n                <div class=\"p-8 sm:p-10 rounded-3xl bg-white border-2 border-[#205132]/40 shadow-sm space-y-5\">\n                    <div class=\"flex items-center justify-between\">\n                        <span class=\"px-3.5 py-1 rounded-full bg-[#205132]/10 text-[#205132] text-xs font-bold uppercase tracking-wider border border-[#205132]/20\">\n                            Navanidhi Naturals Standard\n                        </span>\n                        <span class=\"font-serif text-2xl font-bold text-[#205132]\">&lt; 42&deg;C</span>\n                    </div>\n\n                    <h3 class=\"font-serif text-2xl font-bold text-[#163923]\">\n                        Slow Stone-Grinding &amp; Cold Dehydration\n                    </h3>\n\n                    <ul class=\"space-y-3.5 text-xs sm:text-sm text-[#163923]/90 font-medium\">\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#205132] font-bold shrink-0\">&check;</span>\n                            <span><strong>Volatile Oils Intact:</strong> Natural capsaicin, turmeric curcuminoids, and essential aromatic terpenes remain unburned.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#205132] font-bold shrink-0\">&check;</span>\n                            <span><strong>Natural Pigmentation:</strong> Authentic deep red from sun-dried chillies and brilliant gold from Lakadong turmeric without dyes.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#205132] font-bold shrink-0\">&check;</span>\n                            <span><strong>100% Whole Food Matter:</strong> Zero added starch, zero sawdust fillers, and zero maltodextrin bulking agents.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#205132] font-bold shrink-0\">&check;</span>\n                            <span><strong>Authentic Culinary Aroma:</strong> Rich traditional bouquet that elevates Indian dal, curries, sabzis, and golden milk tonics.</span>\n                        </li>\n                    </ul>\n                </div>\n\n                <!-- Conventional Industrial Milling -->\n                <div class=\"p-8 sm:p-10 rounded-3xl bg-white border border-[#FCA5A5] shadow-2xs space-y-5\">\n                    <div class=\"flex items-center justify-between\">\n                        <span class=\"px-3.5 py-1 rounded-full bg-[#FEF2F2] text-[#991B1B] text-xs font-bold uppercase tracking-wider border border-[#FCA5A5]\">\n                            Commercial Industrial Practice\n                        </span>\n                        <span class=\"font-serif text-2xl font-bold text-[#991B1B]\">&gt; 120&deg;C</span>\n                    </div>\n\n                    <h3 class=\"font-serif text-2xl font-bold text-[#163923]\">\n                        High-Speed Pulverizing &amp; Spray Drying\n                    </h3>\n\n                    <ul class=\"space-y-3.5 text-xs sm:text-sm text-[#163923]/90 font-medium\">\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#991B1B] font-bold shrink-0\">&times;</span>\n                            <span><strong>Thermal Oil Destruction:</strong> High-speed friction scorches volatile oils, destroying natural pungency, aroma, and delicate antioxidants.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#991B1B] font-bold shrink-0\">&times;</span>\n                            <span><strong>Dye Contamination:</strong> Chemical colorants (Sudan dyes, lead chromate) added to disguise scorched, brown, or stale spice matter.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#991B1B] font-bold shrink-0\">&times;</span>\n                            <span><strong>Heavy Bulking Fillers:</strong> Up to 30&ndash;50% cheap sawdust, spent spice powder, rice starch, or chalk to inflate profit margins.</span>\n                        </li>\n                        <li class=\"flex items-start gap-2.5\">\n                            <span class=\"text-[#991B1B] font-bold shrink-0\">&times;</span>\n                            <span><strong>Bitter Scorched Taste:</strong> Lacks depth and leaves a harsh, acrid chemical aftertaste on the palate.</span>\n                        </li>\n                    </ul>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 4: LABORATORY TESTING PROTOCOLS -->\n    <section class=\"py-16 sm:py-24 bg-white border-b border-[#e5decb]/70\">\n        <div class=\"site-container\">\n            <div class=\"max-w-3xl mx-auto text-center space-y-4 mb-16\">\n                <div class=\"inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                    <span class=\"h-1.5 w-1.5 rounded-full bg-[#205132]\"></span>\n                    <span>Analytical Rigor</span>\n                </div>\n                <h2 class=\"font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[#163923]\">\n                    Independent NABL Laboratory Verification\n                </h2>\n                <p class=\"text-sm sm:text-base text-[#677a6d] leading-relaxed\">\n                    Every batch produced by MAN Agro Foods is analyzed by accredited third-party laboratories against strict safety thresholds.\n                </p>\n            </div>\n\n            <div class=\"grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6\">\n                <!-- Test 1 -->\n                <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/30 transition-all\">\n                    <div class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132]\">\n                        <svg class=\"w-6 h-6\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M10 2v7.31L4.41 18.5A2 2 0 0 0 6 22h12a2 2 0 0 0 1.59-3.5L14 9.31V2\"/><path d=\"M8.5 2h7\"/><path d=\"M14 9.3a6.5 6.5 0 1 1-4 0\"/></svg>\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Sudan Dye &amp; Color Screen</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        LC-MS/MS tested for absolute absence of Sudan I, II, III, IV, Para Red, and Metanil Yellow dyes to guarantee zero carcinogenic additives.\n                    </p>\n                </div>\n\n                <!-- Test 2 -->\n                <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/30 transition-all\">\n                    <div class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132]\">\n                        <svg class=\"w-6 h-6\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z\"/><path d=\"m9 12 2 2 4-4\"/></svg>\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Heavy Metals &amp; Lead Screen</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        ICP-MS tested for Lead (&lt;0.5 ppm), Arsenic (&lt;0.5 ppm), Cadmium (&lt;0.3 ppm), and Mercury (&lt;0.1 ppm), with zero Lead Chromate.\n                    </p>\n                </div>\n\n                <!-- Test 3 -->\n                <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/30 transition-all\">\n                    <div class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132]\">\n                        <svg class=\"w-6 h-6\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><circle cx=\"12\" cy=\"12\" r=\"10\"/><path d=\"m4.93 4.93 4.24 4.24\"/><path d=\"m14.83 9.17 4.24-4.24\"/><path d=\"m14.83 14.83 4.24 4.24\"/><path d=\"m9.17 14.83-4.24 4.24\"/><circle cx=\"12\" cy=\"12\" r=\"4\"/></svg>\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Microbiological Safety</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Screened for Total Plate Count, Yeast &amp; Mold, E. Coli, Salmonella, and aflatoxins to guarantee pharmaceutical clean-room hygiene.\n                    </p>\n                </div>\n\n                <!-- Test 4 -->\n                <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/30 transition-all\">\n                    <div class=\"flex h-12 w-12 items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132]\">\n                        <svg class=\"w-6 h-6\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M3 3v18h18\"/><path d=\"m19 9-5 5-4-4-3 3\"/></svg>\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Phytochemical Potency</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        HPLC quantification of active biomarkers: Curcumin in Lakadong Turmeric (&ge;7.5%), Capsaicin in Red Chilli, and Chlorophyll in Moringa.\n                    </p>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 5: THE ZERO-TOLERANCE ADULTERATION BLACKLIST -->\n    <section class=\"py-16 sm:py-24 bg-[#F5EFE6] border-b border-[#e5decb]/70\">\n        <div class=\"site-container\">\n            <div class=\"max-w-3xl mx-auto text-center space-y-4 mb-16\">\n                <div class=\"inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                    <span class=\"h-1.5 w-1.5 rounded-full bg-[#205132]\"></span>\n                    <span>Zero Adulteration</span>\n                </div>\n                <h2 class=\"font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[#163923]\">\n                    Our Zero-Tolerance Blacklist\n                </h2>\n                <p class=\"text-sm sm:text-base text-[#677a6d] leading-relaxed\">\n                    We maintain an unconditional ban on every industrial adulterant, synthetic dye, and chemical bulking agent.\n                </p>\n            </div>\n\n            <div class=\"grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto\">\n                <div class=\"p-6 rounded-3xl bg-white border border-[#FCA5A5] space-y-2 hover:shadow-xs transition-all\">\n                    <span class=\"text-xs font-bold uppercase tracking-wider text-[#991B1B]\">Banned Adulterant 01</span>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Sudan Dyes (I&ndash;IV) &amp; Para Red</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Carcinogenic industrial azo dyes banned globally, yet frequently detected in unregulated commercial red chilli powders.\n                    </p>\n                </div>\n\n                <div class=\"p-6 rounded-3xl bg-white border border-[#FCA5A5] space-y-2 hover:shadow-xs transition-all\">\n                    <span class=\"text-xs font-bold uppercase tracking-wider text-[#991B1B]\">Banned Adulterant 02</span>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Lead Chromate &amp; Metanil Yellow</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Toxic industrial chemical compounds used by unscrupulous vendors to artificially brighten dull or expired turmeric roots.\n                    </p>\n                </div>\n\n                <div class=\"p-6 rounded-3xl bg-white border border-[#FCA5A5] space-y-2 hover:shadow-xs transition-all\">\n                    <span class=\"text-xs font-bold uppercase tracking-wider text-[#991B1B]\">Banned Adulterant 03</span>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Sawdust, Chalk &amp; Starch Fillers</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Cheap bulking agents used to artificially add volume and weight to powdered spices and botanical superfoods.\n                    </p>\n                </div>\n\n                <div class=\"p-6 rounded-3xl bg-white border border-[#FCA5A5] space-y-2 hover:shadow-xs transition-all\">\n                    <span class=\"text-xs font-bold uppercase tracking-wider text-[#991B1B]\">Banned Adulterant 04</span>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Silicon Dioxide &amp; Chemical Flow Agents</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Synthetic silica and chemical anti-caking agents used in mass factories to force humid powder flow through machines.\n                    </p>\n                </div>\n\n                <div class=\"p-6 rounded-3xl bg-white border border-[#FCA5A5] space-y-2 hover:shadow-xs transition-all\">\n                    <span class=\"text-xs font-bold uppercase tracking-wider text-[#991B1B]\">Banned Adulterant 05</span>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Synthetic Flavors &amp; Aromas</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        \"Nature-identical\" flavor chemicals, solvent residues, or fragrance enhancers used to cover low-grade scorched harvests.\n                    </p>\n                </div>\n\n                <div class=\"p-6 rounded-3xl bg-white border border-[#FCA5A5] space-y-2 hover:shadow-xs transition-all\">\n                    <span class=\"text-xs font-bold uppercase tracking-wider text-[#991B1B]\">Banned Adulterant 06</span>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Chemical Preservatives &amp; Sulfites</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Sodium benzoate, sulfur dioxide, and synthetic stabilizers. We preserve harvest freshness through hermetic nitrogen sealing alone.\n                    </p>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 6: PACKAGING AS A FRESHNESS SHIELD -->\n    <section class=\"py-16 sm:py-24 bg-white border-b border-[#e5decb]/70\">\n        <div class=\"site-container\">\n            <div class=\"grid grid-cols-1 lg:grid-cols-12 gap-12 items-center\">\n                <div class=\"lg:col-span-5 space-y-6\">\n                    <div class=\"inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                        <span class=\"h-1.5 w-1.5 rounded-full bg-[#205132]\"></span>\n                        <span>Packaging Engineering</span>\n                    </div>\n                    <h2 class=\"font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#163923] leading-tight\">\n                        Packaging Engineered as a Freshness Shield\n                    </h2>\n                    <p class=\"text-sm sm:text-base text-[#677a6d] leading-relaxed\">\n                        Freshly stone-ground spices and botanicals lose their vibrant volatile oils if exposed to air and light. MAN Agro Foods packs every harvest into hermetically sealed, nitrogen-flushed containers.\n                    </p>\n                    <div class=\"flex items-center gap-4 text-xs font-semibold uppercase tracking-wider text-[#205132]\">\n                        <span class=\"flex items-center gap-1.5\">\n                            <svg class=\"w-4 h-4 text-[#205132]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z\"/><path d=\"m9 12 2 2 4-4\"/></svg>\n                            Nitrogen Flushed\n                        </span>\n                        <span class=\"text-[#e5decb]\">&bull;</span>\n                        <span class=\"flex items-center gap-1.5\">\n                            <svg class=\"w-4 h-4 text-[#205132]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><circle cx=\"12\" cy=\"12\" r=\"4\"/><path d=\"M12 2v2\"/><path d=\"M12 20v2\"/><path d=\"m4.93 4.93 1.41 1.41\"/><path d=\"m17.66 17.66 1.41 1.41\"/><path d=\"M2 12h2\"/><path d=\"M20 12h2\"/><path d=\"m6.34 17.66-1.41 1.41\"/><path d=\"m19.07 4.93-1.41 1.41\"/></svg>\n                            Light Protected\n                        </span>\n                    </div>\n                </div>\n\n                <div class=\"lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6\">\n                    <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/30 transition-all\">\n                        <div class=\"flex h-10 w-10 items-center justify-center rounded-xl bg-[#205132]/10 text-[#205132]\">\n                            <svg class=\"w-5 h-5\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z\"/></svg>\n                        </div>\n                        <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Oxygen Displacement</h4>\n                        <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                            Food-grade inert nitrogen flush displaces atmospheric oxygen, preventing aroma loss, lipid oxidation, and color fading.\n                        </p>\n                    </div>\n\n                    <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/30 transition-all\">\n                        <div class=\"flex h-10 w-10 items-center justify-center rounded-xl bg-[#205132]/10 text-[#205132]\">\n                            <svg class=\"w-5 h-5\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><rect width=\"18\" height=\"18\" x=\"3\" y=\"3\" rx=\"2\"/><path d=\"m9 12 2 2 4-4\"/></svg>\n                        </div>\n                        <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Induction Hermetic Seal</h4>\n                        <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                            A tamper-evident foil induction seal locks out ambient Indian humidity without needing synthetic desiccant packs inside the food.\n                        </p>\n                    </div>\n\n                    <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/30 transition-all\">\n                        <div class=\"flex h-10 w-10 items-center justify-center rounded-xl bg-[#205132]/10 text-[#205132]\">\n                            <svg class=\"w-5 h-5\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><circle cx=\"12\" cy=\"12\" r=\"4\"/><path d=\"M12 2v2\"/><path d=\"M12 20v2\"/><path d=\"M2 12h2\"/><path d=\"M20 12h2\"/></svg>\n                        </div>\n                        <h4 class=\"font-serif text-lg font-bold text-[#163923]\">UV Photodegradation Barrier</h4>\n                        <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                            UV-resistant jar walls prevent light exposure from degrading delicate curcuminoids, chlorophyll, and fiery capsaicin.\n                        </p>\n                    </div>\n\n                    <div class=\"p-6 rounded-3xl bg-[#FAF8F5] border border-[#e5decb] space-y-3 hover:border-[#205132]/30 transition-all\">\n                        <div class=\"flex h-10 w-10 items-center justify-center rounded-xl bg-[#205132]/10 text-[#205132]\">\n                            <svg class=\"w-5 h-5\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8\"/><path d=\"M3 3v5h5\"/><path d=\"M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16\"/><path d=\"M16 21h5v-5\"/></svg>\n                        </div>\n                        <h4 class=\"font-serif text-lg font-bold text-[#163923]\">100% Food-Grade Recyclable</h4>\n                        <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                            BPA-free food-safe packaging designed for reusable kitchen storage and easy eco-conscious recycling.\n                        </p>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 7: CERTIFICATIONS & COMPLIANCE -->\n    <section class=\"py-16 sm:py-24 bg-[#F5EFE6] border-b border-[#e5decb]/70\">\n        <div class=\"site-container\">\n            <div class=\"max-w-3xl mx-auto text-center space-y-4 mb-16\">\n                <div class=\"inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#205132]\">\n                    <span class=\"h-1.5 w-1.5 rounded-full bg-[#205132]\"></span>\n                    <span>Compliance &amp; Certifications</span>\n                </div>\n                <h2 class=\"font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[#163923]\">\n                    Certified Purity You Can Verify\n                </h2>\n                <p class=\"text-sm sm:text-base text-[#677a6d] leading-relaxed\">\n                    Upholding the highest national food safety standards under the auspices of MAN Agro Foods.\n                </p>\n            </div>\n\n            <div class=\"grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6\">\n                <div class=\"p-6 rounded-3xl bg-white border border-[#e5decb] text-center space-y-3 shadow-2xs hover:border-[#205132]/40 transition-all\">\n                    <div class=\"flex h-14 w-14 mx-auto items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] border border-[#205132]/20\">\n                        <svg class=\"w-7 h-7\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z\"/><path d=\"m9 12 2 2 4-4\"/></svg>\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">FSSAI Central License</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Licensed under Food Safety and Standards Authority of India, Lic. No. 10020042001234.\n                    </p>\n                </div>\n\n                <div class=\"p-6 rounded-3xl bg-white border border-[#e5decb] text-center space-y-3 shadow-2xs hover:border-[#205132]/40 transition-all\">\n                    <div class=\"flex h-14 w-14 mx-auto items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] border border-[#205132]/20\">\n                        <svg class=\"w-7 h-7\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z\"/><path d=\"M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12\"/></svg>\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">100% Pure Food Matter</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Strictly vegetarian, zero animal derivatives, dairy-free, and unadulterated whole plants.\n                    </p>\n                </div>\n\n                <div class=\"p-6 rounded-3xl bg-white border border-[#e5decb] text-center space-y-3 shadow-2xs hover:border-[#205132]/40 transition-all\">\n                    <div class=\"flex h-14 w-14 mx-auto items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] border border-[#205132]/20\">\n                        <svg class=\"w-7 h-7\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><circle cx=\"12\" cy=\"12\" r=\"10\"/><path d=\"M8 14s1.5 2 4 2 4-2 4-2\"/><line x1=\"9\" x2=\"9.01\" y1=\"9\" y2=\"9\"/><line x1=\"15\" x2=\"15.01\" y1=\"9\" y2=\"9\"/></svg>\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Non-GMO Verified</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Traceable heirloom seed varieties free from genetic modification or radiation.\n                    </p>\n                </div>\n\n                <div class=\"p-6 rounded-3xl bg-white border border-[#e5decb] text-center space-y-3 shadow-2xs hover:border-[#205132]/40 transition-all\">\n                    <div class=\"flex h-14 w-14 mx-auto items-center justify-center rounded-2xl bg-[#205132]/10 text-[#205132] border border-[#205132]/20\">\n                        <svg class=\"w-7 h-7\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\"><path d=\"M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z\"/></svg>\n                    </div>\n                    <h4 class=\"font-serif text-lg font-bold text-[#163923]\">Zero Preservatives</h4>\n                    <p class=\"text-xs text-[#677a6d] leading-relaxed\">\n                        Guaranteed zero synthetic shelf-life extenders, sulfur dioxide, or anti-caking silica.\n                    </p>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <!-- SECTION 8: CALL TO ACTION -->\n    <section class=\"py-20 lg:py-24 bg-[#163923] text-white text-center relative overflow-hidden border-t border-[#e5decb]/20\">\n        <div class=\"absolute inset-0 bg-gradient-to-br from-[#205132]/40 via-transparent to-[#c9a25a]/20 pointer-events-none\"></div>\n        <div class=\"site-container relative z-10 max-w-3xl mx-auto space-y-6\">\n            <span class=\"inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-[10px] font-bold tracking-[0.2em] uppercase bg-white/10 text-[#FAF8F5] border border-white/15\">\n                <svg class=\"w-3.5 h-3.5 text-[#c9a25a]\" viewBox=\"0 0 24 24\" fill=\"currentColor\"><path d=\"M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z\"/></svg>\n                Uncompromising Purity\n            </span>\n\n            <h2 class=\"font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight leading-tight\">\n                Authentic Indian Spices. <br class=\"hidden sm:inline\">\n                <span class=\"text-[#c9a25a]\">Zero Chemical Shortcuts.</span>\n            </h2>\n\n            <p class=\"text-sm sm:text-base text-[#FAF8F5]/80 max-w-xl mx-auto leading-relaxed\">\n                Experience the rich culinary fragrance and deep vitality of unadulterated red chilli powder, Lakadong turmeric, and cold-dried botanicals.\n            </p>\n\n            <div class=\"flex flex-col sm:flex-row items-center justify-center gap-4 pt-4\">\n                <a\n                    href=\"{{ url(\'/spices\') }}\"\n                    class=\"px-8 py-4 bg-gradient-to-r from-[#c9a25a] to-[#b08a43] text-white text-xs font-bold tracking-[0.15em] uppercase rounded-full hover:from-[#d6b677] hover:to-[#c9a25a] hover:shadow-lg hover:shadow-[#c9a25a]/30 transition-all duration-300\"\n                >\n                    Explore Spices &rarr;\n                </a>\n                <a\n                    href=\"{{ route(\'shop.cms.page\', \'about-us\') }}\"\n                    class=\"px-8 py-4 bg-transparent text-[#FAF8F5] text-xs font-bold tracking-[0.15em] uppercase rounded-full border border-[#FAF8F5]/30 hover:border-white hover:text-white hover:bg-white/10 transition-all duration-300\"\n                >\n                    Our Origin Story\n                </a>\n            </div>\n        </div>\n    </section>\n</div>\n','Quality Standard & Lab Verification | 5-Stage Purity Code | Navanidhi Naturals','Explore our scientific quality standard: stone-milling, low-temperature vacuum dehydration, Sudan dye screening, and zero-tolerance chemical blacklist.','quality standard, Sudan dye testing, lead chromate screening, heavy metal testing, pesticide screening, stone milled spices, Navanidhi Naturals, MAN Agro Foods','en',11),(36,'Recipes & Rituals','recipes','<div class=\"site-container py-12 max-w-4xl mx-auto space-y-8\">\n    <header class=\"text-center space-y-3\">\n        <span class=\"inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold tracking-widest uppercase text-[#0D5C3A] bg-[#0D5C3A]/10 border border-[#0D5C3A]/20\">\n            Culinary &amp; Botanical Guidance\n        </span>\n        <h1 class=\"font-serif text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#062E1A]\">\n            Recipes &amp; Daily Rituals\n        </h1>\n        <p class=\"text-sm sm:text-base text-[#4B5563] max-w-xl mx-auto\">\n            Discover nourishing preparations using stone-milled farm spices and cold-dehydrated whole botanicals.\n        </p>\n    </header>\n\n    <div class=\"grid grid-cols-1 md:grid-cols-2 gap-6 pt-6\">\n        <div class=\"p-6 rounded-3xl bg-white border border-[#0D5C3A]/15 shadow-sm space-y-3\">\n            <span class=\"text-xs font-bold uppercase tracking-wider text-[#c9a25a]\">Golden Evening Ritual</span>\n            <h3 class=\"font-serif text-xl font-bold text-[#062E1A]\">Traditional Haldi Doodh (Golden Milk)</h3>\n            <p class=\"text-xs text-[#4B5563] leading-relaxed\">\n                Whisk 1/2 tsp of Navanidhi Lakadong Turmeric into 250ml of warm milk with a pinch of crushed black pepper and honey. The natural black pepper piperine increases curcumin bioavailability by up to 2000%.\n            </p>\n        </div>\n\n        <div class=\"p-6 rounded-3xl bg-white border border-[#0D5C3A]/15 shadow-sm space-y-3\">\n            <span class=\"text-xs font-bold uppercase tracking-wider text-[#991B1B]\">Pure Culinary Tempering</span>\n            <h3 class=\"font-serif text-xl font-bold text-[#062E1A]\">Authentic Guntur Dal Tadka</h3>\n            <p class=\"text-xs text-[#4B5563] leading-relaxed\">\n                Heat cold-pressed ghee or mustard oil, add mustard seeds and curry leaves, and gently bloom 1/2 tsp Navanidhi Pure Red Chilli Powder for 10 seconds before pouring over simmered yellow lentils.\n            </p>\n        </div>\n    </div>\n</div>','Recipes & Daily Rituals | Pure Spices & Functional Nutrition | Navanidhi Naturals','Explore chef-crafted Indian culinary preparations, golden turmeric tonics, and nutrient-dense smoothies powered by Navanidhi Naturals pure spices and botanicals.','recipes, Haldi Doodh, turmeric latte recipe, pure red chilli tadka, moringa green smoothie, functional nutrition, Navanidhi Naturals','en',12),(37,'Frequently Asked Questions','faq','<h1>Frequently Asked Questions</h1><p>Find answers regarding Navanidhi Naturals botanical powders, cold dehydration, pan-India dispatch, and ritual usage.</p>','Frequently Asked Questions | Navanidhi Naturals Pure Botanical Nutrition','Comprehensive answers on Navanidhi Naturals cold-dehydrated single-origin botanical powders, batch lab verification, pan-India express dispatch, and dosage rituals.','navanidhi naturals faq, botanical powders faq, cold dehydration questions, pan-india shipping faq, amla moringa dosage, batch lab test coa','en',14);
/*!40000 ALTER TABLE `cms_page_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_pages`
--

DROP TABLE IF EXISTS `cms_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cms_pages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `layout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_pages`
--

LOCK TABLES `cms_pages` WRITE;
/*!40000 ALTER TABLE `cms_pages` DISABLE KEYS */;
INSERT INTO `cms_pages` VALUES (1,NULL,'2026-09-26 07:09:57','2026-09-26 07:09:57'),(2,NULL,'2026-09-26 07:09:57','2026-09-26 07:09:57'),(3,NULL,'2026-09-26 07:09:57','2026-09-26 07:09:57'),(4,NULL,'2026-09-26 07:09:57','2026-09-26 07:09:57'),(5,NULL,'2026-09-26 07:09:57','2026-09-26 07:09:57'),(6,NULL,'2026-09-26 07:09:57','2026-09-26 07:09:57'),(7,NULL,'2026-09-26 07:09:57','2026-09-26 07:09:57'),(8,NULL,'2026-09-26 07:09:57','2026-09-26 07:09:57'),(9,NULL,'2026-09-26 07:09:57','2026-09-26 07:09:57'),(10,NULL,'2026-09-26 07:09:57','2026-09-26 07:09:57'),(11,NULL,'2026-09-26 07:09:57','2026-09-26 07:09:57'),(12,NULL,'2026-09-26 07:09:57','2026-09-26 07:09:57'),(14,NULL,'2026-09-21 22:17:40','2026-09-21 22:17:40');
/*!40000 ALTER TABLE `cms_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compare_items`
--

DROP TABLE IF EXISTS `compare_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compare_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `customer_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compare_items_product_id_foreign` (`product_id`),
  KEY `compare_items_customer_id_foreign` (`customer_id`),
  CONSTRAINT `compare_items_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `compare_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compare_items`
--

LOCK TABLES `compare_items` WRITE;
/*!40000 ALTER TABLE `compare_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `compare_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_enquiries`
--

DROP TABLE IF EXISTS `contact_enquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_enquiries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `internal_notes` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_enquiries`
--

LOCK TABLES `contact_enquiries` WRITE;
/*!40000 ALTER TABLE `contact_enquiries` DISABLE KEYS */;
INSERT INTO `contact_enquiries` VALUES (1,'Dr. Arvind Sharma','arvind.sharma@ayurwellness.in','+91 98450 12345',NULL,'We are interested in bulk procurement of Organic Moringa and Lakadong Turmeric powders for our clinical wellness center in Bengaluru. Please share bulk wholesale pricing and NABL batch COA certificates.','new','Assigned to Wholesale B2B Team. Dr. Sharma requested NABL COA batch certificates and price tier for 25kg+ orders. Shared with plant QA lab.','127.0.0.1','2026-09-22 07:44:37','2026-09-22 07:52:47');
/*!40000 ALTER TABLE `contact_enquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_config`
--

DROP TABLE IF EXISTS `core_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_config` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=641 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_config`
--

LOCK TABLES `core_config` WRITE;
/*!40000 ALTER TABLE `core_config` DISABLE KEYS */;
INSERT INTO `core_config` VALUES (1,'sales.checkout.shopping_cart.allow_guest_checkout','1',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(2,'emails.general.notifications.emails.general.notifications.registration','1',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(3,'emails.general.notifications.emails.general.notifications.customer_registration_confirmation_mail_to_admin','0',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(4,'emails.general.notifications.emails.general.notifications.customer_account_credentials','1',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(5,'emails.general.notifications.emails.general.notifications.new_order','1',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(6,'emails.general.notifications.emails.general.notifications.new_order_mail_to_admin','1',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(7,'emails.general.notifications.emails.general.notifications.new_invoice','1',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(8,'emails.general.notifications.emails.general.notifications.new_invoice_mail_to_admin','0',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(9,'emails.general.notifications.emails.general.notifications.new_refund','1',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(10,'emails.general.notifications.emails.general.notifications.new_refund_mail_to_admin','0',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(11,'emails.general.notifications.emails.general.notifications.new_shipment','1',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(12,'emails.general.notifications.emails.general.notifications.new_shipment_mail_to_admin','0',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(13,'emails.general.notifications.emails.general.notifications.new_inventory_source','1',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(14,'emails.general.notifications.emails.general.notifications.cancel_order','1',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(15,'emails.general.notifications.emails.general.notifications.cancel_order_mail_to_admin','0',NULL,NULL,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(16,'general.design.categories.category_view','custom',NULL,NULL,'2026-09-26 06:56:45','2026-09-26 06:56:45'),(104,'customer.settings.social_login.enable_facebook','0','default',NULL,'2026-09-21 17:34:00','2026-09-27 11:37:26'),(105,'customer.settings.social_login.enable_twitter','0','default',NULL,'2026-09-21 17:34:00','2026-09-27 11:37:26'),(106,'customer.settings.social_login.enable_google','0','default',NULL,'2026-09-21 17:34:00','2026-09-27 11:37:26'),(107,'customer.settings.social_login.enable_linkedin','0','default',NULL,'2026-09-21 17:34:00','2026-09-27 11:37:26'),(108,'customer.settings.social_login.enable_github','0','default',NULL,'2026-09-21 17:34:00','2026-09-27 11:37:26'),(109,'general.design.admin_logo.logo_image','channel/1/logo.svg',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(110,'general.design.admin_logo.favicon','channel/1/favicon.svg',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(111,'general.content.header_offer.title','FREE SHIPPING ON ORDERS OVER ₹499 • 100% PURE FARM SPICES & BOTANICALS • MAN AGRO FOODS',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(112,'general.content.header_offer.redirection_title','SHOP NOW',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(113,'general.content.header_offer.redirection_link','/products',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(114,'general.content.footer.copyright_content','Copyright &copy; 2026 Navanidhi Naturals (A brand of MAN Agro Foods) — All rights reserved.',NULL,'en','2026-09-26 07:13:11','2026-09-26 07:13:11'),(115,'emails.configure.email_settings.sender_name','Navanidhi Naturals','default',NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(116,'emails.configure.email_settings.sender_email','care@navanidhinaturals.com','default',NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(117,'emails.configure.email_settings.admin_name','Navanidhi Care Team','default',NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(118,'emails.configure.email_settings.admin_email','care@navanidhinaturals.com','default',NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(119,'emails.configure.email_settings.contact_name','Navanidhi Naturals Support','default',NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(120,'emails.configure.email_settings.contact_email','care@navanidhinaturals.com','default',NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(121,'sales.shipping.origin.address','Plot 42, Road No. 36, Jubilee Hills','default','en','2026-09-26 07:13:11','2026-09-26 07:13:11'),(122,'sales.shipping.origin.address1','Plot 42, Road No. 36, Jubilee Hills',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(123,'sales.shipping.origin.city','Hyderabad','default','en','2026-09-26 07:13:11','2026-09-26 07:13:11'),(124,'sales.shipping.origin.city','Hyderabad',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(125,'sales.shipping.origin.state','Telangana','default','en','2026-09-26 07:13:11','2026-09-26 07:13:11'),(126,'sales.shipping.origin.state','Telangana',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(127,'sales.shipping.origin.zipcode','500033','default','en','2026-09-26 07:13:11','2026-09-26 07:13:11'),(128,'sales.shipping.origin.zipcode','500033',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(129,'sales.shipping.origin.country','IN','default','en','2026-09-26 07:13:11','2026-09-26 07:13:11'),(130,'sales.shipping.origin.country','IN',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(131,'sales.carriers.flatrate.title','Standard Eco Delivery (₹60 Flat Rate)','default','en','2026-09-26 07:13:11','2026-09-26 07:13:11'),(132,'sales.carriers.flatrate.description','Reliable surface delivery across India (3-5 business days).','default','en','2026-09-26 07:13:11','2026-09-26 07:13:11'),(133,'sales.carriers.free.title','Complimentary Express Delivery (Orders > ₹499)','default','en','2026-09-26 07:13:11','2026-09-26 07:13:11'),(134,'sales.carriers.free.description','Free priority dispatch for all orders of ₹499 and above.','default','en','2026-09-26 07:13:11','2026-09-26 07:13:11'),(135,'general.general.locale_options.weight_unit','grams','default',NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(136,'catalog.products.settings.compare_option','1',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(137,'customer.settings.wishlist.wishlist_option','1',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(138,'general.general.breadcrumbs.shop','1',NULL,NULL,'2026-09-26 07:13:11','2026-09-26 07:13:11'),(139,'general.design.categories.custom_menu_items','[{\"type\":\"custom\",\"id\":\"custom_home\",\"title\":\"Home\",\"url\":\"http:\\/\\/managro.test\"},{\"type\":\"custom\",\"id\":\"custom_products\",\"title\":\"Products\",\"url\":\"http:\\/\\/managro.test\\/products\"},{\"type\":\"cms\",\"id\":\"about-us\",\"title\":\"Our Story\"},{\"type\":\"cms\",\"id\":\"quality\",\"title\":\"Quality\"},{\"type\":\"custom\",\"id\":\"custom_recipes\",\"title\":\"Recipes\",\"url\":\"http:\\/\\/managro.test\\/recipes\"},{\"type\":\"custom\",\"id\":\"custom_contact\",\"title\":\"Contact\",\"url\":\"http:\\/\\/managro.test\\/contact-us\"}]','default',NULL,'2026-09-26 06:56:45','2026-09-26 20:01:50'),(140,'general.design.categories.category_view','custom','default',NULL,'2026-09-26 06:56:45','2026-09-26 06:56:45'),(141,'general.design.categories.custom_menu_items','[{\"type\":\"custom\",\"id\":\"custom_home\",\"title\":\"Home\",\"url\":\"http:\\/\\/managro.test\"},{\"type\":\"custom\",\"id\":\"custom_products\",\"title\":\"Products\",\"url\":\"http:\\/\\/managro.test\\/products\"},{\"type\":\"cms\",\"id\":\"about-us\",\"title\":\"Our Story\"},{\"type\":\"cms\",\"id\":\"quality\",\"title\":\"Quality\"},{\"type\":\"custom\",\"id\":\"custom_recipes\",\"title\":\"Recipes\",\"url\":\"http:\\/\\/managro.test\\/recipes\"},{\"type\":\"custom\",\"id\":\"custom_contact\",\"title\":\"Contact\",\"url\":\"http:\\/\\/managro.test\\/contact-us\"}]',NULL,NULL,'2026-09-26 06:56:45','2026-09-26 20:01:50');
/*!40000 ALTER TABLE `core_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'AF','Afghanistan'),(2,'AX','Åland Islands'),(3,'AL','Albania'),(4,'DZ','Algeria'),(5,'AS','American Samoa'),(6,'AD','Andorra'),(7,'AO','Angola'),(8,'AI','Anguilla'),(9,'AQ','Antarctica'),(10,'AG','Antigua & Barbuda'),(11,'AR','Argentina'),(12,'AM','Armenia'),(13,'AW','Aruba'),(14,'AC','Ascension Island'),(15,'AU','Australia'),(16,'AT','Austria'),(17,'AZ','Azerbaijan'),(18,'BS','Bahamas'),(19,'BH','Bahrain'),(20,'BD','Bangladesh'),(21,'BB','Barbados'),(22,'BY','Belarus'),(23,'BE','Belgium'),(24,'BZ','Belize'),(25,'BJ','Benin'),(26,'BM','Bermuda'),(27,'BT','Bhutan'),(28,'BO','Bolivia'),(29,'BA','Bosnia & Herzegovina'),(30,'BW','Botswana'),(31,'BR','Brazil'),(32,'IO','British Indian Ocean Territory'),(33,'VG','British Virgin Islands'),(34,'BN','Brunei'),(35,'BG','Bulgaria'),(36,'BF','Burkina Faso'),(37,'BI','Burundi'),(38,'KH','Cambodia'),(39,'CM','Cameroon'),(40,'CA','Canada'),(41,'IC','Canary Islands'),(42,'CV','Cape Verde'),(43,'BQ','Caribbean Netherlands'),(44,'KY','Cayman Islands'),(45,'CF','Central African Republic'),(46,'EA','Ceuta & Melilla'),(47,'TD','Chad'),(48,'CL','Chile'),(49,'CN','China'),(50,'CX','Christmas Island'),(51,'CC','Cocos (Keeling) Islands'),(52,'CO','Colombia'),(53,'KM','Comoros'),(54,'CG','Congo - Brazzaville'),(55,'CD','Congo - Kinshasa'),(56,'CK','Cook Islands'),(57,'CR','Costa Rica'),(58,'CI','Côte d’Ivoire'),(59,'HR','Croatia'),(60,'CU','Cuba'),(61,'CW','Curaçao'),(62,'CY','Cyprus'),(63,'CZ','Czechia'),(64,'DK','Denmark'),(65,'DG','Diego Garcia'),(66,'DJ','Djibouti'),(67,'DM','Dominica'),(68,'DO','Dominican Republic'),(69,'EC','Ecuador'),(70,'EG','Egypt'),(71,'SV','El Salvador'),(72,'GQ','Equatorial Guinea'),(73,'ER','Eritrea'),(74,'EE','Estonia'),(75,'ET','Ethiopia'),(76,'EZ','Eurozone'),(77,'FK','Falkland Islands'),(78,'FO','Faroe Islands'),(79,'FJ','Fiji'),(80,'FI','Finland'),(81,'FR','France'),(82,'GF','French Guiana'),(83,'PF','French Polynesia'),(84,'TF','French Southern Territories'),(85,'GA','Gabon'),(86,'GM','Gambia'),(87,'GE','Georgia'),(88,'DE','Germany'),(89,'GH','Ghana'),(90,'GI','Gibraltar'),(91,'GR','Greece'),(92,'GL','Greenland'),(93,'GD','Grenada'),(94,'GP','Guadeloupe'),(95,'GU','Guam'),(96,'GT','Guatemala'),(97,'GG','Guernsey'),(98,'GN','Guinea'),(99,'GW','Guinea-Bissau'),(100,'GY','Guyana'),(101,'HT','Haiti'),(102,'HN','Honduras'),(103,'HK','Hong Kong SAR China'),(104,'HU','Hungary'),(105,'IS','Iceland'),(106,'IN','India'),(107,'ID','Indonesia'),(108,'IR','Iran'),(109,'IQ','Iraq'),(110,'IE','Ireland'),(111,'IM','Isle of Man'),(112,'IL','Israel'),(113,'IT','Italy'),(114,'JM','Jamaica'),(115,'JP','Japan'),(116,'JE','Jersey'),(117,'JO','Jordan'),(118,'KZ','Kazakhstan'),(119,'KE','Kenya'),(120,'KI','Kiribati'),(121,'XK','Kosovo'),(122,'KW','Kuwait'),(123,'KG','Kyrgyzstan'),(124,'LA','Laos'),(125,'LV','Latvia'),(126,'LB','Lebanon'),(127,'LS','Lesotho'),(128,'LR','Liberia'),(129,'LY','Libya'),(130,'LI','Liechtenstein'),(131,'LT','Lithuania'),(132,'LU','Luxembourg'),(133,'MO','Macau SAR China'),(134,'MK','Macedonia'),(135,'MG','Madagascar'),(136,'MW','Malawi'),(137,'MY','Malaysia'),(138,'MV','Maldives'),(139,'ML','Mali'),(140,'MT','Malta'),(141,'MH','Marshall Islands'),(142,'MQ','Martinique'),(143,'MR','Mauritania'),(144,'MU','Mauritius'),(145,'YT','Mayotte'),(146,'MX','Mexico'),(147,'FM','Micronesia'),(148,'MD','Moldova'),(149,'MC','Monaco'),(150,'MN','Mongolia'),(151,'ME','Montenegro'),(152,'MS','Montserrat'),(153,'MA','Morocco'),(154,'MZ','Mozambique'),(155,'MM','Myanmar (Burma)'),(156,'NA','Namibia'),(157,'NR','Nauru'),(158,'NP','Nepal'),(159,'NL','Netherlands'),(160,'NC','New Caledonia'),(161,'NZ','New Zealand'),(162,'NI','Nicaragua'),(163,'NE','Niger'),(164,'NG','Nigeria'),(165,'NU','Niue'),(166,'NF','Norfolk Island'),(167,'KP','North Korea'),(168,'MP','Northern Mariana Islands'),(169,'NO','Norway'),(170,'OM','Oman'),(171,'PK','Pakistan'),(172,'PW','Palau'),(173,'PS','Palestinian Territories'),(174,'PA','Panama'),(175,'PG','Papua New Guinea'),(176,'PY','Paraguay'),(177,'PE','Peru'),(178,'PH','Philippines'),(179,'PN','Pitcairn Islands'),(180,'PL','Poland'),(181,'PT','Portugal'),(182,'PR','Puerto Rico'),(183,'QA','Qatar'),(184,'RE','Réunion'),(185,'RO','Romania'),(186,'RU','Russia'),(187,'RW','Rwanda'),(188,'WS','Samoa'),(189,'SM','San Marino'),(190,'ST','São Tomé & Príncipe'),(191,'SA','Saudi Arabia'),(192,'SN','Senegal'),(193,'RS','Serbia'),(194,'SC','Seychelles'),(195,'SL','Sierra Leone'),(196,'SG','Singapore'),(197,'SX','Sint Maarten'),(198,'SK','Slovakia'),(199,'SI','Slovenia'),(200,'SB','Solomon Islands'),(201,'SO','Somalia'),(202,'ZA','South Africa'),(203,'GS','South Georgia & South Sandwich Islands'),(204,'KR','South Korea'),(205,'SS','South Sudan'),(206,'ES','Spain'),(207,'LK','Sri Lanka'),(208,'BL','St. Barthélemy'),(209,'SH','St. Helena'),(210,'KN','St. Kitts & Nevis'),(211,'LC','St. Lucia'),(212,'MF','St. Martin'),(213,'PM','St. Pierre & Miquelon'),(214,'VC','St. Vincent & Grenadines'),(215,'SD','Sudan'),(216,'SR','Suriname'),(217,'SJ','Svalbard & Jan Mayen'),(218,'SZ','Swaziland'),(219,'SE','Sweden'),(220,'CH','Switzerland'),(221,'SY','Syria'),(222,'TW','Taiwan'),(223,'TJ','Tajikistan'),(224,'TZ','Tanzania'),(225,'TH','Thailand'),(226,'TL','Timor-Leste'),(227,'TG','Togo'),(228,'TK','Tokelau'),(229,'TO','Tonga'),(230,'TT','Trinidad & Tobago'),(231,'TA','Tristan da Cunha'),(232,'TN','Tunisia'),(233,'TR','Turkey'),(234,'TM','Turkmenistan'),(235,'TC','Turks & Caicos Islands'),(236,'TV','Tuvalu'),(237,'UM','U.S. Outlying Islands'),(238,'VI','U.S. Virgin Islands'),(239,'UG','Uganda'),(240,'UA','Ukraine'),(241,'AE','United Arab Emirates'),(242,'GB','United Kingdom'),(244,'US','United States'),(245,'UY','Uruguay'),(246,'UZ','Uzbekistan'),(247,'VU','Vanuatu'),(248,'VA','Vatican City'),(249,'VE','Venezuela'),(250,'VN','Vietnam'),(251,'WF','Wallis & Futuna'),(252,'EH','Western Sahara'),(253,'YE','Yemen'),(254,'ZM','Zambia'),(255,'ZW','Zimbabwe');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_state_translations`
--

DROP TABLE IF EXISTS `country_state_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country_state_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `country_state_id` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_name` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `country_state_translations_country_state_id_foreign` (`country_state_id`),
  CONSTRAINT `country_state_translations_country_state_id_foreign` FOREIGN KEY (`country_state_id`) REFERENCES `country_states` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_state_translations`
--

LOCK TABLES `country_state_translations` WRITE;
/*!40000 ALTER TABLE `country_state_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `country_state_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_states`
--

DROP TABLE IF EXISTS `country_states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country_states` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int unsigned DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_states_country_id_foreign` (`country_id`),
  CONSTRAINT `country_states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=587 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_states`
--

LOCK TABLES `country_states` WRITE;
/*!40000 ALTER TABLE `country_states` DISABLE KEYS */;
INSERT INTO `country_states` VALUES (1,244,'US','AL','Alabama'),(2,244,'US','AK','Alaska'),(3,244,'US','AS','American Samoa'),(4,244,'US','AZ','Arizona'),(5,244,'US','AR','Arkansas'),(6,244,'US','AE','Armed Forces Africa'),(7,244,'US','AA','Armed Forces Americas'),(8,244,'US','AE','Armed Forces Canada'),(9,244,'US','AE','Armed Forces Europe'),(10,244,'US','AE','Armed Forces Middle East'),(11,244,'US','AP','Armed Forces Pacific'),(12,244,'US','CA','California'),(13,244,'US','CO','Colorado'),(14,244,'US','CT','Connecticut'),(15,244,'US','DE','Delaware'),(16,244,'US','DC','District of Columbia'),(17,244,'US','FM','Federated States Of Micronesia'),(18,244,'US','FL','Florida'),(19,244,'US','GA','Georgia'),(20,244,'US','GU','Guam'),(21,244,'US','HI','Hawaii'),(22,244,'US','ID','Idaho'),(23,244,'US','IL','Illinois'),(24,244,'US','IN','Indiana'),(25,244,'US','IA','Iowa'),(26,244,'US','KS','Kansas'),(27,244,'US','KY','Kentucky'),(28,244,'US','LA','Louisiana'),(29,244,'US','ME','Maine'),(30,244,'US','MH','Marshall Islands'),(31,244,'US','MD','Maryland'),(32,244,'US','MA','Massachusetts'),(33,244,'US','MI','Michigan'),(34,244,'US','MN','Minnesota'),(35,244,'US','MS','Mississippi'),(36,244,'US','MO','Missouri'),(37,244,'US','MT','Montana'),(38,244,'US','NE','Nebraska'),(39,244,'US','NV','Nevada'),(40,244,'US','NH','New Hampshire'),(41,244,'US','NJ','New Jersey'),(42,244,'US','NM','New Mexico'),(43,244,'US','NY','New York'),(44,244,'US','NC','North Carolina'),(45,244,'US','ND','North Dakota'),(46,244,'US','MP','Northern Mariana Islands'),(47,244,'US','OH','Ohio'),(48,244,'US','OK','Oklahoma'),(49,244,'US','OR','Oregon'),(50,244,'US','PW','Palau'),(51,244,'US','PA','Pennsylvania'),(52,244,'US','PR','Puerto Rico'),(53,244,'US','RI','Rhode Island'),(54,244,'US','SC','South Carolina'),(55,244,'US','SD','South Dakota'),(56,244,'US','TN','Tennessee'),(57,244,'US','TX','Texas'),(58,244,'US','UT','Utah'),(59,244,'US','VT','Vermont'),(60,244,'US','VI','Virgin Islands'),(61,244,'US','VA','Virginia'),(62,244,'US','WA','Washington'),(63,244,'US','WV','West Virginia'),(64,244,'US','WI','Wisconsin'),(65,244,'US','WY','Wyoming'),(66,40,'CA','AB','Alberta'),(67,40,'CA','BC','British Columbia'),(68,40,'CA','MB','Manitoba'),(69,40,'CA','NL','Newfoundland and Labrador'),(70,40,'CA','NB','New Brunswick'),(71,40,'CA','NS','Nova Scotia'),(72,40,'CA','NT','Northwest Territories'),(73,40,'CA','NU','Nunavut'),(74,40,'CA','ON','Ontario'),(75,40,'CA','PE','Prince Edward Island'),(76,40,'CA','QC','Quebec'),(77,40,'CA','SK','Saskatchewan'),(78,40,'CA','YT','Yukon Territory'),(79,88,'DE','NDS','Niedersachsen'),(80,88,'DE','BAW','Baden-Württemberg'),(81,88,'DE','BAY','Bayern'),(82,88,'DE','BER','Berlin'),(83,88,'DE','BRG','Brandenburg'),(84,88,'DE','BRE','Bremen'),(85,88,'DE','HAM','Hamburg'),(86,88,'DE','HES','Hessen'),(87,88,'DE','MEC','Mecklenburg-Vorpommern'),(88,88,'DE','NRW','Nordrhein-Westfalen'),(89,88,'DE','RHE','Rheinland-Pfalz'),(90,88,'DE','SAR','Saarland'),(91,88,'DE','SAS','Sachsen'),(92,88,'DE','SAC','Sachsen-Anhalt'),(93,88,'DE','SCN','Schleswig-Holstein'),(94,88,'DE','THE','Thüringen'),(95,16,'AT','WI','Wien'),(96,16,'AT','NO','Niederösterreich'),(97,16,'AT','OO','Oberösterreich'),(98,16,'AT','SB','Salzburg'),(99,16,'AT','KN','Kärnten'),(100,16,'AT','ST','Steiermark'),(101,16,'AT','TI','Tirol'),(102,16,'AT','BL','Burgenland'),(103,16,'AT','VB','Vorarlberg'),(104,220,'CH','AG','Aargau'),(105,220,'CH','AI','Appenzell Innerrhoden'),(106,220,'CH','AR','Appenzell Ausserrhoden'),(107,220,'CH','BE','Bern'),(108,220,'CH','BL','Basel-Landschaft'),(109,220,'CH','BS','Basel-Stadt'),(110,220,'CH','FR','Freiburg'),(111,220,'CH','GE','Genf'),(112,220,'CH','GL','Glarus'),(113,220,'CH','GR','Graubünden'),(114,220,'CH','JU','Jura'),(115,220,'CH','LU','Luzern'),(116,220,'CH','NE','Neuenburg'),(117,220,'CH','NW','Nidwalden'),(118,220,'CH','OW','Obwalden'),(119,220,'CH','SG','St. Gallen'),(120,220,'CH','SH','Schaffhausen'),(121,220,'CH','SO','Solothurn'),(122,220,'CH','SZ','Schwyz'),(123,220,'CH','TG','Thurgau'),(124,220,'CH','TI','Tessin'),(125,220,'CH','UR','Uri'),(126,220,'CH','VD','Waadt'),(127,220,'CH','VS','Wallis'),(128,220,'CH','ZG','Zug'),(129,220,'CH','ZH','Zürich'),(130,206,'ES','A Coruсa','A Coruña'),(131,206,'ES','Alava','Alava'),(132,206,'ES','Albacete','Albacete'),(133,206,'ES','Alicante','Alicante'),(134,206,'ES','Almeria','Almeria'),(135,206,'ES','Asturias','Asturias'),(136,206,'ES','Avila','Avila'),(137,206,'ES','Badajoz','Badajoz'),(138,206,'ES','Baleares','Baleares'),(139,206,'ES','Barcelona','Barcelona'),(140,206,'ES','Burgos','Burgos'),(141,206,'ES','Caceres','Caceres'),(142,206,'ES','Cadiz','Cadiz'),(143,206,'ES','Cantabria','Cantabria'),(144,206,'ES','Castellon','Castellon'),(145,206,'ES','Ceuta','Ceuta'),(146,206,'ES','Ciudad Real','Ciudad Real'),(147,206,'ES','Cordoba','Cordoba'),(148,206,'ES','Cuenca','Cuenca'),(149,206,'ES','Girona','Girona'),(150,206,'ES','Granada','Granada'),(151,206,'ES','Guadalajara','Guadalajara'),(152,206,'ES','Guipuzcoa','Guipuzcoa'),(153,206,'ES','Huelva','Huelva'),(154,206,'ES','Huesca','Huesca'),(155,206,'ES','Jaen','Jaen'),(156,206,'ES','La Rioja','La Rioja'),(157,206,'ES','Las Palmas','Las Palmas'),(158,206,'ES','Leon','Leon'),(159,206,'ES','Lleida','Lleida'),(160,206,'ES','Lugo','Lugo'),(161,206,'ES','Madrid','Madrid'),(162,206,'ES','Malaga','Malaga'),(163,206,'ES','Melilla','Melilla'),(164,206,'ES','Murcia','Murcia'),(165,206,'ES','Navarra','Navarra'),(166,206,'ES','Ourense','Ourense'),(167,206,'ES','Palencia','Palencia'),(168,206,'ES','Pontevedra','Pontevedra'),(169,206,'ES','Salamanca','Salamanca'),(170,206,'ES','Santa Cruz de Tenerife','Santa Cruz de Tenerife'),(171,206,'ES','Segovia','Segovia'),(172,206,'ES','Sevilla','Sevilla'),(173,206,'ES','Soria','Soria'),(174,206,'ES','Tarragona','Tarragona'),(175,206,'ES','Teruel','Teruel'),(176,206,'ES','Toledo','Toledo'),(177,206,'ES','Valencia','Valencia'),(178,206,'ES','Valladolid','Valladolid'),(179,206,'ES','Vizcaya','Vizcaya'),(180,206,'ES','Zamora','Zamora'),(181,206,'ES','Zaragoza','Zaragoza'),(182,81,'FR','1','Ain'),(183,81,'FR','2','Aisne'),(184,81,'FR','3','Allier'),(185,81,'FR','4','Alpes-de-Haute-Provence'),(186,81,'FR','5','Hautes-Alpes'),(187,81,'FR','6','Alpes-Maritimes'),(188,81,'FR','7','Ardèche'),(189,81,'FR','8','Ardennes'),(190,81,'FR','9','Ariège'),(191,81,'FR','10','Aube'),(192,81,'FR','11','Aude'),(193,81,'FR','12','Aveyron'),(194,81,'FR','13','Bouches-du-Rhône'),(195,81,'FR','14','Calvados'),(196,81,'FR','15','Cantal'),(197,81,'FR','16','Charente'),(198,81,'FR','17','Charente-Maritime'),(199,81,'FR','18','Cher'),(200,81,'FR','19','Corrèze'),(201,81,'FR','2A','Corse-du-Sud'),(202,81,'FR','2B','Haute-Corse'),(203,81,'FR','21','Côte-d\'Or'),(204,81,'FR','22','Côtes-d\'Armor'),(205,81,'FR','23','Creuse'),(206,81,'FR','24','Dordogne'),(207,81,'FR','25','Doubs'),(208,81,'FR','26','Drôme'),(209,81,'FR','27','Eure'),(210,81,'FR','28','Eure-et-Loir'),(211,81,'FR','29','Finistère'),(212,81,'FR','30','Gard'),(213,81,'FR','31','Haute-Garonne'),(214,81,'FR','32','Gers'),(215,81,'FR','33','Gironde'),(216,81,'FR','34','Hérault'),(217,81,'FR','35','Ille-et-Vilaine'),(218,81,'FR','36','Indre'),(219,81,'FR','37','Indre-et-Loire'),(220,81,'FR','38','Isère'),(221,81,'FR','39','Jura'),(222,81,'FR','40','Landes'),(223,81,'FR','41','Loir-et-Cher'),(224,81,'FR','42','Loire'),(225,81,'FR','43','Haute-Loire'),(226,81,'FR','44','Loire-Atlantique'),(227,81,'FR','45','Loiret'),(228,81,'FR','46','Lot'),(229,81,'FR','47','Lot-et-Garonne'),(230,81,'FR','48','Lozère'),(231,81,'FR','49','Maine-et-Loire'),(232,81,'FR','50','Manche'),(233,81,'FR','51','Marne'),(234,81,'FR','52','Haute-Marne'),(235,81,'FR','53','Mayenne'),(236,81,'FR','54','Meurthe-et-Moselle'),(237,81,'FR','55','Meuse'),(238,81,'FR','56','Morbihan'),(239,81,'FR','57','Moselle'),(240,81,'FR','58','Nièvre'),(241,81,'FR','59','Nord'),(242,81,'FR','60','Oise'),(243,81,'FR','61','Orne'),(244,81,'FR','62','Pas-de-Calais'),(245,81,'FR','63','Puy-de-Dôme'),(246,81,'FR','64','Pyrénées-Atlantiques'),(247,81,'FR','65','Hautes-Pyrénées'),(248,81,'FR','66','Pyrénées-Orientales'),(249,81,'FR','67','Bas-Rhin'),(250,81,'FR','68','Haut-Rhin'),(251,81,'FR','69','Rhône'),(252,81,'FR','70','Haute-Saône'),(253,81,'FR','71','Saône-et-Loire'),(254,81,'FR','72','Sarthe'),(255,81,'FR','73','Savoie'),(256,81,'FR','74','Haute-Savoie'),(257,81,'FR','75','Paris'),(258,81,'FR','76','Seine-Maritime'),(259,81,'FR','77','Seine-et-Marne'),(260,81,'FR','78','Yvelines'),(261,81,'FR','79','Deux-Sèvres'),(262,81,'FR','80','Somme'),(263,81,'FR','81','Tarn'),(264,81,'FR','82','Tarn-et-Garonne'),(265,81,'FR','83','Var'),(266,81,'FR','84','Vaucluse'),(267,81,'FR','85','Vendée'),(268,81,'FR','86','Vienne'),(269,81,'FR','87','Haute-Vienne'),(270,81,'FR','88','Vosges'),(271,81,'FR','89','Yonne'),(272,81,'FR','90','Territoire-de-Belfort'),(273,81,'FR','91','Essonne'),(274,81,'FR','92','Hauts-de-Seine'),(275,81,'FR','93','Seine-Saint-Denis'),(276,81,'FR','94','Val-de-Marne'),(277,81,'FR','95','Val-d\'Oise'),(278,185,'RO','AB','Alba'),(279,185,'RO','AR','Arad'),(280,185,'RO','AG','Argeş'),(281,185,'RO','BC','Bacău'),(282,185,'RO','BH','Bihor'),(283,185,'RO','BN','Bistriţa-Năsăud'),(284,185,'RO','BT','Botoşani'),(285,185,'RO','BV','Braşov'),(286,185,'RO','BR','Brăila'),(287,185,'RO','B','Bucureşti'),(288,185,'RO','BZ','Buzău'),(289,185,'RO','CS','Caraş-Severin'),(290,185,'RO','CL','Călăraşi'),(291,185,'RO','CJ','Cluj'),(292,185,'RO','CT','Constanţa'),(293,185,'RO','CV','Covasna'),(294,185,'RO','DB','Dâmboviţa'),(295,185,'RO','DJ','Dolj'),(296,185,'RO','GL','Galaţi'),(297,185,'RO','GR','Giurgiu'),(298,185,'RO','GJ','Gorj'),(299,185,'RO','HR','Harghita'),(300,185,'RO','HD','Hunedoara'),(301,185,'RO','IL','Ialomiţa'),(302,185,'RO','IS','Iaşi'),(303,185,'RO','IF','Ilfov'),(304,185,'RO','MM','Maramureş'),(305,185,'RO','MH','Mehedinţi'),(306,185,'RO','MS','Mureş'),(307,185,'RO','NT','Neamţ'),(308,185,'RO','OT','Olt'),(309,185,'RO','PH','Prahova'),(310,185,'RO','SM','Satu-Mare'),(311,185,'RO','SJ','Sălaj'),(312,185,'RO','SB','Sibiu'),(313,185,'RO','SV','Suceava'),(314,185,'RO','TR','Teleorman'),(315,185,'RO','TM','Timiş'),(316,185,'RO','TL','Tulcea'),(317,185,'RO','VS','Vaslui'),(318,185,'RO','VL','Vâlcea'),(319,185,'RO','VN','Vrancea'),(320,80,'FI','Lappi','Lappi'),(321,80,'FI','Pohjois-Pohjanmaa','Pohjois-Pohjanmaa'),(322,80,'FI','Kainuu','Kainuu'),(323,80,'FI','Pohjois-Karjala','Pohjois-Karjala'),(324,80,'FI','Pohjois-Savo','Pohjois-Savo'),(325,80,'FI','Etelä-Savo','Etelä-Savo'),(326,80,'FI','Etelä-Pohjanmaa','Etelä-Pohjanmaa'),(327,80,'FI','Pohjanmaa','Pohjanmaa'),(328,80,'FI','Pirkanmaa','Pirkanmaa'),(329,80,'FI','Satakunta','Satakunta'),(330,80,'FI','Keski-Pohjanmaa','Keski-Pohjanmaa'),(331,80,'FI','Keski-Suomi','Keski-Suomi'),(332,80,'FI','Varsinais-Suomi','Varsinais-Suomi'),(333,80,'FI','Etelä-Karjala','Etelä-Karjala'),(334,80,'FI','Päijät-Häme','Päijät-Häme'),(335,80,'FI','Kanta-Häme','Kanta-Häme'),(336,80,'FI','Uusimaa','Uusimaa'),(337,80,'FI','Itä-Uusimaa','Itä-Uusimaa'),(338,80,'FI','Kymenlaakso','Kymenlaakso'),(339,80,'FI','Ahvenanmaa','Ahvenanmaa'),(340,74,'EE','EE-37','Harjumaa'),(341,74,'EE','EE-39','Hiiumaa'),(342,74,'EE','EE-44','Ida-Virumaa'),(343,74,'EE','EE-49','Jõgevamaa'),(344,74,'EE','EE-51','Järvamaa'),(345,74,'EE','EE-57','Läänemaa'),(346,74,'EE','EE-59','Lääne-Virumaa'),(347,74,'EE','EE-65','Põlvamaa'),(348,74,'EE','EE-67','Pärnumaa'),(349,74,'EE','EE-70','Raplamaa'),(350,74,'EE','EE-74','Saaremaa'),(351,74,'EE','EE-78','Tartumaa'),(352,74,'EE','EE-82','Valgamaa'),(353,74,'EE','EE-84','Viljandimaa'),(354,74,'EE','EE-86','Võrumaa'),(355,125,'LV','LV-DGV','Daugavpils'),(356,125,'LV','LV-JEL','Jelgava'),(357,125,'LV','Jēkabpils','Jēkabpils'),(358,125,'LV','LV-JUR','Jūrmala'),(359,125,'LV','LV-LPX','Liepāja'),(360,125,'LV','LV-LE','Liepājas novads'),(361,125,'LV','LV-REZ','Rēzekne'),(362,125,'LV','LV-RIX','Rīga'),(363,125,'LV','LV-RI','Rīgas novads'),(364,125,'LV','Valmiera','Valmiera'),(365,125,'LV','LV-VEN','Ventspils'),(366,125,'LV','Aglonas novads','Aglonas novads'),(367,125,'LV','LV-AI','Aizkraukles novads'),(368,125,'LV','Aizputes novads','Aizputes novads'),(369,125,'LV','Aknīstes novads','Aknīstes novads'),(370,125,'LV','Alojas novads','Alojas novads'),(371,125,'LV','Alsungas novads','Alsungas novads'),(372,125,'LV','LV-AL','Alūksnes novads'),(373,125,'LV','Amatas novads','Amatas novads'),(374,125,'LV','Apes novads','Apes novads'),(375,125,'LV','Auces novads','Auces novads'),(376,125,'LV','Babītes novads','Babītes novads'),(377,125,'LV','Baldones novads','Baldones novads'),(378,125,'LV','Baltinavas novads','Baltinavas novads'),(379,125,'LV','LV-BL','Balvu novads'),(380,125,'LV','LV-BU','Bauskas novads'),(381,125,'LV','Beverīnas novads','Beverīnas novads'),(382,125,'LV','Brocēnu novads','Brocēnu novads'),(383,125,'LV','Burtnieku novads','Burtnieku novads'),(384,125,'LV','Carnikavas novads','Carnikavas novads'),(385,125,'LV','Cesvaines novads','Cesvaines novads'),(386,125,'LV','Ciblas novads','Ciblas novads'),(387,125,'LV','LV-CE','Cēsu novads'),(388,125,'LV','Dagdas novads','Dagdas novads'),(389,125,'LV','LV-DA','Daugavpils novads'),(390,125,'LV','LV-DO','Dobeles novads'),(391,125,'LV','Dundagas novads','Dundagas novads'),(392,125,'LV','Durbes novads','Durbes novads'),(393,125,'LV','Engures novads','Engures novads'),(394,125,'LV','Garkalnes novads','Garkalnes novads'),(395,125,'LV','Grobiņas novads','Grobiņas novads'),(396,125,'LV','LV-GU','Gulbenes novads'),(397,125,'LV','Iecavas novads','Iecavas novads'),(398,125,'LV','Ikšķiles novads','Ikšķiles novads'),(399,125,'LV','Ilūkstes novads','Ilūkstes novads'),(400,125,'LV','Inčukalna novads','Inčukalna novads'),(401,125,'LV','Jaunjelgavas novads','Jaunjelgavas novads'),(402,125,'LV','Jaunpiebalgas novads','Jaunpiebalgas novads'),(403,125,'LV','Jaunpils novads','Jaunpils novads'),(404,125,'LV','LV-JL','Jelgavas novads'),(405,125,'LV','LV-JK','Jēkabpils novads'),(406,125,'LV','Kandavas novads','Kandavas novads'),(407,125,'LV','Kokneses novads','Kokneses novads'),(408,125,'LV','Krimuldas novads','Krimuldas novads'),(409,125,'LV','Krustpils novads','Krustpils novads'),(410,125,'LV','LV-KR','Krāslavas novads'),(411,125,'LV','LV-KU','Kuldīgas novads'),(412,125,'LV','Kārsavas novads','Kārsavas novads'),(413,125,'LV','Lielvārdes novads','Lielvārdes novads'),(414,125,'LV','LV-LM','Limbažu novads'),(415,125,'LV','Lubānas novads','Lubānas novads'),(416,125,'LV','LV-LU','Ludzas novads'),(417,125,'LV','Līgatnes novads','Līgatnes novads'),(418,125,'LV','Līvānu novads','Līvānu novads'),(419,125,'LV','LV-MA','Madonas novads'),(420,125,'LV','Mazsalacas novads','Mazsalacas novads'),(421,125,'LV','Mālpils novads','Mālpils novads'),(422,125,'LV','Mārupes novads','Mārupes novads'),(423,125,'LV','Naukšēnu novads','Naukšēnu novads'),(424,125,'LV','Neretas novads','Neretas novads'),(425,125,'LV','Nīcas novads','Nīcas novads'),(426,125,'LV','LV-OG','Ogres novads'),(427,125,'LV','Olaines novads','Olaines novads'),(428,125,'LV','Ozolnieku novads','Ozolnieku novads'),(429,125,'LV','LV-PR','Preiļu novads'),(430,125,'LV','Priekules novads','Priekules novads'),(431,125,'LV','Priekuļu novads','Priekuļu novads'),(432,125,'LV','Pārgaujas novads','Pārgaujas novads'),(433,125,'LV','Pāvilostas novads','Pāvilostas novads'),(434,125,'LV','Pļaviņu novads','Pļaviņu novads'),(435,125,'LV','Raunas novads','Raunas novads'),(436,125,'LV','Riebiņu novads','Riebiņu novads'),(437,125,'LV','Rojas novads','Rojas novads'),(438,125,'LV','Ropažu novads','Ropažu novads'),(439,125,'LV','Rucavas novads','Rucavas novads'),(440,125,'LV','Rugāju novads','Rugāju novads'),(441,125,'LV','Rundāles novads','Rundāles novads'),(442,125,'LV','LV-RE','Rēzeknes novads'),(443,125,'LV','Rūjienas novads','Rūjienas novads'),(444,125,'LV','Salacgrīvas novads','Salacgrīvas novads'),(445,125,'LV','Salas novads','Salas novads'),(446,125,'LV','Salaspils novads','Salaspils novads'),(447,125,'LV','LV-SA','Saldus novads'),(448,125,'LV','Saulkrastu novads','Saulkrastu novads'),(449,125,'LV','Siguldas novads','Siguldas novads'),(450,125,'LV','Skrundas novads','Skrundas novads'),(451,125,'LV','Skrīveru novads','Skrīveru novads'),(452,125,'LV','Smiltenes novads','Smiltenes novads'),(453,125,'LV','Stopiņu novads','Stopiņu novads'),(454,125,'LV','Strenču novads','Strenču novads'),(455,125,'LV','Sējas novads','Sējas novads'),(456,125,'LV','LV-TA','Talsu novads'),(457,125,'LV','LV-TU','Tukuma novads'),(458,125,'LV','Tērvetes novads','Tērvetes novads'),(459,125,'LV','Vaiņodes novads','Vaiņodes novads'),(460,125,'LV','LV-VK','Valkas novads'),(461,125,'LV','LV-VM','Valmieras novads'),(462,125,'LV','Varakļānu novads','Varakļānu novads'),(463,125,'LV','Vecpiebalgas novads','Vecpiebalgas novads'),(464,125,'LV','Vecumnieku novads','Vecumnieku novads'),(465,125,'LV','LV-VE','Ventspils novads'),(466,125,'LV','Viesītes novads','Viesītes novads'),(467,125,'LV','Viļakas novads','Viļakas novads'),(468,125,'LV','Viļānu novads','Viļānu novads'),(469,125,'LV','Vārkavas novads','Vārkavas novads'),(470,125,'LV','Zilupes novads','Zilupes novads'),(471,125,'LV','Ādažu novads','Ādažu novads'),(472,125,'LV','Ērgļu novads','Ērgļu novads'),(473,125,'LV','Ķeguma novads','Ķeguma novads'),(474,125,'LV','Ķekavas novads','Ķekavas novads'),(475,131,'LT','LT-AL','Alytaus Apskritis'),(476,131,'LT','LT-KU','Kauno Apskritis'),(477,131,'LT','LT-KL','Klaipėdos Apskritis'),(478,131,'LT','LT-MR','Marijampolės Apskritis'),(479,131,'LT','LT-PN','Panevėžio Apskritis'),(480,131,'LT','LT-SA','Šiaulių Apskritis'),(481,131,'LT','LT-TA','Tauragės Apskritis'),(482,131,'LT','LT-TE','Telšių Apskritis'),(483,131,'LT','LT-UT','Utenos Apskritis'),(484,131,'LT','LT-VL','Vilniaus Apskritis'),(485,31,'BR','AC','Acre'),(486,31,'BR','AL','Alagoas'),(487,31,'BR','AP','Amapá'),(488,31,'BR','AM','Amazonas'),(489,31,'BR','BA','Bahia'),(490,31,'BR','CE','Ceará'),(491,31,'BR','ES','Espírito Santo'),(492,31,'BR','GO','Goiás'),(493,31,'BR','MA','Maranhão'),(494,31,'BR','MT','Mato Grosso'),(495,31,'BR','MS','Mato Grosso do Sul'),(496,31,'BR','MG','Minas Gerais'),(497,31,'BR','PA','Pará'),(498,31,'BR','PB','Paraíba'),(499,31,'BR','PR','Paraná'),(500,31,'BR','PE','Pernambuco'),(501,31,'BR','PI','Piauí'),(502,31,'BR','RJ','Rio de Janeiro'),(503,31,'BR','RN','Rio Grande do Norte'),(504,31,'BR','RS','Rio Grande do Sul'),(505,31,'BR','RO','Rondônia'),(506,31,'BR','RR','Roraima'),(507,31,'BR','SC','Santa Catarina'),(508,31,'BR','SP','São Paulo'),(509,31,'BR','SE','Sergipe'),(510,31,'BR','TO','Tocantins'),(511,31,'BR','DF','Distrito Federal'),(512,59,'HR','HR-01','Zagrebačka županija'),(513,59,'HR','HR-02','Krapinsko-zagorska županija'),(514,59,'HR','HR-03','Sisačko-moslavačka županija'),(515,59,'HR','HR-04','Karlovačka županija'),(516,59,'HR','HR-05','Varaždinska županija'),(517,59,'HR','HR-06','Koprivničko-križevačka županija'),(518,59,'HR','HR-07','Bjelovarsko-bilogorska županija'),(519,59,'HR','HR-08','Primorsko-goranska županija'),(520,59,'HR','HR-09','Ličko-senjska županija'),(521,59,'HR','HR-10','Virovitičko-podravska županija'),(522,59,'HR','HR-11','Požeško-slavonska županija'),(523,59,'HR','HR-12','Brodsko-posavska županija'),(524,59,'HR','HR-13','Zadarska županija'),(525,59,'HR','HR-14','Osječko-baranjska županija'),(526,59,'HR','HR-15','Šibensko-kninska županija'),(527,59,'HR','HR-16','Vukovarsko-srijemska županija'),(528,59,'HR','HR-17','Splitsko-dalmatinska županija'),(529,59,'HR','HR-18','Istarska županija'),(530,59,'HR','HR-19','Dubrovačko-neretvanska županija'),(531,59,'HR','HR-20','Međimurska županija'),(532,59,'HR','HR-21','Grad Zagreb'),(533,106,'IN','AN','Andaman and Nicobar Islands'),(534,106,'IN','AP','Andhra Pradesh'),(535,106,'IN','AR','Arunachal Pradesh'),(536,106,'IN','AS','Assam'),(537,106,'IN','BR','Bihar'),(538,106,'IN','CH','Chandigarh'),(539,106,'IN','CT','Chhattisgarh'),(540,106,'IN','DN','Dadra and Nagar Haveli'),(541,106,'IN','DD','Daman and Diu'),(542,106,'IN','DL','Delhi'),(543,106,'IN','GA','Goa'),(544,106,'IN','GJ','Gujarat'),(545,106,'IN','HR','Haryana'),(546,106,'IN','HP','Himachal Pradesh'),(547,106,'IN','JK','Jammu and Kashmir'),(548,106,'IN','JH','Jharkhand'),(549,106,'IN','KA','Karnataka'),(550,106,'IN','KL','Kerala'),(551,106,'IN','LD','Lakshadweep'),(552,106,'IN','MP','Madhya Pradesh'),(553,106,'IN','MH','Maharashtra'),(554,106,'IN','MN','Manipur'),(555,106,'IN','ML','Meghalaya'),(556,106,'IN','MZ','Mizoram'),(557,106,'IN','NL','Nagaland'),(558,106,'IN','OR','Odisha'),(559,106,'IN','PY','Puducherry'),(560,106,'IN','PB','Punjab'),(561,106,'IN','RJ','Rajasthan'),(562,106,'IN','SK','Sikkim'),(563,106,'IN','TN','Tamil Nadu'),(564,106,'IN','TG','Telangana'),(565,106,'IN','TR','Tripura'),(566,106,'IN','UP','Uttar Pradesh'),(567,106,'IN','UT','Uttarakhand'),(568,106,'IN','WB','West Bengal'),(569,176,'PY','PY-16','Alto Paraguay'),(570,176,'PY','PY-10','Alto Paraná'),(571,176,'PY','PY-13','Amambay'),(572,176,'PY','PY-ASU','Asunción'),(573,176,'PY','PY-19','Boquerón'),(574,176,'PY','PY-5','Caaguazú'),(575,176,'PY','PY-6','Caazapá'),(576,176,'PY','PY-14','Canindeyú'),(577,176,'PY','PY-11','Central'),(578,176,'PY','PY-1','Concepción'),(579,176,'PY','PY-3','Cordillera'),(580,176,'PY','PY-4','Guairá'),(581,176,'PY','PY-7','Itapúa'),(582,176,'PY','PY-8','Misiones'),(583,176,'PY','PY-9','Paraguarí'),(584,176,'PY','PY-15','Presidente Hayes'),(585,176,'PY','PY-2','San Pedro'),(586,176,'PY','PY-12','Ñeembucú');
/*!40000 ALTER TABLE `country_states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_translations`
--

DROP TABLE IF EXISTS `country_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `country_translations_country_id_foreign` (`country_id`),
  CONSTRAINT `country_translations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_translations`
--

LOCK TABLES `country_translations` WRITE;
/*!40000 ALTER TABLE `country_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `country_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currencies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decimal` int unsigned NOT NULL DEFAULT '2',
  `group_separator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ',',
  `decimal_separator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '.',
  `currency_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'INR','Indian Rupee','₹',2,',','.','left','2026-09-26 07:13:11','2026-09-26 07:13:11');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency_exchange_rates`
--

DROP TABLE IF EXISTS `currency_exchange_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currency_exchange_rates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rate` decimal(24,12) NOT NULL,
  `target_currency` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `currency_exchange_rates_target_currency_unique` (`target_currency`),
  CONSTRAINT `currency_exchange_rates_target_currency_foreign` FOREIGN KEY (`target_currency`) REFERENCES `currencies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency_exchange_rates`
--

LOCK TABLES `currency_exchange_rates` WRITE;
/*!40000 ALTER TABLE `currency_exchange_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `currency_exchange_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_groups`
--

DROP TABLE IF EXISTS `customer_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_groups_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_groups`
--

LOCK TABLES `customer_groups` WRITE;
/*!40000 ALTER TABLE `customer_groups` DISABLE KEYS */;
INSERT INTO `customer_groups` VALUES (1,'guest','Guest',0,NULL,NULL),(2,'general','General',0,NULL,NULL),(3,'wholesale','Wholesale',0,NULL,NULL);
/*!40000 ALTER TABLE `customer_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_notes`
--

DROP TABLE IF EXISTS `customer_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_notes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int unsigned DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_notified` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_notes_customer_id_foreign` (`customer_id`),
  CONSTRAINT `customer_notes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_notes`
--

LOCK TABLES `customer_notes` WRITE;
/*!40000 ALTER TABLE `customer_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_password_resets`
--

DROP TABLE IF EXISTS `customer_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `customer_password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_password_resets`
--

LOCK TABLES `customer_password_resets` WRITE;
/*!40000 ALTER TABLE `customer_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_social_accounts`
--

DROP TABLE IF EXISTS `customer_social_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_social_accounts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int unsigned NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_social_accounts_provider_id_unique` (`provider_id`),
  KEY `customer_social_accounts_customer_id_foreign` (`customer_id`),
  CONSTRAINT `customer_social_accounts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_social_accounts`
--

LOCK TABLES `customer_social_accounts` WRITE;
/*!40000 ALTER TABLE `customer_social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_social_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_group_id` int unsigned DEFAULT NULL,
  `channel_id` int unsigned DEFAULT NULL,
  `subscribed_to_news_letter` tinyint(1) NOT NULL DEFAULT '0',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_suspended` tinyint unsigned NOT NULL DEFAULT '0',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_phone_unique` (`phone`),
  UNIQUE KEY `customers_api_token_unique` (`api_token`),
  UNIQUE KEY `customers_email_channel_unique` (`email`,`channel_id`),
  KEY `customers_customer_group_id_foreign` (`customer_group_id`),
  KEY `customers_channel_id_foreign` (`channel_id`),
  CONSTRAINT `customers_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customers_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=1339 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Aarav','Reddy','Male','1992-05-15','aarav.reddy@example.com','9876543210',NULL,1,'$2y$12$qEKaLb2JycSi78Dq8TXX.ep6QSY16zmnIbPE.M6.qPqt/omExzJUq','aqcDWyFOh3yfSJn52RsQnalN1IjjXeqdJwmThehg7T7awI5PY2PUr13FN7s4IEnFoLrpqLmkVWLOzkTC',2,1,1,1,0,'606a802f658e051d6acacfd427fad51b',NULL,'2026-09-21 21:48:56','2026-09-21 21:54:10');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datagrid_saved_filters`
--

DROP TABLE IF EXISTS `datagrid_saved_filters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datagrid_saved_filters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applied` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `datagrid_saved_filters_user_id_name_src_unique` (`user_id`,`name`,`src`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datagrid_saved_filters`
--

LOCK TABLES `datagrid_saved_filters` WRITE;
/*!40000 ALTER TABLE `datagrid_saved_filters` DISABLE KEYS */;
/*!40000 ALTER TABLE `datagrid_saved_filters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downloadable_link_purchased`
--

DROP TABLE IF EXISTS `downloadable_link_purchased`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `downloadable_link_purchased` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `download_bought` int NOT NULL DEFAULT '0',
  `download_used` int NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int unsigned NOT NULL,
  `order_id` int unsigned NOT NULL,
  `order_item_id` int unsigned NOT NULL,
  `download_canceled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `downloadable_link_purchased_customer_id_foreign` (`customer_id`),
  KEY `downloadable_link_purchased_order_id_foreign` (`order_id`),
  KEY `downloadable_link_purchased_order_item_id_foreign` (`order_item_id`),
  CONSTRAINT `downloadable_link_purchased_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `downloadable_link_purchased_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `downloadable_link_purchased_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloadable_link_purchased`
--

LOCK TABLES `downloadable_link_purchased` WRITE;
/*!40000 ALTER TABLE `downloadable_link_purchased` DISABLE KEYS */;
/*!40000 ALTER TABLE `downloadable_link_purchased` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eu_withdrawals`
--

DROP TABLE IF EXISTS `eu_withdrawals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eu_withdrawals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int unsigned NOT NULL,
  `customer_id` int unsigned DEFAULT NULL,
  `is_guest` tinyint(1) NOT NULL DEFAULT '0',
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_id` int unsigned NOT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason_text` text COLLATE utf8mb4_unicode_ci,
  `received_at` timestamp NOT NULL,
  `confirmation_sent_at` timestamp NULL DEFAULT NULL,
  `final_confirmation_sent_at` timestamp NULL DEFAULT NULL,
  `confirmation_error` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'received',
  `declined_at` timestamp NULL DEFAULT NULL,
  `declined_reason` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `declined_by_user_id` int unsigned DEFAULT NULL,
  `refunded_at` timestamp NULL DEFAULT NULL,
  `refunded_by_user_id` int unsigned DEFAULT NULL,
  `refund_note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eu_withdrawals_order_id_unique` (`order_id`),
  UNIQUE KEY `eu_withdrawals_uuid_unique` (`uuid`),
  KEY `eu_withdrawals_customer_id_index` (`customer_id`),
  KEY `eu_withdrawals_channel_id_status_index` (`channel_id`,`status`),
  KEY `eu_withdrawals_received_at_index` (`received_at`),
  KEY `eu_withdrawals_declined_by_user_id_foreign` (`declined_by_user_id`),
  KEY `eu_withdrawals_refunded_by_user_id_foreign` (`refunded_by_user_id`),
  CONSTRAINT `eu_withdrawals_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `eu_withdrawals_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `eu_withdrawals_declined_by_user_id_foreign` FOREIGN KEY (`declined_by_user_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `eu_withdrawals_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `eu_withdrawals_refunded_by_user_id_foreign` FOREIGN KEY (`refunded_by_user_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eu_withdrawals`
--

LOCK TABLES `eu_withdrawals` WRITE;
/*!40000 ALTER TABLE `eu_withdrawals` DISABLE KEYS */;
/*!40000 ALTER TABLE `eu_withdrawals` ENABLE KEYS */;
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
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `gdpr_data_request`
--

DROP TABLE IF EXISTS `gdpr_data_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gdpr_data_request` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gdpr_data_request_customer_id_foreign` (`customer_id`),
  CONSTRAINT `gdpr_data_request_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gdpr_data_request`
--

LOCK TABLES `gdpr_data_request` WRITE;
/*!40000 ALTER TABLE `gdpr_data_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `gdpr_data_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `import_batches`
--

DROP TABLE IF EXISTS `import_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `import_batches` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `data` json NOT NULL,
  `summary` json DEFAULT NULL,
  `import_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `import_batches_import_id_foreign` (`import_id`),
  CONSTRAINT `import_batches_import_id_foreign` FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `import_batches`
--

LOCK TABLES `import_batches` WRITE;
/*!40000 ALTER TABLE `import_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `import_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imports`
--

DROP TABLE IF EXISTS `imports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imports` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `process_in_queue` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation_strategy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allowed_errors` int NOT NULL DEFAULT '0',
  `processed_rows_count` int NOT NULL DEFAULT '0',
  `invalid_rows_count` int NOT NULL DEFAULT '0',
  `errors_count` int NOT NULL DEFAULT '0',
  `errors` json DEFAULT NULL,
  `field_separator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images_directory_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'directory',
  `images_archive_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` json DEFAULT NULL,
  `started_at` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imports`
--

LOCK TABLES `imports` WRITE;
/*!40000 ALTER TABLE `imports` DISABLE KEYS */;
/*!40000 ALTER TABLE `imports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_adjustment_items`
--

DROP TABLE IF EXISTS `inventory_adjustment_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory_adjustment_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `inventory_adjustment_id` bigint unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `system_qty` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `actual_qty` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `adjusted_qty` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `batch_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_adjustment_items_inventory_adjustment_id_foreign` (`inventory_adjustment_id`),
  KEY `inventory_adjustment_items_product_id_foreign` (`product_id`),
  CONSTRAINT `inventory_adjustment_items_inventory_adjustment_id_foreign` FOREIGN KEY (`inventory_adjustment_id`) REFERENCES `inventory_adjustments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inventory_adjustment_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_adjustment_items`
--

LOCK TABLES `inventory_adjustment_items` WRITE;
/*!40000 ALTER TABLE `inventory_adjustment_items` DISABLE KEYS */;
INSERT INTO `inventory_adjustment_items` VALUES (1,1,41,200.0000,225.0000,25.0000,'NVN-MOR-202609-A1','Fresh harvest intake audit','2026-09-22 07:44:58','2026-09-22 07:44:58');
/*!40000 ALTER TABLE `inventory_adjustment_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_adjustments`
--

DROP TABLE IF EXISTS `inventory_adjustments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory_adjustments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `reference_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventory_source_id` int unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int unsigned DEFAULT NULL,
  `approved_by` int unsigned DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inventory_adjustments_reference_number_unique` (`reference_number`),
  KEY `inventory_adjustments_inventory_source_id_foreign` (`inventory_source_id`),
  KEY `inventory_adjustments_created_by_foreign` (`created_by`),
  KEY `inventory_adjustments_approved_by_foreign` (`approved_by`),
  CONSTRAINT `inventory_adjustments_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `inventory_adjustments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `inventory_adjustments_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_adjustments`
--

LOCK TABLES `inventory_adjustments` WRITE;
/*!40000 ALTER TABLE `inventory_adjustments` DISABLE KEYS */;
INSERT INTO `inventory_adjustments` VALUES (1,'ADJ-TEST-001','increase',1,'completed',1,1,'Test Cleanroom Botanical Intake Verification','2026-09-22 07:44:58','2026-09-22 07:44:58');
/*!40000 ALTER TABLE `inventory_adjustments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_movements`
--

DROP TABLE IF EXISTS `inventory_movements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory_movements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `inventory_source_id` int unsigned NOT NULL,
  `quantity` decimal(12,4) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` bigint unsigned DEFAULT NULL,
  `batch_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_cost` decimal(12,4) DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_movements_product_id_foreign` (`product_id`),
  KEY `inventory_movements_inventory_source_id_foreign` (`inventory_source_id`),
  KEY `inventory_movements_user_id_foreign` (`user_id`),
  CONSTRAINT `inventory_movements_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inventory_movements_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inventory_movements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_movements`
--

LOCK TABLES `inventory_movements` WRITE;
/*!40000 ALTER TABLE `inventory_movements` DISABLE KEYS */;
INSERT INTO `inventory_movements` VALUES (1,41,1,25.0000,'adjustment','adjustment',1,'NVN-MOR-202609-A1',NULL,NULL,1,'Fresh harvest intake audit','Stock adjusted from 200 to 225','2026-09-22 07:44:58','2026-09-22 07:44:58');
/*!40000 ALTER TABLE `inventory_movements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_sources`
--

DROP TABLE IF EXISTS `inventory_sources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory_sources` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int NOT NULL DEFAULT '0',
  `latitude` decimal(10,5) DEFAULT NULL,
  `longitude` decimal(10,5) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inventory_sources_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_sources`
--

LOCK TABLES `inventory_sources` WRITE;
/*!40000 ALTER TABLE `inventory_sources` DISABLE KEYS */;
INSERT INTO `inventory_sources` VALUES (1,'default','Default',NULL,'Default','warehouse@example.com','1234567899',NULL,'US','MI','Detroit','12th Street','48127',0,NULL,NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `inventory_sources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_transfer_items`
--

DROP TABLE IF EXISTS `inventory_transfer_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory_transfer_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `inventory_transfer_id` bigint unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `qty_requested` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `qty_dispatched` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `qty_received` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `batch_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_transfer_items_inventory_transfer_id_foreign` (`inventory_transfer_id`),
  KEY `inventory_transfer_items_product_id_foreign` (`product_id`),
  CONSTRAINT `inventory_transfer_items_inventory_transfer_id_foreign` FOREIGN KEY (`inventory_transfer_id`) REFERENCES `inventory_transfers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inventory_transfer_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_transfer_items`
--

LOCK TABLES `inventory_transfer_items` WRITE;
/*!40000 ALTER TABLE `inventory_transfer_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_transfer_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_transfers`
--

DROP TABLE IF EXISTS `inventory_transfers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory_transfers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `reference_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_location_id` int unsigned NOT NULL,
  `destination_location_id` int unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_by` int unsigned DEFAULT NULL,
  `approved_by` int unsigned DEFAULT NULL,
  `dispatched_at` timestamp NULL DEFAULT NULL,
  `received_at` timestamp NULL DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inventory_transfers_reference_number_unique` (`reference_number`),
  KEY `inventory_transfers_source_location_id_foreign` (`source_location_id`),
  KEY `inventory_transfers_destination_location_id_foreign` (`destination_location_id`),
  KEY `inventory_transfers_requested_by_foreign` (`requested_by`),
  KEY `inventory_transfers_approved_by_foreign` (`approved_by`),
  CONSTRAINT `inventory_transfers_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `inventory_transfers_destination_location_id_foreign` FOREIGN KEY (`destination_location_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inventory_transfers_requested_by_foreign` FOREIGN KEY (`requested_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `inventory_transfers_source_location_id_foreign` FOREIGN KEY (`source_location_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_transfers`
--

LOCK TABLES `inventory_transfers` WRITE;
/*!40000 ALTER TABLE `inventory_transfers` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_transfers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_items`
--

DROP TABLE IF EXISTS `invoice_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_percent` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `price_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `product_id` int unsigned DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item_id` int unsigned DEFAULT NULL,
  `invoice_id` int unsigned DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_items_invoice_id_foreign` (`invoice_id`),
  KEY `invoice_items_parent_id_foreign` (`parent_id`),
  CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  CONSTRAINT `invoice_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `invoice_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_items`
--

LOCK TABLES `invoice_items` WRITE;
/*!40000 ALTER TABLE `invoice_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `increment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT '0',
  `total_qty` int DEFAULT NULL,
  `base_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total` decimal(12,4) DEFAULT '0.0000',
  `grand_total` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total` decimal(12,4) DEFAULT '0.0000',
  `shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `shipping_tax_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_shipping_tax_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `order_id` int unsigned DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reminders` int NOT NULL DEFAULT '0',
  `next_reminder_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_order_id_foreign` (`order_id`),
  CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
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
  `failed_job_ids` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'default','{\"uuid\":\"4ef64ed6-f6e3-47de-9b18-d6eac1116ca4\",\"displayName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"command\":\"O:44:\\\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:4:{s:4:\\\"term\\\";s:7:\\\"moringa\\\";s:7:\\\"results\\\";i:1;s:10:\\\"channel_id\\\";i:1;s:6:\\\"locale\\\";s:2:\\\"en\\\";}}\",\"batchId\":null},\"createdAt\":1790020876,\"delay\":null}',0,NULL,1790020876,1790020876),(2,'default','{\"uuid\":\"08bf7b72-b990-4e2e-8872-d455c06d42c4\",\"displayName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"command\":\"O:44:\\\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:4:{s:4:\\\"term\\\";s:7:\\\"moringa\\\";s:7:\\\"results\\\";i:1;s:10:\\\"channel_id\\\";i:1;s:6:\\\"locale\\\";s:2:\\\"en\\\";}}\",\"batchId\":null},\"createdAt\":1790020935,\"delay\":null}',0,NULL,1790020935,1790020935),(3,'default','{\"uuid\":\"382067a4-31cf-4b0d-a894-8a79670a70c1\",\"displayName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"command\":\"O:44:\\\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:4:{s:4:\\\"term\\\";s:14:\\\"nonexistentxyz\\\";s:7:\\\"results\\\";i:0;s:10:\\\"channel_id\\\";i:1;s:6:\\\"locale\\\";s:2:\\\"en\\\";}}\",\"batchId\":null},\"createdAt\":1790020958,\"delay\":null}',0,NULL,1790020958,1790020958),(4,'default','{\"uuid\":\"c75db56c-487b-4652-9901-69451784f749\",\"displayName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"command\":\"O:44:\\\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:4:{s:4:\\\"term\\\";s:14:\\\"nonexistentxyz\\\";s:7:\\\"results\\\";i:0;s:10:\\\"channel_id\\\";i:1;s:6:\\\"locale\\\";s:2:\\\"en\\\";}}\",\"batchId\":null},\"createdAt\":1790020993,\"delay\":null}',0,NULL,1790020993,1790020993),(5,'default','{\"uuid\":\"f6c45aec-55f8-40aa-a586-0773888cf966\",\"displayName\":\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\CreatedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":17:{s:8:\\\"mailable\\\";O:43:\\\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\CreatedNotification\\\":2:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:25:\\\"Webkul\\\\Sales\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"items\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\",\"batchId\":null},\"createdAt\":1790024852,\"delay\":null}',0,NULL,1790024852,1790024852),(6,'broadcastable','{\"uuid\":\"a77ff573-8511-4585-a9d4-e893339f15af\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":17:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:23:\\\"deleteWhenMissingModels\\\";b:1;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1790024852,\"delay\":null}',0,NULL,1790024852,1790024852),(7,'default','{\"uuid\":\"51b2d5bd-0181-46cd-9a24-4e60566cfc96\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:3:{i:0;i:59;i:1;i:61;i:2;i:41;}}\",\"batchId\":null},\"createdAt\":1790024852,\"delay\":null}',0,NULL,1790024852,1790024852),(8,'default','{\"uuid\":\"511195dd-7d5a-4c95-b3c3-fefef5f7b9ed\",\"displayName\":\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\CreatedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":17:{s:8:\\\"mailable\\\";O:42:\\\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\CreatedNotification\\\":2:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:25:\\\"Webkul\\\\Sales\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:7:{i:0;s:5:\\\"items\\\";i:1;s:9:\\\"all_items\\\";i:2;s:17:\\\"all_items.product\\\";i:3;s:34:\\\"all_items.product.attribute_family\\\";i:4;s:34:\\\"all_items.product.attribute_values\\\";i:5;s:28:\\\"all_items.product.categories\\\";i:6;s:7:\\\"payment\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\",\"batchId\":null},\"createdAt\":1790024852,\"delay\":null}',0,NULL,1790024852,1790024852),(9,'default','{\"uuid\":\"a35c041a-c65e-4b40-a282-bee882083595\",\"displayName\":\"Webkul\\\\Shop\\\\Mail\\\\Customer\\\\SubscriptionNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":17:{s:8:\\\"mailable\\\";O:50:\\\"Webkul\\\\Shop\\\\Mail\\\\Customer\\\\SubscriptionNotification\\\":2:{s:15:\\\"subscribersList\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:34:\\\"Webkul\\\\Core\\\\Models\\\\SubscribersList\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\",\"batchId\":null},\"createdAt\":1790027336,\"delay\":null}',0,NULL,1790027336,1790027336),(10,'default','{\"uuid\":\"79583a30-6120-4428-9055-1d7c13ebdc21\",\"displayName\":\"Webkul\\\\Shop\\\\Mail\\\\Customer\\\\RegistrationNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":17:{s:8:\\\"mailable\\\";O:50:\\\"Webkul\\\\Shop\\\\Mail\\\\Customer\\\\RegistrationNotification\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:31:\\\"Webkul\\\\Customer\\\\Models\\\\Customer\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\",\"batchId\":null},\"createdAt\":1790027336,\"delay\":null}',0,NULL,1790027336,1790027336),(11,'default','{\"uuid\":\"481d1545-07a2-45ab-bbcc-c018da3c73f4\",\"displayName\":\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\CreatedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":17:{s:8:\\\"mailable\\\";O:43:\\\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\CreatedNotification\\\":2:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:25:\\\"Webkul\\\\Sales\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"items\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\",\"batchId\":null},\"createdAt\":1790027709,\"delay\":null}',0,NULL,1790027709,1790027709),(12,'broadcastable','{\"uuid\":\"399bbeb5-51df-4023-86b7-aaa4a89f6876\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":17:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:23:\\\"deleteWhenMissingModels\\\";b:1;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1790027709,\"delay\":null}',0,NULL,1790027709,1790027709),(13,'default','{\"uuid\":\"1d913a51-0771-417e-8890-53c3a4204953\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:41;}}\",\"batchId\":null},\"createdAt\":1790027709,\"delay\":null}',0,NULL,1790027709,1790027709),(14,'default','{\"uuid\":\"0a95a918-1b9a-43b5-b703-c7f3837f9846\",\"displayName\":\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\CreatedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":17:{s:8:\\\"mailable\\\";O:42:\\\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\CreatedNotification\\\":2:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:25:\\\"Webkul\\\\Sales\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:8:{i:0;s:5:\\\"items\\\";i:1;s:9:\\\"all_items\\\";i:2;s:17:\\\"all_items.product\\\";i:3;s:34:\\\"all_items.product.attribute_family\\\";i:4;s:34:\\\"all_items.product.attribute_values\\\";i:5;s:28:\\\"all_items.product.categories\\\";i:6;s:41:\\\"all_items.product.categories.translations\\\";i:7;s:7:\\\"payment\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\",\"batchId\":null},\"createdAt\":1790027709,\"delay\":null}',0,NULL,1790027709,1790027709),(15,'default','{\"uuid\":\"9d6bc2e6-a39b-4438-981a-379757ca9bc0\",\"displayName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"command\":\"O:44:\\\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:4:{s:4:\\\"term\\\";s:7:\\\"moringa\\\";s:7:\\\"results\\\";i:2;s:10:\\\"channel_id\\\";i:1;s:6:\\\"locale\\\";s:2:\\\"en\\\";}}\",\"batchId\":null},\"createdAt\":1790065867,\"delay\":null}',0,NULL,1790065867,1790065867),(16,'default','{\"uuid\":\"378fe6ba-8b9c-4ac9-8278-eeb60b8fc3a3\",\"displayName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"command\":\"O:44:\\\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:4:{s:4:\\\"term\\\";s:7:\\\"moringa\\\";s:7:\\\"results\\\";i:2;s:10:\\\"channel_id\\\";i:1;s:6:\\\"locale\\\";s:2:\\\"en\\\";}}\",\"batchId\":null},\"createdAt\":1790065897,\"delay\":null}',0,NULL,1790065897,1790065897),(17,'default','{\"uuid\":\"bcfd66f6-7c2c-468a-b947-709cffca3ae0\",\"displayName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"command\":\"O:44:\\\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:4:{s:4:\\\"term\\\";s:7:\\\"moringa\\\";s:7:\\\"results\\\";i:2;s:10:\\\"channel_id\\\";i:1;s:6:\\\"locale\\\";s:2:\\\"en\\\";}}\",\"batchId\":null},\"createdAt\":1790065917,\"delay\":null}',0,NULL,1790065917,1790065917),(18,'default','{\"uuid\":\"6c471904-581e-4fd1-bba7-b3cda54fda47\",\"displayName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"command\":\"O:44:\\\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:4:{s:4:\\\"term\\\";s:7:\\\"moringa\\\";s:7:\\\"results\\\";i:2;s:10:\\\"channel_id\\\";i:1;s:6:\\\"locale\\\";s:2:\\\"en\\\";}}\",\"batchId\":null},\"createdAt\":1790070365,\"delay\":null}',0,NULL,1790070365,1790070365),(19,'default','{\"uuid\":\"6b75bead-ddbf-467a-aef0-04e31cc65c09\",\"displayName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"command\":\"O:44:\\\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:4:{s:4:\\\"term\\\";s:7:\\\"moringa\\\";s:7:\\\"results\\\";i:2;s:10:\\\"channel_id\\\";i:1;s:6:\\\"locale\\\";s:2:\\\"en\\\";}}\",\"batchId\":null},\"createdAt\":1790106771,\"delay\":null}',0,NULL,1790106771,1790106771),(20,'default','{\"uuid\":\"c39d9296-372c-444b-9626-bb2e852a53d6\",\"displayName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\",\"command\":\"O:44:\\\"Webkul\\\\Marketing\\\\Jobs\\\\UpdateCreateSearchTerm\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:4:{s:4:\\\"term\\\";s:7:\\\"moringa\\\";s:7:\\\"results\\\";i:2;s:10:\\\"channel_id\\\";i:1;s:6:\\\"locale\\\";s:2:\\\"en\\\";}}\",\"batchId\":null},\"createdAt\":1790303680,\"delay\":null}',0,NULL,1790303680,1790303680);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locales`
--

DROP TABLE IF EXISTS `locales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locales` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` enum('ltr','rtl') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ltr',
  `logo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locales_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locales`
--

LOCK TABLES `locales` WRITE;
/*!40000 ALTER TABLE `locales` DISABLE KEYS */;
INSERT INTO `locales` VALUES (1,'en','English','ltr','locales/jaE5PBcH0HGAC4isuv4Z1Z40fr20pkFlxsm6SOOr.png',NULL,NULL);
/*!40000 ALTER TABLE `locales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marketing_campaigns`
--

DROP TABLE IF EXISTS `marketing_campaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marketing_campaigns` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spooling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_id` int unsigned DEFAULT NULL,
  `customer_group_id` int unsigned DEFAULT NULL,
  `marketing_template_id` int unsigned DEFAULT NULL,
  `marketing_event_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `marketing_campaigns_channel_id_foreign` (`channel_id`),
  KEY `marketing_campaigns_customer_group_id_foreign` (`customer_group_id`),
  KEY `marketing_campaigns_marketing_template_id_foreign` (`marketing_template_id`),
  KEY `marketing_campaigns_marketing_event_id_foreign` (`marketing_event_id`),
  CONSTRAINT `marketing_campaigns_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE SET NULL,
  CONSTRAINT `marketing_campaigns_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE SET NULL,
  CONSTRAINT `marketing_campaigns_marketing_event_id_foreign` FOREIGN KEY (`marketing_event_id`) REFERENCES `marketing_events` (`id`) ON DELETE SET NULL,
  CONSTRAINT `marketing_campaigns_marketing_template_id_foreign` FOREIGN KEY (`marketing_template_id`) REFERENCES `marketing_templates` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marketing_campaigns`
--

LOCK TABLES `marketing_campaigns` WRITE;
/*!40000 ALTER TABLE `marketing_campaigns` DISABLE KEYS */;
/*!40000 ALTER TABLE `marketing_campaigns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marketing_events`
--

DROP TABLE IF EXISTS `marketing_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marketing_events` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marketing_events`
--

LOCK TABLES `marketing_events` WRITE;
/*!40000 ALTER TABLE `marketing_events` DISABLE KEYS */;
INSERT INTO `marketing_events` VALUES (1,'Birthday','Birthday',NULL,NULL,NULL);
/*!40000 ALTER TABLE `marketing_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marketing_templates`
--

DROP TABLE IF EXISTS `marketing_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marketing_templates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marketing_templates`
--

LOCK TABLES `marketing_templates` WRITE;
/*!40000 ALTER TABLE `marketing_templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `marketing_templates` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_admin_password_resets_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2018_06_12_111907_create_admins_table',1),(5,'2018_06_13_055341_create_roles_table',1),(6,'2018_07_05_130148_create_attributes_table',1),(7,'2018_07_05_132854_create_attribute_translations_table',1),(8,'2018_07_05_135150_create_attribute_families_table',1),(9,'2018_07_05_135152_create_attribute_groups_table',1),(10,'2018_07_05_140832_create_attribute_options_table',1),(11,'2018_07_05_140856_create_attribute_option_translations_table',1),(12,'2018_07_05_142820_create_categories_table',1),(13,'2018_07_10_055143_create_locales_table',1),(14,'2018_07_20_054426_create_countries_table',1),(15,'2018_07_20_054502_create_currencies_table',1),(16,'2018_07_20_054542_create_currency_exchange_rates_table',1),(17,'2018_07_20_064849_create_channels_table',1),(18,'2018_07_21_142836_create_category_translations_table',1),(19,'2018_07_23_110040_create_inventory_sources_table',1),(20,'2018_07_24_082635_create_customer_groups_table',1),(21,'2018_07_24_082930_create_customers_table',1),(22,'2018_07_27_065727_create_products_table',1),(23,'2018_07_27_070011_create_product_attribute_values_table',1),(24,'2018_07_27_092623_create_product_reviews_table',1),(25,'2018_07_27_113941_create_product_images_table',1),(26,'2018_07_27_113956_create_product_inventories_table',1),(27,'2018_08_30_064755_create_tax_categories_table',1),(28,'2018_08_30_065042_create_tax_rates_table',1),(29,'2018_08_30_065840_create_tax_mappings_table',1),(30,'2018_09_05_150444_create_cart_table',1),(31,'2018_09_05_150915_create_cart_items_table',1),(32,'2018_09_11_064045_customer_password_resets',1),(33,'2018_09_19_093453_create_cart_payment',1),(34,'2018_09_19_093508_create_cart_shipping_rates_table',1),(35,'2018_09_20_060658_create_core_config_table',1),(36,'2018_09_27_113154_create_orders_table',1),(37,'2018_09_27_113207_create_order_items_table',1),(38,'2018_09_27_115022_create_shipments_table',1),(39,'2018_09_27_115029_create_shipment_items_table',1),(40,'2018_09_27_115135_create_invoices_table',1),(41,'2018_09_27_115144_create_invoice_items_table',1),(42,'2018_10_01_095504_create_order_payment_table',1),(43,'2018_10_03_025230_create_wishlist_table',1),(44,'2018_10_12_101803_create_country_translations_table',1),(45,'2018_10_12_101913_create_country_states_table',1),(46,'2018_10_12_101923_create_country_state_translations_table',1),(47,'2018_11_16_173504_create_subscribers_list_table',1),(48,'2018_11_21_144411_create_cart_item_inventories_table',1),(49,'2018_12_06_185202_create_product_flat_table',1),(50,'2018_12_24_123812_create_channel_inventory_sources_table',1),(51,'2018_12_26_165327_create_product_ordered_inventories_table',1),(52,'2019_05_13_024321_create_cart_rules_table',1),(53,'2019_05_13_024322_create_cart_rule_channels_table',1),(54,'2019_05_13_024323_create_cart_rule_customer_groups_table',1),(55,'2019_05_13_024324_create_cart_rule_translations_table',1),(56,'2019_05_13_024325_create_cart_rule_customers_table',1),(57,'2019_05_13_024326_create_cart_rule_coupons_table',1),(58,'2019_05_13_024327_create_cart_rule_coupon_usage_table',1),(59,'2019_06_17_180258_create_product_downloadable_samples_table',1),(60,'2019_06_17_180314_create_product_downloadable_sample_translations_table',1),(61,'2019_06_17_180325_create_product_downloadable_links_table',1),(62,'2019_06_17_180346_create_product_downloadable_link_translations_table',1),(63,'2019_06_21_202249_create_downloadable_link_purchased_table',1),(64,'2019_07_02_180307_create_booking_products_table',1),(65,'2019_07_05_154415_create_booking_product_default_slots_table',1),(66,'2019_07_05_154429_create_booking_product_appointment_slots_table',1),(67,'2019_07_05_154440_create_booking_product_event_tickets_table',1),(68,'2019_07_05_154451_create_booking_product_rental_slots_table',1),(69,'2019_07_05_154502_create_booking_product_table_slots_table',1),(70,'2019_07_30_153530_create_cms_pages_table',1),(71,'2019_07_31_143339_create_category_filterable_attributes_table',1),(72,'2019_08_02_105320_create_product_grouped_products_table',1),(73,'2019_08_20_170510_create_product_bundle_options_table',1),(74,'2019_08_20_170520_create_product_bundle_option_translations_table',1),(75,'2019_08_20_170528_create_product_bundle_option_products_table',1),(76,'2019_09_11_184511_create_refunds_table',1),(77,'2019_09_11_184519_create_refund_items_table',1),(78,'2019_12_03_184613_create_catalog_rules_table',1),(79,'2019_12_03_184651_create_catalog_rule_channels_table',1),(80,'2019_12_03_184732_create_catalog_rule_customer_groups_table',1),(81,'2019_12_06_101110_create_catalog_rule_products_table',1),(82,'2019_12_06_110507_create_catalog_rule_product_prices_table',1),(83,'2019_12_14_000001_create_personal_access_tokens_table',1),(84,'2020_01_14_191854_create_cms_page_translations_table',1),(85,'2020_01_15_130209_create_cms_page_channels_table',1),(86,'2020_02_18_165639_create_bookings_table',1),(87,'2020_02_21_121201_create_booking_product_event_ticket_translations_table',1),(88,'2020_04_16_185147_add_table_addresses',1),(89,'2020_05_06_171638_create_order_comments_table',1),(90,'2020_05_21_171500_create_product_customer_group_prices_table',1),(91,'2020_06_25_162154_create_customer_social_accounts_table',1),(92,'2020_08_07_174804_create_gdpr_data_request_table',1),(93,'2020_11_19_112228_create_product_videos_table',1),(94,'2020_11_26_141455_create_marketing_templates_table',1),(95,'2020_11_26_150534_create_marketing_events_table',1),(96,'2020_11_26_150644_create_marketing_campaigns_table',1),(97,'2020_12_21_000200_create_channel_translations_table',1),(98,'2020_12_27_121950_create_jobs_table',1),(99,'2021_03_11_212124_create_order_transactions_table',1),(100,'2021_04_07_132010_create_product_review_images_table',1),(101,'2021_12_15_104544_notifications',1),(102,'2022_03_15_160510_create_failed_jobs_table',1),(103,'2022_04_01_094622_create_sitemaps_table',1),(104,'2022_10_03_144232_create_product_price_indices_table',1),(105,'2022_10_04_144444_create_job_batches_table',1),(106,'2022_10_08_134150_create_product_inventory_indices_table',1),(107,'2023_05_26_213105_create_wishlist_items_table',1),(108,'2023_05_26_213120_create_compare_items_table',1),(109,'2023_06_27_163529_rename_product_review_images_to_product_review_attachments',1),(110,'2023_07_06_140013_add_logo_path_column_to_locales',1),(111,'2023_07_10_184256_create_theme_customizations_table',1),(112,'2023_07_12_181722_remove_home_page_and_footer_content_column_from_channel_translations_table',1),(113,'2023_07_20_185324_add_column_column_in_attribute_groups_table',1),(114,'2023_07_25_145943_add_regex_column_in_attributes_table',1),(115,'2023_07_25_165945_drop_notes_column_from_customers_table',1),(116,'2023_07_25_171058_create_customer_notes_table',1),(117,'2023_07_31_125232_rename_image_and_category_banner_columns_from_categories_table',1),(118,'2023_09_15_170053_create_theme_customization_translations_table',1),(119,'2023_09_20_102031_add_default_value_column_in_attributes_table',1),(120,'2023_09_20_102635_add_inventories_group_in_attribute_groups_table',1),(121,'2023_09_26_155709_add_columns_to_currencies',1),(122,'2023_10_12_090446_add_tax_category_id_column_in_order_items_table',1),(123,'2023_11_08_054614_add_code_column_in_attribute_groups_table',1),(124,'2023_11_08_140116_create_search_terms_table',1),(125,'2023_11_09_162805_create_url_rewrites_table',1),(126,'2023_11_17_150401_create_search_synonyms_table',1),(127,'2023_12_11_054614_add_channel_id_column_in_product_price_indices_table',1),(128,'2024_01_11_154640_create_imports_table',1),(129,'2024_01_11_154741_create_import_batches_table',1),(130,'2024_01_19_170350_add_unique_id_column_in_product_attribute_values_table',1),(131,'2024_01_19_170350_add_unique_id_column_in_product_customer_group_prices_table',1),(132,'2024_01_22_170814_add_unique_index_in_mapping_tables',1),(133,'2024_02_26_153000_add_columns_to_addresses_table',1),(134,'2024_03_07_193421_rename_address1_column_in_addresses_table',1),(135,'2024_04_16_144400_add_cart_id_column_in_cart_shipping_rates_table',1),(136,'2024_04_19_102939_add_incl_tax_columns_in_orders_table',1),(137,'2024_04_19_135405_add_incl_tax_columns_in_cart_items_table',1),(138,'2024_04_19_144641_add_incl_tax_columns_in_order_items_table',1),(139,'2024_04_23_133154_add_incl_tax_columns_in_cart_table',1),(140,'2024_04_23_150945_add_incl_tax_columns_in_cart_shipping_rates_table',1),(141,'2024_04_24_102939_add_incl_tax_columns_in_invoices_table',1),(142,'2024_04_24_102939_add_incl_tax_columns_in_refunds_table',1),(143,'2024_04_24_144641_add_incl_tax_columns_in_invoice_items_table',1),(144,'2024_04_24_144641_add_incl_tax_columns_in_refund_items_table',1),(145,'2024_04_24_144641_add_incl_tax_columns_in_shipment_items_table',1),(146,'2024_05_10_152848_create_saved_filters_table',1),(147,'2024_06_03_174128_create_product_channels_table',1),(148,'2024_06_04_130527_add_channel_id_column_in_customers_table',1),(149,'2024_06_04_130600_make_email_unique_per_channel',1),(150,'2024_06_13_184426_add_theme_column_into_theme_customizations_table',1),(151,'2024_07_17_172645_add_additional_column_to_sitemaps_table',1),(152,'2024_08_15_000001_create_recipes_table',1),(153,'2024_08_15_000002_create_recipe_translations_table',1),(154,'2024_08_15_000003_create_recipe_products_table',1),(155,'2024_10_11_135010_create_product_customizable_options_table',1),(156,'2024_10_11_135110_create_product_customizable_option_translations_table',1),(157,'2024_10_11_135228_create_product_customizable_option_prices_table',1),(158,'2025_05_07_121250_update_total_weight_columns_in_shipments_and_weight_shipment_items_tables',1),(159,'2025_09_05_000100_add_indexes_to_channels_tables',1),(160,'2025_09_05_000200_add_indexes_to_product_relation_tables',1),(161,'2025_09_05_000300_add_indexes_to_product_media_and_attributes',1),(162,'2025_09_05_000400_add_indexes_to_attributes_and_product_types',1),(163,'2025_09_05_000500_add_indexes_to_product_grouped_products_and_product_bundle_option_products',1),(164,'2025_09_05_000500_add_indexes_to_url_rewrites_and_visits',1),(165,'2025_09_11_140301_add_two_factor_to_admins',1),(166,'2025_11_14_173810_create_rma_statuses_table',1),(167,'2025_11_14_173812_create_rma_table',1),(168,'2025_11_14_173906_create_rma_reasons_table',1),(169,'2025_11_14_173959_create_rma_items_table',1),(170,'2025_11_14_174030_create_rma_images_table',1),(171,'2025_11_14_174059_create_rma_messages_table',1),(172,'2025_11_14_174134_create_rma_reason_resolutions_table',1),(173,'2025_11_14_174205_create_rma_rules_table',1),(174,'2025_11_14_174355_create_rma_custom_fields_table',1),(175,'2025_11_14_174426_create_rma_custom_field_options_table',1),(176,'2025_11_14_174509_create_rma_additional_fields_table',1),(177,'2026_02_03_151924_create_sessions_table',1),(178,'2026_02_11_095547_add_rma_return_period_to_order_items_table',1),(179,'2026_03_11_113926_create_agent_conversations_table',1),(180,'2026_04_09_120000_change_tax_category_id_fk_on_cart_items_to_null_on_delete',1),(181,'2026_04_09_120100_change_tax_category_id_fk_on_order_items_to_null_on_delete',1),(182,'2026_04_17_000001_add_booking_product_enhancements',1),(183,'2026_04_17_000002_add_allow_cancellation_snapshot_to_bookings',1),(184,'2026_05_27_114230_create_eu_withdrawals_table',1),(185,'2026_06_24_000000_rename_received_package_rma_status',1),(186,'2026_06_24_000001_rename_neutral_rma_statuses',1),(187,'2026_07_03_170000_create_sitemap_channels_table',1),(188,'2026_07_27_000001_add_image_source_to_imports_table',1),(189,'2026_08_12_145032_create_hero_sliders_table',1),(190,'2026_08_12_145033_create_hero_slides_table',1),(191,'2026_08_12_145034_create_hero_layers_table',1),(192,'2026_08_16_015309_create_shipping_zones_table',1),(193,'2026_08_16_015310_create_shipping_zone_locations_table',1),(194,'2026_08_16_015311_create_shipping_zone_methods_table',1),(195,'2026_08_27_054103_add_first_order_only_to_cart_rules_table',1),(196,'2026_08_27_061743_create_inventory_movements_table',1),(197,'2026_08_27_061802_create_inventory_transfers_table',1),(198,'2026_08_27_061809_create_inventory_transfer_items_table',1),(199,'2026_08_27_061816_create_inventory_adjustments_table',1),(200,'2026_08_27_061823_create_inventory_adjustment_items_table',1),(201,'2026_08_27_061830_create_product_batches_table',1),(202,'2026_08_27_063445_add_operational_status_to_orders_table',1),(203,'2026_09_22_100000_create_contact_enquiries_table',2),(204,'2026_09_27_100000_add_subject_to_contact_enquiries_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `order_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_order_id_foreign` (`order_id`),
  CONSTRAINT `notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,'order',0,1,'2026-09-21 21:07:32','2026-09-21 21:07:32'),(2,'order',0,2,'2026-09-21 21:55:09','2026-09-21 21:55:09');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_comments`
--

DROP TABLE IF EXISTS `order_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_notified` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_comments_order_id_foreign` (`order_id`),
  CONSTRAINT `order_comments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_comments`
--

LOCK TABLES `order_comments` WRITE;
/*!40000 ALTER TABLE `order_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(12,4) DEFAULT '0.0000',
  `total_weight` decimal(12,4) DEFAULT '0.0000',
  `qty_ordered` int DEFAULT '0',
  `qty_shipped` int DEFAULT '0',
  `qty_invoiced` int DEFAULT '0',
  `qty_canceled` int DEFAULT '0',
  `qty_refunded` int DEFAULT '0',
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total_invoiced` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total_invoiced` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `amount_refunded` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_amount_refunded` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `discount_percent` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_discount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `discount_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_discount_refunded` decimal(12,4) DEFAULT '0.0000',
  `tax_percent` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `tax_amount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `tax_amount_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount_refunded` decimal(12,4) DEFAULT '0.0000',
  `price_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `product_id` int unsigned DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int unsigned DEFAULT NULL,
  `tax_category_id` int unsigned DEFAULT NULL,
  `parent_id` int unsigned DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `rma_return_period` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_parent_id_foreign` (`parent_id`),
  KEY `order_items_tax_category_id_foreign` (`tax_category_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_tax_category_id_foreign` FOREIGN KEY (`tax_category_id`) REFERENCES `tax_categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,'navanidhi-moringa-pack','configurable','Organic Moringa Leaf Powder — Pure Botanical Pack Sizes',NULL,0.2500,0.2500,1,0,0,0,0,499.0000,499.0000,499.0000,499.0000,0.0000,0.0000,0.0000,0.0000,10.0000,49.9000,49.9000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,499.0000,499.0000,59,'Webkul\\Product\\Models\\Product',1,NULL,NULL,'{\"_token\": \"Gh3qPyjp6sUnWEiP1J44RVWs9NRrpnWOUiePEOKJ\", \"locale\": \"en\", \"cart_id\": 1, \"quantity\": 1, \"attributes\": {\"size\": {\"option_id\": 11, \"option_label\": \"250g Pack\", \"attribute_name\": \"Size\"}}, \"is_buy_now\": \"0\", \"product_id\": \"59\", \"super_attribute\": {\"24\": \"11\"}, \"selected_configurable_option\": \"61\"}',NULL,'2026-09-21 21:07:32','2026-09-21 21:07:32'),(2,'navanidhi-moringa-pack-250g','simple','Organic Moringa Leaf Powder (250g Pack)',NULL,0.0000,0.0000,0,0,0,0,0,1.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,61,'Webkul\\Product\\Models\\Product',1,NULL,1,'{\"locale\": \"en\", \"parent_id\": 59, \"product_id\": 61}',NULL,'2026-09-21 21:07:32','2026-09-21 21:07:32'),(3,'navanidhi-moringa-powder','simple','Organic Moringa Leaf Powder',NULL,0.2500,0.2500,1,0,0,0,0,499.0000,499.0000,499.0000,499.0000,0.0000,0.0000,0.0000,0.0000,10.0000,49.9000,49.9000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,499.0000,499.0000,41,'Webkul\\Product\\Models\\Product',1,NULL,NULL,'{\"_token\": \"Gh3qPyjp6sUnWEiP1J44RVWs9NRrpnWOUiePEOKJ\", \"locale\": \"en\", \"cart_id\": 1, \"quantity\": 1, \"is_buy_now\": \"0\", \"product_id\": \"41\"}',NULL,'2026-09-21 21:07:32','2026-09-21 21:07:32'),(4,'navanidhi-moringa-powder','simple','Organic Moringa Leaf Powder',NULL,0.2500,0.2500,1,0,0,0,0,499.0000,499.0000,499.0000,499.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,499.0000,499.0000,41,'Webkul\\Product\\Models\\Product',2,NULL,NULL,'{\"_token\": \"Gh3qPyjp6sUnWEiP1J44RVWs9NRrpnWOUiePEOKJ\", \"locale\": \"en\", \"cart_id\": 2, \"quantity\": 1, \"is_buy_now\": \"0\", \"product_id\": \"41\"}',NULL,'2026-09-21 21:55:09','2026-09-21 21:55:09');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_payment`
--

DROP TABLE IF EXISTS `order_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_payment` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_payment_order_id_foreign` (`order_id`),
  CONSTRAINT `order_payment_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_payment`
--

LOCK TABLES `order_payment` WRITE;
/*!40000 ALTER TABLE `order_payment` DISABLE KEYS */;
INSERT INTO `order_payment` VALUES (1,1,'moneytransfer','Money Transfer',NULL,'2026-09-21 21:07:32','2026-09-21 21:07:32'),(2,2,'moneytransfer','Money Transfer',NULL,'2026-09-21 21:55:09','2026-09-21 21:55:09');
/*!40000 ALTER TABLE `order_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_transactions`
--

DROP TABLE IF EXISTS `order_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_transactions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(12,4) DEFAULT '0.0000',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` json DEFAULT NULL,
  `invoice_id` int unsigned NOT NULL,
  `order_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_transactions_order_id_foreign` (`order_id`),
  CONSTRAINT `order_transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_transactions`
--

LOCK TABLES `order_transactions` WRITE;
/*!40000 ALTER TABLE `order_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `increment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operational_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tracks granular fulfillment like PACKING, READY TO SHIP, SHIPPED, DELIVERED',
  `channel_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_guest` tinyint(1) DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_gift` tinyint(1) NOT NULL DEFAULT '0',
  `total_item_count` int DEFAULT NULL,
  `total_qty_ordered` int DEFAULT NULL,
  `base_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total` decimal(12,4) DEFAULT '0.0000',
  `grand_total_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total_invoiced` decimal(12,4) DEFAULT '0.0000',
  `grand_total_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total_refunded` decimal(12,4) DEFAULT '0.0000',
  `sub_total` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total` decimal(12,4) DEFAULT '0.0000',
  `sub_total_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total_invoiced` decimal(12,4) DEFAULT '0.0000',
  `sub_total_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total_refunded` decimal(12,4) DEFAULT '0.0000',
  `discount_percent` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_discount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `discount_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_discount_refunded` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `tax_amount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `tax_amount_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount_refunded` decimal(12,4) DEFAULT '0.0000',
  `shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `shipping_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_invoiced` decimal(12,4) DEFAULT '0.0000',
  `shipping_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_refunded` decimal(12,4) DEFAULT '0.0000',
  `shipping_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `shipping_tax_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_shipping_tax_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `shipping_tax_refunded` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_shipping_tax_refunded` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `customer_id` int unsigned DEFAULT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_id` int unsigned DEFAULT NULL,
  `channel_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_id` int DEFAULT NULL,
  `applied_cart_rule_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_increment_id_unique` (`increment_id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  KEY `orders_channel_id_foreign` (`channel_id`),
  CONSTRAINT `orders_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'1','pending',NULL,'Navanidhi Naturals',1,'aarav.sharma@example.com','Aarav','Sharma','navanidhi_2','Navanidhi Naturals Shipping - Free Shipping (Over 499)','','NAVANIDHI10',0,2,2,'INR','INR','INR',898.2000,898.2000,0.0000,0.0000,0.0000,0.0000,998.0000,998.0000,0.0000,0.0000,0.0000,0.0000,0.0000,99.8000,99.8000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,998.0000,998.0000,0.0000,0.0000,NULL,NULL,1,'Webkul\\Core\\Models\\Channel',1,'2','2026-09-21 21:07:32','2026-09-21 21:07:32'),(2,'2','completed','DELIVERED','Navanidhi Naturals',0,'aarav.reddy@example.com','Aarav','Reddy','navanidhi_2','Navanidhi Naturals Shipping - Free Shipping (Over 499)','',NULL,0,1,1,'INR','INR','INR',499.0000,499.0000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,0.0000,499.0000,499.0000,0.0000,0.0000,1,'Webkul\\Customer\\Models\\Customer',1,'Webkul\\Core\\Models\\Channel',2,'','2026-09-21 21:55:09','2026-09-21 22:01:54');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_attribute_values`
--

DROP TABLE IF EXISTS `product_attribute_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_attribute_values` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_value` text COLLATE utf8mb4_unicode_ci,
  `boolean_value` tinyint(1) DEFAULT NULL,
  `integer_value` int DEFAULT NULL,
  `float_value` decimal(12,4) DEFAULT NULL,
  `datetime_value` datetime DEFAULT NULL,
  `date_value` date DEFAULT NULL,
  `json_value` json DEFAULT NULL,
  `product_id` int unsigned NOT NULL,
  `attribute_id` int unsigned NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chanel_locale_attribute_value_index_unique` (`channel`,`locale`,`attribute_id`,`product_id`),
  UNIQUE KEY `product_attribute_values_unique_id_unique` (`unique_id`),
  KEY `product_attribute_values_attribute_id_foreign` (`attribute_id`),
  KEY `prod_attr_product_id_idx` (`product_id`),
  CONSTRAINT `product_attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_attribute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=119070 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_attribute_values`
--

LOCK TABLES `product_attribute_values` WRITE;
/*!40000 ALTER TABLE `product_attribute_values` DISABLE KEYS */;
INSERT INTO `product_attribute_values` VALUES (85492,NULL,NULL,'navanidhi-moringa-powder',NULL,NULL,NULL,NULL,NULL,NULL,3538,1,NULL),(85493,'en','default','Organic Moringa Leaf Powder',NULL,NULL,NULL,NULL,NULL,NULL,3538,2,NULL),(85494,'en',NULL,'organic-moringa-leaf-powder',NULL,NULL,NULL,NULL,NULL,NULL,3538,3,NULL),(85495,'en','default','Sustainably harvested, shade-dried moringa leaves ground into a fine, nutrient-dense powder. Rich in vitamins A, C, iron and calcium.',NULL,NULL,NULL,NULL,NULL,NULL,3538,9,NULL),(85496,'en','default','<h2>Navanidhi Naturals Organic Moringa Leaf Powder</h2><p>Our moringa leaves are hand-harvested from certified organic farms in South India by MAN Agro Foods, carefully shade-dried to preserve maximum nutrient density, then stone-ground into a silky-fine powder.</p><h3>Key Benefits</h3><ul><li>Rich in Vitamins A, C, E and K</li><li>Complete amino acid profile</li><li>Natural source of iron and calcium</li><li>Supports immune function and vitality</li></ul><h3>How to Use</h3><p>Add 1 teaspoon to smoothies, warm water with lemon, soups, or sprinkle over salads. Best consumed in the morning for sustained energy.</p><h3>Specifications</h3><p>Net Weight: 250g | Servings: ~50 | Brand: Navanidhi Naturals | Origin: South India | Zero Synthetics</p>',NULL,NULL,NULL,NULL,NULL,NULL,3538,10,NULL),(85497,NULL,NULL,NULL,NULL,NULL,599.0000,NULL,NULL,NULL,3538,11,NULL),(85498,'en','default','Organic Moringa Leaf Powder | Navanidhi Naturals',NULL,NULL,NULL,NULL,NULL,NULL,3538,16,NULL),(85499,'en','default','Premium organic moringa leaf powder by Navanidhi Naturals. Shade-dried, stone-ground. Rich in vitamins A, C, iron & calcium. 250g.',NULL,NULL,NULL,NULL,NULL,NULL,3538,18,NULL),(85500,NULL,NULL,'0.25',NULL,NULL,NULL,NULL,NULL,NULL,3538,22,NULL),(85501,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3538,5,NULL),(85502,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3538,6,NULL),(85503,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3538,7,NULL),(85504,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3538,8,NULL),(85505,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3538,26,NULL),(85506,NULL,NULL,NULL,NULL,NULL,499.0000,NULL,NULL,NULL,3538,13,NULL),(85507,NULL,NULL,'navanidhi-beetroot-powder',NULL,NULL,NULL,NULL,NULL,NULL,3539,1,NULL),(85508,'en','default','Dehydrated Beetroot Powder',NULL,NULL,NULL,NULL,NULL,NULL,3539,2,NULL),(85509,'en',NULL,'dehydrated-beetroot-powder',NULL,NULL,NULL,NULL,NULL,NULL,3539,3,NULL),(85510,'en','default','Vibrant ruby-red beetroot powder made from slow-dehydrated farm-fresh beets. Natural source of dietary nitrates and antioxidants.',NULL,NULL,NULL,NULL,NULL,NULL,3539,9,NULL),(85511,'en','default','<h2>Navanidhi Naturals Dehydrated Beetroot Powder</h2><p>Sourced from premium Indian beetroot by MAN Agro Foods, our powder is created through a gentle low-temperature dehydration process that preserves the deep ruby colour, earthy sweetness, and full nutritional profile.</p><h3>Key Benefits</h3><ul><li>Natural source of dietary nitrates</li><li>Supports cardiovascular health</li><li>Rich in folate and manganese</li><li>Natural food colouring for baking</li></ul><h3>How to Use</h3><p>Mix 1-2 teaspoons into smoothies, juices, lattes, or baked goods. Use as a natural food colourant for pastas, breads, and desserts.</p><h3>Specifications</h3><p>Net Weight: 200g | Servings: ~40 | Brand: Navanidhi Naturals | Processing: Low-temperature dehydration</p>',NULL,NULL,NULL,NULL,NULL,NULL,3539,10,NULL),(85512,NULL,NULL,NULL,NULL,NULL,449.0000,NULL,NULL,NULL,3539,11,NULL),(85513,'en','default','Dehydrated Beetroot Powder | Navanidhi Naturals',NULL,NULL,NULL,NULL,NULL,NULL,3539,16,NULL),(85514,'en','default','Pure dehydrated beetroot powder. Low-temperature processed. Natural nitrates & antioxidants. 200g.',NULL,NULL,NULL,NULL,NULL,NULL,3539,18,NULL),(85515,NULL,NULL,'0.2',NULL,NULL,NULL,NULL,NULL,NULL,3539,22,NULL),(85516,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,3539,5,NULL),(85517,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3539,6,NULL),(85518,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3539,7,NULL),(85519,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3539,8,NULL),(85520,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3539,26,NULL),(85521,NULL,NULL,'navanidhi-amla-powder',NULL,NULL,NULL,NULL,NULL,NULL,3540,1,NULL),(85522,'en','default','Wild-Harvested Amla Powder',NULL,NULL,NULL,NULL,NULL,NULL,3540,2,NULL),(85523,'en',NULL,'wild-harvested-amla-powder',NULL,NULL,NULL,NULL,NULL,NULL,3540,3,NULL),(85524,'en','default','Wild-harvested Indian gooseberry (amla) gently dried and ground. One of nature richest sources of vitamin C and powerful antioxidants.',NULL,NULL,NULL,NULL,NULL,NULL,3540,9,NULL),(85525,'en','default','<h2>Navanidhi Naturals Wild-Harvested Amla Powder</h2><p>Our amla is wild-harvested from ancient gooseberry groves by MAN Agro Foods. Each berry is hand-selected at peak ripeness, carefully deseeded, and gently dried at low temperatures with zero artificial preservatives, maltodextrin, or synthetic fillers to preserve its extraordinary natural vitamin C and polyphenol content.</p><h3>Key Benefits</h3><ul><li>One of nature richest bioavailable sources of Vitamin C</li><li>Powerful cellular antioxidant protection</li><li>Supports radiant hair, skin firmness, and digestive vitality</li><li>100% pure wild-collected whole fruit with zero additives</li></ul><h3>How to Use</h3><p>Dissolve 1 teaspoon in warm water with raw honey, blend into fresh juices, or mix into yogurt. Also celebrated in traditional hair and face mask rituals.</p><h3>Specifications</h3><p>Net Weight: 200g | Servings: ~40 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Harvest: Wild-collected Indian groves</p>',NULL,NULL,NULL,NULL,NULL,NULL,3540,10,NULL),(85526,NULL,NULL,NULL,NULL,NULL,399.0000,NULL,NULL,NULL,3540,11,NULL),(85527,'en','default','Wild-Harvested Amla Powder | Navanidhi Naturals',NULL,NULL,NULL,NULL,NULL,NULL,3540,16,NULL),(85528,'en','default','Wild-harvested amla (Indian gooseberry) powder. Richest natural vitamin C source by MAN Agro Foods. 200g.',NULL,NULL,NULL,NULL,NULL,NULL,3540,18,NULL),(85529,NULL,NULL,'0.2',NULL,NULL,NULL,NULL,NULL,NULL,3540,22,NULL),(85530,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,3540,5,NULL),(85531,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,3540,6,NULL),(85532,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3540,7,NULL),(85533,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3540,8,NULL),(85534,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3540,26,NULL),(85535,NULL,NULL,'navanidhi-turmeric-powder',NULL,NULL,NULL,NULL,NULL,NULL,3541,1,NULL),(85536,'en','default','Lakadong Turmeric Powder',NULL,NULL,NULL,NULL,NULL,NULL,3541,2,NULL),(85537,'en',NULL,'lakadong-turmeric-powder',NULL,NULL,NULL,NULL,NULL,NULL,3541,3,NULL),(85538,'en','default','Ultra-premium Lakadong turmeric from Meghalaya with 7-9% natural curcumin — the highest natural curcumin concentration available in pure spices.',NULL,NULL,NULL,NULL,NULL,NULL,3541,9,NULL),(85539,'en','default','<h2>Navanidhi Naturals Lakadong Turmeric Powder</h2><p>Lakadong turmeric is celebrated worldwide as nature most potent anti-inflammatory spice, sustainably grown in the pristine valleys of Meghalaya by local farmers and brought to you by MAN Agro Foods. With a high 7-9% natural curcumin content (compared to only 2-3% in standard commercial turmeric), it offers extraordinary therapeutic potency, rich earthy aroma, and deep natural golden hue without any chemical polishing or lead chromate.</p><h3>Key Benefits</h3><ul><li>7-9% natural bio-active curcumin content</li><li>Zero lead chromate, chemical dyes, or starch adulterants</li><li>Stone-ground at low temperatures to protect volatile essential oils</li><li>Dual-purpose: Pure authentic kitchen spice & Ayurvedic golden milk elixir</li></ul><h3>How to Use</h3><p>Use in golden milk (haldi doodh), dals, daily curries, warm lemon water, or tonics. Combine with black pepper and healthy fats for maximum bioavailability.</p><h3>Specifications</h3><p>Net Weight: 200g | Origin: Meghalaya, India | Curcumin: 7-9% | Brand: Navanidhi Naturals (MAN Agro Foods)</p>',NULL,NULL,NULL,NULL,NULL,NULL,3541,10,NULL),(85540,NULL,NULL,NULL,NULL,NULL,699.0000,NULL,NULL,NULL,3541,11,NULL),(85541,'en','default','Lakadong Turmeric Powder | High Curcumin Pure Spice | Navanidhi Naturals',NULL,NULL,NULL,NULL,NULL,NULL,3541,16,NULL),(85542,'en','default','Ultra-premium Lakadong turmeric with 7-9% curcumin. 100% pure, farm direct by MAN Agro Foods. 200g.',NULL,NULL,NULL,NULL,NULL,NULL,3541,18,NULL),(85543,NULL,NULL,'0.2',NULL,NULL,NULL,NULL,NULL,NULL,3541,22,NULL),(85544,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3541,5,NULL),(85545,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3541,6,NULL),(85546,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3541,7,NULL),(85547,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3541,8,NULL),(85548,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3541,26,NULL),(85549,NULL,NULL,NULL,NULL,NULL,599.0000,NULL,NULL,NULL,3541,13,NULL),(85550,NULL,NULL,'navanidhi-red-chilli-powder',NULL,NULL,NULL,NULL,NULL,NULL,3542,1,NULL),(85551,'en','default','Pure Red Chilli Powder',NULL,NULL,NULL,NULL,NULL,NULL,3542,2,NULL),(85552,'en',NULL,'pure-red-chilli-powder',NULL,NULL,NULL,NULL,NULL,NULL,3542,3,NULL),(85553,'en','default','Sun-dried premium red chillies stone-ground to perfection. Vibrant natural red colour, authentic medium-hot pungency, zero added colours (Sudan dye-free), and zero preservatives.',NULL,NULL,NULL,NULL,NULL,NULL,3542,9,NULL),(85554,'en','default','<h2>Navanidhi Naturals Pure Red Chilli Powder</h2><p>Sourced directly from certified farmers in Guntur and Byadgi by MAN Agro Foods, our chillies are naturally sun-cured, destemmed, and stone-ground at low temperatures. We never add synthetic dyes, sawdust, brick powder, or chemical preservatives — delivering the authentic aroma, rich natural red hue, and balanced warmth that true Indian cuisine deserves.</p><h3>Key Highlights</h3><ul><li>100% Pure & Unadulterated (Zero Sudan Dyes, Zero Added Colours)</li><li>Stone-ground at low speed to retain volatile essential capsaicin oils</li><li>Carefully destemmed and cleaned before milling</li><li>Rich in natural Vitamin C and antioxidant capsaicin</li></ul><h3>Culinary Usage</h3><p>Essential for everyday curries, dals, sambhar, marinades, and seasoning. Delivers rich natural colour and authentic Indian heat without burning harshness.</p><h3>Specifications</h3><p>Net Weight: 200g | Origin: Andhra Pradesh / Karnataka, India | Pungency: Medium-Hot | Purity: 100% Pure Stemless Chillies | Brand: Navanidhi Naturals (MAN Agro Foods)</p>',NULL,NULL,NULL,NULL,NULL,NULL,3542,10,NULL),(85555,NULL,NULL,NULL,NULL,NULL,199.0000,NULL,NULL,NULL,3542,11,NULL),(85556,'en','default','Pure Red Chilli Powder | 100% Unadulterated Indian Spice | Navanidhi Naturals',NULL,NULL,NULL,NULL,NULL,NULL,3542,16,NULL),(85557,'en','default','Farm-fresh, sun-dried Red Chilli Powder stone-ground by MAN Agro Foods. 100% pure, zero artificial colours or Sudan dyes. 200g.',NULL,NULL,NULL,NULL,NULL,NULL,3542,18,NULL),(85558,NULL,NULL,'0.2',NULL,NULL,NULL,NULL,NULL,NULL,3542,22,NULL),(85559,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3542,5,NULL),(85560,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3542,6,NULL),(85561,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3542,7,NULL),(85562,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3542,8,NULL),(85563,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3542,26,NULL),(85564,NULL,NULL,NULL,NULL,NULL,169.0000,NULL,NULL,NULL,3542,13,NULL),(85565,NULL,NULL,'navanidhi-green-vitality',NULL,NULL,NULL,NULL,NULL,NULL,3543,1,NULL),(85566,'en','default','Green Vitality Superblend',NULL,NULL,NULL,NULL,NULL,NULL,3543,2,NULL),(85567,'en',NULL,'green-vitality-superblend',NULL,NULL,NULL,NULL,NULL,NULL,3543,3,NULL),(85568,'en','default','A synergistic blend of 8 organic greens — moringa, spirulina, wheatgrass, chlorella, spinach, matcha, ashwagandha and tulsi — for comprehensive daily nutrition.',NULL,NULL,NULL,NULL,NULL,NULL,3543,9,NULL),(85569,'en','default','<h2>Navanidhi Naturals Green Vitality Superblend</h2><p>Crafted by MAN Agro Foods, our signature daily greens formula combines eight of the world most nutrient-dense botanicals into one easy serving with zero maltodextrin, zero added sugars, and zero artificial flavors. Each ingredient is individually sourced from certified growers and cold-milled below 42°C for optimal living enzyme synergy.</p><h3>Ingredients</h3><ul><li>Organic Moringa Leaf</li><li>Spirulina</li><li>Wheatgrass</li><li>Chlorella (broken cell wall)</li><li>Organic Spinach</li><li>Ceremonial Grade Matcha</li><li>KSM-66 Ashwagandha</li><li>Holy Basil (Tulsi)</li></ul><h3>How to Use</h3><p>Blend 1 scoop (10g) into cold water, fresh coconut water, or your morning smoothie. Best taken on an empty stomach for cellular alkalization.</p><h3>Specifications</h3><p>Net Weight: 300g | Servings: 30 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Testing: Heavy metal & NABL lab verified</p>',NULL,NULL,NULL,NULL,NULL,NULL,3543,10,NULL),(85570,NULL,NULL,NULL,NULL,NULL,899.0000,NULL,NULL,NULL,3543,11,NULL),(85571,'en','default','Green Vitality Superblend | Navanidhi Naturals',NULL,NULL,NULL,NULL,NULL,NULL,3543,16,NULL),(85572,'en','default','8-ingredient organic greens superblend by MAN Agro Foods. Moringa, spirulina, wheatgrass, chlorella & more. 300g.',NULL,NULL,NULL,NULL,NULL,NULL,3543,18,NULL),(85573,NULL,NULL,'0.3',NULL,NULL,NULL,NULL,NULL,NULL,3543,22,NULL),(85574,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3543,5,NULL),(85575,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3543,6,NULL),(85576,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3543,7,NULL),(85577,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3543,8,NULL),(85578,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3543,26,NULL),(85579,NULL,NULL,NULL,NULL,NULL,799.0000,NULL,NULL,NULL,3543,13,NULL),(85580,NULL,NULL,'navanidhi-golden-immunity',NULL,NULL,NULL,NULL,NULL,NULL,3544,1,NULL),(85581,'en','default','Golden Immunity Elixir Blend',NULL,NULL,NULL,NULL,NULL,NULL,3544,2,NULL),(85582,'en',NULL,'golden-immunity-elixir-blend',NULL,NULL,NULL,NULL,NULL,NULL,3544,3,NULL),(85583,'en','default','A warming Ayurvedic-inspired blend of Lakadong turmeric, ginger, black pepper, cinnamon, cardamom and saffron for immune support and inflammation defence.',NULL,NULL,NULL,NULL,NULL,NULL,3544,9,NULL),(85584,'en','default','<h2>Navanidhi Naturals Golden Immunity Elixir Blend</h2><p>Inspired by the ancient Ayurvedic tradition of golden milk and formulated by MAN Agro Foods, our elixir blend combines premium Lakadong turmeric (guaranteed 7%+ curcumin) with synergistic warming Indian spices and black pepper BioPerine for maximum curcumin bioavailability without chemical additives.</p><h3>Ingredients</h3><ul><li>Lakadong Turmeric (7%+ curcumin)</li><li>Organic Ginger Root</li><li>Black Pepper Extract (BioPerine)</li><li>Ceylon Cinnamon</li><li>Green Cardamom</li><li>Kashmir Saffron</li></ul><h3>How to Use</h3><p>Stir 1 teaspoon into warm milk (dairy or plant-based) with a touch of honey or ghee. Perfect as an evening restorative ritual.</p><h3>Specifications</h3><p>Net Weight: 250g | Servings: ~50 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Features: BioPerine enhanced absorption</p>',NULL,NULL,NULL,NULL,NULL,NULL,3544,10,NULL),(85585,NULL,NULL,NULL,NULL,NULL,749.0000,NULL,NULL,NULL,3544,11,NULL),(85586,'en','default','Golden Immunity Elixir Blend | Navanidhi Naturals',NULL,NULL,NULL,NULL,NULL,NULL,3544,16,NULL),(85587,'en','default','Ayurvedic golden milk blend with Lakadong turmeric, saffron, BioPerine by MAN Agro Foods. 250g.',NULL,NULL,NULL,NULL,NULL,NULL,3544,18,NULL),(85588,NULL,NULL,'0.25',NULL,NULL,NULL,NULL,NULL,NULL,3544,22,NULL),(85589,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,3544,5,NULL),(85590,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3544,6,NULL),(85591,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3544,7,NULL),(85592,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3544,8,NULL),(85593,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3544,26,NULL),(85594,NULL,NULL,'navanidhi-beauty-bloom',NULL,NULL,NULL,NULL,NULL,NULL,3545,1,NULL),(85595,'en','default','Beauty Bloom Collagen Booster',NULL,NULL,NULL,NULL,NULL,NULL,3545,2,NULL),(85596,'en',NULL,'beauty-bloom-collagen-booster',NULL,NULL,NULL,NULL,NULL,NULL,3545,3,NULL),(85597,'en','default','A plant-based beauty blend of amla, hibiscus, rose petal, aloe vera, vitamin E-rich moringa and biotin-rich bamboo shoot for radiant skin, hair and nails.',NULL,NULL,NULL,NULL,NULL,NULL,3545,9,NULL),(85598,'en','default','<h2>Navanidhi Naturals Beauty Bloom Collagen Booster</h2><p>Developed by MAN Agro Foods, Beauty Bloom is a 100% whole plant formulation that works from within. Our formula combines traditional Ayurvedic beauty botanicals with modern nutritional science to support natural collagen production—completely free from animal collagen, synthetic biotin, or maltodextrin fillers.</p><h3>Ingredients</h3><ul><li>Amla (Vitamin C for natural collagen synthesis)</li><li>Hibiscus Flower</li><li>Rose Petal Extract</li><li>Aloe Vera</li><li>Moringa Leaf (Vitamin E)</li><li>Bamboo Shoot Extract (standardised natural silica & biotin)</li></ul><h3>How to Use</h3><p>Mix 1 scoop (8g) into water, fresh juice, or a morning bowl. Take daily for visible results in 4-6 weeks.</p><h3>Specifications</h3><p>Net Weight: 250g | Servings: ~30 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Type: 100% Plant-based</p>',NULL,NULL,NULL,NULL,NULL,NULL,3545,10,NULL),(85599,NULL,NULL,NULL,NULL,NULL,999.0000,NULL,NULL,NULL,3545,11,NULL),(85600,'en','default','Beauty Bloom Collagen Booster | Navanidhi Naturals',NULL,NULL,NULL,NULL,NULL,NULL,3545,16,NULL),(85601,'en','default','Plant-based beauty blend for skin, hair & nails by MAN Agro Foods. Amla, hibiscus, rose petal. 250g.',NULL,NULL,NULL,NULL,NULL,NULL,3545,18,NULL),(85602,NULL,NULL,'0.25',NULL,NULL,NULL,NULL,NULL,NULL,3545,22,NULL),(85603,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3545,5,NULL),(85604,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,3545,6,NULL),(85605,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3545,7,NULL),(85606,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3545,8,NULL),(85607,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3545,26,NULL),(85608,NULL,NULL,NULL,NULL,NULL,849.0000,NULL,NULL,NULL,3545,13,NULL),(85609,NULL,NULL,'navanidhi-curry-leaf-powder',NULL,NULL,NULL,NULL,NULL,NULL,3546,1,NULL),(85610,'en','default','Sun-Dried Curry Leaf Powder',NULL,NULL,NULL,NULL,NULL,NULL,3546,2,NULL),(85611,'en',NULL,'sun-dried-curry-leaf-powder',NULL,NULL,NULL,NULL,NULL,NULL,3546,3,NULL),(85612,'en','default','Aromatic sun-dried curry leaves from Kerala, stone-ground to a fine powder. Retains the intense flavour and iron content of fresh leaves year-round.',NULL,NULL,NULL,NULL,NULL,NULL,3546,9,NULL),(85613,'en','default','<h2>Navanidhi Naturals Sun-Dried Curry Leaf Powder</h2><p>Sourced directly from organic curry leaf farms by MAN Agro Foods, our leaves are picked at dawn for maximum aromatic oil content, sun-dried within hours, and stone-ground into a fragrant fine powder.</p><h3>Key Benefits</h3><ul><li>Intense natural flavour — better than dried leaves</li><li>Excellent source of iron and folic acid</li><li>Rich in antioxidants</li><li>Traditional hair and skin tonic</li></ul><h3>How to Use</h3><p>Add to tempering (tadka), rice dishes, chutneys, rasam, sambar, buttermilk, or smoothies. Sprinkle over yogurt or dals for instant flavour.</p><h3>Specifications</h3><p>Net Weight: 150g | Origin: Kerala, India | Processing: Sun-dried, stone-ground</p>',NULL,NULL,NULL,NULL,NULL,NULL,3546,10,NULL),(85614,NULL,NULL,NULL,NULL,NULL,349.0000,NULL,NULL,NULL,3546,11,NULL),(85615,'en','default','Sun-Dried Curry Leaf Powder | Navanidhi Naturals',NULL,NULL,NULL,NULL,NULL,NULL,3546,16,NULL),(85616,'en','default','Premium Kerala curry leaf powder. Sun-dried, stone-ground. Rich iron source. 150g.',NULL,NULL,NULL,NULL,NULL,NULL,3546,18,NULL),(85617,NULL,NULL,'0.15',NULL,NULL,NULL,NULL,NULL,NULL,3546,22,NULL),(85618,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,3546,5,NULL),(85619,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,3546,6,NULL),(85620,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3546,7,NULL),(85621,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3546,8,NULL),(85622,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3546,26,NULL),(85623,NULL,NULL,'navanidhi-ashwagandha-powder',NULL,NULL,NULL,NULL,NULL,NULL,3547,1,NULL),(85624,'en','default','KSM-66 Ashwagandha Root Powder',NULL,NULL,NULL,NULL,NULL,NULL,3547,2,NULL),(85625,'en',NULL,'ksm-66-ashwagandha-root-powder',NULL,NULL,NULL,NULL,NULL,NULL,3547,3,NULL),(85626,'en','default','Premium KSM-66 ashwagandha root extract powder — the world most clinically studied ashwagandha, standardised to 5% withanolides for stress relief and vitality.',NULL,NULL,NULL,NULL,NULL,NULL,3547,9,NULL),(85627,'en','default','<h2>Navanidhi Naturals KSM-66 Ashwagandha Root Powder</h2><p>Packaged under strict clean-label standards by MAN Agro Foods, we use only the gold-standard KSM-66 ashwagandha root extract, produced through a solvent-free traditional process that preserves the full spectrum of active withanolides for stress relief, cortisol balance, and restorative vitality.</p><h3>Key Benefits</h3><ul><li>Standardised to 5% active withanolides</li><li>Clinically studied stress and cortisol reduction</li><li>Supports physical stamina and workout recovery</li><li>Enhances cognitive clarity, memory, and sleep depth</li></ul><h3>How to Use</h3><p>Mix 1 teaspoon (3g) into warm milk, herbal tea, or bedtime golden elixir 30 minutes before sleep.</p><h3>Specifications</h3><p>Net Weight: 200g | Servings: ~66 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Extract: KSM-66</p>',NULL,NULL,NULL,NULL,NULL,NULL,3547,10,NULL),(85628,NULL,NULL,NULL,NULL,NULL,799.0000,NULL,NULL,NULL,3547,11,NULL),(85629,'en','default','KSM-66 Ashwagandha Root Powder | Navanidhi Naturals',NULL,NULL,NULL,NULL,NULL,NULL,3547,16,NULL),(85630,'en','default','Premium KSM-66 ashwagandha. 5% withanolides. Clinically studied for stress relief & vitality by MAN Agro Foods. 200g.',NULL,NULL,NULL,NULL,NULL,NULL,3547,18,NULL),(85631,NULL,NULL,'0.2',NULL,NULL,NULL,NULL,NULL,NULL,3547,22,NULL),(85632,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,3547,5,NULL),(85633,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3547,6,NULL),(85634,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3547,7,NULL),(85635,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3547,8,NULL),(85636,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3547,26,NULL),(85637,NULL,NULL,NULL,NULL,NULL,699.0000,NULL,NULL,NULL,3547,13,NULL),(85638,NULL,NULL,'navanidhi-spirulina-powder',NULL,NULL,NULL,NULL,NULL,NULL,3548,1,NULL),(85639,'en','default','Artisanal Spirulina Powder',NULL,NULL,NULL,NULL,NULL,NULL,3548,2,NULL),(85640,'en',NULL,'artisanal-spirulina-powder',NULL,NULL,NULL,NULL,NULL,NULL,3548,3,NULL),(85641,'en','default','Farm-fresh spirulina cultivated in pristine freshwater ponds in Tamil Nadu. Air-dried at low temperatures to preserve phycocyanin and complete protein.',NULL,NULL,NULL,NULL,NULL,NULL,3548,9,NULL),(85642,'en','default','<h2>Navanidhi Naturals Artisanal Spirulina Powder</h2><p>Cultivated in pristine freshwater ponds in Tamil Nadu and processed by MAN Agro Foods, our artisanal spirulina is harvested daily and immediately air-dried below 40°C to preserve the living blue phycocyanin antioxidants, complete proteins, and active enzymes with zero heavy metal contamination.</p><h3>Key Benefits</h3><ul><li>60-70% complete bioavailable protein by weight</li><li>Rich in active phycocyanin (blue antioxidant pigment)</li><li>Excellent plant source of B-complex vitamins and iron</li><li>Supports sustained natural energy and immune defenses</li></ul><h3>How to Use</h3><p>Start with 1/2 teaspoon and work up to 1-2 teaspoons daily. Best added to smoothies, juices, or energy snacks. Avoid boiling.</p><h3>Specifications</h3><p>Net Weight: 200g | Servings: ~40 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Protein: 65%</p>',NULL,NULL,NULL,NULL,NULL,NULL,3548,10,NULL),(85643,NULL,NULL,NULL,NULL,NULL,649.0000,NULL,NULL,NULL,3548,11,NULL),(85644,'en','default','Artisanal Spirulina Powder | Navanidhi Naturals',NULL,NULL,NULL,NULL,NULL,NULL,3548,16,NULL),(85645,'en','default','Farm-fresh spirulina by MAN Agro Foods. 65% complete protein. Low-temperature dried. Phycocyanin-rich. 200g.',NULL,NULL,NULL,NULL,NULL,NULL,3548,18,NULL),(85646,NULL,NULL,'0.2',NULL,NULL,NULL,NULL,NULL,NULL,3548,22,NULL),(85647,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,3548,5,NULL),(85648,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,3548,6,NULL),(85649,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3548,7,NULL),(85650,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3548,8,NULL),(85651,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3548,26,NULL),(85652,NULL,NULL,'100% Pure Organic Moringa (Moringa oleifera) Leaf Powder. Shade-dried, cold-milled with zero carriers or additives.',NULL,NULL,NULL,NULL,NULL,NULL,3538,31,NULL),(85653,NULL,NULL,'Mix 1 teaspoon (3g–5g) daily into smoothies, fresh juices, warm water, or morning oatmeal.',NULL,NULL,NULL,NULL,NULL,NULL,3538,32,NULL),(85654,NULL,NULL,'Store in a cool, dark, dry place. Reseal tightly after opening.',NULL,NULL,NULL,NULL,NULL,NULL,3538,33,NULL),(85655,NULL,NULL,'18 Months from Date of Packaging',NULL,NULL,NULL,NULL,NULL,NULL,3538,34,NULL),(85656,NULL,NULL,'India (Cultivated in South India, Packed by MAN AGRO FOODS)',NULL,NULL,NULL,NULL,NULL,NULL,3538,35,NULL),(85657,NULL,NULL,'100% Pure Dehydrated Beetroot (Beta vulgaris) Powder. Cold-processed to preserve nitrates and betalains.',NULL,NULL,NULL,NULL,NULL,NULL,3539,31,NULL),(85658,NULL,NULL,'Add 1–2 teaspoons into pre-workout beverages, water, curries, or baked goods for natural tint and stamina.',NULL,NULL,NULL,NULL,NULL,NULL,3539,32,NULL),(85659,NULL,NULL,'Keep pouch sealed in ambient temperature away from humidity.',NULL,NULL,NULL,NULL,NULL,NULL,3539,33,NULL),(85660,NULL,NULL,'18 Months from Date of Packaging',NULL,NULL,NULL,NULL,NULL,NULL,3539,34,NULL),(85661,NULL,NULL,'India (MAN AGRO FOODS)',NULL,NULL,NULL,NULL,NULL,NULL,3539,35,NULL),(85662,NULL,NULL,'100% Wild-Harvested Indian Gooseberry (Phyllanthus emblica) Fruit Powder.',NULL,NULL,NULL,NULL,NULL,NULL,3540,31,NULL),(85663,NULL,NULL,'Consume 1/2 to 1 teaspoon with honey or lukewarm water in the morning.',NULL,NULL,NULL,NULL,NULL,NULL,3540,32,NULL),(85664,NULL,NULL,'Store in an airtight container away from moisture.',NULL,NULL,NULL,NULL,NULL,NULL,3540,33,NULL),(85665,NULL,NULL,'24 Months from Date of Packaging',NULL,NULL,NULL,NULL,NULL,NULL,3540,34,NULL),(85666,NULL,NULL,'India (MAN AGRO FOODS)',NULL,NULL,NULL,NULL,NULL,NULL,3540,35,NULL),(85667,NULL,NULL,'100% Pure Lakadong Turmeric (Curcuma longa) Rhizome Powder (Guaranteed 7.5%–9% Curcumin). Zero lead chromate, zero artificial polishing.',NULL,NULL,NULL,NULL,NULL,NULL,3541,31,NULL),(85668,NULL,NULL,'Add 1/2 teaspoon to golden milk, broths, daily cooking, or herbal teas. Best with a pinch of black pepper.',NULL,NULL,NULL,NULL,NULL,NULL,3541,32,NULL),(85669,NULL,NULL,'Store in a cool, dry area away from direct sunlight.',NULL,NULL,NULL,NULL,NULL,NULL,3541,33,NULL),(85670,NULL,NULL,'24 Months from Date of Packaging',NULL,NULL,NULL,NULL,NULL,NULL,3541,34,NULL),(85671,NULL,NULL,'Meghalaya, India (MAN AGRO FOODS)',NULL,NULL,NULL,NULL,NULL,NULL,3541,35,NULL),(85672,NULL,NULL,'100% Pure Sun-Dried Stemless Red Chillies. Stone-ground at low temperatures with zero Sudan dyes or synthetic colours.',NULL,NULL,NULL,NULL,NULL,NULL,3542,31,NULL),(85673,NULL,NULL,'Add to curries, dals, sambhars, marinades, or spice blends according to taste.',NULL,NULL,NULL,NULL,NULL,NULL,3542,32,NULL),(85674,NULL,NULL,'Store in an airtight container in a cool, dry pantry.',NULL,NULL,NULL,NULL,NULL,NULL,3542,33,NULL),(85675,NULL,NULL,'12 Months from Date of Packaging',NULL,NULL,NULL,NULL,NULL,NULL,3542,34,NULL),(85676,NULL,NULL,'Andhra Pradesh & Karnataka, India (MAN AGRO FOODS)',NULL,NULL,NULL,NULL,NULL,NULL,3542,35,NULL),(85677,NULL,NULL,'100% Pure Artisanal Spirulina (Arthrospira platensis) Biomass. Low-temperature dried.',NULL,NULL,NULL,NULL,NULL,NULL,3548,31,NULL),(85678,NULL,NULL,'Start with 1/2 teaspoon and gradually increase to 1–2 teaspoons daily in juice or smoothies.',NULL,NULL,NULL,NULL,NULL,NULL,3548,32,NULL),(85679,NULL,NULL,'Protect from direct light and moisture. Best refrigerated after opening.',NULL,NULL,NULL,NULL,NULL,NULL,3548,33,NULL),(85680,NULL,NULL,'18 Months from Date of Packaging',NULL,NULL,NULL,NULL,NULL,NULL,3548,34,NULL),(85681,NULL,NULL,'Tamil Nadu, India (MAN AGRO FOODS)',NULL,NULL,NULL,NULL,NULL,NULL,3548,35,NULL),(85716,NULL,NULL,'Organic Moringa Leaf, Spirulina, Wheatgrass, Chlorella (broken cell wall), Organic Spinach, Ceremonial Grade Matcha, KSM-66 Ashwagandha, Holy Basil (Tulsi).',NULL,NULL,NULL,NULL,NULL,NULL,3543,31,NULL),(85717,NULL,NULL,'Blend 1 scoop (10g) into cold water, tender coconut water, or fresh fruit smoothie. Best taken first thing in the morning.',NULL,NULL,NULL,NULL,NULL,NULL,3543,32,NULL),(85718,NULL,NULL,'Store in a cool, dry place away from heat and moisture. Keep zip-seal tightly closed.',NULL,NULL,NULL,NULL,NULL,NULL,3543,33,NULL),(85719,NULL,NULL,'18 Months from Date of Packaging',NULL,NULL,NULL,NULL,NULL,NULL,3543,34,NULL),(85720,NULL,NULL,'India (MAN AGRO FOODS)',NULL,NULL,NULL,NULL,NULL,NULL,3543,35,NULL),(85721,NULL,NULL,'Pure Lakadong Turmeric (7%+ Curcumin), Organic Ginger Root, Ceylon Cinnamon, Green Cardamom, Black Pepper Extract (BioPerine), Kashmir Saffron.',NULL,NULL,NULL,NULL,NULL,NULL,3544,31,NULL),(85722,NULL,NULL,'Whisk 1 teaspoon into warm almond, oat, or dairy milk. Sweeten with raw honey if desired. Ideal evening restorative ritual.',NULL,NULL,NULL,NULL,NULL,NULL,3544,32,NULL),(85723,NULL,NULL,'Store in an airtight container away from direct sunlight.',NULL,NULL,NULL,NULL,NULL,NULL,3544,33,NULL),(85724,NULL,NULL,'24 Months from Date of Packaging',NULL,NULL,NULL,NULL,NULL,NULL,3544,34,NULL),(85725,NULL,NULL,'Meghalaya & Kerala, India (MAN AGRO FOODS)',NULL,NULL,NULL,NULL,NULL,NULL,3544,35,NULL),(85726,NULL,NULL,'Wild Amla Fruit Extract, Organic Hibiscus Calyx, Rose Petal Extract, Aloe Vera Gel Powder, Moringa Leaf, Bamboo Shoot Extract (Standardised Natural Silica + Biotin).',NULL,NULL,NULL,NULL,NULL,NULL,3545,31,NULL),(85727,NULL,NULL,'Stir 1 scoop (8g) into 200ml water, fresh orange juice, or morning bowl. Take daily for radiant skin and hair vitality.',NULL,NULL,NULL,NULL,NULL,NULL,3545,32,NULL),(85728,NULL,NULL,'Store in a cool, dry pantry below 25°C. Avoid damp spoons.',NULL,NULL,NULL,NULL,NULL,NULL,3545,33,NULL),(85729,NULL,NULL,'18 Months from Date of Packaging',NULL,NULL,NULL,NULL,NULL,NULL,3545,34,NULL),(85730,NULL,NULL,'India (MAN AGRO FOODS)',NULL,NULL,NULL,NULL,NULL,NULL,3545,35,NULL),(85731,NULL,NULL,'100% Sun-Dried Fresh Curry Leaves (Murraya koenigii). Slow stone-ground with zero colours or anti-caking agents.',NULL,NULL,NULL,NULL,NULL,NULL,3546,31,NULL),(85732,NULL,NULL,'Add to ghee tempering (tadka), warm rasam, sambar, buttermilk, dal khichdi, or mix with warm rice and cold-pressed sesame oil.',NULL,NULL,NULL,NULL,NULL,NULL,3546,32,NULL),(85733,NULL,NULL,'Store in an airtight spice jar in a cool, dry place to retain volatile aromatic oils.',NULL,NULL,NULL,NULL,NULL,NULL,3546,33,NULL),(85734,NULL,NULL,'12 Months from Date of Packaging',NULL,NULL,NULL,NULL,NULL,NULL,3546,34,NULL),(85735,NULL,NULL,'Kerala, India (MAN AGRO FOODS)',NULL,NULL,NULL,NULL,NULL,NULL,3546,35,NULL),(85736,NULL,NULL,'100% Pure KSM-66 Ashwagandha (Withania somnifera) Root Extract Powder (Standardised to 5% Withanolides).',NULL,NULL,NULL,NULL,NULL,NULL,3547,31,NULL),(85737,NULL,NULL,'Mix 1 teaspoon (3g) into warm milk, herbal tea, or bedtime golden elixir 30 minutes before sleep.',NULL,NULL,NULL,NULL,NULL,NULL,3547,32,NULL),(85738,NULL,NULL,'Store in a cool, dry place away from light and humidity.',NULL,NULL,NULL,NULL,NULL,NULL,3547,33,NULL),(85739,NULL,NULL,'24 Months from Date of Packaging',NULL,NULL,NULL,NULL,NULL,NULL,3547,34,NULL),(85740,NULL,NULL,'India (MAN AGRO FOODS)',NULL,NULL,NULL,NULL,NULL,NULL,3547,35,NULL),(85780,NULL,NULL,'navanidhi-moringa-pack',NULL,NULL,NULL,NULL,NULL,NULL,3557,1,NULL),(85781,'en',NULL,'Organic Moringa Leaf Powder — Pure Botanical Pack Sizes',NULL,NULL,NULL,NULL,NULL,NULL,3557,2,NULL),(85782,'en',NULL,'organic-moringa-leaf-powder-pack',NULL,NULL,NULL,NULL,NULL,NULL,3557,3,NULL),(85783,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3557,5,NULL),(85784,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3557,6,NULL),(85785,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3557,7,NULL),(85786,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3557,8,NULL),(85787,'en',NULL,'Certified organic single-origin moringa leaf powder, freshly shade-dried and available in customer-chosen daily pack sizes (100g, 250g, 500g).',NULL,NULL,NULL,NULL,NULL,NULL,3557,9,NULL),(85788,'en',NULL,'<h2>Navanidhi Naturals Organic Moringa Leaf Powder — Pack Sizes</h2><p>Our moringa leaves are hand-harvested from organic partner farms by MAN Agro Foods in South India. Shade-dried below 42°C to preserve chlorophyll, iron, and active bio-enzymes, then stone-ground to microscopic fineness.</p><h3>Available Pack Formats</h3><ul><li><strong>100g Trial Pack:</strong> Ideal for daily routine discovery (~20 days).</li><li><strong>250g Standard Pack:</strong> Best seller for monthly family wellness (~50 days).</li><li><strong>500g Eco Value Pack:</strong> Maximum botanical value in recyclable vacuum-sealed pouches (~100 days).</li></ul><h3>Usage & Suggestions</h3><p>Blend 1 teaspoon into warm water, fruit smoothies, buttermilk, or morning bowls.</p>',NULL,NULL,NULL,NULL,NULL,NULL,3557,10,NULL),(85789,NULL,NULL,NULL,NULL,NULL,299.0000,NULL,NULL,NULL,3557,11,NULL),(85790,'en',NULL,'Organic Moringa Leaf Powder Pack Sizes | Navanidhi Naturals',NULL,NULL,NULL,NULL,NULL,NULL,3557,16,NULL),(85791,'en',NULL,'Pure organic moringa leaf powder available in 100g, 250g, and 500g packs. Cold-dehydrated plant nutrition by MAN Agro Foods.',NULL,NULL,NULL,NULL,NULL,NULL,3557,18,NULL),(85792,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3557,26,NULL),(85793,NULL,NULL,'navanidhi-moringa-pack-100g',NULL,NULL,NULL,NULL,NULL,NULL,3558,1,NULL),(85794,'en',NULL,'Organic Moringa Leaf Powder (100g Pack)',NULL,NULL,NULL,NULL,NULL,NULL,3558,2,NULL),(85795,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3558,8,NULL),(85796,NULL,NULL,NULL,NULL,NULL,299.0000,NULL,NULL,NULL,3558,11,NULL),(85797,NULL,NULL,'0.1',NULL,NULL,NULL,NULL,NULL,NULL,3558,22,NULL),(85798,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3558,26,NULL),(85799,NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,3558,24,NULL),(85800,NULL,NULL,'navanidhi-moringa-pack-250g',NULL,NULL,NULL,NULL,NULL,NULL,3559,1,NULL),(85801,'en',NULL,'Organic Moringa Leaf Powder (250g Pack)',NULL,NULL,NULL,NULL,NULL,NULL,3559,2,NULL),(85802,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3559,8,NULL),(85803,NULL,NULL,NULL,NULL,NULL,499.0000,NULL,NULL,NULL,3559,11,NULL),(85804,NULL,NULL,'0.25',NULL,NULL,NULL,NULL,NULL,NULL,3559,22,NULL),(85805,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3559,26,NULL),(85806,NULL,NULL,NULL,NULL,11,NULL,NULL,NULL,NULL,3559,24,NULL),(85807,NULL,NULL,'navanidhi-moringa-pack-500g',NULL,NULL,NULL,NULL,NULL,NULL,3560,1,NULL),(85808,'en',NULL,'Organic Moringa Leaf Powder (500g Value Pack)',NULL,NULL,NULL,NULL,NULL,NULL,3560,2,NULL),(85809,NULL,'default',NULL,1,NULL,NULL,NULL,NULL,NULL,3560,8,NULL),(85810,NULL,NULL,NULL,NULL,NULL,899.0000,NULL,NULL,NULL,3560,11,NULL),(85811,NULL,NULL,'0.5',NULL,NULL,NULL,NULL,NULL,NULL,3560,22,NULL),(85812,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,3560,26,NULL),(85813,NULL,NULL,NULL,NULL,12,NULL,NULL,NULL,NULL,3560,24,NULL);
/*!40000 ALTER TABLE `product_attribute_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_batches`
--

DROP TABLE IF EXISTS `product_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_batches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `inventory_source_id` int unsigned NOT NULL,
  `batch_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `manufacturing_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `unit_cost` decimal(12,4) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `prod_batch_unique` (`product_id`,`inventory_source_id`,`batch_number`),
  KEY `product_batches_inventory_source_id_foreign` (`inventory_source_id`),
  CONSTRAINT `product_batches_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_batches_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_batches`
--

LOCK TABLES `product_batches` WRITE;
/*!40000 ALTER TABLE `product_batches` DISABLE KEYS */;
INSERT INTO `product_batches` VALUES (1,41,1,'NVN-MOR-202609-A1',500.0000,'2026-09-01','2028-03-01',140.0000,'active','2026-09-22 07:44:47','2026-09-22 07:44:47');
/*!40000 ALTER TABLE `product_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_bundle_option_products`
--

DROP TABLE IF EXISTS `product_bundle_option_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_bundle_option_products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `product_bundle_option_id` int unsigned NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `bundle_option_products_product_id_bundle_option_id_unique` (`product_id`,`product_bundle_option_id`),
  KEY `pbop_option_id_idx` (`product_bundle_option_id`),
  CONSTRAINT `product_bundle_option_id_foreign` FOREIGN KEY (`product_bundle_option_id`) REFERENCES `product_bundle_options` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_bundle_option_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=857 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_bundle_option_products`
--

LOCK TABLES `product_bundle_option_products` WRITE;
/*!40000 ALTER TABLE `product_bundle_option_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_bundle_option_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_bundle_option_translations`
--

DROP TABLE IF EXISTS `product_bundle_option_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_bundle_option_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_bundle_option_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_bundle_option_translations_option_id_locale_unique` (`product_bundle_option_id`,`locale`),
  UNIQUE KEY `bundle_option_translations_locale_label_bundle_option_id_unique` (`locale`,`label`,`product_bundle_option_id`),
  CONSTRAINT `product_bundle_option_translations_option_id_foreign` FOREIGN KEY (`product_bundle_option_id`) REFERENCES `product_bundle_options` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=857 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_bundle_option_translations`
--

LOCK TABLES `product_bundle_option_translations` WRITE;
/*!40000 ALTER TABLE `product_bundle_option_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_bundle_option_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_bundle_options`
--

DROP TABLE IF EXISTS `product_bundle_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_bundle_options` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_bundle_options_product_id_foreign` (`product_id`),
  CONSTRAINT `product_bundle_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=857 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_bundle_options`
--

LOCK TABLES `product_bundle_options` WRITE;
/*!40000 ALTER TABLE `product_bundle_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_bundle_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_categories` (
  `product_id` int unsigned NOT NULL,
  `category_id` int unsigned NOT NULL,
  UNIQUE KEY `product_categories_product_id_category_id_unique` (`product_id`,`category_id`),
  KEY `product_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (3541,71),(3542,71),(3546,71),(3538,72),(3539,72),(3540,72),(3541,72),(3548,72),(3557,72),(3543,73),(3544,73),(3545,73),(3541,74),(3542,74),(3546,74),(3540,75),(3544,75),(3545,75),(3547,75),(3548,75),(3538,76),(3539,76),(3540,76),(3541,76),(3542,76),(3543,76),(3544,76),(3545,76),(3546,76),(3547,76),(3548,76),(3557,76);
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_channels`
--

DROP TABLE IF EXISTS `product_channels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_channels` (
  `product_id` int unsigned NOT NULL,
  `channel_id` int unsigned NOT NULL,
  UNIQUE KEY `product_channels_product_id_channel_id_unique` (`product_id`,`channel_id`),
  KEY `product_channels_channel_id_foreign` (`channel_id`),
  KEY `pc_product_id_channel_id_idx` (`product_id`,`channel_id`),
  CONSTRAINT `product_channels_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_channels_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_channels`
--

LOCK TABLES `product_channels` WRITE;
/*!40000 ALTER TABLE `product_channels` DISABLE KEYS */;
INSERT INTO `product_channels` VALUES (3538,1),(3539,1),(3540,1),(3541,1),(3542,1),(3543,1),(3544,1),(3545,1),(3546,1),(3547,1),(3548,1),(3557,1),(3558,1),(3559,1),(3560,1);
/*!40000 ALTER TABLE `product_channels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_cross_sells`
--

DROP TABLE IF EXISTS `product_cross_sells`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_cross_sells` (
  `parent_id` int unsigned NOT NULL,
  `child_id` int unsigned NOT NULL,
  UNIQUE KEY `product_cross_sells_parent_id_child_id_unique` (`parent_id`,`child_id`),
  KEY `product_cross_sells_child_id_foreign` (`child_id`),
  CONSTRAINT `product_cross_sells_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_cross_sells_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_cross_sells`
--

LOCK TABLES `product_cross_sells` WRITE;
/*!40000 ALTER TABLE `product_cross_sells` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_cross_sells` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_customer_group_prices`
--

DROP TABLE IF EXISTS `product_customer_group_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_customer_group_prices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `qty` int NOT NULL DEFAULT '0',
  `value_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `product_id` int unsigned NOT NULL,
  `customer_group_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_customer_group_prices_unique_id_unique` (`unique_id`),
  KEY `product_customer_group_prices_product_id_foreign` (`product_id`),
  KEY `product_customer_group_prices_customer_group_id_foreign` (`customer_group_id`),
  CONSTRAINT `product_customer_group_prices_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_customer_group_prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=561 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_customer_group_prices`
--

LOCK TABLES `product_customer_group_prices` WRITE;
/*!40000 ALTER TABLE `product_customer_group_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_customer_group_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_customizable_option_prices`
--

DROP TABLE IF EXISTS `product_customizable_option_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_customizable_option_prices` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `label` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `product_customizable_option_id` int unsigned NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pcop_product_customizable_option_id_foreign` (`product_customizable_option_id`),
  CONSTRAINT `pcop_product_customizable_option_id_foreign` FOREIGN KEY (`product_customizable_option_id`) REFERENCES `product_customizable_options` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_customizable_option_prices`
--

LOCK TABLES `product_customizable_option_prices` WRITE;
/*!40000 ALTER TABLE `product_customizable_option_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_customizable_option_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_customizable_option_translations`
--

DROP TABLE IF EXISTS `product_customizable_option_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_customizable_option_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` text COLLATE utf8mb4_unicode_ci,
  `product_customizable_option_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_customizable_option_id_locale_unique` (`product_customizable_option_id`,`locale`),
  CONSTRAINT `pcot_product_customizable_option_id_foreign` FOREIGN KEY (`product_customizable_option_id`) REFERENCES `product_customizable_options` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_customizable_option_translations`
--

LOCK TABLES `product_customizable_option_translations` WRITE;
/*!40000 ALTER TABLE `product_customizable_option_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_customizable_option_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_customizable_options`
--

DROP TABLE IF EXISTS `product_customizable_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_customizable_options` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '1',
  `max_characters` text COLLATE utf8mb4_unicode_ci,
  `supported_file_extensions` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_customizable_options_product_id_foreign` (`product_id`),
  CONSTRAINT `product_customizable_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_customizable_options`
--

LOCK TABLES `product_customizable_options` WRITE;
/*!40000 ALTER TABLE `product_customizable_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_customizable_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_downloadable_link_translations`
--

DROP TABLE IF EXISTS `product_downloadable_link_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_downloadable_link_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_downloadable_link_id` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `link_translations_link_id_foreign` (`product_downloadable_link_id`),
  CONSTRAINT `link_translations_link_id_foreign` FOREIGN KEY (`product_downloadable_link_id`) REFERENCES `product_downloadable_links` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_downloadable_link_translations`
--

LOCK TABLES `product_downloadable_link_translations` WRITE;
/*!40000 ALTER TABLE `product_downloadable_link_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_downloadable_link_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_downloadable_links`
--

DROP TABLE IF EXISTS `product_downloadable_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_downloadable_links` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `sample_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sample_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sample_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sample_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `downloads` int NOT NULL DEFAULT '0',
  `sort_order` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_downloadable_links_product_id_foreign` (`product_id`),
  CONSTRAINT `product_downloadable_links_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_downloadable_links`
--

LOCK TABLES `product_downloadable_links` WRITE;
/*!40000 ALTER TABLE `product_downloadable_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_downloadable_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_downloadable_sample_translations`
--

DROP TABLE IF EXISTS `product_downloadable_sample_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_downloadable_sample_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_downloadable_sample_id` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `sample_translations_sample_id_foreign` (`product_downloadable_sample_id`),
  CONSTRAINT `sample_translations_sample_id_foreign` FOREIGN KEY (`product_downloadable_sample_id`) REFERENCES `product_downloadable_samples` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_downloadable_sample_translations`
--

LOCK TABLES `product_downloadable_sample_translations` WRITE;
/*!40000 ALTER TABLE `product_downloadable_sample_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_downloadable_sample_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_downloadable_samples`
--

DROP TABLE IF EXISTS `product_downloadable_samples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_downloadable_samples` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_downloadable_samples_product_id_foreign` (`product_id`),
  CONSTRAINT `product_downloadable_samples_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_downloadable_samples`
--

LOCK TABLES `product_downloadable_samples` WRITE;
/*!40000 ALTER TABLE `product_downloadable_samples` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_downloadable_samples` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_flat`
--

DROP TABLE IF EXISTS `product_flat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_flat` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new` tinyint(1) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(12,4) DEFAULT NULL,
  `special_price` decimal(12,4) DEFAULT NULL,
  `special_price_from` date DEFAULT NULL,
  `special_price_to` date DEFAULT NULL,
  `weight` decimal(12,4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_family_id` int unsigned DEFAULT NULL,
  `product_id` int unsigned NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `parent_id` int unsigned DEFAULT NULL,
  `visible_individually` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_flat_unique_index` (`product_id`,`channel`,`locale`),
  KEY `product_flat_attribute_family_id_foreign` (`attribute_family_id`),
  KEY `product_flat_parent_id_foreign` (`parent_id`),
  CONSTRAINT `product_flat_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `product_flat_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `product_flat` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_flat_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1386 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_flat`
--

LOCK TABLES `product_flat` WRITE;
/*!40000 ALTER TABLE `product_flat` DISABLE KEYS */;
INSERT INTO `product_flat` VALUES (1,'navanidhi-moringa-powder','simple',NULL,'Organic Moringa Leaf Powder','Sustainably harvested, shade-dried moringa leaves ground into a fine, nutrient-dense powder. Rich in vitamins A, C, iron and calcium.','<h2>Navanidhi Naturals Organic Moringa Leaf Powder</h2><p>Our moringa leaves are hand-harvested from certified organic farms in South India by MAN Agro Foods, carefully shade-dried to preserve maximum nutrient density, then stone-ground into a silky-fine powder.</p><h3>Key Benefits</h3><ul><li>Rich in Vitamins A, C, E and K</li><li>Complete amino acid profile</li><li>Natural source of iron and calcium</li><li>Supports immune function and vitality</li></ul><h3>How to Use</h3><p>Add 1 teaspoon to smoothies, warm water with lemon, soups, or sprinkle over salads. Best consumed in the morning for sustained energy.</p><h3>Specifications</h3><p>Net Weight: 250g | Servings: ~50 | Brand: Navanidhi Naturals | Origin: South India | Zero Synthetics</p>','organic-moringa-leaf-powder',1,1,1,'Organic Moringa Leaf Powder | Navanidhi Naturals',NULL,'Premium organic moringa leaf powder by Navanidhi Naturals. Shade-dried, stone-ground. Rich in vitamins A, C, iron & calcium. 250g.',599.0000,499.0000,NULL,NULL,0.2500,'2026-09-26 12:20:56','en','default',1,3538,'2026-09-26 14:03:15',NULL,1),(2,'navanidhi-beetroot-powder','simple',NULL,'Dehydrated Beetroot Powder','Vibrant ruby-red beetroot powder made from slow-dehydrated farm-fresh beets. Natural source of dietary nitrates and antioxidants.','<h2>Navanidhi Naturals Dehydrated Beetroot Powder</h2><p>Sourced from premium Indian beetroot by MAN Agro Foods, our powder is created through a gentle low-temperature dehydration process that preserves the deep ruby colour, earthy sweetness, and full nutritional profile.</p><h3>Key Benefits</h3><ul><li>Natural source of dietary nitrates</li><li>Supports cardiovascular health</li><li>Rich in folate and manganese</li><li>Natural food colouring for baking</li></ul><h3>How to Use</h3><p>Mix 1-2 teaspoons into smoothies, juices, lattes, or baked goods. Use as a natural food colourant for pastas, breads, and desserts.</p><h3>Specifications</h3><p>Net Weight: 200g | Servings: ~40 | Brand: Navanidhi Naturals | Processing: Low-temperature dehydration</p>','dehydrated-beetroot-powder',0,1,1,'Dehydrated Beetroot Powder | Navanidhi Naturals',NULL,'Pure dehydrated beetroot powder. Low-temperature processed. Natural nitrates & antioxidants. 200g.',449.0000,NULL,NULL,NULL,0.2000,'2026-09-26 12:20:56','en','default',1,3539,'2026-09-26 14:03:15',NULL,1),(3,'navanidhi-amla-powder','simple',NULL,'Wild-Harvested Amla Powder','Wild-harvested Indian gooseberry (amla) gently dried and ground. One of nature richest sources of vitamin C and powerful antioxidants.','<h2>Navanidhi Naturals Wild-Harvested Amla Powder</h2><p>Our amla is wild-harvested from ancient gooseberry groves by MAN Agro Foods. Each berry is hand-selected at peak ripeness, carefully deseeded, and gently dried at low temperatures with zero artificial preservatives, maltodextrin, or synthetic fillers to preserve its extraordinary natural vitamin C and polyphenol content.</p><h3>Key Benefits</h3><ul><li>One of nature richest bioavailable sources of Vitamin C</li><li>Powerful cellular antioxidant protection</li><li>Supports radiant hair, skin firmness, and digestive vitality</li><li>100% pure wild-collected whole fruit with zero additives</li></ul><h3>How to Use</h3><p>Dissolve 1 teaspoon in warm water with raw honey, blend into fresh juices, or mix into yogurt. Also celebrated in traditional hair and face mask rituals.</p><h3>Specifications</h3><p>Net Weight: 200g | Servings: ~40 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Harvest: Wild-collected Indian groves</p>','wild-harvested-amla-powder',0,0,1,'Wild-Harvested Amla Powder | Navanidhi Naturals',NULL,'Wild-harvested amla (Indian gooseberry) powder. Richest natural vitamin C source by MAN Agro Foods. 200g.',399.0000,NULL,NULL,NULL,0.2000,'2026-09-26 12:20:57','en','default',1,3540,'2026-09-26 14:03:16',NULL,1),(4,'navanidhi-turmeric-powder','simple',NULL,'Lakadong Turmeric Powder','Ultra-premium Lakadong turmeric from Meghalaya with 7-9% natural curcumin — the highest natural curcumin concentration available in pure spices.','<h2>Navanidhi Naturals Lakadong Turmeric Powder</h2><p>Lakadong turmeric is celebrated worldwide as nature most potent anti-inflammatory spice, sustainably grown in the pristine valleys of Meghalaya by local farmers and brought to you by MAN Agro Foods. With a high 7-9% natural curcumin content (compared to only 2-3% in standard commercial turmeric), it offers extraordinary therapeutic potency, rich earthy aroma, and deep natural golden hue without any chemical polishing or lead chromate.</p><h3>Key Benefits</h3><ul><li>7-9% natural bio-active curcumin content</li><li>Zero lead chromate, chemical dyes, or starch adulterants</li><li>Stone-ground at low temperatures to protect volatile essential oils</li><li>Dual-purpose: Pure authentic kitchen spice & Ayurvedic golden milk elixir</li></ul><h3>How to Use</h3><p>Use in golden milk (haldi doodh), dals, daily curries, warm lemon water, or tonics. Combine with black pepper and healthy fats for maximum bioavailability.</p><h3>Specifications</h3><p>Net Weight: 200g | Origin: Meghalaya, India | Curcumin: 7-9% | Brand: Navanidhi Naturals (MAN Agro Foods)</p>','lakadong-turmeric-powder',1,1,1,'Lakadong Turmeric Powder | High Curcumin Pure Spice | Navanidhi Naturals',NULL,'Ultra-premium Lakadong turmeric with 7-9% curcumin. 100% pure, farm direct by MAN Agro Foods. 200g.',699.0000,599.0000,NULL,NULL,0.2000,'2026-09-26 12:20:57','en','default',1,3541,'2026-09-26 14:03:16',NULL,1),(5,'navanidhi-red-chilli-powder','simple',NULL,'Pure Red Chilli Powder','Sun-dried premium red chillies stone-ground to perfection. Vibrant natural red colour, authentic medium-hot pungency, zero added colours (Sudan dye-free), and zero preservatives.','<h2>Navanidhi Naturals Pure Red Chilli Powder</h2><p>Sourced directly from certified farmers in Guntur and Byadgi by MAN Agro Foods, our chillies are naturally sun-cured, destemmed, and stone-ground at low temperatures. We never add synthetic dyes, sawdust, brick powder, or chemical preservatives — delivering the authentic aroma, rich natural red hue, and balanced warmth that true Indian cuisine deserves.</p><h3>Key Highlights</h3><ul><li>100% Pure & Unadulterated (Zero Sudan Dyes, Zero Added Colours)</li><li>Stone-ground at low speed to retain volatile essential capsaicin oils</li><li>Carefully destemmed and cleaned before milling</li><li>Rich in natural Vitamin C and antioxidant capsaicin</li></ul><h3>Culinary Usage</h3><p>Essential for everyday curries, dals, sambhar, marinades, and seasoning. Delivers rich natural colour and authentic Indian heat without burning harshness.</p><h3>Specifications</h3><p>Net Weight: 200g | Origin: Andhra Pradesh / Karnataka, India | Pungency: Medium-Hot | Purity: 100% Pure Stemless Chillies | Brand: Navanidhi Naturals (MAN Agro Foods)</p>','pure-red-chilli-powder',1,1,1,'Pure Red Chilli Powder | 100% Unadulterated Indian Spice | Navanidhi Naturals',NULL,'Farm-fresh, sun-dried Red Chilli Powder stone-ground by MAN Agro Foods. 100% pure, zero artificial colours or Sudan dyes. 200g.',199.0000,169.0000,NULL,NULL,0.2000,'2026-09-26 12:20:57','en','default',1,3542,'2026-09-26 14:03:16',NULL,1),(6,'navanidhi-green-vitality','simple',NULL,'Green Vitality Superblend','A synergistic blend of 8 organic greens — moringa, spirulina, wheatgrass, chlorella, spinach, matcha, ashwagandha and tulsi — for comprehensive daily nutrition.','<h2>Navanidhi Naturals Green Vitality Superblend</h2><p>Crafted by MAN Agro Foods, our signature daily greens formula combines eight of the world most nutrient-dense botanicals into one easy serving with zero maltodextrin, zero added sugars, and zero artificial flavors. Each ingredient is individually sourced from certified growers and cold-milled below 42°C for optimal living enzyme synergy.</p><h3>Ingredients</h3><ul><li>Organic Moringa Leaf</li><li>Spirulina</li><li>Wheatgrass</li><li>Chlorella (broken cell wall)</li><li>Organic Spinach</li><li>Ceremonial Grade Matcha</li><li>KSM-66 Ashwagandha</li><li>Holy Basil (Tulsi)</li></ul><h3>How to Use</h3><p>Blend 1 scoop (10g) into cold water, fresh coconut water, or your morning smoothie. Best taken on an empty stomach for cellular alkalization.</p><h3>Specifications</h3><p>Net Weight: 300g | Servings: 30 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Testing: Heavy metal & NABL lab verified</p>','green-vitality-superblend',1,1,1,'Green Vitality Superblend | Navanidhi Naturals',NULL,'8-ingredient organic greens superblend by MAN Agro Foods. Moringa, spirulina, wheatgrass, chlorella & more. 300g.',899.0000,799.0000,NULL,NULL,0.3000,'2026-09-26 12:20:57','en','default',1,3543,'2026-09-26 14:03:16',NULL,1),(7,'navanidhi-golden-immunity','simple',NULL,'Golden Immunity Elixir Blend','A warming Ayurvedic-inspired blend of Lakadong turmeric, ginger, black pepper, cinnamon, cardamom and saffron for immune support and inflammation defence.','<h2>Navanidhi Naturals Golden Immunity Elixir Blend</h2><p>Inspired by the ancient Ayurvedic tradition of golden milk and formulated by MAN Agro Foods, our elixir blend combines premium Lakadong turmeric (guaranteed 7%+ curcumin) with synergistic warming Indian spices and black pepper BioPerine for maximum curcumin bioavailability without chemical additives.</p><h3>Ingredients</h3><ul><li>Lakadong Turmeric (7%+ curcumin)</li><li>Organic Ginger Root</li><li>Black Pepper Extract (BioPerine)</li><li>Ceylon Cinnamon</li><li>Green Cardamom</li><li>Kashmir Saffron</li></ul><h3>How to Use</h3><p>Stir 1 teaspoon into warm milk (dairy or plant-based) with a touch of honey or ghee. Perfect as an evening restorative ritual.</p><h3>Specifications</h3><p>Net Weight: 250g | Servings: ~50 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Features: BioPerine enhanced absorption</p>','golden-immunity-elixir-blend',0,1,1,'Golden Immunity Elixir Blend | Navanidhi Naturals',NULL,'Ayurvedic golden milk blend with Lakadong turmeric, saffron, BioPerine by MAN Agro Foods. 250g.',749.0000,NULL,NULL,NULL,0.2500,'2026-09-26 12:20:57','en','default',1,3544,'2026-09-26 14:03:16',NULL,1),(8,'navanidhi-beauty-bloom','simple',NULL,'Beauty Bloom Collagen Booster','A plant-based beauty blend of amla, hibiscus, rose petal, aloe vera, vitamin E-rich moringa and biotin-rich bamboo shoot for radiant skin, hair and nails.','<h2>Navanidhi Naturals Beauty Bloom Collagen Booster</h2><p>Developed by MAN Agro Foods, Beauty Bloom is a 100% whole plant formulation that works from within. Our formula combines traditional Ayurvedic beauty botanicals with modern nutritional science to support natural collagen production—completely free from animal collagen, synthetic biotin, or maltodextrin fillers.</p><h3>Ingredients</h3><ul><li>Amla (Vitamin C for natural collagen synthesis)</li><li>Hibiscus Flower</li><li>Rose Petal Extract</li><li>Aloe Vera</li><li>Moringa Leaf (Vitamin E)</li><li>Bamboo Shoot Extract (standardised natural silica & biotin)</li></ul><h3>How to Use</h3><p>Mix 1 scoop (8g) into water, fresh juice, or a morning bowl. Take daily for visible results in 4-6 weeks.</p><h3>Specifications</h3><p>Net Weight: 250g | Servings: ~30 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Type: 100% Plant-based</p>','beauty-bloom-collagen-booster',1,0,1,'Beauty Bloom Collagen Booster | Navanidhi Naturals',NULL,'Plant-based beauty blend for skin, hair & nails by MAN Agro Foods. Amla, hibiscus, rose petal. 250g.',999.0000,849.0000,NULL,NULL,0.2500,'2026-09-26 12:20:57','en','default',1,3545,'2026-09-26 14:03:16',NULL,1),(9,'navanidhi-curry-leaf-powder','simple',NULL,'Sun-Dried Curry Leaf Powder','Aromatic sun-dried curry leaves from Kerala, stone-ground to a fine powder. Retains the intense flavour and iron content of fresh leaves year-round.','<h2>Navanidhi Naturals Sun-Dried Curry Leaf Powder</h2><p>Sourced directly from organic curry leaf farms by MAN Agro Foods, our leaves are picked at dawn for maximum aromatic oil content, sun-dried within hours, and stone-ground into a fragrant fine powder.</p><h3>Key Benefits</h3><ul><li>Intense natural flavour — better than dried leaves</li><li>Excellent source of iron and folic acid</li><li>Rich in antioxidants</li><li>Traditional hair and skin tonic</li></ul><h3>How to Use</h3><p>Add to tempering (tadka), rice dishes, chutneys, rasam, sambar, buttermilk, or smoothies. Sprinkle over yogurt or dals for instant flavour.</p><h3>Specifications</h3><p>Net Weight: 150g | Origin: Kerala, India | Processing: Sun-dried, stone-ground</p>','sun-dried-curry-leaf-powder',0,0,1,'Sun-Dried Curry Leaf Powder | Navanidhi Naturals',NULL,'Premium Kerala curry leaf powder. Sun-dried, stone-ground. Rich iron source. 150g.',349.0000,NULL,NULL,NULL,0.1500,'2026-09-26 12:20:58','en','default',1,3546,'2026-09-26 14:03:16',NULL,1),(10,'navanidhi-ashwagandha-powder','simple',NULL,'KSM-66 Ashwagandha Root Powder','Premium KSM-66 ashwagandha root extract powder — the world most clinically studied ashwagandha, standardised to 5% withanolides for stress relief and vitality.','<h2>Navanidhi Naturals KSM-66 Ashwagandha Root Powder</h2><p>Packaged under strict clean-label standards by MAN Agro Foods, we use only the gold-standard KSM-66 ashwagandha root extract, produced through a solvent-free traditional process that preserves the full spectrum of active withanolides for stress relief, cortisol balance, and restorative vitality.</p><h3>Key Benefits</h3><ul><li>Standardised to 5% active withanolides</li><li>Clinically studied stress and cortisol reduction</li><li>Supports physical stamina and workout recovery</li><li>Enhances cognitive clarity, memory, and sleep depth</li></ul><h3>How to Use</h3><p>Mix 1 teaspoon (3g) into warm milk, herbal tea, or bedtime golden elixir 30 minutes before sleep.</p><h3>Specifications</h3><p>Net Weight: 200g | Servings: ~66 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Extract: KSM-66</p>','ksm-66-ashwagandha-root-powder',0,1,1,'KSM-66 Ashwagandha Root Powder | Navanidhi Naturals',NULL,'Premium KSM-66 ashwagandha. 5% withanolides. Clinically studied for stress relief & vitality by MAN Agro Foods. 200g.',799.0000,699.0000,NULL,NULL,0.2000,'2026-09-26 12:20:58','en','default',1,3547,'2026-09-26 14:03:16',NULL,1),(11,'navanidhi-spirulina-powder','simple',NULL,'Artisanal Spirulina Powder','Farm-fresh spirulina cultivated in pristine freshwater ponds in Tamil Nadu. Air-dried at low temperatures to preserve phycocyanin and complete protein.','<h2>Navanidhi Naturals Artisanal Spirulina Powder</h2><p>Cultivated in pristine freshwater ponds in Tamil Nadu and processed by MAN Agro Foods, our artisanal spirulina is harvested daily and immediately air-dried below 40°C to preserve the living blue phycocyanin antioxidants, complete proteins, and active enzymes with zero heavy metal contamination.</p><h3>Key Benefits</h3><ul><li>60-70% complete bioavailable protein by weight</li><li>Rich in active phycocyanin (blue antioxidant pigment)</li><li>Excellent plant source of B-complex vitamins and iron</li><li>Supports sustained natural energy and immune defenses</li></ul><h3>How to Use</h3><p>Start with 1/2 teaspoon and work up to 1-2 teaspoons daily. Best added to smoothies, juices, or energy snacks. Avoid boiling.</p><h3>Specifications</h3><p>Net Weight: 200g | Servings: ~40 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Protein: 65%</p>','artisanal-spirulina-powder',0,0,1,'Artisanal Spirulina Powder | Navanidhi Naturals',NULL,'Farm-fresh spirulina by MAN Agro Foods. 65% complete protein. Low-temperature dried. Phycocyanin-rich. 200g.',649.0000,NULL,NULL,NULL,0.2000,'2026-09-26 12:20:58','en','default',1,3548,'2026-09-26 14:03:16',NULL,1),(20,'navanidhi-moringa-pack','configurable',NULL,'Organic Moringa Leaf Powder — Pure Botanical Pack Sizes','Certified organic single-origin moringa leaf powder, freshly shade-dried and available in customer-chosen daily pack sizes (100g, 250g, 500g).','<h2>Navanidhi Naturals Organic Moringa Leaf Powder — Pack Sizes</h2><p>Our moringa leaves are hand-harvested from organic partner farms by MAN Agro Foods in South India. Shade-dried below 42°C to preserve chlorophyll, iron, and active bio-enzymes, then stone-ground to microscopic fineness.</p><h3>Available Pack Formats</h3><ul><li><strong>100g Trial Pack:</strong> Ideal for daily routine discovery (~20 days).</li><li><strong>250g Standard Pack:</strong> Best seller for monthly family wellness (~50 days).</li><li><strong>500g Eco Value Pack:</strong> Maximum botanical value in recyclable vacuum-sealed pouches (~100 days).</li></ul><h3>Usage & Suggestions</h3><p>Blend 1 teaspoon into warm water, fruit smoothies, buttermilk, or morning bowls.</p>','organic-moringa-leaf-powder-pack',1,1,1,'Organic Moringa Leaf Powder Pack Sizes | Navanidhi Naturals',NULL,'Pure organic moringa leaf powder available in 100g, 250g, and 500g packs. Cold-dehydrated plant nutrition by MAN Agro Foods.',299.0000,NULL,NULL,NULL,NULL,'2026-09-26 13:58:31','en','default',1,3557,'2026-09-26 13:58:31',NULL,1),(21,'navanidhi-moringa-pack-100g','simple',NULL,'Organic Moringa Leaf Powder (100g Pack)',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,299.0000,NULL,NULL,NULL,0.1000,'2026-09-26 13:58:31','en','default',1,3558,'2026-09-26 13:58:31',NULL,NULL),(22,'navanidhi-moringa-pack-250g','simple',NULL,'Organic Moringa Leaf Powder (250g Pack)',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,499.0000,NULL,NULL,NULL,0.2500,'2026-09-26 13:58:31','en','default',1,3559,'2026-09-26 13:58:31',NULL,NULL),(23,'navanidhi-moringa-pack-500g','simple',NULL,'Organic Moringa Leaf Powder (500g Value Pack)',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,899.0000,NULL,NULL,NULL,0.5000,'2026-09-26 13:58:31','en','default',1,3560,'2026-09-26 13:58:31',NULL,NULL);
/*!40000 ALTER TABLE `product_flat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_grouped_products`
--

DROP TABLE IF EXISTS `product_grouped_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_grouped_products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `associated_product_id` int unsigned NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `grouped_products_product_id_associated_product_id_unique` (`product_id`,`associated_product_id`),
  KEY `product_grouped_products_associated_product_id_foreign` (`associated_product_id`),
  KEY `pgp_product_id_idx` (`product_id`),
  CONSTRAINT `product_grouped_products_associated_product_id_foreign` FOREIGN KEY (`associated_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_grouped_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=857 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_grouped_products`
--

LOCK TABLES `product_grouped_products` WRITE;
/*!40000 ALTER TABLE `product_grouped_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_grouped_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int unsigned NOT NULL,
  `position` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `prod_img_product_id_idx` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (63,NULL,'products/3538/navanidhi-moringa-powder.jpg',3538,1),(64,NULL,'products/3539/navanidhi-beetroot-powder.jpg',3539,1),(65,NULL,'products/3540/navanidhi-amla-powder.jpg',3540,1),(66,NULL,'products/3541/navanidhi-turmeric-powder.jpg',3541,1),(67,NULL,'products/3542/navanidhi-red-chilli-powder.jpg',3542,1),(68,NULL,'products/3543/navanidhi-green-vitality.jpg',3543,1),(69,NULL,'products/3544/navanidhi-golden-immunity.jpg',3544,1),(70,NULL,'products/3545/navanidhi-beauty-bloom.jpg',3545,1),(71,NULL,'products/3546/navanidhi-curry-leaf-powder.jpg',3546,1),(72,NULL,'products/3547/navanidhi-ashwagandha-powder.jpg',3547,1),(73,NULL,'products/3548/navanidhi-spirulina-powder.jpg',3548,1),(74,'images','products/3538/navanidhi-moringa-powder.jpg',3557,1),(75,'images','products/3538/navanidhi-moringa-powder.jpg',3558,1),(76,'images','products/3538/navanidhi-moringa-powder.jpg',3559,1),(77,'images','products/3538/navanidhi-moringa-powder.jpg',3560,1);
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_inventories`
--

DROP TABLE IF EXISTS `product_inventories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_inventories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `qty` int NOT NULL DEFAULT '0',
  `product_id` int unsigned NOT NULL,
  `vendor_id` int NOT NULL DEFAULT '0',
  `inventory_source_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_source_vendor_index_unique` (`product_id`,`inventory_source_id`,`vendor_id`),
  KEY `product_inventories_inventory_source_id_foreign` (`inventory_source_id`),
  CONSTRAINT `product_inventories_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4011 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_inventories`
--

LOCK TABLES `product_inventories` WRITE;
/*!40000 ALTER TABLE `product_inventories` DISABLE KEYS */;
INSERT INTO `product_inventories` VALUES (2870,200,3538,0,1),(2871,150,3539,0,1),(2872,180,3540,0,1),(2873,120,3541,0,1),(2874,200,3542,0,1),(2875,100,3543,0,1),(2876,130,3544,0,1),(2877,90,3545,0,1),(2878,160,3546,0,1),(2879,140,3547,0,1),(2880,110,3548,0,1),(2887,50,3558,0,1),(2888,75,3559,0,1),(2889,40,3560,0,1);
/*!40000 ALTER TABLE `product_inventories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_inventory_indices`
--

DROP TABLE IF EXISTS `product_inventory_indices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_inventory_indices` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `qty` int NOT NULL DEFAULT '0',
  `product_id` int unsigned NOT NULL,
  `channel_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_inventory_indices_product_id_channel_id_unique` (`product_id`,`channel_id`),
  KEY `product_inventory_indices_channel_id_foreign` (`channel_id`),
  KEY `prod_inv_product_id_idx` (`product_id`),
  CONSTRAINT `product_inventory_indices_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_inventory_indices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1382 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_inventory_indices`
--

LOCK TABLES `product_inventory_indices` WRITE;
/*!40000 ALTER TABLE `product_inventory_indices` DISABLE KEYS */;
INSERT INTO `product_inventory_indices` VALUES (1,200,3538,1,NULL,NULL),(2,150,3539,1,NULL,NULL),(3,180,3540,1,NULL,NULL),(4,120,3541,1,NULL,NULL),(5,200,3542,1,NULL,NULL),(6,100,3543,1,NULL,NULL),(7,130,3544,1,NULL,NULL),(8,90,3545,1,NULL,NULL),(9,160,3546,1,NULL,NULL),(10,140,3547,1,NULL,NULL),(11,110,3548,1,NULL,NULL),(18,50,3558,1,NULL,NULL),(19,75,3559,1,NULL,NULL),(20,40,3560,1,NULL,NULL);
/*!40000 ALTER TABLE `product_inventory_indices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_ordered_inventories`
--

DROP TABLE IF EXISTS `product_ordered_inventories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_ordered_inventories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `qty` int NOT NULL DEFAULT '0',
  `product_id` int unsigned NOT NULL,
  `channel_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_ordered_inventories_product_id_channel_id_unique` (`product_id`,`channel_id`),
  KEY `product_ordered_inventories_channel_id_foreign` (`channel_id`),
  CONSTRAINT `product_ordered_inventories_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_ordered_inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_ordered_inventories`
--

LOCK TABLES `product_ordered_inventories` WRITE;
/*!40000 ALTER TABLE `product_ordered_inventories` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_ordered_inventories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_price_indices`
--

DROP TABLE IF EXISTS `product_price_indices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_price_indices` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `customer_group_id` int unsigned DEFAULT NULL,
  `channel_id` int unsigned NOT NULL DEFAULT '1',
  `min_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `regular_min_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `max_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `regular_max_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `price_indices_product_id_customer_group_id_channel_id_unique` (`product_id`,`customer_group_id`,`channel_id`),
  KEY `product_price_indices_customer_group_id_foreign` (`customer_group_id`),
  KEY `product_price_indices_channel_id_foreign` (`channel_id`),
  KEY `ppi_product_id_customer_group_id_idx` (`product_id`,`customer_group_id`),
  CONSTRAINT `product_price_indices_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_price_indices_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_price_indices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_price_indices`
--

LOCK TABLES `product_price_indices` WRITE;
/*!40000 ALTER TABLE `product_price_indices` DISABLE KEYS */;
INSERT INTO `product_price_indices` VALUES (1,3538,1,1,499.0000,599.0000,499.0000,599.0000,NULL,NULL),(2,3538,2,1,499.0000,599.0000,499.0000,599.0000,NULL,NULL),(3,3538,3,1,499.0000,599.0000,499.0000,599.0000,NULL,NULL),(4,3539,1,1,449.0000,449.0000,449.0000,449.0000,NULL,NULL),(5,3539,2,1,449.0000,449.0000,449.0000,449.0000,NULL,NULL),(6,3539,3,1,449.0000,449.0000,449.0000,449.0000,NULL,NULL),(7,3540,1,1,399.0000,399.0000,399.0000,399.0000,NULL,NULL),(8,3540,2,1,399.0000,399.0000,399.0000,399.0000,NULL,NULL),(9,3540,3,1,399.0000,399.0000,399.0000,399.0000,NULL,NULL),(10,3541,1,1,599.0000,699.0000,599.0000,699.0000,NULL,NULL),(11,3541,2,1,599.0000,699.0000,599.0000,699.0000,NULL,NULL),(12,3541,3,1,599.0000,699.0000,599.0000,699.0000,NULL,NULL),(13,3542,1,1,169.0000,199.0000,169.0000,199.0000,NULL,NULL),(14,3542,2,1,169.0000,199.0000,169.0000,199.0000,NULL,NULL),(15,3542,3,1,169.0000,199.0000,169.0000,199.0000,NULL,NULL),(16,3543,1,1,799.0000,899.0000,799.0000,899.0000,NULL,NULL),(17,3543,2,1,799.0000,899.0000,799.0000,899.0000,NULL,NULL),(18,3543,3,1,799.0000,899.0000,799.0000,899.0000,NULL,NULL),(19,3544,1,1,749.0000,749.0000,749.0000,749.0000,NULL,NULL),(20,3544,2,1,749.0000,749.0000,749.0000,749.0000,NULL,NULL),(21,3544,3,1,749.0000,749.0000,749.0000,749.0000,NULL,NULL),(22,3545,1,1,849.0000,999.0000,849.0000,999.0000,NULL,NULL),(23,3545,2,1,849.0000,999.0000,849.0000,999.0000,NULL,NULL),(24,3545,3,1,849.0000,999.0000,849.0000,999.0000,NULL,NULL),(25,3546,1,1,349.0000,349.0000,349.0000,349.0000,NULL,NULL),(26,3546,2,1,349.0000,349.0000,349.0000,349.0000,NULL,NULL),(27,3546,3,1,349.0000,349.0000,349.0000,349.0000,NULL,NULL),(28,3547,1,1,699.0000,799.0000,699.0000,799.0000,NULL,NULL),(29,3547,2,1,699.0000,799.0000,699.0000,799.0000,NULL,NULL),(30,3547,3,1,699.0000,799.0000,699.0000,799.0000,NULL,NULL),(31,3548,1,1,649.0000,649.0000,649.0000,649.0000,NULL,NULL),(32,3548,2,1,649.0000,649.0000,649.0000,649.0000,NULL,NULL),(33,3548,3,1,649.0000,649.0000,649.0000,649.0000,NULL,NULL),(58,3558,1,1,299.0000,299.0000,299.0000,299.0000,NULL,NULL),(59,3558,2,1,299.0000,299.0000,299.0000,299.0000,NULL,NULL),(60,3558,3,1,299.0000,299.0000,299.0000,299.0000,NULL,NULL),(61,3559,1,1,499.0000,499.0000,499.0000,499.0000,NULL,NULL),(62,3559,2,1,499.0000,499.0000,499.0000,499.0000,NULL,NULL),(63,3559,3,1,499.0000,499.0000,499.0000,499.0000,NULL,NULL),(64,3560,1,1,899.0000,899.0000,899.0000,899.0000,NULL,NULL),(65,3560,2,1,899.0000,899.0000,899.0000,899.0000,NULL,NULL),(66,3560,3,1,899.0000,899.0000,899.0000,899.0000,NULL,NULL),(67,3557,1,1,299.0000,299.0000,899.0000,899.0000,NULL,NULL),(68,3557,2,1,299.0000,299.0000,899.0000,899.0000,NULL,NULL),(69,3557,3,1,299.0000,299.0000,899.0000,899.0000,NULL,NULL);
/*!40000 ALTER TABLE `product_price_indices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_relations`
--

DROP TABLE IF EXISTS `product_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_relations` (
  `parent_id` int unsigned NOT NULL,
  `child_id` int unsigned NOT NULL,
  UNIQUE KEY `product_relations_parent_id_child_id_unique` (`parent_id`,`child_id`),
  KEY `product_relations_child_id_foreign` (`child_id`),
  CONSTRAINT `product_relations_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_relations_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_relations`
--

LOCK TABLES `product_relations` WRITE;
/*!40000 ALTER TABLE `product_relations` DISABLE KEYS */;
INSERT INTO `product_relations` VALUES (3539,3538),(3543,3538),(3546,3538),(3548,3538),(3545,3539),(3538,3540),(3539,3540),(3545,3540),(3557,3540),(3542,3541),(3544,3541),(3546,3541),(3547,3541),(3541,3542),(3546,3542),(3538,3543),(3548,3543),(3557,3543),(3541,3544),(3543,3544),(3547,3544),(3539,3545),(3542,3546),(3541,3547),(3544,3547),(3538,3548),(3543,3548),(3557,3548);
/*!40000 ALTER TABLE `product_relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_review_attachments`
--

DROP TABLE IF EXISTS `product_review_attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_review_attachments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `review_id` int unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_review_images_review_id_foreign` (`review_id`),
  CONSTRAINT `product_review_images_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `product_reviews` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_review_attachments`
--

LOCK TABLES `product_review_attachments` WRITE;
/*!40000 ALTER TABLE `product_review_attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_review_attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_reviews` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int unsigned NOT NULL,
  `customer_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prod_rev_product_id_idx` (`product_id`),
  CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_reviews`
--

LOCK TABLES `product_reviews` WRITE;
/*!40000 ALTER TABLE `product_reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_super_attributes`
--

DROP TABLE IF EXISTS `product_super_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_super_attributes` (
  `product_id` int unsigned NOT NULL,
  `attribute_id` int unsigned NOT NULL,
  UNIQUE KEY `product_super_attributes_product_id_attribute_id_unique` (`product_id`,`attribute_id`),
  KEY `product_super_attributes_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `product_super_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `product_super_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_super_attributes`
--

LOCK TABLES `product_super_attributes` WRITE;
/*!40000 ALTER TABLE `product_super_attributes` DISABLE KEYS */;
INSERT INTO `product_super_attributes` VALUES (3557,24);
/*!40000 ALTER TABLE `product_super_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_up_sells`
--

DROP TABLE IF EXISTS `product_up_sells`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_up_sells` (
  `parent_id` int unsigned NOT NULL,
  `child_id` int unsigned NOT NULL,
  UNIQUE KEY `product_up_sells_parent_id_child_id_unique` (`parent_id`,`child_id`),
  KEY `product_up_sells_child_id_foreign` (`child_id`),
  CONSTRAINT `product_up_sells_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_up_sells_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_up_sells`
--

LOCK TABLES `product_up_sells` WRITE;
/*!40000 ALTER TABLE `product_up_sells` DISABLE KEYS */;
INSERT INTO `product_up_sells` VALUES (3542,3541),(3541,3542),(3538,3543),(3557,3543),(3541,3544),(3543,3544),(3539,3545),(3543,3545),(3542,3546),(3538,3548),(3557,3548);
/*!40000 ALTER TABLE `product_up_sells` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_videos`
--

DROP TABLE IF EXISTS `product_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_videos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `prod_vid_product_id_idx` (`product_id`),
  CONSTRAINT `product_videos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_videos`
--

LOCK TABLES `product_videos` WRITE;
/*!40000 ALTER TABLE `product_videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int unsigned DEFAULT NULL,
  `attribute_family_id` int unsigned DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_sku_unique` (`sku`),
  KEY `products_attribute_family_id_foreign` (`attribute_family_id`),
  KEY `products_parent_id_foreign` (`parent_id`),
  CONSTRAINT `products_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `products_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4926 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3538,'navanidhi-moringa-powder','simple',NULL,1,NULL,'2026-09-26 06:50:56','2026-09-26 06:50:56'),(3539,'navanidhi-beetroot-powder','simple',NULL,1,NULL,'2026-09-26 06:50:56','2026-09-26 06:50:56'),(3540,'navanidhi-amla-powder','simple',NULL,1,NULL,'2026-09-26 06:50:56','2026-09-26 06:50:56'),(3541,'navanidhi-turmeric-powder','simple',NULL,1,NULL,'2026-09-26 06:50:57','2026-09-26 06:50:57'),(3542,'navanidhi-red-chilli-powder','simple',NULL,1,NULL,'2026-09-26 06:50:57','2026-09-26 06:50:57'),(3543,'navanidhi-green-vitality','simple',NULL,1,NULL,'2026-09-26 06:50:57','2026-09-26 06:50:57'),(3544,'navanidhi-golden-immunity','simple',NULL,1,NULL,'2026-09-26 06:50:57','2026-09-26 06:50:57'),(3545,'navanidhi-beauty-bloom','simple',NULL,1,NULL,'2026-09-26 06:50:57','2026-09-26 06:50:57'),(3546,'navanidhi-curry-leaf-powder','simple',NULL,1,NULL,'2026-09-26 06:50:57','2026-09-26 06:50:57'),(3547,'navanidhi-ashwagandha-powder','simple',NULL,1,NULL,'2026-09-26 06:50:58','2026-09-26 06:50:58'),(3548,'navanidhi-spirulina-powder','simple',NULL,1,NULL,'2026-09-26 06:50:58','2026-09-26 06:50:58'),(3557,'navanidhi-moringa-pack','configurable',NULL,1,NULL,'2026-09-26 08:28:30','2026-09-26 08:28:30'),(3558,'navanidhi-moringa-pack-100g','simple',3557,1,NULL,'2026-09-26 08:28:30','2026-09-26 08:28:30'),(3559,'navanidhi-moringa-pack-250g','simple',3557,1,NULL,'2026-09-26 08:28:30','2026-09-26 08:28:30'),(3560,'navanidhi-moringa-pack-500g','simple',3557,1,NULL,'2026-09-26 08:28:30','2026-09-26 08:28:30');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_products`
--

DROP TABLE IF EXISTS `recipe_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recipe_products` (
  `recipe_id` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  PRIMARY KEY (`recipe_id`,`product_id`),
  KEY `recipe_products_product_id_foreign` (`product_id`),
  CONSTRAINT `recipe_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `recipe_products_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_products`
--

LOCK TABLES `recipe_products` WRITE;
/*!40000 ALTER TABLE `recipe_products` DISABLE KEYS */;
INSERT INTO `recipe_products` VALUES (1,3538),(7,3538),(11,3538),(3,3539),(8,3539),(4,3540),(9,3540),(2,3541),(6,3541),(10,3541),(12,3541),(13,3542),(5,3543),(14,3546);
/*!40000 ALTER TABLE `recipe_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_translations`
--

DROP TABLE IF EXISTS `recipe_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recipe_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `recipe_id` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `ingredients` json DEFAULT NULL,
  `instructions` json DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `recipe_translations_recipe_id_locale_unique` (`recipe_id`,`locale`),
  UNIQUE KEY `recipe_translations_url_key_locale_unique` (`url_key`,`locale`),
  CONSTRAINT `recipe_translations_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=295 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_translations`
--

LOCK TABLES `recipe_translations` WRITE;
/*!40000 ALTER TABLE `recipe_translations` DISABLE KEYS */;
INSERT INTO `recipe_translations` VALUES (1,1,'ar','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(2,1,'bn','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(3,1,'ca','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(4,1,'de','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(5,1,'en','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(6,1,'es','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(7,1,'fa','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(8,1,'fr','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(9,1,'he','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(10,1,'hi_IN','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(11,1,'id','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(12,1,'it','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(13,1,'ja','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(14,1,'nl','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(15,1,'pl','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(16,1,'pt_BR','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(17,1,'ru','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(18,1,'sin','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(19,1,'tr','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(20,1,'uk','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(21,1,'zh_CN','Moringa Green Morning Smoothie','moringa-green-morning-smoothie','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 ripe banana, frozen\", \"1/2 cup fresh spinach\", \"1 cup oat milk\", \"A sprig of fresh mint\"]','[\"Add all ingredients to a high-speed blender.\", \"Blend on high until completely smooth and vibrant green.\", \"Pour into a chilled glass and garnish with a fresh mint sprig.\"]','Moringa Green Morning Smoothie | Navanidhi Naturals Botanical Recipes','A vibrant, nutrient-dense morning smoothie featuring organic moringa, fresh greens, and subtle sweetness to start your day beautifully.','recipe, botanical, navanidhi, moringa green morning smoothie'),(22,2,'ar','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(23,2,'bn','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(24,2,'ca','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(25,2,'de','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(26,2,'en','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(27,2,'es','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(28,2,'fa','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(29,2,'fr','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(30,2,'he','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(31,2,'hi_IN','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(32,2,'id','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(33,2,'it','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(34,2,'ja','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(35,2,'nl','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(36,2,'pl','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(37,2,'pt_BR','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(38,2,'ru','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(39,2,'sin','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(40,2,'tr','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(41,2,'uk','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(42,2,'zh_CN','Golden Turmeric Morning Drink','golden-turmeric-morning-drink','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup warm almond milk\", \"1/4 tsp ground cinnamon\", \"1 tsp raw honey\", \"A pinch of black pepper\"]','[\"In a small saucepan, gently warm the almond milk.\", \"Whisk in the turmeric, cinnamon, and black pepper until dissolved.\", \"Remove from heat, stir in honey, and serve immediately with a cinnamon stick.\"]','Golden Turmeric Morning Drink | Navanidhi Naturals Botanical Recipes','A soothing, warming tonic using pure Lakadong Turmeric, perfect for quiet mornings or gentle evening rituals.','recipe, botanical, navanidhi, golden turmeric morning drink'),(43,3,'ar','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(44,3,'bn','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(45,3,'ca','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(46,3,'de','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(47,3,'en','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(48,3,'es','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(49,3,'fa','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(50,3,'fr','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(51,3,'he','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(52,3,'hi_IN','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(53,3,'id','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(54,3,'it','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(55,3,'ja','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(56,3,'nl','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(57,3,'pl','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(58,3,'pt_BR','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(59,3,'ru','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(60,3,'sin','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(61,3,'tr','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(62,3,'uk','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(63,3,'zh_CN','Beetroot Berry Breakfast Smoothie','beetroot-berry-breakfast-smoothie','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 cup frozen mixed berries (strawberries, raspberries)\", \"1/2 cup plain coconut yogurt\", \"1/2 cup coconut water\", \"1 tbsp chia seeds\"]','[\"Combine the beetroot powder, berries, yogurt, and coconut water in a blender.\", \"Blend until smooth and creamy.\", \"Stir in chia seeds, let sit for 2 minutes to thicken, and serve.\"]','Beetroot Berry Breakfast Smoothie | Navanidhi Naturals Botanical Recipes','A gorgeous, deep-hued smoothie blending earthy beetroot powder with sweet mixed berries for a refreshing start.','recipe, botanical, navanidhi, beetroot berry breakfast smoothie'),(64,4,'ar','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(65,4,'bn','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(66,4,'ca','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(67,4,'de','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(68,4,'en','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(69,4,'es','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(70,4,'fa','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(71,4,'fr','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(72,4,'he','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(73,4,'hi_IN','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(74,4,'id','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(75,4,'it','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(76,4,'ja','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(77,4,'nl','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(78,4,'pl','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(79,4,'pt_BR','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(80,4,'ru','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(81,4,'sin','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(82,4,'tr','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(83,4,'uk','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(84,4,'zh_CN','Amla Citrus Morning Cooler','amla-citrus-morning-cooler','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 glass filtered water (or sparkling water)\", \"Juice of half a lemon\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"Dissolve the Amla powder in a small splash of warm water first.\", \"Fill a tall glass with ice and pour in the Amla mixture.\", \"Top with filtered water, lemon juice, and stir gently with fresh mint.\"]','Amla Citrus Morning Cooler | Navanidhi Naturals Botanical Recipes','A bright, crisp hydration ritual combining vitamin C-rich Amla with fresh lemon and mint over ice.','recipe, botanical, navanidhi, amla citrus morning cooler'),(85,5,'ar','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(86,5,'bn','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(87,5,'ca','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(88,5,'de','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(89,5,'en','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(90,5,'es','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(91,5,'fa','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(92,5,'fr','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(93,5,'he','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(94,5,'hi_IN','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(95,5,'id','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(96,5,'it','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(97,5,'ja','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(98,5,'nl','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(99,5,'pl','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(100,5,'pt_BR','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(101,5,'ru','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(102,5,'sin','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(103,5,'tr','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(104,5,'uk','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(105,5,'zh_CN','Green Vitality Smoothie','green-vitality-smoothie','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','[\"1 scoop Navanidhi Naturals Green Vitality Superblend\", \"1/2 cucumber, sliced\", \"1 green apple, cored\", \"1 cup coconut water\", \"A squeeze of fresh lime\"]','[\"Add cucumber, apple, Green Vitality Superblend, and coconut water to a blender.\", \"Blend until smooth and frothy.\", \"Serve immediately with a squeeze of fresh lime.\"]','Green Vitality Smoothie | Navanidhi Naturals Botanical Recipes','The ultimate superblend green smoothie, designed for comprehensive nourishment with cucumber and spinach.','recipe, botanical, navanidhi, green vitality smoothie'),(106,6,'ar','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(107,6,'bn','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(108,6,'ca','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(109,6,'de','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(110,6,'en','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(111,6,'es','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(112,6,'fa','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(113,6,'fr','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(114,6,'he','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(115,6,'hi_IN','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(116,6,'id','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(117,6,'it','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(118,6,'ja','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(119,6,'nl','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(120,6,'pl','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(121,6,'pt_BR','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(122,6,'ru','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(123,6,'sin','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(124,6,'tr','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(125,6,'uk','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(126,6,'zh_CN','Golden Oat Breakfast Bowl','golden-oat-breakfast-bowl','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/2 cup rolled oats\", \"1 cup milk of choice\", \"1/2 banana, sliced\", \"Chopped walnuts and a drizzle of maple syrup\"]','[\"Cook the oats in milk on a stovetop over medium heat.\", \"Once thickened, stir in the turmeric powder until the oats turn a beautiful golden color.\", \"Transfer to a bowl and arrange sliced bananas, walnuts, and maple syrup on top.\"]','Golden Oat Breakfast Bowl | Navanidhi Naturals Botanical Recipes','Warm, comforting oatmeal infused with turmeric, topped with fresh bananas and walnuts for a nourishing breakfast.','recipe, botanical, navanidhi, golden oat breakfast bowl'),(127,7,'ar','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(128,7,'bn','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(129,7,'ca','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(130,7,'de','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(131,7,'en','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(132,7,'es','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(133,7,'fa','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(134,7,'fr','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(135,7,'he','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(136,7,'hi_IN','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(137,7,'id','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(138,7,'it','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(139,7,'ja','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(140,7,'nl','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(141,7,'pl','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(142,7,'pt_BR','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(143,7,'ru','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(144,7,'sin','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(145,7,'tr','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(146,7,'uk','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(147,7,'zh_CN','Moringa Coconut Yogurt Bowl','moringa-coconut-yogurt-bowl','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','[\"1 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 cup plain coconut yogurt\", \"2 tbsp toasted coconut flakes\", \"Fresh blueberries\", \"1 tbsp pumpkin seeds\"]','[\"In a beautiful ceramic bowl, gently fold the Moringa powder into the coconut yogurt until evenly mixed.\", \"Smooth the surface with a spoon.\", \"Artfully arrange the coconut flakes, blueberries, and pumpkin seeds on top.\"]','Moringa Coconut Yogurt Bowl | Navanidhi Naturals Botanical Recipes','A visually stunning bright green yogurt bowl topped with toasted coconut, berries, and seeds.','recipe, botanical, navanidhi, moringa coconut yogurt bowl'),(148,8,'ar','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(149,8,'bn','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(150,8,'ca','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(151,8,'de','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(152,8,'en','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(153,8,'es','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(154,8,'fa','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(155,8,'fr','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(156,8,'he','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(157,8,'hi_IN','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(158,8,'id','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(159,8,'it','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(160,8,'ja','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(161,8,'nl','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(162,8,'pl','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(163,8,'pt_BR','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(164,8,'ru','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(165,8,'sin','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(166,8,'tr','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(167,8,'uk','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(168,8,'zh_CN','Beetroot Chocolate Smoothie','beetroot-chocolate-smoothie','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','[\"1 tsp Navanidhi Naturals Dehydrated Beetroot Powder\", \"1 tbsp raw cocoa powder\", \"2 Medjool dates, pitted\", \"1 cup oat milk\", \"1/2 frozen banana\"]','[\"Combine all ingredients in a blender.\", \"Blend on high until completely smooth, ensuring dates are fully broken down.\", \"Pour into a glass and lightly dust with extra cocoa powder.\"]','Beetroot Chocolate Smoothie | Navanidhi Naturals Botanical Recipes','A rich, decadent smoothie pairing earthy beetroot with dark cocoa and sweet dates.','recipe, botanical, navanidhi, beetroot chocolate smoothie'),(169,9,'ar','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(170,9,'bn','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(171,9,'ca','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(172,9,'de','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(173,9,'en','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(174,9,'es','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(175,9,'fa','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(176,9,'fr','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(177,9,'he','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(178,9,'hi_IN','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(179,9,'id','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(180,9,'it','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(181,9,'ja','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(182,9,'nl','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(183,9,'pl','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(184,9,'pt_BR','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(185,9,'ru','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(186,9,'sin','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(187,9,'tr','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(188,9,'uk','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(189,9,'zh_CN','Amla Mint Refresher','amla-mint-refresher','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','[\"1/2 tsp Navanidhi Naturals Wild-Harvested Amla Powder\", \"1 cup sparkling water\", \"Fresh mint leaves\", \"Ice cubes\"]','[\"In a small glass, whisk the Amla powder with 1 tbsp of warm water to dissolve.\", \"Fill a serving glass with ice and bruised mint leaves.\", \"Pour the Amla liquid over ice and top with sparkling water. Stir gently.\"]','Amla Mint Refresher | Navanidhi Naturals Botanical Recipes','A crisp, cooling herbal water infusion, perfect for afternoon hydration.','recipe, botanical, navanidhi, amla mint refresher'),(190,10,'ar','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(191,10,'bn','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(192,10,'ca','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(193,10,'de','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(194,10,'en','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(195,10,'es','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(196,10,'fa','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(197,10,'fr','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(198,10,'he','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(199,10,'hi_IN','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(200,10,'id','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(201,10,'it','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(202,10,'ja','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(203,10,'nl','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(204,10,'pl','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(205,10,'pt_BR','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(206,10,'ru','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(207,10,'sin','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(208,10,'tr','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(209,10,'uk','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(210,10,'zh_CN','Turmeric Ginger Oat Latte','turmeric-ginger-oat-latte','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1/4 tsp ground ginger (or grated fresh ginger)\", \"1 cup barista-style oat milk\", \"1 tsp maple syrup\"]','[\"Heat the oat milk in a saucepan or use a milk frother.\", \"Whisk in the turmeric, ginger, and maple syrup until perfectly smooth and frothy.\", \"Pour into your favorite mug and enjoy warm.\"]','Turmeric Ginger Oat Latte | Navanidhi Naturals Botanical Recipes','A spiced, creamy oat milk latte featuring the warmth of Lakadong turmeric and fresh ginger.','recipe, botanical, navanidhi, turmeric ginger oat latte'),(211,11,'ar','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(212,11,'bn','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(213,11,'ca','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(214,11,'de','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(215,11,'en','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(216,11,'es','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(217,11,'fa','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(218,11,'fr','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(219,11,'he','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(220,11,'hi_IN','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(221,11,'id','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(222,11,'it','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(223,11,'ja','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(224,11,'nl','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(225,11,'pl','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(226,11,'pt_BR','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(227,11,'ru','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(228,11,'sin','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(229,11,'tr','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(230,11,'uk','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(231,11,'zh_CN','Green Herb Avocado Toast','green-herb-avocado-toast','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','[\"1/4 tsp Navanidhi Naturals Organic Moringa Leaf Powder\", \"1 slice artisan sourdough bread\", \"1/2 ripe avocado\", \"Lemon zest\", \"Sea salt, black pepper, and mixed seeds\"]','[\"Toast the sourdough slice to your liking.\", \"Mash the avocado and gently fold in the Moringa powder.\", \"Spread the mixture evenly on the toast and top with lemon zest, salt, pepper, and seeds.\"]','Green Herb Avocado Toast | Navanidhi Naturals Botanical Recipes','A savory twist on a classic, elevating avocado toast with a sprinkle of nutrient-dense greens.','recipe, botanical, navanidhi, green herb avocado toast'),(232,12,'ar','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(233,12,'bn','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(234,12,'ca','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(235,12,'de','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(236,12,'en','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(237,12,'es','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(238,12,'fa','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(239,12,'fr','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(240,12,'he','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(241,12,'hi_IN','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(242,12,'id','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(243,12,'it','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(244,12,'ja','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(245,12,'nl','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(246,12,'pl','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(247,12,'pt_BR','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(248,12,'ru','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(249,12,'sin','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(250,12,'tr','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(251,12,'uk','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(252,12,'zh_CN','Golden Banana Breakfast Shake','golden-banana-breakfast-shake','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','[\"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 frozen banana\", \"1 cup whole milk or almond milk\", \"1 tbsp almond butter\", \"A dash of cinnamon\"]','[\"Place the banana, milk, almond butter, turmeric, and cinnamon in a blender.\", \"Blend on high for 30 seconds until creamy and fully combined.\", \"Serve immediately in a tall glass.\"]','Golden Banana Breakfast Shake | Navanidhi Naturals Botanical Recipes','A quick, satisfying breakfast shake combining creamy banana with the subtle earthiness of turmeric.','recipe, botanical, navanidhi, golden banana breakfast shake'),(253,13,'ar','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(254,13,'bn','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(255,13,'ca','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(256,13,'de','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(257,13,'en','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(258,13,'es','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(259,13,'fa','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(260,13,'fr','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(261,13,'he','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(262,13,'hi_IN','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(263,13,'id','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(264,13,'it','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(265,13,'ja','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(266,13,'nl','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(267,13,'pl','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(268,13,'pt_BR','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(269,13,'ru','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(270,13,'sin','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(271,13,'tr','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(272,13,'uk','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(273,13,'zh_CN','Authentic South Indian Sambar with Pure Red Chilli & Lakadong Turmeric','authentic-sambar-red-chilli-turmeric','A fragrant, slow-simmered lentil and vegetable stew enriched with Navanidhi Naturals stone-ground Pure Red Chilli and high-curcumin Lakadong Turmeric.','[\"1 tsp Navanidhi Naturals Pure Red Chilli Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"1 cup toor dal (split pigeon peas), boiled soft\", \"1 cup mixed vegetables (drumsticks, shallots, pumpkin)\", \"1 tbsp tamarind pulp\", \"1 tsp mustard seeds & cumin seeds\", \"1 tsp Navanidhi Naturals Curry Leaf Powder (or fresh sprigs)\", \"1 tbsp cold-pressed sesame oil or ghee\"]','[\"Simmer vegetables in tamarind water with turmeric and red chilli powder until tender.\", \"Add cooked toor dal and salt, simmering for 7–10 minutes to meld flavours.\", \"Prepare tempering with mustard, cumin, and curry leaf in hot ghee.\", \"Pour tempering over sambar and serve piping hot with steamed rice or idlis.\"]','Authentic Sambar with Pure Red Chilli & Turmeric | Navanidhi Naturals','Traditional homestyle South Indian sambar made with stone-ground pure red chilli and Lakadong turmeric by MAN Agro Foods.','sambar recipe, pure red chilli powder, lakadong turmeric recipe, indian culinary recipes'),(274,14,'ar','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(275,14,'bn','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(276,14,'ca','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(277,14,'de','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(278,14,'en','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(279,14,'es','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(280,14,'fa','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(281,14,'fr','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(282,14,'he','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(283,14,'hi_IN','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(284,14,'id','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(285,14,'it','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(286,14,'ja','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(287,14,'nl','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(288,14,'pl','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(289,14,'pt_BR','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(290,14,'ru','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(291,14,'sin','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(292,14,'tr','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(293,14,'uk','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes'),(294,14,'zh_CN','Aromatic Tempered Lemon Rice with Sun-Dried Curry Leaf','aromatic-tempered-lemon-rice','Classic South Indian chitranna (lemon rice) infused with the iron-rich aroma of sun-dried curry leaves and golden Lakadong turmeric.','[\"1 tsp Navanidhi Naturals Sun-Dried Curry Leaf Powder\", \"1/2 tsp Navanidhi Naturals Lakadong Turmeric Powder\", \"2 cups cooked and cooled sona masoori rice\", \"2 tbsp fresh lemon juice\", \"2 tbsp raw peanuts and roasted chana dal\", \"1 green chilli, slit\", \"1 tbsp sesame oil or ghee\"]','[\"Heat oil in a pan, roast peanuts and lentils until crunchy and golden.\", \"Add turmeric, slit chilli, and curry leaf powder, letting the aroma bloom for 15 seconds.\", \"Toss in cooked rice and salt, gently mixing until evenly coated in golden sunshine.\", \"Turn off heat, stir in fresh lemon juice, and serve warm.\"]','Tempered Lemon Rice with Curry Leaf Powder | Navanidhi Naturals','Fragrant lemon rice tempered with sun-dried curry leaf powder and Lakadong turmeric. Simple, nourishing, and authentic.','curry leaf rice recipe, lakadong turmeric, sun-dried curry leaf, indian culinary recipes');
/*!40000 ALTER TABLE `recipe_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recipes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prep_time` int DEFAULT NULL COMMENT 'Preparation time in minutes',
  `cook_time` int DEFAULT NULL COMMENT 'Cooking time in minutes',
  `difficulty` int NOT NULL DEFAULT '1' COMMENT '1: Easy, 2: Medium, 3: Hard',
  `servings` int DEFAULT NULL COMMENT 'Number of servings',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES (1,1,'recipes/moringa_smoothie.jpg',5,0,1,1,'2026-09-26 08:28:55','2026-09-26 19:32:53'),(2,1,'recipes/turmeric_drink.jpg',5,5,1,1,'2026-09-26 08:28:55','2026-09-26 19:32:53'),(3,1,'recipes/beetroot_smoothie.jpg',5,0,1,1,'2026-09-26 08:28:55','2026-09-26 19:32:53'),(4,1,'recipes/amla_cooler.jpg',3,0,1,1,'2026-09-26 08:28:55','2026-09-26 19:32:53'),(5,1,'recipes/green_vitality.jpg',5,0,1,1,'2026-09-26 08:28:55','2026-09-26 19:32:53'),(6,1,'recipes/golden_oat_bowl.jpg',5,10,1,1,'2026-09-26 08:28:55','2026-09-26 19:32:53'),(7,1,'recipes/moringa_bowl.jpg',5,0,1,1,'2026-09-26 08:28:55','2026-09-26 19:32:53'),(8,1,'recipes/beetroot_chocolate.jpg',5,0,1,1,'2026-09-26 08:28:55','2026-09-26 19:32:53'),(9,1,'recipes/amla_refresher.jpg',3,0,1,1,'2026-09-26 08:28:56','2026-09-26 19:32:53'),(10,1,'recipes/turmeric_latte.jpg',5,5,1,1,'2026-09-26 08:28:56','2026-09-26 19:32:53'),(11,1,'recipes/green_toast.jpg',7,3,1,1,'2026-09-26 08:28:56','2026-09-26 19:32:53'),(12,1,'recipes/golden_banana_shake.jpg',5,0,1,1,'2026-09-26 08:28:56','2026-09-26 19:32:53'),(13,1,'recipes/turmeric_drink.jpg',15,25,1,4,'2026-09-26 08:28:56','2026-09-26 19:32:53'),(14,1,'recipes/green_toast.jpg',10,15,1,2,'2026-09-26 08:28:56','2026-09-26 19:32:53');
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refund_items`
--

DROP TABLE IF EXISTS `refund_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refund_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_percent` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `price_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `product_id` int unsigned DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item_id` int unsigned DEFAULT NULL,
  `refund_id` int unsigned DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `refund_items_parent_id_foreign` (`parent_id`),
  KEY `refund_items_order_item_id_foreign` (`order_item_id`),
  KEY `refund_items_refund_id_foreign` (`refund_id`),
  CONSTRAINT `refund_items_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `refund_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `refund_items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `refund_items_refund_id_foreign` FOREIGN KEY (`refund_id`) REFERENCES `refunds` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refund_items`
--

LOCK TABLES `refund_items` WRITE;
/*!40000 ALTER TABLE `refund_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `refund_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refunds`
--

DROP TABLE IF EXISTS `refunds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refunds` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `increment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT '0',
  `total_qty` int DEFAULT NULL,
  `base_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adjustment_refund` decimal(12,4) DEFAULT '0.0000',
  `base_adjustment_refund` decimal(12,4) DEFAULT '0.0000',
  `adjustment_fee` decimal(12,4) DEFAULT '0.0000',
  `base_adjustment_fee` decimal(12,4) DEFAULT '0.0000',
  `sub_total` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total` decimal(12,4) DEFAULT '0.0000',
  `grand_total` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total` decimal(12,4) DEFAULT '0.0000',
  `shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_percent` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `shipping_tax_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_shipping_tax_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `order_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `refunds_order_id_foreign` (`order_id`),
  CONSTRAINT `refunds_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refunds`
--

LOCK TABLES `refunds` WRITE;
/*!40000 ALTER TABLE `refunds` DISABLE KEYS */;
/*!40000 ALTER TABLE `refunds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rma`
--

DROP TABLE IF EXISTS `rma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rma` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned NOT NULL,
  `rma_status_id` int unsigned DEFAULT NULL,
  `package_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rma_order_id_foreign` (`order_id`),
  KEY `rma_rma_status_id_foreign` (`rma_status_id`),
  CONSTRAINT `rma_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rma_rma_status_id_foreign` FOREIGN KEY (`rma_status_id`) REFERENCES `rma_statuses` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rma`
--

LOCK TABLES `rma` WRITE;
/*!40000 ALTER TABLE `rma` DISABLE KEYS */;
/*!40000 ALTER TABLE `rma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rma_additional_fields`
--

DROP TABLE IF EXISTS `rma_additional_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rma_additional_fields` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rma_id` int unsigned DEFAULT NULL,
  `rma_custom_field_id` int unsigned DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rma_additional_fields_rma_id_foreign` (`rma_id`),
  KEY `rma_additional_fields_rma_custom_field_id_foreign` (`rma_custom_field_id`),
  CONSTRAINT `rma_additional_fields_rma_custom_field_id_foreign` FOREIGN KEY (`rma_custom_field_id`) REFERENCES `rma_custom_fields` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rma_additional_fields_rma_id_foreign` FOREIGN KEY (`rma_id`) REFERENCES `rma` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rma_additional_fields`
--

LOCK TABLES `rma_additional_fields` WRITE;
/*!40000 ALTER TABLE `rma_additional_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `rma_additional_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rma_custom_field_options`
--

DROP TABLE IF EXISTS `rma_custom_field_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rma_custom_field_options` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rma_custom_field_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rma_custom_field_options_rma_custom_field_id_foreign` (`rma_custom_field_id`),
  CONSTRAINT `rma_custom_field_options_rma_custom_field_id_foreign` FOREIGN KEY (`rma_custom_field_id`) REFERENCES `rma_custom_fields` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rma_custom_field_options`
--

LOCK TABLES `rma_custom_field_options` WRITE;
/*!40000 ALTER TABLE `rma_custom_field_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `rma_custom_field_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rma_custom_fields`
--

DROP TABLE IF EXISTS `rma_custom_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rma_custom_fields` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) DEFAULT '0',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_required` tinyint(1) DEFAULT '0',
  `position` int DEFAULT '0',
  `input_validation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rma_custom_fields_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rma_custom_fields`
--

LOCK TABLES `rma_custom_fields` WRITE;
/*!40000 ALTER TABLE `rma_custom_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `rma_custom_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rma_images`
--

DROP TABLE IF EXISTS `rma_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rma_images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rma_id` int unsigned NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rma_images_rma_id_foreign` (`rma_id`),
  CONSTRAINT `rma_images_rma_id_foreign` FOREIGN KEY (`rma_id`) REFERENCES `rma` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rma_images`
--

LOCK TABLES `rma_images` WRITE;
/*!40000 ALTER TABLE `rma_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `rma_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rma_items`
--

DROP TABLE IF EXISTS `rma_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rma_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rma_id` int unsigned DEFAULT NULL,
  `rma_reason_id` int unsigned DEFAULT NULL,
  `order_item_id` int unsigned DEFAULT NULL,
  `variant_id` int unsigned DEFAULT NULL,
  `quantity` int unsigned NOT NULL,
  `resolution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rma_items_rma_id_foreign` (`rma_id`),
  KEY `rma_items_rma_reason_id_foreign` (`rma_reason_id`),
  KEY `rma_items_order_item_id_foreign` (`order_item_id`),
  KEY `rma_items_variant_id_foreign` (`variant_id`),
  CONSTRAINT `rma_items_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rma_items_rma_id_foreign` FOREIGN KEY (`rma_id`) REFERENCES `rma` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rma_items_rma_reason_id_foreign` FOREIGN KEY (`rma_reason_id`) REFERENCES `rma_reasons` (`id`) ON DELETE SET NULL,
  CONSTRAINT `rma_items_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rma_items`
--

LOCK TABLES `rma_items` WRITE;
/*!40000 ALTER TABLE `rma_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `rma_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rma_messages`
--

DROP TABLE IF EXISTS `rma_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rma_messages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rma_id` int unsigned NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_path` longtext COLLATE utf8mb4_unicode_ci,
  `attachment` longtext COLLATE utf8mb4_unicode_ci,
  `is_admin` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rma_messages_rma_id_foreign` (`rma_id`),
  CONSTRAINT `rma_messages_rma_id_foreign` FOREIGN KEY (`rma_id`) REFERENCES `rma` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rma_messages`
--

LOCK TABLES `rma_messages` WRITE;
/*!40000 ALTER TABLE `rma_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `rma_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rma_reason_resolutions`
--

DROP TABLE IF EXISTS `rma_reason_resolutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rma_reason_resolutions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rma_reason_id` int unsigned NOT NULL,
  `resolution_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rma_reason_resolutions_rma_reason_id_foreign` (`rma_reason_id`),
  CONSTRAINT `rma_reason_resolutions_rma_reason_id_foreign` FOREIGN KEY (`rma_reason_id`) REFERENCES `rma_reasons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rma_reason_resolutions`
--

LOCK TABLES `rma_reason_resolutions` WRITE;
/*!40000 ALTER TABLE `rma_reason_resolutions` DISABLE KEYS */;
INSERT INTO `rma_reason_resolutions` VALUES (21,11,'return','2026-09-21 17:34:01','2026-09-21 17:34:01'),(22,11,'cancel_items','2026-09-21 17:34:01','2026-09-21 17:34:01'),(23,12,'return','2026-09-21 17:34:01','2026-09-21 17:34:01'),(24,12,'cancel_items','2026-09-21 17:34:01','2026-09-21 17:34:01'),(25,13,'return','2026-09-21 17:34:01','2026-09-21 17:34:01'),(26,13,'cancel_items','2026-09-21 17:34:01','2026-09-21 17:34:01'),(27,14,'return','2026-09-21 17:34:01','2026-09-21 17:34:01'),(28,14,'cancel_items','2026-09-21 17:34:01','2026-09-21 17:34:01'),(29,15,'return','2026-09-21 17:34:01','2026-09-21 17:34:01'),(30,15,'cancel_items','2026-09-21 17:34:01','2026-09-21 17:34:01');
/*!40000 ALTER TABLE `rma_reason_resolutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rma_reasons`
--

DROP TABLE IF EXISTS `rma_reasons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rma_reasons` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `position` int NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rma_reasons`
--

LOCK TABLES `rma_reasons` WRITE;
/*!40000 ALTER TABLE `rma_reasons` DISABLE KEYS */;
INSERT INTO `rma_reasons` VALUES (11,'Manufacturer Defect',1,1,0,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(12,'Damaged During Shipping',1,2,0,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(13,'Wrong Description Online',1,3,0,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(14,'Dead On Arrival',1,4,0,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(15,'Product Not Received Yet',1,5,0,'2026-09-21 17:34:01','2026-09-21 17:34:01');
/*!40000 ALTER TABLE `rma_reasons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rma_rules`
--

DROP TABLE IF EXISTS `rma_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rma_rules` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `return_period` int DEFAULT NULL,
  `default` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rma_rules`
--

LOCK TABLES `rma_rules` WRITE;
/*!40000 ALTER TABLE `rma_rules` DISABLE KEYS */;
INSERT INTO `rma_rules` VALUES (3,'Basic','1',1,10,NULL,'2026-09-21 17:34:01','2026-09-21 17:34:01');
/*!40000 ALTER TABLE `rma_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rma_statuses`
--

DROP TABLE IF EXISTS `rma_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rma_statuses` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rma_statuses`
--

LOCK TABLES `rma_statuses` WRITE;
/*!40000 ALTER TABLE `rma_statuses` DISABLE KEYS */;
INSERT INTO `rma_statuses` VALUES (1,'Pending Review',1,'#efb308',1,NULL,NULL),(2,'Approved',1,'#12af56',1,NULL,NULL),(3,'Awaiting Return',1,'#f59e0b',1,NULL,NULL),(4,'Return In Transit',1,'#3b82f6',1,NULL,NULL),(5,'Refunded',1,'#10b981',1,NULL,NULL),(6,'Solved',1,'#47b84f',1,NULL,NULL),(7,'Request Declined',1,'#e11d48',1,NULL,NULL),(8,'Item Canceled',1,'#dc2626',1,NULL,NULL),(9,'Request Canceled',1,'#991b1b',1,NULL,NULL);
/*!40000 ALTER TABLE `rma_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator','This role users will have all the access','all',NULL,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `search_synonyms`
--

DROP TABLE IF EXISTS `search_synonyms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `search_synonyms` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search_synonyms`
--

LOCK TABLES `search_synonyms` WRITE;
/*!40000 ALTER TABLE `search_synonyms` DISABLE KEYS */;
/*!40000 ALTER TABLE `search_synonyms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `search_terms`
--

DROP TABLE IF EXISTS `search_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `search_terms` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `results` int NOT NULL DEFAULT '0',
  `uses` int NOT NULL DEFAULT '0',
  `redirect_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_in_suggested_terms` tinyint(1) NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `search_terms_channel_id_foreign` (`channel_id`),
  CONSTRAINT `search_terms_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search_terms`
--

LOCK TABLES `search_terms` WRITE;
/*!40000 ALTER TABLE `search_terms` DISABLE KEYS */;
/*!40000 ALTER TABLE `search_terms` ENABLE KEYS */;
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
INSERT INTO `sessions` VALUES ('8f8PtuPDKy4Ts8rRNJ1YdUs43p7swoY27vBgbmj7',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiY29hOXhKcWlrVEJ4MFZwUjNLNVBCTWJDYjY5RHBaMDF3Wk05NjRnZiI7czo2OiJsb2NhbGUiO3M6MjoiZW4iO3M6ODoiY3VycmVuY3kiO3M6MzoiSU5SIjtzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozNjoiaHR0cDovL21hbmFncm8udGVzdC9jaGVja291dC9vbmVwYWdlIjtzOjU6InJvdXRlIjtzOjI3OiJzaG9wLmNoZWNrb3V0Lm9uZXBhZ2UuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6ImNhcnQiO086ODoic3RkQ2xhc3MiOjE6e3M6MjoiaWQiO2k6ODgyO319',1790521379),('F55ZIwWvyzLKiTMzArqmsPsMNVI8KlmZTVdTp63Y',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOEl4eVpqOEtYcU1sczBHelVkR3p6d0h5MlVOS3NzVVpGUXNYeWt6MyI7czo2OiJsb2NhbGUiO3M6MjoiZW4iO3M6ODoiY3VycmVuY3kiO3M6MzoiSU5SIjtzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czoxOToiaHR0cDovL21hbmFncm8udGVzdCI7czo1OiJyb3V0ZSI7czoxNToic2hvcC5ob21lLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1790512701),('Y1IR6jJOPACHbzh0lPuHvsA9kuOtZA4u7vZdfxXp',NULL,'127.0.0.1','curl/8.21.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoibTRZUVdoRDVKd3NyWDEzSGVpWVROMEZkNTVpOWZWb2hnekRmTWg5QSI7czo2OiJsb2NhbGUiO3M6MjoiZW4iO3M6ODoiY3VycmVuY3kiO3M6MzoiSU5SIjtzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozMzoiaHR0cDovL21hbmFncm8udGVzdC9wYWdlL2Fib3V0LXVzIjtzOjU6InJvdXRlIjtzOjEzOiJzaG9wLmNtcy5wYWdlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1790513433);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipment_items`
--

DROP TABLE IF EXISTS `shipment_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipment_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `weight` decimal(12,4) DEFAULT NULL,
  `price` decimal(12,4) DEFAULT '0.0000',
  `base_price` decimal(12,4) DEFAULT '0.0000',
  `total` decimal(12,4) DEFAULT '0.0000',
  `base_total` decimal(12,4) DEFAULT '0.0000',
  `price_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price_incl_tax` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `product_id` int unsigned DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item_id` int unsigned DEFAULT NULL,
  `shipment_id` int unsigned NOT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shipment_items_shipment_id_foreign` (`shipment_id`),
  CONSTRAINT `shipment_items_shipment_id_foreign` FOREIGN KEY (`shipment_id`) REFERENCES `shipments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipment_items`
--

LOCK TABLES `shipment_items` WRITE;
/*!40000 ALTER TABLE `shipment_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipment_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipments`
--

DROP TABLE IF EXISTS `shipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` int DEFAULT NULL,
  `total_weight` decimal(12,4) DEFAULT NULL,
  `carrier_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carrier_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `track_number` text COLLATE utf8mb4_unicode_ci,
  `email_sent` tinyint(1) NOT NULL DEFAULT '0',
  `customer_id` int unsigned DEFAULT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int unsigned NOT NULL,
  `order_address_id` int unsigned DEFAULT NULL,
  `inventory_source_id` int unsigned DEFAULT NULL,
  `inventory_source_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shipments_order_id_foreign` (`order_id`),
  KEY `shipments_inventory_source_id_foreign` (`inventory_source_id`),
  CONSTRAINT `shipments_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE SET NULL,
  CONSTRAINT `shipments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipments`
--

LOCK TABLES `shipments` WRITE;
/*!40000 ALTER TABLE `shipments` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_zone_locations`
--

DROP TABLE IF EXISTS `shipping_zone_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_zone_locations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `shipping_zone_id` int unsigned NOT NULL,
  `location_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shipping_zone_locations_shipping_zone_id_foreign` (`shipping_zone_id`),
  CONSTRAINT `shipping_zone_locations_shipping_zone_id_foreign` FOREIGN KEY (`shipping_zone_id`) REFERENCES `shipping_zones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_zone_locations`
--

LOCK TABLES `shipping_zone_locations` WRITE;
/*!40000 ALTER TABLE `shipping_zone_locations` DISABLE KEYS */;
INSERT INTO `shipping_zone_locations` VALUES (1,1,'state','AP','2026-09-21 17:34:01','2026-09-21 21:05:26'),(2,1,'state','TG','2026-09-21 17:34:01','2026-09-21 21:05:26'),(3,2,'country','IN','2026-09-21 17:34:01','2026-09-21 21:05:26');
/*!40000 ALTER TABLE `shipping_zone_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_zone_methods`
--

DROP TABLE IF EXISTS `shipping_zone_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_zone_methods` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `shipping_zone_id` int unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `min_weight` decimal(12,4) DEFAULT NULL,
  `max_weight` decimal(12,4) DEFAULT NULL,
  `min_subtotal` decimal(12,4) DEFAULT NULL,
  `max_subtotal` decimal(12,4) DEFAULT NULL,
  `priority` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shipping_zone_methods_shipping_zone_id_foreign` (`shipping_zone_id`),
  CONSTRAINT `shipping_zone_methods_shipping_zone_id_foreign` FOREIGN KEY (`shipping_zone_id`) REFERENCES `shipping_zones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_zone_methods`
--

LOCK TABLES `shipping_zone_methods` WRITE;
/*!40000 ALTER TABLE `shipping_zone_methods` DISABLE KEYS */;
INSERT INTO `shipping_zone_methods` VALUES (1,1,'flat_rate','Flat Rate',1,60.0000,0.0000,0.0000,0.0000,0.0000,1,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(2,1,'free_shipping','Free Shipping (Over 499)',1,0.0000,0.0000,0.0000,499.0000,0.0000,2,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(3,2,'flat_rate','Flat Rate',1,100.0000,NULL,NULL,NULL,NULL,1,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(4,2,'free_shipping','Free Shipping (Over 499)',1,0.0000,NULL,NULL,499.0000,NULL,2,'2026-09-21 17:34:01','2026-09-21 17:34:01');
/*!40000 ALTER TABLE `shipping_zone_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_zones`
--

DROP TABLE IF EXISTS `shipping_zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_zones` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_zones`
--

LOCK TABLES `shipping_zones` WRITE;
/*!40000 ALTER TABLE `shipping_zones` DISABLE KEYS */;
INSERT INTO `shipping_zones` VALUES (1,'Andhra & Telangana',1,'2026-09-21 16:18:47','2026-09-21 17:34:01'),(2,'Rest of India',1,'2026-09-21 16:18:47','2026-09-21 17:34:01');
/*!40000 ALTER TABLE `shipping_zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sitemap_channels`
--

DROP TABLE IF EXISTS `sitemap_channels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sitemap_channels` (
  `sitemap_id` int unsigned NOT NULL,
  `channel_id` int unsigned NOT NULL,
  UNIQUE KEY `sitemap_channels_sitemap_id_channel_id_unique` (`sitemap_id`,`channel_id`),
  KEY `sitemap_channels_channel_id_foreign` (`channel_id`),
  CONSTRAINT `sitemap_channels_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sitemap_channels_sitemap_id_foreign` FOREIGN KEY (`sitemap_id`) REFERENCES `sitemaps` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sitemap_channels`
--

LOCK TABLES `sitemap_channels` WRITE;
/*!40000 ALTER TABLE `sitemap_channels` DISABLE KEYS */;
/*!40000 ALTER TABLE `sitemap_channels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sitemaps`
--

DROP TABLE IF EXISTS `sitemaps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sitemaps` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional` json DEFAULT NULL,
  `generated_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sitemaps`
--

LOCK TABLES `sitemaps` WRITE;
/*!40000 ALTER TABLE `sitemaps` DISABLE KEYS */;
/*!40000 ALTER TABLE `sitemaps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribers_list`
--

DROP TABLE IF EXISTS `subscribers_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscribers_list` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_subscribed` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int unsigned DEFAULT NULL,
  `channel_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscribers_list_customer_id_foreign` (`customer_id`),
  KEY `subscribers_list_channel_id_foreign` (`channel_id`),
  CONSTRAINT `subscribers_list_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subscribers_list_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers_list`
--

LOCK TABLES `subscribers_list` WRITE;
/*!40000 ALTER TABLE `subscribers_list` DISABLE KEYS */;
INSERT INTO `subscribers_list` VALUES (1,'aarav.reddy@example.com',1,'6ab1a648b0ea2',1,1,'2026-09-21 21:48:56','2026-09-21 21:48:56');
/*!40000 ALTER TABLE `subscribers_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_categories`
--

DROP TABLE IF EXISTS `tax_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tax_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tax_categories_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax_categories`
--

LOCK TABLES `tax_categories` WRITE;
/*!40000 ALTER TABLE `tax_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `tax_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_categories_tax_rates`
--

DROP TABLE IF EXISTS `tax_categories_tax_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tax_categories_tax_rates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tax_category_id` int unsigned NOT NULL,
  `tax_rate_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tax_map_index_unique` (`tax_category_id`,`tax_rate_id`),
  KEY `tax_categories_tax_rates_tax_rate_id_foreign` (`tax_rate_id`),
  CONSTRAINT `tax_categories_tax_rates_tax_category_id_foreign` FOREIGN KEY (`tax_category_id`) REFERENCES `tax_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tax_categories_tax_rates_tax_rate_id_foreign` FOREIGN KEY (`tax_rate_id`) REFERENCES `tax_rates` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax_categories_tax_rates`
--

LOCK TABLES `tax_categories_tax_rates` WRITE;
/*!40000 ALTER TABLE `tax_categories_tax_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `tax_categories_tax_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_rates`
--

DROP TABLE IF EXISTS `tax_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tax_rates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_zip` tinyint(1) NOT NULL DEFAULT '0',
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate` decimal(12,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tax_rates_identifier_unique` (`identifier`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax_rates`
--

LOCK TABLES `tax_rates` WRITE;
/*!40000 ALTER TABLE `tax_rates` DISABLE KEYS */;
INSERT INTO `tax_rates` VALUES (1,'GST_',0,'',NULL,NULL,'','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(2,'GST_AN',0,'',NULL,NULL,'AN','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(3,'GST_AP',0,'',NULL,NULL,'AP','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(4,'GST_AR',0,'',NULL,NULL,'AR','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(5,'GST_AS',0,'',NULL,NULL,'AS','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(6,'GST_BR',0,'',NULL,NULL,'BR','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(7,'GST_CH',0,'',NULL,NULL,'CH','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(8,'GST_CT',0,'',NULL,NULL,'CT','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(9,'GST_DH',0,'',NULL,NULL,'DH','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(10,'GST_DD',0,'',NULL,NULL,'DD','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(11,'GST_DL',0,'',NULL,NULL,'DL','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(12,'GST_GA',0,'',NULL,NULL,'GA','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(13,'GST_GJ',0,'',NULL,NULL,'GJ','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(14,'GST_HR',0,'',NULL,NULL,'HR','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(15,'GST_HP',0,'',NULL,NULL,'HP','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(16,'GST_JK',0,'',NULL,NULL,'JK','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(17,'GST_JH',0,'',NULL,NULL,'JH','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(18,'GST_KA',0,'',NULL,NULL,'KA','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(19,'GST_KL',0,'',NULL,NULL,'KL','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(20,'GST_LD',0,'',NULL,NULL,'LD','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(21,'GST_MP',0,'',NULL,NULL,'MP','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(22,'GST_MH',0,'',NULL,NULL,'MH','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(23,'GST_MN',0,'',NULL,NULL,'MN','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(24,'GST_ML',0,'',NULL,NULL,'ML','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(25,'GST_MZ',0,'',NULL,NULL,'MZ','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(26,'GST_NL',0,'',NULL,NULL,'NL','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(27,'GST_OR',0,'',NULL,NULL,'OR','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(28,'GST_PY',0,'',NULL,NULL,'PY','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(29,'GST_PB',0,'',NULL,NULL,'PB','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(30,'GST_RJ',0,'',NULL,NULL,'RJ','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(31,'GST_SK',0,'',NULL,NULL,'SK','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(32,'GST_TN',0,'',NULL,NULL,'TN','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(33,'GST_TG',0,'',NULL,NULL,'TG','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(34,'GST_TR',0,'',NULL,NULL,'TR','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(35,'GST_UP',0,'',NULL,NULL,'UP','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(36,'GST_UT',0,'',NULL,NULL,'UT','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01'),(37,'GST_WB',0,'',NULL,NULL,'WB','IN',5.0000,'2026-09-21 17:34:01','2026-09-21 17:34:01');
/*!40000 ALTER TABLE `tax_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme_customization_translations`
--

DROP TABLE IF EXISTS `theme_customization_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theme_customization_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `theme_customization_id` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` json NOT NULL,
  PRIMARY KEY (`id`),
  KEY `theme_customization_id_foreign` (`theme_customization_id`),
  CONSTRAINT `theme_customization_id_foreign` FOREIGN KEY (`theme_customization_id`) REFERENCES `theme_customizations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme_customization_translations`
--

LOCK TABLES `theme_customization_translations` WRITE;
/*!40000 ALTER TABLE `theme_customization_translations` DISABLE KEYS */;
INSERT INTO `theme_customization_translations` VALUES (23,1,'en','{\"images\": [{\"link\": \"#formal-wear-female\", \"image\": \"storage/theme/1/aFrHnHHWcQVLw9hAZufZNKGp78nCO3kEjVqA52oK.webp\", \"title\": \"Get Ready For New Collection\"}, {\"link\": \"#formal-wear-men\", \"image\": \"storage/theme/1/m7RKr3aXTxqn7btJjG5rhIgEbfUWzbmb5HSWIlrK.webp\", \"title\": \"Get Ready For New Collection\"}, {\"link\": \"#active-wear-female\", \"image\": \"storage/theme/1/KdJeNfa5xOZBQkpsjaLm32TQRJxqI0rTBDHxGZTC.webp\", \"title\": \"Get Ready For New Collection\"}, {\"link\": \"#smart-home-automation\", \"image\": \"storage/theme/1/tguRBWEcZhyWlT9SZUDzL3zFb9BqrL8EN5UPHmtn.webp\", \"title\": \"Get Ready For New Collection\"}, {\"link\": \"#mobile-phones-accessories\", \"image\": \"storage/theme/1/mn0y5a4fHByI2iDpewY4RW7OS7d6fq5JnYpT2tSw.webp\", \"title\": \"Get Ready For New Collection\"}, {\"link\": \"#laptops-tablets\", \"image\": \"storage/theme/1/idzdNg0IIANA80Cr0deom1kPxbMC7BS18G9Wg9OV.webp\", \"title\": \"Get Ready For New Collection\"}]}'),(24,2,'en','{\"css\": \".home-offer h1 {display: block;font-weight: 500;text-align: center;font-size: 22px;font-family: DM Serif Display;background-color: #E8EDFE;padding-top: 20px;padding-bottom: 20px;}@media (max-width:768px){.home-offer h1 {font-size:18px;padding-top: 10px;padding-bottom: 10px;}@media (max-width:525px) {.home-offer h1 {font-size:14px;padding-top: 6px;padding-bottom: 6px;}}\", \"html\": \"<div class=\\\"home-offer\\\"><h1>Get UPTO 40% OFF on your 1st order SHOP NOW</h1></div>\"}'),(25,3,'en','{\"css\": \".top-collection-container {overflow: hidden;}.top-collection-header {padding-left: 15px;padding-right: 15px;text-align: center;font-size: 70px;line-height: 90px;color: #060C3B;margin-top: 80px;}.top-collection-header h2 {max-width: 595px;margin-left: auto;margin-right: auto;font-family: DM Serif Display;}.top-collection-grid {display: flex;flex-wrap: wrap;gap: 32px;justify-content: center;margin-top: 60px;width: 100%;margin-right: auto;margin-left: auto;padding-right: 90px;padding-left: 90px;}.top-collection-card {position: relative;background: #f9fafb;overflow:hidden;border-radius:20px;}.top-collection-card img {border-radius: 16px;max-width: 100%;text-indent:-9999px;transition: transform 300ms ease;transform: scale(1);}.top-collection-card:hover img {transform: scale(1.05);transition: all 300ms ease;}.top-collection-card h3 {color: #060C3B;font-size: 30px;font-family: DM Serif Display;transform: translateX(-50%);width: max-content;left: 50%;bottom: 30px;position: absolute;margin: 0;font-weight: inherit;}@media not all and (min-width: 525px) {.top-collection-header {margin-top: 28px;font-size: 20px;line-height: 1.5;}.top-collection-grid {gap: 10px}}@media not all and (min-width: 768px) {.top-collection-header {margin-top: 30px;font-size: 28px;line-height: 3;}.top-collection-header h2 {line-height:2; margin-bottom:20px;} .top-collection-grid {gap: 14px}} @media not all and (min-width: 1024px) {.top-collection-grid {padding-left: 30px;padding-right: 30px;}}@media (max-width: 768px) {.top-collection-grid { row-gap:15px; column-gap:0px;justify-content: space-between;margin-top: 0px;} .top-collection-card{width:48%} .top-collection-card img {width:100%;} .top-collection-card h3 {font-size:24px; bottom: 16px;}}@media (max-width:520px) { .top-collection-grid{padding-left: 15px;padding-right: 15px;} .top-collection-card h3 {font-size:18px; bottom: 10px;}}\", \"html\": \"<div class=\\\"top-collection-container\\\">\\n                                <div class=\\\"top-collection-header\\\">\\n                                    <h2>The game with our new additions!</h2>\\n                                </div>\\n\\n                                <div class=\\\"top-collection-grid container\\\">\\n                                    <div class=\\\"top-collection-card\\\">\\n                                        <a href=\\\"#electronics\\\" aria-label=\\\"The game with our new additions!\\\">\\n                                            <img src=\\\"\\\" data-src=\\\"storage/theme/5/UzpDLgz4nJBeju2UepeH2UR336w8iA3NtBCttm7Y.webp\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"The game with our new additions!\\\">\\n                                        </a>\\n                                    </div>\\n\\n                                    <div class=\\\"top-collection-card\\\">\\n                                        <a href=\\\"#mens\\\" aria-label=\\\"The game with our new additions!\\\">\\n                                            <img src=\\\"\\\" data-src=\\\"storage/theme/5/Whtb8z0IlBseReJrRKgQcpj9SyptFEpRtfX4FnWC.webp\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"The game with our new additions!\\\">\\n                                        </a>\\n                                    </div>\\n\\n                                    <div class=\\\"top-collection-card\\\">\\n                                        <a href=\\\"#womens\\\" aria-label=\\\"The game with our new additions!\\\">\\n                                            <img src=\\\"\\\" data-src=\\\"storage/theme/5/mdu2buihiihn6UaYDxOaE0Eu0RUXDxaJ17iBpQCl.webp\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"The game with our new additions!\\\">\\n                                        </a>\\n                                    </div>\\n\\n                                    <div class=\\\"top-collection-card\\\">\\n                                        <a href=\\\"#formal-wear-men\\\" aria-label=\\\"The game with our new additions!\\\">\\n                                            <img src=\\\"\\\" data-src=\\\"storage/theme/5/j6GRgpf074JA6253CMptgqtFQghK9jn0SJ5wTfvg.webp\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"The game with our new additions!\\\">\\n                                        </a>\\n                                    </div>\\n\\n                                    <div class=\\\"top-collection-card\\\">\\n                                        <a href=\\\"#formal-wear-female\\\" aria-label=\\\"The game with our new additions!\\\">\\n                                            <img src=\\\"\\\" data-src=\\\"storage/theme/5/qRG0z1xFwP1eM0Fuh3p7QTauAgOUWHD2Ny4aP0X7.webp\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"The game with our new additions!\\\">\\n                                        </a>\\n                                    </div>\\n\\n                                    <div class=\\\"top-collection-card\\\">\\n                                        <a href=\\\"#wellness\\\" aria-label=\\\"The game with our new additions!\\\">\\n                                            <img src=\\\"\\\" data-src=\\\"storage/theme/5/CaNsQDLEYjJH24ZlviW4OGLfSM4lknTtwykOLfPo.webp\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"The game with our new additions!\\\">\\n                                        </a>\\n                                    </div>\\n                                </div>\\n                            </div>\"}'),(26,4,'en','{\"css\": \".section-gap{margin-top:80px}.direction-ltr{direction:ltr}.direction-rtl{direction:rtl}.inline-col-wrapper{display:grid;grid-template-columns:auto 1fr;grid-gap:60px;align-items:center}.inline-col-wrapper .inline-col-image-wrapper{overflow:hidden}.inline-col-wrapper .inline-col-image-wrapper img{max-width:100%;height:auto;border-radius:16px;text-indent:-9999px}.inline-col-wrapper .inline-col-content-wrapper{display:flex;flex-wrap:wrap;gap:20px;max-width:464px}.inline-col-wrapper .inline-col-content-wrapper .inline-col-title{max-width:442px;font-size:60px;font-weight:400;color:#060c3b;line-height:70px;font-family:DM Serif Display;margin:0}.inline-col-wrapper .inline-col-content-wrapper .inline-col-description{margin:0;font-size:18px;color:#6e6e6e;font-family:Poppins}@media (max-width:991px){.inline-col-wrapper{grid-template-columns:1fr;grid-gap:16px}.inline-col-wrapper .inline-col-content-wrapper{gap:10px}} @media (max-width:768px){.inline-col-wrapper .inline-col-image-wrapper img {width:100%;} .inline-col-wrapper .inline-col-content-wrapper .inline-col-title{font-size:28px !important;line-height:normal !important}} @media (max-width:525px){.inline-col-wrapper .inline-col-content-wrapper .inline-col-title{font-size:20px !important;} .inline-col-description{font-size:16px} .inline-col-wrapper{grid-gap:10px}}\", \"html\": \"<div class=\\\"section-gap bold-collections container\\\">\\n                                <div class=\\\"inline-col-wrapper\\\">\\n                                    <div class=\\\"inline-col-image-wrapper\\\">\\n                                        <img src=\\\"\\\" data-src=\\\"storage/theme/6/7ENoNeOblWYWjzViXInBmPiN7RSyO4Pi5Nq0Yiob.webp\\\" class=\\\"lazy\\\" width=\\\"632\\\" height=\\\"510\\\" alt=\\\"Get Ready for our new Bold Collections!\\\">\\n                                    </div>\\n\\n                                    <div class=\\\"inline-col-content-wrapper\\\">\\n                                        <h2 class=\\\"inline-col-title\\\"> Get Ready for our new Bold Collections! </h2> \\n                                        \\n                                        <p class=\\\"inline-col-description\\\">Introducing Our New Bold Collections! Elevate your style with daring designs and vibrant statements. Explore striking patterns and bold colors that redefine your wardrobe. Get ready to embrace the extraordinary!</p>\\n                                        \\n                                        <a href=\\\"#wellness\\\">\\n                                            <button class=\\\"primary-button max-md:rounded-lg max-md:px-4 max-md:py-2.5 max-md:text-sm\\\">View Collections</button>\\n                                        </a>\\n                                    </div>\\n                                </div>\\n                            </div>\"}'),(27,5,'en','{\"css\": \".section-game {overflow: hidden;}.section-title,.section-title h2{font-weight:400;font-family:DM Serif Display}.section-title{margin-top:80px;padding-left:15px;padding-right:15px;text-align:center;line-height:90px}.section-title h2{font-size:70px;color:#060c3b;max-width:595px;margin:auto}.collection-card-wrapper{display:flex;flex-wrap:wrap;justify-content:center;gap:30px}.collection-card-wrapper .single-collection-card{position:relative}.collection-card-wrapper .single-collection-card img{border-radius:16px;background-color:#f5f5f5;max-width:100%;height:auto;text-indent:-9999px}.collection-card-wrapper .single-collection-card .overlay-text{font-size:50px;font-weight:400;max-width:234px;font-style:italic;color:#060c3b;font-family:DM Serif Display;position:absolute;bottom:30px;left:30px;margin:0}@media (max-width:1024px){.section-title{padding:0 30px}}@media (max-width:991px){.collection-card-wrapper{flex-wrap:wrap}}@media (max-width:768px) {.collection-card-wrapper .single-collection-card .overlay-text{font-size:32px; bottom:20px}.section-title{margin-top:32px}.section-title h2{font-size:28px;line-height:normal}} @media (max-width:525px){.collection-card-wrapper .single-collection-card .overlay-text{font-size:18px; bottom:10px} .section-title{margin-top:28px}.section-title h2{font-size:20px;} .collection-card-wrapper{gap:10px; 15px; row-gap:15px; column-gap:0px;justify-content: space-between;margin-top: 15px;} .collection-card-wrapper .single-collection-card {width:48%;}}\", \"html\": \"<div class=\\\"section-game\\\">\\n                                <div class=\\\"section-title\\\">\\n                                    <h2>The game with our new additions!</h2> \\n                                </div>\\n\\n                                <div class=\\\"section-gap container\\\">\\n                                    <div class=\\\"collection-card-wrapper\\\">\\n                                        <div class=\\\"single-collection-card\\\">\\n                                            <a href=\\\"#active-wear\\\">\\n                                                <img src=\\\"\\\" data-src=\\\"storage/theme/8/K5ufhXztQGOEwRWyDISbi4KguTNpRhiipv2gSCVF.webp\\\" class=\\\"lazy\\\" width=\\\"615\\\" height=\\\"600\\\" alt=\\\"The game with our new additions!\\\">\\n                                                \\n                                                <h3 class=\\\"overlay-text\\\">Our Collections</h3> \\n                                            </a>\\n                                        </div>\\n\\n                                        <div class=\\\"single-collection-card\\\">\\n                                            <a href=\\\"#active-wear-female\\\">\\n                                                <img src=\\\"\\\" data-src=\\\"storage/theme/8/6UNwp5VZDc6v39axxBlb49SKcZe1jqZJL24R21bG.webp\\\" class=\\\"lazy\\\" width=\\\"615\\\" height=\\\"600\\\" alt=\\\"The game with our new additions!\\\">\\n                                                \\n                                                <h3 class=\\\"overlay-text\\\"> Our Collections </h3> \\n                                            </a>\\n                                        </div>\\n                                    </div>\\n                                </div>\\n                            </div>\"}'),(28,6,'en','{\"css\": \".section-gap{margin-top:80px}.direction-ltr{direction:ltr}.direction-rtl{direction:rtl}.inline-col-wrapper{display:grid;grid-template-columns:auto 1fr;grid-gap:60px;align-items:center}.inline-col-wrapper .inline-col-image-wrapper{overflow:hidden}.inline-col-wrapper .inline-col-image-wrapper img{max-width:100%;height:auto;border-radius:16px;text-indent:-9999px}.inline-col-wrapper .inline-col-content-wrapper{display:flex;flex-wrap:wrap;gap:20px;max-width:464px}.inline-col-wrapper .inline-col-content-wrapper .inline-col-title{max-width:442px;font-size:60px;font-weight:400;color:#060c3b;line-height:70px;font-family:DM Serif Display;margin:0}.inline-col-wrapper .inline-col-content-wrapper .inline-col-description{margin:0;font-size:18px;color:#6e6e6e;font-family:Poppins}@media (max-width:991px){.inline-col-wrapper{grid-template-columns:1fr;grid-gap:16px}.inline-col-wrapper .inline-col-content-wrapper{gap:10px}}@media (max-width:768px) {.inline-col-wrapper .inline-col-image-wrapper img {max-width:100%;}.inline-col-wrapper .inline-col-content-wrapper{max-width:100%;justify-content:center; text-align:center} .section-gap{padding:0 30px; gap:20px;margin-top:24px} .bold-collections{margin-top:32px;}} @media (max-width:525px){.inline-col-wrapper .inline-col-content-wrapper{gap:10px} .inline-col-wrapper .inline-col-content-wrapper .inline-col-title{font-size:20px;line-height:normal} .section-gap{padding:0 15px; gap:15px;margin-top:10px} .bold-collections{margin-top:28px;}  .inline-col-description{font-size:16px !important} .inline-col-wrapper{grid-gap:15px}\", \"html\": \"<div class=\\\"section-gap bold-collections container\\\">\\n                                <div class=\\\"inline-col-wrapper direction-rtl\\\">\\n                                    <div class=\\\"inline-col-image-wrapper\\\">\\n                                        <img src=\\\"\\\" data-src=\\\"storage/theme/10/csvToPsgye2HaduCoL1ymvtPwmIwrAi987i0GKc4.webp\\\" class=\\\"lazy\\\" width=\\\"632\\\" height=\\\"510\\\" alt=\\\"Unleash Your Boldness with Our New Collection!\\\">\\n                                    </div>\\n\\n                                    <div class=\\\"inline-col-content-wrapper direction-ltr\\\">\\n                                        <h2 class=\\\"inline-col-title\\\">Unleash Your Boldness with Our New Collection!</h2> \\n                                        \\n                                        <p class=\\\"inline-col-description\\\">Our Bold Collections are here to redefine your wardrobe with fearless designs and striking, vibrant colors. From daring patterns to powerful hues, this is your chance to break away from the ordinary and step into the extraordinary.</p>\\n                                        \\n                                        <a href=\\\"#electronics\\\">\\n                                            <button class=\\\"primary-button max-md:rounded-lg max-md:px-4 max-md:py-2.5 max-md:text-sm\\\">View Collections</button>\\n                                        </a>\\n                                    </div>\\n                                </div>\\n                            </div>\"}'),(29,7,'en','{\"column_1\": [{\"url\": \"/spices\", \"title\": \"Pure Farm Spices\", \"sort_order\": 1}, {\"url\": \"/botanical-powders\", \"title\": \"Botanical Powders\", \"sort_order\": 2}, {\"url\": \"/functional-blends\", \"title\": \"Functional Blends\", \"sort_order\": 3}, {\"url\": \"/culinary-ingredients\", \"title\": \"Culinary Essentials\", \"sort_order\": 4}, {\"url\": \"/products\", \"title\": \"All Products\", \"sort_order\": 5}], \"column_2\": [{\"url\": \"/page/about-us\", \"title\": \"Our Story & Philosophy\", \"sort_order\": 1}, {\"url\": \"/page/quality\", \"title\": \"Purity & Lab Standards\", \"sort_order\": 2}, {\"url\": \"/recipes\", \"title\": \"Kitchen Recipes & Rituals\", \"sort_order\": 3}, {\"url\": \"/contact-us\", \"title\": \"Customer Care & Enquiries\", \"sort_order\": 4}, {\"url\": \"/page/customer-service\", \"title\": \"Customer Support & FAQs\", \"sort_order\": 5}], \"column_3\": [{\"url\": \"/page/privacy-policy\", \"title\": \"Privacy Policy\", \"sort_order\": 1}, {\"url\": \"/page/terms-conditions\", \"title\": \"Terms of Sale\", \"sort_order\": 2}, {\"url\": \"/page/shipping-policy\", \"title\": \"Shipping & Delivery\", \"sort_order\": 3}, {\"url\": \"/page/return-policy\", \"title\": \"Return & Replacement\", \"sort_order\": 4}, {\"url\": \"/sitemap.xml\", \"title\": \"XML Sitemap\", \"sort_order\": 5}], \"social_links\": {\"twitter\": \"https://twitter.com/navanidhinaturals\", \"youtube\": \"https://youtube.com/@navanidhinaturals\", \"facebook\": \"https://facebook.com/navanidhinaturals\", \"linkedin\": \"https://linkedin.com/company/managrofoods\", \"instagram\": \"https://instagram.com/navanidhinaturals\"}}'),(30,8,'en','{\"services\": [{\"title\": \"100% Farm-Direct Purity\", \"description\": \"Pure whole spices and single-origin botanicals with zero added dyes, starches, or chemical fillers\", \"service_icon\": \"eco\"}, {\"title\": \"Cold-Milled Freshness\", \"description\": \"Slow stone ground and low-temperature dried below 42°C to preserve aroma and vital compounds\", \"service_icon\": \"device_thermostat\"}, {\"title\": \"Free India Shipping\", \"description\": \"Fast 24–48hr dispatch and complimentary delivery across India on orders above ₹499\", \"service_icon\": \"local_shipping\"}, {\"title\": \"NABL Lab Certified\", \"description\": \"Strictly tested for zero Sudan dyes, zero lead chromate, and certified by FSSAI\", \"service_icon\": \"verified\"}]}'),(31,16,'en','{\"css\": \"\", \"html\": \"<!-- SECTION 1: COMMANDING EDITORIAL HERO -->\\n<section class=\\\"relative overflow-hidden bg-[#FAF8F5] pt-16 pb-24 lg:pt-24 lg:pb-36 border-b border-[#E5E0D8]/70\\\">\\n    <div class=\\\"absolute -top-48 -left-48 w-[600px] h-[600px] rounded-full bg-[#EBF3EE]/50 blur-3xl pointer-events-none\\\"></div>\\n    <div class=\\\"absolute top-1/3 -right-48 w-[600px] h-[600px] rounded-full bg-[#F7EBE3]/50 blur-3xl pointer-events-none\\\"></div>\\n    <div class=\\\"site-container relative\\\">\\n        <div class=\\\"grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-16\\\">\\n            <div class=\\\"lg:col-span-7 space-y-7 lg:space-y-9\\\">\\n                <div class=\\\"inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-[#EBF3EE] text-[#0D5C3A] border border-[#0D5C3A]/20 text-xs font-semibold tracking-widest uppercase\\\">\\n                    <span class=\\\"h-2 w-2 rounded-full bg-[#0D5C3A]\\\"></span>\\n                    100% Dehydrated Whole Foods • Cold-Processed\\n                </div>\\n                <h1 class=\\\"font-serif text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold tracking-tight text-[#1F2937] leading-[1.08]\\\">\\n                    Pure Botanical Nutrition. <br class=\\\"hidden sm:inline\\\">\\n                    <span class=\\\"italic text-[#0D5C3A] font-normal\\\">Zero Compromises.</span>\\n                </h1>\\n                <p class=\\\"text-base sm:text-lg lg:text-xl leading-relaxed text-[#6B7280] max-w-xl\\\">\\n                    Concentrated plant food powders and functional botanical blends. Low-temperature dehydrated below 42°C to preserve active phytonutrients, living enzymes, and clean daily vitality.\\n                </p>\\n                <div class=\\\"flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2\\\">\\n                    <a href=\\\"/products\\\" class=\\\"nv-btn-primary !px-8 !py-4 text-xs tracking-widest shadow-md\\\">\\n                        Explore Formulations\\n                    </a>\\n                    <a href=\\\"/page/about-us\\\" class=\\\"nv-btn-outline !px-8 !py-4 text-xs tracking-widest\\\">\\n                        Our Formulation Standard\\n                    </a>\\n                </div>\\n                <div class=\\\"grid grid-cols-3 gap-8 pt-8 border-t border-[#E5E0D8]/80 max-w-lg\\\">\\n                    <div>\\n                        <p class=\\\"font-serif text-2xl lg:text-3xl font-bold text-[#1F2937]\\\">100%</p>\\n                        <p class=\\\"text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1\\\">Whole Plants</p>\\n                    </div>\\n                    <div>\\n                        <p class=\\\"font-serif text-2xl lg:text-3xl font-bold text-[#1F2937]\\\">&lt; 42°C</p>\\n                        <p class=\\\"text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1\\\">Cold Dehydrated</p>\\n                    </div>\\n                    <div>\\n                        <p class=\\\"font-serif text-2xl lg:text-3xl font-bold text-[#1F2937]\\\">0%</p>\\n                        <p class=\\\"text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1\\\">Synthetic Fillers</p>\\n                    </div>\\n                </div>\\n            </div>\\n            <div class=\\\"lg:col-span-5 relative\\\">\\n                <div class=\\\"relative rounded-2xl bg-white p-8 sm:p-10 border border-[#E5E0D8] shadow-md\\\">\\n                    <div class=\\\"space-y-6\\\">\\n                        <div class=\\\"aspect-4/3 overflow-hidden rounded-xl bg-[#F4EFEA] flex flex-col items-center justify-center p-8 border border-[#E5E0D8]/60 text-center space-y-3\\\">\\n                            <div class=\\\"flex h-16 w-16 items-center justify-center rounded-full bg-[#0D5C3A] text-white text-2xl font-serif font-bold shadow-sm\\\">\\n                                N\\n                            </div>\\n                            <h3 class=\\\"font-serif text-2xl font-bold text-[#1F2937]\\\">Raw Botanical Harvests</h3>\\n                            <p class=\\\"text-xs sm:text-sm text-[#6B7280] max-w-xs leading-relaxed\\\">\\n                                Cold-dehydrated fruits, wild supergreens, functional mushrooms, and adaptogenic roots gently reduced to ultra-fine ritual powders.\\n                            </p>\\n                        </div>\\n                        <div class=\\\"space-y-3 pt-2 text-xs sm:text-sm font-medium text-[#4B5563]\\\">\\n                            <div class=\\\"flex items-center gap-3\\\">\\n                                <span class=\\\"flex h-5 w-5 items-center justify-center rounded-full bg-[#0D5C3A] text-white text-[11px] font-bold\\\">✓</span>\\n                                <span>Zero maltodextrins, silica, or anti-caking chemicals</span>\\n                            </div>\\n                            <div class=\\\"flex items-center gap-3\\\">\\n                                <span class=\\\"flex h-5 w-5 items-center justify-center rounded-full bg-[#0D5C3A] text-white text-[11px] font-bold\\\">✓</span>\\n                                <span>Single-origin & ethically sourced agricultural batches</span>\\n                            </div>\\n                            <div class=\\\"flex items-center gap-3\\\">\\n                                <span class=\\\"flex h-5 w-5 items-center justify-center rounded-full bg-[#0D5C3A] text-white text-[11px] font-bold\\\">✓</span>\\n                                <span>Third-party purity and heavy-metal verified</span>\\n                            </div>\\n                        </div>\\n                    </div>\\n                </div>\\n            </div>\\n        </div>\\n    </div>\\n</section>\"}'),(32,18,'en','{\"css\": \"\", \"html\": \"<nav class=\\\"flex items-center gap-7 lg:gap-8\\\" aria-label=\\\"Primary Navigation\\\">\\n    <a href=\\\"/\\\" class=\\\"text-xs uppercase tracking-[0.14em] font-semibold text-white/90 hover:text-emerald-300 transition-colors\\\">\\n        Home\\n    </a>\\n    <a href=\\\"/products\\\" class=\\\"text-xs uppercase tracking-[0.14em] font-semibold text-white/90 hover:text-emerald-300 transition-colors\\\">\\n        Products\\n    </a>\\n    <a href=\\\"/page/about-us\\\" class=\\\"text-xs uppercase tracking-[0.14em] font-semibold text-white/90 hover:text-emerald-300 transition-colors\\\">\\n        Our Story\\n    </a>\\n    <a href=\\\"/page/quality\\\" class=\\\"text-xs uppercase tracking-[0.14em] font-semibold text-white/90 hover:text-emerald-300 transition-colors\\\">\\n        Quality\\n    </a>\\n    <a href=\\\"/recipes\\\" class=\\\"text-xs uppercase tracking-[0.14em] font-semibold text-white/90 hover:text-emerald-300 transition-colors\\\">\\n        Recipes\\n    </a>\\n    <a href=\\\"/contact-us\\\" class=\\\"text-xs uppercase tracking-[0.14em] font-semibold text-white/90 hover:text-emerald-300 transition-colors\\\">\\n        Contact\\n    </a>\\n</nav>\"}'),(33,19,'en','{\"css\": \"\", \"html\": \"<div class=\\\"mt-3.5 pt-3 border-t border-[#E5E0D8]/60 flex items-center gap-1.5 flex-wrap text-[11px] text-[#6B7280]\\\">\\n    <span class=\\\"font-medium mr-1 text-[#1F2937]\\\">Trending Searches:</span>\\n    <a href=\\\"/search?query=Red+Chilli\\\" class=\\\"px-2.5 py-1 rounded-full bg-[#F5F2EC] hover:bg-[#0D5C3A] hover:text-white transition-colors\\\">Red Chilli Powder</a>\\n    <a href=\\\"/search?query=Turmeric\\\" class=\\\"px-2.5 py-1 rounded-full bg-[#F5F2EC] hover:bg-[#0D5C3A] hover:text-white transition-colors\\\">Lakadong Turmeric</a>\\n    <a href=\\\"/search?query=Moringa\\\" class=\\\"px-2.5 py-1 rounded-full bg-[#F5F2EC] hover:bg-[#0D5C3A] hover:text-white transition-colors\\\">Moringa Leaf</a>\\n    <a href=\\\"/search?query=Amla\\\" class=\\\"px-2.5 py-1 rounded-full bg-[#F5F2EC] hover:bg-[#0D5C3A] hover:text-white transition-colors\\\">Amla Powder</a>\\n    <a href=\\\"/search?query=Beetroot\\\" class=\\\"px-2.5 py-1 rounded-full bg-[#F5F2EC] hover:bg-[#0D5C3A] hover:text-white transition-colors\\\">Beetroot</a>\\n    <a href=\\\"/search?query=Curry+Leaf\\\" class=\\\"px-2.5 py-1 rounded-full bg-[#F5F2EC] hover:bg-[#0D5C3A] hover:text-white transition-colors\\\">Curry Leaf</a>\\n</div>\"}');
/*!40000 ALTER TABLE `theme_customization_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme_customizations`
--

DROP TABLE IF EXISTS `theme_customizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theme_customizations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `theme_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `channel_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `theme_customizations_channel_id_foreign` (`channel_id`),
  CONSTRAINT `theme_customizations_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme_customizations`
--

LOCK TABLES `theme_customizations` WRITE;
/*!40000 ALTER TABLE `theme_customizations` DISABLE KEYS */;
INSERT INTO `theme_customizations` VALUES (1,'default','image_carousel','Image Carousel',1,0,1,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(2,'default','static_content','Offer Information',2,0,1,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(3,'default','static_content','Top Collections',5,0,1,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(4,'default','static_content','Bold Collections',6,0,1,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(5,'default','static_content','Game Container',8,0,1,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(6,'default','static_content','Bold Collections',10,0,1,'2026-09-21 17:34:00','2026-09-21 17:34:00'),(7,'default','footer_links','Footer Links',11,1,1,'2026-09-26 06:58:59','2026-09-26 06:58:59'),(8,'default','services_content','Services Content',12,1,1,'2026-09-26 06:58:59','2026-09-26 06:58:59'),(16,'default','static_content','Navanidhi Hero & Philosophy',1,1,1,'2026-09-26 06:58:59','2026-09-26 06:58:59'),(18,'default','static_content','Navanidhi Header Navigation',10,1,1,'2026-09-26 06:58:59','2026-09-26 06:58:59'),(19,'default','static_content','Navanidhi Popular Search Tags',11,1,1,'2026-09-26 06:58:59','2026-09-26 06:58:59');
/*!40000 ALTER TABLE `theme_customizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme_hero_layers`
--

DROP TABLE IF EXISTS `theme_hero_layers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theme_hero_layers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `hero_slide_id` int unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci,
  `desktop_settings` json DEFAULT NULL,
  `tablet_settings` json DEFAULT NULL,
  `mobile_settings` json DEFAULT NULL,
  `settings` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `theme_hero_layers_hero_slide_id_foreign` (`hero_slide_id`),
  CONSTRAINT `theme_hero_layers_hero_slide_id_foreign` FOREIGN KEY (`hero_slide_id`) REFERENCES `theme_hero_slides` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme_hero_layers`
--

LOCK TABLES `theme_hero_layers` WRITE;
/*!40000 ALTER TABLE `theme_hero_layers` DISABLE KEYS */;
INSERT INTO `theme_hero_layers` VALUES (31,7,'text','Eyebrow',0,'<div class=\"inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-[#0D5C3A] border border-[#0D5C3A]/25 text-xs font-semibold tracking-widest uppercase shadow-xs\"><svg class=\"w-3.5 h-3.5 text-[#0D5C3A]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\"><path d=\"M12 2v20M2 12h20M4.93 4.93l14.14 14.14M4.93 19.07l14.14-14.14\"/></svg><span>100% Pure Farm Spices & Living Botanicals • MAN AGRO FOODS</span></div>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(32,7,'heading','Headline',1,'Authentic Farm Spices. <br class=\"hidden sm:inline\"><span class=\"italic text-[#0D5C3A] font-normal\">Pure Botanical Potency.</span>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(33,7,'text','Description',2,'<p class=\"text-base sm:text-lg lg:text-xl leading-relaxed text-[#4B5563] max-w-xl\">Pure sun-dried Red Chilli Powder, high-curcumin Lakadong Turmeric, and cold-milled whole botanical nutrition. Zero chemical food dyes, zero starch fillers, and 100% farm-traceable purity.</p>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(34,7,'button','CTAs',3,'<div class=\"flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-1\"><a href=\"/spices\" class=\"btn-emerald-primary !px-8 !py-4 text-xs tracking-widest shadow-md\">Explore Pure Spices</a><a href=\"/botanical-powders\" class=\"btn-emerald-outline !px-8 !py-4 text-xs tracking-widest\">Botanical Powders</a></div>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(35,7,'text','Metrics',4,'<div class=\"grid grid-cols-3 gap-6 pt-4 border-t border-[#0D5C3A]/15 max-w-lg\"><div><p class=\"font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]\">100%</p><p class=\"text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1\">Pure Spices</p></div><div><p class=\"font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]\">&lt; 42°C</p><p class=\"text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1\">Cold Milled</p></div><div><p class=\"font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]\">0%</p><p class=\"text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1\">Synthetic Dyes</p></div></div>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(36,8,'text','Eyebrow',0,'<div class=\"inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-[#0D5C3A] border border-[#0D5C3A]/25 text-xs font-semibold tracking-widest uppercase shadow-xs\"><svg class=\"w-3.5 h-3.5 text-[#0D5C3A]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\"><path d=\"M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z\"/><path d=\"m9 12 2 2 4-4\"/></svg><span>Nine Divine Treasures of Mother Nature</span></div>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(37,8,'heading','Headline',1,'Honest Indian Farms. <br class=\"hidden sm:inline\"><span class=\"italic text-[#0D5C3A] font-normal\">Uncompromised Quality.</span>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(38,8,'text','Description',2,'<p class=\"text-base sm:text-lg lg:text-xl leading-relaxed text-[#4B5563] max-w-xl\">Every harvest is sourced from traditional agrarian hubs—Andhra Byadgi chillies, Meghalaya Lakadong turmeric, and Tamil Nadu moringa. Sifted, destemmed, and ground without compromise.</p>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(39,8,'button','CTAs',3,'<div class=\"flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-1\"><a href=\"/page/about-us\" class=\"btn-emerald-primary !px-8 !py-4 text-xs tracking-widest shadow-md\">Our Story & Roots</a><a href=\"/page/quality\" class=\"btn-emerald-outline !px-8 !py-4 text-xs tracking-widest\">Lab Purity Reports</a></div>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(40,8,'text','Metrics',4,'<div class=\"grid grid-cols-3 gap-6 pt-4 border-t border-[#0D5C3A]/15 max-w-lg\"><div><p class=\"font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]\">Single</p><p class=\"text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1\">Origin Farms</p></div><div><p class=\"font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]\">NABL</p><p class=\"text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1\">Lab Verified</p></div><div><p class=\"font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]\">FSSAI</p><p class=\"text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1\">Certified</p></div></div>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(41,9,'text','Eyebrow',0,'<div class=\"inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-[#0D5C3A] border border-[#0D5C3A]/25 text-xs font-semibold tracking-widest uppercase shadow-xs\"><svg class=\"w-3.5 h-3.5 text-[#0D5C3A]\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\"><path d=\"M12 2v20M2 12h20M4.93 4.93l14.14 14.14M4.93 19.07l14.14-14.14\"/></svg><span>Clean Label Kitchen & Living Apothecary</span></div>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(42,9,'heading','Headline',1,'Zero Fillers. <br class=\"hidden sm:inline\"><span class=\"italic text-[#0D5C3A] font-normal\">Real Scent & Flavor.</span>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(43,9,'text','Description',2,'<p class=\"text-base sm:text-lg lg:text-xl leading-relaxed text-[#4B5563] max-w-xl\">From daily morning golden milk and smoothie tonics to authentic home-cooked dals and curries. Experience the purity of unadulterated whole foods in your everyday living.</p>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(44,9,'button','CTAs',3,'<div class=\"flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-1\"><a href=\"/products\" class=\"btn-emerald-primary !px-8 !py-4 text-xs tracking-widest shadow-md\">Shop All Products</a><a href=\"/recipes\" class=\"btn-emerald-outline !px-8 !py-4 text-xs tracking-widest\">Explore Recipes</a></div>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52'),(45,9,'text','Metrics',4,'<div class=\"grid grid-cols-3 gap-6 pt-4 border-t border-[#0D5C3A]/15 max-w-lg\"><div><p class=\"font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]\">11+</p><p class=\"text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1\">Farm Products</p></div><div><p class=\"font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]\">12+</p><p class=\"text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1\">Clean Recipes</p></div><div><p class=\"font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]\">Zero</p><p class=\"text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1\">Adulterants</p></div></div>','{\"x\": \"0%\", \"y\": \"0%\", \"width\": \"auto\"}',NULL,NULL,'{\"classes\": \"\"}','2026-09-26 06:54:52','2026-09-26 06:54:52');
/*!40000 ALTER TABLE `theme_hero_layers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme_hero_sliders`
--

DROP TABLE IF EXISTS `theme_hero_sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theme_hero_sliders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `placement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'homepage',
  `channel_id` int unsigned DEFAULT NULL,
  `settings` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `theme_hero_sliders_code_unique` (`code`),
  KEY `theme_hero_sliders_channel_id_foreign` (`channel_id`),
  CONSTRAINT `theme_hero_sliders_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme_hero_sliders`
--

LOCK TABLES `theme_hero_sliders` WRITE;
/*!40000 ALTER TABLE `theme_hero_sliders` DISABLE KEYS */;
INSERT INTO `theme_hero_sliders` VALUES (2,'navanidhi-homepage-hero','Navanidhi Homepage Hero',1,'homepage',NULL,'{\"loop\": true, \"autoplay\": true, \"duration\": 6000}','2026-09-21 17:30:08','2026-09-26 06:54:52');
/*!40000 ALTER TABLE `theme_hero_sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme_hero_slides`
--

DROP TABLE IF EXISTS `theme_hero_slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theme_hero_slides` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `hero_slider_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `desktop_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int NOT NULL DEFAULT '5000',
  `transition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fade',
  `active_from` datetime DEFAULT NULL,
  `active_to` datetime DEFAULT NULL,
  `settings` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `theme_hero_slides_hero_slider_id_foreign` (`hero_slider_id`),
  CONSTRAINT `theme_hero_slides_hero_slider_id_foreign` FOREIGN KEY (`hero_slider_id`) REFERENCES `theme_hero_sliders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme_hero_slides`
--

LOCK TABLES `theme_hero_slides` WRITE;
/*!40000 ALTER TABLE `theme_hero_slides` DISABLE KEYS */;
INSERT INTO `theme_hero_slides` VALUES (7,2,'Farm Spices & Living Botanicals',1,0,'image','theme/hero/navanidhi/navanidhi-hero-botanical-desktop.webp','theme/hero/navanidhi/navanidhi-hero-botanical-mobile.webp',NULL,NULL,6000,'fade',NULL,NULL,NULL,'2026-09-26 06:54:52','2026-09-26 06:54:52'),(8,2,'The Navanidhi Heritage',1,1,'image','theme/hero/navanidhi/navanidhi-hero-quality-desktop.webp','theme/hero/navanidhi/navanidhi-hero-quality-mobile.webp',NULL,NULL,6000,'fade',NULL,NULL,NULL,'2026-09-26 06:54:52','2026-09-26 06:54:52'),(9,2,'Daily Kitchen & Wellness Rituals',1,2,'image','theme/hero/navanidhi/navanidhi-hero-discovery-desktop.webp','theme/hero/navanidhi/navanidhi-hero-discovery-mobile.webp',NULL,NULL,6000,'fade',NULL,NULL,NULL,'2026-09-26 06:54:52','2026-09-26 06:54:52');
/*!40000 ALTER TABLE `theme_hero_slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `url_rewrites`
--

DROP TABLE IF EXISTS `url_rewrites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `url_rewrites` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `url_rewrites_et_rp_lc_idx` (`entity_type`,`request_path`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `url_rewrites`
--

LOCK TABLES `url_rewrites` WRITE;
/*!40000 ALTER TABLE `url_rewrites` DISABLE KEYS */;
/*!40000 ALTER TABLE `url_rewrites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `channel_id` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `customer_id` int unsigned NOT NULL,
  `item_options` json DEFAULT NULL,
  `moved_to_cart` date DEFAULT NULL,
  `shared` tinyint(1) DEFAULT NULL,
  `time_of_moving` date DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlist_channel_id_foreign` (`channel_id`),
  KEY `wishlist_product_id_foreign` (`product_id`),
  KEY `wishlist_customer_id_foreign` (`customer_id`),
  CONSTRAINT `wishlist_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlist_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlist_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist_items`
--

DROP TABLE IF EXISTS `wishlist_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `channel_id` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `customer_id` int unsigned NOT NULL,
  `additional` json DEFAULT NULL,
  `moved_to_cart` date DEFAULT NULL,
  `shared` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlist_items_channel_id_foreign` (`channel_id`),
  KEY `wishlist_items_product_id_foreign` (`product_id`),
  KEY `wishlist_items_customer_id_foreign` (`customer_id`),
  CONSTRAINT `wishlist_items_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlist_items_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlist_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist_items`
--

LOCK TABLES `wishlist_items` WRITE;
/*!40000 ALTER TABLE `wishlist_items` DISABLE KEYS */;
INSERT INTO `wishlist_items` VALUES (1,1,59,1,NULL,NULL,NULL,'2026-09-21 21:51:35','2026-09-21 21:51:35');
/*!40000 ALTER TABLE `wishlist_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'managro'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-27 21:16:30
