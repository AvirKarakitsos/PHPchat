
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
 