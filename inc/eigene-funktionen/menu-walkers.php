<?php

// Feld "seitenklasse" wird als Menüklasse hinzugefügt, wenn vorhanden

    class anchorWalker extends Walker_page {
    	function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
    		if ( $depth )
    			$indent = str_repeat("\t", $depth);
    		else
    			$indent = '';
    
    		extract($args, EXTR_SKIP);
    		$css_class = array('page_item', 'page-item-'.$page->ID);
    		if ( !empty($current_page) ) {
    			$_current_page = get_post( $current_page );
    			if ( in_array( $page->ID, $_current_page->ancestors ) )
    				$css_class[] = 'current_page_ancestor';
    			if ( $page->ID == $current_page )
    				$css_class[] = 'current_page_item';
    			elseif ( $_current_page && $page->ID == $_current_page->post_parent )
    				$css_class[] = 'current_page_parent';
    		} elseif ( $page->ID == get_option('page_for_posts') ) {
    			$css_class[] = 'current_page_parent';
    		}
            
            
            /* Active Class */
           
	       if (get_the_id() == $page->ID) {
		       $css_class[] = "active";
	       }
            
            $css_class[] = get_field("seitenklasse", $page->ID);
            
    		$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
    
    		if ( '' === $page->post_title )
    			$page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );  
        
        /* Ausgabe */
       $output .= $indent . '<li class="'. $css_class . $counter . '"><a href="#' . $page->post_name . '">' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '</a>'; 
    		
    
    		if ( !empty($show_date) ) {
    			if ( 'modified' == $show_date )
    				$time = $page->post_modified;
    			else
    				$time = $page->post_date;
    
    			$output .= " " . mysql2date($date_format, $time);
    		}
    	}
    }
