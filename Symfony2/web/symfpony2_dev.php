<?php

require_once __DIR__.'/../app/Symfpony2Kernel.php';

use Symfony\Component\HttpFoundation\Request;

$kernel = new Symfpony2Kernel('dev', true);
$kernel->handle(Request::createFromGlobals())->send();
