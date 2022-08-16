<?php

use App\Foo;
use App\FooChild;
use App\FooGrandchild;

trait UnsetsProtected {
	public function unsetProtected() {
		unset($this->protected);
	}
}

class UnsettableFoo extends Foo {
	use UnsetsProtected;
}

class UnsettableChildFoo extends FooChild {
	use UnsetsProtected;
}

class UnsettableGrandchildFoo extends FooGrandchild {
	use UnsetsProtected;
}

test('UnsettableFoo extends Foo', function () {
	expect(is_a(UnsettableFoo::class, Foo::class, true))->toBe(true);
});

test('Unsetting protected property makes it return null', function () {
	$foo = new UnsettableFoo;

	$foo->unsetProtected();
	expect($foo->protected)->toBeNull();
});

test('Unsetting protected property does not allow it to be publicly set', function () {
	$foo = new UnsettableFoo;

	$foo->unsetProtected();
	expect($foo->getProtected())->toBeNull();
	$foo->protected = 'overridden';
	expect($foo->getProtected())->toBeNull();
});

test('Unsetting protected property still allows it to be set from within', function ($foo) {
	$foo->unsetProtected();
	$foo->setProtected('overridden');
	expect($foo->getProtected())->toBe('overridden');
})->with([
	'Foo' => new UnsettableFoo,
	'FooChild' => new UnsettableChildFoo,
	'FooGrandchild' => new UnsettableGrandchildFoo,
]);
