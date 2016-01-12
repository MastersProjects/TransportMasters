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
	if($(e.currentTarget).children('.journey').is(":visible")){
		$(".journey").slideUp();
	} else {
		$(".journey").slideUp();
		$(e.currentTarget).children().slideDown();
	}
});
