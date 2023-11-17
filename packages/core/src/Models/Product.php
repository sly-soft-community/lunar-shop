<?php

namespace Lunar\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Lunar\Base\BaseModel;
use Lunar\Base\Casts\AsAttributeData;
use Lunar\Base\Traits\HasChannels;
use Lunar\Base\Traits\HasCustomerGroups;
use Lunar\Base\Traits\HasMacros;
use Lunar\Base\Traits\HasMedia;
use Lunar\Base\Traits\HasTags;
use Lunar\Base\Traits\HasTranslations;
use Lunar\Base\Traits\HasUrls;
use Lunar\Base\Traits\LogsActivity;
use Lunar\Base\Traits\Searchable;
use Lunar\Database\Factories\ProductFactory;
use Lunar\Jobs\Products\Associations\Associate;
use Lunar\Jobs\Products\Associations\Dissociate;
use Modules\Shop\Entities\FavoriteProduct;
use Spatie\MediaLibrary\HasMedia as SpatieHasMedia;

/**
 * @property int $id
 * @property ?int $brand_id
 * @property int $product_type_id
 * @property string $status
 * @property array $attribute_data
 * @property ?\Illuminate\Support\Carbon $created_at
 * @property ?\Illuminate\Support\Carbon $updated_at
 * @property ?\Illuminate\Support\Carbon $deleted_at
 */
class Product extends BaseModel implements SpatieHasMedia
{
    use HasChannels;
    use HasCustomerGroups;
    use HasFactory;
    use HasMacros;
    use HasMedia;
    use HasTags;
    use HasTranslations;
    use HasUrls;
    use LogsActivity;
    use Searchable;
    use SoftDeletes;

    /**
     * Return a new factory instance for the model.
     */
    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }

    /**
     * Define which attributes should be
     * fillable during mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'attribute_data',
        'product_type_id',
        'status',
        'brand_id',
        'meta',
    ];

    /**
     * Define which attributes should be cast.
     *
     * @var array
     */
    protected $casts = [
        'attribute_data' => AsAttributeData::class,
        'meta' => 'object',
    ];

    /**
     * Returns the attributes to be stored against this model.
     */
    public function mappedAttributes(): Collection
    {
        return $this->productType->mappedAttributes;
    }

    /**
     * Return the product type relation.
     */
    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    /**
     * Return the product images relation.
     */
    public function images(): MorphMany
    {
        return $this->media()->where('collection_name', 'images');
    }

    /**
     * Return the product variants relation.
     */
    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * Return the product collections relation.
     */
    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(
            Collection::class,
            config('lunar.database.table_prefix').'collection_product'
        )->withPivot(['position'])->withTimestamps();
    }

    /**
     * Return the associations relationship.
     */
    public function associations(): HasMany
    {
        return $this->hasMany(ProductAssociation::class, 'product_parent_id');
    }

    /**
     * Return the associations relationship.
     */
    public function inverseAssociations(): HasMany
    {
        return $this->hasMany(ProductAssociation::class, 'product_target_id');
    }

    /**
     * Associate a product to another with a type.
     */
    public function associate(mixed $product, string $type): void
    {
        Associate::dispatch($this, $product, $type);
    }

    /**
     * Dissociate a product to another with a type.
     */
    public function dissociate(mixed $product, string $type = null): void
    {
        Dissociate::dispatch($this, $product, $type);
    }

    /**
     * Return the customer groups relationship.
     */
    public function customerGroups(): BelongsToMany
    {
        $prefix = config('lunar.database.table_prefix');

        return $this->belongsToMany(
            CustomerGroup::class,
            "{$prefix}customer_group_product"
        )->withPivot([
            'purchasable',
            'visible',
            'enabled',
            'starts_at',
            'ends_at',
        ])->withTimestamps();
    }

    /**
     * Return the brand relationship.
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Apply the status scope.
     */
    public function scopeStatus(Builder $query, string $status): Builder
    {
        return $query->whereStatus($status);
    }

    /**
     * Return the prices relationship.
     */
    public function prices(): HasManyThrough
    {
        return $this->hasManyThrough(
            Price::class,
            ProductVariant::class,
            'product_id',
            'priceable_id'
        )->wherePriceableType(ProductVariant::class);
    }


    public function usersAddedfavorites(): BelongsToMany
    {
        $prefix = config('lunar.database.table_prefix');

        return $this->belongsToMany(Customer::class, "{$prefix}favorite_products", 'product_id', 'customer_user_id');
    }
    
    public function favoriteProduct()
    {
        return $this->hasMany(FavoriteProduct::class, 'product_id');
    }

    public function getIsFavoriteAttribute()
    {
        return !empty(auth()->user()?->customers->first()) ?
            $this->usersAddedfavorites()
            ->where('customer_user_id', auth()->user()->customers->first()->id)
            ->where('product_id', $this->id)
            ->exists() :
            false;
    }

    public function getIsFavoriteIdAttribute()
    {
        $id = null;

        if (!empty(auth()->user()?->customers->first())) {
            $customer = auth()->user()->customers->first();

            return $this->favoriteProduct()->where('customer_user_id', $customer->id)->first()?->id;
        }

        return  $id;
    }
}
