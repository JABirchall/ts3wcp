<?php
/**
*
* @ IonCube v8.3.3 Loader By DoraemonPT
* @ PHP 5.3
* @ Decoder version : 1.0.0.7
* @ Author     : DoraemonPT
* @ Release on : 09.05.2014
* @ Website    : http://EasyToYou.eu
*
**/

	include_once( 'core/functions.php' );
	$dbt2 = mysql_query( 'UPDATE cms_users SET userLastLogin=\'' . time(  ) . '\' WHERE userID=\'' . isset( $_SESSION['MyID'] ) . '\'' );
	setcookie( 'PAGELOGIN', 'php', time(  ) - 3600, '/' );
	setcookie( session_name(  ), '', time(  ) - 3600, '/' );
	session_destroy(  );
	$smarty->assign( 'msg', $msg );
	$smarty->display( 'logout.tpl' );
	echo '<script>
		setTimeout("gotologin()", 1000);
		function gotologin(){location.href="index.php";}
		</script>
		';
	exit(  );
?>