-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2012 at 04:02 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `testdrive`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dorder`
--

CREATE TABLE `tbl_dorder` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_dorder`
--

INSERT INTO `tbl_dorder` VALUES(4, 5, 6, 2);
INSERT INTO `tbl_dorder` VALUES(5, 5, 3, 4);
INSERT INTO `tbl_dorder` VALUES(6, 6, 7, 3);
INSERT INTO `tbl_dorder` VALUES(7, 7, 7, 3);
INSERT INTO `tbl_dorder` VALUES(8, 8, 10, 1);
INSERT INTO `tbl_dorder` VALUES(9, 9, 12, 3);
INSERT INTO `tbl_dorder` VALUES(10, 10, 10, 1);
INSERT INTO `tbl_dorder` VALUES(11, 11, 11, 2);
INSERT INTO `tbl_dorder` VALUES(12, 12, 9, 4);
INSERT INTO `tbl_dorder` VALUES(13, 13, 11, 1);
INSERT INTO `tbl_dorder` VALUES(14, 14, 10, 1);
INSERT INTO `tbl_dorder` VALUES(15, 15, 6, 1);
INSERT INTO `tbl_dorder` VALUES(16, 16, 2, 1);
INSERT INTO `tbl_dorder` VALUES(17, 17, 6, 1);
INSERT INTO `tbl_dorder` VALUES(18, 18, 1, 5);
INSERT INTO `tbl_dorder` VALUES(19, 19, 1, 2);
INSERT INTO `tbl_dorder` VALUES(20, 19, 10, 2);
INSERT INTO `tbl_dorder` VALUES(21, 20, 1, 1);
INSERT INTO `tbl_dorder` VALUES(22, 20, 5, 1);
INSERT INTO `tbl_dorder` VALUES(23, 21, 6, 2);
INSERT INTO `tbl_dorder` VALUES(24, 21, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` VALUES(5, '2012-02-28 17:39:31', 212);
INSERT INTO `tbl_order` VALUES(6, '2012-02-28 17:46:12', 600);
INSERT INTO `tbl_order` VALUES(7, '2012-02-28 17:48:36', 600);
INSERT INTO `tbl_order` VALUES(8, '2012-02-28 17:55:49', 50);
INSERT INTO `tbl_order` VALUES(9, '2012-02-28 17:57:22', 150);
INSERT INTO `tbl_order` VALUES(10, '2012-02-28 17:58:18', 50);
INSERT INTO `tbl_order` VALUES(11, '2012-02-28 17:59:11', 120);
INSERT INTO `tbl_order` VALUES(12, '2012-02-28 17:59:44', 480);
INSERT INTO `tbl_order` VALUES(13, '2012-02-28 18:00:19', 60);
INSERT INTO `tbl_order` VALUES(14, '2012-02-28 18:00:58', 50);
INSERT INTO `tbl_order` VALUES(15, '2012-02-28 18:01:39', 60);
INSERT INTO `tbl_order` VALUES(16, '2012-02-28 18:15:42', 10);
INSERT INTO `tbl_order` VALUES(17, '2012-02-28 19:03:54', 60);
INSERT INTO `tbl_order` VALUES(18, '2012-03-02 20:45:54', 100);
INSERT INTO `tbl_order` VALUES(19, '2012-03-02 20:48:52', 126);
INSERT INTO `tbl_order` VALUES(20, '2012-03-19 10:59:47', 51);
INSERT INTO `tbl_order` VALUES(21, '2012-03-21 12:41:02', 204);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `type` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `url` varchar(50) NOT NULL,
  `info` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` VALUES(1, '長笛麵包', 20, 0, 187, 'images/products/bread/changdi.jpg', '長笛麵包，是因為像笛子一樣的外型而命名，在法國，長笛麵包的含意，幾乎等同於「棍子麵包的縮小版」。 傳統法國麵包店通常販賣較多粗壯型的棍子麵包，而一人份大小、精瘦的笛子麵包則不算常見，笛子麵包精巧的外型，則非常適合現代人的生活模式，方便隨時享用。');
INSERT INTO `tbl_product` VALUES(2, '小麵包', 10, 0, 199, 'images/products/bread/xiaomianbao.jpg', 'All the varieties of country-style and fancy bread baked by PAUL are available as individual bread-rolls: small, round or finger rolls; plain, or flavored with poppy-seeds, sesame, olives, raisins, hazelnuts and raisins, six cereals, rye; polka-style; etc.');
INSERT INTO `tbl_product` VALUES(3, '亞麻子法國麵包', 23, 0, 196, 'images/products/bread/yamazi.jpg', '亞麻子法國麵包，是以保羅麵包為基底，在麵糰中混合預烤過的亞麻子之後一起烘烤，亞麻子香氣柔順，在烘烤過程中會產生植物性油脂，滲入麵糰，使外表質地口感上會比一般傳統法國麵包稍顯柔軟，表層也呈現淡淡的鵝黃色。 亞麻子是亞麻的種子，可直接食用或提取油脂，能補充人體必需的不飽和脂肪酸，其中Omega-3含量為植物中最高，成份價值絕不亞於魚油。亞麻子內含的Omega-3脂肪酸易於消化系統吸收，能降低過高的膽固醇和血壓，降低三酸甘油脂，預防血液凝塊形成，避免血栓，多食用亞麻子還可以使皮膚保持光滑、緩解各種組織發炎。法國人享受美食，更會在飲食搭配上注重健康，亞麻子麵包天然的搭配，就可達到均衡效果。');
INSERT INTO `tbl_product` VALUES(4, '黃金麵包', 17, 0, 0, 'images/products/bread/huangjin.jpg', '黃金麵包的造型與傳統吐司相似，但成分和美味卻是大不相同，PAUL白金麵包是充滿著法國麵包的嚼感，而黃金麵包則是近似較為紮實的布瑞歐，就像是古典法國系列與維也納系列的完美融合版。  一般在法國麵包店裡總是只有壁壘分明的古典法國硬麵包與甜軟的維也納麵包，黃金麵包的口感則剛好介於兩大系列中間，因為mie是內部的意思，所以也有人稱他「軟心麵包」。 PAUL黃金麵包的成分可說是牛奶多、奶油多，使用T55 Camp Rémy麥粉，烘烤後有著金黃色的外表與濃濃的麥香，愈嚼愈有淡淡的香甜味。白金麵包與黃金麵包是PAUL的獨家兩大代表之作，成分講究、做工講究、價格也較昂貴，仍然受到各地顧客喜愛，在白金麵包獲得台灣顧客一致好評之後，黃金麵包勢必能開啟另一次口感上的驚喜。');
INSERT INTO `tbl_product` VALUES(5, '六種穀類麵包', 40, 0, 149, 'images/products/bread/liuzhong.jpg', '六種穀類麵包，是PAUL最有名的經典麵包，包含了六種麥類：硬粒小麥、大麥、小麥、燕麥、黑麥、小米，以及三種穀物：玉米、芝麻、亞麻子，這是一款極具健康概念的麵包，PAUL選定的九種品項，不但總和了法國人生活中最常食用的種類，在穀物的添加程序上，更依各種不同穀物特性強化處理，比如玉米必須碾成碎粒狀，讓內部的油脂容易發揮出來，更易於和麥粉結合；芝麻和亞麻子則預先經過表層高溫烘烤，精萃出內在營養素、強化香氣，再與麵包本結合成最健康美味的口感，這是一款兼具營養及美味的極致講究麵包，非常值得推薦。 硬粒小麥、大麥和小麥： 增進腸胃道消化吸收功能，具有高單位蛋白質與酶 燕麥： 屬於水溶性纖維，有降低膽固醇的功效 黑麥： 內含的半纖維素，有很高的抗癌效果 小米： 富含維生素B、E、硒、鈣、鐵等微量元素 玉米： 100g玉米能提供300mg的鈣，幾乎與乳製品含鈣量相等，可降低血壓 芝麻： 營養成份主要為脂肪、蛋白質、醣類、維生素B群、E與鎂、鉀、鋅 亞麻子： 內含Omega-3，可降低膽固醇和血壓。口感紮實，具有強烈的香氣');
INSERT INTO `tbl_product` VALUES(6, '鳶尾花巧克力', 60, 1, 44, 'images/products/dessert/cho1.jpg', '以法國傳統國徽也是國花的鳶尾花為裝飾，是PAUL的招牌巧克力慕斯經典之作，絕對不是一般的慕斯，一般市面上的慕斯會以鮮奶油打發加入吉利丁、或是直接以牛奶加入吉利丁製作，讓質地較穩定，但是這些都會影響慕斯本身的輕巧口感。 PAUL的慕斯是把甜品製作出有如泡沫的質地，以大量的蛋白打發，讓慕斯自然成型後再加入糖漿製成，透過自然打發方式製作出的慕斯組織十分輕盈，加上豐富濃郁的純正巧克力，香濃純，成分上對人體較無負擔，再以餅乾碎屑裹上奶油烘烤製成底層，是一款神奇又輕盈的巧克力新體驗。');
INSERT INTO `tbl_product` VALUES(7, '濃情巧克力鬆糕', 200, 1, 74, 'images/products/dessert/cho2.jpg', '巧克力鬆糕是法國傳統糕點，也是在法國傳統麵包店裡最常見到的巧克力類甜品，傳統咖啡店的吃法是加熱食用，再搭配一球香草冰淇淋，風味絕妙。  PAUL的濃情巧克力鬆糕，更講究可可風味的豐富性，主要是將富含濃郁奶油的巧克力蛋糕體，經過高溫烘烤到一定熟度後出爐，最重要的是保留中央柔順綿密的口感。喜愛巧克力的人，絕對不容錯過品嘗這一款珍品。');
INSERT INTO `tbl_product` VALUES(8, '黃金黑莓塔', 60, 1, 200, 'images/products/dessert/heimei.jpg', 'Close your eyes and imagine a French bakery, and you probably think of a traditional fruit tart. All the baking skill of PAUL goes into producing a tart worthy of this tradition - all based on light and airy pure butter flaky pastry. Follow the seasons and the changing fruits.  ');
INSERT INTO `tbl_product` VALUES(9, '覆盆子夏洛特', 120, 1, 295, 'images/products/dessert/fupenzi.jpg', '以歐洲傳統組合不同糕點的新式製作概念，啟發了法國糕點師，以新鮮食材調製出屬於法國傳統的夏洛特蛋糕。命名為夏洛特，是由於蛋糕的外型很像十八世紀英國夏洛特皇后喜歡戴的長型女帽。  夏洛特蛋糕是以傳統的手指餅乾圍邊、以蛋白海綿蛋糕為底，再加上法國特有的BAVAROISE(奶香蛋黃餡)為內，BAVAROISE是由蛋黃、糖、牛奶、香草為配方，再加入一點吉利丁，口感較接近慕斯。PAUL的夏洛特蛋糕口感柔軟，保留了傳統的製作方式，更注重手指餅乾呈現的外酥內軟口感，再搭配上微酸的覆盆子，呈現多重的口感及酸甜融合的風味。');
INSERT INTO `tbl_product` VALUES(10, '笛耶普海港三明治', 50, 2, 295, 'images/products/meal/diye.jpg', '- PAUL Bread </br> - Tuna </br>  -  Lettuce</br>    - Tomato </br>   - Mayonnaise </br>  ');
INSERT INTO `tbl_product` VALUES(11, '鄉野農莊三明治', 60, 2, 297, 'images/products/meal/xiangye.jpg', '鄉野農莊三明治以波爾卡麵包為外層，再加上巴黎火腿、生菜、蕃茄、水煮蛋組合而成。波爾卡麵包是所有法國傳統麵包店裡都有的基本品項，主要的特色在組織內的發酵孔洞相當明顯且均勻，口感相當蓬鬆有嚼感，由於均勻的孔洞，搭配上法國的美乃滋，醬汁可以完全的滲透在麵包裡，一般的麵包若是沒有均勻的孔洞，塗抹醬汁一口咬下時，醬汁總是會有外露的現象，PAUL搭配上生菜，蕃茄及香濃的水煮蛋切片，再搭配上巴黎火腿，均衡的層次口感有如置身在鄉野農莊的感覺。');
INSERT INTO `tbl_product` VALUES(12, '可頌', 50, 3, 297, 'images/products/vienna/kesong.jpg', '可頌早已是法國的經典代表，但如維也納全部都源自奧地利宮廷，但是法國人加上酥皮層次的高級技術，並以法國方式調製成為，今日人人稱讚的法國可頌，在法國可是最尊貴的一種麵包，它講究層次的結構，技術性最高，它講究奶油的香度，要能做到不油膩又紮實的等級，這就是PAUL可頌的境界了。 PAUL的可頌十分講究奶油的品質，使用牛奶提煉出來的奶油，並不是使用人工奶油，因此帶有牛奶的清香，而且在低溫十八度的恆溫室中製作，麵皮層次分明卻不油膩，口感紮實沒有空洞感。');
INSERT INTO `tbl_product` VALUES(13, '葡萄蝸牛捲', 80, 3, 300, 'images/products/vienna/woniu.jpg', '葡萄蝸牛捲是傳統法國家常的甜麵包，所以也歸在維也納系列中，在螺旋層次中加上一些卡士達餡，搭配上表面的杏桃果膠，清爽不膩的口感，突顯了葡萄乾的酸甜。 明顯的法國傳統白翻糖，是蝸牛捲最大特色，這種美味是法國人從小到大，早餐的完美選擇之一。  ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_res`
--

CREATE TABLE `tbl_res` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `tbl_res`
--

INSERT INTO `tbl_res` VALUES(18, 1, 6, 2, 2);
INSERT INTO `tbl_res` VALUES(19, 1, 3, 4, 2);
INSERT INTO `tbl_res` VALUES(20, 1, 7, 3, 2);
INSERT INTO `tbl_res` VALUES(21, 1, 7, 3, 2);
INSERT INTO `tbl_res` VALUES(22, 1, 10, 1, 2);
INSERT INTO `tbl_res` VALUES(23, 1, 12, 3, 2);
INSERT INTO `tbl_res` VALUES(24, 1, 10, 1, 2);
INSERT INTO `tbl_res` VALUES(25, 1, 11, 2, 2);
INSERT INTO `tbl_res` VALUES(26, 1, 9, 4, 2);
INSERT INTO `tbl_res` VALUES(27, 1, 11, 1, 2);
INSERT INTO `tbl_res` VALUES(28, 1, 10, 1, 2);
INSERT INTO `tbl_res` VALUES(29, 1, 6, 1, 2);
INSERT INTO `tbl_res` VALUES(30, 1, 2, 1, 2);
INSERT INTO `tbl_res` VALUES(31, 1, 6, 1, 2);
INSERT INTO `tbl_res` VALUES(35, 1, 1, 5, 2);
INSERT INTO `tbl_res` VALUES(36, 1, 1, 5, 2);
INSERT INTO `tbl_res` VALUES(40, 3, 1, 2, 2);
INSERT INTO `tbl_res` VALUES(41, 3, 4, 3, 1);
INSERT INTO `tbl_res` VALUES(42, 3, 10, 2, 2);
INSERT INTO `tbl_res` VALUES(44, 1, 4, 5, 1);
INSERT INTO `tbl_res` VALUES(45, 3, 7, 2, 0);
INSERT INTO `tbl_res` VALUES(46, 3, 12, 3, 0);
INSERT INTO `tbl_res` VALUES(47, 9, 1, 2, 0);
INSERT INTO `tbl_res` VALUES(50, 7, 1, 1, 2);
INSERT INTO `tbl_res` VALUES(51, 7, 5, 1, 2);
INSERT INTO `tbl_res` VALUES(52, 7, 6, 2, 2);
INSERT INTO `tbl_res` VALUES(53, 7, 9, 1, 2);
INSERT INTO `tbl_res` VALUES(55, 1, 10, 1, 0);
INSERT INTO `tbl_res` VALUES(56, 7, 4, 1, 1);
INSERT INTO `tbl_res` VALUES(57, 1, 1, 5, 0);
INSERT INTO `tbl_res` VALUES(58, 7, 6, 1, 0);
INSERT INTO `tbl_res` VALUES(59, 1, 12, 1, 0);
INSERT INTO `tbl_res` VALUES(60, 1, 12, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` VALUES(1, 'admin', 'admin', 'male', 21, 'Nanjing University', '15298387062', 'njuprincerain@gmail.com', 0);
INSERT INTO `tbl_user` VALUES(2, 'rain', '19901024', 'male', 21, 'Nanjing University', '15298387062', 'njuprincerain@gmail.com', 0);
INSERT INTO `tbl_user` VALUES(3, 'paul', 'paul', 'male', 13, 'Xiamen University', '15727389403', 'paul@hotmail.com', 1);
INSERT INTO `tbl_user` VALUES(7, 'kitty', 'kitty', 'female', 19, 'King street', '187328493490', 'kitty@qq.com', 2);
INSERT INTO `tbl_user` VALUES(8, 'mao', 'map', 'male', 98, 'Central Street', '88888888', 'njullll@hsh.com', 2);
INSERT INTO `tbl_user` VALUES(9, 'gold', 'gold', 'male', 21, 'King Street', '15298387062', 'njupkkkk@nju.com', 3);
INSERT INTO `tbl_user` VALUES(10, 'aaa', 'aaa', 'male', 12, 'King Street', '1529398234', 'njasdis', 3);
INSERT INTO `tbl_user` VALUES(11, 'bbb', 'bbb', 'male', 16, 'king Street', '15298387062', 'klasdf@ksd.com', 1);
INSERT INTO `tbl_user` VALUES(12, 'ccc', 'ccc', 'female', 14, 'bor', '1234546', 'njiasodfj@ldsf.com', 1);
