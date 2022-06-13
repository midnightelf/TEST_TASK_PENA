<?php

namespace App\Models;

use App\Carriers\CarrierFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Carriers\Factories\DhlFactory;
use App\Carriers\Factories\RussianPostFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery extends Model
{
    use HasFactory;

    const CARRIER_DHL = 'dhl';
    const CARRIER_RUSSIAN_POST = 'russian_post';

    /**
     * New carriers must be registered here 
     * with format [short_name => Carrier::class]
     * 
     * @var array<string, string>
     */
    public static $carriers = [
        self::CARRIER_DHL => DhlFactory::class,
        self::CARRIER_RUSSIAN_POST => RussianPostFactory::class,
    ];

    protected $fillable = ['carrier'];
    protected $appends = ['price'];

    /**
     * Calculate and return price for delivery parcel
     * 
     * @return float
     */
    public function getPriceAttribute(): float
    {
        $weight = $this->package()->value('weight');

        $carrier = CarrierFactory::getFactory($this->getAttribute('carrier'));

        return $carrier->getPriceByKg($weight);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
