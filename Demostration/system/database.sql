

/*
*
*   Database : dreampark
*   User : root
*   Password :
*
*/

-- Create Admin Table

CREATE TABLE admin (
admin_id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
phone VARCHAR(15),
username VARCHAR(20) NOT NULL UNIQUE,
password VARCHAR(10) NOT NULL
);


-- Create User Table

CREATE TABLE user (
user_id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
phone VARCHAR(15),
address VARCHAR(50),
email VARCHAR(20) NOT NULL UNIQUE,
password VARCHAR(10) NOT NULL
);


-- Create Packages Table

CREATE TABLE package (
p_no INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
description VARCHAR(200) NOT NULL,
price DOUBLE NOT NULL,
date_from DATETIME NOT NULL,
date_to DATETIME NOT NULL
);


-- Create Booking Table

CREATE TABLE booking (
ref INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
p_no INT,
date DATETIME NOT NULL,
status VARCHAR(10) NOT NULL,
FOREIGN KEY (user_id) REFERENCES user(user_id),
FOREIGN KEY (p_no) REFERENCES package(p_no)
);


-- Insert details into admin table

INSERT INTO admin (name, phone, username, password)
VALUES ('Aslam Anver','0715263859','aslam','aslam1234');
