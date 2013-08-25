<?php
	include_once "init.php";
	include_once "smarty_inc.php";
	include_once  WEB_ROOT."util/mysql_class.php";
	
	$db =  new mysql();
	if(@$_GET["id"]){
		$category_id = " and c.id=".$_GET["id"];
	}else{
		$category_id ="";
	}
	$sql_select="select a.*,c.category_name from t_article a,t_seeds b,t_category c where a.seed_id = b.id and b.category_id=c.id ".$category_id." order by a.id desc limit 0,30";
	//echo $sql_select;
	$query = $db->query($sql_select);
	
		while($row=$db->fetch_row_array($query)){
			$arr[] = $row;
		}

	$smarty->assign("artile",$arr);
	$smarty->display("index_bootstrap.htm");
?>