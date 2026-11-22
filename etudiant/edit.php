
<?php
require_once "../database/connexion.php";

$id = $_GET['id'];

if(isset($_POST['modifier'])){

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $id_formation = $_POST['id_formation'];

    $sql = "UPDATE etudiant SET
    nom = :nom, e_mail = :email, id_formation = :id_formation
    WHERE numero_etudiant = :id";

    $stmt = $pdo->prepare($sql);

    $exec = $stmt->execute([
        ":nom" => $nom,
        ":email" => $email,
        ":id_formation" => $id_formation,
        ":id" => $id
    ]);

    if($exec){
        header("Location: index.php");
        exit;
    }
}

$sql = "SELECT * FROM etudiant
        WHERE numero_etudiant = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([":id" => $id]);

$etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM formation";
$stmt = $pdo->query($sql);

$formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h3 class="mb-4">Modifier un étudiant</h3>

    <form method="POST" action="" style="max-width: 500px;">

        <div class="mb-3">
            <label class="form-label">Nom :</label>
            <input type="text" name="nom"
                   class="form-control"
                   value="<?= htmlspecialchars($etudiant['nom']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Email :</label>
            <input type="email" name="email"
                   class="form-control"
                   value="<?= htmlspecialchars($etudiant['e_mail']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Formation :</label>

            <select name="id_formation" class="form-select">

                <?php foreach ($formations as $formation): ?>

                    <option value="<?= $formation['id_formation'] ?>"
                        <?= ($formation['id_formation'] == $etudiant['id_formation']) ? 'selected' : '' ?>>

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
