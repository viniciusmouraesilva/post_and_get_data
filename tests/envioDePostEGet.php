<?php 
require '../vendor/autoload.php';

use Vinicinho052\PostAndGetDataReceipt\Receipt;

if ($_SERVER['REQUEST_METHOD']==='POST') {
	//Nome dos campos do formulário para recuperar os dados.
	$receiptDatas = new Receipt('nome|mensagem');
	print_r($receiptDatas->getData());
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