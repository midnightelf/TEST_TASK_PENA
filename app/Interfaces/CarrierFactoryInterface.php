<?php

namespace App\Interfaces;

use App\Models\Package;

interface CarrierFactoryInterface
{
    /**
     * Realization deliver parcel (using api or something else)
     * 
     * @return bool
     */
    public function deliver(Package $package): bool;

    /**
     * Get price of deliver by weight (kg)
     * 
     * @param int $kg
     * @return float
     */
    public function getPriceByKg(float $kg): float;
}