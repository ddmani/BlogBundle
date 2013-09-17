<?php

namespace ddmani\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ddmani\BlogBundle\Entity\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\ManyToOne(targetEntity="ddmani\BlogBundle\Entity\Posts", inversedBy="postComments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commentPost;
    
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
     * @ORM\Column(name="comment_author_email", type="string", length=100)
     */
    private $commentAuthorEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_author_ip", type="string", length=50)
     */
    private $commentAuthorIp;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_author_url", type="string", length=100)
     */
    private $commentAuthorUrl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="comment_date_create", type="datetime")
     */
    private $commentDateCreate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="comment_date_modify", type="datetime")
     */
    private $commentDateModify;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_content", type="text")
     */
    private $commentContent;

    /**
     * @var integer
     *
     * @ORM\Column(name="comment_status", type="smallint")
     */
    private $commentStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="comment_parent_id", type="integer")
     */
    private $commentParentId;

    /**
     * @var integer
     *
     * @ORM\Column(name="comment_user_id", type="integer")
     */
    private $commentUserId;


    /**
     * Set commentPost
     *
     * @param ddmani\BlogBundle\Entity\Posts $commentPost
     */
    public function setCommentPost(\ddmani\BlogBundle\Entity\Posts $commentPost)
    {
     $this->commentPost = $commentPost;
    }

    /**
     * Get commentPost
     *
     * @return ddmani\BlogBundle\Entity\Posts
     */
    public function getCommentPost()
    {
     return $this->commentPost;
    }
    
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
     * Set commentAuthorEmail
     *
     * @param string $commentAuthorEmail
     * @return Comment
     */
    public function setCommentAuthorEmail($commentAuthorEmail)
    {
        $this->commentAuthorEmail = $commentAuthorEmail;
    
        return $this;
    }

    /**
     * Get commentAuthorEmail
     *
     * @return string 
     */
    public function getCommentAuthorEmail()
    {
        return $this->commentAuthorEmail;
    }

    /**
     * Set commentAuthorIp
     *
     * @param string $commentAuthorIp
     * @return Comment
     */
    public function setCommentAuthorIp($commentAuthorIp)
    {
        $this->commentAuthorIp = $commentAuthorIp;
    
        return $this;
    }

    /**
     * Get commentAuthorIp
     *
     * @return string 
     */
    public function getCommentAuthorIp()
    {
        return $this->commentAuthorIp;
    }

    /**
     * Set commentAuthorUrl
     *
     * @param string $commentAuthorUrl
     * @return Comment
     */
    public function setCommentAuthorUrl($commentAuthorUrl)
    {
        $this->commentAuthorUrl = $commentAuthorUrl;
    
        return $this;
    }

    /**
     * Get commentAuthorUrl
     *
     * @return string 
     */
    public function getCommentAuthorUrl()
    {
        return $this->commentAuthorUrl;
    }

    /**
     * Set commentDateCreate
     *
     * @param \DateTime $commentDateCreate
     * @return Comment
     */
    public function setCommentDateCreate($commentDateCreate)
    {
        $this->commentDateCreate = $commentDateCreate;
    
        return $this;
    }

    /**
     * Get commentDateCreate
     *
     * @return \DateTime 
     */
    public function getCommentDateCreate()
    {
        return $this->commentDateCreate;
    }

    /**
     * Set commentDateModify
     *
     * @param \DateTime $commentDateModify
     * @return Comment
     */
    public function setCommentDateModify($commentDateModify)
    {
        $this->commentDateModify = $commentDateModify;
    
        return $this;
    }

    /**
     * Get commentDateModify
     *
     * @return \DateTime 
     */
    public function getCommentDateModify()
    {
        return $this->commentDateModify;
    }

    /**
     * Set commentContent
     *
     * @param string $commentContent
     * @return Comment
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;
    
        return $this;
    }

    /**
     * Get commentContent
     *
     * @return string 
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    /**
     * Set commentStatus
     *
     * @param integer $commentStatus
     * @return Comment
     */
    public function setCommentStatus($commentStatus)
    {
        $this->commentStatus = $commentStatus;
    
        return $this;
    }

    /**
     * Get commentStatus
     *
     * @return integer 
     */
    public function getCommentStatus()
    {
        return $this->commentStatus;
    }

    /**
     * Set commentParentId
     *
     * @param integer $commentParentId
     * @return Comment
     */
    public function setCommentParentId($commentParentId)
    {
        $this->commentParentId = $commentParentId;
    
        return $this;
    }

    /**
     * Get commentParentId
     *
     * @return integer 
     */
    public function getCommentParentId()
    {
        return $this->commentParentId;
    }

    /**
     * Set commentUserId
     *
     * @param integer $commentUserId
     * @return Comment
     */
    public function setCommentUserId($commentUserId)
    {
        $this->commentUserId = $commentUserId;
    
        return $this;
    }

    /**
     * Get commentUserId
     *
     * @return integer 
     */
    public function getCommentUserId()
    {
        return $this->commentUserId;
    }
}