SET NAMES 'utf8';

USE nextsale;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
  ID int(11) NOT NULL AUTO_INCREMENT,
  uFullName varchar(32) DEFAULT NULL,
  uAge smallint(6) DEFAULT 18,
  uEmail varchar(32) DEFAULT NULL,
  uSalary decimal(10, 2) DEFAULT 300.00,
  uDeleted tinyint(1) DEFAULT 0,
  uUpdated int(11) DEFAULT NULL,
  PRIMARY KEY (ID)
)
ENGINE = INNODB,
AUTO_INCREMENT = 12,
AVG_ROW_LENGTH = 1638,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci,
COMMENT = 'İstifadəçilər';

INSERT INTO users VALUES
(1, 'Əliyev Seymur', 24, 'seymur@mail.com', 2000.00, 0, 1606990352),
(2, 'Məmmədov Vasif', 28, 'vasif@mail.ru', 2400.00, 0, 1606990101),
(3, 'Ramazanova Kəmalə', 25, 'kamala@gmail.com', 1500.00, 0, 1606998255),
(4, 'Qurbanov Ramil', 33, 'ramil@yahoo.com', 1800.00, 1, 1606990352),
(5, 'Xanlarov Surxay', 42, 'surxay@microsoft.com', 3500.00, 0, 1606998514),
(6, 'Cəfərzadə Nərgiz', 37, 'nargiz@education.az', 2800.00, 0, 1606990352),
(7, 'Michael', 40, 'michael@mail.com', 3200.00, 1, 1606997362),
(8, 'David', 43, 'davidoff@mail.com', 1200.00, 1, 1606991040),
(9, 'Ernest', 41, 'ernest@mail.com', 3500.00, 0, 1606991217),
(10, 'Ulduz', 38, 'hr@mail.com', 3850.00, 0, 1606990796),
(11, 'Richard', 47, 'richard@mail.com', 3800.00, 0, 1606998140);