<?php
namespace Vinicinho052\PostAndGetData;

class Request
{	
	#String separadas por | com nome dos Posts ou Gets 
	protected $requestMethodsNames;
	
	#Array com os dados de Post ou Get
	protected $requestMethodsValues = [];
	
	#set request methods e já faz a verificação
	public function setRequestNamesAndVerify($requestNames = '')
	{
        	$this->requestMethodsNames = $requestNames;
        	$this->verifyPostOrGet();
	}

	public function verifyPostOrGet() 
	{	
		if (strstr($this->requestMethodsNames, '|')) {
			$requestNames = explode('|', $this->requestMethodsNames);
			$this->setRequestValues($requestNames);
		} 
		
		return;
	}

	private function setRequestValues($requestNames) 
	{
		foreach ($requestNames as $requestName) {
			$this->requestMethodsValues[$requestName] = $_POST[$requestName] ?? $_GET[$requestName];
			
			#filtragem dos dados
			$this->requestMethodsValues[$requestName] = filter_var($this->requestMethodsValues[$requestName], FILTER_SANITIZE_STRING);
		}
	}
	
	public function setRequestNames($requestNames = '')
	{
        	$this->requestMethodsNames = $requestNames;
	}
	
	#Devolver os dados de Post ou Get
	public function getRequestValues()
	{
		if ($this->requestMethodsValues) {
			return $this->requestMethodsValues;
		}	
	}
}
