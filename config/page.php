<?php

if( allowed('profile', 'general:use') ) {
	TodoyuFrontend::addSubmenuEntry('todoyu', 'profile', 'LLL:profile.tab.label', '?ext=profile', 10);
}


?>