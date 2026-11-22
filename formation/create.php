
<?php
require_once "../database/connexion.php";

if(isset($_POST['ajout'])){

    $libelle = $_POST['libelle_formation'];
    $prix = $_POST['prix'];
    $duree = $_POST['duree_formation'];

    $sql = "INSERT INTO formation(libelle_formation, prix, duree_formation)
            VALUES(:libelle_formation, :prix, :duree_formation)";

    $res = $pdo->prepare($sql);

    $exec = $res->execute([
        ":libelle_formation" => $libelle,
        ":prix" => $prix,
        ":duree_formation" => $duree
    ]);

    if($exec){
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une formation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h3 class="mb-4">Ajouter une formation</h3>

    <form method="POST" action="" style="max-width: 500px;">

        <div class="mb-3">
            <label class="form-label">Libellé formation :</label>
            <input type="text" name="libelle_formation" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Prix :</label>
            <input type="number" name="prix" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Durée formation :</label>
            <input type="number" name="duree_formation" class="form-control">
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
