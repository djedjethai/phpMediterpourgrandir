<?php
namespace OCFram;
/* Namespace alias. */
use \OCFram\PHPMailer;
use \OCFram\Exception;
use \OCFram\SMTP;
use \OCFram\PHPMailerAutoload;

class Mailer
{

  protected static $sender = 'info@mediterpourgrandir.com';

  public static function sendMail($destination, $sender, $subject, $body) 
  {
        
    $sendGridApiKey = rtrim(file_get_contents(getenv('API_KEY')));
	    
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($sender, "Mediter Pour Grandir");
    $email->setSubject($subject);
    $email->addTo($destination, "");
    $email->addContent("text/plain", $body);
    // $email->addContent(
    //     "text/html", $body
    // );
    $sendgrid = new \SendGrid($sendGridApiKey);
    try {
        $response = $sendgrid->send($email);
        // print $response->statusCode() . "\n";
        // print_r($response->headers());
        // print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }

    // $email = new \SendGrid\Mail\Mail();
    // $email->setFrom("admin@mediterpourgrandir.com", "Example User");
    // $email->setSubject("Sending with Twilio SendGrid is Fun");
    // $email->addTo("djedjethai@gmail.com", "Example User");
    // $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
    // $email->addContent(
    //     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
    // );
    // // $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    // $sendgrid = new \SendGrid($sendGridApiKey);
    // // var_dump('arrrrrhhhhh', $sendgrid);
    // try {
    //     $response = $sendgrid->send($email);
    //     print $response->statusCode() . "\n";
    //     print_r($response->headers());
    //     print $response->body() . "\n";
    // } catch (Exception $e) {
    //     echo 'Caught exception: '. $e->getMessage() ."\n";
    // }

  }

  public static function sendMailWithPostFix($destination, $sender, $subject, $body)
  {  
    // WITH POSTFIX DO NOT WORK
    $mail = new PHPMailer;

    // $mail->SMTPDebug = 3;                               // Enable verbose debug output
    $mail->SMTPDebug = 4;
    $mail->isSMTP();   
    $mail->Mailer = "smtp";                                 // Set mailer to use SMTP
    // $mail->Host = 'djedje-PORTEGE-M900';  // Specify main and backup SMTP servers
    $mail->Host = "localhost";
    $mail->SMTPAuth = false;
    $mail->SMTPSecure = false;
    $mail->SMTPAutoTLS = false;
                       // SMTP password
    
    $mail->Port = 25;                                    // as it s the port of the postfix image

    $mail->setFrom($sender);
    $mail->addAddress($destination);     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->CharSet = 'utf-8';
    $mail->AltBody = 'alt body';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    } 
  }

  public static function sendMailAuth($student, $key)
  {
	// var_dump("http://mediterpourgrandir/auth/confRegistration-".$key."".$student->id().".php");
   
    $destination = $student->email();
    $sender = self::$sender;
    $subject = 'Mediter Pour Grandir, confirmation d\'inscription';
    $body = "Bienvenue sur le site de Méditer Pour Grandir,
 
        Pour activer votre compte, veuillez cliquer sur le lien ci dessous
        ou le copier/coller dans votre navigateur internet.
         
        http://mediterpourgrandir.com/auth/confRegistration-".$key."".$student->id().".php
         
         
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.";
    

    self::sendMail($destination, $sender, $subject, $body); 
  }

  public static function sendMailPassword($student, $key)
  {
    $destination = $student->email();
    $sender = self::$sender;
    $subject = 'Mediter Pour Grandir';
    $body = "Méditer Pour Grandir est ravie de vous compter parmis ses membres,
 
        Votre nouveau mot de passe est: ".$key."

	Cliquer sur ce lien pour acceder au site: https://mediterpourgrandir.com/auth/signIn.php

        Afin de protéger votre compte, pensez à le modifier dès votre prochaine connexion.
         
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.";;

    self::sendMail($destination, $sender, $subject, $body);
   	 
  }

  public static function sendMailNotify($user, $news)
  {

    $destination = $user->userEmail();
    $sender = self::$sender;
    $subject = 'Mediter Pour Grandir, nouveau message';
    $body = "Méditer Pour Grandir est ravie de vous compter parmis ses membres,

      	Il y a une réponse dans la discution:  '".$news->titre()."'.

	---------------
       	Ceci est un mail automatique, Merci de ne pas y répondre.";

    self::sendMail($destination, $sender, $subject, $body);
  }

  public static function sendMailContact($contact)
  {
    $destination = 'info@mediterpourgrandir.com';
    $sender = self::$sender;
    $subject = 'Mediter Pour Grandir, contact';
    $body = "Email de ".$contact->pseudo()." - ".$contact->email().",

            Message: ".$contact->contenu()."";

    self::sendMail($destination, $sender, $subject, $body);  
  }
    
}

    
