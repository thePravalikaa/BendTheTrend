-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 06:05 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bend_the_trend`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `p_id`, `qty`, `size`) VALUES
(9, 16, 3, 'Medium');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Formals', 'Casual, Contemporary Wear To Work. Moreover,\r\nWear What Works !!!\r\n'),
(2, 'Party Wear', 'Finding your dream going out gear has never been easier.From figure-flattering midi dresses to outfit-making accessories, we\'ve got everything you need to dazzle after dark!!!'),
(3, 'Feminine', 'Unabashedly feminine pieces. New classics. Get ready to swoon over these ultra-chic clothes, shoes and accessories from the masters of effortless Parisian style.'),
(4, 'Summer Special', 'Great Summer Vibes. Presenting you the exclusive collection, latest trends, and designs by our Fashion co-ordinators.'),
(5, 'Spring Sale', 'BIG SPRING SALE NOW\r\nUP TO 80% OFF\r\nAMAZING STEALS FROM $13.99');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`) VALUES
(7, 1, 3, '2018-04-11 16:49:12', 'Nice Solid Long Jacket With Lace', 'fur coat with button1.jpg', 'fur coat with button2.jpg', 'fur coat with button3.jpg', 180, '<p>Classic, versatile styling in premium Italian wool, exclusive to L.L.Bean. 100% wool knit crepe. Dry clean. Keeps rich texture for years. Deep shades do not fade over time. Stand collar. Hidden full-button placket and zippered security pocket. Unlined with finished seams.</p>', 'Leather Jackets'),
(8, 1, 3, '2018-04-11 16:47:29', 'Sleeveless Faux Fur Hybrid Jacket', 'Black Blouse Versace Coat1.jpg', 'Black Blouse Versace Coat2.jpg', 'Black Blouse Versace Coat3.jpg', 150, '<p>Surprise showers are no reason to change your plans, just slip into this sleek trench coat, a perennial bestseller. Our windproof Weather Edge technology is fully seam-sealed for complete waterproof/breathable protection.</p>', 'Leather Jackets'),
(9, 4, 4, '2018-04-11 16:51:37', 'Women Maxi Beach Dress Summer', 'Women-maxi-beach-dress-summer-2016-Natural-Vestidos-De-Fiesta-Women-s-Long-Dress-Sexy-Strapped.jpg', '1830-Mara-Hoffman-Women-s-Cosmic-Fountain-Embroidered-Maxi-Dress-3 (1).jpg', 'womens-maxi-dresses-with-sleeves-1.jpg', 80, '<p>Dresslily Style: Cute Material: Polyester Silhouette: A-Line Dresses Length: Ankle-Length Neckline: Round Collar Sleeve Length: Sleeveless Pattern Type: Floral With Belt: No Season: Summer Weight: 0.4000kg Package Contents: 1 x Dres</p>', 'Maxi Dresses'),
(10, 3, 1, '2018-04-14 18:59:57', 'Women\'s 2-piece Business Suit', 'black-womens-tuxedo-2-piece-set-women-business1.jpeg', 'jacket-pants-womens-business-suits-blazer2.jpeg', 'jacket-pants-womens-business-suits3.jpeg', 100, '<p>Wholesale cheap female business suit style -jacket+pants womens business suits blazer black female office uniform formal work wear evening ladies trouser suit 2 piece set from Chinese women\'s</p>', 'Suits'),
(12, 2, 4, '2018-04-15 04:32:41', 'Hamburger Printed T-shirt', 'Hamburger Print Tshirt1.jpg', 'Hamburger Print Tshirt2.jpg', 'Hamburger Print Tshirt3.jpg', 10, '<p>A white regular fit summer t-shirt with Hamburger print on it.</p>', 'T-shirts'),
(13, 2, 4, '2018-04-11 05:00:00', 'Summer colorful T-shirt', 'Water Color Letter Print Cuffed Tee1.jpg', 'Water Color Letter Print Cuffed Tee2.jpg', 'Water Color Letter Print Cuffed Tee3.jpg', 12, '<p>A summer color letter printed T-shirt with cute letters on.</p>', 'T-shirts'),
(14, 2, 3, '2018-04-15 04:46:44', 'Casual T-shirt ', 'Contrast Striped Crop Tee1.jpg', 'Contrast Striped Crop Tee2.jpg', 'Contrast Striped Crop Tee3.jpg', 18, '<p>A casual striped Navy cotton round necked T-shirt for summers.</p>', 'T-shirts'),
(15, 1, 3, '2018-04-17 04:14:45', 'A Studded Bikers Floral Black Jacket', 'Flower Embroidery Studded Detail PU Biker Jacket1.jpg', 'Flower Embroidery Studded Detail PU Biker Jacket2.jpg', 'Flower Embroidery Studded Detail PU Biker Jacket3.jpg', 80, '<p>A rock biker Flower Embroidery Studded Detail Jacket.</p>', 'Leather Jackets'),
(16, 5, 5, '2018-04-15 05:41:24', 'Self Tie Plaid Trousers of stripes ', 'Frill Waist Self Tie Plaid Pants1.jpg', 'Frill Waist Self Tie Plaid Pants2.jpg', 'Frill Waist Self Tie Plaid Pants3.jpg', 12, '<p>A casual workwear tappered cotton blend grey plaid pant.</p>', 'Trousers'),
(17, 5, 5, '2018-04-15 16:16:57', 'casual solid trouser with self tie wide leg pants ', 'Self Tie Wide Leg Pants1.jpg', 'Self Tie Wide Leg Pants2.jpg', 'Self Tie Wide Leg Pants3.jpg', 13, '<p>A self tie wide solid color of leg pants which are good for the workwear.</p>', 'Trousers'),
(18, 5, 5, '2018-04-15 16:23:57', 'Nice workwear trousers with formal look', 'Vertical Striped Elastic Waist Pants1.jpg', 'Vertical Striped Elastic Waist Pants2.jpg', 'Vertical Striped Elastic Waist Pants3.jpg', 10, '<p>A formal vertically striped elastic waist pants for workwear.</p> ', 'Trousers'),
(19, 6, 3, '2018-04-11 05:00:00', 'Dark blue jeans with bleach wash', 'Bleach Wash Drawstring Waist Jeans1.jpg', 'Bleach Wash Drawstring Waist Jeans2.jpg', 'Bleach Wash Drawstring Waist Jeans3.jpg', 30, '<p>A bleach wash drawstring waist jeans which gives you a cool and comfort look.</p>', 'Jeans'),
(20, 6, 3, '2018-04-11 05:00:00', 'A regular mid waist crop length jeans', 'Bleach Wash Frayed Hem Ripped Jeans1.jpg', 'Bleach Wash Frayed Hem Ripped Jeans2.jpg', 'Bleach Wash Frayed Hem Ripped Jeans3.jpg', 44, '<p>A rocky denim ripped blue button fly jeans.</p>', 'Jeans'),
(21, 6, 3, '2018-04-17 04:11:52', 'Plain black skinny ripped jeans\r\n', 'Knee Cut Frayed Hem Skinny Jeans1.jpg', 'Knee Cut Frayed Hem Skinny Jeans2.jpg', 'Knee Cut Frayed Hem Skinny Jeans1.jpg', 25, '<p>A casual denim ripped raw hem plain zipper fly high waist long with stretchy fabric.</p> \r\n\r\n\r\n', 'Jeans'),
(22, 4, 3, '2018-04-17 04:23:54', 'Two Tone Contrast Crochet Long Hijab Dress', 'Two Tone Contrast Crochet Long Hijab Dress1.jpg', 'Two Tone Contrast Crochet Long Hijab Dress2.jpg', 'Two Tone Contrast Crochet Long Hijab Dress3.jpg', 95, '<p>A tunic with contrast color of lace for casual wear with a round neck which we can wear for weekend parties.</p>', 'MAXI DRESSES'),
(23, 4, 3, '2018-04-11 05:00:00', 'Floral Print Random Maxi Dress', 'Floral Print Random Maxi Dress1.jpg', 'Floral Print Random Maxi Dress2.jpg', 'Floral Print Random Maxi Dress3.jpg', 85, '<p>A natural color blend of purple floral round neck beach wear with fit and flare pleated sleeveless maxi dress.</p>', 'MAXI DRESSES'),
(24, 3, 1, '2018-04-11 05:00:00', 'Two-Button Cream Suit Jacket', 'Two-Button Suit Jacket1.jpg', 'Two-Button Suit Jacket2.jpg', 'Two-Button Suit Jacket3.jpg', 120, '<p>Luxe stretch season-less fabric\r\nNotch lapel collar with Padded shoulders and Front seaming detail for shaped fit with Welt side front and left chest pockets,Back vent for comfort and fit 2-button front closure.</p>', 'SUITS'),
(25, 3, 1, '2018-04-11 05:00:00', 'Executive Collection Single-Button Pantsuit', 'Executive Collection Single-Button Pantsuit1.jpg', 'Executive Collection Single-Button Pantsuit2.jpg', 'Executive Collection Single-Button Pantsuit3.jpg', 100, '<p>An executive collection of single button suit with black elegant look for the workwear.</p>', 'SUITS'),
(26, 7, 3, '2018-04-17 18:25:11', 'Lace Up Mesh Sneakers', 'Lace Up Mesh Sneakers1.jpg', 'Lace Up Mesh Sneakers2.jpg', 'Lace Up Mesh Sneakers3.jpg', 40, '<p>Cute lace up mesh sneakers for girls. </p>', 'SHOES'),
(27, 7, 3, '2018-04-17 18:42:01', 'Gingham Canvas Slip On Plimsolls', 'Gingham Canvas Slip On Plimsolls1.jpg', 'Gingham Canvas Slip On Plimsolls2.jpg', 'Gingham Canvas Slip On Plimsolls3.jpg', 42, '<p>A rubber plaid black and white round \r\n toe Canvas Slip On Plimsolls.</p>', 'SHOES'),
(28, 7, 3, '2018-04-11 05:00:00', 'Striped Detail Lace Up Sneakers', 'Striped Detail Lace Up Sneakers1.jpg', 'Striped Detail Lace Up Sneakers2.jpg', 'Striped Detail Lace Up Sneakers3.jpg', 50, '<p>A white striped spring round toe casual lace up.</p>', 'SHOES'),
(29, 8, 3, '2018-04-11 05:00:00', 'Contrast Band Straw Fedora Hat', 'Contrast Band Straw Fedora Hat1.jpg', 'Contrast Band Straw Fedora Hat2.jpg', 'Contrast Band Straw Fedora Hat3.jpg', 30, '<p>A straw casual vacation beige</p>', 'ACCESSORIES'),
(30, 8, 3, '2018-04-11 05:00:00', 'Silver Lenses Top Bar Sunglasses', 'Silver Lenses Top Bar Sunglasses1.jpg', 'Silver Lenses Top Bar Sunglasses2.jpg', 'Silver Lenses Top Bar Sunglasses3.jpg', 30, '<p>Sliver lenses for girls in cool look</p>', 'ACCESSORIES'),
(31, 8, 3, '2018-04-11 05:00:00', 'Maple Leaf Print Zipper Pouch', 'Maple Leaf Print Zipper Pouch1.jpg', 'Maple Leaf Print Zipper Pouch2.jpg', 'Maple Leaf Print Zipper Pouch3.jpg', 30, '<p>Black polyester basics for the makeup kit and multi use of the the kit.</p>', 'ACCESSORIES'),
(32, 3, 2, '2018-04-11 05:00:00', 'Trumpet Mermaid Off-the-Shoulder Sweep Train Chiffon Lace Evening Dress With Beading Sequins', 'Trumpet Mermaid Off-the-Shoulder Sweep Train Chiffon Lace Evening Dress With Beading Sequins1.jpg', 'Trumpet Mermaid Off-the-Shoulder Sweep Train Chiffon Lace Evening Dress With Beading Sequins2.jpg', 'Trumpet Mermaid Off-the-Shoulder Sweep Train Chiffon Lace Evening Dress With Beading Sequins3.jpg', 200, '<p>A Trumpet Mermaid Off-the-Shoulder Sweep Train Chiffon Lace Evening Dress With Beading Sequins for the parties and prom.</p>', 'PARTY WEAR'),
(33, 3, 2, '2018-04-11 05:00:00', 'Trumpet Mermaid Scoop Neck Court Train Satin Wedding Dress', 'Trumpet Mermaid Scoop Neck Court Train Satin Wedding Dress1.jpg', 'Trumpet Mermaid Scoop Neck Court Train Satin Wedding Dress2.jpg', 'Trumpet Mermaid Scoop Neck Court Train Satin Wedding Dress3.jpg', 220, '<p>Trumpet Mermaid Scoop Neck Court Train Satin Wedding Dress for the party \r\n and prom</p>', 'PARTY WEAR'),
(34, 3, 2, '2018-04-17 20:31:20', 'A-LinePrincess High Neck Floor-Length Velvet Evening Dress With Beading Sequins Split Front', 'A-LinePrincess High Neck Floor-Length Velvet Evening Dress With Beading Sequins Split Front1.jpg', 'A-LinePrincess High Neck Floor-Length Velvet Evening Dress With Beading Sequins Split Front2.jpg', 'A-LinePrincess High Neck Floor-Length Velvet Evening Dress With Beading Sequins Split Front3.jpg', 250, '<p>A-LinePrincess High Neck Floor-Length Velvet Evening Dress With Beading Sequins Split Front for party and proms.</p>', 'PARTY WEAR');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Leather Jackets', 'Jacket-length coats, usually worn on top of other apparel or item of clothing, and made from the tanned hide of various animals.'),
(2, 'T-Shirts', 'All styles of unisex fabric shirts and has short sleeves, round neckline, crew neckline lacking a collar.'),
(3, 'Suits', 'Garments are made from the same cloth, usually consisting of at least a jacket and trousers. We provide Lounge suits, business suits, Western suits, Dinner suit, Morning suit. '),
(4, 'Maxi Dresses', 'Often credited with igniting the craze for Maxi style, used large flared coats over suit trousers. Lacey and slightly shorter than ankle length, cotton jersey and down to the heel.'),
(5, 'Trousers', 'Worn on the hips or waist and may be held up by your own fastenings, a belt or suspenders (braces).'),
(6, 'Jeans', 'Made from denim or dungaree cloth. Most of our brands include brands include Levi\'s, Lee, and Wrangler.'),
(7, 'Shoes', 'Varied designs through time and from culture to culture, with appearance originally being tied to function and  fashion. '),
(8, 'Accessories', 'Complete your outfit and complement the look by choosing the accessories specifically.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'Slide Number 1', '1.jpg'),
(2, 'Slide Number 2', '2.jpg'),
(3, 'Slide Number 3', '3.jpg'),
(6, 'Slide Number 4  ', '4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
