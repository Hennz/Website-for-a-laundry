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

    <title>Dados Aleatórios</title>

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
 
 <form class="form-horizontal"  action="testes.php" method="GET"  enctype="multipart/form-data" >
		<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Quantos dados aleatórios deseja criar?</label>
		<div class="col-sm-10">
		<input type="text" name="num" class="form-control" id="name" placeholder="Insira aqui o numero de dados">
    </div>
  </div>
 

		
		<input name="submeter" type="submit" value="Submeter"/>
   <br /><br />
</form>

<?php
   $array_nomes= array ("Pedro", "Joao", "Rafael", "Jose", "Joel");
   $array_apelidos = array ("Soares", "Cunha", "Reis", "Mota");
   $array_morada = array ("Rua de cima", "Travessa de barro", "Avenida da Boavista", "Rua da Madalena", "Travessa de ferro", "Avenida Central de la");
   $array_pais = array("Portugal", "Espanha", "Franca", "Italia");
   $array_material = array("Maquina de cortar relva", "Detergente para chao", "Lava vidros", "Vassouras", "Aspirador");
   $array_tipo = array("Limpeza", "Pos-Obras", "Jardinagem", "Engomadoria");
   
   

$conn=mysqli_connect ("localhost", "root", "12345", "projeto");
	if(!$conn){
	die("Could not connect".mysqli_connect_error() );
	}
	
	for($i=0; $i<$_GET['num'];$i++){
		shuffle($array_nomes);
		shuffle($array_apelidos);
		shuffle($array_morada);
		shuffle($array_material);
		shuffle($array_tipo);
	
			
		$sql="insert into clientes (FirstName, LastName, email, morada, Cod_Postal, Pais, Telemovel, BI, Password) values('".$array_nomes[0]."', '".$array_apelidos[0]."', '".$array_nomes[0].$array_apelidos[0].rand(0,999)."@hotmail.com"."', '".$array_morada[0]."', '".rand(1000,9999)."-".rand(100,999)."','".$array_pais[0]."','".rand(9100000001,969999999)."','".rand(00000000,999999999)."','".crypt("Ola1234")."');";
		//echo $sql;
		
		$sql1="insert into empregados (FirstName, LastName, email, morada, Cod_Postal, Pais, Telemovel, BI, Password,  Image, Vencimento) values('".$array_nomes[0]."', '".$array_apelidos[0]."', '".$array_nomes[0].$array_apelidos[0].rand(0,999)."@hotmail.com"."', '".$array_morada[0]."', '".rand(1000,9999)."-".rand(100,999)."','".$array_pais[0]."','".rand(9100000001,969999999)."','".rand(00000000,999999999)."','".crypt("Ola1234")."', '".$data."','".rand(450,1000)."');";
		//echo $sql1;
		
		$sql2="insert into stock (Material, Quantidade, Image) values('".$array_material[0]."', '".rand(1,10)."','".$data."');";
		//echo $sql2;
		
		$sql3="insert into administrador (Nome, Apelido, Morada, Email, Contacto, Password, Image) values('".$array_nomes[0]."', '".$array_apelidos[0]."', '".$array_morada[0]."','".$array_nomes[0].$array_apelidos[0].rand(0,999)."@hotmail.com"."','".rand(9100000001,969999999)."', '".crypt("Ola1234")."', '".$data."');";
		//echo $sql3;
		
		$sql4="insert into cliente_trabalho (Nome_do_Cliente, Morada, Contacto, Tipo_de_trabalho) values('".$array_nomes[0].$array_apelidos[0]."', '".$array_morada[0]."', '".rand(00000000,999999999)."', '".$array_tipo[0]."');";
		//echo $sql4;
		
		$sql5="insert into trabalhos (Nome_Cliente, Morada, Contacto, Tipo_de_trabalho, Materiais, Preco, Horas, Funcionario) values('".$array_nomes[0].$array_apelidos[0]."', '".$array_morada[0]."', '".rand(9100000001,969999999)."', '".$array_tipo[0]."', '".$array_material[0]."','".rand(40,500)."','".rand(1,5)."','".$array_nomes[0].$array_apelidos[0]."');";
		//echo $sql5;
		
		
		
		mysqli_query($conn, $sql);
		mysqli_query($conn, $sql1);
		mysqli_query($conn, $sql2);
		mysqli_query($conn, $sql3);
		mysqli_query($conn, $sql4);
		mysqli_query($conn, $sql5);


}	
	mysqli_close($conn);
	
	
?>
 </div>
</body>
</html>