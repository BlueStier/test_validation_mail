<?php
        require "répertoire_phpmailer/class.phpmailer.php";
        $mail = new PHPmailer();
        $mail->IsSMTP();
        $mail->Host='hote_smtp';
        $mail->From='lroussel2703@gmail.com';
        $mail->AddAddress('lroussel2703@gmail.com');
        $mail->AddReplyTo('lroussel2703@gmail.com');     
        $mail->Subject='Exemple trouvé sur DVP';
        $mail->Body='Voici un exemple d\'e-mail au format Texte';
        if(!$mail->Send()){ //Teste le return code de la fonction
          echo $mail->ErrorInfo; //Affiche le message d'erreur (ATTENTION:voir section 7)
        }
        else{     
          echo 'Mail envoyé avec succès';
        }
        $mail->SmtpClose();
        unset($mail);
?>