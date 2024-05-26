<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];

    $sql = "SELECT * FROM Voitures WHERE Disponibilité = 1 AND ID NOT IN (
                SELECT Voiture_ID FROM Reservations WHERE 
                (Date_debut BETWEEN ? AND ?) OR
                (Date_fin BETWEEN ? AND ?) OR
                (? BETWEEN Date_debut AND Date_fin) OR
                (? BETWEEN Date_debut AND Date_fin)
            )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$date_debut, $date_fin, $date_debut, $date_fin, $date_debut, $date_fin]);
    $voitures = $stmt->fetchAll();

    // Afficher les résultats de la recherche
    include 'home.php';
}
?>