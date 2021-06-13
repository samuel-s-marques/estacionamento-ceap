<?php
error_reporting(E_ERROR);

$login_cookie = $_COOKIE['username'];

?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<title>CEAP | Estacionamento</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="public/css/bootstrap.min.css">

	<script src="extensions/multiple-selection-row/bootstrap-table-multiple-selection-row.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<script type="text/javascript">

</script>

<body>
	<?php
		if (isset($login_cookie)){
			echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<span class="navbar-brand">Estacionamento CEAP</span>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Ativar navegação">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="/index.php">Home <span class="mr-only">(atual)</span></a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="php/cadastrar_dados.php">Cadastrar dados</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="php/acessar_dados.php">Acessar dados</a>
					</li>

					<li class="nav-item">	
						<a class="nav-link" href="php/atualizar_dados.php">Atualizar dados</a>
					</li>
				</ul>

				<form class="form-inline my-2 my-lg-0">
					<a id="perfil" href="php/perfil.php"><span class="navbar-text">Bem-vindo, ' . $login_cookie . '!</span></a>
				</form>
			</div>
		</nav>';
		} else {
			echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<span class="navbar-brand">Estacionamento CEAP</span>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Ativar navegação">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="mr-only">(atual)</span></a>
					</li>
				</ul>

				<form class="form-inline my-2 my-lg-0">
					<a id="perfil" href="admin.html"><span class="navbar-text">Bem-vindo(a), convidado(a)!</span></a>
				</form>
			</div>
		</nav>';
		}

	?>

<div class="container-fluid">
	<br>
	<div class="row">
		<div class="col-sm-3 d-flex">
			<div class="card card-body flex-fill">
				<h5 class="card-title">Valores</h5>
				<p class="card-text">Das sete até 14 horas - R$10,00<br>
					Das 15 até 23 horas - R$15,00<br>
					Das 24 até sete horas - R$20,00
				</p>
			</div>
		</div>

		<div class="col-sm-3 d-flex">
			<div class="card card-body flex-fill">
				<h5 class="card-title">Formas de pagamento</h5>
				<p class="card-text">Pelo aplicativo oficial do estabelecimento;<br>No caixa assistido; ou<br>Pelo totem de dentro do CEAP.</p>
			</div>
		</div>

		<div class="col-sm-3 d-flex">
			<div class="card card-body flex-fill">
				<h5 class="card-title">Endereço</h5>
				<p class="card-text">Praça Nina Rodrigues, 151/153 - Liberdade, São Paulo - SP, 01517-030</p>
				<a class="btn btn-primary" target="_blank" href="https://www.google.com.br/maps/place/INSS/@-23.5607163,-46.6351786,16z/">Acessar</a>
			</div>
		</div>

		<div class="col-sm-3 d-flex">
			<div class="card card-body flex-fill">
				<h5 class="card-title">Tipo do estacionamento</h5>
				<p class="card-text">Estacionamento fechado (com cobertura).</p><br>
				<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Ver imagem do estacionamento</button>
			</div>
		</div>
	</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<img src="https://images.pexels.com/photos/6517/parking-multi-storey-car-park.jpg" class="img-responsive" style="width: 100%;">
				</div>
			</div>
		</div>
	</div>
	<br>
	
	<div id="grafico_div"></div>

</div>

<script type="text/javascript" src="/public/js/graph.js"></script>
</body>
</html>
