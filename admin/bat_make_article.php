 <?php
	include_once "../util/mysql_class.php";
	include_once "../util/util.php";
	include_once "../smarty_inc.php";
	include_once "funcs/make_article_func.php";
	include_once "funcs/job_func.php";

	$artileid=get_job_article(2);
	if($artileid<0){
		echo "������Ŀ¼����<br>";
		return;
	}
	echo "��ʼ����Ŀ¼��".$artileid."<br>";
	make_article_func($artileid);
	update_job_article($artileid,2);
	pagesleep();
?>