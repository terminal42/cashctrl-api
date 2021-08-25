<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\Exception\BadMethodCallException;
use Terminal42\CashctrlApi\XmlHelper;

class Person extends AbstractEntity
{
    protected ?string $company;
    protected ?string $firstName;
    protected ?string $lastName;
    protected ?string $bic = null;
    protected ?int $categoryId = null;
    protected ?string $custom = null;
    protected ?string $dateBirth = null;
    protected ?string $department = null;
    protected ?float $discountPercentage = null;
    protected ?string $iban = null;
    protected ?string $industry = null;
    protected ?bool $isInactive = null;
    protected ?string $language = null;
    protected ?string $notes = null;
    protected ?string $nr = null;
    protected ?string $position = null;
    protected ?int $sequenceNumberId = null;
    protected ?int $titleId = null;

    /**
     * @var PersonAddress[]
     */
    protected ?array $addresses = null;

    /**
     * @var PersonContact[]
     */
    protected ?array $contacts = null;

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

    public function getCustom(): ?string
    {
        return $this->custom;
    }

    public function setCustom(?string $custom): self
    {
        $this->custom = $custom;
        return $this;
    }

    public function getDateBirth(): ?string
    {
        return $this->dateBirth;
    }

    public function setDateBirth(?string $dateBirth): self
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

    /**
     * @return PersonAddress[]|null
     */
    public function getAddresses(): ?array
    {
        return $this->addresses;
    }

    /**
     * @param PersonAddress[] $addresses
     */
    public function setAddresses(?array $addresses): self
    {
        $this->addresses = null;

        if (null === $addresses) {
            return $this;
        }

        foreach ($addresses as $address) {
            $this->addAddress($address);
        }

        return $this;
    }

    public function addAddress(PersonAddress $address): self
    {
        if (null === $this->addresses) {
            $this->addresses = [];
        }

        $this->addresses[] = $address;

        return $this;
    }

    public function removeAddress(PersonAddress $address): self
    {
        if (null === $this->addresses) {
            return $this;
        }

        if (false !== ($key = array_search($address, $this->addresses, true))) {
            unset($this->addresses[$key]);
        }

        return $this;
    }

    /**
     * @return PersonContact[]|null
     */
    public function getContacts(): ?array
    {
        return $this->contacts;
    }

    /**
     * @param PersonContact[]|null $contacts
     */
    public function setContacts(?array $contacts): self
    {
        $this->contacts = null;

        if (null === $contacts) {
            return $this;
        }

        foreach ($contacts as $contact) {
            $this->addContact($contact);
        }

        return $this;
    }

    public function addContact(PersonContact $contact): self
    {
        if (null === $this->contacts) {
            $this->contacts = [];
        }

        $this->contacts[] = $contact;

        return $this;
    }

    public function removeContact(PersonContact $contact): self
    {
        if (null === $this->contacts) {
            return $this;
        }

        if (false !== ($key = array_search($contact, $this->contacts, true))) {
            unset($this->contacts[$key]);
        }

        return $this;
    }

    public function getCustomfield(int $id): ?string
    {
        if (null === $this->custom) {
            return null;
        }

        $data = XmlHelper::parseValues($this->custom);

        return $data['customField'.$id] ?? null;
    }

    public function setCustomfield(int $id, ?string $value): self
    {
        $data = [];

        if (null !== $this->custom) {
            $data = XmlHelper::parseValues($this->custom);
        }

        if (null === $value) {
            unset($data['customField'.$id]);
        } else {
            $data['customField'.$id] = $value;
        }

        $this->custom = XmlHelper::dumpValues($data);

        return $this;
    }

    public static function create(array $data, bool $partial = false): Person
    {
        $instance = parent::create($data, $partial);

        if (isset($data['addresses']) && \is_array($data['addresses'])) {
            $instance->setAddresses(null);
            foreach ($data['addresses'] as $row) {
                $instance->addAddress(new PersonAddress(
                    $row['type'],
                    $row['address'],
                    $row['zip'],
                    $row['city'],
                    $row['country']
                ));
            }
        }

        if (isset($data['contacts']) && \is_array($data['contacts'])) {
            $instance->setContacts(null);
            foreach ($data['contacts'] as $row) {
                $instance->addContact(new PersonContact($row['address'], $row['purpose'], $row['type']));
            }
        }

        return $instance;
    }
}
