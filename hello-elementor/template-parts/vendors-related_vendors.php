<?php 
	$args = array(
		'post_type'      => 'applications',
		'posts_per_page' => - 1
	);
	$the_query2 = new WP_Query( $args );

	while ( $the_query2->have_posts() ) : $the_query2->the_post();
		$post_id2 = $the_query2->post->ID;
		$related_vendors = get_field( 'related_vendors', $post_id2 );
		//var_dump($related_vendors);
		$related = [];

		if( $related_vendors ) : 
			foreach ($related_vendors as $key => $related_vendors_) {
				array_push($related, $related_vendors_->ID);
			}
		endif;


		if( $related_vendors ) : ?>
			<div class="related_vendors" data-id="<?php echo $post_id2;?>" data-vendor="<?php echo implode(',', $related); ?>">
				<span><?php echo get_the_title(); ?></span>
			</div>
		<?php endif; ?>

		

		<?php

	endwhile;
	wp_reset_query();

?>

	<div class="related_vendors_info">
		<p>The following vendors offer solutions specializing in <span class="vendors-name">Mobile EEG</span>, or contact us if you don't know where to start.</p>	
	</div>