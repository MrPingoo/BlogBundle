<?php

namespace Jlay\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table("post")
 * @ORM\Entity
 */
class Post
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
     * @var boolean
     *
     * @ORM\Column(name="hidden", type="boolean")
     */
    private $hidden;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean")
     */
    private $deleted;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="crdate", type="datetime")
     */
    private $crdate;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="bodytext", type="text")
     */
    private $bodytext;


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
     * Set hidden
     *
     * @param boolean $hidden
     *
     * @return Post
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * Get hidden
     *
     * @return boolean
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return Post
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Post
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set crdate
     *
     * @param \DateTime $crdate
     *
     * @return Post
     */
    public function setCrdate($crdate)
    {
        $this->crdate = $crdate;

        return $this;
    }

    /**
     * Get crdate
     *
     * @return \DateTime
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Post
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set bodytext
     *
     * @param string $bodytext
     *
     * @return Post
     */
    public function setBodytext($bodytext)
    {
        $this->bodytext = $bodytext;

        return $this;
    }

    /**
     * Get bodytext
     *
     * @return string
     */
    public function getBodytext()
    {
        return $this->bodytext;
    }
}

