$( document ).ready(function() {
	var userFeed = new Instafeed({
		get: 'user',
		userId: '6885603018',
		limit: 24,
		resolution: 'standard_resolution',
		accessToken: '6885603018.1677ed0.c249151918964b2b976ccd5c9c28a4ab',
		sortBy: 'most-recent',
		template: '<div class="col-md-3 gallery instaimg"><a href="{{image}}" title="{{caption}}" target="_blank"><img src="{{image}}" alt="{{caption}}" class="img-responsive"/></a></div>',
	});
	userFeed.run();

})