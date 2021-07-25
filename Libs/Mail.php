<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer{
    public function __construct()
    {
        $mail = new PHPMailer(true);
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->mail->isSMTP();                                             //Send using SMTP
        $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = 'dzpower19@gmail.com';                     //SMTP username
        $this->mail->Password   = 'NAZIMANAHOWA';                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $this->mail->setFrom('DR.houaoui@example.com', 'DR. houaoui');
        $this->mail->isHTML(true);
    }

    public function to($adresse,$name=null)
    {
        $this->mail->addAddress($adresse,$name);
    }
    public function send(){
        $this->mail->send();
    }
    public function subject($sub)
    {
        $this->mail->Subject = $sub;
    }
    public function body($body)
    {
        $this->mail->Body = $body;
    }
    public function altbody($altbody)
    {
        $this->mail->AltBody = $altbody;
    }
}