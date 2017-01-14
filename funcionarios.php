<?php
if(!function_exists('hash_equals')) {
  function hash_equals($str1, $str2) {
    if(strlen($str1) != strlen($str2)) {
      return false;
    } else {
      $res = $str1 ^ $str2;
      $ret = 0;
      for($i = strlen($res) - 1; $i >= 0; $i--) $ret |= ord($res[$i]);
      return !$ret;
    }
  }
}

if(!function_exists ('password_verify')){
	function password_verify($password,$hash){
		return (crypt($password,$hash) === $hash);
	}
}
?>

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
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">Sobre nós</a></li>
            <li ><a href="contact.php">Contacto</a></li>
			<li class="active"><a href="areapessoal.php">Àrea pessoal</a></li>
          </ul>
		  
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
<br/>  
<br/>  
<br/>  
<br/>
<br/>  
<br/> 

<div class="container">

<form class="form-signin" action="funcionarios.php" method="POST"  enctype="multipart/form-data" >
	  
        <h2 class="form-signin-heading">Por favor, faça o Login!</h2>
		<br/>  
		<br/>
		<br/>  
		<br/>
		
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required="" autofocus="">
		<br/>  
		<br/>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="Password" id="Password" class="form-control" placeholder="Password" required="">
		<br/>  
		<br/>
		<br/>  
		<br/>
       
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>

<?php

	$conn = mysqli_connect("localhost","root","12345","projeto");
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "select Password from empregados where email= '".$_POST['email']."'";
//echo $sql;
$result = mysqli_query($conn,$sql);

if($result){
	
	$row = mysqli_fetch_assoc($result);
	$passworddb=$row['Password'];
	if(password_verify($_POST['Password'],$passworddb)){
	
	echo $htmlHeader;
  while($stuff){
    echo $stuff;
  }
  echo "<script>window.location = 'funcionarios2.php'</script>";
	}
}	

?>
<br/>
<br/>  
<br/> 
<br/>
<br/>  
<br/> 
<footer class="footer">
        <p>© 2016 José Cunha - 28018 - Universidade Fernando Pessoa - Laboratório de Programação</p>
      </footer>
 </div>
</body>
</html>