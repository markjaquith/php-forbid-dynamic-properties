<?php

test('Unsetting protected property makes it return null', function ($foo) {
	$foo->unsetProtected();
	expect($foo->protected)->toBeNull();
})->with('fooClasses');

test('Unsetting protected property does not allow it to be publicly set', function ($foo) {
	$foo->unsetProtected();
	expect($foo->getProtected())->toBeNull();
	$foo->protected = 'overridden';
	expect($foo->getProtected())->toBeNull();
})->with('fooClasses');

test('Unsetting protected property still allows it to be set from within', function ($foo) {
	$foo->unsetProtected();
	$foo->setProtected('overridden');
	expect($foo->getProtected())->toBe('overridden');
})->with('fooClasses');
