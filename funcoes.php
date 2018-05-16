<?php
@session_start();
include_once('conexao.php');

if(isset($_POST['acao'])){
	if ($_POST['acao'] == "cad") {
		cadastrarAluno();
	}
	if($_POST['acao'] == "consultarcpf"){
		buscarCpf(); 
	}	
}


if(isset($_GET['acao'])){

		if($_GET['acao'] == "sair"){
			sair();
		}
	}



function nomesUniversidade(){
$conn = conectar();
$sql = mysqli_query($conn,"SELECT CONCAT(nome_curso, ' - ',turno) AS todos, id_curso AS id FROM curso");
while($row = mysqli_fetch_assoc($sql)){
	$nomes[] = $row;
}
return $nomes;
mysqli_close($conn);
}

function atualizarQtd(){
$id = $_POST['curso'];
$conn = conectar();
$sql = mysqli_query($conn,"SELECT qtd_vagas FROM curso WHERE id_curso = $id");
while ($row = mysqli_fetch_assoc($sql)) {
	$qtdTotal = $row['qtd_vagas'] - 1;
}
$atualizar = mysqli_query($conn,"UPDATE curso SET qtd_vagas = $qtdTotal WHERE id_curso = $id");
mysqli_close($conn);
}

function cadastrarAluno(){
	$nome = $_POST['nome'];
	$id_curso = $_POST['curso'];
	$data = $_POST['dataNasc'];
	$cpf = $_POST['cpf'];
	$sexo = $_POST['sexo'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];
	$cep = $_POST['cep'];
	$parcela = $_POST['parcelas'];
	$status = $_POST['status'];
	$dataHoje = date('Y-m-d');
	$conn = conectar();
	$erro = false;
	$consultacpf = mysqli_query($conn,"SELECT a.id_curso, a.cpf, c.id_curso FROM aluno as a INNER JOIN curso as c ON a.id_curso = c.id_curso WHERE a.cpf = '$cpf'");
	$consulta = mysqli_query($conn,"SELECT qtd_vagas FROM curso WHERE id_curso = $id_curso");
	while ($row = mysqli_fetch_assoc($consulta)) {
		$resultado = $row;
	}
	if (empty($nome) || empty($data) || empty($cpf)) {
		$erro =  true;
		$_SESSION['erro'] = 'alert("Nenhum campo pode estar vazio")';
		header("Location:cadastro.php");
	}else if($resultado < 1){
		$erro = true;
		$_SESSION['erro'] = 'alert("Não há mais vagas para este curso")';
		header("Location:cadastro.php");
	}else if($consultacpf && ($consultacpf->num_rows > 0)){
		$erro = true;
		$_SESSION['erro'] = 'alert("O aluno já se encontra cadastrado")';
		header("Location:cadastro.php");
	}else if($parcela <= 0){
		$erro = true;
		$_SESSION['erro'] = 'alert("Quantidade de parcelas invalida")';
		header("Location:cadastro.php");
	}else if(strlen($cpf) < 14){
		$erro = true;
		$_SESSION['erro'] = 'alert("CPF invalido")';
		header("Location:cadastro.php");
	}else if($data >= $dataHoje){
		$erro = true;
		$_SESSION['erro'] = 'alert("Data invalida")';
		header("Location:cadastro.php");

	}
	if ($erro == false) {
		$sql = mysqli_query($conn,"INSERT INTO aluno VALUES(default,'$nome','$data','$cpf','$id_curso','$sexo','$cidade','$estado','$cep','$parcela','$status')");

		if (mysqli_insert_id($conn)) {
			atualizarQtd();
			$_SESSION['cpf'] = $cpf;
			$_SESSION['id_curso'] = $id_curso;
			$_SESSION['sucesso'] = 'alert("Cadastro realizado com sucesso")';
			header("Location:index.php");

		}else{
			$_SESSION['erro'] = 'alert("Cadastro não foi realizado com sucesso")';
			header("Location:cadastro.php");
		}
	}
mysqli_close($conn);

}

function consultarCurso(){
	$conn = conectar();
	$sql = mysqli_query($conn,"SELECT c.id_curso,c.nome_curso,c.turno,c.tipo_curso,c.cidade,c.qtd_vagas,c.preco_mensal,c.preco_curso, p.nome FROM curso AS c INNER JOIN professor AS p  WHERE c.id_professor = p.id_professor");
	while ($row = mysqli_fetch_assoc($sql)) {
		$consulta_final[] = $row;
	}
	return $consulta_final;
	mysqli_close($conn);
}

function consultarInformacoes($id){
  $conn = conectar();
  $sql = mysqli_query($conn,"SELECT c.nome_curso, d.nome, d.semestre, d.preco, d.horas FROM curso AS c INNER JOIN disciplina AS d ON d.id_curso = c.id_curso WHERE d.id_curso = $id ORDER BY d.semestre;");

  while ($row = mysqli_fetch_assoc($sql)) {
  	$c[] = $row;
  }
  return $c;
  mysqli_close($conn);
}

function DivisaoBoleto($cpf){
	$conn = conectar();
	$sql = mysqli_query($conn,"SELECT a.parcela,c.preco_curso FROM aluno AS a INNER JOIN curso AS c ON a.id_curso = c.id_curso WHERE a.cpf = '$cpf'");
	
	while($row = mysqli_fetch_assoc($sql)){
		$total = $row['preco_curso'] / $row['parcela'];
	}
		
	return $total;
	mysqli_close($conn);
}


function consultaParaOBoleto($cpf,$id){
	$conn = conectar();
	$sql = mysqli_query($conn,"SELECT a.nome,a.cpf,c.nome_curso,c.tipo_curso FROM aluno AS a INNER JOIN curso AS c ON a.id_curso = c.id_curso WHERE a.cpf = '$cpf' AND c.id_curso= $id") ;
	
	while ($row = mysqli_fetch_assoc($sql)) {
		$boleto[] = $row;
	}

	return $boleto;
	mysqli_close($conn);
} 

function buscarCpf(){
	$cpf = $_POST['cpf'];
	$conn = conectar();
	$erro = false;
	$sql = 	mysqli_query($conn,"SELECT cpf FROM aluno WHERE cpf ='$cpf'");
	if (empty($cpf)) {
		$erro = true;
		$_SESSION['erro'] = 'alert("Nenhum campo pode estar em branco")';
			header("Location: consultarCPF.php");
	}else if($sql && $sql->num_rows <= 0){
		$erro = true;
		$_SESSION['erro'] = 'alert("O aluno não se encontra cadastrado no sistema.")';
			header("Location: consultarCPF.php");
	}
	if($erro == false){
		$_SESSION['cpf'] = $cpf;
		header("Location: tabelaAluno.php");	

	}
	
}

function consultaTabelaAluno($cpf){
$conn = conectar();
$sql = mysqli_query($conn,"SELECT a.nome,a.cpf,a.parcela,a.status,c.nome_curso,c.preco_mensal FROM aluno AS a INNER JOIN curso AS c ON a.id_curso = c.id_curso WHERE a.cpf = '$cpf'");
while($row = mysqli_fetch_assoc($sql)) {
	$consultaTabela[] = $row;
}
return $consultaTabela;
}

function totalParaPagar($cpf){
$conn = conectar();
$sql = mysqli_query($conn,"SELECT a.parcela,c.preco_mensal FROM aluno AS a INNER JOIN curso AS c ON a.id_curso = c.id_curso WHERE a.cpf = '$cpf'");
while ($row = mysqli_fetch_assoc($sql)) {
	 	$conta = $row['parcela'] * $row['preco_mensal'];
	 }	
	 return $conta; 
}
function gerarParcelas($cpf){
	$conn = conectar();
	$sql = mysqli_query($conn,"SELECT parcela FROM aluno WHERE cpf = '$cpf'");
	while ($row = mysqli_fetch_assoc($sql)) {
		$parcela = $row['parcela'];
	}
	return $parcela;
}
function sair(){
		session_start();

		session_destroy();

		header("Location: consultarCPF.php");
}
?> 