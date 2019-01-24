document.addEventListener("DOMContentLoaded", () => {
	document.querySelectorAll(".page-numbers:not(.current)").forEach(el => {
		el.addEventListener("click", () => {
			jQuery("html").animate({ scrollTop: 0 });
		});
	});
});
