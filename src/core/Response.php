<?php

namespace Maciejlewandowskii\SuitsQuotes;

use JetBrains\PhpStorm\NoReturn;
use JsonException;

class Response
{
	public static int $StatusCode = 200;
	public static string $ErrorMessage = "";

	public static function Return(array $ResponseBody): string   {
		http_response_code(self::$StatusCode);
		try {
			return json_encode(array(
				"ServerTime" => date("dmYTHis"),
				"Status" => self::$StatusCode,
				"ErrorMessage" => self::$ErrorMessage,
				"ResponseBody" => $ResponseBody
			), JSON_THROW_ON_ERROR);
		} catch (JsonException $e) {
			return "Server Error: $e";
		}
	}

	#[NoReturn] public static function ReturnError(int $StatusCode, string $ErrorMessage): void {
		self::$StatusCode = $StatusCode;
		self::$ErrorMessage = $ErrorMessage;
		die(self::Return(array()));
	}
}