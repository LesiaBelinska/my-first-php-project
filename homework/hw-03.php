<?php
$stringValue1 = '5';
$intValue = 5;
$boolValue = false;
$stringValue2 = '0.0';
$stringValue3 = 'false';
$specialValue = null;
$floatValue = 5.0;
echo "non-strict comparison ( == )" . PHP_EOL;
var_dump($stringValue1 == $intValue);
var_dump($boolValue == $stringValue2);
var_dump($stringValue1 == $stringValue3);
var_dump($floatValue == $intValue);
var_dump($specialValue == $intValue);
echo "strict comparison ( === )" . PHP_EOL;
var_dump($stringValue1 === $intValue);
var_dump($boolValue === $stringValue2);
var_dump($stringValue1 === $stringValue3);
var_dump($floatValue === $intValue);
var_dump($specialValue === $intValue);
echo "with type conversion" . PHP_EOL;
$floatStringValue = (float)$stringValue1;
var_dump($floatStringValue == $floatValue);
var_dump($floatStringValue === $floatValue);
$intFloatValue = (int)$floatValue;
var_dump($intFloatValue == $intValue);
var_dump($intFloatValue === $intValue);
$stringBoolValue = (string)$boolValue;
var_dump($stringBoolValue == $stringValue3);
var_dump($stringBoolValue === $stringValue3);