<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseUrl
 *
 * @author marcobehnke
 */
class BaseUrl {

	private $parsed_url;

	public function __construct($url) {
		$this->parsed_url = parse_url($url);
	}

	public function get() {
		return $this->getScheme()
				. $this->getHost()
				. $this->getPort()
				. '/';
	}

	protected function getPort($default = 80) {
		if (!empty($this->parsed_url['port'])) {
			$default = $this->parsed_url['port'];
		}
		return ':' . $default;
	}

	protected function getHost($default = '') {
		if (!empty($this->parsed_url['host'])) {
			$default = $this->parsed_url['host'];
		}
		return $default;
	}

	protected function getScheme($default = 'http') {
		if (!empty($this->parsed_url['scheme'])) {
			$default = $this->parsed_url['scheme'];
		}
		return $default . '://';
	}
}