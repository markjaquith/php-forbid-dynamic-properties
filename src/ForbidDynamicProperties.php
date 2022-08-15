<?php

namespace App;

trait ForbidDynamicProperties {
	public function __set($name, $value) {
		if (!static::_propertyExists($name)) {
			throw new \Exception('Setting dynamic properties is forbidden');
		}

		$this->$name = $value;
	}

	public function __get($name) {
		if (!static::_propertyExists($name)) {
			throw new \Exception('Accessing dynamic properties is forbidden');
		}

		return $this->$name ?? null;
	}

	public function __isset($name) {
		if (!static::_propertyExists($name)) {
			throw new \Exception('Checking dynamic properties is forbidden');
		}
		
		return isset($this->$name);
	}

	public function __unset($name) {
		if (!static::_propertyExists($name)) {
			throw new \Exception('Unsetting dynamic properties is forbidden');
		}

		unset($this->$name);
	}

	private static function _propertyExists(string $name): bool {
		$class = static::class;

		do {
			$exists = property_exists($class, $name);
			if ($exists) {
				return true;
			}
		} while($class = get_parent_class($class));

		return false;
	}
}