<?php

namespace Lunar\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lunar\Base\BaseModel;
use Lunar\Base\Traits\HasMacros;
use Lunar\Base\Traits\HasMedia;
use Lunar\Base\Traits\HasUrls;
use Lunar\Base\Traits\LogsActivity;
use Lunar\Base\Traits\Searchable;
use Lunar\Database\Factories\BrandFactory;
use Spatie\MediaLibrary\HasMedia as SpatieHasMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @property int $id
 * @property string $name
 * @property ?\Illuminate\Support\Carbon $created_at
 * @property ?\Illuminate\Support\Carbon $updated_at
 */
class Brand extends BaseModel implements SpatieHasMedia
{
    use HasFactory,
        HasMedia,
        HasUrls,
        Searchable,
        LogsActivity,
        HasMacros,
        HasSlug;

    /**
     * Define our base filterable attributes.
     *
     * @var array
     */
    protected $filterable = [];

    /**
     * Define our base sortable attributes.
     *
     * @var array
     */
    protected $sortable = [
        'name',
    ];

    /**
     * {@inheritDoc}
     */
    protected $guarded = [];

    /**
     * Return a new factory instance for the model.
     */
    protected static function newFactory(): BrandFactory
    {
        return BrandFactory::new();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('handle');
    }

    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return config('scout.prefix') . 'brands';
    }

    /**
     * Return our base (core) attributes we want searchable.
     *
     * @return array
     */
    public function getSearchableAttributes()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }

    /**
     * Return the product relationship.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
