document.addEventListener("DOMContentLoaded", function() {
	document
		.querySelector("#toggleFilter")
		.addEventListener("click", function() {
			document
				.querySelector("#filterProducts")
				.classList.toggle("active");
		});
});
