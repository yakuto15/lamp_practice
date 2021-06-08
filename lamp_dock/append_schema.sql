CREATE TABLE orders(
    `order_id` INT(11) AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `time` DATETIME NOT NULL,
    `total` INT(11) DEFAULT 0
) ;

CREATE TABLE details(
    `detail_id` INT(11) AUTO_INCREMENT,
    `order_id` INT(11),
    `item_id` INT(11) NOT NULL,
    `pieces` INT(11) NOT NULL,
    `amount` INT(11) NOT NULL
);


/*SELECT name
FROM orders
JOIN details
on orders.details_id = details.details_id;

SELECT name,
FROM details
OUTER JOIN items
on details.name = items.name;
*/
