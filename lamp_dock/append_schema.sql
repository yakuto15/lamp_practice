CREATE TABLE history(
    order id INT(11) AUTO_INCREMENT,
    time DATETIME NOT NULL,
    total INT(11) DEFAULT 0,
);

CREATE TABLE details(
    name varchar(64) NOT NULL defalt,
    price int(11) NOT NULL,
    pieces int(11) NOT NULL,
    amount int(11) NOT NULL,
);

SELECT order_id,
FROM history
OUTER JOIN items
on history.order_id = items.cart_id;

SELECT name,
FROM details
OUTER JOIN items
on details.name = items.name;
