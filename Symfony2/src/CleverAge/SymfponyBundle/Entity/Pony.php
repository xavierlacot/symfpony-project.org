<?php

namespace CleverAge\SymfponyBundle\Entity;

/**
 * @orm:Table(name="pony")
 * @orm:Entity
 */
class Pony
{
    /**
     * @var integer $id
     *
     * @orm:Column(name="id", type="integer")
     * @orm:Id
     * @orm:GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @orm:Column(name="name", type="string", length=110)
     */
    private $name;

    /**
     * @var string $picture_url
     *
     * @orm:Column(type="string", length="255")
     */
    protected $picture_url;

    /**
     * @var string $description
     *
     * @orm:Column(type="text")
     */
    protected $description;
}