<?php
$title="หน้าแรกของเว็บไซต์";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_admin.php";
$result=$controller->getStudent();
?>

    <h1 class = "text-center"><?php echo "ข้อมูลนักเรียน";?></h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ชื่อ</th>
      <th scope="col">นามสกุล</th>
      <th scope="col">อีเมล์</th>
      <th scope="col">แผนก</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
    <tr>
        <td><?php echo $row["name"]?></td>
        <td><?php echo $row["sname"]?></td>
        <td><?php echo $row["email"]?></td>
        <td><?php echo $row["department_name"]?></td>
        <td>
        <a href="editForm.php?id=<?php echo $row['stu_id'];?>" class="btn btn-warning">แก้ไขข้อมูล</a>
        <a onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?')"
        href="delete.php?id=<?php echo $row['stu_id'];?>" class="btn btn-danger">ลบข้อมูล</a>  
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
</div>
</body>
</html>
