<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href= "<?= SCRIPTS.'css'.DIRECTORY_SEPARATOR.'appp.css' ?>" >
    <script src="https://kit.fontawesome.com/e53f4fb6f8.js" crossorigin="anonymous"></script>
    
    <title>Messagerie privée</title>
</head>

<body class="main-container">
   

        <header>
            <?php include 'navigation.php'; ?>
        </header>

        <?= $content; ?>

</body>
</html>