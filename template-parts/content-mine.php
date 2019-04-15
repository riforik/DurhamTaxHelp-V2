<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package durhamtaxhelp_v2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Here is the landing page / header -->
    <header class="entry-header">
        <?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
        <div class="entry-meta">
            <?php
				durhamtaxhelp_v2_posted_on();
				durhamtaxhelp_v2_posted_by();
				?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
        <!-- Get main content -->

    </header><!-- .entry-header -->

    <?php durhamtaxhelp_v2_post_thumbnail(); ?>

    <!-- After the header, add the qualify page -->
    <div id='splash' class="landing-page">

    </div>

    <footer class="entry-footer">
        <?php durhamtaxhelp_v2_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
