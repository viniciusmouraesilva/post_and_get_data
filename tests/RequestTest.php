<?php
require_once "bootstrap.php";

use PHPUnit\Framework\TestCase;
use Vinicinho052\PostAndGetData\Request;

require dirname(__DIR__) . "/src/Request.php";

class RequestTest extends TestCase
{	
	//Teste individuais
	
	#testar atribuição dos valores
	public function testSetRequestNames()
	{
		$receipt = new Request;
		$receipt->setRequestNames('arroz|feijao');
		$this->assertAttributeEquals("arroz|feijao", "requestMethodsNames", $receipt);
	}
}
