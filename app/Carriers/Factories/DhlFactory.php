<?php

namespace App\Carriers\Factories;

use App\Interfaces\CarrierFactoryInterface;
use App\Models\Package;

class DhlFactory implements CarrierFactoryInterface
{
    public function deliver(Package $package): bool
    {
        // some DHL API calls...

        $package->updateStatus(Package::STATUS_ON_WAY);

        return true;
    }

    public function getPriceByKg(float $kg): float
    {
        return $kg * 100;
    }
}
