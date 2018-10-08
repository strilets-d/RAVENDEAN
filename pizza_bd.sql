-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 08 2018 г., 09:49
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pizza_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Products`
--

CREATE TABLE `Products` (
  `id_product` int(11) NOT NULL,
  `id_type_product` int(11) NOT NULL,
  `name_product` varchar(35) NOT NULL,
  `price` int(8) NOT NULL,
  `photo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Products`
--

INSERT INTO `Products` (`id_product`, `id_type_product`, `name_product`, `price`, `photo`) VALUES
(1, 1, 'Пеппероні з томатами', 80, '1.jpg'),
(2, 1, 'Амерікана', 150, '2.jpg'),
(3, 1, 'Баварська', 127, '3.jpg'),
(4, 1, 'Барбекю', 104, '4.jpg'),
(5, 1, 'BBQ Делюкс', 150, '5.jpg'),
(6, 1, 'Карбонара', 127, '6.jpg'),
(7, 1, 'Кантрі', 127, '7.jpg'),
(8, 1, 'Гавайська', 104, '8.jpg'),
(9, 1, 'МітZZа', 154, '9.jpg'),
(10, 1, 'Маргарита', 80, '10.jpg'),
(11, 2, 'Шоколадні ролли', 57, '11.jpg'),
(12, 2, 'Шоколадний маффін', 25, '12.jpg'),
(13, 2, 'Лава кейк', 48, '13.jpg'),
(14, 2, 'Ванільний маффін', 25, '14.jpg'),
(15, 2, 'Байтси з корицею', 45, '15.jpg'),
(16, 3, 'Coca-Cola', 22, '16.jpg'),
(17, 3, 'BonAqua', 20, '17.png'),
(18, 3, 'Coca-Cola Zero', 22, '18.jpg'),
(19, 3, 'Fanta', 28, '19.jpg'),
(20, 3, 'Sprite', 29, '20.png'),
(21, 4, 'Курячі стріпси', 95, '21.jpg'),
(22, 4, 'Крильця BBQ', 95, '22.jpg'),
(23, 4, 'Салат з куркою', 70, '23.jpg'),
(24, 4, 'Салат з тунцем', 70, '24.jpg'),
(25, 4, 'Картопляні дольки', 52, '25.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `product_type`
--

CREATE TABLE `product_type` (
  `id_type` int(10) NOT NULL,
  `name_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_type`
--

INSERT INTO `product_type` (`id_type`, `name_type`) VALUES
(1, 'Піцца'),
(2, 'Десерти'),
(3, 'Напої'),
(4, 'Сайди');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_type_product` (`id_type_product`);

--
-- Индексы таблицы `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Products`
--
ALTER TABLE `Products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id_type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_type_product`) REFERENCES `product_type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
