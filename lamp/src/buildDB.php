<html>
<body>
<?php
include("functions.php");
$sql = "
CREATE TABLE CUSTOMERS (
    customerID int NOT NULL AUTO_INCREMENT,
    name varchar(255),
    email varchar(255),
    PRIMARY KEY (customerID)
);
";

Query($sql);

print("<h1>Executed SQL commands</h1>")

?>
</body>
</html>