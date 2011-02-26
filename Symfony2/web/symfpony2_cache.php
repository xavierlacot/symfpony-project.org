<?php

require_once __DIR__.'/../app/Symfpony2Cache.php';

use Symfony\Component\HttpFoundation\Request;

$kernel = new Symfpony2Cache(new Symfpony2Kernel('prod', false));
$kernel->handle(Request::createFromGlobals())->send();
