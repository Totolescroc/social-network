<?php
require "funnction.php";
include('menu-principal.php');
$user = $_SESSION['membre']["email"] ?? "";
$currentUsers = getUrrentUser($user);
// echo "<pre>";
// print_r($currentUsers);
// echo "</pre>";
if (!$currentUsers) {
    header("location:accueil.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Annonce</title>
</head>

<body>

    <?php echo $content;?>
    <div class = "post_event">

        <form method="post">
            
            <?php 
        ?>
        <select name="cat" id="cat" required>
            <?php
            $get_cat = $pdo ->query('SELECT * FROM categorie');
            while ($cat = $get_cat-> fetch(PDO::FETCH_ASSOC)) {
                ?>
            <option value="<?php echo $cat['id_cat'];?>"><?php echo $cat['name_cat'];?></option>
            <?php } ?>
        </select>
        
        <label for="titre">Titre de l'annonce</label>
        <br></br>
        <input type="text" name="titre" id="titre" required>
        
        <br></br>
        <input type="date" name="date_post" id="date_post" required>
        <br></br>
        <input type="time" name="heure_post" id="heure_post">
        <br><br>
        <label for="adresse">Quelle est l'adresse</label>
        <input type="text" name="adresse" placeholder="Rentrez une adresse">
        <br><br>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" required>
        <br></br>
        <input type="submit" class="button" value="Poster">
    </form>
</div>
    
    <?php 
    if ($_POST) {
        
$post =[ 
    'id_membre' => $currentUsers['id_membre'],
    'titre' => $_POST['titre'],
    'date_post'=> $_POST['date_post'],
    'content_post' => $_POST['description'],
    'id_cat'=> $_POST['cat'],
    'adresse' => $_POST['adresse']
];
        $pdo->exec("INSERT INTO post (id_membre, titre, date_post, content_post, heure_post, id_cat, adresse) VALUES ('$post[id_membre]', '$_POST[titre]', '$_POST[date_post]', '$_POST[description]', '$_POST[heure_post]','$_POST[cat]', '$_POST[adresse]')");

    }
    ?>
</body>
</html>

<script>
    //empeche de selectionner date passée
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("date_post")[0].setAttribute('min', today);
</script>