<head>
    <meta charset="gb2312">
</head>	
<?php
	include_once "../init.php";
	include_once "../util/mysql_class.php";
	include_once "../smarty_inc.php";
	include_once "../util/util.php";
	
	function del_article_func($artileid){
		$db =  new mysql();
		$update_sql="delete from t_article where id = ".$artileid;
		$db->query($update_sql);
		$update_sql="delete from t_chapter where artile_id = ".$artileid;
		$db->query($update_sql);
	}
	
	$artileid=$_GET["artileid"];
	del_article_func($artileid);
	echo "ok";
	
	
?>