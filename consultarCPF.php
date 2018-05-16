<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
  	<script src="jquery-3.3.1.min.js"></script>
  	<script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
  	<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
	<?php
	@session_start();

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
			function mTel(tel) {
				tel=tel.replace(/\D/g,"")
				tel=tel.replace(/^(\d)/,"($1")
				tel=tel.replace(/(.{3})(\d)/,"$1)$2")
				if(tel.length == 9) {
					tel=tel.replace(/(.{1})$/,"-$1")
				} else if (tel.length == 10) {
					tel=tel.replace(/(.{2})$/,"-$1")
				} else if (tel.length == 11) {
					tel=tel.replace(/(.{3})$/,"-$1")
				} else if (tel.length == 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				} else if (tel.length > 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				}
				return tel;
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
			<li><a href="cadastro.php">CADASTRO</a></li>
			<li><a href="index.php" >HOME</a></li>
			<li><a href="consultarCPF.php" class="active">GERAR BOLETO</a></li>
			<li><a href="infor.php">INFORMAÇÕES</a></li>
		</ul>
		<br><br>
		<div class="form">
	<form method="post" action="funcoes.php">
		Digite o seu cpf: <br>
		<input type="text" name="cpf" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );"><br>
	    <input type="hidden" name="acao" value="consultarcpf">
	    <input type="submit" value="Enviar">
		
	</form>
	</div>

	
	
</body>
</html>