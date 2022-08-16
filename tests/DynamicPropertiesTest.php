<?php

test('Accessing dynamic properties is forbidden', function ($foo) {
	expect(fn () => $foo->dynamic)->toThrow('Accessing dynamic properties is forbidden');
})->with('fooClasses');

test('Setting dynamic properties is forbidden', function ($foo) {
	expect(fn () => $foo->dynamic = 'dynamic')->toThrow('Setting dynamic properties is forbidden');
})->with('fooClasses');

test('Checking dynamic properties is forbidden', function ($foo) {
	expect(fn () => isset($foo->dynamic))->toThrow('Checking dynamic properties is forbidden');
})->with('fooClasses');

test('Unsetting dynamic properties is forbidden', function ($foo) {
	expect(function () use($foo) {
		unset($foo->dynamic);
	})->toThrow('Unsetting dynamic properties is forbidden');
})->with('fooClasses');