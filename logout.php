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

	include_once( 'core/functions.php' );
	$dbt2 = mysql_query( 'UPDATE cms_users SET userLastLogin=\'' . time(  ) . '\' WHERE userID=\'' . isset( $['MyID'] ) . '\'' );
	setcookie( 'PAGELOGIN', 'php', time(  ) - 3600, '/' );
	setcookie( session_name(  ), '', time(  ) - 3600, '/' );
	session_destroy(  );
	$smarty->assign( 'msg', $msg );
	$smarty->display( 'logout.tpl' );
	echo ;
	exit(  );
?>