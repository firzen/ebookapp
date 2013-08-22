<?php

	//global $base_dir="/ebook";

	function makehtml($file,$content){
		 $fp = fopen($file,'w');
		 fwrite($fp,$content);
		 fclose($fp);
	}
	
	function myflush(){
	  flush();
	  ob_flush();
	}
	
	function myfile_get_content($url) {
		if (function_exists('file_get_contents')) {
			$file_contents = @file_get_contents($url);
		}
		if ($file_contents == '') {
			$ch = curl_init();
			$timeout = 30;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$file_contents = curl_exec($ch);
			curl_close($ch);
  		}
  		return $file_contents;
	}
	
	function pagesleep(){
		echo "<br>暂停1秒后继续采集...
		<script language=\"javascript\">setTimeout(\"gonextpage();\",1000);
		function gonextpage(){location.href=window.location;}</script><a href='javascript:gonextpage();'>点击进入下一页</a>";
	}
	
	function setlocation($location){
		echo "<script>window.location='".$location."'</script>";
	}
	
	
?>