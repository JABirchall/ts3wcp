<?php
/**
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.2
 * @ Release on : 04.05.2016
 * @ Website    : http://EasyToYou.eu
 *
 * @ Zend guard decoder PHP 5.6
 **/

session_start();
error_reporting(30719);

ini_set('display_errors', 1);
include 'core/config.php';
include 'core/class_db_mysql.php';
include 'core/tempdir.php';
$db = db;
include 'core/functions.php';

if (isset($_GET['site'])) {
	switch ($_GET['site']) {
	case 'news':
		$smarty->assign('newsList', newsList());
		$smarty->assign('msg', $msg);
		$smarty->display('customer/news.tpl');
		exit();
		break;

		switch ($_GET['site']) {
		case 'ts3viewer':
			$s_port = '';
			$iconDir = 'cache/ts3_icon/';
			$icon_arr = array();

			if ($handle = db) {
				if (false !== $file = db) {
					$icon_arr[] = $file;

					closedir($handle);
					$tschannel = '';
					$scp = db;

					if ($scp->getElement('success', $scp->connect())) {
						$scp->login($serverViewer['hostUsername'], $serverViewer['hostPassword']);

						$scp->selectServer($serverViewer['serverPort']);
						$s_port = db;
						$fileList = db;

						if (!empty($fileList['data'])) {
							$file = db;
							$ftp_data = db;

							$con_scpftp = db;

							fputs($con_scpftp, $ftp_data['data']['ftkey']);
							$data = '';

							if (!feof($con_scpftp)) {
								$data .= db;
								$handler2 = db;

								fwrite($handler2, $data);
								fclose($handler2);

								$tschannel .= 'Sorry! Server ist derzeit Offline!';
								$tsData = array();
								$serverInfo = db;
								$tsData['server'] = $serverInfo['data'];
								$hostInfo = db;
								$tsData['hostInfo'] = $hostInfo['data'];
								$tsData['server']['virtualserver_icon_id'] = sprintf('%u', $tsData['server']['virtualserver_icon_id'] & 4294967295);
								$channelList = db;
								$tsData['channel'] = $channelList['data'];
								$clientList = db;
								$tsData['clients'] = $clientList['data'];
								$serverGroupList = db;
								$tsData['sgroups'] = $serverGroupList['data'];
								$channelGroupList = db;

								$tsData['cgroups'] = $channelGroupList['data'];
								$ftList = db;
								$tsData['ftList'] = $ftList['data'];
								$tschannel = '';
								$tschannel .= '';
								$baumwert = 1478;
								$icon_abstant = '<div style="width:16px;float:left;"></div>';
								$i = 1462;

								if ($i < count($tsData['sgroups'])) {
									$segroup_mapping[$tsData['sgroups'][$i]['sgid']][] = $i;
									++$i;
									$i = 1462;

									if ($i < count($tsData['clients'])) {
										$user_mapping[$tsData['clients'][$i]['cid']][] = $i;
										++$i;
										$i = 1462;

										if ($i < count($tsData['cgroups'])) {
											$chgroup_mapping[$tsData['cgroups'][$i]['cgid']][] = $i;
											++$i;

											$channel = db;

											if ($channel['channel_flag_password'] == 1) {
												$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/password.png" width="16" height="16" /></div>';

												if ($channel['channel_flag_default'] == 1) {
													$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/default.png" width="16" height="16" /></div>';

													$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/moderated.png" width="16" height="16" /></div>';

													$channel_art = '';

													if ($channel['pid'] != 0) {
														if (!array_key_exists($channel['pid'], $ch_stufe)) {
															$baumwert = $baumwert + 16;
															$ch_stufe[$channel['pid']] = $baumwert;

															$baumwert = 1478;

															$ch_stufe[$channel['pid']] = 16;

															$tschannel .= '<div class="ts3_onh" style="margin-left:' . $ch_stufe[$channel['pid']] . 'px;">';

															if (preg_match('^\\[(.*)spacer([\\w\\p{L}\\d]+)?\\]^u', $channel['channel_name'], $treffer)) {
																if ($channel['pid'] == 0) {
																	if (db == 1) {
																		$getspacer = db;
																		$checkspacer = $getspacer[1][0] . $getspacer[1][0] . $getspacer[1][0];

																		if ($treffer[1] == '*') {
																			if (strlen($getspacer[1]) == 3) {
																				if ($checkspacer == $getspacer[1]) {
																					$spacer = '';
																					$i = 1462;

																					if ($i <= 60) {
																						if (strlen($spacer) < 60) {
																							$spacer .= db;

																							break;
																							++$i;
																							$tschannel .= '<div class="ts3_server_name">' . htmlspecialchars($spacer) . '</div>' . $icon_abstant . '';

																							if ($treffer[1] == 'c') {
																								$spacer = db;
																								$tschannel .= '<div class="ts3_server_u_icon"></div>';
																								$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																								if ($treffer[1] == 'r') {
																									$spacer = db;
																									$tschannel .= '<div class="ts3_server_u_icon"></div>';
																									$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:right">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																									$spacer = empty($fileList['data']);
																									$tschannel .= '<div class="ts3_server_u_icon"></div>';
																									$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:left">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																									if ($channel['channel_flag_password'] == 1) {
																										$tschannel .= '<div style="margin-right:5px; width:16px; float:left;"><img src="../cache/ts3_icon/default/pwchannel.png" width="16" height="16" /></div>';

																										$tschannel .= '<div style="margin-right:5px;  width:16px; float:left;"><img src="../cache/ts3_icon/default/channel.png" width="16" height="16" /></div>';

																										if ($channel['channel_icon_id'] == 0) {
																											$tschannel .= '<div class="ts3_server_u_icon"></div>' . $channel_art . '';

																											if (0 < $channel['channel_icon_id']) {
																												if ($channel['channel_icon_id'] != 100) {
																													if ($channel['channel_icon_id'] != 200) {
																														if ($channel['channel_icon_id'] != 300) {
																															if ($channel['channel_icon_id'] != 500) {
																																if ($channel['channel_icon_id'] != 600) {
																																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art . '';

																																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art . '';
																																	$tschannel .= '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
																																	$tschannel .= '<div class="ts3_clear"></div>';
																																	$tschannel .= '</div></a>';

																																	if (isset($user_mapping[$channel['cid']])) {
																																		$userid = db;
																																		$key = db;
																																		$user_data[] = $tsData['clients'][$userid];

																																		$user_st = $ch_stufe[$channel['pid']] + 16;

																																		$userid = db;
																																		$key = db;
																																		$user_data = $i < count($tsData['clients']);
																																		$tschannel .= '<div class="ts3_onh" style="margin-left:' . $user_st . 'px;">';

																																		if ($user_data['client_away'] == 1) {
																																			$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/away.png" width="16" height="16" /></div>';

																																			if ($user_data['client_output_hardware'] == 0) {
																																				$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/hwhead.png" width="16" height="16" /></div>';

																																				if ($user_data['client_input_hardware'] == 0) {
																																					$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/hwmic.png" width="16" height="16" /></div>';

																																					if ($user_data['client_output_muted'] == 1) {
																																						$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/head.png" width="16" height="16" /></div>';

																																						if ($user_data['client_input_muted'] == 1) {
																																							$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/mic.png" width="16" height="16" /></div>';

																																							if ($user_data['client_is_channel_commander'] == 1) {
																																								if ($user_data['client_flag_talking'] == 1) {
																																									$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player_commander_on.png" width="16" height="16" /></div>';

																																									$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player_commander.png" width="16" height="16" /></div>';

																																									if ($user_data['client_flag_talking'] == 1) {
																																										$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player_on.png" width="16" height="16" /></div>';

																																										$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player.png" width="16" height="16" /></div>';
																																										$showgroupFront = '';
																																										$showgroupBehind = '';

																																										if ($user_data['client_servergroups'] != 0) {
																																											$group = !array_key_exists($channel['pid'], $ch_stufe);
																																											$i = 1462;

																																											if ($i < count($group)) {
																																												$sgrid = db;
																																												$key = db;

																																												$sgroup = db;

																																												if ($sgroup['namemode'] == 1) {
																																												}

																																												$showgroupFront .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
																																												$showgroupBehind .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
																																												++$i;

																																												$showgroupFront = '';
																																												$showgroupBehind = '';
																																												$tschannel .= '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant . '';

																																												if ($user_data['client_icon_id'] != 0) {
																																													if ($user_data['client_icon_id'] == 200) {
																																														if ($user_data['client_icon_id'] == 300) {
																																															if ($user_data['client_icon_id'] == 500) {
																																																if ($user_data['client_icon_id'] == 600) {
																																																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';
																																																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';

																																																	if ($user_data['client_servergroups'] != 0) {
																																																		$group = '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>';
																																																		$group = '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';
																																																		$i = 1462;

																																																		if ($i < count($group)) {
																																																			$key = db;
																																																			$sgroup = '<div class="ts3_server_name" style="width:90%;text-align:right">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';
																																																			$sgroup['iconid'] = sprintf('%u', $sgroup['iconid'] & 4294967295);

																																																			if ($sgroup['iconid'] == 100) {
																																																				if ($sgroup['iconid'] == 200) {
																																																					if ($sgroup['iconid'] == 300) {
																																																						if ($sgroup['iconid'] == 500) {
																																																							if ($sgroup['iconid'] == 600) {
																																																								$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																								$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																								++$i;

																																																								$grid = $channel['channel_icon_id'] != 500;
																																																								$key = db;
																																																								$chgroup = $channel['channel_icon_id'];

																																																								if ($chgroup['iconid'] == 100) {
																																																									if ($chgroup['iconid'] == 200) {
																																																										if ($chgroup['iconid'] == 300) {
																																																											if ($chgroup['iconid'] == 500) {
																																																												if ($chgroup['iconid'] == 600) {
																																																													$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																													$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																													$tschannel .= '<div class="ts3_clear"></div>';
																																																													$tschannel .= '</div>';
																																																													$abc = $s_port . '-icon_' . $tsData['server']['virtualserver_icon_id'] . '.png';
																																																													$smarty->assign('abc', $abc);
																																																													$smarty->assign('dfg', $dfg);
																																																													$smarty->assign('tsviewer', $tschannel);
																																																													$smarty->assign('msg', $msg);
																																																													$smarty->display('ts3viewer.tpl');
																																																													exit();
																																																													break;

																																																													switch ($_GET['site']) {
																																																													case 'cron':
																																																														switch ($_GET['site']) {
																																																														}

																																																														include_once 'core/cron.php';
																																																														exit();

																																																														if (isset($_POST['login'])) {
																																																															$timeout = 5062;
																																																															$userNumber = isset($user_mapping[$channel['cid']]);
																																																															$passwort = db;
																																																															$result = $ch_stufe[$channel['pid']] + 16;

																																																															if ($userNumber == '') {
																																																																if ($passwort == '') {
																																																																	if ($userNumber == $result->userNumber) {
																																																																		if ($passwort == $result->userPassword) {
																																																																			setcookie('PAGELOGIN', implode('php', $default_lang), time() + $timeout, '/');
																																																																		}

																																																																		if ($result->userLevel == 4) {
																																																																			$_SESSION['_LOGIN'] = true;
																																																																			$_SESSION['_LEVEL'] = $result->userLevel;
																																																																			$_SESSION['MyID'] = $result->userID;
																																																																			$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																																			setlog($insertLog);
																																																																			header('Location: index.php?site=intern&check=true');

																																																																			if ($result->userLevel == 3) {
																																																																				$_SESSION['_LOGIN'] = true;
																																																																				$_SESSION['_LEVEL'] = $result->userLevel;
																																																																				$_SESSION['MyID'] = $result->userID;
																																																																				$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																																				setlog($insertLog);
																																																																				header('Location: index.php?site=intern&check=true');

																																																																				if ($result->userLevel == 2) {
																																																																					$_SESSION['_LOGIN'] = true;
																																																																					$_SESSION['_LEVEL'] = $result->userLevel;
																																																																					$_SESSION['MyID'] = $result->userID;
																																																																					$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																																					setlog($insertLog);
																																																																					$dbt2 = '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant;
																																																																					header('Location: index.php?site=intern&check=true');

																																																																					if ($result->userLevel == 1) {
																																																																						$_SESSION['_LOGIN'] = true;
																																																																						$_SESSION['_LEVEL'] = $result->userLevel;
																																																																					}

																																																																					$_SESSION['MyID'] = $result->userID;
																																																																					$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																																					setlog($insertLog);
																																																																					header('Location: index.php?site=intern&check=true');

																																																																					if ($result->userLevel == 0) {
																																																																						$_SESSION['_LOGIN'] = true;
																																																																						$_SESSION['_LEVEL'] = $result->userLevel;
																																																																						$_SESSION['MyID'] = $result->userID;
																																																																						$insertLog = 'Der Kunde: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																																						setlog($insertLog);
																																																																						header('Location: index.php?site=intern&check=true');

																																																																						$msg = '<div class="error">Sorry aber Ihre Logininfomationen waren nicht korrekt!</div>';
																																																																						$lang = $key;

																																																																						if (@$_SESSION['_LOGIN'] == true) {
																																																																							include_once 'moduls/modulAdmin.php';

																																																																							if (@$_SESSION['_LOGIN'] == true) {
																																																																								if ($_SESSION['_LEVEL'] == 3) {
																																																																									include_once 'moduls/modulCoAdmin.php';

																																																																									if (@$_SESSION['_LOGIN'] == true) {
																																																																										if ($_SESSION['_LEVEL'] == 2) {
																																																																											include_once 'moduls/modulSupporter.php';

																																																																											if (@$_SESSION['_LOGIN'] == true) {
																																																																												if ($_SESSION['_LEVEL'] == 1) {
																																																																													include_once 'moduls/modulReseller.php';

																																																																													if (@$_SESSION['_LOGIN'] == true) {
																																																																														if ($_SESSION['_LEVEL'] == 0) {
																																																																															include_once 'moduls/modulCustomer.php';
																																																																															$result = $chgroup['iconid'] == 500;
																																																																														}

																																																																														$num = $chgroup['iconid'];

																																																																														if ($num != '0') {
																																																																															$x = 1462;

																																																																															if ($row = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_') {
																																																																																if ($x % 2) {
																																																																																	$newslist[$x]['color'] = $color = '#FFFFFF';
																																																																																	$newslist[$x]['newsID'] = $row['newsID'];
																																																																																	$newslist[$x]['newsUserID'] = $row['newsUserID'];
																																																																																}
																																																																																else {
																																																																																	$newslist[$x]['newsUserID']['newsUserID'] = $row['newsUserID'];
																																																																																	$newslist[$x]['newsTitel'] = $row['newsTitel'];
																																																																																	$newslist[$x]['newsText'] = utf8_encode($row['newsText']);
																																																																																}

																																																																																$newslist[$x]['newsData'] = date('d.m.Y - H:i:s', $row['newsData']);
																																																																																++$x;
																																																																																$msg = '<div class="alert alert-info">Derzeit sind keine News vorhanden!</div>';

																																																																																if (isset($newslist)) {
																																																																																}

																																																																																$smarty->assign('newslist', $newslist);
																																																																															}

																																																																															$smarty->assign('name', 'bar');
																																																																														}
																																																																													}
																																																																												}
																																																																											}
																																																																											else {
																																																																												$newslist[$x]['newsID'] = $row['newsID'];
																																																																												$newslist[$x]['newsUserID'] = $row['newsUserID'];
																																																																												$newslist[$x]['newsTitel'] = $row['newsTitel'];
																																																																												$newslist[$x]['newsText'] = utf8_encode($row['newsText']);
																																																																												$newslist[$x]['newsData'] = date('d.m.Y - H:i:s', $row['newsData']);
																																																																												++$x;
																																																																												$msg = '<div class="alert alert-info">Derzeit sind keine News vorhanden!</div>';
																																																																												$smarty->assign('newslist', $newslist);
																																																																											}
																																																																										}
																																																																									}
																																																																									else {
																																																																										include_once 'moduls/modulReseller.php';
																																																																										include_once 'moduls/modulCustomer.php';
																																																																										$result = $chgroup['iconid'] == 500;
																																																																										$chgroup;
																																																																										$x = 1462;

																																																																										$newslist[$x]['color'] = $color = '#FFFFFF';
																																																																										$newslist[$x]['newsID'] = $row['newsID'];
																																																																										$newslist[$x]['newsUserID'] = $row['newsUserID'];
																																																																										$newslist[$x]['newsTitel'] = $row['newsTitel'];
																																																																										$newslist[$x]['newsText'] = utf8_encode($row['newsText']);
																																																																										$newslist[$x]['newsData'] = date('d.m.Y - H:i:s', $row['newsData']);
																																																																										++$x;
																																																																										$msg = '<div class="alert alert-info">Derzeit sind keine News vorhanden!</div>';
																																																																									}
																																																																								}
																																																																							}
																																																																							else {
																																																																								include_once 'moduls/modulReseller.php';
																																																																								include_once 'moduls/modulCustomer.php';
																																																																								$result = $chgroup['iconid'] == 500;
																																																																								$chgroup;
																																																																								$x = 1462;
																																																																								$newslist[$x]['color'] = $color = '#FFFFFF';
																																																																								$newslist[$x]['newsID'] = $row['newsID'];
																																																																								$newslist[$x]['newsUserID'] = $row['newsUserID'];
																																																																								$newslist[$x]['newsTitel'] = $row['newsTitel'];
																																																																							}
																																																																						}
																																																																						else {
																																																																						}
																																																																					}
																																																																				}
																																																																				else {
																																																																					$lang = $key;
																																																																				}
																																																																			}
																																																																			else {
																																																																				if ($_SESSION['_LEVEL'] == 4) {
																																																																					include_once 'moduls/modulAdmin.php';
																																																																					include_once 'moduls/modulCoAdmin.php';
																																																																					include_once 'moduls/modulSupporter.php';
																																																																				}
																																																																				else {
																																																																					include_once 'moduls/modulReseller.php';
																																																																					include_once 'moduls/modulCustomer.php';
																																																																					$result = $chgroup['iconid'] == 500;
																																																																					$chgroup;
																																																																					$x = 1462;
																																																																				}

																																																																				$newslist[$x]['color'] = $color = '#FFFFFF';
																																																																			}
																																																																		}
																																																																		else {
																																																																			$newslist[$x]['color']['color'] = $color = '#FFFFFF';
																																																																			$newslist[$x]['newsID'] = $row['newsID'];
																																																																			$newslist[$x]['newsUserID'] = $row['newsUserID'];
																																																																			$newslist[$x]['newsTitel'] = $row['newsTitel'];
																																																																			$newslist[$x]['newsText'] = utf8_encode($row['newsText']);
																																																																			$newslist[$x]['newsData'] = date('d.m.Y - H:i:s', $row['newsData']);
																																																																			++$x;
																																																																			$msg = '<div class="alert alert-info">Derzeit sind keine News vorhanden!</div>';
																																																																			$smarty->assign('newslist', $newslist);
																																																																			$smarty->assign('name', 'bar');
																																																																		}
																																																																	}
																																																																}
																																																															}
																																																															else {
																																																																$_SESSION['MyID'] = $result->userID;
																																																																$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																																setlog($insertLog);
																																																																$dbt2 = '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant;
																																																																header('Location: index.php?site=intern&check=true');
																																																																$_SESSION['_LOGIN'] = true;
																																																																$_SESSION['_LEVEL'] = $result->userLevel;
																																																															}
																																																														}
																																																														else {
																																																															$_SESSION['MyID'] = $result->userID;
																																																															$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																															setlog($insertLog);
																																																															header('Location: index.php?site=intern&check=true');

																																																															$_SESSION['_LOGIN'] = true;
																																																															$_SESSION['_LEVEL'] = $result->userLevel;
																																																															$_SESSION['MyID'] = $result->userID;
																																																															$insertLog = 'Der Kunde: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																															setlog($insertLog);
																																																															header('Location: index.php?site=intern&check=true');

																																																															$msg = '<div class="error">Sorry aber Ihre Logininfomationen waren nicht korrekt!</div>';
																																																															$lang = $key;
																																																															include_once 'moduls/modulAdmin.php';
																																																															include_once 'moduls/modulCoAdmin.php';
																																																															include_once 'moduls/modulSupporter.php';
																																																															include_once 'moduls/modulReseller.php';
																																																														}
																																																													}
																																																												}
																																																											}
																																																										}
																																																									}
																																																								}
																																																								else {
																																																									switch ($_GET['site']) {
																																																									}

																																																									$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																									$tschannel .= '<div class="ts3_clear"></div>';
																																																									$tschannel .= '</div>';
																																																									$abc = $s_port . '-icon_' . $tsData['server']['virtualserver_icon_id'] . '.png';
																																																									$smarty->assign('abc', $abc);
																																																									$smarty->assign('dfg', $dfg);
																																																									$smarty->assign('tsviewer', $tschannel);
																																																									$smarty->assign('msg', $msg);
																																																									$smarty->display('ts3viewer.tpl');
																																																									exit();
																																																									break;
																																																									include_once 'core/cron.php';
																																																									exit();
																																																									$timeout = 5062;
																																																									$userNumber = isset($user_mapping[$channel['cid']]);
																																																									$pwd = db;
																																																									$passwort = db;
																																																									$result = $ch_stufe[$channel['pid']] + 16;

																																																									setcookie('PAGELOGIN', implode('php', $default_lang), time() + $timeout, '/');
																																																									$_SESSION['_LOGIN'] = true;
																																																									$_SESSION['_LEVEL'] = $result->userLevel;
																																																									$_SESSION['MyID'] = $result->userID;
																																																									$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																									setlog($insertLog);
																																																									header('Location: index.php?site=intern&check=true');

																																																									$_SESSION['_LOGIN'] = true;
																																																									$_SESSION['_LEVEL'] = $result->userLevel;
																																																									$_SESSION['MyID'] = $result->userID;
																																																									$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																									setlog($insertLog);
																																																									header('Location: index.php?site=intern&check=true');

																																																									$_SESSION['_LOGIN'] = true;
																																																									$_SESSION['_LEVEL'] = $result->userLevel;
																																																									$_SESSION['MyID'] = $result->userID;
																																																									$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																									setlog($insertLog);
																																																									$dbt2 = '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant;
																																																									header('Location: index.php?site=intern&check=true');
																																																									$_SESSION['_LOGIN'] = true;
																																																									$_SESSION['_LEVEL'] = $result->userLevel;
																																																									$_SESSION['MyID'] = $result->userID;
																																																									$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																									setlog($insertLog);
																																																									header('Location: index.php?site=intern&check=true');

																																																									$_SESSION['_LOGIN'] = true;
																																																									$_SESSION['_LEVEL'] = $result->userLevel;
																																																									$_SESSION['MyID'] = $result->userID;
																																																									$insertLog = 'Der Kunde: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																																									setlog($insertLog);
																																																									header('Location: index.php?site=intern&check=true');

																																																									$msg = '<div class="error">Sorry aber Ihre Logininfomationen waren nicht korrekt!</div>';
																																																									$lang = $key;
																																																									include_once 'moduls/modulAdmin.php';
																																																									include_once 'moduls/modulCoAdmin.php';
																																																								}
																																																							}
																																																						}
																																																					}
																																																				}
																																																			}
																																																		}
																																																	}
																																																}
																																															}
																																														}
																																													}
																																												}
																																												else {
																																													switch ($_GET['site']) {
																																													}

																																													$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																													$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																													$tschannel .= '<div class="ts3_clear"></div>';
																																													$tschannel .= '</div>';
																																													$abc = $s_port . '-icon_' . $tsData['server']['virtualserver_icon_id'] . '.png';
																																													$smarty->assign('abc', $abc);
																																													$smarty->assign('dfg', $dfg);
																																													$smarty->assign('tsviewer', $tschannel);
																																													$smarty->assign('msg', $msg);
																																													$smarty->display('ts3viewer.tpl');
																																													exit();
																																													break;
																																													include_once 'core/cron.php';
																																													exit();
																																													$timeout = 5062;
																																													$userNumber = isset($user_mapping[$channel['cid']]);
																																													$pwd = db;
																																													$passwort = db;
																																													$result = $ch_stufe[$channel['pid']] + 16;

																																													setcookie('PAGELOGIN', implode('php', $default_lang), time() + $timeout, '/');
																																													$_SESSION['_LOGIN'] = true;
																																													$_SESSION['_LEVEL'] = $result->userLevel;
																																													$_SESSION['MyID'] = $result->userID;
																																													$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																													setlog($insertLog);
																																													header('Location: index.php?site=intern&check=true');

																																													$_SESSION['_LOGIN'] = true;
																																													$_SESSION['_LEVEL'] = $result->userLevel;
																																													$_SESSION['MyID'] = $result->userID;
																																													$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																													setlog($insertLog);
																																													header('Location: index.php?site=intern&check=true');

																																													$_SESSION['_LOGIN'] = true;
																																													$_SESSION['_LEVEL'] = $result->userLevel;
																																													$_SESSION['MyID'] = $result->userID;
																																													$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																													setlog($insertLog);
																																													$dbt2 = '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant;
																																													header('Location: index.php?site=intern&check=true');
																																													$_SESSION['_LOGIN'] = true;
																																													$_SESSION['_LEVEL'] = $result->userLevel;
																																													$_SESSION['MyID'] = $result->userID;
																																													$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																													setlog($insertLog);
																																													header('Location: index.php?site=intern&check=true');

																																													$_SESSION['_LOGIN'] = true;
																																													$_SESSION['_LEVEL'] = $result->userLevel;
																																													$_SESSION['MyID'] = $result->userID;
																																													$insertLog = 'Der Kunde: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																																													setlog($insertLog);
																																													header('Location: index.php?site=intern&check=true');

																																													$msg = '<div class="error">Sorry aber Ihre Logininfomationen waren nicht korrekt!</div>';
																																													$lang = $key;
																																													include_once 'moduls/modulAdmin.php';
																																													include_once 'moduls/modulCoAdmin.php';
																																													include_once 'moduls/modulSupporter.php';
																																													include_once 'moduls/modulReseller.php';
																																													include_once 'moduls/modulCustomer.php';
																																													$result = $chgroup['iconid'] == 500;
																																													$num = $chgroup['iconid'];
																																													$x = 1462;
																																													$newslist[$x]['color'] = $color = '#FFFFFF';
																																													$newslist[$x]['newsID'] = $row['newsID'];
																																													$newslist[$x]['newsUserID'] = $row['newsUserID'];
																																													$newslist[$x]['newsTitel'] = $row['newsTitel'];
																																													$newslist[$x]['newsText'] = utf8_encode($row['newsText']);
																																													$newslist[$x]['newsData'] = date('d.m.Y - H:i:s', $row['newsData']);
																																													++$x;
																																													$msg = '<div class="alert alert-info">Derzeit sind keine News vorhanden!</div>';
																																													$smarty->assign('newslist', $newslist);
																																												}
																																											}
																																										}
																																									}
																																								}
																																							}
																																						}
																																					}
																																				}
																																			}
																																		}
																																	}
																																}
																															}
																														}
																													}
																												}
																											}
																										}
																									}
																								}
																							}
																						}
																					}
																					else {
																					}
																				}
																				else {
																					$tschannel .= '<div class="ts3_server_name">' . htmlspecialchars($spacer) . '</div>' . $icon_abstant . '';

																					$spacer = db;
																					$tschannel .= '<div class="ts3_server_u_icon"></div>';

																					$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																					$spacer = db;
																					$tschannel .= '<div class="ts3_server_u_icon"></div>';
																					$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:right">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																					$spacer = empty($fileList['data']);
																					$tschannel .= '<div class="ts3_server_u_icon"></div>';
																					$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:left">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																					$tschannel .= '<div style="margin-right:5px; width:16px; float:left;"><img src="../cache/ts3_icon/default/pwchannel.png" width="16" height="16" /></div>';

																					$tschannel .= '<div style="margin-right:5px;  width:16px; float:left;"><img src="../cache/ts3_icon/default/channel.png" width="16" height="16" /></div>';
																					$tschannel .= '<div class="ts3_server_u_icon"></div>' . $channel_art . '';

																					$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art . '';

																					$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art . '';
																					$tschannel .= '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
																					$tschannel .= '<div class="ts3_clear"></div>';
																					$tschannel .= '</div></a>';

																					$userid = db;
																					$key = db;
																					$user_data[] = $tsData['clients'][$userid];

																					$user_st = $ch_stufe[$channel['pid']] + 16;

																					$userid = db;
																					$key = db;
																					$user_data = $i < count($tsData['clients']);
																					$tschannel .= '<div class="ts3_onh" style="margin-left:' . $user_st . 'px;">';
																					$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/away.png" width="16" height="16" /></div>';

																					$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/hwhead.png" width="16" height="16" /></div>';

																					$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/hwmic.png" width="16" height="16" /></div>';

																					$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/head.png" width="16" height="16" /></div>';

																					$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/mic.png" width="16" height="16" /></div>';

																					$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player_commander_on.png" width="16" height="16" /></div>';

																					$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player_commander.png" width="16" height="16" /></div>';

																					$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player_on.png" width="16" height="16" /></div>';

																					$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player.png" width="16" height="16" /></div>';
																					$showgroupFront = '';
																					$showgroupBehind = '';
																					$group = !array_key_exists($channel['pid'], $ch_stufe);
																					$i = 1462;

																					$sgrid = db;
																					$key = db;

																					$sgroup = db;
																					$showgroupFront .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
																					$showgroupBehind .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
																					++$i;

																					$showgroupFront = '';
																					$showgroupBehind = '';
																					$tschannel .= '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant . '';

																					$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';
																					$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';
																					$group = '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>';
																					$group = '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';
																					$i = 1462;

																					$key = db;
																					$sgroup = '<div class="ts3_server_name" style="width:90%;text-align:right">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';
																					$sgroup['iconid'] = sprintf('%u', $sgroup['iconid'] & 4294967295);
																					$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';
																					$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';

																					++$i;

																					$grid = $channel['channel_icon_id'] != 500;
																					$key = db;
																					$chgroup = $channel['channel_icon_id'];
																					$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';
																					$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';

																					$tschannel .= '<div class="ts3_clear"></div>';
																					$tschannel .= '</div>';

																					switch ($_GET['site']) {
																					}

																					$abc = $s_port . '-icon_' . $tsData['server']['virtualserver_icon_id'] . '.png';
																					$smarty->assign('abc', $abc);
																					$smarty->assign('dfg', $dfg);
																					$smarty->assign('tsviewer', $tschannel);
																					$smarty->assign('msg', $msg);
																					$smarty->display('ts3viewer.tpl');
																					exit();
																					break;
																					include_once 'core/cron.php';
																					exit();
																					$timeout = 5062;
																					$userNumber = isset($user_mapping[$channel['cid']]);
																					$pwd = db;
																					$passwort = db;
																					$result = $ch_stufe[$channel['pid']] + 16;

																					setcookie('PAGELOGIN', implode('php', $default_lang), time() + $timeout, '/');
																					$_SESSION['_LOGIN'] = true;
																					$_SESSION['_LEVEL'] = $result->userLevel;
																					$_SESSION['MyID'] = $result->userID;
																					$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																					setlog($insertLog);
																					header('Location: index.php?site=intern&check=true');

																					$_SESSION['_LOGIN'] = true;
																					$_SESSION['_LEVEL'] = $result->userLevel;
																					$_SESSION['MyID'] = $result->userID;
																					$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																					setlog($insertLog);
																					header('Location: index.php?site=intern&check=true');

																					$_SESSION['_LOGIN'] = true;
																					$_SESSION['_LEVEL'] = $result->userLevel;
																					$_SESSION['MyID'] = $result->userID;
																					$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																					setlog($insertLog);
																					$dbt2 = '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant;
																					header('Location: index.php?site=intern&check=true');
																					$_SESSION['_LOGIN'] = true;
																					$_SESSION['_LEVEL'] = $result->userLevel;
																					$_SESSION['MyID'] = $result->userID;
																					$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																					setlog($insertLog);
																					header('Location: index.php?site=intern&check=true');

																					$_SESSION['_LOGIN'] = true;
																					$_SESSION['_LEVEL'] = $result->userLevel;
																					$_SESSION['MyID'] = $result->userID;
																					$insertLog = 'Der Kunde: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																					setlog($insertLog);
																					header('Location: index.php?site=intern&check=true');
																					$msg = '<div class="error">Sorry aber Ihre Logininfomationen waren nicht korrekt!</div>';
																					$lang = $key;
																					include_once 'moduls/modulAdmin.php';
																					include_once 'moduls/modulCoAdmin.php';
																					include_once 'moduls/modulSupporter.php';
																					include_once 'moduls/modulReseller.php';
																					include_once 'moduls/modulCustomer.php';
																					$result = $chgroup['iconid'] == 500;
																					$num = $chgroup['iconid'];
																					$x = 1462;
																					$newslist[$x]['color'] = $color = '#FFFFFF';
																					$newslist[$x]['newsID'] = $row['newsID'];
																					$newslist[$x]['newsUserID'] = $row['newsUserID'];
																					$newslist[$x]['newsTitel'] = $row['newsTitel'];
																					$newslist[$x]['newsText'] = utf8_encode($row['newsText']);
																					$newslist[$x]['newsData'] = date('d.m.Y - H:i:s', $row['newsData']);
																					++$x;
																					$msg = '<div class="alert alert-info">Derzeit sind keine News vorhanden!</div>';
																					$smarty->assign('newslist', $newslist);
																				}
																			}
																		}
																	}
																}
																else {
																	++$i;
																	$tschannel .= '<div class="ts3_server_name">' . htmlspecialchars($spacer) . '</div>' . $icon_abstant . '';

																	$spacer = db;
																	$tschannel .= '<div class="ts3_server_u_icon"></div>';

																	$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																	$spacer = db;
																	$tschannel .= '<div class="ts3_server_u_icon"></div>';
																	$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:right">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																	$spacer = empty($fileList['data']);
																	$tschannel .= '<div class="ts3_server_u_icon"></div>';
																	$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:left">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																	$tschannel .= '<div style="margin-right:5px; width:16px; float:left;"><img src="../cache/ts3_icon/default/pwchannel.png" width="16" height="16" /></div>';

																	$tschannel .= '<div style="margin-right:5px;  width:16px; float:left;"><img src="../cache/ts3_icon/default/channel.png" width="16" height="16" /></div>';
																	$tschannel .= '<div class="ts3_server_u_icon"></div>' . $channel_art . '';
																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art . '';

																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art . '';
																	$tschannel .= '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
																	$tschannel .= '<div class="ts3_clear"></div>';
																	$tschannel .= '</div></a>';

																	$userid = db;
																	$key = db;
																	$user_data[] = $tsData['clients'][$userid];

																	$user_st = $ch_stufe[$channel['pid']] + 16;

																	$userid = db;
																	$key = db;
																	$user_data = $i < count($tsData['clients']);
																	$tschannel .= '<div class="ts3_onh" style="margin-left:' . $user_st . 'px;">';
																	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/away.png" width="16" height="16" /></div>';

																	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/hwhead.png" width="16" height="16" /></div>';

																	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/hwmic.png" width="16" height="16" /></div>';

																	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/head.png" width="16" height="16" /></div>';

																	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/mic.png" width="16" height="16" /></div>';

																	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player_commander_on.png" width="16" height="16" /></div>';

																	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player_commander.png" width="16" height="16" /></div>';

																	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player_on.png" width="16" height="16" /></div>';

																	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player.png" width="16" height="16" /></div>';
																	$showgroupFront = '';
																	$showgroupBehind = '';
																	$group = !array_key_exists($channel['pid'], $ch_stufe);
																	$i = 1462;

																	$sgrid = db;
																	$key = db;

																	$sgroup = db;
																	$showgroupFront .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
																	$showgroupBehind .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
																	++$i;

																	$showgroupFront = '';
																	$showgroupBehind = '';
																	$tschannel .= '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant . '';

																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';
																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';
																	$group = '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>';
																	$group = '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';
																	$i = 1462;

																	$key = db;
																	$sgroup = '<div class="ts3_server_name" style="width:90%;text-align:right">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';
																	$sgroup['iconid'] = sprintf('%u', $sgroup['iconid'] & 4294967295);
																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';
																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';

																	++$i;

																	$grid = $channel['channel_icon_id'] != 500;
																	$key = db;
																	$chgroup = $channel['channel_icon_id'];
																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';
																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';

																	$tschannel .= '<div class="ts3_clear"></div>';
																	$tschannel .= '</div>';

																	switch ($_GET['site']) {
																	}

																	$abc = $s_port . '-icon_' . $tsData['server']['virtualserver_icon_id'] . '.png';
																	$smarty->assign('abc', $abc);
																	$smarty->assign('dfg', $dfg);
																	$smarty->assign('tsviewer', $tschannel);
																	$smarty->assign('msg', $msg);
																	$smarty->display('ts3viewer.tpl');
																	exit();
																	break;
																	include_once 'core/cron.php';
																	exit();
																	$timeout = 5062;
																	$userNumber = isset($user_mapping[$channel['cid']]);
																	$pwd = db;
																	$passwort = db;
																	$result = $ch_stufe[$channel['pid']] + 16;
																	setcookie('PAGELOGIN', implode('php', $default_lang), time() + $timeout, '/');
																	$_SESSION['_LOGIN'] = true;
																	$_SESSION['_LEVEL'] = $result->userLevel;
																	$_SESSION['MyID'] = $result->userID;
																	$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																	setlog($insertLog);
																	header('Location: index.php?site=intern&check=true');
																	$_SESSION['_LOGIN'] = true;
																	$_SESSION['_LEVEL'] = $result->userLevel;
																	$_SESSION['MyID'] = $result->userID;
																	$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																	setlog($insertLog);
																	header('Location: index.php?site=intern&check=true');

																	$_SESSION['_LOGIN'] = true;
																	$_SESSION['_LEVEL'] = $result->userLevel;
																	$_SESSION['MyID'] = $result->userID;
																	$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																	setlog($insertLog);
																	$dbt2 = '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant;
																	header('Location: index.php?site=intern&check=true');
																	$_SESSION['_LOGIN'] = true;
																	$_SESSION['_LEVEL'] = $result->userLevel;
																	$_SESSION['MyID'] = $result->userID;
																	$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																	setlog($insertLog);
																	header('Location: index.php?site=intern&check=true');
																	$_SESSION['_LOGIN'] = true;
																	$_SESSION['_LEVEL'] = $result->userLevel;
																	$_SESSION['MyID'] = $result->userID;
																	$insertLog = 'Der Kunde: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
																	setlog($insertLog);
																	header('Location: index.php?site=intern&check=true');
																	$msg = '<div class="error">Sorry aber Ihre Logininfomationen waren nicht korrekt!</div>';
																	$lang = $key;
																	include_once 'moduls/modulAdmin.php';
																	include_once 'moduls/modulCoAdmin.php';
																	include_once 'moduls/modulSupporter.php';
																	include_once 'moduls/modulReseller.php';
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		default:
			$tsData['ftList'] = $ftList['data'];
			$tschannel = '';
			$tschannel .= '';
			$baumwert = 1478;
			$icon_abstant = '<div style="width:16px;float:left;"></div>';
			$i = 1462;
			$segroup_mapping[$tsData['sgroups'][$i]['sgid']][] = $i;
			++$i;
			$i = 1462;
			$user_mapping[$tsData['clients'][$i]['cid']][] = $i;
			++$i;
			$i = 1462;
			$chgroup_mapping[$tsData['cgroups'][$i]['cgid']][] = $i;
			++$i;

			$channel = $num != '0';
			$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/password.png" width="16" height="16" /></div>';

			$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/default.png" width="16" height="16" /></div>';

			$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/moderated.png" width="16" height="16" /></div>';

			$channel_art = '';
			$baumwert = $baumwert + 16;
			$ch_stufe[$channel['pid']] = $baumwert;

			$baumwert = 1478;

			$ch_stufe[$channel['pid']] = 16;

			$tschannel .= '<div class="ts3_onh" style="margin-left:' . $ch_stufe[$channel['pid']] . 'px;">';
			$getspacer = db;
			$checkspacer = $getspacer[1][0] . $getspacer[1][0] . $getspacer[1][0];
			$spacer = '';
			$i = 1462;
			$spacer .= db;

			break;
			++$i;
			$tschannel .= '<div class="ts3_server_name">' . htmlspecialchars($spacer) . '</div>' . $icon_abstant . '';

			$spacer = db;
			$tschannel .= '<div class="ts3_server_u_icon"></div>';
			$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

			$spacer = db;
			$tschannel .= '<div class="ts3_server_u_icon"></div>';
			$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:right">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

			$spacer = empty($fileList['data']);
			$tschannel .= '<div class="ts3_server_u_icon"></div>';
			$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:left">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

			$tschannel .= '<div style="margin-right:5px; width:16px; float:left;"><img src="../cache/ts3_icon/default/pwchannel.png" width="16" height="16" /></div>';

			$tschannel .= '<div style="margin-right:5px;  width:16px; float:left;"><img src="../cache/ts3_icon/default/channel.png" width="16" height="16" /></div>';
			$tschannel .= '<div class="ts3_server_u_icon"></div>' . $channel_art . '';
			$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art . '';

			$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art . '';
			$tschannel .= '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
			$tschannel .= '<div class="ts3_clear"></div>';
			$tschannel .= '</div></a>';

			$userid = db;
			$key = db;
			$user_data[] = $tsData['clients'][$userid];

			$user_st = $ch_stufe[$channel['pid']] + 16;
		}
	}
}
else {
	$tsData['server']['virtualserver_icon_id'] = $smarty->assign('%u', $tsData['server']['virtualserver_icon_id'] & 4294967295);
	$channelList = db;
	$tsData['channel'] = $channelList['data'];
	$clientList = ($_SESSION['MyID']);
	$tsData['clients'] = $clientList['data'];
	$serverGroupList = 'Der Kunde: ' . $result->userName . ' logte sich am ';
	$tsData['sgroups'] = $serverGroupList['data'];
	$channelGroupList = db;

	$tsData['cgroups'] = $channelGroupList['data'];
	$ftList = @$_SESSION['_LOGIN'];
	$tsData['ftList'] = $ftList['data'];
	$tschannel = '';
	$tschannel .= '';
	$baumwert = 1478;
	$icon_abstant = '<div style="width:16px;float:left;"></div>';
	$i = 1462;

	$segroup_mapping[$tsData['sgroups'][$i]['sgid']][] = $i;
	++$i;
	$i = 1462;
	$user_mapping[$tsData['clients'][$i]['cid']][] = $i;
	++$i;
	$i = 1462;
	$chgroup_mapping[$tsData['cgroups'][$i]['cgid']][] = $i;
	++$i;

	$channel = $num != '0';
	$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/password.png" width="16" height="16" /></div>';

	$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/default.png" width="16" height="16" /></div>';

	$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/moderated.png" width="16" height="16" /></div>';

	$channel_art = '';
	$baumwert = $baumwert + 16;
	$ch_stufe[$channel['pid']] = $baumwert;

	$baumwert = 1478;

	$ch_stufe[$channel['pid']] = 16;

	$tschannel .= '<div class="ts3_onh" style="margin-left:' . $ch_stufe[$channel['pid']] . 'px;">';
	$getspacer = db;

	$checkspacer = $getspacer[1][0] . $getspacer[1][0] . $getspacer[1][0];

	$spacer = '';
	$i = 1462;

	$spacer .= db;

	break;
	++$i;
	$tschannel .= '<div class="ts3_server_name">' . htmlspecialchars($spacer) . '</div>' . $icon_abstant . '';

	$spacer = db;
	$tschannel .= '<div class="ts3_server_u_icon"></div>';

	$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

	$spacer = db;
	$tschannel .= '<div class="ts3_server_u_icon"></div>';
	$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:right">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

	$spacer = empty($fileList['data']);
	$tschannel .= '<div class="ts3_server_u_icon"></div>';
	$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:left">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

	$tschannel .= '<div style="margin-right:5px; width:16px; float:left;"><img src="../cache/ts3_icon/default/pwchannel.png" width="16" height="16" /></div>';

	$tschannel .= '<div style="margin-right:5px;  width:16px; float:left;"><img src="../cache/ts3_icon/default/channel.png" width="16" height="16" /></div>';
	$tschannel .= '<div class="ts3_server_u_icon"></div>' . $channel_art . '';

	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art . '';

	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art . '';
	$tschannel .= '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
	$tschannel .= '<div class="ts3_clear"></div>';
	$tschannel .= '</div></a>';

	$userid = db;
	$key = db;
	$user_data[] = $tsData['clients'][$userid];

	$user_st = $ch_stufe[$channel['pid']] + 16;

	$userid = db;
	$key = db;
	$user_data = $i < count($tsData['clients']);
	$tschannel .= '<div class="ts3_onh" style="margin-left:' . $user_st . 'px;">';
	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/away.png" width="16" height="16" /></div>';

	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/hwhead.png" width="16" height="16" /></div>';

	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/hwmic.png" width="16" height="16" /></div>';

	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/head.png" width="16" height="16" /></div>';

	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/mic.png" width="16" height="16" /></div>';

	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player_commander_on.png" width="16" height="16" /></div>';

	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player_commander.png" width="16" height="16" /></div>';

	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player_on.png" width="16" height="16" /></div>';

	$tschannel .= '<div style=" width:16px; float:left; margin-right:5px; "><img src="../cache/ts3_icon/default/player.png" width="16" height="16" /></div>';
	$showgroupFront = '';
	$showgroupBehind = '';
	$group = !array_key_exists($channel['pid'], $ch_stufe);
	$i = 1462;

	$sgrid = db;
	$key = db;

	$sgroup = db;
	$showgroupFront .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
	$showgroupBehind .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
	++$i;

	$showgroupFront = '';
	$showgroupBehind = '';
	$tschannel .= '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant . '';

	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';
	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';
	$group = '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>';
	$group = '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';
	$i = 1462;

	$key = db;
	$sgroup = '<div class="ts3_server_name" style="width:90%;text-align:right">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';
	$sgroup['iconid'] = sprintf('%u', $sgroup['iconid'] & 4294967295);
	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';
	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';

	++$i;

	$grid = $channel['channel_icon_id'] != 500;
	$key = db;
	$chgroup = $channel['channel_icon_id'];
	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';
	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';

	$tschannel .= '<div class="ts3_clear"></div>';
	$tschannel .= '</div>';

	switch ($_GET['site']) {
	}

	$abc = $s_port . '-icon_' . $tsData['server']['virtualserver_icon_id'] . '.png';
	$smarty->assign('abc', $abc);
	$smarty->assign('dfg', $dfg);
	$smarty->assign('tsviewer', $tschannel);
	$smarty->assign('msg', $msg);
	$smarty->display('ts3viewer.tpl');
	exit();
	break;
	include_once 'core/cron.php';
	exit();
	$timeout = 5062;
	$userNumber = isset($user_mapping[$channel['cid']]);
	$pwd = db;
	$passwort = db;
	$result = $ch_stufe[$channel['pid']] + 16;
	setcookie('PAGELOGIN', implode('php', $default_lang), time() + $timeout, '/');
	$_SESSION['_LOGIN'] = true;
	$_SESSION['_LEVEL'] = $result->userLevel;
	$_SESSION['MyID'] = $result->userID;
	$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
	setlog($insertLog);
	header('Location: index.php?site=intern&check=true');
	$_SESSION['_LOGIN'] = true;
	$_SESSION['_LEVEL'] = $result->userLevel;
	$_SESSION['MyID'] = $result->userID;
	$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
	setlog($insertLog);
	header('Location: index.php?site=intern&check=true');
	$_SESSION['_LOGIN'] = true;
	$_SESSION['_LEVEL'] = $result->userLevel;
	$_SESSION['MyID'] = $result->userID;
	$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
	setlog($insertLog);
	$dbt2 = '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant;
	header('Location: index.php?site=intern&check=true');
	$_SESSION['_LOGIN'] = true;
	$_SESSION['_LEVEL'] = $result->userLevel;
	$_SESSION['MyID'] = $result->userID;
	$insertLog = 'Der Administrator: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
	setlog($insertLog);
	header('Location: index.php?site=intern&check=true');
	$_SESSION['_LOGIN'] = true;
	$_SESSION['_LEVEL'] = $result->userLevel;
	$_SESSION['MyID'] = $result->userID;
	$insertLog = 'Der Kunde: ' . $result->userName . ' logte sich am ' . date('d.m.Y / H:i:s', time()) . ' erfolgreich ein!';
	setlog($insertLog);
	header('Location: index.php?site=intern&check=true');
	$msg = '<div class="error">Sorry aber Ihre Logininfomationen waren nicht korrekt!</div>';
	$lang = $key;
	include_once 'moduls/modulAdmin.php';
	include_once 'moduls/modulCoAdmin.php';
	include_once 'moduls/modulSupporter.php';
	include_once 'moduls/modulReseller.php';
	include_once 'moduls/modulCustomer.php';
	$result = $chgroup['iconid'] == 500;
	$num = $chgroup['iconid'];
	$x = 1462;
	$newslist[$x]['color'] = $color = '#FFFFFF';
	$newslist[$x]['newsID'] = $row['newsID'];
	$newslist[$x]['newsUserID'] = $row['newsUserID'];
	$newslist[$x]['newsTitel'] = $row['newsTitel'];
	$newslist[$x]['newsText'] = utf8_encode($row['newsText']);
	$newslist[$x]['newsData'] = date('d.m.Y - H:i:s', $row['newsData']);
	++$x;

	$msg = '<div class="alert alert-info">Derzeit sind keine News vorhanden!</div>';
	$smarty->assign('newslist', $newslist);
	$smarty->assign('name', 'bar');
}

$smarty->assign('msg', $msg);
$smarty->display('index.tpl');

?>
