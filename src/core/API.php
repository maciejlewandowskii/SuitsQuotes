<?php

namespace Maciejlewandowskii\SuitsQuotes\core;

class API
{
	public function Start() {
		$this->importEndpoints();
	}

	protected function importEndpoints() {
		$endpoints = glob(dirname(__DIR__, 2) . '/EndPoints/*.php');
		foreach ($endpoints as $endpoint) {
			require_once $endpoint;
		}
	}
}