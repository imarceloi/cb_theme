jQuery(document).ready(function($) {
	//FUNÇÂO PARA OS CALCULOS DE TELA
	function radaTamanhos() {
		var pegaAlturaTela 		= $(window).height();
		var pegaAlturaMenu		= $('#header').innerHeight();
		var alturaUtil			= pegaAlturaTela - pegaAlturaMenu;
		//var alturaBeneficios	= $('.porque_matricular_beneficios_int ul li').innerHeight();
		//APLICA O TAMANHO DA TELA NA ALTURA DA HOME (PRIMEIRA SECTION)
		$('.content_home').height(pegaAlturaTela);
		$('.content').css({
			'min-height': pegaAlturaTela
		});

		//TAMANHO DAS LIS DOS BENEFÍCIOS
		// if (alturaBeneficios > 58) {
		// 	console.info(alturaBeneficios);
		// };

	}
	radaTamanhos();

	// FUNÇÃO DE NAVEGAÇÃO DAS SETAS PARA BAIXO
	$("a[href^='#']").click(function(event) {
		event.preventDefault();
		var $this = $(this),
		target = this.hash,
		$target = $(target);
		var section = $(this).attr('href');
		$("html, body").animate({
			scrollTop: $(section).offset().top
		}, 1000, 'easeInOutCubic');
		history.pushState(null, null, target);
	});

	// MONTA CAROUSEL DOS DEPOIMENTOS
	function rodaCarousel() {
		$('.carousel').bxSlider({
			auto: true,
			pause: 12000,
			autoHover: true,
			infiniteLoop: false,
			pager: false,
			easing: 'ease-in-out',
		});
	};
	rodaCarousel();

	//FUNÇÃ PARA RECALCULAR OS TAMANHOS ON RESIZE
	window.onresize = function() {
		radaTamanhos();
	}

	// CRIA FUNÇOES DURANTE O SCROLL
	function posicaoCamada(){
		inicio 				= $('#inicio').scrollTop();
		curso 				= $('#curso').offset().top;
		professor 		 	= $('#professor').offset().top;
		porque_matricular 	= $('#porque_matricular').offset().top;
		modulos 			= $('#modulos').offset().top;
		vantagensaluno 		= $('#vantagens').offset().top;
		inscrevase 			= $('#inscreva').offset().top;
		inscreva_1 			= $('#inscreva_1').offset().top;
		depoimento 			= $('#depoimento').offset().top;
		contato 			= $('#contato').offset().top;
		scrolTela			= $(window).scrollTop();

		function removeClasses() {
			$('#header').removeClass('menu_inscrevaseum');
	       	$('#header').removeClass('menu_vantagensaluno');
	       	$('#header').removeClass('menu_pqmatricular');
	       	$('#header').removeClass('menu_modulos');
	       	$('#header').removeClass('menu_professor');
	       	$('#header').removeClass('menu_curso');
	       	$('#header').removeClass('menu_inicio');
		}

		if($(window).scrollTop() >= inicio -2 ) {
	       	removeClasses();
	       	$('#header').addClass('menu_inicio');
		};
		if ($(window).scrollTop() >= curso -2 ) {
	       	removeClasses();
	       	$('#header').addClass('menu_curso');
	   	};
		if ($(window).scrollTop() >= professor -2 ) {
	       	removeClasses();
	       	$('#header').addClass('menu_professor');
	   	};
		if ( $(window).scrollTop() >= porque_matricular -2 ) {
	       	removeClasses();
	       	$('#header').addClass('menu_pqmatricular');
	   	};
	   	if ($(window).scrollTop() >= modulos - 2) {
	       	removeClasses();
	       	$('#header').addClass('menu_modulos');
	   	};
	   	if ($(window).scrollTop() >= vantagensaluno - 2) {
	       	removeClasses();
	       	$('#header').addClass('menu_vantagensaluno');
	   	};
	   	if ($(window).scrollTop() >= inscrevase - 2) {
	       	removeClasses();
	       	$('#header').addClass('menu_inscrevaseum');
	   	};
	   	if ( $(window).scrollTop() >= inscreva_1 -2 ) {
	       	removeClasses();
	       	$('#header').addClass('menu_pqmatricular');
	   	};
	   	if ($(window).scrollTop() >= depoimento -2 ) {
	       	removeClasses();
	       	$('#header').addClass('menu_professor');
	   	};
	   	if ($(window).scrollTop() >= contato - 2) {
	       	removeClasses();
	       	$('#header').addClass('menu_inscrevaseum');
	   	};
	}
	// RODA FUNÇOES DURANTE O SCROLL
	$( window ).scroll(function () {
		posicaoCamada();
	});
});
