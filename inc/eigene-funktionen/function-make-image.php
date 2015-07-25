<?php

    // Bilder in definierter Grösse ausgeben
    
    if (!function_exists('make_image')) {
        function make_image ($id, $size, $outputModus = "image" , $class = "", $alt = "") {
            
            if ($id > 1) {
                $kompImage =    wp_get_attachment_image_src( $id, $size );
                $bigImage =    wp_get_attachment_image_src( $id, 'original' );
                
                if ($outputModus == "image" OR $outputModus == "lightboxImage") {
                    $output = "<img src='".$kompImage[0]."' class='".$class."' width='".$kompImage[1]."' height='".$kompImage[2]."' alt='".$alt."' />";
                    
                    if ($outputModus == "lightboxImage") {
                        $output = "<a href='".$bigImage[0]."' class='fancybox'>".$output."</a>";
                    }
                }
                else if ($outputModus == "path") {
                    $output = $kompImage[0];
                }
                
                return $output;
            }
        } 
    }