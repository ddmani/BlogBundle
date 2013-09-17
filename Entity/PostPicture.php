<?php

namespace ddmani\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PostPicture
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ddmani\BlogBundle\Entity\PostPictureRepository")
 */
class PostPicture
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
     * @var string
     *
     * @ORM\Column(name="postpicture_url", type="string", length=100)
     */
    private $postpictureUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="postpicture_alt", type="string", length=50)
     */
    private $postpictureAlt;


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
     * Set postpictureUrl
     *
     * @param string $postpictureUrl
     * @return PostPicture
     */
    public function setPostpictureUrl($postpictureUrl)
    {
        $this->postpictureUrl = $postpictureUrl;
    
        return $this;
    }

    /**
     * Get postpictureUrl
     *
     * @return string 
     */
    public function getPostpictureUrl()
    {
        return $this->postpictureUrl;
    }

    /**
     * Set postpictureAlt
     *
     * @param string $postpictureAlt
     * @return PostPicture
     */
    public function setPostpictureAlt($postpictureAlt)
    {
        $this->postpictureAlt = $postpictureAlt;
    
        return $this;
    }

    /**
     * Get postpictureAlt
     *
     * @return string 
     */
    public function getPostpictureAlt()
    {
        return $this->postpictureAlt;
    }
}