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
        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Port = 465;
            $mail->Username = 'https://enigmatic-coast-02693.herokuapp.com';
            $mail->Password = 'giglvoenqqprlosj';
            $mail->SMTPSecure = 'tls'; //Encriptado, seguro

            $mail->setFrom('app.barbershop.co@gmail.com');
            $mail->addAddress($this->email);
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Confirmar cuenta';
            $mail->Body = "
            <html>
            <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
            h2 {
                font-size: 25px;
                font-weight: 500;
                line-height: 25px;
            }
        
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #ffffff;
                max-width: 400px;
                margin: 0 auto;
                padding: 20px;
            }
        
            p {
                line-height: 18px;
            }
        
            a {
                position: relative;
                z-index: 0;
                display: inline-block;
                margin: 20px 0;
            }
        
            a button {
                padding: 0.7em 2em;
                font-size: 16px !important;
                font-weight: 500;
                background: #000000;
                color: #ffffff;
                border: none;
                text-transform: uppercase;
                cursor: pointer;
            }
            p span {
                font-size: 12px;
            }
            div p{
                border-bottom: 1px solid #000000;
                border-top: none;
                margin-top: 40px;
            }
            </style>
            <body>
                <h1>BarberShop</h1>
                <h2>¡Gracias por registrarte!</h2>
                <p>Por favor confirma tu correo electrónico para que puedas comenzar a disfrutar de todos los servicios de
                    BarberShop</p>
                <a href='https://enigmatic-coast-02693.herokuapp.com/confirm?token=" . $this->token . "'><button>Verificar</button></a>
                <p>Si tú no te registraste en BarberShop, por favor ignora este correo electrónico.</p>
                <div><p></p></div>
                <p><span>Este correo electrónico fue enviado desde una dirección solamente de notificaciones que no puede aceptar correo electrónico entrante. Por favor no respondas a este mensaje.</span></p>
            </body>
            </html>";

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            echo $e;
        }
    }

    public function Enviar_Instrucciones(){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.mailtrap.io";
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '010606a6227c92';
        $mail->Password = '26cb141bdbd4a0';
        $mail->SMTPSecure = 'tls'; //Encriptado, seguro

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'BarberShop.com');
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Reestablece tu cuenta';
        $mail->Body = "
        <html>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
        h2 {
            font-size: 25px;
            font-weight: 500;
            line-height: 25px;
        }
    
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
    
        p {
            line-height: 18px;
        }
    
        a {
            position: relative;
            z-index: 0;
            display: inline-block;
            margin: 20px 0;
        }
    
        a button {
            padding: 0.7em 2em;
            font-size: 16px !important;
            font-weight: 500;
            background: #000000;
            color: #ffffff;
            border: none;
            text-transform: uppercase;
            cursor: pointer;
        }
        p span {
            font-size: 12px;
        }
        div p{
            border-bottom: 1px solid #000000;
            border-top: none;
            margin-top: 40px;
        }
        </style>
        <body>
            <h1>BarberShop</h1>
            <h2>¡Hola, ". $this->nombre ."!</h2>
            <p> Recientemente has solicitado restablecer tu contraseña, por favor sigue el proceso como se te indica. En caso de que no hayas sido tu quien solicito reestablecer, por favor haz caso omiso a este mensaje</p>
            <a href='https://enigmatic-coast-02693.herokuapp.com/recover?token=" . $this->token . "'><button>Cambiar contraseña</button></a>
            <p> Si el boton de cambiar contraseña no funciona por favor copia y pega el siguiente enlace en tu navegador https://enigmatic-coast-02693.herokuapp.com/recover?token=" . $this->token . "</p>
            <div><p></p></div>
            <p><span>Este correo electrónico fue enviado desde una dirección solamente de notificaciones que no puede aceptar correo electrónico entrante. Por favor no respondas a este mensaje.</span></p>
        </body>
        </html>";

        $mail->send();
    }
}
