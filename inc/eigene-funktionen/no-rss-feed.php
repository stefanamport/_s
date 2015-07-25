<?php
 
	function fb_disable_feed() {
		wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
	}
	
		add_action('do_feed', 'fb_disable_feed', 1);
		add_action('do_feed_rdf', 'fb_disable_feed', 1);
		add_action('do_feed_rss', 'fb_disable_feed', 1);
		add_action('do_feed_rss2', 'fb_disable_feed', 1);
		add_action('do_feed_atom', 'fb_disable_feed', 1);
		add_action('do_feed_rss2_comments', 'fb_disable_feed', 1);
		add_action('do_feed_atom_comments', 'fb_disable_feed', 1);
		
		function remove_comments_rss( $for_comments ) {
			return;
			}
		add_filter('post_comments_feed_link','remove_comments_rss');