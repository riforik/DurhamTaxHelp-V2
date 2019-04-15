<?php
/**
 * Template Name: Contact Page
 *
 * This is the custom template for the contact page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package durhamtaxhelp_v2
 */

get_header();
?>

	
	
		


		<?php
		
		if (function_exists('get_field')) {
		  $form_id = get_field('form_id');
		  $form_shortcode = get_field('form_shortcode');
				if ($form_id || $form_shortcode) {
				?>
				<section class="contact-form">
					<div class="grid-container">
					<div class="grid-x grid-margin-x grid-margin-y">
						<div class="cell small-12 medium-6">
						<h2 id="contactHeading"> Contact US </h2>
						<?php echo do_shortcode('[ws_form id="' . $form_id . '"]'); ?>
						</div>
						
					</div>
					</div>
				</section>
				<?php
		  }
		}
		?>

<?php
get_footer();
?>