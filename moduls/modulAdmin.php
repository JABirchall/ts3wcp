<?php
/**
*
* @ IonCube Priv8 Decoder V1 By H@CK3R $2H  
*
* @ Version  : 1
* @ Author   : H@CK3R $2H  
* @ Release on : 14-Feb-2014
* @ Email  : Hacker.S2h@Gmail.com
*
**/

	while (isset( $['hostID'] )) {
		$smarty->assign( 'serversLink', 'index.php?site=serverlist' );
	}

	jmp;
	error_reporting( 30719 );
	$['site'];
	$smarty->assign( 'check', $['_LOGIN'] );
	$smarty->assign( 'msg', $msg );
	$smarty->display( 'admin/dashboard.tpl' );
	exit(  );
?>