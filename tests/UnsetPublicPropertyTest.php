<?php

use App\Foo;
use App\FooChild;
use App\FooGrandchild;

test('Unsetting public properties in Foo', function () {
	$foo = new Foo;

	expect($foo->getPublic())->toBe('public');
	unset($foo->public);
	expect($foo->public)->toBe(null);
	$foo->public = 'public';
	expect($foo->getPublic())->toBe('public');
});

test('Unsetting public properties in FooChild', function () {
	$foo = new FooChild;

	expect($foo->getPublic())->toBe('public');
	unset($foo->public);
	expect($foo->public)->toBe(null);
	$foo->public = 'public';
	expect($foo->getPublic())->toBe('public');
});

test('Unsetting public properties in FooGrandchild', function () {
	$foo = new FooGrandchild;

	expect($foo->getPublic())->toBe('public');
	unset($foo->public);
	expect($foo->public)->toBe(null);
	$foo->public = 'public';
	expect($foo->getPublic())->toBe('public');
});
