<?php 


    function calculate_experience_points($target_level) {
    $total_xp = 0;
    
    // Loop through all previous levels to accumulate XP
    for ($level = 1; $level < $target_level; $level++) {
        $xp_for_next_level = $level * 5;
        $total_xp += $xp_for_next_level;
    }
    
    return $total_xp;
}

// Calculate total XP needed to reach Level 4
echo calculate_experience_points(4); 
// Output: 30



 ?>