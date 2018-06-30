<?php 
require '../vendor/autoload.php';

use Vinicinho052\PostAndGetData\Request;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$receipt = new Request;
	#atribuir dados da solicitação
	$receipt->setRequestNames('nome|mensagem');
	#e depois verificar
	$receipt->verifyPostOrGet();
	print_r($receipt->getRequestValues());
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<form method="POST">
		<p><input type="text" name="nome"></p>
		<p><textarea name="mensagem"></textarea></p>
		<button>Enviar</button>
	</form>
</body>
</html>
