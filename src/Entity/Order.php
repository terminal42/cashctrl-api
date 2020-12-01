<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class Order extends AbstractEntity
{
    public const RECURRENCE_YEARLY = 'YEARLY';
    public const RECURRENCE_SEMESTRAL = 'SEMESTRAL';
    public const RECURRENCE_QUARTERLY = 'QUARTERLY';
    public const RECURRENCE_BI_MONTHLY = 'BI_MONTHLY';
    public const RECURRENCE_MONTHLY = 'MONTHLY';
    public const RECURRENCE_WEEKLY = 'WEEKLY';
    public const RECURRENCE_BI_WEEKLY = 'BI_WEEKLY';
    public const RECURRENCE_DAILY = 'DAILY';

    protected int $associateId;
    protected int $categoryId;
    protected \DateTime $date;
    protected ?int $accountId = null;
    protected ?int $currencyId = null;
    protected ?float $currencyRate = null;
    //protected ?string $custom = null;
    protected ?string $description = null;
    protected ?float $discountPercentage = null;
    protected ?int $dueDays = null;
    protected ?\DateTime $endDate = null;
    protected ?int $groupId = null;
    protected ?bool $isDisplayItemGross = null;
    protected ?bool $isGrouped = null;
    protected ?array $items = null;
    protected ?string $notes = null;
    protected ?string $nr = null;
    protected ?int $previousId = null;
    protected ?string $recurrence = null;
    protected ?int $responsiblePersonId = null;
    protected ?int $roundingId = null;
    protected ?int $sequenceNumberId = null;
    protected ?\DateTime $startDate = null;
    protected ?int $statusId = null;


    public function __construct(int $associateId, int $categoryId, \DateTime $date, int $id = null)
    {
        parent::__construct($id);

        $this->associateId = $associateId;
        $this->categoryId = $categoryId;
        $this->date = $date;
    }

    public function getAssociateId(): int
    {
        return $this->associateId;
    }

    public function setAssociateId(int $associateId): self
    {
        $this->associateId = $associateId;
        return $this;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    public function setAccountId(?int $accountId): self
    {
        $this->accountId = $accountId;
        return $this;
    }

    public function getCurrencyId(): ?int
    {
        return $this->currencyId;
    }

    public function setCurrencyId(?int $currencyId): self
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    public function getCurrencyRate(): ?float
    {
        return $this->currencyRate;
    }

    public function setCurrencyRate(?float $currencyRate): self
    {
        $this->currencyRate = $currencyRate;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
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

    public function getDueDays(): ?int
    {
        return $this->dueDays;
    }

    public function setDueDays(?int $dueDays): self
    {
        $this->dueDays = $dueDays;
        return $this;
    }

    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTime $endDate): self
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function setGroupId(?int $groupId): self
    {
        $this->groupId = $groupId;
        return $this;
    }

    public function getIsDisplayItemGross(): ?bool
    {
        return $this->isDisplayItemGross;
    }

    public function setIsDisplayItemGross(?bool $isDisplayItemGross): self
    {
        $this->isDisplayItemGross = $isDisplayItemGross;
        return $this;
    }

    public function getIsGrouped(): ?bool
    {
        return $this->isGrouped;
    }

    public function setIsGrouped(?bool $isGrouped): self
    {
        $this->isGrouped = $isGrouped;
        return $this;
    }

    public function getItems(): ?array
    {
        return $this->items;
    }

    public function setItems(?array $items): self
    {
        $this->items = $items;
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

    public function getPreviousId(): ?int
    {
        return $this->previousId;
    }

    public function setPreviousId(?int $previousId): self
    {
        $this->previousId = $previousId;
        return $this;
    }

    public function getRecurrence(): ?string
    {
        return $this->recurrence;
    }

    public function setRecurrence(?string $recurrence): self
    {
        $this->recurrence = $recurrence;
        return $this;
    }

    public function getResponsiblePersonId(): ?int
    {
        return $this->responsiblePersonId;
    }

    public function setResponsiblePersonId(?int $responsiblePersonId): self
    {
        $this->responsiblePersonId = $responsiblePersonId;
        return $this;
    }

    public function getRoundingId(): ?int
    {
        return $this->roundingId;
    }

    public function setRoundingId(?int $roundingId): self
    {
        $this->roundingId = $roundingId;
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

    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTime $startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getStatusId(): ?int
    {
        return $this->statusId;
    }

    public function setStatusId(?int $statusId): self
    {
        $this->statusId = $statusId;
        return $this;
    }
}
