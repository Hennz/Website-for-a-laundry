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
	  </head>  
  
<body>

<?php
    //Conex?o ? base de dados
    $conn = mysqli_connect("localhost","root","12345","projeto");
    if(!$conn){
        die("could not connect".mysqli_connect_error());
    }

	$sql2 = "SELECT * FROM empregados;";
	$result2 = mysqli_query($conn,$sql2);	
   
    /***************
    * Gerar o PDF  *
    ***************/
    //informa??o da empresa
    
    //Tabela com produtos
    $html = "<table width='100%' style='border: 1px solid #333; border-collapse: collapse;'>".
                "<tr>".
                    "<th width='10%' style='text-align: left; border: 1px solid #333;'>ID Funcionario</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>Primeiro Nome</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>Apelido</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>Email</th>".
					"<th width='10%' style='text-align: left; border: 1px solid #333;'>Morada</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>Cod_Postal</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>Pais</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>Telemovel</th>".
					"<th width='10%' style='text-align: left; border: 1px solid #333;'>BI</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>vencimento</th>".
                   
                "</tr>";
    //Listar os valores
	
   for($i=0;$row=mysqli_fetch_assoc($result2);$i++){
        $html.= "<tr>";
			$html.= "<td style='text-align: left; border: 1px solid #333;'>".$row['empregadoID']."</td>";
            $html.= "<td style='text-align: left; border: 1px solid #333;'>".$row['FirstName']."</td>";
            $html.= "<td style='text-align: right; border: 1px solid #333;'>".$row['LastName']."</td>";
            $html.= "<td style='text-align: right; border: 1px solid #333;'>".$row['email']."</td>";   
			$html.= "<td style='text-align: left; border: 1px solid #333;'>".$row['morada']."</td>";
            $html.= "<td style='text-align: right; border: 1px solid #333;'>".$row['Cod_Postal']."</td>";
            $html.= "<td style='text-align: right; border: 1px solid #333;'>".$row['Pais']."</td>";
			$html.= "<td style='text-align: right; border: 1px solid #333;'>".$row['Telemovel']."</td>";
            $html.= "<td style='text-align: left; border: 1px solid #333;'>".$row['BI']."</td>";
			$html.= "<td style='text-align: right; border: 1px solid #333;'>".$row['Vencimento']."</td>";
            
            
        $html.= "</tr>";
    }
    $html.= "</table>";
    mysqli_close($conn);
    include("./mpdf60/mpdf.php");
    $mpdf=new mPDF('c','A4','','',32,25,47,47,10,10);
    $mpdf->mirrorMargins = 1;
    $mpdf->WriteHTML($html);
    $mpdf->Output();
    exit;
    /***************
    * Acaba o PDF  *
    ***************/
?>


</body>
</html>	