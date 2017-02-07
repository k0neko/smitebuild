<?php

namespace FC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * God
 *
 * @ORM\Table(name="god")
 * @ORM\Entity(repositoryClass="FC\PlatformBundle\Repository\GodRepository")
 */
class God
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToOne (targetEntity="FC\PlatformBundle\Entity\Image",cascade={"persist"})
     */
    private $image;



    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return God
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set image
     *
     * @param \FC\PlatformBundle\Entity\Image $image
     *
     * @return God
     */
    public function setImage(\FC\PlatformBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \FC\PlatformBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }
}
