<script src="{{ asset('/frontend/assets/') }}/js/main.js"></script>
<!--search jQuery-->
<script src="{{ asset('/frontend/assets/') }}/js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
 </script>
 <!--mycart-->
<script type="text/javascript" src="{{ asset('/frontend/assets/') }}/js/bootstrap-3.1.1.min.js"></script>
 <!-- cart -->
<script src="{{ asset('/frontend/assets/') }}/js/simpleCart.min.js"></script>
<!-- cart -->
  <!--start-rate-->
<script src="{{ asset('/frontend/assets/') }}/js/jstarbox.js"></script>
	<link rel="stylesheet" href="{{ asset('/frontend/assets/') }}/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>