<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
  	<script src="jquery-3.3.1.min.js"></script>
  	<script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
  	<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
	<title></title>
	<?php
	include_once('funcoes.php');
	$consulta = consultarCurso();
	if (isset($_SESSION['erro'])) {
	 echo "<script>".$_SESSION['erro']."</script>";
	 unset($_SESSION['erro']);
	}
	if (isset($_SESSION['sucesso'])) {
	 echo "<script>".$_SESSION['sucesso']."</script>";
	 unset($_SESSION['sucesso']);
	}


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
}
*/



	</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src="logo.png" width="30%"></a>
    </div>
    
  </div>
</nav>



	
		<ul>
			<li><a href="cadastro.php">CADASTRO</a></li>
			<li><a href="index.php" class="active">HOME</a></li>
			<li><a href="consultarCPF.php">GERAR BOLETO</a></li>
			<li><a href="infor.php">INFORMAÇÕES</a></li>
		</ul>
	
<!-- SLIDE -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="capa1.png" alt="First slide" width="1100" height="550">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="capa2.png" alt="Second slide" width="1100" height="550">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="capa3.png" alt="Third slide" width="1100" height="550">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	
    <div class="container">
<table class="table table-hover">
	<thead>
	<tr>
		<th scope="col">CURSO</th>
		<th scope="col">TURNO</th>
		<th scope="col">TIPO DO CURSO</th>
		<th scope="col">CIDADE</th>
		<th scope="col">PROFESSOR</th>
		<th scope="col">QUANTIDADE DE VAGAS</th>		
		<th scope="col">VALOR TOTAL DO CURSO</th>

	</tr>
</thead>
	
	<tbody>
	<?php
	foreach ($consulta as $atributos) {
		$id = $atributos['id_curso'];
	?>
	<tr>
		<td> <a href="informacoes.php?id= <?php echo $id ?>" style="text-decoration: none"> <?php echo utf8_encode($atributos['nome_curso']); ?> </a> </td>
		<td> <?php echo utf8_encode($atributos['turno']); ?></td>
		<td> <?php echo utf8_encode($atributos['tipo_curso']); ?></td>
		<td><?php echo utf8_encode($atributos['cidade']); ?></td>
		<td> <?php echo utf8_encode($atributos['nome']); ?></td>
		<td><?php echo utf8_encode($atributos['qtd_vagas']); ?></td>
		<td><?php echo 'R$ '. number_format($atributos['preco_curso'], 2, ',','.');?></td>

</tr>
<?php } ?>
</tbody>
</table>
</div>




<footer class="container-fluid text-center">
  <a href="index.php" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Universidade Particular do Ceará (85) 98844-3432</p>
</footer>

</body>
</html>