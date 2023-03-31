<!DOCTYPE html>

<html>
   <head>
      <meta charset="utf-8">
      <title>
	     Folha de Pagamento
      </title>
   </head>
   <body>
      <center><strong>Folha de Pagamento</strong></center> <br><br>
	  <table>
		    <tr>
			   <td>Funcionário</td>
			   <td>
			   <?php
			      echo strtoupper($_POST['funcionario']);
			   ?>
			   </td>
			</tr>
			<tr>
			   <td>Horas trabalhadas</td>
			   <td align = "right">
			   <?php
			      echo $_POST['horas'];
			   ?>
			   </td>
			</tr>
			<tr>
			   <td>Valor da Hora</td>
			   <td align = "right">
			   <?php
			      echo $_POST['valor'];
			   ?>
			   </td>
			</tr>	
			<tr>
			   <td>Salário bruto</td>
			   <td align = "right">
			   <?php
			   $horas = intval($_POST['horas']);
			   $valor = floatval($_POST['valor']);
			   $bruto = $horas * $valor;
			   echo "$bruto";
			   ?>
			   </td>
			</tr>
			<tr>
			   <td>IR</td>
			   <td align = "right">
			   <?php
			   if($bruto <= 1903.98){
			      $ir = 0;	   
			   }
			   else{
			      if($bruto <= 2826.65){
				     $ir = ($bruto * 7.5/100) - 142.80;
				  }		
				  else{
				     if($bruto <= 3751.05){
				        $ir = ($bruto * 15/100) - 354.80;		 
					 }	
                     else{
					    if($bruto <= 4664.68){
						   $ir = ($bruto * 22.5/100) - 636.13;   	
						}
						else{
					       $ir = ($bruto * 27.5/100) - 869.36;		
						}
					 }						 
				  }					  
			   }
			   echo "$ir";
			   ?>
			   </td>
			</tr>
			<tr>
			   <td>INSS</td>
			   <td align = "right">
			   <?php
			   if($bruto <= 1212){
			      $inss = $bruto * 7.5/100;    	   
			   }
			   else{
			      if($bruto <= 2427.35){
				     $inss = $bruto * 9/100; 	  
				  }	
				  else{
				     if($bruto <= 3641.03){
				        $inss = $bruto * 12/100;		 
					 }
				     else{
					    $inss = $bruto * 14/100;	 
					 }						 
				  }					  
			   }
			   echo "$inss"
			   ?>			   
			   </td>
			</tr>
			<tr>
			   <td>FGTS</td>
			   <td align = "right">
			   <?php
			      $fgts = $bruto * 8.5/100;
				  echo "$fgts";
			   ?>
			   </td>
			</tr>
			<tr>
			   <td>Salário líquido</td>
			   <td align = "right">
			   <?php
			      $liquido = $bruto - $ir - $inss;
				  echo "$liquido"; 	
			   ?>
			   </td>
			</tr>
	   </table>	 
	   <?php
	      echo '<br><br>';
		  session_start();
	      $funcionariosTemp = array();
		  $funcionariosTemp['funcionario'] = strtoupper($_POST['funcionario']);
		  $funcionariosTemp['mes'] = intval($_POST['mes']);
		  $funcionariosTemp['ano'] = intval($_POST['ano']);
		  $funcionariosTemp['horas'] = intval($_POST['horas']);
		  $funcionariosTemp['valor'] = floatval($_POST['valor']);
		  array_push($_SESSION['funcionarios'], $funcionariosTemp);		  
	   ?>
	  <br><br>
	  <button onclick="history.back()"> Voltar </button> 
   </body>
</html>