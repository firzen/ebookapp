<?php
	
	
	
	function get_article_info($artileid){
		$db =  new mysql();
		//$sql_select="select * from t_article where id = ".$artileid;
		$sql_select="select a.*,b.category_id from t_article a,t_seeds b where a.id = ".$artileid." and a.seed_id = b.id";
		$query = $db->query($sql_select);
		$article_info = $db->fetch_row_array($query);
		return $article_info;
	}
	
	function get_category_name($category_id){
		$db =  new mysql();
		$sql_select="select * from t_category where id = ".$category_id;
		$query = $db->query($sql_select);
		$titlerow = $db->fetch_row_array($query);
		$category_name = $titlerow["category_name"];
		return $category_name;
	}
	
	function get_total_count($sql_select){
		$db =  new mysql();
		$query = $db->query($sql_select);
		$titlerow = $db->fetch_row_array($query);
		$total_count = $titlerow[0];
		return $total_count;
	}
	
	function read_file_content($FileName)
	{
		//open file
		$fp=fopen($FileName,"r");
		$data="";
		while(!feof($fp))
		{
			$data.=fread($fp,4096);
		}
		//close the file
		fclose($fp);
		return $data;
	} 
	
	
	
?>