<?php 

function calculate_experience_points($level){

 $total_xp = 0;

    // Loop through all previous levels to accumulate XP
    for ($i = 1; $i < $level; $i++) {
        $total_xp += ($i * 5);
    }

    print($total_xp);
}

calculate_experience_points(20);




// test.php

// $passed = 0;
// $failed = 0;

// function run_test($level, $expected) {
//     global $passed, $failed;

//     $result = calculate_experience_points($level);

//     if ($result === $expected) {
//         echo "✅ PASSED: calculate_experience_points($level) → $result\n";
//         $passed++;
//     } else {
//         echo "❌ FAILED: calculate_experience_points($level) → got $result, expected $expected\n";
//         $failed++;
//     }
// }

// // ---- Tests ----
// // From the spec table
// run_test(1,  0);
// run_test(2,  5);
// run_test(3,  15);
// run_test(4,  30);

// // Extended cases
// run_test(5,  50);   // 30 + (4*5)
// run_test(6,  75);   // 50 + (5*5)
// run_test(10, 225);  // sum of (1..9)*5 = 45*5
// run_test(20, 950);  // sum of (1..19)*5 = 190*5

// // ---- Summary ----
// echo "\n--- Results: $passed passed, $failed failed ---\n";

// ?>