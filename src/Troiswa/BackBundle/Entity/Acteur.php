<?php

namespace Troiswa\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Acteur
 *
 * @ORM\Table(name="actor")
 * @ORM\Entity(repositoryClass="Troiswa\BackBundle\Entity\ActeurRepository")
 */
class Acteur
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
     * @ORM\Column(name="firstname", type="string", length=70)
     * @Assert\NotBlank(message="Attention!")
     * @Assert\Length(
     *      min = "2",
     * )
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=70)
     * @Assert\NotBlank(message="Attention!")
     * @Assert\Length(
     *      min = "1",
     * )
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="boolean")
     * @Assert\NotBlank(message="Attention!")
     * @Assert\Choice(choices = {"0", "1"}, message = "Choisissez un genre valide.")
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text")
     * @Assert\NotBlank(message="Attention!")
     * @Assert\Length(
     *      min = "10",
     *      max = "1000",
     * )
     */
    private $biography;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="datetime")
     * @Assert\NotBlank(message="Attention!")
     * @Assert\DateTime()
     */
    private $dateOfBirth;


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
     * Set firstname
     *
     * @param string $firstname
     * @return Acteur
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Acteur
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Acteur
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set biography
     *
     * @param string $biography
     * @return Acteur
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string 
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     * @return Acteur
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime 
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }
}