<?php

namespace Maciejlewandowskii\SuitsQuotes\app;

class DataController
{
	protected static array $ColumTag = ["Quote", "Author", "Season", "Episode"];
	protected static string $File = "data/suitsquotes.db";

	public static function GetData(int $MaxQuantity, string $Quote = null, string $Author = null, string $Season = null, string $Episode = null): array {
		$Data = [];
		$File = fopen(self::$File, "r");
		$i = 0;
		while (($line = fgets($File)) !== false && $MaxQuantity <= $i) {
			$DataSplit = explode(":", $line);
			if((str_contains(trim(strtolower($DataSplit[0])), trim(strtolower($Quote))) || is_null($Quote)) && (str_contains(trim(strtolower($DataSplit[1])), trim(strtolower($Author))) || is_null($Author)) && (str_contains(trim(strtolower($DataSplit[2])), trim(strtolower($Season))) || is_null($Season)) && (str_contains(trim(strtolower($DataSplit[3])), trim(strtolower($Episode))) || is_null($Episode)))    {
				$Data[] = array_combine(self::$ColumTag, $DataSplit);
				$i++;
			}
		}
		return $Data;
	}
}