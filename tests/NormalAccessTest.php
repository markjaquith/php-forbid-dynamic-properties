<?php

use App\FooChild;
use App\FooGrandChild;

test('Foo data is correct', function ($foo) {
	expect($foo->getPrivate())->toBe('private');
	expect($foo->getProtected())->toBe('protected');
	expect($foo->getPublic())->toBe('public');
})->with('fooClasses');

test('FooChild data is correct', function ($foo) {
	expect($foo->getChildPrivate())->toBe('childPrivate');
	expect($foo->getChildProtected())->toBe('childProtected');
	expect($foo->getChildPublic())->toBe('childPublic');
})->with([new FooChild, new FooGrandchild]);

test('FooGrandchild data is correct', function ($foo) {
	expect($foo->getGrandchildPrivate())->toBe('grandchildPrivate');
	expect($foo->getGrandchildProtected())->toBe('grandchildProtected');
	expect($foo->getGrandchildPublic())->toBe('grandchildPublic');
})->with([new FooGrandchild]);