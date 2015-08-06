		
		<div class="row">
			<div class="large-12 columns">
				<!-- footer -->
				<footer class="footer" role="contentinfo">

					<!-- copyright -->
					<p class="copyright">
						Grupo Marista Web Team
					</p>
					<!-- /copyright -->

				</footer>
				<!-- /footer -->
			</div>
		</div>
	
	</div>
	<!-- /wrapper -->

	<!-- js -->
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/js/jquery.js"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/js/foundation.js"></script>

	<!-- fancybox -->
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/fancybox/fancybox.js"></script>
	
	<!-- scripts -->
	<script>
		$(document).foundation();
		$('a[href$="jpg"], a[href$="png"], a[href$="jpeg"]').fancybox({
        	padding : 5
    	});
	</script>
	<!-- /scripts -->

	<!-- wp footer -->
	<?php // wp_footer(); ?>
	<!-- /wp footer -->

	<!-- analytics -->
	<script>
	(function(f,i,r,e,s,h,l){i["GoogleAnalyticsObject"]=s;f[s]=f[s]||function(){
	(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
	l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
	})(window,document,"script","//www.google-analytics.com/analytics.js","ga");
	ga("create", "UA-XXXXXXXX-XX", "<?php echo esc_url( home_url() ); ?>");
	ga("send", "pageview");
	</script>	

</body>
</html>