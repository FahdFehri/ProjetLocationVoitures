<?php
require 'config.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

$sql = "SELECT * FROM Voitures";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$voitures = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/all.min.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .bg-image {
            background-image: url('https://cdn.wallpapersafari.com/38/64/Yf1aDH.jpg');
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        .content-overlay {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 80%;
        }
        .content-overlay h1, .content-overlay a, .content-overlay p {
            color: white;
        }
        .content-overlay a {
            text-decoration: none;
            color: #e50e0e;
            margin: 5px 0;
            display: inline-block;
        }
        .content-overlay a:hover {
            color: #c00c0c;
        }
        .content-overlay .voiture {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            margin: 10px 0;
            display: flex;
            align-items: center;
        }
        .content-overlay .voiture img {
            max-width: 150px;
            border-radius: 10px;
            margin-right: 20px;
        }
        .content-overlay .voiture p {
            margin: 0;
            color: black;
        }
        .content-overlay .voiture a {
            margin-left: 20px;
            color: #e50e0e;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="logo.png" alt="Logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php" style="color: #e50e0e;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services.html" style="color: #e50e0e;">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html" style="color: #e50e0e;">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html" style="color: #e50e0e;">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <!-- Background image with content overlay -->
    <div class="bg-image">
        <div class="content-overlay">
            <h1>Gestion des Voitures</h1>
            <a href="ajouter_voiture.php" class="btn btn-light">Ajouter une nouvelle voiture</a>
            <div>
                <?php foreach ($voitures as $voiture): ?>
                    <div class="voiture">
                        <img src="<?= $voiture['Image'] ?>" alt="Image de <?= $voiture['Marque'] ?>">
                        <div>
                            <p>Marque: <?= $voiture['Marque'] ?></p>
                            <p>Modèle: <?= $voiture['Modèle'] ?></p>
                            <p>Année: <?= $voiture['Année'] ?></p>
                            <p>Immatriculation: <?= $voiture['Immatriculation'] ?></p>
                        </div>
                        <a href="modifier_voiture.php?id=<?= $voiture['ID'] ?>" class="btn btn-light">Modifier</a>
                        <a href="supprimer_voiture.php?id=<?= $voiture['ID'] ?>" class="btn btn-light">Supprimer</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>
