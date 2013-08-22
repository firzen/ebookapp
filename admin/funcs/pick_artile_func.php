<?php
	function pick_article($artileid){
		$db =  new mysql();
		$sql_select="select url from t_article where id=".$artileid;
		$query = $db->query($sql_select);
		$artile = $db->fetch_row_array($query);
		//print_r($artile);
		$baseurl=$artile["url"];
        echo "url:".$baseurl."<br>";	
		//读远程url
		
		$contents = myfile_get_content($baseurl);
		$status = get_status($contents);
		echo "status:".$status;
		$chplst = pick_artile_content($contents,$baseurl);
		//写数据库
		//print_r($chplst);
		
		foreach($chplst as $id=>$chp){
			$sql_select="select url from t_chapter where artile_id=".$artileid." and url='".$chp["url"]."'";
		    $query = $db->query($sql_select);
			if($db->num_rows($query)>0){
				echo "exsit url:[" .$chp["url"]."]<br>";
				continue;
			}
			$insert_sql="INSERT INTO t_chapter(artile_id,title,url)VALUES (".$artileid.",'".$chp["title"]."','".$chp["url"]."')";
			$db->query($insert_sql);
		}
		
		//update_status($artileid,$status);
		$update_sql = "update t_article set status=".$status." where id=".$artileid;
		$db->query($update_sql);
		
		
		echo "采集完成";
		
	}
	
	function pick_artile_content($contents,$baseurl){
		$preg="#<li><a href=\"(.*)\">(.*)</a></li>#iUs";
		preg_match_all($preg,$contents,$arr);
		$idx = 0;
		foreach($arr[1] as $id=>$e_url){
			if(!strpos($e_url,".html",0)){
				continue;
			}
			$acturl = $baseurl.$e_url;
			$cptitle = $arr[2][$id];
			$ret[$idx]["url"]=$acturl;
			$ret[$idx]["title"]=$cptitle;
			$idx++;
		}
		return $ret;
	}
	
	function get_status($contents){
		$preg="#<h2>连载完成：(.*)...</h2>#iUs";
		preg_match_all($preg,$contents,$arr);
		$status = $arr[1][0];
		if($status=="连载中"){
			$status = 0;
		}else{
			$status = 1;
		}
		return $status;
	}
	

?>