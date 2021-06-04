CREATE TABLE history(
    number INT(11) AUTO_INCREMENT,
    time DATETIME NOT NULL,
    total INT(11) DEFAULT 0,
);

CREATE TABLE details(
    name varchar(64) NOT NULL defalt,
    price int(11) NOT NULL,
    pieces int(11) NOT NULL,
    amount int(11) NOT NULL,
);
