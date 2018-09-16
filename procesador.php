<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions




//validacion
$error="";
if(isset($_POST['envio'])) {//si se envio el formulario

if (empty($_POST['nombre']))
    $error.="Ingresa un nombre </br>";
else{
    $nombre=$_POST['nombre'];
    $nombre= filter_var($nombre, FILTER_SANITIZE_STRING);//ELIMINAR ETIQUETAS DE HTML AL INPUT
    $nombre= trim($nombre);
    if ($nombre=="") $error.="El nombre esta vacio </br>";
}
if (empty($_POST['email']))
    $error.="Ingresa un email </br>";
else{
    $email=$_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error.="Ingresa un email verdadero </br>";
    }else{
        $email= filter_var($email, FILTER_SANITIZE_EMAIL);
    }
}
if (empty($_POST['mensaje']))
    $error.="Ingresa un mensaje </br>";
else{
    $mensaje=$_POST['mensaje'];
    $mensaje= filter_var($mensaje, FILTER_SANITIZE_STRING);//ELIMINAR ETIQUETAS DE HTML AL INPUT
    $mensaje= trim($mensaje);
    if ($mensaje=="") $error.="El mensaje esta vacio </br>";
}

//validando archivo



if ($_FILES){
    $tipo = $_FILES['archivo']['type'];
    if ($tipo=="image/png" ||$tipo=="image/jpg"||$tipo=="application/pdf"){
        $archivo = $_FILES['archivo']['tmp_name'];
        $destino = $_FILES['archivo']['name'];
        move_uploaded_file($archivo, $destino);

    }else{
        $error.="Adjunte solo jpg, png, pdf";
    }
}






//enviar correo
if($error==""){
    //cuerpo del mensaje
    $cuerpo ="Nombre: ".$nombre."<br>";
    $cuerpo.="Email: ".$email."<br>";
    $cuerpo.="Mensaje: ".$mensaje."<br>";
    //Direccion a enviar
    $destinatario="destinatario@gmail.com";
    $asunto="Nuevo mensaje formulario";
    $cabeceras = "From: SoyElAdmin <xxxxadminxxxxx@gmail.com>". "\r\n";


    //envio de correo
    
    try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'tucuentamanejadora@gmail.com';                 // SMTP username
        $mail->Password = 'tucontra';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom($email, "Administrador");
        $mail->addAddress($destinatario);     // Add a recipient
       
        //Attachments
        $mail->addAttachment($destino);         // Add attachments
    
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $cuerpo;
        $mail->CharSet="UTF-8";
        $mail->send();

        echo 'exito';//all ok
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

    
    


    unlink($destino);


}else{
    echo $error;
}







}
else{
    echo "No se envio formulario";
}



?>
