-- phpMy SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 23. Apr 2024 um 10:23
-- Server-Version: 5.7.39
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cms_edvgraz`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `images_id` int(11) DEFAULT NULL,
  `published` tinyint(4) NOT NULL,
  `seo_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `articles`
--

INSERT INTO `articles` (`id`, `title`, `summary`, `content`, `created`, `category_id`, `user_id`, `images_id`, `published`, `seo_title`) VALUES
(1, 'Rasperry Pi 5', 'Raspberry Pi 5 is the latest version of the Raspberry Pi series. It is a small single-board computer that can be used for various purposes.', 'orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer', '2024-04-02 09:30:59', 1, 1, 9, 1, 'rasperry-pi-5'),
(2, 'Nvidia RTX 4090', 'Nvidia RTX 4090 is the latest graphics card from Nvidia. It is the most powerful graphics card in the world.', 'orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer', '2024-04-02 09:30:59', 1, 2, 10, 1, 'nvidie-rtx-4090'),
(3, 'Windows 11', 'Windows 11 is the latest version of the Windows operating system. It comes with a new design and many new features.', 'orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer', '2024-04-02 09:30:59', 2, 3, 11, 1, 'windows-11'),
(4, 'Mac Sonoma 14', 'Mac Sonoma 14 is the latest operating System from Apple. It comes with a lot of new features.', 'orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer', '2024-04-02 09:30:59', 2, 1, 12, 1, 'sonoma'),
(5, 'Sophos XG 460', 'Sophos XG 460 is the latest firewall from Sophos. It is a powerful firewall that can protect your network from cyber attacks.', 'orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer', '2024-04-02 09:30:59', 3, 2, 13, 1, 'sophos-xg-460'),
(6, 'Cisco Catalyst 9500', 'Cisco Catalyst 9500 is the latest switch from Cisco. It is a high-performance switch that can handle high traffic.', 'orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer', '2024-04-02 09:30:59', 3, 3, 14, 1, 'catalyst-9500'),
(7, 'Endpoint Protection', 'Endpoint Protection is a security solution that protects your devices from cyber threats. It can protect your devices from malware, ransomware, and other cyber attacks.', 'orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer', '2024-04-02 09:30:59', 4, 1, 15, 1, 'endpoint'),
(8, 'Cloud Security', 'Cloud Security is a security solution that protects your cloud infrastructure from cyber threats. It can protect your cloud infrastructure from DDoS attacks, data breaches, and other cyber attacks.', 'orci et <strong>ultrices</strong> posuere <em>cubilia</em> curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer test', '2024-04-02 09:30:59', 4, 2, 16, 1, 'cloud-security');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(254) NOT NULL,
  `navigation` tinyint(1) NOT NULL,
  `seo_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `navigation`, `seo_title`) VALUES
(1, 'Hardware', 'In the Category Hardware you can find all the Hardware related stuff.', 1, 'hardware'),
(2, 'Software', 'In the Category Software you can find all the Software related stuff', 1, 'software'),
(3, 'Network', 'In the Category Network you can find all the Network related stuff', 1, 'network'),
(4, 'Security', 'In the Category Security you can find all the Security related stuff', 1, 'security');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `alttext` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`id`, `filename`, `alttext`) VALUES
(1, 'hardware.jpg', 'Hardware'),
(2, 'software.jpg', 'Software'),
(3, 'network.jpg', 'Network'),
(4, 'security.jpg', 'Security'),
(9, 'raspberry.jpg', 'Raspberry Pi Version 5'),
(10, 'nvidia4090.jpg', 'Grafikkarte Nvidia RTX 4090'),
(11, 'win11.jpg', 'Windows eleven logo'),
(12, 'sonoma.jpg', 'Logo of Mac OS Sonoma'),
(13, 'sophos460.jpg', 'Firewall Sophos XG 460'),
(14, 'cisco9500.jpg', 'Cisco Switch Catalyst 9500'),
(15, 'endpoint.jpg', 'Endpoint Protection sample image'),
(16, 'cloud_security.jpg', 'Sample image of Cloud Protection'),
(69, 'php-grundlagen.png', 'php grundlagen uml');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `forename` varchar(100) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(254) NOT NULL,
  `joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_pic` varchar(254) DEFAULT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `forename`, `surname`, `email`, `password`, `joined`, `profile_pic`, `role`) VALUES
(1, 'John', 'Doe', 'john.doe@supermail.com', '67kxjdkfK?ksjdKI', '2024-04-02 08:37:31', NULL, 'admin'),
(2, 'Jane', 'Doe', 'jane.doe@supermail.com', '67kxjdkfK?ksjdKI', '2024-04-02 08:37:31', NULL, 'admin'),
(3, 'Susanne', 'Oberwohl', 'susanne.oberwohl@supermail.com', '67kxjdkfK?ksjdKI', '2024-04-02 08:37:31', NULL, 'admin'),
(14, 'Max', 'Mustermann', 'max.muster@mail.at', '$2y$10$JDTNcop4iOH/zYU1yr8Ue.Ad3W1uaqbIBD2u/1UCLSdYXzc1pV5fG', '2024-04-22 07:24:37', NULL, 'admin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`) USING BTREE,
  ADD KEY `category_exists` (`category_id`),
  ADD KEY `image_exests` (`images_id`),
  ADD KEY `user_exists` (`user_id`);

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING BTREE;

--
-- Indizes für die Tabelle `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `category_exists` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `image_exests` FOREIGN KEY (`images_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `user_exists` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
