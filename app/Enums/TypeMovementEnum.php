<?php

namespace App\Enums;

enum TypeMovementEnum: string
{
	case Entrada = 'entrada';//Devolver un array(entrada, recibe) o array(salida,entrega) que sea 1 - entrada(para tipo de mov) y entrega(para el trabajador que realiza la operacion)
	case Ventas = 'salida';

	/*
	** Si el tipo de movimiento provoca q el valor de la existencia disminulla
	*/
	public function isValueDesc(): bool
	{
		return ($this->value === self::Ventas->value);
	}

	/*
	** Si el tipo de movimiento provoca q el valor de la existencia aumente
	*/
	public function isValueAsc(): bool
	{
		return (($this->value === self::Entrada->value));
	}

	public function isEntrada(): bool
	{
		return $this->value === self::Entrada->value;
	}

	public function isSalida(): bool
	{
		return $this->value === self::Ventas->value;
	}	
}
