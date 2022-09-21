<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\JobRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 * @ORM\Table(name="jobs")
 * @ApiResource(
 *      normalizationContext={
 *          "groups"={"job_read"}
 *      },
 * )
 * @ApiFilter(DateFilter::class,properties={"date_published"})
 * @ApiFilter(SearchFilter::class, properties={"job","compagny.compagny","division.division","role.role","profession.profession"})
 */
class Job
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"job_read"})
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"job_read"})
     */
    private $job_ref;

    /**
     * @ORM\Column(type="string", length=2000)
     * @Groups({"job_read"})
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $refkey;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"job_read"})
     */
    private $date_published;

    /**
     * @ORM\ManyToOne(targetEntity=Compagny::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"job_read"})
     */
    private $compagny;

    /**
     * @ORM\ManyToOne(targetEntity=Profession::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"job_read"})
     */
    private $profession;

    /**
     * @ORM\ManyToOne(targetEntity=Division::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"job_read"})
     */
    private $division;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"job_read"})
     */
    private $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getJobRef(): ?string
    {
        return $this->job_ref;
    }

    public function setJobRef(?string $job_ref): self
    {
        $this->job_ref = $job_ref;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getRefkey(): ?string
    {
        return $this->refkey;
    }

    public function setRefkey(?string $refkey): self
    {
        $this->refkey = $refkey;

        return $this;
    }

    public function getDatePublished(): ?\DateTimeInterface
    {
        return $this->date_published;
    }

    public function setDatePublished(?\DateTimeInterface $date_published): self
    {
        $this->date_published = $date_published;

        return $this;
    }

    public function getCompagny(): ?Compagny
    {
        return $this->compagny;
    }

    public function setCompagny(?Compagny $compagny): self
    {
        $this->compagny = $compagny;

        return $this;
    }

    public function getProfession(): ?Profession
    {
        return $this->profession;
    }

    public function setProfession(?Profession $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getDivision(): ?Division
    {
        return $this->division;
    }

    public function setDivision(?Division $division): self
    {
        $this->division = $division;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }
}
