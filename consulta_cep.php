<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Consulta de CEP</title>
</head>
<body>
	<h1>Consulta de CEP</h1>
	<form method="get" action="consulta_cep.php">
		<label for="cep">Digite o CEP:</label>
		<input type="text" name="cep" id="cep" maxlength="8">
		<button type="submit">Consultar</button>
	</form>
	<?php
	if (isset($_GET['cep'])) {
		$cep = $_GET['cep'];
		$url = "https://viacep.com.br/ws/$cep/json/";
		$resultado = file_get_contents($url);
		$endereco = json_decode($resultado);
		if (isset($endereco->erro)) {
			echo "<p>CEP não encontrado.</p>";
		} else {
			echo "<p>Endereço: " . $endereco->logradouro . ", " . $endereco->bairro . ", " . $endereco->localidade . " - " . $endereco->uf . "</p>";
		}
	}
	?>
</body>
</html>
