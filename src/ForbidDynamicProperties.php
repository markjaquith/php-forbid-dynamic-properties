<?php

namespace App;

trait ForbidDynamicProperties {
	public function __set($name, $value) {
		if (!static::_propertyExists($name)) {
			throw new \Exception('Dynamic properties are not allowed');
		}

		$this->$name = $value;
	}

	public function __get($name) {
		if (!static::_propertyExists($name)) {
			throw new \Exception('Dynamic properties are not allowed');
		}

		return $this->$name ?? null;
	}

	public function __isset($name) {
		if (!static::_propertyExists($name)) {
			throw new \Exception('Dynamic properties are not allowed');
		}
		
		return isset($this->$name);
	}

	public function __unset($name) {
		if (!static::_propertyExists($name)) {
			throw new \Exception('Dynamic properties are not allowed');
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