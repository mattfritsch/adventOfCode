<?php

function readSpecialFile(string $filename) : array {
    return file($filename);
}

function adjustArray(array $array) : array{
    $string = implode(' ', $array);
    $array = explode(PHP_EOL, $string);
    for($i = 1; $i < sizeof($array); $i++) {
        $array[$i] = substr($array[$i], 1);
    }
    return $array;
}