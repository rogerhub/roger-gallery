$(document).foundation();
$(document).ready(function() {
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

