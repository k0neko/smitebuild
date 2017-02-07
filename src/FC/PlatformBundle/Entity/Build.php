<?php

namespace FC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FC\UserBundle\Entity\User as User;

/**
 * build
 *
 * @ORM\Table(name="build")
 * @ORM\Entity(repositoryClass="FC\PlatformBundle\Repository\BuildRepository")
 */
class Build
{
    /**

     * @ORM\OneToOne(targetEntity="OC\PlatformBundle\Entity\Image", cascade={"persist"})

     */


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */


    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="FC\PlatformBundle\Entity\God")
     */
    private $god;

    /**
     * @var string
     *
     * @ORM\Column(name="build_name", type="string", length=255)
     * @Assert\Length(min=2)
     */
    private $buildName;

    /**
     * @ORM\ManyToOne(targetEntity="FC\PlatformBundle\Entity\Item")
     */
    private $item1;

    /**
     * @ORM\ManyToOne(targetEntity="FC\PlatformBundle\Entity\Item")
     */
    private $item2;

    /**
     * @ORM\ManyToOne(targetEntity="FC\PlatformBundle\Entity\Item")
     */
    private $item3;

    /**
     * @ORM\ManyToOne(targetEntity="FC\PlatformBundle\Entity\Item")
     */
    private $item4;

    /**
     * @ORM\ManyToOne(targetEntity="FC\PlatformBundle\Entity\Item")
     */
    private $item5;

    /**
     * @ORM\ManyToOne(targetEntity="FC\PlatformBundle\Entity\Item")
     */
    private $item6;
    /**
     * @ORM\ManyToOne(targetEntity="FC\UserBundle\Entity\User")
     */
    private $user;

    



    


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
     * Set buildName
     *
     * @param string $buildName
     *
     * @return Build
     */
    public function setBuildName($buildName)
    {
        $this->buildName = $buildName;

        return $this;
    }

    /**
     * Get buildName
     *
     * @return string
     */
    public function getBuildName()
    {
        return $this->buildName;
    }

    /**
     * Set god
     *
     * @param \FC\PlatformBundle\Entity\Build $god
     *
     * @return Build
     */
    public function setGod(\FC\PlatformBundle\Entity\God $god = null)
    {
        $this->god = $god;

        return $this;
    }

    /**
     * Get god
     *
     * @return \FC\PlatformBundle\Entity\Build
     */
    public function getGod()
    {
        return $this->god;
    }

    /**
     * Set item1
     *
     * @param \FC\PlatformBundle\Entity\Item $item1
     *
     * @return Build
     */
    public function setItem1(\FC\PlatformBundle\Entity\Item $item1 = null)
    {
        $this->item1 = $item1;

        return $this;
    }

    /**
     * Get item1
     *
     * @return \FC\PlatformBundle\Entity\Item
     */
    public function getItem1()
    {
        return $this->item1;
    }

    /**
     * Set item2
     *
     * @param \FC\PlatformBundle\Entity\Item $item2
     *
     * @return Build
     */
    public function setItem2(\FC\PlatformBundle\Entity\Item $item2 = null)
    {
        $this->item2 = $item2;

        return $this;
    }

    /**
     * Get item2
     *
     * @return \FC\PlatformBundle\Entity\Item
     */
    public function getItem2()
    {
        return $this->item2;
    }

    /**
     * Set item3
     *
     * @param \FC\PlatformBundle\Entity\Item $item3
     *
     * @return Build
     */
    public function setItem3(\FC\PlatformBundle\Entity\Item $item3 = null)
    {
        $this->item3 = $item3;

        return $this;
    }

    /**
     * Get item3
     *
     * @return \FC\PlatformBundle\Entity\Item
     */
    public function getItem3()
    {
        return $this->item3;
    }

    /**
     * Set item4
     *
     * @param \FC\PlatformBundle\Entity\Item $item4
     *
     * @return Build
     */
    public function setItem4(\FC\PlatformBundle\Entity\Item $item4 = null)
    {
        $this->item4 = $item4;

        return $this;
    }

    /**
     * Get item4
     *
     * @return \FC\PlatformBundle\Entity\Item
     */
    public function getItem4()
    {
        return $this->item4;
    }

    /**
     * Set item5
     *
     * @param \FC\PlatformBundle\Entity\Item $item5
     *
     * @return Build
     */
    public function setItem5(\FC\PlatformBundle\Entity\Item $item5 = null)
    {
        $this->item5 = $item5;

        return $this;
    }

    /**
     * Get item5
     *
     * @return \FC\PlatformBundle\Entity\Item
     */
    public function getItem5()
    {
        return $this->item5;
    }

    /**
     * Set item6
     *
     * @param \FC\PlatformBundle\Entity\Item $item6
     *
     * @return Build
     */
    public function setItem6(\FC\PlatformBundle\Entity\Item $item6 = null)
    {
        $this->item6 = $item6;

        return $this;
    }

    /**
     * Get item6
     *
     * @return \FC\PlatformBundle\Entity\Item
     */
    public function getItem6()
    {
        return $this->item6;
    }

    /**
     * Set user
     *
     * @param \FC\PlatformBundle\Entity\User $user
     *
     * @return Build
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \FC\PlatformBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
