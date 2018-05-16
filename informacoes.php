<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<?php
	include_once('funcoes.php');
	@$id = $_GET['id'];
	$consultaInfor = consultarInformacoes($id);
	

	?>

	<style type="text/css">
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

		
		/* TABELA */ 
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
}
	</style>
</head>
<body>	
<ul>
			<li><a href="cadastro.php">CADASTRO</a></li>
			<li><a href="index.php" class="active">HOME</a></li>
			<li><a href="consultarCPF.php">GERAR BOLETO</a></li>
			
		</ul>
	<br>
<table border="1" id="customers">
	<tr class="dif">
		<td>Nome da Disciplina</td>
		<td>Semestre</td>
		<td>Horas da Disciplina</td>
				
	</tr>
<?php
foreach ($consultaInfor as $c) {

?>
<tr class="dif">
	<td><?php echo utf8_encode($c['nome']); ?></td>
	<td><?php echo utf8_encode($c['semestre']); ?></td>
	<td><?php echo utf8_encode($c['horas']); ?></td>
	

</tr>

<?php } ?>
</table>
  
  <br><br>
  
</body>
</html>