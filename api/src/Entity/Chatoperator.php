<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Serializer\Filter\PropertyFilter;
use App\Repository\ChatoperatorRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ChatoperatorRepository::class)]
#[ApiResource]
#[ORM\Table(name: '`chatoperator`')]
#[ApiResource(
    normalizationContext: ['groups' => ['chatoperator:read']],
    denormalizationContext: ['groups' => ['chatoperator:write']],
)]
#[ApiFilter(PropertyFilter::class)]
#[UniqueEntity(fields: ['vcemail'], message: 'There is already an account with this email')]
#[UniqueEntity(fields: ['vclogin'], message: 'It looks like another dragon took your username. ROAR!')]
class Chatoperator
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $operatorid = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Groups(['chatoperator:read', 'chatoperator:write'])]
    #[Assert\NotBlank]
    #[ApiFilter(SearchFilter::class, strategy: 'exact')]
    private ?string $vclogin = null;

    #[ORM\Column]
    #[Groups(['chatoperator:write'])]
    private ?string $vcpassword = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['chatoperator:read', 'chatoperator:write'])]
    #[Assert\NotBlank]
    #[Assert\Email]
    private ?string $vcemail = null;

    public function getOperatorid(): ?int
    {
        return $this->operatorid;
    }

    public function setOperatorid(int $operatorid): static
    {
        $this->operatorid = $operatorid;

        return $this;
    }

    public function getVclogin(): ?string
    {
        return $this->vclogin;
    }

    public function setVclogin(string $vclogin): static
    {
        $this->vclogin = $vclogin;

        return $this;
    }

    public function getVcpassword(): ?string
    {
        return $this->vcpassword;
    }

    public function setVcpassword(string $vcpassword): static
    {
        $this->vcpassword = $vcpassword;

        return $this;
    }

    public function getVcemail(): ?string
    {
        return $this->vcemail;
    }

    public function setVcemail(?string $vcemail): static
    {
        $this->vcemail = $vcemail;

        return $this;
    }
}
