<?php

if( allowed('profile', 'general:area') ) {
	TodoyuFrontend::addSubmenuEntry('todoyu', 'profile', 'LLL:profile.tab.label', '?ext=profile', 10);
}


?>