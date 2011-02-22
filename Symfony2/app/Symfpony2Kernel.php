<?php

require_once __DIR__.'/../src/autoload.php';

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class Symfpony2Kernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            // enable third-party bundles
            new Symfony\Bundle\ZendBundle\ZendBundle(),
            //new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\DoctrineBundle\DoctrineBundle(),
            //new Symfony\Bundle\DoctrineMigrationsBundle\DoctrineMigrationsBundle(),
            //new Symfony\Bundle\DoctrineMongoDBBundle\DoctrineMongoDBBundle(),
            //new Symfony\Bundle\PropelBundle\PropelBundle(),

            // register your bundles
            new CleverAge\SymfponyBundle\CleverAgeSymfponyBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
        );

        if ($this->isDebug()) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Symfony\Bundle\TwigBundle\TwigBundle();
        }

        return $bundles;
    }

    public function registerRootDir()
    {
        return __DIR__;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
