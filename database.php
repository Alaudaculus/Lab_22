<?php
$host = "localhost";
$login = "root";
$pass = "";
$name_db = "lb_pdo_goods";

$db_driver="mysql";
$dsn = "$db_driver:host=$host; dbname=$name_db";

$options = array(PDO::ATTR_PERSISTENT => true, PDO::
MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
try {
$dbh = new PDO ($dsn, $login, $pass, $options);
}
catch (PDOException $e) {
echo "Error!: " . $e->getMessage() . "<br/>"; die();
}

?>