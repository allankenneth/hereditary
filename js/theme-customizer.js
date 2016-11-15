(function($){
	wp.customize("hereditary_foo", function(value) {
		value.bind(function(newval) {
			$("#hereditaryfoo").html(newval);
		} );
	});
})(jQuery);
