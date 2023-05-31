<main>
    <h2>Welcome <?= $params['pseudo']->pseudo?></h2>  

    <ul class="main-part list">
        <?php foreach($params['result'] as $user){ 
            if($user->id !== $params['pseudo']->id){?>

            <li><a class="color-white" href="/users/<?= $user->id?>"> <?= $user->pseudo ?> </a></li>

        <?php } 
        }?>
    </ul>

    <button class="btn"><a class="no-decoration color-white" href="/logout">Déconnexion</a></button>

</main>

<style scoped>
    .list {
        display: flex;
        flex-direction: column;
        row-gap: 10px;
        font-size: 1.3rem;
    }
</style>