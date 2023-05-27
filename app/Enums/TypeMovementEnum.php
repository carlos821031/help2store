<?php

namespace App\Enums;

enum TypeMovementEnum: string
{
	case Entrada = 'entrada';
	case Salida = 'salida';
	case Interno = 'interno';
	case Devolucion = 'devolucion';
	case Merma = 'merma';


	/*
	** Si el tipo de movimiento provoca q el valor de la existencia disminulla
	*/
	public function isValueDesc(): bool
	{

		//return (($value === self::Salida->value)||($value === self::Interno->value)||($value === self::Devolucion->value));
		return (($this->value === self::Salida->value) || ($this->value === self::Interno->value) || ($this->value === self::Devolucion->value));
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
		return $this->value === self::Salida->value;
	}

	public function isInterno(): bool
	{
		return $this->value === self::Interno->value;
	}

	public function isDevolucion(): bool
	{
		return $this->value === self::Devolucion->value;
	}
}
