<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
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
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $job_ref;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $link;

    /**
     * @ORM\Column(type="string", columnDefinition="CHAR(2) NULL")
     */
    private $refkey;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_published;

    /**
     * @ORM\ManyToOne(targetEntity=Compagny::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compagny;

    /**
     * @ORM\ManyToOne(targetEntity=Profession::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $profession;

    /**
     * @ORM\ManyToOne(targetEntity=Division::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $division;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
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
