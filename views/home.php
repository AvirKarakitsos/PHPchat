<header>
    <h1>Welcome <?= $params['pseudo']->pseudo?> </h1>  
</header>

<section>
    <ul>
        <?php foreach($params['result'] as $user){ 
            if($user->id !== $params['pseudo']->id){?>

            <li> <a href="/users/<?= $user->id?>"> <?= $user->pseudo ?> </a></li>

        <?php } 
        }?>
    </ul>
</section>

<div>
    <button><a href="/logout">Déconnexion</a></button>
</div>

<style scoped>
    section{
        font-size: 1.5rem;
    }
    section > ul > li > a{
        color: white;
    }
    div{
        width:320px;
        margin: 0 auto;
        text-align: center;
    }
</style>