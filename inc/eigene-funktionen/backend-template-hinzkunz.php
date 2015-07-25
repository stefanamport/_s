<?php

function additional_admin_color_schemes() {
	//Get the theme directory
	$theme_dir = get_template_directory_uri();

	//Color Template hinzufügen
	wp_admin_css_color( 'hinzkunz', __( 'Hinz und Kunz' ),
		$theme_dir . '/admin-colors/hinzkunz/colors.css',
		array( '#004c5a', '#004c5a', '#004c5a', '#004c5a' )
        	);
        }
        add_action('admin_init', 'additional_admin_color_schemes');



/* Standard Farbeinstellung auf Hinzkunz Farbtemplate */

    function set_default_admin_color($user_id) {
    	$args = array(
    		'ID' => $user_id,
    		'admin_color' => 'hinzkunz'
    	);
    	wp_update_user( $args );
    }
    add_action('user_register', 'set_default_admin_color');


/* Supportlink zu Header hinzufügen */
    add_action('admin_bar_menu', 'add_toolbar_items', 100);
    
    function add_toolbar_items($admin_bar){
    
    	$admin_bar->add_menu( array(
    		'id'    => 'customLogout',
    		'title' => 'Abmelden',	
    		'meta'  => array(
    			'title' => __('logout'),			
    		),
    
    	));
    
    	$admin_bar->add_menu( array(
    		'id'    => 'hinzunzSupport',
    		'title' => 'CMS Support: <u>hinzkunz.ch</u>',
    		'href'  => 'http://www.hinzkunz.ch/kontakt.html',	
    		'meta'  => array(
    			'title' => __('Werbeagentur Hinz und Kunz'),			
    		),
    	));
    }


		
/* Login Seite, Button Farbe */
       function my_custom_login_button() {
        echo '<style type="text/css"> #wp-submit { background: #01697c !important; } </style>';
       }
       add_action('login_head', 'my_custom_login_button');



/* Footer Anpassen */

        add_filter('admin_footer_text', 'remove_footer_admin'); //change admin footer text
        
            function remove_footer_admin () {
            echo "
                <div class='hinzkunzLogo'>
                    
                    
                    Eine Webseite von <a href='http://www.hinzkunz.ch' target='_blank' class='supportKontakt'>hinzkunz.ch</a>
                    
                    <a href='http://www.hinzkunz.ch' target='_blank'>
                        <img src='".get_stylesheet_directory_uri() . "/admin-colors/hinzkunz/logo-hinzkunz-retina.jpg' /></a>
                    </div>";
        }
