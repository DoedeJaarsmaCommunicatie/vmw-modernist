(function($) {
	$(document).ready(function() {
		$("#toggleFilter").on("click", function() {
			$("#filterProducts").classList.toggle("active");
		});
	});
})(jQuery);
