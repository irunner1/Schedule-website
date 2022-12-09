CREATE DATABASE IF NOT EXISTS appDB DEFAULT CHARACTER SET utf8;
CREATE USER IF NOT EXISTS 'user' @'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON appDB.* TO 'user' @'%';
FLUSH PRIVILEGES;
USE appDB;

SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    password VARCHAR(75) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS user_table (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    task_name VARCHAR(15) NOT NULL,
    task_time DATETIME NULL,
    task_desc VARCHAR(25) NULL,
    marker VARCHAR(7) NULL,
    user_num INT(10) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;


insert into users (name, password) values
    (
        'admin',
        '$2y$10$Fs8elYYdmdjSw1N9TxxOn.yteCrnUuoO6rNlIDzwl1Rsj9Ea75iee' -- admin1
    ),
    (
        'irunner',
        '$2y$10$DO0u.khvkt9J8yYMa1i8kuAXkfPw6r3Wh8dYRgFr9p5xugnMTwAx6' -- usert
    ),
    (
        'user',
        '$2y$10$xdpVj5VEC7k/FQlXbSk88.UKLXTpn27.Ywyidyf.ZyiabnJ5olTci' -- password
    );

insert into user_table (task_name, task_desc, task_time, marker, user_num) values
('Сделать что то', 'дело 1', '2022-12-05 12:00:00', 'red', 1),
('Сделать что то', 'дело 2', '2022-12-05 12:00:00', 'blue', 1),
('Сделать что то', 'дело 3', '2022-12-04 12:00:00', 'yellow', 1);