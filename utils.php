<?php

function readSpecialFile(string $filename) : array {
    return file($filename);
}