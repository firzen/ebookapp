<?php
include_once "init.php";
include_once "util/mysql_class.php";
include_once "smarty_inc.php";
include_once WEB_ROOT."admin/funcs/app_util_func.php";
include_once WEB_ROOT."util/util.php";
include_once  WEB_ROOT."util/Model_class.php";

$db =  new mysql();
if(@$_GET["id"]){
	$category_id = verify_id($_GET["id"]);
	$category_sql = " and c.id=".$category_id;
	$pageNo=verify_id($_GET["page"]);
}else{
	$category_sql ="";
	$pageNo=1;
}
$startIdx = ($pageNo-1)*15;
//$endIdx = $pageNo*15;
$sql_select="select a.*,c.category_name from t_article a,t_seeds b,t_category c where a.seed_id = b.id and b.category_id=c.id ".$category_sql." order by a.click_times desc limit ".$startIdx.",15";
//echo $sql_select;
$query = $db->query($sql_select);
while($row=$db->fetch_row_array($query)){
	$arr[] = $row;
}

$sql_total="select count(1) from t_article a,t_seeds b,t_category c where a.seed_id = b.id and b.category_id=c.id ".$category_sql ;
$total = get_total_count($sql_total);
$category_name=get_category_name($category_id);

$smarty->assign("total",$total);
$smarty->assign("pageNo",$pageNo);

$maxPg = (int)($total/15);
if($maxPg*15<$total){
	$maxPg = $maxPg+1;
}
$pagination="";
if($pageNo==1&$pageNo<$maxPg){
	$pagination = "<li><a href=\"/category/".$category_id."/".($pageNo+1).".html\">Next</a></li>";
} else if($pageNo==$maxPg&$pageNo>=$maxPg&$pageNo>1){
	$pagination = "<li><a href=\"/category/".$category_id."/".($pageNo-1).".html\">Prev</a></li>";
} else if($pageNo<$maxPg){
	$pagination = "<li><a href=\"/category/".$category_id."/".($pageNo-1).".html\">Prev</a></li><li><a href=\"/category/".$category_id."/".($pageNo+1).".html\">Next</a></li>";
}


$links = getLinks();
$advert = getadvert();
$smarty->assign("links",$links);
$smarty->assign("advert",$advert);

$smarty->assign("maxPg",$maxPg);
$smarty->assign("total",$total);
$smarty->assign("pagination",$pagination);
$smarty->assign("category_name",$category_name);
$smarty->assign("activeIdx",$category_id);
$smarty->assign("artile",$arr);
$smarty->display("category_bootstrap.htm");
$smarty->display("common_footer.htm");
?>