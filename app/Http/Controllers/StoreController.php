<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return Store::with('books')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'active' => 'boolean',
        ]);

        return Store::create($validated);
    }

    public function show(Store $store)
    {
        return $store->load('books');
    }

    public function update(Request $request, Store $store)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'active' => 'boolean',
        ]);

        $store->update($validated);

        return $store;
    }

    public function destroy(Store $store)
    {
        $store->delete();

        return response()->noContent();
    }
}

