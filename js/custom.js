jQuery(document).ready(function () {
	new WOW({
		mobile: true,
	}).init();
});

const toggleMode = document.querySelector("input[name=mode]");
const currentTheme = localStorage.getItem("data-theme");

if (currentTheme == "dark") {
	document.body.setAttribute("data-theme", "dark");
	toggleMode.checked = true;
}

toggleMode.addEventListener("change", function () {
	if (this.checked) {
		trans();
		document.body.setAttribute("data-theme", "dark");
		localStorage.setItem("data-theme", "dark");
		toggleMode.checked = true;
	} else {
		trans();
		document.body.setAttribute("data-theme", "light");
		localStorage.setItem("data-theme", "light");
		toggleMode.checked = false;
	}
});

let trans = () => {
	document.body.classList.add("transition");
	window.setTimeout(() => {
		document.body.classList.remove("transition");
	}, 300);
};

jQuery(".filters ul li").click(function () {
	jQuery(".filters ul li").removeClass("active");
	jQuery(this).addClass("active");

	var data = jQuery(this).attr("data-filter");
	$grid.isotope({
		filter: data,
	});
});

var $grid = jQuery(".grid").isotope({
	itemSelector: ".all",
	percentPosition: true,
	filter: ".website",
	masonry: {
		columnWidth: ".all",
	},
});

$grid.imagesLoaded().progress(function () {
	$grid.isotope("layout");
});

function toggleMenu() {
	jQuery("body").toggleClass("if-menu-active");
}
