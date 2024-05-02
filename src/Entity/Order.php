<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\XmlHelper;

/**
 * @property-read $createdBy
 * @property-read $lastUpdated
 * @property-read $lastUpdatedBy
 * @property-read $associateName
 * @property-read $recurrenceId
 * @property-read $responsiblePersonId
 * @property-read $responsiblePersonName
 * @property-read $statusId
 * @property-read $type
 * @property-read $bookType
 * @property-read $taxType
 * @property-read $date
 * @property-read $dateDue
 * @property-read string|null $dateDeliveryStart
 * @property-read string|null $dateDeliveryEnd
 * @property-read string|null $dateLastBooked
 * @property-read float $subTotal
 * @property-read float $tax
 * @property-read float $total
 * @property-read float $open
 * @property-read $groupOpen
 * @property-read $qrReference
 * @property-read $searchIndex
 * @property-read $nameSingular
 * @property-read $statusName
 * @property-read $icon
 * @property-read $actionId
 * @property-read $sentStatusId
 * @property-read $sent
 * @property-read $sentBy
 * @property-read string|null $downloaded
 * @property-read string|null $downloadedBy
 * @property-read string $currencyCode
 * @property-read $qrReferenceUpdatable
 * @property-read $iso11649Reference
 * @property-read $defaultCurrencyTotal
 * @property-read $roundingDifference
 * @property-read $foreignCurrency
 * @property-read $due
 * @property-read bool $isBook
 * @property-read bool $isRemoveStock
 * @property-read bool $isAddStock
 * @property-read bool $isClosed
 * @property-read bool $hasDueDays
 * @property-read bool $isCreditNote
 */
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

    public const NOTIFY_TYPE_NONE = 'NONE';
    public const NOTIFY_TYPE_USER = 'USER';
    public const NOTIFY_TYPE_PERSON = 'PERSON';
    public const NOTIFY_TYPE_RESPONSIBLE_PERSON = 'RESPONSIBLE_PERSON';
    public const NOTIFY_TYPE_EMAIL = 'EMAIL';

    protected int $associateId;
    protected int $categoryId;
    protected \DateTimeInterface $date;
    protected ?int $accountId = null;
    protected ?int $currencyId = null;
    protected ?float $currencyRate = null;
    protected ?int $daysBefore = null;
    protected ?string $description = null;
    protected ?float $discountPercentage = null;
    protected ?int $dueDays = null;
    protected ?\DateTimeInterface $endDate = null;
    protected ?int $groupId = null;
    protected ?bool $isDisplayItemGross = null;
    protected ?bool $isGrouped = null;
    protected ?array $items = null;
    protected ?string $language = null;
    protected ?string $notes = null;
    protected ?string $notifyEmail = null;
    protected ?int $notifyPersonId = null;
    protected ?string $notifyType = null;
    protected ?int $notifyUserId = null;
    protected ?string $nr = null;
    protected ?int $previousId = null;
    protected ?string $recurrence = null;
    protected ?int $responsiblePersonId = null;
    protected ?int $roundingId = null;
    protected ?int $sequenceNumberId = null;
    protected ?\DateTimeInterface $startDate = null;
    protected ?int $statusId = null;
    protected ?string $custom = null;


    public function __construct(int $associateId, int $categoryId, \DateTimeInterface $date = null, int $id = null)
    {
        parent::__construct($id);

        $this->associateId = $associateId;
        $this->categoryId = $categoryId;
        $this->date = $date ?? new \DateTime();
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

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
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

    public function getDaysBefore(): ?int
    {
        return $this->daysBefore;
    }

    public function setDaysBefore(?int $daysBefore): self
    {
        $this->daysBefore = $daysBefore;
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

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): self
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

    /**
     * @return OrderItem[]|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param OrderItem[]|null $items
     */
    public function setItems(?array $items): self
    {
        $this->items = null;

        foreach ($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }

    public function addItem(OrderItem $item): self
    {
        if (null === $this->items) {
            $this->items = [];
        }

        $this->items[] = $item;

        return $this;
    }

    public function removeItem(OrderItem $item): self
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

    public function getNotifyEmail(): ?string
    {
        return $this->notifyEmail;
    }

    public function setNotifyEmail(?string $notifyEmail): self
    {
        $this->notifyEmail = $notifyEmail;
        return $this;
    }

    public function getNotifyPersonId(): ?int
    {
        return $this->notifyPersonId;
    }

    public function setNotifyPersonId(?int $notifyPersonId): self
    {
        $this->notifyPersonId = $notifyPersonId;
        return $this;
    }

    public function getNotifyType(): ?string
    {
        return $this->notifyType;
    }

    public function setNotifyType(?string $notifyType): self
    {
        $this->notifyType = $notifyType;
        return $this;
    }

    public function getNotifyUserId(): ?int
    {
        return $this->notifyUserId;
    }

    public function setNotifyUserId(?int $notifyUserId): self
    {
        $this->notifyUserId = $notifyUserId;
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

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
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

    public function getCustom(): ?string
    {
        return $this->custom;
    }

    public function setCustom(?string $custom): self
    {
        $this->custom = $custom;
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

    public static function create(array $data): self
    {
        if (\is_array($data['items'] ?? null)) {
            $items = [];
            foreach ($data['items'] as $item) {
                $items[] = OrderItem::create($item);
            }
            $data['items'] = $items;
        }

        return parent::create($data);
    }
}
