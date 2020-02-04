<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * poemas
 *
 * @ORM\Table(name="poemas")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\poemasRepository")
 */
class poemas
{
    /**
     *
     * @ORM\ManyToOne(targetEntity="categorias",inversedBy="poemas")
     * @ORM\JoinColumn(name="categoria_id",referencedColumnName="id")
     */
    private $categoria;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="users", inversedBy="userPoemas")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;
    
    
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
     * @ORM\Column(name="texto", type="string", length=255)
     */
    private $texto;


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
     * Set texto
     *
     * @param string $texto
     *
     * @return poemas
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }
    function getPoemaCategoria(){
        return $this->poemaCategoria;
    }
    function getUser(){
        return $this->user;
    }
    function getCategoria(){
        return $this->categoria;
    }
    function setPoemaCategoria(Categoria $poemaCategoria){
        $this->poemaCategoria = $poemaCategoria;
    }
    function setUser($user){
        $this->user = $user;
        
    } 
    function setCategory($categoria){
        $this->categoria = $categoria;
    }
}

