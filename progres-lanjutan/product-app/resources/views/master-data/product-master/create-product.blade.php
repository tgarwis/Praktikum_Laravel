<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Halaman Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-5">
                        <h2 class="text-center mb-5 text-2xl font-bold">Create New Product</h2>
                        <x-auth-session-status class="mb-4" :status="session('success')" />
                            <form action="{{ route('product-store')}}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf <!-- Laravel CSRF protection -->

                            <br>

                            <div class="form-group">
                                <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                <input type="text" id="product_name" name="product_name" placeholder="Masukkan nama Product" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="image" class="block text-sm font-medium text-gray-700">Masukkan gambar</label>
                                <input type="file" id="image" name="image">
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="unit" class="block text-sm font-medium text-gray-700">Unit</label>
                                <select id="unit" name="unit" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="" disabled selected>Select a unit</option>
                                    <option value="kg">Kilogram (kg)</option>
                                    <option value="ltr">Liter (ltr)</option>
                                    <option value="pcs">Pieces (pcs)</option>
                                    <option value="box">Box</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                <input type="text" id="type" name="types" placeholder="Masukkan tipe product" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="information" class="block text-sm font-medium text-gray-700">Information</label>
                                <textarea id="information" name="information" rows="3" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" id="qty" name="quantities" placeholder="Masukkan jumlah product" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="producer" class="block text-sm font-medium text-gray-700">Producer</label>
                                <input type="text" id="producer" name="producers" placeholder="Masukkan nama producer" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="supplier" class="block text-sm font-medium text-gray-700">Supplier</label>
                                <select id="supplier" name="supplier_id" 
                                    class="mt-1 block w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="" disabled selected>Select a supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <br>

                            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-black bg-indigo-600 border border-black rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                        </form>
                    </div>

                    @vite('resources/js/app.js') <!-- Include Vite's JS assets -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
