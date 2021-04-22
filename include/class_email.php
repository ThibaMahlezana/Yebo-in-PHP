<?php
    require '/../lib/PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    class email{

        public function sendEmail($recipient_address, $recipient_name, $subject, $body, $alt_body){
            global $mail;

            $mail->isSMTP();
            $mail->Host = 'mail.ayttiq.com';
            $mail->SMTPAuth = TRUE;
            $mail->Username = 'info@ayttiq.com';
            $mail->Password = 'Ayttiq-aypage12';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 25;

            $mail->From = 'info@ayttiq.com';
            $mail->FromName = 'aypage';
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
