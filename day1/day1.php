<?php

require_once('../utils.php');
/**
 * Le but de cet exercice est d'avoir la somme des calories mangées par chaque elf
 * Partie 1 : Avoir le nombre total maximum de calorie ingurgité par un des elfs
 * Partie 2 : Avoir la somme des trois plus gros mangeurs de calorie
 *
 * Réussi : nombre d'étoiles -> 2
 */
//Lecture du fichier
$file = readSpecialFile('day1.txt');
//Conversion de $file qui est de type Array en une chaîne de type String
$file = implode(PHP_EOL, $file);
//Explode de la chaîne pour avoir les calories ingurgitées par chaque elf dans un élément de la liste $detailsOfCalories
$detailsOfCalories = explode(PHP_EOL . PHP_EOL . PHP_EOL, $file);
//Création d'un tableau vide
$sumOfCalories = [];
/**
 * Pour chaque élément de la liste $detailsOfCalories je calcule la somme de total de calorie ingurgité par chaque elf.
 * Je push ensuite la somme dans la liste $sumOfCalories pour avoir un tableau des sommes total des calories.
 */
for($i = 0; $i < sizeof($detailsOfCalories); $i++) {
    array_push($sumOfCalories, array_sum(explode(PHP_EOL, $detailsOfCalories[$i])));
}

//Tri par ordre décroissant pour avoir en tête de liste le nombre de calorie le plus élevé
rsort($sumOfCalories, SORT_NUMERIC);

print_r($sumOfCalories);

//Partie 2
$topThree = 0;
//Pour les trois premiers éléments de la liste, je les additionne entre eux afin d'avoir le résultat recherché
for($i = 0; $i < 3; $i++) {
    $topThree += array_sum(explode(PHP_EOL, $sumOfCalories[$i]));
}
print($topThree);