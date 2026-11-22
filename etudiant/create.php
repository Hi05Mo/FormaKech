
<?php
require_once "../database/connexion.php";

$sql = "SELECT * FROM formation";
$stmt = $pdo->query($sql);
$formations = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['ajout'])) {

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $id_formation = $_POST['id_formation'];

    $sql = "INSERT INTO etudiant (nom, e_mail, id_formation)
            VALUES (:nom, :email, :id_formation)";

    $stmt = $pdo->prepare($sql);

    $exec = $stmt->execute([
        ":nom" => $nom,
        ":email" => $email,
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
    <title>Ajouter un étudiant</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h3 class="mb-4">Ajouter un étudiant</h3>

    <form method="POST" action="" style="max-width: 500px;">

        <div class="mb-3">
            <label class="form-label">Nom :</label>
            <input type="text" name="nom" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email :</label>
            <input type="email" name="email" class="form-control">
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
