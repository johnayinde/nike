-- ========================================
-- NIKE LAKE HOTEL - ROOM TRACKING LINKS SQL
-- Run these queries directly on your database
-- ========================================

-- 1. Create room_tracking_links table
CREATE TABLE `room_tracking_links` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_group_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'NULL = link works for all rooms',
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Admin who created link',
  `link_code` varchar(100) NOT NULL,
  `link_name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `full_url` varchar(255) DEFAULT NULL,
  `clicks` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `unique_clicks` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `bookings_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_nights_booked` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `revenue_generated` decimal(15,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `room_tracking_links_link_code_unique` (`link_code`),
  KEY `room_tracking_links_room_group_id_status_index` (`room_group_id`, `status`),
  KEY `room_tracking_links_link_code_index` (`link_code`),
  KEY `room_tracking_links_room_group_id_foreign` (`room_group_id`),
  KEY `room_tracking_links_user_id_foreign` (`user_id`),
  CONSTRAINT `room_tracking_links_room_group_id_foreign` FOREIGN KEY (`room_group_id`) REFERENCES `room_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `room_tracking_links_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Add tracking columns to bookings table
ALTER TABLE `bookings` 
ADD COLUMN `tracking_link_id` bigint(20) UNSIGNED NULL DEFAULT NULL AFTER `posted`,
ADD COLUMN `traffic_source` varchar(100) NULL DEFAULT NULL AFTER `tracking_link_id`;

-- 3. Add foreign key for tracking_link_id in bookings table
ALTER TABLE `bookings`
ADD KEY `bookings_tracking_link_id_foreign` (`tracking_link_id`),
ADD CONSTRAINT `bookings_tracking_link_id_foreign` FOREIGN KEY (`tracking_link_id`) REFERENCES `room_tracking_links` (`id`) ON DELETE SET NULL;

-- 4. Create room_tracking_visits table
CREATE TABLE `room_tracking_visits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tracking_link_id` bigint(20) UNSIGNED NOT NULL,
  `visitor_ip` varchar(45) DEFAULT NULL,
  `visitor_id` varchar(100) DEFAULT NULL COMMENT 'Cookie-based unique visitor ID',
  `user_agent` varchar(500) DEFAULT NULL,
  `referer_url` varchar(500) DEFAULT NULL,
  `room_group_viewed` varchar(100) DEFAULT NULL COMMENT 'Which room type they viewed',
  `is_unique` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=unique visit, 0=repeat',
  `visited_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_tracking_visits_tracking_link_id_foreign` (`tracking_link_id`),
  KEY `room_tracking_visits_tracking_link_id_visited_at_index` (`tracking_link_id`, `visited_at`),
  KEY `room_tracking_visits_visitor_id_index` (`visitor_id`),
  CONSTRAINT `room_tracking_visits_tracking_link_id_foreign` FOREIGN KEY (`tracking_link_id`) REFERENCES `room_tracking_links` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- VERIFICATION QUERIES
-- ========================================

-- Check if room_tracking_links table exists
SHOW TABLES LIKE 'room_tracking_links';

-- Check room_tracking_links structure
DESCRIBE room_tracking_links;

-- Check if bookings columns were added
DESCRIBE bookings;

-- Check if room_tracking_visits table exists
SHOW TABLES LIKE 'room_tracking_visits';

-- Check room_tracking_visits structure
DESCRIBE room_tracking_visits;

-- ========================================
-- ROLLBACK QUERIES (if needed)
-- ========================================

-- DROP TABLE IF EXISTS `room_tracking_visits`;
-- ALTER TABLE `bookings` DROP FOREIGN KEY `bookings_tracking_link_id_foreign`;
-- ALTER TABLE `bookings` DROP COLUMN `tracking_link_id`, DROP COLUMN `traffic_source`;
-- DROP TABLE IF EXISTS `room_tracking_links`;