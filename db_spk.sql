-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2021 at 02:37 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` char(36) NOT NULL,
  `id_data` char(36) NOT NULL,
  `id_kategori` char(36) NOT NULL,
  `total` double(11,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_data`, `id_kategori`, `total`, `created_at`, `updated_at`) VALUES
('21352bc3-d0c4-45b0-9ff7-dfa273b2e4e3', '3c1bb784-ed5d-49cb-a4b7-c411e617512c', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 0.200, '2021-08-03 19:09:40', '2021-08-03 19:09:40'),
('51ed940f-7e80-42dd-812c-607e0bbef8e3', 'a4d435d8-d94c-48c4-8424-90882d2035d9', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 0.206, '2021-08-03 19:11:42', '2021-08-03 19:11:42'),
('54dd5c34-3d7d-4913-bf57-2609e7478b8a', '2a6c86b4-35c7-4f88-8dfd-624bf747ce86', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 0.294, '2021-08-03 19:08:57', '2021-08-03 19:08:57'),
('b3877571-dff0-4e8c-a3d9-62a1395c4df2', '73abe4b2-1207-4da1-868b-24ff6b820f7b', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 0.164, '2021-08-03 19:10:57', '2021-08-03 19:17:30'),
('da0a9d96-3ad0-4a84-85dc-0148357cffd0', '866a6ad0-1d27-4673-918c-4752e18bc722', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 0.164, '2021-08-03 19:10:22', '2021-08-03 19:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id_data` char(36) NOT NULL,
  `nama_data` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `lemak` int(2) DEFAULT NULL,
  `protein` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `air` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_data`, `nama_data`, `harga`, `lemak`, `protein`, `created_at`, `updated_at`, `air`) VALUES
('2a6c86b4-35c7-4f88-8dfd-624bf747ce86', 'Pakan Ayam J42-1', '5000', 4, 16, '2021-08-03 19:08:57', '2021-08-03 19:08:57', 10),
('3c1bb784-ed5d-49cb-a4b7-c411e617512c', 'Pakan Finisher Broiler New Hope II 611B', '6000', 5, 18, '2021-08-03 19:09:40', '2021-08-03 19:09:40', 9),
('73abe4b2-1207-4da1-868b-24ff6b820f7b', 'Pakan Starter Broiler Pokphand 511', '7500', 6, 21, '2021-08-03 19:10:57', '2021-08-03 19:10:57', 8),
('866a6ad0-1d27-4673-918c-4752e18bc722', 'Pakan Ayam Broiler J511', '7000', 5, 21, '2021-08-03 19:10:22', '2021-08-03 19:10:22', 8),
('a4d435d8-d94c-48c4-8424-90882d2035d9', 'Pakan Starter Broiler Pokphand 511B', '8000', 6, 21, '2021-08-03 19:11:42', '2021-08-03 19:11:42', 7);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_sub_kriteria`
--

CREATE TABLE `hasil_sub_kriteria` (
  `id_hasil_sub_kriteria` char(36) NOT NULL,
  `id_kategori` char(36) NOT NULL,
  `id_sub_kriteria` char(36) DEFAULT NULL,
  `id_kriteria` char(36) DEFAULT NULL,
  `prioritas` double(11,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_sub_kriteria`
--

INSERT INTO `hasil_sub_kriteria` (`id_hasil_sub_kriteria`, `id_kategori`, `id_sub_kriteria`, `id_kriteria`, `prioritas`, `created_at`, `updated_at`) VALUES
('1c72e0e8-9aaa-4811-a87d-12074bfdb4b0', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'cc6595bc-ada5-4125-aaf4-40e965c07136', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 0.558, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('322b5a7d-19e0-4cb9-bb9b-09f30df9020a', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '5936d85f-5a21-48a2-b872-2e8bed1adb72', '2cdb2106-c942-48ba-9726-399a227cd060', 0.263, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('34513567-8fda-44f5-a206-76e54f7b2fa1', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '992c2d69-5690-41be-a13b-d59996721b66', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 0.122, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('360e9824-e54e-4f39-87aa-9890305f53f9', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '3ebcfed1-6ee2-4371-902a-94b75e5fe629', '2cdb2106-c942-48ba-9726-399a227cd060', 0.558, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('444129e9-e5d7-4a49-af56-322fa1808822', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'b7c9f84a-6de4-494c-bdbe-fc7bc0c952f9', '2cdb2106-c942-48ba-9726-399a227cd060', 0.122, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('446721db-fe0c-4b0f-9c29-4cab34b7496c', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '5c964576-1883-414a-ab38-1140e37c45a0', '2cdb2106-c942-48ba-9726-399a227cd060', 0.057, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('748edfa2-0a3b-468a-8930-e0f505628a8b', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '43cd3d43-3a7d-436a-bffc-e6ad2a04eccd', '73a65aaa-3168-4299-9c30-c46918b054ee', 0.380, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('80195c1e-0f13-422c-83fc-b6e22eead748', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'b8b36ffc-abd8-4581-99fe-d439285a1378', '7bf0e474-863d-4192-b240-626b619085d6', 0.096, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('a45d409d-6f52-48a1-8204-2fb8afc0d4eb', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '9720602b-fcb7-48ca-8d68-38efce97b83d', '7bf0e474-863d-4192-b240-626b619085d6', 0.277, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('bf24b657-aa66-4897-a032-26d12be0fda5', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '632f973b-97e0-4244-94ff-e5c673dd0427', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 0.057, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('c1ff64cc-cb30-4e44-82a9-d3d19b599ab5', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'ada9ad26-7574-455d-8654-dee5191b2123', '73a65aaa-3168-4299-9c30-c46918b054ee', 0.249, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('cc29abf9-a922-4a87-bc05-e9da972a6464', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e0d27235-2707-4805-8ff2-b1dd7779c805', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 0.263, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('d88bba8f-4e56-4b47-93ad-fa3fa335a90d', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '65ecb931-15ca-47f4-b9e6-87a84c1f624f', '7bf0e474-863d-4192-b240-626b619085d6', 0.161, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('f359e701-3e37-4634-a46b-1f08b2acf6c2', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '52b279d5-686f-4f88-a0e6-e8b0622fbef6', '73a65aaa-3168-4299-9c30-c46918b054ee', 0.132, '2021-08-03 19:07:10', '2021-08-03 19:16:40'),
('fa31e1b7-4953-49ea-b1c5-681b24706cbe', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e497d42d-f354-45bc-b5ff-208a15a71363', '7bf0e474-863d-4192-b240-626b619085d6', 0.466, '2021-08-03 19:07:10', '2021-08-03 19:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(36) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `created_at`, `updated_at`) VALUES
('3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'Doc', '2021-08-03 19:07:09', '2021-08-03 19:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` char(36) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `created_at`, `updated_at`) VALUES
('2cdb2106-c942-48ba-9726-399a227cd060', 'Lemak', '2021-08-03 18:58:44', '2021-08-03 18:58:44'),
('73a65aaa-3168-4299-9c30-c46918b054ee', 'Harga', '2021-08-03 18:58:37', '2021-08-03 18:58:37'),
('7bf0e474-863d-4192-b240-626b619085d6', 'Protein', '2021-08-03 18:58:41', '2021-08-03 18:58:41'),
('e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'Air', '2021-08-03 18:58:47', '2021-08-03 18:58:47');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` char(36) NOT NULL,
  `nama` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nama`, `created_at`, `updated_at`) VALUES
('1', 'Sangat Rendah', '2020-08-04 16:43:58', '2020-08-04 16:43:59'),
('2', 'Rendah', '2020-08-04 16:44:08', '2020-08-04 16:44:09'),
('3', 'Sedang', '2020-08-04 16:44:20', '2020-08-04 16:44:21'),
('4', 'Tinggi', '2020-08-04 16:44:31', '2020-08-04 16:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_nilai_alternatif` char(36) NOT NULL,
  `id_nilai` char(36) NOT NULL,
  `id_kriteria` char(36) NOT NULL,
  `id_alternatif` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_nilai_alternatif`, `id_nilai`, `id_kriteria`, `id_alternatif`, `created_at`, `updated_at`) VALUES
('00e41c7e-a679-4f0f-91d7-5a95388ed2a1', '2', '7bf0e474-863d-4192-b240-626b619085d6', '21352bc3-d0c4-45b0-9ff7-dfa273b2e4e3', NULL, NULL),
('015e9d2e-8f7e-4afb-8735-461b915d5640', '3', '7bf0e474-863d-4192-b240-626b619085d6', 'b3877571-dff0-4e8c-a3d9-62a1395c4df2', NULL, NULL),
('0f2d94b5-ccf4-4fc8-bdb9-153ec5bba535', '3', '73a65aaa-3168-4299-9c30-c46918b054ee', 'b3877571-dff0-4e8c-a3d9-62a1395c4df2', NULL, NULL),
('1c6a32bc-e219-4f56-aca2-0e164a3434cf', '3', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'da0a9d96-3ad0-4a84-85dc-0148357cffd0', NULL, NULL),
('2cb41557-1985-43df-89fa-23ea6fd9de3a', '3', '7bf0e474-863d-4192-b240-626b619085d6', 'da0a9d96-3ad0-4a84-85dc-0148357cffd0', NULL, NULL),
('3a7ab4c7-1501-42aa-ba6d-e0641ad14d5b', '3', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'b3877571-dff0-4e8c-a3d9-62a1395c4df2', NULL, NULL),
('4e9f1072-8a9a-4e8f-b8f5-06208b0d36be', '3', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '21352bc3-d0c4-45b0-9ff7-dfa273b2e4e3', NULL, NULL),
('516cf8de-7f98-4d12-8b3a-9fc47d45daee', '3', '7bf0e474-863d-4192-b240-626b619085d6', '51ed940f-7e80-42dd-812c-607e0bbef8e3', NULL, NULL),
('58028a00-2f4f-4966-ba98-b27a34c2a323', '3', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '54dd5c34-3d7d-4913-bf57-2609e7478b8a', NULL, NULL),
('741905fd-c313-479f-b3c4-fc54cbd5ecf2', '1', '7bf0e474-863d-4192-b240-626b619085d6', '54dd5c34-3d7d-4913-bf57-2609e7478b8a', NULL, NULL),
('85ecfe14-29a9-4567-97ed-3252152d4aff', '3', '73a65aaa-3168-4299-9c30-c46918b054ee', 'da0a9d96-3ad0-4a84-85dc-0148357cffd0', NULL, NULL),
('9ce1e97b-ddfd-4c56-8c5f-191fd03915b2', '3', '2cdb2106-c942-48ba-9726-399a227cd060', 'b3877571-dff0-4e8c-a3d9-62a1395c4df2', NULL, NULL),
('a0951b9e-4210-48fd-bd17-a1dcea805ee1', '3', '2cdb2106-c942-48ba-9726-399a227cd060', '21352bc3-d0c4-45b0-9ff7-dfa273b2e4e3', NULL, NULL),
('a2fc8eb4-fcbf-4ad5-a3e7-523d4a035f7d', '3', '2cdb2106-c942-48ba-9726-399a227cd060', '51ed940f-7e80-42dd-812c-607e0bbef8e3', NULL, NULL),
('a7b0332c-dc98-4f34-93d9-98145d49dbe5', '1', '73a65aaa-3168-4299-9c30-c46918b054ee', '54dd5c34-3d7d-4913-bf57-2609e7478b8a', NULL, NULL),
('a9ce231d-23e2-4adc-b464-a6483065e08b', '3', '2cdb2106-c942-48ba-9726-399a227cd060', 'da0a9d96-3ad0-4a84-85dc-0148357cffd0', NULL, NULL),
('bb5a1869-15c6-4d6a-a5be-03756f58c0db', '2', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '51ed940f-7e80-42dd-812c-607e0bbef8e3', NULL, NULL),
('c67ccb0b-4e13-453a-a4fa-3d6b1a0b0866', '3', '2cdb2106-c942-48ba-9726-399a227cd060', '54dd5c34-3d7d-4913-bf57-2609e7478b8a', NULL, NULL),
('ef37b837-e7f7-4514-9930-7d37fd508e65', '2', '73a65aaa-3168-4299-9c30-c46918b054ee', '51ed940f-7e80-42dd-812c-607e0bbef8e3', NULL, NULL),
('f224fa05-08cb-437f-89bf-af25091685bc', '2', '73a65aaa-3168-4299-9c30-c46918b054ee', '21352bc3-d0c4-45b0-9ff7-dfa273b2e4e3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id_nilai_kriteria` char(36) NOT NULL,
  `id_kategori` char(36) NOT NULL,
  `id_kriteria_dari` char(36) NOT NULL,
  `id_kriteria_tujuan` char(36) DEFAULT NULL,
  `nilai` double(11,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_nilai_kriteria`, `id_kategori`, `id_kriteria_dari`, `id_kriteria_tujuan`, `nilai`, `created_at`, `updated_at`) VALUES
('0b43112e-ec92-4c11-8a50-d0421d604e9f', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 5.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('0fa1179a-7fa5-482f-af08-0c7fa4e4b2bd', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('1a46d95f-2823-4896-8c83-b49c90cb8176', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', '2cdb2106-c942-48ba-9726-399a227cd060', 2.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('3207b3fe-e7cd-42dd-93b6-f3b287add6eb', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '7bf0e474-863d-4192-b240-626b619085d6', 4.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('531ca6f8-76b7-4483-a864-fc245539a729', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', '73a65aaa-3168-4299-9c30-c46918b054ee', 0.200, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('56e9f149-9e33-450d-a519-e8fcedb4e6c1', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 5.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('69a50987-3369-4619-a42d-644834ccc572', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '73a65aaa-3168-4299-9c30-c46918b054ee', 0.500, '2021-08-03 19:07:09', '2021-08-03 19:07:09'),
('79433f3d-eaeb-489d-aa59-114d71522315', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 3.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('a95b8725-f356-454a-8a62-2e19de0bb62e', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', '73a65aaa-3168-4299-9c30-c46918b054ee', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('bda48b3b-0a98-44c9-a95b-eb59fd7f5ce2', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '2cdb2106-c942-48ba-9726-399a227cd060', 0.200, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('c1c26d67-573e-4ed6-9dc0-5a7ffa118cc4', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', '7bf0e474-863d-4192-b240-626b619085d6', 5.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('ceed9b5d-3743-4fd3-bae4-3d6fe81a2681', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '73a65aaa-3168-4299-9c30-c46918b054ee', 0.200, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('d1f27966-6648-403c-9914-8219a6751e37', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', '7bf0e474-863d-4192-b240-626b619085d6', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('d287cc0d-2551-4c75-8dd1-4a58c055aabb', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', '2cdb2106-c942-48ba-9726-399a227cd060', 0.250, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('ee53ead3-8618-4c35-93d6-8d70a45c1eb3', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '2cdb2106-c942-48ba-9726-399a227cd060', 1.000, '2021-08-03 19:07:09', '2021-08-03 19:07:09'),
('fe57b86e-0630-48ca-af69-792e1353fe62', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '7bf0e474-863d-4192-b240-626b619085d6', 0.333, '2021-08-03 19:07:10', '2021-08-03 19:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sub_kriteria`
--

CREATE TABLE `nilai_sub_kriteria` (
  `id_nilai_sub_kriteria` char(36) NOT NULL,
  `id_kategori` char(36) NOT NULL,
  `id_kriteria` char(36) NOT NULL,
  `id_sub_kriteria_dari` char(36) DEFAULT NULL,
  `id_sub_kriteria_tujuan` char(36) DEFAULT NULL,
  `nilai` double(11,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_sub_kriteria`
--

INSERT INTO `nilai_sub_kriteria` (`id_nilai_sub_kriteria`, `id_kategori`, `id_kriteria`, `id_sub_kriteria_dari`, `id_sub_kriteria_tujuan`, `nilai`, `created_at`, `updated_at`) VALUES
('007fa89e-ea67-4b10-87af-1a6826e77c18', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', '52b279d5-686f-4f88-a0e6-e8b0622fbef6', '43cd3d43-3a7d-436a-bffc-e6ad2a04eccd', 0.250, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('099b0ae6-2b61-427e-ac1c-952d12ed343c', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', 'b8b36ffc-abd8-4581-99fe-d439285a1378', 'e497d42d-f354-45bc-b5ff-208a15a71363', 0.250, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('09c5c7d7-4227-4ee6-85a5-95773134b3a3', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '5c964576-1883-414a-ab38-1140e37c45a0', '5c964576-1883-414a-ab38-1140e37c45a0', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('0bc81652-bd08-43e7-8a48-7b5115bc9b69', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '632f973b-97e0-4244-94ff-e5c673dd0427', 'e0d27235-2707-4805-8ff2-b1dd7779c805', 0.200, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('12f0eca6-aed7-4797-9454-13797fae1a94', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '992c2d69-5690-41be-a13b-d59996721b66', '992c2d69-5690-41be-a13b-d59996721b66', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('14f40648-93bb-4b18-afd6-27a420ad97e4', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', 'e497d42d-f354-45bc-b5ff-208a15a71363', '65ecb931-15ca-47f4-b9e6-87a84c1f624f', 3.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('15d781ac-2f6b-42c8-9604-61a79574c195', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '5936d85f-5a21-48a2-b872-2e8bed1adb72', '5936d85f-5a21-48a2-b872-2e8bed1adb72', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('1a578e50-7f5f-4394-adf7-0e217aeefaa3', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'e0d27235-2707-4805-8ff2-b1dd7779c805', 'e0d27235-2707-4805-8ff2-b1dd7779c805', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('1e7715a5-e3b6-49ba-a1b5-29cec6fae3fd', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', 'b7c9f84a-6de4-494c-bdbe-fc7bc0c952f9', '3ebcfed1-6ee2-4371-902a-94b75e5fe629', 0.200, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('2cd4f708-43eb-4d25-abd4-c1025bedecb5', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', '65ecb931-15ca-47f4-b9e6-87a84c1f624f', '65ecb931-15ca-47f4-b9e6-87a84c1f624f', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('2f2380db-038d-4284-9dd0-ede6471ec689', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '5936d85f-5a21-48a2-b872-2e8bed1adb72', '5c964576-1883-414a-ab38-1140e37c45a0', 5.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('32a2d47f-10c7-4810-b697-c5ed28a126cf', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '5c964576-1883-414a-ab38-1140e37c45a0', 'b7c9f84a-6de4-494c-bdbe-fc7bc0c952f9', 0.333, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('346ccf4c-ac82-4b26-9ce7-3c1289d0ce9a', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'cc6595bc-ada5-4125-aaf4-40e965c07136', '992c2d69-5690-41be-a13b-d59996721b66', 5.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('39e7c136-c4ef-439b-8933-260df55f6d33', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', '9720602b-fcb7-48ca-8d68-38efce97b83d', 'e497d42d-f354-45bc-b5ff-208a15a71363', 0.500, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('3a587827-3205-4116-8e62-24d68cb6a967', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '632f973b-97e0-4244-94ff-e5c673dd0427', 'cc6595bc-ada5-4125-aaf4-40e965c07136', 0.142, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('3bc22d8e-cd85-450b-bb75-58882a5d1d6c', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'e0d27235-2707-4805-8ff2-b1dd7779c805', 'cc6595bc-ada5-4125-aaf4-40e965c07136', 0.333, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('3be3c5c3-b16a-4db0-a2f9-0b654836fb65', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', 'ada9ad26-7574-455d-8654-dee5191b2123', '52b279d5-686f-4f88-a0e6-e8b0622fbef6', 3.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('3c70769b-dbc7-4840-b620-0709e648727f', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'cc6595bc-ada5-4125-aaf4-40e965c07136', '632f973b-97e0-4244-94ff-e5c673dd0427', 7.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('3df3e2bf-2037-481f-b982-b9e2417f5ac8', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', 'ada9ad26-7574-455d-8654-dee5191b2123', '43cd3d43-3a7d-436a-bffc-e6ad2a04eccd', 0.500, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('3f95be27-77e3-4242-972a-fd77f38ab61f', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', 'b7c9f84a-6de4-494c-bdbe-fc7bc0c952f9', '5c964576-1883-414a-ab38-1140e37c45a0', 3.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('4072c246-0a38-4f8f-9eb9-27a327bc115c', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', '52b279d5-686f-4f88-a0e6-e8b0622fbef6', 'ada9ad26-7574-455d-8654-dee5191b2123', 0.333, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('410b1b9c-5aed-42d6-ace5-26dab77db87d', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'cc6595bc-ada5-4125-aaf4-40e965c07136', 'cc6595bc-ada5-4125-aaf4-40e965c07136', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('41abac75-624d-47b2-a661-93f1e080e214', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', '65ecb931-15ca-47f4-b9e6-87a84c1f624f', 'b8b36ffc-abd8-4581-99fe-d439285a1378', 2.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('4969c0a3-cff2-4fa4-b230-422e14a89443', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '992c2d69-5690-41be-a13b-d59996721b66', 'cc6595bc-ada5-4125-aaf4-40e965c07136', 0.200, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('4a9505f3-2c0b-4e14-862e-310850237142', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '5936d85f-5a21-48a2-b872-2e8bed1adb72', '3ebcfed1-6ee2-4371-902a-94b75e5fe629', 0.333, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('4ac9ccc0-b2fb-4294-8254-b4dbb94ba9fd', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', '43cd3d43-3a7d-436a-bffc-e6ad2a04eccd', '43cd3d43-3a7d-436a-bffc-e6ad2a04eccd', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('59c02ecf-d066-4334-8554-120b22065137', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', '9720602b-fcb7-48ca-8d68-38efce97b83d', '65ecb931-15ca-47f4-b9e6-87a84c1f624f', 2.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('5b6f4393-a858-4271-9388-0a6bb5ee1063', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', '65ecb931-15ca-47f4-b9e6-87a84c1f624f', '9720602b-fcb7-48ca-8d68-38efce97b83d', 0.500, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('61e7d5fe-f8f3-4add-85e8-6d9cd2dfb46b', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', '9720602b-fcb7-48ca-8d68-38efce97b83d', '9720602b-fcb7-48ca-8d68-38efce97b83d', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('62335f09-9498-4cf0-a129-cd91b7376ece', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '5936d85f-5a21-48a2-b872-2e8bed1adb72', 'b7c9f84a-6de4-494c-bdbe-fc7bc0c952f9', 3.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('7582efaf-50d0-49a8-875d-6442e3c86aca', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', '43cd3d43-3a7d-436a-bffc-e6ad2a04eccd', '52b279d5-686f-4f88-a0e6-e8b0622fbef6', 4.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('7f2d9694-d1ee-40c0-93ec-60d6fea90849', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '3ebcfed1-6ee2-4371-902a-94b75e5fe629', 'b7c9f84a-6de4-494c-bdbe-fc7bc0c952f9', 5.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('853a24dc-16ad-4ba4-9e14-7baa4463bd62', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', 'e497d42d-f354-45bc-b5ff-208a15a71363', '9720602b-fcb7-48ca-8d68-38efce97b83d', 2.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('863bc0b9-ef51-426e-8c71-e9c970a2fc2c', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', 'b8b36ffc-abd8-4581-99fe-d439285a1378', 'b8b36ffc-abd8-4581-99fe-d439285a1378', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('8993ce12-0bd0-40d4-9ddd-2488bdbb705d', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '3ebcfed1-6ee2-4371-902a-94b75e5fe629', '5936d85f-5a21-48a2-b872-2e8bed1adb72', 3.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('8a69082b-a744-4ba6-b548-97361bce317a', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '5c964576-1883-414a-ab38-1140e37c45a0', '5936d85f-5a21-48a2-b872-2e8bed1adb72', 0.200, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('8ddf6cb1-9ca4-4d42-80b1-61bceede4f39', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', 'b7c9f84a-6de4-494c-bdbe-fc7bc0c952f9', 'b7c9f84a-6de4-494c-bdbe-fc7bc0c952f9', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('96910601-9a0a-47e6-8bbf-8678a1948bb6', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '992c2d69-5690-41be-a13b-d59996721b66', 'e0d27235-2707-4805-8ff2-b1dd7779c805', 0.333, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('9b8e76e9-03a4-4def-8543-55aae9223422', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'cc6595bc-ada5-4125-aaf4-40e965c07136', 'e0d27235-2707-4805-8ff2-b1dd7779c805', 3.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('9e3eb950-5e44-4f10-8e95-b8e3208b816a', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', 'b7c9f84a-6de4-494c-bdbe-fc7bc0c952f9', '5936d85f-5a21-48a2-b872-2e8bed1adb72', 0.333, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('a02784ea-3893-439b-85cc-0f15f6628863', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', '52b279d5-686f-4f88-a0e6-e8b0622fbef6', '52b279d5-686f-4f88-a0e6-e8b0622fbef6', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('a1d88081-33c9-499d-b8b7-8d55949dae7b', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', 'e497d42d-f354-45bc-b5ff-208a15a71363', 'e497d42d-f354-45bc-b5ff-208a15a71363', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('a217b2e4-1e50-4d91-9215-f7d7197e067b', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'e0d27235-2707-4805-8ff2-b1dd7779c805', '992c2d69-5690-41be-a13b-d59996721b66', 3.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('a7f25cc0-dfbb-45f8-9817-ae25c7e40a7b', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', 'b8b36ffc-abd8-4581-99fe-d439285a1378', '9720602b-fcb7-48ca-8d68-38efce97b83d', 0.333, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('b02690fb-1201-4851-86b9-83e414a1ba1e', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', '43cd3d43-3a7d-436a-bffc-e6ad2a04eccd', 'ada9ad26-7574-455d-8654-dee5191b2123', 2.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('b1249657-5ec7-4924-9300-1a332450a77b', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', 'e497d42d-f354-45bc-b5ff-208a15a71363', 'b8b36ffc-abd8-4581-99fe-d439285a1378', 4.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('b5728d68-c6b4-4296-bc1a-0da11080b291', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '632f973b-97e0-4244-94ff-e5c673dd0427', '632f973b-97e0-4244-94ff-e5c673dd0427', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('ba871b39-a79b-41e9-b15e-36641668b16f', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', '9720602b-fcb7-48ca-8d68-38efce97b83d', 'b8b36ffc-abd8-4581-99fe-d439285a1378', 3.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('c2dd246e-6954-4cd8-965c-1ddfd3ba50fe', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', 'b8b36ffc-abd8-4581-99fe-d439285a1378', '65ecb931-15ca-47f4-b9e6-87a84c1f624f', 0.500, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('c4cdca99-d38e-4204-9a93-4ff402ceba9d', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '632f973b-97e0-4244-94ff-e5c673dd0427', '992c2d69-5690-41be-a13b-d59996721b66', 0.333, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('ce2ae6eb-9cae-4639-849f-869533e996a1', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'e0d27235-2707-4805-8ff2-b1dd7779c805', '632f973b-97e0-4244-94ff-e5c673dd0427', 5.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('dcbcc791-fe32-4936-af26-a44fccf71e09', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '73a65aaa-3168-4299-9c30-c46918b054ee', 'ada9ad26-7574-455d-8654-dee5191b2123', 'ada9ad26-7574-455d-8654-dee5191b2123', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('df418fc1-ecd4-492a-9f71-2c7b4fa98041', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '3ebcfed1-6ee2-4371-902a-94b75e5fe629', '5c964576-1883-414a-ab38-1140e37c45a0', 7.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('edd4dc8c-c705-41a6-b4db-9005937f0c14', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '7bf0e474-863d-4192-b240-626b619085d6', '65ecb931-15ca-47f4-b9e6-87a84c1f624f', 'e497d42d-f354-45bc-b5ff-208a15a71363', 0.333, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('f227b097-0db6-4f3d-b905-5c11a806115b', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', '992c2d69-5690-41be-a13b-d59996721b66', '632f973b-97e0-4244-94ff-e5c673dd0427', 3.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('f5346665-985e-4154-9a2b-fea84ba0e0fc', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '5c964576-1883-414a-ab38-1140e37c45a0', '3ebcfed1-6ee2-4371-902a-94b75e5fe629', 0.142, '2021-08-03 19:07:10', '2021-08-03 19:07:10'),
('fa6e3e35-a19e-4c36-90f0-ab393ad7e6f7', '3ccb5eb2-79d2-40d1-838f-fc2a9330d508', '2cdb2106-c942-48ba-9726-399a227cd060', '3ebcfed1-6ee2-4371-902a-94b75e5fe629', '3ebcfed1-6ee2-4371-902a-94b75e5fe629', 1.000, '2021-08-03 19:07:10', '2021-08-03 19:07:10');

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
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` char(36) NOT NULL,
  `id_nilai` char(36) NOT NULL,
  `id_kriteria` char(36) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `ukuran_min` double(11,3) DEFAULT NULL,
  `ukuran_maks` double(11,3) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_nilai`, `id_kriteria`, `nama`, `ukuran_min`, `ukuran_maks`, `satuan`, `created_at`, `updated_at`) VALUES
('3ebcfed1-6ee2-4371-902a-94b75e5fe629', '1', '2cdb2106-c942-48ba-9726-399a227cd060', 'Sangat Rendah', 2.500, 2.500, '%', '2021-08-03 19:03:17', '2021-08-03 19:03:17'),
('43cd3d43-3a7d-436a-bffc-e6ad2a04eccd', '1', '73a65aaa-3168-4299-9c30-c46918b054ee', 'Sangat Rendah', 5000.000, 5000.000, 'Rp', '2021-08-03 19:01:05', '2021-08-03 19:01:05'),
('52b279d5-686f-4f88-a0e6-e8b0622fbef6', '4', '73a65aaa-3168-4299-9c30-c46918b054ee', 'Tinggi', 9000.000, 20000.000, 'Rp', '2021-08-03 19:01:39', '2021-08-03 19:01:39'),
('5936d85f-5a21-48a2-b872-2e8bed1adb72', '2', '2cdb2106-c942-48ba-9726-399a227cd060', 'Rendah', 3.000, 3.000, '%', '2021-08-03 19:03:27', '2021-08-03 19:03:27'),
('5c964576-1883-414a-ab38-1140e37c45a0', '4', '2cdb2106-c942-48ba-9726-399a227cd060', 'Tinggi', 8.000, 8.000, '%', '2021-08-03 19:03:48', '2021-08-03 19:03:48'),
('632f973b-97e0-4244-94ff-e5c673dd0427', '4', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'Tinggi', 14.000, 14.000, '%', '2021-08-03 19:04:36', '2021-08-03 19:04:36'),
('65ecb931-15ca-47f4-b9e6-87a84c1f624f', '3', '7bf0e474-863d-4192-b240-626b619085d6', 'Sedang', 19.000, 24.000, '%', '2021-08-03 19:02:44', '2021-08-03 19:02:44'),
('9720602b-fcb7-48ca-8d68-38efce97b83d', '2', '7bf0e474-863d-4192-b240-626b619085d6', 'Rendah', 16.500, 18.000, '%', '2021-08-03 19:02:29', '2021-08-03 19:02:29'),
('992c2d69-5690-41be-a13b-d59996721b66', '3', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'Sedang', 8.000, 13.000, '%', '2021-08-03 19:04:27', '2021-08-03 19:04:27'),
('ada9ad26-7574-455d-8654-dee5191b2123', '3', '73a65aaa-3168-4299-9c30-c46918b054ee', 'Sedang', 6000.000, 9000.000, 'Rp', '2021-08-03 19:01:29', '2021-08-03 19:16:07'),
('b5d33256-f21b-4b19-8e89-99c3a7798d9c', '2', '73a65aaa-3168-4299-9c30-c46918b054ee', 'Rendah', 6000.000, 6000.000, 'Rp', '2021-08-03 19:01:16', '2021-08-03 19:01:16'),
('b7c9f84a-6de4-494c-bdbe-fc7bc0c952f9', '3', '2cdb2106-c942-48ba-9726-399a227cd060', 'Sedang', 4.000, 7.000, '%', '2021-08-03 19:03:39', '2021-08-03 19:03:39'),
('b8b36ffc-abd8-4581-99fe-d439285a1378', '4', '7bf0e474-863d-4192-b240-626b619085d6', 'Tinggi', 25.000, 25.000, '%', '2021-08-03 19:02:59', '2021-08-03 19:02:59'),
('cc6595bc-ada5-4125-aaf4-40e965c07136', '1', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'Sangat Rendah', 6.000, 6.000, '%', '2021-08-03 19:04:02', '2021-08-03 19:04:02'),
('e0d27235-2707-4805-8ff2-b1dd7779c805', '2', 'e69b1ddb-47bf-4e88-bffa-9eb3a0e7411a', 'Rendah', 7.000, 7.000, '%', '2021-08-03 19:04:10', '2021-08-03 19:04:10'),
('e497d42d-f354-45bc-b5ff-208a15a71363', '1', '7bf0e474-863d-4192-b240-626b619085d6', 'Sangat Rendah', 16.000, 16.000, '%', '2021-08-03 19:02:04', '2021-08-03 19:02:04');

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
(6, 'admin', 'admin@gmail.com', NULL, '$2y$10$OV9bbnvTmbtSeJcE969QtutQBDcF7bfd8O2Gmql8u5rNtKlRd9W76', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `id_rakitan` (`id_data`),
  ADD KEY `id_kategori_rakitan` (`id_kategori`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_sub_kriteria`
--
ALTER TABLE `hasil_sub_kriteria`
  ADD PRIMARY KEY (`id_hasil_sub_kriteria`) USING BTREE,
  ADD KEY `id_kategori_rakitan` (`id_kategori`),
  ADD KEY `id_sub_kriteria` (`id_sub_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_nilai_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_nilai` (`id_nilai`),
  ADD KEY `id_altrnatif` (`id_alternatif`) USING BTREE;

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_nilai_kriteria`),
  ADD KEY `id_kategori_rakitan` (`id_kategori`);

--
-- Indexes for table `nilai_sub_kriteria`
--
ALTER TABLE `nilai_sub_kriteria`
  ADD PRIMARY KEY (`id_nilai_sub_kriteria`),
  ADD KEY `id_kategori_rakitan` (`id_kategori`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `id_nilai` (`id_nilai`),
  ADD KEY `id_kriteria` (`id_kriteria`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_ibfk_1` FOREIGN KEY (`id_data`) REFERENCES `data` (`id_data`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatif_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_sub_kriteria`
--
ALTER TABLE `hasil_sub_kriteria`
  ADD CONSTRAINT `hasil_sub_kriteria_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_sub_kriteria_ibfk_2` FOREIGN KEY (`id_sub_kriteria`) REFERENCES `sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_sub_kriteria_ibfk_3` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_alternatif_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD CONSTRAINT `nilai_kriteria_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_sub_kriteria`
--
ALTER TABLE `nilai_sub_kriteria`
  ADD CONSTRAINT `nilai_sub_kriteria_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_sub_kriteria_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
