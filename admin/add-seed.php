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
	$db =  new mysql();
	if(@$_POST["url"]){
		$category_id = $_POST["category_id"];
		$url = $_POST["url"];
		$insert_sql ="INSERT INTO t_seeds (category_id ,url)VALUES (".$category_id.",'".$url."')";
		//echo $insert_sql;
		$db->query($insert_sql);
		echo "插入成功";
	}else{
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
