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
 * Profile preference manager
 *
 * @package		Todoyu
 * @subpackage	Profile
 */
class TodoyuProfilePreferences {

	/**
	 * Save a preference for Profile
	 *
	 * @param	String		$preference
	 * @param	String		$value
	 * @param	Integer		$idItem
	 * @param	Bool		$unique
	 * @param	Integer		$idUser
	 */
	public static function savePref($preference, $value, $idItem = 0, $unique = false, $idArea = 0, $idUser = 0) {
		TodoyuPreferenceManager::savePreference(EXTID_PROFILE, $preference, $value, $idItem, $unique, $idArea, $idUser);
	}



	/**
	 * Get a preference
	 *
	 * @param	String		$preference
	 * @param	Integer		$idItem
	 * @param	Integer		$idUser
	 * @return	String
	 */
	public static function getPref($preference, $idItem = 0, $idArea = 0, $unserialize = false, $idUser = 0) {
		$idItem	= intval($idItem);
		$idUser	= intval($idUser);

		return TodoyuPreferenceManager::getPreference(EXTID_PROFILE, $preference, $idItem, $idArea, $unserialize, $idUser);
	}



	/**
	 * Get  Profile preference
	 *
	 * @param	String		$preference
	 * @param	Integer		$idItem
	 * @param	Integer		$idArea
	 * @param	Integer		$idUser
	 * @return	Array
	 */
	public static function getPrefs($preference, $idItem = 0, $idArea = 0, $idUser = 0) {
		return TodoyuPreferenceManager::getPreferences(EXTID_PROFILE, $preference, $idItem, $idArea, $idUser);
	}



	/**
	 * Delete Profile preference
	 *
	 * @param	String		$preference
	 * @param	String		$value
	 * @param	Integer		$idItem
	 * @param	Integer		$idArea
	 * @param	Integer		$idUser
	 */
	public static function deletePref($preference, $value = null, $idItem = 0, $idArea = 0, $idUser = 0) {
		TodoyuPreferenceManager::deletePreference(EXTID_PROFILE, $preference, $value, $idItem, $idArea, $idUser);
	}


	public static function getActiveModule() {
		$module	= self::getPref('module');

		if( $module === false ) {
			$module = 'general';
		}

		return $module;
	}


	public static function saveActiveModule($module) {
		self::savePref('module', $module, 0, true);
	}


	public static function getGeneralTab() {
		$tab	= self::getPref('tab-general');

		if( $tab === false ) {
			$tab = 'main';
		}

		return $tab;
	}


	public static function saveGeneralTab($tab) {
		self::savePref('tab-general', $tab, 0, true);
	}

}

?>