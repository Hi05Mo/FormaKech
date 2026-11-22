
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormaKech - Gestion pédagogique - Gestion pédagogique</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="index.php">
                FormaKech
            </a>
            <span class="text-muted">Espace d'administration</span>
        </div>
    </nav>

    <div class="container py-5">

        <div class="mb-5">
            <h1 class="fw-bold">Tableau de bord</h1>
            <p class="text-muted">
                Gérez les formations, les étudiants et les modules.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold">Formations</h5>
                        <p class="text-muted">
                            Consulter et gérer les formations proposées.
                        </p>
                        <a href="formation/index.php"
                           class="btn btn-success">
                            Accéder
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold">Étudiants</h5>
                        <p class="text-muted">
                            Consulter et gérer les étudiants inscrits.
                        </p>
                        <a href="etudiant/index.php"
                           class="btn btn-success">
                            Accéder
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold">Modules</h5>
                        <p class="text-muted">
                            Consulter et gérer les modules pédagogiques.
                        </p>
                        <a href="module/index.php"
                           class="btn btn-success">
                            Accéder
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="text-center text-muted py-4">
        <small>FormaKech &copy; 2026 - Gestion pédagogique</small>
    </footer>

</body>
</html>
