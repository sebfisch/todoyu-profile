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
 * profile modules panel widget
 *
 * @name 		profile renderer
 * @package		Todoyu
 * @subpackage	profile
 */
class TodoyuPanelWidgetProfileModules extends TodoyuPanelWidget implements TodoyuPanelWidgetIf {


	/**
	 * profile modules panel widget constructor
	 *
	 * @param	array	$config
	 * @param	array	$params
	 * @param	Integer	$idArea
	 * @param	Boolean $expanded
	 */
	public function __construct(array $config, array $params = array(), $idArea = 0) {
		$idArea	= intval($idArea);

		parent::__construct(
			'profile',								// ext key
			'profilemodules',						// panel widget ID
			'LLL:panelwidget-profilemodules.title',	// widget title text
			$config,								// widget config array
			$params,								// widget params
			$idArea									// area ID
		);

		$this->addHasIconClass();

		TodoyuPage::addExtAssets('profile', 'panelwidget-profilemodules');
	}



	/**
	 * Render content
	 *
	 * @return	String
	 */
	public function renderContent() {
		$content = '';

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




	public static function isAllowed() {
		return allowed('profile', 'panelwidgets.profilemodules');
	}

}

?>