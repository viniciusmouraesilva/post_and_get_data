<?php
namespace Vinicinho052\PostAndGetDataReceipt;

class Receipt
{	
	#String separadas por | com nome dos Posts ou Gets 
	protected $dataNames;
	#Array com os dados de Post ou Get
	protected $dados = [];
	
	public function __construct($data_names = '') 
	{
		$this->dataNames = $data_names;
		$this->verificarPostOuGet();
	}
	
	public function verificarPostOuGet() 
	{	
		if (strstr($this->dataNames, '|')) {
			$array = explode('|', $this->dataNames);
			$total_enviado = count($array);
			$i = 0;
			while ($i < $total_enviado) {
				#Utilizando operador null colesce para POST ou GET
				$this->dados["{$array[$i]}"] = $_POST["{$array[$i]}"] ?? $_GET["{$array[$i]}"] ?? '';
				#Filtragem dos dados.
				$this->dados["$array[$i]"] = filter_var($this->dados["$array[$i]"],FILTER_SANITIZE_STRING);
				$i++;
			}
		} else {
			return '';
		}
	}
	
	//Seta data
	public function setDataAndVerify($data_names = '')
	{
        	$this->dataNames = $data_names;
        	$this->verificarPostOuGet();
	}
	
	public function setData($data_names = '')
	{
        	$this->dataNames = $data_names;
	}
	
	//Devolver os dados de Post ou Get
	public function getData()
	{
		if ($this->dados) {
			return $this->dados;
		}	
	}
}