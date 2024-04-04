<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .full-width {
            width: 100vw;
            height: 100vh;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 1;
        }

        .button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 10px;
        }
    </style>
</head>
<body>
    <img src="popo1.jpg" alt="Image Popo1" class="full-width">
    <div class="content">
        <h1>Bienvenue sur notre site</h1>
        <a href="formulaire.php" class="button">Inscrivez-vous</a>
        <a href="liste.php" class="button">Liste des agents</a>
    </div>
</body>
</html>
