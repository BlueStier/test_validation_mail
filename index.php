<?php session_start(); 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
  
    <title>test_validation_mail</title>
</head>
<body>
<form action="index.php" method="post">
mail:<br>
<input type="text" name="mail"></input><br>
pseudo :<br>
<input type="text" name="pseudo"></input><br>
<input type="submit" name="envoyer" value="envoyer"></input>
</form><?php
if(isset($_POST["envoyer"])&&!empty($_POST["envoyer"])){
    $_SESSION["mail"]=$_POST["mail"];
    $_SESSION["pseudo"]=$_POST["pseudo"];

/*on cree une clé unique de vérification et on la met dans une session*/
$cle=md5(microtime(TRUE)*100000);
$_SESSION["cle"]=$cle;    
/*On récupère les données et on les mets dans une table. Celle-ci comprant le mail,pseudo, la clé et l'état(0 inactif,1 actif) */
    try {
        $bdd = new PDO ( 'mysql:host=localhost;dbname=test_validation_mail;charset=utf8', 'root', 'root' );
        } catch ( Exception $e ) {
        die ( 'pas de donnÃ©es en cours' );
    }

    $sql = $bdd->prepare('insert into utilisateur (mail,pseudo,cle,actif) values (:mdp,:pseudo,:cle,0)');
        $sql-> execute(array(
            'mail'=>$_POST["mail"],
            'pseudo'=>$_POST["pseudo"],
            'cle'=>$cle,
        ));
      header('location: envoiMail.php');  
    }

?>
</body>
</html>