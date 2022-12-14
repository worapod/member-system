<?php
session_start();
session_destroy();

print "<p> ";
print "Logout Complete <br>" ;
print "<a href='frm_member_table.php' class='btn btn-warning'> กลับไปตรวจสอบ SESSION ที่ตารางข้อมูล  </a>";
print "</p>";	
				  
?>