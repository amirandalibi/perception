
function renderMediaUploader() {
	'use strict';

	var file_frame;

	if ( undefined !== file_frame ) {

			file_frame.open();
			return;

	}

	file_frame = wp.media.frames.file_frame = wp.media({
			frame:    'post',
			state:    'insert',
			multiple: false
	});


	file_frame.on( 'insert', function(e) {

		var attachment = file_frame.state().get('selection').first().toJSON();

		if ( attachment.mime === 'application/json' ) {
			jQuery('.google-vision-api-json').val(attachment.url);
			jQuery('.google-vision-api-json-id').val(attachment.id);
		} else {
			alert( 'Duh? We need a JSON file' );
			file_frame.open();
		}

	});

	file_frame.open();

}

(function( $ ) {
	'use strict';

	$(function() {
			$( '.upload-api-key' ).on( 'click', function( evt ) {

					// Stop the anchor's default behavior
					evt.preventDefault();

					// Display the media uploader
					renderMediaUploader();

			});

	});

})( jQuery );