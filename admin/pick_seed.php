 
<head>
    <meta charset="gb2312">
</head>	
 
 <?php
	include_once "../init.php";
	include_once "../util/mysql_class.php";
	include_once "../util/util.php";
	include_once "../third_part/simple_html_dom.php";
	
	function pickURL($seed_id,$seed_url){
		$db =  new mysql();	
		//读远程url
		$chplst = pick_artile_by_seed($seed_url);
		//写数据库
		//print_r($chplst);
		
		foreach($chplst as $id=>$chp){
			$articl_url=$chp["url"];
			if(!is_artile_exsit($articl_url)){
				$insert_sql="INSERT INTO t_article(seed_id,title,url,img,author)VALUES (".$seed_id.",'".$chp["title"]."','".$articl_url."'
				,'".$chp["img"]."','".$chp["author"]."')";
				$db->query($insert_sql);
			}
		}
		
		$update_sql="update t_seeds set modify_date='".date('Ymd')."' where id=".$seed_id;
		$db->query($update_sql);
		
		echo "采集完成";
	}
	
	function pick_artile_by_seed($seed_url){
		$base_domain="http://www.81zw.com";
		$contents = myfile_get_content($seed_url);
		$preg ="#<div class=\"book_news_style\">(.*)<div class=\"clear\"></div>(.*)</div>#iUs";
		preg_match_all($preg,$contents,$arr);
		
		$body = $arr[0][0];
		
		$html = str_get_html($body);
		// Find all article blocks
		foreach($html->find('div.book_news_style_form') as $article) {
		    $item['img']     = $base_domain.$article->find('img', 0)->src;
		    $info = $article->find('div.book_news_style_text', 0);
		    $item['title'] = $info->find('h1 a', 0)->innertext;
		    $item['url'] = $base_domain.$info->find('h1 a', 0)->href;
		    $tmp = $info->find('h2', 0)->innertext;
		    $item['author'] = getAuthor($tmp);
		    $articles[] = $item;
		}
		
		//print_r($articles);
		return $articles;
	}
	
	function getAuthor($info){
		$preg ="#作者：(.*) 【#iUs";
		preg_match($preg,$info,$arr);
		return $arr[1];
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