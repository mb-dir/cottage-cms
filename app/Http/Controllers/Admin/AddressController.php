<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\AddressInformation;
use Illuminate\Http\Request;
use Inertia\Inertia;


class AddressController extends Controller
{
    public function index()
    {
        $address = AddressInformation::all()->first();

        return Inertia::render('Admin/Address/Index', compact('address'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'map_src' => ['string', 'nullable'],
            'phone' => ['string', 'nullable'],
            'coordinates' => ['string', 'nullable'],
            'address' => ['string', 'nullable'],
        ]);

        AddressInformation::updateOrCreate(
            ['id' => 1],
            $validated
        );

        return redirect()->back()->with('message', 'Dane zostały zapisane');
    }
}
