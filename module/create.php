
<?php
require_once "../database/connexion.php";

$sql = "SELECT * FROM formation";
$stmt = $pdo->query($sql);
$formations = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['ajout'])) {

    $libelle = $_POST['libelle_module'];
    $duree = $_POST['duree_module'];
    $id_formation = $_POST['id_formation'];

    $sql = "INSERT INTO module
            (libelle_module, duree_module, id_formation)
            VALUES (:libelle_module, :duree_module, :id_formation)";

    $stmt = $pdo->prepare($sql);

    $exec = $stmt->execute([
        ":libelle_module" => $libelle,
        ":duree_module" => $duree,
        ":id_formation" => $id_formation
    ]);

    if ($exec) {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un module</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h3 class="mb-4">Ajouter un module</h3>

    <form method="POST" action="" style="max-width: 500px;">

        <div class="mb-3">
            <label class="form-label">Libellé module :</label>
            <input type="text" name="libelle_module" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Durée module :</label>
            <input type="number" name="duree_module" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Formation :</label>

            <select name="id_formation" class="form-select">

                <?php foreach ($formations as $formation): ?>

                    <option value="<?= $formation['id_formation'] ?>">
                        <?= htmlspecialchars($formation['libelle_formation']) ?>
                    </option>

                <?php endforeach; ?>

            </select>
        </div>

        <button type="submit" name="ajout" class="btn btn-success">
            Ajouter
        </button>

        <a href="index.php" class="btn btn-secondary">
            Annuler
        </a>

    </form>

</div>

</body>
</html>
