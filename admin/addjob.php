<?php
	include_once "../util/mysql_class.php";
	
	$db =  new mysql();
	$jobtype = $_POST["jobtype"];
	$artiles = $_POST["articleids"];
	$status = 0;
	//echo "jobtype:".$jobtype."<br>";
	//echo "artiles:".substr($artiles,1)."<br>";
	$sa = explode(",",substr($artiles,1));
	foreach($sa as $id=>$articleid){
		//echo $articleid."<br>";
		$insert_sql="INSERT INTO t_job(article_id,job_type,status)VALUES (".$articleid.",".$jobtype.",".$status.")";
		$db->query($insert_sql);
	}
	echo "添加任务成功<br>";
?>