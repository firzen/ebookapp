<head>
    <meta charset="gb2312">
</head>	
<?php
	include_once "../util/mysql_class.php";
	include_once "../smarty_inc.php";
	include_once "../util/util.php";
	include_once "funcs/make_chapter_func.php";

	
	$artileid=$_GET["artileid"];
	
	if($artileid){
		$count = make_chapter_func($artileid);
	}
	if($count>0){
		echo "<br>��ͣ1�������ɼ�...
		<script language=\"javascript\">setTimeout(\"gonextpage();\",1000);
		function gonextpage(){location.href=window.location;}</script><a href='javascript:gonextpage();'>���������һҳ</a>";
	}else{
		echo "�ɼ����";
	}
	
?>