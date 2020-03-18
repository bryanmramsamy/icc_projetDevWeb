<?php session_start(); ?>

<?php if (isset($_SESSION['userID']) && isset($_SESSION['userID'])) { ?>
    
    <p>
        Bonjour <?= $_SESSION['userID'] ?>
        <br />
        <a href="index.php?action=disconnect">Déconnection</a>
    </p>

<?php } else { ?>
    
    <form action="index.php?action=connect" method="post">

        <div>
            <label for='input_username'>Pseudonyme : </label>
            <input type='text' id='input_username' name='input_username' />
        </div>

        <div>
            <label for='input_password'>Mot de passe : </label>
            <input type='password' id='input_password' name='input_password' />
        </div>

        <div>
            <input type=submit value="Se connecter" />
        </div>

    </form>

    <?php if($_GET['invalid_credentials'] == true){ ?>
        <p><strong>Pseudonyme ou mot de passe incorrect : Veuillez réessayer</strong></p>
    <?php } ?>
    <p><a href="index.php?action=register">Créer un compte</a></p>

<?php } ?>
