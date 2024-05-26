<?php
require 'config.php';
session_start();

if (!isset($_SESSION['client_id'])) {
    header('Location: login.php');
    exit();
}

$voiture_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    
    $sql = "INSERT INTO Reservations (client_id, voiture_id, date_debut, date_fin) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['client_id'], $voiture_id, $date_debut, $date_fin]);

    header('Location: reservations.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver Voiture</title>
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
        .form-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 400px;
        }
        .form-overlay h4, .form-overlay label, .form-overlay a {
            color: white;
        }
        .form-overlay .btn-light, .form-overlay .submit {
            background-color: #e50e0e;
            border: none;
            color: white;
        }
        .form-overlay .btn-light:hover, .form-overlay .submit:hover {
            background-color: #c00c0c;
        }
        .form-overlay .input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
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

    <!-- Background image with form overlay -->
    <div class="bg-image">
        <div class="form-overlay">
            <h4>Réserver Voiture</h4>
            <form action="reserver_voiture.php?id=<?= $voiture_id ?>" method="POST">
                <div class="form-group">
                    <label for="date_debut">Date de début:</label>
                    <input type="date" id="date_debut" name="date_debut" required class="input">
                </div>
                <div class="form-group">
                    <label for="date_fin">Date de fin:</label>
                    <input type="date" id="date_fin" name="date_fin" required class="input">
                </div>
                <input type="submit" value="Réserver" class="submit">
            </form>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>
