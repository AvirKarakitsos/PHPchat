
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
</style>