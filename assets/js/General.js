/**
 * General area in profile
 */
Todoyu.Ext.profile.General = {

	/**
	 * Shortcut to extension namespace
	 *
	 * @var	{Object}	ext
	 */
	ext: Todoyu.Ext.profile,



	/**
	 * Handler for tabs in general area
	 *
	 * @param	{Event}		event
	 * @param	{String}	tabKey
	 */
	onTabClick: function(event, tabKey) {
		this.loadTab(tabKey);
	},



	/**
	 * Load given profile tab
	 *
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



//	onTabLoaded: function(tab, respone) {
//
//	},



	/**
	 * @todo	comment
	 * @param	form
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
	 * @param	{Ajax.Response}		response
	 */
	onMainSaved: function(response) {
		Todoyu.notifySuccess('[LLL:profile.general.main.saved]');
		Todoyu.LoaderBox.show('[LLL:profile.general.main.saved.pleaseWait]', true);
		setTimeout('location.reload()', 1000);
	},



	savePassword: function(form) {
		form.request({
			'parameters': {
				'action': 'savePassword'
			},
			'onComplete': this.onPasswordSaved.bind(this)
		});
	},



	onPasswordSaved: function(response) {
		if( response.hasTodoyuError() ) {
			Todoyu.notifyError('[LLL:profile.general.password.error]');
			this.ext.setContent(response.responseText);
		} else {
			Todoyu.notifySuccess('[LLL:profile.general.password.success]');
			this.loadTab('password');
		}
	}

};