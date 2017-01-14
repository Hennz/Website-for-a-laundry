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

    <title>S�Brilho</title>

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
          <a class="navbar-brand" href="index.php">S� BRILHO </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="add_trabalhos_cliente.php">Efetuar pedido</a></li>
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
	
<form class="form-horizontal"  action="add_trabalhos_cliente.php" method="POST"  enctype="multipart/form-data" >

	<div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome do Cliente </label>
	<div class="col-sm-10">
    <input type="text" name= "nome" class="form-control" id="nome" placeholder="Nome do Cliente">
	</div>
	</div>
	
	<div class="form-group">
    <label for="morada" class="col-sm-2 control-label">Morada</label>
	<div class="col-sm-10">
    <input type="text" name= "morada" class="form-control" id="morada" placeholder="Morada">
	</div>
	</div>
  
	<div class="form-group">
    <label for="contacto" class="col-sm-2 control-label">Contacto</label>
	<div class="col-sm-10">
    <input type="text" name= "contacto" class="form-control" id="contacto" placeholder="Contacto">
    </div>
	</div>
  
	<div class="form-group">
    <label for="tipo" class="col-sm-2 control-label">Tipo de trabalho</label>
	<div class="col-sm-10">
    <select name="tipo">
			<option value="Limpeza">Limpeza</option>
			<option value="P�s-Obra">P�s-Obra</option>
			<option value="Jardinagem">Jardinagem</option>
			<option value="Engomadoria">Engomadoria</option>
			
	</select>
    </div>
	</div>
	
    <input name="submeter" type="submit" value="Adicionar trabalho"/>
</form>
	
<br/>  



<?php

$conn=mysqli_connect ("localhost", "root", "12345", "projeto");
	if(!$conn){
	die("Could not connect".mysqli_connect_error() );
	}
	
    
	if(isset($_POST['submeter'])){
	
	$sql="insert into cliente_trabalho (Nome_do_Cliente, Morada, Contacto, Tipo_de_trabalho) values('".$_POST["nome"]."', '".$_POST["morada"]."', '".$_POST["contacto"]."', '".$_POST["tipo"]."');";
	
	//echo $sql;
	$connect=mysqli_query($conn, $sql);
	
	if($connect){
		?>
		<div class="alert alert-success">
		<strong>Successo!</strong> Ir� ser contactado em breve!
	</div>
		<?php
	}else{
		?>
		<div class="alert alert-danger">
		<strong>Erro!</strong> O pedido de trabalho n�o foi inserido com sucesso!
    </div>
	<?php
	
	}
	
	mysqli_close($conn);

}	
	
	
?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<footer class="footer">
        <p>� 2016 Jos� Cunha - 28018 - Universidade Fernando Pessoa - Laborat�rio de Programa��o</p>
      </footer>
 </div>
</body>
</html>