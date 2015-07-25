<?php
/*
Temp late Name: Weiterleitung auf Inhaltsseite
*/
  
 	 $id = get_field('redirectid');
 	 
 	 $id = $id->ID;
 	 
 	 if ($id > 0) {
 	 
	 	 wp_redirect(get_permalink($id));
    }

?>