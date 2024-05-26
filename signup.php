<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - LocationVoituresTN</title>
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
            width: 400px; /* Augmente la largeur du formulaire */
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
          <a class="navbar-brand" href="#"><img src="logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.html" style="color: #e50e0e;">Home</a>
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
              <form action="signup_action.php" method="POST">
                  <h4>Inscription</h4>
                  <div class="form-group">
                      <label for="nom">Nom:</label>
                      <input type="text" id="nom" name="nom" required class="input">
                  </div>
                  <div class="form-group">
                      <label for="adresse">Adresse:</label>
                      <textarea id="adresse" name="adresse" required class="input"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="numero_telephone">Numéro de téléphone:</label>
                      <input type="text" id="numero_telephone" name="numero_telephone" required class="input">
                  </div>
                  <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" id="email" name="email" required class="input">
                  </div>
                  <div class="form-group">
                      <label for="password">Mot de passe:</label>
                      <input type="password" id="password" name="password" required class="input">
                  </div>
                  <div class="form-group">
                      <p>Vous avez déjà un compte? <a href="login.php">Se connecter</a></p>
                  </div>
                  <input type="submit" value="S'inscrire" class="submit">
              </form>
          </div>
      </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>
