<?php

class TodoyuProfileGeneralRenderer {

	public static function renderTabs(array $params) {
		$htmlID		= 'profile-general-tabs';
		$class		= 'profile tabs';
		$jsHandler	= 'Todoyu.Ext.profile.General.onTabClick.bind(Todoyu.Ext.profile.General)';
		$tabs		= $GLOBALS['CONFIG']['EXT']['profile']['generalTabs'];
		$active		= $params['tab'];

		if( is_null($active) )	{
			$active = $tabs[0]['id'];
		}

		return TodoyuTabheadRenderer::renderTabs($htmlID, $class, $jsHandler, $tabs, $active);
	}


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


	public static function renderContentMain() {
		$xmlPath= 'ext/profile/config/form/general-main.xml';
		$form	= TodoyuFormManager::getForm($xmlPath);

		$formData	= array(
			'language'	=> Todoyu::user()->getLanguage()
		);

		$form->setFormData($formData);

		return $form->render();
	}

	public static function renderContentPassword() {
		$xmlPath= 'ext/profile/config/form/general-password.xml';
		$form	= TodoyuFormManager::getForm($xmlPath);

		return $form->render();
	}


}

?>