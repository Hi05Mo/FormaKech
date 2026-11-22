
<?php
require_once "../database/connexion.php";

$sql = "SELECT etudiant.numero_etudiant, etudiant.nom, formation.libelle_formation
        FROM etudiant
        JOIN formation
        ON etudiant.id_formation = formation.id_formation";

$stmt = $pdo->query($sql);
$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formaKech - Étudiants</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="../index.php">
                formaKech
            </a>
            <span class="text-muted">Gestion pédagogique</span>
        </div>
    </nav>

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Liste des étudiants</h2>
                <p class="text-muted">Consulter et gérer les étudiants inscrits.</p>
            </div>

            <a href="create.php" class="btn btn-success">
                + Ajouter un étudiant
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Numéro étudiant</th>
                                <th>Nom</th>
                                <th>Formation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($etudiants as $etudiant): ?>

                                <tr>
                                    <td>
                                        <?= htmlspecialchars($etudiant['numero_etudiant']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($etudiant['nom']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($etudiant['libelle_formation']) ?>
                                    </td>

                                    <td>
                                        <a href="edit.php?id=<?= $etudiant['numero_etudiant'] ?>"
                                           class="btn btn-sm btn-outline-success">
                                            Modifier
                                        </a>

                                        <a href="delete.php?id=<?= $etudiant['numero_etudiant'] ?>"
                                           class="btn btn-sm btn-outline-danger"
                                           onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">
                                            Supprimer
                                        </a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>

        <div class="mt-4">
            <a href="../index.php" class="text-decoration-none text-muted">
                ← Retour au tableau de bord
            </a>
        </div>

    </div>

</body>
</html>
