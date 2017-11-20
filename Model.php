<?php

class Model{

	private $values = [];

	public function __call($name, $args)
	{
		//DETECTANDO SE É GET OU SET
		$method = substr($name, 0, 3); //traz posicao 0,1 e 2
		//nome do campo que foi chamado
		$fieldName = substr($name, 3, strlen($name));

		switch ($method) {
			case 'get':
				return $this->values[$fieldName];
			break;
			
			case 'set':
				$this->values[$fieldName] = $args[0];
			break;
		}
	}

	public function setData($data = array())
	{
		//key = nome do campo, $value = valor do campo
		foreach ($data as $key => $value) {
			
			$this->{"set".$key}($value);

		}

	}

	public function getValues()
	{
		return $this->values;
	}



}

?>