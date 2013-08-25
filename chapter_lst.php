<?php

	include_once "init.php";
	include_once WEB_ROOT."util/mysql_class.php";
	include_once WEB_ROOT."smarty_inc.php";
	include_once WEB_ROOT."admin/funcs/make_article_func.php";
	include_once WEB_ROOT."admin/funcs/pick_artile_func.php";
	include_once WEB_ROOT."util/util.php";
	
	$db =  new mysql();
	if(@$_GET["id"]){
		$artileid = $_GET["id"];
		$local_url="data/artiles/".$artileid.".htm";
		//$act_file = WEB_ROOT.$local_url;
		
		if(is_chapter_updated($artileid)){
			//echo "aa";
			pick_article($artileid);
			make_article_func($artileid);
		}
		//echo "bb";
		
		header("location: ".$local_url);
	}else{
		echo "artileid missing";
	}
	
?>