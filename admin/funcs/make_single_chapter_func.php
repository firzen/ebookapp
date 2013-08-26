<?php
	include_once WEB_ROOT."util/util.php";
	
	function make_chapter_func($id){
		$db =  new mysql();
		$sql_select="select * from t_chapter where  id=".$id;
		$query = $db->query($sql_select);
		$count = 0;
		
		while($row=$db->fetch_row_array($query)){
			echo "开始采集 ".$row["url"]."->".$row["local_url"]."<br>";
			makechaptercontent($id,$row["url"],$row["local_url"],$row["title"],$row["artile_id"]);
			echo "采集".$row["url"]."完成<br>";
			
			$update_sql="update t_chapter set collect_flag=1 where id=".$row["id"];
			$db->query($update_sql);
			$count++;
			//myflush();
		};
		return $count;
	}
	
	
	function makechaptercontent($id,$url,$localurl,$title,$artileid){
		global $smarty;
		$contents = myfile_get_content($url);
		$preg="#<!--go-->(.*)<!--over-->#iUs";
		preg_match_all($preg,$contents,$arr);
		if(strlen($contents)<1){
			return;
		}
		$chpctx = $arr[1][0];
		
		$article_info = get_article_info($artileid);
		//$article = get_article_title($artileid);
		$smarty->assign("id",$id);
		$smarty->assign("artileid",$artileid);
		$smarty->assign("article",$article_info["title"]);
		$smarty->assign("activeIdx",$article_info["category_id"]);
		$smarty->assign("title",$title);
		$smarty->assign("chpctx",$chpctx);
		$novel = $smarty->fetch('chpctx_bootstrap_1.htm');
		makehtml(WEB_ROOT.$localurl,$novel);
	}
	
?>