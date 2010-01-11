Todoyu.Ext.profile.General = {
	
	ext: Todoyu.Ext.profile,
	
	onTabClick: function(event, tabKey) {
		this.loadTab(tabKey);
	},
	
	loadTab: function(tab) {
		var url		= Todoyu.getUrl('profile', 'general');
		var options	= {
			'parameters': {
				'action': 'tab',
				'tab': tab
			},
			'onComplete': this.onTabLoaded.bind(this, tab)	
		};
		var target	= 'profile-content';
		
		Todoyu.Ui.update(target, url, options);
	},
	
	onTabLoaded: function(tab, respone) {
		
	},
	
	saveMain: function(form) {
		form.request({
			'parameters': {
				'action': 'saveMain'
			},
			'onComplete': this.onMainSaved.bind(this)
		});
	},
	
	onMainSaved: function(response) {
		Todoyu.notifySuccess('[LLL:profile.general.main.saved]');
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