<?php
	include_once "init.php";
	include_once WEB_ROOT."util/mysql_class.php";
	include_once WEB_ROOT."smarty_inc.php";
	include_once WEB_ROOT."admin/funcs/make_article_func.php";
	include_once WEB_ROOT."admin/funcs/app_util_func.php";
	include_once WEB_ROOT."admin/funcs/make_single_chapter_func.php";
	include_once WEB_ROOT."util/util.php";
	
	$db =  new mysql();
	if(@$_GET["id"]){
		$chapter_id = $_GET["id"];
		//data/chapters/1.htm
		$local_url="data/chapters/".$chapter_id.".htm";
		$act_file = WEB_ROOT.$local_url;
		if(!file_exists($act_file)){
			make_chapter_func($chapter_id);
		}
		header("location: ".$local_url);
	}else{
		echo "artileid missing";
	}
	
?>