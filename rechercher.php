<?php
require 'connexion.php';

if (isset($_GET['statut'])) {
    $statut = $_GET['statut'];

    // Requête pour récupérer les agents avec le statut sélectionné
    $requete = "SELECT * FROM agent WHERE idStatut = (SELECT idStatut FROM statut WHERE nomStatut = '$statut')";
    $result = $connexion->query($requete);

    if ($result->num_rows > 0) {
        echo "<h2>Agents avec le statut : $statut</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Nom Complet</th><th>Date</th><th>Téléphone</th><th>Statut</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nomComplet'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['tel'] . "</td>";
            echo "<td>" . $statut . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Aucun agent avec le statut : $statut";
    }
} else {
    echo "Statut non spécifié.";
}
?>
