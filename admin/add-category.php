<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�½�����</title>
</head>

<body>
<?php
include_once "../init.php";
include_once "../util/mysql_class.php";

	if(@$_POST["categoryName"]){
		$categoryName = $_POST["categoryName"];
		$db =  new mysql();
		$insert_sql ="INSERT INTO t_category (category_name)VALUES ('".$categoryName."')";
		$db->query($insert_sql);
		echo "����ɹ�";
	}else{
?>
<form name="form1" method="post" action="add-category.php">
  <p>�������ƣ�
    <input name="categoryName" type="text" id="title" size="50">
</p>
  <p>
    <input type="submit" name="Submit" value="�ύ">
  </p>
</form>
<?php
	} 
?>
</body>
</html>
