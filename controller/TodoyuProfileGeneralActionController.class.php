<?php

class TodoyuProfileGeneralActionController extends TodoyuActionController {

	public function init(array $params) {

	}


	public function tabAction(array $params) {
		$tab	= $params['tab'];

		TodoyuProfilePreferences::saveGeneralTab($tab);

		return TodoyuProfileGeneralRenderer::renderContent($params);

		return TodoyuProfileRenderer::renderContent('general', $params);
	}


	public function saveMainAction(array $params) {
		$fields	= $params['general'];
		$lang	= trim($fields['language']);

		TodoyuUserPreferences::saveLanguage($lang);
	}


	public function savePasswordAction(array $params) {
		$xmlPath= 'ext/profile/config/form/general-password.xml';
		$form	= TodoyuFormManager::getForm($xmlPath);
		$data	= $params['general'];

		$form->setFormData($data);


		if( $form->isValid() ) {
			$data		= $form->getStorageData();

			$password	= $data['password_new'];

			TodoyuUserManager::updatePassword($password, false);
		} else {
			TodoyuHeader::sendTodoyuErrorHeader();

			TodoyuDebug::printInFirebug('error');

			return $form->render();
		}
	}

}