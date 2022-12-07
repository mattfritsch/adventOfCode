<?php
/**
 * Consigns for the party one :
 * Enemy strategy :
 *      - A : Rock
 *      - B : Paper
 *      - C : Scissors
 * Your strategy :
 *      - X : Rock
 *      - Y : Paper
 *      - Z : Scissors
 *
 * Consigns for the party two :
 *
 * Enemy strategy :
 *      - A : Rock
 *      - B : Paper
 *      - C : Scissors
 * Your strategy :
 *      - X : Lose
 *      - Y : Draw
 *      - Z : Win
 * Score system :
 *  Symbols :
 *      - Rock : 1
 *      - Paper : 2
 *      - Scissors : 3
 *  Game :
 *      - Lost : 0
 *      - Draw : 3
 *      - Win : 6
 *
 * Réussi : nombre d'étoiles -> 2
 */

require_once('../utils.php');

$rock = 1;
$paper = 2;
$scissors = 3;

$loose = 0;
$draw = 3;
$win = 6;

$score1 = 0;
$score2 = 0;

//Lecture du fichier
$file = readSpecialFile('day2.txt');
//Conversion de $file qui est de type Array en une chaîne de type String
$file = implode(' ', $file);
//Explode de la chaîne pour avoir un élément de type " X X".
$parties = explode(PHP_EOL, $file);

//Enlève le premier espace de chaque élément de la liste $parties -> "X X"
for($i = 1; $i < sizeof($parties); $i++){
    $parties[$i] = substr($parties[$i], 1);
}

/**
 * Pour chaque élément, je vérifie les combinaisons de victoires
 * Surement améliorable
 */
for($i = 0; $i < sizeof($parties); $i++){
    $party = $parties[$i];
    if(str_contains($party, 'A')){
        if(str_contains($party, 'X'))
            $score1 += $draw + $rock;
        elseif (str_contains($party, 'Y'))
            $score1 += $win + $paper;
        else
            $score1 += $loose + $scissors;
    }
    elseif (str_contains($party, 'B')){
        if(str_contains($party, 'X'))
            $score1 += $loose + $rock;
        elseif (str_contains($party, 'Y'))
            $score1 += $draw + $paper;
        else
            $score1 += $win + $scissors;
    }
    elseif (str_contains($party, 'C')){
        if(str_contains($party, 'X'))
            $score1 += $win + $rock;
        elseif (str_contains($party, 'Y'))
            $score1 += $loose + $paper;
        else
            $score1 += $draw + $scissors;
    }
}

/**
 * Pour chaque élément, je vérifie les combinaisons de victoires
 * Surement améliorable
 */
for($i = 0; $i < sizeof($parties); $i++){
    $party = $parties[$i];
    if(str_contains($party, 'A')){
        if(str_contains($party, 'X'))
            $score2 += $loose + $scissors;
        elseif (str_contains($party, 'Y'))
            $score2 += $draw + $rock;
        else
            $score2 += $win + $paper;
    }
    elseif (str_contains($party, 'B')){
        if(str_contains($party, 'X'))
            $score2 += $loose + $rock;
        elseif (str_contains($party, 'Y'))
            $score2 += $draw + $paper;
        else
            $score2 += $win + $scissors;
    }
    elseif (str_contains($party, 'C')){
        if(str_contains($party, 'X'))
            $score2 += $loose + $paper;
        elseif (str_contains($party, 'Y'))
            $score2 += $draw + $scissors;
        else
            $score2 += $win + $rock;
    }
}

var_dump($parties);

print($score1 . PHP_EOL);
print($score2);