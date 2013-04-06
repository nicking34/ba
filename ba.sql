CREATE DATABASE `ba` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci

DROP TABLE IF EXISTS user;

CREATE TABLE  user(
	 uid  int(11) NOT NULL AUTO_INCREMENT,
	 password  varchar(255) DEFAULT NULL,
	 uname  varchar(255) DEFAULT NULL,
	 ctime  int(11) DEFAULT NULL,
	 role  tinyint(1)NOT NULL DEFAULT  0 ,
	PRIMARY KEY( uid )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS user_count;

CREATE TABLE user_count(
	uid int(11) NOT NULL,
	score int(11) NOT NULL DEFAULT 0,
	sfeed int(11) NOT NULL DEFAULT 0,
	lfeed int(11) NOT NULL DEFAULT 0,
	fans int(11) NOT NULL DEFAULT 0,
	attention int(11) NOT NULL DEFAULT 0,
	PRIMARY KEY( uid )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS friend;

CREATE TABLE friend(
	fid int(11) NOT NULL AUTO_INCREMENT,
	uid int(11) NOT NULL,
	fansid int(11) NOT NULL,
	PRIMARY KEY(fid)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS sfeed;

CREATE TABLE sfeed(
	sfeedid int(11) NOT NULL AUTO_INCREMENT,
	uid int(11) NOT NULL,
	content text NOT NULL,
	comment int(11) NOT NULL DEFAULT 0,
	ctime int(11) DEFAULT NULL,
	store int(11) NOT NULL DEFAULT 0,
	islike int(11) NOT NULL DEFAULT 0,
	unlike int(11) NOT NULL DEFAULT 0,
	status tinyint(1) NOT NULL DEFAULT 0,
	anonymous tinyint(1) NOT NULL DEFAULT 0,
	PRIMARY KEY(sfeedid),
	KEY ctime(ctime)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS sfeed_store;

CREATE TABLE sfeed_store(
	uid int(11) NOT NULL,
	sfeedid int(11) NOT NULL,
	PRIMARY KEY(uid,sfeedid)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS comment;

CREATE TABLE comment(
	cid int(11) NOT NULL auto_increment,
	uid int(11) NOT NULL,
	fid int(11) NOT NULL,
	floor int(11) NOT NULL DEFAULT 0,
	content text NOT NULL,
	ctime int(11) NOT NULL,
	PRIMARY KEY(cid),
	KEY fid(fid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS lfeed;

CREATE TABLE lfeed(
	lfeedid int(11) NOT NULL AUTO_INCREMENT,
	uid int(11) NOT NULL,
	title text NOT NULL,
	ctime int(11) DEFAULT NULL,
	store int(11) NOT NULL DEFAULT 0,
	islike int(11) NOT NULL DEFAULT 0,
	unlike int(11) NOT NULL DEFAULT 0,
	status tinyint(1) NOT NULL DEFAULT 0,
	sfeednum int(11) NOT NULL DEFAULT 0,
	PRIMARY KEY(lfeedid),
	KEY ctime(ctime)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS lfeed_store;

CREATE TABLE lfeed_store(
	uid int(11) NOT NULL,
	lfeedid int(11) NOT NULL,
	PRIMARY KEY(uid,lfeedid)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS lstore;

CREATE TABLE lstore(
	lfeedid int(11) NOT NULL,
	sfeedid int(11) NOT NULL,
	floor int(11) NOT NULL DEFAULT 0,
	PRIMARY KEY(lfeedid,sfeedid)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;






