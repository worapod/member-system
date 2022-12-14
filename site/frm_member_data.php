<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
?>
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


print "<pre>";
	print_r($_GET);
	print_r($_POST);
	print_r($_SESSION);
print "</pre>";


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


if(isset($_SESSION['sid'])){
	$select_sql = "SELECT * FROM `member` WHERE email_member ='$_SESSION[sid]' ";
	$btn_edit_member = "<a href='#' class='btn btn-warning'>EDIT</a>";
	$btn_exit = "<a href='logoff.php' class='btn btn-danger'> EXIT / ออกจากระบบ </a>";
}
else{
	$select_sql = "SELECT * FROM `member`";
}

//print $select_sql."<hr>";

$result = $conn->query($select_sql);

if ($result->num_rows > 0) {
	
	print "<div class='container-fluid py-3'>";
		print "<div class='row'>";
			print "<div class=' bg bg-warning py-3  text-left' >";
			print "มีจำนวน ";
			print $result->num_rows ;
			print " แถว ";
			print "</div>";
		print "</div>";
	print "</div>";
	
	print "<div class='container-fluid py-3'>";
		print "<div class='row'>";
			print "<div class='py-3   text-left' >";
				print " ตารางข้อมูล สมาชิก ";

print "<table class='table table-striped'>";
print "<thead>
      <tr>
		<th> Tools </th>
        <th>Firstname Lastname</th>
        <th>Email</th>
        <th>Address</th>
      </tr>
    </thead>";

  while($row = $result->fetch_assoc()) {
	  //  echo "id: " . $row["id_member"]. " - Name: " . $row["name_member"]. " " . $row["fname_member"]. " ";
	  //  echo "email: " . $row["email_member"]. " - password: " . $row["pwd_member"]. " - ที่อยู่ " . $row["address_member"]. "<br>";

	if($row[authen_member]=="admin"){
	 	$btn_admin = "<button class='btn btn-primary'>Admin</button>";
	}
	else{
	 	$btn_admin = "<a href='frm_delete_member.php?memid=$row[id_member]' class='btn btn-danger'>Delete</a>";
	}
		
		print "<tr>
			<td> $btn_admin $btn_edit_member </td>
			<td>$row[name_member] $row[fname_member]</td>
			<td>$row[email_member]</td>
			<td>
			$row[address_member] 
			$row[address2_member]
			$row[county_member]
			$row[state_member]			
			$row[zip_member]			
			</td>
		</tr>";

  }
  


	

 print "</table>";			
							
			print "</div>";
		print "</div>";
	print "</div>";


} 
else {

	print "<div class='container-fluid'>";
		print "<div class='row'>";
			print "<div class=' py-3 text-danger text-center' >";
				  print "SYSTEM ERROR <br>";
				  print "ติดต่อฐานข้อมูล หรือ ชุดคำสั่งมีข้อผิดพลาด  <br>" ;
				  print "<a href='register.php' class='btn btn-danger'> ย้อนกลับไปกรอกข้อมูลใหม่  </a>";
			print "</div>";
		print "</div>";
	print "</div>";

} // --- ปิดการตรวจสอบ email ที่ซ้ำซ้อน 

print "<hr>";
print $btn_exit;
?>