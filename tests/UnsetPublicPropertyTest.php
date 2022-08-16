<?php

test('Unsetting public properties in Foo', function ($foo) {
	expect($foo->getPublic())->toBe('public');
	unset($foo->public);
	expect($foo->public)->toBeNull();
	$foo->public = 'public';
	expect($foo->getPublic())->toBe('public');
})->with('fooClasses');
