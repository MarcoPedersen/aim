<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::orderBy('id', 'asc')->get();

        return view([
            'fields' => $shops,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = new Shop();
        $shop->name = request('name');
        $shop->location = request('location');
        $shop->email = request('email');
        $shop->phone = request('phone');
        $shop->website = request('website');
        $shop->latitude = request('latitude');
        $shop->longitude = request('longitude');
        $shop->save();
        return redirect('');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::findOrFail($id);
        $shopLocations = null;
        if (!empty($shop->latitude && !empty($field->longitude))) {
            $shopLocations[] = ['lat' => $shop->latitude, 'lng' => $shop->longitude];
        }
        return view([
            'shop' => $shop,
            'shopLocations ' => json_encode($shopLocations)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        return view([]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $shop = Shop::findOrFail($id);
        $shop->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);
        $shop->delete();

        return redirect('');
    }
}
