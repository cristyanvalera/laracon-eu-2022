<div>
    <form id="product-search-form" class="ph-24">
        <fieldset>
            <legend>{{ __('Search products') }}</legend>

            <label for="property_value">
                <span class="label">{{ __('Property value') }}:</span>
                <input type="text" name="property_value" id="property_value">
            </label>

            <label for="deposit_amount">
                <span class="label">{{ __('Deposit amount') }}:</span>
                <input type="text" name="deposit_amount" id="deposit_amount">
            </label>

            <button type="submit" class="button mt-30">
                {{ __('Find products') }}
            </button>
        </fieldset>
    </form>

    <script>
        document.getElementById('product-search-form').onsubmit = (event) => {
            Livewire.emit('searchProducts', [
                event.target.property_value.value,
                event.target.deposit_amount.value
            ]);
            event.preventDefault();
        };
    </script>
</div>
