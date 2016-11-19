(function($){
	wp.customize("hereditary_navbar", function(value) {
		value.bind(function(newval) {
			$("#navbarfoo").html(newval);
		} );
	});
})(jQuery);
