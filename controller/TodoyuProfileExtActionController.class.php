<?php
/****************************************************************************
* todoyu is published under the BSD License:
* http://www.opensource.org/licenses/bsd-license.php
*
* Copyright (c) 2010, snowflake productions gmbh
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
 * Profile ext action controller
 *
 * @package		Todoyu
 * @subpackage	Profile
 */
class TodoyuProfileExtActionController extends TodoyuActionController {

	public function init(array $params) {
		restrict('profile', 'general:use');
	}


	/**
	 * Default action for profile
	 *
	 * @param	Array		$params
	 * @return	String
	 */
	public function defaultAction(array $params) {
			// Set project tab
		TodoyuFrontend::setActiveTab('todoyu');

		$module	= 'general';
		if( ! empty($params['module']) ) {
			$module = $params['module'];
		}

			// Init page
		TodoyuPage::init('ext/profile/view/ext.tmpl');

		$title	= Label('profile.page.title') . ' - ' . Todoyu::person()->getFullName();

		TodoyuPage::setTitle($title);

		$panelWidgets	= TodoyuProfileRenderer::renderPanelWidgets();
		$tabs			= TodoyuProfileRenderer::renderTabs($module, $params);
		$content		= TodoyuProfileRenderer::renderContent($module, $params);

		TodoyuPage::set('panelWidgets', $panelWidgets);
		TodoyuPage::set('tabs', $tabs);
		TodoyuPage::set('content', $content);

		return TodoyuPage::render();
	}



	/**
	 * Show module content
	 *
	 * @param	Array		$params
	 * @return	String
	 */
	public function moduleAction(array $params) {
		$module	= $params['module'];

		TodoyuProfilePreferences::saveActiveModule($module);

		$tabs	= TodoyuProfileRenderer::renderTabs($module, $params);
		$content= TodoyuProfileRenderer::renderContent($module, $params);

		return TodoyuRenderer::renderContent($content, $tabs);
	}

}