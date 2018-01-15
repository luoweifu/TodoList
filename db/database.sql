# create database
CREATE DATABASE todolist;

# use specific database
USE todolist;

# create User
CREATE TABLE user(
  pk_id BIGINT PRIMARY KEY NOT NULL  AUTO_INCREMENT,
  gmt_create DATETIME NOT NULL,
  gmt_modified DATETIME NOT NULL,
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
  pk_user_id  BIGINT NOT NULL,
  name VARCHAR(20) NOT NULL,
  is_default TINYINT  # 是否为系统默认类目
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

INSERT INTO category(gmt_create, gmt_modified, pk_user_id, name, is_default) VALUES (NOW(), NOW(), 6, 'Today\'s task', 1);
INSERT INTO category(gmt_create, gmt_modified, pk_user_id, name, is_default) VALUES (NOW(), NOW(), 6, 'To do event', 1);
INSERT INTO category(gmt_create, gmt_modified, pk_user_id, name, is_default) VALUES (NOW(), NOW(), 6, 'Short-term goal', 1);
INSERT INTO category(gmt_create, gmt_modified, pk_user_id, name, is_default) VALUES (NOW(), NOW(), 6, 'Medium-term Goal', 1);
INSERT INTO category(gmt_create, gmt_modified, pk_user_id, name, is_default) VALUES (NOW(), NOW(), 6, 'Long-term goals', 1);

SELECT pk_id, name FROM category WHERE pk_user_id='6'
