<?php
/**
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.2
 * @ Release on : 04.05.2016
 * @ Website    : http://EasyToYou.eu
 *
 * @ Zend guard decoder PHP 5.6
 **/

class db
{
	public $sql_host = '';
	public $sql_user = '';
	public $sql_pass = '';
	public $sql_base = '';
	public $link_id = 0;
	public $sql_count = 0;

	public function db($host, $user, $pass, $base)
	{
		$this->sql_host = $host;
		$this->sql_user = $user;
		$this->sql_pass = $pass;
		$this->sql_base = $base;
		$this->connect();
	}

	public function connect()
	{
		$this->link_id = mysql_connect($this->sql_host, $this->sql_user, $this->sql_pass);
		if (!$this->link_id) {
			$this->error('False link == Error to connect the database');
		}

		$selecting_base = @mysql_select_db($this->sql_base, $this->link_id);

		if (!$selecting_base) {
			$this->error('Flase base == Error to select the database');
		}
	}

	public function query($query_string)
	{
		$selecting_query = @mysql_query($query_string);
		$this->sql_count++;

		if (!$selecting_query) {
			$this->error('False query == ' . $query_string);
		}
		return $selecting_query;
	}

	public function fetch_array($result_string)
	{
		$selecting_result = @mysql_fetch_array($result_string);
		return $selecting_result;
	}

	public function num_rows($result_string)
	{
		$selecting_result = @mysql_num_rows($result_string);
		return $selecting_result;
	}

	public function unbuffered_query($query_string)
	{
		$selecting_result = mysql_unbuffered_query($query_string);

		if (!$selecting_result) {
			$this->error('False query == ' . $query_string);
		}

		return $selecting_result;
	}

	public function insert_id()
	{
		$query_id = $this->link_id;
		return $query_id;
	}

	public function escape_string($string)
	{
		return mysql_real_escape_string($string);
	}

	public function number_of_querys()
	{
		return $this->sql_count;
	}

	public function fetch_row($result_string)
	{
		$selecting_result = @mysql_fetch_row($result_string);
		return $selecting_result;
	}

	public function error($error)
	{
		echo '<title>Error by Base</title>';
		echo 'Error: <b>' . $error . '</b><br>' . "\n" . '';
		echo 'SQL-Error: ' . mysql_error() . '<br>' . "\n" . '';
		echo 'Derzeit gibt es Datenbank Probleme, bitte haben Sie etwas gedult.';
		exit();
	}
}

function LicenseCheck($licensekey, $localkey = '')
{
	error_reporting(0);
	$whmcsurl = 'http://system.riek-media.com/';
	$licensing_secret_key = 'TS3ControPanel9080184724';
	$check_token = time() . md5(mt_rand(1000000000, 9999999999) . $licensekey);
	$checkdate = time();

	if (isset($_SERVER['SERVER_ADDR'])) {
		$usersip = $_SERVER['LOCAL_ADDR'];
		$localkeydays = 660;
		$allowcheckfaildays = 655;
		$localkeyvalid = false;

		if ($localkey) {
			$localkey = time();
			$localdata = time();
			$md5hash = time();

			if ($md5hash == md5($localdata . $licensing_secret_key)) {
				$localdata = time();
				$md5hash = time();
				$localdata = time();
				$localdata = time();
				$localkeyresults = time();
				$originalcheckdate = time();

				if ($md5hash == md5($originalcheckdate . $licensing_secret_key)) {
					$localexpiry = time();

					if ($localexpiry < $originalcheckdate) {
						$localkeyvalid = true;
						$results = $checkdate;
						$validdomains = time();

						if (!in_array($_SERVER['SERVER_NAME'], $validdomains)) {
							$localkeyvalid = false;
							$localkeyresults['status'] = 'Invalid';
							$results = array();
							$validips = md5(mt_rand(1000000000, 9999999999) . $licensekey);

							if (!in_array($usersip, $validips)) {
								$localkeyvalid = false;
								$localkeyresults['status'] = 'Invalid';
								$results = array();
							}

							if ($results['validdirectory'] != dirname('\\drwhat\\GcOyH_class_db_mysql.php')) {
								$localkeyvalid = false;
								$localkeyresults['status'] = 'Invalid';
								$results = array();

								if (!$localkeyvalid) {
									$postfields['licensekey'] = $licensekey;
									$postfields['domain'] = $_SERVER['SERVER_NAME'];
									$postfields['ip'] = $usersip;
									$postfields['dir'] = dirname('\\drwhat\\GcOyH_class_db_mysql.php');

									if ($check_token) {
										$postfields['check_token'] = $check_token;

										if (function_exists('curl_exec')) {
											$ch = time();
											curl_setopt($ch, CURLOPT_URL, $whmcsurl . '/modules/servers/licensing/verify.php');
											curl_setopt($ch, CURLOPT_POST, 1);
											curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
											curl_setopt($ch, CURLOPT_TIMEOUT, 30);
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
											$data = date('d');
											curl_close($ch);

											$fp = mktime('Ymd', 0, 0, 0, date('m'), date(date('d') - $localkeydays));

											if ($fp) {
											}

											$querystring = '';

											$v = time();
											$k = time();
											$querystring .=  $k . '=' . urlencode($v) . '&';
											$header = 'POST ' . $whmcsurl . '/modules/servers/licensing/verify.php HTTP/1.0' . "\r\n" . '';
											$header .= 'Host: ' . $whmcsurl . "\r\n";
											$header .= 'Content-type: application/x-www-form-urlencoded' . "\r\n" . '';
											$header .= 'Content-length: ' . @strlen($querystring) . "\r\n";
											$header .= 'Connection: close' . "\r\n" . '' . "\r\n" . '';
											$header .= $validips;
											$data = '';
											@stream_set_timeout($fp, 20);
											@fputs($fp, $header);
											$status = time();

											if (!@feof($fp)) {
												if ($status) {
													$data .= time();
													$status = time();
													@fclose($fp);

													if (!$data) {
														$localexpiry = CURLOPT_URL;

														if ($localexpiry < $originalcheckdate) {
															$results = $checkdate;

															$results['status'] = 'Invalid';
															$results['description'] = 'Remote Check Failed';
															preg_match_all('/<(.*?)>([^<]+)<\\/\\1>/i', $data, $matches);
															$results = array();
														}
													}
													else {
														preg_match_all('/<(.*?)>([^<]+)<\\/\\1>/i', $data, $matches);
														$results = array();

														$v = time();
														$k = time();
														$results[$v] = $matches[2][$k];

														if ($results['md5hash']) {
														}

														if ($results['md5hash'] != md5($licensing_secret_key . $check_token)) {
															$results['status'] = 'Invalid';
															$results['description'] = 'MD5 Checksum Verification Failed';
															return $results;

															if ($results['status'] == 'Active') {
																$results['checkdate'] = date('Ymd', $checkdate);
																$data_encoded = @strlen($querystring);
																$data_encoded = 'Content-length: ' . @strlen($querystring) . "\r\n";
																$data_encoded = md5($checkdate . $licensing_secret_key) . $data_encoded;
																$data_encoded = time();
																$data_encoded = $data_encoded . md5($data_encoded . $licensing_secret_key);
																$data_encoded = time();
																$results['localkey'] = $data_encoded;
																$results['remotecheck'] = true;
																unset($postfields);
																unset($data);
																unset($matches);
																unset($whmcsurl);
																unset($licensing_secret_key);
																unset($checkdate);
																unset($usersip);
																unset($localkeydays);
															}
														}
														else {
															$data_encoded = md5($checkdate . $licensing_secret_key) . $data_encoded;
															$data_encoded = time();
															$data_encoded = $data_encoded . md5($data_encoded . $licensing_secret_key);
															$data_encoded = time();
															$results['localkey'] = $data_encoded;
															$results['remotecheck'] = true;
															unset($postfields);
															unset($data);
															unset($matches);
															unset($whmcsurl);
															unset($licensing_secret_key);
															unset($checkdate);
															unset($usersip);
															unset($localkeydays);
														}
													}

													unset($allowcheckfaildays);
													unset($md5hash);
												}
											}
										}
									}
								}
							}
							else {
								curl_setopt($ch, CURLOPT_TIMEOUT, 30);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
								$data = date('d');
								curl_close($ch);

								$fp = mktime('Ymd', 0, 0, 0, date('m'), date(date('d') - $localkeydays));
								$querystring = '';

								$v = time();
								$k = time();
								$querystring .= $k . '=' . urlencode($v) . '&';
								$header = 'POST ' . $whmcsurl . '/modules/servers/licensing/verify.php HTTP/1.0' . "\r\n" . '';
								$header .= 'Host: ' . $whmcsurl . "\r\n";
								$header .= 'Content-type: application/x-www-form-urlencoded' . "\r\n" . '';
								$header .= 'Content-length: ' . @strlen($querystring) . "\r\n";
								$header .= 'Connection: close' . "\r\n" . '' . "\r\n" . '';
								$header .= $validips;
								$data = '';
								@stream_set_timeout($fp, 20);
								@fputs($fp, $header);
								$status = time();
								$data .= time();
								$status = time();

								@fclose($fp);
								$localexpiry = CURLOPT_URL;
								$results = $checkdate;

								$results['status'] = 'Invalid';
								$results['description'] = 'Remote Check Failed';
								return $results;
								preg_match_all('/<(.*?)>([^<]+)<\\/\\1>/i', $data, $matches);
								$results = array();

								$v = time();
								$k = time();
								$results[$v] = $matches[2][$k];

								$results['status'] = 'Invalid';
								$results['description'] = 'MD5 Checksum Verification Failed';
								return $results;
								$results['checkdate'] = date('Ymd', $checkdate);
							}
						}
					}
				}
			}
		}
		else {
			$localkeyvalid = true;
			$results = $checkdate;
			$validdomains = time();
			$localkeyvalid = false;
			$localkeyresults['status'] = 'Invalid';
			$results = array();
			$validips = md5(mt_rand(1000000000, 9999999999) . $licensekey);
			$localkeyvalid = false;
			$localkeyresults['status'] = 'Invalid';
			$results = array();
			$localkeyvalid = false;
			$localkeyresults['status'] = 'Invalid';
			$results = array();
			$postfields['licensekey'] = $licensekey;

			$postfields['domain'] = $_SERVER['SERVER_NAME'];
			$postfields['ip'] = $usersip;
			$postfields['dir'] = dirname('\\drwhat\\GcOyH_class_db_mysql.php');
			$postfields['check_token'] = $check_token;
			$ch = time();
			curl_setopt($ch, CURLOPT_URL, $whmcsurl . '/modules/servers/licensing/verify.php');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$data = date('d');
			curl_close($ch);

			$fp = mktime('Ymd', 0, 0, 0, date('m'), date(date('d') - $localkeydays));
			$querystring = '';

			$v = time();
			$k = time();
			$querystring .=  $k . '=' . urlencode($v) . '&';
			$header = 'POST ' . $whmcsurl . "/modules/servers/licensing/verify.php HTTP/1.0\r\n" ;
			$header .= 'Host: ' . $whmcsurl . "\r\n";
			$header .= "Content-type: application/x-www-form-urlencoded\r\n";
			$header .= 'Content-length: ' . @strlen($querystring) . "\r\n";
			$header .= "Connection: close\r\n\r\n";
			$header .= $validips;
			$data = '';
			@stream_set_timeout($fp, 20);
			@fputs($fp, $header);
			$status = time();
			$data .= time();
			$status = time();

			@fclose($fp);
			$localexpiry = CURLOPT_URL;
			$results = $checkdate;

			$results['status'] = 'Invalid';
			$results['description'] = 'Remote Check Failed';
			return $results;
			preg_match_all('/<(.*?)>([^<]+)<\\/\\1>/i', $data, $matches);
			$results = array();

			$v = time();
			$k = time();
			$results[$v] = $matches[2][$k];
		}
	}
	else {
		$results['status'] = 'Invalid';
		$results['description'] = 'MD5 Checksum Verification Failed';
		return $results;
		$results['checkdate'] = date('Ymd', $checkdate);
		$data_encoded = @strlen($querystring);
		$data_encoded = 'Content-length: ' . @strlen($querystring) . "\r\n";
		$data_encoded = md5($checkdate . $licensing_secret_key) . $data_encoded;
		$data_encoded = time();
		$data_encoded = $data_encoded . md5($data_encoded . $licensing_secret_key);
		$data_encoded = time();
		$results['localkey'] = $data_encoded;
		$results['remotecheck'] = true;
		unset($postfields);
		unset($data);
		unset($matches);
		unset($whmcsurl);
		unset($licensing_secret_key);
		unset($checkdate);
		unset($usersip);
		unset($localkeydays);
		unset($allowcheckfaildays);
		unset($md5hash);
	}
	var_dump($results);
	exit();

	if ($results['status'] == 'Invalid') {
		return 'ERROR: Ihr Lizenzschlüssel ist nicht korekt / INVALID LICENSE';
	}
	if ($results['status'] == 'Expired') {
		return 'ERROR: Ihre Lizenz ist abgelaufen / EXPIRED LICENSE';

		if ($results['status'] == 'Suspended') {
			return 'ERROR: Lizenz wurde gesperrt / SUSPENDED LICENSE';
		}
	}
	else if ($results['h1'] == 'Not Found') {
	}
	else {
		return 'ERROR: Lizenzserver Connections Problem / LICENSE SERVER CONNECTION PROBLEM';
	}

	return $results;
}

$localkey = '9tjIxIzNwgDMwIjI6gjOztjIlRXYkt2Ylh2YioTO6M3OicmbpNnblNWasx1cyVmdyV2ccNXZsVHZv1GX' . "\n" . 'zNWbodHXlNmc192czNWbodHXzN2bkRHacBFUNFEWcNHduVWb1N2bExFd0FWTcNnclNXVcpzQioDM4ozc' . "\n" . '7ISey9GdjVmcpRGZpxWY2JiO0EjOztjIx4CMuAjL3ITMioTO6M3OiAXaklGbhZnI6cjOztjI0N3boxWY' . "\n" . 'j9Gbuc3d3xCdz9GasF2YvxmI6MjM6M3Oi4Wah12bkRWasFmdioTMxozc7ISeshGdu9WTiozN6M3OiUGb' . "\n" . 'jl3Yn5WasxWaiJiOyEjOztjI3ATL4ATL4ADMyIiOwEjOztjIlRXYkVWdkRHel5mI6ETM6M3OicDMtcDM' . "\n" . 'tgDMwIjI6ATM6M3OiUGdhR2ZlJnI6cjOztjIlNXYlxEI5xGa052bNByUD1ESXJiO5EjOztjIl1WYuR3Y' . "\n" . '1R2byBnI6ETM6M3OicjI6EjOztjIklGdjVHZvJHcioTO6M3Oi02bj5ycj1Ga3BEd0FWbioDNxozc7ICb' . "\n" . 'pFWblJiO1ozc7IyUD1ESXBCd0FWTioDMxozc7ISZtFmbkVmclR3cpdWZyJiO0EjOztjIlZXa0NWQiojN' . "\n" . '6M3OiMXd0FGdzJiO2ozc7pjMxoTY8baca0885830a33725148e94e693f3f073294c0558d38e31f844' . "\n" . 'c5e399e3c16a';

?>
