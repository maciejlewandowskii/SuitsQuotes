<?php

namespace Maciejlewandowskii\SuitsQuotes\app;

class DataController
{
	protected static array $ColumTag = ["Quote", "Author", "Season", "Episode"];
	protected static string $File = "data/suitsquotes.db";

	public static function GetData(int $Limit, bool $random, string $Quote = '', string $Author = '', string $Season = '', string $Episode = ''): array {
		$Data = [];
		$FileArray = [];
		$File = fopen(__DIR__."/".self::$File, "r");
		while (($line = fgets($File)) !== false) {
			$FileArray[] = $line;
		}
		if($random) shuffle($FileArray);
		$i = 0;
		foreach($FileArray as $line) {
			if($i >= $Limit) break;
			$DataSplit = explode(":", trim($line));
			if((str_contains(trim(strtolower($DataSplit[0])), trim(strtolower($Quote))) || empty($Quote)) && (str_contains(trim(strtolower($DataSplit[1])), trim(strtolower($Author))) || empty($Author)) && (str_contains(trim(strtolower($DataSplit[2])), trim(strtolower($Season))) || empty($Season)) && (str_contains(trim(strtolower($DataSplit[3])), trim(strtolower($Episode))) || empty($Episode)))    {
				$Data[] = array_combine(self::$ColumTag, $DataSplit);
				$i++;
			}
		}
		return $Data;
	}
}