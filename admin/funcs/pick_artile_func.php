<?php

/**
 * 
 * �ɼ��½��б�
 * @param $artileid
 * @param $debug
 */
function pick_article($artileid,$debug){
	$model = new Model();
	$condition ="id=".$artileid;
	$articles = $model->select("t_article","*",$condition);

	//����parser_class���û�ȡ������Ϣ
	if($articles){
		$article = $articles[0];
		$seed_id = $article["seed_id"];
		$article_url = $article["url"];
		$parse_class = get_parse_class($seed_id);
		$parserBean = new $parse_class();
		$article_info = $parserBean->parse_level2($article_url);

		$status = $article_info["status"];
		$chplst = $article_info["chplst"];
		//print_r($article_info);
		//д�½��б�
		foreach($chplst as $chp){
			//���ж��Ƿ�ɼ���
			$rows = $model->select("t_chapter","url","artile_id=".$artileid." and url='".$chp["url"]."'");
			if(!$rows){
				$model->insert("t_chapter", array("artile_id","title","url"), array($artileid,$chp["title"],$chp["url"]));
				if($debug){
					echo "insert url:" .$chp["url"]."]<br>";
				}
			}
		}
			
		//��������״̬
		$model->update("t_article", array("status"=>$status,"modify_date"=>date('Ymd'),"comment"=>$article_info["comment"]), "id=".$artileid);
			
		if($debug){
			echo "�ɼ����";
		}
	}
}

/*function pick_artile_content($contents,$baseurl){
 $preg="#<li><a href=\"(.*)\">(.*)</a></li>#iUs";
 preg_match_all($preg,$contents,$arr);
 $idx = 0;
 foreach($arr[1] as $id=>$e_url){
 if(!strpos($e_url,".html",0)){
 continue;
 }
 $acturl = $baseurl.$e_url;
 $cptitle = $arr[2][$id];
 $ret[$idx]["url"]=$acturl;
 $ret[$idx]["title"]=$cptitle;
 $idx++;
 }
 return $ret;
 }*/

/*function get_status($contents){
 $preg="#<h2>������ɣ�(.*)...</h2>#iUs";
 preg_match_all($preg,$contents,$arr);
 $status = $arr[1][0];
 if($status=="������"){
 $status = 0;
 }else{
 $status = 1;
 }
 return $status;
 }*/
/**
 �ж������Ƿ����²ɼ�
 **/
function is_chapter_updated($articleid){
	 $db =  new mysql();
	 $sql_select="select id from t_article where id=".$articleid." and status=0 and modify_date < '".date('Ymd')."'";
	 $query = $db->query($sql_select);
	 if($db->num_rows($query)>0){
	 return true;
	 }
	 return false;
 }

?>