
<main class="rg-25">

    <h2>Compte : <?= $params['result']['user1']->pseudo." à ".$params['result']['user2']->pseudo;?></h2>

    <section class="flex-column rg-3 main-part" id="messages">
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
        <button class="btn-valid flex-row flex-center" type="submit" name="envoyer">
            <i class="fas fa-chevron-circle-right send"></i>
        </button>
        <i class="fa-sharp fa-solid fa-circle-caret-right"></i>
    </form>

    <div class="flex-row cg-15">
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

        $('#messages').load('/userslive')

    } 
</script>

<style scoped>
#messages {
    align-items: flex-start;
}

.author, .recipient {
    max-width: 55%;
}

.author {
    align-self: flex-end;
}

.message-part{
    border-radius: 10px 10px 0 10px;
    padding: 8px;
    margin: 3px 0;
    color: var(--primary);
}
.date-part{
    font-size: 1rem;
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

.form {
    width: 100%;
    max-width: 350px;
    justify-content: space-around;
    align-items: center;
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
    font-size: 1.6rem;
}

.btn-valid {
    height: 2.3rem;
    width: 2.3rem;
    border-radius: 50%;
}

.send {
    font-size: 2.3rem;
    color: var(--card);
    cursor: pointer;
}
</style>