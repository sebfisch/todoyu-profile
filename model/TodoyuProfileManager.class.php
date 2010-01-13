<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 snowflake productions gmbh
*  All rights reserved
*
*  This script is part of the todoyu project.
*  The todoyu project is free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License, version 2,
*  (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html) as published by
*  the Free Software Foundation;
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Profile manager
 *
 * @package		Todoyu
 * @subpackage	Profile
 */
class TodoyuProfileManager {

	/**
	 * Add a module to profile extension
	 *
	 * @param	String		$name
	 * @param	Array		$config
	 */
	public static function addModule($name, array $config) {
		$GLOBALS['CONFIG']['EXT']['profile']['module'][$name] = $config;
		$GLOBALS['CONFIG']['EXT']['profile']['module'][$name]['name'] = $name;
	}



	/**
	 * Get module configuration
	 *
	 * @param	String		$name
	 * @return	Array
	 */
	public static function getModuleConfig($name) {
		return TodoyuArray::assure($GLOBALS['CONFIG']['EXT']['profile']['module'][$name]);
	}



	/**
	 * Get all registered modules
	 *
	 * @return	Array
	 */
	public static function getModules() {
		return TodoyuArray::assure($GLOBALS['CONFIG']['EXT']['profile']['module']);
	}

}

?>