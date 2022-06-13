<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Package;
use Illuminate\View\View;

class PackageController extends Controller
{
    protected Package $package;
    protected Delivery $delivery;

    public function __construct(Package $package, Delivery $delivery)
    {
        $this->package = $package;
        $this->delivery = $delivery;
    }

    public function index(Request $request): View
    {
        $in_stock = $this->package::STATUS_WAIT;

        $packages = $this->package->where('status', $in_stock)->get();
        $statuses = $this->package::$statuses;

        $carriers = $this->delivery::$carriers;

        return view('package.index', compact(
            'packages',
            'statuses',
            'carriers'
        ));
    }
}
