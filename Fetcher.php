<?php

class Fetcher {

	protected $curl;

	public function __construct() {
		$this->init();
	}

	protected function init() {
		$this->curl = curl_init();

		curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($this->curl, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($this->curl, CURLOPT_HEADER, false);
		curl_setopt($this->curl, CURLOPT_HTTPGET, true);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($this->curl, CURLOPT_USERAGENT, 'PHPCrawler 1.0');
	}

	public function get($url, $referer = '') {
		curl_setopt($this->curl, CURLOPT_URL, $url);
		curl_setopt($this->curl, CURLOPT_REFERER, $referer);
		return curl_exec($this->curl);
	}

}
