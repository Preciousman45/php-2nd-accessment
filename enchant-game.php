<?php 

function enchant_and_attack(int $target_health,int $damage,string $weapon){

     
        $result = [];
        $enchanted_damage = $damage + 10;
        $enchanted_weapon = "enchanted"."-".$weapon;
        $new_health = $target_health - ($damage + 10) ;
        $result=[$enchanted_weapon , $new_health ];

        return $result ;


}


// ---- Test Runner ----
$passed = 0;
$failed = 0;

function run_test($target_health, $damage, $weapon, $test_num) {
    global $passed, $failed;

    $result = enchant_and_attack($target_health, $damage, $weapon);

    $expected_weapon = "enchanted " . $weapon;
    $expected_health = $target_health - ($damage + 10);

    $weapon_ok = $result[0] === $expected_weapon;
    $health_ok  = $result[1] === $expected_health;

    if ($weapon_ok && $health_ok) {
        echo "✅ Test $test_num PASSED: enchant_and_attack($target_health, $damage, \"$weapon\")\n";
        echo "   → weapon: \"{$result[0]}\", new health: {$result[1]}\n";
        $passed++;
    } else {
        echo "❌ Test $test_num FAILED: enchant_and_attack($target_health, $damage, \"$weapon\")\n";
        if (!$weapon_ok) {
            echo "   weapon:     got \"{$result[0]}\", expected \"$expected_weapon\"\n";
        }
        if (!$health_ok) {
            echo "   new health: got {$result[1]}, expected $expected_health\n";
        }
        $failed++;
    }
}

// ---- Tests ----
run_test(100,  50,  "sword", 1);
run_test(500,  100, "axe",   2);
run_test(1000, 250, "bow",   3);

// ---- Summary ----
echo "\n--- Results: $passed passed, $failed failed ---\n";






?>