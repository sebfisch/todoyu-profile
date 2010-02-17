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
 * Assets (JS, CSS, SWF, etc.) requirements for profile extension
 *
 * @package		Todoyu
 * @subpackage	Profile
 */

$CONFIG['EXT']['profile']['assets'] = array(
		// default assets: loaded all over the installation always
	'default' => array(
		'js' => array(

		),
		'css' => array(
			array(
				'file'		=> 'ext/profile/assets/css/global.css',
				'position'	=> 100
			)
		)
	),


		// public assets: basis assets for this extension
	'public' => array(
		'js' => array(
			array(
				'file'		=> 'ext/profile/assets/js/Ext.js',
				'position'	=> 100
			),
			array(
				'file'		=> 'ext/profile/assets/js/General.js',
				'position'	=> 101
			)
		),
		'css' => array(
			array(
				'file'		=> 'ext/profile/assets/css/ext.css',
				'media'		=> 'all',
				'position'	=> 100
			)
		)
	),

	'panelwidget-profilemodules' => array(
		'js' => array(

		),
		'css' => array(
			array(
				'file'		=> 'ext/profile/assets/css/panelwidget-profilemodules.css',
				'media'		=> 'all',
				'position'	=> 130
			)
		)
	)
);

?>