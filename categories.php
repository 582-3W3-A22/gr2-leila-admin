<?php
    // Gestion de la session
    session_start();

    // Vérifier si on a droit d'afficher cette page
    // Donc : si l'utilisateur n'est pas connecté, il faut le rediriger vers
    // la page de conenxion avec un message approprié
    if(!isset($_SESSION['util-courriel'])) {
        header('Location: index.php?e=4000');
    }

    // Manipulation du contenu dans la BD
    $cnx = mysqli_connect('localhost', 'root', '', 'leila');
    mysqli_set_charset($cnx, 'utf8');
    
    // Opération AJOUT (CREATE/INSERT)
    
    if(isset($_GET['op'])) {
        $operation = $_GET['op'];
        // La conditionnelle suivante peut être remplacée par une instruction 
        // SWITCH/CASE
        // if($operation === 'ajout') {
        //     $nom = $_POST['nom'];
        //     $type = $_POST['type'];
        //     mysqli_query($cnx, "INSERT INTO categorie VALUES (0, '$nom', '$type')");
        // }
        // else if ($operation === 'modification') {
        //     $id = $_POST['id'];
        //     $nom = $_POST['nom'];
        //     $type = $_POST['type'];
        //     mysqli_query($cnx, "UPDATE categorie SET nom='$nom', type='$type' WHERE id=$id");
        // }
        // else if($operation === 'suppression') {
        //     //mysqli_query($cnx, "DELETE ...");
        // }
        switch($operation) {
            case 'ajout': 
                $nom = $_POST['nom'];
                $type = $_POST['type'];
                mysqli_query($cnx, "INSERT INTO categorie VALUES (0, '$nom', '$type')");
                break;
            case 'modification': 
                $id = $_POST['id'];
                $nom = $_POST['nom'];
                $type = $_POST['type'];
                mysqli_query($cnx, "UPDATE categorie SET nom='$nom', type='$type' WHERE id=$id");
                break;
        }
    }

    // Opération LECTURE (READ/SELECT)
    // On obtient un jeu d'enregistrements contenant tous les éléments de la BD
    $resultat = mysqli_query($cnx, "SELECT *  FROM categorie ORDER BY `type`, id");

    $page = 'categories';
    include('inclusions/entete.inc.php');
?>
    <section class="liste-enregistrements">
        <h2><code>Catégories</code></h2>
        <header>
            <span>id</span>
            <span>nom</span>
            <span>type</span>
            <span class="action"></span>
        </header>
        <div class="data">
            <!-- Formulaire pour ajout d'un élément dans la BD (INSERT) -->
            <form class="nouveau" action="?op=ajout" method="post">
                <span></span>
                <span><input type="text" name="nom" value=""></span>
                <span>
                    <select name="type">
                        <option value="plat">Plat</option>
                        <option value="vin">Vin</option>
                    </select>
                </span>
                <span class="action">
                    <button type="submit" class="btn btn-ajouter btn-plein">ajouter</button>
                </span>
            </form>

            <!-- 
                Gabarit de formulaire pour affichage/modification/suppression 
                d'un élément de la BD.
            -->
            <?php
                while($enreg = mysqli_fetch_assoc($resultat)) :
                    //print_r($enreg); // Pour débogage
            ?>
                <form method="post">
                    <span><input readonly type="text" name="id" value="<?= $enreg['id']; ?>"></span>
                    <span><input type="text" name="nom" value="<?= $enreg['nom']; ?>"></span>
                    <span>
                        <select name="type">
                            <option <?= ($enreg['type']==='plat') ? 'selected' : '' ?> value="plat">Plat</option>
                            <option <?= ($enreg['type']==='vin') ? 'selected' : '' ?> value="vin">Vin</option>
                        </select>
                    </span>
                    <span class="action">
                        <button type="submit" formaction="?op=modification" class="btn btn-modifier">modifier</button>
                        <button type="submit" formaction="?op=suppression" class="btn btn-supprimer">supprimer</button>
                    </span>
                </form>
            <?php endwhile; ?>
        </div>
    </section>
<?php
    include('inclusions/pied2page.inc.php');
?>
