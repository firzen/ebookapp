 
<head>
    <meta charset="gb2312">
</head>	
 
 <?php
	include_once "../init.php";
	include_once "../util/mysql_class.php";
	include_once "../util/util.php";
	
	function pickURL($seed_id,$seed_url){
		$db =  new mysql();	
		//读远程url
		$chplst = pick_artile_by_seed($seed_url);
		//写数据库
		//print_r($chplst);
		
		foreach($chplst as $id=>$chp){
			$articl_url=$chp["url"];
			if(!is_artile_exsit($articl_url)){
				$insert_sql="INSERT INTO t_article(seed_id,title,url)VALUES (".$seed_id.",'".$chp["title"]."','".$articl_url."')";
				$db->query($insert_sql);
			}
		}
		
		$update_sql="update t_seeds set modify_date='".date('Ymd')."' where id=".$seed_id;
		$db->query($update_sql);
		
		echo "采集完成";
	}
	
	function pick_artile_by_seed($seed_url){
		$domain="http://www.81zw.com";
		$contents = myfile_get_content($seed_url);
		//$preg1="#<ul id=\"chapterlist\">(.*)</ul>#iUs";
		//preg_match($preg1,$contents,$cplst);
		//echo "aa:".$cplst[1];
		$preg="#<h1><a href=\"(.*)\" target=\"_blank\">(.*)</a></h1>#iUs";
		preg_match_all($preg,$contents,$arr);
		
		foreach($arr[1] as $id=>$e_url){
			$acturl = $domain.$e_url;
			$cptitle = $arr[2][$id];
			$ret[$id]["url"]=$acturl;
			$ret[$id]["title"]=$cptitle;
		}
		return $ret;
	}
	
	
	/**
		判断文章是否采集过
	**/
	function is_artile_exsit($url){
		$db =  new mysql();
		$sql_select="select id from t_article where url='".$url."'";
		$query = $db->query($sql_select);
		if($db->num_rows($query)>0){
			return true;
		}
		return false;
	}
	
	if(@$_GET["seedid"]){
		$seedid=$_GET["seedid"];
		$sql_select="select id,url from t_seeds where id=".$seedid;
	}else{
		$sql_select="select id,url from t_seeds where modify_date<'".date('Ymd')."' limit 0,1";
	}
	
	$db =  new mysql();
	$query = $db->query($sql_select);
	if($db->num_rows($query)>0){
		$seed = $db->fetch_row_array($query);
		$seed_url=$seed["url"];
		$seed_id=$seed["id"];
		pickURL($seed_id,$seed_url);
	}
	
?>