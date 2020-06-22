<meta charset="utf-8">

<link rel="shortcut icon" href="/images/Logo/favicon.png">

<meta name="description" content="Student Astronomy Club, HKUSTSU is one of the Independent Club in HKUST, 
which is affiliated to Hong Kong University of Science and Technology Student's Union(HKUSTSU). ">

<meta name="author" content="Student Astronomy Club, HKUSTSU">

<!-- starting of styling and code things -->
<!-- Mobile Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- jquery core, can be downloaded from cache -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- bootstrap core, can be downloaded from cache -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="js/jquery.min.js"></script> <!--Unknown jquery file, but without it, cannot load in IE-->




<!-- custom setup, lots of contents origin from templates. 
If you want to change design but not messing up others, edit only **style.css**  -->

<!-- css type --> 
	<!-- Web Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	<link href='https://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

	<!-- Font Awesome CSS -->
	<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

	<!-- Plugins -->
	<link href="css/animations.css" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

	<!-- Buttons css -->
	<link rel="stylesheet" href="css/buttons.css">	

	<!-- lightslider (Image slider in Introduction section) css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css">
	
	<!-- fancybox (gallery box in Gallery section) css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.css" >
	
	<!-- Core CSS file -->
	<link rel="stylesheet" href="css/style.css">
	
<!-- js type -->	
	<!-- Modernizr javascript -->
	<script type="text/javascript" src="js/modernizr.js"></script>
	
	<!-- Backstretch javascript -->
	<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>

	<!-- Appear javascript -->
	<script type="text/javascript" src="js/jquery.appear.js"></script>
	
	
	<!-- Initialization of Plugins -->
	<script type="text/javascript" src="js/template.js"></script>
	
	
	<!-- lightslider (Image slider in Introduction section) javascript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>
	<script type="text/javascript" src="js/lightsliderSetting.js"></script>
	
	
	<!-- fancybox (gallery box in Gallery section) javascript -->	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js"></script>
	<script src="js/fancyBoxOption.js"></script>
	
	<!-- smooth scrolling-->
	<script>
	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html,body').animate({
			  scrollTop: target.offset().top
			}, 1000);
			return false;
		  }
		}
	  });
	});
	</script>