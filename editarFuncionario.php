<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
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
<body>
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

        <?php
        //Conexão à base de dados
        $conn = mysqli_connect("localhost","root","12345","projeto");
        if(!$conn){
            die("could not connect".mysqli_connect_error());
        }
		
		
        
        //Ir buscar os dados do cliente
        $query = "select FirstName, LastName, email, morada, Cod_Postal, Pais, Telemovel, BI, Vencimento from empregados where empregadoID='".$_GET["id"]."';";
		
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
		$id = $_GET["id"];
		//echo $id;
        $nome = $row["FirstName"];
        $apelido = $row["LastName"];
        $email = $row["email"];
        $morada = $row["morada"];
        $cod_postal = $row["Cod_Postal"];
		$pais = $row["Pais"];
		$telemovel = $row["Telemovel"];
		$bi = $row["BI"];
		$vencimento = $row["Vencimento"];
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-md-5'>
                    <form onsubmit="return validate_form(this)" action="editarFuncionario.php" method="POST">
                        Nome:        <input type="text" name="nome"         <?php echo "value='".$nome."'";?>><br/>
                        Apelido:      <input type="text" name="apelido"       <?php echo "value='".$apelido."'";?>><br/>
                        Email:        <input type="text" name="email"         <?php echo "value='".$email."'";?>><br/>
                        Morada:<input type="text" name="morada" <?php echo "value='".$morada."'";?>><br/>
                        Código Postal:      <input type="text" name="cod_postal"        <?php echo "value='".$cod_postal."'";?>><br/>
						País:      <input type="text" name="pais"        <?php echo "value='".$pais."'";?>><br/>
						Telemovel:      <input type="text" name="telemovel"        <?php echo "value='".$telemovel."'";?>><br/>
						BI:      <input type="text" name="bi"        <?php echo "value='".$bi."'";?>><br/>
						Vencimento:      <input type="text" name="vencimento"        <?php echo "value='".$vencimento."'";?>><br/>
						<input type="text" name = "id" <?php echo "value='".$id."'";?>  readonly>
						
						<input name="updDados" type="submit" value="Editar Funcionário"/>
                        
                    </form><br/>
                </div>
            </div>
            
        
		
		
		
		
        <?php
		//echo $id;
		
		
		$aeiou = ($_POST['nome']!='' && isset($_POST['nome']) && $_POST['apelido']!='' && isset($_POST['apelido']) && $_POST['email']!='' && isset($_POST['email']) && $_POST['morada']!='' && isset($_POST['morada']) && $_POST['cod_postal']!='' && isset($_POST['cod_postal']) && $_POST['pais']!='' && isset($_POST['pais']) && $_POST['telemovel']!='' && isset
		($_POST['telemovel']) && $_POST['bi']!='' && isset($_POST['bi']) && $_POST['vencimento']!='' && isset($_POST['vencimento']) && $_POST['id']!='');
		
		//echo $aeiou;
		
        if ( $aeiou){
           
		   //Verificar os campos
        $nome = $_POST["nome"];
		//echo $nome;
        $apelido = $_POST["apelido"];
		//echo $apelido;
        $email = $_POST["email"];
		//echo $email;
        $morada = $_POST["morada"];
		//echo $morada;
        $cod_postal = $_POST["cod_postal"];
		//echo $cod_postal;
		$pais = $_POST["pais"];
		//echo $pais;
		$telemovel = $_POST["telemovel"];
		//echo $telemovel;
		$bi = $_POST["bi"];
		//echo $bi;
		$vencimento = $_POST["vencimento"];
		//echo $vencimento;
		$id = $_POST["id"];
		//echo $id;
		
            //Update os valores
			$sql = "UPDATE empregados SET FirstName='".$nome."', LastName='".$apelido."', email='".$email."', morada='".$morada."', Cod_Postal='".$cod_postal."', Pais='".$pais."', Telemovel='".$telemovel."', BI='".$bi."', Vencimento='".$vencimento."' WHERE empregadoID='".$id."';";
			//echo $sql;
            $abc= mysqli_query($conn, $sql);
			echo $abc;
            mysqli_close($conn);
			
			?>
		<div class="alert alert-success">
		<strong>Successo!</strong> Editado com sucesso!
	</div>
		<?php
            
        }else if(isset($_POST['updDados'])){
           ?>
		<div class="alert alert-danger">
		<strong>Erro!</strong> Não Foi possivel editar o funcionário!
    </div>
	<?php
        }

        
        ?>
    </div>
	<footer class="footer">
        <p>© 2016 José Cunha - 28018 - Universidade Fernando Pessoa - Laboratório de Programação</p>
      </footer>
 </div>
</body>
</html>
