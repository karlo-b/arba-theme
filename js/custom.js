jQuery(document).ready(function($) {
    "use strict";
	$('.primary-nav .menu-item-has-children').append('<span class="sub-toggle"> <i class="fa fa-angle-down"></i> </span>');
	$('.primary-nav .sub-toggle').on('click', function() {
		$(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
	});
	$( "#menu-slide__button" ).click( function(e) {
		$('.primary-nav').slideToggle('1000');
        return false;
	} );
	$('.main-navigation .sub-toggle').on('click', function() {
		$(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
	});
	$( "#search-overlay__button, #mobile-search__button, #search-overlay__close" ).click( function(e) {
		$( "html" ).toggleClass( "search-overlay__active" );
        $( "html.search-overlay__active .search-overlay form.search-form input[type='text']" ).focus();
		return false;
	} );
	$( "#comments__toggle" ).click( function(e) {
		$( ".comments__container" ).slideToggle( "fast" );
        return false;
	} );
});