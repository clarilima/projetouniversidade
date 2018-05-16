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
			<li><a href="consultarCPF.php">GERAR BOLETO</a></li>
			<li><a href="infor.php" class="active">INFORMAÇÕES</a></li>
		</ul>
		<br><br>
<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          A Universidade - Início
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      	<img src="foto1.png" alt="..." class="img-thumbnail" width="200" height="200">

        <p>A Universidade Particular do Ceará é uma autarquia vinculada ao Ministério da Educação. Nasceu como resultado de um amplo movimento de opinião pública. Foi criada pela Lei nº 2.373, em 16 de dezembro de 1955, e instalada em 25 de junho do ano seguinte.</p>

<p>No início, sob a direção de seu fundador, Prof. Manoel Soares, era constituída pela Escola de Agronomia, Faculdade de Direito, Faculdade de Medicina e Faculdade de Farmácia e Odontologia.</p>

<p>Sediada em Fortaleza, Capital do Estado, a UPC é um braço do sistema do Ensino Superior do Ceará e sua atuação tem por base todo o território cearense, de forma a atender às diferentes escalas de exigências da sociedade.</p>


<p>A Universidade Particular do Ceará, que há mais de 50 anos mantém o compromisso de servir à região, sem esquecer o caráter universal de sua produção, chega hoje com praticamente todas as áreas do conhecimento representadas em seus campi.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        	Identificação da Instituição
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        
<p>Identificação da Instituição: Universidade Particular do Ceará (UPC)</p>

<p>Nome e Cargo do Dirigente: Prof. Dr. Henry de Holanda Campos – Reitor</p>

<p>Natureza Jurídica: Autarquia Federal de Regime Especial</p>

<p>Vinculação Ministerial: Ministério da Educação</p>

<p>Número do CNPJ: 07.272.636/0001- 31</p>

<p>Nome do Órgão e Código no SIAFI: Universidade Federal do Ceará – 153045</p>

<p>Endereço da Sede: Avenida da Universidade, nº 2853 - Bairro Benfica - CEP 60020-181 - Fortaleza - Ceará - Brasil - Ver mapa</p>

<p>Fone: (85) 3366 7301 / 3366 7302  -  FAX: (85) 3366 7303</p>

<p>Situação da Unidade: em funcionamento</p>

<p>Função de Governo Predominante: Educação</p>

<p>Código e Nome do Órgão: 26.233 – Universidade Federal do Ceará</p>

<p>Tipos de Atividades Exercidas – Áreas de Atuação: Ensino, investigação científica e extensão</p>

<p>Norma de Criação: Lei Federal nº 2.373 de 16/12/1954, publicada em 23/12/1954</p>
<p>
Regimento/Estatuto: Portaria MEC nº 2.777 de 27/09/2002, publicada em 30/09/2002</p>

<p>Finalidade da Unidade: Formar profissionais da mais alta qualificação, gerar e difundir conhecimentos, preservar e divulgar os valores artísticos e culturais, constituindo-se em instituição estratégica para o desenvolvimento do Ceará e do Nordeste.</p>

<p>Normas que estabelecem a Estrutura Orgânica e Normas Regimentais Constantes no Regimento Interno e no Estatuto Geral (aprovado pelo Conselho Universitário nas sessões de 18, 21 e 22/12/1998 e pelo Ministério da Educação e do Desporto sob a Portaria nº 592, de 23/03/1999). Publicação no DOU do Estatuto do órgão: 26/03/1999.</p>
      </div>
    </div>
  </div>
  
</div>

<br><br>
<div class="container">
  <div class="row">
    <div class="col"><img src="grid1.png" width="250" height="250"></div>
    <div class="col"><img src="grid2.png" width="250" height="250"></div>
    <div class="w-100"></div>
    <div class="col"><img src="grid3.png" width="250" height="250"></div>
    <div class="col"><img src="grid4.png" width="250" height="250"></div>
  </div>
</div>
</body>
</html>