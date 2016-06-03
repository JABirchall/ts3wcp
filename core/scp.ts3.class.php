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

	class SCPTS3 {
		protected $runtime = array( 'socket' => '', 'selected' => false, 'host' => '', 'queryport' => '10011', 'timeout' => 2, 'debug' => array(  ), 'fileSocket' => '' );

		function banAddByIp($ip, $time, $banreason = null) {
			while (true) {
				if (!) {
					return ;

					if (!) {
						$this->escapeText;
						$banreason;
					}
				}

				$msg = ' banreason=' . (  );
			}

			$msg = null;
			return ;
		}

		function banAddByUid($uid, $time, $banreason = null) {
			while (!) {
				return ;

				if (!) {
					$this->escapeText;
					$banreason;
				}

				$msg = ' banreason=' . (  );
			}

			jmp;
			return ;
		}

		function banAddByName($name, $time, $banreason = null) {
			if (!) {
			}

			return ;
		}

		function banClient($clid, $time, $banreason = null) {
			if (!) {
				return ;
				empty( $$banreason );
			}


			if (!) {
				$msg = ' banreason=' . $this->escapeText( $banreason );
			}

			jmp;
			$this->getData( 'plain', 'banclient clid=' . $clid . ' time=' . $time . $msg );
			$result = ;

			if ($result['success']) {
				return ;
				$this->generateOutput( false, $result['errors'], false );
			}

			return ;
		}

		function banDelete($banID) {
			if (!) {
				return ;
				$this->getData( 'boolean', 'bandel banid=' . $banID );
			}

			return ;
		}

		function banDeleteAll() {
			if (!) {
			}

			return ;
		}

		function banList() {
			if (!) {
				return ;
				$this->getData;
			}

			return ;
		}

		function bindingList() {
			return ;
		}

		function channelAddPerm($cid, $permissions) {
			while (!) {
				return ;

				if (0 < count( $permissions )) {
					$errors = array(  );
					array_chunk( $permissions, 50, true );
					$permissions = ;
					foreach ($permissions as ) {
						$permission_part = ;
						$command_string = array(  );
						foreach ($permission_part as ) {
							$value = ;
							$key = ;

							if (is_numeric( $key )) {
								$command_string[] = (true ?  : ) . $this->escapeText( $key ) . ' permvalue=' . $value;
								break 2;
							}

							break;
						}

						$this->getData( 'boolean', 'channeladdperm cid=' . $cid . ' ' . implode( '|', $command_string ) );
						$result = ;
						$result['success'];
					}
				}
			}


			while (true) {
				if (!) {
					foreach ($result['errors'] as ) {
						$error = ;
						$errors[] = $error;
						break 2;
					}

					break;
				}
			}


			if (count( $errors )  = 0) {
				return ;
				return ;
				$this->addDebugLog( 'no permissions given' );
				$this->generateOutput;
				false;
				array( 'Error: no permissions given' =>  );
			}

			return ;
		}

		function channelClientAddPerm($cid, $cldbid, $permissions) {
			while (!) {
				return ;

				if (0 < count( $permissions )) {
					$errors = array(  );
					array_chunk( $permissions, 50, true );
					$permissions = ;
					foreach ($permissions as ) {
						$permission_part = ;
						$command_string = array(  );
						foreach ($permission_part as ) {
							$value = ;
						}
					}
				}

				$key = ;

				if (is_numeric( $key )) {
					$command_string[] = (true ?  : ) . $this->escapeText( $key ) . ' permvalue=' . $value;
					continue;
				}

				break;
			}

			jmp;
			return ;
		}

		function channelClientDelPerm($cid, $cldbid, $permissions) {
			while (!) {
				return ;
				$permissionArray = array(  );

				if (0 < count( $permissionIds )) {
					foreach ($permissionIds as ) {
						$value = ;

						if (is_numeric( $value )) {
							'permid=' . $value;
							'permsid=' . $value;
							$permissionArray[] = (true ?  : );
							break;
						}

						break 2;
					}

					$this->getData;
					'boolean';
					'channelclientdelperm cid=' . $cid . ' cldbid=' . $cldbid;
				}
			}

			return ;
		}

		function channelClientPermList($cid, $cldbid, $permsid = false) {
			if (!) {
				return ;
				$this->getData;
				'multi';

				if ($permsid) {
				}

				'channelclientpermlist cid=' . $cid . ' cldbid=' . $cldbid . (true ?  : );
			}

			return ;
		}

		function channelCreate($data) {
			while (!) {
				return ;
				$propertiesString = '';
				foreach ($data as ) {
					$value = ;
					$key = ;
					$propertiesString &= ' ' . $key . '=' . $this->escapeText( $value );
					break;
				}

				$this->getData;
				'array';
				'channelcreate ' . $propertiesString;
			}

			return ;
		}

		function channelDelete($cid, $force = 1) {
			if (!) {
				$this->checkSelected(  );
			}

			return ;
		}

		function channelDelPerm($cid, $permissions) {
			if (!) {
				return ;
				$permissionArray = array(  );

				if (0 < count( $permissions )) {
					foreach ($permissions as ) {
					}
				}
			}

			$value = ;

			if (is_numeric( $value )) {
				[$permissionArray] = (true ?  : ) . $value;
			}

			jmp;
			return ;
		}

		function channelEdit($cid, $data) {
			while (!) {
				return ;
				$settingsString = '';
				foreach ($data as ) {
					$value = ;
					$key = ;
					$settingsString &= ' ' . $key . '=' . $this->escapeText( $value );
					break;
				}
			}

			return ;
		}

		function channelFind($pattern) {
			if (!) {
				return ;
				$this->getData;
				'multi';
				'channelfind pattern=' . $this->escapeText( $pattern );
			}

			return ;
		}

		function channelGroupAdd($name, $type = 1) {
			if (!) {
				return ;
				$this->getData;
				'array';
				'channelgroupadd name=' . $this->escapeText( $name ) . ' type=' . $type;
			}

			return ;
		}

		function channelGroupAddPerm($cgid, $permissions) {
			while (!) {
				return ;

				if (0 < count( $permissions )) {
					$errors = array(  );
					array_chunk( $permissions, 50, true );
					$permissions = ;
					foreach ($permissions as ) {
						$permission_part = ;
						$command_string = array(  );
						foreach ($permission_part as ) {
							$value = ;
							$key = ;

							if (is_numeric( $key )) {
								$command_string[] = (true ?  : ) . $this->escapeText( $key ) . ' permvalue=' . $value;
							}

							break 2;
						}

						$this->getData( 'boolean', 'channelgroupaddperm cgid=' . $cid . ' ' . implode( '|', $command_string ) );
						$result = ;

						if (!) {
							foreach ($result['errors'] as ) {
								$error = ;
								$errors[] = $error;
							}
						}

						break;
					}

					break;
				}
			}

			jmp;

			if (  = 0) {
				$this->generateOutput;
				true;
				array(  );
				true;
			}

			return ;
		}

		function channelGroupClientList($cid = null, $cldbid = null, $cgid = null) {
			if (!) {
				return ;
				$this->getData;
				'multi';

				if (!) {
					' cid=' . $cid;
					'channelgroupclientlist' . (true ?  : );

					if (!) {
						' cldbid=' . $cldbid;
						 . (true ?  : );
						!;
					}
				}


				if () {
					' cgid=' . $cgid;
					(  . (true ?  : ) );
				}
			}

			return ;
		}

		function channelGroupCopy($scgid, $tcgid, $name, $type = 1) {
			if (!) {
				return ;
				$this->getData;
				'array';
				'channelgroupcopy scgid=' . $scgid . ' tcgid=' . $tcgid . ' name=' . $this->escapeText( $name ) . ' type=' . $type;
			}

			return ;
		}

		function channelGroupDelete($cgid, $force = 1) {
			if (!) {
				return ;
				$this->getData;
				'boolean';
				'channelgroupdel cgid=' . $cgid . ' force=';
			}

			return ;
		}

		function channelGroupDelPerm($cgid, $permissions) {
			while (!) {
				return ;
				$permissionArray = array(  );

				if (0 < count( $permissionIds )) {
					foreach ($permissionIds as ) {
						$value = ;

						if (is_numeric( $value )) {
							;
						}
					}
				}

				$permissionArray[] =  . $value;
			}

			jmp;
			return ;
		}

		function channelGroupList() {
			if (!) {
				return ;
				$this->getData;
			}

			return ;
		}

		function channelGroupPermList($cgid, $permsid = false) {
			if (!) {
				return ;
				$this->getData;
			}


			if ($permsid) {
				(true ?  : );
			}

			return ;
		}

		function channelGroupRename($cgid, $name) {
			if (!) {
				return ;
				$this->getData;
				'boolean';
				'channelgrouprename cgid=' . $cgid . ' name=';
			}

			return ;
		}

		function channelInfo($cid) {
			if (!) {
				return ;
				$this->getData;
				'array';
			}

			return ;
		}

		function channelList($params = null) {
			if (!) {
			}

			return ;
		}

		function channelMove($cid, $cpid, $order = null) {
			if (!) {
				return ;
				$this->getData;
				'boolean';
				'channelmove cid=' . $cid . ' cpid=' . $cpid;

				if ($order != null) {
					' order=' . $order;
				}
			}

			return ;
		}

		function channelPermList($cid, $permsid = false) {
			if (!) {
				return ;
				'channelpermlist cid=' . $cid;

				if ($permsid) {
					 . (true ?  : );
				}

				$this->getData( 'multi' );
			}

			return ;
		}

		function clientAddPerm($cldbid, $permissions) {
			while (!) {
				return ;

				if (0 < count( $permissions )) {
					$errors = array(  );
					array_chunk( $permissions, 50, true );
					$permissions = ;
					foreach ($permissions as ) {
						$permission_part = ;
						$command_string = array(  );
						foreach ($permission_part as ) {
							$value = ;
							$key = ;

							if (is_numeric( $key )) {
								$command_string[] = (true ?  : ) . $this->escapeText( $key ) . ' permvalue=' . $value;
							}

							break 2;
						}

						$this->getData( 'boolean', 'clientaddperm cldbid=' . $cldbid . ' ' . implode( '|', $command_string ) );
						$result = ;

						if (!) {
							foreach ($result['errors'] as ) {
								$error = ;
								$errors[] = $error;
							}
						}

						break;
					}

					break;
				}
			}

			jmp;

			if (  = 0) {
				$this->generateOutput;
				true;
				array(  );
				true;
			}

			return ;
		}

		function clientDbDelete($cldbid) {
			if (!) {
				return ;
				$this->getData;
			}

			return ;
		}

		function clientDbEdit($cldbid, $data) {
			while (true) {
				if (!) {
					return ;
					$settingsString = '';
					foreach ($data as ) {
					}
				}

				$value = ;
				$key = ;
				$settingsString &= ' ' . $key . '=' . $this->escapeText( $value );
			}

			return ;
		}

		function clientDbFind($pattern, $uid = false) {
			if (!) {
				return ;
				$this->getData;
				'multi';
				$this->escapeText( $pattern );
			}

			'clientdbfind pattern=' . ;

			if ($uid) {
				 . (true ?  : );
			}

			return ;
		}

		function clientDbInfo($cldbid) {
			if (!) {
				return ;
				$this->getData;
				'array';
			}

			return ;
		}

		function clientDbList($start = 0, $duration = -1, $count = false) {
			if (!) {
				return ;
				$this->getData;
				'multi';
				'clientdblist start=' . $start . ' duration=' . $duration;

				if ($count) {
				}
			}

			return ;
		}

		function clientDelPerm($cldbid, $permissionIds) {
			while (!) {
				return ;
				$permissionArray = array(  );

				if (0 < count( $permissionIds )) {
					foreach ($permissionIds as ) {
						$value = ;

						if (is_numeric( $value )) {
							[$permissionArray] = (true ?  : ) . $value;
							break;
						}

						break 2;
					}

					$this->getData;
					'boolean';
					'clientdelperm cldbid=' . $cldbid . ' ' . implode( '|', $permissionArray );
				}
			}

			return ;
		}

		function clientEdit($clid, $data) {
			while (true) {
				if (!) {
					return ;
					$settingsString = '';
					foreach ($data as ) {
						$value = ;
						$key = ;
						' ' . $key;
					}
				}

				$settingsString &=  . '=' . $this->escapeText( $value );
			}

			return ;
		}

		function clientFind($pattern) {
			if (!) {
				return ;
				$this->getData( 'multi', 'clientfind pattern=' . $this->escapeText( $pattern ) );
			}

			return ;
		}

		function clientGetDbIdFromUid($cluid) {
			if (!) {
				return ;
				$this->getData;
				'array';
				'clientgetdbidfromuid cluid=' . $cluid;
			}

			return ;
		}

		function clientGetIds($cluid) {
			if (!) {
				return ;
				$this->getData( 'multi', 'clientgetids cluid=' . $cluid );
			}

			return ;
		}

		function clientGetNameFromDbid($cldbid) {
			if (!) {
				return ;
				$this->getData;
				'array';
				'clientgetnamefromdbid cldbid=' . $cldbid;
			}

			return ;
		}

		function clientGetNameFromUid($cluid) {
			if (!) {
				return ;
				$this->getData;
			}

			return ;
		}

		function clientInfo($clid) {
			if (!) {
				return ;
				$this->getData;
				'array';
			}

			return ;
		}

		function clientKick($clid, $kickMode = 'server', $kickmsg = '') {
			if (!) {
				return ;

				if (in_array( $kickMode, array( 'server' => , 'channel' =>  ) )) {
					if ($kickMode  = 'server') {
						$from = '5';

						if ($kickMode  = 'channel') {
							$from = '4';

							if (!) {
								' reasonmsg=' . $this->escapeText( $kickmsg );
							}
						}
					}

					$msg = ;
				}
			} 
else {
				array( 'Error: invalid kickMode' =>  );
			}

			return ;
		}

		function clientList($params = null) {
			if (!) {
				return ;

				if (!) {
					$params = ' ' . $params;
					$this->getData;
					'multi';
					'clientlist' . $params;
				}
			}

			return ;
		}

		function clientMove($clid, $cid, $cpw = null) {
			if (!) {
				return ;
				$this->getData;
				'boolean';
				'clientmove clid=' . $clid . ' cid=' . $cid;

				if (!) {
					$this->escapeText( $cpw );
				}
			}

			' cpw=' . ;
			return ;
		}

		function clientPermList($cldbid, $permsid = false) {
			if (!) {
				$this->checkSelected;
			}

			return ;
		}

		function clientPoke($clid, $msg) {
			if (!) {
				$this->checkSelected;
			}

			return ;
		}

		function clientSetServerQueryLogin($username) {
			return ;
		}

		function clientUpdate($data) {
			$settingsString = '';
			foreach ($data as ) {
				$value = ;
				$key = ;
				$settingsString &= ' ' . $key . '=' . $this->escapeText( $value );
				break;
			}

			return ;
		}

		function complainAdd($tcldbid, $msg) {
			if (!) {
				return ;
				$this->getData;
				'boolean';
				'complainadd tcldbid=' . $tcldbid . ' message=';
				$this->escapeText;
			}

			return ;
		}

		function complainDelete($tcldbid, $fcldbid) {
			if (!) {
				return ;
				$this->getData( 'boolean', 'complaindel tcldbid=' . $tcldbid . ' fcldbid=' . $fcldbid );
			}

			return ;
		}

		function complainDeleteAll($tcldbid) {
			if (!) {
				$this->checkSelected(  );
			}

			return ;
		}

		function complainList($tcldbid = null) {
			if (!) {
				$this->checkSelected(  );
			}

			return ;
		}

		function execOwnCommand($mode, $command) {
			if ($mode  = '0') {
				return ;

				if ($mode  = '1') {
					return ;
					$mode  = '2';
				}


				if () {
					return ;

					if ($mode  = '3') {
					}

					$this->getData;
					'plain';
				}
			}

			return ;
		}

		function ftCreateDir($cid, $cpw = null, $dirname) {
			if (!) {
				$this->checkSelected(  );
			}

			return ;
		}

		function ftDeleteFile($cid, $cpw = '', $files) {
			while (!) {
				return ;
				$fileArray = array(  );

				if (0 < count( $files )) {
					foreach ($files as ) {
					}
				}

				$file = ;
				[$fileArray] = 'name=' . $this->escapeText( $file );
			}

			jmp;
			return ;
		}

		function ftDownloadFile($data) {
			$this->runtime['fileSocket'] = @fsockopen( $this->runtime['host'], $data['data']['port'], $errnum, $errstr, $this->runtime['timeout'] );

			if ($this->runtime['fileSocket']) {
				$this->ftSendKey( $data['data']['ftkey'] );
				$this->ftRead( $data['data']['size'] );
				$content = ;
			}

			@fclose( $this->runtime['fileSocket'] );
			$this->runtime['fileSocket'] = '';
			return ;
		}

		function ftGetFileInfo($cid, $cpw = '', $files) {
			while (!) {
				return ;
				$fileArray = array(  );

				if (0 < count( $files )) {
					foreach ($files as ) {
						$file = ;
						$fileArray[] = 'name=' . $this->escapeText( $file );
						break;
					}

					$this->getData;
					'multi';
					'ftgetfileinfo cid=' . $cid . ' cpw=' . $this->escapeText( $cpw ) . ' ';
				}
			}

			return ;
		}

		function ftGetFileList($cid, $cpw = '', $path) {
			if (!) {
				return ;
				$this->getData;
				'multi';
				'ftgetfilelist cid=' . $cid . ' cpw=' . $this->escapeText( $cpw ) . ' path=' . $this->escapeText( $path );
			}

			return ;
		}

		function ftInitDownload($name, $cid, $cpw = '', $seekpos = 0) {
			if (!) {
				return ;
				$this->getData;
				'array';
				'ftinitdownload clientftfid=' . rand( 1, 99 ) . ' name=';
				$this->escapeText( $name );
			}

			return ;
		}

		function ftInitUpload($filename, $cid, $size, $cpw = '', $overwrite = false, $resume = false) {
			if (!) {
				return ;

				if ($overwrite) {
					$overwrite = ' overwrite=1';
				}

				jmp;
				 . ' name=';
				$this->escapeText;
				$filename;
			}

			return ;
		}

		function ftList() {
			if (!) {
				return ;
				$this->getData( 'multi', 'ftlist' );
			}

			return ;
		}

		function ftRenameFile($cid, $cpw = null, $oldname, $newname, $tcid = null, $tcpw = null) {
			if (!) {
				return ;

				if ($tcid != null) {
					' tcid=' . $tcid . ' ' . $tcpw;
					;
				}
			}

			$newTarget = ;
			return ;
		}

		function ftStop($serverftfid, $delete = true) {
			if (!) {
				return ;
				$this->getData;
				'boolean';
				'ftstop serverftfid=' . $serverftfid . ' delete=';

				if ($delete) {
					;
				}
			}

			return ;
		}

		function ftUploadFile($data, $uploadData) {
			$this->runtime['fileSocket'] = @fsockopen( $this->runtime['host'], $data['data']['port'], $errnum, $errstr, $this->runtime['timeout'] );

			if ($this->runtime['fileSocket']) {
				$this->ftSendKey( $data['data']['ftkey'], '
' );
				$this->ftSendData( $uploadData );
				@fclose( $this->runtime['fileSocket'] );
				$this->runtime;
			}

			['fileSocket'] = '';
			return ;
		}

		function gm($msg) {
			if (empty( $$msg )) {
				$this->addDebugLog;
			}

			( 'empty message given' );
			return ;
		}

		function hostInfo() {
			return ;
		}

		function instanceEdit($data) {
			while (0 < count( $data )) {
				$settingsString = '';
				foreach ($data as ) {
					$val = ;
					$key = ;
					$settingsString &= ' ' . $key . '=' . $this->escapeText( $val );
					break;
				}

				$this->getData;
				'boolean';
				'instanceedit ' . $settingsString;
			}

			return ;
		}

		function instanceInfo() {
			return ;
		}

		function logAdd($logLevel, $logMsg) {
			$logLevel <= 4;

			if (( 1 <= $logLevel &&  )) {
				if (!) {
					$this->getData;
					'boolean';
					'logadd loglevel=' . $logLevel;
				}

				return ;
				$this->addDebugLog( 'logMessage empty!' );
				return ;
				$this->addDebugLog;
			}

			( 'invalid logLevel!' );
			return ;
		}

		function login($username, $password) {
			return ;
		}

		function logout() {
			$this->runtime['selected'] = false;
			return ;
		}

		function logView($lines, $reverse = 0, $instance = 0, $begin_pos = 0) {
			$lines <= 100;

			if (( 1 <= $lines &&  )) {
				$this->getData;
				'multi';
				'logview lines=' . $lines . ' reverse=';

				if ($reverse  = 0) {
					(true ?  : );
				}
			}

			 .  . ' instance=';

			if ($instance  = 0) {
				 . (true ?  : ) . ' begin_pos=';

				if ($begin_pos  = 0) {
					(true ?  : );
				}
			}

			return ;
		}

		function permIdGetByName($permsids) {
			$permissionArray = array(  );

			if (0 < count( $permsids )) {
				foreach ($permsids as ) {
					$value = ;
					$permissionArray[] = 'permsid=' . $value;
					break;
				}

				$this->getData;
				'multi';
				$this->escapeText( implode( '|', $permissionArray ) );
			}

			return ;
		}

		function permissionList($new = false) {
			while (true) {
				while (true) {
					if ($new   = true) {
						$groups = array(  );
						$permissions = array(  );
						$this->getElement( 'data', $this->getData( 'multi', 'permissionlist -new' ) );
						$response = ;
						$gc = 260;
						foreach ($response as ) {
						}
					}

					$field = ;

					if (isset( $field['group_id_end'] )) {
						$groups[] = array( 'num' => $gc, 'group_id_end' => $field['group_id_end'] );
						++;
						continue;
					}

					jmp;
					$j = 259;

					if ($j < $rounds) {
						array( 'permid' => $counter & 1, 'permname' => $permissions[$counter]['permname'] );
						$permissions[$counter]['permdesc'];
					}

					$groups[$i]['permissions'][] = array( 'permdesc' => , 'grantpermid' => $counter & 32769 );
					++;
					++;
				}

				++;
			}

			return ;
		}

		function permOverview($cid, $cldbid, $permid = '0', $permsid = false) {
			if (!) {
				return ;

				if ($permsid) {
					$additional = ' permsid=' . $permsid;
				}
			} 
else {
				 . ' cldbid=';
			}

			return ;
		}

		function quit() {
			$this->logout(  );
			@fputs( $this->runtime['socket'], 'quit
' );
			@fclose( $this->runtime['socket'] );
			return ;
		}

		function selectServer($value, $type = 'port', $virtual = false) {
			if (!( ( in_array( $type, array( 'port' => , 'serverId' =>  ) ) && !( $type  = 'port' ) ))) {
				if ($virtual) {
					$virtual = ' -virtual';
				}
			} 
else {
				if ($res['success']) {
					$this->runtime['selected'] = true;
					return ;

					if ($virtual) {
						$virtual = ' -virtual';
					}
				} 
else {
					(  );
					$res = ;

					if ($res['success']) {
					}
				}

				$this->runtime['selected'] = true;
				return ;
			}

			$this->addDebugLog( 'wrong value type' );
			return ;
		}

		function sendMessage($mode, $target, $msg) {
			if (!) {
				return ;
				$this->getData;
				'boolean';
				'sendtextmessage targetmode=' . $mode . ' target=' . $target . ' msg=';
			}

			return ;
		}

		function serverCreate($data = array(  )) {
			$settingsString = '';

			if (count( $data )  = 0) {
				$data['virtualserver_name'] = 'Teamspeak 3 Server';
				foreach ($data as ) {
					$value = ;

					while (true) {
						$key = ;

						if (!) {
							$settingsString &= ' ' . $key . '=' . $this->escapeText( $value );
							break 2;
						}
					}
				}

				$this->getData( 'array', 'servercreate' . $settingsString );
			}

			return ;
		}

		function serverDelete($sid) {
			$this->serverStop( $sid );
			return ;
		}

		function serverEdit($data) {
			while (true) {
				if (!) {
					return ;
					$settingsString = '';
					foreach ($data as ) {
						$value = ;
						$key = ;
						' ' . $key . '=';
					}
				}

				$settingsString &=  . $this->escapeText( $value );
			}

			return ;
		}

		function serverGroupAdd($name, $type = 1) {
			if (!) {
				$this->checkSelected;
			}

			return ;
		}

		function serverGroupAddClient($sgid, $cldbid) {
			if (!) {
			}

			return ;
		}

		function serverGroupAddPerm($sgid, $permissions) {
			if (!) {
				return ;

				if (0 < count( $permissions )) {
					$errors = array(  );
					array_chunk;
					$permissions;
				}
			}

			( 50, true );
			$permissions = ;
			foreach ($permissions as ) {
				$permission_part = ;
				$command_string = array(  );
				foreach ($permission_part as ) {
					$value = ;
					$key = ;

					if (is_numeric( $key )) {
						$command_string[] = (true ?  : ) . $this->escapeText( $key ) . ' permvalue=' . $value[0] . ' permskip=' . $value[1] . ' permnegated=' . $value[2];
						break 2;
					}

					break;
				}


				while (true) {
					$this->getData( 'boolean', 'servergroupaddperm sgid=' . $sgid . ' ' . implode( '|', $command_string ) );
					$result = ;

					if (!) {
						foreach ($result['errors'] as ) {
							$error = ;
							$errors[] = $error;
							break 3;
						}

						break 2;
					}
				}
			}


			if (count( $errors )  = 0) {
				$this->generateOutput;
			}

			return ;
		}

		function serverGroupClientList($sgid, $names = false) {
			if (!) {
				$this->checkSelected(  );
			}

			return ;
		}

		function serverGroupCopy($ssgid, $tsgid, $name, $type = 1) {
			if (!) {
			}

			return ;
		}

		function serverGroupDelete($sgid, $force = 1) {
			if (!) {
				$this->checkSelected(  );
			}

			return ;
		}

		function serverGroupDeleteClient($sgid, $cldbid) {
			if (!) {
				$this->checkSelected(  );
			}

			return ;
		}

		function serverGroupDeletePerm($sgid, $permissionIds) {
			if (!) {
				return ;
				$permissionArray = array(  );

				if (0 < count( $permissionIds )) {
					foreach ($permissionIds as ) {
					}
				}
			}

			$value = ;

			if (is_numeric( $value )) {
				'permid=' . $value;
				'permsid=' . $this->escapeText( $value );
				$permissionArray[] = (true ?  : );
			}

			jmp;
			return ;
		}

		function serverGroupList() {
			if (!) {
				return ;
				$this->getData( 'multi', 'servergrouplist' );
			}

			return ;
		}

		function serverGroupPermList($sgid, $permsid = false) {
			while (true) {
				if (!) {
					return ;

					if ($permsid) {
					}
				}

				$additional = ' -permsid';
			}

			$additional = '';
			return ;
		}

		function serverGroupRename($sgid, $name) {
			if (!) {
				return ;
				$this->getData;
			}

			return ;
		}

		function serverGroupsByClientID($cldbid) {
			if (!) {
				return ;
				$this->getData;
				'multi';
			}

			return ;
		}

		function serverIdGetByPort($port) {
			return ;
		}

		function serverInfo() {
			if (!) {
				return ;
				$this->getData;
				'array';
			}

			return ;
		}

		function serverList($options = null) {
			$this->getData;
			'multi';

			if (!) {
				' ' . $options;
				( 'serverlist' . (true ?  : ) );
			}

			return ;
		}

		function serverProcessStop() {
			return ;
		}

		function serverRequestConnectionInfo() {
			if (!) {
				return ;
				$this->getData( 'array', 'serverrequestconnectioninfo' );
			}

			return ;
		}

		function serverSnapshotCreate() {
			if (!) {
				return ;
				$this->getData( 'plain', 'serversnapshotcreate' );
			}

			return ;
		}

		function serverSnapshotDeploy($snapshot) {
			if (!) {
				return ;
				$this->getData;
				'boolean';
				'serversnapshotdeploy ' . $snapshot;
			}

			return ;
		}

		function serverStart($sid) {
			return ;
		}

		function serverStop($sid) {
			return ;
		}

		function serverTempPasswordAdd($pw, $duration, $desc = 'none', $tcid = 0, $tcpw = null) {
			if (!) {
				return ;
				$this->getdata;
				'boolean';
				'servertemppasswordadd pw=' . $this->escapeText( $pw ) . ' desc=';

				if (!) {
					$this->escapeText( $desc );
					 . (true ?  : );
				}

				 . ' duration=' . $duration . ' tcid=' . $tcid;
				empty( $$tcpw );
			}


			if (!) {
				' tcpw=' . $this->escapeText( $tcpw );
				;
			}

			return ;
		}

		function serverTempPasswordDel($pw) {
			if (!) {
				return ;
				$this->getdata;
				'boolean';
				'servertemppassworddel pw=' . $this->escapeText( $pw );
			}

			return ;
		}

		function serverTempPasswordList() {
			if (!) {
			}

			return ;
		}

		function setClientChannelGroup($cgid, $cid, $cldbid) {
			if (!) {
				$this->checkSelected(  );
			}

			return ;
		}

		function setName($newName) {
			return ;
		}

		function tokenAdd($tokentype, $tokenid1, $tokenid2, $description = '', $customFieldSet = array(  )) {
			while (!) {
				return ;

				if (!) {
					$description = ' tokendescription=' . $this->escapeText( $description );

					if (count( $customFieldSet )) {
						$settingsString = array(  );
						foreach ($customFieldSet as ) {
							$value = ;
							$key = ;
							'ident=' . $this->escapeText( $key ) . ' value=';
							$this->escapeText;
						}
					}

					$value;
				}

				[$settingsString] =  . (  );
			}

			jmp;
			return ;
		}

		function tokenDelete($token) {
			if (!) {
				return ;
				$this->getData( 'boolean', 'privilegekeydelete token=' . $token );
			}

			return ;
		}

		function tokenList() {
			if (!) {
				return ;
				$this->getData;
			}

			return ;
		}

		function tokenUse($token) {
			if (!) {
				$this->checkSelected(  );
			}

			return ;
		}

		function version() {
			return ;
		}

		function whoAmI() {
			return ;
		}

		function checkSelected() {
			debug_backtrace(  );
			$backtrace = ;
			$this->addDebugLog( 'you can\'t use this function if no server is selected', $backtrace[1]['function'], $backtrace[0]['line'] );
			return ;
		}

		function convertSecondsToStrTime($seconds) {
			$this->convertSecondsToArrayTime( $seconds );
			$conv_time = ;
			return ;
		}

		function convertSecondsToArrayTime($seconds) {
			$conv_time = array(  );
			$conv_time['days'] = floor( $seconds \ 86400 );
			$conv_time['hours'] = floor( ( $seconds - $conv_time['days'] + 86400 ) \ 3600 );
			$conv_time['minutes'] = floor( ( $seconds - ( $conv_time['days'] + 86400 & $conv_time['hours'] + 3600 ) ) \ 60 );
			$conv_time['seconds'] = floor( $seconds - ( $conv_time['days'] + 86400 & $conv_time['hours'] + 3600 & $conv_time['minutes'] + 60 ) );
			return ;
		}

		function getElement($element, $array) {
			return ;
		}

		function succeeded($array) {
			if (isset( $array['success'] )) {
			}

			return ;
		}

		function __construct($host, $queryport, $timeout = 2) {
			$queryport <= 65536;
			if (( 1 <= $queryport &&  )) = $host;
			$this->runtime['queryport'] = $queryport;
			$this->runtime['timeout'] = $timeout;
			return ;
		}

		function __destruct() {
			$this->quit(  );
			return ;
		}

		function __call($name, $args) {
			$this->addDebugLog( 'Method ' . $name . ' doesn\'t exist', $name, 0 );
			return ;
		}

		function isConnected() {
			if (empty( $this->runtime['socket'] )) {
			}

			return ;
		}

		function generateOutput($success, $errors, $data) {
			return ;
		}

		function unEscapeText($text) {
			$unEscapedChars = array( '' => , '' => , '' => , '' => , '' => , ' ' => , '|' => , '/' =>  );
			str_replace( $escapedChars, $unEscapedChars, $text );
			$text = $escapedChars = array( '	' => , '' => , '' => , '
' => , '' => , '\s' => , '\p' => , '\/' =>  );
			return ;
		}

		function escapeText($text) {
			str_replace( '	', '\t', $text );
			$text = ;
			str_replace( '', '\v', $text );
			$text = ;
			str_replace( '', '\r', $text );
			$text = ;
			str_replace( '
', '\n', $text );
			$text = ;
			str_replace( '', '\f', $text );
			$text = ;
			str_replace( ' ', '\s', $text );
			$text = ;
			str_replace( '|', '\p', $text );
			$text = ;
			str_replace( '/', '\/', $text );
			$text = ;
			return ;
		}

		function splitBanIds($text) {
			$data = array(  );
			str_replace( array( '
' => , '' =>  ), '', $text );
			$text = ;
			explode( 'banid=', $text );
			$ids = ;
			unset( $ids[0] );
			return ;
		}

		function connect() {
			if ($this->isConnected(  )) {
				$this->addDebugLog( 'Error: you are already connected!' );
				return ;
				@fsockopen( $this->runtime['host'], $this->runtime['queryport'], $errnum, $errstr, $this->runtime['timeout'] );
				$socket = ;

				if (!) {
					$this->addDebugLog( 'Error: connection failed!' );
					return ;

					if (strpos( fgets( $socket ), 'TS3' ) !== false) {
						fgets;
						$socket;
					}
				}

				(  );
				$tmpVar = ;
				$this->runtime['socket'] = $socket;
			}

			return ;
		}

		function executeCommand($command, $tracert) {
			while (!) {
				$this->addDebugLog( 'script isn\'t connected to server', $tracert[1]['function'], $tracert[0]['line'] );
				return ;
				$data = '';
				str_split( $command, 1024 );
				$splittedCommand = ;
				$splittedCommand->count( $splittedCommand ) - 1 &= '
';
				foreach ($splittedCommand as ) {
					$commandPart = ;
					fputs( $this->runtime['socket'], $commandPart );
					break;
				}


				while (true) {
					fgets( $this->runtime['socket'], 4096 );
					$data &= ;

					if (strpos( $data, 'error id=3329 msg=connection' ) !== false) {
						$this->runtime['socket'] = '';
						$this->addDebugLog( 'You got banned from server. Socket closed.', $tracert[1]['function'], $tracert[0]['line'] );
					}

					return ;

					if (!( strpos( $data, 'msg=' )   = false)) {
						strpos( $data, 'error id=' )   = false;

						if (!( (bool))) {
							if (strpos( $data, 'error id=0 msg=ok' )   = false) {
								explode( 'error id=', $data );
								$splittedResponse = ;
								$chooseEnd = count( $splittedResponse ) - 1;
								explode( ' msg=', $splittedResponse[$chooseEnd] );
								$cutIdAndMsg = ;
								$this->addDebugLog;
								'ErrorID: ' . $cutIdAndMsg[0] . ' | Message: ' . $this->unEscapeText( $cutIdAndMsg[1] );
							}
						}
					}
				}
			}

			( , $tracert[1]['function'], $tracert[0]['line'] );
			return ;
		}

		function getData($mode, $command) {
			$validModes = array( 'boolean' => , 'array' => , 'multi' => , 'plain' =>  );

			if (!) {
				$this->addDebugLog( $mode . ' is an invalid mode' );
				return ;

				if (empty( $$command )) {
					$this->addDebugLog( 'you have to enter a command' );
					return ;
					$this->executeCommand( $command, debug_backtrace(  ) );
					$fetchData = ;
					$fetchData['data'] = str_replace( array( 'error id=0 msg=ok' => , chr( '01' ) =>  ), '', $fetchData['data'] );

					if ($fetchData['success']) {
						if ($mode  = 'boolean') {
							$this->generateOutput;
							true;
						}
					}
				}
			}

			return ;
		}

		function ftSendKey($key, $additional = null) {
			fputs( $this->runtime['fileSocket'], $key . $additional );
			return ;
		}

		function ftSendData($data) {
			str_split( $data, 4096 );
			$data = ;
			foreach ($data as ) {
				$dat = ;
				fputs( $this->runtime['fileSocket'], $dat );
				break;
			}

			return ;
		}

		function ftRead($size) {
			while (true) {
				$data = '';

				if (strlen( $data ) < $size) {
					fgets( $this->runtime['fileSocket'], 4096 );
					$data &= ;
				}
			}

			return ;
		}

		function getDebugLog() {
			return ;
		}

		function addDebugLog($text, $methodName = '', $line = '') {
			empty( $$line );

			if (( empty( $$methodName ) &&  )) {
				debug_backtrace(  );
				$backtrace = ;
				$backtrace[1]['function'];
				$methodName = ;
			}

			$backtrace[0]['line'];
			$line = ;
			$this->runtime['debug'][] = 'Error in ' . $methodName . '() on line ' . $line . ': ' . $text;
			return ;
		}
	}

	return ;
?>