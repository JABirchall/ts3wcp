<?php
/**
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.2
 * @ Release on : 04.05.2016
 * @ Website    : http://EasyToYou.eu
 *
 * @ Zend guard decoder PHP 5.6
 **/

if (isset($_SESSION['hostID'])) {
	$smarty->assign('serversLink', 'index.php?site=serverlist');

	$smarty->assign('serversLink', 'index.php?site=hostsysteme');
	$costumerNR = $_SESSION;

	if (isset($_GET['site'])) {
		switch ($_GET['site']) {
		}

		error_reporting(30719);
	}
}
else {
	switch ($_GET['site']) {
	}

	error_reporting(30719);
}

$smarty->assign('check', $_SESSION['_LOGIN']);
$smarty->assign('msg', $msg);
$smarty->display('admin/dashboard.tpl');
exit();

?>
