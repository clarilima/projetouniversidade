<?php
function conectar(){
	$conexao = mysqli_connect("localhost","root","","universidade") or die("Erro".mysqli_connect_error());
	return $conexao;

}
?>