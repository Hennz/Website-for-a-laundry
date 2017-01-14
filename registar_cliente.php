<?php
	Session_start();
	
	If(!isset($_SESSION["timeout"])){
		$_SESSION['timeout']=time() + 60;
	}
	
	If(time() <$_SESSION['timeout']){
		
		}else{
		Session_destroy();
		Header('Location: index.php');
		}
	?>
	
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>SóBrilho</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="./css/bootstrap-theme.min.css" rel="stylesheet">

   

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">SÓ BRILHO </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.php">Home</a></li>
            <li><a href="about.php">Sobre nós</a></li>
            <li><a href="contact.php">Contacto</a></li>
			<li class="active"><a href="areapessoal.php">Àrea pessoal</a></li>
          </ul>
		  
        </div><!--/.nav-collapse -->
      </div>
	  
    </nav>
<br/>  
<br/>  
<br/>  
<br/>  
   
	 


   
<div class="container">
 <body>
	<form class="form-horizontal"  action="registar_cliente.php" method="POST"  enctype="multipart/form-data" >
		<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Primeiro Nome</label>
		<div class="col-sm-10">
		<input type="text" name="name" class="form-control" id="name" placeholder="Primeiro Nome">
    </div>
  </div>
		<div class="form-group">
		<label for="apelido" class="col-sm-2 control-label">Apelido</label>
		<div class="col-sm-10">
		<input type="text" name="apelido" class="form-control" id="apelido" placeholder="Apelido">
    </div>
  </div>
		<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
		<input type="text" name="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>
  
		<div class="form-group">
		<label for="morada" class="col-sm-2 control-label">Morada</label>
		<div class="col-sm-10">
		<input type="text" name="morada" class="form-control" id="morada" placeholder="Morada">
    </div>
  </div>
  
		<div class="form-group">
		<label for="codpostal" class="col-sm-2 control-label">Codigo - Postal</label>
		<div class="col-sm-10">
		<input type="text" name="codpostal" class="form-control" id="codpostal" placeholder="Codigo - Postal">
    </div>
  </div>
  
		<div class="form-group">
		<label for="pais" class="col-sm-2 control-label">Pais</label>
		<div class="col-sm-10">
		<input type="text" name="pais" class="form-control" id="pais" placeholder="Pais">
    </div>
  </div>
  
		<div class="form-group">
		<label for="telemovel" class="col-sm-2 control-label">Telemovel</label>
		<div class="col-sm-10">
		<input type="text" name="telemovel" class="form-control" id="telemovel" placeholder="Telemovel">
    </div>
  </div>
  
		<div class="form-group">
		<label for="bi" class="col-sm-2 control-label">Bilhete de identidade</label>
		<div class="col-sm-10">
		<input type="text" name="bi" class="form-control" id="bi" placeholder="Bilhete de identidade">
    </div>
  </div>
		
		<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-10">
		<input type="password" name="password" class="form-control" id="password" placeholder="Password">
    </div>
  </div>
  
		<div class="form-group">
		<label for="rpassword" class="col-sm-2 control-label">Repetir Password</label>
		<div class="col-sm-10">
		<input type="password" name="rpassword" class="form-control" id="rpassword" placeholder="Repetir Password">
    </div>
  </div>
 
  </div>
		
	
	<input name="submeter" type="submit" value="Efectuar Registo"/>
</form>
	
<?php

	
	
	
	$conn=mysqli_connect ("localhost", "root", "12345", "projeto");
	if(!$conn){
	die("Could not connect".mysqli_connect_error() );
	}
	
	
	$hashed_password = crypt($_POST["password"]);
	//echo $hashed_password;
	
	if(isset($_POST['submeter'])){
	
	$sql="insert into clientes (FirstName, LastName, email, morada, Cod_Postal, Pais, Telemovel, BI, Password) values('".$_POST["name"]."', '".$_POST["apelido"]."', '".$_POST["email"]."', '".$_POST["morada"]."', '".$_POST["codpostal"]."','".$_POST["pais"]."','".$_POST["telemovel"]."','".$_POST["bi"]."','".crypt($_POST["password"])."');";
    
	
	$connect=mysqli_query($conn, $sql);
	
	if($connect){
		?>
		<div class="alert alert-success">
		<strong>Successo!</strong> 	Registado com sucesso!
	</div>
		<?php
	}else{
		?>
		<div class="alert alert-danger">
		<strong>Erro!</strong> Não foi possível registar-se com sucesso!
    </div>
	<?php
	
	}
	
	
	

require './PHPMailer/PHPMailerAutoload.php';         // set the path


$mail = new PHPMailer;

$mail->SMTPDebug = 4;                               // Enable verbose debug output


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'laboratorio.de.programacao@gmail.com';                   // SMTP username
$mail->Password = '20071993';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('laboratorio.de.programacao@gmail.com', 'Mailer');
$mail->addAddress($_POST["email"],$_POST["name"]);     // Add a recipient

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/var/www/Lab/projeto/teste.jpg', 'new.jpg');    // Optional name
//$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Registo efectuado com sucesso!';
$mail->Body    = 'Bem vindo à sobrilho, o seu registo foi efectuado com sucesso!';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}




/*

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require './PHPMailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 1;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
//$mail->Host = 'smtp.gmail.com';
$mail->Host = '127.0.0.1:8080/'; 
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "laboratorio.de.programacao@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "20071993";
//Set who the message is to be sent from
$mail->setFrom('laboratorio.de.programacao@gmail.com', 'So Brilho');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
//$mail->addAddress($_POST["email"],$_POST["name"]);
$mail->addAddress('zeecunha@hotmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

$mail->Body    = 'Bem vindo à sobrilho, o seu registo foi efectuado com sucesso!';
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
 */
 mysqli_close($conn);

}	

?>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
	
	
	<footer class="footer">
        <p>© 2016 José Cunha - 28018 - Universidade Fernando Pessoa - Laboratório de Programação</p>
      </footer>
 </div>
  </body>
</html>