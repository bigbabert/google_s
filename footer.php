<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Google_S
 */
?>
</div>
<?php get_sidebar('sidebar-2'); ?>
<div class="clear"></div>
<div id="gc-footer" class="g-medium--full g-wide--full">
	<div class="clear"></div>
	<footer id="colophon" class="site-footer " role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'google_s' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'google_s' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'google_s' ), 'Google_s', '<a class="white" href="http://www.blog.altertech.it/author/alberto-cocchiara/" rel="designer"><i class="icon icon-performance"></i> Bigbabert</a> ' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div>
</div><!-- #page -->
<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-XXXXX-X', 'auto');
      ga('send', 'pageview');
</script>
<?php wp_footer(); ?>
</body>
</html>
