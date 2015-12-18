//Click listener for scroll annimation
$('.click').click(function(e) {
  e.preventDefault();

  scrollToElement($(this).attr('href'), 1500);
});

//scroll animation
function scrollToElement (el, ms) {
  var speed = (ms) ? ms : 600;
  $('html,body').animate({
    scrollTop: $(el).offset().top
  }, speed);
}

//Open journey details clicklistener and function
$('.connection').click(function(e) {
	$(".journey").hide();
	$(".connection").css("border-color", "#000");
	$(e.currentTarget).children().show();
	$(e.currentTarget).css("border-color", "#1D50E8");
});