<?php
    //Conex?o ? base de dados
    $conn = mysqli_connect("localhost","root","12345","projeto");
    if(!$conn){
        die("could not connect".mysqli_connect_error());
	
    }
	


	$sql2 = "SELECT * FROM trabalhos;";
	$result2 = mysqli_query($conn,$sql2);	
   
    /***************
    * Gerar o PDF  *
    ***************/
    //informa??o da empresa
    
    //Tabela com produtos
    $html = "<table width='100%' style='border: 1px solid #333; border-collapse: collapse;'>".
                "<tr>".
                    "<th width='10%' style='text-align: left; border: 1px solid #333;'>IDtrabalho</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>Nome Cliente</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>Morada</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>Contacto</th>".
					"<th width='10%' style='text-align: left; border: 1px solid #333;'>Tipo de trabalho</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>Materiais</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>Preco</th>".
                    "<th width='10%' style='text-align: right; border: 1px solid #333;'>Horas</th>".
					"<th width='10%' style='text-align: left; border: 1px solid #333;'>Funcionario</th>".
                    
                   
                "</tr>";
    //Listar os valores
	
   for($i=0;$row=mysqli_fetch_assoc($result2);$i++){
        $html.= "<tr>";
			$html.= "<td style='text-align: left; border: 1px solid #333;'>".$row['idtrabalho']."</td>";
            $html.= "<td style='text-align: left; border: 1px solid #333;'>".$row['Nome_Cliente']."</td>";
            $html.= "<td style='text-align: right; border: 1px solid #333;'>".$row['Morada']."</td>";
            $html.= "<td style='text-align: right; border: 1px solid #333;'>".$row['Contacto']."</td>";   
			$html.= "<td style='text-align: left; border: 1px solid #333;'>".$row['Tipo_de_trabalho']."</td>";
            $html.= "<td style='text-align: right; border: 1px solid #333;'>".$row['Materiais']."</td>";
            $html.= "<td style='text-align: right; border: 1px solid #333;'>".$row['Preco']."</td>";
			$html.= "<td style='text-align: right; border: 1px solid #333;'>".$row['Horas']."Horas"."</td>";
            $html.= "<td style='text-align: left; border: 1px solid #333;'>".$row['Funcionario']."</td>";
		
            
            
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
