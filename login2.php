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
            <li><a href="add_trabalhos_cliente.php">Efetuar pedido</a></li>
            
          </ul>
		  
        </div><!--/.nav-collapse -->
      </div>
    </nav>

</div>
<br/>  
<br/>  
<br/>  
<br/>
<br/>  
<br/> 
<div class="container">

<br/>
<br/>
<br/>
<br/>

 <h2>Clientes</h2><br/><br/>
   <p>Para nós é uma honra termos sido eleitos para prestar os nossos serviços, por entidades que exigem qualidade e responsabilidade. Temos orgulho pela relação de confiança que conseguimos estabelecer e estamos abertos para qualquer sugestão que possa melhorar ainda mais a prestação dos nossos serviços.<br/>
A proposta da nossa equipa é realizar um trabalho de excelência, cumprindo prazos e contratos em vigor.<br/><br/><br/>

OBRIGADO a todos!
    </p>
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
<br/>


<footer class="footer">
        <p>© 2016 José Cunha - 28018 - Universidade Fernando Pessoa - Laboratório de Programação</p>
      </footer>
 </div>
</body>
</html>












