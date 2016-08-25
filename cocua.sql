-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Сер 25 2016 р., 18:15
-- Версія сервера: 5.7.11
-- Версія PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `cocua`
--

-- --------------------------------------------------------

--
-- Структура таблиці `Codes`
--

CREATE TABLE IF NOT EXISTS `Codes` (
  `id` bigint(20) unsigned NOT NULL,
  `hashtag` varchar(255) NOT NULL,
  `code` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `Codes`
--

INSERT INTO `Codes` (`id`, `hashtag`, `code`) VALUES
(23, '#ccccccccc', 111111),
(24, '#vvvvvvvvv', 111111);

-- --------------------------------------------------------

--
-- Структура таблиці `Links`
--

CREATE TABLE IF NOT EXISTS `Links` (
  `id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `authorHashtag` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `Links`
--

INSERT INTO `Links` (`id`, `title`, `link`, `authorHashtag`) VALUES
(3, 'Наш клан на оффсайте', 'https://clashofclans.com/clans/clan?clanTag=CJJQQRY', '#999999999'),
(4, 'Редактор баз', 'http://clashofclansbuilder.com/build?latest=true', '#999999999'),
(5, 'Видео атак от Михи', 'https://www.youtube.com/channel/UCmESN8K_mYSTKai1rVbfnlw', '#999999999'),
(6, 'WIKIA CLash of clans', 'http://ru.clashofclans.wikia.com/wiki/Clash_of_Clans_Wiki', '#999999999');

-- --------------------------------------------------------

--
-- Структура таблиці `Plans`
--

CREATE TABLE IF NOT EXISTS `Plans` (
  `id` bigint(20) unsigned NOT NULL,
  `townhole` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `planName` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `authorHashtag` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `Plans`
--

INSERT INTO `Plans` (`id`, `townhole`, `description`, `planName`, `author`, `authorHashtag`) VALUES
(1, '10th', 'dvdv', 'Koala.jpg', 'Tanya', '#dddfffggg'),
(2, '9th', 'мівом  овмі  имоіви ои і ', 'Lighthouse.jpg', 'Tanya', '#dddfffggg'),
(3, '9th', 'ісівс ві   і ', 'Penguins.jpg', 'Tanya', '#dddfffggg'),
(4, '9th', 'ісівс ві   і ', 'Penguins.jpg', 'Tanya', '#dddfffggg'),
(5, '9th', 'ісівс ві   і ', 'Penguins.jpg', 'Tanya', '#dddfffggg'),
(9, '9th', 'gbffb', 'Jellyfish.jpg', 'Tanya', '#dddfffggg'),
(10, '11th', 'bftftb', 'Desert.jpg', 'Tanya', '#dddfffggg'),
(11, '8th', 'ccds', 'Chrysanthemum.jpg', 'Tanya', '#dddfffggg'),
(12, '8th', 'fbggfb', 'Hydrangeas.jpg', 'xxx', '#xxxxxxxxx'),
(13, '11th', 'vsddvsdv', 'Tulips.jpg', 'xxx', '#xxxxxxxxx'),
(14, '10th', 'авваав', '20151230_124424_03864.JPG', 'xxx', '#xxxxxxxxx'),
(15, '10th', 'авваав', '20151230_124424_03864.JPG', 'xxx', '#xxxxxxxxx'),
(16, '10th', 'ыссы', '20151230_124219_03849.JPG', 'xxx', '#xxxxxxxxx'),
(17, '9th', 'пімі', '2016-05-12-15-38-10.png', 'Tanya', '#dddfffggg'),
(18, '9th', 'сііс', '2016-05-12-15-38-10.png', 'Tanya', '#dddfffggg');

-- --------------------------------------------------------

--
-- Структура таблиці `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` bigint(20) unsigned NOT NULL,
  `hashtag` varchar(255) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `given` int(255) NOT NULL DEFAULT '0',
  `taken` int(255) NOT NULL DEFAULT '0',
  `ratio` float NOT NULL DEFAULT '0',
  `points` int(255) DEFAULT '0',
  `city` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `avatarName` varchar(255) NOT NULL DEFAULT 'avatar.jpg	'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `Users`
--

INSERT INTO `Users` (`id`, `hashtag`, `nick`, `name`, `rank`, `given`, `taken`, `ratio`, `points`, `city`, `occupation`, `password`, `birthday`, `phone`, `email`, `date`, `avatarName`) VALUES
(1, '#2P8LY8QPJ', 'Денис', 'Денис', 'Leader', 400, 400, 1, 0, 'Винница', 'Сметчик', '1111', '1990-05-08', '+38(096)7777775', 'xxx@xxx.ru', '2016-07-05', 'avatar.jpg'),
(2, '#CSF3C5V7D', 'Коготь І', 'Андрей', 'Co Leader', 600, 400, 1.5, 1, 'Киев', 'Банкир', '1111', '1985-07-05', '+38(096)7777777', 'xxx@xxx.ru', '2016-07-04', 'avatar.jpg'),
(3, '#CSF3DRFG', 'Коготь ІІ', 'Андрей', 'Co Leader', 600, 500, 1.2, 1, 'Киев', 'Банкир', '1111', '1985-07-05', '+38(096)7777777', 'xxx@xxx.ru', '2016-07-03', 'avatar.jpg'),
(4, '#CSZCZCSC5', 'Dima', 'Dima', 'Co Leader', 0, 0, 0, 0, 'Kiev', 'Student', '1111', '1995-12-12', '+38(096)5552223', 'xxx@xxx.ru', '2016-05-05', 'avatar.jpg'),
(5, '#CSZCZCSCS', '★Апостол Пётр★', 'Пётр', 'Co Leader', 0, 0, 0, 0, 'Киев', '1234567 890123 4567890 890123 4567890 ', '1111', '1995-12-12', '+38(096)5552223', 'xxx@xxx.ru', '2016-05-05', 'avatar.jpg'),
(6, '#CSCDVEVDC', 'Afina', 'Юлия', 'Co Leader', 0, 0, 0, 0, 'Чернигов', 'Домохозяйка', '1111', '1980-01-01', '+38(096)5555553', 'xxx@xxx.ru', '2016-07-10', 'avatar.jpg'),
(7, '#DFE345DCA', 'Roma', 'Рома', 'Member', 0, 0, 0, 0, 'Львов', 'инженер', '1111', '1985-12-22', '+38(096)5555551', 'xxx@xxx.ru', '2016-07-11', 'avatar.jpg'),
(8, '#123ghj123', 'Vovchick', 'Владимир', 'Member', 0, 0, 0, 0, 'Киев', 'инженер', '123456', '1980-01-01', '+38(096)5555444', 'vvv@mail.ru', '2016-07-13', 'avatar.jpg'),
(9, '#dddfffggg', 'Tanya', 'Роман', 'Member', 0, 0, 0, 0, 'Владивосток', 'инженер-системотехник', '112233', '1980-01-01', '+38(096)5555444', 'aaa24@bk.ru', '2016-07-13', 'avatar.jpg'),
(10, '#123456789', 'Dima', 'Діма', 'Member', 0, 0, 0, 0, 'Киев', 'програмист PHP', '111111', '1986-01-01', '+38(096)5555554', 'aaa24@bk.ru', '2016-07-14', 'avatar.jpg'),
(11, '#ZZZXXXCCC', 'Alonka', 'Альона', 'Member', 0, 0, 0, 0, 'Вінниця', 'вчитель англійської мови', '111111', '1990-01-22', '+38(096)1114442', 'alona22011990@meta.ua', '2016-07-16', 'avatar.jpg'),
(12, '#qqq111222', 'SHURIK', 'Саня', 'Member', 0, 0, 0, 0, 'Кривой Рог', 'строитель', '111111', '1992-05-01', '+38(096)5555447', 'vvv@mail.ru', '2016-07-16', 'avatar.jpg'),
(13, '#QQQAAAZZZ', 'Sova', 'Кирил', 'Member', 0, 0, 0, 0, 'Льовов', 'сапожник', '111111', '1985-01-01', '+38(096)5555442', 'aaa24@bk.ru', '2016-07-16', 'avatar.jpg'),
(14, '#ZZZAAAQQQ', 'Sova', 'Кирил', 'Member', 0, 0, 0, 0, 'Льовов', 'сапожник', '111111', '1985-01-01', '+38(096)5555442', 'aaa24@bk.ru', '2016-07-16', 'avatar.jpg'),
(15, '#111111111', 'Соня', 'Наташа', 'Elder', 0, 0, 0, 0, 'Саратов', 'политик', '111111', '1995-05-05', '+38(096)5555522', 'vvv@mail.ru', '2016-07-16', 'images.jpg'),
(17, '#444444444', 'Vova', 'Вован', 'Member', 0, 0, 0, 0, 'Киров', 'водитель', '111111', '1965-02-01', '+38(096)5555551', 'vvv@mail.ru', '2016-07-16', '41djdgSmk8L._SY300_.jpg'),
(18, '#555555555', '123', '123', 'Member', 0, 0, 0, 0, '123', '123', '123456', '2016-08-01', '+38(096)5555554', 'vvv@mail.ru', '2016-08-18', 'avatar.jpg'),
(19, '#777777777', '123', '7777777', 'Member', 0, 0, 0, 0, '123', '123', '7777777', '1990-01-01', '+38(096)5555554', 'vvv@mail.ru', '2016-08-18', 'avatar.jpg'),
(20, '#888888888', '888', '888', 'Member', 0, 0, 0, 0, '888', '888', '88888888', '1985-01-01', '+38(096)5555551', 'alona22011990@meta.ua', '2016-08-18', 'avatar.jpg'),
(22, '#999999999', '011', '111', 'Member', 0, 0, 0, 0, '111', '111', '555555', '1999-01-01', '+38(096)5555554', 'vvv@mail.ru', '2016-08-20', 'avatar.jpg'),
(23, '#xxxxxxxxx', 'xxx', 'xxx', 'Elder', 0, 0, 0, 0, 'xxx', 'xxxx', '5555555', '2016-08-01', '+38(096)5555444', 'vvv@mail.ru', '2016-08-21', 'avatar.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `Videos`
--

CREATE TABLE IF NOT EXISTS `Videos` (
  `id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `townhole` varchar(10) NOT NULL,
  `authorHashtag` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `Videos`
--

INSERT INTO `Videos` (`id`, `title`, `link`, `townhole`, `authorHashtag`, `author`) VALUES
(7, 'vdssdvds', 'w2EEcCrYVJY', '9th', '#dddfffggg', 'Tanya'),
(8, 'dvsvsdv', 'xhh5Z3GU0zk', '9th', '#dddfffggg', 'Tanya'),
(9, 'dvsvsdv', 'xhh5Z3GU0zk', '9th', '#dddfffggg', 'Tanya'),
(10, 'Интересная фан КВшка против финов. Трёшки с тх11,тх10 и тх9.', 's5IHhEMyaKg', '9th', '#dddfffggg', 'Tanya'),
(11, 'вімівм', '8KvOTkud1bo', '9th', '#dddfffggg', 'Tanya'),
(12, 'ісфісф', '8KvOTkud1bo', '9th', '#dddfffggg', 'Tanya'),
(13, 'сіфісфіс', '8KvOTkud1bo', '9th', '#dddfffggg', 'Tanya');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `Codes`
--
ALTER TABLE `Codes`
  ADD UNIQUE KEY `id` (`id`);

--
-- Індекси таблиці `Links`
--
ALTER TABLE `Links`
  ADD UNIQUE KEY `id` (`id`);

--
-- Індекси таблиці `Plans`
--
ALTER TABLE `Plans`
  ADD UNIQUE KEY `id` (`id`);

--
-- Індекси таблиці `Users`
--
ALTER TABLE `Users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Індекси таблиці `Videos`
--
ALTER TABLE `Videos`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `Codes`
--
ALTER TABLE `Codes`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблиці `Links`
--
ALTER TABLE `Links`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `Plans`
--
ALTER TABLE `Plans`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблиці `Users`
--
ALTER TABLE `Users`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблиці `Videos`
--
ALTER TABLE `Videos`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
