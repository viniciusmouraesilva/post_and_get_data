<?php
require_once "bootstrap.php";

use PHPUnit\Framework\TestCase;
use Vinicinho052\PostAndGetDataReceipt\Receipt;

require dirname(__DIR__) . "/src/Receipt.php";

class ReceiptTest extends TestCase
{	
	//Teste individuais
	//Recebendo nada no construtor

	public function testSetNullConstrutor()
	{
		$receipt = new Receipt();
		$this->assertAttributeEquals("", "dataNames", $receipt); 	
	}

	public function testSetDataNames()
	{
		$receipt = new Receipt();
		$receipt->setData('arroz|feijao');
		$this->assertAttributeEquals("arroz|feijao", "dataNames", $receipt);
	}
}
