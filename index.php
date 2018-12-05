<?php
$polymer = str_split(file_get_contents(__DIR__ . '/input.txt'));
// The first puzzle
$stack = [];
foreach ($polymer as $unit) {
    array_push($stack, $unit);
    if (count($stack) > 1 && abs(ord($unit) - ord($stack[count($stack) - 2])) === 32) {
        array_pop($stack);
        array_pop($stack);
    }
}
echo count($stack) . PHP_EOL;
// The second puzzle
$units = array_unique(array_map("strtolower", array_unique($polymer)));

foreach ($units as $excludedUnit) {
    $stack = [];
    foreach ($polymer as $unit) {
        if (strtolower($unit) === $excludedUnit) {
            continue;
        }
        array_push($stack, $unit);
        if (count($stack) > 1 && abs(ord($unit) - ord($stack[count($stack) - 2])) === 32) {
            array_pop($stack);
            array_pop($stack);
        }
    }
    echo $excludedUnit . ' -> ' . count($stack) . PHP_EOL;
}