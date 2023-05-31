
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
</style>