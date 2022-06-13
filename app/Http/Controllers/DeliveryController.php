<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Package;
use Illuminate\View\View;

class DeliveryController extends Controller
{
    protected Delivery $delivery;

    public function __construct(Delivery $delivery)
    {
        $this->delivery = $delivery;
    }

    public function index(Request $request): View
    {
        $deliveries = $this->delivery->all();

        return view('deliver.index', compact('deliveries'));
    }

    public function store(Request $request, Package $package): RedirectResponse
    {
        DB::transaction(function () use ($request, $package) {
            $package->updateStatus(Package::STATUS_IN_STOCK);

            $package->delivery()->create($request->all());

            // $package->delete();
        });

        return back();
    }
}
