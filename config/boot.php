<?php
/****************************************************************************
* todoyu is published under the BSD License:
* http://www.opensource.org/licenses/bsd-license.php
*
* Copyright (c) 2011, snowflake productions GmbH, Switzerland
* All rights reserved.
*
* This script is part of the todoyu project.
* The todoyu project is free software; you can redistribute it and/or modify
* it under the terms of the BSD License.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the BSD License
* for more details.
*
* This copyright notice MUST APPEAR in all copies of the script.
*****************************************************************************/

// Declare ext ID, path
define('EXTID_PROFILE', 126);
define('PATH_EXT_PROFILE', PATH_EXT . '/profile');

// Register module locales
TodoyuLabelManager::register('profile', 'profile', 'ext.xml');
TodoyuLabelManager::register('panelwidget-profilemodules', 'profile', 'panelwidget-profilemodules.xml');

?>