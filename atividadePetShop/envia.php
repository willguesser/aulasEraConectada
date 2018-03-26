<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="refresh" content="3; URL=http://www.petshop.com.br/index.html#contato" />
		<meta charset="utf-8">
	</head>

	<body style="background:#FFF">

<?
include("phpmailer/class.phpmailer.php");

//instancia a objetos

$mail = new PHPMailer();

// mandar via SMTP

$mail->IsSMTP(); 

// Seu servidor smtp - saída de emails

$mail->Host = "mail.petshop.com.br"; 

// habilita smtp autenticado

$mail->SMTPAuth = true; 

// usuário deste servidor smtp

$mail->Username = "contato@petshop.com.br"; 

$mail->Password = "p3tSh0p@71we"; // senha


//email utilizado para o envio - email de recebimento do formulário

//pode ser o mesmo de username

$mail->From = "faleconosco@petshop.com.br";

$mail->FromName = "Pet Shop Formulario";


//Enderecos que devem ser enviadas as mensagens - email para resposta do formulário

$mail->AddAddress("faleconosco@petshop.com.br","Pet Shop");


//$mail->AddAddress("outroEmail@SEUDOMINIO.com.br","Contato");

//wrap seta o tamanhdo do texto por linha



$mail->WordWrap = 50; 


//anexando arquivos no email


$mail->AddAttachment("anexo/arquivo.zip"); 

$mail->AddAttachment("imagem/logo.jpg");


$mail->IsHTML(true); //enviar em HTML


// recebendo os dados od formulario


if(isset($_POST['contato_nome'])){

	$nome     = ucwords($_POST['contato_nome']);
	$email 	  = $_POST['contato_email'];	
	$mensagem   = $_POST['contato_mensagem'];



    // informando a quem devemos responder 

	//ou seja para o mail inserido no formulario


	$mail->AddReplyTo("$email","$nome");


	//criando o codigo html para enviar no email

	//vocepode utilizar qualquer tag html ok


	$msg  = "";

	$msg .= "<b> Nome:</b> $nome<br>\n";

	$msg .= "<b> E-mail:</b> $email<br>\n";

	$msg .= "<b> Mensagem:</b> $mensagem<br>\n";

 }


$mail->Subject = "Formulario de Contato";



//adicionando o html no corpo do email


$mail->Body = $msg;

//enviando e retornando o status de envio

if(!$mail->Send())



{



echo "<p>Houve um erro ao  enviar o email! </p>".$mail->ErrorInfo;



//$mail->ErrorInfo informa onde ocorreu o erro 



exit;



}



echo "<div style='margin:100px auto; width:50%; text-align:center'>
			<p><img src='images/logo.png' /></p>
			<p style='font-family: Arial, Helvetica, sans-serif; color:#333; font-size:40px'>Recebemos os seus dados. Entraremos em contato o mais breve possível! 
			</p>
			<p style='font-family: Arial, Helvetica, sans-serif; color:#333; font-size:40px'> Obrigado!
			</p>
	 </div>";



?>

</body>
</html>

