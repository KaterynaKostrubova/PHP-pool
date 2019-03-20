$('.drop-down-list').click( function() {
	var hdn = $(this).find('.pro-info');

	if ( hdn.css('display') != 'block' ) {
		$(this).find('span').text('▼');
		hdn.css('display', 'block');
	}
	else {
		$(this).find('span').text('▶');
		hdn.css('display', 'none');
	}
});
