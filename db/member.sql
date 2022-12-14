SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mydb_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(5) NOT NULL,
  `name_member` varchar(60) NOT NULL,
  `fname_member` varchar(60) NOT NULL,
  `email_member` varchar(60) NOT NULL,
  `pwd_member` varchar(60) NOT NULL,
  `address_member` varchar(200) NOT NULL,
  `address2_member` varchar(100) NOT NULL,
  `county_member` varchar(60) NOT NULL,
  `state_member` varchar(60) NOT NULL,
  `zip_member` varchar(60) NOT NULL,
  `authen_member` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางสมาชิก';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(5) NOT NULL AUTO_INCREMENT;