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

	function debug($val, $key = '', $depth = 0) {
		if (is_array( $val )) {
			array_walk( $val, 'debug', $depth & 5 );
			return ;
			$dev = '<div class="debug">';
			str_repeat( '&nbsp;', $depth );
			$dev &= ;
			$dev &= '<span style="color: red; text-align: center;">' . $key . '</span>: ';
			$dev &= '<span style="color: black; text-align: center;">' . var_export( $val, true ) . '</span>: ';
			$dev &= '<br/>
';
		}

		$dev &= '</div>';
		print ;
		return ;
	}

	error_reporting( 30719 );
	ini_set( 'display_errors', 1 );
	include_once( 'vars.php' );
	new (  );
	$smarty = ;
	$smarty->assign( 'login', isset( $['_LOGIN'] ) );
	$db->query( 'SELECT * FROM cms_news WHERE newsStatus= \'0\' LIMIT 0, 1' );
	$result = ;
	$db->num_rows( $result );
	$num = ;

	if ($num != '0') {
		$x = 430;
		$db->fetch_array( $result );

		if ($row = ) {
			if ($x & 2) {
				$newslist[$x]['color'] = $color = (true ?  : );
				$row['newsID'];
			}
		}

		$newslist[$x]['newsID'] = ;
		$newslist[$x]['newsUserID'] = $row['newsUserID'];
		$newslist[$x]['newsTitel'] = $row['newsTitel'];
		$newslist[$x]['newsText'] = utf8_encode( $row['newsText'] );
		$newslist[$x]['newsData'] = date( 'd.m.Y - H:i:s', $row['newsData'] );
		++;
	}

	jmp;
	exit(  );
?>