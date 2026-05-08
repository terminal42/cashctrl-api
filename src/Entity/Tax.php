<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

/**
 * @property float      $currentPercentage
 * @property float|null $currentPercentageFlat
 * @property string     $accountDisplay
 * @property bool       $isFlat
 */
class Tax extends AbstractEntity
{
    protected string $code;

    /**
     * @var array<TaxComponent>
     */
    protected array $components;

    /**
     * @var array<TaxRate>
     */
    protected array $rates;

    protected string|null $description = null;

    protected string|null $documentName = null;

    protected bool|null $isDisplayTaxRate = null;

    protected bool|null $isInactive = null;

    public function __construct(string $code, array $components, array $rates, int|null $id = null)
    {
        parent::__construct($id);

        $this->code = $code;

        $this->setComponents($components);
        $this->setRates($rates);
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return array<TaxComponent>
     */
    public function getComponents(): array
    {
        return $this->components;
    }

    /**
     * @param array<TaxComponent> $components
     */
    public function setComponents(array $components): self
    {
        $this->components = [];

        foreach ($components as $component) {
            $this->addComponent($component);
        }

        return $this;
    }

    public function addComponent(TaxComponent $component): self
    {
        $this->components[] = $component;

        return $this;
    }

    public function removeComponent(TaxComponent $component): self
    {
        if (false !== ($key = array_search($component, $this->components, true))) {
            unset($this->components[$key]);
            $this->components = array_values($this->components);
        }

        return $this;
    }

    /**
     * @return array<TaxRate>
     */
    public function getRates(): array
    {
        return $this->rates;
    }

    /**
     * @param array<TaxRate> $rates
     */
    public function setRates(array $rates): self
    {
        $this->rates = [];

        foreach ($rates as $rate) {
            $this->addRate($rate);
        }

        return $this;
    }

    public function addRate(TaxRate $rate): self
    {
        $this->rates[] = $rate;

        return $this;
    }

    public function removeRate(TaxRate $rate): self
    {
        if (false !== ($key = array_search($rate, $this->rates, true))) {
            unset($this->rates[$key]);
            $this->rates = array_values($this->rates);
        }

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

    public function getDocumentName(): string|null
    {
        return $this->documentName;
    }

    public function setDocumentName(string|null $documentName): self
    {
        $this->documentName = $documentName;

        return $this;
    }

    public function getIsDisplayTaxRate(): bool|null
    {
        return $this->isDisplayTaxRate;
    }

    public function setIsDisplayTaxRate(bool|null $isDisplayTaxRate): self
    {
        $this->isDisplayTaxRate = $isDisplayTaxRate;

        return $this;
    }

    public function getIsInactive(): bool|null
    {
        return $this->isInactive;
    }

    public function setIsInactive(bool|null $isInactive): self
    {
        $this->isInactive = $isInactive;

        return $this;
    }

    public static function create(array $data): static
    {
        $instance = parent::create($data);

        if (isset($data['components']) && \is_array($data['components'])) {
            $instance->setComponents([]);

            foreach ($data['components'] as $row) {
                $instance->addComponent(TaxComponent::create($row));
            }
        }

        if (isset($data['rates']) && \is_array($data['rates'])) {
            $instance->setRates([]);

            foreach ($data['rates'] as $row) {
                $instance->addRate(TaxRate::create($row));
            }
        }

        return $instance;
    }
}
