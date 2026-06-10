<?php 


function check_ingredient_match($recipe,$inventory){
    $recipe ;
    $inventory ;
    $missing_ingredient = [];

    $required_percentage = "";

    if (count($inventory) > 0) {
      $required_percentage = (count($recipe) / count($inventory)) * 100;
  } else {
      $required_percentage = 0; // Default fallback value
  }


   foreach( $inventory as $content ) {
      if (!in_array($content, $recipe)) {
        $missing_ingredient [] = $content ;

      }
   }

  return [$required_percentage,$missing_ingredient];

}




// ---- Test Runner ----
$passed = 0;
$failed = 0;

function run_test($label, $recipe, $inventory, $expected_pct, $expected_missing) {
    global $passed, $failed;

    [$pct, $missing] = check_ingredient_match($recipe, $inventory);

    // Sort both missing arrays so order doesn't affect comparison
    sort($missing);
    sort($expected_missing);

    $pct_ok     = abs($pct - $expected_pct) < 0.01;
    $missing_ok = $missing === $expected_missing;

    if ($pct_ok && $missing_ok) {
        echo "✅ PASSED: $label\n";
        echo "   → {$pct}% | missing: [" . implode(", ", $missing) . "]\n";
        $passed++;
    } else {
        echo "❌ FAILED: $label\n";
        if (!$pct_ok) {
            echo "   percentage:  got $pct, expected $expected_pct\n";
        }
        if (!$missing_ok) {
            echo "   missing: got [" . implode(", ", $missing) . "], expected [" . implode(", ", $expected_missing) . "]\n";
        }
        $failed++;
    }
}

// ---- Tests ----

// From the spec example
run_test(
    "Spec example — 1 missing out of 4",
    ["Dragon Scale", "Unicorn Hair", "Phoenix Feather", "Troll Tusk"],
    ["Dragon Scale", "Phoenix Feather", "Troll Tusk"],
    75.00,
    ["Unicorn Hair"]
);

// All ingredients present
run_test(
    "Full match — 100%",
    ["Iron Ore", "Coal", "Leather"],
    ["Iron Ore", "Coal", "Leather", "Silk"],   // inventory has extra items
    100.00,
    []
);

// No ingredients present
run_test(
    "No match — 0%",
    ["Moonstone", "Star Dust"],
    ["Iron Ore", "Coal"],
    0.00,
    ["Moonstone", "Star Dust"]
);

// Partial match — 2 missing out of 5 (60%)
run_test(
    "Partial match — 3 of 5 present (60%)",
    ["Herb", "Venom", "Crystal", "Root", "Ash"],
    ["Herb", "Crystal", "Ash"],
    60.00,
    ["Venom", "Root"]
);

// Single ingredient — present
run_test(
    "Single ingredient — present",
    ["Elder Bark"],
    ["Elder Bark"],
    100.00,
    []
);

// Single ingredient — missing
run_test(
    "Single ingredient — missing",
    ["Elder Bark"],
    [],
    0.00,
    ["Elder Bark"]
);

// Case sensitivity check — should NOT match
run_test(
    "Case sensitivity — 'dragon scale' != 'Dragon Scale'",
    ["Dragon Scale"],
    ["dragon scale"],
    0.00,
    ["Dragon Scale"]
);

// ---- Summary ----
echo "\n--- Results: $passed passed, $failed failed ---\n";

?>