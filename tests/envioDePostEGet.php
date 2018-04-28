<?php 
require '../vendor/autoload.php';

use Vinicinho052\PostAndGetDataReceipt\Receipt;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	#Nome dos campos do formulário para recuperar os dados.
        #se você não passar nenhum campo no construtor pode. 
	$receiptDatas = new Receipt();
	#se fazer depois com:
	#$receiptDatas->setDataAndVerify('nome|mensagem');
	$receiptDatas->setData('nome|mensagem');
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
