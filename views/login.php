
<main class="home-page">
    <h2>Se connecter</h2>

    <form class="home-form" method="POST" action="/users">
        <input type="text" name="pseudo" placeholder="Pseudo" autocomplete="off"/>
        <input type="password" name="password" placeholder="Mot de passe" autocomplete="off"/>

        <button class="btn color-white" type="submit" name="valider">Valider</button>
    </form>

    <?php if(isset($_SESSION['error'])){ ?>
        <div class="error">
            <?= $_SESSION['error'];
    }?>
        </div>
    
    <div class="register">
        <p>Pas de compte?</p>
        <a class="color-white" href="/register">s'enregistrer</a>
    </div>
</main>