<?php
if ( isset( $_POST['newsletter_submit'] ) ) {
	// Initialize error array
	$newsletter_errors = array();

	// Check email input field
	if ( trim( $_POST['newsletter_email'] ) === '' )
		$newsletter_errors[] = 'Email address is required';
	elseif ( !preg_match( "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,4}$/i", trim( $_POST['newsletter_email'] ) ) )
		$newsletter_errors[] = 'Email address is not valid'; 
	else
		$newsletter_email = trim( $_POST['newsletter_email'] );
        $newsletter_nombre = trim( $_POST['newsletter_nombre'] );
        $newsletter_tlf = trim( $_POST['newsletter_tlf'] );
        $newsletter_mensaje = trim( $_POST['newsletter_mensaje'] );
	
	// Send email if no input errors
	if ( empty( $newsletter_errors ) ) {
		$email_to = "gregesf@gmail.com"; // Change to your own email address
		$subject = "Formulario Contacto Web - " . $newsletter_nombre;
		$body = "Mensaje enviado por: " . $newsletter_nombre . "\r\n" . "Email: " . $newsletter_email . "\r\n" . "Teléfono: " . $newsletter_tlf . "\r\n" . "Mensaje: " . $newsletter_mensaje . "\r\n";
		$headers = "Mensaje formulario Web<" . $email_to . ">\r\nReply-To: " . $newsletter_email . "\r\n";
		mail( $email_to, $subject, $body, $headers );
		echo 'Gracias por contactar con EMPEÑOS MAS ME DAN';
	} else {
		echo 'Por favor regrese y corrija los siguientes errores:<br />';
		foreach ( $newsletter_errors as $error ) {
			echo $error . '<br />';
		}
	}
}
?>