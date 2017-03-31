<?php declare(strict_types=1);

$rateA = (float) $argv[1];
$rateB = (float) $argv[2];

$match = false;

interface Limit {
    const MIN = 500;
    const MAX = 5000;
}

for ($x = Limit::MIN; $x <= Limit::MAX; $x++) {
    for ($y = Limit::MIN; $y <= Limit::MAX; $y++) {
        $winA = ($x * $rateA);
        $winB = ($y * $rateB);
        $costs = ($x + $y);

        if (($winA === $winB) && (($winA) > $costs) && (($winB) > $costs)) {
            $match = true;

            echo "Rates: $x and $y will be profitable" . PHP_EOL;
            echo "You can earn: " . ($winA) . " with costs: " . $costs . PHP_EOL;
            echo "The total profit will be: " . number_format((($winA / $costs) - 1) * 100, 2) . "%" . PHP_EOL . PHP_EOL;
        }
    }
}

if (!$match) {
    echo "No match was found for $rateA and $rateB ..." . PHP_EOL;
}
