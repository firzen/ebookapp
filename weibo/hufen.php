<?php

	include_once "weibo_user.php";
	
	session_start(); 
	
	if(@$_GET["targetId"]){
	
		if(!isset($_SESSION["user"])){
			echo "0";
			return;
		}else{
			$targetId = $_GET["targetId"];
			$ret = hufen($targetId);
			//21327 	Expired token,token过期，请重新登陆
			echo $ret;
		}
		
		
		
	}
?>
