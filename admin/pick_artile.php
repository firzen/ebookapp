<head>
    <meta charset="gb2312">
</head>	
 <?php
	include_once "../util/mysql_class.php";
	include_once "../util/util.php";
	include_once "funcs/pick_artile_func.php";
	
	$artileid=$_GET["artileid"];
	pick_article($artileid);
	//echo "content1:".myfile_get_content('http://www.81zw.com/book/7586/');
?>