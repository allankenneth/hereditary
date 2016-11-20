(function($){
	wp.customize("hereditary_navbar", function(value) {
		value.bind(function(newval) {
			$(".navbar").removeClass().addClass(newval);
		} );
	});
	wp.customize("hereditary_navbar_color", function(value) {
		value.bind(function(newval) {
			cla = 'background-color: ' + newval;
			$(".navbar").attr('style', cla);
		} );
	});
	wp.customize("hereditary_content_text", function(value) {
		value.bind(function(newval) {
			$(".maincontentbg").removeClass().addClass(newval);
		} );
	});
	wp.customize("hereditary_contentbg", function(value) {
		value.bind(function(newval) {
			cla = 'background-color: ' + newval;
			$(".maincontentbg").attr('style', cla);
		} );
	});

})(jQuery);
