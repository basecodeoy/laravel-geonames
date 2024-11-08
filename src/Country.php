<?php

declare(strict_types=1);

namespace BaseCodeOy\GeoNames;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get a relationship with a continent.
     */
    public function continent(): BelongsTo
    {
        return $this->belongsTo(GeoNames::getContinentModel());
    }

    /**
     * Get a relationship with divisions.
     */
    public function divisions(): HasMany
    {
        return $this->hasMany(GeoNames::getDivisionModel());
    }

    /**
     * Get a relationship with cities.
     */
    public function cities(): HasMany
    {
        return $this->hasMany(GeoNames::getCityModel());
    }

    /**
     * Get the translations for the country.
     */
    public function translations(): HasMany
    {
        return $this->hasMany(GeoNames::getAlternateNameModel(), 'geoname_id', 'geoname_id');
    }

    /**
     * Get the table associated with the model.
     */
    public function getTable(): string
    {
        return GeoNames::getCountryTableName();
    }
}
