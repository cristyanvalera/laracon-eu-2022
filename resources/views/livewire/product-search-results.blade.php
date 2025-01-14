<div>
    @if ($ltvCalculation)
        <section class="results">
            <h2>{{ __('Calculation results') }}</h2>
            <div class="summary">
                <div>
                    <strong>{{ __('LTV') }}:</strong> {{ $ltvCalculation->ltv }}%
                </div>
                <div>
                    <strong>{{ __('Loan amount') }}:</strong> £{{ number_format($ltvCalculation->netLoan, 2) }}
                </div>
            </div>

            @if ($productQuotes->isNotEmpty())
                <section class="availableProducts">
                    <h3>{{ __('Available products') }}</h3>

                    <ul class="productList">
                        @foreach ($productQuotes as $quote)
                            <li>
                                <article class="box product">
                                    <h4>{{ $quote->product->name }}</h4>

                                    <dl class="productDetails">
                                        <dt>Max LTV</dt>
                                        <dd>{{ $quote->product->max_ltv }}%</dd>

                                        <dt>{{ __('Product Fee') }}</dt>
                                        <dd>{{ $quote->product->fee }}%</dd>

                                        <dt>{{ __('Interest rate') }}</dt>
                                        <dd>{{ $quote->product->interest_rate }}%</dd>

                                        <dt>{{ __('Product fee amount') }}</dt>
                                        <dd>£{{ number_format($quote->feeAmount, 2) }}</dd>

                                        <dt>{{ __('Gross loan amount') }}</dt>
                                        <dd>£{{ number_format($quote->grossLoanAmount, 2) }}</dd>

                                        <dt>{{ __('Monthly interest') }}</dt>
                                        <dd>£{{ number_format($quote->monthlyInterest, 2) }}</dd>
                                    </dl>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @else
                <div class="noResults">
                    <strong>{{ __('No product matches your search criteria') }}</strong>
                    <p>{{ __('Try adjusting the details on the left, for example, increasing the deposit amount.') }}
                    </p>
                </div>
            @endif
        </section>
    @else
        <div class="noResults">
            <strong>{{ __('Complete the form on the left') }}</strong>
            <p>{{ __('To begin your product search, please enter a property value and a deposit amount.') }}</p>
        </div>
    @endif
</div>
