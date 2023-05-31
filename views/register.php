
<main class="home-page">  
    <h2 class="subtitle">Créer un compte</h2>

    <form class="home-form" method="POST" action="/register">
        <input type="text" name="pseudo" placeholder="Pseudo" autocomplete="off"/>
        <input type="password" name="password" placeholder="Mot de passe" autocomplete="off"/>

        <button class="btn color-white" type="submit" name="valider">Valider</button>
    </form>
    
    <?php if(isset($_SESSION['error'])){ ?>
        <div>
            <?= $_SESSION['error'];
    }?>
        </div>
    
    <div class="register">
        <p>Déjà un compte?</p>
        <a class="color-white" href="/login">se connecter</a>
    </div>
</main>