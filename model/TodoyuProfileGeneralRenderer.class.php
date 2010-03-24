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
 * Renderer for general module
 *
 * @package		Todoyu
 * @subpackage	Profile
 */
class TodoyuProfileGeneralRenderer {

	/**
	 * Render tabs in general area
	 *
	 * @param	Array		$params
	 * @return	String
	 */
	public static function renderTabs(array $params) {
		$name		= 'profile-general';
		$class		= 'profile';
		$jsHandler	= 'Todoyu.Ext.profile.General.onTabClick.bind(Todoyu.Ext.profile.General)';
		$tabs		= TodoyuTabManager::getTabs(Todoyu::$CONFIG['EXT']['profile']['generalTabs']);
		$active		= $params['tab'];

		if( is_null($active) )	{
			$active = $tabs[0]['id'];
		}

		return TodoyuTabheadRenderer::renderTabs($name, $tabs, $jsHandler, $active, $class);
	}



	/**
	 * Render tab content
	 *
	 * @param	Array		$params
	 * @return	String
	 */
	public static function renderContent(array $params) {
		$tab	= $params['tab'];

		switch($tab) {
			case 'password':
				return self::renderContentPassword();
				break;

			case 'main':
			default:
				return self::renderContentMain();
				break;
		}
	}



	/**
	 * Render content for main tab
	 *
	 * @return	String
	 */
	public static function renderContentMain() {
		$xmlPath= 'ext/profile/config/form/general-main.xml';
		$form	= TodoyuFormManager::getForm($xmlPath);

		$formData	= array(
			'language'	=> Todoyu::person()->getLanguage()
		);

		$form->setFormData($formData);

		return $form->render();
	}



	/**
	 * Render content for password tab
	 *
	 * @return	String
	 */
	public static function renderContentPassword() {
		$xmlPath= 'ext/profile/config/form/general-password.xml';
		$form	= TodoyuFormManager::getForm($xmlPath);

		return $form->render();
	}

}

?>