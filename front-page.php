<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * nav-menu
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package durhamtaxhelp_v2
 */

 get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div id='splash' class="landing-page">
                <div class="page1">
                    <div class="site-branding">
                        <?php
                        // if theres no logo, write Durham Tax Help
                        if (function_exists( 'the_custom_logo' ) ) {
                					the_custom_logo();
                        }
                        else{
                          echo "Durham Tax Help";
                        }
              					?>
                                          <?php
              				$durham_tax_help = get_bloginfo( 'description', 'display' );
              				if ( $durham_tax_help || is_customize_preview() ) :
              					?>
                          <p class="site-description">

                          <?php
                          if ( $durham_tax_help){
                          ?>
                              <?php echo $durham_tax_help; /* WPCS: xss ok. */ ?> </p>

                          <?php
                          }
                          ?>

                          <?php endif; ?>
                    </div>

					<!-- If field group exists, get the home contents -->
                    <?php
					if ( function_exists( 'get_field' ) ) {
					$home_contents = get_field( 'home_contents' );
				?>
                          <?php
  				foreach ( $home_contents as $home_content ) {
  					$title = $home_content['title'];
  					$statement = $home_content['statement'];
                    $image1 = $home_content['image1'];
                    $image2 = $home_content['image2'];
                    $image3 = $home_content['image3'];
                    $image4 = $home_content['image4'];
					$conversion_messages = $home_content['conversion_messages'];
					$findhelp = $home_content['find_help_button'];
					$qualify = $home_content['convert_button'];

                    // Conversion statements
                    $begin = $conversion_messages['begin'];
                    // $failed = $conversion_messages['failed'];
                    // $failed = $conversion_messages['success'];
                    // $invalid = $conversion_messages['invalid'];

					// var_dump( $image );
				?>

		  <!-- Holds character images -->
          <div class="characters">
              <img id="main_img_chara1" src="<?php echo $image1['url'] ?>" alt="">
              <img id="main_img_chara2" src="<?php echo $image2['url'] ?>" alt="">
              <img id="main_img_chara3" src="<?php echo $image3['url'] ?>" alt="">
              <img id="main_img_chara4" src="<?php echo $image4['url'] ?>" alt="">
          </div>
          <!-- Main Content for Front-Page -->

          <div class="intro grid-x grid-margin-x">

              <h1 id="main_site_title" class="title small-12">
			<!-- If site title exists, show it -->
              <?php
              if ($title){
              ?>

              <?php echo $title; ?></h1>

              <?php
               }
              ?>
              <p class="statement fadeOn small-12">

			  <!-- If statement exists, show it -->
              <?php
              if ( $statement){
              ?>
                  <?php echo $statement; ?></p>

              <?php
              }
              ?>

              <p class="conversion fadeOn small-12 medium-12">
			  <!-- If content exists, show it-->
              <?php
              if ( $begin){
              ?>

              <?php echo $begin; ?></p>

              <?php
              }
              ?>

              <div class="inp fadeOn small-6 medium-4 large-4">
                  <input class="userInp" type="number" name="" value="" placeholder="Example: 30000">
              </div>
              <div class="btn fadeOn small-6 medium-2 large-3">
                  <button class="calculate" type="button" name="button">
			  
			  <!-- If content exists, show it-->
              <?php
              if ( $qualify){
              ?>
              <?php echo $qualify; ?>

              <?php
              }
              ?>

                  </button>
              </div>
              <div class="two_button_container">
                  <p class="fadeOn" id="or">OR</p>
                  <div class="bigbtn fadeOn small-12">
                      <a href="#volunteer_page">
                          <button class="findTxHp" type="button" name="button">

						<!-- Hold the button -->
                        <?php
                        if ( $findhelp){
                        ?>
                              <?php echo $findhelp; ?>

                        <?php
                         }
                        ?>
                          </button>
                      </a>
                  </div>
              </div>
              <?php
				}
				?>
      <?php
			}
			?>
            </div>
        </div>


        </div>

        </main>



                <!-- Qualify Page -->
                <?php
            		get_template_part( 'template-parts/content-qualify', 'page' );
            		?>

                <!-- Locations Page -->
                <?php
            		get_template_part( 'template-parts/content-location', 'page' );
            		?>

                <!-- Voluneet Page -->
                <?php
                get_template_part( 'template-parts/content-volunteer', 'page' );
                ?>

                <!-- Financial Empowerment Page -->
                <?php
                get_template_part( 'template-parts/content-empowerment', 'page' );
                ?>

                <!-- Testimonials Page -->
                <?php
                get_template_part( 'template-parts/content-testimonials', 'page' );
                ?>

                <!-- Benefits Page -->
                <?php
                get_template_part( 'template-parts/content-benefits', 'page' );
                ?>


                </div>
                </div>
            </div>
        </main>
    </div>
    <!-- #primary -->

    <?php
// get_sidebar();
get_footer();
