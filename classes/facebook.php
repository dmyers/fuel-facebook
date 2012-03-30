<?php
namespace Facebook;

require_once PKGPATH.'facebook'.DS.'vendor'.DS.'facebook-sdk'.DS.'src'.DS.'base_facebook.php';

class Facebook extends \BaseFacebook
{
	public static $instance = null;

	protected static $kSupportedKeys = array(
		'state', 'code', 'access_token', 'user_id'
	);

	public static function _init()
	{
		\Config::load('facebook', true);
	}

	public static function forge()
	{
		$config = \Config::get('facebook');
		
		return new self($config);
	}

	public static function instance()
	{
		if (self::$instance === null) {
			self::$instance = self::forge();
		}

		return self::$instance;
	}

	protected function setPersistentData($key, $value)
	{
		if (!in_array($key, self::$kSupportedKeys)) {
			self::errorLog('Unsupported key passed to setPersistentData.');
			return;
		}

		$session_var_name = $this->constructSessionVariableName($key);
		
		\Session::set($session_var_name, $value);
	}

	protected function getPersistentData($key, $default = false)
	{
		if (!in_array($key, self::$kSupportedKeys)) {
			self::errorLog('Unsupported key passed to getPersistentData.');
			return $default;
		}

		$session_var_name = $this->constructSessionVariableName($key);

		return \Session::get($session_var_name, $default);
	}

	protected function clearPersistentData($key)
	{
		if (!in_array($key, self::$kSupportedKeys)) {
			self::errorLog('Unsupported key passed to clearPersistentData.');
			return;
		}

		$session_var_name = $this->constructSessionVariableName($key);

		\Session::delete($session_var_name);
	}

	protected function clearAllPersistentData()
	{
		foreach (self::$kSupportedKeys as $key) {
			$this->clearPersistentData($key);
		}
	}

	protected function constructSessionVariableName($key)
	{
		return implode('_', array('fb', $this->getAppId(), $key));
	}

}