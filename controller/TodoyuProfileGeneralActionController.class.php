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
 * Panelwidget Quicktask
 *
 * @package		Todoyu
 * @subpackage	Portal
 */
class TodoyuProfileGeneralActionController extends TodoyuActionController {

	/**
	 * Load tab content
	 *
	 * @param	Array		$params
	 * @return	String
	 */
	public function tabAction(array $params) {
		$tab	= $params['tab'];

		TodoyuProfilePreferences::saveGeneralTab($tab);

		return TodoyuProfileGeneralRenderer::renderContent($params);
	}



	/**
	 * Save main form (language)
	 *
	 * @param	Array		$params
	 */
	public function saveMainAction(array $params) {
		$fields	= $params['general'];
		$lang	= trim($fields['language']);

		TodoyuUserPreferences::saveLanguage($lang);
	}



	/**
	 * Save password form
	 *
	 * @param	Array		$params
	 * @return	String
	 */
	public function savePasswordAction(array $params) {
		$xmlPath= 'ext/profile/config/form/general-password.xml';
		$form	= TodoyuFormManager::getForm($xmlPath);
		$data	= $params['general'];

		$form->setFormData($data);

		if( $form->isValid() ) {
			$data		= $form->getStorageData();

			$password	= $data['password_new'];

			TodoyuUserManager::updatePassword($password, false);
		} else {
			TodoyuHeader::sendTodoyuErrorHeader();

			TodoyuDebug::printInFirebug('error');

			return $form->render();
		}
	}

}