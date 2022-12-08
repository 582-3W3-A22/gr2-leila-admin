<?php
    // Gestion de la session
    session_start();

    $codesErreurs = [
        '1000'  =>  'Mauvaise combinaison courriel/mot de passe',
        '2000'  =>  'Votre compte est inactif (communiquez avec un administrateur',
        '3000'  =>  'Votre session est déconnectée',
        '4000'  =>  'Vous devez vous connecter pour accéder à cette page'
    ];

    // Gérer les erreurs
    if(isset($_GET['e'])) {
        $erreur = $codesErreurs[$_GET['e']];
    }

    // Connexion
    if(isset($_POST['courriel'])) {
        $courriel =  $_POST['courriel'];
        $mdp = hash('sha512', $_POST['mdp']);

        $cnx = mysqli_connect('localhost', 'root', '', 'leila');
        mysqli_set_charset($cnx, 'utf8');
        $reponse = mysqli_query($cnx, "SELECT nom_complet,courriel,actif FROM utilisateur 
                        WHERE 
                            courriel='$courriel' 
                            AND mdp='$mdp'");
        $utilisateur = mysqli_fetch_assoc($reponse);
        if($utilisateur) {
            if($utilisateur['actif']) {
                // Enregistrer l'état de la connexion active dans la *SESSION* d'utilisation.
                //echo "Vous êtes connecté ...";
                // On stocke l'état de la connexion dans la SESSION d'utilisation
                $_SESSION['util-courriel'] = $utilisateur;

                // Rediriger le browser vers la page categories.php
                // Envoyer une entête HTTP dans la réponse pour redirection
                header('Location: categories.php');
            }
            else {
                $erreur = $codesErreurs['2000'];
            }
        }
        else {
            $erreur = $codesErreurs['1000'];
        }
    }

    // Déconnexion
    if(isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
        // Détruire la variable de session.
        unset($_SESSION['util-courriel']);
    }

    include('inclusions/entete.inc.php');
?>
    <section class="gestion-utilisateur">
        <form class="connexion" method="POST">
            <legend>Ouvrir une connexion</legend>
            <div class="champs">
                <label for="courriel">Courriel</label>
                <input type="email" name="courriel" id="courriel" placeholder="Adresse de courriel">
            </div>
            <div class="champs">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
            </div>
            <input class="btn btn-connexion" type="submit" value="Connexion">
        </form>
        <?php if(isset($erreur)) : ?>
            <p class="toast toast-info"><?= $erreur; ?></p>
        <?php endif; ?>
    </section>
<?php
    include('inclusions/pied2page.inc.php');
?>
