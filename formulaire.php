<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'enregistrement des agents de santé</title>
</head>
<body>
    <h1>Agent de santé</h1>
    <form action="enregistrement.php" method="post">
        <label for="nomComplet">Nom Complet :</label>
        <input type="text" name="nomComplet" id="nomComplet" required><br><br>

        <label for="date">Date :</label>
        <input type="date" name="date" id="date" required><br><br>

        <label for="tel">Téléphone :</label>
        <input type="tel" name="tel" id="tel" required><br><br>

        <label for="statut">Statut :</label>
        <select name="statut" id="statut">
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

        <input type="submit" value="Enregistrer" style="background-color: green; color: white;">
        <input type="reset" value="Annuler" style="background-color: orange; color: white;">
    </form>
</body>
</html>
<input type="button" class="green" value="Retour" onclick="window.location.href='index.php';">
