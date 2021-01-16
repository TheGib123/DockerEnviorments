<?php

$sql = array(
"
CREATE TABLE IF NOT EXISTS CUSTOMERS (
    customerID int NOT NULL AUTO_INCREMENT,
    name varchar(255),
    email varchar(255),
    PRIMARY KEY (customerID)
);
",
"
CREATE TABLE IF NOT EXISTS EMPLOYEES (
    customerID int NOT NULL AUTO_INCREMENT,
    name varchar(255),
    email varchar(255),
    PRIMARY KEY (customerID)
);
"
);

for($i=0; $i<count($sql); $i++){
    Query($sql[$i]);
}

?>