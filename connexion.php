<?php
$host = "localhost";  
$utilisateur = "root"; 
$motDePasse = ""; 
$baseDeDonnees = "sante"; 

$connexion = new mysqli($host, $utilisateur, $motDePasse, $baseDeDonnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}
?>
