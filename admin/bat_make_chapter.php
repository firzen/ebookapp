 <?php
	include_once "../util/mysql_class.php";
	include_once "../util/util.php";
	include_once "../smarty_inc.php";
	include_once "funcs/make_chapter_func.php";
	include_once "funcs/job_func.php";

	
	$artileid=@$_GET["artileid"];
	
	if(!$artileid){
		echo "not exist artileid <br>";
		$artileid=get_job_article(3);
	}
	
	if($artileid<0){
		echo "��������������<br>";
		return;
	}
	echo "��ʼ����Ŀ¼��".$artileid."<br>";
	$count = make_chapter_func($artileid);
	if($count>0){
		$loaction = "bat_make_chapter.php?artileid=".$artileid;
		setlocation($loaction);
	}else{
		update_job_article($artileid,3);
		echo "�����������:".$artileid."<br>";
		$loaction = "bat_make_chapter.php";
		setlocation($loaction);
	}
	pagesleep();
?>