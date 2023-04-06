<?php

namespace App\Http\Livewire;

use App\Dto\LtvCalculation;
use App\Services\{CalculateLtv, GetProductQuotes};
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class ProductSearchResults extends Component
{
    protected $listeners = ['searchProducts'];

    public float $propertyValue = 0.0;

    public float $depositAmount = 0.0;

    private CalculateLtv $calculateLtv;
    private GetProductQuotes $getProductQuotes;

    public function boot(CalculateLtv $calculateLtv, GetProductQuotes $getProductQuotes): void
    {
        $this->calculateLtv = $calculateLtv;
        $this->getProductQuotes = $getProductQuotes;
    }

    public function searchProducts(array $formData): void
    {
        [$this->propertyValue, $this->depositAmount] = $formData;
    }

    public function render(): View
    {
        $ltvCalculation = $this->calculateLtv();
        $productQuotes = $this->getProductQuotes($ltvCalculation);

        return view('livewire.product-search-results', [
            'ltvCalculation' => $ltvCalculation,
            'productQuotes' => $productQuotes,
        ]);
    }

    private function calculateLtv(): ?LtvCalculation
    {
        if ($this->propertyValue === null || $this->depositAmount === null) {
            return null;
        }

        if ($this->propertyValue === '' || $this->depositAmount === '') {
            return null;
        }

        return $this->calculateLtv->calculate($this->propertyValue, $this->depositAmount);
    }

    private function getProductQuotes(?LtvCalculation $ltvCalculation): Collection
    {
        if ($ltvCalculation === null) {
            return collect();
        }

        return $this->getProductQuotes->get($ltvCalculation);
    }
}
