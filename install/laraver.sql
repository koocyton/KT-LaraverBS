

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
(1, 'admin@doopp.com', '$2y$10$eLC.jNm5NIEnd28cW.5jHOiH9jEHTvShMjF22fB/FrUTy7Et6O5PC', 'manager,log', '', '2015-12-01 10:10:36', '2015-12-22 13:47:36');
