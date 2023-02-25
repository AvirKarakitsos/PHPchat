
<?php if(isset($_SESSION['error'])){ ?>
    <div>
        <?= $_SESSION['error'];
}?>
    </div>
    
<h2>Créer un compte</h2>

<form method="POST" action="/register">
    <label for="pseudo" ></label>
    <input type="text" name="pseudo" placeholder="Pseudo" autocomplete="off"/>
    <input type="password" name="password" placeholder="Mot de passe" autocomplete="off"/>

    <button type="submit" name="valider">Valider</button>

    <div>
        <p>Déjà un compte?</p>
        <a href="/login">se connecter</a>
    </div>
</form>


<style scoped>
    h2{
        margin: 15px 0;
        text-align: center;
    }
    div{
        text-align: center;
        color: red;
    }
    form{
        width: 300px;
        margin: 0 auto;
        text-align: center;
    }
    input{
        height: 2rem;
        padding: 10px;
        font-size: 1rem;
        display: block;
        margin: 2rem auto;
    }
    button{
        display: block;
        margin: 0 auto 25px auto;
    }
    form > div{
        display: flex;
        justify-content: center;
    }
    p{
        margin-right: 15px;
        color: white;
    }
    a{
        color: black;
    }
</style>