<?php
$mail = 'yohann.demora@gmail.com'; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Et bim!!! je t'envoye ce mail sans passer par une appli mais en tapant le code avec mes petites mains. Par contre pour le lien de validation le .htaccess va poser pb je pense enfin on verra lundi.Bon dimanche et bonne fête maman lol";
$message_html = "<html><head></head><body><b>Et bim</b>,je t'envoyer ce mail sans passer par une appli mais en tapant le code avec mes petites mains.<br> C'est pour le script du forum je suis <strong> BON </strong> ou <strong> TRES BON</strong>.<br>Par contre pour le lien de validation le .htaccess va poser pb je pense enfin on verra lundi.Bon dimanche et bonne fête maman lol <</body></html>";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Et bim !";
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
//==========
?>
