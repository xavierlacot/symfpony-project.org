<?php

require_once __DIR__.'/Symfpony2Kernel.php';

use Symfony\Bundle\FrameworkBundle\Cache\Cache;

class Symfpony2Cache extends Cache
{
    protected function getOptions()
    {
        return array();
    }
}
