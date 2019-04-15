
<?php
        $args = array(
            'post_type' => 'location',
        );

		// WP Query variable to hold the args variable.
        $locations = new wp_Query( $args );

        if ( $locations->have_posts() ) {
            while ( $locations->have_posts() ) {
                $locations->the_post();
                // the_title();
				// the_content();

				$locationCutomizeds = get_field('locations');
        // var_dump($locationCutomizeds['location']['name']);

				if(!empty($locationCutomizeds)){

					foreach($locationCutomizeds as $locationCutomized){
						$locationName = $locationCutomized["name"];
						$locationAddress = $locationCutomized['address'];
						$locationInformation = $locationCutomized['information'];
            // var_dump($locationCutomized["name"]);
            echo $locationName;
					}

				}
			}

			wp_reset_postdata();
        }


$data = json_encode($locationCutomized);

header("Content-Type: application/json");

print($data);
?>
