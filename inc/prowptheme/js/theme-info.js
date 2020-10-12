/*
* ProWPTheme Info Tabs
*/

;(function($) {

	$('.polmo-lite-tab-nav a').on('click',function (e) {
		e.preventDefault();
		$(this).addClass('active').siblings().removeClass('active');
	});

	$('.polmo-lite-tab-nav .begin').on('click',function (e) {		
		$('.polmo-lite-tab-wrapper .begin').addClass('show').siblings().removeClass('show');
	});	
	$('.polmo-lite-tab-nav .actions, .polmo-lite-tab .actions').on('click',function (e) {		
		e.preventDefault();
		$('.polmo-lite-tab-wrapper .actions').addClass('show').siblings().removeClass('show');

		$('.polmo-lite-tab-nav a.actions').addClass('active').siblings().removeClass('active');

	});	
	$('.polmo-lite-tab-nav .support').on('click',function (e) {		
		$('.polmo-lite-tab-wrapper .support').addClass('show').siblings().removeClass('show');
	});	
	$('.polmo-lite-tab-nav .table').on('click',function (e) {		
		$('.polmo-lite-tab-wrapper .table').addClass('show').siblings().removeClass('show');
	});	

})(jQuery);
