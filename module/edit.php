
<?php
require_once "../database/connexion.php";

$id = $_GET['id'];

if (isset($_POST['modifier'])) {

    $libelle = $_POST['libelle_module'];
    $duree = $_POST['duree_module'];
    $id_formation = $_POST['id_formation'];

    $sql = "UPDATE module SET
            libelle_module = :libelle,
            duree_module = :duree,
            id_formation = :id_formation
            WHERE id_module = :id";

    $stmt = $pdo->prepare($sql);

    $exec = $stmt->execute([
        ":libelle" => $libelle,
        ":duree" => $duree,
        ":id_formation" => $id_formation,
        ":id" => $id
    ]);

    if ($exec) {
        header("Location: index.php");
        exit;
    }
}

$sql = "SELECT * FROM module
        WHERE id_module = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([":id" => $id]);

$module = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM formation";
$stmt = $pdo->query($sql);
$formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un module</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h3 class="mb-4">Modifier un module</h3>

    <form method="POST" action="" style="max-width: 500px;">

        <div class="mb-3">
            <label class="form-label">Libellé module :</label>
            <input type="text" name="libelle_module"
                   class="form-control"
                   value="<?= htmlspecialchars($module['libelle_module']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Durée module :</label>
            <input type="number" name="duree_module"
                   class="form-control"
                   value="<?= htmlspecialchars($module['duree_module']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Formation :</label>

            <select name="id_formation" class="form-select">

                <?php foreach ($formations as $formation): ?>

                    <option value="<?= $formation['id_formation'] ?>"
                        <?= ($formation['id_formation'] == $module['id_formation']) ? 'selected' : '' ?>>

                        <?= htmlspecialchars($formation['libelle_formation']) ?>

                    </option>

                <?php endforeach; ?>

            </select>
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
