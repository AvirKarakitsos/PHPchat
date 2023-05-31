
<main class="rg-25">  
    <h2 class="subtitle">Créer un compte</h2>

    <form class="flex-column home-form rg-25" method="POST" action="/register">
        <input type="text" name="pseudo" placeholder="Pseudo" autocomplete="off"/>
        <input type="password" name="password" placeholder="Mot de passe" autocomplete="off"/>

        <button class="btn color-white" type="submit" name="valider">Valider</button>
    </form>
    
    <?php if(isset($_SESSION['error'])){ ?>
        <p>
            <?= $_SESSION['error'];
    }?>
        </p>
    
    <div class="flex-row cg-15 flex-center">
        <p>Déjà un compte?</p>
        <a class="color-white" href="/login">se connecter</a>
    </div>
</main>