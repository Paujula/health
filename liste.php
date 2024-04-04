<!DOCTYPE html>
<html>
<head>
    <title>Liste des agents de santé</title>
</head>
<body>

    <?php
   require'connexion.php';
   include 'formulaire.php';

    // Requête pour récupérer les informations des agents
    $requete = "SELECT agent.idAgent, agent.nomComplet, agent.date, agent.tel, statut.nomStatut FROM agent
                INNER JOIN statut ON agent.idStatut = statut.idStatut";
    $resultat = $connexion->query($requete);

    if ($resultat->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Nom complet</th><th>Date</th><th>Téléphone</th><th>Statut</th><th>Actions</th></tr>";
        while ($row = $resultat->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nomComplet'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['tel'] . "</td>";
            echo "<td>" . $row['nomStatut'] . "</td>";
            echo "<td><a href='modifier.php?id=" . $row['idAgent'] . "'>Modifier</a> | <a href='supprimer.php?id=" . $row['idAgent'] . "'>Supprimer</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun enregistrement trouvé.";
    }

    // Fermer la connexion à la base de données
    $connexion->close();
    ?>
</body>
</html>
<input type="button" class="green" value="Retour" onclick="window.location.href='index.php';">

