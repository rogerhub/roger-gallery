$(document).foundation();
$(document).ready(function() {
	if (window.innerWidth >= 1600) {
		$(".js-full-size-replace").each(function(a) {
			$(a).attr("src", $(a).data("full-size"));
		});
	}
	$(".zoomable").wrap('<span style="display:inline-block;"></span>').css('display', 'block').parent().zoom({ 'on' : 'hover' });
	$("body").keydown(function(e) {
		try {
			if (e.keyCode == 39) { // right
				$("#prevlink a")[0].click();
			} else if (e.keyCode == 37) { // left
				$("#nextlink a")[0].click();
			}
		} catch (e) {}
	});
});
