<?php

namespace App\Carriers;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Interfaces\CarrierFactoryInterface;
use App\Models\Delivery;

class CarrierFactory
{
    /**
     * @param string $carrier Carrier's short name
     * @return CarrierFactoryInterface
     * 
     * @throws NotFoundHttpException 
     * 
     * @see \App\Models\Delivery::$carriers Carrier MUST be registered there
     */
    public static function getFactory($carrier): CarrierFactoryInterface
    {
        if (!key_exists($carrier, Delivery::$carriers)) {
            throw new NotFoundHttpException(__('msg.carrier_404', compact('carrier')));
        }

        return app(Delivery::$carriers[$carrier]);
    }
}
