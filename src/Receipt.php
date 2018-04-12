<?php
namespace Vinicinho052\PostAndGetDataReceipt;

class Receipt
{	
	#String separadas por | com nome dos Posts ou Gets 
	protected $postNames;
	#Array com os dados de Post ou Get
	protected $dados = [];
	
	public function __construct($post_names = '') 
	{
		$this->postNames = $post_names;
		$this->verificarPostOuGet();
	}
	
	public function verificarPostOuGet() 
	{	
		if (strstr($this->postNames, '|')) {
			$array = explode('|', $this->postNames);
			$total_enviado = count($array);
			$i = 0;
			while ($i < $total_enviado) {
				#Utilizando operador null colesce
				#$this->dados["{$array[$i]}"] = $_POST["{$array[$i]}"] ?? $_GET["{$array[$i]}"] ?? '';
				
				$this->dados["{$array[$i]}"] = ($_POST["{$array[$i]}"])? $_POST["{$array[$i]}"] : '';
				
				#Para filtragem de strings.
				$this->dados["$array[$i]"] = filter_var($this->dados["$array[$i]"],FILTER_SANITIZE_STRING);
				$i++;
			}
		} else {
			return '';
		}
	}
	
	//Devolver os dados de Post ou Get
	public function getData()
	{
		if ($this->dados) {
			return $this->dados;
		}	
	}
}