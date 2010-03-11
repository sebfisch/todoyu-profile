<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 snowflake productions gmbh
*  All rights reserved
*
*  This script is part of the todoyu Profile.
*  The todoyu Profile is free software; you can redistribute it and/or modify
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
 * Profile renderer
 *
 * @package		Todoyu
 * @subpackage	Profile
 */
class TodoyuProfileRenderer {

	/**
	 * Render profile panel widgets
	 *
	 * @return	String
	 */
	public static function renderPanelWidgets() {
		return TodoyuPanelWidgetRenderer::renderPanelWidgets('profile');
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

		return TodoyuDiv::callUserFunction($moduleConf['content'], $params);
	}



	/**
	 * Render profile tabs
	 *
	 * @param	String	$module
	 * @param	Array	$params
	 */
	public static function renderTabs($module, array $params = array()) {
		$moduleConf	= TodoyuProfileManager::getModuleConfig($module);

		return TodoyuDiv::callUserFunction($moduleConf['tabs'], $params);
	}

}

?>