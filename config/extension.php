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
 * Tabs for general area
 */
$CONFIG['EXT']['profile']['generalTabs'] = array(
	array(
		'id'			=> 'main',
		'htmlId'		=> 'profile-main',
		'key'			=> 'main',
		'classKey'		=> 'main',
		'class'			=> '',
		'label'			=> 'LLL:profile.general.main.tab',
		'require'		=> 'profile.account:setLanguage'
	),
	array(
		'id'			=> 'password',
		'htmlId'		=> 'profile-password',
		'key'			=> 'password',
		'classKey'		=> 'password',
		'class'			=> '',
		'label'			=> 'LLL:profile.general.password.tab',
		'require'		=> 'profile.account:setPassword'
	)
);


/**
 * Add general module to profile
 */
TodoyuProfileManager::addModule('general', array(
	'tabs'		=> 'TodoyuProfileGeneralRenderer::renderTabs',
	'content'	=> 'TodoyuProfileGeneralRenderer::renderContent',
	'label'		=> 'profile.module.general'
));

?>