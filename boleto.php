<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<?php
	@session_start();
	include_once('funcoes.php');
	$cpf = $_SESSION['cpf'];
	//$id_curso = $_SESSION['id_curso'];
	$consulta = consultaTabelaAluno($cpf);
	$total = totalParaPagar($cpf);
	
	?>
 
	<script>
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
</script>
<style type="text/css">


	.containe{
		background-color: #fff;
		border-radius: 5px;
		width: 850px;
		height: 250px;
	}

	.tabela{
		background-color: #fff;
	}

	hr {
		border-style: solid none;
		border-width: 1px 0;
		margin: 5px 0;
		width: 864px;
	}

</style>
</head>
<body onload="printDiv('boleto')">
<div id="boleto">
		
			<table border="1" width=80% cellspacing="10">
				 <tr>
					<td><h4><?php echo date('d/m/Y'); ?></h4></td>
					<td align="center" colspan="2"><h4>Universidade Particular do Ceará</h4></td>

					  </tr>
					 
				
				<tr>
					<td>Nome</td>
					<td>CPF</td>
					<td>Curso</td>
				</tr>
				<?php foreach ($consulta as $boleto) {		
				?>
				<tr>
			

					<td><?php echo utf8_encode($boleto['nome']); ?></td>
					<td><?php echo utf8_encode($boleto['cpf']); ?></td>
					<td><?php echo utf8_encode($boleto['nome_curso']); ?></td>
				</tr>
				<?php } ?>
				
				 <tr><td>Valor total a se pagar: </td></tr>
				<tr>
					<td><?php echo "R$ ".number_format($boleto['preco_mensal'], 2, ',','.');?></td>
				</tr>
				<tr><td><img src="boleto.png"></td></tr>

		</table>

		<p></p>

		
	</div>
	<a href="consultarCPF.php" style="text-decoration: none">Voltar</a>

</body>
</html>