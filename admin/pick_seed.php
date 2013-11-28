 
<head>
    <meta charset="gb2312">
</head>	
 
 <?php
	include_once "../init.php";
	include_once "../util/Model_class.php";
	include_once "../util/util.php";
	include_once "../third_part/simple_html_dom.php";
	include_once "Parser_class.php";
	
	function pickURL($seed){
		//print_r($seed);
		$seed_url=$seed["url"];
		$seed_id=$seed["id"];
		
		$chplst = route($seed);
		$model = new Model();
		foreach($chplst as $id=>$chp){
			$articl_url=$chp["url"];
			if(!is_artile_exsit($articl_url)){
				$title = $chp["title"];
				$img = $chp["img"];
				$author = $chp["author"];
				$model->insert("t_article", array("seed_id","title","url","img","author"),
								array($seed_id,$title,$articl_url,$img,$author));
			}
		}
		
		$condition = "id=".$seed_id;
		$model->update("t_seeds", array("modify_date"=>date('Ymd')), $condition);
		
		echo "采集完成";
	}
	
	
	function route($seed){
		$parse_class = $seed["parse_class"];
		$seed_url=$seed["url"];
		$parserBean = new $parse_class();
		return $parserBean->parse_level1($seed_url);
	}
	
	
	/**
		判断文章是否采集过
	**/
	function is_artile_exsit($url){
		$model = new Model();
		$condition = "url='".$url."'";
		$rows = $model->select("t_article","id",$condition); 
		return $rows;
	}
	
	/*程序入口*/
	
	if(@$_GET["seedid"]){
		$seedid=$_GET["seedid"];
		$condition = "id=".$seedid;
	}else{
		$condition = "modify_date<'".date('Ymd')."' limit 0,1";
	}
	
	$model = new Model();
	$rows = $model->select("t_seeds","*",$condition);
	if($rows){
		$seed = $rows[0];
		pickURL($seed);
	}
	
?>