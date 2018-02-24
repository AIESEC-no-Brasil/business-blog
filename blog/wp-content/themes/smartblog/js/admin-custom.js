jQuery(document).ready(function($) {

	// Hide Post Format Metabox
	function hidePostFormatBox() {
		$('#themepixels_format_audio,#themepixels_format_gallery,#themepixels_format_image,#themepixels_format_link,#themepixels_format_quote,#themepixels_format_status,#themepixels_format_video').hide();
	}

	// Post Formats
	if( $("#post-formats-select").length ) {
		hidePostFormatBox();

		var post_formats = ['audio','gallery','image','link','quote','status','video'];
		var selected_post_format = $("input[name='post_format']:checked").val();

		if(jQuery.inArray(selected_post_format,post_formats) != '-1') {
			$('#themepixels_format_'+selected_post_format).show();
		}

		$("input[name='post_format']:radio").change(function() {
			hidePostFormatBox();
			if(jQuery.inArray($(this).val(),post_formats) != '-1') {
				$('#themepixels_format_'+$(this).val()).show();
			}
		});
	}

});