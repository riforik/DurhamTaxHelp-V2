<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Time_Tells_Tech
 */

?>

<!-- Volunteer Section -->
<section class="content_sections" id="volunteer_page">
    <div class="volunteer grid-container">
        <!-- If field group exists, show contents -->
        <?php
                    if ( function_exists( 'get_field' ) ) {
                    $volunteer_contents = get_field( 'volunteer_contents' );
                ?>
        <?php
                foreach ( $volunteer_contents as $volunteer_content ) {
                    $main_title = $volunteer_content['main_title'];
                    $title_1 = $volunteer_content['title_1'];
                    $content_1 = $volunteer_content['content_1'];
                    $video = $volunteer_content['video'];
                    // $videovideo = $volunteer_content['videovideo'];
                    $video_description = $volunteer_content['video_description'];
                    $title_2 = $volunteer_content['title_2'];
                    $content_2 = $volunteer_content['content_2'];
                    $learnMoreLink = $volunteer_content['learn_more_button_link'];
                    $organizations_button = $volunteer_content['organizations_button'];
                    $learn_more_content = $volunteer_content['learn_more_content'];
                    // var_dump( $image );

                ?>
        <!-- get video field -->
        <?php
                    $videovideo = get_field('videovideo');

					// set attributes for video
                    $attr = array(
                        'mp4'     => $videovideo,
                        'preload' => 'auto'
                    );
                    ?>

        <!-- Main Content for Volunteer-Section -->

        <h1 class="section_titles cell">

            <!-- If main title exists, show it -->
            <?php
                    if($main_title){
                    ?>
            <?php echo $main_title; ?>
        </h1>

        <?php
                     }
                    ?>

        <!-- Volunteer contents-->
        <div class="volunteer grid-x grid-margin-x">

            <div class="cell small-12 large-4 volunteer_content_container">
                <h4 class="volunteer_subtitles">
                    <?php echo $title_1; ?>
                </h4>
                <p class="">

                    <!-- If content exists, show it -->
                    <?php
                            if($content_1){
                            ?>

                    <?php echo $content_1; ?>

                    <?php
                            }
                            ?>

                </p>
                <!-- Holds a button for the volunteer page -->
                <div class="volunteer_button_container">
                    <a href="#locations_page">
                        <button class="volunteer_button" type="button" name="button">
                            <?php  echo $organizations_button ?></button>
                    </a>
                </div>
                <p id="volunteer_p2">
                    <?php
                            if ($learn_more_content) {
                              echo $learn_more_content;
                            }
                            else {
                              echo "To officially register or to get more information about being a volunteer, click the button below.";
                            } ?>
                </p>
                <div class="volunteer_button_container">
                    <a href="<?php echo $learnMoreLink ?>">
                        <button class="volunteer_button" type="button" name="button">Learn More >></button>
                    </a>
                </div>
            </div>

            <!-- Video container -->
            <div class="cell small-12 large-4">
                <div id="video_container">
                    <div id="short_video">

                        <!-- If video exists, show it. -->
                        <?php
                                    if($attr ){
                                    ?>

                        <?php echo wp_video_shortcode( $attr ) ?>

                        <?php
                                      }
                                    ?>

                    </div>
                </div>
                <!-- Video description container -->
                <p id="video_description">

                    <!-- If video description exists, show it. -->
                    <?php
                                if($video_description ){
                                ?>

                    <?php echo $video_description; ?>

                    <?php
                                }
                                ?>
                </p>
            </div>

            <!-- Content section 2 -->
            <div class="cell small-12 large-4 volunteer_content_container">
                <h4 class="volunteer_subtitles">

                    <!-- If content exists, show it-->
                    <?php
                            if($title_2 ){
                            ?>

                    <?php echo $title_2; ?>
                </h4>

                <?php
                            }
                            ?>

                <p class="">

                    <?php
                            if($content_2 ){
                            ?>
                    <?php echo $content_2; ?>

                    <?php
                            }
                            ?>

                </p>
                <div id="volunteer_last_btn" class="volunteer_button_container">
                    <a href="https://www.canada.ca/en/revenue-agency/news/newsroom/tax-tips/tax-tips-2014/tax-clinics-your-community-organization.html">
                        <button class="volunteer_button" type="button" name="button">Click here >></button>
                    </a>
                </div>
            </div>
        </div>


        <?php
                }
                ?>
        <?php
            }
            ?>

    </div>
    <!-- end of Volunteer Section -->
</section>
