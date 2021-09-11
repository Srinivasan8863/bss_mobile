


$(document).ready(function () {

	var j = $('.chBgpx').height();
	var sum = (j * 2) + 35;
	$('.bTkgTA').css('height', sum + 'px');
	$('.tab-content').hide();
	$('#BEVERAGES').show();
	$('.sc-1hdkpm0-0').click(function () {
		var d = $(this).attr('value');

		$('.tab-content').hide();
		$('#' + d).show();
		$('.sc-1hdkpm0-0').addClass('eQpvsi').removeClass('lcdcqN');
		$(this).addClass('lcdcqN').removeClass('eQpvsi');

		document.body.scrollTop = 0; // For Safari
		document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
	});
	$('.padma-menu').click(function () {
		var d = $(this).attr('value');

		$('.tab-content').hide();
		$('.' + d).show();
		$('a.nav-link').css('border-bottom', '0');
		$(this).find('a').css('border-bottom', '3px solid rgb(0, 192, 139)');
		document.body.scrollTop = 0; // For Safari
		document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
	});
	$(window).resize(function () {
		var j = $('.chBgpx').height();
		var sum = (j * 2) + 35;
		$('.bTkgTA').css('height', sum + 'px');
	});
	$(".status_change .dropdown-item").click(function () {
		var getStatusText = $(this).text();
		$(this).closest(".status_dropdown").find(".status__btn").text(getStatusText);
		var generateStatusClass = `${$(this).attr('data-class')}-status`
		$(this).closest(".status_dropdown").attr("data-color", `${generateStatusClass}`);
	});

});
