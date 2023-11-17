<?php

namespace Lunar\Base\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Lunar\Facades\Pricing;
use Lunar\Managers\PricingManager;
use Lunar\Models\Price;

trait HasPrices
{
    /**
     * Get all of the models prices.
     */
    public function prices(): MorphMany
    {
        return $this->morphMany(
            Price::class,
            'priceable'
        );
    }

    /**
     * Return base prices query.
     */
    public function basePrices(): MorphMany
    {
        return $this->prices()->whereTier(1)->whereNull('customer_group_id');
    }

    /**
     * Return a PricingManager for this model.
     */
    public function pricing(): PricingManager
    {
        return Pricing::for($this);
    }
}
