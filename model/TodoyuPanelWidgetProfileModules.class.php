<?php
/****************************************************************************
* todoyu is published under the BSD License:
* http://www.opensource.org/licenses/bsd-license.php
*
* Copyright (c) 2011, snowflake productions GmbH, Switzerland
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
 * Panelwidget: Profile modules
 *
 * @package		Todoyu
 * @subpackage	Profile
 */
class TodoyuPanelWidgetProfileModules extends TodoyuPanelWidget implements TodoyuPanelWidgetIf {

	/**
	 * Init
	 *
	 * @param	Array		$config
	 * @param	Array		$params
	 * @param	Integer		$idArea
	 */
	public function __construct(array $config, array $params = array(), $idArea = 0) {
		$idArea	= intval($idArea);

		parent::__construct(
			'profile',								// ext key
			'profilemodules',						// panel widget ID
			'LLL:panelwidget-profilemodules.title',	// widget title text
			$config,								// widget config array
			$params,								// widget parameters
			$idArea									// area ID
		);

		$this->addHasIconClass();
	}



	/**
	 * Render content
	 *
	 * @return	String
	 */
	public function renderContent() {
		$modules	= TodoyuProfileManager::getModules();
		$active		= TodoyuProfilePreferences::getActiveModule();

		$tmpl	= 'ext/profile/view/panelwidget-profilemodules.tmpl';
		$data	= array(
			'active'	=> $active,
			'modules'	=> $modules
		);

		$content= render($tmpl, $data);

		$this->setContent($content);

		return $content;
	}



	/**
	 * Render widget including content
	 *
	 * @return	String
	 */
	public function render() {
		$this->renderContent();

		return parent::render();
	}



	/**
	 * Check access to profile
	 *
	 * @return	Boolean
	 */
	public static function isAllowed() {
		return allowed('profile', 'general:use');
	}

}

?>