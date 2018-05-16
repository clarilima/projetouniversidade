<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8_general_ci">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
  	<script src="jquery-3.3.1.min.js"></script>
  	<script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
  	<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
	<title></title>
	<?php
	include_once('funcoes.php');
	$cpf = $_SESSION['cpf'];
	$consulta = consultaTabelaAluno($cpf);
	//$total = totalParaPagar($cpf);
	$total = DivisaoBoleto($cpf);
	$parc = gerarParcelas($cpf);
	?>

	<style type="text/css">
		/* TABELA  
		#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
} */
/*MENU*/
		ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #e7e7e7;
    background-color: #f3f3f3;
}


li {
    float: left;
}

li a {
    display: block;
    color: #666;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-family: Berlin Sans FB;
}

li a:hover:not(.active) {
    background-color: #ddd;
}

li a.active {
    color: white;
    background-color: #5F9EA0;
}


	</style>
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src="logo.png" width="30%"></a>
    </div>
    
  </div>
</nav>
	<ul>
		<li><a href="funcoes.php?acao=sair" class="active">SAIR</a></li>
		
	</ul>
<br><br>

	<table class="table table-hover">

		<tr class="table-active">
			<td>Nome:</td>
			<td>CPF</td>
			<td>Curso</td>
			<td>Quantidade de Parcelas</td>
			
		</tr>

		<?php foreach ($consulta as $v) {
			
		?>

		<tr class="table-primary">
		<td><?php echo utf8_encode($v['nome']); ?></td>
		<td><?php echo utf8_encode($v['cpf']); ?></td>
		<td><?php echo utf8_encode($v['nome_curso']); ?></td>
		<td><?php echo utf8_encode($v['parcela']); ?></td>
			
		</tr>
		<?php }?>
	</table>
	<?php 
	for ($i=1; $i <=$parc ; $i++) { 
	
	?>

<table class="table table-hover">
	<br><br>
	<tr class="table-active">
		<td>Mês/Competência</td>
		<td>Valor mensal do curso</td>
		<td>Status</td>
	</tr>
	<?php 
	foreach ($consulta as $valor) {
	
	?>
	<tr class="table-primary">
		
		<td><?php echo $i . "/". utf8_encode($valor['parcela']); ?></td>
		<td><?php echo "R$ " .number_format($total, 2, ',','.'); ?></td>
		<td><?php echo utf8_encode($valor['status']) ?></td>

	</tr>
	<?php } ?>
	<tr class="table-primary"><td colspan="3"><a href="boleto.php?cpf= <?php echo $cpf ?>">GERAR BOLETO</a></td></tr>
</table>

<?php } ?>
<br><br>
</body>
</html>