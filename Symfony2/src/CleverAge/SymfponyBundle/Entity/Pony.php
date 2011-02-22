<?php
namespace CleverAge\SymfponyBundle\Entity;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @orm:Table(name="pony")
 * @orm:Entity
 */
class Pony implements NormalizableInterface
{
    /**
     * @var integer $id
     *
     * @orm:Column(name="id", type="integer")
     * @orm:Id
     * @orm:GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @gedmo:Sluggable
     * @orm:Column(name="name", type="string", length=110)
     */
    protected $name;

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

    /**
     * @var string $slug
     *
     * @gedmo:Slug
     * @orm:Column(name="slug", type="string", length=128, unique=true)
     */
    protected $slug;

    /**
     * @see \Symfony\Component\Serializer\Normalizer\NormalizableInterface
     */
    function normalize(NormalizerInterface $normalizer, $format, $properties = null)
    {
        return array(
            'name' => $this->name,
            'picture_url' => $this->picture_url,
            'description' => $this->description,
            'slug' => $this->slug,
        );
    }

    /**
     * @see
     */
    function denormalize(NormalizerInterface $normalizer, $data, $format = null)
    {
        $this->setName($data['name']);
        $this->setDescription($data['description']);
        $this->setPictureUrl($data['picture_url']);
    }


    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     * 
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set picture_url
     *
     * @param string $pictureUrl
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->picture_url = $pictureUrl;
    }

    /**
     * Get picture_url
     *
     * @return string $pictureUrl
     */
    public function getPictureUrl()
    {
        return $this->picture_url;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }
}