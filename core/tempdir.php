<?php
/**
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.2
 * @ Release on : 04.05.2016
 * @ Website    : http://EasyToYou.eu
 *
 * @ Zend guard decoder PHP 5.6
 **/

class dynamicPage
{
	public function dynamicPage()
	{
		global $config;
		$this->Smarty();
		$this->template_dir = $config->templatedir;
		$this->compile_dir = 'templates_c/';
		$this->caching = false;
		$this->assign('app_name', 'dynamicPage');
	}
}

$config->templatedir = './templates';
define('SMARTY_DIR', 'libs/smarty/');
require SMARTY_DIR . 'Smarty.class.php';

?>
