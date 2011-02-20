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
     * @orm:Column(name="name", type="string", length=110)
     */
    protected $name;

    /**
     * @var string $slug
     *
     * @orm:Column(name="slug", type="string", length=110)
     */
    protected $slug;

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

        if ($this->slug == null)
        {
          $this->slug = $this->generateSlug($name);
        }
    }

    /**
     * Generate a slug string from a name string
     * @todo  The slug MUST be unique
     * @param string $name
     * @return string
     */
    private function generateSlug($name)
    {
        $string = html_entity_decode($name, ENT_QUOTES, 'UTF-8');
        $string = strip_tags($string);
        $string = trim(preg_replace("#[^a-zA-Z0-9 '/-]#", "", $string));
        $string = str_replace(array(' ', '/', '\''), '-', $string);
        $string = preg_replace('#-+#', '-', $string);
        return strtolower($string);;
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
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
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
     * @see \Symfony\Component\Serializer\Normalizer\NormalizableInterface
     */
    function normalize(NormalizerInterface $normalizer, $format, $properties = null)
    {
        $return = array(
            'name' => $this->name,
            'description' => $this->description,
            'picture_url' => $this->picture_url,
        );
        return $return;
    }

    /**
     * @see \Symfony\Component\Serializer\Normalizer\NormalizableInterface
     */
    function denormalize(NormalizerInterface $normalizer, $data, $format = null)
    {
        $this->setName($data['name']);
        $this->setDescription($data['description']);
        $this->setPictureUrl($data['picture_url']);
    }
}