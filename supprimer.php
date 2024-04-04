<!DOCTYPE html>
<html>
<head>
    <title>Supprimer un agent de santé</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        // Récupérer l'ID de l'agent à supprimer
        $idAgent = $_GET['id'];

        echo "<h1>Supprimer l'agent de santé</h1>";
        echo "<p>Voulez-vous vraiment supprimer cet agent ?</p>";

        // Afficher une boîte de dialogue de confirmation en JavaScript
        echo "<script>
            var confirmation = confirm('Voulez-vous vraiment supprimer cet agent ?');
            if (confirmation) {
                // Si l'utilisateur confirme, rediriger vers la suppression réelle
                window.location.href = 'supprimer_confirm.php?id=$idAgent';
            } else {
                // Si l'utilisateur annule, retourner à la liste
                window.location.href = 'liste.php';
            }
        </script>";
    } else {
        // Redirection vers la liste si l'ID de l'agent n'est pas défini
        header("Location: liste.php");
        exit;
    }
    ?>
</body>
</html>
