<main>
    <h2>Welcome <?= $params['pseudo']->pseudo?></h2>  

    <ul class="main-part fs">
        <?php foreach($params['result'] as $user){ 
            if($user->id !== $params['pseudo']->id){?>

            <li> <a class="no-decoration color-white" href="/users/<?= $user->id?>"> <?= $user->pseudo ?> </a></li>

        <?php } 
        }?>
    </ul>

    <button class="btn"><a href="/logout">Déconnexion</a></button>

</main>

<style scoped>
    .fs {
        font-size: 1.5rem;
    }
</style>