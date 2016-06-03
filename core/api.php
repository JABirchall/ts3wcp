<?php

/**
 * @ PHP 5.3
 * @ Decoder version : 1.0.0.2
 * @ Release on : 04.05.2016
 * @ Website    : http://EasyToYou.eu
 *
 * @ Zend guard decoder PHP 5.3
 **/

function costumerNR()
{
	global $db;
	mt_srand(microtime() * 1000000);
	$randvalkunde = mt_rand();
	$kunde = substr($randvalkunde, 0, 8);
	$result = microtime();
	$row = mt_rand();
	$vorhandene_Nummern = array();
	$zahl = 238;

	if ($zahl <= count($row)) {
		error_reporting(0);
		$vorhandene_Nummern[''] = $row[$zahl]['userName'];
		error_reporting(1 | 2 | 4);
		++$zahl;
	}

	if (in_array($kunde, $vorhandene_Nummern)) {
	}

	return costumerNR();
	return $kunde;
}

function creatServer()
{
	global $db;

	global $API;
	global $PostData;
	$result2 = $db->query('SELECT * FROM cms_hostsystems WHERE hostTyp=\'ts3\'');
	error_reporting(30719);

	$myADM['hostID'] = $row2['hostID'];
	$myADM['hostName'] = $row2['hostName'];
	$myADM['hostUsername'] = $row2['hostUsername'];
	$myADM['hostPassword'] = $row2['hostPassword'];
	$myADM['hostIP'] = $row2['hostIP'];
	$myADM['hostQueryPort'] = $row2['hostQueryPort'];
	$PSession = array();

	if ($scp->getElement('success', $scp->connect())) {
		$connect = $scp->login($myADM['hostUsername'], $myADM['hostPassword']);
		$scp->setName('Administrator');

		if (isset($_POST)) {
			$_POST['cratserver']['virtualserver_name'] = $PostData['virtualserver_name'];
			$_POST['cratserver']['virtualserver_maxclients'] = $PostData['virtualserver_maxclients'];
			$_POST['cratserver']['virtualserver_autostart'] = $PostData['virtualserver_autostart'];

			if (!empty($_POST['cratserver']['virtualserver_name'])) {
			}

			if (!empty($_POST['cratserver']['virtualserver_maxclients'])) {
				$token = $scp->serverCreate($_POST['cratserver']);

				if ($token['success'] === false) {
					$i = 482;

					if (($i + 1) == count($token['errors'])) {
						$msg = '<div class=\'alert alert-error\'>' . $token['errors'][$i] . '<br /></div>';
						++$i;
						$serverSid = $token['data']['sid'];
						$serverHostID = $myADM['hostID'];
						$serverUserNumber = costumernr();
						$serverPort = $token['data']['virtualserver_port'];
						$result = mysql_query( . 'INSERT INTO cms_users (userNumber, userName, userFirstName, userLastName) VALUES (\'' . $serverUserNumber . '\',\'' . $PostData['vorname'] . '\',\'' . $PostData['vorname'] . '\',\'' . $PostData['nachname'] . '\')');
						$result2 = mysql_query( . 'INSERT INTO cms_servers (serverSid, serverHostID, serverUserNumber, serverPort) VALUES (\'' . $serverSid . '\',\'' . $serverHostID . '\',\'' . $serverUserNumber . '\',\'' . $serverPort . '\')');
					}

					$insertLo = 'Der TeamSpeak 3 Server mit der ID [' . $token['data']['sid'] . ', Kundennummer: ' . $serverUserNumber . '] wurde erfolgreich eingetragen!';
					setlog($insertLo);
					$insertLo = 'Es wurde erfolgreich einen Kunden über den API User angelegt!';
					setlog($insertLo);
					$insertLo = 'Es wurde erfolgreich einen Teamspeak 3 Server über den API User angelegt!';
					setlog($insertLo);
					$empfaenger = $PostData['email'];
					$betreff = 'TS3 Server Daten';
					$text = utf8_decode('Sehr geehrter Kunde, ' . "\r\n" . '			' . "\r\n" . 'hiermit erhalten Sie Ihre Zugangsdaten zu Ihrem Teamspeak 3 Server.' . "\r\n" . '' . "\r\n" . 'Mit diesem Berechtigunsschlüssel erhalten Sie Ihre ServerAdmin Rechte. Beachten Sie bitte das dieser Schlüssel nur einmal Gültig ist. ' . "\r\n" . '' . "\r\n" . 'Serverip / Port: -> ' . $getTeamSpeakID['hostIP'] . ':' . $token['data']['virtualserver_port'] . '' . "\r\n" . 'Berechtigungsschlüssel: -> ' . $token['data']['token'] . '' . "\r\n" . '' . "\r\n" . 'Nach erfolgreicher benutzung des Schlüssels können Sie sich einen QueryLogin erstellen womit Sie sich jederzeit in Unser Webinterface einlogen können und Ihre Grundlegenden Einstellungen tätigen können oder neue Schlüssel erstellen können. ' . "\r\n" . '' . "\r\n" . 'Bei Fragen stehn wir ihnen selbstverständlich jederzeit zur verfügung.' . "\r\n" . '' . "\r\n" . 'Mit freundlichen Grüßen' . "\r\n" . '' . $absendername . '');
					mail($PostData['email'], $betreff, $text, 'From: System <' . $PostData['email'] . '>');

					$msg = '<div class=\'alert alert-error\'>Es wurde kein Servername und keine Email angegeben</div>';
					$result = $db->query('SELECT * FROM cms_users WHERE userLevel=\'0\'');
					$num = $db->num_rows($result);

					if ($num != '0') {
						$x = 482;

						if ($row = $db->fetch_array($result)) {
							if ($x % 2) {
								$customerlist[$x]['color'] = $color = '#FFFFFF';
								$customerlist[$x]['userID'] = $row['userID'];
								$customerlist[$x]['userNumber'] = $row['userNumber'];
								$customerlist[$x]['userName'] = $row['userName'];
								$customerlist[$x]['userFirstName'] = $row['userFirstName'];
								$customerlist[$x]['userLastName'] = $row['userLastName'];
								$customerlist[$x]['userEmail'] = $row['userEmail'];

								if ($row['userLevel'] == 0) {
									$customerlist[$x]['userLevel'] = 'Kunde';
									$customerlist[$x]['userRegisterData'] = date('d.m.Y - H:i:s', $row['userRegisterData']);
								}

								$customerlist[$x]['userLastLogin'] = date('d.m.Y - H:i:s', $row['userLastLogin']);

								if ($row['userStatus'] == 0) {
									$customerlist[$x]['userStatus'] = '<span class="badge badge-success">Activ</span>';

									if ($row['userStatus'] == 1) {
									}
								}
								else {
									$customerlist[$x]['userStatus'] = '<span class="badge badge-warning">Teilsperre</span>';
								}
							}
						}
					}
					else {
						$customerlist[$x]['userID'] = $row['userID'];
						$customerlist[$x]['userNumber'] = $row['userNumber'];
						$customerlist[$x]['userName'] = $row['userName'];
						$customerlist[$x]['userFirstName'] = $row['userFirstName'];
					}
				}
			}
			else {
				$msg = '<div class=\'alert alert-error\'>' . $token['errors'][$i] . '<br /></div>';
				++$i;
				$serverSid = 'Sehr geehrter Kunde, ' . "\r\n" . '			' . "\r\n" . 'hiermit erhalten Sie Ihre Zugangsdaten zu Ihrem Teamspeak 3 Server.' . "\r\n" . '' . "\r\n" . 'Mit diesem Berechtigunsschlüssel erhalten Sie Ihre ServerAdmin Rechte. Beachten Sie bitte das dieser Schlüssel nur einmal Gültig ist. ' . "\r\n" . '' . "\r\n" . 'Serverip / Port: -> ' . $getTeamSpeakID['hostIP'] . ':' . $token['data']['virtualserver_port'] . '' . "\r\n" . 'Berechtigungsschlüssel: -> ' . $token['data']['token'] . '' . "\r\n" . '' . "\r\n" . 'Nach erfolgreicher benutzung des Schlüssels können Sie sich einen QueryLogin erstellen womit Sie sich jederzeit in Unser Webinterface einlogen können und Ihre Grundlegenden Einstellungen tätigen können oder neue Schlüssel erstellen können. ' . "\r\n" . '' . "\r\n" . 'Bei Fragen stehn wir ihnen selbstverständlich jederzeit zur verfügung.' . "\r\n" . '' . "\r\n" . 'Mit freundlichen Grüßen' . "\r\n" . '' . $absendername;
				$serverHostID = utf8_decode('Sehr geehrter Kunde, ' . "\r\n" . '			' . "\r\n" . 'hiermit erhalten Sie Ihre Zugangsdaten zu Ihrem Teamspeak 3 Server.' . "\r\n" . '' . "\r\n" . 'Mit diesem Berechtigunsschlüssel erhalten Sie Ihre ServerAdmin Rechte. Beachten Sie bitte das dieser Schlüssel nur einmal Gültig ist. ' . "\r\n" . '' . "\r\n" . 'Serverip / Port: -> ' . $getTeamSpeakID['hostIP'] . ':' . $token['data']['virtualserver_port'] . '' . "\r\n" . 'Berechtigungsschlüssel: -> ' . $token['data']['token'] . '' . "\r\n" . '' . "\r\n" . 'Nach erfolgreicher benutzung des Schlüssels können Sie sich einen QueryLogin erstellen womit Sie sich jederzeit in Unser Webinterface einlogen können und Ihre Grundlegenden Einstellungen tätigen können oder neue Schlüssel erstellen können. ' . "\r\n" . '' . "\r\n" . 'Bei Fragen stehn wir ihnen selbstverständlich jederzeit zur verfügung.' . "\r\n" . '' . "\r\n" . 'Mit freundlichen Grüßen' . "\r\n" . '' . $absendername . '');
				$serverUserNumber = costumernr();
				$serverPort = 'From: System <' . $PostData['email'] . '>';
				$result = $row['userStatus'];
				$result2 = $num != '0';
				$insertLo = 'Der TeamSpeak 3 Server mit der ID [' . $token['data']['sid'] . ', Kundennummer: ' . $serverUserNumber . '] wurde erfolgreich eingetragen!';
				setlog($insertLo);
				$insertLo = 'Es wurde erfolgreich einen Kunden über den API User angelegt!';
				setlog($insertLo);
				$insertLo = 'Es wurde erfolgreich einen Teamspeak 3 Server über den API User angelegt!';
				setlog($insertLo);
				$row;
				$betreff = 'TS3 Server Daten';
				$row;
				mail($PostData['email'], $betreff, $text, 'From: System <' . $PostData['email'] . '>');

				$msg = '<div class=\'alert alert-error\'>Es wurde kein Servername und keine Email angegeben</div>';
				$row;
				$num = $db->num_rows($result);
				$x = 482;
				$customerlist[$x]['color'] = $color = '#FFFFFF';
				$customerlist[$x]['userID'] = $row['userID'];
				$customerlist[$x]['userNumber'] = $row['userNumber'];
				$customerlist[$x]['userName'] = $row['userName'];
				$customerlist[$x]['userFirstName'] = $row['userFirstName'];
				$customerlist[$x]['userLastName'] = $row['userLastName'];
				$customerlist[$x]['userEmail'] = $row['userEmail'];
				$customerlist[$x]['userLevel'] = 'Kunde';
			}
		}
	}
	else {
		$customerlist[$x]['userName']['userName'] = $row['userName'];
		$customerlist[$x]['userFirstName'] = $row['userFirstName'];
		$customerlist[$x]['userLastName'] = $row['userLastName'];
		$customerlist[$x]['userEmail'] = $row['userEmail'];
		$customerlist[$x]['userLevel'] = 'Kunde';
		$customerlist[$x]['userRegisterData'] = date('d.m.Y - H:i:s', $row['userRegisterData']);
		$customerlist[$x]['userLastLogin'] = date('d.m.Y - H:i:s', $row['userLastLogin']);
		$customerlist[$x]['userStatus'] = '<span class="badge badge-success">Activ</span>';

		$customerlist[$x]['userStatus'] = '<span class="badge badge-warning">Teilsperre</span>';

		if ($row['userStatus'] == 2) {
			$customerlist[$x]['userStatus'] = '<span class="badge badge-important">Vollsperre</span>';
			++$x;
			$msg = '<div class="alert alert-warning">Derzeit sind keine Kunden vorhanden!</div>';
		}
	}

	return $msg;
}

function setlog($insertLo)
{
	global $db;
	$newtime = time();
	$result = $GLOBALS['db'];
}

session_start();
error_reporting(1 | 2 | 4);
ini_set('display_errors', 1);
include 'config.php';
include 'class_db_mysql.php';
require_once 'scp.ts3.class.php';
$db = new db($dbhost, $dbuser, $dbpass, $db);
$PostData['username'] = 'phpcode';
$PostData['vorname'] = 'Sascha';
$PostData['nachname'] = 'Riek';
$PostData['email'] = 's.riek@riek-media.de';
$PostData['virtualserver_name'] = 'Mein Teamspeak Server';
$PostData['virtualserver_maxclients'] = 1;
$PostData['virtualserver_autostart'] = 0;
$API['userName'] = 'API User Mikki';
echo creatserver();

?>
