<?php



add_action( 'wp_ajax_get_vendor_by_cat', 'get_vendor_by_cat' );
add_action( 'wp_ajax_nopriv_get_vendor_by_cat', 'get_vendor_by_cat' );

function get_vendor_by_cat() {
	
	$id = $_POST['id'];
	global $exclusive, $collaborative;

	ob_start();
	$args = array(
		'post_type'      => 'vendors',
		'posts_per_page' => - 1,
		'post__in'	=> explode(',', $id)

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


	$out .= ob_get_contents();
	ob_end_clean();

	$res['id'] = $id;
	$res['out'] = $out;
	echo json_encode( $res );
	exit;

}




