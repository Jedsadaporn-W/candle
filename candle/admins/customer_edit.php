<?php  //คำสั่งการล็อก
session_start();
if(empty($_SESSION['aid'])){  
	echo"Access Denied !!!";
	exit;
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Edit Customers</title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php
include("connectdb.php"); //เชื่อมต่อดาต้าเบส
$sql = "SELECT * FROM `customers` WHERE `c_id`='{$_GET['id']}' ";
$rs = mysqli_query($conn, $sql) or die ("ค้นหาข้อมูลไม่สำเร็จ");
($data = mysqli_fetch_array($rs));
$id_user = $data['c_id'];
?>
  <div class="container">
    <div class="title">Edit Customers</div>
    <div class="content">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="cname" value="<?=$data['c_name'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="cuser" value="<?=$data['c_user'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="cemail" value="<?=$data['c_email'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="ctell" value="<?=$data['c_tell'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="cpass" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" required>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" name="Submit" value="Edit">
        </div>
        <div class="button">
          <input onClick="history.back();" type="button" name="cancel" value="Cancel">
        </div>
      </form>
    </div>
  </div>

<?php
if(isset($_POST['Submit'])){
	
	
  $sql = "UPDATE `customers` SET `c_name`='{$_POST['cname']}', `c_user`='{$_POST['cuser']}', `c_email`='{$_POST['cemail']}', `c_tell`='{$_POST['ctell']}' , `c_pass`='{$_POST['cpass']}' WHERE `c_id`='{$data['c_id']}';";
	mysqli_query($conn, $sql) or die ("แก้ไขสมาชิกไม่สำเร็จ");
	
	
	echo"<script>";
	echo"alert('แก้ไขสมาชิกสำเร็จ');";
	echo"window.location='customer.php';";
	echo"</script>";
	
}
?>
</body>
</html>