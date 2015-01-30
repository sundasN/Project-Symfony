<?php

namespace Troiswa\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Films
 *
 * @ORM\Table(name="films")
 * @ORM\Entity(repositoryClass="Troiswa\BackBundle\Entity\FilmsRepository")
 */
class Films
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
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="release_date", type="datetime")
     */
    private $releaseDate;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=100)
     */
    private $image;

    private $fichier;

    /**
     * @var integer
     *
     * @ORM\Column(name="Running_time", type="integer")
     */
    private $time;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;


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
     * Set title
     *
     * @param string $title
     * @return Films
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
     * Set description
     *
     * @param string $description
     * @return Films
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     * @return Films
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime 
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Films
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    public function getFichier()
    {
        return $this->fichier;
    }
    public function setFichier($newFichier)
    {
        $this->fichier = $newFichier;
        return $this;
    }

    public function upload(){
        if($this->fichier==null)
        {
            return false;
        }
        $nomImage = $this->fichier->getClientOriginalName();
        $this->fichier->move(
            $this->getUploadRootDir(),
            $nomImage);
        $this->image=$nomImage;
        $this->fichier=null;
    }

    private function getUploadRootDir()
    {
        return __DIR__ . "/../../../../web/images";
    }
    /**
     * Set time
     *
     * @param integer $time
     * @return Films
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return integer 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set note
     *
     * @param integer $note
     * @return Films
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }
}
