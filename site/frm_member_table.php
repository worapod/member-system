<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
include ("function_connect_database.php");
include ("func_code.php");

/*
print "<pre>";
	print_r($_GET);
	print_r($_POST);
	print_r($_SESSION);
print "</pre>";
*/

if(isset($_SESSION['sid'])){
	$select_sql = "SELECT * FROM `member` WHERE email_member ='$_SESSION[sid]' ";
	$btn_edit_member = "<a href='#' class='btn-sm btn-warning'>EDIT </a>";
	$btn_exit = "<a href='logoff.php' class='btn-sm btn btn-danger'> ออกจากระบบ  Logout </a>";
}
else {
	$select_sql = "SELECT * FROM `member`";
	$btn_exit = "<a href='login.php' class='btn-sm  btn btn-success'> กลับหน้าหลัก  </a>";
	//--- modify flow 
	//--- Authentication 
}

$result = $conn->query($select_sql);

?>

<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=5">
    <meta name="description" content="">
    <meta name="author" content="Bootstrap 5">
    <title> DATA MEMBER  </title>

    <!-- Bootstrap core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
    
  </head>
  
<?php

if ($result->num_rows > 0) {
	
	print "<div class='container-fluid py-3'>";
		print "<div class='row alert alert-warning'>";
		
				print "<div class=' col-lg-8  py-1  text-left' >";
					print "มีจำนวน " . $result->num_rows . " แถว ";
				print "</div>";			
				
				print "<div class=' col-lg-4  py-1  text-right' >";
					print $btn_exit;
				print "</div>";
				
		print "</div>";
	print "</div>";
	
	print "<div class='container-fluid py-3'>";
		print "<div class='row'>";
			print "<div class='py-3   text-left' >";
				print "<ins> ตารางข้อมูล สมาชิก  </ins>";

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

	if($row['authen_member']=="admin"){
	 	$btn_admin = "<button class='btn-sm btn-primary'>Admin</button>";
	}
	else{
	 	$btn_admin = "<a href='frm_delete_member.php?memid=$row[id_member]' class='btn-sm btn-danger'>Delete</a>";
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

	print "<div class='container'>";
		print "<div class='row'>";
			print "<div class=' py-3 text-danger text-center' >";
					print $btn_exit;
			print "</div>";
		print "</div>";
	print "</div>";
	
	
?>