 
<head>
    <meta charset="gb2312">
</head>	
 
 <?php
	include_once "../init.php";
	include_once "../util/mysql_class.php";
	include_once "../util/util.php";
	
	function main(){
		$seedid=$_GET["seedid"];
		$db =  new mysql();
		$sql_select="select url from t_seeds where id=".$seedid;
		$query = $db->query($sql_select);
		$artile = $db->fetch_row_array($query);
		//print_r($artile);
		$url=$artile["url"];
        echo "url:".$url;	
		//读远程url
		$chplst = pick_artile($url);
		//写数据库
		//print_r($chplst);
		
		foreach($chplst as $id=>$chp){
			$insert_sql="INSERT INTO t_article(seed_id,title,url)VALUES (".$seedid.",'".$chp["title"]."','".$chp["url"]."')";
			//$insert_sql="INSERT INTO t_article (title ,url,seed_id)VALUES ('".$title."','".$url."')";
			//echo $insert_sql;
			$db->query($insert_sql);
		}
		echo "采集完成";
		
	}
	
	function pick_artile($url){
		$domain="http://www.81zw.com";
		$contents = myfile_get_content($url);
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
	main();
?>