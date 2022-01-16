<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use Maciejlewandowskii\SuitsQuotes\core\Route;
use Maciejlewandowskii\SuitsQuotes\app\DataController;
use Maciejlewandowskii\SuitsQuotes\core\TextToImg;

Route::Make('GET', '/api/v1/quotes/img', function () {
	header('Content-Type: image/jpeg');
	if(isset($_GET['random']) && $_GET['random'] == true)   $random = true;
	else $random = false;
	$author = $_GET['author'] ?? '';
	$season = $_GET['season'] ?? '';
	$episode = $_GET['episode'] ?? '';
	$quote = $_GET['quote'] ?? '';
	$Quote = DataController::GetData(1, $random, $quote, $author, $season, $episode)[0]["Quote"];
	$Author = "-  ".DataController::GetData(1, $random, $quote, $author, $season, $episode)[0]["Author"];
	$img = imagecreatefromstring(TextToImg::createImageFromText("“".$Quote."„", 0, 110, 24, null, TextToImg::RETURN_BASE64));
	$img2 = imagecreatefromstring(TextToImg::createImageFromText($Author, 0, 30, 12, null, TextToImg::RETURN_BASE64));
	imagealphablending($img, false);
	imagesavealpha($img, true);
	imagecopymerge($img, $img2, 50, 85, 0, 0, imagesx($img2), imagesy($img2), 100);
	ob_start();
	imagejpeg($img);
	$contents = ob_get_contents();
	ob_end_clean();
	imagedestroy($img);
	return $contents;
});