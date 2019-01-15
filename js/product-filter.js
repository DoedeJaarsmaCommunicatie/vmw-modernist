(function($) {
	document.addEventListener("DOMContentLoaded", function() {
		$("#toggleFilter").on("click", function() {
			document
				.querySelector("#filterProducts")
				.classList.toggle("active");
		});
	});
})(jQuery);
