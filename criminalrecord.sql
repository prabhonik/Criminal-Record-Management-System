-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 02:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `criminalrecord`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` varchar(20) NOT NULL,
  `categoryname` varchar(20) NOT NULL,
  `descripton` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`, `descripton`) VALUES
('CAT00001', 'Murder', 'Taking ones life through aay means is a offence under section 25A Chapter4.');

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `court_id` varchar(20) NOT NULL,
  `courttype` varchar(50) NOT NULL,
  `courtname` varchar(50) NOT NULL,
  `courtplace` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`court_id`, `courttype`, `courtname`, `courtplace`) VALUES
('court00001', 'District Court', 'Udupi District Court', 'Bhramagiri, Udupi');

-- --------------------------------------------------------

--
-- Table structure for table `courttype`
--

CREATE TABLE `courttype` (
  `typename` varchar(25) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courttype`
--

INSERT INTO `courttype` (`typename`, `description`) VALUES
('District Court', 'The District Courts of India are the district courts of the State governments in India for every district or for one or more districts together taking into account of the number of cases, population distribution in the district. They administer justice in India at a district level.\r\n\r\nThe Civil Court District Court is judged by District and Sessions Judge.This is the principal court of original civil jurisdiction besides the High Court of the State and which derives its jurisdiction in civil matters primarily from the code of civil procedure. The district court is also a court of sessions when it exercises its jurisdiction on criminal matters under the Code of Criminal procedure. The district court is presided over by a district judge appointed by the state governor with on the advice of chief justice of that high court. In addition to the district judge there may be a number of additional district judges and assistant district judges depending on the workload. The additional district judge and the court presided have equivalent jurisdiction as the district judge and his district court.\r\n\r\nHowever, the district judge has supervisory control over additional and assistant district judges, including decisions on the allocation of work among them. The district and sessions judge is often referred to as \"district judge\" when presiding over civil matters and \"sessions judge\" when presiding over criminal matters. Being the highest judge at district level, the district judge also enjoys the power to manage the state funds allocated for the development of judiciary in the district.\r\n\r\nThe district judge is also called \"metropolitan session judge\" when presiding over a district court in a city which is designated \"metropolitan area\" by the state. Other courts subordinated to district court in the metropolitan area are also referred to with \"metropolitan\" prefixed to the usual designation. An area is designated a metropolitan area by the concerned state government if population of the area exceeds one million or more.'),
('High Court', 'The high courts of India are the principal civil courts of original jurisdiction in each state and union territory. However, a high court exercises its original civil and criminal jurisdiction only if the subordinate courts are not authorized by law to try such matters for lack of pecuniary, territorial jurisdiction. High courts may also enjoy original jurisdiction in certain matters, if so designated specifically in a state or federal law.\r\n\r\nBasically, the work of most high courts primarily consists of appeals from lower courts and writ petitions in terms of Articles 226 and 227 of the constitution. Writ jurisdiction is also an original jurisdiction of a high court.\r\n\r\nEach state is divided into judicial districts presided over by a district and sessions judge. He is known as district judge when he presides over a civil case, and session\'s judge when he presides over a criminal case. He is the highest judicial authority below a high court judge. Below him, there are courts of civil jurisdiction, known by different names in different states. Under Article 141 of the constitution, all courts in India — including high courts — are bounded by the judgments and orders of the Supreme Court of India by precedence.\r\n\r\nJudges in a high court are appointed by the President of India in consultation with the Chief Justice of India and the governor of the state. High courts are headed by a chief justice. The chief justices rank fourteenth (within their respective states) and seventeenth (outside their respective states) on the Indian order of precedence. The number of judges in a court is decided by dividing the average institution of main cases during the last five years by the national average, or the average rate of disposal of main cases per judge per year in that High Court, whichever is higher.'),
('Lower Court', 'In some States, there are some lower courts (below the District Courts) called Munsif\'s Courts and Small Causes Courts. These courts only have original jurisdiction and can try suits up to a small amount. Thus, Presidency Small Causes Courts cannot entertain a suit in which the amount claimed exceeds Rs 2,000. However, in some States, civil courts have unlimited pecuniary jurisdiction. Judicial officers in these courts are appointed on the basis of their performance in competitive examinations held by the various States\' Public Service Commissions.'),
('Supreme Court Of India', 'The Supreme Court of India is the supreme judicial body of India and the highest court of India under the constitution. It is the most senior constitutional court, and has the power of judicial review. The Chief Justice of India is the head and chief judge of the Supreme Court and the court consists of a maximum of 34 judges and it has extensive powers in the form of original, appellate and advisory jurisdictions. It is regarded as the most powerful public institution in India.\r\nAs the constitutional court of the country, it takes up appeals primarily against verdicts of the high courts of various states of the Union and other courts and tribunals. It safeguards fundamental rights of citizens and settles disputes between various government authorities as well as the central government vs state governments or state governments versus another state government in the country. As an advisory court, it hears matters which may specifically be referred to it under the Constitution by President of India. The law declared by the Supreme Court becomes binding on all courts within India and also by the union and state governments. As per the Article 142 of the Constitution, it is the duty of the President of India to enforce the decrees of the Supreme Court and the court is conferred with the inherent jurisdiction to pass any order deemed necessary in the interest of justice. The Supreme Court has replaced the British Privy Council as the highest court of appeal.');

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `crime_id` varchar(20) NOT NULL,
  `criminalname` varchar(30) NOT NULL,
  `criminalcategory` varchar(20) NOT NULL,
  `criminalprison` varchar(25) NOT NULL,
  `criminalcourt` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `place` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`crime_id`, `criminalname`, `criminalcategory`, `criminalprison`, `criminalcourt`, `date`, `place`, `description`) VALUES
('crim000001', 'Mohammad Asim', 'Murder', 'Karkala', 'High Court', '2021-01-03', 'Mangalore', 'Mohammad asim killed 15year boy outside his school in Mangalore brutally. The boy had a wound in stomach. The report from fiorensic yet to come. The invsetigation is still in progress. The fir is registered under section 11/25A.');

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `Crimnal_id` varchar(20) NOT NULL,
  `criminalname` varchar(30) NOT NULL,
  `aliasname` varchar(30) NOT NULL,
  `criminalmobile` int(10) NOT NULL,
  `criminalemail` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `criminaldob` date NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `race` varchar(20) NOT NULL,
  `criminalcity` varchar(30) NOT NULL,
  `criminalstate` varchar(25) NOT NULL,
  `criminalcountry` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`Crimnal_id`, `criminalname`, `aliasname`, `criminalmobile`, `criminalemail`, `gender`, `height`, `weight`, `criminaldob`, `nationality`, `race`, `criminalcity`, `criminalstate`, `criminalcountry`) VALUES
('crim0001', 'Mimamad ghazani', 'cyanide ghazni', 2147483647, 'ghazanitheterror@gmail.com', 'male', 7, 74, '1987-06-01', 'Bangladesh', 'Asian', 'Bhatkal', 'Karnataka', 'India'),
('crim0002', 'wilson', 'acid son', 915422567, '', 'male', 7, 52, '1980-01-29', 'indian', 'asian', 'thiruvananthapuram', 'kerala', 'India'),
('crim0003', 'Mohamad Salim', 'acid mohamad', 0, '', 'male', 7, 68, '2021-01-12', 'pakistan', 'asian', 'Kolkata', 'West Bengal', 'India'),
('crim0004', 'Momamd Bin tuglaq', 'acid binna', 0, '', 'Male', 0, 68, '2021-01-14', 'pakistan', 'asian', 'Islamabad', 'Gujurat', 'India'),
('crim0005', 'sunil', 'acid sunila', 0, '', 'male', 7, 50, '1975-01-07', 'indian', 'asian', 'Vamanjur', 'KARNATAKA', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `crudential`
--

CREATE TABLE `crudential` (
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crudential`
--

INSERT INTO `crudential` (`name`, `email`, `username`, `password`) VALUES
('Nikhil Prabhu K', 'nikhilprabhuk7@gmail.com', 'ADMIN0001', '12345@sS');

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `policename` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `policeemobile` int(10) NOT NULL,
  `policeemail` varchar(25) NOT NULL,
  `policedob` varchar(20) NOT NULL,
  `policeaddress` text NOT NULL,
  `policecity` varchar(25) NOT NULL,
  `policestate` varchar(20) NOT NULL,
  `policecountry` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`policename`, `username`, `password`, `policeemobile`, `policeemail`, `policedob`, `policeaddress`, `policecity`, `policestate`, `policecountry`) VALUES
('Arjun Kini', 'kiniarjun', '12345@aA', 2147483647, 'arjunkini@gmail.com', '2000-01-20', 'salmar', 'KARKALA', 'Karnataka', 'India'),
('Nikhil Prabhu K', 'NAMONIK', '12345@sS', 2147483647, 'prabhonik@gmail.com', '2021-01-01', '55/1, Ward 4', 'Main Road, Karkala', 'Karnataka', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `prison`
--

CREATE TABLE `prison` (
  `prison_id` varchar(20) NOT NULL,
  `prisonname` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prison`
--

INSERT INTO `prison` (`prison_id`, `prisonname`, `description`) VALUES
('pri0001', 'karkala cell', 'capacity of 500 with 50 guards. 5 voulnteers prisoners prepare the food for whole.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`court_id`);

--
-- Indexes for table `courttype`
--
ALTER TABLE `courttype`
  ADD PRIMARY KEY (`typename`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`crime_id`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`Crimnal_id`);

--
-- Indexes for table `crudential`
--
ALTER TABLE `crudential`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `prison`
--
ALTER TABLE `prison`
  ADD PRIMARY KEY (`prison_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
