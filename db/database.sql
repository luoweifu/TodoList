# create database
CREATE DATABASE todolist;

# use specific database
USE todolist;

# create User
CREATE TABLE user(
  pk_id BIGINT PRIMARY KEY NOT NULL  AUTO_INCREMENT,
  gmt_create DATETIME NOT NULL,
  gmt_modified DATETIME NOT NULL,
  uk_account VARCHAR(20) NOT NULL,
  nick_name VARCHAR(20),
  uk_phone_num CHAR(11),
  uk_email VARCHAR(50),
  password VARCHAR(50)
);

# Category
CREATE TABLE category(
  pk_id BIGINT PRIMARY KEY NOT NULL  AUTO_INCREMENT,
  gmt_create DATETIME NOT NULL,
  gmt_modified DATETIME NOT NULL,
  name VARCHAR(20) NOT NULL
);

# Tag
CREATE TABLE tag(
  pk_id BIGINT PRIMARY KEY NOT NULL  AUTO_INCREMENT,
  gmt_create DATETIME NOT NULL,
  gmt_modified DATETIME NOT NULL,
  name VARCHAR(20) NOT NULL
);

# TodoList
CREATE TABLE task(
  pk_id BIGINT PRIMARY KEY NOT NULL  AUTO_INCREMENT,
  gmt_create DATETIME NOT NULL,
  gmt_modified DATETIME NOT NULL,
  title VARCHAR(100) NOT NULL,
  remark VARCHAR(200),
  remind_time DATETIME,
  block_time INTEGER NOT NULL,
  block_number INTEGER,
  is_finished TINYINT,
  finished_time INTEGER NOT NULL,
  uk_user BIGINT,
  uk_categroy BIGINT,
  uk_tag BIGINT
);


INSERT INTO user(gmt_create, gmt_modified, uk_account, nick_name, uk_phone_num, uk_email, password) VALUES (NOW(), NOW(), 'Spencer', 'Spencer', '18500315888', 'luoweifu@126.com', 'Spencer.Luo');
SELECT nick_name, uk_phone_num, uk_email FROM user;