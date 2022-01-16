<?php

use Maciejlewandowskii\SuitsQuotes\core\Response;
use Maciejlewandowskii\SuitsQuotes\core\Route;
use Maciejlewandowskii\SuitsQuotes\app\DataController;

Route::Make('GET', '/api/v1/quotes', function () {
	if(isset($_GET['random']) && $_GET['random'] == true)   $random = true;
	else $random = false;
	$limit = $_GET['limit'] ?? 10;
	$author = $_GET['author'] ?? '';
	$season = $_GET['season'] ?? '';
	$episode = $_GET['episode'] ?? '';
	$quote = $_GET['quote'] ?? '';
	return Response::Return(DataController::GetData($limit, $random, $quote, $author, $season, $episode));
});