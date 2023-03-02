
<header>
    <h2>Compte : <?= $params['result']['user1']->pseudo ?></h2>
    <h3><?= "à ".$params['result']['user2']->pseudo;?></h3>
</header>

<section id="mess">
<?php if(!empty($params['result']['messages'])){
    foreach($params['result']['messages'] as $message){

        $toggle = $message->id_auteur === $params['result']['user1']->id ? "auteur" : "destin";?> 

        <div class=<?= $toggle; ?>>
            <p class="para1"><?= $message->texte;?></p>
            <p class="para2"><?= date('F j',strtotime($message->created_at))." at ".date('H:i',strtotime($message->created_at));?></p>
        </div>
    <?php
    }
}else{
    ?>
        <h3>
            <?= "pas de messages";?>
        </h3>
    <?php
}
?>
</section>

<div class="end">
    <form method="POST" action="/store">
        <textarea name="message" class="area" placeholder="New message..." required></textarea>
        <button type="submit" name="envoyer">
            <i class="fas fa-chevron-circle-right send"></i>
        </button> 
    </form>

    <button><a href="/logout">Deconnexion</a></button>        
    <button><a href="/users">Retour</a></button>
</div>

<script>
    const message = document.getElementById('mess');
    let compteur = 0;

    setInterval(load_chat, 1000);
    function load_chat(){
        if(compteur !== message.childNodes.length){
            message.scrollTop = message.scrollHeight;
            compteur = message.childNodes.length;
        }

        $('#mess').load(`/userslive`)

    } 
</script>

<style scoped>
    
#mess{
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
.auteur, .destin{
    max-width: 55%;
}
.auteur{
    align-self: flex-end;
}
.para1{
    border-radius: 10px 10px 0 10px;
    padding: 8px;
    margin: 3px 0;
    font-size: 14px;
    color: white;
}
.para2{
    font-size: 11px;
    color: white;
}
.auteur .para2{
    text-align: right;
}
.auteur .para1{
    background-color: rgb(97, 190, 233);
}
.destin .para1{
    background-color: rgb(150, 150, 150);
}

.end{
    width: 350px;
    margin: 0 auto;
    text-align: center;
}
form{
    display: flex;
    justify-content: space-around;
}
form > button{
    background: transparent;
}

.area{
    width:250px; 
    height:50;
    padding: 10px;
    background-color: rgb(50, 50, 50);
    border:2px solid rgb(97, 190, 233);
    border-radius: 15px;
    font-size: 14px;
    color: white;
}
.send{
    font-size: 30px;
    color: rgb(97, 190, 233);
    cursor: pointer;
}
div > button{
    margin: 10px 5px;
}

</style>