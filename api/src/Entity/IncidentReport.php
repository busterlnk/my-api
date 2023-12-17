<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\IncidentReportRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: IncidentReportRepository::class)]
#[ApiResource(
    description: 'A rare and valuable treasure.',
    normalizationContext: [
        'groups' => ['incidentReport:read'],
    ],
    denormalizationContext: [
        'groups' => ['incidentReport:write'],
    ],
    paginationItemsPerPage: 10,
)]
#[ApiResource(
    uriTemplate: '/users/{user_id}/incidentReports.{_format}',
    shortName: 'Incidents',
    operations: [new GetCollection()],
    uriVariables: [
        'user_id' => new Link(
            fromProperty: 'idIncidentReport',
            fromClass: User::class,
        ),
    ],
    normalizationContext: [
        'groups' => ['user:read'],
    ],
)]
class IncidentReport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64, nullable: true)]
    #[Groups(['incidentReport:read','incidentReport:write','user:read', 'user:write'])]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    private ?string $invoiceNumber = null;

    #[ORM\Column(length: 64, nullable: true)]
    #[Groups(['incidentReport:read','incidentReport:write','user:read', 'user:write'])]
    #[Assert\Length(min: 2, max: 50, maxMessage: 'Describe your loot in 50 chars or less')]
    private ?string $name = null;

    #[ORM\Column(length: 64, nullable: true)]
    #[Groups(['incidentReport:read','incidentReport:write','user:read', 'user:write'])]
    #[Assert\Length(min: 2, max: 50, maxMessage: 'Describe your loot in 50 chars or less')]
    private ?string $lastname = null;

    #[ORM\ManyToOne(inversedBy: 'idIncidentReport')]
    #[Groups(['incidentReport:read', 'incidentReport:write', 'user:write'])]
    private ?User $idChatoperator = null;

    #[ORM\ManyToOne(inversedBy: 'incidentReports')]
    #[Groups(['incidentReport:read','incidentReport:write'])]
    private ?Chatgroup $idChatgroup = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(?string $invoiceNumber): static
    {
        $this->invoiceNumber = $invoiceNumber;

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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getIdChatoperator(): ?User
    {
        return $this->idChatoperator;
    }

    public function setIdChatoperator(?User $idChatoperator): static
    {
        $this->idChatoperator = $idChatoperator;

        return $this;
    }

    public function getIdChatgroup(): ?Chatgroup
    {
        return $this->idChatgroup;
    }

    public function setIdChatgroup(?Chatgroup $idChatgroup): static
    {
        $this->idChatgroup = $idChatgroup;

        return $this;
    }
}
