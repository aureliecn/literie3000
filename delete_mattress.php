<?php
$home = false;
include("templates/header.php");

$data = array ("name" => "Matelas introuvable");
$find = false;

if (isset($_GET["id"])){
    // Connexion à la base de données marmiton
    $dsn = "mysql:host=localhost;dbname=literie3000";
    $db = new PDO($dsn, "root", "root");

    $id = trim(strip_tags($_GET["id"]));

    $query = $db->prepare("SELECT * FROM mattress WHERE id = :id");
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    // On exécute la requête
    $query->execute();
    $item = $query->fetch();
    
    if($item){
        $find = true;

        // Puisque nous avons trouvé le bon id, nous pouvons préparer la requête pour supprimer l'élément
        $query = $db->prepare("DELETE FROM mattress WHERE id = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        // On exécute la requête
        $query->execute();
        
        header("Location: ./");
    }
}
?>
<h1><?= $data["name"] ?></h1>
<?php
include("templates/footer.php");
?>