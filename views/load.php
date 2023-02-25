
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
 
<style scoped>
#mess{
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
.auteur{
    align-self: flex-end;
}
.para1{
    background-color: rgb(97, 190, 233);
    border-radius: 10px 10px 0 10px;
    padding: 8px;
    margin: 3px 0;
    font-size: 14px;
    color: white;
}
.destin .para1{
    background-color: rgb(150, 150, 150);
}
.para2{
    font-size: 11px;
    color: white;
}
</style>