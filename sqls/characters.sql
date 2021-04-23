DROP TABLE IF EXISTS `characters`;
CREATE TABLE `characters` (
  `Name` varchar(45) NOT NULL DEFAULT '',
  `online` int(45) DEFAULT NULL,
  `pvpkills` int(20) DEFAULT NULL,
  `pkkills` int(11) DEFAULT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--test