<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Time_Tells_Tech
 */

?>
<section class="content_sections" id="testimonials_page">
    <!-- Page Heading -->
    <h1 class="section_titles"> Testimonials</h1>

    <!-- Content for Testimonials Page -->
    <div class="testimonials-page">

        <!-- Grid Container for positoong of testimonials cards -->
        <div class="grid-x grid-margin-x container cardContainer">

            <!-- If field group exists, get its contents -->
            <?php
                if ( function_exists( 'get_field' ) ) {
                $testimonials = get_field( 'testimonials' );
            ?>

            <!-- for each function to output card for each field added -->
            <?php
                foreach ( $testimonials as $testimonial ) {

                    $statement = $testimonial['statement'];
                    $image = $testimonial['image'];
                    $imageBG = $testimonial['imageBG'];

                ?>
            <!-- card structure -->
            <!-- outer most div containing all smaller elements -->
            <div class="cell card small-offset-0 small-12 medium-offset-1 medium-10 large-offset-0  large-6">
                <div class="grid-x grid-margin-x container">
                    <!-- frame for image to be placed inside -->
                    <div class="cell peopleImg small-3 medium-3 large-3">
                        <img class="image" src="<?php echo $image['url'] ?>" alt="">
                    </div>

                    <!-- background image for text -->
                    <div class="cell backImg small-12 medium-12 large-12">
                        <img class="imageBG" src="<?php echo $imageBG['url'] ?>" alt="">
                    </div>

                    <!-- container div for statement testimonial -->
                    <div class="cell testimony small-10 small-offset-1 medium-10 medium-offset-1 large-9 large-offset-1">

                        <!-- If statement exists, show it-->
                        <?php
                                if($statement){
                                ?>
                        <p>
                            <?php echo $statement; ?>
                        </p>

                        <?php
                                }
                                ?>

                    </div>

                </div>
            </div>
            <?php
        }
     ?>
            <?php
        }
     ?>
</section>
