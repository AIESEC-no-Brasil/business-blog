jQuery.fn.isOnScreen = function(){
	var win = jQuery(window);
	var viewport = {
	top : win.scrollTop(),
	left : win.scrollLeft()
	};
	viewport.right = viewport.left + win.width();
	viewport.bottom = viewport.top + win.height();
	var bounds = this.offset();
	    bounds.right = bounds.left + this.outerWidth();
	    bounds.bottom = bounds.top + this.outerHeight();
	    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
};

(function($){

		$(document).ready(function(){

/*		// The other function seems to be getting results much faster
			var request = $.ajax();
			var searchtimeout = setTimeout(function(){}, 0);

			var request =  $.ajax({type: "POST"});
			var searchtimeout;

			// Ajax offices search
			$('#searchform #s').on('keydown', function(e){
				request.abort();
				clearTimeout(searchtimeout);
			});
			
			$('#searchform #s').on('keyup', function(e){

				var input = $(this).val();

				searchtimeout = setTimeout(function(){
					doSearch(input);
				}, 200);
			});
*/

			// Alternate search timeout functionality, which seems to be a lot faster
			// Defining the keyup timeout, to improve search frequency
			var delay = (function(){
				var timer = 0;
				return function(callback, ms){
					clearTimeout (timer);
					timer = setTimeout(callback, ms);
				};
			})();
			
			$('#searchform #s').on('keyup', function(e){

				var input = $(this).val();
				delay(function(){
					doSearch(input);
				}, 200 );

			});


			function doSearch(input){
				if(input.length >= 4){
					//console.log(input);
					

					request = $.ajax({
						type: "POST",
						url: adminajax,
						data: { action: 'search_get_posts', value: input },
						beforeSend: function( xhr ) {
							
							// Fading could be disabled, because typing the same result and
							// then it fading out all the time is annoying
							// This smoothens the search experience feel
							/*
							$('#searchdrop').fadeOut(300, function(){
								$(this).html('');
							});
							*/
							$('#searchform #searchsubmit').addClass('searching');
							
						},
						success: function( data ) {
							//console.log( data );
							if(data == 'noposts'){
								$('#searchdrop').hide().html('');
							}else{
								$('#searchdrop').html(data).fadeIn(300);
								$('#searchform #searchsubmit').removeClass('searching');
							}
							
						}
					})
				}else{
					$('#searchdrop').fadeOut(300, function(){
						$(this).html('');
					});
				}
			}


			// Change search form placeholder for the map page
			$('#searchform #s').attr('placeholder', 'Start typing your country or city...');
			// Disable search submitting,
			// because all results are already displayed with AJAX
			$('#searchform #searchsubmit').attr('disabled','disabled');

			$('#mobile_searchsubmit').removeAttr( "disabled" );


			// Video controls

			if( $('.play-video').length >= 1 ){
		    	$('.play-video').click(	function(e){
		    		e.preventDefault();

		    		if( !$(this).hasClass('active') ){
		    			playVideo();
		    			$(this).closest('.container').addClass('hideMe');
		    			$(this).closest('.video_band').children('.av-section-video-bg').addClass('showMe');
		    		}else{
		    			pauseVideo();
		    		}

		    		$(this).toggleClass('active');
		    	});

		    	function pauseVideo() {
				    document.getElementsByTagName("iframe")[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
				}
		    	function playVideo() {
				    document.getElementsByTagName("iframe")[0].contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
				    document.getElementsByTagName("iframe")[0].contentWindow.postMessage('{"event":"command","func":"startSeconds","args":"0"}', '*');
				}
				

			    setTimeout(function(){
					$('iframe').on('load',function(){
				        //console.log('load the iframe');
						pauseVideo();
						document.getElementsByTagName("iframe")[0].contentWindow.postMessage('{"event":"command","func":"startSeconds","args":"0"}', '*');
						$('.play-video').addClass('showPlay');
				    });
			    },4000);
			}


			// Social footer number's animation
			var inVP = false;
			setInterval(function(){
				if( !inVP && $('#footer').isOnScreen() && $('.instagram_block h2').text() != '' ) {
				   $('#footer .iconbox h2').each(function () {
					  	var $this = $(this);
				  		jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
					    	duration: 3000,
					    	easing: 'easeInOutQuint',
					    	step: function () {
						      	$this.text(Math.ceil(this.Counter));
						    }
					    });
					});
					inVP = true;
				}
			}, 1000);
			


			// Social footer resize, for aligning instagram block's height
			$(window).resize(function(){
				var twheight = $('.twitter_block.hide_on_mobile').height();
				var liheight = $('.linkedin_block.hide_on_mobile').height();
				var fbheight = $('.facebook_block.hide_on_mobile').height();

				var leftColumn = twheight + liheight + fbheight + 151;

				$('.instagram_block.hide_on_mobile').height( leftColumn );
			});
			$(window).trigger('resize');



			// Check comment form submition
			$('#commentform').on('submit', function(){
				var toreturn = true;
				$('input#author, input#email, #comment').removeClass('error');

				if( $('input#author').val() == '' ){
					$('input#author').addClass('error');
					toreturn = false; 
				}

				if( $('input#email').val() == '' ){
					$('input#email').addClass('error');
					toreturn = false;
				}

				if( $('#comment').val() == '' ){
					$('#comment').addClass('error');
					toreturn = false;
				}

				return toreturn;
			});

	});

}(jQuery));


/******************************
/ AIESEC KO
/*****************************/

function AiesecViewModel(){

	self = this;

	/******************************
	/ Facebook
	/*****************************/

	/*
	self.facebookLikeCount = ko.observable();

	self.getFacebookLikes = function(){
		this.url = "https://api.facebook.com/method/fql.query?query=select%20like_count%20from%20link_stat%20where%20url=%27https://www.facebook.com/AIESECglobal%27&format=json";

		jQuery.getJSON(this.url).done(function(data){
			self.facebookLikeCount(data[0].like_count);
		})
	}
	*/

	/******************************
	/ Instagram
	/*****************************/

	self.instagramArray = ko.observableArray([]);

	self.instagramClientID = "dfac8765eae44be2b7a419c98a553661";

	self.instagramImage = function(obj){
		this.link = obj.link || "#";
		this.image = obj.images.low_resolution.url || "#";
	}

	self.url = window.location;

	self.instagramToken = "183254376.dfac876.ad1387e27abe433285a5490360cc22b0";

	self.instagramMediaCount = ko.observable();

	self.getInstagramFeed = function(){

		// Get info
		jQuery.ajax({
			url: "https://api.instagram.com/v1/tags/aiesec?access_token=" + self.instagramToken,
			dataType: 'jsonp',
			success: function(data){
				self.instagramMediaCount(data.data.media_count);
			}
		});

		// Get media
		jQuery.ajax({
			url: "https://api.instagram.com/v1/tags/aiesec/media/recent?count=32&access_token=" + self.instagramToken,
			dataType: 'jsonp',
			success: function(data){
				for(var i = 0; i < data.data.length; i++){
					self.instagramArray.push(new self.instagramImage(data.data[i]));
				}
			}
		});

	}

}

/******************************
/ Apply bindings
/*****************************/

aiesecViewModel = new AiesecViewModel();

ko.applyBindings(aiesecViewModel);

/******************************
/ Load social media data
/*****************************/

aiesecViewModel.getInstagramFeed();
//aiesecViewModel.getFacebookLikes();
