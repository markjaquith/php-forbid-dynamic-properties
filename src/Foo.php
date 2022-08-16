<?php

namespace App;

class Foo {
	use ForbidDynamicProperties;

	public $public = 'public';
	protected $protected = 'protected';
	private $private = 'private';

	public function setProtected($newValue) {
		$this->protected = $newValue;
	}

	public function getProtected() {
		return $this->protected;
	}

	public function unsetProtected() {
		unset($this->protected);
	}

	public function getPrivate() {
		return $this->private;
	}

	public function getPublic() {
		return $this->public;
	}
}
