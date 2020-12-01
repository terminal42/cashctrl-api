<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\Exception\BadMethodCallException;

class Person extends AbstractEntity
{
    protected ?string $company;
    protected ?string $firstName;
    protected ?string $lastName;
    //protected ?array $addresses;
    protected ?string $bic;
    protected ?int $categoryId;
    //protected ?array $contacts;
    //protected $custom;
    protected ?\DateTime $dateBirth;
    protected ?string $department;
    protected ?float $discountPercentage;
    protected ?string $iban;
    protected ?string $industry;
    protected ?bool $isInactive;
    protected ?string $language;
    protected ?string $notes;
    protected ?string $nr;
    protected ?string $position;
    protected ?int $sequenceNumberId;
    protected ?int $titleId;

    public function __construct(?string $company, ?string $firstName, ?string $lastName, int $id = null)
    {
        if (null === $company && (null === $firstName || null === $lastName)) {
            throw new BadMethodCallException('Either firstName, lastName or company must be set.');
        }

        parent::__construct($id);

        $this->company = $company;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getBic(): ?string
    {
        return $this->bic;
    }

    public function setBic(?string $bic): self
    {
        $this->bic = $bic;
        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $categoryId): self
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    public function getDateBirth(): ?\DateTime
    {
        return $this->dateBirth;
    }

    public function setDateBirth(?\DateTime $dateBirth): self
    {
        $this->dateBirth = $dateBirth;
        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(?string $department): self
    {
        $this->department = $department;
        return $this;
    }

    public function getDiscountPercentage(): ?float
    {
        return $this->discountPercentage;
    }

    public function setDiscountPercentage(?float $discountPercentage): self
    {
        $this->discountPercentage = $discountPercentage;
        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(?string $iban): self
    {
        $this->iban = $iban;
        return $this;
    }

    public function getIndustry(): ?string
    {
        return $this->industry;
    }

    public function setIndustry(?string $industry): self
    {
        $this->industry = $industry;
        return $this;
    }

    public function isInactive(): ?bool
    {
        return $this->isInactive;
    }

    public function setIsInactive(?bool $isInactive): self
    {
        $this->isInactive = $isInactive;
        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;
        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;
        return $this;
    }

    public function getNr(): ?string
    {
        return $this->nr;
    }

    public function setNr(?string $nr): self
    {
        $this->nr = $nr;
        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;
        return $this;
    }

    public function getSequenceNumberId(): ?int
    {
        return $this->sequenceNumberId;
    }

    public function setSequenceNumberId(?int $sequenceNumberId): self
    {
        $this->sequenceNumberId = $sequenceNumberId;
        return $this;
    }

    public function getTitleId(): ?int
    {
        return $this->titleId;
    }

    public function setTitleId(?int $titleId): self
    {
        $this->titleId = $titleId;
        return $this;
    }
}
