<?php
include('init.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice</title>
</head>
<body>
    <?php
        if(isset($_SESSION['membre'])) {
    ?>
        <h1>Bonjour <?php echo $_SESSION['membre']['prenom'].' '. $_SESSION['membre']['nom']?> !</h1>
    <?php
        } else {
    ?>
        
    <a href="inscription.php">inscription</a>

    -

    <a href="connexion.php">connexion</a>
    <?php
       }
    ?>
</body>
</html>