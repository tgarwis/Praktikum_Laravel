<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master-data.product-master.product-list', [
            'products' => Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-data.product-master.create-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validasi input data
        $validasi_data = $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'types' => 'required|string|max:50',
            'information' => 'nullable|string',
            'quantities' => 'required|integer',
            'producers' => 'required|string|max:255',
        ]);
        
        //Simpan data ke database
        Product::create($validasi_data);

        // dd($request->all());

        return redirect()->back()->with('success', 'Data product berhasil disimpan');

        // try {
        //     Product::create($validasi_data);
        //     return redirect()->back()->with('success', 'Data product berhasil disimpan');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data product. Silahkan coba lagi.');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
