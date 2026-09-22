-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2026 at 08:42 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f1_team`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'News',
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'RGR Communications',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F1',
  `car_number` smallint UNSIGNED NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chassis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` decimal(7,2) DEFAULT NULL,
  `top_speed` smallint UNSIGNED DEFAULT NULL,
  `power_hp` smallint UNSIGNED DEFAULT NULL,
  `season_year` smallint UNSIGNED DEFAULT NULL,
  `aerodynamics_desc` text COLLATE utf8mb4_unicode_ci,
  `car_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `championship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_entry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuel_capacity` decimal(6,2) DEFAULT NULL,
  `tyre_supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `livery_sponsor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_setups`
--

CREATE TABLE `car_setups` (
  `id` bigint UNSIGNED NOT NULL,
  `car_id` bigint UNSIGNED NOT NULL,
  `race_schedule_id` bigint UNSIGNED DEFAULT NULL,
  `season_year` int NOT NULL DEFAULT '2026',
  `setup_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `circuit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `front_wing_angle` decimal(5,2) NOT NULL DEFAULT '7.50',
  `rear_wing_angle` decimal(5,2) NOT NULL DEFAULT '7.00',
  `front_ride_height` decimal(5,2) NOT NULL DEFAULT '15.00',
  `rear_ride_height` decimal(5,2) NOT NULL DEFAULT '20.00',
  `front_spring_rate` decimal(6,1) NOT NULL DEFAULT '1000.0',
  `rear_spring_rate` decimal(6,1) NOT NULL DEFAULT '1200.0',
  `barbal_height` decimal(5,2) NOT NULL DEFAULT '10.00',
  `gear_ratio_final` decimal(5,2) NOT NULL DEFAULT '13.50',
  `tyre_pressure_front` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tyre_pressure_rear` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brake_bias` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '58.0% Front',
  `aerodynamic_load` decimal(5,2) NOT NULL DEFAULT '1.00',
  `drag_coefficient` decimal(5,3) NOT NULL DEFAULT '0.350',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_number` smallint UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `podiums` smallint UNSIGNED NOT NULL DEFAULT '0',
  `career_points` decimal(10,2) NOT NULL DEFAULT '0.00',
  `world_championships` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `avatar_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F1',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Race Driver',
  `helmet_color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_performances`
--

CREATE TABLE `driver_performances` (
  `id` bigint UNSIGNED NOT NULL,
  `driver_id` bigint UNSIGNED NOT NULL,
  `race_schedule_id` bigint UNSIGNED DEFAULT NULL,
  `session_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lap_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sector` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_seconds` decimal(8,3) DEFAULT NULL,
  `speed_trap_kmh` decimal(7,2) DEFAULT NULL,
  `gearbox_temp_c` decimal(6,2) DEFAULT NULL,
  `tire_temp_front_l_c` decimal(6,2) DEFAULT NULL,
  `tire_temp_front_r_c` decimal(6,2) DEFAULT NULL,
  `tire_temp_rear_l_c` decimal(6,2) DEFAULT NULL,
  `tire_temp_rear_r_c` decimal(6,2) DEFAULT NULL,
  `lap_date` int NOT NULL,
  `compound_used` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `endurance_races`
--

CREATE TABLE `endurance_races` (
  `id` bigint UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `circuit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_used` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_length_km` decimal(6,3) DEFAULT NULL,
  `total_laps_completed` smallint UNSIGNED DEFAULT NULL,
  `best_lap_time` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highest_finish_position` tinyint UNSIGNED DEFAULT NULL,
  `race_history_text` text COLLATE utf8mb4_unicode_ci,
  `event_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `championship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_year` smallint UNSIGNED DEFAULT NULL,
  `theme_color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '#00A19B',
  `theme_mood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_driver_prices`
--

CREATE TABLE `fantasy_driver_prices` (
  `id` bigint UNSIGNED NOT NULL,
  `driver_id` bigint UNSIGNED NOT NULL,
  `season_year` int NOT NULL DEFAULT '2026',
  `price_millions` decimal(6,2) NOT NULL DEFAULT '5.00',
  `avg_points` decimal(6,2) NOT NULL DEFAULT '0.00',
  `popularity_percent` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_teams`
--

CREATE TABLE `fantasy_teams` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `season_year` int NOT NULL DEFAULT '2026',
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget_used` decimal(10,1) NOT NULL DEFAULT '0.0',
  `budget_total` decimal(10,1) NOT NULL DEFAULT '100.0',
  `total_points` int NOT NULL DEFAULT '0',
  `race_count` int NOT NULL DEFAULT '0',
  `league_position` int DEFAULT NULL,
  `drivers_selected` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financial_cost_caps`
--

CREATE TABLE `financial_cost_caps` (
  `id` bigint UNSIGNED NOT NULL,
  `season_year` year NOT NULL DEFAULT '2026',
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget_limit_usd` decimal(15,2) NOT NULL,
  `actual_spent_usd` decimal(15,2) NOT NULL,
  `committed_usd` decimal(15,2) NOT NULL DEFAULT '0.00',
  `compliance_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'compliant',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freight_items`
--

CREATE TABLE `freight_items` (
  `id` bigint UNSIGNED NOT NULL,
  `shipment_id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `weight_kg` decimal(8,2) NOT NULL DEFAULT '0.00',
  `is_hazardous_lithium` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logistics_shipments`
--

CREATE TABLE `logistics_shipments` (
  `id` bigint UNSIGNED NOT NULL,
  `tracking_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transport_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_circuit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_time` datetime NOT NULL,
  `estimated_arrival` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in_transit',
  `progress_percent` int NOT NULL DEFAULT '0',
  `vessel_or_flight_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_06_30_000001_create_teams_table', 1),
(6, '2026_06_30_000002_create_sponsors_table', 1),
(7, '2026_06_30_000003_create_drivers_table', 1),
(8, '2026_06_30_000004_create_cars_table', 1),
(9, '2026_06_30_000006_create_endurance_races_table', 1),
(10, '2026_06_30_000007_create_articles_table', 1),
(11, '2026_06_30_152336_create_race_schedules_table', 1),
(12, '2026_07_01_000000_create_tickets_table', 1),
(13, '2026_07_02_000000_create_orders_table', 1),
(14, '2026_07_04_100000_add_fan_fields_to_users_table', 1),
(15, '2026_07_04_200000_create_predictions_table', 1),
(16, '2026_07_28_000001_add_performance_indexes', 1),
(17, '2026_07_28_000002_add_midtrans_fields_to_orders_table', 1),
(18, '2026_09_05_095712_create_cost_caps_and_logistics_tables', 1),
(19, '2026_09_05_103000_create_analytics_and_fantasy_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_courier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_cost` decimal(12,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `discount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `total` decimal(12,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `fraud_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midtrans_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `qty` int UNSIGNED NOT NULL,
  `custom_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `predictions`
--

CREATE TABLE `predictions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `race_schedule_id` bigint UNSIGNED NOT NULL,
  `driver_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `points_awarded` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `race_results`
--

CREATE TABLE `race_results` (
  `id` bigint UNSIGNED NOT NULL,
  `race_schedule_id` bigint UNSIGNED NOT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_number` int NOT NULL,
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int NOT NULL,
  `grid_position` int DEFAULT NULL,
  `points_earned` int NOT NULL DEFAULT '0',
  `finish_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Finished',
  `laps_completed` int NOT NULL,
  `fastest_lap_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `retirement_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `season_year` int NOT NULL DEFAULT '2026',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `race_schedules`
--

CREATE TABLE `race_schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `grand_prix_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `circuit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `race_date` datetime NOT NULL,
  `qualifying_date` datetime DEFAULT NULL,
  `practice1_date` datetime DEFAULT NULL,
  `practice2_date` datetime DEFAULT NULL,
  `practice3_date` datetime DEFAULT NULL,
  `status` enum('Upcoming','Ongoing','Finished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Upcoming',
  `round_number` tinyint UNSIGNED DEFAULT NULL,
  `season_year` smallint UNSIGNED DEFAULT NULL,
  `circuit_map_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tier` enum('Title Sponsor','Technical Partner','Official Supplier') COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_exposures`
--

CREATE TABLE `sponsor_exposures` (
  `id` bigint UNSIGNED NOT NULL,
  `sponsor_id` bigint UNSIGNED DEFAULT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_placement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screen_time_seconds` int NOT NULL,
  `broadcast_impressions` bigint NOT NULL,
  `media_value_usd` decimal(15,2) NOT NULL,
  `roi_percentage` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `constructors_titles` smallint UNSIGNED NOT NULL DEFAULT '0',
  `drivers_titles` smallint UNSIGNED NOT NULL DEFAULT '0',
  `overview_text` text COLLATE utf8mb4_unicode_ci,
  `team_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founded_year` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '#00A19B',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_radio_messages`
--

CREATE TABLE `team_radio_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `driver_id` bigint UNSIGNED DEFAULT NULL,
  `race_schedule_id` bigint UNSIGNED DEFAULT NULL,
  `season_year` int NOT NULL DEFAULT '2026',
  `lap_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Race',
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `audio_duration_sec` int NOT NULL DEFAULT '0',
  `audio_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'General',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telemetry_snapshots`
--

CREATE TABLE `telemetry_snapshots` (
  `id` bigint UNSIGNED NOT NULL,
  `driver_id` bigint UNSIGNED NOT NULL,
  `race_schedule_id` bigint UNSIGNED DEFAULT NULL,
  `lap_number` int NOT NULL,
  `session_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speed_kmh` decimal(6,2) DEFAULT NULL,
  `engine_rpm` decimal(7,0) DEFAULT NULL,
  `gear` decimal(3,0) DEFAULT NULL,
  `throttle_percent` decimal(5,1) DEFAULT NULL,
  `brake_percent` decimal(5,1) DEFAULT NULL,
  `steering_angle` decimal(5,1) DEFAULT NULL,
  `drs_active` decimal(3,0) NOT NULL DEFAULT '0',
  `ers_deployment_percent` decimal(5,1) DEFAULT NULL,
  `fuel_remaining_liters` decimal(5,2) DEFAULT NULL,
  `timestamp_ms` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `race_schedule_id` bigint UNSIGNED DEFAULT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_tier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `total_price` bigint NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `booking_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `favorite_driver_id` bigint UNSIGNED DEFAULT NULL,
  `points` int NOT NULL DEFAULT '0',
  `avatar_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#FF002E'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weather_data`
--

CREATE TABLE `weather_data` (
  `id` bigint UNSIGNED NOT NULL,
  `circuit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `race_schedule_id` bigint UNSIGNED DEFAULT NULL,
  `season_year` int NOT NULL DEFAULT '2026',
  `recorded_at` datetime NOT NULL,
  `temperature_celsius` decimal(4,1) NOT NULL,
  `humidity_percent` decimal(4,1) NOT NULL,
  `track_temp_celsius` decimal(4,1) NOT NULL,
  `air_pressure_hpa` decimal(6,1) NOT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wind_direction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wind_speed_kmh` decimal(5,1) NOT NULL,
  `visibility_meters` int NOT NULL DEFAULT '10000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_team_id_foreign` (`team_id`),
  ADD KEY `cars_category_index` (`category`),
  ADD KEY `cars_season_year_index` (`season_year`);

--
-- Indexes for table `car_setups`
--
ALTER TABLE `car_setups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_setups_car_id_foreign` (`car_id`),
  ADD KEY `car_setups_race_schedule_id_foreign` (`race_schedule_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drivers_team_id_foreign` (`team_id`),
  ADD KEY `drivers_active_index` (`active`),
  ADD KEY `drivers_category_index` (`category`),
  ADD KEY `drivers_role_index` (`role`),
  ADD KEY `drivers_compound_index` (`active`,`role`,`category`);

--
-- Indexes for table `driver_performances`
--
ALTER TABLE `driver_performances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_performances_driver_id_foreign` (`driver_id`),
  ADD KEY `driver_performances_race_schedule_id_foreign` (`race_schedule_id`);

--
-- Indexes for table `endurance_races`
--
ALTER TABLE `endurance_races`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `endurance_races_event_slug_unique` (`event_slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fantasy_driver_prices`
--
ALTER TABLE `fantasy_driver_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fantasy_driver_prices_driver_id_foreign` (`driver_id`);

--
-- Indexes for table `fantasy_teams`
--
ALTER TABLE `fantasy_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fantasy_teams_user_id_foreign` (`user_id`);

--
-- Indexes for table `financial_cost_caps`
--
ALTER TABLE `financial_cost_caps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freight_items`
--
ALTER TABLE `freight_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `freight_items_shipment_id_foreign` (`shipment_id`);

--
-- Indexes for table `logistics_shipments`
--
ALTER TABLE `logistics_shipments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logistics_shipments_tracking_code_unique` (`tracking_code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_invoice_number_unique` (`invoice_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `predictions`
--
ALTER TABLE `predictions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `predictions_user_id_foreign` (`user_id`),
  ADD KEY `predictions_race_schedule_id_foreign` (`race_schedule_id`),
  ADD KEY `predictions_driver_id_foreign` (`driver_id`);

--
-- Indexes for table `race_results`
--
ALTER TABLE `race_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `race_results_race_schedule_id_foreign` (`race_schedule_id`);

--
-- Indexes for table `race_schedules`
--
ALTER TABLE `race_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `race_schedules_status_index` (`status`),
  ADD KEY `race_schedules_race_date_index` (`race_date`),
  ADD KEY `race_schedules_season_year_index` (`season_year`),
  ADD KEY `race_schedules_compound_index` (`status`,`race_date`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sponsors_team_id_foreign` (`team_id`),
  ADD KEY `sponsors_active_index` (`active`),
  ADD KEY `sponsors_tier_index` (`tier`);

--
-- Indexes for table `sponsor_exposures`
--
ALTER TABLE `sponsor_exposures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sponsor_exposures_sponsor_id_foreign` (`sponsor_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_radio_messages`
--
ALTER TABLE `team_radio_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_radio_messages_driver_id_foreign` (`driver_id`),
  ADD KEY `team_radio_messages_race_schedule_id_foreign` (`race_schedule_id`);

--
-- Indexes for table `telemetry_snapshots`
--
ALTER TABLE `telemetry_snapshots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `telemetry_snapshots_driver_id_foreign` (`driver_id`),
  ADD KEY `telemetry_snapshots_race_schedule_id_foreign` (`race_schedule_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_booking_code_unique` (`booking_code`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_race_schedule_id_foreign` (`race_schedule_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_favorite_driver_id_foreign` (`favorite_driver_id`);

--
-- Indexes for table `weather_data`
--
ALTER TABLE `weather_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weather_data_race_schedule_id_foreign` (`race_schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_setups`
--
ALTER TABLE `car_setups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_performances`
--
ALTER TABLE `driver_performances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `endurance_races`
--
ALTER TABLE `endurance_races`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_driver_prices`
--
ALTER TABLE `fantasy_driver_prices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_teams`
--
ALTER TABLE `fantasy_teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_cost_caps`
--
ALTER TABLE `financial_cost_caps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freight_items`
--
ALTER TABLE `freight_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logistics_shipments`
--
ALTER TABLE `logistics_shipments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `predictions`
--
ALTER TABLE `predictions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `race_results`
--
ALTER TABLE `race_results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `race_schedules`
--
ALTER TABLE `race_schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsor_exposures`
--
ALTER TABLE `sponsor_exposures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_radio_messages`
--
ALTER TABLE `team_radio_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telemetry_snapshots`
--
ALTER TABLE `telemetry_snapshots`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weather_data`
--
ALTER TABLE `weather_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `car_setups`
--
ALTER TABLE `car_setups`
  ADD CONSTRAINT `car_setups_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `car_setups_race_schedule_id_foreign` FOREIGN KEY (`race_schedule_id`) REFERENCES `race_schedules` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `driver_performances`
--
ALTER TABLE `driver_performances`
  ADD CONSTRAINT `driver_performances_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `driver_performances_race_schedule_id_foreign` FOREIGN KEY (`race_schedule_id`) REFERENCES `race_schedules` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `fantasy_driver_prices`
--
ALTER TABLE `fantasy_driver_prices`
  ADD CONSTRAINT `fantasy_driver_prices_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fantasy_teams`
--
ALTER TABLE `fantasy_teams`
  ADD CONSTRAINT `fantasy_teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `freight_items`
--
ALTER TABLE `freight_items`
  ADD CONSTRAINT `freight_items_shipment_id_foreign` FOREIGN KEY (`shipment_id`) REFERENCES `logistics_shipments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `predictions`
--
ALTER TABLE `predictions`
  ADD CONSTRAINT `predictions_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `predictions_race_schedule_id_foreign` FOREIGN KEY (`race_schedule_id`) REFERENCES `race_schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `predictions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `race_results`
--
ALTER TABLE `race_results`
  ADD CONSTRAINT `race_results_race_schedule_id_foreign` FOREIGN KEY (`race_schedule_id`) REFERENCES `race_schedules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD CONSTRAINT `sponsors_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sponsor_exposures`
--
ALTER TABLE `sponsor_exposures`
  ADD CONSTRAINT `sponsor_exposures_sponsor_id_foreign` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `team_radio_messages`
--
ALTER TABLE `team_radio_messages`
  ADD CONSTRAINT `team_radio_messages_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `team_radio_messages_race_schedule_id_foreign` FOREIGN KEY (`race_schedule_id`) REFERENCES `race_schedules` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `telemetry_snapshots`
--
ALTER TABLE `telemetry_snapshots`
  ADD CONSTRAINT `telemetry_snapshots_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `telemetry_snapshots_race_schedule_id_foreign` FOREIGN KEY (`race_schedule_id`) REFERENCES `race_schedules` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_race_schedule_id_foreign` FOREIGN KEY (`race_schedule_id`) REFERENCES `race_schedules` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_favorite_driver_id_foreign` FOREIGN KEY (`favorite_driver_id`) REFERENCES `drivers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `weather_data`
--
ALTER TABLE `weather_data`
  ADD CONSTRAINT `weather_data_race_schedule_id_foreign` FOREIGN KEY (`race_schedule_id`) REFERENCES `race_schedules` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
