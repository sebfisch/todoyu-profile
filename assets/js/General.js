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

/**
 * General area in profile
 */

Todoyu.Ext.profile.General = {

	/**
	 * Reference to extension
	 *
	 * @property	ext
	 * @type		Object
	 */
	ext: Todoyu.Ext.profile,



	/**
	 * Handler for tabs in general area
	 *
	 * @method	onTabClick
	 * @param	{Event}		event
	 * @param	{String}	tabKey
	 */
	onTabClick: function(event, tabKey) {
		this.loadTab(tabKey);
	},



	/**
	 * Load given profile tab
	 *
	 * @method	loadTab
	 * @param	{String}	tab
	 */
	loadTab: function(tab) {
		var url		= Todoyu.getUrl('profile', 'general');
		var options	= {
			'parameters': {
				'action':	'tab',
				'tab':		tab
			}
//			'onComplete':	this.onTabLoaded.bind(this, tab)
		};

		Todoyu.Ui.updateContentBody(url, options);
	},



//	onTabLoaded: function(tab, response) {
//
//	},



	/**
	 * Save settings of profile main tab
	 *
	 * @method	saveMain
	 * @param	{Element}		form
	 */
	saveMain: function(form) {
		form.request({
			'parameters': {
				'action': 'saveMain'
			},
			'onComplete': this.onMainSaved.bind(this)
		});
	},



	/**
	 * Notify about profile saving success, have browser reload
	 *
	 * @method	onMainSaved
	 * @param	{Ajax.Response}		response
	 */
	onMainSaved: function(response) {
		Todoyu.notifySuccess('[LLL:profile.ext.general.main.saved]');
		Todoyu.LoaderBox.show('[LLL:profile.ext.general.main.saved.pleaseWait]', true);
		setTimeout('location.reload()', 1000);
	},



	/**
	 * Save password modification form
	 *
	 * @method	savePassword
	 * @param	{Element}	form
	 */
	savePassword: function(form) {
		form.request({
			'parameters': {
				'action': 'savePassword'
			},
			'onComplete': this.onPasswordSaved.bind(this)
		});
	},



	/**
	 * Handler after password change has been saved
	 *
	 * @method	onPasswordSaved
	 * @param	{Ajax.Response}		response
	 */
	onPasswordSaved: function(response) {
		if( response.hasTodoyuError() ) {
			Todoyu.notifyError('[LLL:profile.ext.general.password.error]');
			this.ext.setContent(response.responseText);
		} else {
			Todoyu.notifySuccess('[LLL:profile.ext.general.password.success]');
			this.loadTab('password');
		}
	}

};