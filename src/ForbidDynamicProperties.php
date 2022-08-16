<?php

namespace App;

trait ForbidDynamicProperties {
	public function __set($name, $value) {
		if (!static::_propertyExists($name)) {
			throw new \Exception('Setting dynamic properties is forbidden');
		} elseif ($this->_propertyCanBeAccessed($name)) {
			$this->$name = $value;
		}
	}

	public function __get($name) {
		if (!static::_propertyExists($name)) {
			throw new \Exception('Accessing dynamic properties is forbidden');
		} elseif ($this->_propertyCanBeAccessed($name)) {
			return $this->$name ?? null;
		}

		return null;
	}

	public function __isset($name) {
		if (!static::_propertyExists($name)) {
			throw new \Exception('Checking dynamic properties is forbidden');
		} elseif ($this->_propertyCanBeAccessed($name)) {
			return isset($this->$name);
		}

		return false;
	}

	public function __unset($name) {
		if (!static::_propertyExists($name)) {
			throw new \Exception('Unsetting dynamic properties is forbidden');
		} elseif ($this->_propertyCanBeAccessed($name)) {
			unset($this->$name);
		}
	}

	protected function _wasCalledFromInside(): bool {
		$backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 4);

		$class = $backtrace[3]['class'];

		return is_a(static::class, $class, true);
	}

	protected function _propertyCanBeAccessed($name): bool {
		return $this->_isPublicProperty($name) || $this->_wasCalledFromInside();
	}

	protected function _isPublicProperty(string $name): bool {
		$reflection = new \ReflectionClass($this);
		$publicProperties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);
		$publicProperties = array_map(fn ($p) => $p->getName(), $publicProperties);

		return false !== array_search($name, $publicProperties);
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