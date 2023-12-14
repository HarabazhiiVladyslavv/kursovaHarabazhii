CREATE TABLE `aut` (
  `id_aut` int(6) NOT NULL auto_increment,
  `login` tinytext NOT NULL,
  `passw` tinytext NOT NULL,
  PRIMARY KEY  (id_aut)
) TYPE=MyISAM;

INSERT INTO `aut` VALUES (0, 'admin', 'b59c67bf196a4758191e42f76670ceba');

CREATE TABLE `log` (
  `id_log` int(6) NOT NULL auto_increment,
  `login` tinytext NOT NULL, 
  `ip` tinytext NOT NULL,
  `time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id_log)
) TYPE=MyISAM;