<?php
    
    function makeMetaDescription($meta) {
            
            if (strlen($meta) == 0) {
                $meta = bloginfo('description');
            }
            
            return $meta;
        }