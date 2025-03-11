<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\XmlHelper;

/**
 * @property mixed       $createdBy
 * @property mixed       $lastUpdated
 * @property mixed       $lastUpdatedBy
 * @property mixed       $associateName
 * @property mixed       $recurrenceId
 * @property mixed       $responsiblePersonId
 * @property mixed       $responsiblePersonName
 * @property mixed       $statusId
 * @property mixed       $type
 * @property mixed       $bookType
 * @property mixed       $taxType
 * @property mixed       $date
 * @property mixed       $dateDue
 * @property string|null $dateDeliveryStart
 * @property string|null $dateDeliveryEnd
 * @property string|null $dateLastBooked
 * @property float       $subTotal
 * @property float       $tax
 * @property float       $total
 * @property float       $open
 * @property mixed       $groupOpen
 * @property mixed       $qrReference
 * @property mixed       $searchIndex
 * @property mixed       $nameSingular
 * @property mixed       $statusName
 * @property mixed       $icon
 * @property mixed       $actionId
 * @property mixed       $sentStatusId
 * @property mixed       $sent
 * @property mixed       $sentBy
 * @property string|null $downloaded
 * @property string|null $downloadedBy
 * @property string      $currencyCode
 * @property mixed       $qrReferenceUpdatable
 * @property mixed       $iso11649Reference
 * @property mixed       $defaultCurrencyTotal
 * @property mixed       $roundingDifference
 * @property mixed       $foreignCurrency
 * @property mixed       $due
 * @property bool        $isBook
 * @property bool        $isRemoveStock
 * @property bool        $isAddStock
 * @property bool        $isClosed
 * @property bool        $hasDueDays
 * @property bool        $isCreditNote
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

    protected int|null $accountId = null;

    protected int|null $currencyId = null;

    protected float|null $currencyRate = null;

    protected int|null $daysBefore = null;

    protected string|null $description = null;

    protected float|null $discountPercentage = null;

    protected int|null $dueDays = null;

    protected \DateTimeInterface|null $endDate = null;

    protected int|null $groupId = null;

    protected bool|null $isDisplayItemGross = null;

    protected bool|null $isGrouped = null;

    protected array|null $items = null;

    protected string|null $language = null;

    protected string|null $notes = null;

    protected string|null $notifyEmail = null;

    protected int|null $notifyPersonId = null;

    protected string|null $notifyType = null;

    protected int|null $notifyUserId = null;

    protected string|null $nr = null;

    protected int|null $previousId = null;

    protected string|null $recurrence = null;

    protected int|null $responsiblePersonId = null;

    protected int|null $roundingId = null;

    protected int|null $sequenceNumberId = null;

    protected \DateTimeInterface|null $startDate = null;

    protected int|null $statusId = null;

    protected string|null $custom = null;

    public function __construct(int $associateId, int $categoryId, \DateTimeInterface|null $date = null, int|null $id = null)
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

    public function getAccountId(): int|null
    {
        return $this->accountId;
    }

    public function setAccountId(int|null $accountId): self
    {
        $this->accountId = $accountId;

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

    public function getDaysBefore(): int|null
    {
        return $this->daysBefore;
    }

    public function setDaysBefore(int|null $daysBefore): self
    {
        $this->daysBefore = $daysBefore;

        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(string|null $description): self
    {
        $this->description = $description;

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

    public function getDueDays(): int|null
    {
        return $this->dueDays;
    }

    public function setDueDays(int|null $dueDays): self
    {
        $this->dueDays = $dueDays;

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

    public function getGroupId(): int|null
    {
        return $this->groupId;
    }

    public function setGroupId(int|null $groupId): self
    {
        $this->groupId = $groupId;

        return $this;
    }

    public function getIsDisplayItemGross(): bool|null
    {
        return $this->isDisplayItemGross;
    }

    public function setIsDisplayItemGross(bool|null $isDisplayItemGross): self
    {
        $this->isDisplayItemGross = $isDisplayItemGross;

        return $this;
    }

    public function getIsGrouped(): bool|null
    {
        return $this->isGrouped;
    }

    public function setIsGrouped(bool|null $isGrouped): self
    {
        $this->isGrouped = $isGrouped;

        return $this;
    }

    /**
     * @return array<OrderItem>|null
     */
    public function getItems(): array|null
    {
        return $this->items;
    }

    /**
     * @param array<OrderItem>|null $items
     */
    public function setItems(array|null $items): self
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

    public function getNr(): string|null
    {
        return $this->nr;
    }

    public function setNr(string|null $nr): self
    {
        $this->nr = $nr;

        return $this;
    }

    public function getPreviousId(): int|null
    {
        return $this->previousId;
    }

    public function setPreviousId(int|null $previousId): self
    {
        $this->previousId = $previousId;

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

    public function getResponsiblePersonId(): int|null
    {
        return $this->responsiblePersonId;
    }

    public function setResponsiblePersonId(int|null $responsiblePersonId): self
    {
        $this->responsiblePersonId = $responsiblePersonId;

        return $this;
    }

    public function getRoundingId(): int|null
    {
        return $this->roundingId;
    }

    public function setRoundingId(int|null $roundingId): self
    {
        $this->roundingId = $roundingId;

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

    public function getStartDate(): \DateTimeInterface|null
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface|null $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getStatusId(): int|null
    {
        return $this->statusId;
    }

    public function setStatusId(int|null $statusId): self
    {
        $this->statusId = $statusId;

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
