
# create User
CREATE TABLE user(
  pk_id BIGINT PRIMARY KEY NOT NULL  AUTO_INCREMENT,
  gmt_create DATETIME NOT NULL,
  gmt_modified DATETIME NOT NULL,
  name VARCHAR(20) NOT NULL,
  nick_name VARCHAR(20),
  phone_nou CHAR(11),
  email VARCHAR(50)
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
