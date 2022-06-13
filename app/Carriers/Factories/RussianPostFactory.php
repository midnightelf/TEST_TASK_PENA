<?php

namespace App\Carriers\Factories;

use App\Interfaces\CarrierFactoryInterface;
use App\Models\Package;

class RussianPostFactory implements CarrierFactoryInterface
{
    public function deliver(Package $package): bool
    {
        // some RussianPost API calls...

        $package->updateStatus(Package::STATUS_ON_WAY);

        return true;
    }

    public function getPriceByKg(float $kg): float
    {
        if ($kg < 10) {
            return 100;
        }

        return 1000;
    }
}
