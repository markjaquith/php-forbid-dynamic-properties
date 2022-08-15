<?php

namespace App;

class FooGrandchild extends FooChild {
	public $grandchildPublic = 'grandchildPublic';
	protected $grandchildProtected = 'grandchildProtected';
	private $grandchildPrivate = 'grandchildPrivate';

	public function getGrandchildPublic() {
		return $this->grandchildPublic;
	}

	public function getGrandchildProtected() {
		return $this->grandchildProtected;
	}

	public function getGrandchildPrivate() {
		return $this->grandchildPrivate;
	}
}
