<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DivisionRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DivisionRepository::class)
 * @ORM\Table(name= "divisions")
 * @ApiResource()
 */
class Division
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
    private $division;

    /**
     * @ORM\OneToMany(targetEntity=Job::class, mappedBy="division")
     */
    private $jobs;


    public function __construct()
    {
        $this->jobs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDivision(): ?string
    {
        return $this->division;
    }

    public function setDivision(string $division): self
    {
        $this->division = $division;

        return $this;
    }

    /**
     * @return Collection<int, Job>
     */
    public function getJobs(): Collection
    {
        return $this->jobs;
    }

    public function addJob(Job $job): self
    {
        if (!$this->jobs->contains($job)) {
            $this->jobs[] = $job;
            $job->setDivision($this);
        }

        return $this;
    }

    public function removeJob(Job $job): self
    {
        if ($this->jobs->removeElement($job)) {
            // set the owning side to null (unless already changed)
            if ($job->getDivision() === $this) {
                $job->setDivision(null);
            }
        }

        return $this;
    }
}
