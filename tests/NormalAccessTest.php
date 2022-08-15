<?php

use App\Foo;
use App\FooChild;
use App\FooGrandChild;

test('Foo data is correct', function () {
	$foo = new Foo;

	expect($foo->getPrivate())->toBe('private');
	expect($foo->getProtected())->toBe('protected');
	expect($foo->getPublic())->toBe('public');
});

test('FooChild data is correct', function () {
	$foo = new FooChild;

	expect($foo->getPrivate())->toBe('private');
	expect($foo->getProtected())->toBe('protected');
	expect($foo->getPublic())->toBe('public');
	expect($foo->getChildPrivate())->toBe('childPrivate');
	expect($foo->getChildProtected())->toBe('childProtected');
	expect($foo->getChildPublic())->toBe('childPublic');
});

test('FooGrandchild data is correct', function () {
	$foo = new FooGrandchild;

	expect($foo->getPrivate())->toBe('private');
	expect($foo->getProtected())->toBe('protected');
	expect($foo->getPublic())->toBe('public');
	expect($foo->getChildPrivate())->toBe('childPrivate');
	expect($foo->getChildProtected())->toBe('childProtected');
	expect($foo->getChildPublic())->toBe('childPublic');
	expect($foo->getGrandchildPrivate())->toBe('grandchildPrivate');
	expect($foo->getGrandchildProtected())->toBe('grandchildProtected');
	expect($foo->getGrandchildPublic())->toBe('grandchildPublic');
});