<?php
    require '/../lib/PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    class email{

        public function sendEmail($recipient_address, $recipient_name, $subject, $body, $alt_body){
            global $mail;

            $mail->isSMTP();
            $mail->Host = 'EMAIL-HOST-URL';
            $mail->SMTPAuth = TRUE;
            $mail->Username = 'EMAIL_USERNAME';
            $mail->Password = 'EMAIL-PASSWORD';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 'PORT';

            $mail->From = 'EMAIL FROM';
            $mail->FromName = 'NAME';
            $mail->addAddress($recipient_address, $recipient_name);
            $mail->isHTML(TRUE);

            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = $alt_body;

            if(!$mail->send()){
                $error_message = 'Message could not be sent; Mailer Error : '.$mail->ErrorInfo;
            }
            else{
                $error_message = 'Message was sent';
            }

            return $error_message;
        }

    }
    
    $email_info = new email;

?>
