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

    protected string|null $title = null;

    protected string|null $associateId = null;

    protected int|null $currencyId = null;

    protected float|null $currencyRate = null;

    protected \DateTimeInterface|null $dateAdded = null;

    protected int|null $daysBefore = null;

    protected array|null $items = null;

    protected string|null $notes = null;

    protected string|null $notifyEmail = null;

    protected int|null $notifyPersonId = null;

    protected string|null $notifyType = null;

    protected int|null $notifyUserId = null;

    protected string|null $reference = null;

    protected int|null $sequenceNumberId = null;

    protected int|null $taxId = null;

    protected string|null $recurrence = null;

    protected \DateTimeInterface|null $startDate = null;

    protected \DateTimeInterface|null $endDate = null;

    public function __construct(float $amount, int $creditId, int $debitId, \DateTimeInterface $dateAdded, int|null $id = null)
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

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCreditId(): int
    {
        return $this->creditId;
    }

    public function setCreditId(int $creditId): self
    {
        $this->creditId = $creditId;

        return $this;
    }

    public function getDebitId(): int
    {
        return $this->debitId;
    }

    public function setDebitId(int $debitId): self
    {
        $this->debitId = $debitId;

        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string|null $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAssociateId(): string|null
    {
        return $this->associateId;
    }

    public function setAssociateId(string|null $associateId): self
    {
        $this->associateId = $associateId;

        return $this;
    }

    public function getCurrencyId(): int|null
    {
        return $this->currencyId;
    }

    public function setCurrencyId(int|null $currencyId): self
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    public function getCurrencyRate(): float|null
    {
        return $this->currencyRate;
    }

    public function setCurrencyRate(float|null $currencyRate): self
    {
        $this->currencyRate = $currencyRate;

        return $this;
    }

    public function getDateAdded(): \DateTimeInterface|null
    {
        return $this->dateAdded;
    }

    public function setDateAdded(\DateTimeInterface|null $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * @return array<JournalItem>|null
     */
    public function getItems(): array|null
    {
        return $this->items;
    }

    /**
     * @param array<JournalItem>|null $items
     */
    public function setItems(array|null $items): self
    {
        $this->items = null;

        foreach ($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }

    public function addItem(JournalItem $item): self
    {
        if (null === $this->items) {
            $this->items = [];
        }

        $this->items[] = $item;

        return $this;
    }

    public function removeItem(JournalItem $item): self
    {
        if (null === $this->items) {
            return $this;
        }

        if (false !== ($key = array_search($item, $this->items, true))) {
            unset($this->items[$key]);
            $this->items = array_values($this->items);
        }

        return $this;
    }

    public function getDaysBefore(): int|null
    {
        return $this->daysBefore;
    }

    public function setDaysBefore(int|null $daysBefore): self
    {
        $this->daysBefore = $daysBefore;

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

    public function getNotifyEmail(): string|null
    {
        return $this->notifyEmail;
    }

    public function setNotifyEmail(string|null $notifyEmail): self
    {
        $this->notifyEmail = $notifyEmail;

        return $this;
    }

    public function getNotifyPersonId(): int|null
    {
        return $this->notifyPersonId;
    }

    public function setNotifyPersonId(int|null $notifyPersonId): self
    {
        $this->notifyPersonId = $notifyPersonId;

        return $this;
    }

    public function getNotifyType(): string|null
    {
        return $this->notifyType;
    }

    public function setNotifyType(string|null $notifyType): self
    {
        $this->notifyType = $notifyType;

        return $this;
    }

    public function getNotifyUserId(): int|null
    {
        return $this->notifyUserId;
    }

    public function setNotifyUserId(int|null $notifyUserId): self
    {
        $this->notifyUserId = $notifyUserId;

        return $this;
    }

    public function getReference(): string|null
    {
        return $this->reference;
    }

    public function setReference(string|null $reference): self
    {
        $this->reference = $reference;

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

    public function getTaxId(): int|null
    {
        return $this->taxId;
    }

    public function setTaxId(int|null $taxId): self
    {
        $this->taxId = $taxId;

        return $this;
    }

    public function getRecurrence(): string|null
    {
        return $this->recurrence;
    }

    public function setRecurrence(string|null $recurrence): self
    {
        $this->recurrence = $recurrence;

        return $this;
    }

    public function getStartDate(): \DateTimeInterface|null
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface|null $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): \DateTimeInterface|null
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface|null $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public static function create(array $data): self
    {
        if (\is_array($data['items'] ?? null)) {
            $items = [];

            foreach ($data['items'] as $item) {
                $items[] = JournalItem::create($item);
            }
            $data['items'] = $items;
        }

        return parent::create($data);
    }
}
