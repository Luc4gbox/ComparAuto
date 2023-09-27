<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix = null;

    #[ORM\ManyToOne(inversedBy: 'annonces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'annonces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Constructeur $constructeur = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_voiture = null;

    #[ORM\Column]
    private ?int $annee = null;

    #[ORM\Column]
    private ?int $kilometrage = null;

    #[ORM\Column(length: 50)]
    private ?string $couleur = null;

    #[ORM\Column(length: 50)]
    private ?string $type_carburant = null;

    #[ORM\Column(length: 50)]
    private ?string $motorisation = null;

    #[ORM\Column]
    private ?int $puissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?float $poidsTotal = null;

    #[ORM\Column]
    private ?float $stockageCoffre = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Constructeur|null
     */
    public function getConstructeur(): ?Constructeur
    {
        return $this->constructeur;
    }

    /**
     * @param Constructeur|null $constructeur
     */
    public function setConstructeur(?Constructeur $constructeur): void
    {
        $this->constructeur = $constructeur;
    }

    /**
     * @return Categorie|null
     */
    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    /**
     * @param Categorie|null $categorie
     */
    public function setCategorie(?Categorie $categorie): void
    {
        $this->categorie = $categorie;
    }

    /**
     * @return string|null
     */
    public function getNomVoiture(): ?string
    {
        return $this->nom_voiture;
    }

    /**
     * @param string|null $nom_voiture
     */
    public function setNomVoiture(?string $nom_voiture): void
    {
        $this->nom_voiture = $nom_voiture;
    }

    /**
     * @return int|null
     */
    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    /**
     * @param int|null $annee
     */
    public function setAnnee(?int $annee): void
    {
        $this->annee = $annee;
    }

    /**
     * @return int|null
     */
    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    /**
     * @param int|null $kilometrage
     */
    public function setKilometrage(?int $kilometrage): void
    {
        $this->kilometrage = $kilometrage;
    }

    /**
     * @return string|null
     */
    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    /**
     * @param string|null $couleur
     */
    public function setCouleur(?string $couleur): void
    {
        $this->couleur = $couleur;
    }

    /**
     * @return string|null
     */
    public function getTypeCarburant(): ?string
    {
        return $this->type_carburant;
    }

    /**
     * @param string|null $type_carburant
     */
    public function setTypeCarburant(?string $type_carburant): void
    {
        $this->type_carburant = $type_carburant;
    }

    /**
     * @return string|null
     */
    public function getMotorisation(): ?string
    {
        return $this->motorisation;
    }

    /**
     * @param string|null $motorisation
     */
    public function setMotorisation(?string $motorisation): void
    {
        $this->motorisation = $motorisation;
    }

    /**
     * @return int|null
     */
    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    /**
     * @param int|null $puissance
     */
    public function setPuissance(?int $puissance): void
    {
        $this->puissance = $puissance;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeImmutable|null $createdAt
     */
    public function setCreatedAt(?\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return float|null
     */
    public function getPoidsTotal(): ?float
    {
        return $this->poidsTotal;
    }

    /**
     * @param float|null $poidsTotal
     */
    public function setPoidsTotal(?float $poidsTotal): void
    {
        $this->poidsTotal = $poidsTotal;
    }

    /**
     * @return float|null
     */
    public function getStockageCoffre(): ?float
    {
        return $this->stockageCoffre;
    }

    /**
     * @param float|null $stockageCoffre
     */
    public function setStockageCoffre(?float $stockageCoffre): void
    {
        $this->stockageCoffre = $stockageCoffre;
    }

    public function __toString(): string
    {
        return $this->titre;
    }

}
