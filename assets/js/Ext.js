Todoyu.Ext.profile = {

	PanelWidget: {},

	loadModule: function(module) {
		var url		= Todoyu.getUrl('profile', 'ext');
		var options	= {
			'parameters': {
				'action': 'module',
				'module': module
			},
			'onComplete': this.onModuleLoaded.bind(this, module)
		};

		Todoyu.Ui.updateContent(url, options);
	},

	onModuleLoaded: function(module, response) {

	},

	setContent: function(content) {
		Todoyu.Ui.setContentBody(content);
	}

};