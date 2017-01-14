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
			<li class="active"><a href="listar_funcionario.php">Listar Funcionários</a></li>
			<li ><a href="add_stock.php">Adicionar Stock</a></li>
			<li ><a href="listar_stock.php">Listar Stock</a></li>
			<li ><a href="add_administrador.php">Adicionar administrador</a></li>
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

<?php

	$conn = mysqli_connect("localhost","root","12345","projeto");
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 

{
				echo '<table class="table table-striped">';
				echo "<tr>";
				echo "<th>ID Funcionário</th>";
				echo "<th>Primeiro Nome</th>";
				echo "<th>Apelido</th>";
				echo "<th>Email</th>";
				echo "<th>Morada</th>";
				echo "<th>Cod_Postal</th>";
				echo "<th>Pais</th>";
				echo "<th>Telemovel</th>";
				echo "<th>BI</th>";
				echo "<th>Image</th>";
				echo "<th>vencimento</th>";
				echo "<th>Editar</th>";
			echo "</tr>";
			$sql2 = "SELECT * FROM empregados";
			
			$result2 = mysqli_query($conn,$sql2);
	
			while($row = mysqli_fetch_assoc($result2)){
				echo "<tr>";
					echo "<td>".$row['empregadoID']."</td>";
					echo "<td>".$row['FirstName']."</td>";
					echo "<td>".$row['LastName']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['morada']."</td>";
					echo "<td>".$row['Cod_Postal']."</td>";
					echo "<td>".$row['Pais']."</td>";
					echo "<td>".$row['Telemovel']."</td>";
					echo "<td>".$row['BI']."</td>";
					echo '<td><img src= "data:image/jpg;base64,'.base64_encode($row['Image']).'"width="50" height="50"></td>';
					echo "<td>".$row['Vencimento']."€"."</td>";
					echo "<td><a href='editarFuncionario.php?id=".$row['empregadoID']."'>Editar</a></td>";
				echo "</tr>";
			}
			echo "</table>";
}


?>
<br/>  
<br/>  
<br/>  
<br/>


<a class="btn btn-default" href="funcionario_pdf.php" role="button">Mostrar PDF</a>
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