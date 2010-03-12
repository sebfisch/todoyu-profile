<?php

if( allowed('profile', 'general:area') ) {
	TodoyuHeadManager::addHeadlet('TodoyuHeadletProfile', 15);
//	TodoyuFrontend::addSubmenuEntry('todoyu', 'profile', 'LLL:profile.tab.label', '?ext=profile', 10);
}


?>