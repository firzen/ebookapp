<?php

	include_once "init.php";
	include_once WEB_ROOT."util/mysql_class.php";
	include_once WEB_ROOT."smarty_inc.php";
	include_once WEB_ROOT."admin/funcs/make_article_func.php";
	include_once WEB_ROOT."admin/funcs/pick_artile_func.php";
	include_once WEB_ROOT."admin/funcs/app_util_func.php";
	include_once WEB_ROOT."util/util.php";
	
	$db =  new mysql();
	if(@$_GET["id"]){
		$artileid = $_GET["id"];
		$local_url="/data/artiles/".$artileid.".htm";
		$act_file = WEB_ROOT.$local_url;
		
		if(is_chapter_updated($artileid)){
			pick_article($artileid,false);
			make_article_func($artileid,false);
		}
		//echo "bb";
		//header('HTTP/1.1 301 Moved Permanently');
		//header("location: ".$local_url);
		if(file_exists($act_file)){
			echo read_file_content($act_file);
		}else{
			echo "file not exsit";
		}
	}else{
		echo "artileid missing";
	}
	
?>