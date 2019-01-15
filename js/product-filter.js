document.addEventListener("DOMContentLoaded", function() {
	document.querySelector("#toggleFilter").on("click", function() {
		document.querySelector("#filterProducts").classList.toggle("active");
	});
});
