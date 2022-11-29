<?php
    include('inclusions/entete.inc.php');

    if(isset($_POST['courriel'])) {
        $courriel =  $_POST['courriel'];
        $mdp = hash('sha512', $_POST['mdp']);

        $cnx = mysqli_connect('localhost', 'root', '', 'leila');
        mysqli_set_charset($cnx, 'utf8');
        $reponse = mysqli_query($cnx, "SELECT * FROM utilisateur 
                        WHERE courriel='$courriel' AND mdp='$mdp'");
        $utilisateur = mysqli_fetch_assoc($reponse);
        if($utilisateur) {
            // Enregistrer l'état de la connexion active dans la *SESSION* d'utilisation.
            echo "Vous êtes connecté ...";
        }
        else {
            echo "Mauvaise combinaison courriel/mot de passe";
        }
    }    
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
    </section>
<?php
    include('inclusions/pied2page.inc.php');
?>
