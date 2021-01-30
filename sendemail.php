<?php

    //PHP Mailer

    use PHPMailer\PHPMailer\PHPMailer;
    
    if(isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "email@gmail.com"; //indicate email address
        $mail->Password = "password"; //indicate password
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls

        //email settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("emailo@gmail.com"); //indicate email address
        $mail->Subject = ("$email ($subject)");
        $mail->Message = $message;

        if($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something went wrong: <br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }

            //PHP Mailer from Jānis
            /*
            header('Content-type: text/plain; charset=utf-8');
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            require 'PHPMailer/Exception.php';
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 2; 
            $mail->Host = "smtp.gmail.com"; 
            $mail->Port = 587; 
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = 'test@gmail.com';
            $mail->Password = 'xxx';
            $mail->setFrom('test@gmail.com', 'Laura');
            $mail->addAddress('test1@gmail.com');
            $mail->Subject = 'PHPMailer GMail SMTP test';
            $mail->msgHTML("test"); 
            $mail->AltBody = 'HTML messaging not supported';


            if(!$mail->send()){
                echo "Mailer Error: " . $mail->ErrorInfo;
            }else{
                echo "Message sent!";
            }
            */

?>