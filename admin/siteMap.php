<?php
/**
 * Éú³Ésitemap.txt
 */
	include_once '../init.php';
	include_once  "../util/Model_class.php";
	
	$model = new Model();
	$fp = fopen("../sitemap.txt",'w');
	
	$ids = $model->select("t_article","id");
	foreach ($ids as $idinfo){
		//http://kaixinpig.net/chapter/lst_240.html
		$id = $idinfo["id"];
		$url = "http://kaixinpig.net/chapter/lst_".$id.".html\r\n";
		fwrite($fp,$url);
	}
	
	fclose($fp);
	
	
?>