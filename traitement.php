<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    /*require_once('connect_db.php');
    $connexion = connect_db();*/


    if(isset($_POST['soumettre'])) {
        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $objet = $_POST['objet'];
        $message = $_POST['message'];

        if(empty($message)) {
            header('location:index.html?message=vide#contact');
        } else {
            /*$req = $connexion->prepare("INSERT INTO messages (email, nom, objet, message, created_at) VALUES (:email, :nom, :objet, :message, NOW())");
            $req->bindValue(':email', $email);
            $req->bindValue(':nom', $nom);
            $req->bindValue(':objet', $objet);
            $req->bindValue(':message', $message);

            if($req->execute()) {*/

                //Load Composer's autoloader
                require 'vendor/autoload.php';

                //require 'PHPMailer/PHPMailerAutoload.php';
                $to = "contact@ptitboulot.com";
                $cc = "oumarm611@gmail.com";
                $mail = new PHPMailer(true);

                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                //Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;    
                $mail->Username = 'oumarm611@gmail.com';              // SMTP username
                $mail->Password = 'pkkx cxyr zcsn zpfl';              // SMTP password
                $mail->SMTPSecure = 'tls'; 
                //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->setFrom($email, $nom);                         // Name is optional
                $mail->addReplyTo($email, 'Information');

                $mail->addAddress($to, 'P\'tit boulot website');      //Add a recipient
                //$mail->addAddress('ellen@example.com');             //Name is optional
                $mail->addReplyTo($email, 'Information');
                $mail->addCC($cc);
                //$mail->addBCC('bcc@example.com');

            
                $mail->isHTML(true);                                  // Set email format to HTML
                
                //Attachments
                /*$mail->addAttachment('/var/tmp/file.tar.gz');       //Add attachments
                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/  //Optional name
                
                $mail->Subject = $objet;
                $mail->Body    = '<div style="margin-left:20px;">
                                    <p style="">'.$message.'</p>
                                </div>';
                $mail->AltBody = $message;

                if(!$mail->send()) {
                    //header('location:index.php?msg=saved&mail=unsent#contact');
                    echo "<script>window.location.assign('index.php?msg=saved&mail=unsent#contact')</script>";
                } else {
                    //header('location:index.php?msg=saved&mail=sent#contact');
                    echo "<script>window.location.assign('index.php?msg=saved&mail=sent#contact')</script>";
                }
                    
            /*} else {
                header('location:index.php?msg=unsaved#contact');
            }*/
        }
    }
