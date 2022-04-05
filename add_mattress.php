<?php
$home = false;
include("templates/header.php");

if (!empty($_POST)) {

    $name = trim(strip_tags($_POST["name"]));
    $marque = trim(strip_tags($_POST["marque"]));
    $dimension = trim(strip_tags($_POST["dimension"]));
    $picture = trim(strip_tags($_POST["picture"]));
    $call_price = trim(strip_tags($_POST["call_price"]));
    $reduced_price = trim(strip_tags($_POST["reduced_price"]));

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

    // Si le formulaire est sans erreurs
    if (empty($errors)) {
        // Requête d'insertion en BDD
        $dsn = "mysql:host=localhost;dbname=literie3000";
        $db = new PDO($dsn, "root", "root");

        // Requête pour ajouter le matelas dans la BDD
        $query = $db->prepare("INSERT INTO mattress
            (name, marque, dimension, picture, call_price, reduced_price)
            VALUES
            (:name, :marque, :dimension, :picture, :call_price, :reduced_price)
        ");
        // On associe une variable à chaque paramètres de la requête préparée
        $query->bindParam(":name", $name);
        $query->bindParam(":marque", $marque);
        $query->bindParam(":dimension", $dimension);
        $query->bindParam(":picture", $picture);
        $query->bindParam(":call_price", $call_price, PDO::PARAM_INT);
        $query->bindParam(":reduced_price", $reduced_price, PDO::PARAM_INT);

        // Si la requête s'exécute, redirection vers la page d'accueil
        if ($query->execute()) {
            header("Location: ./");
        };
    }
}
?>
<main>
    <h1>Ajouter un matelas</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="inputName">Nom du matelas : </label>
            <input type="text" name="name" id="inputName" value="<?= isset($name) ? $name : "" ?>">
            <?php
            if (isset($errors["name"])) {
            ?>
                <span class="info-error"><?= $errors["name"] ?></span>
            <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="inputMarque">Nom de la marque : </label>
            <input type="text" name="marque" id="inputMarque" value="<?= isset($marque) ? $marque : "" ?>">
            <?php
            if (isset($errors["marque"])) {
            ?>
                <span class="info-error"><?= $errors["marque"] ?></span>
            <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="inputDimension">Dimension : </label>
            <input type="text" name="dimension" id="inputDimension" value="<?= isset($dimension) ? $dimension : "" ?>">
            <p>Format demandé : 00x000</p>
            <?php
            if (isset($errors["dimension"])) {
            ?>
                <span class="info-error"><?= $errors["dimension"] ?></span>
            <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="inputPicture">Photo du matelas : </label>
            <input type="text" name="picture" id="inputPicture" value="<?= isset($picture) ? $picture : "" ?>">
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
            <input type="number" name="call_price" id="inputCall_price" value="<?= isset($call_price) ? $call_price : "" ?>">
            <?php
            if (isset($errors["call_price"])) {
            ?>
                <span class="info-error"><?= $errors["call_price"] ?></span>
            <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="inputReduced_price">Prix remisé : </label>
            <input type="number" name="reduced_price" id="inputReduced_price" value="<?= isset($reduced_price) ? $reduced_price : "" ?>">
            <?php
            if (isset($errors["reduced_price"])) {
            ?>
                <span class="info-error"><?= $errors["reduced_price"] ?></span>
            <?php
            }
            ?>
        </div>

        <input type="submit" value="Ajouter le matelas" class="btn">
    </form>
</main>
<?php
include("templates/footer.php");
?>