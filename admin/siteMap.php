<?php
/**
 * Éú³Ésitemap.txt
 */
	include_once '../init.php';
	include_once  "../util/Model_class.php";
	
	$model = new Model();
	$fp = fopen("../sitemap.xml",'w');
	
	$string = "<?xml version='1.0' encoding='utf-8'?><urlset></urlset> ";  
  
	$xml = simplexml_load_string($string);
	
	$item = $xml->addChild('url');  
	$item->addChild("loc", "http://www.kaixinpig.net/"); 
	$item->addChild("lastmod", date('Y-m-d')); 
	$item->addChild("changefreq", "always"); 
	$item->addChild("priority", "1.0");
	
	$ids = $model->select("t_article","id,modify_date");
	foreach ($ids as $idinfo){
		//http://kaixinpig.net/chapter/lst_240.html
		/*<loc>http://www.wotxt.net/cntxt/book/list68_1.html</loc>
		 * <lastmod>2013-10-22</lastmod>
		 * <changefreq>daily</changefreq>
		 * <priority>0.8</priority>*/
		$id = $idinfo["id"];
		$modify_date = $idinfo["modify_date"];
		$url = "http://kaixinpig.net/chapter/lst_".$id.".html";
		//fwrite($fp,$url);
		$item = $xml->addChild('url');  
		$item->addChild("loc", $url); 
		$item->addChild("lastmod", date("Y-m-d",strtotime($modify_date))); 
		$item->addChild("changefreq", "daily"); 
		$item->addChild("priority", "0.8");
	}
	
	$xmlStr = $xml->asXML(); 
	echo $xmlStr;
	fwrite($fp, $xmlStr) ;
	
	fclose($fp);
	
	
	
	
?>