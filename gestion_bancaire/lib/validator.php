<?php
/**
 * &$arrayErrors: tableau d'erreurs en donnees resultat
 * $valeur: la valeur a tester
 * $key: la cles dans le tableau d'erreur
 */
function valide_champs($valeur, $key, &$arrayErrors,$msg="Champs obligatoire") {
    if (empty($valeur)) { // teste si la valeur est vide ou pas
        $arrayErrors[$key] = $msg;
    }
}
function addError( $key, &$arrayErrors,$msg="erreur"){
    $arrayErrors[$key]=$msg;
}