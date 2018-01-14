<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Meetup
 *
 * @ORM\Table(name="meetup", indexes={@ORM\Index(name="organisation", columns={"organisation", "organisateur"})})
 * @ORM\Entity
 */
class Meetup
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=50, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="organisation", type="integer", nullable=true)
     * @ManyToOne(targetEntity="Organisation")
     * @JoinColumn(name="id", referencedColumnName="id")
     */
    private $organisation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="organisateur", type="integer", nullable=true)
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="id", referencedColumnName="id")
     */
    private $organisateur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=false)
     */
    private $datefin;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre.
     *
     * @param string $titre
     *
     * @return Meetup
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre.
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Meetup
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set organisation.
     *
     * @param int|null $organisation
     *
     * @return Meetup
     */
    public function setOrganisation($organisation = null)
    {
        $this->organisation = $organisation;

        return $this;
    }

    /**
     * Get organisation.
     *
     * @return int|null
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * Set organisateur.
     *
     * @param int|null $organisateur
     *
     * @return Meetup
     */
    public function setOrganisateur($organisateur = null)
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    /**
     * Get organisateur.
     *
     * @return int|null
     */
    public function getOrganisateur()
    {
        return $this->organisateur;
    }

    /**
     * Set datedebut.
     *
     * @param \DateTime $datedebut
     *
     * @return Meetup
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut.
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin.
     *
     * @param \DateTime $datefin
     *
     * @return Meetup
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin.
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }
}
