-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 10, 2020 at 01:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hellophones`
--

-- --------------------------------------------------------

--
-- Table structure for table `blanch`
--

CREATE TABLE `blanch` (
  `IDBranch` int(11) NOT NULL,
  `BranchName` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blanch`
--

INSERT INTO `blanch` (`IDBranch`, `BranchName`, `Address`) VALUES
(1, 'KCT Branch', 'Kigali City Tower'),
(2, 'UTC Branch', 'UTC ville');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `IDInvoice` int(11) NOT NULL,
  `InvoiceNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`IDInvoice`, `InvoiceNumber`) VALUES
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `IDMail` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `Time` int(11) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `IDPrice` int(11) NOT NULL,
  `IDProduct` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`IDPrice`, `IDProduct`, `Price`) VALUES
(4, 12, 1100);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `measure` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `flaturedimage` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `IDBranch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `product_name`, `brand`, `price`, `quantity`, `TotalPrice`, `measure`, `description`, `flaturedimage`, `status`, `date`, `IDUser`, `IDBranch`) VALUES
(12, 'Phenol', 'GNFC', 1000, 100, 100000, 'metric tonnes', 'asdkhwdkwhf', '', 'active', '2020-05-10', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `IDProduct` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `SupplierName` varchar(100) NOT NULL,
  `SupplierPhone` varchar(30) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `IDBranch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `IDProduct`, `Quantity`, `Price`, `TotalPrice`, `SupplierName`, `SupplierPhone`, `Date`, `IDUser`, `IDBranch`) VALUES
(7, 12, 100, 1000, 100000, 'GNFC', '(123) 456-7899', '2020-05-10', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesid` int(20) NOT NULL,
  `IDProduct` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `QuatityInStore` int(11) NOT NULL,
  `QuantitySold` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `AmountPaid` int(11) NOT NULL,
  `Balance` int(11) NOT NULL,
  `ClientName` varchar(100) NOT NULL,
  `PhoneNumber` varchar(30) DEFAULT NULL,
  `SaleDate` varchar(30) NOT NULL,
  `IDInvoice` int(11) NOT NULL,
  `IDUSer` int(11) NOT NULL,
  `IDBranch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesid`, `IDProduct`, `Price`, `QuatityInStore`, `QuantitySold`, `TotalPrice`, `AmountPaid`, `Balance`, `ClientName`, `PhoneNumber`, `SaleDate`, `IDInvoice`, `IDUSer`, `IDBranch`) VALUES
(11, 12, 1100, 200, 100, 110000, 110000, 0, 'abc', '(123) 456-7899', '2020-05-10', 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(25) NOT NULL,
  `e-mail` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `passwourd` varchar(35) NOT NULL,
  `role` varchar(45) NOT NULL,
  `activate` varchar(50) NOT NULL,
  `profilepicture` varchar(55) NOT NULL,
  `IDBranch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `address`, `e-mail`, `username`, `passwourd`, `role`, `activate`, `profilepicture`, `IDBranch`) VALUES
(4, 'Shail Patel', 'Ahmedabad', 'shailp52@gmail.com', 'manager', '12345', 'Manager', 'Activate', 'roberto.jpg', 2),
(5, 'NEMA Roy', 'Kicukiro', 'nemaroy@gmail.com', 'nemaroy', '12345', 'Seller', 'Activate', 'AD-letter-logo-advanced-dental-designs-inc-logo.png', 2),
(6, 'IRERA Brown', 'kanombe', 'irera@yahoo.fr', 'irera', '12345', 'Seller', 'Activate', 'ad-logo1_1x.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blanch`
--
ALTER TABLE `blanch`
  ADD PRIMARY KEY (`IDBranch`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`IDInvoice`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`IDMail`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`IDPrice`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blanch`
--
ALTER TABLE `blanch`
  MODIFY `IDBranch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `IDInvoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `IDMail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `IDPrice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
