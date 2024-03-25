<?php 

global $exclusive,$collaborative;

	$args = array(
		'post_type'      => 'vendors',
		'posts_per_page' => - 1
	);

	$the_query = new WP_Query( $args );
	$exclusive = [];
	$collaborative = [];

	while ( $the_query->have_posts() ) : $the_query->the_post();

		$post_id = $the_query->post->ID;
		$relationship_category = get_field( 'relationship_category', $post_id );

		if ($relationship_category == 'Exclusive Distribution Partner') {
			array_push($exclusive, $post_id);
		} else if ($relationship_category == 'Collaborative Distribution Partner') {
			array_push($collaborative, $post_id);
		}

	endwhile;
	wp_reset_query();


	get_template_part( 'template-parts/vendors', 'vendors_loop' );

	
?> 