 
<head>
    <meta charset="gb2312">
</head>	
 
 <?php
	include_once "../init.php";
	include_once "../util/mysql_class.php";
	include_once "../util/util.php";
	include_once "../third_part/simple_html_dom.php";
	
	
	function pick_artile_by_seed($seed_url){
		$base_domain="http://www.81zw.com";
		$contents = myfile_get_content($seed_url);
		$preg ="#<div class=\"book_news_style\">(.*)<div class=\"clear\"></div>(.*)</div>#iUs";
		preg_match_all($preg,$contents,$arr);
		
		$body = $arr[0][0];
		
		$html = str_get_html($body);
		// Find all article blocks
		foreach($html->find('div.book_news_style_form') as $article) {
		    $item['img']     = $base_domain.$article->find('img', 0)->src;
		    $info = $article->find('div.book_news_style_text', 0);
		    $item['title'] = $info->find('h1 a', 0)->innertext;
		    $item['url'] = $base_domain.$info->find('h1 a', 0)->href;
		    $tmp = $info->find('h2', 0)->innertext;
		    $item['author'] = getAuthor($tmp);
		    $articles[] = $item;
		}
		
		//print_r($articles);
		return $articles;
	}
	
	function getAuthor($info){
		$preg ="#作者：(.*) 【#iUs";
		preg_match($preg,$info,$arr);
		return $arr[1];
	}
	
	pick_artile_by_seed("http://www.81zw.com/xuanhuan/");
	
?>