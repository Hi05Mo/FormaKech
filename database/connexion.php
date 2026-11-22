
<?php
$host = "localhost";
$dbname = "tp7_crud";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $username,
        $password
    );

    // echo "Connexion a $dbname reussie";

} catch (PDOException $e) {
    die("Erreur: " . $e->getMessage());
}
?>
