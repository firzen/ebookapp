<?php
	include_once "init.php";
	include_once "smarty_inc.php";
	include_once  WEB_ROOT."util/mysql_class.php";
	include_once  WEB_ROOT."util/util.php";
	include_once WEB_ROOT."admin/funcs/app_util_func.php";
	include_once  WEB_ROOT."util/Model_class.php";

	if(@$_POST["search_text"]){
		$title = trim($_POST["search_text"]);
		//$title = str_check($title);
		//mysql_real_escape_string($value)
		//echo $title;
		$db =  new mysql();
		$sql_select="select a.*,c.category_name  from t_article a,t_seeds b,t_category c  where a.title like '%".$title."%' and a.seed_id = b.id and b.category_id=c.id";
		$query = $db->query($sql_select);
		while($row=$db->fetch_row_array($query)){
			$arr[] = $row;
		}
		$links = getLinks();
		$advert = getadvert();
		$smarty->assign("links",$links);
		$smarty->assign("advert",$advert);
		$smarty->assign("artile",$arr);
		$smarty->display("common_header.htm");
		$smarty->display("index_bootstrap.htm");
		$smarty->display("common_footer.htm");
	}else{
		echo "请输入文章标题";
	}
?>
