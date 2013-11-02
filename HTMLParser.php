<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HTMLParser
 *
 * @author marcobehnke
 */
class HTMLParser {

	protected $url;

	protected $body;

	/**
	 *
	 * @var BaseUrl
	 */
	protected $baseurl_generator;

	public function __construct($url, $body, BaseUrl $baseurl_generator) {
		$this->url = $url;
		$this->body = $body;
		$this->baseurl_generator = $baseurl_generator;
	}

	public function getImgs() {
		
	}

	public function getLinkRelStylesheets() {

	}

	public function getScriptSrcs() {

	}

	public function getATags() {
		preg_match_all('|<a.+href="(.+)"|iU', $this->body, $atags);
		return $atags[1];
	}

	public function getBaseUrl() {
		$base_url = $this->parseBaseHref();
		if (!$base_url) {
			$base_url = $this->baseurl_generator->get();
		}
		return $base_url;
	}

	protected function parseBaseHref() {
		preg_match('|<base.+href="(.+)">|iU', $this->body, $base_href);
		$base_href = !empty($base_href) && !empty($base_href[1]) ? $base_href[1] : null;
	}
}
