<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Récupérer l'ID de l'agent à supprimer
    $idAgent = $_GET['id'];
    
    require'connexion.php';

    // Supprimer l'enregistrement de l'agent dans la base de données
    $requete = "DELETE FROM agent WHERE idAgent = $idAgent";
    if ($connexion->query($requete) === TRUE) {
        // Redirection vers la liste après la suppression
        header("Location: liste.php");
        exit;
    } else {
        echo "Erreur lors de la suppression : " . $connexion->error;
    }

    // Fermer la connexion à la base de données
    $connexion->close();
} else {
    // Redirection vers la liste si l'ID de l'agent n'est pas défini
    header("Location: liste.php");
    exit;
}
?>
