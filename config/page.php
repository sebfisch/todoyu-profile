<?php

if( allowed('profile', 'use') ) {
	TodoyuFrontend::addSubmenuEntry('todoyu', 'profile', 'LLL:profile.tab.label', '?ext=profile', 10);
}


?>