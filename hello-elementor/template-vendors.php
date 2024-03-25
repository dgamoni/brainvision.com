<?php 
	/*
	Template Name: Vendors
	*/ 


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>


<main class="site-main" role="main">

	<div class="page-content">

			<article class="vedndor-main-content">
				<?php echo get_the_content(); ?>
			</article>

			<article class="applications-wrap">
				<?php get_template_part( 'template-parts/vendors', 'related_vendors' ); ?>
			</article>


			<article class="vendor-wrap">
				<?php get_template_part( 'template-parts/vendors', 'vendors_content' ); ?>
			</article>

	</div>

</main>

<?php
get_footer();