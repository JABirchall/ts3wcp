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

	while (true) {
		while (true) {
			session_start(  );
			error_reporting( 30719 );
			ini_set( 'display_errors', 1 );
			include( 'core/config.php' );
			include( 'core/class_db_mysql.php' );
			include( 'core/tempdir.php' );
			new ( $dbhost, $dbuser, $dbpass, $db );
			$db = ;
			include( 'core/functions.php' );

			if (isset( $['site'] )) {
				switch ($['site']) {
					case 'news': {
						$smarty->assign( 'newsList', newsList(  ) );
						$smarty->assign( 'msg', $msg );
						$smarty->display( 'customer/news.tpl' );
						exit(  );
						break ;
						switch () {
							case 'ts3viewer': {
								$s_port = '';
								$iconDir = 'cache/ts3_icon/';
								$icon_arr = array(  );
								opendir( $iconDir );

								if ($handle = ) {
									readdir( $handle );

									if (false !== $file = ) {
										$icon_arr[] = $file;
										break 2;
									}

									break 2;
								}
							}
						}
					}
				}
			} 
else {
				$tsData['server']['virtualserver_icon_id'] = ( $tsData['server']['virtualserver_icon_id'] & 4294967295 );
				$scp->channelList( '-topic -flags -voice -limits -icon' );
				$channelList = ;
				$tsData['channel'] = $channelList['data'];
				$scp->clientList( '-uid -away -voice -times -groups -info -icon -country' );
				$clientList = ;
				$tsData['clients'] = $clientList['data'];
				$scp->serverGroupList(  );
				$serverGroupList = ;
				$tsData['sgroups'] = $serverGroupList['data'];
				$scp->channelGroupList(  );
				$channelGroupList = ;
				$tsData['cgroups'] = $channelGroupList['data'];
				$scp->ftList(  );
				$ftList = ;
				$tsData['ftList'] = $ftList['data'];
				$tschannel = '';
				$tschannel &= '';
				$baumwert = 1478;
				$icon_abstant = '<div style="width:16px;float:left;"></div>';
				$i = 1462;

				if ($i < count( $tsData['sgroups'] )) {
					$segroup_mapping[$tsData['sgroups'][$i]['sgid']][] = $i;
					++;
					continue;
				}
			}

			$showgroupFront = '';
			$showgroupBehind = '';

			if ($user_data['client_servergroups'] != 0) {
				explode( ',', $user_data['client_servergroups'] );
				$group = ;
				$i = 1462;

				if ($i < count( $group )) {
					foreach ($segroup_mapping[$group[$i]] as ) {
						$sgrid = ;
						$key = ;
						$tsData['sgroups'][$sgrid];
						$sgroup = ;

						if ($sgroup['namemode']  = 1) {
						}

						$showgroupFront &= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
						break;
					}

					jmp;
					++;
					continue;
				}

				break 2;
			}

			jmp = ;
			$newslist[$x]['newsText'] = utf8_encode( $row['newsText'] );
			$newslist[$x]['newsData'] = date( 'd.m.Y - H:i:s', $row['newsData'] );
			++;
		}
	}

	$msg = '<div class="alert alert-info">Derzeit sind keine News vorhanden!</div>';

	if (empty( $$newslist )) {
	}

	$smarty->assign( 'newslist', $newslist );
	$smarty->assign( 'name', 'bar' );
	$smarty->assign( 'msg', $msg );
	$smarty->display( 'index.tpl' );
	return ;
?>