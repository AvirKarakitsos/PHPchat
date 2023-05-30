
<div>
    <h2>Compte : <?= $params['result']['user1']->pseudo ?></h2>
    <h3><?= "à ".$params['result']['user2']->pseudo;?></h3>
</div>

<section class="main-part" id="messages">
<?php if(!empty($params['result']['messages'])){
    foreach($params['result']['messages'] as $message){

        $toggle = $message->id_auteur === $params['result']['user1']->id ? "author" : "recipient";?> 

        <div class=<?= $toggle; ?>>
            <p class="message-part"><?= $message->texte;?></p>
            <p class="date-part"><?= date('F j',strtotime($message->created_at))." at ".date('H:i',strtotime($message->created_at));?></p>
        </div>
    <?php
    }
}else{
    ?>
        <p>
            <?= "pas de messages";?>
        </p>
    <?php
}
?>
</section>

<div class="form-send">
    <form class="form" method="POST" action="/store">
        <textarea name="message" class="area" placeholder="New message..." required></textarea>
        <button type="submit" name="envoyer">
            <i class="fas fa-chevron-circle-right send"></i>
        </button> 
    </form>

    <button class="btn"><a href="/logout">Deconnexion</a></button>        
    <button class="btn"><a href="/users">Retour</a></button>
</div>

<script>
    const message = document.getElementById('messages');
    let compteur = 0;

    setInterval(load_chat, 1000);
    function load_chat(){
        if(compteur !== message.childNodes.length){
            message.scrollTop = message.scrollHeight;
            compteur = message.childNodes.length;
        }

        $('#messages').load(`/userslive`)

    } 
</script>

<style scoped>
    
#messages{
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
.author, .recipient{
    max-width: 55%;
}
.author{
    align-self: flex-end;
}
.message-part{
    border-radius: 10px 10px 0 10px;
    padding: 8px;
    margin: 3px 0;
    font-size: 14px;
    color: white;
}
.date-part{
    font-size: 11px;
    color: white;
}
.author .date-part{
    text-align: right;
}
.author .message-part{
    background-color: rgb(97, 190, 233);
}
.recipient .message-part{
    background-color: rgb(150, 150, 150);
}

.form-send {
    width: 350px;
    margin: 0 auto;
    text-align: center;
}
.form {
    display: flex;
    justify-content: space-around;
}
.form > button {
    background: transparent;
}

.area {
    width:250px; 
    height:50;
    padding: 10px;
    background-color: rgb(50, 50, 50);
    border:2px solid rgb(97, 190, 233);
    border-radius: 15px;
    font-size: 14px;
    color: white;
}
.send {
    font-size: 30px;
    color: rgb(97, 190, 233);
    cursor: pointer;
}
.btn {
    margin: 10px 5px;
}

</style>