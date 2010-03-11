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
 * Profile view helper
 *
 * @package		Todoyu
 * @subpackage	Profile
 */
class TodoyuProfileViewHelper {

	/**
	 * Get config array of language options
	 *
	 * @param	TodoyuFormElement	$field
	 * @return	Array
	 */
	public static function getLanguageOptions(TodoyuFormElement $field) {
		$langs	= array('en', 'de');
		$where	= 'iso_alpha2 IN(\'' . implode('\',\'', $langs) . '\')';

		return TodoyuDatasource::getLanguageOptions($where);
	}

}

?>