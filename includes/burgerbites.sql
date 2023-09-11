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
  `transactionNo` varchar(255) NOT NULL,
  `orderNo` varchar(255) NOT NULL,
  `featured-product-1` int(100) NOT NULL,
  `featured-product-2` int(100) NOT NULL,
  `featured-product-3` int(100) NOT NULL,
  `Spicy Lamb Burger` int(100) NOT NULL,
  `Surf n Turf Burger` int(100) NOT NULL,
  `Peppercorn Burger` int(100) NOT NULL,
  `Vegan Burger` int(100) NOT NULL,
  `Blackjack Burger` int(100) NOT NULL,
  `American Classic Burger` int(100) NOT NULL,
  `Supreme Pizza` int(100) NOT NULL,
  `Bacon Chilli Pizza` int(100) NOT NULL,
  `BBQ Chicken Pizza` int(100) NOT NULL,
  `Creole Shrimp Pizza` int(100) NOT NULL,
  `Cheese Pizza` int(100) NOT NULL,
  `Hawaiian Pizza` int(100) NOT NULL,
  `Barbeque Fries` int(100) NOT NULL,
  `Cheddar Cheese Fries` int(100) NOT NULL,
  `Chili Barbeque Fries` int(100) NOT NULL,
  `Salted Fries` int(100) NOT NULL,
  `Sour Cream Fries` int(100) NOT NULL,
  `Wasabi Fries` int(100) NOT NULL,
  `Avocado Shake` int(100) NOT NULL,
  `Berry Shake` int(100) NOT NULL,
  `Lemonade Shake` int(100) NOT NULL,
  `Mango Shake` int(100) NOT NULL,
  `Pineapple Shake` int(100) NOT NULL,
  `Strawberry Shake` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `client_information` (`id`, `clientid`, `image`, `firstname`, `lastname`, `email`, `mobile`, `street address`, `city`, `barangay`) VALUES
(1, '638916278d630b6121', 'default.jpg', 'Bernard', 'Sapida', 'BurgerBites@gmail.com', '', '', '', ''),
(2, '297196278d6238832f', 'default.jpg', 'Bernard', 'Sapida', 'bernard.sapida@cvsu.edu.ph', '', '', '', '');

INSERT INTO `client_accounts` (`id`, `clientid`, `image`, `fullname`, `email`, `password`, `type`, `date`) VALUES
(1, '638916278d630b6121', 'default.jpg', 'Bernard Sapida', 'BurgerBites@gmail.com', '$2y$10$uAZNcNZonOAGcZFiVnYCsOWWa7Dy8afLmgGac5iboe/PFZtMuNzyW', 'admin', '2022-05-09 12:50:57'),
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