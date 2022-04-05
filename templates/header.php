<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Literie 3000</title>
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
                    <button>
                        <a href="./add_mattress.php">Ajouter un matelas</a>
                    </button>
                </div>
            </div>
        </header>
    <?php
    }else{
        ?>
        <header>
            <div class="container-flex-header">
                    <img src="./img/logo literie3000/3.png" alt="Logo Literie 3000">
            </div>
        </header>
    <?php
    }
    ?>