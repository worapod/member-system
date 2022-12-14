<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);

		function none_textBox($data){
			if(isset($data)){
				$check = "style=\"display:none;\" ";		
			}	
			return $check;
		}

?>