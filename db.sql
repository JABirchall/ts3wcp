CREATE TABLE IF NOT EXISTS `cms_abteilung` (
  `apteilID` int(11) NOT NULL AUTO_INCREMENT,
  `apteilServer` varchar(255) NOT NULL,
  `apteilName` varchar(255) NOT NULL,
  `apteilEmail` varchar(255) NOT NULL,
  `apteilUser` varchar(255) NOT NULL,
  `apteilPasswort` varchar(255) NOT NULL,
  PRIMARY KEY (`apteilID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



INSERT INTO `cms_abteilung` (`apteilID`, `apteilServer`, `apteilName`, `apteilEmail`, `apteilUser`, `apteilPasswort`) VALUES
(1, '', 'Support', '', '', '');


CREATE TABLE IF NOT EXISTS `cms_config` (
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `modul` varchar(255) NOT NULL,
  FULLTEXT KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



INSERT INTO `cms_config` (`name`, `value`, `modul`) VALUES
('conf_siteName', 'TeamSpeak Web Control V2 Powerd by Riek-Media.com', 'system'),
('conf_systemEmail', 'noreplay@meinedomain.com', 'system'),
('conf_logoURL', 'resurces/img/logo.png', 'system'),
('conf_defaultTemplate', '', 'system'),
('conf_systemURL', 'http://meinedomain.com/', 'system'),
('conf_Language', '', 'system'),
('conf_Entries', '8', 'system'),
('conf_Maintenance', '1', 'system'),
('conf_MaintenanceText', 'Gebe hier deinen Wartungstext eins', 'system'),
('conf_LogEntries', '1000', 'system');



CREATE TABLE IF NOT EXISTS `cms_cronjobs` (
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `modul` varchar(255) NOT NULL,
  FULLTEXT KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



INSERT INTO `cms_cronjobs` (`name`, `value`, `modul`) VALUES
('cron_werbungHostText', '[color=green][b]TeamSpeak 3 Server bereits ab 0,16 â‚¬ pro Slot! Besuchen Sie unsere Webseite[url] http://www.riek-media.com[/url][/b][/color]', 'cronjob'),
('cron_werbungHostAllTimePlusTime', '60', 'cronjob'),
('cron_werbungHostAllTimeStamp', '1376240841', 'cronjob'),
('cron_werbungHostAll', '1', 'cronjob');



CREATE TABLE IF NOT EXISTS `cms_hostsystems` (
  `hostID` int(11) NOT NULL AUTO_INCREMENT,
  `hostName` varchar(255) NOT NULL,
  `hostUsername` varchar(255) NOT NULL,
  `hostPassword` varchar(255) NOT NULL,
  `hostIP` varchar(255) NOT NULL,
  `hostQueryPort` varchar(255) NOT NULL,
  `hostTyp` varchar(255) NOT NULL,
  PRIMARY KEY (`hostID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `cms_logs` (
  `logID` int(11) NOT NULL AUTO_INCREMENT,
  `logUserID` int(55) NOT NULL,
  `logText` text NOT NULL,
  `logAction` text NOT NULL,
  `logDate` int(255) NOT NULL,
  PRIMARY KEY (`logID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `cms_logs` (`logID`, `logUserID`, `logText`, `logAction`, `logDate`) VALUES
(1, 1, 'Der Administrator: logte sich erfolgreich ein!', '', 1374413122);



CREATE TABLE IF NOT EXISTS `cms_news` (
  `newsID` int(11) NOT NULL AUTO_INCREMENT,
  `newsUserID` int(11) NOT NULL,
  `newsTitel` varchar(255) NOT NULL,
  `newsText` text NOT NULL,
  `newsData` int(77) NOT NULL,
  `newsStatus` int(11) DEFAULT NULL COMMENT '0',
  PRIMARY KEY (`newsID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `cms_servers` (
  `serverID` int(11) NOT NULL AUTO_INCREMENT,
  `serverHostID` int(55) NOT NULL,
  `serverSid` varchar(11) NOT NULL,
  `serverUserNumber` varchar(255) NOT NULL,
  `serverPort` varchar(255) NOT NULL,
  `serverStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`serverID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;





CREATE TABLE IF NOT EXISTS `cms_tickets` (
  `ticketID` int(11) NOT NULL AUTO_INCREMENT,
  `ticketApteilID` int(255) NOT NULL,
  `ticketProductID` int(55) NOT NULL,
  `ticketUserNumber` varchar(255) NOT NULL,
  `ticketUserName` varchar(255) NOT NULL,
  `ticketUserEmail` varchar(255) NOT NULL,
  `ticketBetreff` text NOT NULL,
  `ticketText` text NOT NULL,
  `ticketData` int(255) NOT NULL,
  `prioritaet` int(11) NOT NULL,
  `ticketStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ticketID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `cms_tickets_verlauf` (
  `verlaufID` int(11) NOT NULL AUTO_INCREMENT,
  `verlaufApteilID` int(55) NOT NULL,
  `verlaufTicketID` int(255) NOT NULL,
  `verlaufUserNumber` int(255) NOT NULL,
  `verlaufText` text NOT NULL,
  `verlaufAuthor` varchar(255) NOT NULL,
  `verlaufData` int(255) NOT NULL,
  PRIMARY KEY (`verlaufID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `cms_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userNumber` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userFirstName` varchar(255) NOT NULL,
  `userLastName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userLevel` int(5) NOT NULL DEFAULT '0',
  `userRegisterData` int(66) NOT NULL,
  `userLastLogin` int(255) NOT NULL DEFAULT '0',
  `userStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;



INSERT INTO `cms_users` (`userID`, `userNumber`, `userName`, `userPassword`, `userFirstName`, `userLastName`, `userEmail`, `userLevel`, `userRegisterData`, `userLastLogin`, `userStatus`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'admin', 'admin@meinedomain.de', 4, 1375011387, 1376238991, 0);

