function showProcessingOverlay() {
	for (var e = $(document).height(), c = ($(document).width(), 1); c <= 9; c++) "<div class='sk-cube sk-cube" + c + "'></div>";
		$("body").append('<div class="se-pre-con"></div>'), $(".se-pre-con").css({
			opacity: .6,
			'text-align': 'center',
			'vertical-align': 'middle',
			"background-color": "white",
			'margin': 'auto',
			'top': 0,
			'left': 0,
			"z-index": 999999
		})
}

function hideProcessingOverlay() {
	$(".se-pre-con").remove()
}
/*var doc_height = $(document).height();
var doc_width = $(document).width();

$("body").append('<div class="se-pre-con"></div>');



$(".se-pre-con").css({
 'opacity' : 0.6,
 'background-color': 'white',
 'z-index': 999999,
});
$(window).load(function() {
  $(".se-pre-con").fadeOut("slow");
});*/