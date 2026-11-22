
<?php
require_once "../database/connexion.php";

$id = $_GET['id'];

if(isset($_POST['modifier'])){

    $libelle_formation = $_POST['libelle_formation'];
    $prix = $_POST['prix'];
    $duree_formation = $_POST['duree_formation'];

    $sql = "UPDATE formation SET
    libelle_formation = :libelle_formation,
    prix = :prix,
    duree_formation = :duree_formation
    WHERE id_formation = :id";

    $stmt = $pdo->prepare($sql);

    $exec = $stmt->execute([
        ":libelle_formation" => $libelle_formation,
        ":prix" => $prix,
        ":duree_formation" => $duree_formation,
        ":id" => $id
    ]);

    if ($exec) {
        header("Location: index.php");
        exit;
    }
}

$sql = "SELECT * FROM formation WHERE id_formation = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

$formation = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une formation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h3 class="mb-4">Modifier une formation</h3>

    <form method="POST" action="" style="max-width: 500px;">

        <div class="mb-3">
            <label class="form-label">Libellé formation :</label>
            <input type="text" name="libelle_formation"
                   class="form-control"
                   value="<?= htmlspecialchars($formation['libelle_formation']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Prix :</label>
            <input type="number" name="prix"
                   class="form-control"
                   value="<?= htmlspecialchars($formation['prix']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Durée formation :</label>
            <input type="number" name="duree_formation"
                   class="form-control"
                   value="<?= htmlspecialchars($formation['duree_formation']) ?>">
        </div>

        <button type="submit" name="modifier" class="btn btn-success">
            Modifier
        </button>

        <a href="index.php" class="btn btn-secondary">
            Annuler
        </a>

    </form>

</div>

</body>
</html>
