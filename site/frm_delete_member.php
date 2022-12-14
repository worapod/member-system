<?php
error_reporting (E_ALL ^ E_NOTICE);
?>

<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=5">
    <meta name="description" content="">
    <meta name="author" content="Bootstrap 5">
    <title> ฟอร์ม ลบ ข้อมูล....... </title>

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


if( isset($_GET['memid']) ) { // isset ตรงข้ามกับ empty

	$id_delete = $_GET['memid'];	

		$sql = "DELETE FROM `mydb_2`.`member` WHERE `member`.`id_member` = $id_delete ";
		
		//print $sql."<hr>";
		
		if ($conn->query($sql) === TRUE) {
			
			print "<div class='container-fluid'>";
				print "<div class='row'>";
					print "<div class=' py-3 text-danger text-center' >";
						  print "Record deleted successfully <br>";
						  print "ลบข้อมูลเรียบร้อย  <br>" ;
						  print "<a href='frm_member_table.php' class='btn btn-success'> ย้อนกลับ ไปที่ตารางข้อมูล </a>";
					print "</div>";
				print "</div>";
			print "</div>";
			  
		} 
		else {
			
		  echo "Error deleting record: " . $conn->error;
		  
		}

	$conn->close();

}
else{
	  echo " ข้อมูลผิดพลาด กรุณาตรวจสอบ ";
}
?>