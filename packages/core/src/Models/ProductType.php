<?php

namespace Lunar\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Lunar\Base\BaseModel;
use Lunar\Base\Traits\HasAttributes;
use Lunar\Base\Traits\HasMacros;
use Lunar\Database\Factories\ProductTypeFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @property int $id
 * @property string $name
 * @property ?\Illuminate\Support\Carbon $created_at
 * @property ?\Illuminate\Support\Carbon $updated_at
 */
class ProductType extends BaseModel
{
    use HasAttributes;
    use HasFactory;
    use HasMacros;
    use HasSlug;

    /**
     * Return a new factory instance for the model.
     */
    protected static function newFactory(): ProductTypeFactory
    {
        return ProductTypeFactory::new();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('handle');
    }

    /**
     * Define which attributes should be
     * protected from mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the mapped attributes relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function mappedAttributes()
    {
        $prefix = config('lunar.database.table_prefix');

        return $this->morphToMany(
            Attribute::class,
            'attributable',
            "{$prefix}attributables"
        )->withTimestamps();
    }

    /**
     * Return the product attributes relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function productAttributes()
    {
        return $this->mappedAttributes()->whereAttributeType(Product::class);
    }

    /**
     * Return the variant attributes relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function variantAttributes()
    {
        return $this->mappedAttributes()->whereAttributeType(ProductVariant::class);
    }

    /**
     * Get the products relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
