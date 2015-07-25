<?php


/* Admin anpassen für nicht Admins */
    if ( !current_user_can('administrator') ) {
        
        /* Keine Update Alerts */
        add_action('admin_menu','wphidenag');
            function wphidenag() {
                remove_action( 'admin_notices', 'update_nag', 3 );
        }
        
        
        /* Admin Menü Links anpassen */
              function remove_menus()
                {
                    global $menu;

                    $restricted = array(__('Posts'),
                                            __('Media'),
                                            __('Links'),
                                            // __('Pages'),
                                            __('Comments'),
                                            __('Appearance'),
                                            __('Plugins'),
                                            __('Users'),
                                            __('Tools'),
                                            __('Settings'),
                                            __('Profile')
                        );
                        end ($menu);
                        while (prev($menu)){
                            $value = explode(' ',$menu[key($menu)][0]);
                            if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
                        }// end while


                }
                add_action('admin_menu', 'remove_menus');
        
        
        
        /* Admin Bar entfernen, Frontend */
        remove_action('init', 'wp_admin_bar_init');
        
        
        /* Admin Bar anpassen, Backend */
        function remove_admin_bar_links() {
            global $wp_admin_bar;
            $wp_admin_bar->remove_menu('wp-logo');
            $wp_admin_bar->remove_menu('comments');
            $wp_admin_bar->remove_menu('new-content');
        }
        
        add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
        
        
        /* Admin Bar Reihenfolge */
        function custom_menu_order($menu_ord) {
        	if (!$menu_ord) return true;
        	
        	return array(
        		'index.php', // Dashboard
        		'separator1', // First separator
        		'edit.php', // Posts
        		'link-manager.php', // Links
        		'edit.php?post_type=page', // Pages
        		'edit-comments.php', // Comments
        		'separator2', // Second separator
        		'themes.php', // Appearance
        		'plugins.php', // Plugins
        		'users.php', // Users
        		'tools.php', // Tools
        		'options-general.php', // Settings
        		'upload.php', // Media
        		'separator-last', // Last separator
        	);
        }
        add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
        add_filter('menu_order', 'custom_menu_order');


        /*
        // Anpassen Anzeige PUblish Metabox
        function hide_publishing_actions(){

                    echo '
                        <style type="text/css">
                            #misc-publishing-actions,
                            #minor-publishing-actions,
                            .add-new-h2,
                            #edit-slug-box {
                                display:none;
                            }
                        </style>
                    ';

        }
        add_action('admin_head-post.php', 'hide_publishing_actions');
        add_action('admin_head-post-new.php', 'hide_publishing_actions');
        */
        
        
        /* Nach Einloggen direkt zu Seiten 
        function loginRedirect( $redirect_to, $request, $user ){
            if( is_array( $user->roles ) ) { // check if user has a role
                return "/wp-admin/edit.php?edit.php?post_type=page&page=cms-tpv-page-page";
            }
        }
        add_filter("login_redirect", "loginRedirect", 10, 3);
        */

    }
