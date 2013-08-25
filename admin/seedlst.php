<?php
	include_once "../init.php";
	include_once "../util/mysql_class.php";
	include_once "../smarty_inc.php";
	
	$db =  new mysql();
	$sql_select="select a.id,a.url,b.category_name from t_seeds a,t_category b where a.category_id = b.id";
	$query = $db->query($sql_select);
	
		while($row=$db->fetch_row_array($query)){
			$arr[] = $row;
		}

	$smarty->assign("artile",$arr);
	$smarty->display("seedlst.htm");
?>