<?php

class TodoyuProfilePreferenceActionController extends TodoyuActionController {

	public function init(array $params) {

	}


	/**
	 * General panelWidget action, saves collapse status
	 *
	 *	@param	Array	$params
	 */
	public function pwidgetAction(array $params) {
		$idWidget	= $params['item'];
		$value		= $params['value'];

		TodoyuPanelWidgetManager::saveCollapsedStatus(EXTID_PROFILE, $idWidget, $value);
	}

}