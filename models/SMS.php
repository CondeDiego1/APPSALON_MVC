<?php

namespace Model;

use Twilio\Rest\Client; 

class SMS {
    //------------------------------- ATRIBUTOS -------------------------------
    public $usuario;
    public $fecha;
    public $hora;
    public $total;

    //------------------------------- FUNCIONES -------------------------------
    public function __construct($usuario, $fecha, $hora, $total){
        $this->usuario = $usuario;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->total = $total;
    }
    //------------------------------- FUNCIONES -------------------------------
    public function Enviar_reserva(){
        $nombre = ActiveRecord::SQL2("SELECT * FROM usuarios WHERE usuario = '" . $_SESSION['usuario'] . "' LIMIT 1");
        $sid    = "AC9398746fdd3653447acc6f3da1b597c3"; 
        $token  = "4eb53515bc4f6fb9764a5f039473bd4c"; 
        $twilio = new Client($sid, $token); 
        $telefono = intval($nombre[0]['telefono']);
 
        $message = $twilio->messages->create("whatsapp:+57" . $telefono . "",
        array( 
            "from" => "whatsapp:+14155238886",       
            "body" => "Buen día *" . $nombre[0]['nombre'] . "*, tienes una reserva en *BarberShop* para el día *" . fecha($this->fecha) . "* a las *" . hora($this->hora) . "* por un valor de *" . precio($this->total) . "*.",
        )); 
        
        // print($message->sid);
    }
}