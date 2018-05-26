<?php
session_start(); 
$mail = $_SESSION["mail"]; // récupération de l'adresse mail en session.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = 'Bienvenue sur test_validation_mail,
 
Pour activer votre compte, veuillez cliquer sur le lien ci dessous
ou copier/coller dans votre navigateur internet.
 
http://votresite.com/activation.php?log='.urlencode($_SESSION['pseudo']).'&cle='.urlencode($_SESSION['cle']).'
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';
$message_html = "<html><head><body>Bienvenue sur test_validation_mail,
 
Pour activer votre compte, veuillez cliquer sur le lien ci dessous
ou copier/coller dans votre navigateur internet.
 
http://localhost/test_validation_mail/activation.php?pse=".urlencode($_SESSION["pseudo"])."&cle=".urlencode($_SESSION["cle"])."'
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.'</body></html>";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "validation";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"loic\"<lroussel2703@gmail.com>".$passage_ligne;
$header.= "Reply-to: \"loic\"<lroussel2703@gmail.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
echo "mail envoyé";
//==========
?>
