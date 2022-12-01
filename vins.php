<?php
    // Gestion de la session
    session_start();

    // Vérifier si on a droit d'afficher cette page
    // Donc : si l'utilisateur n'est pas connecté, il faut le rediriger vers
    // la page de conenxion avec un message approprié
    if(!isset($_SESSION['util-courriel'])) {
        header('Location: index.php?e=4000');
    }

    $page = 'vins';
    include('inclusions/entete.inc.php');
?>
    <section class="liste-enregistrements">
        <h2><code>Vins</code></h2>
        <header>
            <span>id</span>
            <span>nom</span>
            <span>type</span>
            <span class="action"></span>
        </header>
        <div class="data">
            <article class="nouveau">
                <span></span>
                <span><input type="text" name="cat_nom" value=""></span>
                <span>
                    <select name="cat_type" id="cat_type">
                        <option value="">Choisir</option>
                        <option value="plat">Plat</option>
                        <option value="plat">Vin</option>
                    </select>
                </span>
                <span class="action">
                    <button class="btn btn-ajouter btn-plein">ajouter</button>
                </span>
            </article>
            <article>
                <span>1</span>
                <span><input type="text" name="cat_nom" value="Entrées"></span>
                <span>
                    <select name="cat_type" id="cat_type">
                        <option value="plat">Plat</option>
                        <option value="plat">Vin</option>
                    </select>
                </span>
                <span class="action">
                    <button class="btn btn-modifier">modifier</button>
                    <button class="btn btn-supprimer">supprimer</button>
                </span>
            </article>
            <article>
                <span>2</span>
                <span><input type="text" name="cat_nom" value="Rouge"></span>
                <span>
                    <select name="cat_type" id="cat_type">
                        <option value="plat">Plat</option>
                        <option value="plat" selected>Vin</option>
                    </select>
                </span>
                <span class="action">
                    <button class="btn btn-modifier">modifier</button>
                    <button class="btn btn-supprimer">supprimer</button>
                </span>
            </article>
        </div>
    </section>
<?php
    include('inclusions/pied2page.inc.php');
?>
