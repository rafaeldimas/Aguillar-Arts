$(".menu ul li").click(function(e) {

	var alturaMenu = $(".menu").height();


	if ($(this).context.className == 'disable') {
		/**
		 * Reseta as configurações
		 */
		$('.menu ul li').removeClass('ativo')
		$('.menu ul li').animate({
			width: '114px'},
			'fast')
			.addClass('disable');
		$('.texto').animate({left: '-100vw'}, '');

		/**
		 * Animação do icone
		 */
		$(e.currentTarget).animate({
			width: '400px'},
			'slow')
			.removeClass("disable").addClass("ativo");

		/**
		 * Animação do texto
		 */
		$('.servicos .' + $(this).context.id).animate({
			left: 0,
			height: alturaMenu
		},'slow');

	}else {
		
		$(e.currentTarget).animate({
			width: '114px'},
			'fast')
			.removeClass("ativo").addClass("disable");

		$('.servicos .' + $(this).context.id).animate({
			left: '-100vw',
			height: alturaMenu
		},'slow');
	}
});
