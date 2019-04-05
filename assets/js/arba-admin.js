jQuery(document).ready(function($) {
    "use strict";

   	jQuery(document).on( 'click', '.arba-intro-notice .be-notice-dismiss', function(e) {
   		e.preventDefault(); 
   		jQuery.ajax({
   			url: ajaxurl,
   			data: {
   				action: 'arba-intro-dismissed'
   			},
   			success: function() {
   				location.reload();
   			}
   		});
   	});
});