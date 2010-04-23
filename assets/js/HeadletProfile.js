Todoyu.Ext.profile.Headlet.Profile = {

	/**
	 * Extension namespace backlink
	 *
	 * @var	{Object}	ext
	 */
	ext: Todoyu.Ext.profile,

	init: function() {
		if( document.location.href.toQueryParams().ext === 'profile' ) {
			this.headlet.setActive('profile');
		}
	},



	onButtonClick: function(event) {
		Todoyu.goTo('profile', 'ext');
	}
	
};