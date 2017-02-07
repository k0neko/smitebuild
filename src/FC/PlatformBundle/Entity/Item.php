<?php

namespace FC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="FC\PlatformBundle\Repository\ItemRepository")
 */
class Item
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="attack_speed", type="integer")
     */
    private $attackSpeed;

    /**
     * @var int
     *
     * @ORM\Column(name="power", type="integer")
     */
    private $power;

    /**
     * @var int
     *
     * @ORM\Column(name="protection", type="integer")
     */
    private $protection;

    /**
     * @var int
     *
     * @ORM\Column(name="healt", type="integer")
     */
    private $healt;

    /**
     * @var int
     *
     * @ORM\Column(name="movement_speed", type="integer")
     */
    private $movementSpeed;

    /**
     * @var int
     *
     * @ORM\Column(name="lifesteal", type="integer")
     */
    private $lifesteal;

    /**
     * @var int
     *
     * @ORM\Column(name="mana", type="integer")
     */
    private $mana;

    /**
     * @var int
     *
     * @ORM\Column(name="penetration", type="integer")
     */
    private $penetration;

    /**
     * @var int
     *
     * @ORM\Column(name="critical_strike_chance", type="integer")
     */
    private $criticalStrikeChance;

    /**
     * @var int
     *
     * @ORM\Column(name="cooldown_reduction", type="integer")
     */
    private $cooldownReduction;

    /**
     * @var int
     *
     * @ORM\Column(name="control_reduction", type="integer")
     */
    private $controlReduction;


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
     * Set name
     *
     * @param string $name
     *
     * @return Item
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
     * Set type
     *
     * @param string $type
     *
     * @return Item
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set attackSpeed
     *
     * @param integer $attackSpeed
     *
     * @return Item
     */
    public function setAttackSpeed($attackSpeed)
    {
        $this->attackSpeed = $attackSpeed;

        return $this;
    }

    /**
     * Get attackSpeed
     *
     * @return int
     */
    public function getAttackSpeed()
    {
        return $this->attackSpeed;
    }

    /**
     * Set power
     *
     * @param integer $power
     *
     * @return Item
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power
     *
     * @return int
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set protection
     *
     * @param integer $protection
     *
     * @return Item
     */
    public function setProtection($protection)
    {
        $this->protection = $protection;

        return $this;
    }

    /**
     * Get protection
     *
     * @return int
     */
    public function getProtection()
    {
        return $this->protection;
    }

    /**
     * Set healt
     *
     * @param integer $healt
     *
     * @return Item
     */
    public function setHealt($healt)
    {
        $this->healt = $healt;

        return $this;
    }

    /**
     * Get healt
     *
     * @return int
     */
    public function getHealt()
    {
        return $this->healt;
    }

    /**
     * Set movementSpeed
     *
     * @param integer $movementSpeed
     *
     * @return Item
     */
    public function setMovementSpeed($movementSpeed)
    {
        $this->movementSpeed = $movementSpeed;

        return $this;
    }

    /**
     * Get movementSpeed
     *
     * @return int
     */
    public function getMovementSpeed()
    {
        return $this->movementSpeed;
    }

    /**
     * Set lifesteal
     *
     * @param integer $lifesteal
     *
     * @return Item
     */
    public function setLifesteal($lifesteal)
    {
        $this->lifesteal = $lifesteal;

        return $this;
    }

    /**
     * Get lifesteal
     *
     * @return int
     */
    public function getLifesteal()
    {
        return $this->lifesteal;
    }

    /**
     * Set mana
     *
     * @param integer $mana
     *
     * @return Item
     */
    public function setMana($mana)
    {
        $this->mana = $mana;

        return $this;
    }

    /**
     * Get mana
     *
     * @return int
     */
    public function getMana()
    {
        return $this->mana;
    }

    /**
     * Set penetration
     *
     * @param integer $penetration
     *
     * @return Item
     */
    public function setPenetration($penetration)
    {
        $this->penetration = $penetration;

        return $this;
    }

    /**
     * Get penetration
     *
     * @return int
     */
    public function getPenetration()
    {
        return $this->penetration;
    }

    /**
     * Set criticalStrikeChance
     *
     * @param integer $criticalStrikeChance
     *
     * @return Item
     */
    public function setCriticalStrikeChance($criticalStrikeChance)
    {
        $this->criticalStrikeChance = $criticalStrikeChance;

        return $this;
    }

    /**
     * Get criticalStrikeChance
     *
     * @return int
     */
    public function getCriticalStrikeChance()
    {
        return $this->criticalStrikeChance;
    }

    /**
     * Set cooldownReduction
     *
     * @param integer $cooldownReduction
     *
     * @return Item
     */
    public function setCooldownReduction($cooldownReduction)
    {
        $this->cooldownReduction = $cooldownReduction;

        return $this;
    }

    /**
     * Get cooldownReduction
     *
     * @return int
     */
    public function getCooldownReduction()
    {
        return $this->cooldownReduction;
    }

    /**
     * Set controlReduction
     *
     * @param integer $controlReduction
     *
     * @return Item
     */
    public function setControlReduction($controlReduction)
    {
        $this->controlReduction = $controlReduction;

        return $this;
    }

    /**
     * Get controlReduction
     *
     * @return int
     */
    public function getControlReduction()
    {
        return $this->controlReduction;
    }
}

