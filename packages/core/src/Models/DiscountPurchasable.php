<?php

namespace Lunar\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Lunar\Base\BaseModel;
use Lunar\Database\Factories\DiscountPurchasableFactory;

/**
 * @property int $id
 * @property int $discount_id
 * @property string $purchasable_type
 * @property int $purchasable_id
 * @property string $type
 * @property ?\Illuminate\Support\Carbon $created_at
 * @property ?\Illuminate\Support\Carbon $updated_at
 */
class DiscountPurchasable extends BaseModel
{
    use HasFactory;

    /**
     * Define which attributes should be cast.
     *
     * @var array
     */
    protected $casts = [];

    protected $fillable = [
        'purchasable_type',
        'purchasable_id',
        'type',
    ];

    /**
     * Return a new factory instance for the model.
     */
    protected static function newFactory(): DiscountPurchasableFactory
    {
        return DiscountPurchasableFactory::new();
    }

    /**
     * Return the discount relationship.
     */
    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }

    /**
     * Return the priceable relationship.
     */
    public function purchasable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Scope a query where type is condition.
     */
    public function scopeCondition(Builder $query): void
    {
        $query->whereType('condition');
    }
}
