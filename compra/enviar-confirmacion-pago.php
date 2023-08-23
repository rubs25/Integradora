<?php
$email = $_POST['email'];
$total = $_POST['total'];

// Aquí puedes agregar la lógica para enviar la confirmación de pago al cliente por correo electrónico
// Puedes utilizar una librería de envío de correos electrónicos como PHPMailer o la función mail() de PHP

// Ejemplo utilizando la función mail() de PHP
/* $to = $email;
$subject = "Confirmación de pago";
$message = "Gracias por tu pago. El total pagado es: $" . number_format($total, 2);
$headers = "From: tu_correo@example.com" . "\r\n" .
    "Reply-To: tu_correo@example.com" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();
 */
if (mail($to, $subject, $message, $headers)) {
    echo "Confirmación de pago enviada al cliente.";
} else {
    echo "Error al enviar la confirmación de pago.";
}
?>
