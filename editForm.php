<?php
$title="แบบฟอร์มแก้ไขข้อมูลพนักงาน";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_admin.php";
if(!isset($_GET['id'])){
    header("Location:index.php");
}else{
    $id=$_GET["id"];
    $stu=$controller->getStudentDetail($id);

}
$result=$controller->getDepartment();
?>
    <h1 class = "text-center"><?php echo "แบบฟอร์มแก้ไขข้อมูล";?></h1>
    <form method="POST" action="updateStudent.php">
        <input type="hidden" name ="stu_id" value="<?php echo $stu["stu_id"]?>"/>
        <div class ="form-group">
            <label for ="name">ชื่อ</label>
            <input type="text" name="name" class="form-control" value="<?php echo $stu["name"] ?>">
        </div>
        <div class ="form-group">
            <label for ="sname">นามสกุล</label>
            <input type="text" name="sname" class="form-control" value="<?php echo $stu["sname"] ?>">
        </div>
        <div class ="form-group">
            <label for ="email">อีเมล์</label>
            <input type="text" name="email" class="form-control" value="<?php echo $stu["email"] ?>">
        </div>
        <div class ="form-group">
            <label for ="department">หนังสือ</label>
            <select name="department_id" class="form-control">
                <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
                   <option
                   <?php if($row["department_id"] == $stu["department_id"]) echo "selected"?>
                   value="<?php echo $row["department_id"];?>">
                   <?php echo $row["department_name"];?></option>
                <?php } ?>
                
            </select>
        </div>
        <input type="submit" name="submit" value ="อัปเดตข้อมูล" class="btn btn-primary my-3">

    </form>
</div>
</body>
</html>
