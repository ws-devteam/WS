-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 08:47 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ws`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`cpses_bdla2sn10k`@`localhost` PROCEDURE `fetchField` (`collectionParam` VARCHAR(100), `textParam` VARCHAR(100), `valueParam` VARCHAR(100))  BEGIN
	DECLARE queryString VARCHAR(500);
    SET @query = CONCAT("SELECT CONCAT(", textParam ,") as Text, ", valueParam, " as Value FROM ", LOWER(collectionParam));
    SET queryString = (SELECT s.sqlstring FROM sqls s WHERE s.sqlkey = CONCAT("fetchField-",collectionParam,"-",valueParam));
    SET @query = (SELECT IF(COUNT(*)=0, @query, queryString) FROM sqls s WHERE s.sqlkey= CONCAT("fetchField-",collectionParam,"-",valueParam));
    PREPARE stmt1 FROM @query;
    EXECUTE stmt1;
    DEALLOCATE PREPARE stmt1;
END$$

CREATE DEFINER=`cpses_bdla2sn10k`@`localhost` PROCEDURE `getReadTable` (`tbl` VARCHAR(100))  BEGIN
	DECLARE queryString VARCHAR(500);
    SET queryString = (SELECT s.sqlstring FROM sqls s WHERE s.sqlkey = CONCAT("read-",tbl));
    SET @query = (SELECT IF(COUNT(*)=0, CONCAT("select * from ", LOWER(tbl)), queryString) FROM sqls s WHERE s.sqlkey= CONCAT("read-",tbl));
    PREPARE stmt1 FROM @query;
    EXECUTE stmt1;
    DEALLOCATE PREPARE stmt1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Notes` varchar(200) DEFAULT NULL,
  `Status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`_id`, `Name`, `Location`, `Phone`, `Email`, `Notes`, `Status`, `createdAt`, `updatedAt`) VALUES
(8, 'Jeet', 'Kolkata', '123', 'xyz', 'Freelancer', 'Active', '2021-05-05 06:53:13', '2021-05-22 15:13:30'),
(9, 'Moupiya', 'Kolkata', '345', 'sajbvjh', 'via Hams', 'Active', '2021-05-05 06:53:47', '2021-05-05 06:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ClientID` varchar(200) NOT NULL,
  `EventType` varchar(50) NOT NULL,
  `Notes` varchar(200) NOT NULL,
  `Venue` varchar(100) NOT NULL,
  `Status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`_id`, `Name`, `ClientID`, `EventType`, `Notes`, `Venue`, `Status`, `createdAt`, `updatedAt`) VALUES
(6, 'Moupiya Biye', '9', 'Wedding', 'sddfsfa', 'sdbfjb', 'Active', '2021-05-22 15:30:51', '2021-05-23 05:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `medialinks`
--

CREATE TABLE `medialinks` (
  `CategoryID` varchar(50) NOT NULL,
  `Link` varchar(200) NOT NULL,
  `Sortorder` int(11) NOT NULL DEFAULT '0',
  `Active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medialinks`
--

INSERT INTO `medialinks` (`CategoryID`, `Link`, `Sortorder`, `Active`) VALUES
('OurWorksImagesBabyShoot', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177471/Website/Baby%20Shoot/DSC_4489-min_hzf8mp.jpg', 0, 1),
('OurWorksImagesBabyShoot', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177472/Website/Baby%20Shoot/DSC_1256-2-min_dptr0u.jpg', 1, 1),
('OurWorksImagesBabyShoot', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177472/Website/Baby%20Shoot/DSC_1370-2-min_xp8n2e.jpg', 2, 1),
('OurWorksImagesBabyShoot', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177472/Website/Baby%20Shoot/DSC_9534-min_co0pkp.jpg', 3, 1),
('OurWorksImagesBabyShoot', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177472/Website/Baby%20Shoot/DSC_9617-min_yyidqq.jpg', 4, 1),
('OurWorksImagesBabyShoot', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177473/Website/Baby%20Shoot/DSC_9618-min_iydwuy.jpg', 5, 1),
('OurWorksImagesBabyShoot', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177474/Website/Baby%20Shoot/DSC_1115_LR-min_yncyv5.jpg', 6, 1),
('OurWorksImagesBabyShoot', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177474/Website/Baby%20Shoot/DSC_9643-min_bfiloi.jpg', 7, 1),
('OurWorksImagesBabyShoot', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177474/Website/Baby%20Shoot/DSC_9686-min_qqm5ic.jpg', 8, 1),
('OurWorksImagesBabyShoot', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177474/Website/Baby%20Shoot/IMG_9144-min_rq1vg1.jpg', 9, 1),
('OurWorksImagesBabyShoot', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177475/Website/Baby%20Shoot/DSC_1170-2-min_oaakjf.jpg', 10, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177881/Website/Pre%20Wedding/IMG_4966-min_fxt66k.jpg', 12, 0),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177883/Website/Pre%20Wedding/DSC_0380-min_zo1csc.jpg', 11, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177884/Website/Pre%20Wedding/DSC_1237-min_xprodi.jpg', 7, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177884/Website/Pre%20Wedding/DSC_1253-min_tauhh0.jpg', 6, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177884/Website/Pre%20Wedding/DSC_1276-min_m6hctf.jpg', 4, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177884/Website/Pre%20Wedding/DSC_1285-min_xwebnn.jpg', 5, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177885/Website/Pre%20Wedding/DSC_1469-min_f0hbvz.jpg', 14, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177886/Website/Pre%20Wedding/DSC_1768-Edit-min_scaf4s.jpg', 8, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177887/Website/Pre%20Wedding/DSC_3144-min_v2sh0c.jpg', 10, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177888/Website/Pre%20Wedding/DSC_3190-min_p7n7wc.jpg', 9, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177889/Website/Pre%20Wedding/DSC_3201-min_jd8odx.jpg', 13, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177890/Website/Pre%20Wedding/DSC_3100-min_cehvqi.jpg', 15, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177890/Website/Pre%20Wedding/DSC_8089-min_jkzonl.jpg', 2, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177891/Website/Pre%20Wedding/DSC_8863-min_wphhsx.jpg', 3, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177894/Website/Pre%20Wedding/DSC_1474-min_mwtqdq.jpg', 0, 1),
('OurWorksImagesPreWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584177894/Website/Pre%20Wedding/DSC_9421-min_tsi1zv.jpg', 1, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181218/Website/Wedding/IMG_4840-min_fywuyr.jpg', 19, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181223/Website/Wedding/ANJ_1381-min_exihli.jpg', 23, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181225/Website/Wedding/ANJ_1285-min_xzeove.jpg', 14, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181225/Website/Wedding/ANJ_1386-min_ob3un0.jpg', 21, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181226/Website/Wedding/ANJ_1681-min_aohmx5.jpg', 18, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181227/Website/Wedding/ANJ_1730_web-min_k5xdm3.jpg', 16, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181230/Website/Wedding/ANJ_1600-min_j2syad.jpg', 17, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181235/Website/Wedding/DSC_2077-min_ueluvx.jpg', 15, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181235/Website/Wedding/DSC_5443-min_cca0wy.jpg', 22, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181237/Website/Wedding/DSC_2128-min_njm3ty.jpg', 12, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181237/Website/Wedding/DSC_6065-min_wcfarp.jpg', 24, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181240/Website/Wedding/DSC_6354-min_jub6aw.jpg', 13, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181245/Website/Wedding/DSC_6564-min_lax7od.jpg', 9, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181245/Website/Wedding/DSC_6713-min_qmdjlf.jpg', 11, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181246/Website/Wedding/DSC_6346-min_qeuw6w.jpg', 10, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181246/Website/Wedding/DSC_6776-min_ygpapl.jpg', 8, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181248/Website/Wedding/DSC_6966-min_qyxnys.jpg', 7, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181943/Website/Wedding/DSC_2167-min_n5jghk.jpg', 6, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181944/Website/Wedding/DSC_2212_W-min_p2dtvm.jpg', 3, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181945/Website/Wedding/DSC_2339-2-min_j9trfe.jpg', 1, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181946/Website/Wedding/DSC_5068-min_sz9rvy.jpg', 20, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181947/Website/Wedding/DSC_5060-min_w7cfbw.jpg', 5, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181949/Website/Wedding/DSC_5201-min_hgjg5w.jpg', 4, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181950/Website/Wedding/DSC_5220-min_jphkhy.jpg', 2, 1),
('OurWorksImagesWedding', 'https://res.cloudinary.com/wedding-stories/image/upload/v1584181951/Website/Wedding/DSC_5241-min_eofsxd.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mstcascadeitems`
--

CREATE TABLE `mstcascadeitems` (
  `Name` varchar(50) NOT NULL,
  `ParentName` varchar(50) NOT NULL,
  `ProcessKey` varchar(50) NOT NULL,
  `Active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mstcascadeitems`
--

INSERT INTO `mstcascadeitems` (`Name`, `ParentName`, `ProcessKey`, `Active`) VALUES
('Advance Payment', 'Income', 'Transactions', 1),
('Album Cost', 'Expenditure', 'Transactions', 1),
('Editing Outsource', 'Expenditure', 'Transactions', 1),
('Freelancer Advance Payment', 'Expenditure', 'Transactions', 1),
('Freelancer Final Payment', 'Expenditure', 'Transactions', 1),
('Freelancer Workday Payment', 'Expenditure', 'Transactions', 1),
('Post Work Payment', 'Income', 'Transactions', 1),
('Transport Cost', 'Expenditure', 'Transactions', 1),
('Workday Payment', 'Income', 'Transactions', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mstmediacategories`
--

CREATE TABLE `mstmediacategories` (
  `Section` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `CategoryID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mstmediacategories`
--

INSERT INTO `mstmediacategories` (`Section`, `Type`, `Name`, `CategoryID`) VALUES
('OurWorks', 'lightbox', 'babyshoot', 'OurWorksImagesBabyShoot'),
('OurWorks', 'lightbox', 'prewedding', 'OurWorksImagesPreWedding'),
('OurWorks', 'lightbox', 'wedding', 'OurWorksImagesWedding');

-- --------------------------------------------------------

--
-- Table structure for table `mstmediatemplates`
--

CREATE TABLE `mstmediatemplates` (
  `CategoryID` varchar(50) NOT NULL,
  `Template` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mstmediatemplates`
--

INSERT INTO `mstmediatemplates` (`CategoryID`, `Template`) VALUES
('OurWorksImagesBabyShoot', '<div class=\"col-sm-6 col-md-4 #NAME# secClass\"> <a class=\"#TYPE#\" href=\"#LINK#\"> <img src=\"#LINK#\" alt=\"#NAME#\"> </a> </div>'),
('OurWorksImagesPreWedding', '<div class=\"col-sm-6 col-md-4 #NAME# secClass\"> <a class=\"#TYPE#\" href=\"#LINK#\"> <img src=\"#LINK#\" alt=\"#NAME#\"> </a> </div>'),
('OurWorksImagesWedding', '<div class=\"col-sm-6 col-md-4 #NAME# secClass\"> <a class=\"#TYPE#\" href=\"#LINK#\"> <img src=\"#LINK#\" alt=\"#NAME#\"> </a> </div>');

-- --------------------------------------------------------

--
-- Table structure for table `sqls`
--

CREATE TABLE `sqls` (
  `sqlkey` varchar(50) NOT NULL,
  `sqlstring` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sqls`
--

INSERT INTO `sqls` (`sqlkey`, `sqlstring`) VALUES
('cascade_GetClientEvents', 'SELECT e.Name \"Text\", e._id \"Value\" FROM events e WHERE e.ClientID=\"#CLIENTID#\" AND e.Status=\"Active\" ORDER by e.Name'),
('cascade_GetTransactionSubategories', 'SELECT m.Name \"Value\", m.Name \"Text\" FROM mstcascadeitems m WHERE m.Active=1 AND m.ProcessKey=\"Transactions\" AND m.ParentName=\"#CATEGORY#\" ORDER BY m.Name'),
('fetchField', 'call fetchField(\"#COLLECTIONPARAM#\",\"#TEXTPARAM#\",\"#VALUEPARAM#\")'),
('fetchField-Contacts-_id', 'SELECT CONCAT(Name,\' (\',_id,\')\') as Text, _id as Value FROM contacts WHERE Status=\'Active\''),
('FetchMediaTemplate', 'SELECT t.Template,l.Link FROM mstmediatemplates t\r\nINNER JOIN mstmediacategories c\r\non c.CategoryID=t.CategoryID\r\nINNER JOIN medialinks l\r\nON l.CategoryID=t.CategoryID\r\nWHERE c.Section=\"#SECTION#\" and c.Type=\"#TYPE#\" AND c.Name=\"#NAME#\" AND l.Active=1 ORDER BY l.Sortorder'),
('fetchReports', 'SELECT t._id, t.TransactionDate, t.Category, t.Subcategory, c.Name, c.Phone, c.Email, e.Name \"Event\", e.Venue, e.EventType, t.Amount, t.Notes FROM transactions t \r\nINNER JOIN clients c ON c._id = t.ClientID \r\nINNER JOIN events e ON e._id = t.EventID\r\nWHERE (t.TransactionDate BETWEEN \'#STARTDATE#\' AND \'#ENDDATE#\') \r\nAND (\"#CATEGORY#\" LIKE \'#%#\' OR t.Category IN (\'#CATEGORY#\'))\r\nAND (\"#EVENTID#\" LIKE \'#%#\' OR t.EventID IN (\'#EVENTID#\'))\r\nAND (\"#CLIENTID#\" LIKE \'#%#\' OR t.ClientID IN (\'#CLIENTID#\'))\r\nORDER BY t.TransactionDate DESC'),
('InsertNewUser', 'INSERT INTO users(PASSWORD,FIRSTNAME,LASTNAME,EMAIL,PHONE) VALUES(\'#PASSWORD#\',\'#FIRSTNAME#\',\'#LASTNAME#\',\'#EMAIL#\',\'#PHONE#\')'),
('read', 'CALL getReadTable(\"#COLLECTIONPARAM#\")'),
('read-Events', 'SELECT e.*, c.Name \"Client\" FROM events e INNER JOIN clients c ON c._id=e.ClientID ORDER BY e.updatedAt DESC'),
('read-Transactions', 'SELECT t.*, c.Name, e.Name \"Event\" FROM transactions t INNER JOIN clients c on c._id=t.ClientID INNER JOIN events e on e._id=t.EventID ORDER BY t.TransactionDate DESC'),
('VerifyUser', 'SELECT PASSWORD FROM users WHERE EMAIL=\'#EMAIL#\'');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `_id` int(11) NOT NULL,
  `TransactionDate` date NOT NULL,
  `Category` enum('Income','Expenditure') NOT NULL,
  `Subcategory` varchar(200) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Notes` varchar(200) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`_id`, `TransactionDate`, `Category`, `Subcategory`, `ClientID`, `EventID`, `Amount`, `Notes`, `createdAt`, `updatedAt`) VALUES
(5, '2021-06-06', 'Income', 'Advance Payment 1', 9, 6, 20, 'dsbfkjb', '2021-06-06 06:41:43', '2021-06-06 06:41:43'),
(6, '2021-06-01', 'Expenditure', 'Freelancer Payment', 9, 6, 10, 'paid', '2021-06-06 12:40:24', '2021-06-06 12:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USERID` int(10) NOT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `FIRSTNAME` varchar(50) DEFAULT NULL,
  `LASTNAME` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE` varchar(15) DEFAULT NULL,
  `LOGINATTEMPT` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USERID`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `PHONE`, `LOGINATTEMPT`) VALUES
(10, 'hello', 'Suman', 'Kumar', 'suman98kumar@gmail.com', '09903220336', 0),
(11, '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`Name`,`Phone`,`Email`),
  ADD UNIQUE KEY `UNQ_Contacts_ID` (`_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Name`,`ClientID`),
  ADD UNIQUE KEY `UNQ_ID` (`_id`);

--
-- Indexes for table `medialinks`
--
ALTER TABLE `medialinks`
  ADD PRIMARY KEY (`CategoryID`,`Link`);

--
-- Indexes for table `mstcascadeitems`
--
ALTER TABLE `mstcascadeitems`
  ADD PRIMARY KEY (`Name`,`ParentName`,`ProcessKey`);

--
-- Indexes for table `mstmediacategories`
--
ALTER TABLE `mstmediacategories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `mstmediatemplates`
--
ALTER TABLE `mstmediatemplates`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `sqls`
--
ALTER TABLE `sqls`
  ADD PRIMARY KEY (`sqlkey`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `FK_EventID` (`EventID`),
  ADD KEY `FK_ClientID` (`ClientID`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USERID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USERID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medialinks`
--
ALTER TABLE `medialinks`
  ADD CONSTRAINT `FK_Links_CategoryID` FOREIGN KEY (`CategoryID`) REFERENCES `mstmediacategories` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mstmediatemplates`
--
ALTER TABLE `mstmediatemplates`
  ADD CONSTRAINT `FK_Templates_CategoryID` FOREIGN KEY (`CategoryID`) REFERENCES `mstmediacategories` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `FK_ContactID` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`_id`),
  ADD CONSTRAINT `FK_EventID` FOREIGN KEY (`EventID`) REFERENCES `events` (`_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
