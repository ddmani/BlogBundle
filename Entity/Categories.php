<?php

namespace ddmani\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ddmani\BlogBundle\Entity\CategoriesRepository")
 */
class Categories
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="categorie_parent_id", type="integer")
     */
    private $categorieParentId;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie_name", type="string", length=100)
     */
    private $categorieName;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie_description", type="text")
     */
    private $categorieDescription;


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
     * Set categorieParentId
     *
     * @param integer $categorieParentId
     * @return Categories
     */
    public function setCategorieParentId($categorieParentId)
    {
        $this->categorieParentId = $categorieParentId;
    
        return $this;
    }

    /**
     * Get categorieParentId
     *
     * @return integer 
     */
    public function getCategorieParentId()
    {
        return $this->categorieParentId;
    }

    /**
     * Set categorieName
     *
     * @param string $categorieName
     * @return Categories
     */
    public function setCategorieName($categorieName)
    {
        $this->categorieName = $categorieName;
    
        return $this;
    }

    /**
     * Get categorieName
     *
     * @return string 
     */
    public function getCategorieName()
    {
        return $this->categorieName;
    }

    /**
     * Set categorieDescription
     *
     * @param string $categorieDescription
     * @return Categories
     */
    public function setCategorieDescription($categorieDescription)
    {
        $this->categorieDescription = $categorieDescription;
    
        return $this;
    }

    /**
     * Get categorieDescription
     *
     * @return string 
     */
    public function getCategorieDescription()
    {
        return $this->categorieDescription;
    }
}