<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=5">
    <meta name="description" content="">
    <meta name="author" content="Bootstrap 5">
    <title> อนันต์ .......................... </title>

    <!-- Bootstrap core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
<?php

/*
print "<pre>";
	print_r($_GET);
	print_r($_POST);
print "</pre>";
*/

$servername = "localhost"; // 127.0.0.1
$username = "root"; // root
$password = "";
$dbname = "myDB_2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn -> set_charset("utf8");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_GET['firstName'];
$fname = $_GET['lastName'];
$email = $_GET['email'];
$password = $_GET['password'];
$address = $_GET['address'];
$address2 = $_GET['address2'];
$country = $_GET['country'];
$state = $_GET['state'];
$zip = $_GET['zip'];


$email_sql = "SELECT * FROM `member` WHERE `email_member` LIKE '".$email."'";
$result = $conn->query($email_sql);

if ($result->num_rows > 0) {
	print "<div class='container-fluid'>";
		print "<div class='row'>";
			print "<div class=' py-3 text-danger text-center' >";
				  print "New record created successfully<br>";
				  print "ยินดีต้อนรับ สมาชิก คุณ ".$name." ".$fname ."<br>" ;
				  print "<a href='register.php' class='btn btn-danger'> ย้อนกลับไปกรอกข้อมูลใหม่  </a>";
			print "<div>";
		print "<div>";
	print "<div>";
} 
else {

	$sql = "INSERT INTO `mydb_2`.`member` 
	(`id_member`, `name_member`, `fname_member`, `email_member`, `pwd_member`, `address_member`, 
	`address2_member`, `county_member`, `state_member`, `zip_member`) 
	VALUES (NULL, '$name', '$fname', '$email', '$password', '$address', '$address2', '$country', '$state', '$zip');";

	if ($conn->query($sql) === TRUE) {
		print "<div class='container-fluid'>";
			print "<div class='row'>";
				print "<div class=' py-3 bg bg-info text-center' >";
					  print "New record created successfully<br>";
					  print "ยินดีต้อนรับ สมาชิก คุณ ".$name." ".$fname ."<br>" ;
					  print "<a href='register.php' class='btn btn-success'> ย้อนกลับไปหน้าหลัก  </a>";
				print "<div>";
			print "<div>";
		print "<div>";
	} 
	else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	
} // --- ปิดการตรวจสอบ email ที่ซ้ำซ้อน 
?>