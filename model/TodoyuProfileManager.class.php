<?php

class TodoyuProfileManager {

	public static function addModule($name, array $config) {
		$GLOBALS['CONFIG']['EXT']['profile']['module'][$name] = $config;
		$GLOBALS['CONFIG']['EXT']['profile']['module'][$name]['name'] = $name;
	}


	public static function getModuleConfig($name) {
		return TodoyuArray::assure($GLOBALS['CONFIG']['EXT']['profile']['module'][$name]);
	}

	public static function getModules() {
		return TodoyuArray::assure($GLOBALS['CONFIG']['EXT']['profile']['module']);
	}

}

?>