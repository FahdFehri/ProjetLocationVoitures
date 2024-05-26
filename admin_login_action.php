<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Admins WHERE Email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['Mot_de_passe'])) {
        $_SESSION['admin_id'] = $admin['ID'];
        header('Location: admin_home.php');
        exit();
    } else {
        echo "Identifiants incorrects.";
    }
}
?>