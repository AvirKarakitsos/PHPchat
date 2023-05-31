
<main class="rg-25">

    <h2>Compte : <?= $params['result']['user1']->pseudo." à ".$params['result']['user2']->pseudo;?></h2>

    <section class="flex-column main-part" id="messages">
    <?php if(!empty($params['result']['messages'])){
            foreach($params['result']['messages'] as $message){

                $toggle = $message->id_auteur === $params['result']['user1']->id ? "author" : "recipient";?> 

                <ul class=<?= $toggle; ?>>
                    <li class="message-part"><?= $message->texte;?></li>
                    <li class="date-part"><?= date('F j',strtotime($message->created_at))." at ".date('H:i',strtotime($message->created_at));?></li>
                </ul>
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

    <form class="flex-row form" method="POST" action="/store">
        <textarea name="message" class="area" placeholder="Nouveau message..." required></textarea>
        <button class="btn" type="submit" name="envoyer">
            <i class="fas fa-chevron-circle-right send"></i>
        </button> 
    </form>

    <div class="flex-row column-gap">
        <button class="btn"><a class="no-decoration color-white" href="/logout">Deconnexion</a></button>        
        <button class="btn"><a class="no-decoration color-white" href="/users">Retour</a></button>
    </div>
</main>

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
#messages {
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
    color: var(--primary);
}
.date-part{
    font-size: 11px;
    color: var(--primary);
}
.author .date-part{
    text-align: right;
}
.author .message-part{
    background-color: var(--card);
}
.recipient .message-part{
    background-color: var(--secondary);
}

.form-send {
    width: 350px;
    margin: 0 auto;
    text-align: center;
}

.form {
    justify-content: space-around;
}

.form > button {
    background: transparent;
}

.area {
    width:250px; 
    height:50;
    padding: 10px;
    color: var(--primary);
    background-color: var(--hover);
    border: 0;
    border-radius: 15px;
    outline: none;
    font-size: 14px;
}

.send {
    font-size: 30px;
    color: var(--card);
    cursor: pointer;
}

.column-gap{
    column-gap: 15px;
}
</style>