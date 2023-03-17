<?php
class Controller{
    private $db;

    function __construct($con){
        $this->db=$con;
    }

    function getDepartment(){
        try{
            $sql = "SELECT * FROM department";
            $result=$this->db->query($sql);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getStudent(){
        try{
            $sql = "SELECT * FROM student s INNER JOIN department d ON s.department_id = d.department_id ORDER By s.stu_id";
            $result=$this->db->query($sql);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }  
    }
    
    function insert($name,$sname,$email,$department_id){
        try{
            $sql="INSERT INTO student(name,sname,email,department_id) VALUES (:name,:sname,:email,:department_id)";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":name",$name);
            $stmt->bindParam(":sname",$sname);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":department_id",$department_id);   
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }
    function delete($id){
        try{
            $sql="DELETE FROM student WHERE stu_id=:id ";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getStudentDetail($id){
        try{
            $sql="SELECT * FROM student s 
            INNER JOIN department d
            ON s.department_id = d.department_id WHERE stu_id =:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function update($name,$sname,$email,$department_id,$stu_id){
        try{
            $sql="UPDATE student 
            SET name=:name, sname=:sname, email=:email, department_id=:department_id 
            WHERE stu_id = :stu_id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":name",$name);
            $stmt->bindParam(":sname",$sname);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":department_id",$department_id);
            $stmt->bindParam(":stu_id",$stu_id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}




?>