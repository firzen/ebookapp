<?php
	include_once "../util/mysql_class.php";
	include_once "../smarty_inc.php";
	include_once "../util/util.php";
	include_once "make_article_func.php";
	
	function make_chapter_func($artileid){
		$db =  new mysql();
		$sql_select="select * from t_chapter where collect_flag=0 and artile_id=".$artileid." order by id limit 0,10";
		$query = $db->query($sql_select);
		$count = 0;
		
		while($row=$db->fetch_row_array($query)){
			echo "开始采集 ".$row["url"]."->".$row["local_url"]."<br>";
			makechaptercontent($row["url"],$row["local_url"],$row["title"],$artileid);
			echo "采集".$row["url"]."完成<br>";
			
			$update_sql="update t_chapter set collect_flag=1 where id=".$row["id"];
			$db->query($update_sql);
			$count++;
			myflush();
		};
		return $count;
	}
	
	
	function makechaptercontent($url,$localurl,$title,$artileid){
		global $smarty;
		$contents = file_get_contents($url);
		$preg="#<!--go-->(.*)<!--over-->#iUs";
		preg_match_all($preg,$contents,$arr);
		$chpctx = $arr[1][0];
		
		$article = get_article_title($artileid);
		$smarty->assign("artileid",$artileid);
		$smarty->assign("article",$article);
		$smarty->assign("title",$title);
		$smarty->assign("chpctx",$chpctx);
		$novel = $smarty->fetch('chpctx_bootstrap.htm');
		makehtml(WEB_ROOT.$localurl,$novel);
	}
	
?>