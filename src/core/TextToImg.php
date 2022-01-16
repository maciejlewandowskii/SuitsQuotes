<?php

namespace Maciejlewandowskii\SuitsQuotes\core;

use Exception;
use JetBrains\PhpStorm\ArrayShape;

class TextToImg
{
	//returns base64 encoded image
	const RETURN_BASE64 = 0;

	/**
	 * @param string      $text_string
	 * @param int         $text_angle
	 * @param int         $text_padding
	 * @param int         $font_size
	 * @param string|null $font_ttf
	 * @param int         $returnType
	 * @return string
	 * @throws Exception
	 */
	public static function createImageFromText(string $text_string, int $text_angle = 0, int $text_padding = 10, int $font_size = 12, ?string $font_ttf = null, int $returnType = self::RETURN_BASE64): string
	{
		if ($font_ttf === null) {
			$font_ttf = dirname(__DIR__) .'/assets/fonts/arial.ttf';
		}
		else {
			$font_ttf = dirname(__DIR__) .'/assets/fonts/'. $font_ttf;
		}

		$the_box = self::calculateTextBox($text_string, $font_ttf, $font_size, $text_angle);
		$imgWidth = $the_box["width"] + $text_padding;
		$imgHeight = $the_box["height"] + $text_padding;

		$image = imagecreate($imgWidth, $imgHeight);
		imagefill($image,0,0, imagecolorallocate($image,255,255,255));

		$color = imagecolorallocate($image,0,0,0);
		imagettftext($image,
			$font_size,
			$text_angle,
			$the_box["left"] + ($imgWidth / 2) - ($the_box["width"] / 2),
			$the_box["top"] + ($imgHeight / 2) - ($the_box["height"] / 2),
			$color,
			$font_ttf,
			$text_string);

		//image is created => choose how it will be returned
		if ($returnType == 0) {
			// Let's start output buffering.
			ob_start();
			//This will normally output the image, but because of ob_start(), it won't.
			imagejpeg($image);
			//Instead, output above is saved to $contents
			$contents = ob_get_contents();
			//End the output buffer.
			ob_end_clean();
			imagedestroy($image);

			return $contents;
		}

		if ($returnType == 1) {
			// Let's start output buffering.
			ob_start();
			//This will normally output the image, but because of ob_start(), it won't.
			imagejpeg($image);
			//Instead, output above is saved to $contents
			$contents = ob_get_contents();
			//End the output buffer.
			ob_end_clean();
			imagedestroy($image);

			return '<img src="data:image/jpeg;base64,'.base64_encode($contents).'">';
		}

		if ($returnType == 2) {
			return $image;
		}

		throw new Exception('Unknown return type.');
	}

	/**
	 * @param $text
	 * @param $fontFile
	 * @param $fontSize
	 * @param $fontAngle
	 * @return array
	 */
	#[ArrayShape(["left" => "float|int", "top" => "float|int", "width" => "mixed", "height" => "mixed", "box" => "array|false"])] private static function calculateTextBox($text, $fontFile, $fontSize, $fontAngle): array
	{
		/************
		simple function that calculates the *exact* bounding box (single pixel precision).
		The function returns an associative array with these keys:
		left, top:  coordinates you will pass to imagettftext
		width, height: dimension of the image you have to create
		 *************/
		$rect = imagettfbbox($fontSize,$fontAngle,$fontFile,$text);
		$minX = min(array($rect[0],$rect[2],$rect[4],$rect[6]));
		$maxX = max(array($rect[0],$rect[2],$rect[4],$rect[6]));
		$minY = min(array($rect[1],$rect[3],$rect[5],$rect[7]));
		$maxY = max(array($rect[1],$rect[3],$rect[5],$rect[7]));

		return array(
			"left"   => abs($minX) - 1,
			"top"    => abs($minY) - 1,
			"width"  => $maxX - $minX,
			"height" => $maxY - $minY,
			"box"    => $rect
		);
	}
}