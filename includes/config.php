<?php 
// DB credentials.
define('DB_HOST','us-cdbr-east-03.cleardb.com');
define('DB_USER','b00554e870b498');
define('DB_PASS','e83311a6');
define('DB_NAME','heroku_38041a1b6a51f2b');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
