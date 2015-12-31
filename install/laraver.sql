

-- TABLE `users` --------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `privileges` text NOT NULL,
  `remember_token` char(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- TABLE `log` --------------------------------

DROP TABLE IF EXISTS `log`;

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(255) NOT NULL,
  `request_ip` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `request_method` varchar(10) NOT NULL,
  `request_action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- INSERT DATA -------------------------------

INSERT INTO `users` (`id`, `email`, `password`, `privileges`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'koocyton@gmail.com', '$2y$10$nESxkc/IhXhXsWyJw8HdOuaSfEpSGJc0YusciWhe2LlzN/w64EptS', 'manager,log', '', '2015-12-01 10:10:36', '2015-12-22 13:47:36'),
(2, 'liuyi@doopp.com', '$2y$10$btLBNhu6kBBnc5muoFc.Q.u9ymPO.5nv3gRxewdsihUsFGfMhrEx6', 'manager,log', '', '2015-12-05 05:14:57', '2015-12-19 05:15:11');
