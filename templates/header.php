<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Literie 3000</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    if ($home) {
    ?>
        <header>
            <div class="container-flex-header">
                <div class="header-left">
                    <img src="./img/logo literie3000/logo fond transparent.png" alt="Logo Literie 3000">
                </div>
                <div class="header-right">
                        <a href="./add_mattress.php">Ajouter un matelas</a>
                </div>
            </div>
        </header>
    <?php
    } else {
    ?>
        <header>
            <div class="container-flex-header">
                <img src="./img/logo literie3000/3.png" alt="Logo Literie 3000">
            </div>
        </header>
    <?php
    }
    ?>