<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$loader = new Nette\Loaders\RobotLoader;
$loader->addDirectory(__DIR__ . '/vendor/nextcloud/ocp/OCP');
$loader->setTempDirectory(sys_get_temp_dir());
$loader->register();

$loader->rebuild();
$classes = $loader->getIndexedClasses();

$eventFinder = new EventFinder($classes);
$events = $eventFinder->find();

file_put_contents(
	__DIR__ . '/events.json',
	json_encode($events, JSON_PRETTY_PRINT)
);

$formatter = new ReStructuredTextFormatter();
$rest = $formatter->format($events);

file_put_contents(
	__DIR__ . '/events.rst',
	$rest
);
