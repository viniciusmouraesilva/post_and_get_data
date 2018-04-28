<?php 
require '../vendor/autoload.php';

use Vinicinho052\PostAndGetDataReceipt\Receipt;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	#se você não passar nenhum campo no construtor de ínicio. 
	$receiptDatas = new Receipt();
	#setar os valores mas não verificar.
	$receiptDatas->setData('nome|mensagem');
	#verificar valores quando quiser.
	$receiptDatas->verificarPostOuGet();
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
