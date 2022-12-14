<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Bootstrap 5">
    <title>Register · Website - Bootstrap 5</title>

    <!-- Bootstrap core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-xxl-4"> 
<div class=" alert alert-info">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB_2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST[txt_username]) && isset($_POST[txt_password]) )  {  // isset ตรงข้ามกับ empty

	$check_username = $_POST[txt_username];	
	$check_pwd = $_POST[txt_password];	

		print "<div class='row'>";
			print "<div class=' py-3  text-center' >";

	$sql  = "SELECT * FROM `member` WHERE `member`.`email_member` = '$check_username' ";
	$sql  .= " AND `member`.`pwd_member` = '$check_pwd' ";
		
	//print $sql."<hr>";
		
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$check_number = $result->num_rows; // ---- แสดงจำนวนข้อมูลที่ดึงออกมา 
			if ($check_number == 1) {	
				  print "<div class=' bg bg-success py-5 '> ";
				  print "Login successfully<br>" ;
				  print "<a href='frm_member_table.php' class='btn btn-primary'> เปิด ตารางข้อมูล  </a>";
				  print "</div>";				

			 $_SESSION['sid']=$check_username;
				  
			}
			else{
				  print "<div class=' bg bg-warning py-5 '> ";
				  print "Login warning Count Member <br>" ;
				  print "<a href='frm_member_table.php' class='btn btn-warning'> เปิด ตารางข้อมูล  </a>";
				  print "</div>";					
			}
		} 
		else {
			
				  print "<div class=' bg bg-warning  py-5 '> ";
				  print "<h1> Login Error : </h1> ";
				  print "<a href='login.php' class='btn btn-danger'> ย้อนกลับ Login  </a>";
				  print "</div>";			  
		  
		}
			print "</div>";
		print "</div>";

}
else{
	  echo "  ข้อมูลผิดพลาด กรุณาตรวจสอบ  การส่งค่า ";
}

	$conn->close();

?>
</div>

</body>
</html>	 