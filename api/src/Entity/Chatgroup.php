<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ChatgroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ChatgroupRepository::class)]
#[ApiResource(
    description: 'A rare and valuable treasure.',
    normalizationContext: [
        'groups' => ['chatGroup:read'],
    ],
    denormalizationContext: [
        'groups' => ['chatGroup:write'],
    ],
    paginationItemsPerPage: 10,
)]
class Chatgroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['incidentReport:read','chatGroup:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['incidentReport:read', 'chatGroup:read'])]
    private ?string $email = null;

    #[ORM\Column(length: 64, nullable: true)]
    #[Groups(['incidentReport:read', 'chatGroup:read'])]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['incidentReport:read', 'chatGroup:read'])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(['incidentReport:read', 'chatGroup:read'])]
    private ?bool $send_email = false;

    #[ORM\OneToMany(mappedBy: 'idChatgroup', targetEntity: IncidentReport::class)]
    #[Groups(['incidentReport:read'])]
    private Collection $incidentReports;

    public function __construct()
    {
        $this->incidentReports = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isSendEmail(): ?bool
    {
        return $this->send_email;
    }

    public function setSendEmail(bool $send_email): static
    {
        $this->send_email = $send_email;

        return $this;
    }

    /**
     * @return Collection<int, IncidentReport>
     */
    public function getIncidentReports(): Collection
    {
        return $this->incidentReports;
    }

    public function addIncidentReport(IncidentReport $incidentReport): static
    {
        if (!$this->incidentReports->contains($incidentReport)) {
            $this->incidentReports->add($incidentReport);
            $incidentReport->setIdChatgroup($this);
        }

        return $this;
    }

    public function removeIncidentReport(IncidentReport $incidentReport): static
    {
        if ($this->incidentReports->removeElement($incidentReport)) {
            // set the owning side to null (unless already changed)
            if ($incidentReport->getIdChatgroup() === $this) {
                $incidentReport->setIdChatgroup(null);
            }
        }

        return $this;
    }
}
