-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 04:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_by` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `product_cat_id` int(11) NOT NULL,
  `product_rating` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_desc`, `product_price`, `product_by`, `product_image`, `time`, `product_cat_id`, `product_rating`) VALUES
(1, 'Nike Air Force ', 'Nike Air Force 1\'07 Low White (all size)', 15000, '2', 'https://images.stockx.com/images/Nike-Air-Force-1-Low-White-07_V2-Product.jpg?fit=fill&bg=FFFFFF&w=700&h=500&fm=webp&auto=compress&q=90&dpr=2&trim=color&updated_at=1631122839', '2022-06-28 17:12:40', 6, '5'),
(2, 'PS4 PlayStation 4', 'PS4 PlayStation 4 Sony Original Slim Pro 500GB 1TB 2TB Console Used Ship first', 50000, '2', 'https://i.ebayimg.com/images/g/OJ0AAOSwWl1iBoA0/s-l500.jpg', '2022-06-28 17:12:40', 1, '4.5'),
(6, 'Fashion Glass', 'nice glass', 3000, '3', 'https://cdn-images.farfetch-contents.com/16/66/60/09/16666009_36378772_300.jpg', '2022-06-28 17:55:46', 4, '3.5'),
(9, 'Sneakers White', 'This is good shoe', 5000, '3', 'https://www.versace.com/dw/image/v2/ABAO_PRD/on/demandware.static/-/Sites-ver-master-catalog/default/dw6b909ab1/original/90_DST030G-DT21_DBN9_20_BaroccoPrintChainReaction2Trainers-Sneakers-versace-online-store_4_1.jpg?sw=850&sh=1200&sm=fit', '2022-06-29 10:08:51', 6, '5'),
(40, 'gaming mouse', '2400 DPI \n10M Clicks \n16.8 Millions Colors \nWired RGB Backlit', 1500, '2', 'https://static-01.daraz.com.np/p/87eeeb5da91229b6b205c229c49176d3.jpg_400x400q75-product.jpg_.webp', '2022-07-03 13:16:29', 1, '4'),
(42, 'GP-45 Gaming Pad', 'Wireless gamepad with built-in battery Included smartphone clip', 2000, '8', 'https://static-01.daraz.com.np/p/de406024ca1ed45fa71dc5d7f7b2925d.jpg', '2022-07-03 13:23:49', 1, '3.5'),
(43, 'Whole Wheat Aata', 'Less Fat Low Cholestrol Healthy and nutritious Keeps you full and healthy', 100, '1', 'https://static-01.daraz.com.np/p/e3a2b1a832ace57fd6bae97e469c7280.jpg', '2022-07-03 13:27:46', 9, '4.4'),
(44, ' Ganesh Printed T-Shirt', 'Featuring a round neckline and half sleeves, it is decorated with a attractive print on the front. Fashioned from cotton for a luxe effect. Fabric : 100% Cotton.', 300, '7', 'https://static-01.daraz.com.np/p/16879a5f6a83e2cc47464c1452b66061.jpg', '2022-07-03 13:32:36', 4, '4'),
(45, 'Mens Wind Cheater', 'Wind Proof- Dust Proof -Double layered', 900, '8', 'https://static-01.daraz.com.np/p/a6c7b7d972488fcc6f6079bdc8c90803.jpg', '2022-07-03 13:35:03', 4, '4'),
(46, 'Goldstar J Boot', 'Material: Synthetic Closure: Lace-Up Type: Trekking Full Boot Tip Shape: Round Cushioned Insole', 1100, '7', 'https://static-01.daraz.com.np/p/dfa69cfca7fa8f144d2832999ad26b11.jpg', '2022-07-03 13:36:27', 4, '3.9'),
(48, 'Plain Cap For Men', 'Main Material: Cotton Adjustable back strap Fit: Regular Fit Style: solid', 400, '8', 'https://static-01.daraz.com.np/p/d82925cf3ee1c4815d986327bbb4e432.jpg', '2022-07-03 13:37:57', 4, '3'),
(49, 'Super Sunglasses', 'Frame Material:Poycarbonate Lenses Material:CR-39 Style:Korean Lens Width:c2', 400, '7', 'https://static-01.daraz.com.np/p/b1e3bbba043f5a2bd7f541a4fbd2f948.jpg', '2022-07-03 13:40:36', 4, '3.2'),
(50, ' Printed Face Mask', 'Material: Cotton Adjustable Nose Pin Washable 5 Layer Mask Stylish Design', 400, '8', 'https://static-01.daraz.com.np/p/feec3a497cf66306f8cb8dd9bec03192.jpg', '2022-07-03 13:42:35', 4, '4.6'),
(51, 'Premium Choose Jeans ', 'Closure Type: Zipper Fly Waist Type: Mid Pattern Type: Solid Material: Denim Item Type: JEANS Thickness: Midweight Fabric Type: Softener', 1600, '8', 'https://static-01.daraz.com.np/p/b0602607c93a56fac01d32ae4b286f15.jpg', '2022-07-03 13:45:41', 4, '4'),
(52, 'Wallet For Ladies', 'Material Composition: PU LEATHERP Decoration: Lacewallet Width: short Closure Type: zipper', 500, '1', 'https://static-01.daraz.com.np/p/dd83476b5d3726592fbb13f6dfa87e7a.jpg', '2022-07-03 13:48:40', 4, '4.1'),
(53, 'Shoulder Bags', 'Durable And Waterproof Crossbody Bag, Cool And Fancy Bag Stylish And Fashionable', 1500, '1', 'https://static-01.daraz.com.np/p/4836288fa7f071fc2db59997cc76bf09.jpg', '2022-07-03 13:51:40', 4, '3.5'),
(54, 'T500 Smart Watch', 'GPS Tracker Bluetooth Call 44MM Body Temperature ECG Heart Rate Monitor Smartwatch PK iwo T500 T600', 1200, '2', 'https://static-01.daraz.com.np/p/ccbf30efee82e6728afbf6d59d189361.jpg_400x400q75-product.jpg_.webp', '2022-07-03 13:54:53', 1, '3.5'),
(55, 'Bluetooth earphones', 'HE05 Bluetooth 5.0 Wireless IPX5 Waterproof Noise Cancelling Earphones Magnetic Neckband Earphones Sport Earbuds With Mic', 900, '8', 'https://static-01.daraz.com.np/p/e818dda9e00c8e6f6b30d08d95a258f3.jpg', '2022-07-03 13:58:00', 1, '4.2'),
(56, 'Portable Mini Clip Fan', 'Specification= 180 mm Rated voltage= 220v Rated frequency= 50hz Power rating= 30w Strong/weak two gear wind speed, swing angle, pitching angle adjustment.', 800, '1', 'https://static-01.daraz.com.np/p/c4932d72ce8e6984f0aa13b46148f628.jpg', '2022-07-03 13:59:48', 1, '3'),
(57, 'USB C To Lightning Cable', 'Faster 3A PD Charging Access: With this C94 Lightning connector Fast Data Transferring Everlasting Durability', 900, '8', 'https://static-01.daraz.com.np/p/d004ebc8d647a9a9e5c683072fc2cd68.jpg', '2022-07-03 14:01:11', 1, '4.8'),
(58, ' ERKE Sports Sneakers', 'Sole Material:Mesh/ Micro Fiber/Phylon/RB Closing: Lace Up Fit: Regular Keep your feet at comfort all day long Comfort and flexibility throughout the wear.', 6000, '1', 'https://static-01.daraz.com.np/p/9731554370730608e747fba530b2f945.jpg', '2022-07-03 14:03:15', 5, '4.0'),
(59, 'Wrist Support Strap', 'Universally sized, manufactured with Anti-Bacterial material Made from high grades materials Our brace will stabilize your Wrist, preventing injury and help healing.', 400, '2', 'https://static-01.daraz.com.np/p/05e8a177dfebbe730b6ac6e198353e9b.jpg', '2022-07-03 14:06:01', 5, '3'),
(60, 'Leather Gym Belt', 'Applicable People:Universal Material:Leather, metal buckle item:weightlifting Belt material:Leather, metal buckle color:black', 2600, '1', 'https://static-01.daraz.com.np/p/cfb49b0da7c6a6792b643c222fb96771.jpg', '2022-07-03 14:08:32', 5, '3.8'),
(61, 'Antique Copper Quartz Pocket Watch', 'Peaky Blinder inspired antique quartz pocket watch ', 500, '2', 'https://static-01.daraz.com.np/p/0f791ed3f28561aa1e246fa65cd21424.jpg', '2022-07-03 14:11:25', 7, '3.7'),
(62, 'Digital Watch', 'Dial Size 56mm Dial Color Grey Strap Material Plastic Strap Color blue Water Resistant 2 year Manufacturing Warranty', 3000, '3', 'https://static-01.daraz.com.np/p/9b2bf92ccbc103e40362394baaafc567.jpg', '2022-07-03 14:12:27', 7, '4.2'),
(63, 'Vintage Watch For Women', 'Vintage watch special design to show womens grace and beauty. Strap MaterialLeather', 500, '7', 'https://static-01.daraz.com.np/p/9a78f83feb2633628dc179c9854105d7.jpg', '2022-07-03 14:14:03', 7, '3.7'),
(64, 'Round Dial Slim Body Watch ', 'Item Type: Quartz Wristwatches Band Width: 20mm Movement: Quartz Band Material Type: Leather', 600, '7', 'https://static-01.daraz.com.np/p/2cc5c64c264538c43d91e5aad84d2061.jpg', '2022-07-03 14:15:56', 7, '4'),
(65, '37 Keys Melodica With Hardcase', 'Brand : JDR Stable tuning Includes both a fixed mouthpiece and a flexible air tube 37 keys melodica / painica', 2000, '2', 'https://static-01.daraz.com.np/p/b304a65c58ed71dbe9977f0846d99145.jpg', '2022-07-03 14:17:27', 2, '4'),
(66, 'ADMINI-M-OP-W Acoustic Guitar', 'SpecificationsBody Shape Dreadnought Body 3/4 sizedBody MaterialMahogany Fretboard Material Rosewood or Merbau Scale Length22.8\" (578mm) No. of Frets19 Fretboard InlaysDot BridgeRosewood or Merbau CaseGig Bag', 20000, '2', 'https://static-01.daraz.com.np/p/e50e459eda823f59ea77c3b3ab81baa8.png', '2022-07-03 14:18:50', 2, '4'),
(67, 'Mouth Harmonica', 'Small And Portable Size High Quality Material  Non-toxic food grade ABS Resin that is lib-friendly and safe to use for kids.', 500, '3', 'https://static-01.daraz.com.np/p/677ebc868468f19ec8f1c3832c662a93.jpg', '2022-07-03 14:20:20', 2, '3.5'),
(68, 'Bamboo Flute', 'Size: 19 Inch Holes: 8 Scale: C Material: Bamboo The approximate length of flute is 19 inches, and diameter 0.8 inches.', 600, '7', 'https://static-01.daraz.com.np/p/e6c63fb07b942faabfc6ec47e7ac131d.jpg', '2022-07-03 14:21:26', 2, '3.9'),
(69, 'Manaslu Danfe 24\" Concert Ukulele', 'Brand: Manaslu Model: Danfe 24inch Concert Ukulele Top,Back & Side : \"A\" Grade Sapele Neck: Mahogany String: Aquila Machine Head: Die Cast Quality Key Nut & Saddle: Hard Plastic Fingerboard & Bridge: Indian Rosewood Fret: 18fret Finish: Matt', 4000, '8', 'https://static-01.daraz.com.np/p/316767354e266c25f1e3a1e07b60ab26.jpg', '2022-07-03 14:22:42', 2, '3.6'),
(70, 'Professional 3.5 Kg Copper Tabla ', 'PROFESSIONALLY TESTED – INSTRUMENT HAND CRAFTED DESIGNER COPPER BAYAN 3.5 KG, SHEESHAM WOOD DAYAN TUNED TO C#, SPECIAL HAND MADE BRAIDED PUDDIS PROFESSIONAL QUALITY TABLA SET', 25000, '1', 'https://static-01.daraz.com.np/p/51583926d6ba2c9e58c34df68ce2bb67.jpg', '2022-07-03 14:25:05', 2, '3.5'),
(71, 'Sky Yoga Mat 5Mm', 'Phthalate-free dyes and inks Very durable Heavy metal-free and latex-free', 800, '1', 'https://static-01.daraz.com.np/p/3f884d7931ba11b622a1d37ba20ec41c.jpg', '2022-07-03 14:26:27', 5, '3.6'),
(72, 'Resistance Bands', '100% brand new & high quality Material: TPR Exercise tube length 120cm The resistance rope offer the versatility and quality that you need for your best workout.', 600, '2', 'https://static-01.daraz.com.np/p/84bb3761d7e20033e2be5f9f6e043dad.jpg', '2022-07-03 14:29:22', 5, '3.5'),
(73, 'Office Chair HIK-M31A Black nilon', 'Type: Office Chair Code:HIK-M31A Material: Plastic and Net Fixed Arm Ergonomic Chair Dimension(L x B inch): 40 x 18', 8500, '8', 'https://static-01.daraz.com.np/original/6800620fa4ab99d80db9f070a7968bd1.jpg', '2022-07-03 14:32:18', 8, '3.7'),
(74, 'Multipurpose Laptop Table', 'VERSATILITY TABLE PRE-ASSEMBLED & SMART DESIGN FOLD OUT DESIGN -SAVING SPACES! FOLDING SIZE Size: 60x40x28cm', 900, '3', 'https://static-01.daraz.com.np/p/4fd1e25724cfcd69cc9da648b9894abc.jpg', '2022-07-03 14:34:08', 8, '4.8'),
(75, '6 Layers Shoe Rack', 'he 6 Layers shoe rack provide hugespace to contain your shoes. Constructed from selected non-woven fabric, high quality steel tube and PP plastic connectors, this shoe tower will offer you long term organization system.', 2100, '8', 'https://static-01.daraz.com.np/p/2f8fc17f66f8682ff6e2282572d7a520.jpg', '2022-07-03 14:35:53', 8, '3.5'),
(76, 'Portable Storage Wardrobe', 'Size - 120 cm wide, 50cm deep, 175 cm high 2 Doors Shelves are made of rod for more durability Installation–as per installation manual. It will take 30-40 mins and no tools required.', 3400, '7', 'https://static-01.daraz.com.np/p/35d1d0eb66922ce1df28b8aab473df72.jpg', '2022-07-03 14:39:08', 8, '3.7'),
(77, 'Round Brown Small Teatable', 'This morden table can be used as a side table next to the couch, a coffee table in the living room, a bedside table next to the bed, a storage table in the hallway, or a small tea table in the yard.This small round table can not only be compatible with any home decor and furniture, but also bring a elegant decoation to your home.', 3800, '3', 'https://static-01.daraz.com.np/p/d73c2326b37a5fb63d921758ec11fe5c.jpg', '2022-07-03 14:43:44', 8, '3.9'),
(78, 'Q&U Furniture King Size Bed', 'E1 European Standard Manufactured in HongKong King Size Bed (L*B = 7 feet * 5 feet) Made of Quality Solid Wood 1 Year Guarantee 10 Year Warranty', 79000, '1', 'https://static-01.daraz.com.np/p/cb01f80f9d930e48bb643342f7789095.jpg', '2022-07-03 14:45:46', 8, '4.8'),
(79, 'Gyan Chhaki Aata -2Kg', 'Healthy and nutritious Keeps you full and healthy Less Fat Low Cholestrol', 200, '7', 'https://static-01.daraz.com.np/p/9a24f7b8c45b9d1bdd55f4a19e6ca25a.jpg', '2022-07-03 14:46:32', 9, '3.5'),
(80, 'Big Choice Jeera Masino Rice 25kg', 'Superior quality, excellent in taste and rich in nutrients. Health beneficial facts such as low in cholesterol, low in saturated fat, good source of folate, vitamin B, etc High in quality with delectable taste. Best for everyday consumption', 1800, '7', 'https://static-01.daraz.com.np/p/55e824406d584014bca23e9b2dc09bd7.jpg', '2022-07-03 14:51:05', 9, '4'),
(81, 'Big Choice Moong Dal -1Kg', 'Store in a cool and dry place No added preservatives Nutritious and healthy', 200, '3', 'https://static-01.daraz.com.np/p/882206d4aa99b25c0c0aaeae9d72a955.jpg', '2022-07-03 14:52:10', 9, '4'),
(82, 'Kelloggs Cornflakes', 'Nutritious and healthy Healthy breakfast cereal Wholesome tasty nutrition 875 g', 700, '3', 'https://static-01.daraz.com.np/p/18b3d4cddb7eca3a59d8cab01163b89f.jpg', '2022-07-03 14:54:54', 9, '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
