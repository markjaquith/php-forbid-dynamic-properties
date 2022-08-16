<?php

use App\{Foo, FooChild, FooGrandchild};

dataset('fooClasses', [
	'Foo' => new Foo,
	'FooChild' => new FooChild,
	'FooGrandchild' => new FooGrandchild,
]);
