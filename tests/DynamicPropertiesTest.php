<?php

use App\Foo;
use App\FooChild;
use App\FooGrandchild;

// Foo.
test('Foo: Accessing dynamic properties is forbidden', function () {
	$foo = new Foo;

	expect(function () use ($foo) {
		$foo->dynamic;
	})->toThrow('Accessing dynamic properties is forbidden');
});

test('Foo: Setting dynamic properties is forbidden', function () {
	$foo = new Foo;

	expect(function () use ($foo) {
		$foo->dynamic = 'dynamic';
	})->toThrow('Setting dynamic properties is forbidden');
});

test('Foo: Checking dynamic properties is forbidden', function () {
	$foo = new Foo;

	expect(function () use ($foo) {
		isset($foo->dynamic);
	})->toThrow('Checking dynamic properties is forbidden');
});

test('Foo: Unsetting dynamic properties is forbidden', function () {
	$foo = new Foo;

	expect(function () use ($foo) {
		unset($foo->dynamic);
	})->toThrow('Unsetting dynamic properties is forbidden');
});

// FooChild.
test('FooChild: Accessing dynamic properties is forbidden', function () {
	$foo = new FooChild;

	expect(function () use ($foo) {
		$foo->dynamic;
	})->toThrow('Accessing dynamic properties is forbidden');
});

test('FooChild: Setting dynamic properties is forbidden', function () {
	$foo = new FooChild;

	expect(function () use ($foo) {
		$foo->dynamic = 'dynamic';
	})->toThrow('Setting dynamic properties is forbidden');
});

test('FooChild: Checking dynamic properties is forbidden', function () {
	$foo = new FooChild;

	expect(function () use ($foo) {
		isset($foo->dynamic);
	})->toThrow('Checking dynamic properties is forbidden');
});

test('FooChild: Unsetting dynamic properties is forbidden', function () {
	$foo = new FooChild;

	expect(function () use ($foo) {
		unset($foo->dynamic);
	})->toThrow('Unsetting dynamic properties is forbidden');
});

// FooGrandchild.
test('FooGrandchild: Accessing dynamic properties is forbidden', function () {
	$foo = new FooGrandchild;

	expect(function () use ($foo) {
		$foo->dynamic;
	})->toThrow('Accessing dynamic properties is forbidden');
});

test('FooGrandchild: Setting dynamic properties is forbidden', function () {
	$foo = new FooGrandchild;

	expect(function () use ($foo) {
		$foo->dynamic = 'dynamic';
	})->toThrow('Setting dynamic properties is forbidden');
});

test('FooGrandchild: Checking dynamic properties is forbidden', function () {
	$foo = new FooGrandchild;

	expect(function () use ($foo) {
		isset($foo->dynamic);
	})->toThrow('Checking dynamic properties is forbidden');
});

test('FooGrandchild: Unsetting dynamic properties is forbidden', function () {
	$foo = new FooGrandchild;

	expect(function () use ($foo) {
		unset($foo->dynamic);
	})->toThrow('Unsetting dynamic properties is forbidden');
});