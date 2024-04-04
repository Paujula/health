<?php

require 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nomComplet = $_POST['nomComplet'];
    $date = $_POST['date'];
    $tel = $_POST['tel'];
    $statut = $_POST['statut'];

    // Vérifier si le statut existe déjà
    $requete = "SELECT idStatut FROM statut WHERE nomStatut = '$statut'";
    $result = $connexion->query($requete);

    if ($result->num_rows > 0) {
        // Le statut existe, récupérer son ID
        $row = $result->fetch_assoc();
        $idStatut = $row['idStatut'];
    } else {
        // Le statut n'existe pas, l'insérer dans la table "statut"
        $requete = "INSERT INTO statut (nomStatut) VALUES ('$statut')";
        if ($connexion->query($requete) === TRUE) {
            $idStatut = $connexion->insert_id; // Récupérer l'ID du statut inséré
        } else {
            die("Erreur lors de l'insertion du statut : " . $connexion->error);
        }
    }

    // Insérer l'agent de santé dans la table "agent"
    $requete = "INSERT INTO agent (nomComplet, date, tel, idStatut) VALUES ('$nomComplet', '$date', '$tel', $idStatut)";
    if ($connexion->query($requete) === TRUE) {
        echo "Agent enregistré avec succès.";
    } else {
        echo "Erreur lors de l'insertion de l'agent de santé : " . $connexion->error;
    }

    // Fermer la connexion à la base de données
    $connexion->close();
} else {
    // Redirection vers formulaire.php en cas d'accès direct
    header("Location: formulaire.php");
    exit;
}
?>
<input type="button" class="green" value="Retour" onclick="window.location.href='formulaire.php';">
