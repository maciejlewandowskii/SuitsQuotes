<?php

namespace Maciejlewandowskii\SuitsQuotes;

class Route
{
	public static array $UsedRoute = array();

	public static function Make(string $Method, string $URL, callable $CallBack, callable $AsyncCallBack = NULL): void    {
		$Variables = self::URLCheck($URL);
		if($Variables !== FALSE && $_SERVER['REQUEST_METHOD'] === strtoupper($Method))   {
			self::$UsedRoute[$_SERVER['REQUEST_URI']] = $_SERVER['REQUEST_METHOD'];
			echo call_user_func_array($CallBack, $Variables);
			header('Connection: close');
			header('Content-Length: '.ob_get_length());
			ob_end_flush();
			@ob_flush();
			flush();
			$AsyncCallBack();
		}
	}

	private static function RouteFound(): bool
	{
		return array_key_exists($_SERVER['REQUEST_URI'], self::$UsedRoute) && self::$UsedRoute[$_SERVER['REQUEST_URI']] === $_SERVER['REQUEST_METHOD'];
	}

	private static function URLCheck(string $URL): array|bool  {
		$URLRequested = explode('/', $_SERVER['REQUEST_URI']);
		$URLChecked = explode('/', $URL);
		$Variables = array();
		foreach($URLRequested as $Key => $Value)   {
			if($Value !== $URLChecked[$Key]) {
				return False;
			}
			/** @noinspection RegExpRedundantEscape */
			if(preg_match('!\{\{(\w+)\}\}!', $URLChecked[$Key])) {
				$Variables[] = $Value;
			}
		}
		return count($URLRequested) === count($URLChecked) ? $Variables : False;
	}
}