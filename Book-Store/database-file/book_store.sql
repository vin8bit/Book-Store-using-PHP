-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2021 at 02:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('vk@gmail.com', '12345'),
('0', '12345'),
('udrawat25@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_code` varchar(8) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_price` int(4) NOT NULL,
  `book_quantity` int(2) NOT NULL,
  `book_author` varchar(30) NOT NULL,
  `book_publisher` varchar(30) NOT NULL,
  `book_category` varchar(30) NOT NULL,
  `book_img` text NOT NULL,
  `book_description` text NOT NULL,
  `book_isbn` varchar(14) NOT NULL,
  `book_edition` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_code`, `book_name`, `book_price`, `book_quantity`, `book_author`, `book_publisher`, `book_category`, `book_img`, `book_description`, `book_isbn`, `book_edition`) VALUES
('g1', '1984 (Signet Classics), Book Cover May Vary', 450, 24, ' Erich Fromm ', 'Signet Classic', 'Fantasy ', 'download.webp', 'Written more than 70 years ago, 1984 was George Orwell’s chilling prophecy about the future. And while 1984 has come and gone, his dystopian vision of a government that will do anything to control the narrative is timelier than ever..', '9780451524935', '1st'),
('g10', 'Anne of Green Gables', 890, 82, ' L. M. Montgomery', 'Bantam Books', 'Short Stories', '51vgDpIzigL._SX300_BO1,204,203,200_.jpg', 'To read Anne of the Green Gables is to fall in love with its characters — particularly its protagonist, a fiery young girl with an imagination the size of castles. From coming-of-age arcs to the occasional drunken episode, this beloved classic by L.M. Montgomery has it all: laughs, pain, and heart.', '055321313X', '7th'),
('g11', 'As I Lay Dying: The Corrected Text', 786, 95, 'William Faulkner', 'Vintage', 'Literary Fiction', '518o93qUhOL._SX322_BO1,204,203,200_.jpg', 'As William Faulkner attested: “I set out deliberately to write a tour-de-force. Before I ever put pen to paper and set down the first word I knew what the last word would be and almost where the last period would fall.” This is the grueling story of the Bundren family’s slow, tortuous journey to bury Addie, their wife and mother, in her hometown of Mississippi.', '067973225X', '11th'),
('g12', 'Beloved by Toni Morrison', 952, 33, 'Toni Morrison', 'Vintage', 'Historical Fiction', '41Rdzbiqh7L._SX322_BO1,204,203,200_.jpg', 'The winner of the Pulitzer Prize in 1988 and a finalist for the 1987 National Book Award, Beloved is Toni Morrison’s magnum opus about Sethe, a former slave whose house may or may not be haunted by the ghost of the baby she had to murder. A peerless work about slavery, race, and the bonds of family.', '1400033411', '15th'),
('g13', 'The Book Thief by Markus Zusak', 120, 0, ' ZUSAK MARKUS', 'RANDOM HOUSE UK', 'Classics ', '51APkyJzNlL._SX324_BO1,204,203,200_.jpg', 'This children\'s book has an unmistakably distinct narrator — Death. Set in Nazi Germany, it follows Liesel, a young girl in her new foster care home. As the world around her begins to crumble, Liesel must find solace in books and the power of words.', '9781909531611', '28th'),
('g14', 'Brave New World by Aldous Huxley', 250, 45, 'Aldous Huxley  ', 'Harper Perennia', 'Classics', '41-n-3hZMeL._SX325_BO1,204,203,200_.jpg', 'One of the giants of the dystopian genre. Having already shaken up the literary world when it was first published, Brave New World is relevant even today as it urges readers to ask questions about autonomy, hedonism, and our definition of “utopia.”', '0060850523', '29th'),
('g15', 'The Brothers Karamazov by Fyodor Dostoevsky', 365, 94, 'Fyodor Dostoevsky', 'Everyman\'s Library', 'Historical Fiction', '51prrWwUItL._SX312_BO1,204,203,200_.jpg', 'In a testimony to Albert Einstein\'s admiration of The Brothers Karamazov, novelist C.P. Snow once wrote, \"The Brothers Karamazov — that for him in 1919 was the supreme summit of all literature.\" You can step into Einstein’s footsteps yourself by reading this powerful, stirring meditation on God and the power of free will.', '0679410031', '17th'),
('g16', ' Catch-22 by Joseph Heller', 360, 65, 'Joseph Heller', 'Simon & Schuster', 'Historical Fiction', '51xVm9j3FfL._SX326_BO1,204,203,200_.jpg', 'Captain John Yossarian, a U.S. Army Air Forces B-25 bombardier, longs to return home. But that is a little hard when he is situated in the middle of nowhere — or, more specifically, the fictional island of Pianosa in the Mediterranean Sea. A searing satire that is defining of its times.', '1451626657', '15'),
('g17', 'The Catcher in the Rye', 329, 89, 'J. D. Salinger', 'Bay Back Books', 'Action and Adventure', '518dVCGFuhL._SX323_BO1,204,203,200_.jpg', 'Meet Holden Caulfield: a teenager who, with no plans in mind, decides to leave his boarding school in Pennsylvania and head back home to New York. In The Catcher in the Rye, J.D. Salinger has created perhaps the original “cynical adolescent” — and a wistful story about the meaning of youth.', '9780316769174', '41th'),
('g18', 'Charlie and the Chocolate Factory ', 450, 25, ' Roald Dahl,Quentin Blake', 'Puffin Books', 'Comic Book or Graphic Novel', '51W8IWdCSKL._SX322_BO1,204,203,200_.jpg', 'Eleven-year-old Charlie Bucket’s life is turned upside down when he finds a Golden Ticket that gives him access to Willy Wonka’s Chocolate Factory. So are young readers’ heads, as they experience the magic of the Chocolate Factory (and Oompa-Loompas) for the first time in Roald Dahl’s cherished children’s book.', '0142410314', '1st'),
('g19', 'Charlotte\'s Web by E. B White', 125, 10, 'E. B White', 'HarperCollins', 'Comic Book or Graphic Novel', '61+3z1o4oUL._SX334_BO1,204,203,200_.jpg', 'Wilbur, the runt of his litter, is spared from certain death, thanks to a little girl named Fern. But his life takes a turn when he is sold to Homer Zuckerman, who eventually plans to butcher him, and meets a kind-hearted spider called Charlotte. Charlotte\'s Web is a staple of children’s literature — and the bestselling children’s paperback of all time.', '0061124958', '2nd'),
('g2', 'Adventures of Huckleberry Finn by Mark Twain', 550, 35, ' Mark Twain', 'independentPublishing Platform', 'Action and Adventure', '41Jx1cpYuLL._SX331_BO1,204,203,200_.jpg', 'A young boy and a slave in 19th-century Louisiana must find their way home — with only the Mississippi River for a guide. This slender book by Mark Twain’s is so well-regarded that it’s said by many to be The Great American Novel', '1503214958', '2nd'),
('g20', 'The Hound of The Baskervilles ', 129, 89, 'Sir Arthur Conan Doyle', 'Fingerprint Publishing ', 'Detective and Mystery', '41U+xVr-G-L._SX321_BO1,204,203,200_.jpg', 'The world is full of obvious things which nobody by any chance ever observes.” found dead on the grounds of his estate with a horrifying expression on his face, Sir Charles Baskerville is suspected to have had a heart attack. But Dr. James Mortimer, Charles’ friend and medical Attendant is\r\n', '9388810945', '1st'),
('g21', 'The Hound of the Baskervilles ', 145, 52, 'Arthur Conan Doyle', ' Penguin UK', 'Detective and Mystery', '516Aup-q2-L._SY264_BO1,204,203,200_QL40_FMwebp_.webp', 'When Sir Charles Baskerville is found mysteriously dead in the grounds of Baskerville Hall, everyone remembers the legend of the monstrous creature that haunts the moor. The great detective Sherlock Holmes knows that there must be a more rational explanation, but the difficulty is to find it before the hellhound finds him.', '0141329394', '1st'),
('g22', 'The Hound of Baskervilles', 159, 52, 'Sir Arthur Conan Doyle', 'Jaico Publishing House', 'Detective and Mystery', '51VBJ7fhypL._SX323_BO1,204,203,200_.jpg', 'Jaico illustrated classics series is a collection of beloved children’s classics read by generations all over the world. Rich with adventures and thrills, these immortal stories with vivid illustrations are designed to delight young readers. The hound of Baskervilles begins with the murder of Sir Charles Baskerville, hunted down by a supernatural hound.', '9388423135', '3rd'),
('g23', 'It', 150, 99, 'King Stephen', 'Hodder & Stoughton', 'Horror', 'it-original-imaeuyawhguhx8gz.jpeg', '\r\nSoon to be a major motion picture-Stephen King\'s terrifying classic.\'They float...and when you\'re down here with me, you\'ll float, too.\'To the children, the town was their whole world. To the adults, knowing better, Derry Maine was just their home town: familiar, well-ordered for the most part. ', '9781473666931', '1st'),
('g24', 'Dark Matter', 256, 20, 'Blake Crouch', 'Pan', 'Horror', '61pxmY0HlbL._SX323_BO1,204,203,200_.jpg', 'From Blake Crouch, the author of the bestselling Wayward Pines trilogy, Dark Matter is a brilliantly plotted tale that is at once sweeping and intimate, mind-bendingly strange and profoundly human – a relentlessly surprising thriller about choices, paths not taken, and how far we\'ll go to claim the lives we dream of, perfect for fans of Stranger Things and Ready Player One.', '9781447297581', '1st'),
('g25', 'Recursion ', 289, 22, 'Blake Crouch', 'Pan', 'Horror', '51uOp79o9PL._SX323_BO1,204,203,200_.jpg', 'Recursion takes mind-twisting premises and embeds them in a deeply emotional story about time and loss and grief and most of all, the glory of the human heart\' - Gregg Hurwitz, international bestselling author of Orphan X\r\n', '1509866671', '1st'),
('g26', 'Our Love Story', 120, 27, 'Rohit', 'Fingerprint! Publishing', 'Romance', '41nAzKvvQ5L._SY264_BO1,204,203,200_QL40_FMwebp_.webp', 'Veronica is done. Done trying to make it as a model. Done with getting sexually harassed by casting directors. And done seeing her mother struggle to provide for her family. Tonight, everything ends. She teeters over the edge of the parapet, imagining how the Cold water of the Arabian sea will take her breath away when she drowns. And then, she is stopped. By a man with an endearing smile and a guitar strapped to his back.', '9389717434', '3rd'),
('g27', 'You are the Best Wife', 55, 75, 'Ajay K Pandey', 'Srishti Publishers', 'Romance', '41TD27iSPeL._SX328_BO1,204,203,200_.jpg', 'You Are The Best Wife: A True Love Story’ is a story about how people find true love and comfort in dissimilarities; about how two people with absolutely different ideologies meet and fall in love.\r\n', '9789382665540', '1st'),
('g28', 'Her Last Wish', 40, 12, ' Ajay K. Pandey  (Author)', 'Srishti Publisher', 'Romance', '51fhoN30pVL._SX320_BO1,204,203,200_.jpg', 'His father\'s over expectations only ruined his self-confidence further with each failure. A ray of hope walked into his life as his wife, a charismatic personality spreading joy wherever she went. Everything is going per plan, but darkness comes knocking soon. He finds out that she does not have much time to live and takes it upon himself to fight all odds – even his family, if need be – to help her fight her medical condition', '9382665870', '1st'),
('g29', 'A Girl to Remember', 100, 50, ' Ajay K Pandey', 'Srishti Publishers', 'Romance', '51vmIIR5w1L._SX321_BO1,204,203,200_.jpg', 'n every angel a demon hides, And in every demon, an angel strides. Neel is a self-proclaimed demon, a slave to his desires, putting at stake even the purest of relationships for it. He lives for himself, takes life as it comes, and considers people who love as emotional fools. When he first sets his eyes on his new landlady, a widow who is eleven years elder to him, all he can see is an opportunity. ', '9789387022393', '3rd'),
('g3', 'The Adventures of Sherlock Holmes', 650, 65, 'Sir Arthur Conan Doyle', 'Barnes & Noble', 'Action and Adventure', '51THXBHL1AL._SX317_BO1,204,203,200_.jpg', 'In 1891, Sir Arthur Conan Doyle published “A Scandal in Bohemia,” the first short story to feature Sherlock Holmes. Sharp and engrossing, this collection shows how exactly Sherlock Holmes became a cultural phenomenon and the most recognizable detective of all time.', '1435167902', '4th'),
('g30', 'Love, Hope and Magic', 96, 75, ' Ashish Bagrecha (Author)', 'Storymonk', 'Science Fiction (Sci-Fi)', '41s7JOQfEfL._SX326_BO1,204,203,200_.jpg', 'A survivor of life and death, a fighter of depression and a believer of universe, Ashish Bagrecha, the best-selling author of self-help book ‘Dear Stranger, I Know How You Feel’ and one of the most popular Instagram poets, brings you his very first collection of poetry because he thinks poetry has the magic to heal people.', '9354078877', '1st'),
('g31', 'Encyclopedia: The Milky Way (Space Encyclopedia) ', 155, 24, 'Om Books Editorial Team', 'Om Books International', 'Science Fiction (Sci-Fi)', '51CR4TyEyzL._SY264_BO1,204,203,200_QL40_FMwebp_.webp', 'How big is the milky Way, a spiral-shaped galaxy, that is composed of stars, gases, dust and even the planet Earth, bound together by gravity? How many more planets does it have? Does it have a mysterious halo? The mily way answer all these questions and unravels the mysteries of the vast universe.', '9386316552', '1st'),
('g32', 'Pride & Prejudice ', 210, 95, ' Jane Austen  (Author)', 'Fingerprint Publishing ', 'Classics', '41Ljst4s4rS._SX460_BO1,204,203,200_.jpg', 'When Elizabeth Bennet meets Fitzwilliam Darcy for the first time at a ball, she writes him off as an arrogant and obnoxious man. He not only acts like an insufferable snob, but she also overhears him rejecting the very idea of asking her for a dance!\r\n', '9388810511', '1st'),
('g33', 'Iron Man: Director of S.H.I.E.L.D', 1200, 99, ' Daniel Knauf', 'Marvel', 'Comic Book or Graphic Novel', '51p0ubsRPwL._SX322_BO1,204,203,200_.jpg', 'Tony Stark takes on the Marvel Universe\'s hardest job: Director of S.H.I.E.L.D.! And he\'s just the futurist to bring the peacekeeping intelligence organization up to date! But with Tony in the hot seat, what will that mean for Iron Man? He\'ll face techno-zombies, an old hero with a grudge, a traitor in the Initiative and regime change in the nation of Madripoor! Will Tony Stark crack under the pressure of being the world\'s top cop?', '9781302907044', '1st'),
('g34', 'The Magician\'s Nephew', 1200, 12, 'C.S. Lewis', 'UK Children\'s', 'Fantasy', '51YXwHf2EDL._SY264_BO1,204,203,200_QL40_FMwebp_ (1).webp', 'When Digory and Polly discover Uncle Andrew\'s secret workshop, they are tricked into touching some magic rings that take them right out of this world. But even Uncle Andrew doesn\'t realise the wonders that lie ahead as they discover the gateway to the magical land of Narnia, where many thrilling adventures await them!', '0007363796', '2ND'),
('g35', 'The Last Battle', 152, 12, 'C.S. Lewis', 'Wisehouse Classics', 'Fantasy', '51uP5zySkeL._SX325_BO1,204,203,200_.jpg', 'Introducing the seventh book of the newly designed Narnia classics. Perfect for those seeking a contemporary take on The Chronicles of Narnia , It is Narnia\'s darkest hour. A false Aslan is commanding all Narnians to work for the cruel Calormenes and striking terror into every heart. King Tirian\'s only hope is to call Eustace and Jill back to Narnia in an attempt to find the true Aslan and restore peace to the land. But a mighty battle lies ahead.', '0007363802', '3rd'),
('g4', 'A Fable About Following Your Dream', 450, 25, ' Paulo Coelho ', 'HarperOne; 25th ed. edition', 'Short Stories', '51kcX5PpaZL._SX329_BO1,204,203,200_.jpg', 'Written in only two weeks, The Alchemist has sold more than two million copies worldwide — and the magical story of Santiago’s journey to the pyramids of Egypt continues to enchant readers worldwide. A dreamy triumph.', '0062315005', '2nd'),
('g5', 'The Aleph and Other Stories', 350, 56, ' Jorge Luis Borges', 'Penguin Classics', 'Science Fiction (Sci-Fi)', '518XLVWcEHL._SX322_BO1,204,203,200_.jpg', 'Jorge Luis Borges’ keen insight and philosophical wisdom is on full display in this acclaimed short story collection. From “The Immortal” to “The House of Asterion,” the stories within are glittering, haunting examples of worlds created by a master of magic realism.', '0142437883', '5th'),
('g6', 'Animal Farm: 75th Anniversary Edition', 350, 58, 'George Orwell', 'Signet', 'Action and Adventure', '41NzDuSdIfL._SX277_BO1,204,203,200_.jpg', 'When Old Major the boar dies on Manor Farm, two young pigs named Snowball and Napoleon rise to create new leadership in this allegorical book that is supposed to mirror the Russian Revolution of 1917 — and the ensuing Stalinist Soviet Union. Animal Farm is a stunning achievement, and not just because Orwell proved that a story about pigs can be terrifying.', '9780451526342', '7th'),
('g7', 'Aesop\'s Fables by Aesop', 400, 35, 'Michael Morpurgo', 'Margaret K. McElderry Books', 'Short Stories', '61YCAWYMG4L._SX454_BO1,204,203,200_.jpg', 'This enduring collection of tales was passed down through oral tradition more than two millennia ago. More than simple stories, Aesop’s stories reflect every aspect of human nature.', '9781416902904', '1st'),
('g8', 'Alice\'s Adventures in Wonderland', 480, 38, ' Lewis Carroll', 'Wisehouse Classics', 'Action and Adventure', '511M-YHRI-L._SX331_BO1,204,203,200_.jpg', 'Alice is only a young seven-year old girl when she notices a White Rabbit with a pocket watch running by. Thus begins Alice’s adventures in a land that is not all that it seems. Lewis Carroll published this novel in 1865, sending it down the rabbit hole and straight into the hallowed halls of children’s most treasured literature.', '9176372278', '25th'),
('g9', 'Anna Karenina', 850, 36, ' Leo Tolstoy', ' Wordsworth Editions Ltd', 'Romance', '41tAv3Df-IL._SX324_BO1,204,203,200_.jpg', 'If you like lengthy books in which to immerse yourself, then this is a real treat. This epic novel tells the parallel stories of Anna Karenina and Konstantin Levin over a span of 800+ pages — dealing with social change, politics, theology, and philosophy in nineteenth-century Russia all the while.', '9781853262715', '8th');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `order_id` int(8) NOT NULL,
  `customer_id` int(8) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_code` varchar(8) NOT NULL,
  `quantity` int(2) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`order_id`, `customer_id`, `book_name`, `book_code`, `quantity`, `price`) VALUES
(44, 1, 'The Three Musketeers', 'g5', 1, 500),
(44, 1, 'Life of Pi', 'g6', 1, 499),
(45, 1, 'Watchmen (2019 Edition)', 'g10', 1, 299),
(46, 18, 'The Walking Dead: Compendium One', 'g9', 1, 345),
(46, 18, 'To Kill a Mockingbird', 'g8', 1, 449),
(47, 18, 'The Call of the Wild', 'g4', 1, 350),
(48, 1, 'Watchmen (2019 Edition)', 'g10', 1, 299),
(49, 1, 'Mysql', 'g3', 1, 300),
(50, 1, 'The Three Musketeers', 'g5', 2, 500),
(51, 1, 'The Three Musketeers', 'g5', 1, 500),
(52, 1, 'Toni Morrison', 'g7', 1, 399),
(53, 1, 'To Kill a Mockingbird', 'g8', 1, 449),
(54, 1, 'Watchmen (2019 Edition)', 'g10', 4, 299),
(54, 1, 'To Kill a Mockingbird', 'g8', 3, 449),
(54, 1, 'The Three Musketeers', 'g5', 1, 500),
(55, 19, 'Anne of Green Gables', '10', 1, 890),
(55, 19, 'As I Lay Dying: The Corrected Text', '11', 1, 786),
(55, 19, 'Beloved by Toni Morrison', '12', 1, 952),
(56, 25, '1984 (Signet Classics), Book Cover May Vary', '1', 1, 450),
(57, 27, 'Anne of Green Gables', '10', 1, 890),
(58, 32, 'Anne of Green Gables', 'g10', 1, 890),
(58, 32, 'Recursion', 'g25', 3, 289),
(58, 32, 'As I Lay Dying: The Corrected Text', 'g11', 3, 786);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `password`) VALUES
(1, 'Vineet Kumar', 'vk@gmail.com', '1234'),
(17, 'aryan', 'ak@gmail.com', '1234'),
(19, 'UDIT SINGH RAWAT', 'UDRAWAT25@GMAIL.COM', '12345'),
(20, 'sonu ', 'UDIT1998RAWAT@gmail.com', '12345'),
(21, 'sher', 'sher@sherpm.com', '12345'),
(22, 'kaushal ', 'kaushalkh@gmail.com', '12345'),
(23, 'karshin', 'karshir25@gmail.com', '12345'),
(24, 'BHAVYA', 'BHAVYA@GMAIL.COM', '123'),
(25, 'SOUMYA ', 'SOUMYA@GMAIL.COM', '123'),
(26, 'NIPUN', 'NIPUN@GMAIL.COM', '123'),
(27, 'MANI', 'MANI@GMAIL.COM', '12345'),
(28, 'MANSHI ', 'MANSHI@GMAIL.COM', '123'),
(29, 'DEVKI ', 'DEVKI@GMAIL.COM', '12345'),
(30, 'ANJANI', 'ANJANI@GMAIL.COM', '12345'),
(31, 'SHIVAM', 'SHIVAM@GMAIL.COM', '12345'),
(32, 'udit singh rawat', 'us@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(8) NOT NULL,
  `customer_id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `date1` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `mode` varchar(17) NOT NULL,
  `card_no` int(20) DEFAULT NULL,
  `security_code` varchar(10) DEFAULT NULL,
  `card_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `name`, `phone`, `address`, `date1`, `status`, `mode`, `card_no`, `security_code`, `card_name`) VALUES
(44, 1, 'vineet', '56745643', 'Badarpur New Delhi 110044', '2020-12-09', 'delivered', 'Case On Delivery', 0, 'null  ', 'null'),
(45, 1, '343', '34534', '435435', '2020-12-11', 'order', 'Case On Delivery', 0, 'null  ', 'null'),
(46, 18, '7787', '7878', '7878', '2020-12-11', 'order', 'Case On Delivery', 0, 'null  ', 'null'),
(47, 18, '343', '234', '234234', '2020-12-11', 'order', 'Case On Delivery', 0, 'null  ', 'null'),
(48, 1, 'AKS', '777777777', 'sdfsdf sdfsdffsfsdf234234', '2020-12-11', 'order', 'Case On Delivery', 0, 'null  ', 'null'),
(49, 1, 'aks', '43', 'assdasdasd adaw rw', '2020-12-11', 'order', 'Case On Delivery', 0, 'null  ', 'null'),
(50, 1, '343', '444444444', '343sdfs sdfr42 fsf', '2020-12-12', 'order', 'Case On Delivery', 0, 'null  ', 'null'),
(51, 1, '454545', '444444444', '444444', '2020-12-12', 'order', 'Case On Delivery', 0, 'null  ', 'null'),
(52, 1, 'rwr', '5555555555', 'werwe', '2020-12-12', 'order', 'Case On Delivery', 0, 'null  ', 'null'),
(53, 1, 'weqw', '8888888888', 'ewrwe', '2020-12-12', 'order', 'Case On Delivery', 0, 'null  ', 'null'),
(54, 1, 'vineet kumar', '8510800127', 'f663 jaitpur ,new Delhi 110044', '2021-03-11', 'order', 'Debit Card', 123455, '123566', 'Debit card'),
(55, 19, 'UDIT SINGH RAWAT', '9752112365', 'd23 nihfw campus munirka', '2021-05-05', 'delivered', 'Case On Delivery', 2147483647, '027', 'udit singh rawat'),
(56, 25, 'UDIT SINGH RAWAT', '9818654396', 'd23 nihfw campus munirka', '2021-05-06', 'order', 'Case On Delivery', 0, 'null  ', 'null'),
(57, 27, 'UDIT SINGH RAWAT', '09818662920', 'd23 nihfw campus munirka', '2021-05-06', 'order', 'Case On Delivery', 0, 'null  ', 'null'),
(58, 32, 'Udit Singh rawat', '9999999987', 'Lajapat Nagar 110066', '2021-05-08', 'received', 'Debit Card', 123454567, '6578', 'Udit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`,`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
