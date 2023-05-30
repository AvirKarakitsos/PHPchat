<main>
    <h2>Welcome <?= $params['pseudo']->pseudo?></h2>  

    <section class="main-part">
    <ul>
        <?php foreach($params['result'] as $user){ 
            if($user->id !== $params['pseudo']->id){?>

            <li> <a href="/users/<?= $user->id?>"> <?= $user->pseudo ?> </a></li>

        <?php } 
        }?>
    </ul>
    </section>

    <button class="btn-logout"><a href="/logout">Déconnexion</a></button>

</main>

<style scoped>
    h2 {
        text-align: center;
    }

    section {
        font-size: 1.5rem;
    }

    section > ul > li > a {
        color: white;
    }

    .btn-logout {
        width:320px;
        margin: 0 auto;
        text-align: center;
    }
</style>