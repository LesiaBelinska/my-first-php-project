<?php
//- 1 - green
//- 2 - red
//- 3 - blue
//- 4 - brown
//- 5 - violet
//- 6 - black

$value = 3;

// with if()
echo "with if():" . PHP_EOL;
if(1 === $value) {
    echo "green" . PHP_EOL;
} elseif (2 === $value) {
    echo "red" . PHP_EOL;
} elseif (3 === $value) {
    echo "blue" . PHP_EOL;
} elseif (4 === $value) {
    echo "brown" . PHP_EOL;
} elseif (5 === $value) {
    echo "violet" .PHP_EOL;
} elseif (6 === $value) {
    echo "black" . PHP_EOL;
} else {
    echo "white" . PHP_EOL;
}

// with switch
echo "with switch:" . PHP_EOL;
switch ($value) {
    case 1:
        echo "green" . PHP_EOL;
        break;
    case 2:
        echo "red" . PHP_EOL;
        break;
    case 3:
        echo "blue". PHP_EOL;
        break;
    case 4:
        echo "brown". PHP_EOL;
        break;
    case 5:
        echo "violet". PHP_EOL;
        break;
    case 6:
        echo "black". PHP_EOL;
        break;
    default:
        echo "white". PHP_EOL;
        break;
}

//with match
$result = match ($value) {
    1 => "green",
    2 => "red",
    3 => "blue",
    4 => "brown",
    5 => "violet",
    6 => "black",
    default => "white"
};
var_dump($result);




