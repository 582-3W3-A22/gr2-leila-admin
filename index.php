<?php
    include('inclusions/entete.inc.php');
?>
    <section class="gestion-utilisateur">
        <form class="connexion">
            <legend>Ouvrir une connexion</legend>
            <div class="champs">
                <label for="uti_courriel">Courriel</label>
                <input type="email" name="uti_courriel" id="uti_courriel" placeholder="Adresse de courriel">
            </div>
            <div class="champs">
                <label for="uti_mdp">Mot de passe</label>
                <input type="password" name="uti_mdp" id="uti_mdp" placeholder="Mot de passe">
            </div>
            <input class="btn btn-connexion" type="submit" value="Connexion">
        </form>
    </section>
<?php
    include('inclusions/pied2page.inc.php');
?>
