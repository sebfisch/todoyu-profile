<?php

class TodoyuProfileRenderer {

	public static function renderPanelWidgets() {
		return TodoyuPanelWidgetRenderer::renderPanelWidgets('profile');
	}




	public static function renderContent($module, array $params) {
		$moduleConf	= TodoyuProfileManager::getModuleConfig($module);

		$tabs		= TodoyuDiv::callUserFunction($moduleConf['tabs'], $params);
		$content	= TodoyuDiv::callUserFunction($moduleConf['content'], $params);

		$tmpl		= 'ext/profile/view/module.tmpl';
		$data		= array(
			'tabs'		=> $tabs,
			'content'	=> $content
		);

		return render($tmpl, $data);
	}

}

?>