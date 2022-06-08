SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `client_information` (
  `id` int(6) NOT NULL,
  `clientid` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `street address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `client_messages` (
  `id` int(6) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `client_accounts` (
  `id` int(6) NOT NULL,
  `clientid` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `client_orders` (
  `id` int(6) NOT NULL,
  `clientid` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `street address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `trackingNo` varchar(255) NOT NULL,
  `orderNo` varchar(255) NOT NULL,
  `item1` int(100) NOT NULL,
  `item2` int(100) NOT NULL,
  `item3` int(100) NOT NULL,
  `item4` int(100) NOT NULL,
  `item5` int(100) NOT NULL,
  `item6` int(100) NOT NULL,
  `item7` int(100) NOT NULL,
  `item8` int(100) NOT NULL,
  `item9` int(100) NOT NULL,
  `item10` int(100) NOT NULL,
  `item11` int(100) NOT NULL,
  `item12` int(100) NOT NULL,
  `item13` int(100) NOT NULL,
  `item14` int(100) NOT NULL,
  `item15` int(100) NOT NULL,
  `item16` int(100) NOT NULL,
  `item17` int(100) NOT NULL,
  `item18` int(100) NOT NULL,
  `item19` int(100) NOT NULL,
  `item20` int(100) NOT NULL,
  `item21` int(100) NOT NULL,
  `item22` int(100) NOT NULL,
  `item23` int(100) NOT NULL,
  `item24` int(100) NOT NULL,
  `item25` int(100) NOT NULL,
  `item26` int(100) NOT NULL,
  `item27` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `client_information` (`id`, `clientid`, `image`, `firstname`, `lastname`, `email`, `mobile`, `street address`, `city`, `barangay`) VALUES
(1, '638916278d630b6121', 'default.jpg', 'Bernard', 'Sapida', 'burgerhub@gmail.com', '', '', '', ''),
(2, '297196278d6238832f', 'default.jpg', 'Bernard', 'Sapida', 'bernard.sapida@cvsu.edu.ph', '', '', '', '');

INSERT INTO `client_accounts` (`id`, `clientid`, `image`, `fullname`, `email`, `password`, `type`, `date`) VALUES
(1, '638916278d630b6121', 'default.jpg', 'Bernard Sapida', 'burgerhub@gmail.com', '$2y$10$uAZNcNZonOAGcZFiVnYCsOWWa7Dy8afLmgGac5iboe/PFZtMuNzyW', 'admin', '2022-05-09 12:50:57'),
(2, '297196278d6238832f', 'default.jpg', 'Bernard Sapida', 'bernard.sapida@cvsu.edu.ph', '$2y$10$FKMuc5MuVh5dGhPKmtUPeemOvTd9thIFwjZKuR0WuLiWh6Aqy5OfG', 'client', '2022-05-09 14:39:41');

ALTER TABLE `client_information`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `client_messages`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `client_accounts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `client_orders`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `client_information`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

ALTER TABLE `client_messages`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

ALTER TABLE `client_orders`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

ALTER TABLE `client_accounts`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;