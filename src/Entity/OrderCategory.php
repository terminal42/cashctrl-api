<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class OrderCategory extends AbstractEntity
{
    public const TYPE_SALES = 'SALES';
    public const TYPE_PURCHASE = 'PURCHASE';

    protected int $accountId;
    protected string $namePlural;
    protected string $nameSingular;
    protected array $status = [];
    protected ?string $addressType = null;
    protected ?array $bookTemplates = null;
    protected ?string $bookType = null;
    protected ?int $currencyId = null;
    protected ?string $dueDays = null;
    protected ?string $footer = null;
    protected ?bool $hasDueDays = null;
    protected ?string $header = null;
    protected ?bool $isDisplayItemGross = null;
    protected ?bool $isDisplayPrices = null;
    protected ?bool $isInactive = null;
    protected ?bool $isSwitchRecipient = null;
    protected ?string $mail = null;
    protected ?int $responsiblePersonId = null;
    protected ?int $roundingId = null;
    protected ?int $sentStatusId = null;
    protected ?int $sequenceNrId = null;
    protected ?int $templateId = null;
    protected ?string $type = null;

    public function __construct(int $accountId, string $namePlural, string $nameSingular, int $id = null)
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

    public function getAddressType(): ?string
    {
        return $this->addressType;
    }

    public function setAddressType(?string $addressType): self
    {
        $this->addressType = $addressType;
        return $this;
    }

    public function getBookType(): ?string
    {
        return $this->bookType;
    }

    public function setBookType(?string $bookType): self
    {
        $this->bookType = $bookType;
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

    public function getDueDays(): ?string
    {
        return $this->dueDays;
    }

    public function setDueDays(?string $dueDays): self
    {
        $this->dueDays = $dueDays;
        return $this;
    }

    public function getFooter(): ?string
    {
        return $this->footer;
    }

    public function setFooter(?string $footer): self
    {
        $this->footer = $footer;
        return $this;
    }

    public function getHasDueDays(): ?bool
    {
        return $this->hasDueDays;
    }

    public function setHasDueDays(?bool $hasDueDays): self
    {
        $this->hasDueDays = $hasDueDays;
        return $this;
    }

    public function getHeader(): ?string
    {
        return $this->header;
    }

    public function setHeader(?string $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function isDisplayItemGross(): ?bool
    {
        return $this->isDisplayItemGross;
    }

    public function setIsDisplayItemGross(?bool $isDisplayItemGross): self
    {
        $this->isDisplayItemGross = $isDisplayItemGross;
        return $this;
    }

    public function isDisplayPrices(): ?bool
    {
        return $this->isDisplayPrices;
    }

    public function setIsDisplayPrices(?bool $isDisplayPrices): self
    {
        $this->isDisplayPrices = $isDisplayPrices;
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

    public function isSwitchRecipient(): ?bool
    {
        return $this->isSwitchRecipient;
    }

    public function setIsSwitchRecipient(?bool $isSwitchRecipient): self
    {
        $this->isSwitchRecipient = $isSwitchRecipient;
        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;
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

    public function getSentStatusId(): ?int
    {
        return $this->sentStatusId;
    }

    public function setSentStatusId(?int $sentStatusId): self
    {
        $this->sentStatusId = $sentStatusId;
        return $this;
    }

    public function getSequenceNrId(): ?int
    {
        return $this->sequenceNrId;
    }

    public function setSequenceNrId(?int $sequenceNrId): self
    {
        $this->sequenceNrId = $sequenceNrId;
        return $this;
    }

    public function getTemplateId(): ?int
    {
        return $this->templateId;
    }

    public function setTemplateId(?int $templateId): self
    {
        $this->templateId = $templateId;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return OrderCategoryStatus[]
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @param OrderCategoryStatus[] $status
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

    public function getBookTemplates(): ?array
    {
        return $this->bookTemplates;
    }

    /**
     * @param OrderCategoryBookTemplate[]|null $bookTemplates
     */
    public function setBookTemplates(?array $bookTemplates): self
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
        }

        return $this;
    }

    public static function create(array $data, bool $partial = false): self
    {
        $instance = parent::create($data, $partial);

        if (isset($data['status']) && \is_array($data['status'])) {
            $instance->setStatus([]);
            foreach ($data['status'] as $row) {
                $status = new OrderCategoryStatus($row['icon'], $row['name']);
                $status->actionId = $row['actionId'] ?? null;
                $status->isAddStock = $row['isAddStock'] ?? null;
                $status->isBook = $row['isBook'] ?? null;
                $status->isClosed = $row['isClosed'] ?? null;
                $status->isRemoveStock = $row['isRemoveStock'] ?? null;
                $instance->addStatus($status);
            }
        }

        return $instance;
    }
}
