<?php

namespace App;

class FooChild extends Foo {
	public $childPublic = 'childPublic';
	protected $childProtected = 'childProtected';
	private $childPrivate = 'childPrivate';

	public function getChildPublic() {
		return $this->childPublic;
	}

	public function getChildProtected() {
		return $this->childProtected;
	}

	public function getChildPrivate() {
		return $this->childPrivate;
	}
}
