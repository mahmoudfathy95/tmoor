-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2020 at 07:00 PM
-- Server version: 10.3.23-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apluscode_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'aly', 'aly@gmail.com', '$2y$10$Blv7iyblKFjl5.Vp8pzaTuXxd3noi8Jm0dOu7j/nKiqUyR.p4Medq', NULL, 1, NULL, NULL),
(2, 'mm', 'wabel@gmail.com', '$2y$10$ClSYikTUIugFnSd0OloJQ.0hO2OdQ4pDqDtpMU7.2rXd.1Iy5AGWi', NULL, 1, '2020-09-08 16:41:05', '2020-09-08 16:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '1597263644تمورر[Recovered]-20.png', NULL, '2020-08-12 18:20:44'),
(3, '1597263659تمورر[Recovered]-23.png', '2020-08-04 19:50:36', '2020-08-12 18:20:59'),
(4, '1597263675تمورر[Recovered]-19.png', '2020-08-04 19:51:33', '2020-08-12 18:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `name`, `locale`) VALUES
(1, 1, 'تمور مكنوزه', 'ar'),
(4, 1, 'تمور مكنوزه', 'en'),
(5, 3, 'تمور محشية', 'ar'),
(6, 3, 'تمور محشية', 'en'),
(7, 4, 'تمور ضميد شعبي', 'ar'),
(8, 4, 'تمور ضميد شعبي', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_amount` double(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `created_at`, `updated_at`, `shipping_amount`) VALUES
(1, NULL, '2020-08-21 19:43:29', 30.00),
(2, '2020-08-12 20:51:29', '2020-08-12 20:51:29', 0.00),
(3, '2020-08-12 20:51:51', '2020-08-12 20:51:51', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `city_translations`
--

CREATE TABLE `city_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_translations`
--

INSERT INTO `city_translations` (`id`, `city_id`, `name`, `locale`) VALUES
(1, 1, 'مكه المكرمه', 'ar'),
(2, 1, 'maka', 'en'),
(3, 2, 'جده', 'ar'),
(4, 2, 'جده', 'en'),
(5, 3, 'المدينة المنورة', 'ar'),
(6, 3, 'المدينة المنورة', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `name`, `review`, `product_id`, `active`, `created_at`, `updated_at`) VALUES
(2, 'dasd', 'aly', 5, 1, 0, '2020-08-02 15:17:20', '2020-08-02 15:17:20'),
(3, 'dasd', 'aly', 5, 1, 0, '2020-08-02 15:18:29', '2020-08-02 15:18:29'),
(4, 'dasd', 'aly', 5, 1, 0, '2020-08-12 21:04:36', '2020-08-12 21:04:36'),
(5, 'dasd', 'aly', 3, 1, 0, '2020-08-12 21:05:09', '2020-08-12 21:05:09'),
(6, 'dasd', 'aly', 3, 1, 0, '2020-08-13 14:31:30', '2020-08-13 14:31:30'),
(7, 'comment', 'name', 1, 12, 0, '2020-08-13 14:38:03', '2020-08-13 14:38:03'),
(8, 'comment', 'name', 5, 10, 0, '2020-08-14 08:23:09', '2020-08-14 08:23:09'),
(9, 'comment', 'name', 5, 11, 1, '2020-08-15 12:00:59', '2020-08-15 12:00:59'),
(10, 'dasd', 'aly', 5, 9, 1, '2020-08-15 12:31:15', '2020-08-15 12:31:15'),
(11, 'comment', 'name', 5, 12, 0, '2020-08-15 13:04:04', '2020-08-15 13:04:04'),
(12, 'comment', 'name', 5, 12, 0, '2020-08-15 13:04:33', '2020-08-15 13:04:33'),
(13, 'comment', 'name', 5, 12, 0, '2020-08-15 13:04:52', '2020-08-15 13:04:52'),
(14, 'comment', 'name', 1, 11, 0, '2020-08-15 16:11:35', '2020-08-15 16:11:35'),
(15, 'comment', 'name', 4, 9, 0, '2020-08-15 19:02:02', '2020-08-15 19:02:02'),
(16, 'comment', 'name', 5, 10, 0, '2020-08-16 19:14:24', '2020-08-16 19:14:24'),
(17, 'comment', 'name', 5, 11, 0, '2020-08-16 19:14:50', '2020-08-16 19:14:50'),
(18, 'comment', 'name', 5, 11, 0, '2020-08-16 19:14:59', '2020-08-16 19:14:59'),
(19, 'comment', 'name', 5, 12, 0, '2020-09-07 20:04:48', '2020-09-07 20:04:48'),
(20, 'comment', 'name', 4, 11, 0, '2020-09-08 17:47:22', '2020-09-08 17:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_category_id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `config_category_id`, `key`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'about', NULL, NULL, NULL),
(4, 2, 'email', NULL, NULL, NULL),
(5, 2, 'phone', NULL, NULL, NULL),
(6, 1, 'address', NULL, NULL, NULL),
(7, 2, 'facebook', NULL, NULL, NULL),
(8, 2, 'twitter', NULL, NULL, NULL),
(9, 2, 'instagram', NULL, NULL, NULL),
(10, 3, 'vat', NULL, NULL, NULL),
(12, 3, 'free_shipping', NULL, NULL, NULL),
(13, 1, 'privacy', NULL, NULL, NULL),
(14, 1, 'refund', NULL, NULL, NULL),
(15, 1, 'shipping', NULL, NULL, NULL),
(16, 1, 'about_bank', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `config_categories`
--

CREATE TABLE `config_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config_categories`
--

INSERT INTO `config_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'abou', NULL, NULL),
(2, 'contact', NULL, NULL),
(3, 'settings', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `config_translations`
--

CREATE TABLE `config_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config_translations`
--

INSERT INTO `config_translations` (`id`, `config_id`, `name`, `value`, `locale`) VALUES
(1, 1, 'about(arabic)', 'شركة نخيل الوطنية :\r\nتمتلك \"الوطنية الزراعية\" في مزارعها بالمملكة العربية السعودية، أكثر من 180,000 نخلة تنتج منها أصناف متنوعة من التمور العضوية الفاخرة، والتي يتم تعبئتها وتغليفها بأشكال وأحجام مختلفة وفق أعلى معايير الجودة التي تلبي رغبات عملاء الشركة.', 'ar'),
(2, 4, 'email', 'info@watinia-agri.com', 'ar'),
(3, 5, 'phone', '00966-11-2651525', 'ar'),
(4, 6, 'address(arabic)', 'الرياض', 'ar'),
(5, 7, 'facebook', 'https://facebook.com', 'ar'),
(6, 8, 'twitter', 'https://twitter.com', 'ar'),
(7, 9, 'instagram', 'https://instagram.com', 'ar'),
(8, 1, 'about(english)', 'شركة نخيل الوطنية :\r\nتمتلك \"الوطنية الزراعية\" في مزارعها بالمملكة العربية السعودية، أكثر من 180,000 نخلة تنتج منها أصناف متنوعة من التمور العضوية الفاخرة، والتي يتم تعبئتها وتغليفها بأشكال وأحجام مختلفة وفق أعلى معايير الجودة التي تلبي رغبات عملاء الشركة.', 'en'),
(9, 4, 'email', 'info@watinia-agri.com', 'en'),
(10, 5, 'phone', '00966-11-2651525', 'en'),
(11, 6, 'address(english)', 'الرياض', 'en'),
(12, 7, 'facebook', 'https://facebook.com', 'en'),
(13, 8, 'twitter', 'https://twitter.com', 'en'),
(14, 9, 'instagram', 'https://instagram.com', 'en'),
(15, 10, 'VAT', '15', 'en'),
(16, 10, 'ضريبو القيمة المضافة', '15', 'ar'),
(17, 12, 'Free Shipping Amount', '200', 'en'),
(18, 12, 'قيمة الشحن المجانى', '200', 'ar'),
(19, 13, 'privacy policy (arabic)', '* الشروط:\r\nبإستخدامك لتطبيق ( نخيل الوطنية ) التابع لشركة الوطنية الزراعية فأنت توافق على الإلتزام بهذه الشروط، وعلى جميع القوانين واللوائح المعمول بها، وتقر كذلك بأنك مسؤول عن الإمتثال لأي قوانين محلية سارية.\r\nإذا كنت لا توافق على أي من هذه الشروط، فلا يحق لك استخدام أو الدخول إلى هذا التطبيق او التسجيل فيه. جميع المواد الواردة في هذا الموقع محمية بموجب حقوق النشر المعمول بها وبموجب قانون حماية العلامات التجارية.\r\n\r\n * قانون التنظيم:\r\nتخضع هذه الشروط والأحكام ويؤول تفسيرها إلى قوانين المملكة العربية السعودية وتخضع أنت كذلك وبشكل غير قابل للنقض للإختصاص القضائي لمحاكم المملكة العربية السعودية.\r\n\r\n* سياسة الخصوصية: \r\nتعتبر الخصوصية والأمن أقصى الأولويات في تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية حيث أننا  لم نقم على الإطلاق بمشاركة أو طباعة أو بيع معلومات أي زبون لأي طرف آخر.\r\nعند قيامك بتقديم المعلومات الشخصية على تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية سنعمل بكل جهد على حماية معلوماتك على الإنترنت وخارجه.\r\nنقوم باستخدام مجموعة متنوعة من تقنيات وإجراءات الأمان للمساعدة على حماية معلوماتك الشخصية من الوصول أو الاستخدام أو الكشف غير المصرح به حالما نقوم بإستلامها. على سبيل المثال، نحن نقوم بتخزين معلوماتك الشخصية على أنظمة كمبيوتر ذات وصول محدود للمصرح لهم بالإطلاع على هذه المعلومات .\r\n\r\n* خصوصية حسابك:\r\nأنت مسؤول عن الحفاظ على سرية بيانات حسابك وكلمة المرور وتحديد من يصل إلى جهاز الكمبيوتر الخاص بك أو التطبيق الخاص بنا ، كما أنك توافق على قبول المسؤولية عن جميع الأنشطة التي تتم من خلال حسابك أو كلمة المرور الخاصة بك.\r\nإذا كان عمرك أقل من 18 سنة، فلا يجوز لك استخدام خدمات تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية إلا بإشراك أحد الوالدين أو ولي الأمر.\r\nيحتفظ  تطبيق الوطنية الزراعية بالحق في رفض تقديم الخدمة، أو إنهاء الحسابات، أو إزالة أو تعديل المحتوى، أو إلغاء الأوامر وفقا لتقديرها الخاص.', 'ar'),
(20, 13, 'privacy policy (english)', '* الشروط:\r\nبإستخدامك لتطبيق ( نخيل الوطنية ) التابع لشركة الوطنية الزراعية فأنت توافق على الإلتزام بهذه الشروط، وعلى جميع القوانين واللوائح المعمول بها، وتقر كذلك بأنك مسؤول عن الإمتثال لأي قوانين محلية سارية.\r\nإذا كنت لا توافق على أي من هذه الشروط، فلا يحق لك استخدام أو الدخول إلى هذا التطبيق او التسجيل فيه. جميع المواد الواردة في هذا الموقع محمية بموجب حقوق النشر المعمول بها وبموجب قانون حماية العلامات التجارية.\r\n\r\n * قانون التنظيم:\r\nتخضع هذه الشروط والأحكام ويؤول تفسيرها إلى قوانين المملكة العربية السعودية وتخضع أنت كذلك وبشكل غير قابل للنقض للإختصاص القضائي لمحاكم المملكة العربية السعودية.\r\n\r\n* سياسة الخصوصية: \r\nتعتبر الخصوصية والأمن أقصى الأولويات في تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية حيث أننا  لم نقم على الإطلاق بمشاركة أو طباعة أو بيع معلومات أي زبون لأي طرف آخر.\r\nعند قيامك بتقديم المعلومات الشخصية على تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية سنعمل بكل جهد على حماية معلوماتك على الإنترنت وخارجه.\r\nنقوم باستخدام مجموعة متنوعة من تقنيات وإجراءات الأمان للمساعدة على حماية معلوماتك الشخصية من الوصول أو الاستخدام أو الكشف غير المصرح به حالما نقوم بإستلامها. على سبيل المثال، نحن نقوم بتخزين معلوماتك الشخصية على أنظمة كمبيوتر ذات وصول محدود للمصرح لهم بالإطلاع على هذه المعلومات .\r\n\r\n* خصوصية حسابك:\r\nأنت مسؤول عن الحفاظ على سرية بيانات حسابك وكلمة المرور وتحديد من يصل إلى جهاز الكمبيوتر الخاص بك أو التطبيق الخاص بنا ، كما أنك توافق على قبول المسؤولية عن جميع الأنشطة التي تتم من خلال حسابك أو كلمة المرور الخاصة بك.\r\nإذا كان عمرك أقل من 18 سنة، فلا يجوز لك استخدام خدمات تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية إلا بإشراك أحد الوالدين أو ولي الأمر.\r\nيحتفظ  تطبيق الوطنية الزراعية بالحق في رفض تقديم الخدمة، أو إنهاء الحسابات، أو إزالة أو تعديل المحتوى، أو إلغاء الأوامر وفقا لتقديرها الخاص.', 'en'),
(21, 14, 'refund policy (arabic)', '* سياسية استبدال وإرجاع السلع:\r\nيتم إرجاع جميع المنتجات  خلال مدة لا تتجاوز 3 أيام من إستلام الطلب،  وحفاظاً على جودة المنتج وصلاحية الحفظ فإنه لا يمكن إرجاعها بعد ذلك مالم يكن هناك مشكلة أو عيب في المنتج. \r\nفي حال حدوث عيب أو خطاْ تصنيعي للمنتج فإنه يتم إرجاعه بعد الإبلاغ عن ذلك.\r\n\r\n:\r\n\r\nلن يتم استرجاع أو استبدال أي من المنتجات التالية بعد شرائها، وهي كالآتي:\r\n•	البضائع المبردة والمثلجة.\r\n•	منتجات الألبان الطازجة.\r\n•	منتجات المعجنات.\r\n•	الخضروات والفاكهة.\r\n•	المنتجات مفتوحة التغليف، منزوعة الأختام، تالفة أو متضررة، مستخدمة جزئيا ً.\r\n\r\n\r\n* فيما يخص الحالات التي لا يتم إعادة المنتجات بها: \r\n\r\nعند تقديم طلب الإرجاع بعد الوقت المحدد، وهو 3 أيام من تاريخ الإستلام بخصوص المنتجات \r\nعند إستخدام المنتج، أو عند تلفه، أو عندما لا يكون في نفس الحالة التي قمت بإستلامها به أو عند إزالة لاصق الأمان للمنتج.\r\nمنتجات مستهلك تم استخدامها أو تثبيتها.\r\nمنتجات تم العبث أو إزالة أرقامها التسلسلية.\r\nمنتجات بدون بطاقات الأسعار، أو ملصقات، أو الغلاف الأصلي، أو نقص أي من الإكسسوارات الخاصة بها.\r\n\r\nكيف يمكنني إستعادة أموالي التي دفعتها, في حال وصلتني سلعة ليست كالشكل الصحيح أو متضررة؟\r\n\r\nعندما تصلك السلعة في حالة متضررة او غير مماثله لما تم اختياره من تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية ، يمكنك عندها إعادة السلعة إلينا بنفس حالتها التي إستلمتها بها وبنفس تغليفها الأصلي وقت استلامها وذلك خلال مدة 3 أيام من تاريخ الإستلام . حالما نقوم بإستلام السلعة، سنقوم بفحصها، وإذا تبين وجود عيب أو ضرر فيها، فإننا سنبدأ على الفور بإجراءات إعادة أموالك إليك، سواء تلك التي دفعتها ثمناً للسلعة أم تلك المدفوعة لشحن تلك السلعة وتوصيلها إليك .', 'ar'),
(22, 14, 'refund policy (english)', '* سياسية استبدال وإرجاع السلع:\r\nيتم إرجاع جميع المنتجات  خلال مدة لا تتجاوز 3 أيام من إستلام الطلب،  وحفاظاً على جودة المنتج وصلاحية الحفظ فإنه لا يمكن إرجاعها بعد ذلك مالم يكن هناك مشكلة أو عيب في المنتج. \r\nفي حال حدوث عيب أو خطاْ تصنيعي للمنتج فإنه يتم إرجاعه بعد الإبلاغ عن ذلك.\r\n\r\n:\r\n\r\nلن يتم استرجاع أو استبدال أي من المنتجات التالية بعد شرائها، وهي كالآتي:\r\n•	البضائع المبردة والمثلجة.\r\n•	منتجات الألبان الطازجة.\r\n•	منتجات المعجنات.\r\n•	الخضروات والفاكهة.\r\n•	المنتجات مفتوحة التغليف، منزوعة الأختام، تالفة أو متضررة، مستخدمة جزئيا ً.\r\n\r\n\r\n* فيما يخص الحالات التي لا يتم إعادة المنتجات بها: \r\n\r\nعند تقديم طلب الإرجاع بعد الوقت المحدد، وهو 3 أيام من تاريخ الإستلام بخصوص المنتجات \r\nعند إستخدام المنتج، أو عند تلفه، أو عندما لا يكون في نفس الحالة التي قمت بإستلامها به أو عند إزالة لاصق الأمان للمنتج.\r\nمنتجات مستهلك تم استخدامها أو تثبيتها.\r\nمنتجات تم العبث أو إزالة أرقامها التسلسلية.\r\nمنتجات بدون بطاقات الأسعار، أو ملصقات، أو الغلاف الأصلي، أو نقص أي من الإكسسوارات الخاصة بها.\r\n\r\nكيف يمكنني إستعادة أموالي التي دفعتها, في حال وصلتني سلعة ليست كالشكل الصحيح أو متضررة؟\r\n\r\nعندما تصلك السلعة في حالة متضررة او غير مماثله لما تم اختياره من تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية ، يمكنك عندها إعادة السلعة إلينا بنفس حالتها التي إستلمتها بها وبنفس تغليفها الأصلي وقت استلامها وذلك خلال مدة 3 أيام من تاريخ الإستلام . حالما نقوم بإستلام السلعة، سنقوم بفحصها، وإذا تبين وجود عيب أو ضرر فيها، فإننا سنبدأ على الفور بإجراءات إعادة أموالك إليك، سواء تلك التي دفعتها ثمناً للسلعة أم تلك المدفوعة لشحن تلك السلعة وتوصيلها إليك .', 'en'),
(23, 15, 'shipping policy (arabic)', '* سياسة التوصيل: \r\nعندما يتم التوصيل سيطلب منك توقيعك إلكترونياً أو توقيعك على نسخة الفاتورة وهذا التوقيع يكون بمثابة تأكيد أنك إستلمت المنتجات كاملة كما هو مبين في الفاتورة، كما يدل هذا التوقيع على ان الاستلام للسلعة انها سليمة ،خالية من جميع العيوب\r\n\r\nإن لم تكن متواجد في العنوان المحدد سنقوم بتسليم الطلب لأى شخص متواجد بهذا العنوان وتوقيعه على الفاتورة إلكترونياً أوعلى نسخة الفاتوره ، وعند توقيع أى شخص من الموجودين فى العنوان على طلب التوصيل يعتبر أن العميل قد استلم الأغراض الموجوده بالفاتورة.\r\nإذا تم الوصول الى العنوان المحدد من قبلك ولم نستطيع تسليم الطلب يرجى الإتصال بخدمة العملاء لتحديد موعد آخر لتوصيل الطلب. وسوف تكون الشركة غير مسؤولة عن أيه طلب لم يتم توصيله خلال 30 يوم من تاريخ الطلب. \r\n \r\n يجب التنويه على ضرورة الرد على المكالمات الواردة إلى جوالك حتى يتمكن المندوب المسؤول عن التوصيل من التنسيق معك على موعد إيصال الطلب. \r\nتخضع عملية البيع في تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية وعمليات شرائك واستخدامك للمنتجات المتوفرة في هذا الموقع إلى أحكام وشروط الاستخدام والخدمة :\r\n\r\nيجوز لـ  تطبيق( نخيل الوطنية) التابع لشركة الوطنية الزراعية ، أن تختار قبول أو عدم قبول أو إلغاء طلبيتك في بعض الحالات و على سبيل المثال ان كان المنتج الذي ترغب بشرائه غير متوفر أو في حال تم تسعير المنتج بطريقة خاطئة أو في حال تبين ان الطلبية احتيالية , سوف يقوم تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية بإعادة ماقمت بدفعه للطلبيات التي لم يتم قبولها أو التي يتم إلغاؤها.\r\n.\r\nعند الشراء او ارسال بريد الإلكتروني من خلال تطبيق الوطنية الزراعية أنت توافق على استلام  أي إيميلات أو أي إشعارات بخصوص هذا الطلب.\r\nيحتفظ تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية لنفسه بالحق بأن يجري أية تعديلات أو تغييرات على موقعه وعلى السياسات والإتفاقيات المرتبطة به بما في ذلك سياسة الخصوصية وكذلك الوثيقة لأحكام وشروط الخدمة وشروط الإستبدال و الإسترجاع.', 'ar'),
(24, 15, 'shipping policy (english)', '* سياسة التوصيل: \r\nعندما يتم التوصيل سيطلب منك توقيعك إلكترونياً أو توقيعك على نسخة الفاتورة وهذا التوقيع يكون بمثابة تأكيد أنك إستلمت المنتجات كاملة كما هو مبين في الفاتورة، كما يدل هذا التوقيع على ان الاستلام للسلعة انها سليمة ،خالية من جميع العيوب\r\n\r\nإن لم تكن متواجد في العنوان المحدد سنقوم بتسليم الطلب لأى شخص متواجد بهذا العنوان وتوقيعه على الفاتورة إلكترونياً أوعلى نسخة الفاتوره ، وعند توقيع أى شخص من الموجودين فى العنوان على طلب التوصيل يعتبر أن العميل قد استلم الأغراض الموجوده بالفاتورة.\r\nإذا تم الوصول الى العنوان المحدد من قبلك ولم نستطيع تسليم الطلب يرجى الإتصال بخدمة العملاء لتحديد موعد آخر لتوصيل الطلب. وسوف تكون الشركة غير مسؤولة عن أيه طلب لم يتم توصيله خلال 30 يوم من تاريخ الطلب. \r\n \r\n يجب التنويه على ضرورة الرد على المكالمات الواردة إلى جوالك حتى يتمكن المندوب المسؤول عن التوصيل من التنسيق معك على موعد إيصال الطلب. \r\nتخضع عملية البيع في تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية وعمليات شرائك واستخدامك للمنتجات المتوفرة في هذا الموقع إلى أحكام وشروط الاستخدام والخدمة :\r\n\r\nيجوز لـ  تطبيق( نخيل الوطنية) التابع لشركة الوطنية الزراعية ، أن تختار قبول أو عدم قبول أو إلغاء طلبيتك في بعض الحالات و على سبيل المثال ان كان المنتج الذي ترغب بشرائه غير متوفر أو في حال تم تسعير المنتج بطريقة خاطئة أو في حال تبين ان الطلبية احتيالية , سوف يقوم تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية بإعادة ماقمت بدفعه للطلبيات التي لم يتم قبولها أو التي يتم إلغاؤها.\r\n.\r\nعند الشراء او ارسال بريد الإلكتروني من خلال تطبيق الوطنية الزراعية أنت توافق على استلام  أي إيميلات أو أي إشعارات بخصوص هذا الطلب.\r\nيحتفظ تطبيق ( نخيل الوطنية) التابع لشركة الوطنية الزراعية لنفسه بالحق بأن يجري أية تعديلات أو تغييرات على موقعه وعلى السياسات والإتفاقيات المرتبطة به بما في ذلك سياسة الخصوصية وكذلك الوثيقة لأحكام وشروط الخدمة وشروط الإستبدال و الإسترجاع.', 'en'),
(25, 16, 'عن االبنك', 'هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.', 'ar'),
(26, 16, 'about bank', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `value` double NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `date_from`, `date_to`, `created_at`, `updated_at`) VALUES
(1, '123', 'percentage', 20, '2020-08-08', '2020-08-31', '2020-08-08 15:35:54', '0000-00-00 00:00:00'),
(2, '1234', 'percentage', 50, '2020-08-14', '2020-09-25', '2020-09-07 20:19:08', '2020-09-07 18:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL COMMENT '1:value-2:percentage',
  `value` double(8,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `type`, `value`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 10.00, 7, '2020-07-31 00:56:03', '2020-07-31 00:56:03'),
(2, 1, 0.00, 8, '2020-08-04 18:44:26', '2020-08-04 18:44:26'),
(14, 1, 20.00, 13, '2020-08-13 18:38:10', '2020-08-13 18:38:10'),
(29, 2, 10.00, 9, '2020-08-15 16:16:58', '2020-08-15 16:16:58'),
(40, 1, 4.00, 10, '2020-08-26 19:01:53', '2020-08-26 19:01:53'),
(64, 1, 0.00, 11, '2020-09-07 20:06:40', '2020-09-07 20:06:40'),
(68, 1, 0.00, 12, '2020-09-08 15:26:51', '2020-09-08 15:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_addresses`
--

CREATE TABLE `favorite_addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorite_addresses`
--

INSERT INTO `favorite_addresses` (`id`, `user_id`, `address_id`, `created_at`, `updated_at`) VALUES
(15, 4, 8, '2020-08-13 04:46:53', '2020-08-13 02:45:00'),
(18, 13, 14, '2020-08-14 13:47:53', '2020-08-14 13:47:53'),
(21, 30, 19, '2020-08-15 18:50:50', '2020-08-15 18:50:50'),
(35, 6, 17, '2020-09-11 11:46:14', '2020-09-11 11:46:14'),
(37, 14, 21, '2020-09-21 16:25:59', '2020-09-21 16:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE `measurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL),
(2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `measurement_translations`
--

CREATE TABLE `measurement_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `measurement_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `measurement_translations`
--

INSERT INTO `measurement_translations` (`id`, `measurement_id`, `name`, `locale`) VALUES
(1, 1, 'جرام', 'ar'),
(2, 1, 'gram', 'en'),
(3, 2, 'كيلو جرام', 'ar'),
(4, 2, 'kilogram', 'en');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_07_24_072929_create_permission_tables', 1),
(4, '2020_07_24_154235_create_cities_table', 1),
(5, '2020_07_24_154247_create_zones_table', 1),
(6, '2020_07_24_154923_create_user_addresses_table', 1),
(7, '2020_07_24_155719_create_config_categories_table', 1),
(8, '2020_07_24_155727_create_configs_table', 1),
(9, '2020_07_24_160754_create_categories_table', 1),
(10, '2020_07_24_161337_create_measurements_table', 1),
(11, '2020_07_24_161534_create_products_table', 1),
(12, '2020_06_28_181426_create_admins_table', 2),
(13, '2020_07_30_201552_create_categories_table', 3),
(14, '2020_07_31_020742_create_discounts_table', 3),
(15, '2020_08_13_062246_create_order_status_types_table', 4),
(16, '2020_08_13_062258_create_order_statuses_table', 4),
(17, '2020_08_13_143633_add_status_columns_to_orders_table', 5),
(18, '2020_08_13_144208_create_order_histories_table', 6),
(19, '2020_08_21_213428_add_shipping_amount_column_to_cities_table', 7),
(20, '2020_08_22_162700_add_columns_to_orders_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'Modules\\AdminModule\\Entities\\Admin', 1),
(2, 'Modules\\AdminModule\\Entities\\Admin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `product_id`, `order_id`, `user_id`, `title`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, NULL, 6, 'تمور مشكلة فاخرة جديد', 'هذا المنتج متوفر لدينا الان ف المتجر', 1, '2020-08-26 19:00:55', '2020-08-26 19:00:55'),
(2, NULL, 43, 3, 'طلبك رقم 43', 'منتهي', 1, '2020-08-26 19:02:58', '2020-08-26 19:02:58'),
(3, NULL, 41, 14, 'طلبك رقم 41', 'منتهي', 1, '2020-08-26 19:05:49', '2020-08-26 19:05:49'),
(4, NULL, 47, 6, 'طلبك رقم 47', 'منتهي', 1, '2020-08-26 19:09:56', '2020-08-26 19:09:56'),
(5, NULL, 49, 6, 'طلبك رقم 49', 'منتهي', 1, '2020-08-26 19:39:08', '2020-08-26 19:39:08'),
(6, NULL, 24, 14, 'طلبك رقم 24', 'ملغي', 1, '2020-09-07 11:17:25', '2020-09-07 11:17:25'),
(7, NULL, 25, 6, 'طلبك رقم 25', 'منتهي', 1, '2020-09-07 11:31:10', '2020-09-07 11:31:10'),
(8, 12, NULL, 6, 'تمور مشكلة فاخرة', 'هذا المنتج متوفر لدينا الان ف المتجر', 1, '2020-09-07 17:05:30', '2020-09-07 17:05:48'),
(9, 12, NULL, 6, 'تمور مشكلة فاخرة', 'هذا المنتج متوفر لدينا الان ف المتجر', 1, '2020-09-07 17:26:44', '2020-09-07 17:27:02'),
(10, 12, NULL, 6, 'تمور مشكلة فاخرة', 'هذا المنتج متوفر لدينا الان ف المتجر', 1, '2020-09-07 17:34:44', '2020-09-07 20:04:58'),
(11, NULL, 50, 6, 'طلبك رقم 50', 'ملغي', 1, '2020-09-07 17:48:17', '2020-09-07 17:48:17'),
(12, 11, NULL, 6, 'أجود أنواع التمور الفاخرة', 'هذا المنتج متوفر لدينا الان ف المتجر', 1, '2020-09-07 20:05:56', '2020-09-07 20:06:41'),
(13, 12, NULL, 14, 'تمور مشكلة فاخرة', 'هذا المنتج متوفر لدينا الان ف المتجر', 1, '2020-09-08 15:24:23', '2020-09-08 15:24:54'),
(14, NULL, 57, 6, 'طلبك رقم 57', 'ملغي', 1, '2020-09-08 16:18:51', '2020-09-08 16:18:51'),
(15, 12, NULL, 6, 'تمور مشكلة فاخرة', 'هذا المنتج متوفر لدينا الان ف المتجر', 0, '2020-09-11 10:51:21', '2020-09-11 10:51:21'),
(16, 12, NULL, 14, 'تمور مشكلة فاخرة', 'هذا المنتج متوفر لدينا الان ف المتجر', 0, '2020-09-11 15:58:51', '2020-09-11 15:58:51'),
(17, 11, NULL, 14, 'أجود أنواع التمور الفاخرة', 'هذا المنتج متوفر لدينا الان ف المتجر', 0, '2020-09-21 07:11:37', '2020-09-21 07:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `price`, `image`, `date_from`, `date_to`, `created_at`, `updated_at`) VALUES
(2, 203.00, '1597264059Image18.png', '2020-08-05', '2020-08-10', '2020-08-04 20:06:26', '2020-08-12 18:27:39'),
(3, 33.00, '1597264070EZ1ckamWsAAF652.png', '2020-08-05', '2020-08-12', '2020-08-04 20:36:57', '2020-08-12 18:27:50'),
(4, 30.00, '1597264081Image19.png', '2020-08-05', '2020-08-27', '2020-08-04 20:37:27', '2020-08-12 18:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `offer_products`
--

CREATE TABLE `offer_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_products`
--

INSERT INTO `offer_products` (`id`, `offer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(11, 2, 9, '2020-08-12 18:27:39', '2020-08-12 18:27:39'),
(12, 3, 9, '2020-08-12 18:27:50', '2020-08-12 18:27:50'),
(13, 3, 10, '2020-08-12 18:27:50', '2020-08-12 18:27:50'),
(14, 3, 11, '2020-08-12 18:27:50', '2020-08-12 18:27:50'),
(15, 4, 11, '2020-08-12 18:28:01', '2020-08-12 18:28:01'),
(16, 4, 12, '2020-08-12 18:28:01', '2020-08-12 18:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `offer_translations`
--

CREATE TABLE `offer_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_translations`
--

INSERT INTO `offer_translations` (`id`, `offer_id`, `name`, `description`, `locale`) VALUES
(3, 2, 'أجود أنواع التمور الفاخرة', 'اطلب زكاة الفطر عبر مركز الاحسان الخيري', 'ar'),
(4, 2, 'أجود أنواع التمور الفاخرة', 'اطلب زكاة الفطر عبر مركز الاحسان الخيري', 'en'),
(5, 3, 'أجود أنواع التمور الفاخرة', 'أجود أنواع التمور الفاخرة', 'ar'),
(6, 3, 'أجود أنواع التمور الفاخرة', 'أجود أنواع التمور الفاخرة', 'en'),
(7, 4, 'أجود أنواع التمور الفاخرة', 'أجود أنواع التمور الفاخرة', 'ar'),
(8, 4, 'أجود أنواع التمور الفاخرة', 'أجود أنواع التمور الفاخرة', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `orderproducts`
--

CREATE TABLE `orderproducts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `vat` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderproducts`
--

INSERT INTO `orderproducts` (`id`, `product_id`, `order_id`, `quantity`, `price`, `discount`, `vat`, `created_at`, `updated_at`) VALUES
(26, 9, 24, 1, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-15 16:18:57'),
(27, 9, 25, 1, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-15 16:32:02'),
(29, 9, 27, 3, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-15 17:16:52'),
(30, 9, 28, 2, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-15 17:49:31'),
(31, 9, 29, 2, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-15 18:01:53'),
(32, 9, 30, 2, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-15 18:04:28'),
(33, 9, 31, 2, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-15 18:08:45'),
(34, 9, 32, 2, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-15 18:09:23'),
(35, 9, 33, 3, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-15 18:19:57'),
(36, 9, 34, 1, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-15 18:23:58'),
(37, 10, 34, 3, 10, 0.4, 0, '2020-09-08 19:10:58', '2020-08-15 18:23:58'),
(38, 10, 35, 1, 10, 0.4, 0, '2020-09-08 19:10:58', '2020-08-15 18:50:57'),
(39, 10, 36, 1, 10, 4, 0, '2020-09-08 19:10:58', '2020-08-15 18:55:44'),
(40, 9, 37, 3, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-15 19:07:46'),
(41, 10, 37, 2, 10, 4, 0, '2020-09-08 19:10:58', '2020-08-15 19:07:46'),
(42, 9, 38, 2, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-15 19:13:53'),
(43, 10, 39, 4, 10, 4, 0, '2020-09-08 19:10:58', '2020-08-16 12:21:07'),
(44, 9, 40, 3, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-16 19:18:43'),
(45, 10, 40, 5, 10, 4, 0, '2020-09-08 19:10:58', '2020-08-16 19:18:43'),
(46, 9, 41, 1, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-16 19:20:43'),
(47, 9, 42, 1, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-21 10:54:04'),
(48, 10, 42, 1, 10, 4, 0, '2020-09-08 19:10:58', '2020-08-21 10:54:04'),
(49, 9, 43, 1, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-22 14:34:48'),
(50, 9, 44, 2, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-22 21:07:36'),
(51, 9, 45, 1, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-24 18:51:48'),
(52, 9, 46, 1, 30, 3, 0, '2020-09-08 19:10:58', '2020-08-24 19:04:26'),
(53, 10, 47, 1, 10, 4, 0, '2020-09-08 19:10:58', '2020-08-26 19:08:30'),
(54, 10, 48, 1, 10, 4, 0, '2020-09-08 19:10:58', '2020-08-26 19:09:47'),
(55, 10, 49, 1, 10, 4, 0, '2020-09-08 19:10:58', '2020-08-26 19:35:19'),
(56, 11, 50, 1, 28, 0, 0, '2020-09-08 19:10:58', '2020-09-07 17:46:59'),
(57, 11, 51, 3, 28, 0, 0, '2020-09-08 19:10:58', '2020-09-07 18:10:10'),
(58, 12, 51, 1, 10, 0, 0, '2020-09-08 19:10:58', '2020-09-07 18:10:10'),
(59, 11, 52, 1, 28, 0, 0, '2020-09-08 19:10:58', '2020-09-07 18:24:23'),
(60, 11, 53, 1, 28, 0, 0, '2020-09-08 19:10:58', '2020-09-07 18:57:39'),
(61, 11, 54, 1, 28, 0, 0, '2020-09-08 19:10:58', '2020-09-07 19:03:46'),
(62, 11, 55, 1, 28, 0, 0, '2020-09-08 19:10:58', '2020-09-07 19:19:33'),
(63, 11, 56, 1, 28, 0, 0, '2020-09-08 19:10:58', '2020-09-07 19:20:42'),
(64, 11, 57, 2, 28, 0, 0, '2020-09-08 19:10:58', '2020-09-07 19:40:21'),
(65, 11, 58, 1, 28, 0, 4.2, '2020-09-08 19:12:35', '2020-09-08 16:26:46'),
(66, 10, 59, 1, 10, 4, NULL, '2020-09-09 06:42:05', '2020-09-09 06:42:05'),
(67, 9, 60, 1, 30, 3, NULL, '2020-09-09 06:42:28', '2020-09-09 06:42:28'),
(68, 9, 61, 1, 30, 3, NULL, '2020-09-09 06:42:48', '2020-09-09 06:42:48'),
(69, 10, 62, 2, 10, 4, NULL, '2020-09-11 15:58:26', '2020-09-11 15:58:26'),
(70, 9, 63, 2, 30, 3, NULL, '2020-09-21 07:11:53', '2020-09-21 07:11:53'),
(71, 10, 63, 2, 10, 4, NULL, '2020-09-21 07:11:53', '2020-09-21 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subTotal` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `address_id` int(11) NOT NULL,
  `payment` varchar(250) NOT NULL,
  `coupon` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_status_type_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `order_status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `city` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `street_description` varchar(255) DEFAULT NULL,
  `shipping` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subTotal`, `discount`, `total`, `address_id`, `payment`, `coupon`, `created_at`, `updated_at`, `order_status_type_id`, `order_status_id`, `city`, `street`, `street_description`, `shipping`) VALUES
(24, 14, 27, 5.4, 21.6, 19, 'الدفع عند الاستلام', '123', '2020-08-15 16:18:57', '2020-09-07 11:17:25', 3, 3, NULL, NULL, NULL, NULL),
(25, 6, 27, 0, 27, 17, 'الدفع عند الاستلام', NULL, '2020-08-15 16:32:02', '2020-09-07 11:31:10', 2, 7, NULL, NULL, NULL, NULL),
(27, 6, 21, 0, 21, 17, 'الدفع عند الاستلام', NULL, '2020-08-15 17:16:52', '2020-08-15 17:16:52', 1, 1, NULL, NULL, NULL, NULL),
(28, 4, 24, 4.8, 19.2, 1, 'الدقع عند الاستلام', '123', '2020-08-15 17:49:31', '2020-08-15 17:49:31', 1, 1, NULL, NULL, NULL, NULL),
(29, 4, 57, 11.4, 45.6, 1, 'الدقع عند الاستلام', '123', '2020-08-15 18:01:53', '2020-08-15 18:01:53', 1, 1, NULL, NULL, NULL, NULL),
(30, 6, 57, 0, 57, 17, 'الدفع عند الاستلام', NULL, '2020-08-15 18:04:28', '2020-08-15 18:04:28', 1, 1, NULL, NULL, NULL, NULL),
(31, 6, 54, 0, 54, 17, 'الدفع عند الاستلام', NULL, '2020-08-15 18:08:45', '2020-08-15 18:08:45', 1, 1, NULL, NULL, NULL, NULL),
(32, 6, 54, 10.8, 43.2, 17, 'الدفع عند الاستلام', '123', '2020-08-15 18:09:23', '2020-08-15 18:09:23', 1, 1, NULL, NULL, NULL, NULL),
(33, 14, 81, 0, 81, 18, 'الدفع عند الاستلام', NULL, '2020-08-15 18:19:57', '2020-08-15 18:19:57', 1, 1, NULL, NULL, NULL, NULL),
(34, 14, 55.8, 0, 55.8, 18, 'الدفع عند الاستلام', NULL, '2020-08-15 18:23:58', '2020-08-15 18:23:58', 1, 1, NULL, NULL, NULL, NULL),
(35, 30, 9.6, 0, 9.6, 19, 'الدفع عند الاستلام', NULL, '2020-08-15 18:50:57', '2020-08-15 18:50:57', 1, 1, NULL, NULL, NULL, NULL),
(36, 30, 6, 0, 6, 19, 'الدفع عند الاستلام', NULL, '2020-08-15 18:55:44', '2020-08-15 18:55:44', 1, 1, NULL, NULL, NULL, NULL),
(37, 14, 93, 0, 93, 18, 'الدفع عند الاستلام', NULL, '2020-08-15 19:07:46', '2020-08-15 19:07:46', 1, 1, NULL, NULL, NULL, NULL),
(38, 14, 54, 0, 54, 18, 'الدفع عند الاستلام', NULL, '2020-08-15 19:13:53', '2020-08-15 19:13:53', 1, 1, NULL, NULL, NULL, NULL),
(39, 14, 24, 0, 24, 20, 'الدفع عند الاستلام', NULL, '2020-08-16 12:21:07', '2020-08-16 12:21:07', 1, 1, NULL, NULL, NULL, NULL),
(40, 14, 111, 22.2, 88.8, 21, 'الدفع عند الاستلام', '123', '2020-08-16 19:18:43', '2020-08-16 19:18:43', 1, 1, NULL, NULL, NULL, NULL),
(41, 14, 27, 5.4, 21.6, 21, 'الدفع عند الاستلام', '123', '2020-08-16 19:20:43', '2020-08-26 19:05:49', 2, 7, NULL, NULL, NULL, NULL),
(42, 6, 33, 0, 33, 17, 'الدفع عند الاستلام', NULL, '2020-08-21 10:54:04', '2020-08-24 19:13:50', 2, 7, NULL, NULL, NULL, NULL),
(43, 3, 27, 5.4, 21.6, 1, 'الدقع عند الاستلام', '123', '2020-08-22 14:34:48', '2020-08-26 19:02:58', 2, 7, 'maka', 'mooaa', 'dasdsad', NULL),
(44, 6, 54, 0, 54, 17, 'الدفع عند الاستلام', NULL, '2020-08-22 21:07:36', '2020-08-24 19:15:48', 3, 3, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(45, 6, 27, 0, 27, 17, 'الدفع عند الاستلام', NULL, '2020-08-24 18:51:48', '2020-08-24 19:12:12', 2, 7, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(46, 6, 27, 0, 27, 17, 'الدفع عند الاستلام', NULL, '2020-08-24 19:04:26', '2020-08-24 19:11:23', 2, 7, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(47, 6, 6, 0, 6, 17, 'الدفع عند الاستلام', NULL, '2020-08-26 19:08:30', '2020-08-26 19:09:56', 2, 7, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(48, 6, 6, 0, 6, 17, 'الدفع عند الاستلام', NULL, '2020-08-26 19:09:47', '2020-08-26 19:09:47', 1, 1, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(49, 6, 6, 0, 6, 17, 'الدفع عند الاستلام', NULL, '2020-08-26 19:35:19', '2020-08-26 19:39:08', 2, 7, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(50, 6, 28, 0, 28, 17, 'الدفع عند الاستلام', NULL, '2020-09-07 17:46:59', '2020-09-07 17:48:17', 3, 3, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(51, 6, 94, 0, 94, 17, 'بطاقة ائتمانية', NULL, '2020-09-07 18:10:10', '2020-09-07 18:10:10', 1, 1, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(52, 6, 28, 14, 14, 17, 'بطاقة ائتمانية', '1234', '2020-09-07 18:24:23', '2020-09-07 18:24:23', 1, 1, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(53, 6, 28, 0, 58, 17, 'بطاقة ائتمانية', NULL, '2020-09-07 18:57:39', '2020-09-07 18:57:39', 1, 1, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(54, 6, 28, 0, 58, 17, 'بطاقة ائتمانية', NULL, '2020-09-07 19:03:46', '2020-09-07 19:03:46', 1, 1, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(55, 6, 28, 0, 58, 17, 'بطاقة ائتمانية', NULL, '2020-09-07 19:19:33', '2020-09-07 19:19:33', 1, 1, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(56, 6, 28, 0, 58, 17, 'بطاقة ائتمانية', NULL, '2020-09-07 19:20:42', '2020-09-07 19:20:42', 1, 1, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(57, 6, 64.4, 0, 94.4, 17, 'بطاقة ائتمانية', NULL, '2020-09-07 19:40:21', '2020-09-08 16:18:51', 3, 3, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', NULL),
(58, 6, 32.2, 0, 62.2, 17, 'بطاقة ائتمانية', NULL, '2020-09-08 16:26:46', '2020-09-08 16:26:46', 1, 1, 'مكه المكرمه', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 30),
(59, 14, 7.5, 3.75, 3.75, 22, 'الدفع عند الاستلام', '1234', '2020-09-09 06:42:05', '2020-09-09 06:42:05', 1, 1, 'جده', '8278 المدينة المنورة، المدينة الصناعية بعسير، خميس مشيط 62455 2974، السعودية', '8278 المدينة المنورة، المدينة الصناعية بعسير، خميس مشيط 62455 2974، السعودية', 0),
(60, 14, 31.5, 15.75, 15.75, 22, 'الدفع عند الاستلام', '1234', '2020-09-09 06:42:28', '2020-09-09 06:42:28', 1, 1, 'جده', '8278 المدينة المنورة، المدينة الصناعية بعسير، خميس مشيط 62455 2974، السعودية', '8278 المدينة المنورة، المدينة الصناعية بعسير، خميس مشيط 62455 2974، السعودية', 0),
(61, 14, 31.5, 15.75, 15.75, 22, 'الدفع عند الاستلام', '1234', '2020-09-09 06:42:48', '2020-09-09 06:42:48', 1, 1, 'جده', '8278 المدينة المنورة، المدينة الصناعية بعسير، خميس مشيط 62455 2974، السعودية', '8278 المدينة المنورة، المدينة الصناعية بعسير، خميس مشيط 62455 2974، السعودية', 0),
(62, 14, 15, 0, 15, 22, 'حواله بنكيه', NULL, '2020-09-11 15:58:26', '2020-09-11 15:58:26', 1, 1, 'جده', '8278 المدينة المنورة، المدينة الصناعية بعسير، خميس مشيط 62455 2974، السعودية', '8278 المدينة المنورة، المدينة الصناعية بعسير، خميس مشيط 62455 2974، السعودية', 0),
(63, 14, 78, 0, 78, 22, 'الدفع عند الاستلام', NULL, '2020-09-21 07:11:53', '2020-09-21 07:11:53', 1, 1, 'جده', '8278 المدينة المنورة، المدينة الصناعية بعسير، خميس مشيط 62455 2974، السعودية', '8278 المدينة المنورة، المدينة الصناعية بعسير، خميس مشيط 62455 2974، السعودية', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_histories`
--

CREATE TABLE `order_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_status_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_histories`
--

INSERT INTO `order_histories` (`id`, `order_id`, `order_status_id`, `comment`, `created_at`, `updated_at`) VALUES
(11, 24, 1, 'جديد', '2020-08-15 16:18:57', '2020-08-15 16:18:57'),
(12, 25, 1, 'جديد', '2020-08-15 16:32:02', '2020-08-15 16:32:02'),
(13, 24, 3, NULL, '2020-08-15 17:07:35', '2020-08-15 17:07:35'),
(15, 27, 1, 'جديد', '2020-08-15 17:16:52', '2020-08-15 17:16:52'),
(16, 28, 1, 'جديد', '2020-08-15 17:49:31', '2020-08-15 17:49:31'),
(17, 29, 1, 'جديد', '2020-08-15 18:01:53', '2020-08-15 18:01:53'),
(18, 30, 1, 'جديد', '2020-08-15 18:04:28', '2020-08-15 18:04:28'),
(19, 31, 1, 'جديد', '2020-08-15 18:08:45', '2020-08-15 18:08:45'),
(20, 32, 1, 'جديد', '2020-08-15 18:09:23', '2020-08-15 18:09:23'),
(21, 33, 1, 'جديد', '2020-08-15 18:19:57', '2020-08-15 18:19:57'),
(22, 33, 3, NULL, '2020-08-15 18:21:54', '2020-08-15 18:21:54'),
(23, 34, 1, 'جديد', '2020-08-15 18:23:58', '2020-08-15 18:23:58'),
(24, 35, 1, 'جديد', '2020-08-15 18:50:57', '2020-08-15 18:50:57'),
(25, 36, 1, 'جديد', '2020-08-15 18:55:44', '2020-08-15 18:55:44'),
(26, 36, 7, 'ssas', '2020-08-15 18:57:18', '2020-08-15 18:57:18'),
(27, 37, 1, 'جديد', '2020-08-15 19:07:46', '2020-08-15 19:07:46'),
(28, 28, 7, NULL, '2020-08-15 19:08:24', '2020-08-15 19:08:24'),
(29, 37, 7, NULL, '2020-08-15 19:08:28', '2020-08-15 19:08:28'),
(30, 38, 1, 'جديد', '2020-08-15 19:13:53', '2020-08-15 19:13:53'),
(31, 39, 1, 'جديد', '2020-08-16 12:21:07', '2020-08-16 12:21:07'),
(32, 40, 1, 'جديد', '2020-08-16 19:18:43', '2020-08-16 19:18:43'),
(33, 41, 1, 'جديد', '2020-08-16 19:20:43', '2020-08-16 19:20:43'),
(34, 42, 1, 'جديد', '2020-08-21 10:54:04', '2020-08-21 10:54:04'),
(35, 43, 1, 'جديد', '2020-08-22 14:34:48', '2020-08-22 14:34:48'),
(36, 44, 1, 'جديد', '2020-08-22 21:07:36', '2020-08-22 21:07:36'),
(37, 44, 7, 'سبسشبييسش', '2020-08-24 18:49:13', '2020-08-24 18:49:13'),
(38, 43, 7, 'شسشيسش', '2020-08-24 18:50:51', '2020-08-24 18:50:51'),
(39, 45, 1, 'جديد', '2020-08-24 18:51:48', '2020-08-24 18:51:48'),
(40, 45, 7, 'dasdasdas', '2020-08-24 18:55:27', '2020-08-24 18:55:27'),
(41, 45, 3, NULL, '2020-08-24 18:58:07', '2020-08-24 18:58:07'),
(42, 45, 3, NULL, '2020-08-24 18:59:59', '2020-08-24 18:59:59'),
(43, 45, 3, NULL, '2020-08-24 19:01:08', '2020-08-24 19:01:08'),
(44, 46, 1, 'جديد', '2020-08-24 19:04:26', '2020-08-24 19:04:26'),
(45, 46, 7, NULL, '2020-08-24 19:04:50', '2020-08-24 19:04:50'),
(46, 46, 7, NULL, '2020-08-24 19:06:41', '2020-08-24 19:06:41'),
(47, 46, 7, NULL, '2020-08-24 19:11:23', '2020-08-24 19:11:23'),
(48, 45, 7, NULL, '2020-08-24 19:12:12', '2020-08-24 19:12:12'),
(49, 42, 7, 'يسبيسبيسبسيب', '2020-08-24 19:13:50', '2020-08-24 19:13:50'),
(50, 44, 3, NULL, '2020-08-24 19:15:48', '2020-08-24 19:15:48'),
(51, 43, 7, NULL, '2020-08-26 19:02:58', '2020-08-26 19:02:58'),
(52, 41, 7, NULL, '2020-08-26 19:05:49', '2020-08-26 19:05:49'),
(53, 47, 1, 'جديد', '2020-08-26 19:08:30', '2020-08-26 19:08:30'),
(54, 48, 1, 'جديد', '2020-08-26 19:09:47', '2020-08-26 19:09:47'),
(55, 47, 7, NULL, '2020-08-26 19:09:56', '2020-08-26 19:09:56'),
(56, 49, 1, 'جديد', '2020-08-26 19:35:19', '2020-08-26 19:35:19'),
(57, 49, 7, NULL, '2020-08-26 19:39:08', '2020-08-26 19:39:08'),
(58, 24, 3, NULL, '2020-09-07 11:17:25', '2020-09-07 11:17:25'),
(59, 25, 7, NULL, '2020-09-07 11:31:10', '2020-09-07 11:31:10'),
(60, 50, 1, 'جديد', '2020-09-07 17:46:59', '2020-09-07 17:46:59'),
(61, 50, 3, NULL, '2020-09-07 17:48:17', '2020-09-07 17:48:17'),
(62, 51, 1, 'جديد', '2020-09-07 18:10:10', '2020-09-07 18:10:10'),
(63, 52, 1, 'جديد', '2020-09-07 18:24:23', '2020-09-07 18:24:23'),
(64, 53, 1, 'جديد', '2020-09-07 18:57:39', '2020-09-07 18:57:39'),
(65, 54, 1, 'جديد', '2020-09-07 19:03:46', '2020-09-07 19:03:46'),
(66, 55, 1, 'جديد', '2020-09-07 19:19:33', '2020-09-07 19:19:33'),
(67, 56, 1, 'جديد', '2020-09-07 19:20:42', '2020-09-07 19:20:42'),
(68, 57, 1, 'جديد', '2020-09-07 19:40:21', '2020-09-07 19:40:21'),
(69, 57, 3, NULL, '2020-09-08 16:18:51', '2020-09-08 16:18:51'),
(70, 58, 1, 'جديد', '2020-09-08 16:26:46', '2020-09-08 16:26:46'),
(71, 59, 1, 'جديد', '2020-09-09 06:42:05', '2020-09-09 06:42:05'),
(72, 60, 1, 'جديد', '2020-09-09 06:42:28', '2020-09-09 06:42:28'),
(73, 61, 1, 'جديد', '2020-09-09 06:42:48', '2020-09-09 06:42:48'),
(74, 62, 1, 'جديد', '2020-09-11 15:58:26', '2020-09-11 15:58:26'),
(75, 63, 1, 'جديد', '2020-09-21 07:11:53', '2020-09-21 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_status_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `order_status_type_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(3, 3, '2020-08-13 12:22:10', '2020-08-15 13:58:44'),
(7, 2, '2020-08-15 13:59:09', '2020-08-15 13:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_status_translations`
--

CREATE TABLE `order_status_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_status_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status_translations`
--

INSERT INTO `order_status_translations` (`id`, `order_status_id`, `name`, `locale`) VALUES
(1, 1, 'جديد', 'ar'),
(2, 1, 'new', 'en'),
(3, 3, 'ملغي', 'ar'),
(4, 3, 'Cancled', 'en'),
(7, 7, 'منتهي', 'ar'),
(8, 7, 'Finshed', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `order_status_types`
--

CREATE TABLE `order_status_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status_types`
--

INSERT INTO `order_status_types` (`id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status_type_translations`
--

CREATE TABLE `order_status_type_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_status_type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status_type_translations`
--

INSERT INTO `order_status_type_translations` (`id`, `order_status_type_id`, `name`, `locale`) VALUES
(1, 1, 'مفتوح', 'ar'),
(2, 1, 'opened', 'en'),
(5, 2, 'منتهى', 'ar'),
(6, 2, 'closed', 'en'),
(7, 3, 'ملغى', 'ar'),
(8, 3, 'canceled', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `title`, `guard_name`, `created_at`, `updated_at`) VALUES
(9, 'show الاقسام', 'الاقسام', 'admin', '2020-09-09 17:09:25', '2020-09-09 17:09:25'),
(10, 'create الاقسام', 'الاقسام', 'admin', '2020-09-09 17:09:25', '2020-09-09 17:09:25'),
(11, 'update الاقسام', 'الاقسام', 'admin', '2020-09-09 17:09:25', '2020-09-09 17:09:25'),
(12, 'delete الاقسام', 'الاقسام', 'admin', '2020-09-09 17:09:26', '2020-09-09 17:09:26'),
(13, 'show التقييمات', 'التقييمات', 'admin', '2020-09-09 17:09:41', '2020-09-09 17:09:41'),
(14, 'create التقييمات', 'التقييمات', 'admin', '2020-09-09 17:09:41', '2020-09-09 17:09:41'),
(15, 'update التقييمات', 'التقييمات', 'admin', '2020-09-09 17:09:42', '2020-09-09 17:09:42'),
(16, 'delete التقييمات', 'التقييمات', 'admin', '2020-09-09 17:09:42', '2020-09-09 17:09:42'),
(17, 'show المنتجات', 'المنتجات', 'admin', '2020-09-09 17:10:08', '2020-09-09 17:10:08'),
(18, 'create المنتجات', 'المنتجات', 'admin', '2020-09-09 17:10:08', '2020-09-09 17:10:08'),
(19, 'update المنتجات', 'المنتجات', 'admin', '2020-09-09 17:10:08', '2020-09-09 17:10:08'),
(20, 'delete المنتجات', 'المنتجات', 'admin', '2020-09-09 17:10:09', '2020-09-09 17:10:09'),
(21, 'show الكوبونات', 'الكوبونات', 'admin', '2020-09-09 17:10:22', '2020-09-09 17:10:22'),
(22, 'create الكوبونات', 'الكوبونات', 'admin', '2020-09-09 17:10:22', '2020-09-09 17:10:22'),
(23, 'update الكوبونات', 'الكوبونات', 'admin', '2020-09-09 17:10:22', '2020-09-09 17:10:22'),
(24, 'delete الكوبونات', 'الكوبونات', 'admin', '2020-09-09 17:10:22', '2020-09-09 17:10:22'),
(25, 'show بيانات الموقع', 'بيانات الموقع', 'admin', '2020-09-09 17:10:40', '2020-09-09 17:10:40'),
(26, 'create بيانات الموقع', 'بيانات الموقع', 'admin', '2020-09-09 17:10:40', '2020-09-09 17:10:40'),
(27, 'update بيانات الموقع', 'بيانات الموقع', 'admin', '2020-09-09 17:10:40', '2020-09-09 17:10:40'),
(28, 'delete بيانات الموقع', 'بيانات الموقع', 'admin', '2020-09-09 17:10:40', '2020-09-09 17:10:40'),
(29, 'show تقييمات التطبيق', 'تقييمات التطبيق', 'admin', '2020-09-09 17:10:52', '2020-09-09 17:10:52'),
(30, 'create تقييمات التطبيق', 'تقييمات التطبيق', 'admin', '2020-09-09 17:10:52', '2020-09-09 17:10:52'),
(31, 'update تقييمات التطبيق', 'تقييمات التطبيق', 'admin', '2020-09-09 17:10:53', '2020-09-09 17:10:53'),
(32, 'delete تقييمات التطبيق', 'تقييمات التطبيق', 'admin', '2020-09-09 17:10:53', '2020-09-09 17:10:53'),
(33, 'show النص الرئيسى', 'النص الرئيسى', 'admin', '2020-09-09 17:11:12', '2020-09-09 17:11:12'),
(34, 'create النص الرئيسى', 'النص الرئيسى', 'admin', '2020-09-09 17:11:12', '2020-09-09 17:11:12'),
(35, 'update النص الرئيسى', 'النص الرئيسى', 'admin', '2020-09-09 17:11:12', '2020-09-09 17:11:12'),
(36, 'delete النص الرئيسى', 'النص الرئيسى', 'admin', '2020-09-09 17:11:12', '2020-09-09 17:11:12'),
(37, 'show العروض', 'العروض', 'admin', '2020-09-09 17:11:34', '2020-09-09 17:11:34'),
(38, 'create العروض', 'العروض', 'admin', '2020-09-09 17:11:34', '2020-09-09 17:11:34'),
(39, 'update العروض', 'العروض', 'admin', '2020-09-09 17:11:35', '2020-09-09 17:11:35'),
(40, 'delete العروض', 'العروض', 'admin', '2020-09-09 17:11:35', '2020-09-09 17:11:35'),
(41, 'show سليدر منتجاتنا', 'سليدر منتجاتنا', 'admin', '2020-09-09 17:11:52', '2020-09-09 17:11:52'),
(42, 'create سليدر منتجاتنا', 'سليدر منتجاتنا', 'admin', '2020-09-09 17:11:52', '2020-09-09 17:11:52'),
(43, 'update سليدر منتجاتنا', 'سليدر منتجاتنا', 'admin', '2020-09-09 17:11:53', '2020-09-09 17:11:53'),
(44, 'delete سليدر منتجاتنا', 'سليدر منتجاتنا', 'admin', '2020-09-09 17:11:53', '2020-09-09 17:11:53'),
(45, 'show سليدر تمور الوطنية', 'سليدر تمور الوطنية', 'admin', '2020-09-09 17:12:13', '2020-09-09 17:12:13'),
(46, 'create سليدر تمور الوطنية', 'سليدر تمور الوطنية', 'admin', '2020-09-09 17:12:13', '2020-09-09 17:12:13'),
(47, 'update سليدر تمور الوطنية', 'سليدر تمور الوطنية', 'admin', '2020-09-09 17:12:13', '2020-09-09 17:12:13'),
(48, 'delete سليدر تمور الوطنية', 'سليدر تمور الوطنية', 'admin', '2020-09-09 17:12:13', '2020-09-09 17:12:13'),
(49, 'show المدن', 'المدن', 'admin', '2020-09-09 17:12:34', '2020-09-09 17:12:34'),
(50, 'create المدن', 'المدن', 'admin', '2020-09-09 17:12:34', '2020-09-09 17:12:34'),
(51, 'update المدن', 'المدن', 'admin', '2020-09-09 17:12:34', '2020-09-09 17:12:34'),
(52, 'delete المدن', 'المدن', 'admin', '2020-09-09 17:12:34', '2020-09-09 17:12:34'),
(53, 'show الطلبات المفتوحة', 'الطلبات المفتوحة', 'admin', '2020-09-09 17:13:06', '2020-09-09 17:13:06'),
(54, 'create الطلبات المفتوحة', 'الطلبات المفتوحة', 'admin', '2020-09-09 17:13:06', '2020-09-09 17:13:06'),
(55, 'update الطلبات المفتوحة', 'الطلبات المفتوحة', 'admin', '2020-09-09 17:13:07', '2020-09-09 17:13:07'),
(56, 'delete الطلبات المفتوحة', 'الطلبات المفتوحة', 'admin', '2020-09-09 17:13:07', '2020-09-09 17:13:07'),
(57, 'show حالات الطلب', 'حالات الطلب', 'admin', '2020-09-09 17:13:18', '2020-09-09 17:13:18'),
(58, 'create حالات الطلب', 'حالات الطلب', 'admin', '2020-09-09 17:13:18', '2020-09-09 17:13:18'),
(59, 'update حالات الطلب', 'حالات الطلب', 'admin', '2020-09-09 17:13:19', '2020-09-09 17:13:19'),
(60, 'delete حالات الطلب', 'حالات الطلب', 'admin', '2020-09-09 17:13:19', '2020-09-09 17:13:19'),
(61, 'show مجموعة المستخدمين', 'مجموعة المستخدمين', 'admin', '2020-09-09 17:14:04', '2020-09-09 17:14:04'),
(62, 'create مجموعة المستخدمين', 'مجموعة المستخدمين', 'admin', '2020-09-09 17:14:04', '2020-09-09 17:14:04'),
(63, 'update مجموعة المستخدمين', 'مجموعة المستخدمين', 'admin', '2020-09-09 17:14:04', '2020-09-09 17:14:04'),
(64, 'delete مجموعة المستخدمين', 'مجموعة المستخدمين', 'admin', '2020-09-09 17:14:04', '2020-09-09 17:14:04'),
(65, 'show admins', 'مسؤولى النظام', 'admin', '2020-09-09 17:14:25', '2020-09-09 17:14:25'),
(66, 'create مسؤولى النظام', 'مسؤولى النظام', 'admin', '2020-09-09 17:14:25', '2020-09-09 17:14:25'),
(67, 'update مسؤولى النظام', 'مسؤولى النظام', 'admin', '2020-09-09 17:14:25', '2020-09-09 17:14:25'),
(68, 'delete مسؤولى النظام', 'مسؤولى النظام', 'admin', '2020-09-09 17:14:26', '2020-09-09 17:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `measurement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 0,
  `price` double(8,2) NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `measurement_id`, `number`, `price`, `quantity`, `image`, `imgs`, `created_at`, `updated_at`) VALUES
(9, 1, 2, 8, 30.00, 59.00, '1597263739DSC_4647copy.png', '1597263739DSC_4647copy.png', '2020-08-04 18:46:36', '2020-09-21 07:11:53'),
(10, 3, 2, 10, 10.00, 7.00, '1597263819DSC_4443copy.png', '1597263819DSC_4443copy.png', '2020-08-04 20:20:38', '2020-09-21 07:11:53'),
(11, 4, 2, 9, 28.00, 0.00, '1597263834DSC_4647copy.png', '1597263834DSC_4443copy.png', '2020-08-04 20:21:47', '2020-09-08 16:26:46'),
(12, 4, 1, 2, 10.00, 0.00, '1597263846DSC_4443copy.png', '1597263846DSC_4647copy.png', '2020-08-04 20:22:40', '2020-09-08 15:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `name`, `description`, `locale`) VALUES
(17, 9, 'تمور مشكلة فاخرة', 'تمور مشكلة فاخرة', 'ar'),
(18, 9, 'Dates are a luxury problem', 'Dates are a luxury problem', 'en'),
(19, 10, 'تمور مشكلة فاخرة جديد', 'تمور مشكلة فاخرة', 'ar'),
(20, 10, 'تمور مشكلة فاخرة', 'تمور مشكلة فاخرة', 'en'),
(21, 11, 'أجود أنواع التمور الفاخرة', 'تمور مشكلة فاخرة', 'ar'),
(22, 11, 'أجود أنواع التمور الفاخرة', 'تمور مشكلة فاخرة', 'en'),
(23, 12, 'تمور مشكلة فاخرة', 'تمور مشكلة فاخرة', 'ar'),
(24, 12, 'تمور مشكلة فاخرة', 'تمور مشكلة فاخرة', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `name_ar`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'الادارة', NULL, 'admin', '2020-09-02 16:12:37', '2020-09-09 17:06:45');

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
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL COMMENT '1:products-2:tmourelkheir',
  `cat_type` int(11) NOT NULL COMMENT '1:categorie-2:products',
  `cat_id` int(11) NOT NULL COMMENT 'categories or products',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `type`, `cat_type`, `cat_id`, `image`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 11, '1597263214سلايدر2الوطنيةللتمور.png', NULL, '2020-08-12 18:13:34'),
(4, 2, 2, 10, '1597263385سلايدر1الوطنيةللتمور.png', NULL, '2020-08-12 18:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `slider_translations`
--

CREATE TABLE `slider_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_translations`
--

INSERT INTO `slider_translations` (`id`, `slider_id`, `name`, `locale`) VALUES
(1, 1, 'slider one', 'ar'),
(2, 1, 'slider one', 'en'),
(3, 2, 'slider 2', 'ar'),
(4, 2, 'ewrew', 'en'),
(5, 3, 'rwerwe', 'ar'),
(6, 3, 'rewrw', 'en'),
(7, 4, 'rewr', 'ar'),
(8, 4, 'dsad', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `texts`
--

INSERT INTO `texts` (`id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `text_translations`
--

CREATE TABLE `text_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `text_translations`
--

INSERT INTO `text_translations` (`id`, `text_id`, `name`, `details`, `locale`) VALUES
(1, 1, 'تمور الخير', 'انبثقت شركة الوطنية الزراعية للنخيل ومنتجاته من شركة الوطنية الزراعية القابضة كوحدة عمل مستقلة، وبفضل الله أصبحت من الشركات الرائدة في هذه المجال، وبذلك حازت على شهادة دائمة من (ISO) وشهادة المنتجات العضوية(CERES)  . كما تتميز معظم منتجات الوطنية الزراعية للنخيل ومنتجاته بحصولها على الشهادة العضوية وشهادة علامة الجودة من الهيئة العربية السعودية للمواصفات والمقاييس (ساسو) مما يؤكد جودة المنتجات المطابقة للمقاييس العالمية والمحلية. كما تولي الوطنية الزراعية للنخيل ومنتجاته عناية فائقة لترشيد الثروة المائية للمملكة العربية السعودية، حيث أنها أوائل الشركات الزراعية التي تطبق نظام الري تحت السطحي بالإضافة الى نظام تحكم مائي يعمل عن بُعد بشكل آلي، وقد حققت انجاز ملموساً في ترشيد المياه ….تنتشر مزارعنا في شمال و وسط وجنوب المملكة على مئات الهكتارات، و تحتوى قرابة  الــ 160,000 نخلة تنتج ما يقارب الخمسة آلاف طن من التمور العضوية لأكثر من خمسة وعشرين صنفاً من التمور منها (سكري، خلاص، ونانة، نبتة علي، رشودية، سباكة، مجدول، خضري، شيشي، دقلة نور، برحي، سلج وغيرها) جميعها حاصلة على أعلى الشهادات المعتمدة في هذا المجال مثل شهادة الآيزو (ISO) وشهادة المنتجات العضوية(CERES)', 'en'),
(2, 1, 'تمور الخير', 'انبثقت شركة الوطنية الزراعية للنخيل ومنتجاته من شركة الوطنية الزراعية القابضة كوحدة عمل مستقلة، وبفضل الله أصبحت من الشركات الرائدة في هذه المجال، وبذلك حازت على شهادة دائمة من (ISO) وشهادة المنتجات العضوية(CERES)  . كما تتميز معظم منتجات الوطنية الزراعية للنخيل ومنتجاته بحصولها على الشهادة العضوية وشهادة علامة الجودة من الهيئة العربية السعودية للمواصفات والمقاييس (ساسو) مما يؤكد جودة المنتجات المطابقة للمقاييس العالمية والمحلية. كما تولي الوطنية الزراعية للنخيل ومنتجاته عناية فائقة لترشيد الثروة المائية للمملكة العربية السعودية، حيث أنها أوائل الشركات الزراعية التي تطبق نظام الري تحت السطحي بالإضافة الى نظام تحكم مائي يعمل عن بُعد بشكل آلي، وقد حققت انجاز ملموساً في ترشيد المياه ….تنتشر مزارعنا في شمال و وسط وجنوب المملكة على مئات الهكتارات، و تحتوى قرابة  الــ 160,000 نخلة تنتج ما يقارب الخمسة آلاف طن من التمور العضوية لأكثر من خمسة وعشرين صنفاً من التمور منها (سكري، خلاص، ونانة، نبتة علي، رشودية، سباكة، مجدول، خضري، شيشي، دقلة نور، برحي، سلج وغيرها) جميعها حاصلة على أعلى الشهادات المعتمدة في هذا المجال مثل شهادة الآيزو (ISO) وشهادة المنتجات العضوية(CERES)', 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `city_id` int(11) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `firebase_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `code`, `password`, `status`, `city_id`, `remember_token`, `created_at`, `updated_at`, `firebase_token`) VALUES
(1, 'ahmed', 'rizk', 'arizk876@gmail.com', '01278454232', NULL, '$2y$10$Z5PQh/P8MRzB6zXyyPXwOOXuHnQfvnVRXx/KXtIn2a8b7wT4s3js2', 1, 1, NULL, NULL, '2020-08-03 14:48:02', NULL),
(3, 'ahmed', 'rizk', 'ahmed@gmail.com', '01014813676', '2131', '$2y$10$inhMc72DUi5K3qV20zA6ieOxQNas3wZpEF0VNCnQrA.FPQORz.BVm', 1, 1, NULL, '2020-07-25 17:55:13', '2020-08-26 18:33:17', NULL),
(4, 'aly', 'meshal', 'aly@gmail.com', '01018725310', NULL, '$2y$10$2LvU.TbJmBfUKJHFxie33.7aNB/vMbWj7AtJ6Nhuj5C0ncWj.llq2', 1, 1, NULL, '2020-07-31 04:49:37', '2020-08-26 18:33:42', NULL),
(5, 'aly', 'meshal', 'aly@gmaila.com', '010187253130', '8920', '$2y$10$HNcy4HGtaLosHw535Ej0bec9a9XS.LApSSHAEr2NGQI/xxew5QNxO', 1, 1, NULL, '2020-08-01 08:38:53', '2020-08-01 08:38:53', NULL),
(6, 'Mahmouds', 'Mohamed', 'sadek@bb.coms', '01020488243', '9786', '$2y$10$lftTr6vXXn/Bxkh0bppKIeLCBBts/3LoevWHxhEAgUCjV56iInQvq', 1, 1, NULL, '2020-08-01 09:18:55', '2020-09-20 18:13:16', 'cL-KsmPtc3E:APA91bHrXHFeR2hpOoyFaKDHYJ_btxSpXkuSqLUa0SD0EWxXRAq_J5dqQWLzLdcodrYLdOfJ7AJGkIWrbmM8W3eE5odEZU5iUhQYUrtXpvhZ5F-v3jxyhDbpjx9MMUq77xlU2cDeZ5gc'),
(7, 'aly', 'meshal', 'aly1@gmail.com', '010187253100', NULL, '$2y$10$KfImSG3TXfxCDENwGYtO2.llJShnik4HvLCMeUs7M6EIzeBIjfKc6', 1, 1, NULL, '2020-08-04 20:10:40', '2020-08-11 18:11:15', NULL),
(8, 'mahmoud', 'sadek', 'sadek@bb.com', '01020488222', NULL, '$2y$10$fLu/crIs9/Yf2f99s8XQH.W/QKlq64FI8qcfgO.Y6fmciHqi6cPqu', 1, 1, NULL, '2020-08-04 20:10:52', '2020-08-04 20:13:44', NULL),
(9, 'mohamed', 'abd  ‎el ‎motall', 'me@gm.com', '05097131363', NULL, '$2y$10$TErYl2v8qsy9LfVRLKsFSuvFabtwKoDNbG5J0vmFFwUNoxQPt1RyK', 1, 1, NULL, '2020-08-04 20:13:13', '2020-08-04 20:28:36', NULL),
(10, 'jaaa', 'ttt', 'm@ga.com', '0502193844', NULL, '$2y$10$4RSqRyqPnR2Rkv9Z3IQfy.rDfKgbury39.AHZ0/FYpJwSVOX6MC9C', 1, 1, NULL, '2020-08-04 21:12:14', '2020-08-04 21:12:25', NULL),
(11, 'mohamed', 'abd ‎el ‎motaal', 'melhamoly@gmail.com', '05097891234', NULL, '$2y$10$ABdGD.AikiliMAqo1HHiuu4eY3SYZwB.p1gMOv/bC.gAz9Bv2BlFq', 1, 1, NULL, '2020-08-04 21:19:32', '2020-08-04 21:22:56', NULL),
(12, 'aly', 'meshal', 'aly21@gmail.com', '555041392', '3103', '$2y$10$15L9hRdik6XC8GDWZb3PhOZYVsR4A46Rz5r8ONHjTJLUVnIBcVW.6', 1, 1, NULL, '2020-08-12 20:06:24', '2020-08-12 20:06:24', NULL),
(13, 'ttt', 'ttt', 'tt@gmail.com', '01097131363', NULL, '$2y$10$ys.7ZDjC.KySQwd0KOMoiOiqJkhbDNi7KtRZb7S/.7rtxKcpoJy1e', 1, 1, NULL, '2020-08-12 20:29:53', '2020-08-15 16:16:12', NULL),
(14, 'wabel', 'zaeem', 'wab@Grindelwald.com', '557149990', NULL, '$2y$10$rabOfWorqJRmI50wC5En.uDO/XGatpRx07i9s4YN2lmkznYAOsSVC', 1, 2, NULL, '2020-08-12 20:49:23', '2020-09-21 17:00:38', 'eH2CAYg8S0FcjNwT5JPD1j:APA91bEPWMob7C90fgc2Y5WLy7Tyy_RQgI-OLSg5lYakqdlI-0HYeac9bsL_1A4w_ZEo1tapcrQN2Vg4rbtY07Ogg3y7OntdxRpWFh0NsPeid7COPo0QDmtfODkpsMvZ33HDqEVBtKJT'),
(15, 'aly', 'meshal', 'elholy@gmail.com', '0557149990', '1428', '$2y$10$M2D..j3ZZiDe2Z5JOBALQ.u1LbK9O6XsqLFTO0z0Q7KjJ7jbfEkcS', 1, 1, NULL, '2020-08-12 20:49:50', '2020-08-12 20:49:50', NULL),
(16, NULL, NULL, NULL, '010014813676', NULL, NULL, 1, 0, NULL, '2020-08-13 19:09:52', '2020-09-07 14:17:40', NULL),
(17, NULL, NULL, NULL, '01020488233', NULL, NULL, 1, 0, NULL, '2020-08-13 19:10:39', '2020-09-06 20:08:43', 'cL-KsmPtc3E:APA91bHrXHFeR2hpOoyFaKDHYJ_btxSpXkuSqLUa0SD0EWxXRAq_J5dqQWLzLdcodrYLdOfJ7AJGkIWrbmM8W3eE5odEZU5iUhQYUrtXpvhZ5F-v3jxyhDbpjx9MMUq77xlU2cDeZ5gc'),
(18, 'yoyo', 'toto', 'mmm', '0109034423', NULL, NULL, 1, 2, NULL, '2020-08-14 07:53:28', '2020-08-14 07:55:55', NULL),
(19, NULL, NULL, NULL, '0109298933', NULL, NULL, 1, 0, NULL, '2020-08-14 09:39:38', '2020-08-14 09:40:08', NULL),
(20, NULL, NULL, NULL, '528372', NULL, NULL, 1, 0, NULL, '2020-08-14 09:41:26', '2020-08-14 09:41:36', NULL),
(21, NULL, NULL, NULL, '22458748925', '3873', NULL, 1, 0, NULL, '2020-08-15 12:28:49', '2020-08-15 12:47:11', NULL),
(22, NULL, NULL, NULL, '5571499900', NULL, NULL, 1, 0, NULL, '2020-08-15 16:18:09', '2020-08-15 16:18:15', NULL),
(23, NULL, NULL, NULL, '549398292', NULL, NULL, 1, 0, NULL, '2020-08-15 18:11:06', '2020-08-15 18:12:42', NULL),
(25, NULL, NULL, NULL, '01020488241', '8687', NULL, 1, 0, NULL, '2020-08-15 18:16:43', '2020-08-15 18:17:38', NULL),
(26, NULL, NULL, NULL, '0100014813676', NULL, NULL, 1, 0, NULL, '2020-08-15 18:24:07', '2020-08-15 18:24:42', NULL),
(27, NULL, NULL, NULL, '554392092', '2453', NULL, 1, 0, NULL, '2020-08-15 18:25:27', '2020-08-15 18:27:30', NULL),
(28, NULL, NULL, NULL, '01020455243', NULL, NULL, 1, 0, NULL, '2020-08-15 18:31:25', '2020-08-15 18:31:44', NULL),
(29, NULL, NULL, NULL, '01020433244', NULL, NULL, 1, 0, NULL, '2020-08-15 18:34:00', '2020-08-15 18:38:11', NULL),
(30, 'sadek', 'sss', 'sadek@ww.co', '01020434543', NULL, NULL, 1, 1, NULL, '2020-08-15 18:41:16', '2020-08-15 18:54:05', NULL),
(31, 'mody', 'elhamoly', 'me@gmail.com', '594390430', NULL, NULL, 1, 2, NULL, '2020-08-15 18:46:05', '2020-08-15 18:48:17', NULL),
(32, NULL, NULL, NULL, '580116615', NULL, NULL, 1, 0, NULL, '2020-08-16 18:50:55', '2020-08-16 18:51:11', NULL),
(33, NULL, NULL, NULL, '530290434', NULL, NULL, 1, 0, NULL, '2020-08-17 07:08:27', '2020-08-17 07:08:37', NULL),
(34, NULL, NULL, NULL, '01020422222', NULL, NULL, 1, 0, NULL, '2020-09-06 20:13:16', '2020-09-06 20:13:33', 'cL-KsmPtc3E:APA91bHrXHFeR2hpOoyFaKDHYJ_btxSpXkuSqLUa0SD0EWxXRAq_J5dqQWLzLdcodrYLdOfJ7AJGkIWrbmM8W3eE5odEZU5iUhQYUrtXpvhZ5F-v3jxyhDbpjx9MMUq77xlU2cDeZ5gc'),
(35, NULL, NULL, NULL, '542695069', NULL, NULL, 1, 0, NULL, '2020-09-22 04:59:07', '2020-09-22 04:59:16', 'eiIM2sRAZk6AvnyJ1NVQEc:APA91bF0Rb2V4vJlR6NSJMCHPA4qzkLaedxFpkRLTEehvOswGAnSUlIODQgzAY1FGW08XWQftQvpxQ7dp2wTZxlJNQL-G2WRaRTU7QcBz3Kezlm9e-Jh92wemRqb7SUATU8jl4hmo9NV');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `zone_id` bigint(20) UNSIGNED DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '1:home-2:work',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `city_id`, `zone_id`, `street`, `description`, `long`, `lat`, `type`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, 'mooaa', 'dasdsad', '-2144779747', '-2144869747', 1, '2020-08-10 10:54:25', '2020-08-10 10:54:25'),
(8, 4, 1, NULL, 'mooaa', 'dasdsad', '-2144779747', '-2144869747', 1, '2020-08-10 00:31:41', '2020-08-10 00:31:41'),
(12, 4, 1, NULL, 'mooaa', 'dasdsad', '-2144779747', '-2144869747', 1, '2020-08-10 17:41:53', '2020-08-10 17:41:53'),
(14, 13, 2, NULL, '228 Charleston Rd, Mountain View, CA 94043, USA', '228 Charleston Rd, Mountain View, CA 94043, USA', '-122.08037685603', '37.421483221127', 2, '2020-08-12 20:54:41', '2020-08-12 20:54:41'),
(17, 6, 2, NULL, 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', '31.214274466038', '30.661937135417', 1, '2020-08-13 19:53:13', '2020-09-11 11:46:10'),
(18, 14, 1, NULL, 'US-MTV-2171, 2171 Landings Dr, Mountain View, CA 94043, USA', 'US-MTV-2171, 2171 Landings Dr, Mountain View, CA 94043, USA', '-122.09128070623', '37.421396682715', 1, '2020-08-15 13:26:08', '2020-09-08 15:36:42'),
(19, 30, 1, NULL, 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Farsis, Zefta, Gharbia Governorate, Egypt', '31.233334\r\n', '30.033333', 1, '2020-08-15 18:50:47', '2020-08-15 18:50:47'),
(20, 14, 1, NULL, 'ميناء جدة الإسلامي،، Jeddah Islamic Seaport, Jeddah 22311, Saudi Arabia', 'ميناء جدة الإسلامي،، Jeddah Islamic Seaport, Jeddah 22311, Saudi Arabia', '39.170198254287', '21.482937552182', 1, '2020-08-15 19:11:09', '2020-08-16 12:20:53'),
(21, 14, 2, NULL, '3025 طريق الامام سعود بن عبدالعزيز بن محمد الفرعي، النزهة، الرياض 12474 8278، السعودية', '3025 طريق الامام سعود بن عبدالعزيز بن محمد الفرعي، النزهة، الرياض 12474 8278، السعودية', '46.704832836986', '24.76525775896', 2, '2020-08-16 19:18:00', '2020-08-16 19:18:00'),
(22, 14, 2, NULL, '8278 المدينة المنورة، المدينة الصناعية بعسير، خميس مشيط 62455 2974، السعودية', '8278 المدينة المنورة، المدينة الصناعية بعسير، خميس مشيط 62455 2974، السعودية', '42.671483159065', '18.341917854091', 1, '2020-09-09 06:41:40', '2020-09-09 06:41:40'),
(23, 6, 2, NULL, 'Unnamed Road, Damanhour Al Wahsh, Zefta, Gharbia Governorate, Egypt', 'Unnamed Road, Damanhour Al Wahsh, Zefta, Gharbia Governorate, Egypt', '31.206673756242', '30.659285246419', 1, '2020-09-11 11:19:50', '2020-09-11 11:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zone_translations`
--

CREATE TABLE `zone_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zone_translations`
--

INSERT INTO `zone_translations` (`id`, `zone_id`, `name`, `locale`) VALUES
(1, 1, 'جنوب مكه', 'ar'),
(2, 1, 'south maka', 'en');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_translations_category_id_foreign` (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_translations_city_id_foreign` (`city_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_categories`
--
ALTER TABLE `config_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite_addresses`
--
ALTER TABLE `favorite_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurement_translations`
--
ALTER TABLE `measurement_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `measurement_translations_measurement_id_foreign` (`measurement_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_product_id_foreign` (`product_id`),
  ADD KEY `notifications_order_id_foreign` (`order_id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_products`
--
ALTER TABLE `offer_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_translations`
--
ALTER TABLE `offer_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_translations_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `orderproducts`
--
ALTER TABLE `orderproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_order_status_type_id_foreign` (`order_status_type_id`),
  ADD KEY `orders_order_status_id_foreign` (`order_status_id`);

--
-- Indexes for table `order_histories`
--
ALTER TABLE `order_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_histories_order_id_foreign` (`order_id`),
  ADD KEY `order_histories_order_status_id_foreign` (`order_status_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_statuses_order_status_type_id_foreign` (`order_status_type_id`);

--
-- Indexes for table `order_status_translations`
--
ALTER TABLE `order_status_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_status_translations_order_status_id_foreign` (`order_status_id`);

--
-- Indexes for table `order_status_types`
--
ALTER TABLE `order_status_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status_type_translations`
--
ALTER TABLE `order_status_type_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_status_type_translations_order_status_type_id_foreign` (`order_status_type_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_measurement_id_foreign` (`measurement_id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_translations_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text_translations`
--
ALTER TABLE `text_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`),
  ADD KEY `user_addresses_city_id_foreign` (`city_id`),
  ADD KEY `user_addresses_zone_id_foreign` (`zone_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zones_city_id_foreign` (`city_id`);

--
-- Indexes for table `zone_translations`
--
ALTER TABLE `zone_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_translations_zone_id_foreign` (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city_translations`
--
ALTER TABLE `city_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `config_categories`
--
ALTER TABLE `config_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_addresses`
--
ALTER TABLE `favorite_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `measurement_translations`
--
ALTER TABLE `measurement_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offer_products`
--
ALTER TABLE `offer_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `offer_translations`
--
ALTER TABLE `offer_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orderproducts`
--
ALTER TABLE `orderproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `order_histories`
--
ALTER TABLE `order_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_status_translations`
--
ALTER TABLE `order_status_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_status_types`
--
ALTER TABLE `order_status_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_status_type_translations`
--
ALTER TABLE `order_status_type_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider_translations`
--
ALTER TABLE `slider_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `text_translations`
--
ALTER TABLE `text_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zone_translations`
--
ALTER TABLE `zone_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD CONSTRAINT `city_translations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `measurement_translations`
--
ALTER TABLE `measurement_translations`
  ADD CONSTRAINT `measurement_translations_measurement_id_foreign` FOREIGN KEY (`measurement_id`) REFERENCES `measurements` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `notifications_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offer_translations`
--
ALTER TABLE `offer_translations`
  ADD CONSTRAINT `offer_translations_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`id`),
  ADD CONSTRAINT `orders_order_status_type_id_foreign` FOREIGN KEY (`order_status_type_id`) REFERENCES `order_status_types` (`id`);

--
-- Constraints for table `order_histories`
--
ALTER TABLE `order_histories`
  ADD CONSTRAINT `order_histories_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_histories_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`id`);

--
-- Constraints for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD CONSTRAINT `order_statuses_order_status_type_id_foreign` FOREIGN KEY (`order_status_type_id`) REFERENCES `order_status_types` (`id`);

--
-- Constraints for table `order_status_translations`
--
ALTER TABLE `order_status_translations`
  ADD CONSTRAINT `order_status_translations_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_status_type_translations`
--
ALTER TABLE `order_status_type_translations`
  ADD CONSTRAINT `order_status_type_translations_order_status_type_id_foreign` FOREIGN KEY (`order_status_type_id`) REFERENCES `order_status_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_measurement_id_foreign` FOREIGN KEY (`measurement_id`) REFERENCES `measurements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_addresses_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`);

--
-- Constraints for table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `zone_translations`
--
ALTER TABLE `zone_translations`
  ADD CONSTRAINT `zone_translations_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
