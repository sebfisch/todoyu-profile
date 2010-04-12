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