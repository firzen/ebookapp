 
<head>
    <meta charset="gb2312">
</head>	
 
 <?php
	include_once "../init.php";
	include_once "../util/mysql_class.php";
	include_once "../util/util.php";
	
	
	/**
		对于敏感字符进行转义
	**/
	function un_convert($t_Val){
		  $t_Val = str_replace("&amp;", "&",$t_Val);
		  $t_Val = str_replace("&lt;", "<",$t_Val);
		  $t_Val = str_replace("&gt;", ">",$t_Val);
		  if ( get_magic_quotes_gpc() )
		  {
			$t_Val = str_replace("&quot;", "\\\"",$t_Val);
			$t_Val = str_replace("&#039;", "\\''",$t_Val);
		  }
		  else
		  {
			$t_Val = str_replace("&quot;", "\"",$t_Val);
			$t_Val = str_replace("&#039;", "'",$t_Val);
		  }
		return $t_Val;
	}
	
	function getRandomInfo(){
			$sql_select="SELECT count(1) as total FROM t_article where length(COMMENT )>1";
			$db =  new mysql();
			$query = $db->query($sql_select);
			if($db->num_rows($query)>0){
				$article = $db->fetch_row_array($query);
				$total=$article["total"];
			}
			
			$random_id =  mt_rand(1,$total);
			//echo $random_id;
			$sql_select="SELECT * FROM t_article where id = ".$random_id;
			$query = $db->query($sql_select);
			if($db->num_rows($query)>0){
				$article = $db->fetch_row_array($query);
				$img=$article["img"];
				$comment = $article["comment"];
				//echo $comment;
			}
			
			$comment_strip = strip_tags(un_convert($comment));
			$len = strlen($comment_strip);
			if($len > 140 ){
				$comment_strip = substr($comment_strip,0,120);
			}
			
			$arr["img"] = $img;
			$arr["comment"] = $comment_strip;
			//print_r($arr);
			return $arr;
	}
	//print_r(getRandomInfo());
	//echo mt_rand(0,35);
	
	
	
?>