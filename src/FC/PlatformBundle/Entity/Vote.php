<?php

namespace FC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table(name="vote")
 * @ORM\Entity(repositoryClass="FC\PlatformBundle\Repository\VoteRepository")
 */
class Vote
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
     * @ORM\ManyToOne (targetEntity="FC\UserBundle\Entity\User",cascade={"persist"})
     */

    private $user;

    /**
     * @ORM\ManyToOne (targetEntity="FC\PlatformBundle\Entity\build",cascade={"persist"})
     */
    private $build;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

  

    /**
     * Set user
     *
     * @param \FC\UserBundle\Entity\User $user
     *
     * @return Vote
     */
    public function setUser(\FC\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \FC\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set build
     *
     * @param \FC\PlatformBundle\Entity\Build $build
     *
     * @return Vote
     */
    public function setBuild(\FC\PlatformBundle\Entity\Build $build = null)
    {
        $this->build = $build;

        return $this;
    }

    /**
     * Get build
     *
     * @return \FC\PlatformBundle\Entity\Build
     */
    public function getBuild()
    {
        return $this->build;
    }
}
