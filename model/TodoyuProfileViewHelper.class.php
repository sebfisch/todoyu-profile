<?php

class TodoyuProfileViewHelper {


	public static function getLanguageOptions(TodoyuFormElement $field) {
		$langs	= array('en', 'de');
		$where	= 'iso_alpha2 IN(\'' . implode('\',\'', $langs) . '\')';

		return TodoyuDatasource::getLanguageOptions($where);
	}

}

?>