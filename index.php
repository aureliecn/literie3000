<?php
$home = true;
include("templates/header.php");

// Connexion à la base de données
$db = new PDO("mysql:host=localhost;dbname=literie3000", "root", "root");
// Requête pour récupérer tous les produits
$query = $db->query("
SELECT * from mattress
");
$mattress = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($mattress);


?>
<main>
    <h1>Catalogue</h1>
    <div class="all-mattress-container">
        <?php
        foreach ($mattress as $item) {
        ?>
            <div class="mattress-elements-container">
                <div class="img">
                    <img src="<?= $item["picture"] ?>" alt="<?= $item["name"] ?>">
                </div>
                <p><?= $item["marque"] ?></p>
                <div class="name-container">
                    <p><?= $item["name"] ?></p>
                    <p><?= $item["dimension"] ?></p>
                </div>
                <div class="price-container">
                    <p class="call-price"><?= $item["call_price"] ?>€</p>
                    <p class="reduced_price"><?= $item["reduced_price"] ?>€</p>
                </div>
                <a href="./update_mattress.php?id=<?= $item["id"] ?>">Modifier</a>
                <a href="./delete_mattress.php?id=<?= $item["id"] ?>">Supprimer</a>

            </div>
        <?php
        }
        ?>
    </div>
    <div class="additionnal-informations">
        <p>
            Toutes nos dimensions : 90x190, 140x190, 160x200, 180x200, 200x200
        </p>
        <p>Toutes nos marques : Edepa, Dreamway, Bultex, Dorsoline, MemoryLine</p>
    </div>
</main>
<?php
include("templates/footer.php");
?>