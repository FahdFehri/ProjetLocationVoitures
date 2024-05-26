<?php
require 'config.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

$voiture_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $immatriculation = $_POST['immatriculation'];
    $disponibilite = isset($_POST['disponibilite']) ? 1 : 0;
    $image = $_FILES['image']['name'];
    $target = "C:/xampp/htdocs/ProjetLocationVoitures/".basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "UPDATE Voitures SET Marque = ?, Modèle = ?, Année = ?, Immatriculation = ?, Image = ?, Disponibilité = ? WHERE ID = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$marque, $modele, $annee, $immatriculation, $image, $disponibilite, $voiture_id]);

        header('Location: admin_home.php');
        exit();
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
} else {
    $sql = "SELECT * FROM Voitures WHERE ID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$voiture_id]);
    $voiture = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Voiture</title>
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
            left: 10%;
            transform: translateY(-50%);
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
        .form-overlay .input, .form-overlay textarea {
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
            <h4>Modifier Voiture</h4>
            <form action="modifier_voiture.php?id=<?= $voiture['ID'] ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="marque">Marque:</label>
                    <input type="text" id="marque" name="marque" value="<?= $voiture['Marque'] ?>" required class="input">
                </div>
                <div class="form-group">
                    <label for="modele">Modèle:</label>
                    <input type="text" id="modele" name="modele" value="<?= $voiture['Modèle'] ?>" required class="input">
                </div>
                <div class="form-group">
                    <label for="annee">Année:</label>
                    <input type="number" id="annee" name="annee" value="<?= $voiture['Année'] ?>" required class="input">
                </div>
                <div class="form-group">
                    <label for="immatriculation">Immatriculation:</label>
                    <input type="text" id="immatriculation" name="immatriculation" value="<?= $voiture['Immatriculation'] ?>" required class="input">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" class="input">
                </div>
                <div class="form-group">
                    <label for="disponibilite">Disponible:</label>
                    <input type="checkbox" id="disponibilite" name="disponibilite" <?= $voiture['Disponibilité'] ? 'checked' : '' ?> class="input">
                </div>
                <input type="submit" value="Modifier" class="submit">
            </form>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>
