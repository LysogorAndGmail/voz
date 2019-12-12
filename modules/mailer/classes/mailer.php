<?
class Mailer {
    
    public static function send($from,$from_name,$to,$conf,$file,$sub,$mes) {
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $conf['host'];  // Specify main and backup server
        $mail->SMTPAuth = $conf['auth'];                               // Enable SMTP authentication
        $mail->Username =  $conf['username'];                             // SMTP username
        $mail->Password =  $conf['pass'];                           // SMTP password
        $mail->SMTPSecure =  $conf['secure']; 
        //$mail->SMTPPort = 25;                            // Enable encryption, 'ssl' also accepted
        
        $mail->From = $from;
        $mail->FromName = $from_name;
        $mail->addAddress($to);  // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        
        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
        $mail->addAttachment($file);         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        
        $mail->Subject = $sub;
        $mail->Body    = $mes;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        if(!$mail->send()) {
           //echo 'Message could not be sent.';
           //echo 'Mailer Error: ' . $mail->ErrorInfo;
           //exit;
           return false;
        }else{
            return true;
        }
        //echo 'Message has been sent';
    }
}

