<?php
require_once "../database/connexion.php";

$id = $_GET['id'];

$sql = "DELETE FROM formation WHERE id_formation = :id";

$stmt = $pdo->prepare($sql);

$exec = $stmt->execute([
    ":id" => $id
]);

if ($exec) {
    header("Location: index.php");
    exit;
}