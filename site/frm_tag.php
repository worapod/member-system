<?php
session_start();
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');
include ("function_connect_database.php");
include ("func_code.php");
$encode_user = $username."::".$dbname;
$present_encode_user = base64_encode($username."::".$dbname);
$btn_sent = "<button class='btn-sm btn-primary'> ปุ่ม แสดงข้อมูลสิทธิ์ <code>".$present_encode_user."</code> บันทึกเหตุการณ์ event Log </button>";
?>
<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=5">
    <meta name="description" content="">
    <meta name="author" content="Bootstrap 5">	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
<link rel="stylesheet" href="choices.css">
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<script src="js/choices.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"  type="text/javascript"></script>
<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<script src="js/bootstrap.js"  type="text/javascript"></script>
<script src="js/bootstrap.bundle.min.js"  type="text/javascript"></script>
<script src="js/bootstrap.esm.min.js"  type="text/javascript"></script>

<title>เปิดโดย : <?=$encode_user;?> </title>
	 
<style>	 
.mt-100{
	margin-top: 100px;
}
body{
	background: #fffcff;
	background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
	background: linear-gradient(to right, #0083B0, #00B4DB);
	color: #514B64;
	min-height: 100vh;
}

</style>

<div class="row d-flex justify-content-center mt-100 py-5">
    <div class="col-md-6"> 
	<select id="choices-multiple-remove-button" placeholder="Select upto 9 tags Option show 10 row " multiple>
	<?php
		//$innodb_sql = "EXPLAIN SELECT * FROM `innodb_index_stats` WHERE `table_name` LIKE \'log_blog\' ORDER BY `stat_value` DESC ";
		//$innodb_sql = "SELECT `help_relation`.* FROM `help_relation` LEFT JOIN `mydb_2`.`help_topic` ON `help_relation`.`help_topic_id` = `mydb_2`.`help_topic`.`help_topic_id` WHERE `mydb_2`.`help_topic`.`help_topic_id` IS NULL AND `help_relation`.`help_topic_id` IS NOT NULL ";
			/*
				$innodb_sql =	" SELECT `help_topic`.* FROM `help_topic` LEFT JOIN `mydb_2`.`help_category` ON `help_topic`.`help_category_id` = `mydb_2`.`help_category`.`help_category_id` ";
				$innodb_sql	.= " WHERE `mydb_2`.`help_category`.`help_category_id` IS NULL AND `help_topic`.`help_category_id` IS NOT NULL ";
			*/
		//$innodb_sql = "SELECT * FROM `member` WHERE `email_member` LIKE '".$email."'";
		
		$innodb_sql = "SELECT * FROM `help_topic` ORDER BY RAND ( )  Limit 11 ";			
		
		$result = $conn->query($innodb_sql);

		if ($result->num_rows > 0) {	
		  while($row = $result->fetch_assoc()) {
			$text_op = $row["name"];
			$value_op = $row["help_topic_id"];
			$help_category = md5($row["help_category_id"]);
			$mix_op = $value_op ."::".$help_category;
			$en_value_op = $mix_op;
			$run_number++;
			print "<option value=\"".$en_value_op."\"> NO.".$run_number." = ".$text_op."</option>";  			  
		  }
		}
		else{
			$count_rows = var_dump($result->num_rows);
			print "<option value='".$count_rows."'> ไม่มีข้อในการเชื่อมโยง Keyword ".$count_rows." row </option>";  			  
		}
		
	?>
        </select>
	</div>	
</div>

<hr>

<div class='container py-3 alert alert-warning' >
	<?=$btn_sent;?>
</div>

<script>
$(document).ready(function(){
     var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount:9,
        searchResultLimit:20,
        renderChoiceLimit:20
      });      
 });
 </script>