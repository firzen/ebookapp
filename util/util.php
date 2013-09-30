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
		echo "<br>��ͣ1�������ɼ�...
		<script language=\"javascript\">setTimeout(\"gonextpage();\",1000);
		function gonextpage(){location.href=window.location;}</script><a href='javascript:gonextpage();'>���������һҳ</a>";
	}
	
	function setlocation($location){
		echo "<script>window.location='".$location."'</script>";
	}
	
	function dhtmlspecialchars($string, $flags = null) {  
        if(is_array($string)) {  
            foreach($string as $key => $val) {  
                $string[$key] = dhtmlspecialchars($val, $flags);  
            }  
        } else {  
            if($flags === null) {  
                $string = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string);  
                if(strpos($string, '&amp;#') !== false) {  
				//���˵�����&#x5FD7��16���Ƶ�html�ַ�  
                    $string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4}));)/', '&\\1', $string);  
                }  
            } else {  
                if(PHP_VERSION < '5.4.0') {  
                    $string = htmlspecialchars($string, $flags);  
                } else {  
                    if(strtolower(CHARSET) == 'utf-8') {  
                        $charset = 'UTF-8';  
                    } else {  
                        $charset = 'ISO-8859-1';  
                    }  
                    $string = htmlspecialchars($string, $flags, $charset);  
                }  
            }  
        }  
        return $string;  
    } 
	
	
	/* 
�������ƣ�inject_check() 
�������ã�����ύ��ֵ�ǲ��Ǻ���SQLע����ַ�����ֹע�䣬������������ȫ 
�Ρ�������$sql_str: �ύ�ı��� 
�� �� ֵ�����ؼ������ture or false 
*/ 
function inject_check($sql_str) { 
//if(preg_match('/^test/i',$file))
return preg_match('/select|insert|and|or|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/i', $sql_str); // ���й��� 
} 

/* 
�������ƣ�verify_id() 
�������ã�У���ύ��ID��ֵ�Ƿ�Ϸ� 
�Ρ�������$id: �ύ��IDֵ 
�� �� ֵ�����ش�����ID 
*/ 
function verify_id($id=null) { 
if (!$id) { exit('û���ύ������'); } // �Ƿ�Ϊ���ж� 
elseif (inject_check($id)) { exit('�ύ�Ĳ����Ƿ���'); } // ע���ж� 
elseif (!is_numeric($id)) { exit('�ύ�Ĳ����Ƿ���'); } // �����ж� 
$id = intval($id); // ���ͻ� 

return $id; 
} 

/* 
discuz��php��ֹsqlע�뺯��
�������ƣ�str_check() 
�������ã����ύ���ַ������й��� 
�Ρ�������$var: Ҫ������ַ��� 
�� �� ֵ�����ع��˺���ַ��� 
*/ 
function str_check( $str ) { 
if (!get_magic_quotes_gpc()) { // �ж�magic_quotes_gpc�Ƿ�� 
	$str = addslashes($str); // ���й��� 
} 
if (inject_check($str)) { exit('�ύ�Ĳ����Ƿ���'); } // ע���ж� 
$str = str_replace("_", "\_", $str); // �� '_'���˵� 
$str = str_replace("%", "\%", $str); // �� '%'���˵� 
$str = htmlspecialchars($str); // html���ת�� 

return $str; 
} 

/* 
�������ƣ�post_check() 
�������ã����ύ�ı༭���ݽ��д��� 
�Ρ�������$post: Ҫ�ύ������ 
�� �� ֵ��$post: ���ع��˺������ 
*/ 
function post_check($post) { 
if (!get_magic_quotes_gpc()) { // �ж�magic_quotes_gpc�Ƿ�Ϊ�� 
$post = addslashes($post); // ����magic_quotes_gpcû�д򿪵�������ύ���ݵĹ��� 
} 
$post = str_replace("_", "\_", $post); // �� '_'���˵� 
$post = str_replace("%", "\%", $post); // �� '%'���˵� 
$post = nl2br($post); // �س�ת�� 
$post = htmlspecialchars($post); // html���ת�� 

return $post; 
} 






	
	
?>