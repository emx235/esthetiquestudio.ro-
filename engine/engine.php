<?php

// contact form
if( isset($_POST['trigger']) ){

	$Name=$_POST['name'];
	$Email=$_POST['email'];
	$Phone=$_POST['phone'];
	$Message=$_POST['message'];

	//create email and send message
	$to='adriana@esthetiquestudio.ro';
	$email_subject="www.esthetiquestudio.ro contact form";
	
	$email_body = '
	    <html>
	    <body>
	        <p>Ai primit un mesaj de pe site-ul www.esthetiquestudio.ro. Datele completate sunt:</p>
	        <p><strong>Nume: </strong>'.$Name.'</p>
        	<p><strong>Email: </strong>'.$Email.'</p>
        	<p><strong>Telefon: </strong>'.$Phone.'</p>
        	<p><strong>Mesaj: </strong>'.$Message.'</p>
	    </body>
	    </html>';

    // Set content-type header for sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// Additional headers
	$headers .= 'From: www.esthetiquestudio.ro' . "\r\n";

	mail($to,$email_subject,$email_body,$headers)	;
	return true;
}

?>
