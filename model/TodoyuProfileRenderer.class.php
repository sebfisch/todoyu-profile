<?php

class TodoyuProfileRenderer {

	public static function renderPanelWidgets() {
		return TodoyuPanelWidgetRenderer::renderPanelWidgets('profile');
	}




	public static function renderContent($module) {
		switch($module) {
			default:
				return self::renderModuleGeneral();
		}
	}


	public static function renderModuleGeneral() {
		$content	= self::renderGeneralTabs();
		$content	.=self::renderGeneralContent();

		return $content;
	}

	public static function renderGeneralTabs($active = null) {
		$htmlID		= 'profile-general-tabs';
		$class		= 'profile tabs';
		$jsHandler	= 'Todoyu.Ext.profile.General.onTabClick.bind(Todoyu.Ext.profile.General)';
		$tabs		= $GLOBALS['CONFIG']['EXT']['profile']['generalTabs'];

		if( is_null($active) )	{
			$active = $tabs[0]['id'];
		}

		return TodoyuTabheadRenderer::renderTabs($htmlID, $class, $jsHandler, $tabs, $active);
	}


	public static function renderGeneralContent() {
		$form	= TodoyuFormManager::getForm('ext/profile/config/form/general-main.xml');

		return $form->render();
	}

}

?>