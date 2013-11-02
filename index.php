<?php
$download_base = __DIR__ . '/download/';

function __autoLoad($class_name) {
	$filename = __DIR__ . '/' . $class_name . '.php';
	if (file_exists($filename)) {
		require_once $filename;
	}
}

if (empty($_SERVER['argv'][1])) {
	throw new InvalidArgumentException('set url argument');
}

$url = $_SERVER['argv'][1];

$fetcher = new Fetcher();
$body = $fetcher->get($url);

$html_parser = new HTMLParser($url, $body, new BaseUrl($url));

var_dump('base url', $html_parser->getBaseUrl());
var_dump('atags', $html_parser->getATags());

$project_base = $download_base . $html_parser->getBaseUrl();
if (!file_exists($project_base)) {
	mkdir($download_base . $html_parser->getBaseUrl(), 0755, true);
}

file_put_contents($project_base . basename($url), $body);
