-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 12:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_infinity15`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `thumbnail`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 'html', 'noimage.jpg', 'HTML adalah singkatan dari Hypertext Markup Language', NULL, '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(2, 'HTML basic', 'html-basic-1', 'noimage.jpg', 'HTML tingkat dasar', 1, '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(3, 'HTML advanced', 'html-advanced-1', 'noimage.jpg', 'HTML tingkat dasar', 1, '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(4, 'CSS', 'css', '/storage/photos/1/categories/CSS-Logo.jpg', 'CSS atau Cascading Style Sheets adalah salah satu topik yang harus diketahui dalam pengembangan website.', NULL, '2022-01-03 19:28:32', '2022-01-03 23:13:43'),
(5, 'Javascript', 'javascript', 'noimage.jpg', 'JavaScript adalah salah satu bahasa pemrograman yang sering digunakan oleh website programmer atau website developer.', NULL, '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(6, 'PHP', 'php', 'noimage.jpg', 'Hypertext Preprocessor adalah bahasa skrip yang dapat ditanamkan atau disisipkan ke dalam HTML. PHP banyak dipakai untuk memprogram situs web dinamis. PHP dapat digunakan untuk membangun sebuah CMS.', NULL, '2022-01-03 19:28:32', '2022-01-03 19:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id`, `category_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2022-01-03 20:46:10', '2022-01-03 20:46:10'),
(2, 1, 2, '2022-01-03 20:46:25', '2022-01-03 20:46:25'),
(3, 5, 2, '2022-01-03 20:46:25', '2022-01-03 20:46:25'),
(4, 6, 2, '2022-01-03 20:46:25', '2022-01-03 20:46:25'),
(5, 6, 5, '2022-01-04 00:15:57', '2022-01-04 00:15:57'),
(6, 6, 3, '2022-01-04 00:41:13', '2022-01-04 00:41:13'),
(7, 6, 4, '2022-01-04 00:41:27', '2022-01-04 00:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_19_075404_create_categories_table', 1),
(6, '2021_12_09_070818_create_tags_table', 1),
(7, '2021_12_11_084825_create_posts_table', 1),
(8, '2021_12_11_085231_create_category_post_table', 1),
(9, '2021_12_11_085259_create_post_tag_table', 1),
(10, '2021_12_26_152830_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'post_show', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(2, 'post_create', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(3, 'post_update', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(4, 'post_detail', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(5, 'post_delete', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(6, 'category_show', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(7, 'category_create', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(8, 'category_update', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(9, 'category_detail', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(10, 'category_delete', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(11, 'tag_show', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(12, 'tag_create', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(13, 'tag_update', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(14, 'tag_delete', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(15, 'role_show', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(16, 'role_create', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(17, 'role_update', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(18, 'role_detail', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(19, 'role_delete', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(20, 'user_show', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(21, 'user_create', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(22, 'user_update', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(23, 'user_detail', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(24, 'user_delete', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(25, 'file_show', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('publish','draft') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `thumbnail`, `description`, `content`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'greeting or give your next blog post a special look.', 'greeting-or-give-your-next-blog-post-a-special-look', '/storage/photos/1/wpdummycontent-og.png', 'greeting or give your next blog post a special look.', '<p>Make a newspaper clipping with your own headline and story. Surprise friends and colleagues, send a birthday greeting or give your next blog post a special look.</p>\r\n<p>To download your newspaper, use the link at the bottom of the generated image. You can use the images as you wish ie. put them on your own website or blog. Please note, that direct linking to the newspaper clippings doesn\'t work; the images are deleted from the server after a short time span.</p>\r\n<p>&nbsp;</p>\r\n<pre class=\"language-javascript\"><code>(function () {\r\n\r\n	if (typeof Prism === \'undefined\' || typeof document === \'undefined\') {\r\n		return;\r\n	}\r\n\r\n	/**\r\n	 * Plugin name which is used as a class name for &lt;pre&gt; which is activating the plugin\r\n	 *\r\n	 * @type {string}\r\n	 */\r\n	var PLUGIN_NAME = \'line-numbers\';\r\n\r\n	/**\r\n	 * Regular expression used for determining line breaks\r\n	 *\r\n	 * @type {RegExp}\r\n	 */\r\n	var NEW_LINE_EXP = /\\n(?!$)/g;\r\n\r\n\r\n	/**\r\n	 * Global exports\r\n	 */\r\n	var config = Prism.plugins.lineNumbers = {\r\n		/**\r\n		 * Get node for provided line number\r\n		 *\r\n		 * @param {Element} element pre element\r\n		 * @param {number} number line number\r\n		 * @returns {Element|undefined}\r\n		 */\r\n		getLine: function (element, number) {\r\n			if (element.tagName !== \'PRE\' || !element.classList.contains(PLUGIN_NAME)) {\r\n				return;\r\n			}\r\n\r\n			var lineNumberRows = element.querySelector(\'.line-numbers-rows\');\r\n			if (!lineNumberRows) {\r\n				return;\r\n			}\r\n			var lineNumberStart = parseInt(element.getAttribute(\'data-start\'), 10) || 1;\r\n			var lineNumberEnd = lineNumberStart + (lineNumberRows.children.length - 1);\r\n\r\n			if (number &lt; lineNumberStart) {\r\n				number = lineNumberStart;\r\n			}\r\n			if (number &gt; lineNumberEnd) {\r\n				number = lineNumberEnd;\r\n			}\r\n\r\n			var lineIndex = number - lineNumberStart;\r\n\r\n			return lineNumberRows.children[lineIndex];\r\n		},\r\n\r\n		/**\r\n		 * Resizes the line numbers of the given element.\r\n		 *\r\n		 * This function will not add line numbers. It will only resize existing ones.\r\n		 *\r\n		 * @param {HTMLElement} element A `&lt;pre&gt;` element with line numbers.\r\n		 * @returns {void}\r\n		 */\r\n		resize: function (element) {\r\n			resizeElements([element]);\r\n		},\r\n\r\n		/**\r\n		 * Whether the plugin can assume that the units font sizes and margins are not depended on the size of\r\n		 * the current viewport.\r\n		 *\r\n		 * Setting this to `true` will allow the plugin to do certain optimizations for better performance.\r\n		 *\r\n		 * Set this to `false` if you use any of the following CSS units: `vh`, `vw`, `vmin`, `vmax`.\r\n		 *\r\n		 * @type {boolean}\r\n		 */\r\n		assumeViewportIndependence: true\r\n	};\r\n\r\n	/**\r\n	 * Resizes the given elements.\r\n	 *\r\n	 * @param {HTMLElement[]} elements\r\n	 */\r\n	function resizeElements(elements) {\r\n		elements = elements.filter(function (e) {\r\n			var codeStyles = getStyles(e);\r\n			var whiteSpace = codeStyles[\'white-space\'];\r\n			return whiteSpace === \'pre-wrap\' || whiteSpace === \'pre-line\';\r\n		});\r\n\r\n		if (elements.length == 0) {\r\n			return;\r\n		}\r\n\r\n		var infos = elements.map(function (element) {\r\n			var codeElement = element.querySelector(\'code\');\r\n			var lineNumbersWrapper = element.querySelector(\'.line-numbers-rows\');\r\n			if (!codeElement || !lineNumbersWrapper) {\r\n				return undefined;\r\n			}\r\n\r\n			/** @type {HTMLElement} */\r\n			var lineNumberSizer = element.querySelector(\'.line-numbers-sizer\');\r\n			var codeLines = codeElement.textContent.split(NEW_LINE_EXP);\r\n\r\n			if (!lineNumberSizer) {\r\n				lineNumberSizer = document.createElement(\'span\');\r\n				lineNumberSizer.className = \'line-numbers-sizer\';\r\n\r\n				codeElement.appendChild(lineNumberSizer);\r\n			}\r\n\r\n			lineNumberSizer.innerHTML = \'0\';\r\n			lineNumberSizer.style.display = \'block\';\r\n\r\n			var oneLinerHeight = lineNumberSizer.getBoundingClientRect().height;\r\n			lineNumberSizer.innerHTML = \'\';\r\n\r\n			return {\r\n				element: element,\r\n				lines: codeLines,\r\n				lineHeights: [],\r\n				oneLinerHeight: oneLinerHeight,\r\n				sizer: lineNumberSizer,\r\n			};\r\n		}).filter(Boolean);\r\n\r\n		infos.forEach(function (info) {\r\n			var lineNumberSizer = info.sizer;\r\n			var lines = info.lines;\r\n			var lineHeights = info.lineHeights;\r\n			var oneLinerHeight = info.oneLinerHeight;\r\n\r\n			lineHeights[lines.length - 1] = undefined;\r\n			lines.forEach(function (line, index) {\r\n				if (line &amp;&amp; line.length &gt; 1) {\r\n					var e = lineNumberSizer.appendChild(document.createElement(\'span\'));\r\n					e.style.display = \'block\';\r\n					e.textContent = line;\r\n				} else {\r\n					lineHeights[index] = oneLinerHeight;\r\n				}\r\n			});\r\n		});\r\n\r\n		infos.forEach(function (info) {\r\n			var lineNumberSizer = info.sizer;\r\n			var lineHeights = info.lineHeights;\r\n\r\n			var childIndex = 0;\r\n			for (var i = 0; i &lt; lineHeights.length; i++) {\r\n				if (lineHeights[i] === undefined) {\r\n					lineHeights[i] = lineNumberSizer.children[childIndex++].getBoundingClientRect().height;\r\n				}\r\n			}\r\n		});\r\n\r\n		infos.forEach(function (info) {\r\n			var lineNumberSizer = info.sizer;\r\n			var wrapper = info.element.querySelector(\'.line-numbers-rows\');\r\n\r\n			lineNumberSizer.style.display = \'none\';\r\n			lineNumberSizer.innerHTML = \'\';\r\n\r\n			info.lineHeights.forEach(function (height, lineNumber) {\r\n				wrapper.children[lineNumber].style.height = height + \'px\';\r\n			});\r\n		});\r\n	}\r\n\r\n	/**\r\n	 * Returns style declarations for the element\r\n	 *\r\n	 * @param {Element} element\r\n	 */\r\n	function getStyles(element) {\r\n		if (!element) {\r\n			return null;\r\n		}\r\n\r\n		return window.getComputedStyle ? getComputedStyle(element) : (element.currentStyle || null);\r\n	}\r\n\r\n	var lastWidth = undefined;\r\n	window.addEventListener(\'resize\', function () {\r\n		if (config.assumeViewportIndependence &amp;&amp; lastWidth === window.innerWidth) {\r\n			return;\r\n		}\r\n		lastWidth = window.innerWidth;\r\n\r\n		resizeElements(Array.prototype.slice.call(document.querySelectorAll(\'pre.\' + PLUGIN_NAME)));\r\n	});\r\n\r\n	Prism.hooks.add(\'complete\', function (env) {\r\n		if (!env.code) {\r\n			return;\r\n		}\r\n\r\n		var code = /** @type {Element} */ (env.element);\r\n		var pre = /** @type {HTMLElement} */ (code.parentNode);\r\n\r\n		// works only for &lt;code&gt; wrapped inside &lt;pre&gt; (not inline)\r\n		if (!pre || !/pre/i.test(pre.nodeName)) {\r\n			return;\r\n		}\r\n\r\n		// Abort if line numbers already exists\r\n		if (code.querySelector(\'.line-numbers-rows\')) {\r\n			return;\r\n		}\r\n\r\n		// only add line numbers if &lt;code&gt; or one of its ancestors has the `line-numbers` class\r\n		if (!Prism.util.isActive(code, PLUGIN_NAME)) {\r\n			return;\r\n		}\r\n\r\n		// Remove the class \'line-numbers\' from the &lt;code&gt;\r\n		code.classList.remove(PLUGIN_NAME);\r\n		// Add the class \'line-numbers\' to the &lt;pre&gt;\r\n		pre.classList.add(PLUGIN_NAME);\r\n\r\n		var match = env.code.match(NEW_LINE_EXP);\r\n		var linesNum = match ? match.length + 1 : 1;\r\n		var lineNumbersWrapper;\r\n\r\n		var lines = new Array(linesNum + 1).join(\'&lt;span&gt;&lt;/span&gt;\');\r\n\r\n		lineNumbersWrapper = document.createElement(\'span\');\r\n		lineNumbersWrapper.setAttribute(\'aria-hidden\', \'true\');\r\n		lineNumbersWrapper.className = \'line-numbers-rows\';\r\n		lineNumbersWrapper.innerHTML = lines;\r\n\r\n		if (pre.hasAttribute(\'data-start\')) {\r\n			pre.style.counterReset = \'linenumber \' + (parseInt(pre.getAttribute(\'data-start\'), 10) - 1);\r\n		}\r\n\r\n		env.element.appendChild(lineNumbersWrapper);\r\n\r\n		resizeElements([pre]);\r\n\r\n		Prism.hooks.run(\'line-numbers\', env);\r\n	});\r\n\r\n	Prism.hooks.add(\'line-numbers\', function (env) {\r\n		env.plugins = env.plugins || {};\r\n		env.plugins.lineNumbers = true;\r\n	});\r\n\r\n}());</code></pre>', 'publish', '2021-12-27 12:18:27', '2021-12-28 19:14:56', 1),
(2, 'Membuat Fitur Multi Auth Di Laravel 7', 'membuat-fitur-multi-auth-di-laravel-7', '/storage/photos/1/posts/laravel-multi-auth-1000x511.png', 'Mungkin tepat rasanya jika dituliskan dalam sebuah artikel, agar mudah menjawabnya dan lebih banyak yang bisa belajar.', '<p>Assalamualaikum Warohmatulloh Wabarokatuh, seringkali saya dapat pertanyaan tentang cara membuat multi auth&nbsp;<strong><em><a href=\"https://www.kawankoding.id/topik/laravel\">Laravel</a></em></strong>. Mungkin tepat rasanya jika dituliskan dalam sebuah artikel, agar mudah menjawabnya dan lebih banyak yang bisa belajar.</p>\r\n<p>Tutorial ini harusnya bisa juga digunakan untuk&nbsp;<strong><em><a href=\"https://laravel.com/\" target=\"_blank\" rel=\"noreferrer noopener\">Laravel</a></em></strong>&nbsp;versi 5.5, 5.6, 5.7, 5.8 dan 6. Karena tidak banyak perubahan pada struktur autentikasi pada versi tersebut.</p>\r\n<h2>Menginstal Laravel</h2>\r\n<p>Pertama kita buat sebuah projek baru Laravel tentunya, bisa gunakan perintah composer create-project.</p>\r\n<pre class=\"language-bash\"><code>composer create-project --prefer-dist laravel/laravel multi-auth</code></pre>\r\n<p>Atau menggunakan&nbsp;<em><strong>Laravel Installer</strong></em>.</p>\r\n<pre class=\"language-php\"><code>laravel new multi-auth</code></pre>\r\n<h2>Menginstal Laravel UI</h2>\r\n<p>Karena sejak Laravel 6 perintah&nbsp;<code>make:auth</code>&nbsp;sudah tidak ada, maka kita harus menginstal package&nbsp;<code>laravel/ui</code>&nbsp;untuk membuat auth scaffold. Jika kawan kawan menggunakan versi sebelum versi 6, lewati langkah ini.</p>\r\n<pre class=\"language-php\"><code>composer require laravel/ui</code></pre>\r\n<p>Setelah terinstal jalankan perintah untuk membuat&nbsp;<em>auth scaffolding</em>nya, kali ini saya gunakan saja&nbsp;<strong><em>Bootstrap</em></strong>.</p>\r\n<pre class=\"language-bash\"><code>php artisan ui bootstrap --auth</code></pre>\r\n<p>Dan setelahnya jangan lupa untuk menjalankan perintah untuk&nbsp;<strong><em>compile</em></strong>&nbsp;asetnya.</p>\r\n<pre class=\"wp-block-prismatic-blocks\"><code class=\"language-bash hljs\">npm install &amp;&amp; npm run dev</code></pre>\r\n<p>Tunggu sampai proses instal dan&nbsp;<em>build</em>&nbsp;selesai.</p>\r\n<h2>Konfigurasi Database</h2>\r\n<p>Selanjutnya buat sebuah database dengan nama sesuai keinginan kawan-kawan, kali ini saya akan namakan&nbsp;<code>multi-auth</code>. Berikutnya sesuaikan konfigurasi pada file&nbsp;<code>.env</code>.</p>\r\n<pre class=\"language-bash\"><code>DB_CONNECTION=mysql\r\nDB_HOST=127.0.0.1\r\nDB_PORT=3306\r\nDB_DATABASE=multi-auth\r\nDB_USERNAME=root \r\nDB_PASSWORD=</code></pre>\r\n<pre class=\"wp-block-prismatic-blocks\"><br /><br /></pre>\r\n<pre class=\"language-javascript\"><code>const Prism = require(\'prismjs\');\r\n\r\n// The code snippet you want to highlight, as a string\r\nconst code = `var data = 1;`;\r\n\r\n// Returns a highlighted HTML string\r\nconst html = Prism.highlight(code, Prism.languages.javascript, \'javascript\');</code></pre>\r\n<pre class=\"wp-block-prismatic-blocks\">&nbsp;</pre>\r\n<pre class=\"language-bash\"><code>laravel new example-app --github=\"--public\" --organization=\"laravel\"</code></pre>\r\n<pre class=\"wp-block-prismatic-blocks\">&nbsp;</pre>\r\n<pre class=\"language-php\"><code>$affected = DB::table(\'users\')\r\n              -&gt;where(\'id\', 1)\r\n              -&gt;update([\'votes\' =&gt; 1]);</code></pre>\r\n<pre class=\"wp-block-prismatic-blocks\"><br /><br /><br /></pre>', 'publish', '2021-12-27 18:22:53', '2022-01-04 02:25:40', 1),
(3, 'How to Create Multiple Authentication in Laravel 8 App', 'how-to-create-multiple-authentication-in-laravel-8-app', '/storage/photos/1/posts/Laravel.jpg', 'How to Create Multiple Authentication in Laravel 8 App', '<h2 class=\"breadcrumb\">How to Create Multiple Authentication in Laravel 8 App</h2>\r\n<section class=\"main-content\">\r\n<article class=\"article\">\r\n<section class=\"single-body\">\r\n<div class=\"LinkedBlock\">Eventually, we are going to learn how to create multiple auth (Authentication) in Laravel 8 using middleware, and we will also consider other laravel imperatives that are useful to build laravel basic auth app from starting.\r\n<p><img src=\"/storage/photos/1/wpdummycontent-og.png\" alt=\"\" width=\"550\" height=\"340\" /></p>\r\n<div class=\"vdo-ads-wrapper ad-cls-block-580x250\">\r\n<div id=\"bsa-zone_1574377674646-5_123456\" class=\"bsa-ad\"></div>\r\n</div>\r\n<p>Multi Authentication in laravel is not a tough task to be done. In this tutorial, we will go through every step that will help us in building multi auth system with ease.</p>\r\n<p>If you want to develop strong knowledge about Token-Based Authentication, then must check out:&nbsp;<a href=\"https://www.positronx.io/laravel-jwt-authentication-tutorial-user-login-signup-api/\">Laravel JWT authentication tutorial</a>.</p>\r\n<div class=\"vdo-ads-wrapper ad-cls-block-580x250\">\r\n<div id=\"bsa-zone_1574377626597-7_123456\" class=\"bsa-ad\"></div>\r\n</div>\r\n<h2>Laravel 8 Multiple Authentication Example</h2>\r\n<p>What Multiple auth system refers to? Well, as the name suggests, it is a terminology that refers to the process of login by multiple users based on roles in an application.</p>\r\n<p>In general, Authentication is the security process, and it indicates acknowledging the genuine user with proper account details.</p>\r\n<div class=\"vdo-ads-wrapper ad-cls-block-580x250\">\r\n<div id=\"bsa-zone_1574377548719-4_123456\" class=\"bsa-ad\"></div>\r\n</div>\r\n<p>Here is the archetype of this tutorial, we will develop two users one is admin, and the other one is a regular user. Based on their roles, we will allow them to access in the app using middleware. Let us begin our work and start building our application.</p>\r\n</div>\r\n</section>\r\n</article>\r\n</section>', 'publish', '2021-12-27 18:25:07', '2022-01-04 01:25:10', 1),
(4, 'Database: Query Builder Insert Statements', 'database-query-builder-insert-statements', '/storage/photos/1/categories/html-1024x580.png', 'Exercitation magna d', '<h2 id=\"update-statements\">Update Statements</h2>\r\n<p>In addition to inserting records into the database, the query builder can also update existing records using the&nbsp;<code>update</code>&nbsp;method. The&nbsp;<code>update</code>&nbsp;method, like the&nbsp;<code>insert</code>&nbsp;method, accepts an array of column and value pairs indicating the columns to be updated. You may constrain the&nbsp;<code>update</code>&nbsp;query using&nbsp;<code>where</code>&nbsp;clauses:</p>\r\n<pre class=\"language-php\" tabindex=\"0\"><code>$affected = DB::table(\'users\')\r\n              -&gt;where(\'id\', 1)\r\n              -&gt;update([\'votes\' =&gt; 1]);</code></pre>\r\n<p>&nbsp;</p>\r\n<h4 id=\"update-or-insert\">Update Or Insert</h4>\r\n<p>Sometimes you may want to update an existing record in the database or create it if no matching record exists. In this scenario, the&nbsp;<code>updateOrInsert</code>&nbsp;method may be used. The&nbsp;<code>updateOrInsert</code>&nbsp;method accepts two arguments: an array of conditions by which to find the record, and an array of column and value pairs indicating the columns to be updated.</p>\r\n<p>The&nbsp;<code>updateOrInsert</code>&nbsp;method will attempt to locate a matching database record using the first argument\'s column and value pairs. If the record exists, it will be updated with the values in the second argument. If the record can not be found, a new record will be inserted with the merged attributes of both arguments:</p>\r\n<pre class=\"language-php\" tabindex=\"0\"><code>DB::table(\'users\')\r\n    -&gt;updateOrInsert(\r\n        [\'email\' =&gt; \'john@example.com\', \'name\' =&gt; \'John\'],\r\n        [\'votes\' =&gt; \'2\']\r\n    );</code></pre>\r\n<p>&nbsp;</p>\r\n<h3 id=\"updating-json-columns\">Updating JSON Columns</h3>\r\n<p>When updating a JSON column, you should use&nbsp;<code>-&gt;</code>&nbsp;syntax to update the appropriate key in the JSON object. This operation is supported on MySQL 5.7+ and PostgreSQL 9.5+:</p>\r\n<pre class=\"language-php\" tabindex=\"0\"><code>$affected = DB::table(\'users\')\r\n              -&gt;where(\'id\', 1)\r\n              -&gt;update([\'options-&gt;enabled\' =&gt; true]);</code></pre>\r\n<p>&nbsp;</p>\r\n<h3 id=\"increment-and-decrement\">Increment &amp; Decrement</h3>\r\n<p>The query builder also provides convenient methods for incrementing or decrementing the value of a given column. Both of these methods accept at least one argument: the column to modify. A second argument may be provided to specify the amount by which the column should be incremented or decremented:</p>\r\n<pre class=\"language-php\" tabindex=\"0\"><code>DB::table(\'users\')-&gt;increment(\'votes\');\r\n\r\nDB::table(\'users\')-&gt;increment(\'votes\', 5);\r\n\r\nDB::table(\'users\')-&gt;decrement(\'votes\');\r\n\r\nDB::table(\'users\')-&gt;decrement(\'votes\', 5);</code></pre>\r\n<p>You may also specify additional columns to update during the operation:</p>\r\n<pre class=\"language-php\" tabindex=\"0\"><code>DB::table(\'users\')-&gt;increment(\'votes\', 1, [\'name\' =&gt; \'John\']);</code></pre>', 'publish', '2021-12-28 19:18:57', '2021-12-28 19:20:09', 1),
(5, 'Cara Menggunakan Form Request Validation di Laravel 8', 'cara-menggunakan-form-request-validation-di-laravel-8', '/storage/photos/1/posts/Laravel.png', 'Sebelumnya, apa sih form request validation ? kenapa kita perlu menggunakan form request validation di laravel ? Jadi, form...', '<p>Sebelumnya, apa sih form request validation ? kenapa kita perlu menggunakan form request validation di laravel ? Jadi, form request validation ini mungkin akan sangat kita butuhkan saat kita membuat suatu aplikasi atau sistem dengan laravel yang mempunyai skenario validasi yang sangat kompleks. Form request merupakan class request khusus yang merangkum logika validasi dan otorisasi. Singkatnya, mungkin saat ini kamu menggunakan manual validation seperti di bawah ini untuk melakukan validasi di laravel.</p>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"language-php\" tabindex=\"0\"><code>public function store(Request $request)\r\n{\r\n    $validator = Validator::make($request-&gt;all(), [\r\n        \'title\' =&gt; \'required|unique:posts|max:255\',\r\n        \'body\' =&gt; \'required\',\r\n    ]);\r\n        \r\n    if ($validator-&gt;fails()) {\r\n        return redirect(\'post/create\')\r\n            -&gt;withErrors($validator)\r\n            -&gt;withInput();\r\n    }\r\n        \r\n    $data = new Post();\r\n    $data-&gt;title = $request-&gt;title;\r\n    $data-&gt;body  = $request-&gt;body;\r\n    $data-&gt;save();\r\n\r\n    return redirect(\'post\')-&gt;with(\'success\',\'Data Added Successfully.\');\r\n}</code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\"><button class=\"copy-to-clipboard-button\" type=\"button\" data-copy-state=\"copy\">Copy</button></div>\r\n</div>\r\n</div>\r\n<p>Jika kamu menggunakan manual validation seperti contoh di atas, artinya jika ada function post lain yang memerlukan validasi yang sama, maka kamu juga harus menambahkan validasi lagi di function tersebut. Tapi jika kita menggunakan form request validastion, kita hanya perlu memanggilnya seperti ini&nbsp;<strong><code>public function store(PostRequest $request)</code></strong>. Jadi, function kita akan nampak lebih ringkas dan clean.</p>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"language-php\" tabindex=\"0\"><code>public function store(PostRequest $request)\r\n{   \r\n    $data = new Post();\r\n    $data-&gt;title = $request-&gt;title;\r\n    $data-&gt;body  = $request-&gt;body;\r\n    $data-&gt;save();\r\n\r\n    return redirect(\'post\')-&gt;with(\'success\',\'Data Added Successfully.\');\r\n}</code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\"><button class=\"copy-to-clipboard-button\" type=\"button\" data-copy-state=\"copy\">Copy</button></div>\r\n</div>\r\n</div>\r\n<p>Untuk membuat form request di laravel, kita dapat menggunakan perintah CLI artisan&nbsp;<code>make:request</code>. Dan lebih jelasnya, mari kita coba praktikkan membuat atau menggunakan form request validation di laravel, yang akan di bawah di bawah ini. 👇</p>\r\n<div class=\"mce-toc\">\r\n<h2>Laravel Form Request Validation</h2>\r\n<ul>\r\n<li><a href=\"https://codelapan.com/post/form-request-validation-di-laravel-8#mcetoc_1fj4rseple2\">Step 1: Install Laravel</a></li>\r\n<li><a href=\"https://codelapan.com/post/form-request-validation-di-laravel-8#mcetoc_1fj4rseple3\">Step 2: Setup Database</a></li>\r\n<li><a href=\"https://codelapan.com/post/form-request-validation-di-laravel-8#mcetoc_1fj4rseple4\">Step 3: Buat Model &amp; Migration</a></li>\r\n<li><a href=\"https://codelapan.com/post/form-request-validation-di-laravel-8#mcetoc_1fj4rseple5\">Step 4: Membuat Form Request Validation</a></li>\r\n<li><a href=\"https://codelapan.com/post/form-request-validation-di-laravel-8#mcetoc_1fj4rvh9nes\">Step 5: Tambahkan Route</a></li>\r\n<li><a href=\"https://codelapan.com/post/form-request-validation-di-laravel-8#mcetoc_1fj4rvh9net\">Step 6: Setup View</a></li>\r\n<li><a href=\"https://codelapan.com/post/form-request-validation-di-laravel-8#mcetoc_1fj92i8sl2e\">Step 7: Testing 1</a></li>\r\n<li><a href=\"https://codelapan.com/post/form-request-validation-di-laravel-8#mcetoc_1fj92i8sl2f\">Step 8: Custom Message</a></li>\r\n<li><a href=\"https://codelapan.com/post/form-request-validation-di-laravel-8#mcetoc_1fj92i8sl2g\">Step 9: Testing 2</a></li>\r\n</ul>\r\n</div>\r\n<h2 id=\"mcetoc_1fj4rseple2\">Step 1: Install Laravel</h2>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"language-markup\" tabindex=\"0\"><code>//via Laravel Installer\r\ncomposer global require laravel/installer\r\nlaravel new laravel-form-request-validation\r\n\r\n//via Composer\r\ncomposer create-project laravel/laravel laravel-form-request-validation</code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\"><button class=\"copy-to-clipboard-button\" type=\"button\" data-copy-state=\"copy\">Copy</button></div>\r\n</div>\r\n</div>\r\n<p>Pada langkah yang pertama ini, kita perlu menginstall laravel (saat ini versi 8) yang akan kita coba untuk implementasi atau menggunakan form request validation di laravel 8. Untuk installasi laravel bisa menggunakan laravel installer atau menggunakan composer seperti contoh di atas.</p>\r\n<p>Silahkan memilih salah satu cara yang ingin digunakan untuk installasi laravel. Dari kedua contoh perintah installasi laravel di atas, akan sama-sama menghasilkan atau generate laravel project dengan nama laravel-form-request-validation.</p>\r\n<h2 id=\"mcetoc_1fj4rseple3\">Step 2: Setup Database</h2>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"language-markup\" tabindex=\"0\"><code>DB_CONNECTION=mysql\r\nDB_HOST=127.0.0.1\r\nDB_PORT=3306\r\nDB_DATABASE=laravel_form_request_validation\r\nDB_USERNAME=root\r\nDB_PASSWORD=</code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\"><button class=\"copy-to-clipboard-button\" type=\"button\" data-copy-state=\"copy\">Copy</button></div>\r\n</div>\r\n</div>\r\n<p>Selanjutnya, buat database baru untuk menyimpan data-data sample yang akan kita gunakan pada percobaan menggunakan form request validation di laravel 8 ini. Jika kamu menggunakan xampp sebagai local development, silahkan buat database baru di localhost/phpmyadmin. Disini saya beri contoh, saya membuat database baru dengan nama&nbsp;<strong>laravel_form_request_validation</strong>. Kemudian jangan lupa juga untuk menyesuaikan&nbsp;<strong>DB_DATABASE</strong>&nbsp;pada file .env seperti pada contoh di atas.</p>\r\n<h2 id=\"mcetoc_1fj4rseple4\">Step 3: Buat Model &amp; Migration</h2>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"language-markup\" tabindex=\"0\"><code>php artisan make:model Post -m</code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\"><button class=\"copy-to-clipboard-button\" type=\"button\" data-copy-state=\"copy\">Copy</button></div>\r\n</div>\r\n</div>\r\n<p>Pada tutorial ini, kita akan simulasikan menggunakan form request validation untuk manage post. Jadi, pada step ketiga ini kita akan membuat atau generate class model baru yaitu Post model sekaligus generate file post migration. Silahkan jalankan perintah artisan seperti di atas untuk membuat file post model dan migration.</p>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"language-php\" tabindex=\"0\"><code>protected $guarded = [];</code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\"><button class=\"copy-to-clipboard-button\" type=\"button\" data-copy-state=\"copy\">Copy</button></div>\r\n</div>\r\n</div>\r\n<p>Kemudian, buka file Models/Post.php dan tambahkan method seperti di atas.</p>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"language-php\" tabindex=\"0\"><code>public function up()\r\n{\r\n    Schema::create(\'posts\', function (Blueprint $table) {\r\n        $table-&gt;id();\r\n        $table-&gt;string(\'title\');\r\n        $table-&gt;longText(\'body\');\r\n        $table-&gt;timestamps();\r\n    });\r\n}</code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\"><button class=\"copy-to-clipboard-button\" type=\"button\" data-copy-state=\"copy\">Copy</button></div>\r\n</div>\r\n</div>\r\n<p>Oke. Sekarang buka file post migration yang terletak di direktori database/migrations/{timestamp} _create_posts_table.php. Kemudian, pada function up, tambahkan 2 baris kode untuk membuat field title dan body pada table posts.</p>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"language-markup\" tabindex=\"0\"><code>php artisan migrate</code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\"><button class=\"copy-to-clipboard-button\" type=\"button\" data-copy-state=\"copy\">Copy</button></div>\r\n</div>\r\n</div>\r\n<p>Jika sudah, sekarang kita bisa jalankan perintah&nbsp;<code><strong>php artisan migrate</strong></code>.</p>\r\n<h2 id=\"mcetoc_1fj4rseple5\">Step 4: Membuat Form Request Validation</h2>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"language-markup\" tabindex=\"0\"><code>php artisan make:request PostRequest</code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\"><button class=\"copy-to-clipboard-button\" type=\"button\" data-copy-state=\"copy\">Copy</button></div>\r\n</div>\r\n</div>\r\n<p>Nah, pada step keempat ini, kita akan membuat form request untuk membuat validasi data post. Silahkan jalankan perintah seperti di atas untuk membuat class PostRequest. Class form request yang dihasilkan dari perintah artisan tersebut akan ditempatkan di direktori&nbsp;<code><strong>app/Http/Requests</strong></code>. Jika sebelumnya direktori ini tidak ada, direktori tersebut akan dibuat saat kita menjalan perintah&nbsp;<code><strong>make:request</strong></code>.</p>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"language-php\" tabindex=\"0\"><code>public function authorize()\r\n{\r\n    return true;\r\n}\r\n....\r\n....\r\npublic function rules()\r\n{\r\n    return [\r\n        \'title\' =&gt; \'required|unique:posts|max:200\',\r\n        \'body\'  =&gt; \'required\'\r\n    ];\r\n}</code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\"><button class=\"copy-to-clipboard-button\" type=\"button\" data-copy-state=\"copy\">Copy</button></div>\r\n</div>\r\n</div>\r\n<p>Setiap form request yang dihasilkan oleh laravel, memiliki dua method yaitu&nbsp;<code><strong>authorize</strong></code>&nbsp;dan&nbsp;<code><strong>rules</strong></code>. Method&nbsp;<code><strong>authorize</strong></code>&nbsp;bertanggung jawab untuk menentukan apakah user yang saat ini diautentikasi dapat melakukan request. Sedangkan method&nbsp;<code><strong>rules</strong></code>, me-return validation rules atau aturan validasi yang harus diterapkan pada request data.</p>\r\n<p>Oke. Pada step ini, silahkan atur method&nbsp;<code><strong>authorize</strong></code>&nbsp;bernilai true dan pada method&nbsp;<code><strong>rules</strong></code>, sesuaikan seperti kode di atas atau kamu mempunyai rule atau aturan lainnya.</p>\r\n<h2 id=\"mcetoc_1fj4rvh9nes\">Step 5: Tambahkan Route</h2>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"language-php\" tabindex=\"0\"><code>Route::post(\'/\', function (App\\Http\\Requests\\PostRequest $request) {\r\n    $post        = new App\\Models\\Post();\r\n    $post-&gt;title = $request-&gt;title;\r\n    $post-&gt;body  = $request-&gt;body;\r\n    $post-&gt;save();\r\n    \r\n    return back()-&gt;with(\'success\',\'Data Added Successfully.\');\r\n});</code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\"><button class=\"copy-to-clipboard-button\" type=\"button\" data-copy-state=\"copy\">Copy</button></div>\r\n</div>\r\n</div>\r\n<p>Kemudian, kita beralih ke file routes/web.php untuk menambahkan route baru dengan method post. Pada kode di atas, saya sengaja membuat logic dan menerapkan form request validation di dalam route laravel. Sebenarnya, kamu bisa membuat atau menerapkan form request validation di dalam file controller kamu, namun sebagai contoh, saya akan membuatnya di route saja.</p>\r\n<p>Dengan kode di atas, kita menggunakan class PostRequest untuk melakukan validasi data request. Jika data request gagal divalidasi, maka akan me-return ke halaman awal dan menampilkan pesan error. Tapi jika data request berhasil di validasi, maka proses akan diteruskan yaitu menyimpan data request (title dan body) ke table posts dan akan me-return ke halaman awal disertai pesan success.</p>\r\n<h2 id=\"mcetoc_1fj4rvh9net\">Step 6: Setup View</h2>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"language-php\" tabindex=\"0\"><code>&lt;!doctype html&gt;\r\n&lt;html lang=\"en\"&gt;\r\n    &lt;head&gt;\r\n        &lt;!-- Required meta tags --&gt;\r\n        &lt;meta charset=\"utf-8\"&gt;\r\n        &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"&gt;\r\n        &lt;!-- Bootstrap CSS --&gt;\r\n        &lt;link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3\" crossorigin=\"anonymous\"&gt;\r\n        &lt;title&gt;Laravel Form Request Validation&lt;/title&gt;\r\n    &lt;/head&gt;\r\n    &lt;body&gt;\r\n        &lt;div class=\"container my-5\"&gt;\r\n            &lt;h2 class=\"fs-4 fw-bold text-center\"&gt;Laravel Form Request Validation&lt;/h2&gt;\r\n            &lt;div class=\"row\"&gt;\r\n                &lt;div class=\"col-md-6 offset-md-3\"&gt;\r\n                    @if (session(\'success\'))\r\n                    &lt;div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"&gt;\r\n                        {{ session(\'success\') }}\r\n                        &lt;button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"&gt;&lt;/button&gt;\r\n                    &lt;/div&gt;\r\n                    @endif\r\n                    &lt;form action=\"/\" method=\"post\"&gt;\r\n                        @csrf\r\n                        &lt;div class=\"mb-3\"&gt;\r\n                            &lt;label for=\"title\" class=\"form-label\"&gt;Title&lt;/label&gt;\r\n                            &lt;input type=\"text\" name=\"title\" class=\"form-control @error(\'title\') is-invalid @enderror\" id=\"title\" value=\"{{ old(\'title\') }}\"&gt;\r\n                            @error(\'title\')\r\n                            &lt;div class=\"invalid-feedback\"&gt;{{ $message }}&lt;/div&gt;\r\n                            @enderror\r\n                        &lt;/div&gt;\r\n                        &lt;div class=\"mb-3\"&gt;\r\n                            &lt;label for=\"body\" class=\"form-label\"&gt;Body&lt;/label&gt;\r\n                            &lt;textarea name=\"body\" id=\"body\" cols=\"30\" rows=\"10\" class=\"form-control @error(\'body\') is-invalid @enderror\"&gt;{{ old(\'body\') }}&lt;/textarea&gt;\r\n                            @error(\'body\')\r\n                            &lt;div class=\"invalid-feedback\"&gt;{{ $message }}&lt;/div&gt;\r\n                            @enderror\r\n                        &lt;/div&gt;\r\n                        &lt;button type=\"submit\" class=\"btn btn-primary\"&gt;Save&lt;/button&gt;\r\n                    &lt;/form&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n        &lt;script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n    &lt;/body&gt;\r\n&lt;/html&gt;</code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\"><button class=\"copy-to-clipboard-button\" type=\"button\" data-copy-state=\"copy\">Copy</button></div>\r\n</div>\r\n</div>\r\n<p>OKe. Selanjutnya buka file welcome.blade.php, lalu ganti semua kode yang ada dengan kode seperti di atas. Pada kode di atas, saya menggunakan bootsrap 5 untuk membuat tampilan front end.&nbsp;&nbsp;</p>', 'publish', '2022-01-04 00:15:57', '2022-01-04 00:17:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2022-01-03 20:46:10', '2022-01-03 20:46:10'),
(2, 2, 1, '2022-01-03 20:46:25', '2022-01-03 20:46:25'),
(3, 2, 5, '2022-01-03 20:46:25', '2022-01-03 20:46:25'),
(4, 5, 5, '2022-01-04 00:15:57', '2022-01-04 00:15:57'),
(5, 3, 2, '2022-01-04 00:41:13', '2022-01-04 00:41:13'),
(6, 4, 5, '2022-01-04 00:41:27', '2022-01-04 00:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(2, 'Admin', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(3, 'Editor', 'web', '2022-01-03 19:28:32', '2022-01-03 19:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tutorial', 'tutorial', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(2, 'HTML', 'html', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(3, 'CSS', 'css', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(4, 'Javascript', 'javascript', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(5, 'Pemrograman', 'pemrograman', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(6, 'PHP', 'php', '2022-01-03 19:28:32', '2022-01-03 19:28:32'),
(7, 'Laravel', 'laravel', '2022-01-03 19:28:32', '2022-01-03 19:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super.admin@test.com', '2022-01-03 19:28:31', '$2y$10$98mrc5kiR8rhzAe1zIFUde/MvWhnsmSjipAoPoVKCZpnIr8vpb92G', 'nq7a4igPWHo0xh5iR1elEekM2YTuGtgZ9ZuZQ0K0FFpTdm3WQhEBazo9ncYw', '2022-01-03 19:28:31', '2022-01-04 04:34:34'),
(14, 'maxokafic', 'admin@test.com', NULL, '$2y$10$8Kb9PGejBVi5VmK8c8kYHe/HMCA.4ktAA.Ej1zufORACldVpwT0tK', NULL, '2022-01-03 20:44:58', '2022-01-04 04:26:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_post_category_id_foreign` (`category_id`),
  ADD KEY `category_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_post`
--
ALTER TABLE `category_post`
  ADD CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
