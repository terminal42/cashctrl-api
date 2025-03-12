<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\Enum\AddressType;
use Terminal42\CashctrlApi\Enum\BookType;
use Terminal42\CashctrlApi\Enum\OrderCategoryType;

class OrderCategory extends AbstractEntity
{
    protected int $accountId;

    protected string $namePlural;

    protected string $nameSingular;

    protected array $status = [];

    protected AddressType|null $addressType = null;

    protected array|null $bookTemplates = null;

    protected BookType|null $bookType = null;

    protected int|null $currencyId = null;

    protected string|null $dueDays = null;

    protected string|null $footer = null;

    protected bool|null $hasDueDays = null;

    protected string|null $header = null;

    protected bool|null $isDisplayItemGross = null;

    protected bool|null $isDisplayPrices = null;

    protected bool|null $isInactive = null;

    protected bool|null $isSwitchRecipient = null;

    protected string|null $mail = null;

    protected int|null $responsiblePersonId = null;

    protected int|null $roundingId = null;

    protected int|null $sentStatusId = null;

    protected int|null $sequenceNrId = null;

    protected int|null $templateId = null;

    protected OrderCategoryType|null $type = null;

    public function __construct(int $accountId, string $namePlural, string $nameSingular, int|null $id = null)
    {
        parent::__construct($id);

        $this->accountId = $accountId;
        $this->namePlural = $namePlural;
        $this->nameSingular = $nameSingular;
    }

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function setAccountId(int $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function getNamePlural(): string
    {
        return $this->namePlural;
    }

    public function setNamePlural(string $namePlural): self
    {
        $this->namePlural = $namePlural;

        return $this;
    }

    public function getNameSingular(): string
    {
        return $this->nameSingular;
    }

    public function setNameSingular(string $nameSingular): self
    {
        $this->nameSingular = $nameSingular;

        return $this;
    }

    public function getAddressType(): AddressType|null
    {
        return $this->addressType;
    }

    public function setAddressType(AddressType|null $addressType): self
    {
        $this->addressType = $addressType;

        return $this;
    }

    public function getBookType(): BookType|null
    {
        return $this->bookType;
    }

    public function setBookType(BookType|null $bookType): self
    {
        $this->bookType = $bookType;

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

    public function getDueDays(): string|null
    {
        return $this->dueDays;
    }

    public function setDueDays(string|null $dueDays): self
    {
        $this->dueDays = $dueDays;

        return $this;
    }

    public function getFooter(): string|null
    {
        return $this->footer;
    }

    public function setFooter(string|null $footer): self
    {
        $this->footer = $footer;

        return $this;
    }

    public function getHasDueDays(): bool|null
    {
        return $this->hasDueDays;
    }

    public function setHasDueDays(bool|null $hasDueDays): self
    {
        $this->hasDueDays = $hasDueDays;

        return $this;
    }

    public function getHeader(): string|null
    {
        return $this->header;
    }

    public function setHeader(string|null $header): self
    {
        $this->header = $header;

        return $this;
    }

    public function isDisplayItemGross(): bool|null
    {
        return $this->isDisplayItemGross;
    }

    public function setIsDisplayItemGross(bool|null $isDisplayItemGross): self
    {
        $this->isDisplayItemGross = $isDisplayItemGross;

        return $this;
    }

    public function isDisplayPrices(): bool|null
    {
        return $this->isDisplayPrices;
    }

    public function setIsDisplayPrices(bool|null $isDisplayPrices): self
    {
        $this->isDisplayPrices = $isDisplayPrices;

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

    public function isSwitchRecipient(): bool|null
    {
        return $this->isSwitchRecipient;
    }

    public function setIsSwitchRecipient(bool|null $isSwitchRecipient): self
    {
        $this->isSwitchRecipient = $isSwitchRecipient;

        return $this;
    }

    public function getMail(): string|null
    {
        return $this->mail;
    }

    public function setMail(string|null $mail): self
    {
        $this->mail = $mail;

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

    public function getSentStatusId(): int|null
    {
        return $this->sentStatusId;
    }

    public function setSentStatusId(int|null $sentStatusId): self
    {
        $this->sentStatusId = $sentStatusId;

        return $this;
    }

    public function getSequenceNrId(): int|null
    {
        return $this->sequenceNrId;
    }

    public function setSequenceNrId(int|null $sequenceNrId): self
    {
        $this->sequenceNrId = $sequenceNrId;

        return $this;
    }

    public function getTemplateId(): int|null
    {
        return $this->templateId;
    }

    public function setTemplateId(int|null $templateId): self
    {
        $this->templateId = $templateId;

        return $this;
    }

    public function getType(): OrderCategoryType|null
    {
        return $this->type;
    }

    public function setType(OrderCategoryType|null $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return array<OrderCategoryStatus>
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @param array<OrderCategoryStatus> $status
     */
    public function setStatus(array $status): self
    {
        $this->status = [];

        foreach ($status as $row) {
            $this->addStatus($row);
        }

        return $this;
    }

    public function addStatus(OrderCategoryStatus $status): self
    {
        $this->status[] = $status;

        return $this;
    }

    public function removeStatus(OrderCategoryStatus $status): self
    {
        if (false !== ($key = array_search($status, $this->status, true))) {
            unset($this->status[$key]);
        }

        return $this;
    }

    public function getBookTemplates(): array|null
    {
        return $this->bookTemplates;
    }

    /**
     * @param array<OrderCategoryBookTemplate>|null $bookTemplates
     */
    public function setBookTemplates(array|null $bookTemplates): self
    {
        $this->bookTemplates = null;

        foreach ($bookTemplates as $template) {
            $this->addBookTemplate($template);
        }

        return $this;
    }

    public function addBookTemplate(OrderCategoryBookTemplate $bookTemplate): self
    {
        if (null === $this->bookTemplates) {
            $this->bookTemplates = [];
        }

        $this->bookTemplates[] = $bookTemplate;

        return $this;
    }

    public function removeContact(OrderCategoryBookTemplate $bookTemplate): self
    {
        if (null === $this->bookTemplates) {
            return $this;
        }

        if (false !== ($key = array_search($bookTemplate, $this->bookTemplates, true))) {
            unset($this->bookTemplates[$key]);
            $this->bookTemplates = array_values($this->bookTemplates);
        }

        return $this;
    }

    public static function create(array $data): static
    {
        $instance = parent::create($data);

        if (isset($data['status']) && \is_array($data['status'])) {
            $instance->setStatus([]);

            foreach ($data['status'] as $row) {
                $instance->addStatus(OrderCategoryStatus::create($row));
            }
        }

        return $instance;
    }
}
