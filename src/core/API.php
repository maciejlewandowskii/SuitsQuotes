<?php

namespace Maciejlewandowskii\SuitsQuotes;

class API
{
	public function Start() {
		$this->importEndpoints();
	}

	protected function importEndpoints() {
		$endpoints = glob(__DIR__ . '/EndPoints/*.php');
		foreach ($endpoints as $endpoint) {
			require_once $endpoint;
		}
	}
}