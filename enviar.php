<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $apellido = htmlspecialchars($_POST["apellido"]);
    $email = htmlspecialchars($_POST["email"]);
    $asunto = htmlspecialchars($_POST["asunto"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    if (empty($nombre) || empty($apellido) || empty($email)) {
        echo "<script>alert('Por favor completa todos los campos obligatorios.'); window.history.back();</script>";
        exit;
    }

    $to = "tu_correo@ejemplo.com";  // <-- tu correo real
    $subject = "Nuevo mensaje de contacto: $asunto";
    $body = "Nombre: $nombre $apellido\nEmail: $email\n\nMensaje:\n$mensaje";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('🌸 ¡Mensaje enviado correctamente!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('❌ Hubo un error al enviar el mensaje.'); window.history.back();</script>";
    }
}
?>
