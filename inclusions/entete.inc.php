<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;900&family=Roboto:wght@400;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ressources/css/leila-admin.css">
    <link rel="icon" type="image/png" href="ressources/images/favicon.png" />
    <title>Admin :: Restaurant Leila</title>
</head>
<body>
    <header>
        <h2>Admin - Restaurant Leila</h2>
        <nav class="navigation-principale">
            <ul>
                <li class="<?= ($page === 'categories') ? 'actif' : ''; ?>"><a href="categories.php">Catégories</a></li>
                <li class="<?= ($page === 'plats') ? 'actif' : ''; ?>"><a href="plats.php">Plats</a></li>
                <li class="<?= ($page === 'vins') ? 'actif' : ''; ?>"><a href="vins.php">Vins</a></li>
            </ul>
            <?php if(isset($_SESSION['util-courriel'])) : ?>
                <div class="profile-connexion">
                    <?= $_SESSION['util-courriel']['nom_complet'] ?>
                    <a href="index.php?action=deconnexion&e=3000" class="btn btn-supprimer">Déconnexion</a>
                </div>
            <?php endif; ?>
        </nav>
    </header>