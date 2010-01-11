<?php

class TodoyuProfileExtActionController extends TodoyuActionController {

	public function init(array $params) {

	}


	public function defaultAction(array $params) {
		restrict('profile', 'use');

			// Set project tab
		TodoyuFrontend::setActiveTab('todoyu');

		$module	= 'general';
		if( ! empty($params['module']) ) {
			$module = $params['module'];
		}

			// Init page
		TodoyuPage::init('ext/profile/view/ext.tmpl');
			// Add project assets
		TodoyuPage::addExtAssets('profile', 'public');

		$title	= Todoyu::user()->getFullName();

		TodoyuPage::setTitle($title);

		$panelWidgets	= TodoyuProfileRenderer::renderPanelWidgets();
		$content		= TodoyuProfileRenderer::renderContent($module, $params);

		TodoyuPage::set('panelWidgets', $panelWidgets);
		TodoyuPage::set('content', $content);

		return TodoyuPage::render();
	}


	public function moduleAction(array $params) {
		$module	= $params['module'];

		return TodoyuProfileRenderer::renderContent($module, $params);
	}

}