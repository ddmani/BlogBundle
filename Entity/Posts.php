<?php

namespace ddmani\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posts
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ddmani\BlogBundle\Entity\PostsRepository")
 */
class Posts
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
     * @ORM\Column(name="post_title", type="string", length=255)
     */
    private $postTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="post_content", type="text")
     */
    private $postContent;

    /**
     * @var integer
     *
     * @ORM\Column(name="post_author", type="integer")
     */
    private $postAuthor;

    /**
     * @ORM\OneToMany(targetEntity="ddmani\BlogBundle\Entity\Comment", mappedBy="commentPost", cascade="remove")
     */
    private $postComments;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_date_create", type="datetime")
     */
    private $postDateCreate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_date_modify", type="datetime")
     */
    private $postDateModify;

    /**
     * @var boolean
     *
     * @ORM\Column(name="post_status", type="boolean")
     */
    private $postStatus;

    /**
     * @ORM\ManyToOne(targetEntity="ddmani\BlogBundle\Entity\Categories")
     */
    private $postCategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="post_comment_count", type="integer", nullable=true)
     */
    private $postCommentCount;


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
     * Set postTitle
     *
     * @param string $postTitle
     * @return Posts
     */
    public function setPostTitle($postTitle)
    {
        $this->postTitle = $postTitle;
    
        return $this;
    }

    /**
     * Get postTitle
     *
     * @return string 
     */
    public function getPostTitle()
    {
        return $this->postTitle;
    }

    /**
     * Set postContent
     *
     * @param string $postContent
     * @return Posts
     */
    public function setPostContent($postContent)
    {
        $this->postContent = $postContent;
    
        return $this;
    }

    /**
     * Get postContent
     *
     * @return string 
     */
    public function getPostContent()
    {
        return $this->postContent;
    }

    /**
     * Set postAuthor
     *
     * @param integer $postAuthor
     * @return Posts
     */
    public function setPostAuthor($postAuthor)
    {
        $this->postAuthor = $postAuthor;
    
        return $this;
    }

    /**
     * Get postAuthor
     *
     * @return integer 
     */
    public function getPostAuthor()
    {
        return $this->postAuthor;
    }

    /**
     * Set postDateCreate
     *
     * @param \DateTime $postDateCreate
     * @return Posts
     */
    public function setPostDateCreate($postDateCreate)
    {
        $this->postDateCreate = $postDateCreate;
    
        return $this;
    }

    /**
     * Get postDateCreate
     *
     * @return \DateTime 
     */
    public function getPostDateCreate()
    {
        return $this->postDateCreate;
    }

    /**
     * Set postDateModify
     *
     * @param \DateTime $postDateModify
     * @return Posts
     */
    public function setPostDateModify($postDateModify)
    {
        $this->postDateModify = $postDateModify;
    
        return $this;
    }

    /**
     * Get postDateModify
     *
     * @return \DateTime 
     */
    public function getPostDateModify()
    {
        return $this->postDateModify;
    }

    /**
     * Set postStatus
     *
     * @param boolean $postStatus
     * @return Posts
     */
    public function setPostStatus($postStatus)
    {
        $this->postStatus = $postStatus;
    
        return $this;
    }

    /**
     * Get postStatus
     *
     * @return boolean 
     */
    public function getPostStatus()
    {
        return $this->postStatus;
    }

    /**
     * Set postCategory
     *
     * @param integer $postCategory
     * @return Posts
     */
    public function setPostCategory($postCategory)
    {
        $this->postCategory = $postCategory;
    
        return $this;
    }

    /**
     * Get postCategory
     *
     * @return integer 
     */
    public function getPostCategory()
    {
        return $this->postCategory;
    }

    /**
     * Set postCommentCount
     *
     * @param integer $postCommentCount
     * @return Posts
     */
    public function setPostCommentCount($postCommentCount)
    {
        $this->postCommentCount = $postCommentCount;
    
        return $this;
    }

    /**
     * Get postCommentCount
     *
     * @return integer 
     */
    public function getPostCommentCount()
    {
        return $this->postCommentCount;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->postComments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add postComments
     *
     * @param \ddmani\BlogBundle\Entity\Comment $postComments
     * @return Posts
     */
    public function addPostComment(\ddmani\BlogBundle\Entity\Comment $postComments)
    {
        $this->postComments[] = $postComments;
    
        return $this;
    }

    /**
     * Remove postComments
     *
     * @param \ddmani\BlogBundle\Entity\Comment $postComments
     */
    public function removePostComment(\ddmani\BlogBundle\Entity\Comment $postComments)
    {
        $this->postComments->removeElement($postComments);
    }
    
    /**
     * Get postComments
     *
     * @return integer 
     */
    public function getPostComments()
    {
        return $this->postComments;
    }
}