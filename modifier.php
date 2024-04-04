<!DOCTYPE html>
<html>
<head>
    <title>Modifier Agent de Santé</title>
</head>
<body>
    <h1>Modifier Agent de Santé</h1>
    <?php
   require'connexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $idAgent = $_POST['idAgent'];
        $nomComplet = $_POST['nomComplet'];
        $date = $_POST['date'];
        $tel = $_POST['tel'];
        $statut = $_POST['statut'];

        // Mettre à jour l'enregistrement dans la base de données
        $requete = "UPDATE agent
                    SET nomComplet = '$nomComplet', date = '$date', tel = '$tel', idStatut = '$statut'
                    WHERE idAgent = $idAgent";
        if ($connexion->query($requete) === TRUE) {
            echo "Enregistrement mis à jour avec succès. <a href='liste.php'>Retour à la liste</a>";
        } else {
            echo "Erreur lors de la mise à jour : " . $connexion->error;
        }
    } else {
        // Récupérer l'ID de l'agent à partir de la requête GET
        $idAgent = $_GET['id'];

        // Sélectionner les informations de l'agent à modifier
        $requete = "SELECT agent.idAgent, agent.nomComplet, agent.date, agent.tel, agent.idStatut, statut.nomStatut 
                    FROM agent
                    INNER JOIN statut ON agent.idStatut = statut.idStatut
                    WHERE agent.idAgent = $idAgent";
        $resultat = $connexion->query($requete);

        if ($resultat->num_rows > 0) {
            $row = $resultat->fetch_assoc();
            $idAgent = $row['idAgent'];
            $nomComplet = $row['nomComplet'];
            $date = $row['date'];
            $tel = $row['tel'];
            $idStatut = $row['idStatut'];
            $nomStatut = $row['nomStatut'];
        } else {
            echo "Aucun enregistrement trouvé avec cet ID.";
            exit;
        }
        ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="idAgent" value="<?php echo $idAgent; ?>">
            <label for="nomComplet">Nom Complet :</label>
            <input type="text" name="nomComplet" value="<?php echo $nomComplet; ?>" required><br><br>

            <label for="date">Date :</label>
            <input type="date" name="date" value="<?php echo $date; ?>" required><br><br>

            <label for="tel">Téléphone :</label>
            <input type="tel" name="tel" value="<?php echo $tel; ?>" required><br><br>

            <label for="statut">Statut :</label>
            <select name="statut">
                <option value="<?php echo $idStatut; ?>"><?php echo $nomStatut; ?></option>
                <option value="infirmier">Infirmier</option>
            <option value="infirmière">Infirmière</option>
            <option value="stagiaire">Stagiaire</option>
            <option value="docteur">Docteur</option>
            <option value="major">Major</option>
            <option value="pediatre">Pédiatre</option>
            <option value="gynocologue">Gynécologue</option>
            <option value="analyste">Analyste</option>
            <option value="pharmacien">Pharmacien</option>
            <option value="sageFemme">Sage-femme</option>
            </select><br><br>

            <input type="submit" value="Enregistrer">
        </form>
        <?php
    }

   
    $connexion->close();
    ?>


</body>
</html>
