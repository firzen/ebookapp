<?php
	include_once "util/mysql_class.php";
	include_once "/smarty_inc.php";
	
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
	$smarty->display("category_".$_GET["id"].".htm");
?>