<?php

function calculateTotalPrice(array $items): float {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

function modifyString(string $inputString): string {
    $inputString = str_replace(' ', '', $inputString);
    return strtolower($inputString);
}

function checkEvenOrOdd(int $number): string {
    return ($number % 2 == 0) ? "The number $number is even." : "The number $number is odd.";
}

$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];

$string = "This is a poorly written program with little structure and readability.";
$number = 42;

echo "Total price: " . calculateTotalPrice($items);
echo "\nModified string: " . modifyString($string);
echo "\n" . checkEvenOrOdd($number);
