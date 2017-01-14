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
            <li ><a href="add_trabalhos.php">Adicionar Trabalhos</a></li>
            <li ><a href="trabalhos.php">Listar Trabalhos</a></li>
			<li ><a href="add_funcionario.php">Adicionar Funcionário</a></li>
			<li ><a href="listar_funcionario.php">Listar Funcionários</a></li>
			<li ><a href="add_stock.php">Adicionar Stock</a></li>
			<li ><a href="listar_stock.php">Listar Stock</a></li>
			<li class="active"><a href="add_administrador.php">Adicionar administrador</a></li>
			<li ><a href="listar_pedidos_clientes.php">Verificar pedidos</a></li>
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
<br/>
<br/>  
<br/> 

<div class="container">

<form class="form-horizontal"  action="add_administrador.php" method="POST"  enctype="multipart/form-data" >
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
		<label for="telemovel" class="col-sm-2 control-label">Telemovel</label>
		<div class="col-sm-10">
		<input type="text" name="telemovel" class="form-control" id="telemovel" placeholder="Telemovel">
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

		<div class="form-group">
		<label for="fotografia" class="col-sm-2 control-label">Fotografia</label>
		<div class="col-sm-10">
		<input type="file" name="photo" class="form-control" id="fotografia" placeholder="Fotografia">
    </div>
  </div>
		
	
	<input name="submeter" type="submit" value="Adicionar administrador"/>
</form>



<?php

	$conn=mysqli_connect ("localhost", "root", "12345", "projeto");
	if(!$conn){
	die("Could not connect".mysqli_connect_error() );
	}
	
	$data=file_get_contents($_FILES["photo"]["tmp_name"]);
	$data=mysqli_real_escape_string($conn, $data);
	
	$hashed_password = crypt($_POST["password"]);
	//echo $hashed_password;
	
	if(isset($_POST['submeter'])){
	
	$sql="insert into administrador (Nome, Apelido, Morada, Email, Contacto, Password, Image) values('".$_POST["name"]."', '".$_POST["apelido"]."', '".$_POST["morada"]."','".$_POST["email"]."','".$_POST["telemovel"]."', '".crypt($_POST["password"])."', '".$data."');";
    //echo $sql;
	
	
	$connect=mysqli_query($conn, $sql);
	
	if($connect){
		?>
		<div class="alert alert-success">
		<strong>Successo!</strong> Administrador inserido com sucesso!
	</div>
		<?php
	}else{
		?>
		<div class="alert alert-danger">
		<strong>Erro!</strong> O administrador não foi inserido com sucesso!
    </div>
	<?php
	
	}
	
	mysqli_close($conn);

}	
	
	
?>

<footer class="footer">
        <p>© 2016 José Cunha - 28018 - Universidade Fernando Pessoa - Laboratório de Programação</p>
      </footer>
 </div>
</body>
</html>