<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class Journal extends AbstractEntity
{
    public const NOTIFY_NONE = 'NONE';
    public const NOTIFY_USER = 'USER';
    public const NOTIFY_PERSON = 'PERSON';
    public const NOTIFY_RESPONSIBLE_PERSON = 'RESPONSIBLE_PERSON';
    public const NOTIFY_EMAIL = 'EMAIL';

    public const RECURRENCE_YEARLY = 'YEARLY';
    public const RECURRENCE_SEMESTRAL = 'SEMESTRAL';
    public const RECURRENCE_QUARTERLY = 'QUARTERLY';
    public const RECURRENCE_BI_MONTHLY = 'BI_MONTHLY';
    public const RECURRENCE_MONTHLY = 'MONTHLY';
    public const RECURRENCE_WEEKLY = 'WEEKLY';
    public const RECURRENCE_BI_WEEKLY = 'BI_WEEKLY';
    public const RECURRENCE_DAILY = 'DAILY';

    protected float $amount;
    protected int $creditId;
    protected int $debitId;
    protected ?string $title = null;
    protected ?string $associateId = null;
    protected ?int $currencyId = null;
    protected ?float $currencyRate = null;
    protected ?\DateTimeInterface $dateAdded = null;
    protected ?int $daysBefore = null;
    protected ?string $notes = null;
    protected ?string $notifyEmail = null;
    protected ?int $notifyPersonId = null;
    protected ?string $notifyType = null;
    protected ?int $notifyUserId = null;
    protected ?string $reference = null;
    protected ?int $sequenceNumberId = null;
    protected ?int $taxId = null;
    protected ?string $recurrence = null;
    protected ?\DateTimeInterface $startDate = null;
    protected ?\DateTimeInterface $endDate = null;

    public function __construct(float $amount, int $creditId, int $debitId, \DateTimeInterface $dateAdded, int $id = null)
    {
        parent::__construct($id);

        $this->amount = $amount;
        $this->creditId = $creditId;
        $this->debitId = $debitId;
        $this->dateAdded = $dateAdded;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): Journal
    {
        $this->amount = $amount;
        return $this;
    }

    public function getCreditId(): int
    {
        return $this->creditId;
    }

    public function setCreditId(int $creditId): Journal
    {
        $this->creditId = $creditId;
        return $this;
    }

    public function getDebitId(): int
    {
        return $this->debitId;
    }

    public function setDebitId(int $debitId): Journal
    {
        $this->debitId = $debitId;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): Journal
    {
        $this->title = $title;
        return $this;
    }

    public function getAssociateId(): ?string
    {
        return $this->associateId;
    }

    public function setAssociateId(?string $associateId): Journal
    {
        $this->associateId = $associateId;
        return $this;
    }

    public function getCurrencyId(): ?int
    {
        return $this->currencyId;
    }

    public function setCurrencyId(?int $currencyId): Journal
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    public function getCurrencyRate(): ?float
    {
        return $this->currencyRate;
    }

    public function setCurrencyRate(?float $currencyRate): Journal
    {
        $this->currencyRate = $currencyRate;
        return $this;
    }

    public function getDateAdded(): ?\DateTimeInterface
    {
        return $this->dateAdded;
    }

    public function setDateAdded(?\DateTimeInterface $dateAdded): Journal
    {
        $this->dateAdded = $dateAdded;
        return $this;
    }

    public function getDaysBefore(): ?int
    {
        return $this->daysBefore;
    }

    public function setDaysBefore(?int $daysBefore): Journal
    {
        $this->daysBefore = $daysBefore;
        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): Journal
    {
        $this->notes = $notes;
        return $this;
    }

    public function getNotifyEmail(): ?string
    {
        return $this->notifyEmail;
    }

    public function setNotifyEmail(?string $notifyEmail): Journal
    {
        $this->notifyEmail = $notifyEmail;
        return $this;
    }

    public function getNotifyPersonId(): ?int
    {
        return $this->notifyPersonId;
    }

    public function setNotifyPersonId(?int $notifyPersonId): Journal
    {
        $this->notifyPersonId = $notifyPersonId;
        return $this;
    }

    public function getNotifyType(): ?string
    {
        return $this->notifyType;
    }

    public function setNotifyType(?string $notifyType): Journal
    {
        $this->notifyType = $notifyType;
        return $this;
    }

    public function getNotifyUserId(): ?int
    {
        return $this->notifyUserId;
    }

    public function setNotifyUserId(?int $notifyUserId): Journal
    {
        $this->notifyUserId = $notifyUserId;
        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): Journal
    {
        $this->reference = $reference;
        return $this;
    }

    public function getSequenceNumberId(): ?int
    {
        return $this->sequenceNumberId;
    }

    public function setSequenceNumberId(?int $sequenceNumberId): Journal
    {
        $this->sequenceNumberId = $sequenceNumberId;
        return $this;
    }

    public function getTaxId(): ?int
    {
        return $this->taxId;
    }

    public function setTaxId(?int $taxId): Journal
    {
        $this->taxId = $taxId;
        return $this;
    }

    public function getRecurrence(): ?string
    {
        return $this->recurrence;
    }

    public function setRecurrence(?string $recurrence): Journal
    {
        $this->recurrence = $recurrence;
        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): Journal
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): Journal
    {
        $this->endDate = $endDate;
        return $this;
    }
}
