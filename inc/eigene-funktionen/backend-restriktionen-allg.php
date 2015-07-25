<?php
/* Admin Bar verstecken*/
	show_admin_bar(false);

/* Editor Style */
   add_editor_style( );


/* Backend Design*/
    
    
    
    // CUSTOM ADMIN LOGIN HEADER LOGO
       function my_custom_login_logo() {
        echo '<style type="text/css"> h1 a { background-image:url('.get_bloginfo('template_directory').'/images/login-logo.png) !important; background-size:70px 70px !important; background-position: center top !important; display: none !important; } </style>';
       }
       add_action('login_head', 'my_custom_login_logo');
    
    /*
    // CUSTOM ADMIN LOGIN HEADER LINK & ALT TEXT
       function change_wp_login_url() {
        echo bloginfo('url');  // OR ECHO YOUR OWN URL
       }
       function change_wp_login_title() {
        echo get_option('blogname'); // OR ECHO YOUR OWN ALT TEXT
       }
       add_filter('login_headerurl', 'change_wp_login_url');
       add_filter('login_headertitle', 'change_wp_login_title');
     */  
       


/* Backend Widgets */
    function remove_dashboard_widgets() {
        global $wp_meta_boxes;
     
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
     
    }
     
    add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );




/* Backend Menü */

     /* Menüpunkte umbenennen */
        add_filter('gettext', 'rename_admin_menu_items');
        add_filter('ngettext', 'rename_admin_menu_items');
        
        function rename_admin_menu_items( $menu ) {
        	
        	$menu = str_ireplace( 'Options', 'Optionen', $menu );
        	//$menu = str_ireplace( 'Seiten', 'statisches & Startseite', $menu );
    
        	return $menu;
        }
        
      /* Menüpunkte entfernen */
        add_action( 'admin_menu', 'admin_menu_anpassen_alle' );
        
    	function admin_menu_anpassen_alle() {
    	    
    	    $toRemove = array('edit-comments.php');
    	
    	    foreach ($toRemove as $remove) {
    		    remove_menu_page($remove);
    		}
    	}
    	
    	
/* Allgemeine Page Listings */

	// Auflistungs Spalten entfernen
    	function my_columns_filter( $columns ) {
            unset($columns['author']);
            unset($columns['categories']);
            unset($columns['tags']);
            unset($columns['comments']);
            return $columns;
        }
            
        add_filter( 'manage_edit-post_columns', 'my_columns_filter', 10, 1 );
        add_filter( 'manage_edit-page_columns', 'my_columns_filter', 10, 1 );
        
        
        
        // Advanced Custom Fields - rename Options page
        function my_acf_options_page_settings( $settings )
            {
            	$settings['title'] = 'Allgemeine Einstellungen';
            	$settings['pages'] = array('Allgemeine Einstellungen');
             
            	return $settings;
            }
             
            add_filter('acf/options_page/settings', 'my_acf_options_page_settings');
        
        
