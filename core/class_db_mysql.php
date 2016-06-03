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

	class db {
		var $sql_host = '';
		var $sql_user = '';
		var $sql_pass = '';
		var $sql_base = '';
		var $link_id = 0;
		var $sql_count = 0;

		function db($host, $user, $pass, $base) {
			$this->sql_host = ;
			$this->sql_user = ;
			$this->sql_pass = ;
			$this->sql_base = ;
			$this->connect(  );
			return ;
		}

		function connect() {
			@mysql_connect( $this->sql_host, $this->sql_user, $this->sql_pass );
			$this->link_id = ;

			if (!) {
				$this->error( 'False link == Error to connect the database' );
				@mysql_select_db( $this->sql_base );
				$selecting_base = ;

				if (!) {
				}

				$this->error( 'Flase base == Error to select the database' );
			}

			return ;
		}

		function query($query_string) {
			@mysql_query( $query_string );
			$selecting_query = ;
			$this->sql_count++;

			if (!) {
			}

			$this->error( 'False query == ' .  . $query_string );
			return ;
		}

		function fetch_array($result_string) {
			$selecting_result = @mysql_fetch_array( $result_string );
			return ;
		}

		function num_rows($result_string) {
			$selecting_result = @mysql_num_rows( $result_string );
			return ;
		}

		function unbuffered_query($query_string) {
			mysql_unbuffered_query( $query_string );
			$selecting_result = ;

			if (!) {
				$this->error;
			}

			( 'False query == ' .  . $query_string );
			return ;
		}

		function insert_id() {
			@mysql_insert_id( $this->link_id );
			$query_id = ;
			return ;
		}

		function escape_string($string) {
			return ;
		}

		function number_of_querys() {
			return ;
		}

		function fetch_row($result_string) {
			$selecting_result = @mysql_fetch_row( $result_string );
			return ;
		}

		function error($error) {
			echo ;
			echo ;
			echo ;
			echo ;
			exit(  );
		}
	}

	function LicenseCheck($licensekey, $localkey = '') {
		error_reporting( 0 );
		$whmcsurl = 'http://system.riek-media.com/';
		$licensing_secret_key = 'TS3ControPanel9080184724';
		$check_token = time(  ) . md5( mt_rand( 1000000000, 9999999999 ) . $licensekey );
		date( 'Ymd' );
		$checkdate = ;

		if (isset( $['SERVER_ADDR'] )) {
			$['SERVER_ADDR'];
			$['LOCAL_ADDR'];
			$usersip = (true ?  : );
			$localkeydays = 660;
			$allowcheckfaildays = 655;
			$localkeyvalid = false;

			if ($localkey) {
				str_replace( '
', '', $localkey );
				$localkey = ;
				substr( $localkey, 0, strlen( $localkey ) - 32 );
				$localdata = ;
				substr( $localkey, strlen( $localkey ) - 32 );
				$md5hash = ;

				if ($md5hash  = md5( $localdata . $licensing_secret_key )) {
					strrev( $localdata );
					$localdata = ;
					substr( $localdata, 0, 32 );
					$md5hash = ;
					substr( $localdata, 32 );
					$localdata = ;
					base64_decode( $localdata );
					$localdata = ;
					unserialize( $localdata );
					$localkeyresults = ;
					$localkeyresults['checkdate'];
					$originalcheckdate = ;

					if ($md5hash  = md5( $originalcheckdate . $licensing_secret_key )) {
						date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) - $localkeydays, date( 'Y' ) ) );
						$localexpiry = ;
						$localexpiry < $originalcheckdate;
					}
				}
			}


			if () {
				$localkeyvalid = true;
				$results = $checkdate;
				explode( ',', $results['validdomain'] );
				$validdomains = ;

				if (!) {
					$localkeyvalid = false;
					$localkeyresults['status'] = 'Invalid';
					$results = array(  );
					explode( ',', $results['validip'] );
					$validips = ;

					if (!) {
						$localkeyvalid = false;
						$localkeyresults['status'] = 'Invalid';
						$results = array(  );
						$results['validdirectory'];
						dirname;
					}


					if ( != ( __FILE__ )) {
						$localkeyvalid = false;
						$localkeyresults['status'] = 'Invalid';
						$results = array(  );

						if (!) {
							$postfields['licensekey'] = $licensekey;
							$postfields['domain'] = $['SERVER_NAME'];
							$postfields['ip'] = $usersip;
							$postfields['dir'] = dirname( __FILE__ );

							if ($check_token) {
								$postfields['check_token'] = $check_token;

								if (function_exists( 'curl_exec' )) {
									curl_init(  );
									$ch = ;
									curl_setopt( $ch, CURLOPT_URL, $whmcsurl . '/modules/servers/licensing/verify.php' );
									curl_setopt( $ch, CURLOPT_POST, 1 );
									curl_setopt( $ch, CURLOPT_POSTFIELDS, $postfields );
									curl_setopt;
									$ch;
								}
							}
						}
					}

					( CURLOPT_TIMEOUT, 30 );
					curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
					curl_exec( $ch );
					$data = ;
					curl_close( $ch );
				}
			}
		} 
else {
			if ( != md5( $licensing_secret_key . $check_token )) {
				$results['status'] = 'Invalid';
				$results['description'] = 'MD5 Checksum Verification Failed';
				return ;

				if ($results['status']  = 'Active') {
					$results['checkdate'] = date( 'Ymd', $checkdate );
					serialize;
				}
			}
		}

		( $results );
		$data_encoded = ;
		base64_encode( $data_encoded );
		$data_encoded = ;
		$data_encoded = md5( $checkdate . $licensing_secret_key ) . $data_encoded;
		strrev( $data_encoded );
		$data_encoded = ;
		$data_encoded = $data_encoded . md5( $data_encoded . $licensing_secret_key );
		wordwrap( $data_encoded, 80, '
', true );
		$data_encoded = ;
		$results['localkey'] = $data_encoded;
		$results['remotecheck'] = true;
		unset( $$postfields );
		unset( $$data );
		unset( $$matches );
		unset( $$whmcsurl );
		unset( $$licensing_secret_key );
		unset( $$checkdate );
		unset( $$usersip );
		unset( $$localkeydays );
		unset( $$allowcheckfaildays );
		unset( $$md5hash );

		if ($results['status']  = 'Invalid') {
			return ;
			$results['status']  = 'Expired';
		}


		if () {
			return ;

			if ($results['status']  = 'Suspended') {
				return ;
			}
		} 
else {
			if ($results['h1']  = 'Not Found') {
			}

			return ;
		}

		return ;
	}

	$localkey = '9tjIxIzNwgDMwIjI6gjOztjIlRXYkt2Ylh2YioTO6M3OicmbpNnblNWasx1cyVmdyV2ccNXZsVHZv1GX
zNWbodHXlNmc192czNWbodHXzN2bkRHacBFUNFEWcNHduVWb1N2bExFd0FWTcNnclNXVcpzQioDM4ozc
7ISey9GdjVmcpRGZpxWY2JiO0EjOztjIx4CMuAjL3ITMioTO6M3OiAXaklGbhZnI6cjOztjI0N3boxWY
j9Gbuc3d3xCdz9GasF2YvxmI6MjM6M3Oi4Wah12bkRWasFmdioTMxozc7ISeshGdu9WTiozN6M3OiUGb
jl3Yn5WasxWaiJiOyEjOztjI3ATL4ATL4ADMyIiOwEjOztjIlRXYkVWdkRHel5mI6ETM6M3OicDMtcDM
tgDMwIjI6ATM6M3OiUGdhR2ZlJnI6cjOztjIlNXYlxEI5xGa052bNByUD1ESXJiO5EjOztjIl1WYuR3Y
1R2byBnI6ETM6M3OicjI6EjOztjIklGdjVHZvJHcioTO6M3Oi02bj5ycj1Ga3BEd0FWbioDNxozc7ICb
pFWblJiO1ozc7IyUD1ESXBCd0FWTioDMxozc7ISZtFmbkVmclR3cpdWZyJiO0EjOztjIlZXa0NWQiojN
6M3OiMXd0FGdzJiO2ozc7pjMxoTY8baca0885830a33725148e94e693f3f073294c0558d38e31f844
c5e399e3c16a';
	return ;
?>