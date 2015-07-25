<?php

	add_action( 'init', 'create_post_type' );
	
	function create_post_type() {
		
		
		register_post_type( 'referenzen',
			array(
				'labels' => array(
					'name' => __( 'Referenzen' ),
					'singular_name' => __( 'Referenz' )
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'has_archive'        => false,
				'hierarchical'       => true,
				'taxonomies' => array('category'), 
				'rewrite' => array('slug' => 'news', 'with_front' => FALSE)
	
			)
		);

		register_post_type( 'news',
			array(
				'labels' => array(
					'name' => __( 'News' ),
					'singular_name' => __( 'News' )
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'has_archive'        => false,
				'hierarchical'       => true,
				'rewrite' => array('slug' => 'news', 'with_front' => FALSE)
	
			)
		);
		
	}