<?php

namespace app\helpers;

class Unit
{
	private static $celsiusUnit = '&#8451;'; 
	public static function celsius($value, $name)
	{
		$arr = static::getAttributeArray($name);

		if (null === $value) {
			$arr['value'] = $value;
		} else {
			$arr['value'] = intval($value) . ' ' . static::$celsiusUnit;
		}

		return $arr;
	}

	private static function getAttributeArray($name)
	{
		return [
			'attribute' => $name,
			'format' => 'html',
		];
	}
}