CREATE TABLE IF NOT EXISTS `user_weapons` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `uuid` varchar(255) NOT NULL,
    `displayName` varchar(255) NOT NULL,
    `displayIcon` varchar(255) NOT NULL,
    `chromas` JSON DEFAULT NULL,
    `levels` JSON DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=19