/**
 * Dismisses plugin notices
 *
 */
( function( $ ) {
	'use strict';
	$( document ).ready( function() {
		$( '.notice.is-dismissible.wp-home-page-menu .notice-dismiss' ).on( 'click', function() {

			$.ajax( {
				url: wp_home_page_menu.ajax_url,
				data: {
					action: 'wp_home_page_menu_notice_dismiss'
				}
			} );
		 } );
	} );
} )( jQuery );