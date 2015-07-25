<?php

// Ultimate Parent
    function ultimateParent($pageID, $level) {
        
        
        $parents_fromtop = get_post_ancestors($pageID);
        $parents = array_reverse($parents_fromtop);
        
        if (count($parents) > 0) {
        
        	if ($level > 0) {
        		$level = $level - 1;
            	$output = $parents[$level];
            }
            else {
	            $output = $parents[0];
            }
            

        }
        else {
            $output = $pageID;
        }
        
        return $output;
    }