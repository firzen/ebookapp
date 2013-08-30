<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>新建种子</title>
</head>

<body>
<?php
include_once "../init.php";
include_once "../util/mysql_class.php";

	function addSeed($seed_url,$category_id ){
		$db =  new mysql();
		$insert_sql ="INSERT INTO t_seeds (category_id ,url)VALUES (".$category_id.",'".$seed_url."')";
		$db->query($insert_sql);
		echo $seed_url."插入成功<br>";
	}
	
	if(@$_POST["url"]){
		$category_id = $_POST["category_id"];
		$seed_url = $_POST["url"];
		//http://www.aa.com/aa[start-end].html
		$bracket_left = strpos($seed_url,"[");
		if($bracket_left){
			$bracket_right = strpos($seed_url,"]");
			$url_prefix = substr($seed_url,0,$bracket_left);
			$middle = substr($seed_url,$bracket_left+1,$bracket_right-$bracket_left-1);
			$tag = strpos($middle,"-");
			$tag_start = substr($middle,0,$tag);
			$tag_end = substr($middle,$tag+1);
			$url_suffix = substr($seed_url,$bracket_right+1);
			for(;$tag_start<=$tag_end;$tag_start++){
				$seed_e = $url_prefix.$tag_start.$url_suffix;
				addSeed($seed_e,$category_id);
				//echo $seed_e."<br>";
			}
			//echo $url_prefix."<br>";
			//echo $tag_start."<br>";
			//echo $tag_end."<br>";
			
		}else{
			addSeed($seed_url,$category_id);
		}
	}else{
		$db =  new mysql();
		$sql_select ="select * from t_category";
		$query = $db->query($sql_select);
	
		
		
?>
<form name="form1" method="post" action="#">
  <p>种子分类：
    <select name="category_id">
	<?php
		while($row=$db->fetch_row_array($query)){
	 ?>
  	  <option value="<?php echo $row["id"];?>"><?php echo $row["category_name"];?></option>
	  <?php }?>
    </select>
  </p>
  <p>文章url:
    <input name="url" type="text" id="url" size="100" maxlength="200">
</p>
  <p>
    <input type="submit" name="Submit" value="提交">
  </p>
</form>
<?php
	} 
?>
</body>
</html>
