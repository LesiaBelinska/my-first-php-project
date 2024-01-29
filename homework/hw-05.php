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
