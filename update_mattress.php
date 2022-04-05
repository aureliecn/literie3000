<?php
$home = $false;
include("templates/header.php");

// Initialisation du nom par matelas matelas introuvable en cas d'injection sql 
$data = array("name" => "Matelas introuvable");
$find = false;

if (isset($_GET["id"])) {
    // Connexion à la base de données marmiton
    $dsn = "mysql:host=localhost;dbname=literie3000";
    $db = new PDO($dsn, "root", "root");

    $query = $db->prepare("SELECT * FROM mattress WHERE id = :id");
    $query->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
    // On exécute la requête
    $query->execute();
    $item = $query->fetch();

    if ($item) {
        $find = true;
        $data = $item;

        // Puisque nous avons trouvé le bon id, nous pouvons préparer la requête qui permettra de modifier le produit

        if (!empty($_POST)) {
            $name = trim(strip_tags($_POST["name"]));
            $marque = trim(strip_tags($_POST["marque"]));
            $dimension = trim(strip_tags($_POST["dimension"]));
            $picture = trim(strip_tags($_POST["picture"]));
            $call_price = trim(strip_tags($_POST["call_price"]));
            $reduced_price = trim(strip_tags($_POST["reduced_price"]));

            // var_dump($_POST);
            // Initialisation d'un tableau d'erreurs
            $errors = [];

            if (empty($name)) {
                // Le champ nom du matelas n'est pas renseigné

                $errors["name"] = "Le champ est obligatoire !";
            }
            if (empty($marque)) {

                $errors["marque"] = "Le champ est obligatoire !";
            }
            if (empty($dimension)) {
                $errors["dimension"] = "Le champ est obligatoire !";
            }

            // Validation de l'url de l'image
            if (!filter_var($picture, FILTER_VALIDATE_URL)) {
                $errors["picture"] = "L'url de l'image est invalide !";
            }

            if (empty($call_price)) {
                $errors["call_price"] = "Le champ est obligatoire !";
            }
        
            if (empty($reduced_price)) {
                $errors["reduced_price"] = "Le champ est obligatoire !";
            }

            // Vérification aucune erreur avant connexion à la BDD

            if (empty($errors)) {

                // Requête pour ajouter le matelas dans la BDD
                $query = $db->prepare("
                UPDATE mattress
                SET name = :name,  marque = :marque, dimension = :dimension, picture = :picture, call_price = :call_price, reduced_price = :reduced_price
                WHERE id LIKE :id
                ");
                // var_dump($test);
                // On associe une variable à chaque paramètres de la requête préparée
                $query->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
                $query->bindParam(":name", $name);
                $query->bindParam(":marque", $marque);
                $query->bindParam(":dimension", $dimension);
                $query->bindParam(":picture", $picture);
                $query->bindParam(":call_price", $call_price, PDO::PARAM_INT);
                $query->bindParam(":reduced_price", $reduced_price, PDO::PARAM_INT);

                // var_dump($query);

                $execute = $query->execute();
                // var_dump($execute);

                // Si la requête s'exécute, redirection vers la page d'accueil
                if ($execute) {
                    header("Location: ./");
                };
            }
        }
    }
}
?>
<main>
    <h1> Modification de la fiche du produit : <?= $data["name"] ?></h1>

    <?php
    if ($find) {
    ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="inputName">Nom : </label>
                <input type="text" name="name" id="inputName" value="<?= $data["name"] ?>">
            </div>
            <div class="form-group">
                <label for="inputMarque">Nom de la marque : </label>
                <input type="text" name="marque" id="inputMarque" value="<?= $data["marque"] ?>">
            </div>
            <div class="form-group">
                <label for="inputDimension">Dimension : </label>
                <input type="text" name="dimension" id="inputDimension" value="<?= $data["dimension"] ?>">
                <p>Format demandé : 00x000</p>
            </div>
            <div class="form-group">
                <label for="inputPicture">Photo du matelas : </label>
                <input type="text" name="picture" id="inputPicture" value="<?= $data["picture"] ?>">
                <p>Le format demandé est une url d'image</p>
                <?php
                if (isset($errors["picture"])) {
                ?>
                    <span class="info-error"><?= $errors["picture"] ?></span>
                <?php
                }
                ?>
            </div>
            <div class="form-group">
                <label for="inputCall_price">Prix d'appel : </label>
                <input type="number" name="call_price" id="inputCall_price" value="<?= $data["call_price"] ?>">
            </div>
            <div class="form-group">
                <label for="inputReduced_price">Prix remisé : </label>
                <input type="number" name="reduced_price" id="inputReduced_price" value="<?= $data["reduced_price"] ?>">
            </div>

            <input type="submit" value="Enregistrer les modifications" class="btn">
        </form>
    <?php
    }
    ?>

</main>

<?php
include("templates/footer.php");
?>