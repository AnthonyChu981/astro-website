/* More settings/options could be found at http://sachinchoolur.github.io/lightslider/ */


$(document).ready(function() {
            $('#image-gallery1').lightSlider({
                gallery:false,
                item:1,
                slideMargin: 0,
                speed:1000,
				pause:3000,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery1').removeClass('cS-hidden');
                }  
            });
			
			$('#image-gallery2').lightSlider({
                gallery:false,
                item:1,
                slideMargin: 0,
                speed:1000,
				pause:3000,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery2').removeClass('cS-hidden');
                }  
            });
		});