<?php

use App\Foo;

class UnsettableFoo extends Foo {
	public function unsetProtected() {
		unset($this->protected);
	}
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

test('Unsetting protected property still allows it to be set from within', function () {
	$foo = new UnsettableFoo;

	$foo->unsetProtected();
	$foo->setProtected('overridden');
	expect($foo->getProtected())->toBe('overridden');
});
