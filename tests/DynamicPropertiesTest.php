<?php

use App\Foo;
use App\FooChild;
use App\FooGrandchild;

function getClassInstances() {
	return [
		'Foo' => new Foo,
		'FooChild' => new FooChild,
		'FooGrandchild' => new FooGrandchild,
	];
}

test('Accessing dynamic properties is forbidden', function ($foo) {
	expect(fn () => $foo->dynamic)->toThrow('Accessing dynamic properties is forbidden');
})->with(fn () => getClassInstances());

test('Setting dynamic properties is forbidden', function ($foo) {
	expect(fn () => $foo->dynamic = 'dynamic')->toThrow('Setting dynamic properties is forbidden');
})->with(fn () => getClassInstances());

test('Checking dynamic properties is forbidden', function ($foo) {
	expect(fn () => isset($foo->dynamic))->toThrow('Checking dynamic properties is forbidden');
})->with(fn () => getClassInstances());

test('Unsetting dynamic properties is forbidden', function ($foo) {
	expect(function () use($foo) {
		unset($foo->dynamic);
	})->toThrow('Unsetting dynamic properties is forbidden');
})->with(fn () => getClassInstances());