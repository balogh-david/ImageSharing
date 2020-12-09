CREATE DATABASE image_sharing CHARACTER SET utf8 COLLATE utf8_hungarian_ci;

CREATE TABLE registered_accounts (
    id int AUTO_INCREMENT,
    username varchar(36),
    email varchar(126),
    password varchar(254),
    PRIMARY KEY (id)
);

CREATE TABLE images (
    image_id int AUTO_INCREMENT,
    user_id int,
    username varchar(36),
    file_name varchar(255),
    image_data LONGBLOB,
    uploaded_on datetime,
    PRIMARY KEY (image_id)
);

CREATE TABLE comments (
    image_id int,
    username varchar(36),
    comment LONGTEXT,
    commented_on datetime
);

CREATE TABLE likes (
    id int  AUTO_INCREMENT,
    image_id int,
    user_id int,
    PRIMARY KEY (id),
    CONSTRAINT UC_likes UNIQUE (image_id, user_id)
);