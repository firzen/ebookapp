<?php
	include_once "init.php";
	include_once WEB_ROOT."util/mysql_class.php";
	include_once WEB_ROOT."smarty_inc.php";
	include_once WEB_ROOT."admin/funcs/make_article_func.php";
	include_once WEB_ROOT."admin/funcs/app_util_func.php";
	include_once WEB_ROOT."admin/funcs/make_single_chapter_func.php";
	include_once WEB_ROOT."util/util.php";
	include_once WEB_ROOT."util/Model_class.php";
	include_once WEB_ROOT.'admin/Parser_class.php';
	include_once 'third_part/simple_html_dom.php';
	
	//$db =  new mysql();
	if(@$_GET["id"]){
	//$id = str_check($_GET["id"]);
		$chapter_id = str_check($_GET["id"]);
		navToChapter($chapter_id);
		
	}else{
		echo "artileid missing";
	}
	
	function navToChapter($chapter_id){
		$local_url="/data/chapters/".$chapter_id.".htm";
		$act_file = WEB_ROOT.$local_url;
		if(!file_exists($act_file)){
			try{
				make_chapter_func($chapter_id,false);
			}catch(Exception $e){
				
			}
		}
		
		if(file_exists($act_file)){
			echo read_file_content($act_file);
		}else{
			showErrorPage($chapter_id);
		}
	}
?>