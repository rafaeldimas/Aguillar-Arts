$('.active-menu').click(function(e) {
	
	$('.menu-toggle').css('left', '0');

	$('.active-menu').css('opacity', '0');
});

$('.disable-menu').click(function(e) {
	$('.menu-toggle').css('left', '-100vw');
	$('.active-menu').css('opacity', '1');
});