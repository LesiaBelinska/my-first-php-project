<?php
$string = "This is first sentence. This is second sentence. This is third sentence.";
$stringLength = strlen($string);

if ($stringLength > 20) {
    $position = strpos($string, ".");
        if ($position !== false && $position !== ($stringLength - 1)) {
            $newSentence = trim(substr($string, $position + 1, $stringLength));
            echo $newSentence . PHP_EOL;
        } else {
        echo "The string has only one sentence." . PHP_EOL;
    }
}




//$string = "This is first sentence. This is second sentence. This is third sentence.";
//$stringLength = strlen($string);
//
//if($stringLength > 20) {
//    $hasMultiplySentence = str_contains($string, ".");
//    if($hasMultiplySentence) {
//        $position = strpos($string, ".");
//        var_dump($position);
//        if ($position !== false && $position !== ($stringLength - 1)) {
//            $newSentence = substr($string, $position +2, $stringLength);
//            echo $newSentence . PHP_EOL;
//        }
//    } else {
//        echo "The string has only one sentence." . PHP_EOL;
//    }
//}
