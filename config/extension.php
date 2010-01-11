<?php



$CONFIG['EXT']['profile']['generalTabs'] = array(
	array(
		'id'		=> 'main',
		'htmlId'	=> 'profile-main',
		'key'		=> 'main',
		'classKey'	=> 'main',
		'class'		=> '',
		'label'		=> 'Main'
	),
	array(
		'id'		=> 'password',
		'htmlId'	=> 'profile-password',
		'key'		=> 'password',
		'classKey'	=> 'password',
		'class'		=> '',
		'label'		=> 'Password'
	)
);



TodoyuProfileManager::addModule('general', array(
	'tabs'		=> 'TodoyuProfileGeneralRenderer::renderTabs',
	'content'	=> 'TodoyuProfileGeneralRenderer::renderContent',
	'label'		=> 'profile.module.general'
));






?>