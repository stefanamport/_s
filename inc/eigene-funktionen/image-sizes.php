<?php 

// Bildmass Vorgaben
    add_action( 'after_setup_theme', 'imagesetup' );
    
    function imagesetup() {       
	   
	   add_theme_support( 'post-thumbnails' );
	   set_post_thumbnail_size( 160, 120 );
	   
	   add_image_size( 'rechteckig', 500, 500, true );
       add_image_size( 'introbild', 1830, 520, true );
       add_image_size( 'bildSeitenspalte', 900, 1000, true );

       add_image_size( 'referenzbild', 610, 480, true );
       add_image_size( 'referenzheader', 610, 345, true );
    }
    
    
    function add_custom_sizes( $imageSizes ) {
      $my_sizes = array(
    		'bild_links' => 'Bild links rechteckig',
    		//'header_image_vorschau' => 'Header Bild Vorschau'
    		
    	);
    	return array_merge( $imageSizes, $my_sizes );
    }
    add_filter( 'image_size_names_choose', 'add_custom_sizes' );
    
    
    
    
    
    