<?php

namespace Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email{
    //------------------------------- ATRIBUTOS -------------------------------
    public $email;
    public $nombre;
    public $token;

    //------------------------------- FUNCIONES -------------------------------
    public function __construct($email, $nombre, $token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function Enviar_Confirmacion(){
        try {
            $mail = new PHPMailer();
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->Mailer = "smtp";
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "app.barbershop.co@gmail.com";
            $mail->Password = "lnqgchncbzorsdol";
            $mail->SMTPSecure = 'tls'; //Encriptado, seguro
            $mail->Port = 587;

            $mail->setFrom("app.barbershop.co@gmail.com");
            $mail->addAddress($this->email);//$this->email
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Confirmar cuenta';
            $mail->Body = "
            <html>
            <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
            </style>

            <body style='width:400px; max-width:400px; margin:0 auto; font-family:Poppins,sans-serif; padding: 20px'>
                <h1>BarberShop</h1>
                <h2 font-size='25px' font-weight='500' line-height='25px'>¡Gracias por registrarte!</h2>
                <p style='line-height:18px;'>Por favor confirma tu correo electrónico para que puedas comenzar a disfrutar de todos los servicios de BarberShop</p>
                <a style='position: relative; z-index: 0; display: inline-block; margin: 0;' href='https://enigmatic-coast-02693.herokuapp.com/confirm?token=" . $this->token . "'><button style='padding: 10px 20px; font-size: 16px; font-weight: 500; background-color: #000000; color: #ffffff; border: none; text-transform: uppercase; cursor: pointer;'>Verificar</button></a>
                <p style='line-height:18px;'>Si tú no te registraste en BarberShop, por favor ignora este correo electrónico.</p>
                <div>
                    <p style='border-bottom: 1px solid #000000; border-top: none; margin-top: 25px;'></p>
                </div>
                <p style='line-height:18px;'><span font-size='12px'>Este correo electrónico fue enviado desde una dirección solamente de notificaciones que no puede aceptar correo electrónico entrante. Por favor no respondas a este mensaje.</span></p>
            </body>
            </html>";

            $mail->send();

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function Enviar_Instrucciones(){
        $mail = new PHPMailer();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Mailer = "smtp";
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "app.barbershop.co@gmail.com";
        $mail->Password = "lnqgchncbzorsdol";
        $mail->SMTPSecure = 'tls'; //Encriptado, seguro
        $mail->Port = 587;

        $mail->setFrom("app.barbershop.co@gmail.com");
        $mail->addAddress($this->email);//$this->email
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Reestablece tu cuenta';
        $mail->Body = "
        <html>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
        </style>
        <body style='width:400px; max-width:400px; margin:0 auto; font-family:Poppins,sans-serif; padding: 20px'>
            <h1>BarberShop</h1>
            <h2 font-size='25px' font-weight='500' line-height='25px'>¡Hola, ". $this->nombre ."!</h2>
            <p style='line-height:18px;'>Recientemente has solicitado restablecer tu contraseña, por favor sigue el proceso como se te indica. En caso de que no hayas sido tu quien solicito reestablecer, por favor haz caso omiso a este mensaje</p>
            <a style='position: relative; z-index: 0; display: inline-block; margin: 0;' href='https://enigmatic-coast-02693.herokuapp.com/recover?token=" . $this->token . "'><button style='padding: 10px 20px; font-size: 16px; font-weight: 500; background-color: #000000; color: #ffffff; border: none; text-transform: uppercase; cursor: pointer;'>Cambiar contraseña</button></a>
            <p style='line-height:18px;'>Si el boton de cambiar contraseña no funciona por favor copia y pega el siguiente enlace en tu navegador https://enigmatic-coast-02693.herokuapp.com/recover?token=" . $this->token . "</p>
            <div><p style='border-bottom: 1px solid #000000; border-top: none; margin-top: 25px;'></p></div>
            <p style='line-height:18px;'><span font-size='12px'>Este correo electrónico fue enviado desde una dirección solamente de notificaciones que no puede aceptar correo electrónico entrante. Por favor no respondas a este mensaje.</span></p>
        </body>
        </html>";

        $mail->send();
    }
}
