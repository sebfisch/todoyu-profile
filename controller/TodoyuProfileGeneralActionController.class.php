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
 * Panelwidget Quicktask
 *
 * @package		Todoyu
 * @subpackage	Profile
 */
class TodoyuProfileGeneralActionController extends TodoyuActionController {

	/**
	 * @param array $params
	 * @return void
	 */
	public function init(array $params) {
		restrict('profile', 'general:use');
	}



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
	 * Save data of main tab form (language preference)
	 *
	 * @param	Array		$params
	 */
	public function saveMainAction(array $params) {
		$fields	= $params['general'];
		$locale	= trim($fields['locale']);

		TodoyuLocaleManager::setLocaleCookie($locale);
		TodoyuContactPreferences::saveLocale($locale);
	}



	/**
	 * Save password form
	 *
	 * @param	Array		$params
	 * @return	String
	 */
	public function savePasswordAction(array $params) {
		restrict('profile', 'settings:password');

		$xmlPath= 'ext/profile/config/form/general-password.xml';
		$form	= TodoyuFormManager::getForm($xmlPath);
		$data	= $params['general'];

		$form->setFormData($data);

		if( $form->isValid() ) {
			$data		= $form->getStorageData();

			$password	= $data['password_new1'];

			TodoyuContactPersonManager::updatePassword(personid(), $password, false);
		} else {
			TodoyuHeader::sendTodoyuErrorHeader();

			return $form->render();
		}
	}

}