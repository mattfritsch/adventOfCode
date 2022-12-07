<?php

include_once('../utils.php');

$backpack = adjustArray(readSpecialFile('day3.txt'));

$mistakes = [];
$mistake = '';

/**
 * Convertir les lettres en nombres
 * @param string $letter
 * @return int
 */
function letterToPriority(string $letter): int
{
    if (IntlChar::isupper($letter))
        return ord($letter) - 38;
    else
        return ord($letter) - 96;
}

/**
 * Fonction pour faire la somme des priorités
 * @param array $array
 * @return int
 */
function sumPriority(array $array): int
{
    return array_sum($array);
}


/**
 * Partie 1 :
 * Calculez la somme des priorités des objets qui sont dans les deux poches du sac à dos
 * le même élément dans les deux poches d'un sac
 * Une poche correspond à la moitié du sac
 */
for ($i = 0; $i < sizeof($backpack); $i++) {
    //Obtenir la moitié de la taille du sac
    $rucksackSize = strlen($backpack[$i]) / 2;
    //Création de la première poche du sac
    $firstRucksack = substr($backpack[$i], 0, $rucksackSize);
    //Création de la seconde poche du sac
    $secondRucksack = substr($backpack[$i], $rucksackSize);

    /**
     * Pour chaque élément de la seconde poche
     * Si la première poche contient l'élément courant de la seconde poche alors on enregistre de quel objet il s'agit
     */
    for ($j = 0; $j < strlen($secondRucksack); $j++) {
        if (str_contains($firstRucksack, $secondRucksack[$j])) {
            $mistake = $secondRucksack[$j];
        }
    }

    //Ajout du doublon dans un tableau de doublon
    $mistakes[] = $mistake;
}

$priorities = [];
/**
 * Pour chaque doublon du tableau de doublon, j'obtiens la priorité du doublon que j'ajoute dans un tableau de priorité
 */
foreach ($mistakes as $mistake) {
    $priorities[] = letterToPriority($mistake);
}

//Somme de la priorité des doublons
var_dump(sumPriority($priorities) . PHP_EOL);

/**
 * Partie 2
 * Calculer la somme des priorités des objets qui sont dans les sacs de chacun des 3 nains
 * Le même élément dans les trois sacs
 */
$mistake2 = '';
$mistakes2 = [];


for ($i = 2; $i < sizeof($backpack); $i += 3) {
    //Création du scc numéro 1
    $firstBackpack = $backpack[$i - 2];
    //Création du scc numéro 2
    $secondBackpack = $backpack[$i - 1];
    //Création du scc numéro 3
    $thirdBackpack = $backpack[$i];


    /**
     * Pour chaque élément du sac numéro 3 je vérifie si un élément du sac est présent dans le sac numéro 2 et numéro 1
     * Si oui, j'enregistre le doublon
     */
    for ($k = 0; $k < strlen($thirdBackpack); $k++) {
        if (str_contains($secondBackpack, $thirdBackpack[$k]) && str_contains($firstBackpack, $thirdBackpack[$k])) {
            $mistake2 = $thirdBackpack[$k];
        }
    }

    //Je mets le doublon dans un tableau de doublon
    $mistakes2[] = $mistake2;
}

//Même fonctionnement que pour la partie 1
$priorities2 = [];
foreach ($mistakes2 as $mistake2) {
    $priorities2[] = letterToPriority($mistake2);
}
//Même fonctionnement que pour la partie 1
var_dump(sumPriority($priorities2) . PHP_EOL);