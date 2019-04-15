<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Time_Tells_Tech
 */

?>
<!-- Benefits Finder -->

<!-- Section for holding the contents of benefits finder -->
<section id="benefits_finder_section">
    <?php
          /* If field group exists, get the contents of benefits */
          if (function_exists('get_field')) {
              $benefits_contents = get_field('benefits_contents');

              // var_dump( $image );?>

    <!-- Get each field from the field group, save the fields in each variable. -->
    <?php
        foreach ($benefits_contents as $benefits_content) {
            $heading = $benefits_content['heading'];
            $content = $benefits_content['content'];
            $link = $benefits_content['link']; ?>
    <?php
        } ?>


    <div class="grid-container">

        <!-- Add in section title -->
        <h1 class="section_titles">

            <!-- If heading exists, show it. -->
            <?php
                if ($heading) {
                    ?>

            <?php echo $heading; ?>
        </h1>

        <?php
                } ?>


        <!-- If content exists, show it. -->
        <?php
                if ($content) {
                    ?>

        <!-- Echo the content in a p tag to show the content -->
        <p>
            <?php echo $content; ?>
        </p>

        <?php
                } ?>

        <!-- Link to Questionaire -->
        <a href="https://srv138.services.gc.ca/daf/q?id=e9c78bbd-255d-42a0-a8a0-3b60f96d9965&GoCTemplateCulture=en-CA" id="questionnaire_link">

            <!-- If link exists, show it-->
            <?php
                if ($link) {
                    ?>

            <?php echo $link; ?>
        </a>

        <?php
                } ?>
    </div>
</section>
<!-- Footer that holds logos-->
<section id="footer">
    <div id="footer_holder">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/logos/money_makes_cents_logo.png'; ?>" alt="Money Makes Cents Logo" />
        <img src="<?php echo get_template_directory_uri() . '/assets/img/logos/North House Logo_Colour.jpg'; ?>" alt="North House Logo" />
        <img src="<?php echo get_template_directory_uri() . '/assets/img/logos/JHS_Logo_65px_high.png'; ?>" alt="John Howard Logo" />
        <img src="<?php echo get_template_directory_uri() . '/assets/img/logos/enactus_logo.png'; ?>" alt="Enactus Logo" />

        <!-- Shows custom social media options, Facebook and Twitter -->
        <?php if (get_theme_mod('underscores_facebook_url')) {
                    ?>
        <a class="icon facebook" href="<?php echo get_theme_mod('underscores_facebook_url'); ?>" target="_blank">Facebook</a>
        <?php
                } ?>
        <?php if (get_theme_mod('underscores_twitter_url')) {
                    ?>
        <a class="icon twitter" href="<?php echo get_theme_mod('underscores_twitter_url'); ?>" target="_blank">Twitter</a>
        <?php
                } ?>
    </div>



</section>

<?php
          }
        ?>
