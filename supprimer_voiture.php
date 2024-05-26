<?php
require 'config.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

$voiture_id = $_GET['id'];

$sql = "DELETE FROM Voitures WHERE ID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$voiture_id]);

header('Location: admin_home.php');
exit();
?>