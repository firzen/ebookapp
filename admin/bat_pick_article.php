 <?php
	include_once "../util/mysql_class.php";
	include_once "../util/util.php";
	include_once "funcs/pick_artile_func.php";
	include_once "funcs/job_func.php";

	$artileid=get_job_article(1);
	if($artileid<0){
		echo "�޲ɼ�����<br>";
		return;
	}
	echo "��ʼ�ɼ���".$artileid."<br>";
	pick_article($artileid);
	update_job_article($artileid,1);
	pagesleep();
?>