<?php
include_once("config.php");
try {
    $pdoconn = new PDO("mysql:host=$host; dbname=$database", $user, $pwd); //pdo php data object mysql=driver of database
}
catch(PDOException $e)
{
    die("Can not access DB ".$e->getMessage());  // die command will terminate the program in case of error
}
?>


