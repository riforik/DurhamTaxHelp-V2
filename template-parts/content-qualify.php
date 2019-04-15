<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Time_Tells_Tech
 */

?>

<!-- Content section holds the content of qualify page -->
<section class="content_sections" id="qualify_page">

    <!-- Gets the content of the fields if they exist -->
    <?php
				if ( function_exists( 'get_field' ) ) {
				$qualify_contents = get_field( 'qualify_contents' );

		
		?>


    <?php
		foreach( $qualify_contents as $qualify_content ) {
				$qheading = $qualify_content['heading'];
				$heading1 = $qualify_content['heading1'];
				$statement = $qualify_content['statement'];
				$paragraph1_heading = $qualify_content['paragraph1_heading'];
				$paragraph1_content = $qualify_content['paragraph1_content'];
				$paragraph2_heading = $qualify_content['paragraph2_heading'];
				$paragraph2_content = $qualify_content['paragraph2_content'];
				$paragraph3_heading = $qualify_content['paragraph2_heading'];
				$paragraph3_content = $qualify_content['paragraph3_content'];
				$heading2 = $qualify_content['heading2'];
				$content2 = $qualify_content['content2'];
				$heading3 = $qualify_content['heading3'];
				$content3 = $qualify_content['content3'];





		?>
    <?php
		}
		?>



    <div class="grid-container htq_grid">

        <div class="grid-x grid-margin-x fullVH">
            <h1 class="section_titles small-12">

                <!-- If heading exists, show heading -->
                <?php
                    if ($qheading) {
                    ?>

                <?php echo $qheading; ?>


            </h1>

            <?php

                    

                    }

                    ?>

            <!-- Container for holding the buttons for each article of information -->
            <div class="how_to_qualify_btn_container small-12 medium-4 large-3 grid-x">
                <!-- Buttons -->
                <button id="eligible_btn" class="qualify_buttons small-3 medium-12">
                    Am I Eligible?
                </button>

                <button id="receipts_btn" class="qualify_buttons small-3 medium-12">
                    Receipts
                </button>

                <button id="infoSlips_btn" class="qualify_buttons small-3 medium-12">
                    Information Slips
                </button>
            </div>

            <!-- Holds the qualify box -->
            <div class="small-12 medium-8 large-9 qualify_box">


                <div class="qualify_box box">
                    <article id="article_box01" class="article_box">
                        <h2 class="am_i_eligible_title">
                            <!-- If the content exists, show said content -->
                            <?php
                                                if ($heading1) {
                                                ?>

                            <?php echo $heading1; ?>
                        </h2>

                        <?php
												}
												?>
                        <p class="paragraph0101">

                            <?php
												if($statement){
                                                ?>
                            }
                            <?php echo $statement; ?>
                        </p>

                        <?php
												}
												?>

                        <h3 class="volunteer_warning">

                            <?php
												if($paragraph1_heading){
												?>

                            <?php echo $paragraph1_heading; ?>
                        </h3>

                        <?php
												}
												?>

                        <ul class="volunteer_warning_list">

                            <?php
												if($paragraph1_content){
												?>

                            <?php echo $paragraph1_content; ?>

                            <?php
												}
												?>

                        </ul>

                        <h4 class="volunteer_CRA_Guidelines">

                            <?php
												if($paragraph2_heading){
												?>

                            <?php echo $paragraph2_heading; ?>
                        </h4>

                        <?php
												}
												?>

                        <ul class="volunteer_CRA_Guidelines_list">

                            <?php
												if($paragraph2_content){
												?>

                            <?php echo $paragraph2_content; ?>

                            <?php
												}
												?>

                        </ul>

                        <h5 class="chartered_Accountant_Guidelines">
                            <?php echo $paragraph3_heading; ?>
                        </h5>

                        <ul class="chartered_Accountant_Guidelines_list">
                            <?php echo $paragraph3_content; ?>
                        </ul>
                        <!--- End "Am I Eligible" section --->
                    </article>


                    <article id="article_box02" class="article_box">
                        <h2 class="what_to_bring_title">

                            <?php
												if($heading2){
												?>

                            <?php echo $heading2; ?>
                        </h2>

                        <?php
												}
												?>

                        <ul class="receipts_list">

                            <?php
												if($content2){
												?>

                            <?php echo $content2; ?>

                            <?php
												}
												?>

                        </ul>
                        <!--- End "What to Bring: Receipts" section --->
                    </article>

                    <article id="article_box03" class="article_box">
                        <h2 class="what_to_bring_title">

                            <?php
												if($heading3){
												?>

                            <?php echo $heading3; ?>
                        </h2>

                        <?php
												}
												?>

                        <ul class="information_slips_list">

                            <?php
												if($content3){
												?>
                            <?php echo $content3; ?>

                            <?php
												}
												?>

                        </ul>
                        <!--- End "What to Bring: Information Slips" section --->
                    </article>
                    <div class="download">
                        <!-- Get the images to indicate that the document can be downloaded in PDF format -->
                        <a href="<?php echo get_template_directory_uri() . '/assets/img/TaxFilingChecklist.pdf'; ?>" download>
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/pdfDLImg.png'; ?>" />
                            <p class="dlPDF">Click here to download in PDF format.</p>
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <?php
				}
		?>

</section>
