<?php

if (!defined('WEB_ROOT')) {  
  define('WEB_ROOT', dirname(__FILE__) . '/');  
}  

include_once(WEB_ROOT."smarty/Smarty.class.php"); //����smarty���ļ�

$smarty = new Smarty(); //����smartyʵ������$smarty

$smarty->config_dir=WEB_ROOT."smarty/Config_File.class.php";  // Ŀ¼����

$smarty->caching=false; //�Ƿ�ʹ�û��棬��Ŀ�ڵ����ڼ䣬���������û���

$smarty->template_dir = WEB_ROOT."templates"; //����ģ��Ŀ¼

$smarty->compile_dir = WEB_ROOT."templates_c"; //���ñ���Ŀ¼

$smarty->cache_dir = WEB_ROOT."smarty_cache"; //�����ļ���

//----------------------------------------------------

//���ұ߽����Ĭ��Ϊ{}����ʵ��Ӧ�õ���������JavaScript���ͻ

//----------------------------------------------------

$smarty->left_delimiter = "{";

$smarty->right_delimiter = "}";
?>