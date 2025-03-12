<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\Exception\BadMethodCallException;
use Terminal42\CashctrlApi\XmlHelper;

class Person extends AbstractEntity
{
    protected string|null $company;

    protected string|null $firstName;

    protected string|null $lastName;

    protected string|null $bic = null;

    protected int|null $categoryId = null;

    protected string|null $custom = null;

    protected string|null $dateBirth = null;

    protected string|null $department = null;

    protected float|null $discountPercentage = null;

    protected string|null $iban = null;

    protected string|null $industry = null;

    protected bool|null $isInactive = null;

    protected string|null $language = null;

    protected string|null $notes = null;

    protected string|null $nr = null;

    protected string|null $position = null;

    protected int|null $sequenceNumberId = null;

    protected int|null $titleId = null;

    protected string|null $vatUid = null;

    /**
     * @var array<PersonAddress>
     */
    protected array|null $addresses = null;

    /**
     * @var array<PersonContact>
     */
    protected array|null $contacts = null;

    public function __construct(string|null $company, string|null $firstName, string|null $lastName, int|null $id = null)
    {
        if (null === $company && (null === $firstName || null === $lastName)) {
            throw new BadMethodCallException('Either firstName, lastName or company must be set.');
        }

        parent::__construct($id);

        $this->company = $company;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getCompany(): string|null
    {
        return $this->company;
    }

    public function setCompany(string|null $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getFirstName(): string|null
    {
        return $this->firstName;
    }

    public function setFirstName(string|null $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): string|null
    {
        return $this->lastName;
    }

    public function setLastName(string|null $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBic(): string|null
    {
        return $this->bic;
    }

    public function setBic(string|null $bic): self
    {
        $this->bic = $bic;

        return $this;
    }

    public function getCategoryId(): int|null
    {
        return $this->categoryId;
    }

    public function setCategoryId(int|null $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getCustom(): string|null
    {
        return $this->custom;
    }

    public function setCustom(string|null $custom): self
    {
        $this->custom = $custom;

        return $this;
    }

    public function getDateBirth(): string|null
    {
        return $this->dateBirth;
    }

    public function setDateBirth(string|null $dateBirth): self
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    public function getDepartment(): string|null
    {
        return $this->department;
    }

    public function setDepartment(string|null $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getDiscountPercentage(): float|null
    {
        return $this->discountPercentage;
    }

    public function setDiscountPercentage(float|null $discountPercentage): self
    {
        $this->discountPercentage = $discountPercentage;

        return $this;
    }

    public function getIban(): string|null
    {
        return $this->iban;
    }

    public function setIban(string|null $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getIndustry(): string|null
    {
        return $this->industry;
    }

    public function setIndustry(string|null $industry): self
    {
        $this->industry = $industry;

        return $this;
    }

    public function isInactive(): bool|null
    {
        return $this->isInactive;
    }

    public function setIsInactive(bool|null $isInactive): self
    {
        $this->isInactive = $isInactive;

        return $this;
    }

    public function getLanguage(): string|null
    {
        return $this->language;
    }

    public function setLanguage(string|null $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getNotes(): string|null
    {
        return $this->notes;
    }

    public function setNotes(string|null $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getNr(): string|null
    {
        return $this->nr;
    }

    public function setNr(string|null $nr): self
    {
        $this->nr = $nr;

        return $this;
    }

    public function getPosition(): string|null
    {
        return $this->position;
    }

    public function setPosition(string|null $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getSequenceNumberId(): int|null
    {
        return $this->sequenceNumberId;
    }

    public function setSequenceNumberId(int|null $sequenceNumberId): self
    {
        $this->sequenceNumberId = $sequenceNumberId;

        return $this;
    }

    public function getTitleId(): int|null
    {
        return $this->titleId;
    }

    public function setTitleId(int|null $titleId): self
    {
        $this->titleId = $titleId;

        return $this;
    }

    public function getVatUid(): string|null
    {
        return $this->vatUid;
    }

    public function setVatUid(string|null $vatUid): self
    {
        $this->vatUid = $vatUid;

        return $this;
    }

    /**
     * @return array<PersonAddress>|null
     */
    public function getAddresses(): array|null
    {
        return $this->addresses;
    }

    /**
     * @param array<PersonAddress>|null $addresses
     */
    public function setAddresses(array|null $addresses): self
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
            $this->addresses = array_values($this->addresses);
        }

        return $this;
    }

    /**
     * @return array<PersonContact>|null
     */
    public function getContacts(): array|null
    {
        return $this->contacts;
    }

    /**
     * @param array<PersonContact>|null $contacts
     */
    public function setContacts(array|null $contacts): self
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
            $this->contacts = array_values($this->contacts);
        }

        return $this;
    }

    public function getCustomfield(int $id): string|null
    {
        if (null === $this->custom) {
            return null;
        }

        $data = XmlHelper::parseValues($this->custom);

        return $data['customField'.$id] ?? null;
    }

    public function setCustomfield(int $id, string|null $value): self
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

    public static function create(array $data): static
    {
        $instance = parent::create($data);

        if (isset($data['addresses']) && \is_array($data['addresses'])) {
            $instance->setAddresses(null);

            foreach ($data['addresses'] as $row) {
                $instance->addAddress(new PersonAddress(
                    $row['type'],
                    $row['address'],
                    $row['zip'],
                    $row['city'],
                    $row['country'],
                ));
            }
        }

        if (isset($data['contacts']) && \is_array($data['contacts'])) {
            $instance->setContacts(null);

            foreach ($data['contacts'] as $row) {
                $instance->addContact(new PersonContact($row['address'], $row['type']));
            }
        }

        return $instance;
    }
}
