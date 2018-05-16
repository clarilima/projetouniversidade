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
		$consulta = nomesUniversidade();

		if (isset($_SESSION['erro'])) {
	 echo "<script>".$_SESSION['erro']."</script>";
	 unset($_SESSION['erro']);
	}
	if (isset($_SESSION['sucesso'])) {
	 echo "<script>".$_SESSION['sucesso']."</script>";
	 unset($_SESSION['sucesso']);
	}
	?>
	<script type="text/javascript">
			function fMasc(objeto,mascara) {
				obj=objeto
				masc=mascara
				setTimeout("fMascEx()",1)
			}
			function fMascEx() {
				obj.value=masc(obj.value)
			}
			
			function mCPF(cpf){
				cpf=cpf.replace(/\D/g,"")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
				return cpf
			}
			function mCEP(cep){
				cep=cep.replace(/\D/g,"")
				cep=cep.replace(/^(\d{2})(\d)/,"$1$2")
				cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
				return cep
			}
		</script>

		<style type="text/css">
			/* FORMULARIO */
			input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.form div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

/* MENU */
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
.cor {
	color: red;
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
			<li><a href="cadastro.php" class="active">CADASTRO</a></li>
			<li><a href="index.php" >HOME</a></li>
			<li><a href="consultarCPF.php">GERAR BOLETO</a></li>
			<li><a href="infor.php">INFORMAÇÕES</a></li>
		</ul>
		<br><br>

		<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ALERTA
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">IMPORTANTE SOBRE O FORMULÁRIO:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Nenhum campo pode estar em branco</p>
        <p>Não aceitamos CPF's que já estão cadastrados</p>
        <p>Não aceitamos datas invalidas(exemplo: o dia de amanhã)</p>
        <h1>AGRADECEMOS A ATENÇÃO</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
        
      </div>
    </div>
  </div>
</div>
		
<div class="form">
	<form method="post" action="funcoes.php">
		<span class="cor">* Campo obrigatório</span>
		<br>
		
		Curso: 
		<select name="curso">
			<?php
			foreach ($consulta as $nome) {
				?>
				<option value="<?php echo utf8_encode($nome['id']); ?>"> <?php echo utf8_encode($nome['todos']);  ?></option>
				<?php   
			} ?>
		</select> <br>

		Nome:<span class="cor">*</span> <input type="text" name="nome"><br><br>
		Data de Nascimento <span class="cor">*</span><input type="date" name="dataNasc"><br><br>
		Sexo: <span class="cor">*</span> <br>
		Feminino <input type="radio" name="sexo" value="F"><br>
		Masculino <input type="radio" name="sexo" value="M"><br>
		<br>
		Cidade <span class="cor">*</span><input type="text" name="cidade"><br>
		Estado <span class="cor">*</span><input type="text" name="estado"><br>
		CEP: <span class="cor">*</span><input type="text" name="cep" maxlength="9" onkeydown="javascript: fMasc( this, mCEP );"><br>
		CPF <span class="cor">*</span><input type="text" name="cpf" maxlength="14" min="14" onkeydown="javascript: fMasc( this, mCPF );"><br>
		Quantidade de parcelas <span class="cor">*</span><br>
		<input type="number" name="parcelas" min="1"><br>
		<input type="hidden" name="status" value="PENDENTE">
		<input type="hidden" name="acao" value="cad">
		<input type="submit" value="Cadastrar">

	</form>
</div>


</body>
</html>