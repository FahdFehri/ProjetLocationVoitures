<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Clients WHERE Email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $client = $stmt->fetch();

    if ($client && password_verify($password, $client['Mot_de_passe'])) {
        $_SESSION['client_id'] = $client['ID'];
        header('Location: home.php');
        exit();
    } else {
        echo "Identifiants incorrects.";
    }
}
?>