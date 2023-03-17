<?php

$host="127.0.0.1";
$username="sa";
$password="sa";
$db="dbstudent";
$dsn="mysql:host=$host;dbname=$db;charset=utf8mb4";

try{
    $pdo = new PDO($dsn,$username,$password);

}catch(PDOException $e){
    echo $e->getMessage();
}
require_once "db/controller.php";
require_once "db/user.php";
$controller = new Controller($pdo);
$user = new User($pdo);

$user->insertUser('admin','12345');

?>