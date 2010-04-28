<?php
/****************************************************************************
* todoyu is published under the BSD License:
* http://www.opensource.org/licenses/bsd-license.php
*
* Copyright (c) 2010, snowflake productions GmbH, Switzerland
* All rights reserved.
*
* This script is part of the todoyu project.
* The todoyu project is free software; you can redistribute it and/or modify
* it under the terms of the BSD License.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the BSD License
* for more details.
*
* This copyright notice MUST APPEAR in all copies of the script.
*****************************************************************************/

/**
 * Profile renderer
 *
 * @package		Todoyu
 * @subpackage	Profile
 */
class TodoyuProfileRenderer {

	/**
	 * Extension key
	 */
	const EXTKEY = 'profile';



	/**
	 * Render profile panel widgets
	 *
	 * @return	String
	 */
	public static function renderPanelWidgets() {
		return TodoyuPanelWidgetRenderer::renderPanelWidgets(self::EXTKEY);
	}



	/**
	 * Render content for a module
	 *
	 * @param	String		$module
	 * @param	Array		$params		Request params for sub functions
	 * @return	String
	 */
	public static function renderContent($module, array $params) {
		$moduleConf	= TodoyuProfileManager::getModuleConfig($module);

		return TodoyuFunction::callUserFunction($moduleConf['content'], $params);
	}



	/**
	 * Render profile tabs
	 *
	 * @param	String	$module
	 * @param	Array	$params
	 */
	public static function renderTabs($module, array $params = array()) {
		$moduleConf	= TodoyuProfileManager::getModuleConfig($module);

		return TodoyuFunction::callUserFunction($moduleConf['tabs'], $params);
	}

}

?>