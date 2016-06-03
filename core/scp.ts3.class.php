<?php
/**
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.2
 * @ Release on : 04.05.2016
 * @ Website    : http://EasyToYou.eu
 *
 * @ Zend guard decoder PHP 5.6
 **/

class SCPTS3
{
	private $runtime = array(
		'socket'     => '',
		'selected'   => false,
		'host'       => '',
		'queryport'  => '10011',
		'timeout'    => 2,
		'debug'      => array(),
		'fileSocket' => ''
		);

	public function banAddByIp($ip, $time, $banreason = NULL)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (!empty($banreason)) {
				$msg = ' banreason=' . $this->escapeText($banreason);

				$msg = NULL;
			}
		}
		else {
			$msg = ' banreason=' . $this->getData($banreason);

			$msg = NULL;
		}

		return $this->getData('array', $this->runtime['selected']);
	}

	public function banAddByUid($uid, $time, $banreason = NULL)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (!empty($banreason)) {
			}

			$msg = ' banreason=' . $this->escapeText($banreason);

			$msg = NULL;
		}
		else {
			$msg = NULL;
		}

		return $this->getData('array', 'banadd uid=' . $uid . ' time=' . $time . $msg);
	}

	public function banAddByName($name, $time, $banreason = NULL)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();

		if (!empty($banreason)) {
		}

		$msg = ' banreason=' . $this->escapeText($banreason);

		$msg = NULL;
		return $this->getData('array', 'banadd name=' . $this->escapeText($name) . ' time=' . $time . $msg);
	}

	public function banClient($clid, $time, $banreason = NULL)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		if (!empty($banreason)) {
			$msg = ' banreason=' . $this->escapeText($banreason);

			$msg = '';
			$result = ' banreason=' . $this->escapeText($banreason);

			if ($result['success']) {
				return $this->generateOutput(true, $result['errors'], $this->splitBanIds($result['data']));
			}
		}
		else {
		}

		return $this->generateOutput(false, $result['errors'], false);
	}

	public function banDelete($banID)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('boolean', 'bandel banid=' . $banID);
	}

	public function banDeleteAll()
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('boolean', 'bandelall');
	}

	public function banList()
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('multi', 'banlist');
	}

	public function bindingList()
	{
		return $this->getData('multi', 'bindinglist');
	}

	public function channelAddPerm($cid, $permissions)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (0 < count($permissions)) {
				$errors = array();

				$permissions = 0 < count($permissions);

				$permission_part = array_chunk($permissions, 50, true);
				$command_string = array();

				$value = array();
				$key = ($this->runtime['selected']);

				if (is_numeric($key)) {
					$command_string[] = 'permsid=' . $this->escapeText($key) . ' permvalue=' . $value;
				}
				else {
					$result = 'channeladdperm cid=' . $cid . ' ';

					$error = !$result['success'];
					$errors[] = $error;

					if (count($errors) == 0) {
						return $this->generateOutput(true, array(), true);
						return $this->generateOutput(false, $errors, false);
						$this->addDebugLog('no permissions given');
					}
				}
			}
		}
		else {
			$error = !$result['success'];
			$errors[] = $error;

			return $this->generateOutput(true, array(), true);
			return $this->generateOutput(false, $errors, false);
			$this->addDebugLog('no permissions given');
		}

		return $this->generateOutput(false, array('Error: no permissions given'), false);
	}

	public function channelClientAddPerm($cid, $cldbid, $permissions)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (0 < count($permissions)) {
				$errors = array();
				$permissions = ($this->runtime['selected']);

				$permission_part = !$this->runtime['selected'];
				$command_string = array();

				$value = array();
			}
			else {
				$value = array();
				$key = ($this->runtime['selected']);

				if (is_numeric($key)) {
					$command_string[] = 'permsid=' . $this->escapeText($key) . ' permvalue=' . $value;

					$result = 'permsid=' . $this->escapeText($key) . ' permvalue=';

					$error = 'channelclientaddperm cid=' . $cid . ' cldbid=' . $cldbid;
					$errors[] = $error;

					if (count($errors) == 0) {
						return $this->generateOutput(true, array(), true);
					}
				}
			}
		}
		else {
			return (true, array(), true);
		}

		return $this->generateOutput(false, $errors, false);
		$this->addDebugLog('no permissions given');
		return $this->generateOutput(false, array('Error: no permissions given'), false);
	}

	public function channelClientDelPerm($cid, $cldbid, $permissions)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
			$permissionArray = array();

			if (0 < count($permissionIds)) {
				$value = ($this->runtime['selected']);

				if (is_numeric($value)) {
					$permissionArray[] = 'permid=' . 'permsid=' . $value;
				}
				else {
					return $this->getData('|', 'channelclientdelperm cid=' . $cid . ' cldbid=' . $cldbid . ' ' . implode('|', $permissionArray));
				}
			}
		}
		else {
			return $this->addDebugLog('boolean', 'channelclientdelperm cid=' . $cid . ' cldbid=' . $cldbid . ' ' . implode('|', $permissionArray));
			$this->addDebugLog('no permissions given');
		}

		return $this->generateOutput(false, array('Error: no permissions given'), false);
	}

	public function channelClientPermList($cid, $cldbid, $permsid = false)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if ($permsid) {
			}

		}

		return $this->getData('multi', 'channelclientpermlist cid=' . $cid . ' cldbid=' . $cldbid . '');
	}

	public function channelCreate($data)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
			$propertiesString = '';

			$value = ($this->runtime['selected']);
			$key = ($this->runtime['selected']);
			$propertiesString .= ' ' . $key . '=' . $this->escapeText($value);
		}

		return $this->getData('array', 'channelcreate ' . $propertiesString);
	}

	public function channelDelete($cid, $force = 1)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('boolean', 'channeldelete cid=' . $cid . ' force=' . $force);
	}

	public function channelDelPerm($cid, $permissions)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
			$permissionArray = array();

			if (0 < count($permissions)) {
				$value = ($this->runtime['selected']);

				if (is_numeric($value)) {
					$permissionArray[] = 'permsid=' . $value;
				}
				else {
				}
			}
		}
		else {
			$value = ($this->runtime['selected']);

			$permissionArray[] = 'permsid=' . $value;
			return $this->getData('boolean', 'channeldelperm cid=' . $cid . ' ' . implode('|', $permissionArray));
			$this->addDebugLog('no permissions given');
		}

		return $this->generateOutput(false, array('Error: no permissions given'), false);
	}

	public function channelEdit($cid, $data)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
			$settingsString = '';

			$value = $this->checkSelected();
			$key = ($this->runtime['selected']);

			$settingsString .= ' ' . $key . '=' . $this->escapeText($value);
		}

		return $this->getData('boolean', 'channeledit cid=' . $cid . $settingsString);
	}

	public function channelFind($pattern)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('multi', 'channelfind pattern=' . $this->escapeText($pattern));
	}

	public function channelGroupAdd($name, $type = 1)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('array', 'channelgroupadd name=' . $this->escapeText($name) . ' type=' . $type);
	}

	public function channelGroupAddPerm($cgid, $permissions)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (0 < count($permissions)) {
				$errors = array();

				$permissions = 0 < count($permissions);

				$permission_part = array_chunk($permissions, 50, true);

				$command_string = array();

				$value = array();
				$key = ($this->runtime['selected']);

				if (is_numeric($key)) {
					$command_string[] = 'permsid=' . $this->escapeText($key) . ' permvalue=' . $value;
				}
				else {
					$result = 'channelgroupaddperm cgid=' . $cid . ' ';

					$error = !$result['success'];
					$errors[] = $error;
				}
			}
			else {
			}
		}
		else if (count($errors) == 0) {
		}

		return $this->generateOutput(true, array(), true);
		return $this->generateOutput(false, $errors, false);
		$this->addDebugLog('no permissions given');
		return $this->generateOutput(false, array('Error: no permissions given'), false);
	}

	public function channelGroupClientList($cid = NULL, $cldbid = NULL, $cgid = NULL)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (!empty($cid)) {
				if (!empty($cldbid)) {
				}
			}
			else if (!empty($cgid)) {
			}
		}

		return $this->getData('multi', 'channelgroupclientlist' . ' cid=' . '' . ' cldbid=' . '' . ' cgid=' . '');
	}

	public function channelGroupCopy($scgid, $tcgid, $name, $type = 1)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('array', 'channelgroupcopy scgid=' . $scgid . ' tcgid=' . $tcgid . ' name=' . $this->escapeText($name) . ' type=' . $type);
	}

	public function channelGroupDelete($cgid, $force = 1)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('boolean', 'channelgroupdel cgid=' . $cgid . ' force=' . $force);
	}

	public function channelGroupDelPerm($cgid, $permissions)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
			$permissionArray = array();

			if (0 < count($permissionIds)) {
				$value = ($this->runtime['selected']);

				if (is_numeric($value)) {
					$permissionArray[] = 'permsid=' . $value;
				}
			}
			else {
				$permissionArray[] = 'permsid=' . $value;
			}
		}
		else {
			return implode('boolean', 'channelgroupdelperm cgid=' . $cgid . ' ' . implode('|', $permissionArray));
			$this->addDebugLog('no permissions given');
		}

		return $this->generateOutput(false, array('Error: no permissions given'), false);
	}

	public function channelGroupList()
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('multi', 'channelgrouplist');
	}

	public function channelGroupPermList($cgid, $permsid = false)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		if ($permsid) {
		}
		else {
		}

		return $this->getData('multi', 'channelgrouppermlist cgid=' . $cgid . '');
	}

	public function channelGroupRename($cgid, $name)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('boolean', 'channelgrouprename cgid=' . $cgid . ' name=' . $this->escapeText($name));
	}

	public function channelInfo($cid)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('array', 'channelinfo cid=' . $cid);
	}

	public function channelList($params = NULL)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();

		if (!empty($params)) {
			$params = ' ' . $params;
		}

		return $this->getData('multi', 'channellist' . $params);
	}

	public function channelMove($cid, $cpid, $order = NULL)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if ($order != NULL) {
			}
		}
		else {
		}

		return $this->getData('boolean', 'channelmove cid=' . $cid . ' cpid=' . $cpid . ' order=' . '');
	}

	public function channelPermList($cid, $permsid = false)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if ($permsid) {
			}
			else {
			}
		}

		return $this->getData('channelpermlist cid=' . $cid . '', 'channelpermlist cid=' . $cid . '');
	}

	public function clientAddPerm($cldbid, $permissions)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (0 < count($permissions)) {
				$errors = array();

				$permissions = 0 < count($permissions);

				$permission_part = array_chunk($permissions, 50, true);

				$command_string = array();

				$value = array();
				$key = ($this->runtime['selected']);

				if (is_numeric($key)) {
					$command_string[] = 'permsid=' . $this->escapeText($key) . ' permvalue=' . $value;
				}
				else {
					$result = 'clientaddperm cldbid=' . $cldbid . ' ';

					$error = !$result['success'];
					$errors[] = $error;
				}
			}
			else {
			}
		}
		else if (count($errors) == 0) {
		}

		return $this->generateOutput(true, array(), true);
		return $this->generateOutput(false, $errors, false);
		$this->addDebugLog('no permissions given');
		return $this->generateOutput(false, array('Error: no permissions given'), false);
	}

	public function clientDbDelete($cldbid)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('boolean', 'clientdbdelete cldbid=' . $cldbid);
	}

	public function clientDbEdit($cldbid, $data)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
			$settingsString = '';
		}
		else {
			$value = $this->checkSelected();
			$key = ($this->runtime['selected']);

			$settingsString .= ' ' . $key . '=' . $this->escapeText($value);
		}

		return $this->getData('boolean', 'clientdbedit cldbid=' . $cldbid . $settingsString);
	}

	public function clientDbFind($pattern, $uid = false)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		if ($uid) {
		}

		return $this->getData('multi', 'clientdbfind pattern=' . $this->escapeText($pattern) . '');
	}

	public function clientDbInfo($cldbid)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('array', 'clientdbinfo cldbid=' . $cldbid);
	}

	public function clientDbList($start = 0, $duration = -1, $count = false)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if ($count) {
			}
		}

		return ('multi', 'clientdblist start=' . $start . ' duration=' . $duration . '');
	}

	public function clientDelPerm($cldbid, $permissionIds)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
			$permissionArray = array();

			if (0 < count($permissionIds)) {
				$value = ($this->runtime['selected']);

				if (is_numeric($value)) {
					$permissionArray[] = 'permsid=' . $value;
					return $this->getData('boolean', 'clientdelperm cldbid=' . $cldbid . ' ' . implode('|', $permissionArray));
				}
			}
		}
		else {
			return $this->addDebugLog('no permissions given', 'clientdelperm cldbid=' . $cldbid . ' ' . implode('|', $permissionArray));
		}

		$this->addDebugLog('no permissions given');
		return $this->generateOutput(false, array('Error: no permissions given'), false);
	}

	public function clientEdit($clid, $data)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
			$settingsString = '';

			$value = $this->checkSelected();
			$key = ($this->runtime['selected']);
		}
		else {
			$settingsString .= ' ' . $key . '=' . $this->escapeText($value);
		}

		return $this->getData('boolean', 'clientedit clid=' . $clid . $settingsString);
	}

	public function clientFind($pattern)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('multi', 'clientfind pattern=' . $this->escapeText($pattern));
	}

	public function clientGetDbIdFromUid($cluid)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('array', 'clientgetdbidfromuid cluid=' . $cluid);
	}

	public function clientGetIds($cluid)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('multi', 'clientgetids cluid=' . $cluid);
	}

	public function clientGetNameFromDbid($cldbid)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('array', 'clientgetnamefromdbid cldbid=' . $cldbid);
	}

	public function clientGetNameFromUid($cluid)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('array', 'clientgetnamefromuid cluid=' . $cluid);
	}

	public function clientInfo($clid)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('array', 'clientinfo clid=' . $clid);
	}

	public function clientKick($clid, $kickMode = 'server', $kickmsg = '')
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (in_array($kickMode, array('server', 'channel'))) {
				if ($kickMode == 'server') {
					$from = '5';

					if ($kickMode == 'channel') {
						$from = '4';

						if (!empty($kickmsg)) {
						}

						$msg = ' reasonmsg=' . $this->escapeText($kickmsg);

						$msg = '';
						return $this->getData('boolean', 'clientkick clid=' . $clid . ' reasonid=' . $from . $msg);
						$this->addDebugLog('invalid kickMode');
					}
				}
				else {
					$msg = ' reasonmsg=' . $this->escapeText($kickmsg);
					$msg = '';
					return $this->getData('boolean', 'clientkick clid=' . $clid . ' reasonid=' . $from . $msg);
					$this->addDebugLog('invalid kickMode');
				}

			}
		}
		else {
		}

		return $this->generateOutput(false, array('Error: invalid kickMode'), false);
	}

	public function clientList($params = NULL)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (!empty($params)) {
				$params = ' ' . $params;
			}
		}
		else {
		}

		return $this->getData('clientlist' . $params, 'clientlist' . $params);
	}

	public function clientMove($clid, $cid, $cpw = NULL)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (!empty($cpw)) {
			}
		}
		else {
		}

		return (, 'clientmove clid=' . $clid . ' cid=' . $cid . ' cpw=' . '');
	}

	public function clientPermList($cldbid, $permsid = false)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();

		if ($permsid) {
		}

		return $this->getData('multi', 'clientpermlist cldbid=' . $cldbid . '');
	}

	public function clientPoke($clid, $msg)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('boolean', 'clientpoke clid=' . $clid . ' msg=' . $this->escapeText($msg));
	}

	public function clientSetServerQueryLogin($username)
	{
		return $this->getData('array', 'clientsetserverquerylogin client_login_name=' . $this->escapeText($username));
	}

	public function clientUpdate($data)
	{
		$settingsString = '';

		$settingsString .= ' ' . $key . '=' . $this->escapeText($value);

		return $this->getData('boolean', 'clientupdate ' . $settingsString);
	}

	public function complainAdd($tcldbid, $msg)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('boolean', 'complainadd tcldbid=' . $tcldbid . ' message=' . $this->escapeText($msg));
	}

	public function complainDelete($tcldbid, $fcldbid)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('boolean', 'complaindel tcldbid=' . $tcldbid . ' fcldbid=' . $fcldbid);
	}

	public function complainDeleteAll($tcldbid)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('boolean', 'complaindelall tcldbid=' . $tcldbid);
	}

	public function complainList($tcldbid = NULL)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();

		if (!empty($tcldbid)) {
			$tcldbid = ' tcldbid=' . $tcldbid;
		}

		return $this->getData('multi', 'complainlist' . $tcldbid);
	}

	public function execOwnCommand($mode, $command)
	{
		if ($mode == '0') {
			return $this->getData('boolean', $command);

			if ($mode == '1') {
				return $this->getData('array', $command);
			}
			if ($mode == '2') {
				return $this->getData('multi', $command);

				if ($mode == '3') {
				}
			}
		}
		else {
		}

		return ('plain', $command);
	}

	public function ftCreateDir($cid, $cpw = NULL, $dirname)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('boolean', 'ftcreatedir cid=' . $cid . ' cpw=' . $this->escapeText($cpw) . ' dirname=' . $this->escapeText($dirname));
	}

	public function ftDeleteFile($cid, $cpw = '', $files)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
			$fileArray = array();

			if (0 < count($files)) {
			}

			$file = ($this->runtime['selected']);

			$fileArray[] = 'name=' . $this->escapeText($file);
		}

		return $this->getData('boolean', ($this->runtime['selected']) . ' cpw=' . $this->escapeText($cpw) . ' ' . implode('|', $fileArray));
		$this->addDebugLog('no files given');
		return $this->generateOutput(false, array('Error: no files given'), false);
	}

	public function ftDownloadFile($data)
	{
		$this->runtime['fileSocket'] = @fsockopen($this->runtime['host'], $data['data']['port'], $errnum, $errstr, $this->runtime['timeout']);

		if ($this->runtime['fileSocket']) {
		}

		@fclose($this->runtime['fileSocket']);
		$this->runtime['fileSocket'] = '';
		return $content;
		$this->addDebugLog('fileSocket returns ' . $errnum . ' | ' . $errstr);
		return $this->generateOutput(false, array('Error in fileSocket: ' . $errnum . ' | ' . $errstr), false);
	}

	public function ftGetFileInfo($cid, $cpw = '', $files)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
			$fileArray = array();

			if (0 < count($files)) {
				$file = ($this->runtime['selected']);
				$fileArray[] = 'name=' . $this->escapeText($file);
			}
		}
		else {
		}

		return $this->getData('ftgetfileinfo cid=' . $cid . ' cpw=' . $this->escapeText($cpw) . ' ' . implode('|', $fileArray), 'ftgetfileinfo cid=' . $cid . ' cpw=' . $this->escapeText($cpw) . ' ' . implode('|', $fileArray));
		$this->addDebugLog('no files given');
		return $this->generateOutput(false, array('Error: no files given'), false);
	}

	public function ftGetFileList($cid, $cpw = '', $path)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('multi', ($this->runtime['selected']) . ' cpw=' . $this->escapeText($cpw) . ' path=' . $this->escapeText($path));
	}

	public function ftInitDownload($name, $cid, $cpw = '', $seekpos = 0)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('array', 'ftinitdownload clientftfid=' . rand(1, 99) . ' name=' . $this->escapeText($name) . ' cid=' . $cid . ' cpw=' . $this->escapeText($cpw) . ' seekpos=' . $seekpos);
	}

	public function ftInitUpload($filename, $cid, $size, $cpw = '', $overwrite = false, $resume = false)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if ($overwrite) {
				$overwrite = ' overwrite=1';

				$overwrite = ' overwrite=0';

				if ($resume) {
					$resume = ' resume=1';

					$resume = ' resume=0';
				}
				else {
				}
			}
			else {
			}
		}

		return $this->getData('array', 'ftinitupload clientftfid=' . rand(1, 99) . ' name=' . $this->escapeText($filename) . ' cid=' . $cid . ' cpw=' . $this->escapeText($cpw) . ' size=' . ($size + 1) . $overwrite . $resume);
	}

	public function ftList()
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('multi', 'ftlist');
	}

	public function ftRenameFile($cid, $cpw = NULL, $oldname, $newname, $tcid = NULL, $tcpw = NULL)
	{
		return $this->checkSelected();

		if ($tcid != NULL) {
			$newTarget = ' tcid=' . $tcid . ' ' . '';
		}

		return $this->getData('boolean', 'ftrenamefile cid=' . $cid . ' cpw=' . $cpw . ' oldname=' . $this->escapeText($oldname) . ' newname=' . $this->escapeText($newname) . $newTarget);
	}

	public function ftStop($serverftfid, $delete = true)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if ($delete) {
			}
		}
		else {
		}

		return $this->getData('boolean', 'ftstop serverftfid=' . $serverftfid . ' delete=' . '0');
	}

	public function ftUploadFile($data, $uploadData)
	{
		$this->runtime['fileSocket'] = @fsockopen($this->runtime['host'], $data['data']['port'], $errnum, $errstr, $this->runtime['timeout']);

		if ($this->runtime['fileSocket']) {
			$this->ftSendKey($data['data']['ftkey'], "\n");
			$this->ftSendData($uploadData);
			@fclose($this->runtime['fileSocket']);
		}

		$this->runtime['fileSocket'] = '';
		return $this->runtime['fileSocket'];
		$this->addDebugLog('fileSocket returns ' . $errnum . ' | ' . $errstr);
		return $this->generateOutput(false, array('Error in fileSocket: ' . $errnum . ' | ' . $errstr), false);
	}

	public function gm($msg)
	{
		if (empty($msg)) {
		}

		$this->addDebugLog('empty message given');
		return $this->generateOutput(false, array('Error: empty message given'), false);
		return $this->getData('boolean', 'gm msg=' . $this->escapeText($msg));
	}

	public function hostInfo()
	{
		return $this->getData('array', 'hostinfo');
	}

	public function instanceEdit($data)
	{
		if (0 < count($data)) {
			$settingsString = '';

			$val = count($data);
			$key = count($data);

			$settingsString .= ' ' . $key . '=' . $this->escapeText($val);
		}

		return $this->getData('boolean', 'instanceedit ' . $settingsString);
		$this->addDebugLog('empty array entered');
		return $this->generateOutput(false, array('Error: You can \'t give an empty array'), false);
	}

	public function instanceInfo()
	{
		return $this->getData('array', 'instanceinfo');
	}

	public function logAdd($logLevel, $logMsg)
	{
		if (1 <= $logLevel) {
			if ($logLevel <= 4) {
				if (!empty($logMsg)) {
				}

				return $this->getData('boolean', 'logadd loglevel=' . $logLevel . ' logmsg=' . $this->escapeText($logMsg));
				$this->addDebugLog('logMessage empty!');
				return $this->generateOutput(false, array('Error: logMessage empty!'), false);
			}
		}
		else {
			$this->addDebugLog('logMessage empty!');
			return $this->generateOutput(false, array('Error: logMessage empty!'), false);
		}

		$this->addDebugLog('invalid logLevel!');
		return $this->generateOutput(false, array('Error: invalid logLevel!'), false);
	}

	public function login($username, $password)
	{
		return $this->getData('boolean', 'login ' . $this->escapeText($username) . ' ' . $this->escapeText($password));
	}

	public function logout()
	{
		$this->runtime['selected'] = false;
		return $this->getData('boolean', 'logout');
	}

	public function logView($lines, $reverse = 0, $instance = 0, $begin_pos = 0)
	{
		if (1 <= $lines) {
			if ($lines <= 100) {
				if ($reverse == 0) {
					if ($instance == 0) {
						if ($begin_pos == 0) {
						}
					}
					else {
						return $this->getData('multi', 'logview lines=' . $lines . ' reverse=' . '1' . ' instance=' . '1' . ' begin_pos=' . '1');
						$this->addDebugLog('please choose a limit between 1 and 100');
					}
				}
			}
			else {
				return $this->generateOutput(, 'logview lines=' . $lines . ' reverse=' . '1' . ' instance=' . '1' . ' begin_pos=' . '1');
			}
		}
		else {
			$this->addDebugLog('please choose a limit between 1 and 100');
		}

		$this->generateOutput(false, array('Error: please choose a limit between 1 and 100'), false);
	}

	public function permIdGetByName($permsids)
	{
		$permissionArray = array();

		if (0 < count($permsids)) {
			$value = array();
			$permissionArray[] = 'permsid=' . $value;
		}

		return $this->getData('multi', 'permidgetbyname ' . $this->escapeText(implode('|', $permissionArray)));
		$this->addDebugLog('no permissions given');
		return $this->generateOutput(false, array('Error: no permissions given'), false);
	}

	public function permissionList($new = false)
	{
		if ($new === true) {
			$groups = array();
			$permissions = array();
			$response = $this->getData('multi', 'permissionlist -new');
			$gc = 260;
		}
		else {
			$field = $new === true;

			if (isset($field['group_id_end'])) {
				$groups[] = array('num' => $gc, 'group_id_end' => $field['group_id_end']);
				++$gc;

				$permissions[] = $field;
				$counter = 259;
				$i = 259;

				if ($i < count($groups)) {
					$rounds = $groups[$i]['group_id_end'] - $counter;
				}

				$groups[$i]['pcount'] = $rounds;
			}

			$j = 259;

			if ($j < $rounds) {
			}

			$groups[$i]['permissions'][] = $new === true;
			++$counter;
			++$j;
			++$i;
		}

		return $groups;
		return $this->getData('multi', 'permissionlist');
	}

	public function permOverview($cid, $cldbid, $permid = '0', $permsid = false)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if ($permsid) {
				$additional = ' permsid=' . $permsid;
				$additional = '';
			}
		}
		else {
		}

		return $this->getData('multi', 'permoverview cid=' . $cid . ' cldbid=' . $cldbid . ' permid=' . $permid . $additional);
	}

	private function quit()
	{
		$this->logout();
		@fputs($this->runtime['socket'], 'quit' . "\n" . '');
		@fclose($this->runtime['socket']);
	}

	public function selectServer($value, $type = 'port', $virtual = false)
	{
		if (in_array($type, array('port', 'serverId'))) {
			if ($type == 'port') {
				if ($virtual) {
					$virtual = ' -virtual';

					$virtual = '';
					$res = array('port', 'serverId');

					if ($res['success']) {
						$this->runtime['selected'] = true;
						return $res;

						if ($virtual) {
							$virtual = ' -virtual';

							$virtual = '';
							$res = $res['success'];

							if ($res['success']) {
							}
						}
					}
					else {
						$res;
						$this->runtime['selected'] = true;
						return $res;
					}
				}
			}
		}
		else {
			$virtual = ' -virtual';

			$virtual = '';
			$res = array('port', 'serverId');
			$this->runtime['selected'] = true;
			return $res;
			$virtual = ' -virtual';

			$virtual = '';
			$res = $res['success'];
			$this->runtime['selected'] = true;
			return $res;
		}

		$this->addDebugLog('wrong value type');
		return $this->generateOutput(false, array('Error: wrong value type'), false);
	}

	public function sendMessage($mode, $target, $msg)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('boolean', 'sendtextmessage targetmode=' . $mode . ' target=' . $target . ' msg=' . $this->escapeText($msg));
	}

	public function serverCreate($data = array())
	{
		$settingsString = '';

		if (count($data) == 0) {
			$data['virtualserver_name'] = 'Teamspeak 3 Server';

			$value = count($data);

			$key = count($data);

			$settingsString .= ' ' . $key . '=' . $this->escapeText($value);
		}

		return $this->getData('array', 'servercreate' . $settingsString);
	}

	public function serverDelete($sid)
	{
		$this->serverStop($sid);
		return $this->getdata('boolean', 'serverdelete sid=' . $sid);
	}

	public function serverEdit($data)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
			$settingsString = '';

			$value = ($this->runtime['selected']);
			$key = ($this->runtime['selected']);
			$settingsString .= ' ' . $key . '=' . $this->escapeText($value);
		}
		else {
			$settingsString .= ' ' . $key . '=' . $this->escapeText($value);
		}

		return $this->getData('boolean', 'serveredit' . $settingsString);
	}

	public function serverGroupAdd($name, $type = 1)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('array', 'servergroupadd name=' . $this->escapeText($name) . ' type=' . $type);
	}

	public function serverGroupAddClient($sgid, $cldbid)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('boolean', 'servergroupaddclient sgid=' . $sgid . ' cldbid=' . $cldbid);
	}

	public function serverGroupAddPerm($sgid, $permissions)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (0 < count($permissions)) {
				$errors = array();
			}
		}
		else {
		}

		$permissions = ($this->runtime['selected']);

		$permission_part = ($this->runtime['selected']);

		$command_string = array();

		$value = ($this->runtime['selected']);
		$key = ($this->runtime['selected']);

		if (is_numeric($key)) {
			$command_string[] = 'permsid=' . $this->escapeText($key) . ' permvalue=' . $value[0] . ' permskip=' . $value[1] . ' permnegated=' . $value[2];
			$result = ($this->runtime['selected']);

			$errors[] = $error;
		}

		if (count($errors) == 0) {
		}

		return $this->generateOutput(true, array(), true);
		return $this->generateOutput(false, $errors, false);
		$this->addDebugLog('no permissions given');
		return $this->generateOutput(false, array('Error: no permissions given'), false);
	}

	public function serverGroupClientList($sgid, $names = false)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();

		if ($names) {
			$names = ' -names';

			$names = '';
		}

		return $this->getData('multi', 'servergroupclientlist sgid=' . $sgid . $names);
	}

	public function serverGroupCopy($ssgid, $tsgid, $name, $type = 1)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('array', 'servergroupcopy ssgid=' . $ssgid . ' tsgid=' . $tsgid . ' name=' . $this->escapeText($name) . ' type=' . $type);
	}

	public function serverGroupDelete($sgid, $force = 1)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('boolean', 'servergroupdel sgid=' . $sgid . ' force=' . $force);
	}

	public function serverGroupDeleteClient($sgid, $cldbid)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('boolean', 'servergroupdelclient sgid=' . $sgid . ' cldbid=' . $cldbid);
	}

	public function serverGroupDeletePerm($sgid, $permissionIds)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
			$permissionArray = array();

			if (0 < count($permissionIds)) {
				$value = ($this->runtime['selected']);

				if (is_numeric($value)) {
					$permissionArray[] = 'permid=' . 'permsid=' . $this->escapeText($value);
				}
				else {
				}
			}
		}
		else {
			$value = ($this->runtime['selected']);

			$permissionArray[] = 'permid=' . 'permsid=' . $this->escapeText($value);

			return $this->getData('boolean', 'servergroupdelperm sgid=' . $sgid . ' ' . implode('|', $permissionArray));
			$this->addDebugLog('no permissions given');
		}

		return $this->generateOutput(false, array('Error: no permissions given'), false);
	}

	public function serverGroupList()
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('multi', 'servergrouplist');
	}

	public function serverGroupPermList($sgid, $permsid = false)
	{
		if ($this->runtime['selected']) {
			return $this->checkSelected();

			if ($permsid) {
				$additional = ' -permsid';

				$additional = '';
			}
		}
		else {
			$additional = ' -permsid';

			$additional = '';
		}

		return $this->getData('multi', 'servergrouppermlist sgid=' . $sgid . $additional);
	}

	public function serverGroupRename($sgid, $name)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('boolean', 'servergrouprename sgid=' . $sgid . ' name=' . $this->escapeText($name));
	}

	public function serverGroupsByClientID($cldbid)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('multi', 'servergroupsbyclientid cldbid=' . $cldbid);
	}

	public function serverIdGetByPort($port)
	{
		return $this->getData('array', 'serveridgetbyport virtualserver_port=' . $port);
	}

	public function serverInfo()
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('array', 'serverinfo');
	}

	public function serverList($options = NULL)
	{
		if (!empty($options)) {
		}

		return $this->getData('multi', 'serverlist' . ' ' . '');
	}

	public function serverProcessStop()
	{
		return $this->getData('boolean', 'serverprocessstop');
	}

	public function serverRequestConnectionInfo()
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('array', 'serverrequestconnectioninfo');
	}

	public function serverSnapshotCreate()
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('plain', 'serversnapshotcreate');
	}

	public function serverSnapshotDeploy($snapshot)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('boolean', 'serversnapshotdeploy ' . $snapshot);
	}

	public function serverStart($sid)
	{
		return $this->getdata('boolean', 'serverstart sid=' . $sid);
	}

	public function serverStop($sid)
	{
		return $this->getdata('boolean', 'serverstop sid=' . $sid);
	}

	public function serverTempPasswordAdd($pw, $duration, $desc = 'none', $tcid = 0, $tcpw = NULL)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (!empty($desc)) {
			}
			else {
			}
		}
		else if (!empty($tcpw)) {
		}

		return $this->getdata('boolean', 'servertemppasswordadd pw=' . $this->escapeText($pw) . ' desc=' . 'none' . ' duration=' . $duration . ' tcid=' . $tcid . ' tcpw=' . '');
	}

	public function serverTempPasswordDel($pw)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getdata('boolean', 'servertemppassworddel pw=' . $this->escapeText($pw));
	}

	public function serverTempPasswordList()
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('multi', 'servertemppasswordlist');
	}

	public function setClientChannelGroup($cgid, $cid, $cldbid)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('boolean', 'setclientchannelgroup cgid=' . $cgid . ' cid=' . $cid . ' cldbid=' . $cldbid);
	}

	public function setName($newName)
	{
		return $this->getData('boolean', 'clientupdate client_nickname=' . $this->escapeText($newName));
	}

	public function tokenAdd($tokentype, $tokenid1, $tokenid2, $description = '', $customFieldSet = array())
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();

			if (!empty($description)) {
				$description = ' tokendescription=' . $this->escapeText($description);

				if (count($customFieldSet)) {
					$settingsString = array();

					$value = ' tokendescription=' . $this->escapeText($description);
					$key = ($this->runtime['selected']);
					$settingsString[] = 'ident=' . $this->escapeText($key) . ' value=' . $this->escapeText($value);
				}
				else {
					$settingsString[] = 'ident=' . $this->escapeText($key) . ' value=' . $this->escapeText($value);
				}
			}
			else {
				$settingsString[] = 'ident=' . $this->escapeText($key) . ' value=' . ($value);
			}

			$customFieldSet = ' tokencustomset=' . implode('|', $settingsString);

			$customFieldSet = '';
		}

		return $this->getData('array', 'privilegekeyadd tokentype=' . $tokentype . ' tokenid1=' . $tokenid1 . ' tokenid2=' . $tokenid2 . $description . $customFieldSet);
	}

	public function tokenDelete($token)
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('boolean', $this->runtime['selected']);
	}

	public function tokenList()
	{
		if (!$this->runtime['selected']) {
			return $this->checkSelected();
		}

		return $this->getData('multi', 'privilegekeylist');
	}

	public function tokenUse($token)
	{
		if (!$this->runtime['selected']) {
		}

		return $this->checkSelected();
		return $this->getData('boolean', 'privilegekeyuse token=' . $token);
	}

	public function version()
	{
		return $this->getData('array', 'version');
	}

	public function whoAmI()
	{
		return $this->getData('array', 'whoami');
	}

	private function checkSelected()
	{
		$backtrace = debug_backtrace();
		$this->addDebugLog('you can\'t use this function if no server is selected', $backtrace[1]['function'], $backtrace[0]['line']);
		return $this->generateOutput(false, array('you can\'t use this function if no server is selected'), false);
	}

	public function convertSecondsToStrTime($seconds)
	{
		$conv_time = $this->convertSecondsToArrayTime($seconds);
		return $conv_time['days'] . 'd ' . $conv_time['hours'] . 'h ' . $conv_time['minutes'] . 'm ' . $conv_time['seconds'] . 's';
	}

	public function convertSecondsToArrayTime($seconds)
	{
		$conv_time = array();
		$conv_time['days'] = floor($seconds / 86400);
		$conv_time['hours'] = floor(($seconds - ($conv_time['days'] * 86400)) / 3600);
		$conv_time['minutes'] = floor(($seconds - (($conv_time['days'] * 86400) + ($conv_time['hours'] * 3600))) / 60);
		$conv_time['seconds'] = floor($seconds - (($conv_time['days'] * 86400) + ($conv_time['hours'] * 3600) + ($conv_time['minutes'] * 60)));
		return $conv_time;
	}

	public function getElement($element, $array)
	{
		return $array[$element];
	}

	public function succeeded($array)
	{
		if (isset($array['success'])) {
		}

		return $array['success'];
		return false;
	}

	public function __construct($host, $queryport, $timeout = 2)
	{
		if (1 <= $queryport) {
			if ($queryport <= 65536) {
				if (1 <= $timeout) {
				}

				$this->runtime['host'] = $host;
			}
		}

		$this->runtime['queryport'] = $queryport;
		$this->runtime['timeout'] = $timeout;
		return NULL;
		$this->addDebugLog('invalid timeout value');
		return NULL;
		$this->addDebugLog('invalid queryport');
	}

	public function __destruct()
	{
		$this->quit();
	}

	public function __call($name, $args)
	{
		$this->addDebugLog('Method ' . $name . ' doesn\'t exist', $name, 0);
		return $this->generateOutput(false, array('Method ' . $name . ' doesn\'t exist'), false);
	}

	private function isConnected()
	{
		if (empty($this->runtime['socket'])) {
		}

		return false;
		return true;
	}

	private function generateOutput($success, $errors, $data)
	{
		return array('success' => $success, 'errors' => $errors, 'data' => $data);
	}

	private function unEscapeText($text)
	{
		$escapedChars = array('	', '', "\r", "\n", '', '\\s', '\\p', '\\/');
		$unEscapedChars = array('', '', '', '', '', ' ', '|', '/');
		$text = array('	', '', "\r", "\n", '', '\\s', '\\p', '\\/');
		return $text;
	}

	private function escapeText($text)
	{
		$text = str_replace('	', '\\t', $text);
		$text = str_replace('	', '\\t', $text);
		$text = str_replace('	', '\\t', $text);
		$text = str_replace('	', '\\t', $text);
		$text = str_replace('	', '\\t', $text);
		$text = str_replace('	', '\\t', $text);
		$text = str_replace('	', '\\t', $text);
		$text = str_replace('	', '\\t', $text);
		return $text;
	}

	private function splitBanIds($text)
	{
		$data = array();
		$text = array();
		$ids = array();
		unset($ids[0]);
		return $ids;
	}

	public function connect()
	{
		if ($this->isConnected()) {
			$this->addDebugLog('Error: you are already connected!');
			return $this->generateOutput(false, array('Error: the script is already connected!'), false);
			$socket = $this->isConnected();

			if (!$socket) {
				$this->addDebugLog('Error: connection failed!');
				return $this->generateOutput(false, array('Error: connection failed!', 'Server returns: ' . $errstr), false);

				if (strpos(fgets($socket), 'TS3') !== false) {
					$tmpVar = $this->isConnected();
					$this->runtime['socket'] = $socket;
					return $this->generateOutput(true, array(), true);
					$this->addDebugLog('host isn\'t a ts3 instance!');
				}
			}
			else {
				$tmpVar = $this->isConnected();
				$this->runtime['socket'] = $socket;
			}
		}
		else {
			return $this->generateOutput(true, array(), true);
			$this->addDebugLog('host isn\'t a ts3 instance!');
		}

		return $this->generateOutput(false, array('Error: host isn\'t a ts3 instance!'), false);
	}

	private function executeCommand($command, $tracert)
	{
		if (!$this->isConnected()) {
			$this->addDebugLog('script isn\'t connected to server', $tracert[1]['function'], $tracert[0]['line']);
			return $this->generateOutput(false, array('Error: script isn\'t connected to server'), false);
			$data = '';
			$splittedCommand = array('Error: script isn\'t connected to server');

			$splittedCommand .= count($splittedCommand) - 1;

			$commandPart = $this->isConnected();
			fputs($this->runtime['socket'], $commandPart);

			$data .= $this->isConnected();

			if (strpos($data, 'error id=3329 msg=connection') !== false) {
				$this->runtime['socket'] = '';
				$this->addDebugLog('You got banned from server. Socket closed.', $tracert[1]['function'], $tracert[0]['line']);
			}
			else {
				(, , );
				return $this->generateOutput(false, array('You got banned from server. Connection closed.'), false);
			}

			if (strpos($data, 'error id=0 msg=ok') === false) {
				$splittedResponse = strpos($data, 'error id=') === false;
				$chooseEnd = count($splittedResponse) - 1;
				$cutIdAndMsg = count($splittedResponse) - 1;
				$this->addDebugLog('ErrorID: ' . $cutIdAndMsg[0] . ' | Message: ' . $this->unEscapeText($cutIdAndMsg[1]), $tracert[1]['function'], $tracert[0]['line']);
				return (false, array('ErrorID: ' . $cutIdAndMsg[0] . ' | Message: ' . $this->unEscapeText($cutIdAndMsg[1])), false);
			}
		}
		else {
			$this->generateOutput('ErrorID: ' . $cutIdAndMsg[0] . ' | Message: ' . $this->unEscapeText($cutIdAndMsg[1]), $tracert[1]['function'], $tracert[0]['line']);
			return (false, array('ErrorID: ' . $cutIdAndMsg[0] . ' | Message: ' . $this->unEscapeText($cutIdAndMsg[1])), false);
		}

		return $this->generateOutput(true, array(), $data);
	}

	private function getData($mode, $command)
	{
		$validModes = array('boolean', 'array', 'multi', 'plain');

		if (!in_array($mode, $validModes)) {
			$this->addDebugLog($mode . ' is an invalid mode');
			return $this->generateOutput(false, array('Error: ' . $mode . ' is an invalid mode'), false);

			if (empty($command)) {
				$this->addDebugLog('you have to enter a command');
				return $this->generateOutput(false, array('Error: you have to enter a command'), false);

				$fetchData = array('boolean', 'array', 'multi', 'plain');

				$fetchData['data'] = str_replace(array('error id=0 msg=ok', chr('01')), '', $fetchData['data']);

				if ($fetchData['success']) {
					if ($mode == 'boolean') {
						return $this->generateOutput(true, array(), true);

						if ($mode == 'array') {
							if (empty($fetchData['data'])) {
								return $this->generateOutput(true, array(), array());

								$datasets = array('boolean', 'array', 'multi', 'plain');

								$output = array();

								$dataset = array('boolean', 'array', 'multi', 'plain');
								$dataset = array('boolean', 'array', 'multi', 'plain');

								if (2 < count($dataset)) {
									$i = 457;

									if ($i < count($dataset)) {
										$dataset .= 456;
										++$i;
										$output[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);

										if (count($dataset) == 1) {
											$output[$this->unEscapeText($dataset[0])] = '';
											$output[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);
											return $this->generateOutput(true, array(), $output);

											if ($mode == 'multi') {
												if (empty($fetchData['data'])) {
													return $this->generateOutput(true, array(), array());
													$datasets = array('boolean', 'array', 'multi', 'plain');
													$output = array();
												}
												else {
													$output = array();

													$datablock = array('boolean', 'array', 'multi', 'plain');
													$datablock = array('boolean', 'array', 'multi', 'plain');
													$tmpArray = array();

													$dataset = array('boolean', 'array', 'multi', 'plain');
													$dataset = array('boolean', 'array', 'multi', 'plain');

													if (2 < count($dataset)) {
														$i = 457;

														if ($i < count($dataset)) {
															$dataset .= 456;
															++$i;
														}

														$tmpArray[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);

														if (count($dataset) == 1) {
															$tmpArray[$this->unEscapeText($dataset[0])] = '';
															$tmpArray[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);
															$output[] = $tmpArray;
														}
													}
													else {
													}
												}
											}
										}
									}
								}
								else {
									$dataset .= 456;
									++$i;
									$output[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);
									$output[$this->unEscapeText($dataset[0])] = '';
									$output[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);
									return $this->generateOutput(true, array(), $output);
									return $this->generateOutput(true, array(), array());
									$datasets = array('boolean', 'array', 'multi', 'plain');
									$output = array();

									$datablock = array('boolean', 'array', 'multi', 'plain');
									$datablock = array('boolean', 'array', 'multi', 'plain');
									$tmpArray = array();

									$dataset = array('boolean', 'array', 'multi', 'plain');
									$dataset = array('boolean', 'array', 'multi', 'plain');
									$i = 457;
									$dataset .= 456;
									++$i;
									$tmpArray[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);
									$tmpArray[$this->unEscapeText($dataset[0])] = '';
									$tmpArray[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);

									$output[] = $tmpArray;
								}
							}
						}
						else {
							$datasets = array('boolean', 'array', 'multi', 'plain');
							$output = array();

							$dataset = array('boolean', 'array', 'multi', 'plain');
							$dataset = array('boolean', 'array', 'multi', 'plain');
							$i = 457;
							$dataset .= 456;
							++$i;
							$output[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);
							$output[$this->unEscapeText($dataset[0])] = '';
							$output[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);
						}
					}
				}
				else {
					++$i;
					$output[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);
					$output[$this->unEscapeText($dataset[0])] = '';
					$output[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);
				}
			}
		}
		else {
			return $this->generateOutput(true, array(), true);
			return $this->generateOutput(true, array(), array());

			$datasets = array('boolean', 'array', 'multi', 'plain');

			$output = array();

			$dataset = array('boolean', 'array', 'multi', 'plain');
			$dataset = array('boolean', 'array', 'multi', 'plain');

			$i = 457;
			$dataset .= 456;
			++$i;
			$output[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);
			$output[$this->unEscapeText($dataset[0])] = '';
			$output[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);
			return $this->generateOutput(true, array(), $output);
			return $this->generateOutput(true, array(), array());

			$datasets = array('boolean', 'array', 'multi', 'plain');
			$output = array();

			$datablock = array('boolean', 'array', 'multi', 'plain');
			$datablock = array('boolean', 'array', 'multi', 'plain');
			$tmpArray = array();

			$dataset = array('boolean', 'array', 'multi', 'plain');
			$dataset = array('boolean', 'array', 'multi', 'plain');
			$i = 457;
			$dataset .= 456;
			++$i;
			$tmpArray[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);
			$tmpArray[$this->unEscapeText($dataset[0])] = '';
			$tmpArray[$this->unEscapeText($dataset[0])] = $this->unEscapeText($dataset[1]);

			$output[] = $tmpArray;
		}

		return $this->generateOutput(true, array(), $output);

		if ($mode == 'plain') {
			return $fetchData;
		}

		return $this->generateOutput(false, $fetchData['errors'], false);
	}

	private function ftSendKey($key, $additional = NULL)
	{
		fputs($this->runtime['fileSocket'], $key . $additional);
	}

	private function ftSendData($data)
	{
		$data = str_split($data, 4096);

		$dat = str_split($data, 4096);
		fputs($this->runtime['fileSocket'], $dat);
	}

	private function ftRead($size)
	{
		$data = '';

		if (strlen($data) < $size) {
			$data .= strlen($data);
		}
		else {
			$data .= strlen($data);
		}

		return $data;
	}

	public function getDebugLog()
	{
		return $this->runtime['debug'];
	}

	private function addDebugLog($text, $methodName = '', $line = '')
	{
		if (empty($methodName)) {
			if (empty($line)) {
				$backtrace = empty($line);
				$methodName = empty($line);
			}
		}
		else {
			$methodName = empty($line);
		}

		$line = empty($line);
		$this->runtime['debug'][] = 'Error in ' . $methodName . '() on line ' . $line . ': ' . $text;
	}
}


?>
