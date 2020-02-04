<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\usersRepository")
 */
class users
{
    /**
     *
     * @ORM\ManyToOne(targetEntity="roles",inversedBy="users")
     * @ORM\JoinColumn(name="userRol_id",referencedColumnName="id")
     */
    private $userRol;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Poemas",mappedBy="id")
     */
    private $userPoema;
    public function __construct(){
        $this->userPoema = new ArrayCollection();
    }
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
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;


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
     * @return users
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
     * Set password
     *
     * @param string $password
     *
     * @return users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    function getUserRol(){
        return $this->userRol;
    }
    function setUserRol($userRol){
        $this->userRol = $userRol;
    }
    function getUserPoema(){
        return $this->userPoema;
    }
    function setUserPoema($userPoema){
        $this->userPoema = $userPoema;
        
    }
}

