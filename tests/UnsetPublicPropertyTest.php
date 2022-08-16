<?php

use App\Foo;
use App\FooChild;
use App\FooGrandchild;

test('Unsetting public properties in Foo', function ($foo) {
	expect($foo->getPublic())->toBe('public');
	unset($foo->public);
	expect($foo->public)->toBeNull();
	$foo->public = 'public';
	expect($foo->getPublic())->toBe('public');
})->with([
	'Foo' => new Foo,
	'FooChild' => new FooChild,
	'FooGrandchild' => new FooGrandchild,
]);
