<?php
require_once "db/connect.php";
if(isset($_POST["submit"])){
    $stu_id=$_POST["stu_id"];
    $name=$_POST["name"];
    $sname=$_POST["sname"];
    $email=$_POST["email"];
    $department_id=$_POST["department_id"];

    $result=$controller->update($name,$sname,$email,$department_id,$stu_id);
    if($result){
        header("Location:index.php");
    }
}
?>