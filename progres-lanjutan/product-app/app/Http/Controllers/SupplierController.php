<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master-data.product-master.supplier-list', [
            'suppliers' => Supplier::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('master-data.product-master.create-product', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validasi input data
        $validasi_data_supplier = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_address' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'comment' => 'nullable|string',
        ]);
        
        //Simpan data ke database
        Supplier::create($validasi_data_supplier);

        // dd($request->all());

        return redirect()->back()->with('success', 'Data product berhasil disimpan');

        // try {
        //         Supplier::create($validasi_data_supplier);
        //         return redirect()->back()->with('success', 'Data product berhasil disimpan');
        //     } catch (\Exception $e) {
        //         return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data product. Silahkan coba lagi.');
        //     }
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
        $suppliers = Supplier::all();
        return view('master-data.product-master.edit-product', compact('suppliers'));
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
