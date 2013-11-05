 
<head>
    <meta charset="gb2312">
</head>	
 
 <?php
 
	include_once "../init.php";
	include_once "../util/mysql_class.php";
	include_once "../util/util.php";
	
	
	function pick_artile($article_url){
		$contents = myfile_get_content($article_url);
		$preg ="#<div class=\"msgarea\">(.*)</div>#iUs";
		preg_match_all($preg,$contents,$arr);
		//print_r($arr);
		$comment = $arr[1][0];
		return $comment;
	}
	/**
		对于敏感字符进行转义
	**/
	function convert($t_Val){
		  $t_Val = str_replace("&", "&amp;",$t_Val);
		  $t_Val = str_replace("<", "&lt;",$t_Val);
		  $t_Val = str_replace(">", "&gt;",$t_Val);
		  if ( get_magic_quotes_gpc() )
		  {
			$t_Val = str_replace("\\\"", "&quot;",$t_Val);
			$t_Val = str_replace("\\''", "&#039;",$t_Val);
		  }
		  else
		  {
			$t_Val = str_replace("\"", "&quot;",$t_Val);
			$t_Val = str_replace("'", "&#039;",$t_Val);
		  }
		return $t_Val;
	}
	
	
	$sql_select="SELECT * FROM t_article where length(COMMENT )<1 limit 0,1";
	
	$db =  new mysql();
	$query = $db->query($sql_select);
	if($db->num_rows($query)>0){
		$article = $db->fetch_row_array($query);
		$url=$article["url"];
		$img=$article["img"];
		$id =$article["id"];
		$comment = pick_artile($url);
		
		$sql_update = "update t_article set COMMENT = '".convert($comment)."' where id=".$id;
		$db->query($sql_update);
		//echo $url;
		//echo $id;
	}
	
?>