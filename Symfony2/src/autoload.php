<?php

require_once __DIR__.'/vendor/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony'                         => __DIR__.'/vendor/symfony/src',
    'Application'                     => __DIR__,
    'Bundle'                          => __DIR__,
    'CleverAge'                       => __DIR__,
    'Doctrine\\Common\\DataFixtures'  => __DIR__.'/vendor/symfony/vendor/doctrine-data-fixtures/lib',
    'Doctrine\\Common'                => __DIR__.'/vendor/symfony/vendor/doctrine-common/lib',
    'Doctrine\\DBAL\\Migrations'      => __DIR__.'/vendor/symfony/vendor/doctrine-migrations/lib',
    'Doctrine\\MongoDB'               => __DIR__.'/vendor/symfony/vendor/doctrine-mongodb/lib',
    'Doctrine\\ODM\\MongoDB'          => __DIR__.'/vendor/symfony/vendor/doctrine-mongodb/lib',
    'Doctrine\\DBAL'                  => __DIR__.'/vendor/symfony/vendor/doctrine-dbal/lib',
    'Doctrine'                        => __DIR__.'/vendor/symfony/vendor/doctrine/lib',
    'Gedmo'                           => __DIR__.'/vendor/doctrine-extensions/lib',
    'Zend'                            => __DIR__.'/vendor/symfony/vendor/zend/library',
    'Stof'                            => __DIR__,
    'Sensio'                  => __DIR__,
));
$loader->registerPrefixes(array(
    'Swift_' => __DIR__.'/vendor/symfony/vendor/swiftmailer/lib/classes',
    'Twig_'  => __DIR__.'/vendor/symfony/vendor/twig/lib',
));
$loader->register();
