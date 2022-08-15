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
});

test('FooGrandchild data is correct', function () {
	$foo = new FooGrandchild;

	expect($foo->getPrivate())->toBe('private');
	expect($foo->getProtected())->toBe('protected');
	expect($foo->getPublic())->toBe('public');
});