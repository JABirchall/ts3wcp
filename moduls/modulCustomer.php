<?php
/**
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.2
 * @ Release on : 04.05.2016
 * @ Website    : http://EasyToYou.eu
 *
 * @ Zend guard decoder PHP 5.6
 **/

error_reporting(30719);

ini_set('display_errors', 1);

$costumerNR = costumerNR();

if (isset($_GET['site'])) {
	switch ($_GET['site']) {
	case 'myprofil':
		if (isset($_POST['myprofilEdit'])) {
			if (!$_POST['userName'] == '') {
				if (!$_POST['userFirstName'] == '') {
					if (!$_POST['userLastName'] == '') {
						if (!$_POST['userEmail'] == '') {
							$inputok = '';
							$abfrage = 'SELECT * FROM cms_users WHERE userName = \'' . $_POST['userName'] . '\'';
							$ergebnis = costumerNR();

							if (0 < mysql_num_rows($ergebnis)) {
								$msg = '<div class="alert alert-danger">Diese userName wird bereits verwendet!</div>';

								$inputok = true;
								$abfrage2 = 'SELECT * FROM cms_users WHERE userEmail = \'' . $_POST['userEmail'] . '\'';
								$ergebnis2 = costumerNR();

								if (1 < mysql_num_rows($ergebnis2)) {
									$msg = '<div class="alert alert-danger">Diese E-Mailadresse wird bereits verwendet!</div>';

									$inputok2 = true;

									$msg = '<div class="alert alert-danger">Es wurden nicht alle Felder ausgefüllt!</div>';

									if (isset($inputok)) {
										if (isset($inputok2)) {
											$userName = costumerNR();
											$userFirstName = costumerNR();
											$userLastName = costumerNR();

											$userEmail = costumerNR();

											$DDB1 = 'UPDATE cms_users SET userName=\'' . $userName . '\', userFirstName=\'' . $userFirstName . '\', userLastName=\'' . $userLastName . '\', userEmail=\'' . $userEmail . '\' WHERE userID=\'' . $_SESSION['MyID'] . '\'';
											$result = costumerNR();

											if ($result) {
												function myProfil()
												{
													global $db;
													global $_SESSEION;
													error_reporting(0);
													$result = $GLOBALS['db'];
													error_reporting(30719);

													if ($row = 'SELECT * FROM cms_users WHERE userID = \'' . $_SESSION['MyID']) {
														$myProfil['userID'] = $row['userID'];
														$myProfil['userName'] = $row['userName'];
														$myProfil['userNumber'] = $row['userNumber'];
													}

													$myProfil['userPassword'] = $row['userPassword'];
													$myProfil['userFirstName'] = $row['userFirstName'];
													$myProfil['userLastName'] = $row['userLastName'];

													$myProfil['userEmail'] = $row['userEmail'];
													$myProfil['userLevel'] = $row['userLevel'];
													$myProfil['userLastLogin'] = date('d.m.Y - H:i:s', $row['userLastLogin']);
													$myProfil['userRegisterData'] = date('d.m.Y - H:i:s', $row['userRegisterData']);
													$myProfil['RegisterData'] = date('d.m.Y', $row['userRegisterData']);

													if (isset($myProfil)) {
													}

													return $myProfil;
												}
												$msg = '<div class="alert alert-success">Profil wurde erfolgreich gespeichert!</div>';

												$myProfil = costumerNR();
												$smarty->assign('myProfil', $myProfil);
												$smarty->assign('msg', $msg);

												$smarty->display('customer/myprofil.tpl');

												exit();
												break;

												switch ($_GET['site']) {
												case 'mytickets':
													function myTickets()
													{
														global $db;
														global $MyData;
														global $_SESSEION;
														error_reporting(0);
														$result = $GLOBALS['db'];
														error_reporting(30719);
														$x = 280;

														if ($row = $GLOBALS['db']) {
															$myTickets[$x]['ticketID'] = $row['ticketID'];
															$myTickets[$x]['ticketApteilID'] = $row['ticketApteilID'];
														}
														else {
															$myTickets[$x]['ticketUserNumber'] = $row['ticketUserNumber'];
															$myTickets[$x]['ticketUserName'] = $row['ticketUserName'];
															$myTickets[$x]['ticketUserEmail'] = $row['ticketUserEmail'];
															$myTickets[$x]['ticketBetreff'] = $row['ticketBetreff'];
															$myTickets[$x]['ticketText'] = $row['ticketText'];
															$myTickets[$x]['ticketData'] = date('d.m.Y - H:i:s', $row['ticketData']);
															$myTickets[$x]['prioritaet'] = $row['prioritaet'];

															if ($row['ticketStatus'] == 0) {
																$myTickets[$x]['ticketStatus'] = '<span class="badge badge-important">Offen</span>';

																if ($row['ticketStatus'] == 1) {
																	$myTickets[$x]['ticketStatus'] = '<span class="badge badge-warning">In Bearbeitung</span>';

																	if ($row['ticketStatus'] == 2) {
																		$myTickets[$x]['ticketStatus'] = '<span class="badge badge-info">Beantwortet</span>';

																		if ($row['ticketStatus'] == 3) {
																			$myTickets[$x]['ticketStatus'] = '<span class="badge badge-success">Geschlossen</span>';
																		}

																		++$x;
																	}
																}
																else {
																}
															}
															else {
																$myTickets[$x]['ticketStatus'] = '<span class="badge badge-success">Geschlossen</span>';
																++$x;

																if (isset($myTickets)) {
																}

																return $myTickets;
															}
														}
													}
													function myProdcts()
													{
														global $db;

														global $MyData;
														global $_SESSEION;
														error_reporting(0);
														$result = $GLOBALS['db'];
														error_reporting(30719);
														$x = 257;

														if ($row = $GLOBALS['db']) {
															$myProdcts[$x]['serverID'] = $row['serverID'];
															$myProdcts[$x]['serverHostID'] = $row['serverHostID'];
															$myProdcts[$x]['serverSid'] = $row['serverSid'];
															$myProdcts[$x]['serverUserNumber'] = $row['serverUserNumber'];
															$myProdcts[$x]['serverPort'] = $row['serverPort'];
															$myProdcts[$x]['serverStatus'] = $row['serverStatus'];
															$result2 = $MyData['userNumber'];
														}
														else {
															$myProdcts[$x]['hostID'] = $row2['hostID'];
															$myProdcts[$x]['hostIP'] = $row2['hostIP'];
														}

														++$x;

														if (isset($myProdcts)) {
														}

														return $myProdcts;
													}
													if (isset($_GET['act']) == 'tdetail') {
														if (isset($_GET['tid']) != '') {
															if (isset($_GET['act']) == 'tdetail') {
																if (isset($_GET['tid']) != '') {
																	if (isset($_GET['set']) == 'closed') {
																		$TID = costumerNR();
																		$result = costumerNR();
																		$msg = '<div class="alert alert-success">Ticket wurde geschlossen!</div>';

																		if (isset($_POST['ticketAnswere'])) {
																			if (isset($_POST['ticketMSG']) != '') {
																				$verlaufID = costumerNR();

																				$verlaufApteilID = costumerNR();

																				$verlaufTicketID = costumerNR();
																				$verlaufUserNumber = costumerNR();

																				$verlaufText = costumerNR();
																				$verlaufAuthor = costumerNR();
																				$verlaufData = costumerNR();
																				$result = costumerNR();
																				function myTicketDetail()
																				{
																					global $db;
																					global $MyData;
																					$_GET = &$_GET;
																					global $smarty;
																					$result = $GLOBALS['db'];
																					$x = 308;

																					$myTicketDetail[$x]['ticketID'] = $row['ticketID'];
																					$myTicketDetail[$x]['ticketApteilID'] = $row['ticketApteilID'];
																					$myTicketDetail[$x]['ticketUserNumber'] = $row['ticketUserNumber'];

																					$myTicketDetail[$x]['ticketUserName'] = $row['ticketUserName'];
																					$myTicketDetail[$x]['ticketUserEmail'] = $row['ticketUserEmail'];
																					$myTicketDetail[$x]['ticketBetreff'] = utf8_encode($row['ticketBetreff']);
																					$myTicketDetail[$x]['ticketText'] = utf8_encode($row['ticketText']);
																					$myTicketDetail[$x]['ticketData'] = date('d.m.Y - H:i:s', $row['ticketData']);
																					$myTicketDetail[$x]['prioritaet'] = $row['prioritaet'];
																					$myTicketDetail[$x]['isticketStatus'] = $row['ticketStatus'];

																					if ($row['ticketStatus'] == 0) {
																						$myTicketDetail[$x]['ticketStatus'] = '<span class="badge badge-important">Offen</span>';
																					}
																					else {
																						$myTicketDetail[$x]['ticketStatus'] = '<span class="badge badge-warning">In Bearbeitung</span>';

																						if ($row['ticketStatus'] == 2) {
																						}

																						$myTicketDetail[$x]['ticketStatus'] = '<span class="badge badge-info">Beantwortet</span>';
																						$myTicketDetail[$x]['ticketStatus'] = '<span class="badge badge-success">Geschlossen</span>';

																						if ($row['prioritaet'] == 0) {
																							$myTicketDetail[$x]['prioritaet'] = '<span class="badge badge-info">Niedrig</span>';
																							if ($row['prioritaet'] == 1) {
																								$myTicketDetail[$x]['prioritaet'] = '<span class="badge badge-warning">Normal</span>';
																								if ($row['prioritaet'] == 2) {
																								}
																							}
																							else {
																								$myTicketDetail[$x]['prioritaet'] = '<span class="badge badge-important">Hoch</span>';
																								++$x;

																								if (isset($myTicketDetail)) {
																								}
																							}
																						}
																						else {
																							return $myTicketDetail;
																						}
																					}
																				}

																				$result .= costumerNR();
																				$msg = '<div class="alert alert-success">News wurde erfolgreich hinzugefügt!</div>';
																				$insertLog = 'Der Kunde [' . $ticketUserNumber . '] erstellte am ' . date('d.m.Y / H:i:s', time()) . ' ein neues Ticket!';
																				setlog($insertLog);
																				$msg = '<div class="alert alert-success">Ticket wurde beantwortet!</div>';

																				if ($_GET['site'] == 'mytickets') {
																					if ($_GET['act'] == 'tdetail') {
																						$TID = costumerNR();

																						if (isset($_GET['start'])) {
																							$start = 0;

																							$sql = 'SELECT * FROM cms_tickets_verlauf WHERE verlaufTicketID = \'' . $TID . '\'';
																							$result = costumerNR();
																							$total = costumerNR();
																							$proseite = costumerNR();

																							if ($proseite < $total) {
																								$out = '';

																								if ($start != '0') {
																									$out .= '<li><a href="index.php?site=mytickets&act=tdetail&tid=' . $_GET['tid'] . '&start=0">0</a></li>';
																									$pages = costumerNR();

																									if (($total % $proseite) != 0) {
																										++$pages;

																										if ($pages != 0) {
																											if ($pages != 1) {
																												$i = 4310;

																												if ($i < $pages) {
																													if ($start != $i * $proseite) {
																														$startneu = $i * $proseite;
																														$zahl = $i + 1;
																														$out .= '<li><a href="index.php?site=mytickets&act=tdetail&tid=' . $_GET['tid'] .  . '&start=' . $startneu . '">' . $zahl . '</a></li>';

																														$zahl = $i + 1;
																														$out .= '<li><a href="index.php?site=mytickets&act=tdetail&tid=' . $_GET['tid'] .  . '&start=' . $zahl . '">' . $zahl . '</a></li>';
																														++$i;

																														$smarty->assign('out', $out);

																														$result2 = costumerNR();
																														$num2 = costumerNR();

																														if ($row2 = costumerNR()) {
																															$myTicketDetailAnswere[$x]['verlaufID'] = $row2['verlaufID'];
																															$myTicketDetailAnswere[$x]['verlaufApteilID'] = $row2['verlaufApteilID'];
																															$myTicketDetailAnswere[$x]['verlaufTicketID'] = $row2['verlaufTicketID'];
																															$myTicketDetailAnswere[$x]['verlaufUserNumber'] = $row2['verlaufUserNumber'];
																															$myTicketDetailAnswere[$x]['verlaufText'] = utf8_encode($row2['verlaufText']);
																															$myTicketDetailAnswere[$x]['verlaufAuthor'] = $row2['verlaufAuthor'];
																															$myTicketDetailAnswere[$x]['verlaufData'] = date('d.m.Y - H:i:s', $row2['verlaufData']);
																															++$x;

																															$smarty->assign('myTicketDetail', myTicketDetail());
																															$smarty->assign('myTicketDetailAnswere', $myTicketDetailAnswere);
																															$smarty->assign('msg', $msg);
																															$smarty->assign('out', $out);
																															$smarty->display('customer/myticketDetail.tpl');
																															exit();

																															if (isset($_GET['action']) == 'ticketAdd') {
																																if (isset($_POST['ticketAdd'])) {
																																	if (!$_POST['ticketBetreff'] == '') {
																																		$ticketProductID = costumerNR();
																																		$ticketUserNumber = costumerNR();
																																		$ticketUserName = costumerNR();

																																		$ticketUserEmail = costumerNR();
																																		$ticketBetreff = costumerNR();
																																		$ticketText = costumerNR();
																																		$ticketData = costumerNR();

																																		$prioritaet = costumerNR();
																																		$ticketStatus = costumerNR();

																																		$setnews = costumerNR();
																																		$result = costumerNR();
																																		$msg = '<div class="alert alert-success">News wurde erfolgreich hinzugefügt!</div>';
																																		$insertLog = 'Der Kunde [' . $ticketUserName . '] erstellte am ' . date('d.m.Y / H:i:s', time()) . ' ein neues Ticket!';
																																		setlog($insertLog);

																																		$msg = '<div class="alert alert-warning">ERROR: Es ist ein fehler aufgetretetn!</div>';

																																		$smarty->assign('myProdcts', myProdcts());
																																		$smarty->assign('msg', $msg);
																																		$smarty->display('customer/myticketsAdd.tpl');
																																		exit();
																																		$smarty->assign('myTickets', myTickets());
																																		$smarty->assign('msg', $msg);
																																		$smarty->display('customer/mytickets.tpl');
																																		exit();
																																		break;

																																		switch ($_GET['site']) {
																																		case 'myproducts':
																																			$result = costumerNR();

																																			$num = costumerNR();

																																			if ($num != '0') {
																																				$x = 4310;

																																				if ($row = costumerNR()) {
																																					if ($x % 2) {
																																						$myProductList[$x]['color'] = $color = '#FFFFFF';
																																						$myProductList[$x]['serverID'] = $row['serverID'];

																																						$myProductList[$x]['serverHostID'] = $row['serverHostID'];
																																						$myProductList[$x]['serverSid'] = $row['serverSid'];
																																						$myProductList[$x]['serverUserNumber'] = $row['serverUserNumber'];
																																						$myProductList[$x]['serverPort'] = $row['serverPort'];

																																						$result2 = costumerNR();
																																						$db->num_rows($result2);

																																						if ($row2 = costumerNR()) {
																																							if ($x % 2) {
																																								$myProductList[$x]['color'] = $color = '#FFFFFF';
																																								$myProductList[$x]['hostID'] = $row2['hostID'];
																																								$myProductList[$x]['hostName'] = $row2['hostName'];
																																								$myProductList[$x]['hostUsername'] = $row2['hostUsername'];
																																								$myProductList[$x]['hostPassword'] = $row2['hostPassword'];
																																								$myProductList[$x]['hostIP'] = $row2['hostIP'];
																																								$myProductList[$x]['hostQueryPort'] = $row2['hostQueryPort'];

																																								$scp = costumerNR();
																																								$scp->login($myProductList[$x]['hostUsername'], $myProductList[$x]['hostPassword']);

																																								$select = costumerNR();
																																								$serverinfo = costumerNR();
																																								$myProductList[$x]['virtualserver_name'] = $serverinfo['virtualserver_name'];

																																								$myProductList[$x]['virtualserver_maxclients'] = $serverinfo['virtualserver_maxclients'];
																																								$myProductList[$x]['virtualserver_clientsonline'] = $serverinfo['virtualserver_clientsonline'] - 1;

																																								if ($serverinfo['virtualserver_status'] == 'online') {
																																									$myProductList[$x]['serverStatus'] = '<span class="badge badge-success">Online</span>';
																																									$myProductList[$x]['serverStatus'] = '<span class="badge badge-important">Offline</span>';
																																									++$x;

																																									$msg = '<div class="alert alert-warning">Derzeit sind keine Kunden vorhanden!</div>';

																																									if (isset($myProductList)) {
																																										$smarty->assign('myProductList', $myProductList);

																																										if (isset($_GET['act'])) {
																																											switch ($_GET['act']) {
																																											case 'adm':
																																												$smarty->assign('act', $_GET['act']);

																																												$smarty->assign('id', $_GET['id']);
																																												$result = costumerNR();

																																												error_reporting(30719);

																																												if ($row = costumerNR()) {
																																													$myADM['serverID'] = $row['serverID'];
																																													$myADM['serverHostID'] = $row['serverHostID'];
																																													$myADM['serverSid'] = $row['serverSid'];
																																													$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																													$myADM['serverPort'] = $row['serverPort'];
																																													$result2 = costumerNR();
																																													error_reporting(30719);
																																													$myADM['hostID'] = $row2['hostID'];
																																													$myADM['hostName'] = $row2['hostName'];
																																													$myADM['hostUsername'] = $row2['hostUsername'];
																																													$myADM['hostPassword'] = $row2['hostPassword'];
																																													$myADM['hostIP'] = $row2['hostIP'];
																																													$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																													$smarty->assign('serverPort', $myADM['serverPort']);
																																													$smarty->assign('hostIP', $myADM['hostIP']);
																																													$s_port = '';
																																													$iconDir = 'cache/ts3_icon/';
																																													$icon_arr = array();

																																													if ($handle = costumerNR()) {
																																														if (false !== $file = costumerNR()) {
																																															$icon_arr[] = $file;
																																															closedir($handle);
																																															$tschannel = '';
																																															$scp = costumerNR();

																																															if ($scp->getElement('success', $scp->connect())) {
																																																$scp->login($myADM['hostUsername'], $myADM['hostPassword']);
																																																$selected = costumerNR();

																																																if (!empty($selected['errors'])) {
																																																	$msg = '<div class="alert alert-warning">Derzeit ist dieses Produkt gesperrt!</div>';

																																																	$smarty->assign('selectedErrors', $selected['errors']);

																																																	break;
																																																	$smarty->assign('selectedErrors', $selected['errors']);
																																																	$s_port = costumerNR();
																																																	$fileList = costumerNR();

																																																	if (!empty($fileList['data'])) {
																																																		$file = costumerNR();
																																																		$ftp_data = costumerNR();
																																																		$con_scpftp = costumerNR();
																																																		fputs($con_scpftp, $ftp_data['data']['ftkey']);
																																																		$data = '';

																																																		if (!feof($con_scpftp)) {
																																																			$data .= costumerNR();
																																																			$handler2 = costumerNR();
																																																			fwrite($handler2, $data);
																																																			fclose($handler2);

																																																			$tschannel .= 'Sorry! Server ist derzeit Offline!';
																																																			$tsData = array();
																																																			$serverInfo = costumerNR();
																																																			$tsData['server'] = $serverInfo['data'];
																																																			$hostInfo = costumerNR();
																																																			$tsData['hostInfo'] = $hostInfo['data'];
																																																			$tsData['server']['virtualserver_icon_id'] = sprintf('%u', $tsData['server']['virtualserver_icon_id'] & 4294967295);
																																																			$channelList = costumerNR();
																																																			$tsData['channel'] = $channelList['data'];
																																																			$clientList = costumerNR();
																																																			$tsData['clients'] = $clientList['data'];
																																																			$serverGroupList = costumerNR();
																																																			$tsData['sgroups'] = $serverGroupList['data'];
																																																		}
																																																	}
																																																	else {
																																																		$handler2 = costumerNR();
																																																		fwrite($handler2, $data);
																																																		fclose($handler2);

																																																		$tschannel .= 'Sorry! Server ist derzeit Offline!';
																																																		$tsData = array();
																																																		$serverInfo = costumerNR();
																																																		$tsData['server'] = $serverInfo['data'];
																																																		$hostInfo = costumerNR();
																																																		$tsData['hostInfo'] = $hostInfo['data'];
																																																		$tsData['server']['virtualserver_icon_id'] = sprintf('%u', $tsData['server']['virtualserver_icon_id'] & 4294967295);
																																																		$channelList = costumerNR();
																																																		$tsData['channel'] = $channelList['data'];
																																																		$clientList = costumerNR();
																																																		$tsData['clients'] = $clientList['data'];
																																																		$serverGroupList = costumerNR();
																																																		$tsData['sgroups'] = $serverGroupList['data'];

																																																		$channelGroupList = costumerNR();

																																																		$tsData['cgroups'] = $channelGroupList['data'];
																																																		$ftList = costumerNR();
																																																		$tsData['ftList'] = $ftList['data'];
																																																		$tschannel = '';
																																																		$tschannel .= '';
																																																		$baumwert = 4326;
																																																		$icon_abstant = '<div style="width:16px;float:left;"></div>';
																																																		$i = 4310;

																																																		if ($i < count($tsData['sgroups'])) {
																																																			$segroup_mapping[$tsData['sgroups'][$i]['sgid']][] = $i;
																																																			++$i;
																																																			$i = 4310;

																																																			if ($i < count($tsData['clients'])) {
																																																				$user_mapping[$tsData['clients'][$i]['cid']][] = $i;
																																																				++$i;
																																																				$i = 4310;

																																																				if ($i < count($tsData['cgroups'])) {
																																																					$chgroup_mapping[$tsData['cgroups'][$i]['cgid']][] = $i;
																																																					++$i;

																																																					$channel = costumerNR();

																																																					if ($channel['channel_flag_password'] == 1) {
																																																						$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/password.png" width="16" height="16" /></div>';

																																																						if ($channel['channel_flag_default'] == 1) {
																																																							$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/default.png" width="16" height="16" /></div>';

																																																							if (0 < $channel['channel_needed_talk_power']) {
																																																								$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/moderated.png" width="16" height="16" /></div>';

																																																								$channel_art = '';

																																																								if ($channel['pid'] != 0) {
																																																									if (!array_key_exists($channel['pid'], $ch_stufe)) {
																																																										$baumwert = $baumwert + 16;
																																																										$ch_stufe[$channel['pid']] = $baumwert;

																																																										$baumwert = 4326;
																																																										$ch_stufe[$channel['pid']] = 16;
																																																										$tschannel .= '<div class="ts3_onh" style="margin-left:' . $ch_stufe[$channel['pid']] . 'px;">';

																																																										if (preg_match('^\\[(.*)spacer([\\w\\p{L}\\d]+)?\\]^u', $channel['channel_name'], $treffer)) {
																																																											if ($channel['pid'] == 0) {
																																																												if ($channel['channel_flag_permanent'] == 1) {
																																																													$getspacer = costumerNR();

																																																													$checkspacer = $getspacer[1][0] . $getspacer[1][0] . $getspacer[1][0];

																																																													if ($treffer[1] == '*') {
																																																														if (strlen($getspacer[1]) == 3) {
																																																															if ($checkspacer == $getspacer[1]) {
																																																																$spacer = '';
																																																																$i = 4310;

																																																																if ($i <= 60) {
																																																																	if (strlen($spacer) < 60) {
																																																																		$spacer .= costumerNR();

																																																																		break;
																																																																		++$i;
																																																																		$tschannel .= '<div class="ts3_server_name">' . htmlspecialchars($spacer) . '</div>' . $icon_abstant . '';

																																																																		if ($treffer[1] == 'c') {
																																																																			$spacer = costumerNR();
																																																																			$tschannel .= '<div class="ts3_server_u_icon"></div>';
																																																																			$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																																																																			if ($treffer[1] == 'r') {
																																																																				$spacer = costumerNR();
																																																																				$tschannel .= '<div class="ts3_server_u_icon"></div>';

																																																																				$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:right">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																																																																				$spacer = costumerNR();
																																																																				$tschannel .= '<div class="ts3_server_u_icon"></div>';

																																																																				$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:left">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																																																																				if ($channel['channel_flag_password'] == 1) {
																																																																					$tschannel .= '<div style="margin-right:5px; width:16px; float:left;"><img src="../cache/ts3_icon/default/pwchannel.png" width="16" height="16" /></div>';

																																																																					$tschannel .= '<div style="margin-right:5px;  width:16px; float:left;"><img src="../cache/ts3_icon/default/channel.png" width="16" height="16" /></div>';

																																																																					if ($channel['channel_icon_id'] == 0) {
																																																																						$tschannel .= '<div class="ts3_server_u_icon"></div>' . $channel_art . '';

																																																																						if (0 < $channel['channel_icon_id']) {
																																																																							if ($channel['channel_icon_id'] != 100) {
																																																																								if ($channel['channel_icon_id'] != 300) {
																																																																									if ($channel['channel_icon_id'] != 500) {
																																																																										if ($channel['channel_icon_id'] != 600) {
																																																																											$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art . '';

																																																																											$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art . '';
																																																																											$tschannel .= '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
																																																																											$tschannel .= '<div class="ts3_clear"></div>';
																																																																											$tschannel .= '</div></a>';

																																																																											if (isset($user_mapping[$channel['cid']])) {
																																																																												$userid = costumerNR();
																																																																												$key = costumerNR();
																																																																												$user_data[] = $tsData['clients'][$userid];

																																																																												$user_st = $ch_stufe[$channel['pid']] + 16;

																																																																												$userid = costumerNR();
																																																																												$key = costumerNR();
																																																																												$user_data = costumerNR();
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
																																																																																					$group = costumerNR();
																																																																																					$i = 4310;

																																																																																					if ($i < count()) {
																																																																																						$sgrid = costumerNR();
																																																																																						$key = costumerNR();
																																																																																						$sgroup = costumerNR();

																																																																																						if ($sgroup['namemode'] == 1) {
																																																																																							$showgroupFront .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
																																																																																							$showgroupBehind .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
																																																																																							++$i;

																																																																																							$showgroupFront = '';
																																																																																							$showgroupBehind = '';
																																																																																							$tschannel .= '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant . '';

																																																																																							if ($user_data['client_icon_id'] != 0) {
																																																																																								if ($user_data['client_icon_id'] == 100) {
																																																																																									if ($user_data['client_icon_id'] == 200) {
																																																																																										if ($user_data['client_icon_id'] == 300) {
																																																																																											if ($user_data['client_icon_id'] == 500) {
																																																																																												if ($user_data['client_icon_id'] == 600) {
																																																																																													$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';

																																																																																													$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';

																																																																																													if ($user_data['client_servergroups'] != 0) {
																																																																																														$group = costumerNR();
																																																																																														$group = costumerNR();

																																																																																														$i = 4310;

																																																																																														if ($i < count($group)) {
																																																																																															$sgrid = costumerNR();
																																																																																															$key = costumerNR();
																																																																																															$sgroup = costumerNR();

																																																																																															if ($sgroup['iconid'] == 100) {
																																																																																																if ($sgroup['iconid'] == 200) {
																																																																																																	if ($sgroup['iconid'] == 300) {
																																																																																																		if ($sgroup['iconid'] == 500) {
																																																																																																			if ($sgroup['iconid'] == 600) {
																																																																																																				$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																																																																				$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																																																																				++$i;

																																																																																																				$grid = costumerNR();
																																																																																																				$key = costumerNR();
																																																																																																				$chgroup = costumerNR();

																																																																																																				if ($chgroup['iconid'] == 100) {
																																																																																																					if ($chgroup['iconid'] == 200) {
																																																																																																						if (costumerNR() == 300) {
																																																																																																							if ($chgroup['iconid'] == 500) {
																																																																																																								if ($chgroup['iconid'] == 600) {
																																																																																																									$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																																																																									$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																																																																									$tschannel .= '<div class="ts3_clear"></div>';
																																																																																																									$tschannel .= '</div>';
																																																																																																									$abc = $s_port . '-icon_' . $tsData['server']['virtualserver_icon_id'] . '.png';
																																																																																																									$dfg = costumerNR();
																																																																																																									$serverinfo = costumerNR();
																																																																																																									$serverinfo['virtualserver_id'] = $serverinfo['virtualserver_id'];
																																																																																																									$serverinfo['virtualserver_unique_identifier'] = $serverinfo['virtualserver_unique_identifier'];
																																																																																																									$serverinfo['virtualserver_welcomemessage'] = $serverinfo['virtualserver_welcomemessage'];
																																																																																																									$serverinfo['virtualserver_platform'] = $serverinfo['virtualserver_platform'];
																																																																																																									$serverinfo['virtualserver_version'] = $serverinfo['virtualserver_version'];
																																																																																																									$serverinfo['virtualserver_maxclients'] = $serverinfo['virtualserver_maxclients'];

																																																																																																									if ($serverinfo['virtualserver_password'] == 'pzLzBRRKd/OtByV+Wsc4lcq55LE=') {
																																																																																																										$serverinfo['virtualserver_password'] = 'Nein';

																																																																																																										$serverinfo['virtualserver_password'] = 'Ja';
																																																																																																										$serverinfo['virtualserver_created'] = $serverinfo['virtualserver_created'];
																																																																																																										$days = ' Tage';
																																																																																																										$hours = ' Stunden';
																																																																																																										$minutes = ' Minuten';
																																																																																																										$seconds = ' Sekunden';
																																																																																																										$conv_time = costumerNR();
																																																																																																										$serverinfo['virtualserver_uptime'] = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ' . $conv_time['seconds'] . $seconds;
																																																																																																										$serverinfo['virtualserver_clientsonline'] = $serverinfo['virtualserver_clientsonline'];
																																																																																																										$serverinfo['virtualserver_channelsonline'] = $serverinfo['virtualserver_channelsonline'];
																																																																																																										$serverinfo['virtualserver_name'] = $serverinfo['virtualserver_name'];
																																																																																																										$serverinfo['virtualserver_ip'] = $serverinfo['virtualserver_ip'];
																																																																																																										$serverinfo['virtualserver_port'] = $serverinfo['virtualserver_port'];
																																																																																																										$serverinfo['virtualserver_hostbanner_gfx_url'] = $serverinfo['virtualserver_hostbanner_gfx_url'];
																																																																																																										$scp->setName('Serverinhaber');
																																																																																																										$clients = costumerNR();

																																																																																																										if ($myADM['serverPort'] == true) {
																																																																																																											if (!empty($clients['data'])) {
																																																																																																												$x = 4310;

																																																																																																												$client = costumerNR();

																																																																																																												if ($client['client_type'] != 1) {
																																																																																																													if ($x % 2) {
																																																																																																														$clientlist[$x]['color'] = $color = '#FFFFFF';
																																																																																																														$clientlist[$x]['client_id'] = $client['client_database_id'] - 1;
																																																																																																														$clientlist[$x]['client_nickname'] = $client['client_nickname'];
																																																																																																														$clientlist[$x]['clid'] = $client['clid'];

																																																																																																														$clientst = costumerNR();
																																																																																																														$clientst = costumerNR();

																																																																																																														++$x;
																																																																																																														$smarty->assign('clientlist', $clientlist);

																																																																																																														if (isset($_POST['kick_all'])) {
																																																																																																															$clientlist = costumerNR();

																																																																																																															if ($clientlist['success'] != false) {
																																																																																																																if (!empty($clientlist)) {
																																																																																																																	$value = costumerNR();
																																																																																																																	$key = costumerNR();

																																																																																																																	if ($value['client_type'] != 1) {
																																																																																																																		$scp->clientKick($value['clid'], 'server', $_POST['grund']);
																																																																																																																		$msg = '<div class=\'alert alert-success\'>Alle User wurde erfolgreich vom Server gekickt!</div>';
																																																																																																																		$msg = '<div class=\'alert alert-error\'>Keine User zum kicken vorhanden!</div>';

																																																																																																																		if (isset($_POST['ban_x'])) {
																																																																																																																			if ($_POST['user_b']) {
																																																																																																																				if ($_POST['time_b']) {
																																																																																																																					if ($_POST['grund_b']) {
																																																																																																																						$scp->BanAddByName($_POST['user_b'], $_POST['time_b'], 'Webinterface Aktion');
																																																																																																																						$msg = '<div class=\'success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																						$msg = '<div class=\'error\'>Bann nicht erfolgreich</div>';

																																																																																																																						if (isset($_POST['kick_user_y'])) {
																																																																																																																							if ($_POST['kick_user_y']) {
																																																																																																																								if ($_POST['cliendid']) {
																																																																																																																									$clid = costumerNR();
																																																																																																																									$scp->clientKick($clid, 'server', 'Webinterface Aktion');
																																																																																																																									$msg = '<span style=\'color:green\'><b>User wurde erfolgreich vom Server gekickt!</span>';

																																																																																																																									$msg = '<span style=\'color:red\'><b>Es wurde kein User ausgewählt!</span>';

																																																																																																																									if (isset($_POST['poke_user_y'])) {
																																																																																																																										if ($_POST['poke_user_y']) {
																																																																																																																											if ($_POST['cliendid']) {
																																																																																																																												$clid = costumerNR();
																																																																																																																												$scp->clientPoke($clid, 'Webinterface Aktion');
																																																																																																																												$msg = '<span style=\'color:green\'><b>User wurde erfolgreich eingesperrt!</span><meta http-equiv=\'refresh\' content=\'1; url=index.php?site=serverViewer\'> ';

																																																																																																																												$msg = '<span style=\'color:red\'><b>Es wurde kein User ausgewählt!</span>';

																																																																																																																												if (isset($_POST['msg_senden'])) {
																																																																																																																													if ($_POST['message']) {
																																																																																																																														$_POST['message'] = str_replace('\\', '\\\\', $_POST['message']);
																																																																																																																														$_POST['sid'] = '';
																																																																																																																														$scp->sendMessage('3', $_POST['sid'], $_POST['message']);
																																																																																																																														$msg = '<div class=\'alert alert-success\'>Die Mitteiling wurde erfolgreich übermittelt!</div>';

																																																																																																																														$msg = '<div class=\'alert alert-error\'>ERROR: Es wurde keine nachricht eingegeben!</div>';
																																																																																																																														$smarty->assign('clientlist', $clientlist);
																																																																																																																														$smarty->assign('abc', $abc);
																																																																																																																														$smarty->assign('serverinfo', $serverinfo);
																																																																																																																														$smarty->assign('dfg', $dfg);
																																																																																																																														$smarty->assign('tsviewer', $tschannel);

																																																																																																																														if (isset($_GET['staff'])) {
																																																																																																																															switch ($_GET['staff']) {
																																																																																																																															case 'serverEdit':
																																																																																																																																$result = costumerNR();
																																																																																																																																error_reporting(30719);

																																																																																																																																if ($row = costumerNR()) {
																																																																																																																																	$myADM['serverID'] = $row['serverID'];
																																																																																																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																	$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																	$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																	$result2 = costumerNR();
																																																																																																																																	error_reporting(30719);
																																																																																																																																	$myADM['hostID'] = $row2['hostID'];
																																																																																																																																	$myADM['hostName'] = $row2['hostName'];
																																																																																																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																	$PSession = array();
																																																																																																																																	$PSession['id'] = $_GET['id'];
																																																																																																																																	$PSession['staff'] = $_GET['staff'];
																																																																																																																																	$scp = costumerNR();

																																																																																																																																	if ($scp->getElement('success', $scp->connect())) {
																																																																																																																																		$connect = costumerNR();
																																																																																																																																		$select = costumerNR();
																																																																																																																																		$tt = costumerNR();
																																																																																																																																		$scp->setName('Admin');

																																																																																																																																		if (isset($_POST['serveredit'])) {
																																																																																																																																			$server_edit['data'] = $scp->serverEdit($_POST['newsettings']);

																																																																																																																																			if ($_POST['newsettings']['virtualserver_max_upload_total_bandwidth'] == '-1 / unlimited') {
																																																																																																																																				$msg = '<div class=\'alert alert-success\'><b>Erfolgreich gespeichert</b></div>';
																																																																																																																																				$serverinfo = costumerNR();
																																																																																																																																				$serverinfo['virtualserver_id'] = $serverinfo['virtualserver_id'];
																																																																																																																																				$serverinfo['virtualserver_unique_identifier'] = $serverinfo['virtualserver_unique_identifier'];
																																																																																																																																				$serverinfo['virtualserver_welcomemessage'] = $serverinfo['virtualserver_welcomemessage'];
																																																																																																																																				$serverinfo['virtualserver_platform'] = $serverinfo['virtualserver_platform'];
																																																																																																																																				$serverinfo['virtualserver_version'] = $serverinfo['virtualserver_version'];
																																																																																																																																				$serverinfo['virtualserver_maxclients'] = $serverinfo['virtualserver_maxclients'];
																																																																																																																																				$serverinfo['weblist_enabled'] = $serverinfo['virtualserver_weblist_enabled'];

																																																																																																																																				if ($serverinfo['virtualserver_max_upload_total_bandwidth'] == 1.8446744073709552E+19) {
																																																																																																																																					if ($serverinfo['virtualserver_upload_quota'] == 1.8446744073709552E+19) {
																																																																																																																																						if ($serverinfo['virtualserver_max_download_total_bandwidth'] == '18446744073709551615') {
																																																																																																																																							if ($serverinfo['virtualserver_download_quota'] == 1.8446744073709552E+19) {
																																																																																																																																								if ($serverinfo['virtualserver_password'] == '0') {
																																																																																																																																									$serverinfo['password'] = 'Nein';

																																																																																																																																									$serverinfo['password'] = 'Ja';
																																																																																																																																									$serverinfo['virtualserver_created'] = $serverinfo['virtualserver_created'];
																																																																																																																																									$days = ' Tage';
																																																																																																																																									$hours = ' Stunden';
																																																																																																																																									$minutes = ' Minuten';
																																																																																																																																									$seconds = ' Sekunden';
																																																																																																																																									$conv_time = costumerNR();
																																																																																																																																									$serverinfo['virtualserver_uptime'] = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ' . $conv_time['seconds'] . $seconds;
																																																																																																																																									$serverinfo['virtualserver_clientsonline'] = $serverinfo['virtualserver_clientsonline'];
																																																																																																																																									$serverinfo['virtualserver_channelsonline'] = $serverinfo['virtualserver_channelsonline'];
																																																																																																																																									$serverinfo['virtualserver_name'] = $serverinfo['virtualserver_name'];
																																																																																																																																									$serverinfo['virtualserver_ip'] = $serverinfo['virtualserver_ip'];
																																																																																																																																									$serverinfo['virtualserver_port'] = $serverinfo['virtualserver_port'];
																																																																																																																																									$serverinfo['virtualserver_hostbanner_gfx_url'] = $serverinfo['virtualserver_hostbanner_gfx_url'];

																																																																																																																																									if (isset($serverinfo)) {
																																																																																																																																										$smarty->assign('serverinfo', $serverinfo);
																																																																																																																																										$smarty->assign('msg', $msg);
																																																																																																																																										$smarty->display('customer/serveredit_adm.tpl');
																																																																																																																																										exit();
																																																																																																																																										break;

																																																																																																																																										switch ($_GET['staff']) {
																																																																																																																																										case 'serverTraffic':
																																																																																																																																											$result = costumerNR();
																																																																																																																																											error_reporting(30719);

																																																																																																																																											if ($row = costumerNR()) {
																																																																																																																																												$myADM['serverID'] = $row['serverID'];
																																																																																																																																												$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																												$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																												$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																												$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																												$result2 = ($_SESSION['MyID']);
																																																																																																																																												error_reporting(30719);
																																																																																																																																												$myADM['hostID'] = $row2['hostID'];
																																																																																																																																												$myADM['hostName'] = $row2['hostName'];
																																																																																																																																												$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																												$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																												$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																												$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																												$PSession = array();
																																																																																																																																												$PSession['id'] = $_GET['id'];
																																																																																																																																												$PSession['staff'] = $_GET['staff'];
																																																																																																																																												$scp = costumerNR();

																																																																																																																																												if ($scp->getElement('success', $scp->connect())) {
																																																																																																																																													function conv_traffic($bytes)
																																																																																																																																													{
																																																																																																																																														if ($bytes < 1024) {
																																																																																																																																														}

																																																																																																																																														$ret = $bytes . '';

																																																																																																																																														if ($bytes < 1048576) {
																																																																																																																																															$ret = $bytes < 1024;

																																																																																																																																															if ($bytes < 1073741824) {
																																																																																																																																															}
																																																																																																																																														}
																																																																																																																																														else {
																																																																																																																																															$ret = $bytes / 1024;
																																																																																																																																														}

																																																																																																																																														if ($bytes < 1099511627776) {
																																																																																																																																														}

																																																																																																																																														$ret = $bytes / 1048576;
																																																																																																																																														return $ret;
																																																																																																																																													}
																																																																																																																																													function convert_traffic($bytes)
																																																																																																																																													{
																																																																																																																																														if ($bytes < 1024) {
																																																																																																																																															$ret = $bytes . ' Bytes';

																																																																																																																																															if ($bytes < 1048576) {
																																																																																																																																															}

																																																																																																																																															$ret = round($bytes / 1024, 2) . ' KB';

																																																																																																																																															if ($bytes < 1073741824) {
																																																																																																																																																$ret = round($bytes / 1048576, 2) . ' MB';

																																																																																																																																																if ($bytes < 1099511627776) {
																																																																																																																																																}

																																																																																																																																															}
																																																																																																																																														}
																																																																																																																																														else {
																																																																																																																																														}

																																																																																																																																														$ret = round($bytes / 1073741824, 2) . ' GB';
																																																																																																																																														return $ret;
																																																																																																																																													}
																																																																																																																																													$connect = mysql_escape_string($_POST['verlaufID']);
																																																																																																																																													$select = mysql_escape_string($_POST['verlaufApteilID']);
																																																																																																																																													$kb = 'KB';

																																																																																																																																													if ($select) {
																																																																																																																																														$x = 4310;

																																																																																																																																														if ($x % 2) {
																																																																																																																																															$traffic[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																															++$x;
																																																																																																																																															$traffic['connection_packets_received_total'] = conv_traffic($serverinfo['connection_packets_received_total']);
																																																																																																																																															$traffic['connection_bytes_received_total'] = conv_traffic($serverinfo['connection_bytes_received_total']);
																																																																																																																																															$traffic['connection_bandwidth_received_last_second_total'] = conv_traffic($serverinfo['connection_bandwidth_received_last_second_total']);
																																																																																																																																															$traffic['connection_bandwidth_received_last_minute_total'] = conv_traffic($serverinfo['connection_bandwidth_received_last_minute_total']);
																																																																																																																																															$traffic['connection_filetransfer_bandwidth_received'] = conv_traffic($serverinfo['connection_filetransfer_bandwidth_received']);
																																																																																																																																															$traffic['connection_packets_sent_total'] = conv_traffic($serverinfo['connection_packets_sent_total']);
																																																																																																																																															$traffic['connection_bytes_sent_total'] = conv_traffic($serverinfo['connection_bytes_sent_total']);
																																																																																																																																															$traffic['connection_bandwidth_sent_last_second_total'] = conv_traffic($serverinfo['connection_bandwidth_sent_last_second_total']);
																																																																																																																																															$traffic['connection_bandwidth_sent_last_minute_total'] = conv_traffic($serverinfo['connection_bandwidth_sent_last_minute_total']);
																																																																																																																																															$traffic['connection_filetransfer_bandwidth_sent'] = conv_traffic($serverinfo['connection_filetransfer_bandwidth_sent']);
																																																																																																																																															$traffic['packets_received_total'] = convert_traffic($serverinfo['connection_packets_received_total']);
																																																																																																																																															$traffic['bytes_received_total'] = convert_traffic($serverinfo['connection_bytes_received_total']);
																																																																																																																																															$traffic['bandwidth_received_last_second_total'] = convert_traffic($serverinfo['connection_bandwidth_received_last_second_total']);
																																																																																																																																															$traffic['bandwidth_received_last_minute_total'] = convert_traffic($serverinfo['connection_bandwidth_received_last_minute_total']);
																																																																																																																																															$traffic['filetransfer_bandwidth_received'] = convert_traffic($serverinfo['connection_filetransfer_bandwidth_received']);
																																																																																																																																															$traffic['packets_sent_total'] = convert_traffic($serverinfo['connection_packets_sent_total']);
																																																																																																																																															$traffic['bytes_sent_total'] = convert_traffic($serverinfo['connection_bytes_sent_total']);
																																																																																																																																															$traffic['bandwidth_sent_last_second_total'] = convert_traffic($serverinfo['connection_bandwidth_sent_last_second_total']);
																																																																																																																																															$traffic['bandwidth_sent_last_minute_total'] = convert_traffic($serverinfo['connection_bandwidth_sent_last_minute_total']);
																																																																																																																																															$traffic['filetransfer_bandwidth_sent'] = convert_traffic($serverinfo['connection_filetransfer_bandwidth_sent']);

																																																																																																																																															if (isset($traffic)) {
																																																																																																																																																$smarty->assign('traffic', $traffic);
																																																																																																																																																$smarty->assign('msg', $msg);
																																																																																																																																																$smarty->display('customer/serverTraffic.tpl');
																																																																																																																																																exit();
																																																																																																																																																break;

																																																																																																																																																switch ($_GET['staff']) {
																																																																																																																																																case 'userListe':
																																																																																																																																																	$result = costumerNR();
																																																																																																																																																	error_reporting(30719);

																																																																																																																																																	if ($row = '\' ORDER BY verlaufData DESC LIMIT ' . $start . ', ' . $proseite) {
																																																																																																																																																		$myADM['serverID'] = $row['serverID'];
																																																																																																																																																		$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																		$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																		$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																		$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																		$result2 = $myTicketDetailAnswere[$x]['verlaufUserNumber'];
																																																																																																																																																		error_reporting(30719);
																																																																																																																																																		$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																		$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																		$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																		$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																		$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																		$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																		$PSession = array();
																																																																																																																																																		$PSession['id'] = $_GET['id'];
																																																																																																																																																		$PSession['staff'] = $_GET['staff'];
																																																																																																																																																		$scp = ($_POST['ticketBetreff']);

																																																																																																																																																		if ($scp->getElement('success', $scp->connect())) {
																																																																																																																																																			$connect = mysql_escape_string($MyData['userName']);
																																																																																																																																																			$select = costumerNR();

																																																																																																																																																			if (isset($_GET['action']) == 'loeschen') {
																																																																																																																																																				if (isset($_GET['userid']) != '') {
																																																																																																																																																					$cuserid = (mysql_escape_string($_POST['ticketText']));
																																																																																																																																																					$userloeschen = ($_POST['ticketPrio']);
																																																																																																																																																					$msg = '<div class="alert alert-success">User wurde erfolgreich gelöscht</div>';
																																																																																																																																																					$userlist = mysql_escape_string($_POST['ticketStatus']);

																																																																																																																																																					$list = mysql_query( . 'INSERT INTO cms_tickets (ticketApteilID, ticketProductID, ticketUserNumber, ticketUserName, ticketUserEmail, ticketBetreff, ticketText, ticketData, prioritaet, ticketStatus) VALUES (\'1\',\'' . $ticketProductID . '\',\'' . $ticketUserNumber . '\',\'' . $ticketUserName . '\',\'' . $ticketUserEmail . '\',\'' . $ticketBetreff . '\',\'' . $ticketText . '\',\'' . $ticketData . '\',\'' . $prioritaet . '\',\'0\')');
																																																																																																																																																					$userlist['clid'] = $list['clid'];
																																																																																																																																																					$userlist['cid'] = $list['cid'];

																																																																																																																																																					$userliste = 'Der Kunde [' . $ticketUserName . '] erstellte am ' . date('d.m.Y / H:i:s', time());
																																																																																																																																																					$x = 4310;

																																																																																																																																																					$user = costumerNR();

																																																																																																																																																					if ($x % 2) {
																																																																																																																																																						$listdbuser[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																						$listdbuser[$x]['cldbid'] = $user['cldbid'];
																																																																																																																																																						$cldbid[$x]['cldbid'] = $user['cldbid'];
																																																																																																																																																						$listdbuser[$x]['client_unique_identifier'] = $user['client_unique_identifier'];
																																																																																																																																																						$listdbuser[$x]['client_nickname'] = $user['client_nickname'];
																																																																																																																																																						$listdbuser[$x]['client_created'] = $user['client_created'];
																																																																																																																																																						$listdbuser[$x]['client_lastconnected'] = $user['client_lastconnected'];

																																																																																																																																																						if ($listdbuser[$x]['client'] = (time() - (60 * 60)) <= $user['client_lastconnected']) {
																																																																																																																																																							$listdbuser[$x]['status'] = '<img src="resurces/img/online.png" alt="Details"  title="ID" />';

																																																																																																																																																							$listdbuser[$x]['status'] = '<img src="resurces/img/offline.png" alt="Details"  title="ID" />';
																																																																																																																																																							++$x;
																																																																																																																																																							$userlistinfo = costumerNR();
																																																																																																																																																							$x = 4310;

																																																																																																																																																							$user = costumerNR();
																																																																																																																																																							$listdbuser[$x]['clid'] = $user['clid'];
																																																																																																																																																							++$x;

																																																																																																																																																							if (isset($listdbuser)) {
																																																																																																																																																								$smarty->assign('listdbuser', $listdbuser);
																																																																																																																																																								$smarty->assign('msg', $msg);
																																																																																																																																																								$smarty->display('customer/userListe.tpl');
																																																																																																																																																								exit();
																																																																																																																																																								break;

																																																																																																																																																								switch ($_GET['staff']) {
																																																																																																																																																								case 'beschwerdeListe':
																																																																																																																																																									$result = costumerNR();
																																																																																																																																																									(30719);

																																																																																																																																																									if ($row = costumerNR()) {
																																																																																																																																																										$myADM['serverID'] = $row['serverID'];
																																																																																																																																																										$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																										$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																										$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																										$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																										error_reporting(30719);
																																																																																																																																																										$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																										$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																										$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																										$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																										$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																										$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																										$PSession = array();
																																																																																																																																																										$PSession['id'] = $_GET['id'];
																																																																																																																																																										$PSession['staff'] = $_GET['staff'];
																																																																																																																																																										$scp = costumerNR();

																																																																																																																																																										if ($scp->getElement('success', $scp->connect())) {
																																																																																																																																																											$connect = costumerNR();
																																																																																																																																																											$select = costumerNR();
																																																																																																																																																											$complainlist = costumerNR();

																																																																																																																																																											if (!empty($complainlist)) {
																																																																																																																																																												$x = 4310;

																																																																																																																																																												$since = ($_GET['id']);
																																																																																																																																																												$x = costumerNR();
																																																																																																																																																												$newcomplainlist[$x]['tcldbid'] = $since['tcldbid'];
																																																																																																																																																												$newcomplainlist[$x]['tname'] = $since['tname'];
																																																																																																																																																												$newcomplainlist[$x]['fcldbid'] = $since['fcldbid'];
																																																																																																																																																												$newcomplainlist[$x]['fname'] = $since['fname'];
																																																																																																																																																												$newcomplainlist[$x]['message'] = $since['message'];
																																																																																																																																																												$newcomplainlist[$x]['timestamp'] = $since['timestamp'];
																																																																																																																																																												++$x;

																																																																																																																																																												$msg = '<div class="alert alert-warning">Derzeit sind keine Berschwerden vorhanden!</div>';
																																																																																																																																																												$smarty->assign('newcomplainlist', isset($newcomplainlist));
																																																																																																																																																												$smarty->assign('msg', $msg);
																																																																																																																																																												$smarty->display('customer/beschwerdeListe.tpl');
																																																																																																																																																												exit();
																																																																																																																																																												break;

																																																																																																																																																												switch ($_GET['staff']) {
																																																																																																																																																												case 'banListe':
																																																																																																																																																													$result = costumerNR();
																																																																																																																																																													error_reporting(30719);

																																																																																																																																																													if ($row = $row2['hostUsername']) {
																																																																																																																																																														$myADM['serverID'] = $row['serverID'];
																																																																																																																																																														$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																														$myADM['serverSid'] = $row['serverSid'];

																																																																																																																																																														$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																														$myADM['serverPort'] = $row['serverPort'];

																																																																																																																																																														$result2 = opendir($iconDir);
																																																																																																																																																														error_reporting(30719);
																																																																																																																																																														$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																														$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																														$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																														$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																														$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																														$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																														$PSession = array();
																																																																																																																																																														$PSession['id'] = $_GET['id'];

																																																																																																																																																														$PSession['staff'] = $_GET['staff'];
																																																																																																																																																														$scp = costumerNR();

																																																																																																																																																														if ($scp->getElement('success', $scp->connect())) {
																																																																																																																																																															$connect = $s_port . '-';
																																																																																																																																																															$select = !in_array($s_port . '-' . $file['name'], $icon_arr);
																																																																																																																																																															$scp->setName('Administrator');

																																																																																																																																																															if (isset($_GET['opt'])) {
																																																																																																																																																																if ($_GET['opt'] == 'del') {
																																																																																																																																																																	if ($_GET['banid'] != '') {
																																																																																																																																																																		$scp->banDelete($banID);
																																																																																																																																																																		$msg = '<div class=\'alert alert-success\'>Ban wurde erfolgreich gelöscht!</div>';

																																																																																																																																																																		$msg = '<div class=\'alert alert-error\'>Error</div>';

																																																																																																																																																																		if (isset($_POST['bandelall'])) {
																																																																																																																																																																			if ($_POST['all'] == true) {
																																																																																																																																																																				$scp->banDeleteAll();
																																																																																																																																																																				$msg = '<div class=\'alert alert-success\'>Bans wurden erfolgreich gelöscht!</div>';

																																																																																																																																																																				$msg = '<div class=\'alert alert-error\'>Error</div>';

																																																																																																																																																																				if (isset($_POST['ban_add'])) {
																																																																																																																																																																					if ($_POST['ip']) {
																																																																																																																																																																						if ($_POST['time']) {
																																																																																																																																																																							if ($_POST['grund']) {
																																																																																																																																																																								$scp->BanAddByIp($_POST['ip'], $_POST['time'], $_POST['grund']);
																																																																																																																																																																								$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																																								if ($_POST['uid']) {
																																																																																																																																																																									if ($_POST['time']) {
																																																																																																																																																																										if ($_POST['grund']) {
																																																																																																																																																																											$scp->BanAddByUid($_POST['ip'], $_POST['time'], $_POST['grund']);
																																																																																																																																																																											$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																																											if ($_POST['user']) {
																																																																																																																																																																												if ($_POST['time']) {
																																																																																																																																																																													if ($_POST['grund']) {
																																																																																																																																																																														$scp->BanAddByName($_POST['user'], $_POST['time'], $_POST['grund']);
																																																																																																																																																																														$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																																														$msg = '<div class=\'alert alert-error\'>Nicht alle Felder ausgefüllt</div>';
																																																																																																																																																																														$banliste = '';
																																																																																																																																																																														$nobans = '';
																																																																																																																																																																														$banlist = costumerNR();

																																																																																																																																																																														if (!empty($banlist)) {
																																																																																																																																																																															$x = 4310;

																																																																																																																																																																															$ban = $i < count($tsData['sgroups']);
																																																																																																																																																																															$banliste[$x]['banid'] = $ban['banid'];
																																																																																																																																																																															$banliste[$x]['ip'] = $ban['ip'];
																																																																																																																																																																															$banliste[$x]['name'] = $ban['name'];
																																																																																																																																																																															$banliste[$x]['uid'] = $ban['uid'];
																																																																																																																																																																															$banliste[$x]['created'] = date('d.m.Y', $ban['created']);
																																																																																																																																																																															$banliste[$x]['duration'] = sec2time($ban['duration']);

																																																																																																																																																																															if ($banliste[$x]['duration'] == 0) {
																																																																																																																																																																																$banliste[$x]['duration'] = 'Permanent';

																																																																																																																																																																																$banliste[$x]['duration'] = sec2time($ban['duration']);
																																																																																																																																																																																$banliste[$x]['invokername'] = $ban['invokername'];
																																																																																																																																																																																$banliste[$x]['invokercldbid'] = $ban['invokercldbid'];
																																																																																																																																																																																$banliste[$x]['invokeruid'] = $ban['invokeruid'];
																																																																																																																																																																																$banliste[$x]['reason'] = $ban['reason'];
																																																																																																																																																																																++$x;

																																																																																																																																																																																$msg = '<div class="alert alert-warning">Derzeit sind keine Banns vorhanden!</div>';

																																																																																																																																																																																if (isset($banliste)) {
																																																																																																																																																																																	$smarty->assign('banliste', $banliste);
																																																																																																																																																																																	$smarty->assign('nobans', $nobans);
																																																																																																																																																																																	$smarty->assign('msg', $msg);
																																																																																																																																																																																	$smarty->display('customer/banListe.tpl');
																																																																																																																																																																																	exit();
																																																																																																																																																																																	break;

																																																																																																																																																																																	switch ($_GET['staff']) {
																																																																																																																																																																																	case 'groups':
																																																																																																																																																																																		error_reporting(30719);

																																																																																																																																																																																		if ($row = $getspacer[1][0]) {
																																																																																																																																																																																			$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																			$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																			$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																			$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																			$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																			$result2 = $getspacer[1];
																																																																																																																																																																																			error_reporting(30719);
																																																																																																																																																																																			$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																			$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																			$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																			$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																			$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																			$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																			$PSession = array();
																																																																																																																																																																																			$PSession['id'] = $_GET['id'];
																																																																																																																																																																																			$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																																			$scp = costumerNR();

																																																																																																																																																																																			if ($scp->getElement('success', $scp->connect())) {
																																																																																																																																																																																				$connect = costumerNR();
																																																																																																																																																																																				$select = costumerNR();
																																																																																																																																																																																				$scp->setName('Administrator');
																																																																																																																																																																																				$cgid = '';
																																																																																																																																																																																				$sgid = '';

																																																																																																																																																																																				if (isset($_GET['sgid'])) {
																																																																																																																																																																																					$sgid = $channel['channel_icon_id'] != 100;

																																																																																																																																																																																					if (isset($_GET['cgid'])) {
																																																																																																																																																																																						$cgid = $channel['channel_icon_id'];

																																																																																																																																																																																						if (isset($_GET['action']) == 'loeschen') {
																																																																																																																																																																																							if ($_GET['sgid']) {
																																																																																																																																																																																								$force = 4311;
																																																																																																																																																																																								$sgruppe_del = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art;
																																																																																																																																																																																								$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich gelöscht.</div>';

																																																																																																																																																																																								if (isset($_GET['action']) == 'loeschen') {
																																																																																																																																																																																									if (isset($_GET['cgid'])) {
																																																																																																																																																																																										$force = 4311;
																																																																																																																																																																																										$sgruppe_del = costumerNR();
																																																																																																																																																																																										$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich gelöscht.</div>';

																																																																																																																																																																																										if (isset($_POST['groupadd'])) {
																																																																																																																																																																																											if ($_POST['groupadd']) {
																																																																																																																																																																																												if ($_POST['group_name']) {
																																																																																																																																																																																													if ($_POST['grouptype']) {
																																																																																																																																																																																														if ($_POST['groupplan'] == 0) {
																																																																																																																																																																																															$sgname = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ';
																																																																																																																																																																																															$stype = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']);
																																																																																																																																																																																															$sgruppe_add = htmlspecialchars($channel['channel_maxfamilyclients']);
																																																																																																																																																																																															$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';

																																																																																																																																																																																															if ($_POST['groupadd']) {
																																																																																																																																																																																																if ($_POST['group_name']) {
																																																																																																																																																																																																	if ($_POST['groupplan'] == 1) {
																																																																																																																																																																																																		$cgname = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
																																																																																																																																																																																																		$scp->channelGroupAdd($cgname);
																																																																																																																																																																																																		$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';
																																																																																																																																																																																																		$msg = '<div class="alert alert-error">Es ist ein fehler Aufgetreten. Es wurden nicht alle Punkte ausgrfüllt!</div>';

																																																																																																																																																																																																		if (!empty($servergruppen)) {
																																																																																																																																																																																																			$gruppe = $tsData['clients'][$userid];
																																																																																																																																																																																																			$key = costumerNR();
																																																																																																																																																																																																			$servergruppenliste[$key]['sgid'] = $gruppe['sgid'];
																																																																																																																																																																																																			$servergruppenliste[$key]['name'] = $gruppe['name'];
																																																																																																																																																																																																			$servergruppenliste[$key]['type'] = $gruppe['type'];
																																																																																																																																																																																																			$servergruppenliste[$key]['iconid'] = $gruppe['iconid'];
																																																																																																																																																																																																			$servergruppenliste[$key]['savedb'] = $gruppe['savedb'];

																																																																																																																																																																																																			$channelgruppen = $user_data['client_output_hardware'];

																																																																																																																																																																																																			if (!empty($channelgruppen)) {
																																																																																																																																																																																																				$cgruppe = costumerNR();
																																																																																																																																																																																																				$key = costumerNR();
																																																																																																																																																																																																				$channelgruppenliste[$key]['cgid'] = $cgruppe['cgid'];
																																																																																																																																																																																																				$channelgruppenliste[$key]['name'] = $cgruppe['name'];
																																																																																																																																																																																																				$channelgruppenliste[$key]['type'] = $cgruppe['type'];
																																																																																																																																																																																																				$channelgruppenliste[$key]['iconid'] = $cgruppe['iconid'];
																																																																																																																																																																																																				$channelgruppenliste[$key]['savedb'] = $cgruppe['savedb'];

																																																																																																																																																																																																				if (isset($servergruppenliste)) {
																																																																																																																																																																																																					if (isset($channelgruppenliste)) {
																																																																																																																																																																																																						$smarty->assign('servergruppenliste', $servergruppenliste);
																																																																																																																																																																																																						$smarty->assign('channelgruppenliste', $channelgruppenliste);
																																																																																																																																																																																																						$smarty->assign('msg', $msg);
																																																																																																																																																																																																						$smarty->display('customer/groups.tpl');
																																																																																																																																																																																																					}

																																																																																																																																																																																																					exit();
																																																																																																																																																																																																					break;

																																																																																																																																																																																																					switch ($_GET['staff']) {
																																																																																																																																																																																																					case 'token':
																																																																																																																																																																																																						$result = $sgroup['namemode'] == 1;
																																																																																																																																																																																																						error_reporting(30719);

																																																																																																																																																																																																						if ($row = costumerNR()) {
																																																																																																																																																																																																							$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																																							$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																																							$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																																							$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																																							$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																																							$result2 = $user_data['client_icon_id'] != 0;
																																																																																																																																																																																																							error_reporting(30719);
																																																																																																																																																																																																							$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																																							$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																																							$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																																							$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																																							$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																																							$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																																							$PSession = array();
																																																																																																																																																																																																							$PSession['id'] = $_GET['id'];
																																																																																																																																																																																																							$PSession['staff'] = $_GET['staff'];

																																																																																																																																																																																																							if ($scp->getElement('success', $scp->connect())) {
																																																																																																																																																																																																								$connect = sprintf('%u', $sgroup['iconid'] & 4294967295);
																																																																																																																																																																																																								$select = $sgroup['iconid'];
																																																																																																																																																																																																								$scp->setName('Administrator');
																																																																																																																																																																																																								$sgrouplist = $sgroup['iconid'] == 600;
																																																																																																																																																																																																								$cgrouplist = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port;
																																																																																																																																																																																																								$channellist = costumerNR();

																																																																																																																																																																																																								if (isset($_POST['token_del'])) {
																																																																																																																																																																																																									if (isset($_POST['token'])) {
																																																																																																																																																																																																										$msg = '<div class="alert alert-success">aaa' . b604 . '</div>';
																																																																																																																																																																																																										$scp->tokenDelete($_POST['token']);

																																																																																																																																																																																																										$msg = '<div class="alert alert-error">yyy' . b605 . '</div>';

																																																																																																																																																																																																										if (isset($_POST['token_add'])) {
																																																																																																																																																																																																											if ($_POST['toktype'] == 0) {
																																																																																																																																																																																																												if ($_POST['tokid2'] != 0) {
																																																																																																																																																																																																													$_POST['tokid2'] = 0;

																																																																																																																																																																																																													if ($_POST['toktype'] == 1) {
																																																																																																																																																																																																														if ($_POST['tokid2'] == 0) {
																																																																																																																																																																																																															$msg = 'kein channel';

																																																																																																																																																																																																															if ($_POST['toktype'] == 0) {
																																																																																																																																																																																																																$tokenid1 = $tokenid1 = costumerNR();
																																																																																																																																																																																																																$tokens = '';
																																																																																																																																																																																																																$i = 4311;

																																																																																																																																																																																																																if ($i <= $_POST['num']) {
																																																																																																																																																																																																																	$token_add = costumerNR();

																																																																																																																																																																																																																	if ($token_add['success'] !== false) {
																																																																																																																																																																																																																		$tokens .= $token_add['data']['token'] . '<br />';

																																																																																																																																																																																																																		$i = 4310;

																																																																																																																																																																																																																		if (($i + 1) == count($token_add['errors'])) {
																																																																																																																																																																																																																			$msg = '<div class="alert alert-error">' . $token_add['errors'][$i] . '</div>';
																																																																																																																																																																																																																			++$i;

																																																																																																																																																																																																																			if (!empty($error)) {
																																																																																																																																																																																																																				break;
																																																																																																																																																																																																																				++$i;

																																																																																																																																																																																																																				if (!empty($tokens)) {
																																																																																																																																																																																																																					$msg = '<div class="alert alert-success">Berechtigungsschlüssel wurde erfolgreich erstellt!<br>' . $tokens . '</div>';
																																																																																																																																																																																																																					$tokenliste = '';

																																																																																																																																																																																																																					if ($tokenlist == true) {
																																																																																																																																																																																																																						if (!empty($tokenlist)) {
																																																																																																																																																																																																																							$x = 4310;

																																																																																																																																																																																																																							$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';

																																																																																																																																																																																																																							if ($x % 2) {
																																																																																																																																																																																																																								$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																																																																																								$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																																																																																								$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																																																																																								$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																																																																																								$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																																																																																								$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																																																																																								$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																																																																																								++$x;

																																																																																																																																																																																																																								$msg = '<div class="alert alert-warning">xxxx</div>';

																																																																																																																																																																																																																								if (!empty($sgrouplist)) {
																																																																																																																																																																																																																									$x = 4310;

																																																																																																																																																																																																																									$tokb = $client['client_type'] != 1;
																																																																																																																																																																																																																									$key = costumerNR();
																																																																																																																																																																																																																									$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																																																																									$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																																																																									$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																																																																									++$x;
																																																																																																																																																																																																																								}
																																																																																																																																																																																																																								else {
																																																																																																																																																																																																																									$tokb = $client['client_type'] != 1;
																																																																																																																																																																																																																									$key = costumerNR();
																																																																																																																																																																																																																									$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																																																																									$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																																																																									$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																																																																									++$x;
																																																																																																																																																																																																																								}

																																																																																																																																																																																																																								if (!empty($cgrouplist)) {
																																																																																																																																																																																																																									$x = 4310;

																																																																																																																																																																																																																									$tokc = costumerNR();
																																																																																																																																																																																																																									$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																																																																																									$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																																																																																									$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																																																																									++$x;

																																																																																																																																																																																																																									if (!empty($channellist)) {
																																																																																																																																																																																																																										$x = 4310;

																																																																																																																																																																																																																										$channelliste[$x]['cid'] = $tokd['cid'];
																																																																																																																																																																																																																										$channelliste[$x]['channel_name'] = $tokd['channel_name'];
																																																																																																																																																																																																																										++$x;

																																																																																																																																																																																																																										$smarty->assign('tokenliste', $tokenliste);
																																																																																																																																																																																																																										$smarty->assign(, 'msg');
																																																																																																																																																																																																																										$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																																																																																																																										$smarty->assign('servergroupliste', $servergroupliste);
																																																																																																																																																																																																																										$smarty->assign('channelliste', $channelliste);
																																																																																																																																																																																																																										$smarty->assign('msg', $msg);
																																																																																																																																																																																																																										$smarty->display('customer/token.tpl');
																																																																																																																																																																																																																										exit();
																																																																																																																																																																																																																										break;

																																																																																																																																																																																																																										switch ($_GET['staff']) {
																																																																																																																																																																																																																										case 'backup':
																																																																																																																																																																																																																											$result = costumerNR();
																																																																																																																																																																																																																											error_reporting(30719);

																																																																																																																																																																																																																											if ($row = ($_POST['kick_user_y'])) {
																																																																																																																																																																																																																												$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																																																												$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																																																												$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																																																												$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																																																												$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																																																												$result2 = costumerNR();
																																																																																																																																																																																																																												error_reporting(30719);
																																																																																																																																																																																																																												$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																																																												$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																																																												$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																																																												$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																																																												$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																																																											}
																																																																																																																																																																																																																										default:
																																																																																																																																																																																																																											$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																																																											$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																																																											$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																																																											$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																																																										}

																																																																																																																																																																																																																										$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																																																										$PSession = array();
																																																																																																																																																																																																																										$PSession['id'] = $_GET['id'];
																																																																																																																																																																																																																										$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																																																																										$scp = costumerNR();

																																																																																																																																																																																																																										if ($scp->getElement('success', $scp->connect())) {
																																																																																																																																																																																																																										}
																																																																																																																																																																																																																									}
																																																																																																																																																																																																																								}
																																																																																																																																																																																																																							}
																																																																																																																																																																																																																						}
																																																																																																																																																																																																																					}
																																																																																																																																																																																																																				}
																																																																																																																																																																																																																				else {
																																																																																																																																																																																																																					$x = 4310;

																																																																																																																																																																																																																					$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';

																																																																																																																																																																																																																					$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																																																																																					$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																																																																																					$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																																																																																					$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																																																																																					$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																																																																																					$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																																																																																					$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																																																																																					++$x;

																																																																																																																																																																																																																					$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																																																																																					$x = 4310;

																																																																																																																																																																																																																					$tokb = $client['client_type'] != 1;
																																																																																																																																																																																																																					$key = costumerNR();
																																																																																																																																																																																																																					$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																																																																					$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																																																																					$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																																																																					++$x;

																																																																																																																																																																																																																					$x = 4310;

																																																																																																																																																																																																																					$tokc = costumerNR();
																																																																																																																																																																																																																					$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																																																																																					$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																																																																																					$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																																																																					++$x;

																																																																																																																																																																																																																					$x = 4310;

																																																																																																																																																																																																																					$channelliste[$x]['cid'] = $tokd['cid'];
																																																																																																																																																																																																																					$channelliste[$x]['channel_name'] = $tokd['channel_name'];
																																																																																																																																																																																																																					++$x;

																																																																																																																																																																																																																					$smarty->assign('tokenliste', $tokenliste);
																																																																																																																																																																																																																					$smarty->assign(, 'msg');
																																																																																																																																																																																																																					$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																																																																																																																					$smarty->assign('servergroupliste', $servergroupliste);
																																																																																																																																																																																																																					$smarty->assign('channelliste', $channelliste);
																																																																																																																																																																																																																					$smarty->assign('msg', $msg);
																																																																																																																																																																																																																					$smarty->display('customer/token.tpl');
																																																																																																																																																																																																																					exit();
																																																																																																																																																																																																																					break;
																																																																																																																																																																																																																					$result = costumerNR();
																																																																																																																																																																																																																					error_reporting(30719);
																																																																																																																																																																																																																					$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																																																					$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																																																					$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																																																					$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																																																					$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																																																					$result2 = costumerNR();
																																																																																																																																																																																																																					error_reporting(30719);
																																																																																																																																																																																																																					$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																																																					$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																																																				}
																																																																																																																																																																																																																			}
																																																																																																																																																																																																																		}
																																																																																																																																																																																																																		else {
																																																																																																																																																																																																																			$x = 4310;

																																																																																																																																																																																																																			$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';

																																																																																																																																																																																																																			$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																																																																																			$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																																																																																			$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																																																																																			$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																																																																																			$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																																																																																			$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																																																																																			$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																																																																																			++$x;
																																																																																																																																																																																																																			$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																																																																																			$x = 4310;

																																																																																																																																																																																																																			$tokb = $client['client_type'] != 1;
																																																																																																																																																																																																																			$key = costumerNR();
																																																																																																																																																																																																																			$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																																																																			$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																																																																			$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																																																																			++$x;

																																																																																																																																																																																																																			$x = 4310;

																																																																																																																																																																																																																			$tokc = costumerNR();
																																																																																																																																																																																																																			$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																																																																																			$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																																																																																			$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																																																																			++$x;
																																																																																																																																																																																																																		}
																																																																																																																																																																																																																	}
																																																																																																																																																																																																																	else {
																																																																																																																																																																																																																		$channelgroupliste[$x]['name']['name'] = $tokc['name'];
																																																																																																																																																																																																																		$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																																																																		++$x;
																																																																																																																																																																																																																		$x = 4310;

																																																																																																																																																																																																																		$channelliste[$x]['cid'] = $tokd['cid'];
																																																																																																																																																																																																																		$channelliste[$x]['channel_name'] = $tokd['channel_name'];
																																																																																																																																																																																																																		++$x;

																																																																																																																																																																																																																		$smarty->assign('tokenliste', $tokenliste);
																																																																																																																																																																																																																		$smarty->assign(, 'msg');
																																																																																																																																																																																																																		$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																																																																																																																		$smarty->assign('servergroupliste', $servergroupliste);
																																																																																																																																																																																																																		$smarty->assign('channelliste', $channelliste);
																																																																																																																																																																																																																		$smarty->assign('msg', $msg);
																																																																																																																																																																																																																		$smarty->display('customer/token.tpl');
																																																																																																																																																																																																																		exit();
																																																																																																																																																																																																																		break;
																																																																																																																																																																																																																		$result = costumerNR();
																																																																																																																																																																																																																		error_reporting(30719);
																																																																																																																																																																																																																		$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																																																		$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																																																		$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																																																		$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																																																		$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																																																	}
																																																																																																																																																																																																																}
																																																																																																																																																																																																																else {
																																																																																																																																																																																																																	$result2 = costumerNR();
																																																																																																																																																																																																																	error_reporting(30719);
																																																																																																																																																																																																																	$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																																																	$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																																																	$PSession = array();
																																																																																																																																																																																																																	$PSession['id'] = $_GET['id'];
																																																																																																																																																																																																																	$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																																																																	$scp = costumerNR();
																																																																																																																																																																																																																}
																																																																																																																																																																																																															}
																																																																																																																																																																																																														}
																																																																																																																																																																																																													}
																																																																																																																																																																																																												}
																																																																																																																																																																																																												else {
																																																																																																																																																																																																													$tokenid1 = $tokenid1 = costumerNR();
																																																																																																																																																																																																													$tokens = '';
																																																																																																																																																																																																													$i = 4311;
																																																																																																																																																																																																													$token_add = costumerNR();
																																																																																																																																																																																																													$tokens .= $token_add['data']['token'] . '<br />';

																																																																																																																																																																																																													$i = 4310;
																																																																																																																																																																																																													$msg = '<div class="alert alert-error">' . $token_add['errors'][$i] . '</div>';
																																																																																																																																																																																																													++$i;
																																																																																																																																																																																																													break;
																																																																																																																																																																																																													++$i;
																																																																																																																																																																																																													$msg = '<div class="alert alert-success">Berechtigungsschlüssel wurde erfolgreich erstellt!<br>' . $tokens . '</div>';
																																																																																																																																																																																																													$tokenliste = '';
																																																																																																																																																																																																													$x = 4310;

																																																																																																																																																																																																													$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';

																																																																																																																																																																																																													$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																																																																													$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																																																																													$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																																																																													$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																																																																													$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																																																																													$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																																																																													$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																																																																													++$x;
																																																																																																																																																																																																													$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																																																																													$x = 4310;

																																																																																																																																																																																																													$tokb = $client['client_type'] != 1;
																																																																																																																																																																																																													$key = costumerNR();
																																																																																																																																																																																																													$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																																																													$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																																																													$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																																																													++$x;

																																																																																																																																																																																																													$x = 4310;

																																																																																																																																																																																																													$tokc = costumerNR();
																																																																																																																																																																																																													$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																																																																													$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																																																																													$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																																																													++$x;

																																																																																																																																																																																																													$x = 4310;

																																																																																																																																																																																																													$channelliste[$x]['cid'] = $tokd['cid'];
																																																																																																																																																																																																													$channelliste[$x]['channel_name'] = $tokd['channel_name'];
																																																																																																																																																																																																													++$x;

																																																																																																																																																																																																													$smarty->assign('tokenliste', $tokenliste);
																																																																																																																																																																																																													$smarty->assign('success', 'msg');
																																																																																																																																																																																																													$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																																																																																																													$smarty->assign('servergroupliste', $servergroupliste);
																																																																																																																																																																																																													$smarty->assign('channelliste', $channelliste);
																																																																																																																																																																																																													$smarty->assign('msg', $msg);
																																																																																																																																																																																																													$smarty->display('customer/token.tpl');
																																																																																																																																																																																																													exit();
																																																																																																																																																																																																													break;
																																																																																																																																																																																																													$result = costumerNR();
																																																																																																																																																																																																													error_reporting(30719);
																																																																																																																																																																																																													$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																																													$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																																													$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																																													$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																																													$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																																													$result2 = costumerNR();
																																																																																																																																																																																																													error_reporting(30719);
																																																																																																																																																																																																													$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																																													$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																																													$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																																													$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																																													$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																																													$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																																													$PSession = array();
																																																																																																																																																																																																													$PSession['id'] = $_GET['id'];
																																																																																																																																																																																																													$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																																																													$scp = costumerNR();
																																																																																																																																																																																																												}

																																																																																																																																																																																																												$connect = costumerNR();
																																																																																																																																																																																																											}

																																																																																																																																																																																																											switch ($_GET['staff']) {
																																																																																																																																																																																																											}

																																																																																																																																																																																																											$select = $row = costumerNR();
																																																																																																																																																																																																											$scp->setName('Administrator');
																																																																																																																																																																																																											$smarty->assign('msg', $msg);
																																																																																																																																																																																																											$smarty->display('customer/backup.tpl');
																																																																																																																																																																																																											exit();
																																																																																																																																																																																																										}
																																																																																																																																																																																																									}
																																																																																																																																																																																																									else {
																																																																																																																																																																																																										$_POST['tokid2'] = 0;
																																																																																																																																																																																																										$msg = 'kein channel';

																																																																																																																																																																																																										$tokenid1 = $tokenid1 = costumerNR();
																																																																																																																																																																																																										$tokens = '';
																																																																																																																																																																																																										$i = 4311;
																																																																																																																																																																																																										$token_add = costumerNR();
																																																																																																																																																																																																										$tokens .= $token_add['data']['token'] . '<br />';

																																																																																																																																																																																																										$i = 4310;
																																																																																																																																																																																																										$msg = '<div class="alert alert-error">' . $token_add['errors'][$i] . '</div>';
																																																																																																																																																																																																										++$i;
																																																																																																																																																																																																										break;
																																																																																																																																																																																																										++$i;
																																																																																																																																																																																																										$msg = '<div class="alert alert-success">Berechtigungsschlüssel wurde erfolgreich erstellt!<br>' . $tokens . '</div>';
																																																																																																																																																																																																										$tokenliste = '';
																																																																																																																																																																																																										$x = 4310;

																																																																																																																																																																																																										$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';
																																																																																																																																																																																																										$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																																																																										$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																																																																										$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																																																																										$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																																																																										$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																																																																										$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																																																																										$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																																																																										++$x;

																																																																																																																																																																																																										$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																																																																										$x = 4310;

																																																																																																																																																																																																										$tokb = $client['client_type'] != 1;
																																																																																																																																																																																																										$key = costumerNR();
																																																																																																																																																																																																										$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																																																										$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																																																										$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																																																										++$x;

																																																																																																																																																																																																										$x = 4310;

																																																																																																																																																																																																										$tokc = costumerNR();
																																																																																																																																																																																																										$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																																																																										$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																																																																										$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																																																										++$x;

																																																																																																																																																																																																										$x = 4310;

																																																																																																																																																																																																										$channelliste[$x]['cid'] = $tokd['cid'];
																																																																																																																																																																																																										$channelliste[$x]['channel_name'] = $tokd['channel_name'];
																																																																																																																																																																																																										++$x;

																																																																																																																																																																																																										$smarty->assign('tokenliste', $tokenliste);
																																																																																																																																																																																																										$smarty->assign('msg', 'msg');
																																																																																																																																																																																																										$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																																																																																																										$smarty->assign('servergroupliste', $servergroupliste);
																																																																																																																																																																																																										$smarty->assign('channelliste', $channelliste);
																																																																																																																																																																																																										$smarty->assign('msg', $msg);
																																																																																																																																																																																																										$smarty->display('customer/token.tpl');
																																																																																																																																																																																																										exit();
																																																																																																																																																																																																										break;
																																																																																																																																																																																																										$result = costumerNR();
																																																																																																																																																																																																										error_reporting(30719);
																																																																																																																																																																																																										$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																																										$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																																										$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																																										$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																																										$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																																										$result2 = costumerNR();
																																																																																																																																																																																																										error_reporting(30719);
																																																																																																																																																																																																										$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																																										$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																																										$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																																										$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																																										$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																																										$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																																										$PSession = array();
																																																																																																																																																																																																										$PSession['id'] = $_GET['id'];
																																																																																																																																																																																																										$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																																																										switch ($_GET['staff']) {
																																																																																																																																																																																																										}

																																																																																																																																																																																																										$scp = costumerNR();
																																																																																																																																																																																																										$connect = costumerNR();
																																																																																																																																																																																																										$select = $row = costumerNR();
																																																																																																																																																																																																										$scp->setName('Administrator');
																																																																																																																																																																																																										$smarty->assign('msg', $msg);
																																																																																																																																																																																																										$smarty->display('customer/backup.tpl');
																																																																																																																																																																																																										exit();
																																																																																																																																																																																																									}

																																																																																																																																																																																																									switch ($_GET['act']) {
																																																																																																																																																																																																									}

																																																																																																																																																																																																									switch ($_GET['site']) {
																																																																																																																																																																																																									}

																																																																																																																																																																																																									$smarty->assign('msg', $msg);
																																																																																																																																																																																																									$smarty->display('customer/myproducts_adm.tpl');
																																																																																																																																																																																																									exit();
																																																																																																																																																																																																									$smarty->assign('msg', $msg);
																																																																																																																																																																																																									$smarty->display('customer/myproducts.tpl');
																																																																																																																																																																																																									exit();
																																																																																																																																																																																																									$smarty->assign('userNumber', $MyData['userNumber']);
																																																																																																																																																																																																									$smarty->assign('RegisterData', $MyData['RegisterData']);
																																																																																																																																																																																																								}
																																																																																																																																																																																																							}
																																																																																																																																																																																																							else {
																																																																																																																																																																																																								$tokenid1 = costumerNR();
																																																																																																																																																																																																								$tokens = '';
																																																																																																																																																																																																								$i = 4311;
																																																																																																																																																																																																								$token_add = costumerNR();
																																																																																																																																																																																																								$tokens .= $token_add['data']['token'] . '<br />';
																																																																																																																																																																																																								$i = 4310;
																																																																																																																																																																																																								$msg = '<div class="alert alert-error">' . $token_add['errors'][$i] . '</div>';
																																																																																																																																																																																																								++$i;
																																																																																																																																																																																																								break;
																																																																																																																																																																																																								++$i;
																																																																																																																																																																																																								$msg = '<div class="alert alert-success">Berechtigungsschlüssel wurde erfolgreich erstellt!<br>' . $tokens . '</div>';
																																																																																																																																																																																																								$tokenliste = '';
																																																																																																																																																																																																								$x = 4310;

																																																																																																																																																																																																								$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';
																																																																																																																																																																																																								$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																																																																								$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																																																																								$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																																																																								$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																																																																								$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																																																																								$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																																																																								$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																																																																								++$x;

																																																																																																																																																																																																								$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																																																																								$x = 4310;

																																																																																																																																																																																																								$tokb = $client['client_type'] != 1;
																																																																																																																																																																																																								$key = costumerNR();
																																																																																																																																																																																																								$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																																																								$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																																																								$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																																																								++$x;

																																																																																																																																																																																																								$x = 4310;

																																																																																																																																																																																																								$tokc = costumerNR();
																																																																																																																																																																																																								$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																																																																								$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																																																																								$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																																																								++$x;

																																																																																																																																																																																																								$x = 4310;

																																																																																																																																																																																																								$channelliste[$x]['cid'] = $tokd['cid'];
																																																																																																																																																																																																								$channelliste[$x]['channel_name'] = $tokd['channel_name'];
																																																																																																																																																																																																								++$x;

																																																																																																																																																																																																								$smarty->assign('tokenliste', $tokenliste);
																																																																																																																																																																																																								$smarty->assign('check', 'msg');
																																																																																																																																																																																																								$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																																																																																																								$smarty->assign('servergroupliste', $servergroupliste);
																																																																																																																																																																																																								$smarty->assign('channelliste', $channelliste);
																																																																																																																																																																																																								$smarty->assign('msg', $msg);
																																																																																																																																																																																																								$smarty->display('customer/token.tpl');
																																																																																																																																																																																																								exit();
																																																																																																																																																																																																								break;
																																																																																																																																																																																																								$result = costumerNR();
																																																																																																																																																																																																								error_reporting(30719);
																																																																																																																																																																																																								$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																																								$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																																								$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																																								$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																																								$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																																								$result2 = costumerNR();
																																																																																																																																																																																																								error_reporting(30719);
																																																																																																																																																																																																								$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																																								$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																																								$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																																								$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																																								$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																																							}
																																																																																																																																																																																																						}
																																																																																																																																																																																																					default:
																																																																																																																																																																																																						$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																																						$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																																						$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																																						$PSession = array();
																																																																																																																																																																																																						$PSession['id'] = $_GET['id'];
																																																																																																																																																																																																						$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																																																						$scp = costumerNR();
																																																																																																																																																																																																						$connect = sprintf('%u', $sgroup['iconid'] & 4294967295);
																																																																																																																																																																																																						$sgroup;
																																																																																																																																																																																																						$scp->setName('Administrator');
																																																																																																																																																																																																						$sgrouplist = $sgroup['iconid'] == 600;
																																																																																																																																																																																																						$cgrouplist = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port;
																																																																																																																																																																																																						$channellist = costumerNR();
																																																																																																																																																																																																						$msg = '<div class="alert alert-success">aaa' . b604 . '</div>';
																																																																																																																																																																																																						$scp->tokenDelete($_POST['token']);

																																																																																																																																																																																																						$msg = '<div class="alert alert-error">yyy' . b605 . '</div>';
																																																																																																																																																																																																						$_POST['tokid2'] = 0;
																																																																																																																																																																																																						$msg = 'kein channel';
																																																																																																																																																																																																						$tokenid1 = $tokenid1 = costumerNR();
																																																																																																																																																																																																						$tokens = '';
																																																																																																																																																																																																						$i = 4311;
																																																																																																																																																																																																						$token_add = costumerNR();
																																																																																																																																																																																																						$tokens .= $token_add['data']['token'] . '<br />';
																																																																																																																																																																																																						$i = 4310;
																																																																																																																																																																																																						$msg = '<div class="alert alert-error">' . $token_add['errors'][$i] . '</div>';
																																																																																																																																																																																																						++$i;
																																																																																																																																																																																																						break;
																																																																																																																																																																																																						++$i;
																																																																																																																																																																																																						$msg = '<div class="alert alert-success">Berechtigungsschlüssel wurde erfolgreich erstellt!<br>' . $tokens . '</div>';
																																																																																																																																																																																																						$tokenliste = '';
																																																																																																																																																																																																						$x = 4310;

																																																																																																																																																																																																						$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';
																																																																																																																																																																																																						$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																																																																						$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																																																																						$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																																																																						$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																																																																						$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																																																																						$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																																																																						$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																																																																						++$x;

																																																																																																																																																																																																						$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																																																																						$x = 4310;

																																																																																																																																																																																																						$tokb = $client['client_type'] != 1;
																																																																																																																																																																																																						$key = costumerNR();
																																																																																																																																																																																																						$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																																																						$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																																																						$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																																																						++$x;

																																																																																																																																																																																																						$x = 4310;

																																																																																																																																																																																																						$tokc = costumerNR();
																																																																																																																																																																																																						$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																																																																						$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																																																																						$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																																																						++$x;

																																																																																																																																																																																																						$x = 4310;

																																																																																																																																																																																																						$channelliste[$x]['cid'] = $tokd['cid'];
																																																																																																																																																																																																						$channelliste[$x]['channel_name'] = $tokd['channel_name'];
																																																																																																																																																																																																						++$x;

																																																																																																																																																																																																						switch ($_GET['staff']) {
																																																																																																																																																																																																						}

																																																																																																																																																																																																						switch ($_GET['act']) {
																																																																																																																																																																																																						}

																																																																																																																																																																																																						switch ($_GET['site']) {
																																																																																																																																																																																																						}

																																																																																																																																																																																																						$smarty->assign('tokenliste', $tokenliste);
																																																																																																																																																																																																						$smarty->assign(, 'msg');
																																																																																																																																																																																																						$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																																																																																																						$smarty->assign('servergroupliste', $servergroupliste);
																																																																																																																																																																																																						$smarty->assign('channelliste', $channelliste);
																																																																																																																																																																																																						$smarty->assign('msg', $msg);
																																																																																																																																																																																																						$smarty->display('customer/token.tpl');
																																																																																																																																																																																																						exit();
																																																																																																																																																																																																						break;
																																																																																																																																																																																																						$result = costumerNR();
																																																																																																																																																																																																						error_reporting(30719);
																																																																																																																																																																																																						$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																																						$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																																						$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																																						$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																																						$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																																						$result2 = costumerNR();
																																																																																																																																																																																																						error_reporting(30719);
																																																																																																																																																																																																						$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																																						$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																																						$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																																						$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																																						$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																																						$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																																						$PSession = array();
																																																																																																																																																																																																						$PSession['id'] = $_GET['id'];
																																																																																																																																																																																																						$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																																																						$scp = costumerNR();
																																																																																																																																																																																																						$connect = costumerNR();
																																																																																																																																																																																																						$select = $row = costumerNR();
																																																																																																																																																																																																						$scp->setName('Administrator');
																																																																																																																																																																																																						$smarty->assign('msg', $msg);
																																																																																																																																																																																																						$smarty->display('customer/backup.tpl');
																																																																																																																																																																																																						exit();
																																																																																																																																																																																																						$smarty->assign('msg', $msg);
																																																																																																																																																																																																						$smarty->display('customer/myproducts_adm.tpl');
																																																																																																																																																																																																						exit();
																																																																																																																																																																																																						$smarty->assign('msg', $msg);
																																																																																																																																																																																																						$smarty->display('customer/myproducts.tpl');
																																																																																																																																																																																																						exit();
																																																																																																																																																																																																						$smarty->assign('userNumber', $MyData['userNumber']);
																																																																																																																																																																																																					}
																																																																																																																																																																																																				}
																																																																																																																																																																																																			}
																																																																																																																																																																																																			else {
																																																																																																																																																																																																				$msg = '<div class="alert alert-success">Berechtigungsschlüssel wurde erfolgreich erstellt!<br>' . $tokens . '</div>';
																																																																																																																																																																																																				$tokenliste = '';
																																																																																																																																																																																																				$x = 4310;

																																																																																																																																																																																																				$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';
																																																																																																																																																																																																				$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																																																																				$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																																																																				$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																																																																				$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																																																																				$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																																																																				$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																																																																				$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																																																																				++$x;

																																																																																																																																																																																																				$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																																																																				$x = 4310;

																																																																																																																																																																																																				$tokb = $client['client_type'] != 1;
																																																																																																																																																																																																				$key = costumerNR();
																																																																																																																																																																																																				$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																																																				$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																																																				$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																																																				++$x;

																																																																																																																																																																																																				$x = 4310;

																																																																																																																																																																																																				$tokc = costumerNR();
																																																																																																																																																																																																				$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																																																																				$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																																																																				$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																																																				++$x;

																																																																																																																																																																																																				$x = 4310;

																																																																																																																																																																																																				$channelliste[$x]['cid'] = $tokd['cid'];
																																																																																																																																																																																																				$channelliste[$x]['channel_name'] = $tokd['channel_name'];
																																																																																																																																																																																																				++$x;

																																																																																																																																																																																																				$smarty->assign('tokenliste', $tokenliste);
																																																																																																																																																																																																				$smarty->assign($MyData['RegisterData'], 'msg');
																																																																																																																																																																																																				$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																																																																																																				$smarty->assign('servergroupliste', $servergroupliste);
																																																																																																																																																																																																				$smarty->assign('channelliste', $channelliste);
																																																																																																																																																																																																				$smarty->assign('msg', $msg);
																																																																																																																																																																																																				$smarty->display('customer/token.tpl');
																																																																																																																																																																																																				exit();
																																																																																																																																																																																																				break;
																																																																																																																																																																																																				$result = costumerNR();
																																																																																																																																																																																																				error_reporting(30719);
																																																																																																																																																																																																				$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																																				$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																																				$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																																				$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																																				$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																																				$result2 = costumerNR();
																																																																																																																																																																																																				error_reporting(30719);
																																																																																																																																																																																																				$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																																				$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																																				$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																																				$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																																				$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																																				$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																																				$PSession = array();
																																																																																																																																																																																																				$PSession['id'] = $_GET['id'];
																																																																																																																																																																																																				$PSession['staff'] = $_GET['staff'];
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
																																																																																																																																																																																												$cgname = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
																																																																																																																																																																																											}
																																																																																																																																																																																										}
																																																																																																																																																																																										else {
																																																																																																																																																																																											$scp->channelGroupAdd($cgname);
																																																																																																																																																																																											$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';
																																																																																																																																																																																											$msg = '<div class="alert alert-error">Es ist ein fehler Aufgetreten. Es wurden nicht alle Punkte ausgrfüllt!</div>';
																																																																																																																																																																																											$servergruppen = costumerNR();

																																																																																																																																																																																											$tsData;
																																																																																																																																																																																											$key = costumerNR();
																																																																																																																																																																																											$servergruppenliste[$key]['sgid'] = $gruppe['sgid'];
																																																																																																																																																																																											$servergruppenliste[$key]['name'] = $gruppe['name'];
																																																																																																																																																																																											$servergruppenliste[$key]['type'] = $gruppe['type'];
																																																																																																																																																																																											$servergruppenliste[$key]['iconid'] = $gruppe['iconid'];
																																																																																																																																																																																											$servergruppenliste[$key]['savedb'] = $gruppe['savedb'];

																																																																																																																																																																																											$user_data;

																																																																																																																																																																																											$cgruppe = costumerNR();
																																																																																																																																																																																											$key = costumerNR();
																																																																																																																																																																																											$channelgruppenliste[$key]['cgid'] = $cgruppe['cgid'];
																																																																																																																																																																																											$channelgruppenliste[$key]['name'] = $cgruppe['name'];
																																																																																																																																																																																											$channelgruppenliste[$key]['type'] = $cgruppe['type'];
																																																																																																																																																																																											$channelgruppenliste[$key]['iconid'] = $cgruppe['iconid'];
																																																																																																																																																																																											$channelgruppenliste[$key]['savedb'] = $cgruppe['savedb'];

																																																																																																																																																																																											$smarty->assign('servergruppenliste', $servergruppenliste);
																																																																																																																																																																																											$smarty->assign('channelgruppenliste', $channelgruppenliste);
																																																																																																																																																																																											$smarty->assign('msg', $msg);
																																																																																																																																																																																											$smarty->display('customer/groups.tpl');
																																																																																																																																																																																											exit();
																																																																																																																																																																																											break;
																																																																																																																																																																																											$result = $sgroup['namemode'] == 1;
																																																																																																																																																																																											error_reporting(30719);
																																																																																																																																																																																											$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																											$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																											$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																											$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																											$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																											$result2 = $user_data['client_icon_id'] != 0;
																																																																																																																																																																																											error_reporting(30719);
																																																																																																																																																																																											$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																											$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																											$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																											$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																											$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																											$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																											$PSession = array();
																																																																																																																																																																																											$PSession['id'] = $_GET['id'];
																																																																																																																																																																																											$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																																											$scp = costumerNR();
																																																																																																																																																																																											$connect = sprintf('%u', $sgroup['iconid'] & 4294967295);
																																																																																																																																																																																											$sgroup;
																																																																																																																																																																																											$scp->setName('Administrator');
																																																																																																																																																																																											$sgrouplist = $sgroup['iconid'] == 600;
																																																																																																																																																																																											$cgrouplist = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port;
																																																																																																																																																																																											$channellist = costumerNR();
																																																																																																																																																																																											$msg = '<div class="alert alert-success">aaa' . b604 . '</div>';
																																																																																																																																																																																											$scp->tokenDelete($_POST['token']);

																																																																																																																																																																																											$msg = '<div class="alert alert-error">yyy' . b605 . '</div>';
																																																																																																																																																																																											$_POST['tokid2'] = 0;
																																																																																																																																																																																											$msg = 'kein channel';
																																																																																																																																																																																											$tokenid1 = $tokenid1 = costumerNR();
																																																																																																																																																																																											$tokens = '';
																																																																																																																																																																																											$i = 4311;
																																																																																																																																																																																											$token_add = costumerNR();
																																																																																																																																																																																											$tokens .= $token_add['data']['token'] . '<br />';
																																																																																																																																																																																											$i = 4310;
																																																																																																																																																																																											$msg = '<div class="alert alert-error">' . $token_add['errors'][$i] . '</div>';
																																																																																																																																																																																											++$i;
																																																																																																																																																																																											break;
																																																																																																																																																																																											++$i;
																																																																																																																																																																																											$msg = '<div class="alert alert-success">Berechtigungsschlüssel wurde erfolgreich erstellt!<br>' . $tokens . '</div>';
																																																																																																																																																																																											$tokenliste = '';
																																																																																																																																																																																											$x = 4310;

																																																																																																																																																																																											$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';
																																																																																																																																																																																											$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																																																											$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																																																											$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																																																											$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																																																											$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																																																											$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																																																											$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																																																											++$x;

																																																																																																																																																																																											$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																																																											$x = 4310;

																																																																																																																																																																																											$tokb = $client['client_type'] != 1;
																																																																																																																																																																																											$key = costumerNR();
																																																																																																																																																																																											$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																																											$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																																											$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																																											++$x;

																																																																																																																																																																																											$x = 4310;

																																																																																																																																																																																											$tokc = costumerNR();
																																																																																																																																																																																											$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																																																											$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																																																											$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																																											++$x;

																																																																																																																																																																																											$x = 4310;

																																																																																																																																																																																											$channelliste[$x]['cid'] = $tokd['cid'];
																																																																																																																																																																																											$channelliste[$x]['channel_name'] = $tokd['channel_name'];
																																																																																																																																																																																											++$x;

																																																																																																																																																																																											$smarty->assign('tokenliste', $tokenliste);
																																																																																																																																																																																											$smarty->assign($cgname, 'msg');
																																																																																																																																																																																											$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																																																																																											$smarty->assign('servergroupliste', $servergroupliste);
																																																																																																																																																																																											$smarty->assign('channelliste', $channelliste);
																																																																																																																																																																																											$smarty->assign('msg', $msg);
																																																																																																																																																																																											$smarty->display('customer/token.tpl');
																																																																																																																																																																																											exit();
																																																																																																																																																																																											break;
																																																																																																																																																																																											$result = costumerNR();
																																																																																																																																																																																											error_reporting(30719);
																																																																																																																																																																																											$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																											$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																											$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																											$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																											$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																											$result2 = costumerNR();
																																																																																																																																																																																											error_reporting(30719);
																																																																																																																																																																																											$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																											$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																											$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																											$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																											$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																											$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																											$PSession = array();
																																																																																																																																																																																											$PSession['id'] = $_GET['id'];
																																																																																																																																																																																											$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																																										}
																																																																																																																																																																																									}
																																																																																																																																																																																								}
																																																																																																																																																																																							}
																																																																																																																																																																																						}
																																																																																																																																																																																					}
																																																																																																																																																																																				}
																																																																																																																																																																																			}
																																																																																																																																																																																			else {
																																																																																																																																																																																				$scp->setName('Administrator');
																																																																																																																																																																																				$sgrouplist = $sgroup['iconid'] == 600;
																																																																																																																																																																																				$cgrouplist = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port;
																																																																																																																																																																																				$channellist = costumerNR();
																																																																																																																																																																																				$msg = '<div class="alert alert-success">aaa' . b604 . '</div>';
																																																																																																																																																																																				$scp->tokenDelete($_POST['token']);

																																																																																																																																																																																				$msg = '<div class="alert alert-error">yyy' . b605 . '</div>';
																																																																																																																																																																																				$_POST['tokid2'] = 0;
																																																																																																																																																																																				$msg = 'kein channel';
																																																																																																																																																																																				$tokenid1 = $tokenid1 = costumerNR();
																																																																																																																																																																																				$tokens = '';
																																																																																																																																																																																				$i = 4311;
																																																																																																																																																																																				$token_add = costumerNR();
																																																																																																																																																																																			}
																																																																																																																																																																																		}
																																																																																																																																																																																		else {
																																																																																																																																																																																			$tokens .= $token_add['data']['token'] . '<br />';
																																																																																																																																																																																			$i = 4310;
																																																																																																																																																																																			$msg = '<div class="alert alert-error">' . $token_add['errors'][$i] . '</div>';
																																																																																																																																																																																			++$i;
																																																																																																																																																																																			break;
																																																																																																																																																																																			++$i;
																																																																																																																																																																																			$msg = '<div class="alert alert-success">Berechtigungsschlüssel wurde erfolgreich erstellt!<br>' . $tokens . '</div>';
																																																																																																																																																																																			$tokenliste = '';
																																																																																																																																																																																			$x = 4310;

																																																																																																																																																																																			$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';
																																																																																																																																																																																			$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																																																			$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																																																			$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																																																			$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																																																			$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																																																			$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																																																			$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																																																			++$x;

																																																																																																																																																																																			$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																																																			$x = 4310;

																																																																																																																																																																																			$tokb = $client['client_type'] != 1;
																																																																																																																																																																																			$key = costumerNR();
																																																																																																																																																																																			$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																																			$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																																			$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																																			++$x;

																																																																																																																																																																																			$x = 4310;

																																																																																																																																																																																			$tokc = costumerNR();
																																																																																																																																																																																			$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																																																			$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																																																			$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																																			++$x;
																																																																																																																																																																																		}
																																																																																																																																																																																	}
																																																																																																																																																																																}
																																																																																																																																																																																else {
																																																																																																																																																																																	$cgname = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
																																																																																																																																																																																	$scp->channelGroupAdd($cgname);
																																																																																																																																																																																	$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';
																																																																																																																																																																																	$msg = '<div class="alert alert-error">Es ist ein fehler Aufgetreten. Es wurden nicht alle Punkte ausgrfüllt!</div>';
																																																																																																																																																																																	$servergruppen = costumerNR();

																																																																																																																																																																																	$tsData;
																																																																																																																																																																																	$key = costumerNR();
																																																																																																																																																																																	$servergruppenliste[$key]['sgid'] = $gruppe['sgid'];
																																																																																																																																																																																	$servergruppenliste[$key]['name'] = $gruppe['name'];
																																																																																																																																																																																	$servergruppenliste[$key]['type'] = $gruppe['type'];
																																																																																																																																																																																	$servergruppenliste[$key]['iconid'] = $gruppe['iconid'];
																																																																																																																																																																																	$servergruppenliste[$key]['savedb'] = $gruppe['savedb'];

																																																																																																																																																																																	$user_data;

																																																																																																																																																																																	$cgruppe = costumerNR();
																																																																																																																																																																																	$key = costumerNR();
																																																																																																																																																																																	$channelgruppenliste[$key]['cgid'] = $cgruppe['cgid'];
																																																																																																																																																																																	$channelgruppenliste[$key]['name'] = $cgruppe['name'];
																																																																																																																																																																																	$channelgruppenliste[$key]['type'] = $cgruppe['type'];
																																																																																																																																																																																	$channelgruppenliste[$key]['iconid'] = $cgruppe['iconid'];
																																																																																																																																																																																	$channelgruppenliste[$key]['savedb'] = $cgruppe['savedb'];

																																																																																																																																																																																	$smarty->assign('servergruppenliste', $servergruppenliste);
																																																																																																																																																																																	$smarty->assign('channelgruppenliste', $channelgruppenliste);
																																																																																																																																																																																	$smarty->assign('msg', $msg);
																																																																																																																																																																																	$smarty->display('customer/groups.tpl');
																																																																																																																																																																																	exit();
																																																																																																																																																																																	break;
																																																																																																																																																																																	$result = $sgroup['namemode'] == 1;
																																																																																																																																																																																	error_reporting(30719);
																																																																																																																																																																																	$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																	$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																	$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																	$result2 = $user_data['client_icon_id'] != 0;
																																																																																																																																																																																	error_reporting(30719);
																																																																																																																																																																																	$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																	$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																	$PSession = array();
																																																																																																																																																																																	$PSession['id'] = $_GET['id'];
																																																																																																																																																																																	$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																																	$scp = costumerNR();
																																																																																																																																																																																	$connect = sprintf('%u', $sgroup['iconid'] & 4294967295);
																																																																																																																																																																																	$sgroup;
																																																																																																																																																																																	$scp->setName('Administrator');
																																																																																																																																																																																	$sgrouplist = $sgroup['iconid'] == 600;
																																																																																																																																																																																	$cgrouplist = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port;
																																																																																																																																																																																	$channellist = costumerNR();
																																																																																																																																																																																	$msg = '<div class="alert alert-success">aaa' . b604 . '</div>';
																																																																																																																																																																																	$scp->tokenDelete($_POST['token']);

																																																																																																																																																																																	$msg = '<div class="alert alert-error">yyy' . b605 . '</div>';
																																																																																																																																																																																	$_POST['tokid2'] = 0;
																																																																																																																																																																																	$msg = 'kein channel';
																																																																																																																																																																																	$tokenid1 = $tokenid1 = costumerNR();
																																																																																																																																																																																	$tokens = '';
																																																																																																																																																																																	$i = 4311;
																																																																																																																																																																																	$token_add = costumerNR();
																																																																																																																																																																																	$tokens .= $token_add['data']['token'] . '<br />';
																																																																																																																																																																																	$i = 4310;
																																																																																																																																																																																	$msg = '<div class="alert alert-error">' . $token_add['errors'][$i] . '</div>';
																																																																																																																																																																																	++$i;
																																																																																																																																																																																	break;
																																																																																																																																																																																	++$i;
																																																																																																																																																																																	$msg = '<div class="alert alert-success">Berechtigungsschlüssel wurde erfolgreich erstellt!<br>' . $tokens . '</div>';
																																																																																																																																																																																	$tokenliste = '';
																																																																																																																																																																																	$x = 4310;

																																																																																																																																																																																	$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';
																																																																																																																																																																																	$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																																																	$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																																																	$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																																																	$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																																																	$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																																																	$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																																																	$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																																																	++$x;

																																																																																																																																																																																	$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																																																	$x = 4310;

																																																																																																																																																																																	$tokb = $client['client_type'] != 1;
																																																																																																																																																																																	$key = costumerNR();
																																																																																																																																																																																	$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																																	$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																																	$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																																	++$x;

																																																																																																																																																																																	$x = 4310;

																																																																																																																																																																																	$tokc = costumerNR();
																																																																																																																																																																																	$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																																																	$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																																																	$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																																	++$x;

																																																																																																																																																																																	$x = 4310;

																																																																																																																																																																																	$channelliste[$x]['cid'] = $tokd['cid'];
																																																																																																																																																																																	$channelliste[$x]['channel_name'] = $tokd['channel_name'];
																																																																																																																																																																																	++$x;

																																																																																																																																																																																	switch ($_GET['staff']) {
																																																																																																																																																																																	}

																																																																																																																																																																																	switch ($_GET['act']) {
																																																																																																																																																																																	}

																																																																																																																																																																																	$smarty->assign('tokenliste', $tokenliste);
																																																																																																																																																																																	$smarty->assign($myADM['hostIP'], 'msg');
																																																																																																																																																																																	$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																																																																																	$smarty->assign('servergroupliste', $servergroupliste);
																																																																																																																																																																																	$smarty->assign('channelliste', $channelliste);
																																																																																																																																																																																	$smarty->assign('msg', $msg);
																																																																																																																																																																																	$smarty->display('customer/token.tpl');
																																																																																																																																																																																	exit();
																																																																																																																																																																																	break;
																																																																																																																																																																																	$result = costumerNR();
																																																																																																																																																																																	error_reporting(30719);
																																																																																																																																																																																	$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																																	$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																																	$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																																	$result2 = costumerNR();
																																																																																																																																																																																	error_reporting(30719);
																																																																																																																																																																																	$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																																	$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																																	$PSession = array();
																																																																																																																																																																																	$PSession['id'] = $_GET['id'];
																																																																																																																																																																																	$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																																	$scp = costumerNR();
																																																																																																																																																																																	$connect = costumerNR();
																																																																																																																																																																																	$select = $row = costumerNR();
																																																																																																																																																																																	$scp->setName('Administrator');
																																																																																																																																																																																	$smarty->assign('msg', $msg);
																																																																																																																																																																																	$smarty->display('customer/backup.tpl');
																																																																																																																																																																																	exit();
																																																																																																																																																																																	$smarty->assign('msg', $msg);
																																																																																																																																																																																	$smarty->display('customer/myproducts_adm.tpl');
																																																																																																																																																																																	exit();
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
																																																																																																																																																																						$banliste[$x]['invokeruid'] = $ban['invokeruid'];
																																																																																																																																																																						$banliste[$x]['reason'] = $ban['reason'];
																																																																																																																																																																						++$x;

																																																																																																																																																																						$msg = '<div class="alert alert-warning">Derzeit sind keine Banns vorhanden!</div>';
																																																																																																																																																																						$smarty->assign('banliste', $banliste);
																																																																																																																																																																						$smarty->assign('nobans', $nobans);
																																																																																																																																																																						$smarty->assign('msg', $msg);
																																																																																																																																																																						$smarty->display('customer/banListe.tpl');
																																																																																																																																																																						exit();
																																																																																																																																																																						break;
																																																																																																																																																																						error_reporting(30719);
																																																																																																																																																																					}
																																																																																																																																																																				}
																																																																																																																																																																			}
																																																																																																																																																																		}
																																																																																																																																																																		else {
																																																																																																																																																																			$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																																			$scp->BanAddByName($_POST['user'], $_POST['time'], $_POST['grund']);
																																																																																																																																																																			$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																																			$msg = '<div class=\'alert alert-error\'>Nicht alle Felder ausgefüllt</div>';
																																																																																																																																																																			$banliste = '';
																																																																																																																																																																			$nobans = '';
																																																																																																																																																																			$banlist = costumerNR();
																																																																																																																																																																			$x = 4310;

																																																																																																																																																																			$ban = $i < count($tsData['sgroups']);
																																																																																																																																																																			$banliste[$x]['banid'] = $ban['banid'];
																																																																																																																																																																			$banliste[$x]['ip'] = $ban['ip'];
																																																																																																																																																																			$banliste[$x]['name'] = $ban['name'];
																																																																																																																																																																			$banliste[$x]['uid'] = $ban['uid'];
																																																																																																																																																																			$banliste[$x]['created'] = date('d.m.Y', $ban['created']);
																																																																																																																																																																			$banliste[$x]['duration'] = sec2time($ban['duration']);
																																																																																																																																																																			$banliste[$x]['duration'] = 'Permanent';

																																																																																																																																																																			$banliste[$x]['duration'] = sec2time($ban['duration']);
																																																																																																																																																																			$banliste[$x]['invokername'] = $ban['invokername'];
																																																																																																																																																																			$banliste[$x]['invokercldbid'] = $ban['invokercldbid'];
																																																																																																																																																																			$banliste[$x]['invokeruid'] = $ban['invokeruid'];
																																																																																																																																																																			$banliste[$x]['reason'] = $ban['reason'];
																																																																																																																																																																			++$x;

																																																																																																																																																																			$msg = '<div class="alert alert-warning">Derzeit sind keine Banns vorhanden!</div>';
																																																																																																																																																																			$smarty->assign('banliste', $banliste);
																																																																																																																																																																			$smarty->assign('nobans', $nobans);
																																																																																																																																																																			$smarty->assign('msg', $msg);
																																																																																																																																																																			$smarty->display('customer/banListe.tpl');
																																																																																																																																																																			exit();
																																																																																																																																																																			break;
																																																																																																																																																																			error_reporting(30719);
																																																																																																																																																																			$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																			$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																			$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																			$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																			$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																			$getspacer;
																																																																																																																																																																			error_reporting(30719);
																																																																																																																																																																			$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																			$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																			$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																			$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																			$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																			$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																			$PSession = array();
																																																																																																																																																																			$PSession['id'] = $_GET['id'];
																																																																																																																																																																			$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																			$scp = costumerNR();
																																																																																																																																																																			$connect = costumerNR();
																																																																																																																																																																			$select = costumerNR();
																																																																																																																																																																			$scp->setName('Administrator');
																																																																																																																																																																			$cgid = '';
																																																																																																																																																																			$sgid = '';
																																																																																																																																																																			$sgid = $channel['channel_icon_id'] != 100;
																																																																																																																																																																			$channel;
																																																																																																																																																																			$force = 4311;
																																																																																																																																																																			$sgruppe_del = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art;
																																																																																																																																																																			$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich gelöscht.</div>';
																																																																																																																																																																			$force = 4311;
																																																																																																																																																																			$sgruppe_del = costumerNR();
																																																																																																																																																																			$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich gelöscht.</div>';
																																																																																																																																																																			$sgname = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ';
																																																																																																																																																																			$stype = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']);
																																																																																																																																																																			$sgruppe_add = htmlspecialchars($channel['channel_maxfamilyclients']);
																																																																																																																																																																			$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';
																																																																																																																																																																			$cgname = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
																																																																																																																																																																			$scp->channelGroupAdd($cgname);
																																																																																																																																																																			$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';
																																																																																																																																																																			$msg = '<div class="alert alert-error">Es ist ein fehler Aufgetreten. Es wurden nicht alle Punkte ausgrfüllt!</div>';
																																																																																																																																																																			$servergruppen = costumerNR();

																																																																																																																																																																			$tsData;
																																																																																																																																																																			$key = costumerNR();
																																																																																																																																																																			$servergruppenliste[$key]['sgid'] = $gruppe['sgid'];
																																																																																																																																																																			$servergruppenliste[$key]['name'] = $gruppe['name'];
																																																																																																																																																																			$servergruppenliste[$key]['type'] = $gruppe['type'];
																																																																																																																																																																			$servergruppenliste[$key]['iconid'] = $gruppe['iconid'];
																																																																																																																																																																			$servergruppenliste[$key]['savedb'] = $gruppe['savedb'];

																																																																																																																																																																			$user_data;

																																																																																																																																																																			$cgruppe = costumerNR();
																																																																																																																																																																			$key = costumerNR();
																																																																																																																																																																			$channelgruppenliste[$key]['cgid'] = $cgruppe['cgid'];
																																																																																																																																																																			$channelgruppenliste[$key]['name'] = $cgruppe['name'];
																																																																																																																																																																			$channelgruppenliste[$key]['type'] = $cgruppe['type'];
																																																																																																																																																																			$channelgruppenliste[$key]['iconid'] = $cgruppe['iconid'];
																																																																																																																																																																			$channelgruppenliste[$key]['savedb'] = $cgruppe['savedb'];

																																																																																																																																																																			$smarty->assign('servergruppenliste', $servergruppenliste);
																																																																																																																																																																			$smarty->assign('channelgruppenliste', $channelgruppenliste);
																																																																																																																																																																			$smarty->assign('msg', $msg);
																																																																																																																																																																			$smarty->display('customer/groups.tpl');
																																																																																																																																																																			exit();
																																																																																																																																																																			break;
																																																																																																																																																																			$result = $sgroup['namemode'] == 1;
																																																																																																																																																																			error_reporting(30719);
																																																																																																																																																																			$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																			$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																			$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																			$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																			$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																			$result2 = $user_data['client_icon_id'] != 0;
																																																																																																																																																																			error_reporting(30719);
																																																																																																																																																																			$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																			$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																			$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																			$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																			$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																			$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																			$PSession = array();
																																																																																																																																																																			$PSession['id'] = $_GET['id'];
																																																																																																																																																																			$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																			$scp = costumerNR();
																																																																																																																																																																			$connect = sprintf('%u', $sgroup['iconid'] & 4294967295);
																																																																																																																																																																			$sgroup;
																																																																																																																																																																			$scp->setName('Administrator');
																																																																																																																																																																			$sgrouplist = $sgroup['iconid'] == 600;
																																																																																																																																																																			$cgrouplist = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port;
																																																																																																																																																																			$channellist = costumerNR();
																																																																																																																																																																			$msg = '<div class="alert alert-success">aaa' . b604 . '</div>';
																																																																																																																																																																			$scp->tokenDelete($_POST['token']);

																																																																																																																																																																			$msg = '<div class="alert alert-error">yyy' . b605 . '</div>';
																																																																																																																																																																			$_POST['tokid2'] = 0;
																																																																																																																																																																			$msg = 'kein channel';
																																																																																																																																																																			$tokenid1 = $tokenid1 = costumerNR();
																																																																																																																																																																			$tokens = '';
																																																																																																																																																																			$i = 4311;
																																																																																																																																																																			$token_add = costumerNR();
																																																																																																																																																																			$tokens .= $token_add['data']['token'] . '<br />';
																																																																																																																																																																			$i = 4310;
																																																																																																																																																																			$msg = '<div class="alert alert-error">' . $token_add['errors'][$i] . '</div>';
																																																																																																																																																																			++$i;
																																																																																																																																																																			break;
																																																																																																																																																																			++$i;
																																																																																																																																																																			$msg = '<div class="alert alert-success">Berechtigungsschlüssel wurde erfolgreich erstellt!<br>' . $tokens . '</div>';
																																																																																																																																																																			$tokenliste = '';
																																																																																																																																																																			$x = 4310;

																																																																																																																																																																			$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';
																																																																																																																																																																			$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																																			$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																																			$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																																			$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																																			$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																																			$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																																			$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																																			++$x;

																																																																																																																																																																			$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																																			$x = 4310;

																																																																																																																																																																			$tokb = $client['client_type'] != 1;
																																																																																																																																																																			$key = costumerNR();
																																																																																																																																																																			$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																																			$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																																			$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																																			++$x;

																																																																																																																																																																			$x = 4310;

																																																																																																																																																																			$tokc = costumerNR();
																																																																																																																																																																			$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																																			$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																																			$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																																			++$x;

																																																																																																																																																																			$x = 4310;

																																																																																																																																																																			$channelliste[$x]['cid'] = $tokd['cid'];
																																																																																																																																																																			$channelliste[$x]['channel_name'] = $tokd['channel_name'];
																																																																																																																																																																			++$x;

																																																																																																																																																																			switch ($_GET['staff']) {
																																																																																																																																																																			}

																																																																																																																																																																			switch ($_GET['act']) {
																																																																																																																																																																			}

																																																																																																																																																																			switch ($_GET['site']) {
																																																																																																																																																																			}

																																																																																																																																																																			$smarty->assign('tokenliste', $tokenliste);
																																																																																																																																																																			$smarty->assign('RegisterData', 'msg');
																																																																																																																																																																			$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																																																																			$smarty->assign('servergroupliste', $servergroupliste);
																																																																																																																																																																			$smarty->assign('channelliste', $channelliste);
																																																																																																																																																																			$smarty->assign('msg', $msg);
																																																																																																																																																																			$smarty->display('customer/token.tpl');
																																																																																																																																																																			exit();
																																																																																																																																																																			break;
																																																																																																																																																																			$result = costumerNR();
																																																																																																																																																																			error_reporting(30719);
																																																																																																																																																																			$myADM['serverID'] = $row['serverID'];
																																																																																																																																																																			$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																																			$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																																			$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																																			$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																																			$result2 = costumerNR();
																																																																																																																																																																			error_reporting(30719);
																																																																																																																																																																			$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																																			$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																																			$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																																			$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																																			$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																																			$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																																			$PSession = array();
																																																																																																																																																																			$PSession['id'] = $_GET['id'];
																																																																																																																																																																			$PSession['staff'] = $_GET['staff'];
																																																																																																																																																																			$scp = costumerNR();
																																																																																																																																																																			$connect = costumerNR();
																																																																																																																																																																			$select = $row = costumerNR();
																																																																																																																																																																			$scp->setName('Administrator');
																																																																																																																																																																			$smarty->assign('msg', $msg);
																																																																																																																																																																			$smarty->display('customer/backup.tpl');
																																																																																																																																																																			exit();
																																																																																																																																																																			$smarty->assign('msg', $msg);
																																																																																																																																																																			$smarty->display('customer/myproducts_adm.tpl');
																																																																																																																																																																			exit();
																																																																																																																																																																			$smarty->assign('msg', $msg);
																																																																																																																																																																			$smarty->display('customer/myproducts.tpl');
																																																																																																																																																																			exit();
																																																																																																																																																																			$smarty->assign('userNumber', $MyData['userNumber']);
																																																																																																																																																																			$smarty->assign('RegisterData', $MyData['RegisterData']);
																																																																																																																																																																		}
																																																																																																																																																																	}
																																																																																																																																																																}
																																																																																																																																																															}
																																																																																																																																																														}
																																																																																																																																																														else {
																																																																																																																																																															$scp->banDelete($banID);
																																																																																																																																																															$msg = '<div class=\'alert alert-success\'>Ban wurde erfolgreich gelöscht!</div>';

																																																																																																																																																															$msg = '<div class=\'alert alert-error\'>Error</div>';
																																																																																																																																																															$scp->banDeleteAll();
																																																																																																																																																															$msg = '<div class=\'alert alert-success\'>Bans wurden erfolgreich gelöscht!</div>';

																																																																																																																																																															$msg = '<div class=\'alert alert-error\'>Error</div>';
																																																																																																																																																															$scp->BanAddByIp($_POST['ip'], $_POST['time'], $_POST['grund']);
																																																																																																																																																															$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																															$scp->BanAddByUid($_POST['ip'], $_POST['time'], $_POST['grund']);
																																																																																																																																																															$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																															$scp->BanAddByName($_POST['user'], $_POST['time'], $_POST['grund']);
																																																																																																																																																															$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																															$msg = '<div class=\'alert alert-error\'>Nicht alle Felder ausgefüllt</div>';
																																																																																																																																																															$banliste = '';
																																																																																																																																																															$nobans = '';
																																																																																																																																																															$banlist = costumerNR();
																																																																																																																																																															$x = 4310;

																																																																																																																																																															$ban = $i < count($tsData['sgroups']);
																																																																																																																																																															$banliste[$x]['banid'] = $ban['banid'];
																																																																																																																																																															$banliste[$x]['ip'] = $ban['ip'];
																																																																																																																																																															$banliste[$x]['name'] = $ban['name'];
																																																																																																																																																															$banliste[$x]['uid'] = $ban['uid'];
																																																																																																																																																															$banliste[$x]['created'] = date('d.m.Y', $ban['created']);
																																																																																																																																																															$banliste[$x]['duration'] = sec2time($ban['duration']);
																																																																																																																																																															$banliste[$x]['duration'] = 'Permanent';

																																																																																																																																																															$banliste[$x]['duration'] = sec2time($ban['duration']);
																																																																																																																																																															$banliste[$x]['invokername'] = $ban['invokername'];
																																																																																																																																																															$banliste[$x]['invokercldbid'] = $ban['invokercldbid'];
																																																																																																																																																															$banliste[$x]['invokeruid'] = $ban['invokeruid'];
																																																																																																																																																															$banliste[$x]['reason'] = $ban['reason'];
																																																																																																																																																															++$x;
																																																																																																																																																															$msg = '<div class="alert alert-warning">Derzeit sind keine Banns vorhanden!</div>';
																																																																																																																																																															$smarty->assign('banliste', $banliste);
																																																																																																																																																															$smarty->assign('nobans', $nobans);
																																																																																																																																																															$smarty->assign('msg', $msg);
																																																																																																																																																															$smarty->display('customer/banListe.tpl');
																																																																																																																																																															exit();
																																																																																																																																																															break;
																																																																																																																																																															error_reporting(30719);
																																																																																																																																																															$myADM['serverID'] = $row['serverID'];
																																																																																																																																																															$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																															$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																															$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																															$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																															$getspacer;
																																																																																																																																																															error_reporting(30719);
																																																																																																																																																															$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																															$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																															$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																															$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																															$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																															$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																															$PSession = array();
																																																																																																																																																															$PSession['id'] = $_GET['id'];
																																																																																																																																																															$PSession['staff'] = $_GET['staff'];
																																																																																																																																																															$scp = costumerNR();
																																																																																																																																																															$connect = costumerNR();
																																																																																																																																																															$select = costumerNR();
																																																																																																																																																															$scp->setName('Administrator');
																																																																																																																																																															$cgid = '';
																																																																																																																																																															$sgid = '';
																																																																																																																																																															$sgid = $channel['channel_icon_id'] != 100;
																																																																																																																																																															$channel;
																																																																																																																																																															$force = 4311;
																																																																																																																																																															$sgruppe_del = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art;
																																																																																																																																																															$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich gelöscht.</div>';
																																																																																																																																																															$force = 4311;
																																																																																																																																																															$sgruppe_del = costumerNR();
																																																																																																																																																															$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich gelöscht.</div>';
																																																																																																																																																															$sgname = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ';
																																																																																																																																																															$stype = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']);
																																																																																																																																																															$sgruppe_add = htmlspecialchars($channel['channel_maxfamilyclients']);
																																																																																																																																																															$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';
																																																																																																																																																															$cgname = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
																																																																																																																																																															$scp->channelGroupAdd($cgname);
																																																																																																																																																															$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';
																																																																																																																																																															$msg = '<div class="alert alert-error">Es ist ein fehler Aufgetreten. Es wurden nicht alle Punkte ausgrfüllt!</div>';
																																																																																																																																																															$servergruppen = costumerNR();

																																																																																																																																																															$tsData;
																																																																																																																																																															$key = costumerNR();
																																																																																																																																																															$servergruppenliste[$key]['sgid'] = $gruppe['sgid'];
																																																																																																																																																															$servergruppenliste[$key]['name'] = $gruppe['name'];
																																																																																																																																																															$servergruppenliste[$key]['type'] = $gruppe['type'];
																																																																																																																																																															$servergruppenliste[$key]['iconid'] = $gruppe['iconid'];
																																																																																																																																																															$servergruppenliste[$key]['savedb'] = $gruppe['savedb'];

																																																																																																																																																															$user_data;

																																																																																																																																																															$cgruppe = costumerNR();
																																																																																																																																																															$key = costumerNR();
																																																																																																																																																															$channelgruppenliste[$key]['cgid'] = $cgruppe['cgid'];
																																																																																																																																																															$channelgruppenliste[$key]['name'] = $cgruppe['name'];
																																																																																																																																																															$channelgruppenliste[$key]['type'] = $cgruppe['type'];
																																																																																																																																																															$channelgruppenliste[$key]['iconid'] = $cgruppe['iconid'];
																																																																																																																																																															$channelgruppenliste[$key]['savedb'] = $cgruppe['savedb'];
																																																																																																																																																														}
																																																																																																																																																													}
																																																																																																																																																													else {
																																																																																																																																																														$channelgruppenliste[$key]['name'] = $cgruppe['name'];
																																																																																																																																																														$channelgruppenliste[$key]['type'] = $cgruppe['type'];
																																																																																																																																																														$channelgruppenliste[$key]['iconid'] = $cgruppe['iconid'];
																																																																																																																																																														$channelgruppenliste[$key]['savedb'] = $cgruppe['savedb'];
																																																																																																																																																														$smarty->assign('servergruppenliste', $servergruppenliste);
																																																																																																																																																														$smarty->assign('channelgruppenliste', $channelgruppenliste);
																																																																																																																																																														$smarty->assign('msg', $msg);
																																																																																																																																																														$smarty->display('customer/groups.tpl');
																																																																																																																																																														exit();
																																																																																																																																																														break;
																																																																																																																																																														$result = $sgroup['namemode'] == 1;
																																																																																																																																																														error_reporting(30719);
																																																																																																																																																														$myADM['serverID'] = $row['serverID'];
																																																																																																																																																														$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																														$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																														$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																														$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																														$result2 = $user_data['client_icon_id'] != 0;
																																																																																																																																																														error_reporting(30719);
																																																																																																																																																														$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																														$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																														$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																														$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																														$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																														$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																														$PSession = array();
																																																																																																																																																														$PSession['id'] = $_GET['id'];
																																																																																																																																																														$PSession['staff'] = $_GET['staff'];
																																																																																																																																																														$scp = costumerNR();
																																																																																																																																																														$connect = sprintf('%u', $sgroup['iconid'] & 4294967295);
																																																																																																																																																														$sgroup;
																																																																																																																																																														$scp->setName('Administrator');
																																																																																																																																																														$sgrouplist = $sgroup['iconid'] == 600;
																																																																																																																																																														$cgrouplist = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port;
																																																																																																																																																														$channellist = costumerNR();
																																																																																																																																																													}
																																																																																																																																																												}
																																																																																																																																																											}
																																																																																																																																																										}
																																																																																																																																																										else {
																																																																																																																																																											$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																											$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																											$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																											$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																											$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																											$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																											$PSession = array();
																																																																																																																																																											$PSession['id'] = $_GET['id'];

																																																																																																																																																											$PSession['staff'] = $_GET['staff'];
																																																																																																																																																											$scp = costumerNR();
																																																																																																																																																											$connect = $s_port . '-';
																																																																																																																																																											$select = !in_array($s_port . '-' . $file['name'], $icon_arr);
																																																																																																																																																											$scp->setName('Administrator');
																																																																																																																																																											$scp->banDelete($banID);
																																																																																																																																																											$msg = '<div class=\'alert alert-success\'>Ban wurde erfolgreich gelöscht!</div>';

																																																																																																																																																											$msg = '<div class=\'alert alert-error\'>Error</div>';
																																																																																																																																																											$scp->banDeleteAll();
																																																																																																																																																											$msg = '<div class=\'alert alert-success\'>Bans wurden erfolgreich gelöscht!</div>';

																																																																																																																																																											$msg = '<div class=\'alert alert-error\'>Error</div>';
																																																																																																																																																											$scp->BanAddByIp($_POST['ip'], $_POST['time'], $_POST['grund']);
																																																																																																																																																											$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																											$scp->BanAddByUid($_POST['ip'], $_POST['time'], $_POST['grund']);
																																																																																																																																																											$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																											$scp->BanAddByName($_POST['user'], $_POST['time'], $_POST['grund']);
																																																																																																																																																											$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																											$msg = '<div class=\'alert alert-error\'>Nicht alle Felder ausgefüllt</div>';
																																																																																																																																																											$banliste = '';
																																																																																																																																																											$nobans = '';
																																																																																																																																																											$banlist = costumerNR();
																																																																																																																																																											$x = 4310;

																																																																																																																																																											$ban = $i < count($tsData['sgroups']);
																																																																																																																																																											$banliste[$x]['banid'] = $ban['banid'];
																																																																																																																																																											$banliste[$x]['ip'] = $ban['ip'];
																																																																																																																																																											$banliste[$x]['name'] = $ban['name'];
																																																																																																																																																											$banliste[$x]['uid'] = $ban['uid'];
																																																																																																																																																											$banliste[$x]['created'] = date('d.m.Y', $ban['created']);
																																																																																																																																																											$banliste[$x]['duration'] = sec2time($ban['duration']);
																																																																																																																																																											$banliste[$x]['duration'] = 'Permanent';

																																																																																																																																																											$banliste[$x]['duration'] = sec2time($ban['duration']);
																																																																																																																																																											$banliste[$x]['invokername'] = $ban['invokername'];
																																																																																																																																																											$banliste[$x]['invokercldbid'] = $ban['invokercldbid'];
																																																																																																																																																											$banliste[$x]['invokeruid'] = $ban['invokeruid'];
																																																																																																																																																											$banliste[$x]['reason'] = $ban['reason'];
																																																																																																																																																											++$x;
																																																																																																																																																											$msg = '<div class="alert alert-warning">Derzeit sind keine Banns vorhanden!</div>';
																																																																																																																																																											$smarty->assign('banliste', $banliste);
																																																																																																																																																											$smarty->assign('nobans', $nobans);
																																																																																																																																																											$smarty->assign('msg', $msg);
																																																																																																																																																											$smarty->display('customer/banListe.tpl');
																																																																																																																																																											exit();
																																																																																																																																																											break;
																																																																																																																																																											error_reporting(30719);
																																																																																																																																																											$myADM['serverID'] = $row['serverID'];
																																																																																																																																																											$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																											$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																											$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																											$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																											$getspacer;
																																																																																																																																																											error_reporting(30719);
																																																																																																																																																											$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																											$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																											$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																											$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																											$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																											$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																											$PSession = array();
																																																																																																																																																											$PSession['id'] = $_GET['id'];
																																																																																																																																																											$PSession['staff'] = $_GET['staff'];
																																																																																																																																																											$scp = costumerNR();
																																																																																																																																																											$connect = costumerNR();
																																																																																																																																																											$select = costumerNR();
																																																																																																																																																											$scp->setName('Administrator');
																																																																																																																																																											$cgid = '';
																																																																																																																																																											$sgid = '';
																																																																																																																																																											$sgid = $channel['channel_icon_id'] != 100;
																																																																																																																																																											$channel;
																																																																																																																																																											$force = 4311;
																																																																																																																																																											$sgruppe_del = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art;
																																																																																																																																																											$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich gelöscht.</div>';
																																																																																																																																																											$force = 4311;
																																																																																																																																																											$sgruppe_del = costumerNR();
																																																																																																																																																											$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich gelöscht.</div>';
																																																																																																																																																											$sgname = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ';
																																																																																																																																																											$stype = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']);
																																																																																																																																																											$sgruppe_add = htmlspecialchars($channel['channel_maxfamilyclients']);
																																																																																																																																																											$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';
																																																																																																																																																											$cgname = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
																																																																																																																																																											$scp->channelGroupAdd($cgname);
																																																																																																																																																											$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';
																																																																																																																																																											$msg = '<div class="alert alert-error">Es ist ein fehler Aufgetreten. Es wurden nicht alle Punkte ausgrfüllt!</div>';
																																																																																																																																																											$servergruppen = costumerNR();

																																																																																																																																																											$tsData;
																																																																																																																																																											$key = costumerNR();
																																																																																																																																																											$servergruppenliste[$key]['sgid'] = $gruppe['sgid'];
																																																																																																																																																											$servergruppenliste[$key]['name'] = $gruppe['name'];
																																																																																																																																																											$servergruppenliste[$key]['type'] = $gruppe['type'];
																																																																																																																																																											$servergruppenliste[$key]['iconid'] = $gruppe['iconid'];
																																																																																																																																																											$servergruppenliste[$key]['savedb'] = $gruppe['savedb'];

																																																																																																																																																											$user_data;

																																																																																																																																																											$cgruppe = costumerNR();
																																																																																																																																																											$key = costumerNR();
																																																																																																																																																											$channelgruppenliste[$key]['cgid'] = $cgruppe['cgid'];
																																																																																																																																																											$channelgruppenliste[$key]['name'] = $cgruppe['name'];
																																																																																																																																																											$channelgruppenliste[$key]['type'] = $cgruppe['type'];
																																																																																																																																																											$channelgruppenliste[$key]['iconid'] = $cgruppe['iconid'];
																																																																																																																																																											$channelgruppenliste[$key]['savedb'] = $cgruppe['savedb'];

																																																																																																																																																											$smarty->assign('servergruppenliste', $servergruppenliste);
																																																																																																																																																											$smarty->assign('channelgruppenliste', $channelgruppenliste);
																																																																																																																																																											$smarty->assign('msg', $msg);
																																																																																																																																																											$smarty->display('customer/groups.tpl');
																																																																																																																																																											exit();
																																																																																																																																																											break;
																																																																																																																																																											$result = $sgroup['namemode'] == 1;
																																																																																																																																																											error_reporting(30719);
																																																																																																																																																											$myADM['serverID'] = $row['serverID'];
																																																																																																																																																											$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																											$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																											$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																											$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																											$result2 = $user_data['client_icon_id'] != 0;
																																																																																																																																																											error_reporting(30719);
																																																																																																																																																											$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																											$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																											$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																											$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																											$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																											$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																											$PSession = array();
																																																																																																																																																											$PSession['id'] = $_GET['id'];
																																																																																																																																																											$PSession['staff'] = $_GET['staff'];
																																																																																																																																																											$scp = costumerNR();
																																																																																																																																																											$connect = sprintf('%u', $sgroup['iconid'] & 4294967295);
																																																																																																																																																											$sgroup;
																																																																																																																																																											$scp->setName('Administrator');
																																																																																																																																																											$sgrouplist = $sgroup['iconid'] == 600;
																																																																																																																																																											$cgrouplist = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port;
																																																																																																																																																											$channellist = costumerNR();
																																																																																																																																																											$msg = '<div class="alert alert-success">aaa' . b604 . '</div>';
																																																																																																																																																											$scp->tokenDelete($_POST['token']);

																																																																																																																																																											$msg = '<div class="alert alert-error">yyy' . b605 . '</div>';
																																																																																																																																																											$_POST['tokid2'] = 0;
																																																																																																																																																											$msg = 'kein channel';
																																																																																																																																																											$tokenid1 = $tokenid1 = costumerNR();
																																																																																																																																																											$tokens = '';
																																																																																																																																																											$i = 4311;
																																																																																																																																																											$token_add = costumerNR();
																																																																																																																																																											$tokens .= $token_add['data']['token'] . '<br />';
																																																																																																																																																											$i = 4310;
																																																																																																																																																											$msg = '<div class="alert alert-error">' . $token_add['errors'][$i] . '</div>';
																																																																																																																																																											++$i;
																																																																																																																																																											break;
																																																																																																																																																											++$i;
																																																																																																																																																											$msg = '<div class="alert alert-success">Berechtigungsschlüssel wurde erfolgreich erstellt!<br>' . $tokens . '</div>';
																																																																																																																																																											$tokenliste = '';
																																																																																																																																																											$x = 4310;

																																																																																																																																																											$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';
																																																																																																																																																											$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																											$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																											$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																											$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																											$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																											$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																											$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																											++$x;
																																																																																																																																																										}
																																																																																																																																																									}
																																																																																																																																																									else {
																																																																																																																																																										$tokenliste[$x]['token_description']['token_description'] = $tok['token_description'];
																																																																																																																																																										++$x;
																																																																																																																																																										$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																										$x = 4310;

																																																																																																																																																										$tokb = $client['client_type'] != 1;
																																																																																																																																																										$key = costumerNR();
																																																																																																																																																										$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																										$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																										$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																										++$x;

																																																																																																																																																										$x = 4310;
																																																																																																																																																									}
																																																																																																																																																								}
																																																																																																																																																							}
																																																																																																																																																						}
																																																																																																																																																					}
																																																																																																																																																				}
																																																																																																																																																			}
																																																																																																																																																			else {
																																																																																																																																																				$scp->banDelete($banID);
																																																																																																																																																				$msg = '<div class=\'alert alert-success\'>Ban wurde erfolgreich gelöscht!</div>';

																																																																																																																																																				$msg = '<div class=\'alert alert-error\'>Error</div>';
																																																																																																																																																				$scp->banDeleteAll();
																																																																																																																																																				$msg = '<div class=\'alert alert-success\'>Bans wurden erfolgreich gelöscht!</div>';

																																																																																																																																																				$msg = '<div class=\'alert alert-error\'>Error</div>';
																																																																																																																																																			}
																																																																																																																																																		}
																																																																																																																																																	}
																																																																																																																																																	else {
																																																																																																																																																		$connect = mysql_escape_string($MyData['userName']);
																																																																																																																																																		$select = costumerNR();
																																																																																																																																																		$cuserid = (mysql_escape_string($_POST['ticketText']));
																																																																																																																																																		$userloeschen = ($_POST['ticketPrio']);
																																																																																																																																																		$msg = '<div class="alert alert-success">User wurde erfolgreich gelöscht</div>';
																																																																																																																																																		$userlist = mysql_escape_string($_POST['ticketStatus']);

																																																																																																																																																		$list = mysql_query( . 'INSERT INTO cms_tickets (ticketApteilID, ticketProductID, ticketUserNumber, ticketUserName, ticketUserEmail, ticketBetreff, ticketText, ticketData, prioritaet, ticketStatus) VALUES (\'1\',\'' . $ticketProductID . '\',\'' . $ticketUserNumber . '\',\'' . $ticketUserName . '\',\'' . $ticketUserEmail . '\',\'' . $ticketBetreff . '\',\'' . $ticketText . '\',\'' . $ticketData . '\',\'' . $prioritaet . '\',\'0\')');
																																																																																																																																																		$userlist['clid'] = $list['clid'];
																																																																																																																																																		$userlist['cid'] = $list['cid'];

																																																																																																																																																		$userliste = 'Der Kunde [' . $ticketUserName . '] erstellte am ' . date('d.m.Y / H:i:s', time());
																																																																																																																																																		$x = 4310;

																																																																																																																																																		$user = costumerNR();

																																																																																																																																																		$listdbuser[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																		$listdbuser[$x]['cldbid'] = $user['cldbid'];
																																																																																																																																																		$cldbid[$x]['cldbid'] = $user['cldbid'];
																																																																																																																																																		$listdbuser[$x]['client_unique_identifier'] = $user['client_unique_identifier'];
																																																																																																																																																		$listdbuser[$x]['client_nickname'] = $user['client_nickname'];
																																																																																																																																																		$listdbuser[$x]['client_created'] = $user['client_created'];
																																																																																																																																																		$listdbuser[$x]['client_lastconnected'] = $user['client_lastconnected'];
																																																																																																																																																		$listdbuser[$x]['status'] = '<img src="resurces/img/online.png" alt="Details"  title="ID" />';

																																																																																																																																																		$listdbuser[$x]['status'] = '<img src="resurces/img/offline.png" alt="Details"  title="ID" />';
																																																																																																																																																		++$x;
																																																																																																																																																	}
																																																																																																																																																default:
																																																																																																																																																	$userlistinfo = costumerNR();
																																																																																																																																																	$x = 4310;

																																																																																																																																																	$user = costumerNR();
																																																																																																																																																	$listdbuser[$x]['clid'] = $user['clid'];

																																																																																																																																																	++$x;
																																																																																																																																																	$smarty->assign('listdbuser', $listdbuser);
																																																																																																																																																	$smarty->assign('msg', $msg);
																																																																																																																																																	$smarty->display('customer/userListe.tpl');
																																																																																																																																																	exit();
																																																																																																																																																	break;
																																																																																																																																																	$result = costumerNR();
																																																																																																																																																	$smarty->assign(30719);

																																																																																																																																																	$myADM['serverID'] = $row['serverID'];
																																																																																																																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																	$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																	$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																	error_reporting(30719);
																																																																																																																																																	$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																	$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																	$PSession = array();
																																																																																																																																																	$PSession['id'] = $_GET['id'];
																																																																																																																																																	$PSession['staff'] = $_GET['staff'];
																																																																																																																																																	$scp = costumerNR();
																																																																																																																																																	$connect = costumerNR();
																																																																																																																																																	$select = costumerNR();
																																																																																																																																																	$complainlist = costumerNR();
																																																																																																																																																	$x = 4310;

																																																																																																																																																	$since = ($_GET['id']);
																																																																																																																																																	$x = costumerNR();
																																																																																																																																																	$newcomplainlist[$x]['tcldbid'] = $since['tcldbid'];
																																																																																																																																																	$newcomplainlist[$x]['tname'] = $since['tname'];
																																																																																																																																																	$newcomplainlist[$x]['fcldbid'] = $since['fcldbid'];
																																																																																																																																																	$newcomplainlist[$x]['fname'] = $since['fname'];
																																																																																																																																																	$newcomplainlist[$x]['message'] = $since['message'];
																																																																																																																																																	$newcomplainlist[$x]['timestamp'] = $since['timestamp'];
																																																																																																																																																	++$x;

																																																																																																																																																	$msg = '<div class="alert alert-warning">Derzeit sind keine Berschwerden vorhanden!</div>';
																																																																																																																																																	$smarty->assign('newcomplainlist', isset($newcomplainlist));
																																																																																																																																																	$smarty->assign('msg', $msg);

																																																																																																																																																	$smarty->display('customer/beschwerdeListe.tpl');
																																																																																																																																																	exit();
																																																																																																																																																	break;
																																																																																																																																																	$result = costumerNR();
																																																																																																																																																	error_reporting(30719);
																																																																																																																																																	$myADM['serverID'] = $row['serverID'];
																																																																																																																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																	$myADM['serverSid'] = $row['serverSid'];

																																																																																																																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																	$myADM['serverPort'] = $row['serverPort'];

																																																																																																																																																	$result2 = opendir($iconDir);
																																																																																																																																																	error_reporting(30719);
																																																																																																																																																	$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																	$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																	$PSession = array();
																																																																																																																																																	$PSession['id'] = $_GET['id'];

																																																																																																																																																	$PSession['staff'] = $_GET['staff'];
																																																																																																																																																	$scp = costumerNR();
																																																																																																																																																	$connect = $s_port . '-';
																																																																																																																																																	$select = !in_array($s_port . '-' . $file['name'], $icon_arr);
																																																																																																																																																	$scp->setName('Administrator');
																																																																																																																																																	$scp->banDelete($banID);
																																																																																																																																																	$msg = '<div class=\'alert alert-success\'>Ban wurde erfolgreich gelöscht!</div>';
																																																																																																																																																	$msg = '<div class=\'alert alert-error\'>Error</div>';
																																																																																																																																																	$scp->banDeleteAll();
																																																																																																																																																	$msg = '<div class=\'alert alert-success\'>Bans wurden erfolgreich gelöscht!</div>';

																																																																																																																																																	$msg = '<div class=\'alert alert-error\'>Error</div>';
																																																																																																																																																	$scp->BanAddByIp($_POST['ip'], $_POST['time'], $_POST['grund']);
																																																																																																																																																	$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																	$scp->BanAddByUid($_POST['ip'], $_POST['time'], $_POST['grund']);
																																																																																																																																																	$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																	$scp->BanAddByName($_POST['user'], $_POST['time'], $_POST['grund']);
																																																																																																																																																	$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																																	$msg = '<div class=\'alert alert-error\'>Nicht alle Felder ausgefüllt</div>';
																																																																																																																																																	$banliste = '';
																																																																																																																																																	$nobans = '';
																																																																																																																																																	$banlist = costumerNR();
																																																																																																																																																	$x = 4310;

																																																																																																																																																	$ban = $i < count($tsData['sgroups']);
																																																																																																																																																	$banliste[$x]['banid'] = $ban['banid'];
																																																																																																																																																	$banliste[$x]['ip'] = $ban['ip'];
																																																																																																																																																	$banliste[$x]['name'] = $ban['name'];
																																																																																																																																																	$banliste[$x]['uid'] = $ban['uid'];
																																																																																																																																																	$banliste[$x]['created'] = date('d.m.Y', $ban['created']);
																																																																																																																																																	$banliste[$x]['duration'] = sec2time($ban['duration']);
																																																																																																																																																	$banliste[$x]['duration'] = 'Permanent';

																																																																																																																																																	$banliste[$x]['duration'] = sec2time($ban['duration']);
																																																																																																																																																	$banliste[$x]['invokername'] = $ban['invokername'];
																																																																																																																																																	$banliste[$x]['invokercldbid'] = $ban['invokercldbid'];
																																																																																																																																																	$banliste[$x]['invokeruid'] = $ban['invokeruid'];
																																																																																																																																																	$banliste[$x]['reason'] = $ban['reason'];
																																																																																																																																																	++$x;
																																																																																																																																																	$msg = '<div class="alert alert-warning">Derzeit sind keine Banns vorhanden!</div>';
																																																																																																																																																	$smarty->assign('banliste', $banliste);
																																																																																																																																																	$smarty->assign('nobans', $nobans);
																																																																																																																																																	$smarty->assign('msg', $msg);
																																																																																																																																																	$smarty->display('customer/banListe.tpl');
																																																																																																																																																	exit();
																																																																																																																																																	break;
																																																																																																																																																	error_reporting(30719);
																																																																																																																																																	$myADM['serverID'] = $row['serverID'];
																																																																																																																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																	$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																	$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																	$getspacer;
																																																																																																																																																	error_reporting(30719);
																																																																																																																																																	$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																	$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																	$PSession = array();
																																																																																																																																																	$PSession['id'] = $_GET['id'];
																																																																																																																																																	$PSession['staff'] = $_GET['staff'];
																																																																																																																																																	$scp = costumerNR();
																																																																																																																																																	$connect = costumerNR();
																																																																																																																																																	$select = costumerNR();
																																																																																																																																																	$scp->setName('Administrator');
																																																																																																																																																	$cgid = '';
																																																																																																																																																	$sgid = '';
																																																																																																																																																	$sgid = $channel['channel_icon_id'] != 100;
																																																																																																																																																	$channel;
																																																																																																																																																	$force = 4311;
																																																																																																																																																	$sgruppe_del = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $channel['channel_icon_id'] . '.png" width="16" height="16" /></div>' . $channel_art;
																																																																																																																																																	$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich gelöscht.</div>';
																																																																																																																																																	$force = 4311;
																																																																																																																																																	$sgruppe_del = costumerNR();
																																																																																																																																																	$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich gelöscht.</div>';
																																																																																																																																																	$sgname = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ';
																																																																																																																																																	$stype = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']);
																																																																																																																																																	$sgruppe_add = htmlspecialchars($channel['channel_maxfamilyclients']);
																																																																																																																																																	$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';
																																																																																																																																																	$cgname = '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . htmlspecialchars($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
																																																																																																																																																	$scp->channelGroupAdd($cgname);
																																																																																																																																																	$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';
																																																																																																																																																	$msg = '<div class="alert alert-error">Es ist ein fehler Aufgetreten. Es wurden nicht alle Punkte ausgrfüllt!</div>';
																																																																																																																																																	$servergruppen = costumerNR();

																																																																																																																																																	$tsData;
																																																																																																																																																	$key = costumerNR();
																																																																																																																																																	$servergruppenliste[$key]['sgid'] = $gruppe['sgid'];
																																																																																																																																																	$servergruppenliste[$key]['name'] = $gruppe['name'];
																																																																																																																																																	$servergruppenliste[$key]['type'] = $gruppe['type'];
																																																																																																																																																	$servergruppenliste[$key]['iconid'] = $gruppe['iconid'];
																																																																																																																																																	$servergruppenliste[$key]['savedb'] = $gruppe['savedb'];

																																																																																																																																																	$user_data;

																																																																																																																																																	$cgruppe = costumerNR();
																																																																																																																																																	$key = costumerNR();
																																																																																																																																																	$channelgruppenliste[$key]['cgid'] = $cgruppe['cgid'];
																																																																																																																																																	$channelgruppenliste[$key]['name'] = $cgruppe['name'];
																																																																																																																																																	$channelgruppenliste[$key]['type'] = $cgruppe['type'];
																																																																																																																																																	$channelgruppenliste[$key]['iconid'] = $cgruppe['iconid'];
																																																																																																																																																	$channelgruppenliste[$key]['savedb'] = $cgruppe['savedb'];

																																																																																																																																																	$smarty->assign('servergruppenliste', $servergruppenliste);
																																																																																																																																																	$smarty->assign('channelgruppenliste', $channelgruppenliste);
																																																																																																																																																	$smarty->assign('msg', $msg);
																																																																																																																																																	$smarty->display('customer/groups.tpl');
																																																																																																																																																	exit();
																																																																																																																																																	break;
																																																																																																																																																	$result = $sgroup['namemode'] == 1;
																																																																																																																																																	error_reporting(30719);
																																																																																																																																																	$myADM['serverID'] = $row['serverID'];
																																																																																																																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																	$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																	$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																	$result2 = $user_data['client_icon_id'] != 0;
																																																																																																																																																	error_reporting(30719);
																																																																																																																																																	$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																	$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																	$PSession = array();
																																																																																																																																																	$PSession['id'] = $_GET['id'];
																																																																																																																																																	$PSession['staff'] = $_GET['staff'];
																																																																																																																																																	$scp = costumerNR();
																																																																																																																																																	$connect = sprintf('%u', $sgroup['iconid'] & 4294967295);
																																																																																																																																																	$sgroup;
																																																																																																																																																	$scp->setName('Administrator');
																																																																																																																																																	$sgrouplist = $sgroup['iconid'] == 600;
																																																																																																																																																	$cgrouplist = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port;
																																																																																																																																																	$channellist = costumerNR();
																																																																																																																																																	$msg = '<div class="alert alert-success">aaa' . b604 . '</div>';
																																																																																																																																																	$scp->tokenDelete($_POST['token']);

																																																																																																																																																	$msg = '<div class="alert alert-error">yyy' . b605 . '</div>';
																																																																																																																																																	$_POST['tokid2'] = 0;
																																																																																																																																																	$msg = 'kein channel';
																																																																																																																																																	$tokenid1 = $tokenid1 = costumerNR();
																																																																																																																																																	$tokens = '';
																																																																																																																																																	$i = 4311;
																																																																																																																																																	$token_add = costumerNR();
																																																																																																																																																	$tokens .= $token_add['data']['token'] . '<br />';
																																																																																																																																																	$i = 4310;
																																																																																																																																																	$msg = '<div class="alert alert-error">' . $token_add['errors'][$i] . '</div>';
																																																																																																																																																	++$i;
																																																																																																																																																	break;
																																																																																																																																																	++$i;
																																																																																																																																																	$msg = '<div class="alert alert-success">Berechtigungsschlüssel wurde erfolgreich erstellt!<br>' . $tokens . '</div>';
																																																																																																																																																	$tokenliste = '';
																																																																																																																																																	$x = 4310;

																																																																																																																																																	$tok = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ';
																																																																																																																																																	$tokenliste[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																																	$tokenliste[$x]['token'] = $tok['token'];
																																																																																																																																																	$tokenliste[$x]['token_type'] = $tok['token_type'];
																																																																																																																																																	$tokenliste[$x]['token_id1'] = $tok['token_id1'];
																																																																																																																																																	$tokenliste[$x]['token_id2'] = $tok['token_id2'];
																																																																																																																																																	$tokenliste[$x]['token_created'] = $tok['token_created'];
																																																																																																																																																	$tokenliste[$x]['token_description'] = $tok['token_description'];
																																																																																																																																																	++$x;

																																																																																																																																																	$msg = '<div class="alert alert-warning">xxxx</div>';
																																																																																																																																																	$x = 4310;

																																																																																																																																																	$tokb = $client['client_type'] != 1;
																																																																																																																																																	$key = costumerNR();
																																																																																																																																																	$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																																																	$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																																																	$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																																																	++$x;

																																																																																																																																																	$x = 4310;

																																																																																																																																																	$tokc = costumerNR();
																																																																																																																																																	$channelgroupliste[$x]['cgid'] = $tokc['cgid'];
																																																																																																																																																	$channelgroupliste[$x]['name'] = $tokc['name'];
																																																																																																																																																	$channelgroupliste[$x]['type'] = $tokc['type'];
																																																																																																																																																	++$x;

																																																																																																																																																	$x = 4310;

																																																																																																																																																	$channelliste[$x]['cid'] = $tokd['cid'];
																																																																																																																																																	$channelliste[$x]['channel_name'] = $tokd['channel_name'];
																																																																																																																																																	++$x;

																																																																																																																																																	$smarty->assign('tokenliste', $tokenliste);
																																																																																																																																																	$smarty->assign(, 'msg');
																																																																																																																																																	$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																																																	$smarty->assign('servergroupliste', $servergroupliste);
																																																																																																																																																	$smarty->assign('channelliste', $channelliste);
																																																																																																																																																	$smarty->assign('msg', $msg);
																																																																																																																																																	$smarty->display('customer/token.tpl');
																																																																																																																																																	exit();
																																																																																																																																																	break;
																																																																																																																																																	$result = costumerNR();
																																																																																																																																																	error_reporting(30719);
																																																																																																																																																	$myADM['serverID'] = $row['serverID'];
																																																																																																																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																																	$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																																	$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																																	$result2 = costumerNR();
																																																																																																																																																	error_reporting(30719);
																																																																																																																																																	$myADM['hostID'] = $row2['hostID'];
																																																																																																																																																	$myADM['hostName'] = $row2['hostName'];
																																																																																																																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																																	$PSession = array();
																																																																																																																																																	$PSession['id'] = $_GET['id'];
																																																																																																																																																}
																																																																																																																																															}
																																																																																																																																														}
																																																																																																																																														else {
																																																																																																																																															$user_data;

																																																																																																																																															$cgruppe = costumerNR();
																																																																																																																																															$key = costumerNR();
																																																																																																																																															$channelgruppenliste[$key]['cgid'] = $cgruppe['cgid'];
																																																																																																																																															$channelgruppenliste[$key]['name'] = $cgruppe['name'];
																																																																																																																																															$channelgruppenliste[$key]['type'] = $cgruppe['type'];
																																																																																																																																															$channelgruppenliste[$key]['iconid'] = $cgruppe['iconid'];
																																																																																																																																															$channelgruppenliste[$key]['savedb'] = $cgruppe['savedb'];

																																																																																																																																															$smarty->assign('servergruppenliste', $servergruppenliste);
																																																																																																																																															$smarty->assign('channelgruppenliste', $channelgruppenliste);
																																																																																																																																															$smarty->assign('msg', $msg);
																																																																																																																																															$smarty->display('customer/groups.tpl');
																																																																																																																																															exit();
																																																																																																																																															break;
																																																																																																																																															$result = $sgroup['namemode'] == 1;
																																																																																																																																															error_reporting(30719);
																																																																																																																																															$myADM['serverID'] = $row['serverID'];
																																																																																																																																															$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																															$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																															$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																															$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																															$result2 = $user_data['client_icon_id'] != 0;
																																																																																																																																															error_reporting(30719);
																																																																																																																																														}
																																																																																																																																													}
																																																																																																																																												}
																																																																																																																																											}
																																																																																																																																											else {
																																																																																																																																												$db->fetch_array($_POST['user'], $_POST['time'], $_POST['grund']);
																																																																																																																																												$msg = '<div class=\'alert alert-success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																																																																																																												$msg = '<div class=\'alert alert-error\'>Nicht alle Felder ausgefüllt</div>';
																																																																																																																																												$banliste = '';
																																																																																																																																												$nobans = '';
																																																																																																																																												$banlist = costumerNR();
																																																																																																																																												$x = 4310;

																																																																																																																																												$ban = $i < count($tsData['sgroups']);
																																																																																																																																												$banliste[$x]['banid'] = $ban['banid'];
																																																																																																																																												$banliste[$x]['ip'] = $ban['ip'];
																																																																																																																																												$banliste[$x]['name'] = $ban['name'];
																																																																																																																																												$banliste[$x]['uid'] = $ban['uid'];
																																																																																																																																												$banliste[$x]['created'] = date('d.m.Y', $ban['created']);
																																																																																																																																												$banliste[$x]['duration'] = sec2time($ban['duration']);
																																																																																																																																												$banliste[$x]['duration'] = 'Permanent';

																																																																																																																																												$banliste[$x]['duration'] = sec2time($ban['duration']);
																																																																																																																																												$banliste[$x]['invokername'] = $ban['invokername'];
																																																																																																																																												$banliste[$x]['invokercldbid'] = $ban['invokercldbid'];
																																																																																																																																												$banliste[$x]['invokeruid'] = $ban['invokeruid'];
																																																																																																																																												$banliste[$x]['reason'] = $ban['reason'];
																																																																																																																																												++$x;
																																																																																																																																												$msg = '<div class="alert alert-warning">Derzeit sind keine Banns vorhanden!</div>';
																																																																																																																																												$smarty->assign('banliste', $banliste);
																																																																																																																																												$smarty->assign('nobans', $nobans);
																																																																																																																																												$smarty->assign('msg', $msg);
																																																																																																																																												$smarty->display('customer/banListe.tpl');
																																																																																																																																												exit();
																																																																																																																																												break;
																																																																																																																																												error_reporting(30719);
																																																																																																																																												$myADM['serverID'] = $row['serverID'];
																																																																																																																																												$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																												$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																												$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																												$myADM['serverPort'] = $row['serverPort'];
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
																																																																																																																																			$smarty->assign('msg', $msg);
																																																																																																																																			$smarty->display('customer/serverTraffic.tpl');
																																																																																																																																			exit();
																																																																																																																																			break;
																																																																																																																																			$result = costumerNR();
																																																																																																																																			error_reporting(30719);
																																																																																																																																			$myADM['serverID'] = $row['serverID'];
																																																																																																																																			$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																			$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																			$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																		}
																																																																																																																																	}
																																																																																																																																}
																																																																																																																																else {
																																																																																																																																	$serverinfo['virtualserver_id'] = $serverinfo['virtualserver_id'];
																																																																																																																																	$serverinfo['virtualserver_unique_identifier'] = $serverinfo['virtualserver_unique_identifier'];
																																																																																																																																	$serverinfo['virtualserver_welcomemessage'] = $serverinfo['virtualserver_welcomemessage'];
																																																																																																																																	$serverinfo['virtualserver_platform'] = $serverinfo['virtualserver_platform'];
																																																																																																																																	$serverinfo['virtualserver_version'] = $serverinfo['virtualserver_version'];
																																																																																																																																	$serverinfo['virtualserver_maxclients'] = $serverinfo['virtualserver_maxclients'];
																																																																																																																																	$serverinfo['weblist_enabled'] = $serverinfo['virtualserver_weblist_enabled'];
																																																																																																																																	$serverinfo['password'] = 'Nein';

																																																																																																																																	$serverinfo['password'] = 'Ja';
																																																																																																																																	$serverinfo['virtualserver_created'] = $serverinfo['virtualserver_created'];
																																																																																																																																	$days = ' Tage';
																																																																																																																																	$hours = ' Stunden';
																																																																																																																																	$minutes = ' Minuten';
																																																																																																																																	$seconds = ' Sekunden';
																																																																																																																																	$conv_time = costumerNR();
																																																																																																																																	$serverinfo['virtualserver_uptime'] = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ' . $conv_time['seconds'] . $seconds;
																																																																																																																																	$serverinfo['virtualserver_clientsonline'] = $serverinfo['virtualserver_clientsonline'];
																																																																																																																																	$serverinfo['virtualserver_channelsonline'] = $serverinfo['virtualserver_channelsonline'];
																																																																																																																																	$serverinfo['virtualserver_name'] = $serverinfo['virtualserver_name'];
																																																																																																																																	$serverinfo['virtualserver_ip'] = $serverinfo['virtualserver_ip'];
																																																																																																																																	$serverinfo['virtualserver_port'] = $serverinfo['virtualserver_port'];
																																																																																																																																	$serverinfo['virtualserver_hostbanner_gfx_url'] = $serverinfo['virtualserver_hostbanner_gfx_url'];
																																																																																																																																	$smarty->assign('serverinfo', $serverinfo);
																																																																																																																																	$smarty->assign('msg', $msg);
																																																																																																																																	$smarty->display('customer/serveredit_adm.tpl');
																																																																																																																																	exit();
																																																																																																																																	break;
																																																																																																																																	$result = costumerNR();
																																																																																																																																	error_reporting(30719);
																																																																																																																																	$myADM['serverID'] = $row['serverID'];
																																																																																																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																	$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																}
																																																																																																																															default:
																																																																																																																																function conv_traffic($bytes)
																																																																																																																																{
																																																																																																																																	if ($bytes < 1024) {
																																																																																																																																	}

																																																																																																																																	$ret = $bytes . '';

																																																																																																																																	if ($bytes < 1048576) {
																																																																																																																																		$ret = $bytes < 1024;

																																																																																																																																		if ($bytes < 1073741824) {
																																																																																																																																		}
																																																																																																																																	}
																																																																																																																																	else {
																																																																																																																																		$ret = $bytes / 1024;
																																																																																																																																	}

																																																																																																																																	if ($bytes < 1099511627776) {
																																																																																																																																	}

																																																																																																																																	$ret = $bytes / 1048576;
																																																																																																																																	return $ret;
																																																																																																																																}
																																																																																																																																function convert_traffic($bytes)
																																																																																																																																{
																																																																																																																																	if ($bytes < 1024) {
																																																																																																																																		$ret = $bytes . ' Bytes';

																																																																																																																																		if ($bytes < 1048576) {
																																																																																																																																		}

																																																																																																																																		$ret = round($bytes / 1024, 2) . ' KB';

																																																																																																																																		if ($bytes < 1073741824) {
																																																																																																																																			$ret = round($bytes / 1048576, 2) . ' MB';

																																																																																																																																			if ($bytes < 1099511627776) {
																																																																																																																																			}

																																																																																																																																		}
																																																																																																																																	}
																																																																																																																																	else {
																																																																																																																																	}

																																																																																																																																	$ret = round($bytes / 1073741824, 2) . ' GB';
																																																																																																																																	return $ret;
																																																																																																																																}
																																																																																																																																$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																$result2 = ($_SESSION['MyID']);
																																																																																																																																error_reporting(30719);
																																																																																																																																$myADM['hostID'] = $row2['hostID'];
																																																																																																																																$myADM['hostName'] = $row2['hostName'];
																																																																																																																																$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																$PSession = array();
																																																																																																																																$PSession['id'] = $_GET['id'];
																																																																																																																																$PSession['staff'] = $_GET['staff'];
																																																																																																																																$scp = costumerNR();
																																																																																																																																$connect = mysql_escape_string($_POST['verlaufID']);
																																																																																																																																$select = mysql_escape_string($_POST['verlaufApteilID']);
																																																																																																																																$kb = 'KB';

																																																																																																																																$x = 4310;

																																																																																																																																$traffic[$x]['color'] = $color = '#FFFFFF';
																																																																																																																																++$x;

																																																																																																																																$traffic['connection_packets_received_total'] = conv_traffic($serverinfo['connection_packets_received_total']);
																																																																																																																																$traffic['connection_bytes_received_total'] = conv_traffic($serverinfo['connection_bytes_received_total']);
																																																																																																																																$traffic['connection_bandwidth_received_last_second_total'] = conv_traffic($serverinfo['connection_bandwidth_received_last_second_total']);

																																																																																																																																$traffic['connection_bandwidth_received_last_minute_total'] = conv_traffic($serverinfo['connection_bandwidth_received_last_minute_total']);

																																																																																																																																$traffic['connection_filetransfer_bandwidth_received'] = conv_traffic($serverinfo['connection_filetransfer_bandwidth_received']);

																																																																																																																																$traffic['connection_packets_sent_total'] = conv_traffic($serverinfo['connection_packets_sent_total']);
																																																																																																																																$traffic['connection_bytes_sent_total'] = conv_traffic($serverinfo['connection_bytes_sent_total']);
																																																																																																																																$traffic['connection_bandwidth_sent_last_second_total'] = conv_traffic($serverinfo['connection_bandwidth_sent_last_second_total']);
																																																																																																																																$traffic['connection_bandwidth_sent_last_minute_total'] = conv_traffic($serverinfo['connection_bandwidth_sent_last_minute_total']);
																																																																																																																																$traffic['connection_filetransfer_bandwidth_sent'] = conv_traffic($serverinfo['connection_filetransfer_bandwidth_sent']);
																																																																																																																																$traffic['packets_received_total'] = convert_traffic($serverinfo['connection_packets_received_total']);
																																																																																																																																$traffic['bytes_received_total'] = convert_traffic($serverinfo['connection_bytes_received_total']);
																																																																																																																																$traffic['bandwidth_received_last_second_total'] = convert_traffic($serverinfo['connection_bandwidth_received_last_second_total']);

																																																																																																																																$traffic['bandwidth_received_last_minute_total'] = convert_traffic($serverinfo['connection_bandwidth_received_last_minute_total']);
																																																																																																																																$traffic['filetransfer_bandwidth_received'] = convert_traffic($serverinfo['connection_filetransfer_bandwidth_received']);
																																																																																																																																$traffic['packets_sent_total'] = convert_traffic($serverinfo['connection_packets_sent_total']);
																																																																																																																																$traffic['bytes_sent_total'] = convert_traffic($serverinfo['connection_bytes_sent_total']);
																																																																																																																																$traffic['bandwidth_sent_last_second_total'] = convert_traffic($serverinfo['connection_bandwidth_sent_last_second_total']);
																																																																																																																																$traffic['bandwidth_sent_last_minute_total'] = convert_traffic($serverinfo['connection_bandwidth_sent_last_minute_total']);

																																																																																																																																$traffic['filetransfer_bandwidth_sent'] = convert_traffic($serverinfo['connection_filetransfer_bandwidth_sent']);
																																																																																																																																$smarty->assign('traffic', $traffic);
																																																																																																																																$smarty->assign('msg', $msg);
																																																																																																																																$smarty->display('customer/serverTraffic.tpl');
																																																																																																																																exit();
																																																																																																																																break;
																																																																																																																																$result = costumerNR();
																																																																																																																																error_reporting(30719);
																																																																																																																																$myADM['serverID'] = $row['serverID'];
																																																																																																																																$myADM['serverHostID'] = $row['serverHostID'];
																																																																																																																																$myADM['serverSid'] = $row['serverSid'];
																																																																																																																																$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																																																																																																$myADM['serverPort'] = $row['serverPort'];
																																																																																																																																$myTicketDetailAnswere;
																																																																																																																																error_reporting(30719);
																																																																																																																																$myADM['hostID'] = $row2['hostID'];
																																																																																																																																$myADM['hostName'] = $row2['hostName'];
																																																																																																																																$myADM['hostUsername'] = $row2['hostUsername'];
																																																																																																																																$myADM['hostPassword'] = $row2['hostPassword'];
																																																																																																																																$myADM['hostIP'] = $row2['hostIP'];
																																																																																																																																$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																																																																																																$PSession = array();
																																																																																																																																$PSession['id'] = $_GET['id'];
																																																																																																																																$PSession['staff'] = $_GET['staff'];
																																																																																																																																$scp = ($_POST['ticketBetreff']);
																																																																																																																																$connect = mysql_escape_string($MyData['userName']);

																																																																																																																																$select = costumerNR();

																																																																																																																																$cuserid = (mysql_escape_string($_POST['ticketText']));
																																																																																																																																$userloeschen = ($_POST['ticketPrio']);
																																																																																																																																$msg = '<div class="alert alert-success">User wurde erfolgreich gelöscht</div>';
																																																																																																																																$userlist = mysql_escape_string($_POST['ticketStatus']);

																																																																																																																																$list = mysql_query( . 'INSERT INTO cms_tickets (ticketApteilID, ticketProductID, ticketUserNumber, ticketUserName, ticketUserEmail, ticketBetreff, ticketText, ticketData, prioritaet, ticketStatus) VALUES (\'1\',\'' . $ticketProductID . '\',\'' . $ticketUserNumber . '\',\'' . $ticketUserName . '\',\'' . $ticketUserEmail . '\',\'' . $ticketBetreff . '\',\'' . $ticketText . '\',\'' . $ticketData . '\',\'' . $prioritaet . '\',\'0\')');

																																																																																																																																$userlist['clid'] = $list['clid'];
																																																																																																																																$userlist['cid'] = $list['cid'];
																																																																																																																															}
																																																																																																																														}
																																																																																																																													}
																																																																																																																												}
																																																																																																																											}
																																																																																																																										}
																																																																																																																										else {
																																																																																																																											$smarty->assign(, 'msg');
																																																																																																																											$smarty->assign('channelgroupliste', $channelgroupliste);
																																																																																																																										}
																																																																																																																									}
																																																																																																																								}
																																																																																																																							}
																																																																																																																							else {
																																																																																																																								$servergroupliste[$key]['sgid'] = $tokb['sgid'];
																																																																																																																								$servergroupliste[$key]['name'] = $tokb['name'];
																																																																																																																								$servergroupliste[$key]['type'] = $tokb['type'];
																																																																																																																								++$x;
																																																																																																																							}
																																																																																																																						}
																																																																																																																					}
																																																																																																																				}
																																																																																																																			}
																																																																																																																			else {
																																																																																																																				break;
																																																																																																																				++$i;
																																																																																																																			}
																																																																																																																		}
																																																																																																																	}
																																																																																																																}
																																																																																																															}
																																																																																																														}
																																																																																																													}
																																																																																																													else {
																																																																																																														$smarty->assign('msg', $msg);
																																																																																																														$smarty->display('customer/groups.tpl');
																																																																																																														exit();
																																																																																																														break;
																																																																																																														$result = $sgroup['namemode'] == 1;
																																																																																																														error_reporting(30719);
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
																																																																																									$smarty->display('customer/userListe.tpl');
																																																																																									exit();
																																																																																									break;
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
																																																																}
																																																																else {
																																																																	$conv_time = ($_GET['staff']);
																																																																}
																																																															}
																																																														}
																																																													}
																																																													else {
																																																														$dfg = $row['serverUserNumber'];
																																																														$serverinfo = costumerNR();
																																																														$serverinfo['virtualserver_id'] = $serverinfo['virtualserver_id'];
																																																														$serverinfo['virtualserver_unique_identifier'] = $serverinfo['virtualserver_unique_identifier'];
																																																														$serverinfo['virtualserver_welcomemessage'] = $serverinfo['virtualserver_welcomemessage'];
																																																														$serverinfo['virtualserver_platform'] = $serverinfo['virtualserver_platform'];
																																																														$serverinfo['virtualserver_version'] = $serverinfo['virtualserver_version'];
																																																														$serverinfo['virtualserver_maxclients'] = $serverinfo['virtualserver_maxclients'];
																																																														$serverinfo['virtualserver_password'] = 'Nein';

																																																														$serverinfo['virtualserver_password'] = 'Ja';
																																																														$serverinfo['virtualserver_created'] = $serverinfo['virtualserver_created'];
																																																														$days = ' Tage';
																																																														$hours = ' Stunden';
																																																														$minutes = ' Minuten';
																																																														$seconds = ' Sekunden';
																																																														$conv_time = ($_GET['staff']);
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
																																																			$tschannel .= '<a rel="tooltip" data-placement="left" title="Channel ID: ' . htmlspecialchars($channel['cid']) . '' . "\n" . 'Channel Name: ' . $smarty->assign($channel['channel_name']) . '' . "\n" . 'Clients: ' . htmlspecialchars($channel['total_clients']) . '/' . htmlspecialchars($channel['channel_maxclients']) . '' . "\n" . 'Family Clients: ' . htmlspecialchars($channel['total_clients_family']) . '/' . htmlspecialchars($channel['channel_maxfamilyclients']) . '' . "\n" . 'Benötigte TalkPower: ' . htmlspecialchars($channel['channel_needed_talk_power']) . '"><div class="ts3_server_name">' . htmlspecialchars($channel['channel_name']) . '</div>' . $icon_abstant . '</a>';
																																																			$tschannel .= '<div class="ts3_clear"></div>';
																																																			$tschannel .= '</div></a>';

																																																			$userid = $row2['hostID'];
																																																			$key = costumerNR();
																																																			$user_data[] = $tsData['clients'][$userid];

																																																			$user_st = $ch_stufe[$channel['pid']] + 16;

																																																			$userid = array();
																																																			$key = costumerNR();
																																																			$user_data = costumerNR();
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
																																																			$group = costumerNR();
																																																			$i = 4310;

																																																			$sgrid = costumerNR();
																																																			$key = costumerNR();
																																																			$sgroup = $_GET;
																																																			$showgroupFront .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
																																																			$showgroupBehind .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';

																																																			++$i;

																																																			$showgroupFront = '';
																																																			$showgroupBehind = '';
																																																			$tschannel .= '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant . '';
																																																			$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';

																																																			$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';
																																																			$group = costumerNR();
																																																			$group = costumerNR();

																																																			$i = 4310;

																																																			$sgrid = costumerNR();
																																																			$key = costumerNR();
																																																			$sgroup = $servergruppenliste[$key]['iconid'];

																																																			$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																			$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																			++$i;

																																																			$grid = $channelgruppenliste[$key]['iconid'];
																																																			$key = costumerNR();
																																																			$chgroup = costumerNR();
																																																			$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																			$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';

																																																			$tschannel .= '<div class="ts3_clear"></div>';
																																																			$tschannel .= '</div>';
																																																			$abc = $s_port . '-icon_' . $tsData['server']['virtualserver_icon_id'] . '.png';
																																																			$row;
																																																			$serverinfo = costumerNR();
																																																			$serverinfo['virtualserver_id'] = $serverinfo['virtualserver_id'];
																																																			$serverinfo['virtualserver_unique_identifier'] = $serverinfo['virtualserver_unique_identifier'];
																																																			$serverinfo['virtualserver_welcomemessage'] = $serverinfo['virtualserver_welcomemessage'];
																																																			$serverinfo['virtualserver_platform'] = $serverinfo['virtualserver_platform'];
																																																			$serverinfo['virtualserver_version'] = $serverinfo['virtualserver_version'];
																																																			$serverinfo['virtualserver_maxclients'] = $serverinfo['virtualserver_maxclients'];
																																																			$serverinfo['virtualserver_password'] = 'Nein';

																																																			$serverinfo['virtualserver_password'] = 'Ja';
																																																			$serverinfo['virtualserver_created'] = $serverinfo['virtualserver_created'];
																																																			$days = ' Tage';
																																																			$hours = ' Stunden';
																																																			$minutes = ' Minuten';
																																																			$seconds = ' Sekunden';
																																																			$conv_time = ($_GET['staff']);
																																																			$serverinfo['virtualserver_uptime'] = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ' . $conv_time['seconds'] . $seconds;
																																																			$serverinfo['virtualserver_clientsonline'] = $serverinfo['virtualserver_clientsonline'];
																																																			$serverinfo['virtualserver_channelsonline'] = $serverinfo['virtualserver_channelsonline'];
																																																			$serverinfo['virtualserver_name'] = $serverinfo['virtualserver_name'];
																																																			$serverinfo['virtualserver_ip'] = $serverinfo['virtualserver_ip'];
																																																			$serverinfo['virtualserver_port'] = $serverinfo['virtualserver_port'];
																																																			$serverinfo['virtualserver_hostbanner_gfx_url'] = $serverinfo['virtualserver_hostbanner_gfx_url'];
																																																			$scp->setName('Serverinhaber');
																																																			$clients = $_POST;
																																																			$x = 4310;

																																																			$client = ($_POST['token']);

																																																			$clientlist[$x]['color'] = $color = '#FFFFFF';
																																																			$clientlist[$x]['client_id'] = $client['client_database_id'] - 1;
																																																			$clientlist[$x]['client_nickname'] = $client['client_nickname'];
																																																			$clientlist[$x]['clid'] = $client['clid'];

																																																			$clientst = ($_POST['toktype']);
																																																			$clientst = $_POST['tokid1'];

																																																			++$x;
																																																			$smarty->assign('clientlist', $clientlist);
																																																			$clientlist = ($_POST['num']);

																																																			$value = costumerNR();
																																																			$key = costumerNR();
																																																			$scp->clientKick($value['clid'], 'server', $_POST['grund']);
																																																			$msg = '<div class=\'alert alert-success\'>Alle User wurde erfolgreich vom Server gekickt!</div>';
																																																			$msg = '<div class=\'alert alert-error\'>Keine User zum kicken vorhanden!</div>';

																																																			$scp->BanAddByName($_POST['user_b'], $_POST['time_b'], 'Webinterface Aktion');
																																																			$msg = '<div class=\'success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																			$msg = '<div class=\'error\'>Bann nicht erfolgreich</div>';
																																																			$clid = costumerNR();
																																																			$scp->clientKick($clid, 'server', 'Webinterface Aktion');
																																																			$msg = '<span style=\'color:green\'><b>User wurde erfolgreich vom Server gekickt!</span>';

																																																			$msg = '<span style=\'color:red\'><b>Es wurde kein User ausgewählt!</span>';
																																																			$clid = $tokenliste[$x]['token_type'];
																																																			$scp->clientPoke($clid, 'Webinterface Aktion');
																																																			$msg = '<span style=\'color:green\'><b>User wurde erfolgreich eingesperrt!</span><meta http-equiv=\'refresh\' content=\'1; url=index.php?site=serverViewer\'> ';

																																																			$msg = '<span style=\'color:red\'><b>Es wurde kein User ausgewählt!</span>';
																																																			$_POST['message'] = str_replace('\\', '\\\\', $_POST['message']);
																																																			$_POST['sid'] = '';
																																																			$scp->sendMessage('3', $_POST['sid'], $_POST['message']);
																																																			$msg = '<div class=\'alert alert-success\'>Die Mitteiling wurde erfolgreich übermittelt!</div>';

																																																			$msg = '<div class=\'alert alert-error\'>ERROR: Es wurde keine nachricht eingegeben!</div>';
																																																			$smarty->assign('clientlist', $clientlist);
																																																			$smarty->assign('abc', $abc);
																																																			$smarty->assign('serverinfo', $serverinfo);
																																																			$smarty->assign('dfg', $dfg);
																																																			$smarty->assign('tsviewer', $tschannel);
																																																			$result = costumerNR();
																																																			error_reporting(30719);
																																																			$myADM['serverID'] = $row['serverID'];
																																																			$myADM['serverHostID'] = $row['serverHostID'];
																																																			$myADM['serverSid'] = $row['serverSid'];
																																																			$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																			$myADM['serverPort'] = $row['serverPort'];
																																																			$result2 = $channelliste[$x]['channel_name'];
																																																			error_reporting(30719);
																																																			$myADM['hostID'] = $row2['hostID'];
																																																			$myADM['hostName'] = $row2['hostName'];
																																																			$myADM['hostUsername'] = $row2['hostUsername'];
																																																			$myADM['hostPassword'] = $row2['hostPassword'];
																																																			$myADM['hostIP'] = $row2['hostIP'];
																																																			$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																			$PSession = array();
																																																			$PSession['id'] = $_GET['id'];
																																																			$PSession['staff'] = $_GET['staff'];
																																																			$scp = costumerNR();
																																																			$connect = 'SELECT * FROM cms_hostsystems WHERE hostID=\'' . $row['serverHostID'];
																																																			$select = costumerNR();
																																																			$tt = $db->fetch_array($result2);
																																																			$scp->setName('Admin');
																																																			$server_edit['data'] = $scp->serverEdit($_POST['newsettings']);
																																																			$msg = '<div class=\'alert alert-success\'><b>Erfolgreich gespeichert</b></div>';
																																																			$serverinfo = costumerNR();
																																																			$serverinfo['virtualserver_id'] = $serverinfo['virtualserver_id'];
																																																			$serverinfo['virtualserver_unique_identifier'] = $serverinfo['virtualserver_unique_identifier'];
																																																			$serverinfo['virtualserver_welcomemessage'] = $serverinfo['virtualserver_welcomemessage'];
																																																			$serverinfo['virtualserver_platform'] = $serverinfo['virtualserver_platform'];
																																																			$serverinfo['virtualserver_version'] = $serverinfo['virtualserver_version'];
																																																			$serverinfo['virtualserver_maxclients'] = $serverinfo['virtualserver_maxclients'];
																																																			$serverinfo['weblist_enabled'] = $serverinfo['virtualserver_weblist_enabled'];
																																																			$serverinfo['password'] = 'Nein';

																																																			$serverinfo['password'] = 'Ja';
																																																			$serverinfo['virtualserver_created'] = $serverinfo['virtualserver_created'];
																																																			$days = ' Tage';
																																																			$hours = ' Stunden';
																																																			$minutes = ' Minuten';
																																																			$seconds = ' Sekunden';
																																																			$conv_time = costumerNR();
																																																			$serverinfo['virtualserver_uptime'] = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ' . $conv_time['seconds'] . $seconds;
																																																			$serverinfo['virtualserver_clientsonline'] = $serverinfo['virtualserver_clientsonline'];
																																																			$serverinfo['virtualserver_channelsonline'] = $serverinfo['virtualserver_channelsonline'];

																																																			$serverinfo['virtualserver_name'] = $serverinfo['virtualserver_name'];

																																																			$serverinfo['virtualserver_ip'] = $serverinfo['virtualserver_ip'];
																																																			$serverinfo['virtualserver_port'] = $serverinfo['virtualserver_port'];
																																																			$serverinfo['virtualserver_hostbanner_gfx_url'] = $serverinfo['virtualserver_hostbanner_gfx_url'];
																																																			$smarty->assign('serverinfo', $serverinfo);
																																																			$smarty->assign('msg', $msg);
																																																			$smarty->display('customer/serveredit_adm.tpl');
																																																			exit();
																																																			break;

																																																			$result = costumerNR();
																																																			error_reporting(30719);
																																																			function conv_traffic($bytes)
																																																			{
																																																				if ($bytes < 1024) {
																																																				}

																																																				$ret = $bytes . '';

																																																				if ($bytes < 1048576) {
																																																					$ret = $bytes < 1024;

																																																					if ($bytes < 1073741824) {
																																																					}
																																																				}
																																																				else {
																																																					$ret = $bytes / 1024;
																																																				}

																																																				if ($bytes < 1099511627776) {
																																																				}

																																																				$ret = $bytes / 1048576;
																																																				return $ret;
																																																			}
																																																			function convert_traffic($bytes)
																																																			{
																																																				if ($bytes < 1024) {
																																																					$ret = $bytes . ' Bytes';

																																																					if ($bytes < 1048576) {
																																																					}

																																																					$ret = round($bytes / 1024, 2) . ' KB';

																																																					if ($bytes < 1073741824) {
																																																						$ret = round($bytes / 1048576, 2) . ' MB';

																																																						if ($bytes < 1099511627776) {
																																																						}

																																																					}
																																																				}
																																																				else {
																																																				}

																																																				$ret = round($bytes / 1073741824, 2) . ' GB';
																																																				return $ret;
																																																			}

																																																			$myADM['serverID'] = $row['serverID'];
																																																			$myADM['serverHostID'] = $row['serverHostID'];
																																																			$myADM['serverSid'] = $row['serverSid'];
																																																			$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																			$myADM['serverPort'] = $row['serverPort'];
																																																			$result2 = ($_SESSION['MyID']);
																																																			error_reporting(30719);
																																																			$myADM['hostID'] = $row2['hostID'];
																																																			$myADM['hostName'] = $row2['hostName'];
																																																			$myADM['hostUsername'] = $row2['hostUsername'];
																																																			$myADM['hostPassword'] = $row2['hostPassword'];
																																																			$myADM['hostIP'] = $row2['hostIP'];
																																																			$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																			$PSession = array();
																																																			$PSession['id'] = $_GET['id'];
																																																			$PSession['staff'] = $_GET['staff'];
																																																			$scp = costumerNR();
																																																			$connect = mysql_escape_string($_POST['verlaufID']);
																																																			$select = mysql_escape_string($_POST['verlaufApteilID']);
																																																			$kb = 'KB';

																																																			$x = 4310;

																																																			$traffic[$x]['color'] = $color = '#FFFFFF';
																																																			++$x;

																																																			$traffic['connection_packets_received_total'] = conv_traffic($serverinfo['connection_packets_received_total']);
																																																			$traffic['connection_bytes_received_total'] = conv_traffic($serverinfo['connection_bytes_received_total']);
																																																			$traffic['connection_bandwidth_received_last_second_total'] = conv_traffic($serverinfo['connection_bandwidth_received_last_second_total']);

																																																			$traffic['connection_bandwidth_received_last_minute_total'] = conv_traffic($serverinfo['connection_bandwidth_received_last_minute_total']);

																																																			$traffic['connection_filetransfer_bandwidth_received'] = conv_traffic($serverinfo['connection_filetransfer_bandwidth_received']);

																																																			$traffic['connection_packets_sent_total'] = conv_traffic($serverinfo['connection_packets_sent_total']);
																																																			$traffic['connection_bytes_sent_total'] = conv_traffic($serverinfo['connection_bytes_sent_total']);
																																																			$traffic['connection_bandwidth_sent_last_second_total'] = conv_traffic($serverinfo['connection_bandwidth_sent_last_second_total']);
																																																			$traffic['connection_bandwidth_sent_last_minute_total'] = conv_traffic($serverinfo['connection_bandwidth_sent_last_minute_total']);
																																																			$traffic['connection_filetransfer_bandwidth_sent'] = conv_traffic($serverinfo['connection_filetransfer_bandwidth_sent']);
																																																			$traffic['packets_received_total'] = convert_traffic($serverinfo['connection_packets_received_total']);
																																																			$traffic['bytes_received_total'] = convert_traffic($serverinfo['connection_bytes_received_total']);
																																																			$traffic['bandwidth_received_last_second_total'] = convert_traffic($serverinfo['connection_bandwidth_received_last_second_total']);

																																																			$traffic['bandwidth_received_last_minute_total'] = convert_traffic($serverinfo['connection_bandwidth_received_last_minute_total']);
																																																			$traffic['filetransfer_bandwidth_received'] = convert_traffic($serverinfo['connection_filetransfer_bandwidth_received']);
																																																			$traffic['packets_sent_total'] = convert_traffic($serverinfo['connection_packets_sent_total']);
																																																			$traffic['bytes_sent_total'] = convert_traffic($serverinfo['connection_bytes_sent_total']);
																																																			$traffic['bandwidth_sent_last_second_total'] = convert_traffic($serverinfo['connection_bandwidth_sent_last_second_total']);
																																																			$traffic['bandwidth_sent_last_minute_total'] = convert_traffic($serverinfo['connection_bandwidth_sent_last_minute_total']);

																																																			$traffic['filetransfer_bandwidth_sent'] = convert_traffic($serverinfo['connection_filetransfer_bandwidth_sent']);
																																																			$smarty->assign('traffic', $traffic);
																																																			$smarty->assign('msg', $msg);
																																																			$smarty->display('customer/serverTraffic.tpl');
																																																			exit();
																																																			break;
																																																			$result = costumerNR();
																																																			error_reporting(30719);
																																																			$myADM['serverID'] = $row['serverID'];
																																																			$myADM['serverHostID'] = $row['serverHostID'];
																																																			$myADM['serverSid'] = $row['serverSid'];
																																																			$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																			$myADM['serverPort'] = $row['serverPort'];
																																																			$myTicketDetailAnswere;
																																																			error_reporting(30719);
																																																			$myADM['hostID'] = $row2['hostID'];
																																																			$myADM['hostName'] = $row2['hostName'];
																																																			$myADM['hostUsername'] = $row2['hostUsername'];
																																																			$myADM['hostPassword'] = $row2['hostPassword'];
																																																			$myADM['hostIP'] = $row2['hostIP'];
																																																			$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																			$PSession = array();
																																																			$PSession['id'] = $_GET['id'];
																																																			$PSession['staff'] = $_GET['staff'];
																																																			$scp = ($_POST['ticketBetreff']);
																																																			$connect = mysql_escape_string($MyData['userName']);

																																																			$select = costumerNR();

																																																			$cuserid = (mysql_escape_string($_POST['ticketText']));
																																																			$userloeschen = ($_POST['ticketPrio']);
																																																			$msg = '<div class="alert alert-success">User wurde erfolgreich gelöscht</div>';
																																																			$userlist = mysql_escape_string($_POST['ticketStatus']);

																																																			$list = mysql_query( . 'INSERT INTO cms_tickets (ticketApteilID, ticketProductID, ticketUserNumber, ticketUserName, ticketUserEmail, ticketBetreff, ticketText, ticketData, prioritaet, ticketStatus) VALUES (\'1\',\'' . $ticketProductID . '\',\'' . $ticketUserNumber . '\',\'' . $ticketUserName . '\',\'' . $ticketUserEmail . '\',\'' . $ticketBetreff . '\',\'' . $ticketText . '\',\'' . $ticketData . '\',\'' . $prioritaet . '\',\'0\')');

																																																			$userlist['clid'] = $list['clid'];
																																																			$userlist['cid'] = $list['cid'];
																																																		}
																																																	}
																																																}
																																															}
																																															else {
																																																$smarty->assign('selectedErrors', $selected['errors']);

																																																break;
																																																$smarty->assign('selectedErrors', $selected['errors']);
																																																$s_port = costumerNR();
																																																$fileList = costumerNR();

																																																$file = costumerNR();

																																																if (!in_array($s_port . '-' . $file['name'], $icon_arr)) {
																																																}
																																																else {
																																																	$setnews = costumerNR();
																																																	$result = costumerNR();
																																																	$msg = '<div class="alert alert-success">News wurde erfolgreich hinzugefügt!</div>';
																																																	$insertLog = 'Der Kunde [' . $ticketUserName . '] erstellte am ' . date('d.m.Y / H:i:s', time()) . ' ein neues Ticket!';
																																																	setlog($insertLog);

																																																	$msg = '<div class="alert alert-warning">ERROR: Es ist ein fehler aufgetretetn!</div>';

																																																	$smarty->assign('myProdcts', myProdcts());
																																																	$smarty->assign('msg', $msg);
																																																	$smarty->display('customer/myticketsAdd.tpl');
																																																	exit();
																																																	$smarty->assign('myTickets', myTickets());
																																																	$smarty->assign('msg', $msg);
																																																	$smarty->display('customer/mytickets.tpl');
																																																	exit();
																																																	break;

																																																	$result = $row['serverSid'];

																																																	$num = $row['serverUserNumber'];

																																																	$x = 4310;

																																																	$myProductList[$x]['color'] = $color = '#FFFFFF';
																																																	$myProductList[$x]['serverID'] = $row['serverID'];

																																																	$myProductList[$x]['serverHostID'] = $row['serverHostID'];
																																																	$myProductList[$x]['serverSid'] = $row['serverSid'];
																																																	$myProductList[$x]['serverUserNumber'] = $row['serverUserNumber'];
																																																	$myProductList[$x]['serverPort'] = $row['serverPort'];

																																																	$result2 = costumerNR();
																																																	$db->num_rows($result2);

																																																	$myProductList[$x]['color'] = $color = '#FFFFFF';
																																																	$myProductList[$x]['hostID'] = $row2['hostID'];
																																																	$myProductList[$x]['hostName'] = $row2['hostName'];
																																																	$myProductList[$x]['hostUsername'] = $row2['hostUsername'];
																																																	$myProductList[$x]['hostPassword'] = $row2['hostPassword'];
																																																	$myProductList[$x]['hostIP'] = $row2['hostIP'];
																																																	$myProductList[$x]['hostQueryPort'] = $row2['hostQueryPort'];

																																																	$scp = costumerNR();
																																																	$scp->login($myProductList[$x]['hostUsername'], $myProductList[$x]['hostPassword']);

																																																	$select = costumerNR();
																																																	$serverinfo = $listdbuser[$x]['color'];
																																																	$myProductList[$x]['virtualserver_name'] = $serverinfo['virtualserver_name'];

																																																	$myProductList[$x]['virtualserver_maxclients'] = $serverinfo['virtualserver_maxclients'];
																																																	$myProductList[$x]['virtualserver_clientsonline'] = $serverinfo['virtualserver_clientsonline'] - 1;
																																																	$myProductList[$x]['serverStatus'] = '<span class="badge badge-success">Online</span>';
																																																	$myProductList[$x]['serverStatus'] = '<span class="badge badge-important">Offline</span>';
																																																	++$x;

																																																	$msg = '<div class="alert alert-warning">Derzeit sind keine Kunden vorhanden!</div>';
																																																	$smarty->assign('myProductList', $myProductList);

																																																	$smarty->assign('act', $_GET['act']);

																																																	$smarty->assign('id', $_GET['id']);
																																																	$result = costumerNR();

																																																	error_reporting(30719);
																																																	$myADM['serverID'] = $row['serverID'];
																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																	$myADM['serverSid'] = $row['serverSid'];
																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																	$myADM['serverPort'] = $row['serverPort'];
																																																	$result2 = $db->query('SELECT * FROM cms_servers WHERE serverID = \'' . $_GET['id'] . '\'');
																																																	error_reporting(30719);
																																																	$myADM['hostID'] = $row2['hostID'];
																																																	$myADM['hostName'] = $row2['hostName'];
																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																	$smarty->assign('serverPort', $myADM['serverPort']);
																																																	$smarty->assign('hostIP', $myADM['hostIP']);
																																																	$s_port = '';
																																																	$iconDir = 'cache/ts3_icon/';
																																																	$icon_arr = array();
																																																	$icon_arr[] = $file;
																																																	closedir($handle);
																																																	$tschannel = '';
																																																	$scp = $row2['hostIP'];
																																																	$scp->login($myADM['hostUsername'], $myADM['hostPassword']);
																																																	$selected = SCPts3;
																																																	$msg = '<div class="alert alert-warning">Derzeit ist dieses Produkt gesperrt!</div>';

																																																	$smarty->assign('selectedErrors', $selected['errors']);

																																																	break;
																																																	$smarty->assign('selectedErrors', $selected['errors']);
																																																	$s_port = costumerNR();
																																																	$fileList = costumerNR();

																																																	$file = costumerNR();

																																																	$ftp_data = costumerNR();
																																																	$con_scpftp = $newcomplainlist[$x]['tname'];
																																																	fputs($con_scpftp, $ftp_data['data']['ftkey']);
																																																	$data = '';
																																																	$data .= $newcomplainlist[$x]['fname'];
																																																	$handler2 = $newcomplainlist[$x]['timestamp'];
																																																	fwrite($handler2, $data);
																																																	fclose($handler2);

																																																	$tschannel .= 'Sorry! Server ist derzeit Offline!';
																																																	$tsData = array();
																																																	$serverInfo = costumerNR();
																																																	$tsData['server'] = $serverInfo['data'];
																																																	$hostInfo = costumerNR();
																																																	$tsData['hostInfo'] = $hostInfo['data'];
																																																	$tsData['server']['virtualserver_icon_id'] = sprintf('%u', $tsData['server']['virtualserver_icon_id'] & 4294967295);
																																																	$channelList = $row['serverHostID'];
																																																	$tsData['channel'] = $channelList['data'];
																																																	$clientList = $row['serverUserNumber'];
																																																	$tsData['clients'] = $clientList['data'];
																																																	$serverGroupList = $row['serverHostID'];
																																																	$tsData['sgroups'] = $serverGroupList['data'];

																																																	$channelGroupList = costumerNR();

																																																	$tsData['cgroups'] = $channelGroupList['data'];
																																																	$ftList = costumerNR();
																																																	$tsData['ftList'] = $ftList['data'];
																																																	$tschannel = '';
																																																	$tschannel .= '';
																																																	$baumwert = 4326;
																																																	$icon_abstant = '<div style="width:16px;float:left;"></div>';
																																																	$i = 4310;
																																																	$segroup_mapping[$tsData['sgroups'][$i]['sgid']][] = $i;
																																																	++$i;
																																																	$i = 4310;

																																																	$user_mapping[$tsData['clients'][$i]['cid']][] = $i;
																																																	++$i;
																																																	$i = 4310;
																																																	$chgroup_mapping[$tsData['cgroups'][$i]['cgid']][] = $i;
																																																	++$i;

																																																	$channel = costumerNR();
																																																	$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/password.png" width="16" height="16" /></div>';

																																																	$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/default.png" width="16" height="16" /></div>';

																																																	$channel_art = '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/moderated.png" width="16" height="16" /></div>';

																																																	$channel_art = '';
																																																	$baumwert = $baumwert + 16;
																																																	$ch_stufe[$channel['pid']] = $baumwert;

																																																	$baumwert = 4326;
																																																	$ch_stufe[$channel['pid']] = 16;

																																																	$tschannel .= '<div class="ts3_onh" style="margin-left:' . $ch_stufe[$channel['pid']] . 'px;">';
																																																	$getspacer = ($_POST['grund']);

																																																	$checkspacer = $getspacer[1][0] . $getspacer[1][0] . $getspacer[1][0];
																																																	$spacer = '';
																																																	$i = 4310;
																																																	$spacer .= $_POST['time'];

																																																	break;
																																																	++$i;
																																																	$tschannel .= '<div class="ts3_server_name">' . htmlspecialchars($spacer) . '</div>' . $icon_abstant . '';

																																																	$spacer = costumerNR();
																																																	$tschannel .= '<div class="ts3_server_u_icon"></div>';
																																																	$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:center">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																																																	$spacer = $banliste[$x]['banid'];
																																																	$tschannel .= '<div class="ts3_server_u_icon"></div>';

																																																	$tschannel .= '<div class="ts3_server_name" style="width:90%;text-align:right">' . htmlspecialchars($spacer[1]) . '</div>' . $icon_abstant . '';

																																																	$spacer = $banliste[$x]['uid'];
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

																																																	$row2;
																																																	$key = costumerNR();
																																																	$user_data[] = $tsData['clients'][$userid];

																																																	$user_st = $ch_stufe[$channel['pid']] + 16;

																																																	$userid = array();
																																																	$key = costumerNR();
																																																	$user_data = costumerNR();
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
																																																	$group = costumerNR();
																																																	$i = 4310;

																																																	$sgrid = costumerNR();
																																																	$key = costumerNR();
																																																	$sgroup = $_GET;
																																																	$showgroupFront .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';
																																																	$showgroupBehind .= '[<span style="color:orange;">' . $sgroup['name'] . '</span>]';

																																																	++$i;

																																																	$showgroupFront = '';
																																																	$showgroupBehind = '';
																																																	$tschannel .= '<div class="ts3_server_name">' . $showgroupFront . '' . htmlspecialchars($user_data['client_nickname']) . '' . $showgroupBehind . '</div>' . $icon_abstant . '';
																																																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';

																																																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $user_data['client_icon_id'] . '.png" width="16" height="16" /></div>';
																																																	$group = costumerNR();
																																																	$group = costumerNR();

																																																	$i = 4310;

																																																	$sgrid = costumerNR();
																																																	$key = costumerNR();
																																																	$servergruppenliste;

																																																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $sgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																	++$i;

																																																	$channelgruppenliste;
																																																	$key = costumerNR();
																																																	$chgroup = costumerNR();
																																																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/default/icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';
																																																	$tschannel .= '<div class="ts3_server_u_icon"><img src="../cache/ts3_icon/' . $s_port . '-icon_' . $chgroup['iconid'] . '.png" width="16" height="16" /></div>';

																																																	$tschannel .= '<div class="ts3_clear"></div>';
																																																	$tschannel .= '</div>';
																																																	$abc = $s_port . '-icon_' . $tsData['server']['virtualserver_icon_id'] . '.png';
																																																	$row;
																																																	$serverinfo = costumerNR();
																																																	$serverinfo['virtualserver_id'] = $serverinfo['virtualserver_id'];
																																																	$serverinfo['virtualserver_unique_identifier'] = $serverinfo['virtualserver_unique_identifier'];
																																																	$serverinfo['virtualserver_welcomemessage'] = $serverinfo['virtualserver_welcomemessage'];
																																																	$serverinfo['virtualserver_platform'] = $serverinfo['virtualserver_platform'];
																																																	$serverinfo['virtualserver_version'] = $serverinfo['virtualserver_version'];
																																																	$serverinfo['virtualserver_maxclients'] = $serverinfo['virtualserver_maxclients'];
																																																	$serverinfo['virtualserver_password'] = 'Nein';

																																																	$serverinfo['virtualserver_password'] = 'Ja';
																																																	$serverinfo['virtualserver_created'] = $serverinfo['virtualserver_created'];
																																																	$days = ' Tage';
																																																	$hours = ' Stunden';
																																																	$minutes = ' Minuten';
																																																	$seconds = ' Sekunden';
																																																	$conv_time = ($_GET['staff']);
																																																	$serverinfo['virtualserver_uptime'] = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ' . $conv_time['seconds'] . $seconds;
																																																	$serverinfo['virtualserver_clientsonline'] = $serverinfo['virtualserver_clientsonline'];
																																																	$serverinfo['virtualserver_channelsonline'] = $serverinfo['virtualserver_channelsonline'];
																																																	$serverinfo['virtualserver_name'] = $serverinfo['virtualserver_name'];
																																																	$serverinfo['virtualserver_ip'] = $serverinfo['virtualserver_ip'];
																																																	$serverinfo['virtualserver_port'] = $serverinfo['virtualserver_port'];
																																																	$serverinfo['virtualserver_hostbanner_gfx_url'] = $serverinfo['virtualserver_hostbanner_gfx_url'];
																																																	$scp->setName('Serverinhaber');
																																																	$clients = $_POST;
																																																	$x = 4310;

																																																	$client = ($_POST['token']);

																																																	$clientlist[$x]['color'] = $color = '#FFFFFF';
																																																	$clientlist[$x]['client_id'] = $client['client_database_id'] - 1;
																																																	$clientlist[$x]['client_nickname'] = $client['client_nickname'];
																																																	$clientlist[$x]['clid'] = $client['clid'];

																																																	$clientst = ($_POST['toktype']);
																																																	$_POST;

																																																	++$x;
																																																	$smarty->assign('clientlist', $clientlist);
																																																	$clientlist = ($_POST['num']);

																																																	$value = costumerNR();
																																																	$key = costumerNR();
																																																	$scp->clientKick($value['clid'], 'server', $_POST['grund']);
																																																	$msg = '<div class=\'alert alert-success\'>Alle User wurde erfolgreich vom Server gekickt!</div>';
																																																	$msg = '<div class=\'alert alert-error\'>Keine User zum kicken vorhanden!</div>';

																																																	$scp->BanAddByName($_POST['user_b'], $_POST['time_b'], 'Webinterface Aktion');
																																																	$msg = '<div class=\'success\'>Bann wurde erfolgreich hinzugefügt</div>';

																																																	$msg = '<div class=\'error\'>Bann nicht erfolgreich</div>';
																																																	$clid = costumerNR();
																																																	$scp->clientKick($clid, 'server', 'Webinterface Aktion');
																																																	$msg = '<span style=\'color:green\'><b>User wurde erfolgreich vom Server gekickt!</span>';

																																																	$msg = '<span style=\'color:red\'><b>Es wurde kein User ausgewählt!</span>';
																																																	$tokenliste;
																																																	$scp->clientPoke($clid, 'Webinterface Aktion');
																																																	$msg = '<span style=\'color:green\'><b>User wurde erfolgreich eingesperrt!</span><meta http-equiv=\'refresh\' content=\'1; url=index.php?site=serverViewer\'> ';

																																																	$msg = '<span style=\'color:red\'><b>Es wurde kein User ausgewählt!</span>';
																																																	$_POST['message'] = str_replace('\\', '\\\\', $_POST['message']);
																																																	$_POST['sid'] = '';
																																																	$scp->sendMessage('3', $_POST['sid'], $_POST['message']);
																																																	$msg = '<div class=\'alert alert-success\'>Die Mitteiling wurde erfolgreich übermittelt!</div>';

																																																	$msg = '<div class=\'alert alert-error\'>ERROR: Es wurde keine nachricht eingegeben!</div>';
																																																	$smarty->assign('clientlist', $clientlist);
																																																	$smarty->assign('abc', $abc);
																																																	$smarty->assign('serverinfo', $serverinfo);
																																																	$smarty->assign('dfg', $dfg);
																																																	$smarty->assign('tsviewer', $tschannel);
																																																	$result = costumerNR();
																																																	error_reporting(30719);
																																																	$myADM['serverID'] = $row['serverID'];
																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																	$myADM['serverSid'] = $row['serverSid'];
																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																	$myADM['serverPort'] = $row['serverPort'];
																																																	$channelliste;
																																																	error_reporting(30719);
																																																	$myADM['hostID'] = $row2['hostID'];
																																																	$myADM['hostName'] = $row2['hostName'];
																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																	$PSession = array();
																																																	$PSession['id'] = $_GET['id'];
																																																	$PSession['staff'] = $_GET['staff'];
																																																	$scp = costumerNR();
																																																	$connect = 'SELECT * FROM cms_hostsystems WHERE hostID=\'' . $row['serverHostID'];
																																																	$select = costumerNR();
																																																	$tt = $db->fetch_array($result2);
																																																	$scp->setName('Admin');
																																																	$server_edit['data'] = $scp->serverEdit($_POST['newsettings']);
																																																	$msg = '<div class=\'alert alert-success\'><b>Erfolgreich gespeichert</b></div>';
																																																	$serverinfo = costumerNR();
																																																	$serverinfo['virtualserver_id'] = $serverinfo['virtualserver_id'];
																																																	$serverinfo['virtualserver_unique_identifier'] = $serverinfo['virtualserver_unique_identifier'];
																																																	$serverinfo['virtualserver_welcomemessage'] = $serverinfo['virtualserver_welcomemessage'];
																																																	$serverinfo['virtualserver_platform'] = $serverinfo['virtualserver_platform'];
																																																	$serverinfo['virtualserver_version'] = $serverinfo['virtualserver_version'];
																																																	$serverinfo['virtualserver_maxclients'] = $serverinfo['virtualserver_maxclients'];
																																																	$serverinfo['weblist_enabled'] = $serverinfo['virtualserver_weblist_enabled'];
																																																	$serverinfo['password'] = 'Nein';
																																																	function conv_traffic($bytes)
																																																	{
																																																		if ($bytes < 1024) {
																																																		}

																																																		$ret = $bytes . '';

																																																		if ($bytes < 1048576) {
																																																			$ret = $bytes < 1024;

																																																			if ($bytes < 1073741824) {
																																																			}
																																																		}
																																																		else {
																																																			$ret = $bytes / 1024;
																																																		}

																																																		if ($bytes < 1099511627776) {
																																																		}

																																																		$ret = $bytes / 1048576;
																																																		return $ret;
																																																	}
																																																	function convert_traffic($bytes)
																																																	{
																																																		if ($bytes < 1024) {
																																																			$ret = $bytes . ' Bytes';

																																																			if ($bytes < 1048576) {
																																																			}

																																																			$ret = round($bytes / 1024, 2) . ' KB';

																																																			if ($bytes < 1073741824) {
																																																				$ret = round($bytes / 1048576, 2) . ' MB';

																																																				if ($bytes < 1099511627776) {
																																																				}

																																																			}
																																																		}
																																																		else {
																																																		}

																																																		$ret = round($bytes / 1073741824, 2) . ' GB';
																																																		return $ret;
																																																	}

																																																	$serverinfo['password'] = 'Ja';
																																																	$serverinfo['virtualserver_created'] = $serverinfo['virtualserver_created'];
																																																	$days = ' Tage';
																																																	$hours = ' Stunden';
																																																	$minutes = ' Minuten';
																																																	$seconds = ' Sekunden';
																																																	$conv_time = costumerNR();
																																																	$serverinfo['virtualserver_uptime'] = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ' . $conv_time['seconds'] . $seconds;
																																																	$serverinfo['virtualserver_clientsonline'] = $serverinfo['virtualserver_clientsonline'];
																																																	$serverinfo['virtualserver_channelsonline'] = $serverinfo['virtualserver_channelsonline'];
																																																	$serverinfo['virtualserver_name'] = $serverinfo['virtualserver_name'];
																																																	$serverinfo['virtualserver_ip'] = $serverinfo['virtualserver_ip'];
																																																	$serverinfo['virtualserver_port'] = $serverinfo['virtualserver_port'];
																																																	$serverinfo['virtualserver_hostbanner_gfx_url'] = $serverinfo['virtualserver_hostbanner_gfx_url'];
																																																	$smarty->assign('serverinfo', $serverinfo);
																																																	$smarty->assign('msg', $msg);
																																																	$smarty->display('customer/serveredit_adm.tpl');
																																																	exit();
																																																	break;
																																																	$result = costumerNR();
																																																	error_reporting(30719);
																																																	$myADM['serverID'] = $row['serverID'];
																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																	$myADM['serverSid'] = $row['serverSid'];
																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																	$myADM['serverPort'] = $row['serverPort'];
																																																	$result2 = ($_SESSION['MyID']);
																																																	error_reporting(30719);
																																																	$myADM['hostID'] = $row2['hostID'];
																																																	$myADM['hostName'] = $row2['hostName'];
																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																	$PSession = array();
																																																	$PSession['id'] = $_GET['id'];
																																																	$PSession['staff'] = $_GET['staff'];
																																																	$scp = costumerNR();
																																																	$connect = mysql_escape_string($_POST['verlaufID']);
																																																	$select = mysql_escape_string($_POST['verlaufApteilID']);
																																																	$kb = 'KB';

																																																	$x = 4310;

																																																	$traffic[$x]['color'] = $color = '#FFFFFF';
																																																	++$x;

																																																	$traffic['connection_packets_received_total'] = conv_traffic($serverinfo['connection_packets_received_total']);
																																																	$traffic['connection_bytes_received_total'] = conv_traffic($serverinfo['connection_bytes_received_total']);
																																																	$traffic['connection_bandwidth_received_last_second_total'] = conv_traffic($serverinfo['connection_bandwidth_received_last_second_total']);

																																																	$traffic['connection_bandwidth_received_last_minute_total'] = conv_traffic($serverinfo['connection_bandwidth_received_last_minute_total']);

																																																	$traffic['connection_filetransfer_bandwidth_received'] = conv_traffic($serverinfo['connection_filetransfer_bandwidth_received']);

																																																	$traffic['connection_packets_sent_total'] = conv_traffic($serverinfo['connection_packets_sent_total']);
																																																	$traffic['connection_bytes_sent_total'] = conv_traffic($serverinfo['connection_bytes_sent_total']);
																																																	$traffic['connection_bandwidth_sent_last_second_total'] = conv_traffic($serverinfo['connection_bandwidth_sent_last_second_total']);
																																																	$traffic['connection_bandwidth_sent_last_minute_total'] = conv_traffic($serverinfo['connection_bandwidth_sent_last_minute_total']);
																																																	$traffic['connection_filetransfer_bandwidth_sent'] = conv_traffic($serverinfo['connection_filetransfer_bandwidth_sent']);
																																																	$traffic['packets_received_total'] = convert_traffic($serverinfo['connection_packets_received_total']);
																																																	$traffic['bytes_received_total'] = convert_traffic($serverinfo['connection_bytes_received_total']);
																																																	$traffic['bandwidth_received_last_second_total'] = convert_traffic($serverinfo['connection_bandwidth_received_last_second_total']);

																																																	$traffic['bandwidth_received_last_minute_total'] = convert_traffic($serverinfo['connection_bandwidth_received_last_minute_total']);
																																																	$traffic['filetransfer_bandwidth_received'] = convert_traffic($serverinfo['connection_filetransfer_bandwidth_received']);
																																																	$traffic['packets_sent_total'] = convert_traffic($serverinfo['connection_packets_sent_total']);
																																																	$traffic['bytes_sent_total'] = convert_traffic($serverinfo['connection_bytes_sent_total']);
																																																	$traffic['bandwidth_sent_last_second_total'] = convert_traffic($serverinfo['connection_bandwidth_sent_last_second_total']);
																																																	$traffic['bandwidth_sent_last_minute_total'] = convert_traffic($serverinfo['connection_bandwidth_sent_last_minute_total']);

																																																	$traffic['filetransfer_bandwidth_sent'] = convert_traffic($serverinfo['connection_filetransfer_bandwidth_sent']);
																																																	$smarty->assign('traffic', $traffic);
																																																	$smarty->assign('msg', $msg);
																																																	$smarty->display('customer/serverTraffic.tpl');
																																																	exit();
																																																	break;
																																																	$result = costumerNR();
																																																	error_reporting(30719);
																																																	$myADM['serverID'] = $row['serverID'];
																																																	$myADM['serverHostID'] = $row['serverHostID'];
																																																	$myADM['serverSid'] = $row['serverSid'];
																																																	$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																																	$myADM['serverPort'] = $row['serverPort'];
																																																	$myTicketDetailAnswere;
																																																	error_reporting(30719);
																																																	$myADM['hostID'] = $row2['hostID'];
																																																	$myADM['hostName'] = $row2['hostName'];
																																																	$myADM['hostUsername'] = $row2['hostUsername'];
																																																	$myADM['hostPassword'] = $row2['hostPassword'];
																																																	$myADM['hostIP'] = $row2['hostIP'];
																																																	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																																	$PSession = array();
																																																	$PSession['id'] = $_GET['id'];
																																																	$PSession['staff'] = $_GET['staff'];
																																																	$scp = ($_POST['ticketBetreff']);
																																																	$connect = mysql_escape_string($MyData['userName']);

																																																	$select = costumerNR();

																																																	$cuserid = (mysql_escape_string($_POST['ticketText']));
																																																	$userloeschen = ($_POST['ticketPrio']);
																																																	$msg = '<div class="alert alert-success">User wurde erfolgreich gelöscht</div>';
																																																	$userlist = mysql_escape_string($_POST['ticketStatus']);

																																																	$list = ( . 'INSERT INTO cms_tickets (ticketApteilID, ticketProductID, ticketUserNumber, ticketUserName, ticketUserEmail, ticketBetreff, ticketText, ticketData, prioritaet, ticketStatus) VALUES (\'1\',\'' . $ticketProductID . '\',\'' . $ticketUserNumber . '\',\'' . $ticketUserName . '\',\'' . $ticketUserEmail . '\',\'' . $ticketBetreff . '\',\'' . $ticketText . '\',\'' . $ticketData . '\',\'' . $prioritaet . '\',\'0\')' . '\',\'' . $ticketUserEmail . '\',\'' . $ticketBetreff . '\',\'' . $ticketText . '\',\'' . $ticketData . '\',\'' . $prioritaet . '\',\'0\')');

																																																	$userlist['clid'] = $list['clid'];
																																																	$userlist['cid'] = $list['cid'];
																																																}
																																															}
																																														}
																																													}
																																												}
																																											}
																																										}
																																										else {
																																											$msg = 'kein channel';
																																											$tokenid1 = $tokenid1 = costumerNR();
																																											$tokens = '';
																																										}
																																									}
																																								}
																																							}
																																							else {
																																								$smarty->assign('channelgruppenliste', $channelgruppenliste);
																																								$smarty->assign('msg', $msg);
																																								$smarty->display('customer/groups.tpl');
																																								exit();
																																								break;
																																								$result = $sgroup['namemode'] == 1;
																																								error_reporting(30719);
																																								$myADM['serverID'] = $row['serverID'];
																																								$myADM['serverHostID'] = $row['serverHostID'];
																																								$myADM['serverSid'] = $row['serverSid'];
																																								$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																								$myADM['serverPort'] = $row['serverPort'];
																																								$result2 = $user_data['client_icon_id'] != 0;
																																								error_reporting(30719);
																																								$myADM['hostID'] = $row2['hostID'];
																																								$myADM['hostName'] = $row2['hostName'];
																																								$myADM['hostUsername'] = $row2['hostUsername'];
																																								$myADM['hostPassword'] = $row2['hostPassword'];
																																								$myADM['hostIP'] = $row2['hostIP'];
																																								$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																																								$PSession = array();
																																								$PSession['id'] = $_GET['id'];
																																								$PSession['staff'] = $_GET['staff'];
																																							}
																																						}
																																					}
																																					else {
																																						($cgname);
																																						$msg = '<div class="alert alert-success">Gruppe wurde erfolgreich angelegt.</div>';
																																						$msg = '<div class="alert alert-error">Es ist ein fehler Aufgetreten. Es wurden nicht alle Punkte ausgrfüllt!</div>';
																																						$servergruppen = costumerNR();

																																						$gruppe = $tsData['clients'][$userid];
																																						$key = costumerNR();
																																						$servergruppenliste[$key]['sgid'] = $gruppe['sgid'];
																																						$servergruppenliste[$key]['name'] = $gruppe['name'];
																																						$servergruppenliste[$key]['type'] = $gruppe['type'];
																																						$servergruppenliste[$key]['iconid'] = $gruppe['iconid'];
																																						$servergruppenliste[$key]['savedb'] = $gruppe['savedb'];

																																						$channelgruppen = $user_data['client_output_hardware'];

																																						$cgruppe = costumerNR();
																																						$key = costumerNR();
																																						$channelgruppenliste[$key]['cgid'] = $cgruppe['cgid'];
																																						$channelgruppenliste[$key]['name'] = $cgruppe['name'];
																																						$channelgruppenliste[$key]['type'] = $cgruppe['type'];
																																						$channelgruppenliste[$key]['iconid'] = $cgruppe['iconid'];
																																						$channelgruppenliste[$key]['savedb'] = $cgruppe['savedb'];

																																						$smarty->assign('servergruppenliste', $servergruppenliste);
																																						$smarty->assign('channelgruppenliste', $channelgruppenliste);
																																						$smarty->assign('msg', $msg);
																																						$smarty->display('customer/groups.tpl');
																																						exit();
																																						break;
																																						$result = $sgroup['namemode'] == 1;
																																						error_reporting(30719);
																																						$myADM['serverID'] = $row['serverID'];
																																						$myADM['serverHostID'] = $row['serverHostID'];
																																						$myADM['serverSid'] = $row['serverSid'];
																																						$myADM['serverUserNumber'] = $row['serverUserNumber'];
																																						$myADM['serverPort'] = $row['serverPort'];
																																					}
																																				}
																																			}
																																		}
																																	}
																																}
																																else {
																																	$smarty->assign('nobans', $nobans);
																																	$smarty->assign('msg', $msg);
																																	$smarty->display('customer/banListe.tpl');
																																	exit();
																																}
																															}
																														}
																													}
																													else {
																														$newcomplainlist[$x]['timestamp'] = $since['timestamp'];
																														++$x;

																														$msg = '<div class="alert alert-warning">Derzeit sind keine Berschwerden vorhanden!</div>';
																													}
																												}
																											}
																										}
																									}
																								}
																								else {
																									$smarty->assign('newcomplainlist', $myADM['hostQueryPort']);
																									$scp = costumerNR();
																									$connect = costumerNR();
																									$select = costumerNR();
																									$complainlist = 'adm';
																									$x = 4310;

																									$since = ($_GET['id']);
																									$x = costumerNR();
																									$newcomplainlist[$x]['tcldbid'] = $since['tcldbid'];
																									$newcomplainlist[$x]['tname'] = $since['tname'];
																									$newcomplainlist[$x]['fcldbid'] = $since['fcldbid'];
																									$newcomplainlist[$x]['fname'] = $since['fname'];
																									$newcomplainlist[$x]['message'] = $since['message'];
																									$newcomplainlist[$x]['timestamp'] = $since['timestamp'];
																									++$x;
																								}
																							}
																						}
																						else {
																							$myADM['serverPort'] = $row['serverPort'];
																							error_reporting(30719);
																							$myADM['hostID'] = $row2['hostID'];
																							$myADM['hostName'] = $row2['hostName'];
																							$myADM['hostUsername'] = $row2['hostUsername'];
																							$myADM['hostPassword'] = $row2['hostPassword'];
																							$myADM['hostIP'] = $row2['hostIP'];
																							$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																							$PSession = array();
																							$PSession['id'] = $_GET['id'];
																							$PSession['staff'] = $_GET['staff'];
																							$smarty->assign('newcomplainlist', $myADM['hostQueryPort']);
																							$scp = costumerNR();
																							$connect = costumerNR();
																							$select = costumerNR();
																							$complainlist = 'adm';
																							$x = 4310;

																							$since = ($_GET['id']);
																							$x = costumerNR();
																							$newcomplainlist[$x]['tcldbid'] = $since['tcldbid'];
																							$newcomplainlist[$x]['tname'] = $since['tname'];
																							$newcomplainlist[$x]['fcldbid'] = $since['fcldbid'];
																							$newcomplainlist[$x]['fname'] = $since['fname'];
																							$newcomplainlist[$x]['message'] = $since['message'];
																							$newcomplainlist[$x]['timestamp'] = $since['timestamp'];
																							++$x;

																							$msg = '<div class="alert alert-warning">Derzeit sind keine Berschwerden vorhanden!</div>';
																							$smarty->assign('newcomplainlist', isset($newcomplainlist));
																						}
																					}
																				}
																			}
																			else {
																				$userlist['cid'] = $list['cid'];
																			}
																		}
																	}
																}
															}
															else {
																$myADM['serverID'] = $row['serverID'];
																$myADM['serverHostID'] = $row['serverHostID'];
																$myADM['serverSid'] = $row['serverSid'];
																$myADM['serverUserNumber'] = $row['serverUserNumber'];
																$myADM['serverPort'] = $row['serverPort'];
																$myTicketDetailAnswere;
																error_reporting(30719);
																$myADM['hostID'] = $row2['hostID'];
																$myADM['hostName'] = $row2['hostName'];
																$myADM['hostUsername'] = $row2['hostUsername'];
																$myADM['hostPassword'] = $row2['hostPassword'];
																$myADM['hostIP'] = $row2['hostIP'];
																$myADM['hostQueryPort'] = $row2['hostQueryPort'];
																$PSession = array();
																$PSession['id'] = $_GET['id'];
																$PSession['staff'] = $_GET['staff'];
																$scp = ($_POST['ticketBetreff']);
																$connect = mysql_escape_string($MyData['userName']);
																$select = costumerNR();
																$cuserid = (mysql_escape_string($_POST['ticketText']));
																$userloeschen = ($_POST['ticketPrio']);
																$msg = '<div class="alert alert-success">User wurde erfolgreich gelöscht</div>';
																$userlist = mysql_escape_string($_POST['ticketStatus']);

																$list = ( . 'INSERT INTO cms_tickets (ticketApteilID, ticketProductID, ticketUserNumber, ticketUserName, ticketUserEmail, ticketBetreff, ticketText, ticketData, prioritaet, ticketStatus) VALUES (\'1\',\'' . $ticketProductID . '\',\'' . $ticketUserNumber . '\',\'' . $ticketUserName . '\',\'' . $ticketUserEmail . '\',\'' . $ticketBetreff . '\',\'' . $ticketText . '\',\'' . $ticketData . '\',\'' . $prioritaet . '\',\'0\')' . '\',\'' . $ticketUserEmail . '\',\'' . $ticketBetreff . '\',\'' . $ticketText . '\',\'' . $ticketData . '\',\'' . $prioritaet . '\',\'0\')');
																$userlist['clid'] = $list['clid'];
																$userlist['cid'] = $list['cid'];

																$userliste = 'Der Kunde [' . $ticketUserName . '] erstellte am ' . date('d.m.Y / H:i:s', time());
																$x = 4310;

																$user = costumerNR();

																$listdbuser[$x]['color'] = $color = '#FFFFFF';
																$listdbuser[$x]['cldbid'] = $user['cldbid'];
																$cldbid[$x]['cldbid'] = $user['cldbid'];
																$listdbuser[$x]['client_unique_identifier'] = $user['client_unique_identifier'];
																$listdbuser[$x]['client_nickname'] = $user['client_nickname'];
																$listdbuser[$x]['client_created'] = $user['client_created'];
																$listdbuser[$x]['client_lastconnected'] = $user['client_lastconnected'];
																$listdbuser[$x]['status'] = '<img src="resurces/img/online.png" alt="Details"  title="ID" />';

																$listdbuser[$x]['status'] = '<img src="resurces/img/offline.png" alt="Details"  title="ID" />';
																++$x;
																$userlistinfo = costumerNR();
																$x = 4310;

																$user = costumerNR();
																$listdbuser[$x]['clid'] = $user['clid'];
																++$x;

																$smarty->assign('listdbuser', $listdbuser);
																$smarty->assign('msg', $msg);
																$smarty->display('customer/userListe.tpl');
																exit();
																break;
																$result = costumerNR();
																$smarty->assign(30719);
																$myADM['serverID'] = $row['serverID'];
																$myADM['serverHostID'] = $row['serverHostID'];
																$myADM['serverSid'] = $row['serverSid'];
																$myADM['serverUserNumber'] = $row['serverUserNumber'];
																$myADM['serverPort'] = $row['serverPort'];
																error_reporting(30719);
															}
														}
													}
													else {
														();
														$myADM['hostID'] = $row2['hostID'];
														$myADM['hostName'] = $row2['hostName'];
														$myADM['hostUsername'] = $row2['hostUsername'];
														$myADM['hostPassword'] = $row2['hostPassword'];
														$myADM['hostIP'] = $row2['hostIP'];
														$myADM['hostQueryPort'] = $row2['hostQueryPort'];
														$PSession = array();
														$PSession['id'] = $_GET['id'];
														$PSession['staff'] = $_GET['staff'];
														$smarty->assign('newcomplainlist', $myADM['hostQueryPort']);
														$scp = costumerNR();
														$connect = costumerNR();
														$select = costumerNR();
														$complainlist = 'adm';
														$x = 4310;

														$since = ($_GET['id']);
														$x = costumerNR();
														$newcomplainlist[$x]['tcldbid'] = $since['tcldbid'];
														$newcomplainlist[$x]['tname'] = $since['tname'];
														$newcomplainlist[$x]['fcldbid'] = $since['fcldbid'];
														$newcomplainlist[$x]['fname'] = $since['fname'];
														$newcomplainlist[$x]['message'] = $since['message'];
														$newcomplainlist[$x]['timestamp'] = $since['timestamp'];
														++$x;

														$msg = '<div class="alert alert-warning">Derzeit sind keine Berschwerden vorhanden!</div>';
														$smarty->assign('newcomplainlist', isset($newcomplainlist));
														$smarty->assign('msg', $msg);
														$smarty->display('customer/beschwerdeListe.tpl');
														exit();
														break;
														$result = costumerNR();
														error_reporting(30719);
													}
												}
											}
										}
									}
								}
							}
							else {
								$myADM['hostName'] = $row2['hostName'];
							}
						}
					}
				}
			}
			else {
				$result2 = ($_SESSION['MyID']);
				error_reporting(30719);
				$myADM['hostID'] = $row2['hostID'];
				$myADM['hostName'] = $row2['hostName'];
				$myADM['hostUsername'] = $row2['hostUsername'];
				$myADM['hostPassword'] = $row2['hostPassword'];
				$myADM['hostIP'] = $row2['hostIP'];
				$myADM['hostQueryPort'] = $row2['hostQueryPort'];
				$PSession = array();
				$PSession['id'] = $_GET['id'];
				$PSession['staff'] = $_GET['staff'];
			}
		}
		else {
			$scp = costumerNR();
		}
	}
}
else {
	$serverinfo['password'] = 'Nein';

	$serverinfo['password'] = 'Ja';
	$serverinfo['virtualserver_created'] = $serverinfo['virtualserver_created'];
	$days = ' Tage';
	$hours = ' Stunden';
	$minutes = ' Minuten';
	$seconds = ' Sekunden';
	$conv_time = costumerNR();
	$serverinfo['virtualserver_uptime'] = $conv_time['days'] . $days . ' ' . $conv_time['hours'] . $hours . ' ' . $conv_time['minutes'] . $minutes . ' ' . $conv_time['seconds'] . $seconds;
	$serverinfo['virtualserver_clientsonline'] = $serverinfo['virtualserver_clientsonline'];
	$serverinfo['virtualserver_channelsonline'] = $serverinfo['virtualserver_channelsonline'];

	$serverinfo['virtualserver_name'] = $serverinfo['virtualserver_name'];

	$serverinfo['virtualserver_ip'] = $serverinfo['virtualserver_ip'];
	$serverinfo['virtualserver_port'] = $serverinfo['virtualserver_port'];
	$serverinfo['virtualserver_hostbanner_gfx_url'] = $serverinfo['virtualserver_hostbanner_gfx_url'];
	$smarty->assign('serverinfo', $serverinfo);
	$smarty->assign('msg', $msg);
	$smarty->display('customer/serveredit_adm.tpl');
	exit();
	break;

	$result = costumerNR();
	error_reporting(30719);
	function conv_traffic($bytes)
	{
		if ($bytes < 1024) {
		}

		$ret = $bytes . '';

		if ($bytes < 1048576) {
			$ret = $bytes < 1024;

			if ($bytes < 1073741824) {
			}
		}
		else {
			$ret = $bytes / 1024;
		}

		if ($bytes < 1099511627776) {
		}

		$ret = $bytes / 1048576;
		return $ret;
	}
	function convert_traffic($bytes)
	{
		if ($bytes < 1024) {
			$ret = $bytes . ' Bytes';

			if ($bytes < 1048576) {
			}

			$ret = round($bytes / 1024, 2) . ' KB';

			if ($bytes < 1073741824) {
				$ret = round($bytes / 1048576, 2) . ' MB';

				if ($bytes < 1099511627776) {
				}

			}
		}
		else {
		}

		$ret = round($bytes / 1073741824, 2) . ' GB';
		return $ret;
	}

	$myADM['serverID'] = $row['serverID'];
	$myADM['serverHostID'] = $row['serverHostID'];
	$myADM['serverSid'] = $row['serverSid'];
	$myADM['serverUserNumber'] = $row['serverUserNumber'];
	$myADM['serverPort'] = $row['serverPort'];
	$result2 = ($_SESSION['MyID']);
	error_reporting(30719);
	$myADM['hostID'] = $row2['hostID'];
	$myADM['hostName'] = $row2['hostName'];
	$myADM['hostUsername'] = $row2['hostUsername'];
	$myADM['hostPassword'] = $row2['hostPassword'];
	$myADM['hostIP'] = $row2['hostIP'];
	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
	$PSession = array();
	$PSession['id'] = $_GET['id'];
	$PSession['staff'] = $_GET['staff'];
	$scp = costumerNR();
	$connect = mysql_escape_string($_POST['verlaufID']);
	$select = mysql_escape_string($_POST['verlaufApteilID']);
	$kb = 'KB';

	$x = 4310;

	$traffic[$x]['color'] = $color = '#FFFFFF';
	++$x;

	$traffic['connection_packets_received_total'] = conv_traffic($serverinfo['connection_packets_received_total']);
	$traffic['connection_bytes_received_total'] = conv_traffic($serverinfo['connection_bytes_received_total']);
	$traffic['connection_bandwidth_received_last_second_total'] = conv_traffic($serverinfo['connection_bandwidth_received_last_second_total']);

	$traffic['connection_bandwidth_received_last_minute_total'] = conv_traffic($serverinfo['connection_bandwidth_received_last_minute_total']);

	$traffic['connection_filetransfer_bandwidth_received'] = conv_traffic($serverinfo['connection_filetransfer_bandwidth_received']);

	$traffic['connection_packets_sent_total'] = conv_traffic($serverinfo['connection_packets_sent_total']);
	$traffic['connection_bytes_sent_total'] = conv_traffic($serverinfo['connection_bytes_sent_total']);
	$traffic['connection_bandwidth_sent_last_second_total'] = conv_traffic($serverinfo['connection_bandwidth_sent_last_second_total']);
	$traffic['connection_bandwidth_sent_last_minute_total'] = conv_traffic($serverinfo['connection_bandwidth_sent_last_minute_total']);
	$traffic['connection_filetransfer_bandwidth_sent'] = conv_traffic($serverinfo['connection_filetransfer_bandwidth_sent']);
	$traffic['packets_received_total'] = convert_traffic($serverinfo['connection_packets_received_total']);
	$traffic['bytes_received_total'] = convert_traffic($serverinfo['connection_bytes_received_total']);
	$traffic['bandwidth_received_last_second_total'] = convert_traffic($serverinfo['connection_bandwidth_received_last_second_total']);

	$traffic['bandwidth_received_last_minute_total'] = convert_traffic($serverinfo['connection_bandwidth_received_last_minute_total']);
	$traffic['filetransfer_bandwidth_received'] = convert_traffic($serverinfo['connection_filetransfer_bandwidth_received']);
	$traffic['packets_sent_total'] = convert_traffic($serverinfo['connection_packets_sent_total']);
	$traffic['bytes_sent_total'] = convert_traffic($serverinfo['connection_bytes_sent_total']);
	$traffic['bandwidth_sent_last_second_total'] = convert_traffic($serverinfo['connection_bandwidth_sent_last_second_total']);
	$traffic['bandwidth_sent_last_minute_total'] = convert_traffic($serverinfo['connection_bandwidth_sent_last_minute_total']);

	$traffic['filetransfer_bandwidth_sent'] = convert_traffic($serverinfo['connection_filetransfer_bandwidth_sent']);
	$smarty->assign('traffic', $traffic);
	$smarty->assign('msg', $msg);
	$smarty->display('customer/serverTraffic.tpl');
	exit();
	break;
	$result = costumerNR();
	error_reporting(30719);
	$myADM['serverID'] = $row['serverID'];
	$myADM['serverHostID'] = $row['serverHostID'];
	$myADM['serverSid'] = $row['serverSid'];
	$myADM['serverUserNumber'] = $row['serverUserNumber'];
	$myADM['serverPort'] = $row['serverPort'];
	$myTicketDetailAnswere;
	error_reporting(30719);
	$myADM['hostID'] = $row2['hostID'];
	$myADM['hostName'] = $row2['hostName'];
	$myADM['hostUsername'] = $row2['hostUsername'];
	$myADM['hostPassword'] = $row2['hostPassword'];
	$myADM['hostIP'] = $row2['hostIP'];
	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
	$PSession = array();
	$PSession['id'] = $_GET['id'];
	$PSession['staff'] = $_GET['staff'];
	$scp = ($_POST['ticketBetreff']);
	$connect = mysql_escape_string($MyData['userName']);

	$select = costumerNR();

	$cuserid = (mysql_escape_string($_POST['ticketText']));
	$userloeschen = ($_POST['ticketPrio']);
	$msg = '<div class="alert alert-success">User wurde erfolgreich gelöscht</div>';
	$userlist = mysql_escape_string($_POST['ticketStatus']);

	$list = ( . 'INSERT INTO cms_tickets (ticketApteilID, ticketProductID, ticketUserNumber, ticketUserName, ticketUserEmail, ticketBetreff, ticketText, ticketData, prioritaet, ticketStatus) VALUES (\'1\',\'' . $ticketProductID . '\',\'' . $ticketUserNumber . '\',\'' . $ticketUserName . '\',\'' . $ticketUserEmail . '\',\'' . $ticketBetreff . '\',\'' . $ticketText . '\',\'' . $ticketData . '\',\'' . $prioritaet . '\',\'0\')' . '\',\'' . $ticketUserEmail . '\',\'' . $ticketBetreff . '\',\'' . $ticketText . '\',\'' . $ticketData . '\',\'' . $prioritaet . '\',\'0\')');

	$userlist['clid'] = $list['clid'];
	$userlist['cid'] = $list['cid'];
}

$scp->login($myADM['hostUsername']);
exit();

?>
