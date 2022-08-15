<?php

namespace App;

class Foo {
	use ForbidDynamicProperties;

	public $public = 'public';
	protected $protected = 'protected';
	private $private = 'private';
	protected $protectedUndefined;

	public function setProtected($newValue) {
		$this->protected = $newValue;
	}

	public function getProtected() {
		return $this->protected;
	}

	public function getProtectedUndefined() {
		return $this->protectedUndefined;
	}

	public function getPrivate() {
		return $this->private;
	}

	public function getPublic() {
		return $this->public;
	}
}
