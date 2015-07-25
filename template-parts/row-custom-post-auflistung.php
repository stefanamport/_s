

	<?php
	$args = array( 'post_type' => 'news', 'posts_per_page' => 999 );
	//$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	
	$loop = new WP_Query( $args );
	
	// Pagination fix
	//$temp_query = $loop;
	//$wp_query   = NULL;
	//$wp_query   = $loop;
	

	while ( $loop->have_posts() ) : $loop->the_post(); ?>

	<?php the_field('seitentitel') ?>

	<?php 
		endwhile;
		wp_reset_postdata();
	?>
