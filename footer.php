<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package durhamtaxhelp_v2
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( '%1$s is %2$s.', 'durhamtaxhelp_v2' ), 'Durham Tax Help', '<a href="http://enactus.ca/" target="blank">empowered by Enactus</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
