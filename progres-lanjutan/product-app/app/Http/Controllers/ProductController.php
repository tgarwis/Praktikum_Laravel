<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Product::all();
        return view("master-data.product-master.index-product", compact('data'));

        // Product-List

        // return view('master-data.product-master.product-list', [
        //     'products' => Product::latest()->get()
        // ]);
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
        // Validate input data
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'unit' => 'required|string|max:50',
            'types' => 'required|string|max:50',
            'information' => 'nullable|string',
            'quantities' => 'required|integer',
            'producers' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            
            // Generate a unique file name
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            // Move the uploaded file to the public/images directory
            $request->file('image')->move(public_path('images/products'), $fileName);
            // Add the image file name to validated data
            $validatedData['image'] = $fileName; 
        }
        
        // dd($request->all());

        // Create the product with the validated data
        Product::create($validatedData);
        
        // Redirect to the product list with a success message
        return redirect()->back()->with('success', 'Product created successfully.');

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
        $product = Product::findOrFail($id);
        return view('master-data.product-master.detail-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('master-data.product-master.edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'unit' => 'required|string|max:50',
            'types' => 'required|string|max:50',
            'information' => 'nullable|string',
            'quantities' => 'required|integer',
            'producers' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'product_name' => $request->product_name,
            // 'image' => $request->image,
            'unit' => $request->unit,
            'types' => $request->types,
            'information' => $request->information,
            'quantities' => $request->quantities,
            'producers' => $request->producers
        ]);

        return redirect()->back()->with('success', 'Product update successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product){
            $product->delete();
            return redirect()->route('product-index')->with('success', 'Product deleted successfully!');
        }
        return redirect()->route('product-index')->with('error', 'Product tidak ditemukan!');
    }

    public function exportExcel(){
        return Excel::download(new ProductsExport, 'product.xlsx');
    }

}