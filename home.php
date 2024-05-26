<?php
require 'config.php';
session_start();

if (!isset($_SESSION['client_id'])) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM Voitures WHERE Disponibilité = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$voitures = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - LocationVoituresTN</title>
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
            font-family: 'Roboto', sans-serif;
        }
        .bg-image {
            background-image: url('https://cdn.wallpapersafari.com/38/64/Yf1aDH.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            margin: 30px auto;
            color: white;
        }
        .navbar-nav .nav-link {
            color: #e50e0e;
        }
        .car-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }
        .car-card img {
            width: 100%;
            border-radius: 10px;
        }
        .car-card p, .car-card a {
            color: #333;
        }
        .car-card a {
            background-color: #e50e0e;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .car-card a:hover {
            background-color: #c00c0c;
        }
        .form-inline {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.5);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .form-inline label, .form-inline input, .form-inline button {
            margin: 5px;
            color: white;
        }
        .form-inline input, .form-inline button {
            border-radius: 5px;
            border: none;
            padding: 10px;
        }
        .form-inline button {
            background-color: #e50e0e;
            color: white;
        }
        .form-inline button:hover {
            background-color: #c00c0c;
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

    <div class="bg-image">
        <div class="container">
            <h1>Voitures Disponibles</h1>
            <form action="recherche_voiture_action.php" method="POST" class="form-inline">
                <label for="date_debut">Date de début:</label>
                <input type="date" id="date_debut" name="date_debut" required class="input">
                <label for="date_fin">Date de fin:</label>
                <input type="date" id="date_fin" name="date_fin" required class="input">
                <button type="submit" class="btn">Rechercher</button>
            </form>
            <div class="row">
                <?php foreach ($voitures as $voiture): ?>
                    <div class="col-md-4">
                        <div class="car-card">
                        <img src="<?= $voiture['Image'] ?>" alt="Image de <?= $voiture['Marque'] ?>">
                            <p>Marque: <?= $voiture['Marque'] ?></p>
                            <p>Modèle: <?= $voiture['Modèle'] ?></p>
                            <p>Année: <?= $voiture['Année'] ?></p>
                            <p>Immatriculation: <?= $voiture['Immatriculation'] ?></p>
                            <a href="reserver_voiture.php?id=<?= $voiture['ID'] ?>">Réserver</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>
