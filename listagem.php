<!DOCTYPE html>

<html>
   <head>
      <meta charset="utf-8">
      <title>
	     Listagem de Funcionários
      </title>
   </head>
   <body>
      <center><strong>Listagem de Funcionários</strong></center> <br><br>
	  <?php
	     session_start();
		 echo '<center>';
		 echo '<table border = 1>';
		 echo '<tr>';
		 echo '<td>Funcionário</td>';
		 echo '<td>Mês</td>';
		 echo '<td>Ano</td>';
		 echo '<td>Horas trabalhadas</td>';
		 echo '<td>Valor da hora</td>';
		 echo '</tr>';
	     foreach($_SESSION['funcionarios'] as $x){
			echo '<tr>';  
		    echo '<td>'. $x['funcionario'] . '</td>';
			echo '<td align = center>'. $x['mes'] . '</td>';
			echo '<td align = center>'. $x['ano'] . '</td>';
			echo '<td align = right>'. $x['horas'] . '</td>';
			echo '<td align = right>'. $x['valor'] . '</td>';
			echo '</tr>';
		 }		
         echo '</table>';
		 echo '</center>';
	  ?>
	  <br><br>
	  <button onclick="history.back()"> Voltar </button> 
   </body>   
</html>