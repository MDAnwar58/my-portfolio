/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `app_contents`;
CREATE TABLE `app_contents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hero_f_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_m_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_l_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_short_desc` text COLLATE utf8mb4_unicode_ci,
  `projects_count` int NOT NULL DEFAULT '0',
  `exp_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `happy_client` int NOT NULL DEFAULT '0',
  `feature_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_w_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_w_short_desc` text COLLATE utf8mb4_unicode_ci,
  `view_s_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_s_short_desc` text COLLATE utf8mb4_unicode_ci,
  `c_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_short_desc` text COLLATE utf8mb4_unicode_ci,
  `p_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `working_for` enum('available','not') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
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

DROP TABLE IF EXISTS `job_batches`;
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

DROP TABLE IF EXISTS `jobs`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sessions`;
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

DROP TABLE IF EXISTS `skills`;
CREATE TABLE `skills` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `social_media`;
CREATE TABLE `social_media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_cdn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `svg_path` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `works`;
CREATE TABLE `works` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `live_demo_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `more_info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `app_contents` (`id`, `hero_f_title`, `hero_m_title`, `hero_l_title`, `hero_short_desc`, `projects_count`, `exp_duration`, `happy_client`, `feature_1`, `feature_2`, `feature_3`, `feature_4`, `view_w_title`, `view_w_short_desc`, `view_s_title`, `view_s_short_desc`, `c_title`, `c_short_desc`, `p_avatar`, `created_at`, `updated_at`, `working_for`) VALUES
(1, 'Creative', 'Developer', '& Designer', 'Crafting digital experiences that blend innovative\r\n                design with cutting-edge technology. Specializing in web\r\n                development, UI/UX design, and creative solutions.', 32, '2.5th', 23, 'Web Dev', 'Fast', 'UI/UX', 'Modern', 'My Portfolio', 'Check out some of my recent projects and creative work.', 'My Skills', 'Technologies and tools I work with to build amazing projects.', 'Let\'s Get In Touch', 'Fill out the form below and I\'ll get back to you as soon as possible.', 'http://127.0.0.1:8000/uploads/images/m8PZaSu8pdVvmfWqi9ALBWyr4ACGBYKZNmizzo7p.jpg', '2025-12-24 10:25:48', '2025-12-28 11:16:16', 'available');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('my-portfolio-cache-06588a4c421c22d254f2385342185210', 'i:1;', 1766919163),
('my-portfolio-cache-06588a4c421c22d254f2385342185210:timer', 'i:1766919163;', 1766919163);

INSERT INTO `contacts` (`id`, `f_name`, `l_name`, `email`, `subject`, `message`, `created_at`, `updated_at`, `is_read`) VALUES
(1, 'Darrin', 'Kutch', 'russ.mcclure@example.net', 'Voluptas pariatur explicabo.', 'Occaecati omnis possimus vero earum. Est sed aperiam commodi incidunt nesciunt. Ea recusandae quos voluptas similique ut provident pariatur quia. Sed sint beatae quo illum. Nemo nesciunt assumenda hic.', '2025-12-23 08:10:19', '2025-12-23 08:10:19', 0),
(2, 'Antonina', 'Emard', 'nebert@example.net', 'Dolor qui repudiandae voluptate odit.', 'Et minima et non quia quod. Cumque et dicta consequatur quia quo impedit soluta deserunt. Rerum placeat tempora cum inventore blanditiis voluptatum sunt.', '2025-12-23 08:10:20', '2025-12-23 08:47:17', 1),
(3, 'Clair', 'Koss', 'coralie49@example.net', 'Molestias consequatur consequuntur delectus ut.', 'Omnis qui dicta et at molestiae. Sequi et distinctio velit amet et. Alias ut quisquam minima dolore debitis commodi veniam.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(4, 'Doyle', 'Fritsch', 'ohomenick@example.com', 'Vel est et.', 'Saepe qui suscipit fugit aut delectus odio delectus. Molestias reprehenderit quia et magnam aliquam veritatis. Aut eum aut et. Tempore fuga ipsum eos excepturi repudiandae velit. Qui voluptas hic et quasi.', '2025-12-23 08:10:20', '2025-12-24 02:17:52', 1),
(5, 'Lavern', 'Dickinson', 'rdamore@example.com', 'Odit accusantium labore.', 'Veniam accusantium aperiam quo temporibus commodi voluptatum. Velit voluptas commodi et qui cum iure praesentium totam. Consectetur magni reiciendis quam voluptatem odit. Dignissimos praesentium libero asperiores architecto.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(6, 'Paula', 'Farrell', 'stamm.ismael@example.net', 'Aut natus iste sit et.', 'Facilis omnis ut expedita recusandae ut laudantium. Deleniti repellendus in dolor libero sint. Blanditiis hic ipsum adipisci voluptates dolorem doloremque. Atque sit quo eum et asperiores.', '2025-12-23 08:10:20', '2025-12-24 02:17:43', 1),
(7, 'Amari', 'McGlynn', 'vreichel@example.net', 'Voluptatem qui nostrum aliquam.', 'Iure officiis non aut impedit et. Est eos rerum voluptates dolor tempore adipisci.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(8, 'Paolo', 'Berge', 'elbert16@example.org', 'Tenetur tenetur quam ea.', 'Dolor eum aliquam ipsam commodi exercitationem et. Sequi est eligendi cupiditate molestiae odit. Eos voluptatibus nemo omnis cupiditate. Doloribus ut fugiat et sit.', '2025-12-23 08:10:20', '2025-12-24 02:18:41', 1),
(9, 'Mose', 'Halvorson', 'ncrooks@example.org', 'Accusantium et amet quis quasi occaecati.', 'Et libero ratione iste et animi. Veniam impedit commodi alias impedit voluptatibus sit. Magnam et eum doloribus consequuntur. Ratione autem praesentium occaecati repellat repudiandae.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(10, 'Etha', 'Bauch', 'qtorphy@example.com', 'Maxime doloribus rem aliquam.', 'Repellendus atque molestiae aut. Facilis voluptatem voluptas provident sed aliquam quia id. Iste et ut doloribus non omnis.', '2025-12-23 08:10:20', '2025-12-24 02:18:52', 1),
(11, 'Myrtis', 'Cremin', 'hintz.hertha@example.org', 'Voluptatum dicta consequatur.', 'Et beatae mollitia veritatis quam. Voluptate tempora illo quisquam autem. Non voluptates est repellendus sit at et qui ea.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(12, 'Judson', 'Ward', 'harber.karina@example.com', 'Dolores fugiat asperiores optio.', 'Voluptas voluptatem consequatur perferendis delectus. Eum ut et aut autem et et. Libero in animi rerum quidem. Voluptas molestias sed perferendis repudiandae ipsam sit.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(13, 'Carolanne', 'Kulas', 'irodriguez@example.net', 'Asperiores fuga maiores.', 'Ut magni omnis ex laborum quia dolor est id. Officia mollitia repudiandae excepturi non. Corporis omnis non quis eligendi. Reprehenderit blanditiis non laborum velit id.', '2025-12-23 08:10:20', '2025-12-23 08:45:18', 1),
(14, 'Veronica', 'Harris', 'gibson.vernon@example.com', 'Optio delectus quae qui.', 'Aut non alias vel et et aut maxime. Et repellendus in aut et et inventore.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(15, 'Fanny', 'Wintheiser', 'ujakubowski@example.net', 'Laboriosam iste sequi molestiae nam impedit.', 'Totam non deleniti sequi. Aut neque possimus impedit suscipit nulla assumenda odit. Qui incidunt omnis est esse debitis magni aliquid. Alias quis cum natus beatae provident ab.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(16, 'Brock', 'Feeney', 'gdach@example.org', 'Commodi earum officia dolor distinctio.', 'Ea consectetur in itaque consequatur laboriosam. Quae facilis vel consequatur et aut dolorem facere. Aspernatur natus ut et et sapiente iure.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(17, 'Floy', 'Aufderhar', 'sabrina.murray@example.net', 'Adipisci at esse minima.', 'Porro sequi recusandae ipsa. Harum rem quos consequatur doloribus rem consectetur. Amet voluptatibus est recusandae omnis. Ducimus ut eum qui quo ratione enim.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(18, 'Noemie', 'Bruen', 'jakayla.ritchie@example.net', 'Placeat ut est consequatur eos.', 'Veritatis quasi magni aut a consequatur. Et ea sed quis. Possimus id corporis corporis qui qui maxime.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(19, 'Rasheed', 'Murazik', 'tthiel@example.org', 'Et dolorem architecto est.', 'Aut sunt aperiam dolor sapiente quam distinctio quia. Numquam animi dolor consequuntur aspernatur sit quisquam libero. Veniam temporibus et labore culpa recusandae.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(20, 'Cruz', 'Tillman', 'winston91@example.com', 'Unde eveniet ad sint.', 'Ipsum asperiores repellendus odit eum odit suscipit ut doloremque. Qui in et voluptatem hic.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(21, 'Hailey', 'Wilderman', 'greenholt.jermain@example.org', 'Non voluptas voluptatem voluptas nulla exercitationem.', 'Totam minus odio voluptates qui voluptas mollitia quia. Vero dicta fugiat reprehenderit dicta qui explicabo sint. Alias cupiditate deleniti eum.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(22, 'Eldon', 'Haley', 'kuphal.harmony@example.org', 'Quas ipsam suscipit natus iusto molestiae.', 'Et dolorum inventore et suscipit. Sunt est natus molestiae nihil quia quo quaerat. Voluptatum libero omnis ex qui distinctio doloribus eaque.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(23, 'Juliana', 'Lang', 'etowne@example.org', 'Rerum id vel facere.', 'Consectetur consequatur consequuntur dolores aut voluptates id. Et fugit id consequuntur doloremque. Ea tempore est necessitatibus sunt eius ullam ut quaerat. Omnis magnam delectus vel.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(24, 'Geovanny', 'Stehr', 'ghagenes@example.org', 'Et odio et nulla at.', 'Totam asperiores et repellendus consectetur itaque. Laborum aut eum fugiat est voluptatem perferendis et. Ipsa ipsam illo sed quasi commodi alias doloribus. Aliquid et quidem eaque recusandae quasi.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(25, 'Eula', 'Schmitt', 'winfield.homenick@example.org', 'Sunt quia ab porro aut.', 'Incidunt sequi ad labore aut sed nesciunt. Repudiandae at soluta occaecati est. Nihil voluptatibus et perspiciatis magnam maxime autem. Eum esse odit sint eum error.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(26, 'Isobel', 'Metz', 'rutherford.ashton@example.org', 'Voluptate quia consectetur et fuga.', 'Tenetur non expedita debitis vero facere natus. Est minus itaque sit iste ea. Corrupti facere autem fugiat ipsum perspiciatis quam. Corporis voluptates reprehenderit minima molestias.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(27, 'Judd', 'Wolf', 'maribel53@example.com', 'Voluptatem at aut non.', 'Voluptas rerum asperiores omnis esse. Consectetur amet et nihil dolor eum debitis ut fugiat. Earum odit temporibus est.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(28, 'Jazmyn', 'Kutch', 'brenna.ortiz@example.org', 'Non vel necessitatibus mollitia iusto.', 'Voluptatem suscipit vitae facilis. Blanditiis facilis velit eum inventore ut. Quia ipsum laboriosam excepturi. Porro in voluptatem quidem temporibus quis officia rerum exercitationem.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(29, 'Roselyn', 'Smitham', 'yparisian@example.org', 'Aut officiis aut repellat aliquid est.', 'Aspernatur deserunt maiores et eveniet animi aut ab expedita. Reiciendis nostrum ut recusandae quam. Dolor tempore fugit eveniet minus cupiditate iure.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(30, 'Hailee', 'Bruen', 'dicki.nels@example.net', 'Quia nihil quae et.', 'Id aliquam in ex et iste. Molestias ut blanditiis voluptas cupiditate eos quidem et pariatur.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(31, 'Unique', 'Rau', 'price.general@example.org', 'Perspiciatis voluptas id saepe placeat ratione.', 'Quos in non numquam velit. Et nihil nobis eaque voluptatem officia qui repudiandae. Aliquid et in incidunt ut quo quae ipsa.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(32, 'Eldred', 'Murray', 'donnelly.issac@example.com', 'Blanditiis ea aut reprehenderit.', 'Et repellat debitis impedit quibusdam aut itaque commodi. Voluptatem quaerat consectetur reiciendis. Qui sed eius nobis accusantium.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(33, 'Keara', 'Dare', 'bartell.delmer@example.com', 'Quis quae velit nam dolorem.', 'Iure ut harum earum magni quia voluptatem. Aut voluptates consequatur omnis omnis quidem. Ea suscipit quam delectus ut ut. Earum nostrum enim ut ullam.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(34, 'Marty', 'Nitzsche', 'koconnell@example.net', 'Tempora id ea rerum.', 'Molestias ab cumque eum maiores. Sint suscipit veniam deleniti ea veritatis ut saepe. Veritatis et dolore exercitationem et id eum explicabo.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(35, 'Shyanne', 'Ankunding', 'gerson86@example.com', 'At facere in omnis.', 'Ea dignissimos est quisquam ab. Sunt quia laudantium voluptas et aut ducimus aut vero. Quibusdam et in eum nobis culpa error fuga.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(36, 'Colby', 'Trantow', 'arjun.mckenzie@example.com', 'Sit unde aut accusantium.', 'Facere quibusdam est odit est quam iste. Distinctio suscipit impedit ut velit quidem et. Veritatis omnis voluptas et laborum.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(37, 'Wilma', 'Keeling', 'myrna16@example.net', 'Earum sequi officiis neque atque sit.', 'Aut tenetur ullam vitae. Aut aut quibusdam cupiditate corrupti ut deleniti magnam. Totam aut enim accusantium ut aliquam distinctio voluptatem quia. Quia quia ut eos sequi et.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(38, 'Itzel', 'West', 'sboyle@example.net', 'Neque ut iusto nesciunt.', 'Doloremque sed et qui atque vitae ut. Tenetur dolores veritatis minima.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(39, 'Clay', 'Bechtelar', 'rose37@example.com', 'Veritatis aperiam qui est.', 'Eligendi reprehenderit et culpa qui tempora. Fuga in vitae nesciunt ea. Dicta libero mollitia doloremque est nesciunt voluptatum.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(40, 'Sallie', 'Douglas', 'nnikolaus@example.com', 'Fugiat nemo magnam odit hic.', 'Fuga nulla doloribus et enim fugiat veritatis. Optio vitae magnam aliquam accusantium porro eos. Vero voluptatem debitis debitis quia.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(41, 'Wilfred', 'Olson', 'brannon.davis@example.org', 'Quidem rerum assumenda nisi.', 'Esse voluptates tempore alias voluptatem aut veniam impedit. Quibusdam quae laboriosam accusantium. Et non quis quas aliquid voluptas.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(42, 'Juliana', 'Ratke', 'zack.schiller@example.org', 'Quisquam a unde.', 'Dolores qui et quia rerum aut. Ut consequatur rem nihil expedita fugiat doloribus sit in. Quod modi dolores exercitationem modi sunt iusto.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(43, 'Lane', 'Boyle', 'cwaelchi@example.com', 'Est voluptas cumque aperiam.', 'Natus doloribus aliquam quaerat qui qui facilis rerum. Est suscipit voluptatem non aliquam. Natus non alias eum ipsam rerum dolorem. Omnis iure perspiciatis perferendis modi odit dolore.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(44, 'Cesar', 'Smith', 'schmidt.ola@example.net', 'Alias ut consequatur quia sed.', 'Nam magni quae porro et perferendis sed. Aut aut ipsum eius aspernatur eveniet. Vero tempora aliquam odio est. Adipisci nobis aut dignissimos incidunt.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(45, 'Tito', 'Renner', 'marisol92@example.com', 'Distinctio voluptate hic eum ipsum soluta.', 'Voluptas pariatur est repudiandae. Ut excepturi aliquam alias et sint corporis. Eveniet porro inventore ipsum repellat qui velit sint sequi.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(46, 'Ruthe', 'Erdman', 'antoinette48@example.net', 'Qui similique tempore nostrum esse dolorem.', 'Cum at nihil odit illo iste maiores dignissimos minima. Accusantium accusantium quam ea sit nesciunt sunt. Ea pariatur animi repellat sed. Consequuntur nobis expedita ullam vero.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(47, 'Ernesto', 'Shanahan', 'lsipes@example.com', 'Ea rerum sed iusto corporis.', 'Fugit beatae voluptas voluptas. Deserunt veritatis sed dicta assumenda et asperiores. Explicabo qui maiores quo rerum illum et in molestiae. Harum earum dolor excepturi aperiam cum.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(48, 'Lavina', 'Krajcik', 'christine48@example.net', 'Alias dolorem voluptatum delectus.', 'Soluta quia ex quaerat et officia eum ipsa. Cumque modi mollitia voluptatem aut sint animi odit. Quasi et reprehenderit animi blanditiis hic iusto.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(49, 'Ambrose', 'Marvin', 'rhett.kerluke@example.org', 'Velit non maxime aliquam.', 'Omnis eos molestiae dolor occaecati qui magnam quaerat. Sit dolor maxime recusandae vitae nisi. Mollitia quae adipisci non porro non voluptates reiciendis. Molestiae veritatis qui qui perspiciatis qui sapiente consequatur laborum. Quo fugiat et dolore corporis.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(50, 'Nick', 'Sporer', 'wisoky.tess@example.com', 'Sunt et sed iure et.', 'Suscipit molestiae ea vel sit ut fugit possimus. Expedita amet quo ipsum ut beatae deserunt. Sint qui cum veniam temporibus sequi. Aut consequuntur rem repellendus qui ducimus vero libero.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(51, 'Lora', 'Fadel', 'iyost@example.org', 'Modi delectus id incidunt.', 'Id voluptatem sequi dicta non velit nihil. Voluptas in est dolor ipsam. Architecto eum ut ducimus quas ut corrupti dolorem ea.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(52, 'Jennyfer', 'Dare', 'magnus03@example.com', 'Sit labore quod aut.', 'Commodi pariatur autem enim illum quibusdam consectetur quia. Maxime magni non sed odit aut eaque autem. Et quia voluptates repellat nihil fugiat voluptas odit. Dicta labore suscipit fuga culpa est quos.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(53, 'Joshua', 'Osinski', 'gerlach.lucius@example.org', 'Eum nisi autem.', 'Quo sapiente voluptatum totam vel. Labore blanditiis earum dolorum illum sit.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(54, 'Finn', 'Dare', 'dolores.reilly@example.net', 'Ipsa incidunt deserunt temporibus.', 'Consequatur debitis consequuntur in. Facilis sint soluta sequi. Laboriosam molestiae expedita facilis dolorem. Illum nisi porro est eligendi ipsa repellat.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(55, 'Cristal', 'Ruecker', 'alexandra91@example.com', 'A autem officiis in eaque.', 'Delectus consequatur numquam molestias voluptatem a. Voluptas veniam quam sed debitis natus facere dolore. Mollitia consequuntur voluptatem quisquam quam quo velit.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(56, 'Doris', 'Crist', 'stehr.alvera@example.net', 'Corporis consequatur omnis voluptatem voluptate.', 'Ullam itaque sed ab quos et aut ullam alias. Possimus aut laudantium voluptatem eos. Dolore in vel in sint aut. Esse iure earum et autem id.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(57, 'Urban', 'Haag', 'abbigail.mcglynn@example.com', 'Voluptas repellendus repudiandae.', 'Natus possimus placeat mollitia. Rerum quibusdam quia qui reiciendis natus cupiditate quasi. Quas et reprehenderit sequi molestias placeat ullam facilis eligendi.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(58, 'Gilbert', 'Fahey', 'stacy.kreiger@example.org', 'Nihil et qui ea ea eligendi.', 'Ut fugiat illum fuga deleniti. Quasi voluptatum est quam sint. Quis similique numquam illo quibusdam omnis nobis et architecto. Consequatur consectetur deleniti quas aperiam quaerat.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(59, 'Joaquin', 'Wunsch', 'cormier.alexandria@example.org', 'Velit facere totam quis.', 'Incidunt cum accusamus veritatis laudantium voluptates saepe assumenda hic. Et mollitia rerum laborum porro suscipit voluptate. Qui voluptas esse eligendi quaerat earum.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(60, 'Garth', 'Connelly', 'nienow.maggie@example.org', 'Deleniti veniam harum suscipit.', 'Ut in earum repellat fugit dolores est et nesciunt. Id rerum quod tenetur nulla praesentium velit debitis. Eveniet voluptas beatae beatae debitis hic.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(61, 'Libbie', 'Lebsack', 'josephine29@example.net', 'Animi nostrum ea neque in.', 'Ipsa modi rerum optio debitis ea dignissimos ea ea. Et quod harum delectus sint. Iusto temporibus quis fuga aut porro labore vel.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(62, 'Madonna', 'Schaefer', 'jordan.tromp@example.com', 'Id aperiam itaque aliquid.', 'Nesciunt voluptate sit doloribus. Ea atque nesciunt molestiae impedit accusantium suscipit. Iure sint nam facilis laborum et.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(63, 'Orland', 'Paucek', 'adrian03@example.net', 'Aperiam sunt officia reiciendis et.', 'Doloribus et consequatur reprehenderit explicabo esse. In rem mollitia voluptatum nesciunt. Esse laboriosam amet perspiciatis ut ut temporibus. Rerum odio ad et illo.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(64, 'Ricky', 'Flatley', 'stroman.willa@example.com', 'Magni quas provident minus.', 'Quae dignissimos eligendi non ipsam ipsum in illo ut. Nihil deleniti amet tenetur saepe eos ea. Quo facilis et consequatur explicabo illo sed. Velit tempore suscipit fuga iste.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(65, 'Claudie', 'Treutel', 'joan13@example.com', 'Maxime eligendi illum possimus et non.', 'Doloremque et qui pariatur error distinctio recusandae dolore qui. Itaque voluptatem sint vitae aut explicabo hic quo. Quis animi sint iusto.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(66, 'Bill', 'Leannon', 'kmonahan@example.org', 'Voluptatum voluptatum et quia a earum.', 'Nulla officia tempora quae ut. Sed et assumenda minima dolores. Perferendis magni sed excepturi saepe libero voluptatum sed.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(67, 'Vance', 'Goldner', 'leon90@example.org', 'Repellendus sed ipsam mollitia voluptates rerum.', 'Quia consequuntur rem architecto reiciendis autem voluptas magnam. Sunt doloribus blanditiis ullam minus sapiente nostrum neque laboriosam. Officiis animi ab doloremque ullam est praesentium omnis. Error voluptatem facilis aspernatur id alias.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(68, 'Franco', 'Erdman', 'little.lulu@example.com', 'Nulla voluptas nam inventore quod earum.', 'Deserunt eius harum odit iusto perferendis repudiandae. Alias consectetur esse molestias sed nobis temporibus tempore dolorum. Culpa quisquam commodi velit quidem. Dolores repudiandae omnis sit aut possimus minus. Voluptatem amet porro eum aperiam quasi ut vel.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(69, 'Modesto', 'Wisozk', 'moriah.roob@example.com', 'Quod quo impedit sapiente dolorem.', 'Dolorem qui quas ratione sed. Voluptatem aut velit vero quaerat earum atque voluptatem. Velit sint neque voluptate deserunt rerum hic. Reiciendis harum mollitia sed.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(70, 'Adrianna', 'Daniel', 'ayana.daugherty@example.com', 'Aperiam quia nisi distinctio.', 'Magni eos quisquam aliquid molestiae at et et nemo. Sit laboriosam id aut natus. Eaque iste quis aut nulla repellendus impedit. Quas nobis rerum enim tempore distinctio culpa.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(71, 'Anderson', 'Batz', 'donna.wilderman@example.com', 'Ut debitis neque quia et ut.', 'Pariatur inventore placeat culpa eveniet id nihil. Minima neque est illum sunt debitis omnis consequatur nihil. Delectus culpa id et voluptates. Consequuntur quis et dignissimos commodi velit neque eos perspiciatis.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(72, 'Annabelle', 'Willms', 'kdooley@example.com', 'Vel quas blanditiis.', 'Sed corrupti voluptatem magni sed nihil iusto quos. Repudiandae quis neque velit rerum. Placeat rerum iste quo facere provident at. Cumque hic reprehenderit eos praesentium velit.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(73, 'Adrien', 'Prosacco', 'ijenkins@example.com', 'Repellat dolorum velit veritatis qui.', 'Et nulla et mollitia ducimus qui. Consequatur rerum facere quia maiores praesentium atque. Saepe occaecati vitae est qui alias suscipit earum.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(74, 'Allie', 'Schaefer', 'sterling56@example.com', 'Nihil magni debitis.', 'Porro nobis illo officiis dignissimos. Fugiat repudiandae voluptate consequatur sit. Vero inventore dolore eos ut adipisci voluptatem quo et.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(75, 'Wendell', 'Waelchi', 'ckling@example.net', 'Sit sit ducimus autem.', 'Beatae repudiandae illo nulla delectus. Nam voluptas quis aut. Eius praesentium voluptatum sed qui velit.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(76, 'Destany', 'Brekke', 'zpouros@example.org', 'Quae inventore illo.', 'Quae amet voluptatem molestiae consectetur corporis aut. Reiciendis nulla ut a dicta perferendis inventore voluptas. Non ea et vitae ut quas. Totam quae pariatur nesciunt deleniti quidem eos.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(77, 'Vladimir', 'Hauck', 'kpollich@example.com', 'Odio dicta aut est.', 'Non saepe et autem eveniet sunt repellat maxime. Architecto quam nihil blanditiis.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(78, 'Garret', 'Fay', 'murl76@example.org', 'Sunt quis dolore voluptate.', 'Aut et provident id dolorem. Commodi aut sunt id qui voluptas dolor. Est ut exercitationem voluptas rerum aut.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(79, 'Valerie', 'Harvey', 'buck.kling@example.com', 'Rerum deserunt eos sed dolore.', 'Enim dolorem ex odio quia qui. Occaecati voluptas quis qui eligendi. Quod autem asperiores sunt minus laudantium ab eaque.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(80, 'Nona', 'Marvin', 'kub.annette@example.org', 'Eligendi repudiandae earum dolorem est aut.', 'Ducimus a sint quia. Necessitatibus occaecati facere non possimus cupiditate consequuntur tenetur. Quia ut enim voluptas sed necessitatibus excepturi ut.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(81, 'Ashly', 'Rosenbaum', 'allison.parisian@example.com', 'Voluptatem eligendi quia.', 'Earum provident rerum quisquam sunt. Deserunt placeat quidem quas eligendi non enim molestias. Vero dignissimos nesciunt sed delectus magnam.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(82, 'Kellie', 'Ratke', 'graham.koss@example.org', 'Laborum non similique distinctio quo deserunt.', 'Fugit reiciendis consectetur ipsam in quo et. Dolor dolorem non esse rerum. Consequatur laborum veniam repellat consectetur nemo. Facere nulla et ut.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(83, 'Lenna', 'Hirthe', 'mollie30@example.net', 'Laboriosam voluptatem fugit.', 'Sunt deleniti nisi maxime nam. Optio pariatur iste pariatur est est. Itaque omnis in nesciunt. Tempore tempora ratione sunt ex enim consequuntur consequatur. Facilis tempora quae iure doloremque iste suscipit doloremque dolorem.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(84, 'Lavinia', 'Hansen', 'koelpin.mariane@example.net', 'Sunt laboriosam excepturi tempora.', 'Quia voluptatem et sunt animi ipsa iste maiores. Qui velit natus eum et id. Et debitis nemo incidunt ipsam. Ratione ut numquam sequi neque. Quo id iusto illo nam quae.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(85, 'Efrain', 'Reilly', 'kessler.luther@example.net', 'Quibusdam dolore et repudiandae similique.', 'Velit quis non omnis ut vel deleniti maiores. Aut soluta vel placeat possimus incidunt id blanditiis.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(86, 'Britney', 'Runolfsson', 'xcollier@example.org', 'Qui minus et repellat voluptatem nostrum.', 'Possimus nostrum alias sapiente officia est nisi. Et aperiam et aut velit.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(87, 'Jaquan', 'McClure', 'sigmund.bahringer@example.org', 'Minima aliquam similique saepe.', 'Magnam tempore et ut ipsum quia id aliquam tempora. Veritatis quam corporis est aperiam ullam molestiae. Voluptatibus provident optio dolor minima. Delectus eum ut id consequatur.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(88, 'Kyler', 'Lueilwitz', 'roxane45@example.com', 'Nihil iste non et.', 'Voluptas veniam qui ipsam aperiam deserunt nihil. Quia voluptas officia expedita vitae et. Sint neque eum ut. Facilis placeat quia est ut ut.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(89, 'Quinn', 'Quigley', 'zkassulke@example.org', 'Similique quaerat recusandae aut et.', 'Ut ipsam fugit vel distinctio dolorem praesentium porro. In quas voluptatem impedit minus natus delectus. Voluptatem aut iste illum blanditiis nesciunt.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(90, 'Keira', 'Yundt', 'dnienow@example.org', 'Suscipit aut omnis velit et sed.', 'Recusandae ut consequatur in quo aut aut totam. Ut beatae veniam voluptatem fugiat omnis. Dolores rem et adipisci sed. Consequatur nam debitis ea et inventore aspernatur.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(91, 'Myah', 'Bailey', 'trowe@example.net', 'Laboriosam itaque qui.', 'Harum autem sed neque fugit alias sed quaerat. Harum aut officiis qui ut accusamus praesentium aut. Et velit molestiae quisquam. Nobis accusantium est dolores dolore. Quia qui quis dicta molestiae autem exercitationem culpa non.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(92, 'Enos', 'Wisozk', 'saul.reichert@example.net', 'Sint quia sint iusto.', 'Qui dolore odio omnis ullam occaecati harum. Est et dolorem sunt. Nobis incidunt nisi minus non. Doloremque omnis enim ipsam nemo dolor. Quia adipisci et tempora dolores.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(93, 'Jerome', 'Hyatt', 'christelle.daugherty@example.net', 'Aut tempora quia qui rerum quibusdam.', 'Minus et et possimus sed sit. Repudiandae eum eligendi voluptatem similique ratione sunt quos. Sequi dolorem et ad ratione. Praesentium quaerat modi qui unde libero.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(94, 'Johnathan', 'Dickinson', 'jamarcus82@example.org', 'Nesciunt et voluptates.', 'Ex saepe necessitatibus cumque quisquam ad aut suscipit. Ipsum rerum cum mollitia et sapiente minus. Dicta doloremque vel ducimus blanditiis ut rerum sed. Et error culpa repudiandae sunt ut dolores ut.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(95, 'Marietta', 'Runte', 'dickens.derick@example.com', 'Ullam similique quidem vitae qui.', 'Tempora exercitationem asperiores asperiores laboriosam error. Ipsam et velit fuga et cum qui delectus. Omnis eligendi rerum officia quia sunt. Quis aut voluptatem ducimus pariatur.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(96, 'Miller', 'Hane', 'preston.bruen@example.org', 'Et aut animi et.', 'Dolorem doloremque architecto doloribus. Quos tenetur numquam maxime. Ut illo eum velit quo nihil. Quia quaerat commodi quod amet.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(97, 'Josh', 'Waelchi', 'gkuhlman@example.org', 'Porro dignissimos vero.', 'Quis odio libero delectus facilis molestiae distinctio sunt. Consectetur quibusdam optio blanditiis porro. At dolores natus qui.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(98, 'Joseph', 'Crooks', 'leonora00@example.com', 'Aperiam omnis ex quos laborum vel.', 'Minima atque itaque dolores enim aut. Consectetur qui eveniet soluta asperiores porro. Ullam fugit aliquid vel sapiente aut modi cum. Quia blanditiis sed est.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(99, 'Mariano', 'Graham', 'eino.shanahan@example.net', 'In molestias facere id ut.', 'Voluptatem quo maxime vitae qui. Praesentium explicabo soluta non repellendus maiores distinctio sit. Quia et enim et nihil. Omnis similique aut tempora omnis corrupti optio.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(100, 'Timmothy', 'Weber', 'dooley.corene@example.net', 'Nam saepe corporis temporibus est.', 'Quia aut non maiores sit iure debitis ipsam. Dolores id libero tempore tempore omnis quia velit. Sit iure est corrupti.', '2025-12-23 08:10:20', '2025-12-23 08:10:20', 0),
(101, 'sdf', 'sdfsdf', 'mdanwar35048@gmail.com', 'sdfsdf', 'sdfsdf', '2025-12-25 10:40:41', '2025-12-25 10:40:41', 0),
(102, 'sdf', 'sdfsdf', 'mdanwar35048@gmail.com', 'sdfsdf', 'sdfsdf', '2025-12-25 10:46:45', '2025-12-25 10:46:45', 0),
(103, 'sdsdf', 'sdfsdf', 'mdanwar35048@gmail.com', 'sdfsdf', 'sdfsdf', '2025-12-25 10:50:31', '2025-12-25 10:50:31', 0),
(104, 'MD ANWAR', 'SAHADAT', 'sahadatmdanwar9@gmail.com', 'sdfsdf', 'sdfsdf', '2025-12-28 10:43:21', '2025-12-28 10:43:21', 0);



INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_22_145432_add_two_factor_columns_to_users_table', 1),
(5, '2025_12_21_054039_create_works_table', 1),
(6, '2025_12_22_045740_add_image_column_to_works_table', 2),
(7, '2025_12_23_043037_create_skills_table', 3),
(8, '2025_12_23_064423_create_contacts_table', 4),
(9, '2025_12_23_083849_add_is_read_to_contacts_table', 5),
(10, '2025_12_24_060614_create_app_contents_table', 6),
(11, '2025_12_24_110237_create_social_media_table', 7),
(12, '2025_12_28_104812_add_a_column_in_app_contents_table', 8);

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('iVXj4QDaQRhWEr4hUalOwqFAnszHFjWwJmX843hL', 25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNXJIZGNjUXRNcDV1SUVXZjMwMlczdkowcmZLalRlVmNKZHJUZFNVcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjU7fQ==', 1766920580),
('nciEXJVtLwO7NnhuNhTBuMecbn5rA2bC9ruwcdB5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDFLcUQ4VUVDVmhiUkZyWkU0Tmp3QzJEcU5lbWZ1QTc3RVVaZ0xpUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766918611);
INSERT INTO `skills` (`id`, `name`, `url`, `image_url`, `created_at`, `updated_at`) VALUES
(3, 'JavaScript', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg', NULL, '2025-12-23 06:31:08', '2025-12-23 06:31:08'),
(7, 'React', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg', NULL, '2025-12-25 02:01:06', '2025-12-25 02:01:06'),
(8, 'Next JS', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nextjs/nextjs-original.svg', NULL, '2025-12-25 02:02:30', '2025-12-25 02:02:30'),
(9, 'Vite JS', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vitejs/vitejs-original.svg', NULL, '2025-12-25 02:03:20', '2025-12-25 02:03:20'),
(10, 'Inertia JS', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/inertiajs/inertiajs-original.svg', NULL, '2025-12-25 02:04:45', '2025-12-25 02:04:45'),
(11, 'TypeScript', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg', NULL, '2025-12-25 02:05:33', '2025-12-25 02:05:45'),
(12, 'Laravel', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg', NULL, '2025-12-25 02:08:40', '2025-12-25 02:08:40'),
(13, 'Livewire', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/livewire/livewire-original.svg', NULL, '2025-12-25 02:10:09', '2025-12-25 02:10:09'),
(14, 'Node JS', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg', NULL, '2025-12-25 02:15:49', '2025-12-25 02:15:49'),
(15, 'Express', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/express/express-original.svg', NULL, '2025-12-25 02:23:42', '2025-12-25 02:23:42'),
(16, 'MongoDB', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg', NULL, '2025-12-25 02:25:33', '2025-12-25 02:25:33'),
(17, 'Python', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg', NULL, '2025-12-25 02:26:51', '2025-12-25 02:26:51'),
(18, 'Django', 'https://static.djangoproject.com/img/logos/django-logo-negative.svg', NULL, '2025-12-25 02:29:37', '2025-12-25 02:29:37'),
(19, 'HTML', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg', NULL, '2025-12-25 03:02:37', '2025-12-25 03:02:37'),
(20, 'CSS', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg', NULL, '2025-12-25 03:02:59', '2025-12-25 03:02:59'),
(21, 'TailwindCSS', 'https://tailwindcss.com/_next/static/media/tailwindcss-mark.d52e9897.svg', NULL, '2025-12-25 03:04:27', '2025-12-25 03:05:38'),
(22, 'Bootstrap', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg', NULL, '2025-12-25 03:06:12', '2025-12-25 03:06:12'),
(23, 'Flutter', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg', NULL, '2025-12-25 03:08:07', '2025-12-25 03:08:07'),
(24, 'PHP', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg', NULL, '2025-12-25 03:18:18', '2025-12-25 03:18:18'),
(25, 'Laravel Splade', 'https://raw.githubusercontent.com/protonemedia/laravel-splade/main/logo.svg', NULL, '2025-12-25 03:20:49', '2025-12-25 03:20:49');
INSERT INTO `social_media` (`id`, `name`, `icon_cdn`, `icon`, `url`, `created_at`, `updated_at`, `svg_path`) VALUES
(3, 'Github', '', '', 'https://github.com/MDAnwar58', '2025-12-24 12:37:01', '2025-12-25 04:47:20', 'M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(25, 'MD Anwar Sayeed', 'anwar.saeed656@gmail.com', NULL, '$2y$12$cFRP2ywzFgpXfgNX18HIa..NTStgRzpd9aINJfKpFn/TsTeE2wzNK', NULL, NULL, NULL, 'qvVuoLxR7E9fam0ToQyiCUYcRMvrloCcddnjDWpLUPxu6JLrCbBDFD9dLYbk', '2025-12-21 06:58:11', '2025-12-21 06:58:11');
INSERT INTO `works` (`id`, `name`, `short_desc`, `type`, `live_demo_link`, `github_link`, `image`, `more_info`, `created_at`, `updated_at`) VALUES
(12, 'News Portal', 'Personalized, credible, concise news. Clean, real-time, ad-light.', 'web app', NULL, 'https://github.com/MDAnwar58/News-Portal', NULL, '<p class=\"ds-markdown-paragraph\" align=\"center\"><strong><span>News Portal</span></strong></p><p class=\"ds-markdown-paragraph\" align=\"center\"><strong><span><br></span></strong></p><p class=\"ds-markdown-paragraph\"><strong><span>QuickNews</span></strong><span> is a modern news portal web application built using </span><strong><span>Next.js</span></strong><span>. The project, focused solely on the </span><strong><span>frontend</span></strong><span>,\r\n delivers a clean, ad-light user interface for personalized, credible, \r\nand concise news in real-time. It curates stories from trusted sources \r\nto tailor content to individual user interests.</span></p><br><ul><li><p class=\"ds-markdown-paragraph\"><span>Developed the frontend for a modern news portal using </span><strong><span>Next.js</span></strong><span>.</span></p></li><li><p class=\"ds-markdown-paragraph\"><span>Engineered a clean, ad-light UI to deliver personalized, credible, and concise news in real-time.</span></p></li><li><p class=\"ds-markdown-paragraph\"><span>Built a user-centric interface that curates content from trusted sources to match individual interests.</span></p></li></ul><p><br></p>', '2025-12-28 02:35:08', '2025-12-28 11:09:25'),
(13, 'Gedget Ecommerce', 'Laravel Inertia React e-commerce platform for modern gadgets and electronics.', 'web app', NULL, 'https://github.com/MDAnwar58/Gedget_Ecommerce', 'http://127.0.0.1:8000/uploads/work-images/Fw3hOuC9IizSl4f6HztSH8rdBxt7nPYfOLEhqFJO.png', '<h3 align=\"center\"><strong><span>Gedget Ecommerce</span></strong></h3><h3 align=\"center\"><strong><span><br></span></strong></h3><p><span>Gedget Ecommerce is a sophisticated, full-stack web application \r\nengineered as a specialized online retail platform dedicated to the sale\r\n of modern gadgets and electronics. The project leverages a powerful and\r\n modern technology stack—<b>Laravel </b>for the robust backend API and \r\napplication logic, <b>Inertia.js</b> as the glue layer for routing and data \r\nbinding, and <b>React </b>for building a dynamic, component-based frontend user\r\n interface. This architecture merges the full control and security of \r\n<b>Laravel </b>with the seamless, app-like interactivity of a single-page \r\napplication (SPA).</span></p>', '2025-12-28 03:11:13', '2025-12-28 11:09:14'),
(14, 'SourceXBD B2B', 'B2B wholesale platform with bulk ordering and logistics management.', 'web app', NULL, 'https://github.com/MDAnwar58/SourceXBD-B2B', 'http://127.0.0.1:8000/uploads/work-images/mxMbNvneHb4KIvADj0aw5YdIQWb7ojI2o0B6TI6D.png', '<h2 data-start=\"154\" data-end=\"213\" align=\"center\"><strong data-start=\"157\" data-end=\"213\">SourceXBD – B2B E-commerce</strong></h2><h2 data-start=\"154\" data-end=\"213\" align=\"center\"><strong data-start=\"157\" data-end=\"213\"><br></strong></h2><h1 align=\"center\"></h1><p data-start=\"215\" data-end=\"600\"><strong data-start=\"215\" data-end=\"228\">SourceXBD</strong> is a modern B2B e-commerce web application designed to connect suppliers, manufacturers, and bulk buyers through a secure, scalable, and performance-driven platform. Built with a <strong data-start=\"408\" data-end=\"428\">Next.js frontend</strong> and a <strong data-start=\"435\" data-end=\"454\">Laravel backend</strong>, the system delivers a seamless enterprise-grade purchasing experience optimized for wholesale transactions and long-term business relationships.</p><p data-start=\"215\" data-end=\"600\"><br></p>\r\n<h3 data-start=\"602\" data-end=\"628\"><strong data-start=\"606\" data-end=\"628\">Frontend (Next.js)</strong></h3>\r\n<p data-start=\"629\" data-end=\"782\">The frontend is developed using <strong data-start=\"661\" data-end=\"672\">Next.js</strong> to ensure fast load times, SEO optimization, and a highly responsive user experience.<br data-start=\"758\" data-end=\"761\">\r\nKey features include:</p>\r\n<ul data-start=\"783\" data-end=\"1219\"><li data-start=\"783\" data-end=\"850\">\r\n<p data-start=\"785\" data-end=\"850\">Professional B2B-focused UI/UX with dashboard-driven navigation</p>\r\n</li><li data-start=\"851\" data-end=\"939\">\r\n<p data-start=\"853\" data-end=\"939\">Product catalogs with bulk pricing, MOQ (Minimum Order Quantity), and tiered pricing</p>\r\n</li><li data-start=\"940\" data-end=\"993\">\r\n<p data-start=\"942\" data-end=\"993\">Advanced search, filters, and category management</p>\r\n</li><li data-start=\"994\" data-end=\"1067\">\r\n<p data-start=\"996\" data-end=\"1067\">Buyer dashboards for order tracking, invoices, and account management</p>\r\n</li><li data-start=\"1068\" data-end=\"1148\">\r\n<p data-start=\"1070\" data-end=\"1148\">Supplier dashboards for product management, inventory, and order fulfillment</p>\r\n</li><li data-start=\"1149\" data-end=\"1219\">\r\n<p data-start=\"1151\" data-end=\"1219\">Secure authentication and role-based access (Buyer, Supplier, Admin)</p><p data-start=\"1151\" data-end=\"1219\"><br></p>\r\n</li></ul>\r\n<h3 data-start=\"1221\" data-end=\"1246\"><strong data-start=\"1225\" data-end=\"1246\">Backend (Laravel)</strong></h3>\r\n<p data-start=\"1247\" data-end=\"1393\">The backend is powered by <strong data-start=\"1273\" data-end=\"1284\">Laravel</strong>, providing a robust and secure API layer with enterprise-level scalability.<br data-start=\"1360\" data-end=\"1363\">\r\nCore responsibilities include:</p>\r\n<ul data-start=\"1394\" data-end=\"1752\"><li data-start=\"1394\" data-end=\"1452\">\r\n<p data-start=\"1396\" data-end=\"1452\">RESTful APIs for products, orders, users, and payments</p>\r\n</li><li data-start=\"1453\" data-end=\"1507\">\r\n<p data-start=\"1455\" data-end=\"1507\">Role-based authorization and permission management</p>\r\n</li><li data-start=\"1508\" data-end=\"1572\">\r\n<p data-start=\"1510\" data-end=\"1572\">Business logic for bulk orders, pricing rules, and discounts</p>\r\n</li><li data-start=\"1573\" data-end=\"1643\">\r\n<p data-start=\"1575\" data-end=\"1643\">Order lifecycle management (pending, approved, shipped, completed)</p>\r\n</li><li data-start=\"1644\" data-end=\"1690\">\r\n<p data-start=\"1646\" data-end=\"1690\">Invoice generation and transaction history</p>\r\n</li><li data-start=\"1691\" data-end=\"1752\">\r\n<p data-start=\"1693\" data-end=\"1752\">Admin panel for platform control, analytics, and moderation</p><p data-start=\"1693\" data-end=\"1752\"><br></p>\r\n</li></ul>\r\n<h3 data-start=\"1754\" data-end=\"1787\"><strong data-start=\"1758\" data-end=\"1787\">B2B-Specific Capabilities</strong></h3>\r\n<ul data-start=\"1788\" data-end=\"2050\"><li data-start=\"1788\" data-end=\"1842\">\r\n<p data-start=\"1790\" data-end=\"1842\">Company-based accounts instead of individual users</p>\r\n</li><li data-start=\"1843\" data-end=\"1886\">\r\n<p data-start=\"1845\" data-end=\"1886\">Custom pricing per buyer or buyer group</p>\r\n</li><li data-start=\"1887\" data-end=\"1940\">\r\n<p data-start=\"1889\" data-end=\"1940\">Quotation and negotiation workflows (RFQ support)</p>\r\n</li><li data-start=\"1941\" data-end=\"1993\">\r\n<p data-start=\"1943\" data-end=\"1993\">Credit terms and manual payment approval options</p>\r\n</li><li data-start=\"1994\" data-end=\"2050\">\r\n<p data-start=\"1996\" data-end=\"2050\">Multi-vendor support with centralized administration</p><p data-start=\"1996\" data-end=\"2050\"><br></p>\r\n</li></ul>\r\n<h3 data-start=\"2052\" data-end=\"2086\"><strong data-start=\"2056\" data-end=\"2086\">Architecture &amp; Scalability</strong></h3>\r\n<ul data-start=\"2087\" data-end=\"2386\"><li data-start=\"2087\" data-end=\"2151\">\r\n<p data-start=\"2089\" data-end=\"2151\"><strong data-start=\"2089\" data-end=\"2100\">Next.js</strong> handles presentation and client-side performance</p>\r\n</li><li data-start=\"2152\" data-end=\"2214\">\r\n<p data-start=\"2154\" data-end=\"2214\"><strong data-start=\"2154\" data-end=\"2169\">Laravel API</strong> manages data, security, and business rules</p>\r\n</li><li data-start=\"2215\" data-end=\"2303\">\r\n<p data-start=\"2217\" data-end=\"2303\">API-driven architecture ensures easy integration with ERP, CRM, and payment gateways</p>\r\n</li><li data-start=\"2304\" data-end=\"2386\">\r\n<p data-start=\"2306\" data-end=\"2386\">Designed for future expansion (mobile apps, third-party integrations, analytics)</p><p data-start=\"2306\" data-end=\"2386\"><br></p>\r\n</li></ul>\r\n<h3 data-start=\"2388\" data-end=\"2411\"><strong data-start=\"2392\" data-end=\"2411\">Purpose &amp; Value</strong></h3>\r\n<p data-start=\"2412\" data-end=\"2658\">SourceXBD aims to streamline B2B sourcing by reducing friction in wholesale purchasing, improving supplier visibility, and enabling buyers to manage bulk procurement efficiently—all within a secure, scalable, and professionally designed platform.</p><h1 align=\"left\"><br></h1>', '2025-12-28 03:23:12', '2025-12-28 11:09:06'),
(15, 'Django Inventory', 'Django inventory system managing physical stock digitally.', 'web app', NULL, 'https://github.com/MDAnwar58/django-inventory-management-system-with-price/tree/master', 'http://127.0.0.1:8000/uploads/work-images/SxjmJwv3w1Xs16mbpU8WsBmz9BkCk0fMt0IGmZ7w.png', '<h1 align=\"center\"><b>Django Inventory</b></h1><h1 align=\"center\"><b><br></b></h1><h1 align=\"left\"><span>The Django Inventory Management System with Price is a \r\ncomprehensive web-based solution designed to digitize and streamline the\r\n tracking of physical goods. Built on the robust Django framework, it \r\nprovides a secure and scalable platform for businesses to maintain \r\naccurate, real-time records of their stock.</span></h1><h1 align=\"left\"><span><br></span></h1><h1 align=\"left\"><span>Its core functionalities include creating a detailed catalog of \r\nitems, monitoring stock levels with low-quantity alerts, and recording \r\nall incoming and outgoing movements. A key feature is integrated price \r\ntracking, allowing users to associate cost and sale prices with items to\r\n calculate inventory value, profit margins, and generate basic financial\r\n insights.</span></h1><h1 align=\"left\"><span><br></span></h1><h1 align=\"left\"><span>The system typically offers role-based dashboards, reporting tools\r\n for sales and stock trends, and aims to replace error-prone manual logs\r\n with a centralized, automated database. This reduces overhead, prevents\r\n stockouts or overstocking, and provides a clear, digital overview of \r\nall inventory assets for informed business decision-making.</span></h1><h1 align=\"left\"><span><br></span></h1><h1 align=\"left\"><strong><span>Access to the platform is granted through flexible \r\nsubscription plans, including affordable monthly and discounted yearly \r\npackages, allowing businesses of all sizes to choose the option that \r\nbest fits their budget and needs.</span></strong></h1>', '2025-12-28 03:45:58', '2025-12-28 11:08:26'),
(16, 'Income and Expend tracker', 'Money income and expend dashboard with automated tracking and insights.', 'web app', NULL, 'https://github.com/MDAnwar58/my-accounting-app', 'http://127.0.0.1:8000/uploads/work-images/XEAOSmCMgtivhdlNSdMEjfN99tMlBtavsVOMmWjB.png', '<p align=\"center\"><b>Income and Expend tracker</b></p><p align=\"left\"><b><br></b></p><p align=\"left\"><span>A smart financial dashboard that automatically tracks all money flowing in and out, categorizes your </span><strong><span>income sources</span></strong><span> and </span><strong><span>expense details</span></strong><span>, and provides clear visual insights to instantly show your net profit or loss.</span></p>', '2025-12-28 04:11:34', '2025-12-28 11:08:15'),
(17, 'LIPYS', 'Fast, focused code lessons for busy, learning developers online.', 'web app', NULL, 'https://github.com/MDAnwar58/lipys', 'http://127.0.0.1:8000/uploads/work-images/1v8OhTXgy1UpnzXYKpKplHlUVqhtFrV57VoSXZ0W.png', '<p align=\"center\"><b>LIPYS</b></p><p align=\"center\"><b><br></b></p><p align=\"left\"><span>A platform for concise programming lessons with per-course purchases and collaborative feedback.</span></p><p align=\"left\"><span><br></span></p><p align=\"left\"><span>Lipys is a programming-focused learning platform where users can \r\npurchase individual courses to access short, concise video lessons and \r\ndescriptions. Designed for developers who need quick, specific answers, \r\nit also includes a comment and feedback system that lets the community \r\nsuggest improvements, ensuring the content stays relevant and practical.</span></p>', '2025-12-28 04:20:05', '2025-12-28 11:08:03'),
(18, 'Organichatt Fruits', 'Laravel and Nextjs fresh organic fruits e-commerce', 'web app', NULL, 'https://github.com/MDAnwar58/Organichatt-Mango', NULL, '<p align=\"center\"><span><b>Organichatt</b></span></p><p><br></p><p><span>Organichatt is a high-performance, modern e-commerce platform \r\nspecializing in the sale of fresh, certified organic fruits. It connects\r\n health-conscious consumers directly with trusted local and sustainable \r\nfarms.</span></p><p><span><br></span></p><p></p><li><p class=\"ds-markdown-paragraph\"><strong><span>Frontend (Next.js):</span></strong><span>\r\n Powers the customer-facing application. Leveraging server-side \r\nrendering (SSR) and static generation for optimal SEO and blazing-fast \r\npage loads. It provides a dynamic, app-like user experience for \r\nbrowsing, searching, and purchasing fruits.</span></p><p class=\"ds-markdown-paragraph\"><span><br></span></p><h2><span><b>Backend/API (Laravel):</b> Serves as a robust headless backend. It\r\n handles all business logic, including product, user authentication, order processing, </span><span>manual payment processing</span><span>&nbsp;and a secure admin dashboard for managing the entire operation.</span></h2><p class=\"ds-markdown-paragraph\"><br></p></li><br><p></p>', '2025-12-28 04:52:27', '2025-12-28 11:07:57'),
(19, 'Aachiya Varieties Shop (IMS)', 'aachiya varieties shop inventory management system platform.', 'web app', 'https://achiya-varieties.shop/', 'https://github.com/MDAnwar58/laravel-inventory-management-system-for-achiya-varieties-shop-live', 'http://127.0.0.1:8000/uploads/work-images/nBEsNv0BIl3kxWidW2CojP8gUJGNWgE4AwijC3wK.png', '<h3 align=\"center\"><strong><span>Aachiya Varieties Shop Inventory Management System</span></strong></h3><h3 align=\"center\"><strong><span><br></span></strong></h3><p class=\"ds-markdown-paragraph\"><strong><span>Project:</span></strong><span> A fully-featured, web-based Inventory Management System (IMS) for retail operations like Aachiya Varieties Shop.</span></p><p class=\"ds-markdown-paragraph\"><span><br></span></p><p class=\"ds-markdown-paragraph\"><strong><span>Core Objective:</span></strong><span>\r\n To provide real-time, automated control over stock inventory, \r\noptimizing operations, reducing costs, and saving time through a modern \r\nweb interface.</span></p><p class=\"ds-markdown-paragraph\"><span><br></span></p><hr><h3><strong><span>Technical Stack</span></strong></h3><ul><li><p class=\"ds-markdown-paragraph\"><strong><span>Backend Framework:</span></strong><span> </span><strong><span>Laravel</span></strong><span>\r\n (PHP) – Chosen for its robust security, elegant MVC architecture, \r\nscalability, and built-in features for rapid development (Eloquent ORM, \r\nBlade templating, migrations, artisan commands).</span></p><p class=\"ds-markdown-paragraph\"><span><br></span></p></li><li><p class=\"ds-markdown-paragraph\"><strong><span>Frontend Interactivity:</span></strong><span> </span><strong><span>jQuery</span></strong><span>\r\n – Used to create a dynamic, responsive user experience without full \r\npage reloads. It handles AJAX calls for real-time data updates, form \r\nsubmissions, and interactive elements like live search, modal \r\ninteractions, and dynamic form validation.</span></p><p class=\"ds-markdown-paragraph\"><span><br></span></p></li><li><p class=\"ds-markdown-paragraph\"><strong><span>Database:</span></strong><span> Typically </span><strong><span>MySQL</span></strong><span>&nbsp;</span><span>(compatible with Laravel\'s Eloquent ORM).</span></p><p class=\"ds-markdown-paragraph\"><span><br></span></p></li><li><p class=\"ds-markdown-paragraph\"><strong><span>UI/UX:</span></strong><span> Likely built with </span><strong><span>Bootstrap</span></strong><span>&nbsp;for a responsive, mobile-friendly admin dashboard that works on all devices.</span></p></li></ul><p><br></p>', '2025-12-28 05:04:32', '2025-12-28 11:07:51'),
(20, 'Code Debugger', 'Automatically identifies, analyzes, and fixes programming errors and bugs.', 'web app', NULL, 'https://github.com/MDAnwar58/react-code-debugger-app', 'http://127.0.0.1:8000/uploads/work-images/H8RARJVPEJ46zR8aeAURpXclHOYMdMIrUhVi0Mqq.png', '<p align=\"center\"><b>Code Debugger</b></p><p align=\"center\"><b><br></b></p><p align=\"left\"><span>An automated debugging tool that scans code to detect errors, \r\ndiagnoses their root causes, and generates solutions or fixes to resolve\r\n programming bugs.</span></p>', '2025-12-28 05:08:13', '2025-12-28 11:07:40');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;