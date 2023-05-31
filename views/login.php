
<main class="rg-25">
    <h2>Se connecter</h2>

    <form class="flex-column home-form rg-25" method="POST" action="/users">
        <input type="text" name="pseudo" placeholder="Pseudo" autocomplete="off"/>
        <input type="password" name="password" placeholder="Mot de passe" autocomplete="off"/>

        <button class="btn color-white" type="submit" name="valider">Valider</button>
    </form>

    <?php if(isset($_SESSION['error'])){ ?>
        <p class="error">
            <?= $_SESSION['error'];
    }?>
        </p>
    
    <div class="flex-row cg-15 flex-center">
        <p>Pas de compte?</p>
        <a class="color-white" href="/register">s'enregistrer</a>
    </div>
</main>